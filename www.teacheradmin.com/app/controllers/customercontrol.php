<?php
class customercontrol extends Framwork {

    public function __construct() {
        if(!$this->getSession('adminSession')) {
            $this->redirect('signin');
        }
        $this->helpers("link");
        $this->CustomerModel = $this->model('CustomerModel');
        $this->AdminSession = $this->getSession('adminSession');
    }

    public function index() {
        $data['title'] = 'Customer List | Sabjiwala';
        $data['view_customer_data'] = $this->CustomerModel->fetch_list_customer_data();
        $this->view('dashboard/components/header', $data);
        $this->view('dashboard/components/sidebar');
        $this->view('dashboard/panel/Customer-management/customer-list', $data);
        $this->view('dashboard/components/footer');
    }


    public function view_details() {
        $data=[
            'customer_token' => $this->input('customer_token')
        ];
        if (!empty($data['customer_token'])) {
            $data['customer_view'] = $this->CustomerModel->fetch_list_customer_details_data($data['customer_token']);         
            if ($data['customer_view']) {
                $data['title'] = 'View Customer Details | Ankahikhahaniya';
                $this->view('dashboard/components/header', $data);
                $this->view('dashboard/components/sidebar');
                $this->view('dashboard/panel/Customer-management/view-customer-details', $data);
                $this->view('dashboard/components/footer');
            } else{
                $data['title'] = '404 Page';
                $this->view('page404', $data);
            }
        }else{
            $this->setFlash("error", "Sorry: Field is required please fill again");
            $this->redirect('writercontrol');
        }
    }
}