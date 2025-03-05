<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee - Read</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @include('layout.header')
    <div class="container-fluid">
        <div class="container">
          <div class="row gap-3 text-white my-3">
            <!-- Employee Count Card -->
            <div class="col-md-3 bg-secondary rounded p-4 shadow d-flex align-items-center">
                <div class="me-3">
                    <i class="ri-user-line fs-3"></i>
                </div>
                <div>
                    <h5 class="mb-0">Employees</h5>
                    <h3>{{ $employeeCount }}</h3>
                </div>
            </div>
        
            <!-- Department Count Card -->
            <div class="col-md-3 bg-primary rounded p-4 shadow d-flex align-items-center">
                <div class="me-3">
                    <i class="ri-building-line fs-3"></i>
                </div>
                <div>
                    <h5 class="mb-0">Departments</h5>
                    <h3>{{ $departmentCount }}</h3>
                </div>
            </div>
        
            <!-- Contract Status Card -->
            <div class="col-md-5 bg-danger rounded p-4 shadow">
                <h5 class="mb-3">Employee Status</h5>
                <div class="d-flex justify-content-between">
                    <div class="text-center">
                        <i class="ri-shake-hands-line fs-3"></i>
                        <h6>Contract</h6>
                        <h4>{{ $contract }}</h4>
                    </div>
                    <div class="text-center">
                        <i class="ri-briefcase-line fs-3"></i>
                        <h6>Permanent</h6>
                        <h4>{{ $employee1 }}</h4>
                    </div>
                    <div class="text-center">
                        <i class="ri-close-large-fill fs-3"></i>
                        <h6>Inactive</h6>
                        <h4>{{ $not_active }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
          
        </div>
        

            <h1 class="mb-4"> Employee Table</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}    
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}    
                </div>
            @endif
            @if (Auth::user()->level == 'admin')
            <a href="/employee/create"><button class="btn btn-primary">Add</button></a>
            @endif
            <table class="table table-striped table-hover text-center">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Gender</th>
                  <th>Address</th>
                  <th>DOB</th>
                  <th>Department</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  @if (Auth::user()->level == 'admin')
                    <th colspan="2">Action</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach ($employee as $e )
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$e->firstname}}</td>
                    <td>{{$e->lastname}}</td>
                    <td>{{$e->gender}}</td>
                    <td>{{$e->address}}</td>
                    <td>{{$e->DOB}}</td>
                    <td>{{$e->department->name}}</td>
                    <td>{{$e->status}}</td>
                    <td>{{$e->created_at}}</td>
                    <td>{{$e->updated_at}}</td>
                    @if (Auth::user()->level == 'admin')
                      <td>
                        <a href="{{route('employee.edit', $e->id)}}">
                          <button class="btn btn-warning">Edit</button>
                        </a>
                      </td>
                      
                      <td>
                          <form action="{{route('employee.delete', $e->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>    
                        </form>
                      </td>
                    @endif                      
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>