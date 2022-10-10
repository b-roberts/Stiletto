@push('scripts')
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>

CKEDITOR.config.stylesSet="my_styles:{{asset('/js/ckeditor.styles.js')}}";
CKEDITOR.config.contentsCss = [
'http://192.168.1.2/dnd-tombs/public/css/editor.css',
'http://192.168.1.2/dnd-tombs/public/css/main.css'
];
CKEDITOR.replace( 'editor' , {
        'customConfig': '{{asset('/js/ckeditor.config.js')}}'
} );


CKEDITOR.stylesSet.add( 'my_styles', [
    // Block-level styles
    { name: 'alert-info', element: 'div', styles: { 'class': 'alert alert-info' } },
	{ name: 'Card Aside', element: 'div', attributes: { 'class':'pull-right card col-3 p3 ml-1 alert alert-secondary' }},

    // Inline styles
    { name: 'text-info', element: 'span', attributes: { 'class': 'text-info' } },
    { name: 'text-danger', element: 'span', attributes: { 'class': 'text-danger' } },
    { name: 'Marker: Yellow', element: 'span', styles: { 'background-color': 'Yellow' } }
] );
</script>
@endpush