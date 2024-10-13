<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid justify-content-center">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto text-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/index">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/index">Men</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/index">Women</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/aboutus">About Us</a>
          </li>



        </ul>
        <form class="d-flex" role="search" action="{{ url('/list') }}" method="GET">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
