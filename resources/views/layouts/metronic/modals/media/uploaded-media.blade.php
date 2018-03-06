@foreach($uploaded_media as $media)
<div class="col-md-2 media-library-item" data-id="{{$media->id}}">
    <label>
        <div class="thumbnail " >
            <img src="{{$media->url}}" alt="{{$media->alt_text}}" style="width: 100%; height: 100px; display: block;">
            <div class="caption icheck-list">
                <p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; padding-top: 1px;">
                    <input 
                        type="checkbox" 
                        class="icheck media-library-item-check"                         
                        data-checkbox="icheckbox_square-green" 
                        data-label="{{$media->original_name}}"
                        data-id="{{$media->id}}" 
                        data-original-name="{{$media->original_name}}"
                        data-url="{{$media->url}}"
                        data-alt-text="{{$media->alt_text}}"
                        > 
                    
                    {{$media->original_name}}                  
                </p>
                <p>
                    <button type="button" class="btn blue view btn-sm name">
                        <i class="fa fa-search"></i>
                        <span>View</span>
                    </button>
                    <button class="btn red delete btn-sm">
                        <i class="fa fa-trash-o"></i>
                        <span>Delete</span>
                    </button>
                </p>

                <div class="clearfix"></div>
            </div>
        </div>
    </label>
</div>
@endforeach