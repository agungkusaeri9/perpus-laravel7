<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('book.index') }}">Perpusku 7</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
              @guest
              <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
              <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
              @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a href="{{ route('history') }}" class="dropdown-item ">History Peminjaman</a>
                  <a class="dropdown-item" href="#" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Logout</a>
                </div>
              </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              @endguest
              
          </div>
        </div>
    </div>
</nav>