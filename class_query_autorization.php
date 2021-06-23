<?php

class class_autorization_query
{
    
    public function ip_address_user ()
    {
        $ip=$_SERVER["REMOTE_ADDR"];
        return $ip;
    }
    
    public function auntification_user ()
    {
        $auntification=$_SERVER["REMOTE_USER"];
        return $auntification;
    }
    
    public function port_user ()
    {
         $port=$_SERVER["SERVER_PORT"];
        return $port;
    }
    
     public function url_user ()
    {
        $url=$_SERVER["REQUEST_URI"];
        return $url;
    }
    
    public function get_autorizin_user ()
    {
        $auto_user=$_SERVER["PHP_AUTH_DIGEST"];
        return $auto_user;
    }
    
    
     public function get_name_user ()
    {
        $name_user=$_SERVER["PHP_AUTH_USER"];
        return $name_user;
    }
    
    
    public function get_brower ()
    {
        
        $brower_user=$_SERVER["HTTP_USER_AGENT"];
        return $brower_user;
    }
    
    public function mail_post($mail_user,$title_user,$message_user,$coding)
    {
        
        /*$to  = 'vitaly0297@mail.ru';
        $subject = 'Заголовок';
        $message = '
        <html>
        <head>
        <title>Заголовок</title>
        </head>
        <body>
        <p>Привет!</p>
        </body>
        </html>
        ';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=windows-1251' . "\r\n";
        $headers .= 'From: Reminder <Reminder@example.com>' . "\r\n";

        mail($to, $subject, $message, $headers);
        */
        
        if(mail($mail_user, $title_user, $message_user,$coding))
        {
            echo "<br />";
            echo "<h2 style='color: green'>Письмо отправлено на почту: $mail_user</h2>";
        }
        else
        {
            echo "<br />";
            echo "<h2 style='color: red'>Ошибка письмо не отправелось на почту: $mail_user</h2>";
        }
    }
    
    public function mail_post_return_bool($mail_user,$title_user,$message_user,$coding)
    {
        if(mail($mail_user, $title_user, $message_user,$coding))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    public function security_query($info)
    {
        $term=  strip_tags(substl($info,0,100));
        $term=  mysql_real_escape_string($term);      
        return $term;
    }
    
    public function security_password ($password)
    {
        $passwordHash = password_hash('secret-password', PASSWORD_DEFAULT);
        if (password_verify('bad-password', $passwordHash)) {
        //Правильный пароль
        } else {
        //Неправильный пароль
        echo "<h1 style='color: red'Не верный пароль!></h1>";
        }
        
        return $passwordHash;
    }
    
    /////////Router//////////////
    private $url=array();
    public function router_add($url)
    {
        $this->url[]=$url;
    }
    
    public function submit()
    {
        $url=  isset($_GET['url']) ? $_GET['url'] : '/';
        
        //$_REQUEST['url'];
    }
}




?>

