<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FindKos</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
</head>

<body>
  <section class="h-full w-full border-box  transition-all duration-500 linear bg-white" id="started">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

      .btn-outline-header-2-2 {
        border: 1px solid #555B61;
        color: #555B61;
      }

      .btn-outline-header-2-2:hover {
        border: 1px solid #27C499;
        color: #27C499;
      }

      .btn-outline-header-2-2:hover div path {
        fill: #27C499;
      }

      .btn-fill-header-2-2 {
        border: 1px solid #27C499;
      }

      .navigation-header-2-2 a:hover,
      .active::after {
        font-weight: 600;
      }
    </style>
    <!-- Navbar findkos -->
    <div style="font-family: 'Poppins', sans-serif;">
      <header x-data="{ open: false }">
        <div class="mx-auto flex py-12 lg:px-24 md:px-16 sm:px-8 px-8  items-center justify-between lg:justify-start">
          <a href="{{ route('index') }}">
            <img src="{{ asset('storage/images/findkos.jpg') }}" alt="Findkos" style="width: 50px; height: 50px;">
          </a>
          <div class="flex mr-0 lg:hidden cursor-pointer">
            <svg class="w-6 h-6" @click="open = !open" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </div>
          <div :class="{'hidden': !open}" class="bg-black fixed w-full hidden h-full top-0 left-0 z-30 bg-opacity-60" @click="open = !open">
          </div>
          <nav class="navigation-header-2-2 lg:mr-auto hidden lg:flex flex-col text-base justify-center z-50 fixed top-8 left-3 right-3 p-8 rounded-md shadow-md bg-white lg:flex lg:flex-row lg:relative lg:top-0 lg:shadow-none lg:bg-transparent lg:p-0 lg:items-center items-start" :class="{'flex': open, 'hidden': !open}">
            <a href="{{ route('index') }}">
              <img class="m-0 lg:hidden mb-3" src="{{ asset('storage/images/findkos.jpg') }}" alt="Findkos">
            </a>
            <a class=" text-lg font-semibold leading-6 mx-0 lg:mx-5 my-4 lg:my-0 relative active" style="color: #1d1e3c; font-family: 'Poppins', sans-serif;" href="{{ route('home') }}">Findkos</a>
            <a class=" text-lg font-regular leading-6 mx-0 lg:mx-5 my-4 lg:my-0 relative active" style="color: #1d1e3c; font-family: 'Poppins', sans-serif;" href="#about">About</a>
            <div class="flex items-center justify-end w-full lg:hidden mt-3">
              <button class=" text-white  text-lg py-3 px-8 rounded-xl focus:outline-none hover:shadow-lg  font-semibold" style="background: #27C499; font-family: 'Poppins', sans-serif;">
                <a href="{{ route('home') }}">Get Started</a>
              </button>
            </div>
            <svg @click="open = !open" class="w-6 h-6 absolute top-4 right-4  lg:hidden cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </nav>
        </div>
      </header>

      <!-- Hero-header-findkos -->
      <div>
        <div class="mx-auto flex pt-12 pb-16 lg:pb-20 lg:px-24 md:px-16 sm:px-8 px-8  lg:flex-row flex-col">
          <!-- Left Column -->
          <div class="lg:flex-grow lg:w-1/2 flex flex-col lg:items-start lg:text-left mb-3 md:mb-12 lg:mb-0 items-center text-center">
            <!-- <p class="mb-8 leading-relaxed font-semibold text-sm" style="color: #27C499;">FINDKOS</p> -->
            <h1 class="lg:block hidden title-font sm:text-5xl lg:text-6xl text-4xl mb-8 font-semibold sm:leading-tight " style="color: #272E35; line-height: 1.2;">Check recommendation boarding house price
            </h1>
            <h1 class="lg:hidden block title-font sm:text-5xl lg:text-6xl text-4xl mb-8 lg::px-10 md:px-10 sm:px-6 px-0 font-semibold sm:leading-tight " style="color: #272E35; line-height: 1.2;">The best way to check recommendation boarding house price
            </h1>
            <div class="inline-block items-center mx-auto lg:mx-0 lg:flex justify-center lg:space-x-8 md:space-x-2  sm:space-x-3 space-x-0">
              <button class="btn-fill-header-2-2 inline-flex font-semibold text-white  text-base py-4 px-6 rounded-xl mb-4 lg:mb-0 md:mb-0 focus:outline-none hover:shadow-lg" style="background: #2986cc; font-family: 'Poppins', sans-serif;"> <a href="{{ route('home') }}">Get started</a></button>
              </button>
            </div>
          </div>
          <!-- Right Column -->
          <div class="w-full lg:w-1/2 text-center justify-center flex pr-0">
            <img id="hero-header-2-2" src="{{ asset('storage/images/rent.svg') }}" alt="Background">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="h-full w-full border-box bg-white" id="about">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

      .btn-outline-content-2-1 {
        border: 1px solid #979797;
        color: #979797;
      }

      .btn-outline-content-2-1:hover {
        border: 1px solid #FF7C57;
        color: #FF7C57;
      }

      .btn-fill-content-2-1 {
        border: 1px solid #FF7C57;
      }

      .card-header-content-2-1 {
        background-color: #FFF7F4;
        border: 1px solid #FF7C57;
      }

      @media(min-width: 1024px) {
        .lg-show-content-2-1 {
          display: block;
        }

        .lg-hide-content-2-1 {
          display: none;
        }
      }

      @media(max-width: 1024px) {
        .lg-show-content-2-1 {
          display: none;
        }

        .lg-hide-content-2-1 {
          display: block;
        }
      }
    </style>
    <div style="font-family: 'Poppins', sans-serif;">
      <div class="container lg:px-32 md:px-8  sm:px-12 px-5 pt-20 pb-12 mx-auto">
        <!-- Title Text -->
        <div class="flex flex-col text-center w-full mb-12">
          <h1 class="text-4xl font-semibold title-font mb-2.5" style="color: #121212;">Findkos</h1>
          <h2 class="text-base font-light title-font mx-12 lg:w-full md:w-full sm:w-3/6 sm:mx-auto" style="color: #121212;">Web application that can provide more effective boarding recommendations using Fuzzy Algorithm</h2>
        </div>

        <!-- 3-Column -->
        <div class="flex lg:flex-row flex-col -m-4">
          <div class="px-14 md:px-0 lg:px-4 lg:w-1/3 md:w-1/3 sm:w-4/6 mx-auto">
            <div class="flex rounded-lg h-full lg:pt-8 lg:pb-8 md:pt-8 md:pb-8 pt-4 pb-12 flex-col">
              <div class="items-center text-center">
                <div class="inline-flex items-center justify-center rounded-full  mb-6 ">
                  <img src="{{ asset('storage/images/operate.svg') }}" alt="find boarding house" style="height: 150px; width: 150px;">
                </div>
              </div>
              <div class="flex-grow">
                <h4 class="font-medium text-center text-2xl mb-2.5" style="color: #121212;">Easy to Operate</h4>
                <p class="lg-show-content-2-1 leading-relaxed text-base text-center tracking-wide " style="color: #565656;">This can easily help you to<br> know your dream boarding house price</p>
                <p class="lg-hide-content-2-1 block leading-relaxed text-base text-center tracking-wide " style="color: #565656;">This can easily help you to know your dream boarding house price</p>
              </div>
            </div>
          </div>
          <div class="px-14 md:px-0 lg:px-4 lg:w-1/3 md:w-1/3 sm:w-4/6 mx-auto">
            <div class="flex rounded-lg h-full lg:pt-8 lg:pb-8 md:pt-8 md:pb-8 pt-12 pb-12 flex-col">
              <div class="items-center text-center ">
                <div class="inline-flex items-center justify-center rounded-full mb-6 ">
                  <img src="{{ asset('storage/images/select.svg') }}" alt="get recommendation" style="height: 200px; width: 200px;">
                </div>
              </div>
              <div class="flex-grow">
                <h4 class="font-medium text-center text-2xl mb-2.5" style="color: #121212;">Provide Recommendation</h4>
                <p class="lg-show-content-2-1 leading-relaxed text-base text-center tracking-wide " style="color: #565656;">As a consideration for determining<br> the boarding house</p>
                <p class="lg-hide-content-2-1 leading-relaxed text-base text-center tracking-wide " style="color: #565656;">As a consideration for determining the boarding house</p>
              </div>
            </div>
          </div>
          <div class="px-14 md:px-0 lg:px-4 lg:w-1/3 md:w-1/3 sm:w-4/6 mx-auto">
            <div class="flex rounded-lg h-full lg:pt-8 lg:pb-8 md:pt-8 md:pb-8 pt-12 pb-6 flex-col">
              <div class="items-center text-center ">
                <div class="inline-flex items-center justify-center rounded-full mb-6 ">
                  <img src="{{ asset('storage/images/find.svg') }}" alt="find with fuzzy" style="height: 150px; width: 150px;">
                </div>
              </div>
              <div class="flex-grow">
                <h4 class="font-medium text-center text-2xl mb-2.5 " style="color: #121212;">Fuzzy Algorithm</h4>
                <p class="lg-show-content-2-1 leading-relaxed text-base text-center tracking-wide " style="color: #565656;">Price recommendation with<br> Fuzzy Tsukamoto Algorithm</p>
                <p class="lg-hide-content-2-1 leading-relaxed text-base text-center tracking-wide " style="color: #565656;">Price recommendation with Fuzzy Tsukamoto Algorithm</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br>
  </section>
  <section class="h-full pt-20 pb-12 lg:px-24 md:px-16 sm:px-8 px-4 bg-white">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

      .list-footer-2-1 li a {
        color: #C7C7C7;
      }

      .list-footer-2-1 li a:hover {
        color: #555252;
        cursor: pointer;
      }

      .border-color-footer-2-1 {
        color: #C7C7C7;
      }

      .footer-link-footer-2-1:hover {
        color: #555252;
        cursor: pointer;
      }

      .social-media-c-footer-2-1:hover circle,
      .social-media-p-footer-2-1:hover path {
        fill: #555252;
        cursor: pointer;
      }
    </style>
    <footer class="h-full" style="font-family: 'Poppins', sans-serif;">
      <div class="pb-24 mx-auto">
        <div class="grid lg:grid-cols-4 md:grid-cols-2">
          <div class="">
            <div class="mb-5">
              <img src="{{ asset('storage/images/findkos.jpg') }}" alt="Findkos" style="width: 50px; height: 50px;">
            </div>
            <nav class="list-none list-footer-2-1">
              <li class="mb-5">
                <a>Home</a>
              </li>
              <li class="mb-5">
                <a>About</a>
              </li>
              <li class="mb-5">
                <a>Features</a>
              </li>
              <li class="mb-5">
                <a>Help</a>
              </li>
            </nav>
          </div>
          <div class="">
            <h2 class="title-font font-semibold text-2xl mb-5">Findkos Company</h2>
            <nav class="list-none list-footer-2-1">
              <li class="mb-5">
                <a href="#">Contact Us</a>
              </li>
              <li class="mb-5">
                <a href="#">Blog</a>
              </li>
            </nav>
          </div>
          <div class="">
            <h2 class="title-font font-semibold text-2xl mb-5">Support</h2>
            <nav class="list-none list-footer-2-1">
              <li class="mb-5">
                <a href="#started">Getting Started</a>
              </li>
              <li class="mb-5">
                <a href="#">Help Center</a>
              </li>
              <li class="mb-5">
                <a href="#">Server Status</a>
              </li>
            </nav>
          </div>
        </div>
      </div>
      <div class="border-color-footer-2-1 mx-auto">
        <div class="">
          <hr>
        </div>
        <nav class="mx-auto flex flex-wrap items-center text-base justify-center">
          <a class="mr-5 footer-link-footer-2-1" href="#">Terms of Service</a>
          <span class="mr-5">|</span>
          <a class="mr-5 footer-link-footer-2-1" href="#">Privacy Policy</a>
          <span class="mr-5">|</span>
          <a class="mr-5 footer-link-footer-2-1" href="#">Licenses</a>
        </nav>
        <nav class="flex lg:flex-row flex-col items-center text-base justify-center">
          &copy; JKC-2022
        </nav>
      </div>
      </div>
    </footer>
  </section>
</body>

</html>