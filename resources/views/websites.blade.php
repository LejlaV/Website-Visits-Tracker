<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Website Visits Tracker</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
   
    <body class="antialiased">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <div class="container">
            <h1 class="text-center">Websites</h1>
            <form method="get" action="{{ url('/') }}" class="mt-20">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="startDateTime">Start Date and Time</label>
                            <input type="datetime-local" class="form-control" id="startDateTime" name="startDateTime" value="{{ request()->input('startDateTime', '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="endDateTime">End Date and Time</label>
                            <input type="datetime-local" class="form-control" id="endDateTime" name="endDateTime" value="{{ request()->input('endDateTime', '') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Hostname</th>
                        <th>Visits Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($websites as $website)
                    <tr>
                        <td>{{ $website->hostname }}</td>
                        <td>{{ $website->visits_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
