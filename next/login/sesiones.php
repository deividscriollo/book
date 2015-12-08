<?php
  class SessionDB {
    private $data=null;
    private $session_id=null;
    private $minutes_to_expire=3600; // TIME TO MAINTAIN DATA ON DB
   
    public function __construct(){
      global $SESSION;
     
      if (isset($_COOKIE['iduser'])){
        $this->session_id = $_COOKIE['iduser'];
      } else {       
        $this->session_id = md5(microtime().rand(1,9999999999999999999999999)); // GENERATE A RANDOM ID
       
        setcookie('iduser',$this->session_id);
       
        $sql = "INSERT INTO 'tb_session_db' ('iduser', 'updated_on') VALUES ('{$this->session_id}', NOW())";
        mysql_query($sql);
      }
     
      $sql = "SELECT 'value' FROM 'tb_session_db' WHERE 'iduser'='{$this->session_id}'";
      $query = mysql_query($sql);     
      $this->data = unserialize(mysql_result($query, 0, 'value'));
      $SESSION = $this->data;
    }   
    private function expire(){
      $date_to_delete = date("Y-m-d H:i:s", time()-60*$this->minutes_to_expire);
      $sql = "DELETE FROM 'tb_session_db' WHERE 'update_on' <= '$date_to_delete'";
      mysql_query($sql);
    }
   
    public function __destruct(){
      global $SESSION;
     
      $this->data = serialize($SESSION);
     
      $sql = "UPDATE 'tb_session_db' SET 'value'='{$this->data}', 'updated_on'=NOW() WHERE 'iduser'='{$this->session_id}'";
      mysql_query($sql);
     
      $this->expire();
    }
  }
 
/*
TABLE STRUCTURE
  CREATE TABLE IF NOT EXISTS `tb_session_db` (
    `session_id` varchar(32) NOT NULL,
    `value` blob,
    `updated_on` datetime DEFAULT NULL,
    PRIMARY KEY (`session_id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
*/
?>