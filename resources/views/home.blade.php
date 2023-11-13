<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MATA GARUDA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('__frontend/build/style.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-brand font-sans leading-normal tracking-normal">

<nav class="navbar">
    <div class="flex items-center flex-shrink-0 text-white">
        <a class="text-brand" href="#">
            <span class="text-2xl gr-dark-orange"> MATAGARUDA</span>
        </a>
    </div>

    <div class="block lg:hidden">
        <button id="nav-toggle" class="nav-toggle">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
            </svg>
        </button>
    </div>

    <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
        <ul class="list-reset lg:flex justify-end flex-1 items-center font-light">
            <li>
                <a class="link active" href="#">Beranda</a>
            </li>
            <li>
                <a class="link" href="kandidat.html">Kandidat</a>
            </li>
            <li>
                <a class="link" href="#">Rekapitulasi</a>
            </li>
            <li>
                <a href="vote.html" class="link-button">
                    Vote
                </a>
            </li>
        </ul>
    </div>
</nav>

<!--Container-->
<div class="container m-auto mt-24 md:mt-18">

    <div class="banner" data-aos="fade-in" data-aos-duration="2000">
        <img class="w-full" src="{{ asset('__frontend/images/banner.jpg') }}" alt="Pemilu">
    </div>

    <div class="pt-5 pb-3" data-aos="fade-in">
        <h1 class="sm:text-2xl md:text-3xl lg:text-4xl xl:text-4xl">Tim KPU</h1>
        <div class="flex justify-between">
            <p class="text-gray-secondary text-sm sm:text-sm md:text-md xl:text-lg">Daftar Nama Tim Komisi Pemilihan Umum</p>
            <p class="text-brand text-sm sm:text-sm md:text-md xl:text-lg">Lihat semua ></p>
        </div>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6">
        <div class="card" data-aos="fade-in">
            <img class="w-full xl:h-64 lg:h-56 md:h-48 sm:h-48 h-48 object-cover" src="{{ asset('__frontend/images/tim/tim1.jpg') }}" alt="Tim 1">
            <div class="absolute ml-3">
                <div class="label-team bg-gr-dark-orange">
                    <h1 class="text-white text-xl">2019</h1>
                </div>
            </div>
            <div class="px-3 py-4 pt-8">
                <div class="text-md sm:text-2xl md:text-2xl xl:text-2xl mb-2 text-gray-900">Maudy Ayunda</div>
                <p class="text-sm sm:text-md md:text-md xl:text-md"><i class="fas fa-map-marker-alt text-brand"></i> <span class="text-gray-secondary">Jakarta</span></p>
            </div>
        </div>

        <div class="card" data-aos="fade-in">
            <img class="w-full xl:h-64 lg:h-56 md:h-48 sm:h-48 h-48 object-cover" src="{{ asset('__frontend/images/tim/tim2.jpg') }}" alt="Tim 1">
            <div class="absolute ml-3">
                <div class="label-team bg-gr-dark-orange">
                    <h1 class="text-white text-xl">2019</h1>
                </div>
            </div>
            <div class="px-3 py-4 pt-8">
                <div class="text-md sm:text-2xl md:text-2xl xl:text-2xl mb-2 text-gray-900">Reza Rahardian</div>
                <p class="text-sm sm:text-md md:text-md xl:text-md"><i class="fas fa-map-marker-alt text-brand"></i> <span class="text-gray-secondary">Jakarta</span></p>
            </div>
        </div>

        <div class="card" data-aos="fade-in">
            <img class="w-full xl:h-64 lg:h-56 md:h-48 sm:h-48 h-48 object-cover" src="{{ asset('__frontend/images/tim/tim1.jpg') }}" alt="Tim 1">
            <div class="absolute ml-3">
                <div class="label-team bg-gr-dark-orange">
                    <h1 class="text-white text-xl">2019</h1>
                </div>
            </div>
            <div class="px-3 py-4 pt-8">
                <div class="text-md sm:text-2xl md:text-2xl xl:text-2xl mb-2 text-gray-900">Maudy Ayunda</div>
                <p class="text-sm sm:text-md md:text-md xl:text-md"><i class="fas fa-map-marker-alt text-brand"></i> <span class="text-gray-secondary">Jakarta</span></p>
            </div>
        </div>

        <div class="card" data-aos="fade-in">
            <img class="w-full xl:h-64 lg:h-56 md:h-48 sm:h-48 h-48 object-cover" src="{{ asset("__frontend/images/tim/tim2.jpg") }}" alt="Tim 1">
            <div class="absolute ml-3">
                <div class="label-team bg-gr-dark-orange">
                    <h1 class="text-white text-xl">2019</h1>
                </div>
            </div>
            <div class="px-3 py-4 pt-8">
                <div class="text-md sm:text-2xl md:text-2xl xl:text-2xl mb-2 text-gray-900">Reza Rahardian</div>
                <p class="text-sm sm:text-md md:text-md xl:text-md"><i class="fas fa-map-marker-alt text-brand"></i> <span class="text-gray-secondary">Jakarta</span></p>
            </div>
        </div>

    </div>

    <div class="pt-12 pb-5" data-aos="fade-up">
        <h1 class="sm:text-2xl md:text-3xl lg:text-4xl xl:text-4xl">Kontak Kami</h1>
        <div class="flex justify-between">
            <p class="text-gray-secondary text-sm sm:text-md md:text-md xl:text-lg">Sampaikan Kritik dan Saran Anda Mengenai Sistem Baru Ini</p>
        </div>
    </div>

    <form class="w-full flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
        <div class="w-full sm:w-full md:w-4/6 lg:w-4/6 xl:w-4/6" data-aos="fade-up">
            <div class="w-full pr-0 sm:pr-0 md:pr-4 lg:pr-4 xl:pr-4">
                <input class="input placeholder-gray-secondary opacity-75" type="text" placeholder="Nama Lengkap">
                <input class="input placeholder-gray-secondary opacity-75" type="email" placeholder="Email">
                <input class="input placeholder-gray-secondary opacity-75" type="number" placeholder="Nomor Telepon">
                <textarea class="input rounded-large placeholder-gray-secondary opacity-75" rows="8"></textarea>
            </div>
        </div>
        <div class="w-full sm:w-full md:w-2/6 lg:w-2/6 xl:w-2/6 px-4 pl-0 sm:pl-0 md:pl-4 lg:pl-4 xl:pl-4" data-aos="fade-up">
            <p class="font-bold text-md sm:text-md md:text-lg lg:text-lg xl:text-lg text-gray-secondary">Email</p>
            <p class="text-gray-secondary block break-all text-sm sm:text-sm md:text-md lg:text-md xl:text-md">alamat.email@website.com</p>

            <p class="font-bold text-md sm:text-md md:text-lg lg:text-lg xl:text-lg text-gray-secondary mt-10">Alamat</p>
            <p class="text-gray-secondary text-sm sm:text-sm md:text-md lg:text-md xl:text-md">Gedung Danadyaksa Cikini
                Jl. Cikini Raya No.91, Menteng
                Jakarta 10330</p>
        </div>
    </form>

</div>

<footer class="py-10">
    <p class="text-gray-secondary text-sm text-center">© 2020 MATAGARUDA</p>
</footer>

<script src="{{ asset('__frontend/js/index.js') }}"></script>
</body>
</html>
