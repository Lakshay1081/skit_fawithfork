<?php
class CustomerModel extends Database {
  public function fetch_list_customer_data(){
    if($this->Query("SELECT * FROM tbl_customer_info WHERE flag = 0")) {
      $data = $this->fetchAll();
      return $data;
    }
  }

  public function fetch_list_customer_details_data($customer_token){
     if($this->Query("SELECT * FROM tbl_customer_info WHERE customer_token=?", [$customer_token])) {
      $data = $this->fetchAll();
      return $data;
    }
  }
}
