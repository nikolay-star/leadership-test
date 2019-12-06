<?php
$subject = "Результаты теста";
$email=$_POST['email'];
$name=$_POST['name'];
$position=$_POST['position'];
$result_1=$_POST['result_1'];
$result_2=$_POST['result_2'];
$result_3=$_POST['result_3'];
$recipients = array(
  "test@activateleadership.net",
  $email
  // more emails
);
$to = implode(',', $recipients);

$htmlContent = '
<html>
<body style="text-align: center">
<h1 style="text-align: center">Результаты теста</h1>';

$htmlContent .= '<p>Пользователь: ' . $name . ', ' . $position . '<br> ' . $email . '</p>';

$htmlContent .= '<br><br><h2 style="text-align: center">Мои стили руководства</h2>';
$htmlContent .= '<img src="' .$result_1 .'" style="width: 600px"/>';
$htmlContent .= '<br><br><h2 style="text-align: center">Индивидуальный консалтинг</h2>';
$htmlContent .= '<img src="' .$result_2 .'" style="width: 600px"/>';
$htmlContent .= '<br><br><h2 style="text-align: center">Индекс несоответствия стилей руководства</h2>';
$htmlContent .= '<img src="' .$result_3 .'" style="width: 600px"/>';

$htmlContent .= '
</body>
</html>';

// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: Activate Leadership<test@activateleadership.net>' . "\r\n";

// Send email
if(mail($to,$subject,$htmlContent,$headers)):
$successMsg = 'Email has sent successfully.';
else:
$errorMsg = 'Email sending fail.';
endif;
?>