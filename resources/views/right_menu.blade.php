<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tab-notifications" role="tab" aria-selected="false"><i class="fas fa-link"></i></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab-pinned" role="tab" aria-selected="false"><i class="fas fa-heart"></i></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab-dice-roller" role="tab" aria-selected="false"><i class="fas fa-dice"></i></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab-search" role="tab" aria-selected="false"><i class="fas fa-search"></i></a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane p-3 active show" id="tab-notifications" role="tabpanel">
        @yield('sidebar')
    </div>
    <div class="tab-pane p-3" id="tab-dice-roller" role="tabpanel">
        @include('modules.dice_roller')
    </div>
    <div class="tab-pane p-3" id="tab-pinned" role="tabpanel">
        @include('modules.pinned_articles')
    </div>
    <div class="tab-pane p-3" id="tab-search" role="tabpanel">
        <form class="form-inline ml-auto mr-auto ">
            <input id="searchbox-mobile" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
</div>
