<?php
    
    /*
    $my_mail='vitaly0297@mail.ru';
    $my_login_mail='vitaly0297';
    $my_password_mail='hfhjkfg82334f';
    $my_name_mail='Витька';
    
    ///отправляем///
    $mail_post='';
    $mail_title='Тема письма';
    $mail_text='<h2>Текст письма</h2>';
    */
    
    include "function/PHPMailer-master/PHPMailerAutoload.php";    
    $obj_mail_dll=new PHPMailer();    
        
    function mail_dll_post ($my_mail,$my_login_mail,$my_password_mail,$my_name_mail,$mail_post,$mail_title,$mail_text,$bool_file,$filepath_old,$file_new)
    {
    
    
           
    //$haders="Content-type: text/plain; Charset=utf-8";
    $obj_mail_dll->isSMTP();
    $obj_mail_dll->Host='smtp.mail.ru';
    $obj_mail_dll->SMTPAuth=TRUE;
    $obj_mail_dll->Username=$my_login_mail; // логин от вашей почты
    $obj_mail_dll->Password=$my_password_mail; // пароль от вашей почты
    $obj_mail_dll->SMTPSecure='ssl';
    $obj_mail_dll->Port='465';
    $obj_mail_dll->From=$my_mail;
    $obj_mail_dll->FromName=$my_name_mail;
    $obj_mail_dll->CharSet='UTF-8';
    
    /////кому отправлять письмо/////////
    $obj_mail_dll->addAddress($mail_post,$my_name_mail);
    
    // обезательно к прочтению тому кто отправлял
    //$obj_mail_dll->ConfirmReadingTo='you@youdomain.com';
    ////////////////////////////////////
    
    /////////Что шлем//////////////
    $obj_mail_dll->isHTML(TRUE);
    $obj_mail_dll->Subject=$mail_title;
    $obj_mail_dll->Body=$mail_text;
    $obj_mail_dll->AltBody=$mail_text; // алтернативный
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
    /////////////////////////////////
    
    ////////////////вложением файлов///////////////
    try 
    {
        
    
    $obj_mail_dll->clearAddresses();
    $obj_mail_dll->clearAttachments();
    if($bool_file==1)
    {
    if(file_exists($filepath_old)==TRUE)
    {
      $file=$obj_mail_dll->AddAttachment($filepath_old,$file_new);
      if(!$file)
      {
        //echo "<br />";
        //echo "<h2 style='color: red'>Прикрепление не выполнилось:\n $file</h2>";
        //echo "<br />";
        $error_post_email_file="Прикрепление не выполнилось:\n $file\n";
      }
    }
    else
    {
        //echo "<br />";
        //echo "<h2 style='color: red'>Файла для прикрепления, и отпраки письма на почту, нету по такому пути:\n $filepath_old</h2>";
        //echo "<br />";
        $error_post_email_file_exist_not="Файла для прикрепления, и отпраки письма на почту, нету по такому пути:\n $filepath_old\n";
    }
    }
    }
    catch (Exception $ex)
    {
      //echo "<br />";
      //echo "<h2 style='color: red'>Ошибка крипления: $ex->getMessage()</h2>";
      //echo "<br />";
      $error_post_email_file_add="Ошибка крипления: $ex->getMessage()"."\n";
    }
    ///////////////////////////////////////////////
    
    
    }
     

?>

