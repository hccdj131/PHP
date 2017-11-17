<?php

// 从数组中删除空白的元素（包括只有空白字符的元素）将一个二维数组转换为 hashmap 

/**
 * 从数组中删除空白的元素（包括只有空白字符的元素）
 *
 * @param array $arr
 * @param boolean $trim
 */

function array_remove_empty(&$arr, $trim = true)
{
	foreach ($arr as $key => $value){
		if(is_array($value)){
			array_remove_empty($arr[$key]);
		} else {
			$value = trim($value);
			if ($value == ''){
				unset($arr[$key]);
			} elseif ($trim) {
				$arr[$key] = $value;
			}
		}
	}
}

/**
 * 将一个二维数组转换为 hashmap
 * 如果省略 $valueField参数，则转换结果每一项为包含该项所有数据的数组。
 *
 * @param array $arr
 * @param string $keyField
 * @param string $valueField
 *
 * @return array
 */
function array_to_hasmap(& $arr, $keyField, $valueField = null)
{
	$ret = array();
	if($valueField){
		foreach ($arr as $row){
			$ret[$row[$keyField]] = $row[$valueField];
		}
	} else {
		foreach ($arr as $row) {
			$ret[$row[$keyField]] = $row;
		}
	}
	return $ret;
}