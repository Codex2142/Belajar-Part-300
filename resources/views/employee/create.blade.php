<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee - Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @include('layout.header')
    <div class="container-fluid">
        <div class="container-md">
            <h1 class="mb-4"> Add Employee</h1>

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

            <form action="{{route('employee.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="firstname" class="form-label">Firstname</label>
                  <input type="text" class="form-control" id="firstname" name="firstname">
                </div>
                @error('firstname')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
                @error('lastname')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror


                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                        <label class="form-check-label" for="gender">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender" checked value="female">
                        <label class="form-check-label" for="gender">
                          Female
                        </label>
                      </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                @error('address')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <div class="mb-3">
                    <label for="dob" class="form-label">DOB</label>
                    <input type="date" class="form-control" id="dob" name="dob">
                </div>
                @error('dob')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <div class="mb-3">
                  <label for="department" class="form-label">Department</label>
                  <select class="form-select" aria-label="Default select example" id="dept_id" name="dept_id">
                    @foreach ($dept as $d )
                        <option value="{{$d->id}}">{{$d->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example" id="status" name="status">
                        <option value="cont">Contract</option>
                        <option value="emp">Employee</option>
                        <option value="not_act">Not Active</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success mb-4">Submit</button>
              </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>