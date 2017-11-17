<?php

event_base_free() 　　　　释放资源，这不能销毁绑定事件
　　event_base_loop() 　　　　处理事件，根据指定的base来处理事件循环
　　event_base_loopbreak() 　　　　立即取消事件循环，行为和break语句相同
　　event_base_loopexit() 　　　　在指定的时间后退出循环
　　event_base_new() 　　　　创建并且初始事件
　　event_base_priority_init() 　　　　设定事件的优先级
　　event_base_set() 　　　　关联事件到事件base
　　event_buffer_base_set() 　　　　关联缓存的事件到event_base
　　event_buffer_disable() 　　　　禁用一个缓存的事件
　　event_buffer_enable() 　　　　启用一个指定的缓存的事件
　　event_buffer_fd_set() 　　　　改变一个缓存的文件系统描述
　　event_buffer_free() 　　　　释放缓存事件
　　event_buffer_new() 　　　　建立一个新的缓存事件
　　event_buffer_priority_set()　　 　　缓存事件的优先级设定
　　event_buffer_read() 　　　　读取缓存事件中的数据
　　event_buffer_set_callback() 　　　　给缓存的事件设置或重置回调hansh函数
　　event_buffer_timeout_set() 　　　　给一个缓存的事件设定超时的读写时间
　　event_buffer_watermark_set 　　　　设置读写事件的水印标记
　　event_buffer_write() 　　　　向缓存事件中写入数据
　　event_add() 　　　　向指定的设置中添加一个执行事件
　　event_del() 　　　　从设置的事件中移除事件
　　event_free() 　　　　清空事件句柄
　　event_new()　　　　 创建一个新的事件
　　event_set() 　　　　准备想要在event_add中添加事件

 
event_set一些参数的解释：
　(a) EV_TIMEOUT: 超时
    (b) EV_READ: 只要网络缓冲中还有数据，回调函数就会被触发
    (c) EV_WRITE: 只要塞给网络缓冲的数据被写完，回调函数就会被触发
    (d) EV_SIGNAL: POSIX信号量
    (e) EV_PERSIST: 不指定这个属性的话，回调函数被触发后事件会被删除
    (f) EV_ET: Edge-Trigger边缘触发

作者：烈日融雪
链接：http://www.jianshu.com/p/9619d4b265ea
來源：简书
著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。

$socket = stream_socket_server("tcp://0.0.0.0:2000", $errno, $errstr);

$base = event_base_new();
$event = event_new();

event_set($event, $socket, EV_READ | EV_PERSIST, 'accept_cb', $base);
event_base_set($event, $base);
event_add($event);
event_base_loop($base);

function read_cb($buffer)
{
	static $ct = 0;
	$ct_last = $ct;
	$ct_data = '';
	while ($read = event_buffer_read($buffer, 1021)) {
		$ct += strlen($read);
		$ct_data .= $read;
	}

	$ct_size = ($ct - $ct_last) * 8;
	echo "client say : " .$ct_data . PHP_EOL;
	event_buffer_write($buffer, "Received $ct_size byte data");
}

function write_cb($buffer)
{
	echo "我在打酱油" . PHP_EOL;
}

function error_cb($buffer, $error)
{
	// 客户端断开连接之后，清除
	event_buffer_disable($GLOBALS['buffer'], EV_READ | EV_WRITE);
	event_buffer_free($GLOBALS['buffer']);
	fclose($GLOBALS['connection']);
	unset($GLOBALS['buffer'], $GLOBALS['connection']);
}

function accept_cb($socket, $flag, $base)
{
	$connection = stream_socket_accept($socket);
	stream_set_blocking($connection, 0);

	$buffer = event_buffer_new($connection, 'read_cb', 'write_cb', 'error_cb');
	event_buffer_base_set($buffer, $base);
	event_buffer_timeout_set($buffer, 30, 30);
	event_buffer_watermark_set($buffer, EV_READ, 0, 0xffffff);
	event_buffer_priority_set($buffer, 10);
	event_buffer_enable($buffer, EV_READ | EV_PERSIST);

	// 必须将 $connection 和 $buffer 赋值给一个全局变量，否则无法生效
	$GLOBALS['connection'] = $connection;
	$GLOBALS['buffer'] = $buffer;
}