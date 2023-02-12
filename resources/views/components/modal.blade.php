<div class="modal" tabindex="-1"  {{ $attributes }}>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $title }}</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{ $slot }}
      </div>
      @isset($footer)
      <div class="modal-footer">
        {{ $footer }}
      </div>
      @endisset
    </div>
  </div>
</div>