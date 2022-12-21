@extends('style.style')

@section('konten')
<div class="p-5 mb-4 bg-light rounded-3">
	<div class="container-fluid py-5">
		<div class="container-sm">
			@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			@endif
			<form action="{{route('update', [$kos->id])}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<input type="hidden" name="id" value="{{$kos->id}}">
				<div class="mb-3">
					<label for="formControl" class="form-label">Nama Kos</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="Kos Melati" value="{{old('name',$kos->name)}}" required>
				</div>
				<div class="mb-3">
					<label for="formControl" class="form-label">Ukuran Kos</label>
					<input type="number" class="form-control" name="ukuran" id="ukuran" placeholder="4 (dalam meter persegi)" value="{{old('ukuran',$kos->ukuran)}}" required>
				</div>
				<div class="mb-3">
					<label for="formControl" class="form-label">Harga</label>
					<input type="number" class="form-control" name="harga" id="harga" placeholder="500000" value="{{old('harga',$kos->harga)}}" required>
				</div>
				<!-- <div class="input-group mb-3">
					<input type="file" class="form-control" id="inputGroupFile03" name="gambar" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
				</div> -->
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Penyejuk</label>
					<select id="penyejuk" name="ac" class="form-select" required>
						<option value="20" @if ($kos->ac == "20") {{ 'selected' }} @endif>AC</option>
						<option value="10" @if ($kos->ac == "10") {{ 'selected' }} @endif>Kipas angin</option>
						<option value="0" @if ($kos->ac == "0" ) {{ 'selected' }} @endif>Tidak Ada</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Parkir</label>
					<select id="parkir" name="parkir" class="form-select" required>
						<option value="20" @if ($kos->parkir == "20" ) {{ 'selected' }} @endif>Luas</option>
						<option value="10" @if ($kos->parkir == "10" ) {{ 'selected' }} @endif>Sedang</option>
						<option value="0" @if ($kos->parkir == "0" ) {{ 'selected' }} @endif>Tidak Ada</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Kamar Mandi</label>
					<select id="kamarmandi" name="kamarmandi" class="form-select" required>
						<option value="30" @if ($kos->kamarmandi == "30" ) {{ 'selected' }} @endif>Dalam (Luas)</option>
						<option value="20" @if ($kos->kamarmandi == "20" ) {{ 'selected' }} @endif>Dalam (Sedang)</option>
						<option value="10" @if ($kos->kamarmandi == "10" ) {{ 'selected' }} @endif>Luar</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Wifi</label>
					<select id="wifi" name="wifi" class="form-select" required>
						<option value="30" @if ($kos->wifi == "30" ) {{ 'selected' }} @endif>Ada (Koneksi Cepat)</option>
						<option value="20" @if ($kos->wifi == "20" ) {{ 'selected' }} @endif>Ada (Koneksi Sedang)</option>
						<option value="10" @if ($kos->wifi == "10" ) {{ 'selected' }} @endif>Ada (Koneksi Lambat)</option>
						<option value="0" @if ($kos->wifi == "0" ) {{ 'selected' }} @endif>Tidak Ada</option>
					</select>
				</div>
				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
					<a href="{{ route('home') }}"><button type="button" class="btn btn-light me-md-2">Back</button></a>
					<button class="btn btn-primary me-md-2" type="submit">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection