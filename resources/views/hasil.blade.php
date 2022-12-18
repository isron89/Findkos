@extends('style.style')

@section('konten')

<div class="card-group">
  @foreach($kos as $datakos)
  <div class="card">
    <!-- <img class="card-img-top" src="{{ storage_path('kos/'.$datakos->gambar) }}" alt="Card image cap"> -->
    <img class="card-img-top" src="{{ asset('storage/'.$datakos->gambar); }}" alt="Card image cap">
    <!-- <img class="card-img-top" src="{{ Storage::disk('public')->url($datakos->gambar); }}" alt="Card image cap"> -->
    <div class="card-body">
      <h5 class="card-title">{{$datakos->name}}</h5>
      <!-- <p class="card-text">{{ asset('public/kos/'.$datakos->gambar); }}</p> -->
      <!-- <p class="card-text">{{$datakos->name}}</p> -->
      <p class="card-text">{{$datakos->hasilfuzzy}}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">@php if($datakos->hasilfuzzy <= $datakos->harga){
          echo "<i class='fa-regular fa-thumbs-up'></i> Direkomendasi";
          }else {
          echo "<i class='fa-sharp fa-solid fa-info'></i> Tidak direkomendasi";
          }@endphp</small>
    </div>
  </div>
  @endforeach
</div>
@endsection