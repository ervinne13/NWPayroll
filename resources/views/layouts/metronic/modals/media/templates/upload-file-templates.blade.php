
<script id="template-upload" type="text/html">

    {% for (var i=0, file; file=o.files[i]; i++) { %}
    
    <div class="col-md-2 template-upload">
        <div class="thumbnail media-library-item ">
            <span class="preview"></span>
            <div class="caption icheck-list">
                <p>
                    <p class="name">{%=file.name%}</p>
                    <strong class="error text-danger label label-danger"></strong>
                    
                    <p class="size">Processing...</p>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                    </div>
                </p>
                <p>
                    {% if (!i && !o.options.autoUpload) { %}
                        <button class="btn blue start" disabled>
                            <i class="fa fa-upload"></i>
                            <span>Start</span>
                        </button>
                    {% } %}
                    {% if (!i) { %}
                        <button class="btn red cancel">
                            <i class="fa fa-ban"></i>
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </p>
                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    {% } %}
    
</script>

<script id="template-download" type="text/html">

    {% for (var i=0, file; file=o.files[i]; i++) { %}
    
    <div class="col-md-{%= o.col_size ? o.col_size : 2 %} media-library-item" data-id="{%= file.id %}">
        <label>
            <div class="thumbnail">
                <img src="{%= file.url %}" alt="{%= file.original_name %}" style="width: 100%; height: 100px; display: block;">
                <div class="caption icheck-list">
                    <p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; padding-top: 1px;">
                        {% if (o.selectable !== false) { %}
                        <input 
                            type="checkbox" 
                            class="icheck media-library-item-check"                         
                            data-checkbox="icheckbox_square-green" 
                            data-label="{%= file.original_name %}"
                            data-id="{%= file.id %}" 
                            data-original-name="{%= file.original_name %}"
                            data-url="{%= file.url %}"
                            data-alt-text="{%= file.alt_text %}"
                            > 
                        {% } %}
                        
                            {%= file.original_name %}                        
                    </p>
                    <p>
                        <button type="button" class="btn blue view btn-sm name">
                            <i class="fa fa-search"></i>
                            <span>View</span>
                        </button>
                        {% if (o.deletePermanent !== false) { %}
                        <button class="btn red delete btn-sm">
                            <i class="fa fa-trash-o"></i>
                            <span>Delete</span>
                        </button>
                        {% } else { %}
                        <button type="button" class="btn red remove-media-library-item btn-sm" data-id="{%= file.id %}" data-target-name="{%= o.target_name %}">
                            <i class="fa fa-trash-o"></i>
                            <span>Remove</span>
                        </button>
                        {% } %}                        
                    </p>

                    <div class="clearfix"></div>
                </div>
            </div>
        </label>
    </div>

    {% } %}
    
</script>