<?php

    require_once 'config.php';

    $mysqli = getConnection();
    session_start();
    checkSession(false,"token");

    // get Post values
    if (isset($_POST["token"])) {
        $id = null;
        $user_name = clean($_POST["inputName"], $mysqli);
        $user_email = clean($_POST["inputEmail"], $mysqli);
        $user_phone = clean($_POST["inputPhone"], $mysqli);
        $user_fb = clean($_POST["fbuserid"], $mysqli);
        $token = clean($_POST["token"], $mysqli);

        if ($token == $_SESSION["token"]) {
            $user_score = clean($_SESSION["score"], $mysqli);
            $user_time = clean($_SESSION["timeTaken"], $mysqli);
            $_SESSION["score"] = null;
            $_SESSION["timeTaken"] = null;
            $_SESSION['submitted'] = null;
            $_SESSION["token"] = null;
            $_SESSION["played"] = null;
            session_destroy();

            // dummy values for testing. Uncomment to try it
            /*
             $id = null;
             $user_name = "TestName";
             $user_email = "TestEmail";
             $user_phone = "0134335434";
             $user_fb = "FBID";
             $user_score = "26";
             $user_time = 12.52;*/
            
            
            //check
            $stmt = $mysqli -> prepare("Select user_id from table_user where user_db=?");
            $stmt -> bind_param('s', $user_fb);

            $stmt -> execute();
            $stmt->store_result();
            $row = $stmt->num_rows;

            /* close statement*/
            $stmt -> close();
            
            if($row == 0) {               
                // Insert
                $stmt = $mysqli -> prepare("INSERT INTO table_user VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt -> bind_param('isssssd', $id, $user_name, $user_email, $user_phone, $user_fb, $user_score, $user_time);
    
                $stmt -> execute();
    
                echo 'Your score is: ' . $user_score;
                echo '<br /> Your time taken was: ' . $user_time;
                //Get inserted id
                //$id = $mysqli->insert_id;
    
                /* close statement*/
                $stmt -> close();
            }else if($row == 1){
                //update user
                 $stmt = $mysqli->prepare("UPDATE table_user SET user_score=?, user_time=? where user_fb = ?");
                 $stmt->bind_param('sds',$user_score, $user_time, $user_fb);
    
                 $stmt->execute();
    
                 printf("%d Row inserted.\n", $stmt->affected_rows);
            }

            /* close connection*/
            $mysqli -> close();

            //session_start();
            //$_SESSION["played"] = true;
            //$_SESSION["fb_id"] = "FBID1";
            //session_commit();
            
            header("Location: ../scoreBoard.php?played=true&fbId=$user_fb");
            die();
            //update user
            /*$user_score = "20";
             $user_time= 10.5;
             $stmt = $mysqli->prepare("UPDATE table_user SET user_score=?, user_time=? where user_id = ?");
             $stmt->bind_param('sdi',$user_score, $user_time, $id);

             $stmt->execute();

             printf("%d Row inserted.\n", $stmt->affected_rows);*/

        }
    }
?>
