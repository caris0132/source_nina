<?php if(!defined('_lib')) die("Error");
class database{
	var $db;
	var $result;
	var $insert_id;
	var $sql = "";
	var $refix = "";
	var $dbtype = '';
	var $debug = '0';
	var $servername;
	var $username;
	var $password;
	var $database;
	var $table = "";
	var $where = "";
	var $order = "";
	var $limit = "";
	var $error = array();
	function database($config = array()){
		if(!empty($config)){
			$this->init($config);
			$this->connect();
		}
	}


	function init($config = array()){
		foreach($config as $k=>$v)
			$this->$k = $v;
		if($this->dbtype == '') $this->dbtype = 'mysqli';
	}
	function connect(){
		switch ($this->dbtype){
			case 'mysql':
				$this->db = @mysql_connect($this->servername, $this->username, $this->password);
				if( !$this->db){
					die('Could not connect: ' . mysql_error());
				}
				if( !mysql_select_db($this->database, $this->db)){
					die('Could not connect: ' . mysql_error($this->db));
					return false;
				}
				break;
			case 'mysqli':
				$this->db = @mysqli_connect($this->servername, $this->username, $this->password, $this->database);
				if(!$this->db){
					die('Could not connect: ' . mysqli_connect_error($this->db));
				}
				break;
			default:
				die("Syntax error: Not config DB Type");
				break;
		}
		$this->query('SET NAMES "utf8"');
	}
	function query($sql=""){
		if($sql) $this->sql = str_replace('#_', $this->refix, $sql);
		switch ($this->dbtype){
			case 'mysql':
				$this->result = mysql_query($this->sql,$this->db);
				if(!$this->result){
					if($this->debug==1) die(mysql_error($this->db)."</br>Syntax error: ".$this->sql);
					else die("Syntax error");
				}
				break;
			case 'mysqli':
				$this->result = mysqli_query($this->db, $this->sql);
				if(!$this->result){
					if($this->debug==1) die(mysqli_error($this->db)."</br>Syntax error: ".$this->sql);
					else die("Syntax error");
				}
				break;
			default:
				die("Syntax error: Not config DB Type");
				break;
		}
		return $this->result;
	}
	function insert($data = array()){
		$key = "";
		$value = "";
			$sql = "SHOW COLUMNS FROM ".$this->refix.$this->table;
			$this->query($sql);
			$pri = "";
			foreach($this->result_array() as $k=>$v){
				if(strtolower($v['Key'])=="pri"){
					$pri = $v['Field'];
				}
				if(!isset($data[$v['Field']])){
					$val = '';
					if(strpos($v['Type'], 'int') !== false | strpos($v['Type'], 'float') !== false | strpos($v['Type'], 'double') !== false ){
						$val = 0;
					}
					$data[$v['Field']] = $val;
				}else{
						if(strpos($v['Type'], 'int') !== false | strpos($v['Type'], 'float') !== false | strpos($v['Type'], 'double') !== false ){
							if($data[$v['Field']]=="" || !is_numeric($data[$v['Field']])){
								$data[$v['Field']] = 0;
							}
						}
				}
			}
		unset($data[$pri]);
		foreach($data as $k => $v){
			$key .= "," . $k;
			$value .= ",'" . $v  ."'";
		}
		if($key{0} == ",") $key{0} = "(";
		$key .= ")";
		if($value{0} == ",") $value{0} = "(";
		$value .= ")";
		$this->sql = "insert into ".$this->refix.$this->table.$key." values ".$value;
		$this->query();
		$this->insert_id = ($this->dbtype=='mysqli') ? mysqli_insert_id($this->db) : mysql_insert_id();
		return $this->insert_id;
	}
	function update_old($data = array()){
		$values = "";
		$this->query("select * from ".$this->refix.$this->table." ".$this->where);
		foreach($this->fetch_array() as $k=>$v){
			if(!isset($data[$k])){
				$data[$k] = $this->escape_str($v);
			}
		}
        $sql = "SHOW COLUMNS FROM ".$this->refix.$this->table;
        $this->query($sql);
        $pri = "";
        foreach($this->result_array() as $k=>$v){
            if(strtolower($v['Key'])=="pri"){
                $pri = $v['Field'];
            }
            if(strpos($v['Type'], 'int') !== false | strpos($v['Type'], 'float') !== false | strpos($v['Type'], 'double') !== false ){
                if($data[$v['Field']]=="" || !is_numeric($data[$v['Field']])){
                    $data[$v['Field']] = 0;
                }
            }
        }

		if($pri && isset($data[$pri])){
			unset($data[$pri]);
		}
		foreach($data as $k => $v){
			$values .= ", " . $k . " = '" . $v  ."' ";
		}
		if($values{0} == ",") $values{0} = " ";
		$this->sql = "update " . $this->refix . $this->table . " set " . $values;
		$this->sql .= $this->where;
		return $this->query();
    }
    function update ($data = array()) {
        $values = ""; $pri ='';
        $sql = "SHOW COLUMNS FROM ".$this->refix.$this->table;
        $this->query($sql);
		$info_column = $this->arrayChangeKeyValue($this->result_array(), 'Field');
        foreach ($data as $key => $value) {
            if (strtolower($info_column[$key]['Key'])=="pri") {
                unset($data[$key]);
            }
            elseif (strpos($info_column[$key]['Type'], 'int') !== false | strpos($info_column[$key]['Type'], 'float') !== false | strpos($info_column[$key]['Type'], 'double') !== false ){
                if($data[$key]=="" || !is_numeric($data[$key])){
					$data[$key] = 0;

                }
            }
        }

        foreach($data as $k => $v){
            $values .= ", " . $k . " = '" . $v ."' ";
        }
        if($values{0} == ",") $values{0} = " ";
        $this->sql = "update " . $this->refix . $this->table . " set " . $values;
        $this->sql .= $this->where;
        return $this->query();
    }

