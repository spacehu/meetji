<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo mod\init::$config['shop_name']; ?>-cms</title>
    </head>

    <frameset rows="144,*" cols="*" frameborder="no" border="0" framespacing="0">
        <frame src="index.php?a=admin&m=main_top" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
        <frameset cols="240,*" name="btFrame" frameborder="NO" border="0" framespacing="0">
            <frame src="index.php?a=admin&m=main_left" name="leftFrame" scrolling="yes" noresize="noresize" id="leftFrame" title="leftFrame" />
            <frame src="index.php?a=admin&m=main_right" name="mainFrame"  scrolling="yes"id="mainFrame" title="mainFrame" />
        </frameset>
    </frameset>
    <noframes>
        <body>
        </body>
    </noframes>
</html>