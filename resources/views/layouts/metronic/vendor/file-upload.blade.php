@section('vendor-css')
<link href="{{asset('assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css')}}" rel="stylesheet"/>
@append

@section('vendor-js')

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js')}}"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js')}}"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js')}}"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js')}}"></script>
<!-- blueimp Gallery script -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js')}}"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js')}}"></script>
<!-- The basic File Upload plugin -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js')}}"></script>
<!-- The File Upload processing plugin -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js')}}"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js')}}"></script>
<!-- The File Upload audio preview plugin -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js')}}"></script>
<!-- The File Upload video preview plugin -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js')}}"></script>
<!-- The File Upload validation plugin -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js')}}"></script>
<!-- The File Upload user interface plugin -->
<script src="{{asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js')}}"></script>


<!--<script src="{{asset('assets/admin/components/form-fileupload.js')}}"></script>-->
<script src="{{asset("vendor/media-library/node_modules/sortablejs/Sortable.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendor/media-library/media-library.js")}}" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function () {
    MediaLibrary.init();
});

</script>

@append
