<?php
class EnquiryModel extends Database {
  public function add_writer_data($token, $writer_token, $w_name, $p_name, $email, $c_number, $otp, $selfi_image) {
    $create_date = $this->DateFunction('M-d-Y');
    $publish_status = 0;
    if($this->Query("INSERT INTO tbl_writer_info (token, writer_token, w_name, p_name, email, c_number, otp, selfi_image, publish_status, create_date, status, flag) VALUES ('$token', '$writer_token', '$w_name', '$p_name', '$email', '$c_number', '$otp',  '$selfi_image', '$publish_status', '$create_date', 1,0)")) {
      return true;
    }
  }

  public function fetch_list_writer_data(){
    if($this->Query("SELECT * FROM tbl_writer_info WHERE flag = 0")) {
      $data = $this->fetchAll();
      return $data;
    }
  }

  public function MatchwriterToken($writer_token, $flag=0) {
    if($this->Query("SELECT * FROM tbl_writer_info WHERE writer_token=? AND flag=?", [$writer_token, $flag])) {
      if($this->rowCount()>0) {
        return true;
      }else {
        return false;
      }
    }
  }

  public function delete_writer_data($token, $writer_token){
    if ($this->Query("UPDATE tbl_writer_info SET flag = 1 WHERE writer_token =?", [$writer_token])) {
      return true;
    } else {
      return false;
    }
  }
  
  public function writerpublished($token, $writer_token, $publish_status = 1) {
    if($this->Query("UPDATE tbl_writer_info SET publish_status='$publish_status' WHERE writer_token=?", [$writer_token])) {
      return true;
    }
  }

  public function show_data_publisher($writer_token){
    if($this->Query("SELECT * FROM tbl_writer_info WHERE flag = 0 AND writer_token = ?", [$writer_token])) {
      $data = $this->fetchAll();
      return $data;
    }
  }

  public function writerunpublished($token, $writer_token, $publish_status = 0) {
    if($this->Query("UPDATE tbl_writer_info SET publish_status='$publish_status' WHERE writer_token=?", [$writer_token])) {
      return true;
    }
  }

  public function fetch_list_writer_details_data($writer_token){
    if($this->Query("SELECT * FROM tbl_writer_info WHERE writer_token = ?", [$writer_token])) {
      $data = $this->fetchAll();
      return $data;
    }
  }

  public function aviable_writer_data_in_table($writer_token) {
    if($this->Query("SELECT * FROM tbl_writer_info WHERE writer_token=?", [$writer_token])) {
      if($this->rowCount()>0) {
        return true;
      }else {
        return false;
      }
    }
  }

  public function update_writer_details($token, $writer_token, $w_name, $p_name, $email){
    if($this->Query("UPDATE tbl_writer_info SET w_name = '$w_name', p_name = '$p_name', email = '$email' WHERE writer_token ='$writer_token'")) {
      return true;
    }else {
      return false;
    }
  }

}
