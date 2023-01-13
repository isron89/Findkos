@extends('style.style')

@section('konten')
<div class="p-5 mb-4 bg-light rounded-3">
	<div class="container-fluid py-5">
		<div class="container-sm">
			@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			@endif
			<form action="{{route('kos_store')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				@error('name')
				<p class="alert alert-danger">{{ $message }}</p>
				@enderror
				<div class="mb-3">
					<label for="formcontrol" class="form-label">Nama Kos</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="Kos Melati" value="{{ old('name') }}" required>
				</div>
				@error('ukuran')
				<p class="alert alert-danger">{{ $message }}</p>
				@enderror
				<div class="mb-3">
					<label for="formcontrol" class="form-label">Ukuran Kos</label>
					<input type="number" class="form-control" name="ukuran" id="ukuran" placeholder="4 (dalam meter persegi)" value="{{ old('ukuran') }}" required>
				</div>
				@error('harga')
				<p class="alert alert-danger">{{ $message }}</p>
				@enderror
				<div class="mb-3">
					<label for="formcontrol" class="form-label">Harga</label>
					<input type="number" class="form-control" name="harga" id="harga" placeholder="500000" value="{{ old('harga') }}" required>
				</div>
				<!-- <label for="exampleFormControlInput1" class="form-label">Gambar</label><br>
				<div class="input-group mb-3">
					<input type="file" class="form-control" id="inputGroupFile03" name="gambar" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
				</div> -->
				@error('ac')
				<p class="alert alert-danger">{{ $message }}</p>
				@enderror
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Penyejuk</label>
					<select id="penyejuk" name="ac" class="form-select" required>
						<option value="" disabled selected hidden>Pilih Salah Satu</option>
						<option value="20">AC</option>
						<option value="10">Kipas angin</option>
						<option value="0">Tidak Ada</option>
					</select>
				</div>
				@error('parkir')
				<p class="alert alert-danger">{{ $message }}</p>
				@enderror
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Parkir</label>
					<select id="parkir" name="parkir" class="form-select" required>
						<option value="" disabled selected hidden>Pilih Salah Satu</option>
						<option value="20">Luas</option>
						<option value="10">Sedang</option>
						<option value="0">Tidak Ada</option>
					</select>
				</div>
				@error('kamarmandi')
				<p class="alert alert-danger">{{ $message }}</p>
				@enderror
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Kamar Mandi</label>
					<select id="kamarmandi" name="kamarmandi" class="form-select" required>
						<option value="" disabled selected hidden>Pilih Salah Satu</option>
						<option value="30">Dalam</option>
						<!-- <option value="20">Dalam (Sedang)</option> -->
						<option value="15">Luar</option>
					</select>
				</div>
				@error('wifi')
				<p class="alert alert-danger">{{ $message }}</p>
				@enderror
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Wifi</label>
					<select id="wifi" name="wifi" class="form-select" required>
						<option value="" disabled selected hidden>Pilih Salah Satu</option>
						<option value="30">Ada (Koneksi Cepat)</option>
						<option value="20">Ada (Koneksi Sedang)</option>
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

{{-- table --}}
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nama kos</th>
				<th scope="col">harga</th>
				<th scope="col">created</th>
				<th scope="col">action</th>
			</tr>
		</thead>
		<tbody>
			@if($kos->count() > 0)
			@foreach($kos as $datakos)
			<tr>
				<th scope="row">{{$loop->iteration}}</th>
				<td>{{$datakos->name}}</td>
				<td>@rupiah($datakos->harga)</td>
				<td>{{$datakos->created_at}}</td>
				<td>
					<a href="{{ route('edit', [$datakos->id]) }}"><button type="button" class="btn btn-primary btn-sm">Detail</button></a>
					<form method="POST" action="{{ route('delete', [$datakos->id]) }}">
						@csrf
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item')">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td colspan="5" class="text-center">Tidak ada data</td>
			</tr>
			@endif
		</tbody>
	</table>
</div>
@endsection