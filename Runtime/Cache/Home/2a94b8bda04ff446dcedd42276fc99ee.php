<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo ($root); ?>Resources/Styles/bootstrap.min.css" />   
    <script type="text/javascript" src="Resources/Scripts/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="Resources/Scripts/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<body>   
<div class="container">
<?php if(is_array($data)): foreach($data as $key=>$item): if(is_array($item)): foreach($item as $key=>$v): echo ($v); ?>,<?php endforeach; endif; ?>
 <br/><?php endforeach; endif; ?>
<div class="footer">Copyright @qyz 2017</div>
</div>
</body>
</html>