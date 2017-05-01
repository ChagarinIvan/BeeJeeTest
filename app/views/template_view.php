<?php
if (!isset($_SESSION)){
    session_start();
}
$url=($_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"/>
    <title>Bee Jee Test</title>
    <meta name="viewport" content="width=1130">
    <link rel="stylesheet" href="/assets/template/css/normalize.css">
    <link rel="stylesheet" href="/assets/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/template/css/dopstyle.css">
    <script src="/assets/template/js/modernizr-custom.js"></script>
</head>
<body>
    <div class="wrapper">
        <header class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center head-block">
                    <h1 class="header-name">
                        <a href="/main/" class="main-link">Bee Jee Test</a>
                    </h1>
                </div>
                <div class="col-md-2 pull-right">
                    <div class="header-name ">
                        <a href="/auth/">
                            <p class="sign-text <?php
                            if (!($url=='/' || strpos($url,'main/')>0)){
                                echo 'hidden';
                            }
                            ?>">Sign in</p>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <section class="container-fluid content">
            <div class="content">
                <?php include 'app/views/'.$content_view; ?>
            </div>
        </section>
        <footer class="container-fluid footer">
            <div class="row">
                <div class="col-xs-12">
                    <p>&copy;2017 Chagarin Ivan.</p>
                </div>
            </div>
        </footer>
    </div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="/assets/template/js/bootstrap.min.js"></script>
<script src="/assets/template/js/main.js"></script>
</body>

</html>