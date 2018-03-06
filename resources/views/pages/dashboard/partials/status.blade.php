<script id="status-bar-item-tmpl" type="text/html">
    <li class="status-bar-li" data-id="{%= o.id %}">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="status-bar-icon-label label label-sm {%= o.iconLabelClass %}" data-id="{%= o.id %}">
                        <i class="{%= o.icon %}"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        {%= o.message %}
                        <a href="{%= o.linkUrl %}" class="status-bar-link" data-id="{%= o.id %}">{%= o.linkText %}</a>
                    </div>                                
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                {%= o.date %}
            </div>
        </div>
    </li>
</script>

<h3 class="page-title">
    System Status 
</h3>

<div class="row">
    <div class="col-md-12">
        <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
            <ul id="status-bars-container" class="feeds" style="padding-left: 12px; padding-top: 12px">
                

            </ul>
        </div>
        <!--        <div class="scroller-footer">
                    <div class="btn-arrow-link pull-right">
                        <a href="javascript:;">See All Records</a>
                        <i class="icon-arrow-right"></i>
                    </div>
                </div>-->
    </div>
</div>
