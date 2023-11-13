@extends('frontend.layouts.app')
@section('content')
    <div class="container m-auto mt-24 md:mt-18">
    @if(false)
        <div class="md:flex mb-4">
            <div class="card w-full bg-white mr-4 md:mb-0 mb-4">
                <div class="pl-4 pt-4">
                    <p class="text-xs font-bold">Statistik</p>
                    <p class="text-xs">Perolehan suara</p>
                </div>
                <div id="kt_chart_revenue_change" class="w-1/2 h-64 m-auto"></div>
                <div class="pl-4 pr-4 pb-4 flex flex-wrap">
                    @foreach($candidates as $key => $item)
                        <div class="flex items-center text-xs px-1">
                            @php($modulus = $key%5)
                            @if($modulus == 0)
                                <div class="rounded-full w-6 h-2 mr-2" style="background-color: #0abb87">&nbsp;</div>
                            @elseif($modulus == 1)
                                <div class="rounded-full w-6 h-2 mr-2" style="background-color: #fd397a">&nbsp;</div>
                            @elseif($modulus == 2)
                                <div class="rounded-full w-6 h-2 mr-2" style="background-color: #ffb822">&nbsp;</div>
                            @elseif($modulus == 3)
                                <div class="rounded-full w-6 h-2 mr-2" style="background-color: #7D3C98">&nbsp;</div>
                            @else
                                <div class="rounded-full w-6 h-2 mr-2" style="background-color: #5578eb">&nbsp;</div>
                            @endif
                            <span class="kt-widget14__stats">{{ $item->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card w-full bg-white mr-4 p-4 mb-4">
            <div class="mb-2">
                <p class="text-xs font-bold">Suara Masuk</p>
                <p class="text-xs">setaip harinya</p>
            </div>
            <canvas id="canvas" width="588" height="160" style="max-height: 322px;!important;"></canvas>
        </div>

        <div class="card w-full bg-white mr-4">
            <div class="px-6 border-b py-4">
                <div class="text-md font-semibold">Rekapitulasi Perolehan Suara Pemilu</div>
            </div>
            <div class="px-6 py-4">
                <div>
                    @foreach($candidates as $item)
                        <div class="flex py-2 border-b-2 border-dashed text-gray-800 w-full">
                            <img class="rounded w-20" src="{{ $item->image }}" alt="">
                            <div class="px-2">
                                <h5 class="text-sm">Nomor : {{ $item->number }}</h5>
                                <strong class="text-sm">{{ $item->name }}</strong>
                            </div>
                            <div class="ml-auto text-md">
                                <p class="font-semibold text-blue-600">{{ count($item->voting) }}</p>
                                <span class="text-xs">suara</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endif
        <div class="text-center mt-10">
            <p data-aos="fade-up">Perhatian<br>Hasil Perolehan suara akan ditampilkan setelah proses pemungutan suara selesai.</p>
        </div>

    </div>
@endsection

@section('extraCss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
@endsection
@section('extraJs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <script>
        const ChartMemberByState = '{{ route('home.chartMemberByState') }}';
        const ChartCandidate = '{{ route('home.chartCandidate') }}';
        const ChartVoting = '{{ route('home.chartVoteByDay') }}';

        jQuery(document).ready(function() {
            $.get(ChartMemberByState).then(function (response) {
                let data = response.data;
                setChart(data.state_label, data.state_member, data.state_voting);
            });
            $.get(ChartCandidate).then(function (response) {
                let data = response.data;
                setChartStatistic(data);
            });

            $.get(ChartVoting).then(function (response) {
                let data = response.data;

                var speedCanvas = $('#canvas');
                const windowWidth = $(window).width();
                if(windowWidth < 480) {
                    speedCanvas.attr('height', 640);
                }
                Chart.defaults.global.defaultFontSize = 12;

                datasets = [];
                dataSums = [];
                const datas = data.data;
                for (let i = 0; i < datas.length; i++) {
                    let modulus = i%5;
                    let color = '';
                    if(modulus == 0) {
                        color = '#0abb87';
                    } else if(modulus == 1) {
                        color = '#fd397a';
                    } else if(modulus == 2) {
                        color = '#ffb822';
                    } else if(modulus == 3) {
                        color = '#7D3C98';
                    } else {
                        color = '#5578eb';
                    }
                    // if(i == datas.length - 1) {
                    //     color = '#67e4ff';
                    // }
                    dataset = {
                        data: datas[i].data,
                        label: datas[i].label,
                        // lineTension: 0,
                        // fill: true,
                        // borderColor: color,
                        // borderWidth: 2,
                        // pointBackgroundColor: 'white',
                        // pointBorderColor: color,
                        backgroundColor: color
                    };
                    datasets.push(dataset);
                }

                var speedData = {
                    labels: data.label,
                    datasets: datasets
                };

                var chartOptions = {
                    legend: {
                        display: true,
                        position: windowWidth < 480 ? 'bottom' :'left',
                        labels: {
                            boxWidth: 10,
                            fontColor: 'black'
                        },
                        responsive: true,
                        reverse: false
                    },
                    cutoutPercentage: 70,
                    tooltips: {
                        mode: 'label',
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var corporation = data.datasets[tooltipItem.datasetIndex].label;
                                var valor = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                var total = 0;
                                for (var i = 0; i < data.datasets.length; i++)
                                    total += data.datasets[i].data[tooltipItem.index];
                                if (tooltipItem.datasetIndex != data.datasets.length - 1) {
                                    return corporation + " : " + valor.toFixed(0);
                                } else {
                                    return [corporation + " : " + valor.toFixed(0), "Total : " + total];
                                }
                            }
                        },
                    },
                    // responsive: false,
                    // maintainAspectRatio: false,
                    scales: {
                        // xAxes: [{
                        //     stacked: true,
                        // }],
                        // yAxes: [{
                        //     stacked: true,
                        // }]
                    }
                };

                var lineChart = new Chart(speedCanvas, {
                    type: 'bar',
                    data: speedData,
                    options: chartOptions
                });
            });
        });

        var setChartStatistic = function(data) {

            let colors = [];
            for (let i = 0; i < data.length; i++) {
                let modulus = i%5;
                if(modulus == 0) {
                    colors.push('#0abb87');
                } else if(modulus == 1) {
                    colors.push('#fd397a');
                } else if(modulus == 2) {
                    colors.push('#ffb822');
                } else if(modulus == 3) {
                    colors.push('#7D3C98');
                } else {
                    colors.push('#5578eb');
                }
            }

            let browsersChart = Morris.Donut({
                element: 'kt_chart_revenue_change',
                data: data,
                colors: colors,
            });
        }

        function setChart(label_state, count_member, count_voting) {
            var chartContainer = document.getElementById('myChart');

            var chartData = {
                labels: label_state,
                datasets: [
                    {
                        label: 'Jumlah Suara',
                        backgroundColor: '#28B463',
                        data: count_voting
                    },
                    {
                    label: 'Jumlah Alumni',
                    backgroundColor: '#ffb400',
                    data: count_member
                }]
            };

            var chart = new Chart(chartContainer, {
                type: 'bar',
                data: chartData,
                options: {
                    title: {
                        display: true,
                    },
                    tooltips: {
                        intersect: false,
                        mode: 'nearest',
                        xPadding: 10,
                        yPadding: 10,
                        caretPadding: 10
                    },
                    legend: {
                        display: false
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    barRadius: 4,
                    scales: {
                        xAxes: [{
                            display: false,
                            gridLines: false,
                            stacked: true,
                        }],
                        yAxes: [{
                            display: false,
                            stacked: true,
                            gridLines: false
                        }]
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0
                        }
                    }
                }
            });
        }
    </script>
@endsection

