@vendor('metronic', 'icheck')
@vendor('metronic', 'file-upload')

@section('css')
<style>
    .files {
        max-height: 600px;
        overflow-y: auto;
    }
</style>
@append

@include('layouts.metronic.modals.media.templates.upload-file-templates')

<div id="media-selector-modal" class="modal fade" id="full" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="display: none;">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Media Library</h4>
            </div>
            <div class="modal-body">
                <form id="fileupload" action="{{route('admin.media-library.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}                    

                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                    <div class="row fileupload-buttonbar">
                        <div class="col-lg-7">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="btn green fileinput-button">
                                <i class="fa fa-plus"></i>
                                <span>
                                    Add files... </span>
                                <input type="file" name="file" multiple="">
                            </span>                 
<!--                            <button type="button" class="btn red delete">
                                <i class="fa fa-trash"></i>
                                <span>
                                    Delete All
                                </span>
                            </button>-->
                            <!-- The global file processing state -->
                            <span class="fileupload-process">
                            </span>
                        </div>
                        <!-- The global progress information -->
                        <div class="col-lg-5 fileupload-progress fade">
                            <!-- The global progress bar -->
                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar progress-bar-success" style="width:0%;">
                                </div>
                            </div>
                            <!-- The extended global progress information -->
                            <div class="progress-extended">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    
                    <div class="files row">
                        @include('layouts.metronic.modals.media.uploaded-media')
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <div class="pull-right">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button id="action-attach-selected-media" type="button" class="btn blue">Attach Selected Media</button>
                </div>                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev"> ‹ </a>
    <a class="next"> › </a>
    <a class="close white"></a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>