<?php
class RequestModel extends Database {
  public function fetch_list_customer_request_writer_data($flag = 0){
    if($this->Query("SELECT * FROM tbl_request_for_writer_info WHERE flag=?", [$flag])) {
      $data = $this->fetchAll();
      return $data;
    }
  }
  public function fatch_list_customer_writer_details($customer_token){
     if($this->Query("SELECT * FROM tbl_customer_info WHERE customer_token=?", [$customer_token])) {
      $data = $this->fetchAll();
      return $data;
    }
  }
  public function fatch_request_list_data($customer_token){
    if($this->Query("SELECT * FROM tbl_request_for_writer_info WHERE customer_token=?", [$customer_token])) {
      $data = $this->fetchAll();
      return $data;
    }
  }
  public function update_request_data($customer_token){
    if ($this->Query("UPDATE tbl_request_for_writer_info SET view_status = 1 WHERE customer_token =?", [$customer_token])) {
      return true;
    } else {
      return false;
    }
  }

  public function MatchrquestToken($customer_token, $flag=0) {
    if($this->Query("SELECT * FROM tbl_request_for_writer_info WHERE customer_token=? AND flag=?", [$customer_token, $flag])) {
      if($this->rowCount()>0) {
        return true;
      }else {
        return false;
      }
    }
  }

  public function requestapproved($token, $customer_token, $pass, $publish_status = 2, $flag=1) {
    $aproved_date = $this->DateFunction('M-d-Y');
    if($this->Query("UPDATE tbl_request_for_writer_info SET publish_status='$publish_status', aproved_date = '$aproved_date' WHERE customer_token=?", [$customer_token])) {
      return true;
    }else {
      return false;
    }
  }

  public function requestdisapprove($token, $customer_token, $publish_status = 1) {
    if($this->Query("UPDATE tbl_request_for_writer_info SET publish_status='$publish_status' WHERE customer_token=?", [$customer_token])) {
      return true;
    }
  }

  public function update_customer_status_add_writer_data($token, $customer_token, $publish_status = 0) {
    if($this->Query("UPDATE tbl_customer_info SET publish_status='$publish_status' WHERE customer_token=?", [$customer_token])) {
      $fetch_data = $this->fatch_list_customer_writer_details($customer_token);
      foreach($fetch_data as $data) {
        $f_name = $data->f_name;
        $l_name = $data->l_name;
        $email = $data->email;
        $con_number = $data->con_number;
        $create_date =$this->DateFunction('M-d-Y');
        $country = $data->country;
        $state = $data->state;
        $district = $data->district;
        $pincode = $data->pincode;
        $address = $data->address;
      }
      $password = $this->data_encrypt($pass, 'ZmQSdpCgx');
      $publish_status =1;
      $alt_full_phone = '';
      if($this->Query("INSERT INTO tbl_writer_info (token, writer_token, f_name, l_name, email, full_phone, alt_full_phone, country, state, district, pincode, address, password, publish_status, create_date, status, flag) VALUES ('$token', '$customer_token', '$f_name', '$l_name', '$email', '$con_number', '$alt_full_phone', '$country',  '$state', '$district', '$pincode',  '$address', '$password', '$publish_status', '$create_date', 1,0)")) {
        return true;
      } else {
        return false;
      }
    }
  }
}


// if($this->Query("UPDATE tbl_request_for_writer_info SET flag='$flag' WHERE customer_token=?", [$customer_token])){
//         if($this->Query("UPDATE tbl_customer_info SET flag='$flag' WHERE customer_token=?", [$customer_token])){
//           
//         }else {
//           return false;
//         }
//       }else {
//         return false;
//       }