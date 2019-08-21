<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div class="form-wrap" id="contact-form-wrapper">
    <form id="contactsForm" class="clearfix">
        <input type="text" name="name" placeholder="Имя" required>
        <input type="text" name="email" placeholder="Электронный адрес" required>
        <input type="text" name="phone" placeholder="Номер телефона без (+)" required>
        <textarea name="message" id="" cols="30" rows="10" placeholder="Сообщение" required></textarea>
        <div id="recaptcha3"></div>
        <button class="submit-button">Отправить</button>
    </form>
</div>
    

    <style>
        .form-wrap {
            width: 500px;
            text-align: center;
        }

        #contactsForm {
            width: 100%;
            font-family: 'AvenirNextCyr', Arial !important;
            font-size: 14px;
            color: #666;
        }

        #contactsForm input, #contactsForm textarea {
            border: 2px solid #30a314;
            display: block;
            margin-bottom: 20px;
            padding: 16px;
            width: 100%;
            box-sizing: border-box;
            font-family: 'AvenirNextCyr', Arial !important;
            color: #666;
            text-align: center;
        } 

        .submit-button {
            color: #2ea3f2;
            border: 2px solid #2ea3f2;
            background: #fff;
            padding: 6px 20px;
            float: right;
            font-size: 20px;
            cursor: pointer;
            border-radius: 3px;
        }

        .submit-button:hover {
            background: rgba(0,0,0,.05);
        }

        .clearfix::after {
            content: '';
            display: table;
            clear: both;
        }
    </style>

    <script>
        var onloadCallback = function() {
            grecaptcha.render('recaptcha3', {
            'sitekey' : '6Lc2EK8UAAAAAGb39MKaILHZA_ZVc6JPVzxbZeoe'
          }); 
        }

        document.getElementById('contactsForm').onsubmit = function() {
            event.preventDefault();
            var form_data = jQuery(this).serialize();
            jQuery.ajax({
                type: "POST",
                url: "/contactFormHandler.php",
                data: form_data,
                success: function(data) {
                    console.log(data);
                    if (data == 'ok!') {
                        console.log(data);
                        $('#contact-form-wrapper').html('Благодарим за обращение к нам');
                    } else  if (data == 'recaptcha_err') {
                        $('#recaptcha3 > div').css('border', '1px solid #f33');
                    }
                }
            });    
            return false; 
        }
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
</body>
</html>

