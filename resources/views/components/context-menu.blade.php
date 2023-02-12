<?php
    $menuId = 'menu-' . md5(rand(0,100000));
?>
<div class="dropdown d-inline">
    <button class="btn btn-link" type="button" id="{{$menuId}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-ellipsis-v"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="{{$menuId}}">
        {{ $slot }}
    </div>
  </div>