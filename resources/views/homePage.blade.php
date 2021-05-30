<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    </head>
    <body>
        <div id="app">
            <navbar-component></navbar-component>
            <body-component></body-component>
            <footer-component></footer-component>
        </div>
    </body>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="css/app.css">
</html>
