<?php

$file = new SplFileInfo("tmp.txt");

echo "File is created at ". date("Y-m-d H:i:s", $file->getCTime())."\n";
echo "File is modified at ". date("Y-m-d H:i:s", $file->getMTime())."\n";

echo "File size is ".$file->getSize()."bytes\n";

//读取文件里面的内容
$fileObj = $file->openFile("r");
while ($fileObj->valid()) {
	// fgets函数获取文件里面的一行数据
    echo $fileObj->fgets();
}
// 用于关闭打开的文件
$fileObj = null;
$file = null;

