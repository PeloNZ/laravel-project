<div class="blog-masthead">
  <div class="container">
    <nav class="nav">
      <a class="nav-link active" href="#">Home</a>
      <a class="nav-link" href="#">New features</a>
      <a class="nav-link" href="#">Press</a>
      <a class="nav-link" href="#">New hires</a>
      <a class="nav-link" href="#">About</a>
      @if (Auth::check())
      <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
      @endif
      <!-- Authentication Links -->
      <ul class="nav navbar-nav navbar-right">
        @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li> @else
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> Logout </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form></li>
          </ul></li> @endguest
    
    </nav>
  </div>
</div>
<div class="blog-header">
  <div class="container">
    <h1 class="blog-title">Provident blog</h1>
    <p class="lead blog-description">An example blog template built with Bootstrap.</p>
  </div>
</div>