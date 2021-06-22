<?php
/*
 Класс запросов удаление, чтение, добавление , поиск по id 
 */

class Query_bd extends func
{
    public function lang_query_1251()
    {
        $bd_query="SET NAMES cp1251";
        return $bd_query;
    }
    
    public function lang_query_utf_8()
    {
        $bd_query="SET NAMES 'utf8'";
        return $bd_query;
    }
    
    public function lang_query_utf_8_full()
    {
        $bd_query="SET NAMES 'utf8'";
        //$bd_query_1="SET CHARACTER SET 'utf8'";
        //$bd_query_1="SET SESSION collation_connection = 'utf8_general_ci'";
        return $bd_query;
    }

        public function read_bd ($table)
    {
        $bd_query="SELECT * FROM $table";
        return $bd_query;
    }
    public function read_bd_weald ($weald,$table)
    {
        $bd_query="SELECT $weald FROM $table";
        return $bd_query;
    }
    
    public function insert_bd($table,$weald,$weald_info)
    {
        $bd_query="INSERT INTO $table ($weald) VALUES ($weald_info)";
        return $bd_query;
    }
    
    public function insert_bd_weald($table,$weald_weald_info)
    {
        $bd_query="INSERT INTO $table SET $weald_weald_info";
        return $bd_query;
    }

       
    
    ////////////////////обновление данных////////////////
    public function update_base_bd($table,$weald_weald_row,$if_weald_weald_row)
    {
        $bd_query="UPDATE $table SET $weald_weald_row WHERE $if_weald_weald_row";
        return $bd_query;
    }
    
    
    public function update_site($php_file)
    {
        echo "<script type='text/javascript'>
        location.href='$php_file';
        </script>";

    }
    /////////////////////////////////////////////////////
    
    ////////////////Удаление данных//////////////////
    public function delete_bd($table,$weald,$weald_row)
    {
        $bd_query="DELETE FROM $table WHERE $weald="."'".$weald_row."'";
        return $bd_query;
    }
    /////////////////////////////////////////////////
    
    
    /////////////Запрос на потвирждение///////////////
    public function msg_ok ($info)
    {
        echo "<script>alert(\"$info\")</script>";
    }
    public function msg_ok_no ($info,$info_ok,$info_no)
    {
        echo "<script>"
        . "var x=confirm(\"$info\")"
                ."if(x==true)"
                ."{alert(\"$info_ok\")}"
                ."else" 
                ."{alert(\"$info_no\")}"  
                . "</script>";
    }
    
    public function msg_ok_no2 ($info)
    {
        $query="return confirm('$info');";
        return $query;
    }
    //////////////////////////////////////////////////
}
