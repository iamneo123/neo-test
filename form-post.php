<?php
if (isset($_POST['name'])) {
    echo $_POST['name'];
}
//  function post_captcha($user_response) {
//     $fields_string = '';
//     $fields = array(
//         'secret' => '6Lc2EK8UAAAAAKLYihtlKgADTwRR05Kc9yG9LtSd',
//         'response' => $user_response
//     );
//     foreach($fields as $key=>$value)
//     $fields_string .= $key . '=' . $value . '&';
//     $fields_string = rtrim($fields_string, '&');

//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
//     curl_setopt($ch, CURLOPT_POST, count($fields));
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

//     $result = curl_exec($ch);
//     curl_close($ch);

//     return json_decode($result, true);
// }

// // Call the function post_captcha
// $res = post_captcha($_POST['g-recaptcha-response']);

// if (!$res['success']) {
//     // Если капча не правильная
//     echo 'reCAPTCHA error: Check to make sure your keys match the registered domain and are in the correct locations. You may also want to doublecheck your code for typos or syntax errors.';
// } else {
//     // Если капча правильная
//     echo $_POST['text'];
//     echo '<br><p>CAPTCHA was completed successfully!</p><br>'; 
// }