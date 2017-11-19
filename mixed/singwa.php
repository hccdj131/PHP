<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<ul>
	<?php foreach($news as $k => $v) {?>
		<li><a href="/" target = "_blank"><?php echo $v['title']?></a></li>
		<img src="images/new.gif"></a>
	<?php }?>
</ul>
</body>
</html>