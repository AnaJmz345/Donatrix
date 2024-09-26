<?php 

	class user {

		public static function getAll() {
			  $user = 'sql9580579';
        	  $pwd = 'VrT79kYdlJ';

			  $db = new PDO('mysql:host=sql9.freemysqlhosting.net;dbname=sql9580579', $user, $pwd);
		      $result = $db->query('SELECT company, product, quantity, description, address FROM donor');
		     
		      $item = array();
		      while ( $item = $result->fetch()){
		         $items[] = $item;
		      }
		      
		   	  $db = null;
		      return $items;
 		}

 		public static function getOne($index) {
			  $user = 'sql9580579';
        	  $pwd = 'VrT79kYdlJ';

			  $db = new PDO('mysql:host=sql9.freemysqlhosting.net;dbname=sql9580579', $user, $pwd);
		      $result = $db->query('SELECT company, product, quantity, description, address FROM donor WHERE id=' . $index);
		    
		      $donorInfo = $result->fetch();
		      
		   	  $db = null;
		      return $donorInfo;
 		}

 		/*
	    public static function getOne($students, $index) {
	        echo $students[index+1];
	    } */

	    public static function store($id, $username, $name, $last_name, $birthdate) {
	         $user = 'sql9580579';
        	  $pwd = 'VrT79kYdlJ';

			  $db = new PDO('mysql:host=sql9.freemysqlhosting.net;dbname=sql9580579', $user, $pwd);
		      $result = $db->query("INSERT INTO donor(id,username,name,last_name,birthdate) values(" .$id . ",'" . $username . "','" . $name . "','" .  $last_name . "','" . $birthdate. "')");

	      	  $db = null;

    		  return $result; 
	    }

	    public static function update($id, $username, $name, $last_name, $birthdate) {
	          $user = 'sql9580579';
        	  $pwd = 'VrT79kYdlJ';

			  $db = new PDO('mysql:host=sql9.freemysqlhosting.net;dbname=sql9580579', $user, $pwd);
			  $result = $db->query("UPDATE donor set name = '". $name . "', last_name='" . $last_name . "', username='" . $username . "', birthdate = '". $birthdate . "' WHERE ID = " . $id);

	      	  $db = null;

    		  return $result; 
	    }

	    public static function delete($index) {
	    	  $user = 'sql9580579';
        	  $pwd = 'VrT79kYdlJ';
			  $db = new PDO('mysql:host=sql9.freemysqlhosting.net;dbname=sql9580579', $user, $pwd);		     
	      	  $result = $db->query("DELETE FROM donor WHERE id = ". $index);
	      	  $db = null;
    		  return $result; 
	    }

	}
 ?>
