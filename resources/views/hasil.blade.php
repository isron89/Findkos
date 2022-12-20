@extends('style.style')

@section('konten')

<div class="row">
  @foreach($kos as $datakos)
  <div class="card-deck col-sm-3">
    <div class="card" style="width: 18rem;">
      <!-- <img class="card-img-top" src="{{ storage_path('kos/'.$datakos->gambar) }}" alt="Card image cap"> -->
      <img class="card-img-top" src="{{ file_exists(asset('storage/'.$datakos->gambar)) ? asset('storage/'.$datakos->gambar) : asset('storage/images/kos.png') }} " alt="Card image cap">
      <!-- <img class="card-img-top" src="{{ Storage::disk('public')->url($datakos->gambar); }}" alt="Card image cap"> -->
      <div class="card-body">
        <h5 class="card-title">#{{ $loop->iteration . ' ' . $datakos->name }}</h5>
        <p class="card-text">Rp. {{$datakos->harga}}</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">@php if($datakos->hasil_fuzzy >= $datakos->harga){
          echo "<i class='fa-regular fa-thumbs-up'></i> Direkomendasi";
          }else {
          echo "<i class='fa-sharp fa-solid fa-info'></i> Tidak direkomendasi";
          }@endphp</small>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection