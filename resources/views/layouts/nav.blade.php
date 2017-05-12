<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <a class="blog-nav-item active" href="/">Home</a>
      <a class="blog-nav-item" href="#">New features</a>
      <a class="blog-nav-item" href="#">Press</a>
      <a class="blog-nav-item" href="#">New hires</a>

      @if (Auth::check())
          <a class="blog-nav-item navbar-right" href="#">Welcome, {{ Auth::user()->name }}</a>

          <a class="blog-nav-item navbar-right" href="/logout">Log out</a>
      @else
          <a class="blog-nav-item navbar-right" href="/register">Sign up</a>
          <a class="blog-nav-item navbar-right" href="/login">Log in</a>

      @endif

    </nav>
  </div>
</div>
