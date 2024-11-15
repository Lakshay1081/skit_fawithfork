<?php
class ordercontrol extends Framwork {

    public function __construct() {
        if(!$this->getSession('adminSession')) {
            $this->redirect('signin');
        }
        $this->helpers("link");
        $this->OrderModel = $this->model('OrderModel');
        $this->AdminSession = $this->getSession('adminSession');
    }

    public function index() {
        $data['title'] = 'Order List | Sabjiwala';
        $data['order_data'] = $this->OrderModel->fetch_list_order_data();
        $this->view('dashboard/components/header', $data);
        $this->view('dashboard/components/sidebar');
        $this->view('dashboard/panel/Order-management/order-list', $data);
        $this->view('dashboard/components/footer');
    }

    public function GetProductDetails($product_token){
        return $this->OrderModel->get_product_details($product_token);
    }

    public function GetCustomerDetails($customer_token){
        return $this->OrderModel->get_customer_details($customer_token);
    }

    // public function view_details() {
    //     $data=[
    //         'customer_token' => $this->input('customer_token')
    //     ];
    //     if (!empty($data['customer_token'])) {
    //         $data['customer_view'] = $this->CustomerModel->fetch_list_customer_details_data($data['customer_token']);         
    //         if ($data['customer_view']) {
    //             $data['title'] = 'View Customer Details | Ankahikhahaniya';
    //             $this->view('dashboard/components/header', $data);
    //             $this->view('dashboard/components/sidebar');
    //             $this->view('dashboard/panel/Customer-management/view-customer-details', $data);
    //             $this->view('dashboard/components/footer');
    //         } else{
    //             $data['title'] = '404 Page';
    //             $this->view('page404', $data);
    //         }
    //     }else{
    //         $this->setFlash("error", "Sorry: Field is required please fill again");
    //         $this->redirect('writercontrol');
    //     }
    // }
}