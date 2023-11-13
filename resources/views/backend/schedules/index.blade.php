<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">

    <style>
        .container {
            margin-top: 40px;
        }

        .btn-primary {
            width: 100%;
        }
    </style>
</head>

<body>


    @if (session()->has('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">Schedule of Event</div>
                    <div class="panel-body">

                        <form method="post" action="{{ route('schedule.update') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="schedule_id" id="schedule_id" value="{{ $schedule->id }}">
                                    <div class="form-group">
                                        <label class="control-label">Event Name</label>
                                        <input type="text" class="form-control" name="event" id="event" value="{{ $schedule->event }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Start Time</label>
                                        <div class='input-group date' id='starttimepicker'>
                                            <input type='text' class="form-control" name="start_time" id="start_time" value="{{ $schedule->start_time }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label class="control-label">End Time</label>
                                        <div class='input-group date' id='endtimepicker'>
                                            <input type='text' class="form-control" name="end_time" id="end_time" value="{{ $schedule->end_time }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://github.com/twbs/bootstrap/blob/main/dist/js/bootstrap.js"></script>
    <script>
        $(function() {
            $('#starttimepicker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
            });
            $('#endtimepicker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
            });
        });
    </script>
</body>

</html>
