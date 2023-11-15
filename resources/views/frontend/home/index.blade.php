@extends('frontend.layouts.app')
@section('content')
<div class="container-fluid m-auto" style="background-image:url('https://res.cloudinary.com/dezj1x6xp/image/upload/v1700066660/Proyek%20Pemira%20Undip%202023/Homepage_Backgraund_d7g2nn.jpg'); background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    box-shadow: inset 0 0 0 1000px rgba(0,0,0,.7);">
    <h2 class="text-center text-white text-5xl font-bold pt-10">{{ strtoupper(config('app.name')) }}</h2>
    <h4 class="text-center text-white text-3xl font-bold pt-5"
        style="text-transform: uppercase; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-weight:bolder;">
        Pemilihan Umum Raya dan Suksesi Fakultas Ekonomi dan Bisnis <br>
        Universitas Diponegoro Tahun 2023
    </h4>
    <div class=" flex flex-col align-center justify-center">
        {{-- <div class="flex flex-col flex-wrap justify-center items-center my-8">
            <img class="w-64 h-64"
                src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669613484/eVote/Logo_KMA-1_hpozjc.png"
                alt="Pemilihan">
            <img class="h-64"
                src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669613484/eVote/LOGO_PEMIRA_pgxcpf.png"
                alt="Pemilihan">
            <img class="w-64 h-64"
                src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669613484/eVote/LOGO_HMEI_vzjat9.png"
                alt="Pemilihan">
            <img class="h-64"
                src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669613484/eVote/LOGO_-_DESC_crng1v.png"
                alt="Pemilihan">
        </div> --}}
        <nav class="navbar relative justify-center" style="background: none !important; box-shadow:none !important">
            {{-- <img class="w-32 h-32" src="http://koeliah.com/wp-content/uploads/2018/05/undip.png" alt="Pemilihan">
            --}}
            <img class="h-48"
                src="https://res.cloudinary.com/dezj1x6xp/image/upload/v1700062858/Proyek%20Pemira%20Undip%202023/Logo%20-%20logo/Logo_pemira_2023_pdbjdj.png"
                alt="Pemilihan">
            {{-- <img class="h-32"
                src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669613484/eVote/LOGO_MSA_avawfa.png"
                alt="Pemilihan">
            <img class="h-32"
                src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669613484/eVote/LOGO_-_DESC_crng1v.png"
                alt="Pemilihan">
            <img class="w-32 h-32"
                src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669613484/eVote/Logo_KMA-1_hpozjc.png"
                alt="Pemilihan">
            <img class="w-32 h-32"
                src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669613484/eVote/LOGO_HMEI_vzjat9.png"
                alt="Pemilihan"> --}}
        </nav>

        <div class="mt-0 px-4 mb-0">
            <div class="text-center pt-4">
                <a class="link-button" href="{{ route('home.candidates') }}">Lihat Kandidat</a>
            </div>
            <div class="text-center pt-4 pb-8">
                <a class="link-button" href="{{ route('home.vote') }}">Vote Sekarang</a>
            </div>
        </div>
    </div>
    <div class="mb-4 pb-4">
        <h2 class="text-center text-white text-2xl font-bold">#MewujudkanKemajuanFEB</h2>
        <h2 class="text-center text-white text-2xl"><i class="fab fa fa-phone mt-4"></i> 089691648839 </h2>
        <h2 class="text-center text-white text-2xl"><i class="fab fa fa-instagram mt-4"></i> <a
                href="https://instagram.com/@pemirafebundip " target="_blank">@pemirafebundip </a>
        </h2>
        <h2 class="text-center text-white text-2xl"><i class="fab fa fa-envelope mt-4"></i> <a
                href="mailto:pemirafebundip.official@gmail.com " target="_blank">pemirafebundip.official@gmail.com </a>
        </h2>
        {{-- <div class="banner mt-8 px-4">
            <div class="text-center pt-8">
                <a class="link-button" href="{{ route('home.candidates') }}">Lihat Kandidat</a>
            </div>
            <div class="text-center pt-4 pb-8">
                <a class="link-button" href="{{ route('home.vote') }}">Vote</a>
            </div>
        </div> --}}
    </div>
    @endsection

    @section('extraJs')
    <script></script>
    @endsection



    {{-- <h2 class="text-center text-2xl pt-2 pb-4"><i class="fab fa fa-instagram mt-4"></i> <a
            href="https://instagram.com/mpmpoltekkesdenpasar" target="_blank">@mpmpoltekkesdenpasar</a></h2> --}}
    {{-- <h2 class="text-center text-2xl pt-2 pb-4"><i class="fab fa fa-youtube mt-4"></i> MPM Poltekkes Denpasar
    </h2> --}}