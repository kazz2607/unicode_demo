<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
              <i class="fa-brands fa-laravel"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto pull-left">
                  @include('backend.layouts.nav')
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto pull-right">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ env('APP_NAME') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>
