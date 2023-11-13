"use strict";

// Class initialization on page load
var setChartVoting = function() {
    if (!KTUtil.getByID('kt_chart_profit_share')) {
        return;
    }

    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    35, 30, 35
                ],
                backgroundColor: [
                    KTApp.getStateColor('success'),
                    KTApp.getStateColor('danger'),
                    KTApp.getStateColor('brand')
                ]
            }],
            labels: [
                'Angular',
                'CSS',
                'HTML'
            ]
        },
        options: {
            cutoutPercentage: 75,
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
                position: 'top',
            },
            title: {
                display: false,
                text: 'Technology'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'nearest',
                bodySpacing: 5,
                yPadding: 10,
                xPadding: 10,
                caretPadding: 0,
                displayColors: false,
                backgroundColor: KTApp.getStateColor('brand'),
                titleFontColor: '#ffffff',
                cornerRadius: 4,
                footerSpacing: 0,
                titleSpacing: 0
            }
        }
    };

    var ctx = KTUtil.getByID('kt_chart_profit_share').getContext('2d');
    var myDoughnut = new Chart(ctx, config);
}

var setChartMemberByState = function(label_state, count_member, count_voting) {
    var chartContainer = KTUtil.getByID('kt_chart_daily_sales');

    if (!chartContainer) {
        return;
    }

    var chartData = {
        labels: label_state,
        datasets: [{
            // label: 'Jumlah Suara',
            backgroundColor: KTApp.getStateColor('success'),
            data: count_voting
        }, {
            // label: 'Jumlah Alumni',
            backgroundColor: '#dedee5',
            data: count_member
        }]
    };

    var chart = new Chart(chartContainer, {
        type: 'bar',
        data: chartData,
        options: {
            title: {
                display: false,
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

var setChartStatistic = function(data) {
    if ($('#kt_chart_revenue_change').length == 0) {
        return;
    }
    let colors = [];
    for (let i = 0; i < data.length; i++) {
        let modulus = i%5;
        if(modulus == 0) {
            colors.push(KTApp.getStateColor('success'));
        } else if(modulus == 1) {
            colors.push(KTApp.getStateColor('danger'));
        } else if(modulus == 2) {
            colors.push(KTApp.getStateColor('warning'));
        } else if(modulus == 3) {
            colors.push('#7D3C98');
        } else {
            colors.push(KTApp.getStateColor('brand'));
        }
    }

    Morris.Donut({
        element: 'kt_chart_revenue_change',
        data: data,
        colors: colors,
    });
}

var setChartStatistic2 = function(data) {
    if ($('#kt_chart_revenue_change2').length == 0) {
        return;
    }
    let colors = [];
    for (let i = 0; i < data.length; i++) {
        let modulus = i%5;
        if(modulus == 0) {
            colors.push(KTApp.getStateColor('success'));
        } else if(modulus == 1) {
            colors.push(KTApp.getStateColor('danger'));
        } else if(modulus == 2) {
            colors.push(KTApp.getStateColor('warning'));
        } else if(modulus == 3) {
            colors.push('#7D3C98');
        } else {
            colors.push(KTApp.getStateColor('brand'));
        }
    }

    Morris.Donut({
        element: 'kt_chart_revenue_change2',
        data: data,
        colors: colors,
    });
}