<?php
class OrderModel extends Database {
  public function fetch_list_order_data(){
    if($this->Query("SELECT * FROM tbl_cart_items_info WHERE status = 0 ORDER BY id DESC")) {
      $data = $this->fetchAll();
      return $data;
    }
  }

  public function get_product_details($product_token){
    if($this->Query("SELECT * FROM tbl_product_info WHERE flag = 0 AND publish_status = 1 AND product_token = ?", [$product_token])) {
      $data = $this->fetchAll();
      return $data;
    }
  }
  public function get_customer_details($customer_token){
    if($this->Query("SELECT * FROM tbl_customer_info WHERE flag = 0 AND publish_status = 1 AND customer_token = ?", [$customer_token])) {
      $data = $this->fetchAll();
      return $data;
    }
  }
}
