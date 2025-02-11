<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report - Summary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @include('layout.header')
    <div class="container-fluid">
        <div class="container mt-5" style="width: 50%">
            <h2 class="mb-3">Status Employee Summary</h2>
            <table class="table table-striped table-hover text-center">
                <thead>
                    <th scope="col">Status</th>
                    <th scope="col">Total Employee</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Contract</td>
                        <td>{{$contract == 0 ? '' : $contract}}</td>
                    </tr>
                    <tr>
                        <td>Employee</td>
                        <td>{{$employee == 0 ? '' : $employee}}</td>
                    </tr>
                    <tr>
                        <td>Not Active</td>
                        <td>{{$not_active == 0 ? '' : $not_active }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Grand Total</td>
                        <td scope="col">{{$total == 0 ? '' : $total}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>