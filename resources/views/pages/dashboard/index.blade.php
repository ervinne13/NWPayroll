@extends('layouts.metronic.admin')

@section('js')
<script src="{{asset("assets/global/plugins/jquery.pulsate.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/global/node_modules/blueimp-tmpl/js/tmpl.min.js")}}" type="text/javascript"></script>

<script src="{{asset("assets/pages/dashboard/StatusBar.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/dashboard/dashboard.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/pages/dashboard/ratchet-status.js")}}" type="text/javascript"></script>

<script src="{{asset("assets/pages/dashboard/product-sync.js")}}" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function () {    
    Dashboard.init();
});

</script>

@append

@section('content')

<div class="row">

    <div class="col-md-6 col-xs-12">
        @include('pages.dashboard.partials.functions')
    </div>

    <div class="col-md-6 col-xs-12">
        @include('pages.dashboard.partials.status')
    </div>

</div>

@endsection