<?php
class GeneralModel extends Database {

  public function addServerMail($service_name, $mail, $hostname, $password) {
    if($this->Query("INSERT INTO tbl_mail_apis_control(services_name, email_id, server_host, password, create_date, status, flag)
    VALUES('$services_name', '$email_id', $server_host)")) {

    }
  }

  public function CountTotalBrands() {
    if($this->Query("SELECT * FROM tbl_franchise_brand Where status =1 AND flag=0")) {
      $data = $this->rowCount();
      return $data;
    }
  }

  public function CountTotalPublishBrands() {
    if($this->Query("SELECT * FROM tbl_franchise_brand Where status =1 AND flag=0 AND publish_status=1")) {
      $data = $this->rowCount();
      return $data;
    }
  }

   public function CountTotalFranchies() {
    if($this->Query("SELECT * FROM tbl_become_franchise Where status =1 AND flag=0")) {
      $data = $this->rowCount();
      return $data;
    }
  }
}
