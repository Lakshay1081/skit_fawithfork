<?php 
class dashboard extends Framwork {

    public function __construct()
    {
        if(!$this->getSession('adminSession')) {
            $this->redirect('signin');
        }
        $this->sessionRegenerate('adminSession');
        $this->helpers("link");
        $this->GeneralModel = $this->model('GeneralModel');
        $this->AdminSession = $this->getSession('adminSession');
    }

    public function index() {
        $data['title'] = 'Thank you for signin Sabjiwala accounts';
        $this->view('dashboard/components/header', $data);
        $this->view('dashboard/components/sidebar');
        $this->view('dashboard/dashboard', $data);
        $this->view('dashboard/components/footer');
    }

    public function authlogout(){
        $this->distroySessions('adminSession');
        $this->redirect('signin');
        $this->setFlash('success', 'Your system is logout !');
    }

}