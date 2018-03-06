<script type="text/javascript">
    app = {};

    app.baseUrl = '{{url("/")}}';
    app.csrf = '{{csrf_token()}}';

    app.routeAction = '{{$route_action}}';

</script>