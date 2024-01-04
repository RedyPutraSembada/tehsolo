<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="{{ asset('assets/assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Argon Dashboard 2</span>
      </a>
    </div>
    <hr class="horizontal m-0">
    <div class="pt-3">
        <p>
            <a class="d-flex align-items-center justify-content-start" style="margin-left: 33px" data-bs-toggle="collapse" href="#Master-Data" role="button" aria-expanded="false" aria-controls="Master-Data">
                Master Data <i class="ni ni-bold-down text-dark opacity-10" style="margin-left: 5px"></i>
            </a>
        </p>
        <div class="collapse" id="Master-Data">
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link {{ str_contains(request()->url(), 'master-data/produk') == true ? 'active' : '' }}" href="/master-data/produk">
                        <div
                            class="text-center d-flex align-items-center justify-content-center" style="margin-left: 8px">
                            <i class="fa fa-info text-dark text-sm opacity-10" aria-hidden="true" ></i>
                            <span class="nav-link-text ms-1">Produk</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse" id="Master-Data">
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link {{ str_contains(request()->url(), 'master-data/item') == true ? 'active' : '' }}" href="/master-data/item">
                        <div
                            class="text-center d-flex align-items-center justify-content-center" style="margin-left: 8px">
                            <i class="fa fa-info text-dark text-sm opacity-10" aria-hidden="true" ></i>
                            <span class="nav-link-text ms-1">Item</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse" id="Master-Data">
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link {{ str_contains(request()->url(), 'master-data/customer') == true ? 'active' : '' }}" href="/master-data/customer">
                        <div
                            class="text-center d-flex align-items-center justify-content-center" style="margin-left: 8px">
                            <i class="fa fa-info text-dark text-sm opacity-10" aria-hidden="true" ></i>
                            <span class="nav-link-text ms-1">Customer</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="pt-3">
        <p>
            <a class="d-flex align-items-center justify-content-start" style="margin-left: 33px" data-bs-toggle="collapse" href="#check" role="button" aria-expanded="false" aria-controls="check">
                Sewa<i class="ni ni-bold-down text-dark opacity-10" style="margin-left: 5px"></i>
            </a>
        </p>
        <div class="collapse" id="check">
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link {{ str_contains(request()->url(), 'check/check-in') == true ? 'active' : '' }}" href="/check/check-in">
                        <div
                            class="text-center d-flex align-items-center justify-content-center" style="margin-left: 8px">
                            <i class="fa fa-info text-dark text-sm opacity-10" aria-hidden="true" ></i>
                            <span class="nav-link-text ms-1">Sewa</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </div>
    <ul class="navbar-nav">
        <li class="dropdown open nav-item">
            <a class="nav-link {{ str_contains(request()->url(), 'dashboard') == true ? 'active' : '' }}" href="/dashboard">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-home text-dark text-sm opacity-10 mb-2" aria-hidden="true" ></i>
                </div>
                <span class="nav-link-text ms-1">Home Page</span>
            </a>
        </li>
    </ul>
  </aside>
