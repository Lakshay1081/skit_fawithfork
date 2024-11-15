<?php 
// Framwork method
class Framwork {

    public function view($view, $data = []){
        if(file_exists("../app/views/". $view . ".php")) {
            require_once "../app/views/$view.php";
        }
        else {
            echo "Sorry $view.php page not found";
        }
    }

    public function model($model) {
        if(file_exists("../app/models/". $model . ".php")) {
            require_once "../app/models/$model.php";
            return new $model; 
        }else {
            echo "Sorry $model model not found";
            require_once "../app/models/$model.php";
        }
    }

    public function input($input) {
        if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post") {
            return trim(strip_tags($_POST[$input]));
        }else if ($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] == "get") {
            return trim(strip_tags($_GET[$input]));
        }
        else if ($_SERVER['REQUEST_METHOD'] == "REQUEST" || $_SERVER['REQUEST_METHOD'] == "request") {
            return trim(strip_tags($_GET[$input]));
        }
    }

    public function helpers($helper) {
        if(file_exists("../helpers/" . $helper .".php")) {
            require_once "../helpers/" . $helper . ".php";
        }else {
            echo "Sorry $helper File Not Found" ; 
        }
    }

    public function setSession($sessionName, $sessionValue) {
        if(!empty($sessionName) && !empty($sessionValue)) {
            $_SESSION[$sessionName] = $sessionValue;
        }
    }

    public function getSession($sessionName) {
        if(!empty($sessionName)) {
            return $_SESSION[$sessionName];
        }
    }

    public function unsetSession($sessionName) {
        if(!empty($sessionName)) {
            unset($_SESSION[$sessionName]);
        }
    }

    public function distroySessions() {
        session_destroy();
    }

    public function setFlash($sessionName, $message) {
        if(!empty($sessionName) && !empty($message)) {
            $_SESSION[$sessionName] = $message;
        }
    }

    public function getFlash($sessionName, $className) {
        if(!empty($sessionName) && !empty($className) && isset($_SESSION[$sessionName])) {
            if($_SESSION[$sessionName] != "") {
                $message =  $_SESSION[$sessionName];
                echo "<div class='".$className. "'>".$message."</div>";

            }  
            unset($_SESSION[$sessionName]);        
        }
    }

    public function sessionRegenerate($sessionName) {
        if(!empty($sessionName)) {
            session_regenerate_id($sessionName);
        }
    }

    public function redirect($path) {
        header("Location:".BASEURL. "/".$path, true, 301);
        exit();
    }

    public function PasswordEncrypt($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function email_validation($var) {
        return (!preg_match(
            "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $var))
        ? FALSE : TRUE;
    }

    public function AutoRefereshWin($duration) {
        header("refresh:" . $duration);
    }

    public function phone_validation($mobile) {
        return preg_match('/^[0-9]{10}+$/', $mobile);
    }

    public function ease_phone_validation($mobile){
        return preg_match('/^+$/', $mobile);
    }

    public function pincode_validation($pincode) {
        return preg_match('/^[0-9]{6}+$/', $pincode);
    }

    public function compressImage($source, $destination, $quality) { 
    // Get image info 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    // Save image 
    imagejpeg($image, $destination, $quality); 
     
    // Return compressed image 
    return $destination; 
}

    public function GenerateStringRendom($length) {   
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function GenereateRandomNumber() {
        return rand(00000000, 99999999);
    }

    function AmountInWords(float $amount){
   $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
   // Check if there is any number after decimal
   $amt_hundred = null;
   $count_length = strlen($num);
   $x = 0;
   $string = array();
   $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $x < $count_length ) {
      $get_divider = ($x == 2) ? 10 : 100;
      $amount = floor($num % $get_divider);
      $num = floor($num / $get_divider);
      $x += $get_divider == 10 ? 1 : 2;
      if ($amount) {
       $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
       $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
       $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
       '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
       '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
        }
   else $string[] = null;
   }
   $implode_to_Rupees = implode('', array_reverse($string));
   $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
   return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
    }

     public function data_encrypt($plainText,$key) {
        $key = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        $encryptedText = bin2hex($openMode);
        return $encryptedText;
    }

    public function data_decrypt($encryptedText,$key) {
        $key = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = $this->hextobin($encryptedText);
        $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        return $decryptedText;
    }

    public function hextobin($hexString){ 
        $length = strlen($hexString); 
        $binString="";   
        $count=0; 
        while($count<$length) 
        {       
          $subString =substr($hexString,$count,2);           
          $packedString = pack("H*",$subString); 
          if ($count==0)
          {
            $binString=$packedString;
          } 

          else 
          {
            $binString.=$packedString;
          } 

          $count+=2; 
        } 
        return $binString; 
    }
   
   public function ServerURL(){ 
        $actual_link = $_SERVER['QUERY_STRING'];
        echo  $data = $this->data_encrypt(str_replace('url=', '', $actual_link, $count), SECURITY_KEY);
        return $actual_link;
   }

   public function inputfiles($filename) {
        $file = trim($_FILES[$filename]['name']);
        return $file;
   }
   public function DateFunction($format) {
        return date($format);
    }

     public function Date() {
        return date("M-d-Y");
    }
}