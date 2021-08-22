<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Public Holidays PDF - {{ $year ?? '' }}</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <tr>
                        <th class="text-center">
                            <h5 class="card-title">Public Holidays - {{ $year ?? '' }}</h5>
                        </th>
                    </tr>
                </table>
                <table class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th class="text-start">Day</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Month</th>
                        <th class="text-center">Year</th>
                    </tr>
                    @foreach ($public_holidays as $holiday)
                        <tr>
                            <td>{{ $holiday["ph_name"] }}</td>
                            <td class="text-start">{{ $holiday["ph_day_of_week"] }}</td>
                            <td class="text-center">{{ $holiday["ph_day"] }}</td>
                            <td class="text-center">{{ $holiday["ph_month"] }}</td>
                            <td class="text-center">{{ $holiday["ph_year"] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</html>

