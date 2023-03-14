<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/concerts*') ? 'active' : '' }}" href="/dashboard/concerts">
              <span data-feather="headphones"></span>
              Concerts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/tickets*') ? 'active' : '' }}" href="/dashboard/tickets">
              <span data-feather="trello"></span>
              Tickets
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/buyers*') ? 'active' : '' }}" href="/dashboard/buyers">
              <span data-feather="users"></span>
              Buyers
            </a>
          </li>
          <hr>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/checkin*') ? 'active' : '' }}" href="/dashboard/checkin">
              <span data-feather="check-square"></span>
              Check-in
            </a>
          </li>
        </ul>


      </div>
    </nav>


  </div>
</div>
