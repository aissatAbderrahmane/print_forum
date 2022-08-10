<?php
/**
  ##########################################
  #----------------------------------------#
  #             Copyright MR-O             #
  ##########################################		
**/		

 	class _secur_ {
 		 function _simple($content,$type = ""){
 			if($type == "int")
 				$content = intval($content);
 			$_simple = @htmlspecialchars($content);
 			$_simple = @mysql_real_escape_string($_simple);
 			$_simple = @strip_tags($_simple);
			$_simple = @trim($_simple);
 				return $_simple;
 		}
 		   function email($email){
	    $regEx = "#^([a-zA-Z0-9-_.]+)@([a-zA-Z]+).[a-zA-Z]{2,3}$#i";
		if(preg_match($regEx,$email)){
		return true;
		}else{
		return false;
		}
	 }
 	}

 	 class _mysql_querys extends _secur_ {
     
	 function query($query){
	  return @mysql_query($query);
	 }
     function fetch($fetch){
	 return @mysql_fetch_array($fetch);
	 }
     function num($rows){
	 return @mysql_num_rows($rows);
	 }
	 function mytables($db){
	 return @mysql_list_tables($db);
	 }
 }
 
 class mysql extends _mysql_querys {
        
		function create_table($table,$valeur,$primary){
		    return $this->query("CREATE TABLE $table ($valeur , primary key ($primary) )");
		}
		function drop_table($table){
		    return $this->query("DROP TABLE $table ");
		}
		function create_row($table,$row,$valeur){
		    return $this->query("ALTER TABLE $table ADD $row $valeur NOT NULL ");
		}
		function drop_row($table,$row,$valeur){
		    return $this->query("ALTER TABLE $table DROP $row ");
		}
		function select($table,$row,$where = "",$limit = ""){
		     return $this->query("SELECT $row FROM $table ".$where." ".$limit);
		}
		
		function insert($table,$rows,$valeurs,$limit = ""){
		     return $this->query("INSERT INTO $table ($rows) VALUES ($valeurs) ".$limit);
		}
		
		function delete($table,$where = "",$limit = ""){
		      return $this->query("DELETE FROM $table ".$where." ".$limit);
		}
		
		function update($table,$valeurs,$where = "",$limit = ""){
		    return $this->query("UPDATE $table SET $valeurs ".$where." ".$limit);
		}
 }

 	class _input_url extends mysql {
 		 function _define_input($name){
 			$input = $this->_simple($_POST[$name]);
 				return $input;
 		}
 		 function _define_url($name){
 			$url = $this->_simple($_GET[$name]);
 				return $url;
 		}
 		 function _clear_input($name){
 			$_POST[$name] = false;
 				return $this->_simple($_POST[$name]);
 		}
 		 function _clear_url($name){
 			$_GET[$name] = false;
 				return $this->_simple($_GET[$name]);
 		}
 		function _true($msg){
 			echo "<center><div id='true'>". $this->_simple($msg)."</div></center>";
 		}
 		function _error($msg){
 			echo "<center><div id='error'>". $this->_simple($msg)."</div></center>";
 		}
 	}
 		$system = new _input_url();
?>

