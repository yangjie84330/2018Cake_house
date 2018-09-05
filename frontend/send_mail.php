<?php
$to      = "meimei84330@gmail.com";

  		$header  = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
  		$header .= "From: service@gmail.com";

  		$subject = "[Cake House] 客戶意見";
  		$body    = "您有一封來自".$_POST['name']."公司的客戶意見,<br><br>";
  		$body   .= "內容如下<br>";
  		$body   .= "<table>
                    <tr><td>公司名稱:</td><td>".$_POST['name']."</td></tr>
                    <tr><td>聯絡人:</td><td>".$_POST['name']."</td></tr>
                    <tr><td>聯絡電話:</td><td>".$_POST['phone']."</td></tr>
                    <tr><td>E-mail:</td><td>".$_POST['email']."</td></tr>
                    <tr><td>詢問內容:</td><td>".$_POST['message']."</td></tr>
                    </table><br>";
  		$body   .= "請您盡快與客戶聯繫";

          $mei= mail($to, $subject, $body, $header);
          
          $to1      = $_POST['email'];

  		$header1  = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
  		$header1 .= "From: service@gmail.com";

  		$subject1 = "[Cake House] 回復意見";
  		$body1   = "您有一封來自Cake House 公司的客戶意見,<br><br>";
  		$body1   .= "內容如下<br>";
  		$body1   .= "收到您的意見，請等候管理員回覆。";

          mail($to1, $subject1, $body1, $header1);
          
          if($mei){
            header('Location:contact.php');

          }
?>