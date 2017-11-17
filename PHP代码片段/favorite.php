<?php

// 黑名单过滤
function is_spam($text, $file, $split = ':', $regex = false){
	$handle = fopen($file,'rb');
	$contents = fread($handle, filesize($file));
	fclose($handle);
	$lines = explode("n", $contents);
	$arr = array();
	foreach($lines as $line){
		list($word, $count) = explode($split,$line);
		if($regex)
			$arr[$word] = $count;
		else
			$arr[preg_quote($word)] = $count;
	}
	preg_match_all("~".implode('|', array_keys($arr))."~",$text, $matches);
	$temp = array();
	foreach($matches[0] as $match){
		if(!in_array($match,$temp)){
			$temp[$match] = $temp[$match] + 1;
			if($temp[$match] >= $arr[$word])
				return true;
		}
	}
	return false;
}

$file = 'spam.txt';
$str = 'This string has cat, dog word';
if(is_spam($str, $file))
	echo 'this is spam';
else
	echo 'this is not spam';
ab:3
dog:3
cat:2
monkey:2

// 随机颜色生成器
function randomColor(){
	$str = '#';
	for($i = 0; $i < 6; $i++){
		$randNum = rand(0,15);
		switch($randNum){
			case 10: $randNum = 'A';break;
			case 11: $randNum = 'B';break;
			case 12: $randNum = 'C';break;
			case 13: $randNum = 'D';break;
			case 14: $randNum = 'E';break;
			case 15: $randNum = 'F';break;
		}
		$str .= $randNum;
	}
	return $str;
}
$color = randomColor();

// 裁剪图片

$filename= "test.jpg";
list($w, $h, $type, $attr) = getimagesize($filename);
$src_im = imagecreatefromjpeg($filename);
$src_x = '0';   // begin x
$src_y = '0';   // begin y
$src_w = '100'; // width
$src_h = '100'; // height
$dst_x = '0';   // destination x
$dst_y = '0';   // destination y
$dst_im = imagecreatetruecolor($src_w, $src_h);
$white = imagecolorallocate($dst_im, 255, 255, 255);
imagefill($dst_im, 0, 0, $white);
imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);
header("Content-type: image/png");
imagepng($dst_im);
imagedestroy($dst_im);

超级简单的页面缓存 
如果你的工程项目不是基于 CMS 系统或框架，打造一个简单的缓存系统将会非常实在。下面的代码很简单，但是对小网站而言能切切实实解决问题。

// difine the path and name of cached file
$cachefile = 'cached-files/'.date('M-d-Y').'.php';
// define how long we want to keep the file in seconds. I set mine to 5 hours.
$cachetime = 18000;
// Check if the cached file is still fresh. If it is, serve it up and exit.
if (file_exists($cachefile)&&time() - $cachetime < filemtime($cachefile)){
	include($cachefile);
	exit;
}
// if there is either no file OR the file to too old, render the page and capture the HTML
ob_start();
?>
<html> 
output all your html here. 
</html> 
<?php 
// We're done! Save the cached content to a file 
$fp = fopen($cachefile, 'w'); 
fwrite($fp, ob_get_contents()); 
fclose($fp); 
// finally send browser output 
ob_end_flush(); 
?> 




