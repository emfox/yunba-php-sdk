<?php
//引入API库
require "../yunba.php";

//构造实例
$yunba = new Yunba(array(
	"appkey" => "535f78721a88e6c860569ac6"
));

//初始化
$yunba->init(function ($success) {
	echo "[YunBa]init " . ($success ? "success" : "fail") . "\n";
});

//连接
$yunba->connect(function ($success) {
	if ($success) {
		echo "[YunBa]connect success\n";
	}
	else {
		echo "[YunBa]connect fail\n";
	}
});

//等待连接完毕
sleep(1);

//设置别名alias1
$yunba->set_alias(array(
	"alias" => "alias1"
), function ($success) {
	echo "[Yunba]set alias to alias1 " . ($success ? "success" : "fail") . "\n";
}, function ($data) {
	echo "[YunBa]received " . var_export($data, true) . "\n";
});

//获取当前别名
$yunba->get_alias(function($alias){
	echo "[YunBa]current alias is " . $alias . "\n";
});


//发布消息到alias1
$yunba->publish_to_alias(array(
	"alias" => "alias1",
	"msg" => "Hello,World"
), function ($success) {
	echo "[YunBa]publish to alias1 " . ($success ? "success" : "fail") . "\n";
});

//等待通讯
$yunba->wait();

?>