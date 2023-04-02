<div id="sidebar" class="sidebar open">
    <div class="logo-details">
        <i class="bx bxl-c-plus-plus icon"></i>
        <div class="logo_name">{{ Auth::user()->name }}</div>
        <i class="bx bx-menu" id="btn" onclick="handleSideBar()"></i>
    </div>
    <ul class="nav-list">
        <li>
            <i class="bx bx-search" onclick="handleSideBar()"></i>
            <input type="text" placeholder="Search..." />
            <span class="tooltip">Search</span>
        </li>
        <li>
            <a href="{{ route('admin.blog.index') }}" class="{{ str_contains(Request::path(), 'admin/blogs') ? 'sidebar-active' : '' }}">
                <i class="bx bx-book-open"></i>
                <span class="links_name">{{ __('common.sidebar.blog') }}</span>
            </a>
            <span class="tooltip">Blog</span>
        </li>
        <li>
            <a href="{{ route('admin.tour.index') }}" class="{{ str_contains(Request::path(), 'admin/tours') ? 'sidebar-active' : '' }}">
                <i class="bx bx-world"></i>
                <span class="links_name">{{ __('common.sidebar.tour') }}</span>
            </a>
            <span class="tooltip">Tour</span>
        </li>
        <li>
            <a href="{{ route('admin.booking.index') }}" class="{{ str_contains(Request::path(), 'admin/booking-tours') ? 'sidebar-active' : '' }}">
                <i class="bx bx-cart-alt"></i>
                <span class="links_name">{{ __('common.sidebar.booking_tour') }}</span>
            </a>
            <span class="tooltip">Booking tour</span>
        </li>
        <li>
            <a href="#">
                <i class="bx bx-folder"></i>
                <span class="links_name">Manager</span>
            </a>
            <span class="tooltip">Manager</span>
        </li>
        <li>
            <a href="#">
                <i class="bx bx-cog"></i>
                <span class="links_name">Setting</span>
            </a>
            <span class="tooltip">Setting</span>
        </li>
        <li class="profile">
            <div class="profile-details">
                <!--<img src="profile.jpg" alt="profileImg">-->
                <div class="name_job">
                    <div class="name">Prem Shahi</div>
                    <div class="job">Web designer</div>
                </div>
            </div>
            <form method="post" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"><i class="bx bx-log-out" id="log_out"></i></button>
            </form>
        </li>
    </ul>
</div>

<script>
    function handleSideBar() {
        let element = document.getElementById("sidebar");
        if (element.classList.contains("open")) {
            element.classList.remove("open");
        } else {
            element.classList.add("open");
        }
    }
</script>