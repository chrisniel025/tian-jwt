<?php

    function generateToken($data, $new){

        $issuedDate = "";

        $header = [
            'type' => 'JWT',
            'alg' => 'HS256',
            'dev' => 'Christian Daniel D. Henry'
        ];
    
        $header = json_encode($header);
        $header = str_replace(['+','/','='], ['-','_',''], base64_encode($header));

        $mysqli = mysqli_connect('localhost', 'root', '', 'db_jwt'); 
        
        if($new == 0){
            
            $userid = $data['userid'];
            $date = new DateTime();
            $issuedDate = $date -> format('m-d-Y h:i:s a');
            $sql = "UPDATE tbl_march SET idate = '$issuedDate' WHERE userid = '$userid'";
            $result = mysqli_query($mysqli, $sql);
   
        }else{

            $issuedDate = $data['idate'];
            
        }
        
        $payload = [
            'userid' => $data['userid'],
            'uemail' => $data['uemail'],
            'ito' => $data['ito'],
            'iby' => $data['iby'],
            'ie' => $data['ie'],
            'idate' => $issuedDate
        ];
    
        $payload = json_encode($payload);
        $payload = str_replace(['+','/','='], ['-','_',''], base64_encode($payload));

        $signature = hash_hmac ('sha256', $header.".".$payload, base64_encode('tianpogi'), true);
        $signature = str_replace(['+','/','='], ['-','_',''], base64_encode($signature));

        $jwt = "$header.$payload.$signature";
        return base64_encode($jwt);
        
    }

    function validate($userToken){
        
        $mysqli = mysqli_connect('localhost', 'root', '', 'db_jwt'); 
        
        $existingToken = $userToken;
        $arr = explode(".", base64_decode($existingToken));
        $payload = json_decode(base64_decode($arr[1]),true);

        $userid = $payload['userid'];
        $uemail = $payload['uemail'];
        
        $result = mysqli_query($mysqli, "SELECT * FROM tbl_march WHERE userid= '$userid' AND uemail= '$uemail'");
        $data = mysqli_fetch_assoc($result);
        $json = json_decode(json_encode($data), true);

        $newToken = generateToken($json, 1);
        //setcookie("token", $newToken, time()+3600);
        
        echo "<script>console.log('EXISTING TOKEN: $existingToken')</script>";
        echo "<script>console.log('NEW TOKEN:  $newToken')</script>";

        if($newToken === $existingToken){

            return [1, $userid];
            
        }else{

            return [0, ""];
        }
        
    }

    function login(){

        session_start();
        
        include_once("connection.php");
        
        if(isset($_POST['Submit'])) {

            $uemail =$_POST['uemail'];
            $upass = $_POST['upass'];
            
            if(!$uemail || !$upass)
            {
                $_SESSION['error'] = "You have not entered all the required details. Please try again.";
            	header('location: ../index.php');

            }else{

                $result = mysqli_query($mysqli, "SELECT * FROM tbl_march WHERE uemail = '$uemail' and upass='$upass'");
                $count = mysqli_num_rows($result);

                if($count == 0){

                    $_SESSION['error'] = "User does not exist.";
                    header('location: ../index.php');

                }else{

                    $data = mysqli_fetch_assoc($result);
                    $json = json_decode(json_encode($data), true);

                    $userToken = generateToken($json, 0);
                    setcookie("token", $userToken, time()+3600);

                    header("Location: home.php");

                }
            }           
        }
    }

    function getProfile(){

        require_once('connection.php');

        if(isset($_COOKIE['token'])){

            $userToken = $_COOKIE['token'];

            if (validate($userToken)[0] == 1){

                $userid = validate($userToken)[1];
                
                $result = mysqli_query($mysqli, "SELECT * FROM tbl_march where userid='$userid'");
                $row = mysqli_fetch_assoc($result);
                return $row;

            }else{

                return "INVALID TOKEN";
                
            }

        }else{

            header("Location: ../index.php");

        }

    }

?>
