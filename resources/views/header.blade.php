@push('scripts')
<script>
/**
 * Add CSRF Token to all ajax calls
 * @see https://laravel.com/docs/5.4/csrf#csrf-x-csrf-token
 */

$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
});
</script>
@endpush
  <header class="app-header navbar">
      <button class="navbar-toggler mobile-sidebar-toggler sidebar-toggler  mobile-toggler  d-lg-none d-xl-none mr-auto" data-toggle="sidebar-show" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('logo.png')}}" style="height:2.25em;" alt="Stiletto" /></a>
      <form class="form-inline ml-auto mr-auto d-none d-md-inline">
        <input id="searchbox" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>

      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown d-none">
          <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="d-md-down-none"></span>
            <span class="d-md-down-block d-md-none fa fa-user"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="divider"></div>
            <form id="logout-form" action="{{url('logout')}}" method="POST">
              @csrf
            </form>            
            <a class="dropdown-item" href="#" onclick="$('#logout-form').submit()"><i class="fa fa-lock"></i> Logout</a>
          </div>
        </li>
        <li class="nav-item">
            <button class="navbar-toggler aside-menu-toggler" type="button" data-toggle="aside-menu-show">
                <span class="navbar-toggler-icon"></span>
            </button>
        </li>
      </ul>


    </header>