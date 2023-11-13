@extends('frontend.layouts.app')
@section('content')
    <div class="container m-auto mt-24 md:mt-18">

        <!-- <div class="pt-5 pb-3" data-aos="fade-in">
            <h1 class="sm:text-2xl md:text-3xl lg:text-4xl xl:text-4xl">Tim Pemilu</h1>
            <div class="flex justify-between">
                <p class="text-gray-secondary text-sm sm:text-sm md:text-md xl:text-lg">Daftar Anggota Komisi Pemilihan Umum Ketua PPI Rotterdam 2020/2021</p>
            </div>
        </div> -->

        @if(count($teams) == 0)
            <div class="text-center p-20" data-aos="fade-in">
                <h1 class="text-gray-secondary text-xl">Belum ada data TIM KPU!</h1>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6">
                @foreach($teams as $key => $item)
                <div class="card bg-white" {{ ($key > 4 ? 'data-aos="fade-in"' : '') }}>
                        <div class="px-3 py-4 pt-4">
                            <div class="text-md sm:text-2xl md:text-2xl xl:text-2xl mb-2 text-gray-900">{{ $item->name }}</div>
                            <p class="text-sm sm:text-md md:text-md xl:text-md"><i class="fas fa-address-card text-brand mr-2"></i> <span class="text-gray-secondary">{{ $item->position }}</span></p>
                                <p class="text-sm sm:text-md md:text-md xl:text-md"><i class="fas fa-university text-brand mr-2"></i> <span class="text-gray-secondary">{{ $item->department }}</span></p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
@endsection

@section('extraJs')
    <script>
        $('html,body').animate({scrollTop: $('input').offset().top}, 200, function() {
            $('input[data-focus="true"]').first().focus();
            $('textarea[data-focus="true"]').first().focus();
            $('html, body').animate({
                scrollTop: $('div[data-focus="true"]').first().offset().top
            }, 2000);
        });
    </script>
@endsection
