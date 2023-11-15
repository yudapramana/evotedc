@extends('backend.layouts.app')
@section('content')

<style>
    .wiheight {
        height: 50px !important;
    }
</style>
{{-- <div class="container"> --}}
    {{-- <div class="row justify-content-center"> --}}
        {{-- <div class="col-md-8"> --}}
            {{-- <div class="card"> --}}
                {{-- <div class="card-header">Dashboard</div> --}}
                {{-- <div class="card-body"> --}}
                    {{-- @if (session('status')) --}}
                    {{-- <div class="alert alert-success" role="alert"> --}}
                        {{-- {{ session('status') }} --}}
                        {{-- </div> --}}
                    {{-- @endif --}}
                    {{-- You are logged in! --}}
                    {{-- </div> --}}
                {{-- </div> --}}
            {{-- </div> --}}
        {{-- </div> --}}
    {{-- </div> --}}
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-widget14">
                <div class="kt-widget14__header">
                    <h3 class="kt-widget14__title">
                        Statistik
                    </h3>
                    <span class="kt-widget14__desc">
                        Pemilihan
                    </span>
                </div>
                <div class="kt-widget14__content">
                    <div class="flex mr-5">
                        <h4 class="wiheight">
                            PEMIRA 2022
                        </h4>
                        <hr>
                        <h6>
                            Jumlah Hak Pilih
                        </h6>
                        <h3>
                            {{ $member_count }}
                        </h3>
                        <h6>
                            Jumlah Hak Pilih Terpakai
                        </h6>
                        <h3>
                            {{ $voting_count }} ({{ sprintf('%.2f%%', ($voting_count / ($member_count ?: 1)) * 100) }})
                        </h3>
                        <h6>
                            Jumlah Hak Pilih Tidak Terpakai
                        </h6>
                        <h3>
                            {{ $member_count - $voting_count }} ({{ sprintf('%.2f%%', (($member_count - $voting_count) /
                            ($member_count ?: 1)) * 100) }})
                        </h3>

                    </div>
                    @foreach ($member_count_2 as $key => $item)
                    <div class="flex mr-5">
                        <h4 class="wiheight">
                            Suksesi {{ $key }}
                        </h4>
                        <hr>
                        <h6>
                            Jumlah Hak Pilih
                        </h6>
                        <h3>
                            {{ $item }}
                        </h3>
                        <h6>
                            Jumlah Hak Pilih Terpakai
                        </h6>
                        <h3>
                            @php $votinCounthim = isset($voting_count_2[$key]) ? $voting_count_2[$key] : 0; @endphp
                            {{ $votinCounthim }} ({{ sprintf('%.2f%%', ($votinCounthim / ($item ?: 1)) * 100) }})
                        </h3>
                        <h6>
                            Jumlah Hak Pilih Tidak Terpakai
                        </h6>
                        <h3>
                            {{ $item - $votinCounthim }} ({{ sprintf('%.2f%%', (($item - $votinCounthim) / ($item ?: 1))
                            * 100) }})
                        </h3>

                    </div>
                    @endforeach

                </div>
                <div class="kt-widget14__content" style="margin-top:50px !important;">
                    <div class="flex mr-5" style="color:white !important;">
                        <h4 class="wiheight">
                            PEMIRA 2022
                        </h4>
                        <hr style="border-top: none !important;">
                        <h6>
                            Jumlah Hak Pilih
                        </h6>
                        <h3>
                            {{ $member_count }}
                        </h3>
                        <h6>
                            Jumlah Hak Pilih Terpakai
                        </h6>
                        <h3>
                            {{ $voting_count }} ({{ sprintf('%.2f%%', ($voting_count / ($member_count ?: 1)) * 100) }})
                        </h3>
                        <h6>
                            Jumlah Hak Pilih Tidak Terpakai
                        </h6>
                        <h3>
                            {{ $member_count - $voting_count }} ({{ sprintf('%.2f%%', (($member_count - $voting_count) /
                            ($member_count ?: 1)) * 100) }})
                        </h3>

                    </div>
                    @foreach ($member_count_3 as $key => $item)
                    <div class="flex mr-5">
                        <h4 class="wiheight">
                            Senator {{ $key }}
                        </h4>
                        <hr>
                        <h6>
                            Jumlah Hak Pilih
                        </h6>
                        <h3>
                            {{ $item }}
                        </h3>
                        <h6>
                            Jumlah Hak Pilih Terpakai
                        </h6>
                        <h3>
                            @php $votinCounthim = isset($voting_count_3[$key]) ? $voting_count_3[$key] : 0; @endphp
                            {{ $votinCounthim }} ({{ sprintf('%.2f%%', ($votinCounthim / ($item ?: 1)) * 100) }})
                        </h3>
                        <h6>
                            Jumlah Hak Pilih Tidak Terpakai
                        </h6>
                        <h3>
                            {{ $item - $votinCounthim }} ({{ sprintf('%.2f%%', (($item - $votinCounthim) / ($item ?: 1))
                            * 100) }})
                        </h3>

                    </div>
                    @endforeach
                </div>


            </div>
        </div>
    </div>
    @if ($time_end)
    <div class="col-xl-12 col-lg-12">
        <!--begin:: Widgets/Best Sellers-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Rekapitulasi Pemilihan BEM FEB UNDIP 2023
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-widget5">
                    @foreach ($candidates1 as $item)
                    <div class="kt-widget5__item">
                        <div class="kt-widget5__content">
                            <div class="kt-widget5__pic">
                                <img class="kt-widget7__img" src="{{ $item->image }}" alt="">
                                @if ($item->image_vice)
                                <img class="kt-widget7__img" src="{{ $item->image_vice }}" alt="">
                                @endif
                            </div>
                            <div class="kt-widget5__section">
                                <h5 class="kt-widget5__title text-muted font-weight-light">Nomor : {{ $item->number }}
                                </h5>
                                <strong class="kt-widget5__desc font-weight-bold">{{ $item->name }}</strong>
                            </div>
                        </div>
                        <div class="kt-widget5__content">
                            <div class="kt-widget5__stats">
                                <span class="kt-widget5__number text-info text-center">{{ count($item->voting1) }} ({{
                                    sprintf('%.2f%%', (count($item->voting1) / ($voting_count ?: 1)) * 100) }})</span>
                                <span class="kt-widget5__votes">suara</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--end:: Widgets/Best Sellers-->
    </div>

    {{-- Suksesi Himpunan --}}
    <h4>Suksesi Himpunan</h4>
    @foreach ($candidates2 as $jurusan => $collection)
    <div class="col-xl-6 col-lg-6 col-md-6">
        <!--begin:: Widgets/Best Sellers-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Rekapitulasi Pemilihan pada Jurusan {{ $jurusan }}
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-widget5">
                    @foreach ($collection as $item)
                    <div class="kt-widget5__item">
                        <div class="kt-widget5__content">
                            <div class="kt-widget5__pic">
                                <img class="kt-widget7__img" src="{{ $item->image }}" alt="">
                                @if ($item->image_vice)
                                <img class="kt-widget7__img" src="{{ $item->image_vice }}" alt="">
                                @endif
                            </div>
                            <div class="kt-widget5__section">
                                <h5 class="kt-widget5__title text-muted font-weight-light">Nomor : {{ $item->number }}
                                </h5>
                                <strong class="kt-widget5__desc font-weight-bold">{{ $item->name }}</strong>
                            </div>
                        </div>
                        <div class="kt-widget5__content">
                            <div class="kt-widget5__stats">
                                @php $votingCount = isset($voting_count_2[$jurusan]) ? $voting_count_2[$jurusan] : 1;
                                @endphp
                                <span class="kt-widget5__number text-info text-center">{{ count($item->voting2) }} ({{
                                    sprintf('%.2f%%', (count($item->voting2) / ($votingCount ?: 1)) * 100) }})</span>
                                <span class="kt-widget5__votes">suara</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--end:: Widgets/Best Sellers-->
    </div>
    @endforeach
    {{-- End of Suksesi Himpunant --}}


    @endif
    @if (!$time_end)
    <div class="col-xl-12 col-lg-12">

        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-widget14">
                Rekapitulasi Perhitungan Suara dinonaktifkan hingga waktu pemilihan selesai.
            </div>
        </div>

    </div>
    @endif
    @endsection

    @section('extraJs')
    <script src="{{ asset('js/dashboard.js?v2') }}" type="text/javascript"></script>
    <script>
        const ChartCandidate = '{{ route('backend.chartCandidate') }}';
            const ChartCandidate2 = '{{ route('backend.chartCandidate2') }}';
            var setChartSt = function(chartId, data) {
                if ($('#' + chartId).length == 0) {
                    return;
                }
                let colors = [];
                for (let i = 0; i < data.length; i++) {
                    let modulus = i % 5;
                    if (modulus == 0) {
                        colors.push(KTApp.getStateColor('success'));
                    } else if (modulus == 1) {
                        colors.push(KTApp.getStateColor('danger'));
                    } else if (modulus == 2) {
                        colors.push(KTApp.getStateColor('warning'));
                    } else if (modulus == 3) {
                        colors.push('#7D3C98');
                    } else {
                        colors.push(KTApp.getStateColor('brand'));
                    }
                }

                Morris.Donut({
                    element: chartId,
                    data: data,
                    colors: colors,
                });
            }
            jQuery(document).ready(function() {
                @if (\Carbon\Carbon::now()->gt(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2021-01-11 22:00:00')))
                    $.get(ChartCandidate).then(function(response) {
                        let data = response.data;
                        setChartSt('kt_chart_revenue_change', data);
                    });
                    $.get(ChartCandidate2).then(function(response) {
                        let data = response.data;
                        setChartSt('kt_chart_revenue_change2', data);
                    });
                @endif

                // $.get(ChartVoting).then(function (response) {
                //     let data = response.data;

                //     var speedCanvas = $('#canvas');
                //     const windowWidth = $(window).width();
                //     if(windowWidth < 480) {
                //         speedCanvas.attr('height', 640);
                //     }
                //     Chart.defaults.global.defaultFontSize = 12;

                //     datasets = [];
                //     dataSums = [];
                //     const datas = data.data;
                //     for (let i = 0; i < datas.length; i++) {
                //         let modulus = i%5;
                //         let color = '';
                //         if(modulus == 0) {
                //             color = KTApp.getStateColor('success');
                //         } else if(modulus == 1) {
                //             color = KTApp.getStateColor('danger');
                //         } else if(modulus == 2) {
                //             color = KTApp.getStateColor('warning');
                //         } else if(modulus == 3) {
                //             color = '#7D3C98';
                //         } else {
                //             color = KTApp.getStateColor('brand');
                //         }
                //         // if(i == datas.length - 1) {
                //         //     color = '#67e4ff';
                //         // }
                //         dataset = {
                //             data: datas[i].data,
                //             label: datas[i].label,
                //             // lineTension: 0,
                //             // fill: true,
                //             // borderColor: color,
                //             // borderWidth: 2,
                //             // pointBackgroundColor: 'white',
                //             // pointBorderColor: color,
                //             backgroundColor: color
                //         };
                //         datasets.push(dataset);
                //     }

                //     var speedData = {
                //         labels: data.label,
                //         datasets: datasets
                //     };

                //     var chartOptions = {
                //         legend: {
                //             display: true,
                //             position: windowWidth < 480 ? 'bottom' :'left',
                //             labels: {
                //                 boxWidth: 10,
                //                 fontColor: 'black'
                //             },
                //             responsive: true,
                //             reverse: false
                //         },
                //         cutoutPercentage: 70,
                //         tooltips: {
                //             mode: 'label',
                //             callbacks: {
                //                 label: function(tooltipItem, data) {
                //                     var corporation = data.datasets[tooltipItem.datasetIndex].label;
                //                     var valor = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                //                     var total = 0;
                //                     for (var i = 0; i < data.datasets.length; i++)
                //                         total += data.datasets[i].data[tooltipItem.index];
                //                     if (tooltipItem.datasetIndex != data.datasets.length - 1) {
                //                         return corporation + " : " + valor.toFixed(0);
                //                     } else {
                //                         return [corporation + " : " + valor.toFixed(0), "Total : " + total];
                //                     }
                //                 }
                //             },
                //         },
                //         // responsive: false,
                //         // maintainAspectRatio: false,
                //         scales: {
                //             // xAxes: [{
                //             //     stacked: true,
                //             // }],
                //             // yAxes: [{
                //             //     stacked: true,
                //             // }]
                //         }
                //     };

                //     var lineChart = new Chart(speedCanvas, {
                //         type: 'bar',
                //         data: speedData,
                //         options: chartOptions
                //     });
                // });
            });
    </script>
    @endsection