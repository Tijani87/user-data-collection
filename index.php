<?php
     
        // Print the response as plain text so that the gateway can read it
       // header('Content-type: text/plain');
        error_reporting(E_ALL);
        require_once('AfricasTalkingGateway.php');
        require_once('config.php');
        require_once('dbConnector.php');

        #We obtain the data which is contained in the post url on our server.

    // Receive the POST from AT
    $sessionId     =$_POST['sessionId'];
    $serviceCode   =$_POST['serviceCode'];
    $phoneNumber   =$_POST['phoneNumber'];
    $text          =$_POST['text'];


    function ussd_proceed($ussd_text){

    echo "CON $ussd_text";

}


        $level = explode("*", $text);
        if (isset($text)) {
   

        if ( $text == "" ) {
            $response="CON Welcome to the registration portal.\nPlease enter you full name";
        }

        if(isset($level[0]) && $level[0]!="" && !isset($level[1])){

          $response="CON Hi ".$level[0].", enter your gender\n";
             
        }
        else if(isset($level[1]) && $level[1]!="" && !isset($level[2])){
                $response="CON Please enter you phone number\n"; 

        }
         else if(isset($level[2]) && $level[2]!="" && !isset($level[3])){
                $response="CON Please enter you address\n"; 

        }
         else if(isset($level[3]) && $level[3]!="" && !isset($level[4])){
                $response="CON Please enter you email\n"; 

        }
         else if(isset($level[4]) && $level[4]!="" && !isset($level[5])){
                $response="CON Please enter you country \n"; 

        }
         else if(isset($level[5]) && $level[5]!="" && !isset($level[6])){
                $response="CON Please enter you city\n"; 

        }
         else if(isset($level[6]) && $level[6]!="" && !isset($level[7])){
                $response="CON Please enter you occupation\n"; 

        }
         else if(isset($level[7]) && $level[7]!="" && !isset($level[8])){
                $response="CON Please enter you expertise\n"; 

        }
        else if(isset($level[8]) && $level[8]!="" && !isset($level[9])){
            //Save data to database
            $data=array(
               // 'phoneNumbernumber'=>$phoneNumbernumber,
                'fullName' =>$level[0],
                'gender' => $level[1],
                'phoneNumber'=>$level[2],
                'address'=>$level[3],
                'email'=>$level[4],
                'country'=>$level[5],
                'city'=>$level[6],
                'occupation'=>$level[7],
                'expertise'=>$level[8]
                );

         // build sql statement
       
          
        $sth = $sql->prepare("INSERT INTO `personsinfo`(`fullName`,`gender`,`phoneNumber`,`address`,`email`,`country`,`city`,`occupation`,`expertise`) 
            VALUES('".$data["fullName"]."','".$data["gender"]."','".$data["phoneNumber"]."','".$data["address"]."','".$data["email"]."','".$data["country"]."','".$data["city"]."','".$data["occupation"]."','".$data["expertise"]."')");
                        //$db->query($sql);
               // $sth->execute();

        //execute insert prepare   
        $sth->execute();
        if($sth->errorCode() == 0) {
            $ussd_text = $data["fullName"]." your registration was successful. Your gender is ".$data["gender"]." phone number is ".$data["phoneNumber"]." address is ".$data["address"]." email is ".$data["email"]." country is ".$data["country"]." city is ".$data["city"]." occupation is ".$data["occupation"]." and expertise is ".$data["expertise"];
            ussd_proceed($ussd_text);
        }else {
            $errors = $sth->errorInfo();
        }    

            

            $response=" \nThank you ".$level[0]." for registering.\nWe will keep you updated"; 
    }

        header('Content-type: text/plain');
        echo $response;
       

}
  

?>
