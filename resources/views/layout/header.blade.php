<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">This Is Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link {{ Request::is('employee*') ? 'active' : '' }}" href="/employee">Employee</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ Request::is('report/status*') ? 'active' : '' }}" href="/report/status">Status</a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ Request::is('report/summary*') ? 'active' : '' }}" href="/report/summary">Summary</a>
          </li>
      </ul>      
        <div class="collapse navbar-collapse justify-content-end">
            <h5>{{Auth::user()->username}} | {{Auth::user()->level}}</h5>
            <a href="/logout"><button type="button" class="btn btn-danger ms-2">Logout</button></a>
        </div>
      </div>
    </div>
  </nav>