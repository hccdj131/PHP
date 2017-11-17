<?php
include 'mem.class.php';

$m = new Mem();

$server = array(
    array('127.0.0.1',11211)
    );
$m->addServer($server);
$m->s('test', 'testValue', 0);
echo $m->s('test');
echo '<br />';

$m->s('test',NULL) //删除操作
echo $m->s('test');
echo $m->getError();