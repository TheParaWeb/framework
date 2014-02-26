$(function () {

    function showChart(chart) {
        var months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');


        if (chart == '.para-analytics') {

            $.get('../admin/xhrGetPageStats', function (o) {
                var pageViews = [],
                    registeredUsers = [],
                    uniqueVisitors = [];

                for (var i = 0; i < 12; i++) {
                    var index=i+1;
                    pageViews[i] = o[index].pageViews;
                    registeredUsers[i] = o[index].registeredUsers;
                    uniqueVisitors[i] = o[index].uniqueVisitors;
                }

                $('.para-analytics').highcharts({
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Para Analytics'
                    },
                    xAxis: {
                        categories: months
                    },
                    yAxis: {
                        title: {
                            text: ''
                        },
                        allowDecimals: false,
                        min: 0
                    },
                    series: [
                        {
                            name: 'Page Views',
                            data: pageViews
                        },
                        {
                            name: 'Unique Users',
                            data: uniqueVisitors
                        },
                        {
                            name: 'Registered Users',
                            data: registeredUsers
                        }
                    ]
                });
            },'json');
        }

        if (chart == '.school-stats') {


            $.get('../admin/xhrGetQuizStats', function (o) {
                var schools = [],
                    students = [],
                    completedQuizzes = [];
                for (var i = 0; i < o.length; i++) {
                    schools[i] = o[i].school;
                    students[i] = o[i].students;
                    completedQuizzes[i] = o[i].completedQuizzes;
                }
                console.log(schools);
                console.log(students);
                console.log(completedQuizzes);

                $('.school-stats').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Quiz Statistics'
                    },
                    xAxis: {
                        categories: schools,
                        labels: {
                            style: {
                                display: 'none'
                            }
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Participation'
                        },
                        allowDecimals: false
                    },
                    series: [
                        {
                            name: 'Completed Quizzes',
                            data: completedQuizzes
                        },
                        {
                            name: 'Students',
                            data: students
                        }
                    ]
                });

                //console.log(o);
            }, 'json');


        }

        if (chart == '.salary-stats') {

            $.get('../admin/xhrGetSalaryStats', function (o) {
                console.log(o);


                $('.salary-stats').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: 'Average Salary Demographics'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                color: '#000000',
                                connectorColor: '#000000',
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Browser share',
                        data: [
                            ['$150,000 +',   o['150']],
                            ['$125,000 - $150,000',      o['125']],
                            ['$100,000 - $125,000',       o['100']],
                            ['$75,000 - $100,000',       o['75']],
                            ['$50,000 - $75,000',       o['50']],
                            ['$40,000 - $50,000',       o['40']]
                        ]
                    }]
                });


            }, 'json');
        }

    }

    showChart('.para-analytics');
    $('.chart').hide();
    $('.para-analytics').show();
    $('.analytics').click(function () {
        var id = "." + $(this).attr('rel');
        $('.chart').hide();
        $(id).show();
        showChart(id);
        return false;
    });


});
