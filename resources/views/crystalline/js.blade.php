<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('sjabloon/assets/scripts/main.js')}}"></script>
<script>
    $(function () {
        const menuLink = location.pathname;
        if (menuLink === '/') {
            $('.info').first().addClass('mm-active');
        }
        if (menuLink === '/addvarsuntan') {
            $('.addva').first().addClass('mm-active');
        }
    });
</script>
