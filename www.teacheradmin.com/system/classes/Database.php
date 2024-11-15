<?php 
class Database {
    public $host = HOST;
    public $user = USER;
    public $db = DATABASE;
    public $pass = PASS;
    public $conn;
    public $result;

    public function __construct() {
        try{
            return $this->conn = NEW PDO("mysql:host=". $this->host."; dbname=".$this->db, $this->user, $this->pass);
        }catch(PDOException $e) {
            echo "Database Connection Error". $e->getMessage();
        }
    }

    public function Query($query, $params = []) {
        if(empty($params)) {
            $this->result = $this->conn->prepare($query);
            return $this->result->execute();
        }else {
            $this->result = $this->conn->prepare($query);
            return $this->result->execute($params);
        }
    }

    public function rowCount() {
        return $this->result->rowCount();
    }

    public function fetchall() {
        return $this->result->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetch() {
        return $this->result->fetch(PDO::FETCH_OBJ);
    }

    public function PasswordDecrypt($password , $hash) {
        return password_verify($password, $hash);
    }

    public function token($length) {
        return  bin2hex(random_bytes($length));
    }

    public function GenereateRandomNumber() {
        return rand(00000000, 99999999);
    }

    public function OtpRandomNumber() {
        return rand(000000, 999999);
    }

    public function DateAndTime() {
        return date("M-d-Y h:i:s A");
    }

    public function DateFunction($format) {
        return date($format);
    }

    public function GetMAC() {
        ob_start();
        system('getmac');
        $Content = ob_get_contents();
        ob_clean();
        return substr($Content, strpos($Content,'\\')-20, 17);
    }

    public function ServerTime() {
        return $_SERVER["REQUEST_TIME"];
    }

    public function UserAgent() {
        return $_SERVER["HTTP_USER_AGENT"];
    }

    public function UserIp() {
        return $_SERVER["REMOTE_ADDR"];
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

    public function StringSlug($string) {
       echo str_replace(' ', '-', $string, $count);
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
}