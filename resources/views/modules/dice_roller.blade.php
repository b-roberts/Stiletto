<input type="text" id="diceInput">
<div id="diceResults" class="list-group">
</div>

@push('scripts')
<script src="{{asset('js/d20.js')}}" type="text/javascript"></script>
<script>
$('#diceInput').keypress(function(event){

    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        console.log(event.target);
        rollDice($(event.target).val());
    }
});

function rollDice(dice) {
    result = d20.roll(dice);
    date = new Date().toLocaleTimeString(); // 11:18:48 AM
    const template = `
    <a class="list-group-item list-group-item-action flex-column align-items-start " href="#">
<div class="d-flex w-100 justify-content-between">
<span class="h5 mb-1">${result}</span><small>${dice}</small>
<span>${date}</span>
</div>
</a>`;
$('a[href="#tab-dice-roller"]').tab('show')
$('#diceResults').prepend(template);
}
</script>
@endpush