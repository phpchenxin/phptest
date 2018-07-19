<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	helloworld!
	<?php if(is_array($tbl)): $i = 0; $__LIST__ = $tbl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i; echo ($list["uname"]); ?>-<?php echo ($list["pwd"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>