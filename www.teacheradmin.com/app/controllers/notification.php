<?php
class notification extends Framwork {

    public function __construct() {
        if(!$this->getSession('adminSession')) {
            $this->redirect('signin');
        }
        $this->helpers("link");
        $this->NotificationModel = $this->model('NotificationModel');
        $this->AdminSession = $this->getSession('adminSession');
    }

    public function index() {
        $data['title'] = 'Notification List | Ankahikhahaniya';
        // $data['view_story_manage'] = $this->StoryModel->fetch_list_writer_story_data();
        // foreach($data['view_story_manage'] as $result){
        //     $create_date = $result->create_date;
        //     $today_date = $this->Date();
        //     if($create_date == $today_date){
        //         $data['view_data_date'] = $this->StoryModel->fetch_list_writer_story_data();
        //     }
        // }
        $this->view('dashboard/components/header', $data);
        $this->view('dashboard/components/sidebar');
        $this->view('dashboard/panel/notification-management/list-notification', $data);
        $this->view('dashboard/components/footer');
    }

    // public function createstory() {
    //     $data['title'] = 'Create Story | Ankahikhahaniya';
    //     $this->view('dashboard/components/header', $data);
    //     $this->view('dashboard/components/sidebar');
    //     $this->view('dashboard/panel/story-management/add-story', $data);
    //     $this->view('dashboard/components/footer');
    // }

    // public function storydelete() {
    //     $data=[
    //         'story_token' => $this->input('story_token')
    //     ];
    //     if(!empty($data['story_token'])) {
    //         if($this->StoryModel->MatchstoryToken($data['story_token'])) {
    //             $result = $this->StoryModel->delete_story_data($this->AdminSession, $data['story_token']);
    //             $this->setFlash('success', 'This Story are deleted successfully');
    //             $this->redirect('storycontrol');
    //         }else {
    //             $this->setFlash('error', 'Sorry: Some technical issue please try again!');
    //         $this->redirect('storycontrol');
    //         }
    //     }else {
    //         $this->setFlash('error', 'Sorry: Field is required please fill again!');
    //         $this->redirect('storycontrol');
    //     }
    // }

    // public function storyapprove() {
    //     $data = [
    //         'story_token' => $this->input('story_token')
    //     ];

    //     if(!empty($data['story_token'])) {
    //         if($this->StoryModel->MatchstoryToken($data['story_token'])) {
    //             $result = $this->StoryModel->storyapprove($this->AdminSession, $data['story_token']);
    //             $this->setFlash('success', 'This Story are approve successfully');
    //             $this->redirect('storycontrol');
    //         }else {
    //             $this->setFlash('error', 'Sorry: Some technical issue please try again!');
    //         $this->redirect('storycontrol');
    //         }
    //     }else {
    //         $this->setFlash('error', 'Sorry: Field is required please fill again!');
    //         $this->redirect('storycontrol');
    //     }
    // }

    // public function storydisapprove() {
    //     $data = [
    //         'story_token' => $this->input('story_token')
    //     ];
    //     if(!empty($data['story_token'])) {
    //         if($this->StoryModel->MatchstoryToken($data['story_token'])) {
    //             $result = $this->StoryModel->storydisapprove($this->AdminSession, $data['story_token']);
    //             $this->setFlash('success', 'This Story are disapprove successfully');
    //             $this->redirect('storycontrol');
    //         }else {
    //             $this->setFlash('error', 'Sorry: Some technical issue please try again!');
    //         $this->redirect('storycontrol');
    //         }
    //     }else {
    //         $this->setFlash('error', 'Sorry: Field is required please fill again!');
    //         $this->redirect('storycontrol');
    //     }
    // }

    // public function view_details() {
    //     $data=[
    //         'story_token' => $this->input('story_token')
    //     ];
    //     if (!empty($data['story_token'])) {
    //         $data['story_view'] = $this->StoryModel->fetch_list_story_details_data($data['story_token']);            
    //         if ($data['story_view']) {
    //             $data['title'] = 'View Story Details | Ankahikhahaniya';
    //             $this->view('dashboard/components/header', $data);
    //             $this->view('dashboard/components/sidebar');
    //             $this->view('dashboard/panel/story-management/view-story-details', $data);
    //             $this->view('dashboard/components/footer');
    //         } else{
    //             $data['title'] = '404 Page';
    //             $this->view('page404', $data);
    //         }
    //     }else{
    //         $this->setFlash("error", "Sorry: Field is required please fill again");
    //         $this->redirect('storycontrol');
    //     }
    // }

    // public function add_remark() {
    //     $data = [
    //         'story_token'=> $this->input('story_token'),
    //         'storyid' => $this->input('storyid'),
    //         'writer_token' => $this->input('writer_token'),
    //         'remark' => $this->input('remark')
    //     ];
    //     if(!empty($data['story_token']) && !empty($data['storyid']) && !empty($data['writer_token'])) {
    //         $remark_token = $this->GenerateStringRendom(32);
    //         $result = $this->StoryModel->add_remark_details($data['storyid'], $data['writer_token'], $data['story_token'], $remark_token, $data['remark']);
    //         if($result) {
    //            $this->setFlash("success", "Thanks: Your Data Successfully Add");
    //            $this->redirect('storycontrol');
    //         }else {
    //             $this->setFlash("error", "Sorry: technical issue please try again");
    //             $this->redirect('storycontrol/view_details?story_token='.$data['story_token']);
    //         }            
    //     }else{
    //         $this->setFlash("error", "Sorry: Field is required please fill again");
    //         $this->redirect('storycontrol/view_details?story_token='.$data['story_token']);
    //     }
    // }

    // public function allstories(){
    //     $data['title'] = 'All Story List | Ankahikhahaniya';
    //     $data['view_story_manage'] = $this->StoryModel->fetch_list_writer_story_data();
    //     $this->view('dashboard/components/header', $data);
    //     $this->view('dashboard/components/sidebar');
    //     $this->view('dashboard/panel/story-management/all-list-story', $data);
    //     $this->view('dashboard/components/footer');
    // }
}