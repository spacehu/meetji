<?php 
	/*
	*基本数据类包
	*类
	*发送邮件用
	*
	*/
	class MailDAL{
		//默认方法
		function __construct(){
			require_once("./lib/phpmailer/class.phpmailer.php");
		}
		/*
		* 执行邮件发送的方法
		* fromInfo提供发件人信息
		* maildetail提供邮件内容
		*/
		function mailTo($fromInfo,$maildetail){
			if(!empty($fromInfo["out_put_email"])){
				$mail = new PHPMailer();
				$mail->CharSet="utf-8";
				$mail->IsSMTP();
				$mail->SMTPSecure="ssl";
				$mail->Host = $fromInfo['out_put_server']; // SMTP servers
				$mail->Port = $fromInfo['out_put_ssl'];
				$mail->SMTPAuth = true; // turn on SMTP authentication
				$mail->IsHTML(true);//开启html格式
				
				$mail->Username = $fromInfo['out_put_email']; // SMTP username
				$mail->Password = $fromInfo['out_put_password']; // SMTP password
	//			$mail->SMTPDebug  = 2; 
				
				$mail->From = $fromInfo['out_put_email']; //从哪里发来
				$mail->FromName = $fromInfo['company_name']; //从哪里发来
				
				$mail->AddAddress($maildetail['user_email'],$maildetail['user_name']); //收件人地址
				$mail->AddCC($fromInfo['company_email'],$fromInfo['company_name']);//抄送
				$mail->AddReplyTo($fromInfo['company_email'],$fromInfo['company_name']); //对方可回复对象.
				
				$mail->Subject = $maildetail['subject'];
				$mail->Body = $maildetail['body']; //邮件正文
				//$data['con']=$mail;
				//return $mail;
				return $mail->Send();
			}else{
				//return mail();
				$to = $maildetail['user_email'];
				$subject = $maildetail['subject'];
				$body = $maildetail['body'];
				$headers = "From: ".$fromInfo['company_email']."\n";
				$headers .= "Cc: ".$fromInfo['company_email']."\n";
				$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
				return mail($to, $subject, $body, $headers);
			}
		}
	}
?>