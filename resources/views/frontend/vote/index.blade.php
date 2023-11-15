@extends('frontend.layouts.app')
@section('content')
<div class="container m-auto md:mt-18">

    <div class="pt-6 pb-5">
        <h1 class="text-2xl md:text-3xl lg:text-4xl xl:text-4xl">Vote</h1>

        </p>
    </div>

    {{-- Print Data Start : {{ $start_time }} <br>
    Print Data END : {{ $end_time }}<br><br>
    Print Data Now : {{ \Carbon\Carbon::now() }} --}}
    {{-- @if (!(\Carbon\Carbon::now()->gt($start_time) && \Carbon\Carbon::now()->lt($end_time))) --}}
    @if (!\Carbon\Carbon::now()->between($start_time, $end_time))
    <div class="my-10">
        @if (\Carbon\Carbon::now()->lt($end_time))
        <p data-aos="fade-up">Pemungutan suara belum dibuka.</p>
        @else
        <p data-aos="fade-up">Pemungutan suara telah ditutup.</p>
        @endif
    </div>
    @else
    <form class="w-full flex-row sm:flex-row md:flex lg:md:flex xl:md:flex" method="post"
        action="{{ route('home.vote.check') }}">
        @csrf
        <div class="w-full sm:w-full md:w-4/6 lg:w-4/6 xl:w-4/6" data-aos="fade-in">
            <div class="w-full pr-0 sm:pr-0 md:pr-4 lg:pr-4 xl:pr-4">
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <label class="py-3 leading-tight w-full sm:w-full md:w-1/6 lg:w-1/6 xl:w-1/6">NIM / Voter ID</label>
                    <input
                        class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 {{ $errors->has('nim') ? 'border-red-500' : '' }}"
                        type="text" name="nim" value="{{ old('nim', $current_member ? $current_member->nim : '') }}"
                        placeholder="Masukkan Voter ID yang terdaftar (NIM)" required>
                </div>
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <label class="py-3 leading-tight w-1/6">Voter Key</label>
                    <input
                        class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 {{ $errors->has('voter_key') ? 'border-red-500' : '' }}"
                        type="text" name="voter_key"
                        value="{{ old('voter_key', $current_member ? $current_member->voter_key : '') }}"
                        placeholder="Masukan voter key yang telah diberikan" required>
                </div>

                @if(session('current_member'))
                {{-- Nama --}}
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <label class="py-3 leading-tight w-full sm:w-full md:w-1/6 lg:w-1/6 xl:w-1/6">Nama Lengkap</label>
                    <input
                        class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 {{ $errors->has('name') ? 'border-red-500' : '' }}"
                        type="text" name="name" value="{{ old('name', $current_member ? $current_member->name : '') }}"
                        readonly disabled>
                </div>
                {{-- End NamaNama --}}
                {{-- Prodi Angkatan --}}
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <label class="py-3 leading-tight w-full sm:w-full md:w-1/6 lg:w-1/6 xl:w-1/6">Prodi -
                        Angkatan</label>
                    <input
                        class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 {{ $errors->has('jurusan') ? 'border-red-500' : '' }}"
                        type="text" name="jurusan"
                        value="{{ old('jurusan', $current_member ? $current_member->jurusan : '') }}" readonly disabled>
                </div>
                {{-- End Prodi Angkatan --}}

                @endif
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <div class="w-full">
                        @if (session('current_member'))
                        <div
                            class="btn px-6 {{ count($errors) > 0 ? 'error' : '' }} mx-auto w-full md:w-32 {{ session('current_member') ? 'success' : '' }}">
                            Data Valid
                        </div>
                        <button type="button"
                            class="btn mx-auto w-full sm:w-full md:w-auto lg:w-auto xl:w-auto {{ session('current_member') ? 'active' : 'hover:border-gray-secondary hover:text-gray-secondary' }}"
                            id="{{ session('current_member') ? 'next_vote' : '' }}" {{ session('current_member') ? ''
                            : 'disabled' }}>Selanjutnya</button>
                        @else
                        <button type="submit"
                            class="btn px-6 {{ count($errors) > 0 ? 'error' : '' }} mx-auto w-full sm:w-full md:w-auto lg:w-auto xl:w-auto {{ session('current_member') ? 'success' : '' }}">
                            Cek Validasi
                        </button>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        @if (count($errors) > 0)
        <div class="w-full sm:w-full md:w-2/6 lg:w-2/6 xl:w-2/6 pl-0 sm:pl-0 md:pl-4 lg:pl-4 xl:pl-4 mb-6">
            <div class="card {{ count($errors) > 0 ? 'error' : 'primary' }} {{ session('current_member') ? 'success' : '' }} p-6 pb-10"
                data-aos="fade-in">
                <p class="font-bold text-md sm:text-md md:text-lg lg:text-lg xl:text-lg text-gray-900">Keterangan :</p>
                @if ($errors->has('nim'))
                <p class="text-gray-900 block break-all text-sm sm:text-sm md:text-md lg:text-md xl:text-md">{{
                    $errors->first('email') }}</p>
                @endif
                @if ($errors->has('voter_key'))
                <p class="text-gray-900 block break-all text-sm sm:text-sm md:text-md lg:text-md xl:text-md">{{
                    $errors->first('voter_key') }}</p>
                @endif
                @if ($errors->has('g-recaptcha-response'))
                <p class="text-gray-900 block text-sm sm:text-sm md:text-md lg:text-md xl:text-md">{{
                    $errors->first('g-recaptcha-response') }}</p>
                @endif
                @if ($errors->has('member'))
                <p class="text-gray-900 block break-all text-sm sm:text-sm md:text-md lg:text-md xl:text-md">{{
                    $errors->first('member') }}</p>
                @endif
            </div>
        </div>
        @elseif(count($errors) == 0 && !$current_member)
        @else
        <div class="w-full sm:w-full md:w-2/6 lg:w-2/6 xl:w-2/6 pl-0 sm:pl-0 md:pl-4 lg:pl-4 xl:pl-4 mb-6">
            <div class="card {{ count($errors) > 0 ? 'error' : 'primary' }} {{ session('current_member') ? 'success' : '' }} p-6 pb-10"
                data-aos="fade-in">
                <p class="font-bold text-md sm:text-md md:text-lg lg:text-lg xl:text-lg text-gray-900">Keterangan :</p>
                <p class="text-gray-900 block text-sm sm:text-sm md:text-md lg:text-md xl:text-md">Hai {{
                    $current_member->name }}, anda terdaftar sebagai peserta pemilihan<br>Silahkan klik
                    <strong>selanjutnya</strong> untuk memilih kandidat
                </p>
            </div>
        </div>
        @endif
    </form>
    @endif

    <div class="mb-6">
        {{-- <img
            src="https://res.cloudinary.com/kemenagpessel/image/upload/c_crop,w_715/v1669613484/eVote/LOGO_PEMIRA_pgxcpf.png"
            alt="Pemilihan"></a> --}}
        {{-- <img src="https://lpmhayamwuruk.org/wp-content/uploads/2021/11/index-1024x1024.jpg" alt="Pemilihan"></a>
        --}}
        {{-- <img
            src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669707654/eVote/Screen_Shot_2022-11-29_at_2.40.06_PM_cdoubn.png"
            alt="Pemilihan" style="width: 750px !important;"></a> --}}
    </div>
</div>
@endsection

@section('extraJs')
<script>
    $('#next_vote').click(function() {
            window.location.href = '{{ route('home.vote.detail') }}';
        });
</script>
@endsection