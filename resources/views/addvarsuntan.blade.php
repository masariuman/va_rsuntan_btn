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
            @include('crystalline.ui')
            @include('crystalline.main-addvarsuntan')
        </div>
        @include('crystalline/js')
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
