@extends('frontend.layouts.plain')
@section('content')

    <style>
        .manajemen {
            background-image: linear-gradient(135deg, #d25f4a, #e3a86e) !important;
        }

        .akuntansi {
            background-image: linear-gradient(135deg, #3f497b, #3498db) !important;
        }

        .ekonomi-islam {
            background-image: linear-gradient(135deg, #2b7913, #49a143) !important;
        }

        .ekonomi {
            background-image: linear-gradient(135deg, #182362, #3043c5) !important;
        }
    </style>

    <div class="container m-auto mt-20 md:mt-18">
        @if (!session('finish_vote'))
            <form id="voteform" method="post" action="{{ route('home.vote.store') }}" class="form-vote">


                @csrf

                <h2 class="text-center text-4xl font-extrabold font-serif italic pt-4 pb-8 mb-4">PEMILIHAN UMUM RAYA FEB UNDIP 2022 </h2>
                <div class="flex flex-wrap justify-center  mb-20">

                    @foreach ($candidates1 as $key => $item)
                        <div class="py-2 px-2 w-full md:w-1/2">
                            <div class="object-center h-12">
                                <div class="frame-number">
                                    <h1 class="text-5xl m-auto">{{ $item->number }}</h1>
                                </div>
                            </div>
                            <div class="rounded-large overflow-hidden shadow-lg bg-white">
                                <div class="kandidat-container">
                                    <p class="text-center pt-24 text-white px-6 text-2xl mx-auto" style="font-family: 'Courier New', Courier, monospace!important">{{ $item->name }}</p>
                                </div>
                                <div class="object-center h-10 mt-8 flex">
                                    <img src="{{ $item->image }}" class="kandidat-frame object-cover">
                                    @if ($item->image_vice)
                                        <img src="{{ $item->image_vice }}" class="kandidat-frame object-cover">
                                    @endif
                                </div>
                                <div class="text-center pb-10 pt-10 flex flex-col">

                                    <button type="button" class="mx-auto btn-sm mt-8" onclick="vote(this)" data-name="{{ $item->name }}" data-identitas="{{ $item->id }}" data-sumref="#sumdata1">Vote</button>
                                    <input type="radio" name="candidate1" value="{{ $item->id }}" class="hidden">
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


                <h2 class="text-center text-4xl font-extrabold font-serif italic pt-4 pb-8 mb-4">SUKSESI HIMPUNAN {{ strtoupper($jurusan) }} FEB UNDIP 2022 </h2>
                <div class="flex flex-wrap justify-center">
                    @foreach ($candidates2 as $key => $item)
                        <div class="py-2 px-2 w-full md:w-1/2">
                            <div class="object-center h-12">
                                <div class="frame-number">
                                    <h1 class="text-5xl m-auto">{{ $item->number }}</h1>
                                </div>
                            </div>
                            <div class="rounded-large overflow-hidden shadow-lg bg-white">
                                <div class="kandidat-container @if ($jurusan == 'Manajemen') manajemen @endif @if ($jurusan == 'Akuntansi') akuntansi @endif @if ($jurusan == 'Ekonomi Islam') ekonomi-islam @endif @if ($jurusan == 'Ekonomi') ekonomi @endif">
                                    <p class="text-center pt-24 text-white px-6 text-2xl mx-auto" style="font-family: 'Courier New', Courier, monospace!important">{{ $item->name }}</p>
                                </div>
                                <div class="object-center h-10 mt-8 flex">
                                    <img src="{{ $item->image }}" class="kandidat-frame object-cover">
                                    @if ($item->image_vice)
                                        <img src="{{ $item->image_vice }}" class="kandidat-frame object-cover">
                                    @endif
                                </div>
                                <div class="text-center pb-10 pt-10 flex flex-col">
                                    <button type="button" class="mx-auto btn-sm mt-8" onclick="vote(this)" data-name="{{ $item->name }}" data-identitas="{{ $item->id }}" data-sumref="#sumdata1">Vote</button>
                                    <input type="radio" name="candidate2" value="{{ $item->id }}" class="hidden">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="py-4 my-8 px-4 shadow  text-center bg-white">
                    <input type="submit" class="mx-auto w-full btn active px-20 my-6 kirim-vote pulse" value="Kirim">
                </div>
            </form>
        @endif

        @if (session('finish_vote'))
            <div class="text-center text-4xl font-extrabold font-serif italic mt-10">
                <p data-aos="fade-up">Terima kasih! Kamu telah berpartisipasi pada pesta demokrasi FEB Universitas Diponegoro Tahun 2022</p>
            </div>
        @endif





    </div>
@endsection

@section('extraCss')
    <link rel="stylesheet" href="{{ asset('__frontend/css/vote-detail.css') }}">
@endsection

@section('extraJs')
    @if (!session('finish_vote'))
        <script src="{{ asset('__frontend/js/vote-detail.js') }}"></script>
    @endif
@endsection