    function arrayChangeKeyValue($data, $changeKey) {
        $groupArray = array();
        foreach ($data as $singleData) {
            $groupArray[$singleData[$changeKey]] = $singleData;
        }
        return $groupArray;
    }
	function check_row($s){echo '<pre>';print_r($s);echo '</pre>';}
	function delete(){
		$this->sql = "delete from " . $this->refix . $this->table . $this->where;
		return $this->query();
	}
	function select($str = "*"){
		$this->sql = "select " . $str;
		$this->sql .= " from " . $this->refix .$this->table;
		$this->sql .=  $this->where;
		$this->sql .=  $this->order;
		$this->sql .=  $this->limit;
		return $this->query();
	}
	function num_rows(){
		switch ($this->dbtype){
			case 'mysql':
				return mysql_num_rows($this->result);
				break;
			case 'mysqli':
				return mysqli_num_rows($this->result);
				break;
			default:
				die("Syntax error: Not config DB Type");
				break;
		}
	}
	 function num_fields ($query_id){
  		switch ($this->dbtype){
			case 'mysql':
				return mysql_num_fields($query_id);
				break;
			case 'mysqli':
				return mysqli_num_fields($query_id);
				break;
			default:
				die("Syntax error: Not config DB Type");
				break;
		}
  	}
	function fetch_array(){
		switch ($this->dbtype){
			case 'mysql':
				return mysql_fetch_assoc($this->result);
				break;
			case 'mysqli':
				return mysqli_fetch_assoc($this->result);
				break;
			default:
				die("Syntax error: Not config DB Type");
				break;
		}
	}
	function result_array(){
		switch ($this->dbtype){
			case 'mysql':
				$arr = array();
				while ($row = mysql_fetch_assoc($this->result))
					$arr[] = $row;
				return $arr;
				break;
			case 'mysqli':
				$arr = array();
				while ($row = mysqli_fetch_assoc($this->result))
					$arr[] = $row;
				return $arr;
				break;
			default:
				die("Syntax error: Not config DB Type");
				break;
		}
	}
	function setTable($str){
		$this->table = $str;
	}
	function setWhere($key, $value=""){
			if($this->where == "")
				$this->where = " where " . $key . " = '" . $value . "'";
			else
				$this->where .= " and " . $key . " = '" . $value ."'";
	}
	function setWhereOr($key, $value){
			if($this->where == "")
				$this->where = " where " . $key . " = " . $value;
			else
				$this->where .= " or " . $key . " = " . $value;
	}
	function setOrder($str){
		$this->order = " order by " . $str;
	}
	function setLimit($str){
		$this->limit = " limit " . $str;
	}
	function setError($msg){
		$this->error[] = $msg;
	}
	function showError(){
		foreach($this->error as $value)
			echo '<br>'.$value;
	}
	function reset(){
		$this->sql = "";
		$this->result = "";
		$this->where = "";
		$this->order = "";
		$this->limit = "";
		$this->table = "";
	}
	function debug(){
		echo "<br> servername: ".$this->servername;
		echo "<br> username: ".$this->username;
		echo "<br> password: ".$this->password;
		echo "<br> database: ".$this->database;
		echo "<br> ".$this->sql;
	}
	function escape_str($str){
		if (is_array($str)){
    		foreach($str as $key => $val){
    			$str[$key] = $this->escape_str($val);
    		}
    		return $str;
        }
        if (is_numeric($str)) {
            return $str;
        }

        if(get_magic_quotes_gpc()){
            $str = stripslashes($str);
        }
		switch ($this->dbtype){
			case 'mysql':
				if (function_exists('mysql_real_escape_string') AND is_resource($this->db)){
					return mysql_real_escape_string($str, $this->db);
				}
				elseif (function_exists('mysql_escape_string')){
					return mysql_escape_string($str);
				}
				else{
					return addslashes($str);
				}
			break;
			case 'mysqli':
				if (function_exists('mysqli_real_escape_string') AND is_resource($this->db)){
					return mysqli_real_escape_string($this->db, $str);
				}
				elseif (function_exists('mysqli_escape_string')){
					return mysqli_escape_string($this->db, $str);
				}
				else{
					return addslashes($str);
				}
			break;
			default:
				die("Syntax error: Not config DB Type");
			break;
		}
	}
	function xssClean($str){
		$str = str_replace("'", '&#039;', $str);
		$str = str_replace('"', '&quot;', $str);
		$str = str_replace('<', '&lt;', $str);
		$str = str_replace('>', '&gt;', $str);
		return $str;
	}
}
