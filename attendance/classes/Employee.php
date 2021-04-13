<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
/**
 * Employee Class
 */
class Employee{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getEmployee(){
		$query = "SELECT nid, firstName, lastName FROM employee";
		$result = $this->db->select($query);
		return $result;
	}

	public function insertAttendance($attend = array()){
		$query = "SELECT DISTINCT date FROM employee_attendance";
		$getdata = $this->db->select($query);
		while ($result = $getdata->fetch_assoc()) {
			$db_date = $result['date'];
			$cur_date = date('Y-m-d');
			if ($cur_date == $db_date) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong> Attendance Already Taken Today !</div>";
				return $msg;
			}
		}

		foreach ($attend as $atn_key => $atn_value) {
			if ($atn_value == "P") {
				$stu_query = "INSERT INTO employee_attendance(nid, attend, date) VALUES('$atn_key', 'P', now())";
				$data_insert = $this->db->insert($stu_query);
			} elseif ($atn_value == "A") {
				$stu_query = "INSERT INTO employee_attendance(nid, attend, date) VALUES('$atn_key', 'A', now())";
				$data_insert = $this->db->insert($stu_query);
			}
		}

		if ($data_insert) {
			$msg = "<div class='alert alert-success'><strong>Success !</strong> Attendance data inserted successfully !</div>";
			return $msg;
		} else {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Attendance data not inserted !</div>";
			return $msg;
		}
	}

	public function getDateList(){
		$query = "SELECT DISTINCT date FROM employee_attendance";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllData($dt){
		$date = $this->fm->validation($dt);
		$date = mysqli_real_escape_string($this->db->link, $date);

		$query = "SELECT employee.firstName, employee.lastName, employee_attendance.*
				FROM employee
				INNER JOIN employee_attendance
				ON employee.nid = employee_attendance.nid
				WHERE date = '$date'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updateAttendance($dt, $attend){
		foreach ($attend as $atn_key => $atn_value) {
			if ($atn_value == "P") {
				$query = "UPDATE employee_attendance
						SET attend = 'P'
						WHERE nid = '".$atn_key."' AND date = '".$dt."'";
				$data_update = $this->db->update($query);
			} elseif ($atn_value == "A") {
				$query = "UPDATE employee_attendance
						SET attend = 'A'
						WHERE nid = '".$atn_key."' AND date = '".$dt."'";
				$data_update = $this->db->update($query);
			}
		}

		if ($data_update) {
			$msg = "<div class='alert alert-success'><strong>Success !</strong> Attendance data updated successfully !</div>";
			return $msg;
		} else {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Attendance data not updated !</div>";
			return $msg;
		}
	}

}