<?php
$m = new Memcached();

$array = array(
        array('127.0.0.1',11211),
        array('127.0.0.2',11211),
    );

$m->addServers($array);

print_r($m->getVersion());

$m->add('mkey','mvalue',600);
$m->add('mkey','mvalue2',600);
$m->replace('mkey','mvalue2',600);

$->set('mkey','mvalue',600);

$m->delete('mkey');
// 清除所有缓存，慎用
$->flush();

$m->set('num',5,0);

$data = array(
        'key' => 'value',
        'key2' => 'value2',
    );
$m->setMulti($data,0);

$m->getMulti(array('key','key2'));
$m->deleteMulti(array('key','key2'));

echo $m->getResultCode();
echo $m->getResultMessage();


$m->increment('num',5);


echo $m->get('mkey');

