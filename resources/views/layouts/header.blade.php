<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}">Pacific<span>Travel Agency</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('home.index') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('destination.index') }}" class="nav-link">Destination</a></li>
                <li class="nav-item"><a href="{{ route('hotel.index') }}" class="nav-link">Hotel</a></li>
                <li class="nav-item"><a href="{{ route('blog.index') }}" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="{{ route('contact.index') }}" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
