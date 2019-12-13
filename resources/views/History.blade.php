<!doctype html>
<html lang="en">
    <head>
        @include('crystalline.meta')
        <title>Virtual Account RSUNTAN - BTN.</title>
        @include('crystalline.css')
    </head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            @include('crystalline.header')
            @include('crystalline.main-history')
        </div>
        @include('crystalline/js')
        <!-- Datatables -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

        <!-- Datepicker -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
       <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat: 'yy/mm/dd'
            });
        });
        </script>
        <!-- Datepicker -->





    </body>
</html>
