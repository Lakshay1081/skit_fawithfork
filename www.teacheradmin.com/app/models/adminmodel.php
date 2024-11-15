<?php
class adminmodel extends Database {
	public function fetch_admin_record($username, $password) {
		$pass = md5($password);
		if($this->Query("SELECT * FROM tbl_admin_information WHERE user_name = '$username' AND password= '$pass'")) {
			if($this->rowCount()>0) {
				return true;
			}else {
				return false;
			}
		}
	}

	public function admin_status($username) {
		if($this->Query("SELECT * FROM tbl_admin_information WHERE user_name = ? AND status = 1", [$username])) {
			if($this->rowCount()>0) {
				return true;
			}else {
				return false;
			}
		}

	}
	public function admin_status_flag($username) {
		if($this->Query("SELECT * FROM tbl_admin_information WHERE user_name = ? AND flag = 1", [$username])) {
			if($this->rowCount()>0) {
				return true;
			}else {
				return false;
			}
		}

	}

	public function get_admin_data($username) {
		if($this->Query("SELECT * FROM tbl_admin_information WHERE user_name = ?", [$username])) {
			$data = $this->fetchAll();
			return $data;
		}
	}

	public function admin_login_confirm($username) {
		if($this->Query("SELECT * FROM tbl_admin_information WHERE user_name = ? AND status = 1 AND flag = 0", [$username])) {
			if($this->rowCount()>0) {
				$fetch_data = $this->get_admin_data($username);
				foreach($fetch_data as $data) {
					return ['status'=> 'ok', 'token'=> $data->token];
				}
			}else {
				return false;
			}
		}
	}

	public function admin_login_history($token) {
		$login_time = $this->DateAndTime();
		$ip_address = $this->UserIp();
		$mac_address = $this->GetMAC();
		$borwser_agent = $this->UserAgent();
		if($this->Query("INSERT INTO tbl_admin_login_history(token, login_time, ip_address, mac_address, borwser_agent, status, flag) VALUES('$token', '$login_time', '$ip_address', '$mac_address', '$borwser_agent', 1, 0)")){
			return true;
		}else {
			return false;
		}
	}
}	