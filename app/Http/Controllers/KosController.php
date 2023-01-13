<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KosController extends Controller
{
    private $batas_bawah_luas = 7;
    private $batas_atas_luas = 14;
    private $batas_bawah_fasilitas = 30;
    private $batas_atas_fasilitas = 100;
    private $batas_bawah_harga = 300000;
    private $batas_mid_harga = 1200000;
    private $batas_atas_harga = 1500000;

    public function index()
    {
        return view('page.home');
    }

    public function home()
    {
        $kos = kos::get();
        return view('page.kos', [
            'kos' => $kos,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gambar' => 'image|max:2048',
            'harga' => 'required',
            'ukuran' => 'required',
            'ac' => 'required',
            'parkir' => 'required',
            'kamarmandi' => 'required',
            'wifi' => 'required'
        ]);

        $save = new Kos;
        $save->fill($request->all());
        if ($request->hasFile('gambar')) {
            $namegambar = Str::random(10) . date('d-m-y') . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->storeAs('public/', $namegambar, 'public');
            $save->gambar = $namegambar;
        }
        try {
            $save->save();
            return redirect()->route('home')->with(['message' => 'Kos berhasil ditambahkan']);
        } catch (\Throwable $th) {
            report($th);
            return redirect()->route('home')->with(['message' => 'Kos gagal ditambahkan']);
        }
    }

    public function fuzzy()
    {
        $kos = kos::get();
        if ($kos->count() == 0) {
            return redirect()->route('home')->with(['message' => 'Data kos kosong']);
        }

        for ($i = 0; $i < $kos->count(); $i++) {
            $fasilitas = $kos[$i]->ukuran + $kos[$i]->ac + $kos[$i]->parkir + $kos[$i]->kamarmandi + $kos[$i]->wifi;

            //R1
            $aPredikat1 = min([$this->luas_kecil($kos[$i]->ukuran), $this->fasilitas_banyak($fasilitas)]);
            $z1 = $this->harga_mahal($aPredikat1);

            // R2
            $aPredikat2 = min([$this->luas_kecil($kos[$i]->ukuran), $this->fasilitas_sedikit($fasilitas)]);
            $z2 = $this->harga_murah($aPredikat2);

            // R3
            $aPredikat3 = min([$this->luas_besar($kos[$i]->ukuran), $this->fasilitas_banyak($fasilitas)]);
            $z3 = $this->harga_mahal($aPredikat3);

            // R4
            $aPredikat4 = min([$this->luas_besar($kos[$i]->ukuran), $this->fasilitas_sedikit($fasilitas)]);
            $z4 = $this->harga_murah($aPredikat4);

            //defuzzyfikasi
            $z_rata_rata = array();
            $z_rata_rata[$i] = ($aPredikat1 * $z1 + $aPredikat2 * $z2 + $aPredikat3 * $z3 + $aPredikat4 * $z4) / ($aPredikat1 + $aPredikat2 + $aPredikat3 + $aPredikat4);

            //submit update hasil, sort by delta harga
            $submit = kos::find($kos[$i]->id);
            $submit->hasil_fuzzy = (int) $z_rata_rata[$i];
            $submit->delta_harga = (int) $z_rata_rata[$i] - $kos[$i]->harga;
            $submit->save();
        }
        $sortKos = kos::get()->sortByDesc('delta_harga');
        return view('page.hasil', [
            'kos' => $sortKos,
        ]);
    }

    public function editKos($id)
    {
        $kos = kos::findOrFail($id);
        return view('page.editkos', compact('kos'));
    }

    public function updateKos(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gambar' => 'image|max:2048',
            'harga' => 'required',
            'ukuran' => 'required',
            'ac' => 'required',
            'parkir' => 'required',
            'kamarmandi' => 'required',
            'wifi' => 'required'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $file = $request->file('gambar');
            $namegambar = Str::random(10) . date('d-m-y') . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->storeAs('public/', $namegambar, 'public');
            // $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/' . $request->old_image);

            //update post with new image
            $save = kos::find($id);
            $save->fill($request->all());
            $save->save();
        } else {
            //update post without image
            $post = kos::find($id);
            $post->update([
                'name'     => $request->name,
                'harga' => $request->harga,
                'ukuran' => $request->ukuran,
                'ac' => $request->ac,
                'parkir' => $request->parkir,
                'kamarmandi' => $request->kamarmandi,
                'wifi' => $request->wifi
            ]);
        }

        //redirect to index
        return redirect()->route('home')->with(['message' => 'Berhasil mengubah data!']);
    }

    public function deleteKos($id)
    {
        $kos = kos::findOrFail($id);
        $kos->delete();
        return Redirect::route('home')->with('message', 'Berhasil menghapus data!');
    }

    protected function luas_besar($x)
    {
        if ($x <= $this->batas_bawah_luas) {
            return 0;
        } elseif ($x >= $this->batas_bawah_luas && $x <= $this->batas_atas_luas) {
            return ($x - $this->batas_bawah_luas) / ($this->batas_atas_luas - $this->batas_bawah_luas);
        } elseif ($x >= $this->batas_atas_luas) {
            return 1;
        }
    }

    protected function luas_kecil($x)
    {
        if ($x <= $this->batas_bawah_luas) {
            return 1;
        } else if ($x >= $this->batas_bawah_luas && $x <= $this->batas_atas_luas) {
            return ($this->batas_atas_luas - $x) / ($this->batas_atas_luas - $this->batas_bawah_luas);
        } else if ($x >= $this->batas_atas_luas) {
            return 0;
        }
    }

    protected function fasilitas_banyak($y)
    {
        if ($y <= $this->batas_bawah_fasilitas) {
            return 0;
        } elseif ($y >= $this->batas_bawah_fasilitas && $y <= $this->batas_atas_fasilitas) {
            return ($y - $this->batas_bawah_fasilitas) / ($this->batas_atas_fasilitas - $this->batas_bawah_fasilitas);
        } elseif ($y >= $this->batas_atas_fasilitas) {
            return 1;
        }
    }

    protected function fasilitas_sedikit($y)
    {
        if ($y <= $this->batas_bawah_fasilitas) {
            return 1;
        } elseif ($y >= $this->batas_bawah_fasilitas && $y <= $this->batas_atas_fasilitas) {
            return ($this->batas_atas_fasilitas - $y) / ($this->batas_atas_fasilitas - $this->batas_bawah_fasilitas);
        } elseif ($y >= $this->batas_atas_fasilitas) {
            return 0;
        }
    }

    protected function harga_murah($z)
    {
        if ($z > 0 && $z < 1) {
            return ($this->batas_atas_harga - $z * $this->batas_mid_harga);
        } else if ($z == 1) {
            return $this->batas_bawah_harga;
        } else {
            return $this->batas_atas_harga;
        }
    }

    protected function harga_mahal($z)
    {
        if ($z > 0 && $z < 1) {
            return ($this->batas_bawah_harga + $z * $this->batas_mid_harga);
        } else if ($z == 1) {
            return $this->batas_atas_harga;
        } else {
            return $this->batas_bawah_harga;
        }
    }
}
