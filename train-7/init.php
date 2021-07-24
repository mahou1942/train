<?php

header("Content-type:text/html;charset=utf-8");


function jump($url, $info=NULL, $time=2) {
	if($info == NULL) {
		// 说明是直接跳转
		header("location:$url");
		die;
	}else {
		// 说明是刷新跳转
		header("refresh:$time;url=$url");
		die("$info");
	}
}
