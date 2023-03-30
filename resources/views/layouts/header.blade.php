<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}">{{ __('common.app-name') }}<span>{{ __('common.header.speacial-made-tour') }}</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ \Request::is('/') ? 'active' : '' }}"><a href="{{ route('home.index') }}" class="nav-link">{{ __('common.sidebar.home') }}</a></li>
                <li class="nav-item {{ \Request::is('about') || \Request::is('about/*') ? 'active' : '' }}"><a href="{{ route('about.index') }}" class="nav-link">{{ __('common.sidebar.about') }}</a></li>
                <li class="nav-item {{ \Request::is('destination') || \Request::is('destination/*') ? 'active' : '' }}"><a href="{{ route('destination.index') }}" class="nav-link">{{ __('common.sidebar.destination') }}</a></li>
                <li class="nav-item {{ \Request::is('blog') || \Request::is('blog/*') ? 'active' : '' }}"><a href="{{ route('blog.index') }}" class="nav-link">{{ __('common.sidebar.blog') }}</a></li>
                <li class="nav-item {{ \Request::is('contact') || \Request::is('contact/*') ? 'active' : '' }}"><a href="{{ route('contact.index') }}" class="nav-link">{{ __('common.sidebar.contact') }}</a></li>
                <li class="nav-item nav-wrapper">
                  <div class="sl-nav">
                  {{ __('common.sidebar.language') }}:
                      <ul>
                          <li><b>{{ strtoupper(config('app.locale')) }}</b> <i class="fa fa-angle-down" aria-hidden="true"></i>
                              <div class="triangle"></div>
                              <ul>
                                <li><i class="sl-flag flag-en"><div id="germany"></div></i> <a href="{{ route('change-language', ['locale' => 'en']) }}"><span class="{{ config('app.locale') == 'en' ? 'active' : '' }}">EN</span></a></li>
                                <li><i class="sl-flag flag-es"><div id="germany"></div></i> <a href="{{ route('change-language', ['locale' => 'es']) }}"><span class="{{ config('app.locale') == 'es' ? 'active' : '' }}">ES</span></a></li>
                              </ul>
                          </li>
                      </ul>
                  </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
<style>
    @import url('https://fonts.googleapis.com/css?family=Muli');
