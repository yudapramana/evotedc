<?php $__env->startSection('content'); ?>

<style>
    .wiheight {
        height: 50px !important;
    }
</style>

    
        
            
                
                
                    
                    
                        
                        
                    
                    
                    
                
            
        
    
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-widget14">
                <div class="kt-widget14__header">
                    <span class="kt-widget14__title">
                        Statistik
                    </span>
                    <span class="kt-widget14__desc">
                        Pemilihan
                    </span>

                    <a class="btn btn-label-primary btn-bold  btn-icon-h kt-margin-l-10"
                        href="/dashboard/voting/generate">Unduh Excel Rekapitulasi Voters</a>

                </div>
                <div class="kt-widget14__content">
                    <div class="flex mr-5">
                        <h4 class="wiheight">
                            PEMIRA 2023
                        </h4>
                        <hr>
                        <h6>
                            Jumlah Hak Pilih
                        </h6>
                        <h3>
                            <?php echo e($member_count); ?>

                        </h3>
                        <h6>
                            Jumlah Hak Pilih Terpakai
                        </h6>
                        <h3>
                            <?php echo e($voting_count); ?> (<?php echo e(sprintf('%.2f%%', ($voting_count / ($member_count ?: 1)) * 100)); ?>)
                        </h3>
                        <h6>
                            Jumlah Hak Pilih Tidak Terpakai
                        </h6>
                        <h3>
                            <?php echo e($member_count - $voting_count); ?> (<?php echo e(sprintf('%.2f%%', (($member_count - $voting_count) /
                            ($member_count ?: 1)) * 100)); ?>)
                        </h3>

                    </div>
                    <?php $__currentLoopData = $member_count_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex mr-5">
                        <h4 class="wiheight">
                            Suksesi <?php echo e($key); ?>

                        </h4>
                        <hr>
                        <h6>
                            Jumlah Hak Pilih
                        </h6>
                        <h3>
                            <?php echo e($item); ?>

                        </h3>
                        <h6>
                            Jumlah Hak Pilih Terpakai
                        </h6>
                        <h3>
                            <?php $votinCounthim = isset($voting_count_2[$key]) ? $voting_count_2[$key] : 0; ?>
                            <?php echo e($votinCounthim); ?> (<?php echo e(sprintf('%.2f%%', ($votinCounthim / ($item ?: 1)) * 100)); ?>)
                        </h3>
                        <h6>
                            Jumlah Hak Pilih Tidak Terpakai
                        </h6>
                        <h3>
                            <?php echo e($item - $votinCounthim); ?> (<?php echo e(sprintf('%.2f%%', (($item - $votinCounthim) / ($item ?: 1))
                            * 100)); ?>)
                        </h3>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <div class="kt-widget14__content" style="margin-top:50px !important;">
                    <div class="flex mr-5" style="color:white !important;">
                        <h4 class="wiheight">
                            PEMIRA 2023
                        </h4>
                        <hr style="border-top: none !important;">
                        <h6>
                            Jumlah Hak Pilih
                        </h6>
                        <h3>
                            <?php echo e($member_count); ?>

                        </h3>
                        <h6>
                            Jumlah Hak Pilih Terpakai
                        </h6>
                        <h3>
                            <?php echo e($voting_count); ?> (<?php echo e(sprintf('%.2f%%', ($voting_count / ($member_count ?: 1)) * 100)); ?>)
                        </h3>
                        <h6>
                            Jumlah Hak Pilih Tidak Terpakai
                        </h6>
                        <h3>
                            <?php echo e($member_count - $voting_count); ?> (<?php echo e(sprintf('%.2f%%', (($member_count - $voting_count) /
                            ($member_count ?: 1)) * 100)); ?>)
                        </h3>

                    </div>
                    <?php $__currentLoopData = $member_count_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex mr-5">
                        <h4 class="wiheight">
                            Senator <?php echo e($key); ?>

                        </h4>
                        <hr>
                        <h6>
                            Jumlah Hak Pilih
                        </h6>
                        <h3>
                            <?php echo e($item); ?>

                        </h3>
                        <h6>
                            Jumlah Hak Pilih Terpakai
                        </h6>
                        <h3>
                            <?php $votinCountsen = isset($voting_count_3[$key]) ? $voting_count_3[$key] : 0; ?>
                            <?php echo e($votinCountsen); ?> (<?php echo e(sprintf('%.2f%%', ($votinCountsen / ($item ?: 1)) * 100)); ?>)
                        </h3>
                        <h6>
                            Jumlah Hak Pilih Tidak Terpakai
                        </h6>
                        <h3>
                            <?php echo e($item - $votinCountsen); ?> (<?php echo e(sprintf('%.2f%%', (($item - $votinCountsen) / ($item ?: 1))
                            * 100)); ?>)
                        </h3>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>


            </div>
        </div>
    </div>
    <?php if($time_end): ?>
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
                    <?php $__currentLoopData = $candidates1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="kt-widget5__item">
                        <div class="kt-widget5__content">
                            <div class="kt-widget5__pic">
                                <img class="kt-widget7__img" src="<?php echo e($item->image); ?>" alt="">
                                <?php if($item->image_vice): ?>
                                <img class="kt-widget7__img" src="<?php echo e($item->image_vice); ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="kt-widget5__section">
                                <h5 class="kt-widget5__title text-muted font-weight-light">Nomor : <?php echo e($item->number); ?>

                                </h5>
                                <strong class="kt-widget5__desc font-weight-bold"><?php echo e($item->name); ?></strong>
                            </div>
                        </div>
                        <div class="kt-widget5__content">
                            <div class="kt-widget5__stats">
                                <span class="kt-widget5__number text-info text-center"><?php echo e(count($item->voting1)); ?> (<?php echo e(sprintf('%.2f%%', (count($item->voting1) / ($voting_count ?: 1)) * 100)); ?>)</span>
                                <span class="kt-widget5__votes">suara</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Best Sellers-->
    </div>

    
    <div class="col-xl-12 col-lg-12">
        <h4>Suksesi Himpunan</h4>
    </div>
    <?php $__currentLoopData = $candidates2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jurusan => $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-xl-6 col-lg-6 col-md-6">
        <!--begin:: Widgets/Best Sellers-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Rekapitulasi Pemilihan pada Jurusan <?php echo e($jurusan); ?>

                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-widget5">
                    <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="kt-widget5__item">
                        <div class="kt-widget5__content">
                            <div class="kt-widget5__pic">
                                <img class="kt-widget7__img" src="<?php echo e($item->image); ?>" alt="">
                                <?php if($item->image_vice): ?>
                                <img class="kt-widget7__img" src="<?php echo e($item->image_vice); ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="kt-widget5__section">
                                <h5 class="kt-widget5__title text-muted font-weight-light">Nomor : <?php echo e($item->number); ?>

                                </h5>
                                <strong class="kt-widget5__desc font-weight-bold"><?php echo e($item->name); ?></strong>
                            </div>
                        </div>
                        <div class="kt-widget5__content">
                            <div class="kt-widget5__stats">
                                <?php $votingCount = isset($voting_count_2[$jurusan]) ? $voting_count_2[$jurusan] : 1;
                                ?>
                                <span class="kt-widget5__number text-info text-center"><?php echo e(count($item->voting2)); ?> (<?php echo e(sprintf('%.2f%%', (count($item->voting2) / ($votingCount ?: 1)) * 100)); ?>)</span>
                                <span class="kt-widget5__votes">suara</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Best Sellers-->
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

    
    <div class="col-xl-12 col-lg-12">
        <h4>Pemilihan Senator</h4>
    </div>
    <?php $__currentLoopData = $candidates3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jurusan => $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-xl-6 col-lg-6 col-md-6">
        <!--begin:: Widgets/Best Sellers-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Rekapitulasi Pemilihan pada Jurusan <?php echo e($jurusan); ?>

                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-widget5">
                    <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="kt-widget5__item">
                        <div class="kt-widget5__content">
                            <div class="kt-widget5__pic">
                                <img class="kt-widget7__img" src="<?php echo e($item->image); ?>" alt="">
                                <?php if($item->image_vice): ?>
                                <img class="kt-widget7__img" src="<?php echo e($item->image_vice); ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="kt-widget5__section">
                                <h5 class="kt-widget5__title text-muted font-weight-light">Nomor : <?php echo e($item->number); ?>

                                </h5>
                                <strong class="kt-widget5__desc font-weight-bold"><?php echo e($item->name); ?></strong>
                            </div>
                        </div>
                        <div class="kt-widget5__content">
                            <div class="kt-widget5__stats">
                                <?php $votingCount = isset($voting_count_3[$jurusan]) ? $voting_count_3[$jurusan] : 1;
                                ?>
                                <span class="kt-widget5__number text-info text-center"><?php echo e(count($item->voting3)); ?> (<?php echo e(sprintf('%.2f%%', (count($item->voting3) / ($votingCount ?: 1)) * 100)); ?>)</span>
                                <span class="kt-widget5__votes">suara</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Best Sellers-->
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    


    <?php endif; ?>
    <?php if(!$time_end): ?>
    <div class="col-xl-12 col-lg-12">

        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-widget14">
                Rekapitulasi Perhitungan Suara dinonaktifkan hingga waktu pemilihan selesai.
            </div>
        </div>

    </div>
    <?php endif; ?>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('extraJs'); ?>
    <script src="<?php echo e(asset('js/dashboard.js?v2')); ?>" type="text/javascript"></script>
    <script>
        const ChartCandidate = '<?php echo e(route('backend.chartCandidate')); ?>';
            const ChartCandidate2 = '<?php echo e(route('backend.chartCandidate2')); ?>';
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
                <?php if(\Carbon\Carbon::now()->gt(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2021-01-11 22:00:00'))): ?>
                    $.get(ChartCandidate).then(function(response) {
                        let data = response.data;
                        setChartSt('kt_chart_revenue_change', data);
                    });
                    $.get(ChartCandidate2).then(function(response) {
                        let data = response.data;
                        setChartSt('kt_chart_revenue_change2', data);
                    });
                <?php endif; ?>

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
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\evote\resources\views/backend/home/index.blade.php ENDPATH**/ ?>