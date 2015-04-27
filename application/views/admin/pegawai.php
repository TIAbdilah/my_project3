<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/tpl/headtag'); ?>
    </head>
    <body>
        <!-- navbar -->
        <?php $this->load->view('admin/tpl/navbar'); ?>
        <!-- /navbar -->
        <!-- main -->
        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div class="widget widget-table action-table">
                                <div class="widget-header"> <i class="icon-th-list"></i>
                                    <h3>A Table Example</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> Free Resource </th>
                                                <th> Download</th>
                                                <th class="td-actions"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> Fresh Web Development Resources </td>
                                                <td> http://www.egrappler.com/ </td>
                                                <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                            </tr>
                                            <tr>
                                                <td> Fresh Web Development Resources </td>
                                                <td> http://www.egrappler.com/ </td>
                                                <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                            </tr>
                                            <tr>
                                                <td> Fresh Web Development Resources </td>
                                                <td> http://www.egrappler.com/ </td>
                                                <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                            </tr>
                                            <tr>
                                                <td> Fresh Web Development Resources </td>
                                                <td> http://www.egrappler.com/ </td>
                                                <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                            </tr>
                                            <tr>
                                                <td> Fresh Web Development Resources </td>
                                                <td> http://www.egrappler.com/ </td>
                                                <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /widget-content --> 
                            </div>
                        </div>
                        <!-- /span12 --> 
                    </div>
                    <!-- /row --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /main-inner --> 
        </div>
        <!-- /main -->
        <!-- footer --> 
        <?php $this->load->view('admin/tpl/footer'); ?>
        <!-- /footer --> 
        <!-- Le javascript
        ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <script src="<?php echo base_url() . '/assets/' ?>js/jquery-1.7.2.min.js"></script> 
        <script src="<?php echo base_url() . '/assets/' ?>js/excanvas.min.js"></script> 
        <script src="<?php echo base_url() . '/assets/' ?>js/chart.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url() . '/assets/' ?>js/bootstrap.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url() . '/assets/' ?>js/full-calendar/fullcalendar.min.js"></script>

        <script src="js/base.js"></script> 
        <script>

            var lineChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        fillColor: "rgba(151,187,205,0.5)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                ]

            }

            var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


            var barChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        fillColor: "rgba(151,187,205,0.5)",
                        strokeColor: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                ]

            }

            $(document).ready(function () {
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end, allDay) {
                        var title = prompt('Event Title:');
                        if (title) {
                            calendar.fullCalendar('renderEvent',
                                    {
                                        title: title,
                                        start: start,
                                        end: end,
                                        allDay: allDay
                                    },
                            true // make the event "stick"
                                    );
                        }
                        calendar.fullCalendar('unselect');
                    },
                    editable: true,
                    events: [
                        {
                            title: 'All Day Event',
                            start: new Date(y, m, 1)
                        },
                        {
                            title: 'Long Event',
                            start: new Date(y, m, d + 5),
                            end: new Date(y, m, d + 7)
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: new Date(y, m, d - 3, 16, 0),
                            allDay: false
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: new Date(y, m, d + 4, 16, 0),
                            allDay: false
                        },
                        {
                            title: 'Meeting',
                            start: new Date(y, m, d, 10, 30),
                            allDay: false
                        },
                        {
                            title: 'Lunch',
                            start: new Date(y, m, d, 12, 0),
                            end: new Date(y, m, d, 14, 0),
                            allDay: false
                        },
                        {
                            title: 'Birthday Party',
                            start: new Date(y, m, d + 1, 19, 0),
                            end: new Date(y, m, d + 1, 22, 30),
                            allDay: false
                        },
                        {
                            title: 'EGrappler.com',
                            start: new Date(y, m, 28),
                            end: new Date(y, m, 29),
                            url: 'http://EGrappler.com/'
                        }
                    ]
                });
            });
        </script><!-- /Calendar -->
    </body>
</html>
