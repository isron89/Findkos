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
    private $batas_bawah_luas = 5;
    private $batas_atas_luas = 20;
    private $batas_bawah_fasilitas = 50;
    private $batas_atas_fasilitas = 130;
    private $batas_bawah_harga = 350000;
    private $batas_atas_harga = 1000000;

    public function index()
    {
        $kos = kos::get();
        return view('kos', [
            'kos' => $kos,
        ]);
    }
    public function proses()
    {
        $kos = kos::get();

        for ($i = 0; $i < $kos->count(); $i++) {
            $fasilitas = array();
            $fasilitas[$i] = $kos[$i]->ukuran + $kos[$i]->ac + $kos[$i]->parkir + $kos[$i]->kamarmandi + $kos[$i]->wifi;
            // //r1
            // $a1 = min($this->luas_besar($kos[$i]->ukuran), $this->fasilitas_banyak($fasilitas));
            // $z1 = $a1 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;
            // //r2

            //R1
            $aPredikat1 = array();
            $z1 = array();
            $aPredikat1[$i] = min([$this->luas_kecil($kos[$i]->ukuran), $this->fasilitas_banyak($fasilitas)]);
            $z1[$i] = $aPredikat1[$i] * ($this->batas_atas_harga - $this->batas_bawah_harga) +  $this->batas_bawah_harga;

            // R2
            $aPredikat2 = array();
            $z2 = array();
            $aPredikat2[$i] = min([$this->luas_kecil($kos[$i]->ukuran), $this->fasilitas_sedikit($fasilitas)]);
            $z2[$i] = ($aPredikat2[$i] * ($this->batas_atas_harga -  $this->batas_bawah_harga) - $this->batas_atas_harga) * -1;

            // R3
            $aPredikat3 = array();
            $z3 = array();
            $aPredikat3[$i] = min([$this->luas_besar($kos[$i]->ukuran), $this->fasilitas_banyak($fasilitas)]);
            $z3[$i] = $aPredikat3[$i] * ($this->batas_atas_harga -  $this->batas_bawah_harga) +  $this->batas_bawah_harga;

            // R4
            $aPredikat4 = array();
            $z4 = array();
            $aPredikat4[$i] = min([$this->luas_besar($kos[$i]->ukuran), $this->fasilitas_sedikit($fasilitas)]);
            $z4[$i] = ($aPredikat4[$i] * ($this->batas_atas_harga -  $this->batas_bawah_harga) - $this->batas_atas_harga) * -1;

            $z_rata_rata = array();
            $z_rata_rata[$i] = ($aPredikat1[$i] * $z1[$i] + $aPredikat2[$i] * $z2[$i] + $aPredikat3[$i] * $z3[$i] + $aPredikat4[$i] * $z4[$i]) / ($aPredikat1[$i] + $aPredikat2[$i] + $aPredikat3[$i] + $aPredikat4[$i]);
            $rata_rata[] = $z_rata_rata;
            print_r($z_rata_rata);
        }
        //return view('proses',compact('rata_rata'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gambar' => 'required|image|max:2048',
            'harga' => 'required',
            'ukuran' => 'required',
            'ac' => 'required',
            'parkir' => 'required',
            'kamarmandi' => 'required',
            'wifi' => 'required'
        ]);
        $file = $request->file('gambar');
        $namegambar = Str::random(10) . date('d-m-y') . '.' . $request->file('gambar')->getClientOriginalExtension();
        $request->file('gambar')->storeAs('public/', $namegambar, 'public');
        // Storage::putFileAs('storage/images', $file, $namegambar);
        // Storage::disk('public')->put($namegambar, $file);
        $save = new Kos;
        $save->fill($request->all());
        if ($request->has('gambar')) {
            $save->gambar = $namegambar;
        }
        $save->save();
        return Redirect::route('index')->with('message', 'berhasil menambahkan data');
    }
    public function fuzzy()
    {
        $kos = kos::get();

        for ($i = 0; $i < $kos->count(); $i++) {
            $fasilitas = $kos[$i]->ukuran + $kos[$i]->ac + $kos[$i]->parkir + $kos[$i]->kamarmandi + $kos[$i]->wifi;
            // //r1
            // $a1 = min($this->luas_besar($kos[$i]->ukuran), $this->fasilitas_banyak($fasilitas));
            // $z1 = $a1 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;
            // //r2


            $aPredikat1 = min([$this->luas_kecil($kos[$i]->ukuran), $this->fasilitas_banyak($fasilitas)]);
            $z1 = $aPredikat1 * ($this->batas_atas_harga - $this->batas_bawah_harga) +  $this->batas_bawah_harga;

            // R2
            $aPredikat2 = min([$this->luas_kecil($kos[$i]->ukuran), $this->fasilitas_sedikit($fasilitas)]);
            $z2 = ($aPredikat2 * ($this->batas_atas_harga -  $this->batas_bawah_harga) - $this->batas_atas_harga) * -1;

            // R3
            $aPredikat3 = min([$this->luas_besar($kos[$i]->ukuran), $this->fasilitas_banyak($fasilitas)]);
            $z3 = $aPredikat3 * ($this->batas_atas_harga -  $this->batas_bawah_harga) +  $this->batas_bawah_harga;

            // R4
            $aPredikat4 = min([$this->luas_besar($kos[$i]->ukuran), $this->fasilitas_sedikit($fasilitas)]);
            $z4 = ($aPredikat4 * ($this->batas_atas_harga -  $this->batas_bawah_harga) - $this->batas_atas_harga) * -1;

            $z_rata_rata = array();
            $z_rata_rata[$i] = ($aPredikat1 * $z1 + $aPredikat2 * $z2 + $aPredikat3 * $z3 + $aPredikat4 * $z4) / ($aPredikat1 + $aPredikat2 + $aPredikat3 + $aPredikat4);

            //submit update hasil
            $submit = kos::find($kos[$i]->id);
            $submit->hasilfuzzy = $z_rata_rata[$i];
            $submit->save();
        }
        $sortKos = kos::get()->sortBy('hasilfuzzy');
        return view('hasil', [
            'kos' => $sortKos,
        ]);
    }

    public function editKos($id)
    {
        $kos = kos::findOrFail($id);
        return view('editkos', compact('kos'));
    }

    public function updateKos(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gambar' => 'required|image|max:2048',
            'harga' => 'required',
            'ukuran' => 'required',
            'ac' => 'required',
            'parkir' => 'required',
            'kamarmandi' => 'required',
            'wifi' => 'required'
        ]);
        $file = $request->file('gambar');
        $namegambar = Str::random(10) . date('d-m-y') . '.' . $request->file('gambar')->getClientOriginalExtension();
        $request->file('gambar')->storeAs('public/', $namegambar, 'public');

        $save = kos::find($id);
        $save->fill($request->all());
        if ($request->has('gambar')) {
            $save->gambar = $namegambar;
        }
        $save->save();
        return Redirect::route('index')->with('message', 'berhasil mengubah data');
    }

    public function deleteKos($id)
    {
        $kos = kos::findOrFail($id);
        $kos->delete();
        return Redirect::route('index')->with('message', 'berhasil menghapus data');
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
            return ($this->batas_bawah_fasilitas - $y) / ($this->batas_atas_fasilitas - $this->batas_bawah_fasilitas);
        } elseif ($y >= $this->batas_atas_fasilitas) {
            return 0;
        }
    }
    protected function harga_mahal($z)
    {
        if ($z <= $this->batas_bawah_harga) {
            return 0;
        } elseif ($z >= $this->batas_bawah_harga && $z <= $this->batas_atas_harga) {
            return ($z - $this->batas_bawah_harga) / ($this->batas_atas_harga - $this->batas_bawah_harga);
        } elseif ($z >= $this->batas_atas_harga) {
            return 1;
        }
    }
    protected function harga_murah($z)
    {
        if ($z <= $this->batas_bawah_harga) {
            return 1;
        } elseif ($z >= $this->batas_bawah_harga && $z <= $this->batas_atas_harga) {
            return ($z - $this->batas_bawah_harga) / ($this->batas_atas_harga - $this->batas_bawah_harga);
        } elseif ($z >= $this->batas_atas_harga) {
            return 0;
        }
    }
}
