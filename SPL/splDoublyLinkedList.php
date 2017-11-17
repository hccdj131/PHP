<?php

$obj = new SplDoublyLinkedList();

// 把新的节点数据添加到链表的顶部（Top）
$obj->push(1); 
$obj->push(2);
$obj->push(3);

// 把新的节点数据添加到链表的底部（Bottom）
$obj->unshift(10); 
$obj->unshift(88); 

print_r($obj);
// rewind操作用于把节点指针指向Bottom所在的节点
$obj->rewind();
//获取节点指针指向的节点（当前节点）
echo 'current: ' . $obj->current() . "\n";

//使指针指向下一个节点（靠近Top方向）
$obj->next();
echo 'next node: ' . $obj->current() . "\n";
$obj->next();
$obj->next();
//使指针指向上一个节点（靠近Bottom方向）
$obj->prev();
echo 'current: ' . $obj->current() . "\n";
$obj->next();
$obj->next();
$obj->next();
$obj->next();
echo 'current: ' . $obj->current() . "\n";

if($obj->current())
	echo "Current node valid\n";
else
	echo "Current node invalid\n";

$obj->rewind();
//如果当前节点是有效节点，valid返回true
if($obj->valid())
	echo "valid list\n";
else
	echo "invalid list\n";

// 把Top位置的节点从链表中删除，并返回。如果current正好指向Top位置，那么调用pop之后current会失效
echo "Pop value:" . $obj->pop() . "\n";
print_r($obj);
echo 'next node: ' .$obj->current() . "\n";

//把Bottom位置的节点从链表中删除，并返回。
$obj->shift();
print_r($obj);
?>