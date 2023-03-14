<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">Agen X</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>

      </ul>

      <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn btn-dark text-white" href="#" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <strong>{{ auth()->user()->name }}</strong>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-speedometer2"></i> My Dashboard</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item {{ $active === 'login' ? 'active' : '' }}">
            <a class="nav-link btn btn-dark text-white" href="/login"><strong><i class="bi bi-box-arrow-in-right"></i>
                Login</strong></a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
