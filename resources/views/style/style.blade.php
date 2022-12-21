<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <title>Findkos</title>
</head>

<body>
  <main>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}"><img class="card-img-top" src="{{asset('storage/images/findkos.jpg')}}" alt="Title" style="max-width: 100%; max-height: 100%; height: 40px; width: 40px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('fuzzy')}}">Fuzzy</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Search</a>
            </li> -->
          </ul>
          <!-- <span class="navbar-text">
            findkos
          </span> -->
        </div>
      </div>
    </nav>
    <div class="container py-4">
      <header class="pb-3 mb-4 border-bottom">
        <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
          <!-- <span class="fs-4">@yield('judul halaman')</span> -->
          <span class="fs-4" style="margin: 0 auto;">Findkos</span>
        </a>
      </header>
      @yield('konten')
      <footer class="pt-3 mt-4 text-muted border-top">
        &copy; JKC-2022
      </footer>
    </div>
  </main>
</body>

</html>