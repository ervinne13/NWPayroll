@section('vendor-css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/b-1.5.1/b-print-1.5.1/datatables.min.css"/>
@append

@section('vendor-js')

<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/b-1.5.1/b-print-1.5.1/datatables.min.js"></script>

<script src="{{url('assets/global/scripts/lib/dtutils.js')}}"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>

@append
