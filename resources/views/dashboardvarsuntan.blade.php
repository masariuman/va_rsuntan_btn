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
            @include('crystalline.main-dashboard')
        </div>
        @include('crystalline/js')
    </body>
</html>
