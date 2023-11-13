@extends('frontend.layouts.app')
@section('content')
    <div class="container m-auto mt-24 md:mt-18">


        <div class="pt-4 pb-5" data-aos="fade-in">
            <h1 class="sm:text-xl md:text-xl lg:text-xl xl:text-xl">Debat 2 Calon Ketua Mata Garuda 2020 - 2022</h1>
            <p class="text-gray-secondary text-sm sm:text-sm md:text-md xl:text-lg">22 / Mei / 2020</p>
        </div>

        <div class="">
            <iframe class="card bg-white p-6 text-center w-full sm:w-full md:w-full lg:w-4/6 xl:w-4/6" width="560" height="450" src="{{ $url_second }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="pt-6 pb-5">
            <h1 class="sm:text-xl md:text-xl lg:text-xl xl:text-xl">Debat 1 Calon Ketua Mata Garuda 2020 - 2022</h1>
            <p class="text-gray-secondary text-sm sm:text-sm md:text-md xl:text-lg">19 / Mei / 2020</p>
        </div>

        <div class="">
            <iframe class="card bg-white p-6 text-center w-full sm:w-full md:w-full lg:w-4/6 xl:w-4/6" width="560" height="450" src="{{ $url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

    </div>
@endsection

