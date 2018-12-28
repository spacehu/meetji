<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title><?php echo mod\init::$config['shop_name']; ?>-cms</title>
</head>

<body>
<div class="top">
	<div class="logo1" >
		<a href="javascript:void(0);" onclick="javascript:parent.mainFrame.location.href='index.php?a=admin&m=main_right';parent.leftFrame.location.href='index.php?a=admin&m=main_left'" ><img src="img/tigerlogo.png" /></a>
	</div>
	<div class="topMap">
    	<a onclick="javascript:parent.mainFrame.location.href='<?php echo \mod\common::url_rewrite("index.php?a=login&m=logOff"); ?>'">SIGN OFF 签出</a>
	</div>
</div>
</body>
</html>
