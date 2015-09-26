<!doctype html>
<html lang="de" dir="ltr" >
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="mobile-web-app-capable" content="yes" />
  
  <!-- Favicon & Touch Icon -->
  <link rel="icon" href="<?=ROOT;?>assets/img/icons/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="<?=ROOT;?>assets/img/icons/touch-icon-iphone.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=ROOT;?>assets/img/icons/touch-icon-ipad.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?=ROOT;?>assets/img/icons/touch-icon-iphone-retina.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?=ROOT;?>assets/img/icons/touch-icon-ipad-retina.png">
  
  <!-- CSS assets -->
  <link rel="stylesheet" id="main-stylesheet-css" href="<?=ROOT;?>assets/stylesheets/marx.css" type="text/css" media="all">
  
  <!-- JS libs -->
  <script type="text/javascript" src="<?=ROOT;?>assets/javascript/vendor/jquery.js"></script>
  <script type="text/javascript" src="<?=ROOT;?>assets/javascript/vendor/fastclick.js"></script>

  <title>Robin</title>

</head>
<body data-root="<?=ROOT;?>">
	<?=$this->content;?>
	<script type="text/javascript" src="<?=ROOT;?>assets/javascript/marx.js"></script>
</body>
</html>