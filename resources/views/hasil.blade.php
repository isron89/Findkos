@extends('style.style')

@section('konten')

<div class="card-group">
  @foreach($kos as $datakos)
  <div class="card">
    <img class="card-img-top" src="{{url('storage/images/'.$datakos->gambar)}}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{$datakos->name}}</h5>
      <p class="card-text">{{$datakos->name.$datakos->hasilfuzzy}}</p>
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