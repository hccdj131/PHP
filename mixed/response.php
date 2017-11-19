<?php

class Response {
	/*
	*按json方式输出通信数据
	*@param integer $code 状态码
	*@param string $message 提示信息
	*@param array $data 数据
	*return string
	*/
	public static function json($code, $message = '', $data = arraay()) {

		if(!is_numeric($code)) {
			return '';
		}

		$result = array(
				'code'=>$code,
				'message'=>$message,
				'data'=>$data
			);

			echo json_encode($result);
			exit;		
	}

	public static function xml() {
		$xml = "<?xml version='1.0' encoding='UTF-8'?>";
		$xml.= "<root>";
		$xml.= "<code>200</code>";
		$xml.= "<message>数据返回成功</message>";
		$xml.= "<data>";
		$xml.= "<id>1</id>";
		$xml.= "<name>singwa</name>";
		$xml.= "</data>";
		$xml .= "</root>";

		echo $xml; 
	}

}

Response::json(200,'数据返回成功',$arr);

Response::xml;