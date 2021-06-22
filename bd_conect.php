<?php

/*
 Класс подключения базы данных, и выполнения запросов, и вывод ошибок
 */

class bd_conect extends func 
{
    private function error_bd_conect ($bd,$bd_base)
    {
        if(!$bd)
        {
            $this->enter();
            $error_1="Ошибка сойденения: ".  mysql_error();
            echo "<h2 style='color:red'><b>$error_1</b></h2>";
        }
        if (!$bd_base)
        {
            $this->enter();
            $error_2="Ошибка выбора базы: ".mysql_error();
            echo "<h2 style='color:red'><b>$error_2</b></h2>";
        }
    }
    private function error_bd_query($sql_query)
    {
        if(!$sql_query)
        {
            $this->enter();
            $error_query="Ошибка выполнения запроса: ".mysql_error();
            echo "<h2 style='color:red'><b>$error_query</b></h2>";
        }
    }
    public function bd_conect_base_notreturnconect ($host,$username,$password,$basename,$tablename)
    {
       //сойденение с БД
       $bd=  @mysql_connect($host,$username,$password);
       //выбор БД 
       $bd_base = @mysql_select_db($basename,$bd);       
       /////////Ошибки/////////
       $this->error_bd_conect($bd, $bd_base);
       ////////////////////////
    }
    
    public function bd_conect_base_returnconect ($host,$username,$password,$basename,$tablename)
    {
       //сойденение с БД
       $bd = @mysql_connect($host,$username,$password);
       //выбор БД 
       $bd_base=  @mysql_select_db($basename,$bd);  
       
       /////////Ошибки/////////
       $this->error_bd_conect($bd, $bd_base);        
       ////////////////////////
       return $bd;
    }
    
    public function bd_query_base($sql_query)
    {
        //Выполняем запрос SQL
        $rs=@mysql_query($sql_query);
        /////////Ошибки/////////
        $this->error_bd_query($rs);
        ////////////////////////
    }
    
    public function bd_query_base_conect($sql_query,$bd)
    {
        //Выполняем запрос SQL
        $rs=@mysql_query($sql_query,$bd);       
        /////////Ошибки/////////
        $this->error_bd_query($rs);
        ////////////////////////
    }
    
    public function bd_query_base_read_returnquery($sql_query)
    {
        //Выполняем запрос SQL
        $rs=@mysql_query($sql_query);
        
        /////////Ошибки/////////
        $this->error_bd_query($rs);
        ////////////////////////
        return $rs;
    }
    public function bd_query_base_read_returnqueryconect($sql_query,$bd)
    {
        //Выполняем запрос SQL
        $rs=@mysql_query($sql_query,$bd);
        
        /////////Ошибки/////////
        $this->error_bd_query($rs);
        ////////////////////////
        return $rs;
    }
    public function bd_close()
    {
        mysql_close();
    }
    public function bd_close_name($bd)
    {
        mysql_close($bd);
    }
    
    
    
    ///////тестовая БД/////////////////////////////////////////////////
    public function bd_conection_base_test($host,$username,$password,$basename,$tablename)
    {
        $bd = @mysql_connect($host,$username,$password);        
        $this->bd_error($bd);
        return $bd;
    }
    
    private function bd_error($bd)
    {
        if(!$bd)
        {
            echo "Ошибка сойдинения с базой: ".  mysql_error();
        }
    }
    /////////////////////////////////////////////////////////////////////   
    
    
    ////////////////////цикл вывода//////////////////////
    public function while_error_read($query)
    {
      
       if(!$myrow=mysql_fetch_array($query))
       {
           echo "<h1 style='color:red'>Ошибка цикла: $myrow</h1>";
       }
       
    }
    /////////////////////////////////////////////////////
    

}
