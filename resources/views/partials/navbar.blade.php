<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="/css/style.css">

<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3" style="border-bottom: 1px solid white">
    <div class="container">
        <a class="navbar-brand nav-link ml-2" href="#"><img src="/img/logo1.png" alt="" height="70" width="400"></a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- <div class="mx-auto"></div> -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "Home") ? 'active' : ''}}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "Jalur") ? 'active' : ''}}" href="/jalur">Jalur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "About") ? 'active' : ''}}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "Booking") ? 'active' : ''}}"href="/pendaftaran">Book Now</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
              @auth
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" style="font-size: large" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Haii!! {{ auth()->user()->username }}
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/ticket"><i class="bi bi-ticket-perforated-fill"></i> My Ticket</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <form action="/logout" method="POST">
                          @csrf
                          <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</a></button>
                      </form>
                    </li>
                  </ul>
                </li>
              @else
              
              <li class="nav-item">
                  <a class="nav-link {{ ($active === "login") ? 'active' : ''}}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
              </li>
          </ul>
          @endauth
        </div>
    </div>
</nav>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="text/javascript">
  var nav = document.querySelector('nav');
  var navLinks = document.querySelectorAll('.nav-link');

  function isHomePage() {
  return window.location.pathname === '/';
  }
  function updateNavbarStyle() {
    if (window.pageYOffset > 100 || !isHomePage()) {
      nav.classList.add('bg-white', 'text-dark', 'shadow');
      navLinks.forEach(link => link.classList.add('text-dark'));
    } else {
      nav.classList.remove('bg-white', 'text-dark', 'shadow');
      navLinks.forEach(link => link.classList.remove('text-dark'));
    }
  }

  window.addEventListener('scroll', updateNavbarStyle);
  window.addEventListener('load', updateNavbarStyle);
</script>
