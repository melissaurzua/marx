<!doctype html>
<html lang="de" dir="ltr" >
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon & Touch Icon -->
  <link rel="icon" href="<?=ROOT;?>assets/img/icons/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=ROOT;?>assets/img/icons/apple-touch-icon-144x144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=ROOT;?>assets/img/icons/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=ROOT;?>assets/img/icons/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?=ROOT;?>assets/img/icons/apple-touch-icon-precomposed.png">

  <!-- CSS assets -->
  <link rel="stylesheet" id="main-stylesheet-css" href="<?=ROOT;?>assets/stylesheets/marx.css" type="text/css" media="all">

  <!-- JS libs -->
  <script type="text/javascript" src="<?=ROOT;?>assets/javascript/vendor/jquery.js"></script>
  <script type="text/javascript" src="<?=ROOT;?>assets/javascript/vendor/fastclick.js"></script>

  <title>MARX</title>

</head>
<body>

<h1>Welcome to marx!</h1>

<main><?=$data->content;?></main>

<!-- JavaScript -->
<script type="text/javascript" src="<?=ROOT;?>assets/javascript/marx.js"></script>
</body>
</html>