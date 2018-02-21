<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="css/sigup.css">
	<script language="javascript">
function check_data()
{
   var flag = true;
   
   // 各個位置的錯誤訊息
   var msg_receiver = '';
   var msg_phone = '';
   var msg_sure = '';
   var msg_mail = '';
   // 檢查收件者 (不能為空白)
   var receiver = document.getElementById('receiver');
   if( receiver.value == '' )
   {
      flag = false;
      msg_receiver = '收件者不能為空白';
   }
	
   // 檢查電話號碼 (不能為空白，且必須是數字)
   var phone1 = document.getElementById('phone1');
   if( phone1.value=='' || isNaN(phone1.value))
   {
      flag = false;
      msg_phone = '電話之區碼有誤';
   }
   
   var phone2 = document.getElementById('phone2');
   if( phone2.value=='' || isNaN(phone2.value))
   {
      flag = false;
      msg_phone += ' 用戶號碼有誤';
   }

   // 確認欄必須打勾
   var sure = document.getElementById('sure');
   if(!sure.checked)
   {
      flag = false;
      msg_sure = '確認欄必須打勾';
   }
   

   var email=document.getElementById('email');
   if( email.value=='' )
   {
      flag = false;
      msg_email = ' 電子信箱不能為空白';
   }
   // 總結處理
   if(!flag)
   {
      document.getElementById('msg_receiver').innerHTML = msg_receiver;
      document.getElementById('msg_phone').innerHTML = msg_phone;
      document.getElementById('msg_sure').innerHTML = msg_sure;
      document.getElementById('msg_email').innerHTML = msg_email;
   }
   
   return flag;
}



</script>
</head>

<body>
<header class="container-fluid">
  		<a href="index7.html" class="text-center ">MOOCS</a>
  	</header>
  	<div class="wrapper center " id="container">
<h1>課程詢問</h1>
<form id="form1" name="form1" method="post" action="save.php"onsubmit="return check_data();" >
	<p>姓名：
       <input type="text" name="nickname" id="nickname" size="25"/>
	</p>
	<p>電話：
      <input name="phone1" type="text" id="phone1" size="5" />
      <input name="phone2" type="text" id="phone2" size="17" />
      <span id="msg_phone" class="message"></span>
 	</p>
		<p>
    email:
    <input name="email" type="text" id="email" size="25" />
     <span id="msg_email" class="message"></span>
  	</p>
	<p>
      <input type="checkbox" name="sure" id="sure" />
      確認：您所提供的資料，我們僅會基於您申請事項之目的及範圍，於業務所需執行期間，<br>
		在本公司所在地區以合理方式，蒐集、處理、利用您所留下之姓名、電話等個人資料，<br>
		而在您點選「送出資料」時表示您已充分瞭解本公司之隱私權保護聲明，且同意前述內容。<br>
      <span id="msg_sure" class="message"></span>
  	</p>
  
  	<p>意見：<br>
		<textarea name="comment" id="comment" cols="45" rows="6"></textarea>		
	</p>
	<p>
		<input type="submit" name="button" id="button" value="送出" />
	</p>
	<p>感謝您的來信，我們將於3個工作天內，由電子郵件方式回覆您。</p>
</form>
<p>&nbsp;</p>	
</div>
	
</body>
</html>