@extends('style.style')

@section('konten')
<div class="p-5 mb-4 bg-light rounded-3">
	<div class="container-fluid py-5">
		<div class="container-sm">
			@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			@endif
			<form action="{{route('update')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Nama Kos</label>
					<input type="name" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Kos Melati" value="{{old('name',$kos->name)}}">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Ukuran Kos</label>
					<input type="number" class="form-control" name="ukuran" id="exampleFormControlInput2" placeholder="4 (dalam meter persegi)" value="{{old('name',$kos->ukuran)}}">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Harga</label>
					<input type="number" class="form-control" name="harga" id="exampleFormControlInput3" placeholder="500000" value="{{old('name',$kos->harga)}}">
				</div>
				<div class="input-group mb-3">
					<input type="file" class="form-control" id="inputGroupFile03" name="gambar" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
				</div>

				<div class="mb-3">
					<label for="disabledSelect" class="form-label">AC</label>
					<select id="disabledSelect" name="ac" class="form-select" value="{{old('name',$kos->ac)}}">
						<option>Pilih Salah Satu</option>
						<option value="10">Ada</option>
						<option value="0">Tidak Ada</option>
					</select>
				</div>

				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Parkir</label>
					<select id="disabledSelect" name="parkir" class="form-select" value="{{old('name',$kos->parkir)}}">
						<option>Pilih Salah Satu</option>
						<option value="20">Luas</option>
						<option value="10">Sedang</option>
						<option value="0">Tidak Ada</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Kamar Mandi</label>
					<select id="disabledSelect" name="kamarmandi" class="form-select" value="{{old('name',$kos->kamarmandi)}}">
						<option>Pilih Salah Satu</option>
						<option value="50">Dalam (Luas)</option>
						<option value="25">Dalam (Sedang)</option>
						<option value="10">Luar</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Wifi</label>
					<select id="disabledSelect" name="wifi" class="form-select" value="{{old('name',$kos->wifi)}}">
						<option>Pilih Salah Satu</option>
						<option value="50">Ada (Koneksi Cepat)</option>
						<option value="25">Ada (Koneksi Sedang)</option>
						<option value="10">Ada (Koneksi Lambat)</option>
						<option value="0">Tidak Ada</option>
					</select>
				</div>

				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
					<button class="btn btn-primary me-md-2" type="submit">Simpan</button>
				</div>
			</form>
		</div>

	</div>
</div>

@endsection