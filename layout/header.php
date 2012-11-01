<!DOCTYPE html>
<!--[if IE 7 ]> <html class="ie7"> <![endif]-->
<!--[if IE 8 ]> <html class="ie8"> <![endif]-->
<!--[if IE 9 ]> <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title><?php echo ucfirst(strtolower($page)); ?> | <?php echo $t['projectName']; ?></title>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>

        <!-- jQueryUI -->
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
        <script>window.jQuery.ui || document.write('<script src="js/jqueryui.min.js"><\/script>')</script>

        <!-- Custom -->
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <script src="js/general.js"></script>
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- Remove on live-site -->
        <meta name='robots' content='noindex,nofollow' />
    </head>
    <body class="<?php echo $body_classes; ?>">
        <div id="page">
            <div id="header">
                <div class="content">
                    <a href="?p=index" title="Homepage" rel="home" class="logo"><img src="images/logo.png" alt="<?php echo $t['projectName']; ?>"  width="170" height="40"></a>
                    <ul id="menu" class="menu">
                        <li><a href="./?p=about">About</a></li>
                    </ul>
                </div>
            </div>
            <div id="main">