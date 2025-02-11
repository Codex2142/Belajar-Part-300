<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report - Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @include('layout.header')
    <div class="container-fluid">
        <div class="container mt-5">
            <h2 class="mb-3">Status Employee per Department</h2>
            <table class="table table-striped table-hover text-center">
                <thead>
                    <th>DEPT</th>
                    <th>Contract</th>
                    <th>Employee</th>
                    <th>Not Active</th>
                    <th>Grand Total</th>
                </thead>
                <tbody>
                    @foreach ($show as $s )
                    <tr>
                        <td>{{$s->name}}</td>
                        <td>{{$employee->where('dept_id', $s->id)->where('status', 'cont')->count() == 0 ? '' : $employee->where('dept_id', $s->id)->where('status', 'cont')->count()}}</td>
                        <td>{{$employee->where('dept_id', $s->id)->where('status', 'emp')->count() == 0 ? '' : $employee->where('dept_id', $s->id)->where('status', 'emp')->count()}}</td>
                        <td>{{$employee->where('dept_id', $s->id)->where('status', 'not_act')->count() == 0 ? '' : $employee->where('dept_id', $s->id)->where('status', 'not_act')->count()}}</td>
                        <td>{{$employee->where('dept_id', $s->id)->count() == 0 ? '' : $employee->where('dept_id', $s->id)->count()}}</td>
                    </tr>
                    @endforeach

                    <tr>
                        <td>Grand Total</td>
                        <td>{{$employee->where('status', 'cont')->count() == 0 ? '' : $employee->where('status', 'cont')->count()}}</td>
                        <td>{{$employee->where('status', 'emp')->count() == 0 ? '' : $employee->where('status', 'emp')->count()}}</td>
                        <td>{{$employee->where('status', 'not_act')->count() == 0 ? '' : $employee->where('status', 'not_act')->count()}}</td>
                        <td>{{$employee->count() == 0 ? '' : $employee->count()}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>