<script type="text/javascript">
    let session = {};

    session.currentUser = {!! Auth::user() ? Auth::user() : 'null' !!};
    app.session = session;

</script>