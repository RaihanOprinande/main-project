<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid justify-content-center">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto text-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('sepatu.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('sepatu.kategori', ['kategori' => 'pria']) }}">Men</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('sepatu.kategori', ['kategori' => 'wanita']) }}">Women</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/aboutus">About Us</a>
          </li>



        </ul>
        <ul class="navbar-nav">
            <li class="nav-item px-3 ">
             <form action="/logout" method="POST">
                 @csrf
                 <button class="nav-link text-black" type="submit">Log Out</button>

             </form>

            </li>
           </ul>
        <form class="d-flex" role="search" action="{{ url('/list-search') }}" method="GET">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
