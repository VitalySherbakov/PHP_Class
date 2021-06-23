<?php
include "function/PHPMailer-master/class.smtp.php";

include "function/PHPMailer-master/class.phpmailer.php";    
//$obj_mail_dll_2=new PHPMailer();  

include "function/PHPMailer-master/PHPMailerAutoload.php";    
//$obj_mail_dll=new PHPMailer(); 

function mail_dll_post3($my_mail,$my_login_mail,$my_password_mail,$my_name_mail,$mail_post,$mail_title,$mail_text)
{
    $obj_mail_dll_2=new PHPMailer(); 
    //$obj_mail_dll_2->isSMTP();
    $obj_mail_dll_2->Host='smtp.mail.ru';
    $obj_mail_dll_2->SMTPAuth=TRUE;
    $obj_mail_dll_2->Username=$my_login_mail; // логин от вашей почты
    $obj_mail_dll_2->Password=$my_password_mail; // пароль от вашей почты
    $obj_mail_dll_2->SMTPSecure='ssl';
    $obj_mail_dll_2->Port='465';
    $obj_mail_dll_2->From=$my_mail;
    $obj_mail_dll_2->FromName=$my_name_mail;
    $obj_mail_dll_2->CharSet='UTF-8';
     
    $obj_mail_dll_2->SMTPDebug = 1;
    
    /////////формат письма/////////
    //$obj_mail_dll_2->isHTML(TRUE);
    $obj_mail_dll_2->Subject=$mail_title;
    $obj_mail_dll_2->Body=$mail_text;
    $obj_mail_dll_2->AltBody=$mail_text; // алтернативный
        
    /////кому отправлять письмо/////////
    $obj_mail_dll_2->addAddress($mail_post);
    
    ////////отповляем письмо/////////
        if($obj_mail_dll_2->send()==TRUE)
    {
        //echo "<br />";
        //echo "<h2 style='color: green'>Письмо отправлено на почту: $mail_post</h2>";
        $post_email_send="Письмо отправлено на почту: $mail_post\n";
    }
    else 
    {
        //echo "<br />";
        //echo "<h2 style='color: red'>Письмо не отправлено</h2>";
        //echo "<h2 style='color: red'>Ошибка: ".$obj_mail_dll->ErrorInfo."</h2>";
        //echo "<br />";
        $error_post_email_send="Письмо не отправлено\nОшибка: ".$obj_mail_dll_2->ErrorInfo."\n";
    }
    
    $obj_mail_dll_2->clearAddresses();
    $obj_mail_dll_2->clearAttachments();
    /////////////////////////////////
}


function mail_dll_post2($my_mail,$my_login_mail,$my_password_mail,$my_name_mail,$mail_post,$mail_title,$mail_text)
{
    $obj_mail_dll_2=new PHPMailer(); 
    $obj_mail_dll_2->Host='smtp.mail.ru';
    $obj_mail_dll_2->SMTPAuth=TRUE;
    $obj_mail_dll_2->Username=$my_login_mail; // логин от вашей почты
    $obj_mail_dll_2->Password=$my_password_mail; // пароль от вашей почты
    $obj_mail_dll_2->SMTPSecure='ssl';
    $obj_mail_dll_2->Port='465';
    $obj_mail_dll_2->From=$my_mail;
    $obj_mail_dll_2->FromName=$my_name_mail;
    $obj_mail_dll_2->CharSet='UTF-8';
            
    /////////формат письма/////////
    $obj_mail_dll_2->isHTML(TRUE);
    $obj_mail_dll_2->Subject=$mail_title;
    $obj_mail_dll_2->Body=$mail_text;
    $obj_mail_dll_2->AltBody=$mail_text; // алтернативный
        
    /////кому отправлять письмо/////////
    $obj_mail_dll_2->AddAddress($mail_post,$my_name_mail);
    
    ////////отповляем письмо/////////
        if($obj_mail_dll_2->send()==TRUE)
    {
        //echo "<br />";
        //echo "<h2 style='color: green'>Письмо отправлено на почту: $mail_post</h2>";
        $post_email_send="Письмо отправлено на почту: $mail_post\n";
    }
    else 
    {
        //echo "<br />";
        //echo "<h2 style='color: red'>Письмо не отправлено</h2>";
        //echo "<h2 style='color: red'>Ошибка: ".$obj_mail_dll->ErrorInfo."</h2>";
        //echo "<br />";
        $error_post_email_send="Письмо не отправлено\nОшибка: ".$obj_mail_dll_2->ErrorInfo."\n";
    }
    
    $obj_mail_dll_2->clearAddresses();
    $obj_mail_dll_2->clearAttachments();
    /////////////////////////////////
}

function mail_dll_post($my_mail,$my_login_mail,$my_password_mail,$my_name_mail,$mail_post,$mail_title,$mail_text)
{
    $obj_mail_dll=new PHPMailer(); 
    $obj_mail_dll->Host='smtp.mail.ru';
    $obj_mail_dll->SMTPAuth=TRUE;
    $obj_mail_dll->Username=$my_login_mail; // логин от вашей почты
    $obj_mail_dll->Password=$my_password_mail; // пароль от вашей почты
    $obj_mail_dll->SMTPSecure='ssl';
    $obj_mail_dll->Port='465';
    $obj_mail_dll->From=$my_mail;
    $obj_mail_dll->FromName=$my_name_mail;
    $obj_mail_dll->CharSet='UTF-8';
            
    /////////формат письма/////////
    $obj_mail_dll->isHTML(TRUE);
    $obj_mail_dll->Subject=$mail_title;
    $obj_mail_dll->Body=$mail_text;
    $obj_mail_dll->AltBody=$mail_text; // алтернативный
        
    /////кому отправлять письмо/////////
    $obj_mail_dll->AddAddress($mail_post,$my_name_mail);
    
    ////////отповляем письмо/////////
        if($obj_mail_dll->send()==TRUE)
    {
        //echo "<br />";
        //echo "<h2 style='color: green'>Письмо отправлено на почту: $mail_post</h2>";
        $post_email_send="Письмо отправлено на почту: $mail_post\n";
    }
    else 
    {
        //echo "<br />";
        //echo "<h2 style='color: red'>Письмо не отправлено</h2>";
        //echo "<h2 style='color: red'>Ошибка: ".$obj_mail_dll->ErrorInfo."</h2>";
        //echo "<br />";
        $error_post_email_send="Письмо не отправлено\nОшибка: ".$obj_mail_dll->ErrorInfo."\n";
    }
    
    $obj_mail_dll->clearAddresses();
    $obj_mail_dll->clearAttachments();
    /////////////////////////////////
}
?>

