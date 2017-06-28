<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title><?php echo $content['title']; ?></title>

    <link rel="stylesheet" href="<?= App::baseUrl() ?>/app/views/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?= App::baseUrl() ?>/app/views/css/style.css" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
    <link rel="stylesheet" href="<?= App::baseUrl() ?>/app/views/css/chartist.css" type="text/css">

    <script src="<?= App::baseUrl() ?>/app/views/js/jquery-2.1.4.min.js"></script>
    <script src="<?= App::baseUrl() ?>/app/views/js/jquery.cookie.js"></script>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.9&appId=1557528790937808";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

</head>
<body>
