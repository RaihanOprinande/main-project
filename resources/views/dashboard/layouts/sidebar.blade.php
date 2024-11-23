<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard">
              <i class="bi bi-house-add-fill"></i>
              Dashboard
            </a>
          </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-sepatu">
                <i class="bi bi-people"></i>
                Sepatu
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-order">
                  <i class="bi bi-person-fill"></i>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-stock">
                  <i class="bi bi-person-fill"></i>
                  Stocks
                </a>
              </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-brand">
                  <i class="bi bi-person-fill"></i>
                  Brand
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-sizes">
                  <i class="bi bi-person-fill"></i>
                  Sizes
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-order">
                  <i class="bi bi-person-fill"></i>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-pengeluarans">
                  <i class="bi bi-person-fill"></i>
                  Pengeluaran
                </a>
              </li>
              @can('admin')
              <hr>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/dashboard-user">
                    <i class="bi bi-person-fill"></i>
                    User
                </a>
            </li>
            @endcan
        </ul>

        <hr class="my-3">

        <ul class="navbar-nav">
            <li class="nav-item px-3 ">
             <form action="/logout" method="POST">
                 @csrf
                 <button class="nav-link text-black" type="submit">Log Out</button>

             </form>

            </li>
           </ul>
      </div>
    </div>
  </div>
