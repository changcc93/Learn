<?php

$nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
$phone1 = isset($_POST['phone1']) ? $_POST['phone1'] : '';
$phone2 = isset($_POST['phone2']) ? $_POST['phone2'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';

date_default_timezone_set("Asia/Taipei"); 
//時區設定顯示正確時間，一定要寫在時間code之前，才能有作用

$now = date('Y-m-d H:i:s', time());


$data = <<< HEREDOC
時間：{$now}
姓名：{$nickname}
電話：{$phone1}{$phone2}
電子信箱：{$email}
內容：{$comment}
---------------------------------------------------------

HEREDOC;

// 寫入資料指令，並讓資料往下累加
/*
file_put_contents('data.txt', $data, FILE_APPEND);   // (檔案, 檔名, 讓資料累加)
*/

// 每天存到不同的檔案，依每天日期建檔，並讓資料往下累加 (避免檔案過大) (先建新folder: save)
/*
$filename = 'save/data_'. date('Ymd',time()) .'.txt'; 
file_put_contents($filename, $data, FILE_APPEND);
*/


// 最新的留言要置於前面，並且每天存到不同的檔案
$filename = 'save/data_'. date('Ymd',time()) .'.txt';

if(!file_exists($filename))   // file_exists()函式，檢查這個檔案是否存在，if / ! →如果不存在
{
     file_put_contents($filename, '');  // file_put_contents(檔案, 檔名) :資料寫入檔案指令
}                                       // file_get_contents(檔案, 檔名) :讀取檔案指令

$old = @file_get_contents($filename);       // 取得檔案前面加 @ ，當data錯誤時不會存入
$savedata = $data . $old;                   // 新的資料 (.連接) 舊的資料
file_put_contents($filename, $savedata);   // (檔案, 檔名)


// 同時寄送 email 功能
/* 
注意要在 php.ini 裡進行設定 (隨網路環境有關) (php.ini這個檔案裡有";"的代表被註解掉)
smtp = msa.hinet.net 
sendmail_from = admin@example.com 
*/ 

//mail('doris.hps@gmail.com', 'Test PHP 收到意見', $data);

//mail('doris.hps@gmail.com', 'Test PHP 收到意見', $data); 


$html = <<< HEREDOC
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	body{background-color: #83c9db;
	font-family: 微軟正黑體;
	color: #308196;
	font-size:32px;}
	p{text-align:center;}
	</style>
</head>

<body>
<p>謝謝，已經收到您的來信，將於3個工作天內，由電子郵件方式回覆您。</p>
<p>&nbsp;</p>
</body>
</html>
HEREDOC;

echo $html;
?>