<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><b>GoodPhotos</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mt-1 mb-1" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link @if (request()->is('/')) active @endif" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if (request()->is('album')) active @endif" href="/album">Album</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if (request()->is('upload')) active @endif" href="/upload">Upload</a>
          </li>
        </ul>
        @if (Auth::check())
            <!-- Default dropstart button -->
            <div class="me-5 pe-5 btn-group dropdown">
                <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Profile
                </button>
                <ul class="dropdown-menu">
                    <li><span class="dropdown-item fw-medium">{{ Auth::user()->username }}</span></li>
                    <li><span class="dropdown-item fw-medium">{{ Auth::user()->email }}</span></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a href="/keluar" class="btn dropdown-item">Sign Out</a></li>
                </ul>
            </div>
        @else
        <div class=""><a class="btn btn-primary" href="/masuk" role="button">Login</a></div>
        @endif
      </div>
    </div>
  </nav>

