<footer class="app-footer">
        <span class="float-right">Powered by <a href="http://coreui.io">CoreUI</a>
        </span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('js/coreui.min.js')}}"></script>

    <script src="{{asset('js/vendor.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <!-- Custom scripts required by this view -->
    @stack('scripts')
<script>
$('#searchbox').autocomplete({
    source: '{{route('search')}}', 
    select: function (event, ui) {
      $('#modal-loading').modal('show');
        window.location = ui.item.route;
    }
})    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<div>" + item.label + "<br><em>" + item.summary + "</em></div>" )
        .appendTo( ul );
    };;
    $('#searchbox-mobile').autocomplete({
    source: '{{route('search')}}', 
    select: function (event, ui) {
      $('#modal-loading').modal('show');
        window.location = ui.item.route;
    }
})    
</script>
<div class="modal fade" id="modal-loading" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true"></div>
</body>

</html>
