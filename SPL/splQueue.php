<?php

$obj = new SplQueue();

//插入一个节点到队列里面的Top位置
$obj->enqueue('a');
$obj->enqueue('b');
$obj->enqueue('c');

print_r($obj);

echo 'Bottom: ' .$obj->bottom()."\n";
echo 'Top: ' .$obj->top()."\n";

// 队列里面offset=0是Bottom所在位置，offset=1是Top方向的相邻节点，以此类推
$obj->offsetSet(0,'A');

print_r($obj);

//队列里面rewind操作使得指针指向Bottom所在位置的节点
$obj->rewind();

echo 'current:'.$obj->current()."\n";

while ($obj->valid()) {
    echo $obj->key()."=>".$obj->current()."\n";
    // next操作使得当前指针指向top方向的下一个节点
    $obj->next();
}

// dequeue操作从队列中提取bottom位置的节点，并返回。同时从队列里面删除该元素。
echo 'dequeue obj:'.$obj->dequeue()."\n";
print_r($obj);

?>