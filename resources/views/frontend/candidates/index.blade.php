@extends('frontend.layouts.app')
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


<div class="container m-auto mt-24 md:mt-18">
    @if (count($candidates1) == 0)
    <div class="text-center p-20">
        <h1 class="text-gray-secondary text-xl">Belum ada data kandidat!</h1>
    </div>
    @else
    <h2 class="text-center text-4xl font-extrabold font-serif italic pt-4 pb-8 mb-4">PEMILIHAN UMUM RAYA FEB UNDIP 2023
    </h2>
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
                    <p class="text-center pt-24 text-white px-6 text-2xl mx-auto"
                        style="font-family: 'Courier New', Courier, monospace!important">{{ $item->name }}</p>
                </div>
                <div class="object-center h-10 mt-8 flex">
                    <img src="{{ $item->image }}" class="kandidat-frame object-cover">
                    @if ($item->image_vice)
                    <img src="{{ $item->image_vice }}" class="kandidat-frame object-cover">
                    @endif
                </div>
                <div class="text-center pb-10 pt-10 flex flex-col">
                </div>
            </div>
        </div>
        @endforeach

    </div>


    {{-- <h2 class="text-center text-4xl font-extrabold font-serif italic pt-4 pb-8 mb-4">SUKSESI JURUSAN DI LINGKUP FEB
        UNDIP 2023 </h2> --}}
    <div class="flex flex-wrap justify-center">
        @foreach ($candidates2 as $key => $cans)
        {{-- {{ $key }} --}}
        <h2 class="text-center text-4xl font-extrabold font-serif italic pt-4 pb-8 mb-4">SUKSESI {{ strtoupper($key) }}
            DI LINGKUP FEB UNDIP 2023 </h2>

        @foreach ($cans as $k => $item)
        <div class="py-2 px-2 w-full md:w-1/2 mb-20">
            <div class="object-center h-12">
                <div class="frame-number">
                    <h1 class="text-5xl m-auto">{{ $item->number }}</h1>
                </div>
            </div>
            <div class="rounded-large overflow-hidden shadow-lg bg-white">
                <div
                    class="kandidat-container @if ($item->jurusan == 'Manajemen') manajemen @endif @if ($item->jurusan == 'Akuntansi') akuntansi @endif @if ($item->jurusan == 'Ekonomi Islam') ekonomi-islam @endif @if ($item->jurusan == 'Ekonomi') ekonomi @endif">
                    <p class="text-center pt-24 text-white px-6 text-2xl mx-auto"
                        style="font-family: 'Courier New', Courier, monospace!important">{{ $item->name }}</p>
                </div>
                <div class="object-center h-10 mt-8 flex">
                    <img src="{{ $item->image }}" class="kandidat-frame object-cover">
                    @if ($item->image_vice)
                    <img src="{{ $item->image_vice }}" class="kandidat-frame object-cover">
                    @endif
                </div>
                <div class="text-center pb-10 pt-10 flex flex-col">

                </div>
            </div>
        </div>
        @endforeach
        @endforeach
    </div>

    {{-- <h2 class="text-center text-4xl font-extrabold font-serif italic pt-4 pb-8 mb-4">PEMILIHAN UMUM RAYA FEB UNDIP
        2023 </h2>
    <div class="flex flex-wrap justify-center  mb-20">
        @foreach ($candidates1 as $key => $item)
        <div class="pb-5 px-1 w-full">
            <div class="object-center h-12">
                <div class="frame-number">
                    <h1 class="text-5xl m-auto">{{ $item->number }}</h1>
                </div>
            </div>
            <div class="rounded-large overflow-hidden shadow-lg bg-white">
                <div class="kandidat-container">
                    <p class="text-center pt-24 text-white px-6 text-2xl mx-auto">{{ $item->name }}</p>
                </div>
                <div class="object-center h-10 mt-8 flex">
                    <img src="{{ $item->image }}" class="kandidat-frame object-cover">
                    @if ($item->image_vice)
                    <img src="{{ $item->image_vice }}" class="kandidat-frame object-cover">
                    @endif
                </div>
                <div class="px-6 pt-12 pb-6 w-full text-gray-secondary justify-center text-center flex flex-col">
                    <h3 class="text-black font-bold text-2xl">Visi dan Misi</h3>
                    <a class="link-button my-4" href="#visimis{{ $item->number }}" type="button"
                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="visimis{{ $item->number }}">
                        Tampilkan
                    </a>
                    <div class="collapse my-4" id="visimis{{ $item->number }}">
                        @if ($vm)
                        @if ($item->number == 1)
                        <h3 class="text-black font-bold text-2xl">Visi</h3>
                        <p>Mewujudkan Hermestha Fakultas Kedokteran Undiksha Menjadi Lembaga Ilmiah yang Unggul melalui
                            BHAKTI (Bersinergi, Harmonis, Aktif, Kolaborasi, Terampil, dan Inovatif) dalam Bingkai
                            Solidaritas</p>
                        <h3 class="text-black font-bold text-2xl pt-4">Misi</h3>
                        <ol class="list-decimal text-left mx-8">
                            <li>Bersinergi dalam melaksanakan fungsi dan program kerja yang sudah disusun dengan
                                sebaik-baiknya.</li>
                            <li>Mewujudkan hubungan yang harmonis antarsesama anggota Hermestha dan antarorganisasi
                                mahasiswa di internal maupun di eksternal Fakultas Kedokteran Undiksha.</li>
                            <li>Aktif ikut serta dalam kegiatan keilmiahan yang selaras dengan pelaksanaan Tri Dharma
                                Perguruan Tinggi.</li>
                            <li>Menjalin relasi dan kolaborasi antarlembaga ilmiah serta antarorganisasi di intermal
                                maupun di eksternal Fakultas Kedokteran Undiksha.</li>
                            <li>Meningkatkan keterampilan hard skill dan soft skill anggota Hermestha Fakultas
                                Kedokteran Undiksha dalam bidang ilmiah dan non ilmiah.</li>
                            <li>Menciptakan karya-karya yang inovatif dalam bidang keilmiahan dan program kerja terbaik
                                sebagai upaya memajukan eksistensi Hermestha Fakultas Kedokteran Undiksha.</li>
                        </ol>
                        @elseif($item->number == 2)
                        <h3 class="text-black font-bold text-2xl">Visi</h3>
                        <p>Mewujudkan Hermestha FK Undiksha ACHIEVER (Active, Collaborative, Harmony, Innovative,
                            Educative, Variable, Effective, Regenerative) melalui keorganisasian yang kolaboratif dan
                            harmonis sehingga Hermestha dapat menjadi wadah yang mendorong serta memfasilitasi untuk
                            menjadi berprestasi. </p>
                        <h3 class="text-black font-bold text-2xl pt-4">Misi</h3>
                        <ol class="list-decimal text-left mx-8">
                            <li>Mengoptimalkan keaktifan pelatihan klub ilmiah dengan silabus yang terstruktur dan
                                dilaksanakan secara rutin</li>
                            <li>Menjadi mediator dan penyedia yang baik untuk segala kompetisi</li>
                            <li>Merevitalisasi program kerja dan fungsi hermestha yang memerlukannya dengan inovasi
                                sehingga keorganisasian yang terstruktur dan optimal dapat berjalan dengan lancar</li>
                            <li>Memilih dan mewadahi regenerasi hermestha yaitu kader penerus hermestha dengan edukatif
                                untuk meraih prestasi</li>
                            <li>Menciptakan keuangan dan kesekretariatan organisasi yang efektif, efisien, dan
                                transparan</li>
                            <li>Membangun serta menjaga keharmonisan internal dan kesejahteraan anggota melalui
                                pelaksanaan keorganisasian yang variatif dan kolaboratif</li>
                        </ol>
                        @else
                        <h3 class="text-black font-bold text-2xl">Visi</h3>
                        <p>-</p>
                        <h3 class="text-black font-bold text-2xl pt-4">Misi</h3>
                        <ol class="list-decimal text-left mx-8">
                        </ol>
                        @endif
                        <p class="md:space-x-1 space-y-1 md:space-y-0 mb-4">
                        </p>
                        @else
                        <h3 class="text-black font-bold text-2xl">Visi</h3>
                        <p>-</p>
                        <h3 class="text-black font-bold text-2xl pt-4">Misi</h3>
                        <ol class="list-decimal text-left mx-8">
                            <li>-</li>
                            <li>-</li>
                            <li>-</li>
                        </ol>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endforeach --}}




    </div>
    @endif
</div>
@endsection