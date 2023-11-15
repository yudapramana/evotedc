@extends('frontend.layouts.app')
@section('content')
    <div class="container m-auto mt-24 md:mt-18">

        <div class="pt-6 pb-5" data-aos="fade-in">
            <h1 class="sm:text-2xl md:text-3xl lg:text-4xl xl:text-4xl">Cek Daftar Pemilih</h1>
        </div>

        <form class="w-full flex-row sm:flex-row md:flex lg:md:flex xl:md:flex" method="post" action="{{ route('home.member.check') }}">
            @csrf
            <div class="w-full sm:w-full md:w-4/6 lg:w-4/6 xl:w-4/6" data-aos="fade-in">
                <div class="w-full pr-0 sm:pr-0 md:pr-4 lg:pr-4 xl:pr-4">
                    <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                        <label class="py-3 leading-tight w-full sm:w-full md:w-1/6 lg:w-1/6 xl:w-1/6">Email</label>
                        <input class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 {{ $errors->has('email') ? 'border-red-500' : '' }}" type="text" name="email" value="{{ old('email', $current_member ? $current_member->email : '' ) }}" placeholder="Masukkan email yang terdaftar" required>
                    </div>
                    <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                        <label class="py-3 leading-tight w-1/6">Voter Key</label>
                        <input class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 {{ $errors->has('voter_key') ? 'border-red-500' : '' }}" type="text" name="voter_key" value="{{ old('voter_key', $current_member ? $current_member->voter_key : '') }}" placeholder="Masukan voter key yang telah diberikan" required>
                    </div>
                    <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                        <div class="w-full">
                            <button type="submit" class="btn px-6 {{ count($errors) > 0 ? 'error' : '' }} mx-auto w-full sm:w-full md:w-auto lg:w-auto xl:w-auto {{ session('current_member') ? 'success' : '' }}">
                                {{ session('current_member') ? 'Data Valid' : 'Tekan untuk Validasi' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                    @if(count($errors) > 0)
            <div class="w-full sm:w-full md:w-2/6 lg:w-2/6 xl:w-2/6 pl-0 sm:pl-0 md:pl-4 lg:pl-4 xl:pl-4 mb-6">
                <div class="card {{ count($errors) > 0 ? 'error' : 'primary' }} {{ session('current_member') ? 'success' : '' }} p-6 pb-10" data-aos="fade-in">
                    <p class="font-bold text-md sm:text-md md:text-lg lg:text-lg xl:text-lg text-gray-900">Keterangan :</p>
                        @if($errors->has('email'))
                            <p class="text-gray-900 block text-sm sm:text-sm md:text-md lg:text-md xl:text-md">{{ $errors->first('email') }}</p>
                        @endif
                        @if($errors->has('voter_key'))
                            <p class="text-gray-900 block text-sm sm:text-sm md:text-md lg:text-md xl:text-md">{{ $errors->first('voter_key') }}</p>
                        @endif
                        @if($errors->has('g-recaptcha-response'))
                            <p class="text-gray-900 block text-sm sm:text-sm md:text-md lg:text-md xl:text-md">{{ $errors->first('g-recaptcha-response') }}</p>
                        @endif
                        @if($errors->has('member'))
                            <p class="text-gray-900 block text-sm sm:text-sm md:text-md lg:text-md xl:text-md">{{ $errors->first('member') }}</p>
                        @endif
                </div>
            </div>
                    @elseif(count($errors) == 0 && !$current_member)
                    @else
            <div class="w-full sm:w-full md:w-2/6 lg:w-2/6 xl:w-2/6 pl-0 sm:pl-0 md:pl-4 lg:pl-4 xl:pl-4 mb-6">
                <div class="card {{ count($errors) > 0 ? 'error' : 'primary' }} {{ session('current_member') ? 'success' : '' }} p-6 pb-10" data-aos="fade-in">
                    <p class="font-bold text-md sm:text-md md:text-lg lg:text-lg xl:text-lg text-gray-900">Keterangan :</p>
                        <p class="text-gray-900 block text-sm sm:text-sm md:text-md lg:text-md xl:text-md">Hai {{ $current_member->name }}, anda terdaftar sebagai peserta pemilihan</p>
                </div>
            </div>
                    @endif
        </form>

    <div class="banner mb-6" data-aos="fade-in" data-aos-duration="2000">
           <img class="w-full" src="https://storage.googleapis.com/dukungcalonmu-static/evote/bannerblue.jpg" alt="Pemilu">
    </div>

    </div>
@endsection
