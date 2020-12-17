
<nav class="navbar navbar-inverse" style="border-color:transparent;border-radius:0%;background-image: url('/storage/cover_images/newnew20.jpg');">

    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" style="color:white;" href="{{ url('/') }}">
                
                {{ config('app.name', 'Flamingo') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            <ul class="nav navbar-nav">
                <li><a style="color:white;font-size:15px" href="/">Home</a></li>
                <li><a style="color:white;font-size:15px" href="/posts">Banquets</a></li>
                <li><a style="color:white;font-size:15px" href="/services">Services</a></li>
                <li><a style="color:white;font-size:15px" href="/about">About</a></li>
                               
            </ul>

              <!-- Right Side Of Navbar -->
              <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guard('web')->check())
                    
                        <li class="dropdown">
                            <a style="color:white" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Welcome {{ Auth::guard('web')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/home">Dashboard</a></li>
                                <li>
                                    <a href="{{ route('user.logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                @elseif (Auth::guard('owner')->check())
                    
                        <li class="dropdown">
                            <a style="color:white" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Welcome {{ Auth::guard('owner')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/owner">Dashboard</a></li>
                                <li>
                                    <a href="{{ route('owner.logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        
                @else
                        <li><a style="color:white" href="{{ route('login') }}">Login</a></li>
                        <li><a style="color:white" href="{{ route('register') }}">Register</a></li>
           
                @endif
            </ul>
        </div>
    </div>
</nav>
