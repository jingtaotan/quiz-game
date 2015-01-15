<?php

    require_once 'php/config.php';

    $mysqli = getConnection();
    $user_score = "20";
    $user_time = 12.2;
    $user_fb = "FBID1";
    $stmt = $mysqli->prepare("UPDATE table_user SET user_score=?, user_time=? where user_fb = ?");
               $stmt->bind_param('sds',$user_score, $user_time, $user_fb);

               $stmt->execute();

               printf("%d Row inserted.\n", $stmt->affected_rows);
 ?>