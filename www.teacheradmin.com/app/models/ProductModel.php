<?php
class ProductModel extends Database {
  public function fetch_list_product_data(){
    if($this->Query("SELECT * FROM tbl_product_info WHERE flag = 0 ")) {
      $data = $this->fetchAll();
      return $data;
    }
  }
  public function fetch_list_product_data_date($today_date){
    if($this->Query("SELECT * FROM tbl_product_info WHERE flag = 0 AND publish_status = 0 AND create_date = ?", [$today_date])) {
      $data = $this->fetchAll();
      return $data;
    }
  }

  public function fetch_list_category_data($token){
    if($this->Query("SELECT * FROM tbl_categorie_info WHERE flag = 0 AND publish_status = 1 AND token = ?", [$token] )) {
      $data = $this->fetchAll();
      return $data;
    }
  }

  public function add_product_data($token, $product_token, $product_category, $product_name, $add_discount_price, $selling_price, $cost_price, $discount_price, $product_unit, $image, $description) {
    $create_date = $this->DateFunction('M-d-Y');
    $publish_status = 0;
    if($this->Query("INSERT INTO tbl_product_info (token, product_token, product_name, product_category, selling_price, cost_price, discount_price, discount_per, product_unit, image, description, publish_status, create_date, status, flag) VALUES ('$token', '$product_token', '$product_name', '$product_category', '$selling_price', '$cost_price', '$add_discount_price', '$discount_price', '$product_unit', '$image', '$description', '$publish_status', '$create_date', 1,0)")) {
      return true;
    }
  }

  public function MatchproductToken($product_token, $flag=0) {
    if($this->Query("SELECT * FROM tbl_product_info WHERE product_token=? AND flag=?", [$product_token, $flag])) {
      if($this->rowCount()>0) {
        return true;
      }else {
        return false;
      }
    }
  }
  
  public function productpublished($token, $product_token, $publish_status = 1) {
    if($this->Query("UPDATE tbl_product_info SET publish_status='$publish_status' WHERE product_token=?", [$product_token])) {
      return true;
    }
  }

  public function productunpublished($token, $product_token, $publish_status = 0) {
    if($this->Query("UPDATE tbl_product_info SET publish_status='$publish_status' WHERE product_token=?", [$product_token])) {
      return true;
    }
  }


  public function delete_product_data($token, $product_token){
    if ($this->Query("UPDATE tbl_product_info SET flag = 1 WHERE product_token =?", [$product_token])) {
      return true;
    } else {
      return false;
    }
  }

  public function fetch_list_product_details_data($token, $product_token){
    if($this->Query("SELECT * FROM tbl_product_info WHERE token =? AND product_token = ? AND publish_status = 1 AND flag = 0", [$token, $product_token])) {
      $data = $this->fetchAll();
      return $data;
    }
  }

  public function fatch_list_category_details($token, $cat_token){
    if($this->Query("SELECT * FROM tbl_categorie_info WHERE token =? AND  cat_token = ? AND publish_status = 1 AND flag = 0", [$token, $cat_token])) {
      $data = $this->fetchAll();
      return $data;
    }
  }

  public function aviable_product_data_in_table($product_token) {
    if($this->Query("SELECT * FROM tbl_product_info WHERE product_token=?", [$product_token])) {
      if($this->rowCount()>0) {
        return true;
      }else {
        return false;
      }
    }
  }

  public function update_product_without_image_details($token, $product_token, $product_name, $cost_price, $discount_price, $product_unit, $description){
    $add_discount_price = $cost_price - (($cost_price * $discount_price) / 100);
    $selling_price = $add_discount_price;
      if($this->Query("UPDATE tbl_product_info SET product_name = '$product_name', selling_price = '$selling_price', cost_price = '$cost_price', discount_price = '$add_discount_price', discount_per = '$discount_price',  product_unit = '$product_unit', description = '$description' WHERE product_token ='$product_token' ")) {
        return true;
      }else {
        return false;
      }
  }

  public function update_product_details($token, $product_token, $product_name, $cost_price, $discount_price, $product_unit, $image, $description){
    $add_discount_price = $cost_price - (($cost_price * $discount_price) / 100);
    $selling_price = $add_discount_price;
    if($this->Query("UPDATE tbl_product_info SET product_name = '$product_name', selling_price = '$selling_price', cost_price = '$cost_price', discount_price = '$add_discount_price', discount_per = '$discount_price', product_unit = '$product_unit', image='$image', description = '$description' WHERE product_token ='$product_token'")){
        return true;
      }else {
        return false;
      }
  }
}
