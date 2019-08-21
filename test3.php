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
    <div id="form1Link">form 1</div>
    <div id="form2Link">form 2</div>
    <form action="" id="form1">
        form 1 <br>
        <input type="text" name="name">
        <div id='recaptcha1'></div>
        <a href="#" id="formSubmitLink1">Send</a>
    </form>
    <form action="" id="form2">
        form 2 <br>
        <input type="text" name="name">
        <div id='recaptcha2'></div>
        <a href="#" id="formSubmitLink2">Send</a>
    </form>
    
    <style>
        form {
            display: none;
            margin-top: 50px;
        }

        .show {
            display: block;
        }
    </style>
    <script>
        document.getElementById('form1Link').onclick = function() {
            document.getElementById('form1').classList.toggle('show');
        }

        document.getElementById('form2Link').onclick = function() {
            document.getElementById('form2').classList.toggle('show');
        }


        
        // var onSubmit = function(token) {
        //   console.log('success!');
        // };

        var onloadCallback = function() {
            grecaptcha.render('recaptcha1', {
            'sitekey' : '6Lc2EK8UAAAAAGb39MKaILHZA_ZVc6JPVzxbZeoe',
            'size': 'invisible',
            'callback' : onSubmit1
          });
     
            grecaptcha.render('recaptcha2', {
            'sitekey' : '6Lc2EK8UAAAAAGb39MKaILHZA_ZVc6JPVzxbZeoe',
            'size': 'invisible',
            'callback' : onSubmit2
          });
         
        };


        document.getElementById('formSubmitLink1').onclick = function() {
            grecaptcha.execute(0);
        }

        document.getElementById('formSubmitLink2').onclick = function() {
            grecaptcha.execute(1);
        }


        function onSubmit1(token) {

            return new Promise(function(resolve, reject) {  

                if (grecaptcha === undefined) {
                    alert('Recaptcha non definito'); 
                    reject();
                }

                var response = grecaptcha.getResponse();

                if (!response) {
                    alert('Coud not get recaptcha response'); 
                    reject();
                }
                
                var form_data = jQuery('#form1').serialize();
                jQuery.ajax({
                    type: "POST",
                    url: "/form1.php",
                    data: form_data,
                    success: function(data) {
                        console.log(data);
                    }
                });

                grecaptcha.reset();

            });

            

        }


        function onSubmit2(token) {

            return new Promise(function(resolve, reject) {  

                if (grecaptcha === undefined) {
                    alert('Recaptcha non definito'); 
                    reject();
                }

                var response = grecaptcha.getResponse();

                if (!response) {
                    alert('Coud not get recaptcha response'); 
                    reject();
                }
                
                var form_data = jQuery('#form2').serialize();
                jQuery.ajax({
                    type: "POST",
                    url: "/form2.php",
                    data: form_data,
                    success: function(data) {
                        console.log(data);
                    }
                });

                grecaptcha.reset();

            });

            

        }
        
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
</body>
</html>