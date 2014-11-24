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
            <div class="container">
                <header class="main">
                    <h1>Thanks for using Tres Framework!</h1>
                </header>
                
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                
                <div>
                    <?= $_viewData['packagesInfo']; ?>
                </div>
            </div>
        </div>
    </body>
</html>