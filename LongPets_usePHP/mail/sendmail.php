<?php
require "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
require 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
class Mailer {
        public function dathangmail($tieude, $noidung, $nguoinhanmail){
                $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
                try {
                $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
                        $nguoigui = 'truonghoanglong588@gmail.com';
                        $matkhau = 'grkaaxhoeradbtop';
                        $tennguoigui = 'Long Pets';
                $mail->Username = $nguoigui; // SMTP username
                $mail->Password = $matkhau;   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom($nguoigui, $tennguoigui ); 
                // $to = "truonghoanglong58@gmail.com";
                $to_name = "";
                
                $mail->addAddress($nguoinhanmail, $to_name); //mail và tên người nhận  
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = $tieude;      
                // $noidungthu = "<b>Chào bạn!</b><br>Chúc an lành!" ;
                $mail->Body = $noidung;
                $mail->smtpConnect( array(
                        "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                        )
                ));
                $mail->send();
                echo 'Đã gửi mail xong';
                } catch (Exception $e) {
                echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
                }
        }
}