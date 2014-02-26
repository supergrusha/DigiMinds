<?php
/** DB Class
 * @author: Eric Castillo
 */
require 'config.php';
class DB {
    

	public $db;

	public function __construct() {

                
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if ($this->db->connect_errno) {
			die("Connection error...".$this->db->connect_error);
		}

		return true;
	}


    public function affected_rows() {
		return $this->db->affected_rows;
	}

	public function sanitize($string) {
		return $this->db->real_escape_string($string);
	}

	public function query($sql_statement) {
		$result = $this->db->query($sql_statement);

		if (!$result) {
			die($this->db->error);
		}

		return $result;
	}

	public function fetchData($result) {
		$row = $result->fetch_array();
		return $row;
	}

	public function numRows($result) {
		return $result->num_rows;
	}

	public function __destruct() {
		$this->close();
	}

	public function close() {
		mysqli_close($this->db);
	}
        public function getLastRecord(){
           $id = mysqli_insert_id($this->db);
           return $id;
        }
}
?>
