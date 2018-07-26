<div class="blog-masthead">
	<div class="container">
		<nav class="nav">
			<a class="nav-link active" href="#">Home</a>
			<!-- Authentication Links -->
				@guest
				<a class="nav-link" href="{{ route('login') }}">Login</a>
				<a class="nav-link" href="{{ route('register') }}">Register</a>
				@else
				<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout </a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST"	style="display: none;">{{ csrf_field() }}</form>
				@endguest

		</nav>
	</div>
</div>
<div class="blog-header">
	<div class="container">
		<h1 class="blog-title">The Supreme Blog</h1>
		<p class="lead blog-description">Would you like to know more?</p>
	</div>
</div>