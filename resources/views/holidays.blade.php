<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Holidays - {{ $year }}</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card" style="margin-top: 15px;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsDNvQEI5_InacaBdXyGClXxQ_3KWIxna57A&usqp=CAU class="card-img-top" alt="South African Flag">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="card-title">Public Holidays - {{ $year }}</h5>
                            </div>
                            <div class="col-sm-6 text-end">
                                <a href="/holidays/download/{{$year}}" class="text-primary" target="_blank">
                                    Download as PDF
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
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
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

