<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8" />
        <title>Home - {{ $appName }}</title>
        
        {{ style('main.css') }}
        {{ favicon('favicon.ico') }}
        
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="main-content">
            <center>
                <header class="main">
                    <h1>Welcome to {{ $appName }} {{ $tresVersion }}!</h1>
                </header>
                
                <p>Yet another micro MVC framework. :)</p>
                
                <a href="#" class="tres-logo">
                    <img src="{{ IMAGE_URL }}/tres-logo.png"
                         width="200"
                         height="200"
                         alt="Tres logo"
                    />
                </a>
            </center>
        </div>
    </body>
</html>
