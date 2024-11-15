<?php
class CategoryModel extends Database {
  public function add_cat_data($token, $cat_token, $cat_name, $cat_des, $image) {
    $create_date = $this->DateFunction('M-d-Y');
    $publish_status = 0;
    if($this->Query("INSERT INTO tbl_categorie_info (token, cat_token, cat_name, cat_des, publish_status, image, create_date, status, flag) VALUES ('$token', '$cat_token', '$cat_name', '$cat_des', '$publish_status', '$image', '$create_date', 1,0)")) {
      return true;
    }
  }

  public function fetch_list_cat_data(){
    if($this->Query("SELECT * FROM tbl_categorie_info WHERE flag = 0")) {
      $data = $this->fetchAll();
      return $data;
    }
  }

  public function MatchcatToken($cat_token, $flag=0) {
    if($this->Query("SELECT * FROM tbl_categorie_info WHERE cat_token=? AND flag=?", [$cat_token, $flag])) {
      if($this->rowCount()>0) {
        return true;
      }else {
        return false;
      }
    }
  }

  public function catpublished($token, $cat_token, $publish_status = 1) {
    if($this->Query("UPDATE tbl_categorie_info SET publish_status='$publish_status' WHERE cat_token=?", [$cat_token])) {
      return true;
    }
  }

  public function catunpublished($token, $cat_token, $publish_status = 0) {
    if($this->Query("UPDATE tbl_categorie_info SET publish_status='$publish_status' WHERE cat_token=?", [$cat_token])) {
      return true;
    }
  }

  public function fetch_list_cat_details_data($cat_token){
    if($this->Query("SELECT * FROM tbl_categorie_info WHERE cat_token = ?", [$cat_token])) {
      $data = $this->fetchAll();
      return $data;
    }
  }

  public function aviable_cat_data_in_table($cat_token) {
    if($this->Query("SELECT * FROM tbl_categorie_info WHERE cat_token=?", [$cat_token])) {
      if($this->rowCount()>0) {
        return true;
      }else {
        return false;
      }
    }
  }

  public function update_cat_details($token, $cat_token, $cat_name, $cat_des, $image){
    if($image == ""){
      if($this->Query("UPDATE tbl_categorie_info SET cat_name = '$cat_name', cat_des = '$cat_des' WHERE cat_token ='$cat_token'")) {
        return true;
      }else {
        return false;
      }
    } else{
      if($this->Query("UPDATE tbl_categorie_info SET cat_name = '$cat_name', cat_des = '$cat_des', image = '$image' WHERE cat_token ='$cat_token'")) {
        return true;
      }else {
        return false;
      }
    }
    
  }

  public function delete_cat_data($token, $cat_token){
    if ($this->Query("UPDATE tbl_categorie_info SET flag = 1 WHERE cat_token =?", [$cat_token])) {
      return true;
    } else {
      return false;
    }
  }
}
