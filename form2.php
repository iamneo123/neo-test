<?php

// if (isset($_POST['name'])) {
//     echo $_POST['name'];
// }

if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $secret = '6Lc2EK8UAAAAAKLYihtlKgADTwRR05Kc9yG9LtSd';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        echo $responseData->success;
        if($responseData->success)
        {
            if (isset($_POST['name'])) {
                echo $_POST['name'];
            }
        }
        else
        {
            echo 'Robot verification failed, please try again.';
        }
} else {
    echo 'Пройдите рекапчу';
}