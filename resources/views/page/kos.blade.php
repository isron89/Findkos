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
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Nama Kos</label>
					<input type="name" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Kos Melati" required>
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Ukuran Kos</label>
					<input type="number" class="form-control" name="ukuran" id="exampleFormControlInput2" placeholder="4 (dalam meter persegi)" required>
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Harga</label>
					<input type="number" class="form-control" name="harga" id="exampleFormControlInput3" placeholder="500000" required>
				</div>
				<!-- <label for="exampleFormControlInput1" class="form-label">Gambar</label><br>
				<div class="input-group mb-3">
					<input type="file" class="form-control" id="inputGroupFile03" name="gambar" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
				</div> -->

				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Penyejuk</label>
					<select id="disabledSelect" name="ac" class="form-select">
						<option>Pilih Salah Satu</option>
						<option value="20">AC</option>
						<option value="10">Kipas angin</option>
						<option value="0">Tidak Ada</option>
					</select>
				</div>

				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Parkir</label>
					<select id="disabledSelect" name="parkir" class="form-select">
						<option>Pilih Salah Satu</option>
						<option value="20">Luas</option>
						<option value="10">Sedang</option>
						<option value="0">Tidak Ada</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Kamar Mandi</label>
					<select id="disabledSelect" name="kamarmandi" class="form-select">
						<option>Pilih Salah Satu</option>
						<option value="30">Dalam (Luas)</option>
						<option value="20">Dalam (Sedang)</option>
						<option value="10">Luar</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="disabledSelect" class="form-label">Wifi</label>
					<select id="disabledSelect" name="wifi" class="form-select">
						<option>Pilih Salah Satu</option>
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
			@foreach($kos as $datakos)
			<tr>
				<th scope="row">{{$loop->iteration}}</th>
				<td>{{$datakos->name}}</td>
				<td>@rupiah($datakos->harga)</td>
				<td>{{$datakos->created_at}}</td>
				<td>
					<a href="{{ route('edit', [$datakos->id]) }}"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
					<form method="POST" action="{{ route('delete', [$datakos->id]) }}">
						@csrf
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection