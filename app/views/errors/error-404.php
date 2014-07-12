<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8" />
        <title>Not Found (404) - <?php echo $data['app_name']; ?></title>
        
        <?php
        echo style('main.css');
        echo favicon();
        ?>
        
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="main-content">
            <header class="main">
                <h1>Ooops! Not found (404).</h1>
            </header>
            
            <p>The page you tried to access has not been found. ;(</p>
        </div>
    </body>
</html>