body {
  font-family: Arial;
  font-family: 'Muli', sans-serif;
}
.nav-wrapper {
  /* width: 300px;
  margin: 100px auto; */
  text-align: center;
  padding-top: 1.5rem;
  color: gold;
}
  .sl-nav {
  display: inline;
}
.sl-nav ul {
  margin:0;
  padding:0;
  list-style: none;
  position: relative;
  display: inline-block;
}
.sl-nav li {
  cursor: pointer;
  padding-bottom:10px;
}
.sl-nav li ul {
  display: none;
}
.sl-nav li:hover ul {
  position: absolute;
  top:29px;
  right:-15px;
  display: block;
  background: #fff;
  width: 120px;
  padding-top: 0px;
  z-index: 1;
  border-radius:5px;
  box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
}
.sl-nav li:hover .triangle {
  position: absolute;
  top: 15px;
  right: -10px;
  z-index:10;
  height: 14px;
  overflow:hidden;
  width: 30px;
  background: transparent;
}
.sl-nav li:hover .triangle:after {
  content: '';
  display: block;
  z-index: 20;
  width: 15px;
  transform: rotate(45deg) translateY(0px) translatex(10px);
  height: 15px;
  background: #fff;
  border-radius:2px 0px 0px 0px;
  box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
}
.sl-nav li ul li {
  position: relative;
  text-align: left;
  background: transparent;
  padding: 15px 15px;
  padding-bottom:0;
  z-index: 2;
  font-size: 15px;
  color: #146c78;
}
.sl-nav li ul li:last-of-type {
  padding-bottom: 15px;
}
.sl-nav li ul li span {
  padding-left: 5px;
}
.sl-nav li ul li span:hover, .sl-nav li ul li span.active {
  color: #3c3c3c;
}
.sl-flag {
  display: inline-block;
  box-shadow: 0px 0px 3px rgba(0,0,0,0.4);
  width: 15px;
  height: 15px;
  background: #aaa;
  border-radius: 50%;
  position: relative;
  top: 2px;
  overflow: hidden;
}
.flag-es {
  background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAAAmCAMAAACf4xmcAAABJlBMVEXGCx7/xADEAB/jgBT/yAD/yQD/xgD7wgD6wx23nDrzvR3csynIpjXquRCmlD/zvRfLYgupZCaqABOfeTKpZiPNaAueUB6YWRGgZx+gcACZWhydThTzvwyXZgvLlAn/zgCcjBOHciKdWgCghQDJpQDkoAqoDxigOBOlAASqd3i+wbu4qZ+3s7PqwFfDv7HavGaeJhWFcQCZRAC5g4W9mKrHW4y/s8DlxHO5tKW5kn7DhUOgIh9vdViOMz/Fub/MdZzNnFyzlJK+ll/OeABtXWeTTgNVPHqjfIPTp13CbAC6n5OjODSqTAB5J1VZeX58SGW5imqygGzgpyquSz2ubg96OlSwWQDdkgC9dAynfyqxniqpc1LMqFBVc6jZpwCklIaOi3yvYTc7kfABAAABK0lEQVQ4je2T21aCQBSGZ2pmpIAOFkUpVhyyLLWiIO1gSGWUnQnMpMP7v0RT1B3DYnntd7GvvvXPntl7ABgxFGOZAOOZAOgfjFIA8A+SI5BNrBFCuAmO1lSNTPKCOCUK/DTLizVhZjY/l5+XhDQNo+LCorwkLxeKCDM1opTwyuqaqmgIlxTE1DTdWC9vbFa2tqu6xk6r1Y2d3T1z/8Cq2oesNJJrNKWj4xPztGWdNRvJzwcglpy2Wz6/uOxY1lXb8RIvQQ/F1zdioXt7d//w+PTsJF8VQOSaddH31Zcg8ELbdBOb++mtYlPN7/Veg9CusXqDpK8XFV9987qBofeT50DTBlGE3uWPz85XiKNowEqjeZBgjucwgsyZ0n2k/Ja4Jq9lxiXP+GVGDMU3ifEl4xyfe5YAAAAASUVORK5CYII=');
  background-size: cover;
  background-position: center center;
}
.flag-en {
  background-size: cover;
  background-position: center center;
  background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHZpZXdCb3g9JzAgMCA0OCA0OCc+PHBhdGggZmlsbD0nIzAwMjc4MScgZD0nTTQ2LDZIMkMwLjg5Niw2LDAsNi44OTYsMCw4djMyYzAsMS4xMDQsMC44OTYsMiwyLDJoNDRjMS4xMDQsMCwyLTAuODk2LDItMlY4QzQ4LDYuODk2LDQ3LjEwNCw2LDQ2LDZ6Jy8+PHBhdGggZmlsbD0nI0U2RTZFNicgZD0nTTQ4LDhjMC0xLjEwNC0wLjg5Ni0yLTItMmgtNS4xNjFMMjgsMTUuODc2VjZoLTh2OS44NzZMNy4xNjEsNkgyQzAuODk2LDYsMCw2Ljg5NiwwLDh2Mi41ODZMMTIuMjM5LDIwSDB2OCBoMTIuMjM5TDAsMzcuNDE1VjQwYzAsMS4xMDQsMC44OTYsMiwyLDJoNS4xNjFMMjAsMzIuMTI0VjQyaDh2LTkuODc2TDQwLjgzOSw0Mkg0NmMxLjEwNCwwLDItMC44OTYsMi0ydi0yLjU4NUwzNS43NjEsMjhINDh2LTggSDM1Ljc2MUw0OCwxMC41ODZWOHonLz48cG9seWdvbiBmaWxsPScjRDEwRDI0JyBwb2ludHM9JzQ4LDIyIDI2LDIyIDI2LDYgMjIsNiAyMiwyMiAwLDIyIDAsMjYgMjIsMjYgMjIsNDIgMjYsNDIgMjYsMjYgNDgsMjYgJy8+PHBhdGggZmlsbD0nI0QxMEQyNCcgZD0nTTQ3LjAwMSw2LjMwN0wyOS4yLDIwaDMuMjhMNDgsOC4wNjJWOEM0OCw3LjI2OCw0Ny41ODcsNi42NTYsNDcuMDAxLDYuMzA3eicvPjxwYXRoIGZpbGw9JyNEMTBEMjQnIGQ9J00zMi40OCwyOEgyOS4ybDE3LjgwMSwxMy42OTNDNDcuNTg3LDQxLjM0NCw0OCw0MC43MzIsNDgsNDB2LTAuMDYyTDMyLjQ4LDI4eicvPjxwYXRoIGZpbGw9JyNEMTBEMjQnIGQ9J00xNS41MiwyOEwwLDM5LjkzOFY0MGMwLDAuNzMyLDAuNDEzLDEuMzQ0LDAuOTk5LDEuNjkzTDE4LjgsMjhIMTUuNTJ6Jy8+PHBhdGggZmlsbD0nI0QxMEQyNCcgZD0nTTE1LjUyLDIwaDMuMjhMMC45OTksNi4zMDdDMC40MTMsNi42NTYsMCw3LjI2OCwwLDh2MC4wNjJMMTUuNTIsMjB6Jy8+PC9zdmc+');
}
</style>