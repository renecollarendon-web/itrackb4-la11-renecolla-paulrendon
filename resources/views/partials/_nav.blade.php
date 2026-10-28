
<nav class="nav">
    <a class="nav-link {{ request()->is('movies*') ? 'active' : '' }}" 
       href="{{ route('movies.index') }}">All Movies</a>
    <a class="nav-link {{ request()->is('movies/featured') ? 'active' : '' }}" 
       href="{{ route('movies.featured') }}">Featured</a>
</nav>
