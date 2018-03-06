<script type="text/javascript">
    ratchet = {};

    ratchet.host = '{{config("ratchet.host")}}';
    ratchet.port = '{{config("ratchet.port")}}';

    ratchet.getWsUri = function (route) {
        return `ws://${ratchet.host}:${ratchet.port}/${route}`;
    };

    ratchet.connect = function (route) {
        if (route) {
            return new WebSocket(`ws://${ratchet.host}:${ratchet.port}/${route}`);
        } else {
            return new WebSocket(`ws://${ratchet.host}:${ratchet.port}`);
        }        
    };

</script>