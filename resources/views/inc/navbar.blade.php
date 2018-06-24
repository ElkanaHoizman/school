
 <div id="app">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                          <!-- Brand -->
                <a class="navbar-brand" href="/">My College</a>
                    
                <!-- Links -->
                
                <ul class="navbar-nav">
                     {{--  <li class="nav-item" ><a class="nav-link" href="/">Home</a></li>  --}}
                @if (!Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="/school">School</a></li>
                    @if(Auth::user()->role == "owner" || Auth::user()->role == "manager")   
                        <li class="nav-item"><a class="nav-link" href="/Administration">Administration</a></li>
                    @endif  
                @endif  

                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{--  <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>  --}}
                        @else
                         
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                               
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li><img class="nav-link dropdown-toggle" style="width:15%"  src="{{asset('/storage/Users_images')}}/{{Auth::user()->Users_image}}" ></li>
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </nav><br><br>