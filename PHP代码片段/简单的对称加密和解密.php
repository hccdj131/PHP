<?php

/**
 * 通用加密
 * @param String $string 需要加密的字串
 * @param String $skey 加密key
 * @return String
 */

function enCode($string = '', $skey = 'echounion'){
	$skey = array_reverse(str_split($skey));
	$strArr = str_split(base64_encode($string));
	$strCount = count($strArr);
	foreach ($skey as $key => $value){
		$key < $strCount && $strArr[$key].=$value;
	}
	return str_replace('=', 'O0O0O', join('', $strArr));
}

/**
 * 通用解密
 * @param String $string 需要解密的字串
 * @param String $skey 解密KEY
 * @param String
 */
function deCode($string = '', $skey = 'echounion'){
	$skey = array_reverse(str_split($skey));
	$strArr = str_split(str_replace('O0O0O', '=', $string), 2);
	$strCount = count($strArr);
	foreach ($skey as $key => $value){
		$key < $strCount && $strArr[$key] = rtrim($strArr[$key], $value);
	}
	return base64_decode(join('', $strArr));
}