<?php
class signin extends Framwork {

   public function __construct() {
      if($this->getSession('adminSession')) {
         $this->redirect('dashboard');
      }
     $this->helpers("link");
     $this->adminmodel = $this->model('adminmodel');
   }

   public function index() {
   	$this->view('index');
   }

   public function adminsignin() {
      $data = [
         'useraname'=> $this->input('username'),
         'password' => $this->input('password')
      ];
      if(!empty($data['useraname']) && !empty($data['password'])) {
         if($this->adminmodel->fetch_admin_record($data['useraname'], $data['password'])) {
            if($this->adminmodel->admin_status($data['useraname'])) {
               if(!$this->adminmodel->admin_status_flag($data['useraname'])) {
                  $result = $this->adminmodel->admin_login_confirm($data['useraname']);
                   if($result['status'] == 'ok') {
                            $this->adminmodel->admin_login_history($result['token']);
                           $this->setSession('adminSession', $result['token']);
                          // setcookie('adminSession',  $result['token'], time() + (86400 * 30), "/") ;
                           $this->redirect('dashboard');

                     }
               }else {
                  $this->setFlash('error', 'Your account is account is not found on our software please contact technical support!');
                  $this->redirect('signin');
               }
            }else {
            $this->setFlash('error', 'Your account is temporarily blocked please contact technical support!');
            $this->redirect('signin'); 
            }
         }else {
            $this->setFlash('error', 'Your Username & Password are invalid !');
            $this->redirect('signin'); 
         }
           
      }else{
         $this->setFlash('error', 'Please fill the blank field');
         $this->redirect('signin');
      }
   }
}