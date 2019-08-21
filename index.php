<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div id="form-link">Форма</div>
    <div class="form-overlay">
        <form id="feedbackForm">
            <input type="text" name="name">
            <!-- <div class="g-recaptcha"
                data-sitekey="6Lc2EK8UAAAAAGb39MKaILHZA_ZVc6JPVzxbZeoe"
                data-callback="onSubmit"
                data-size="invisible">
            </div> -->
            <button class="g-recaptcha" data-sitekey="6Lc2EK8UAAAAAGb39MKaILHZA_ZVc6JPVzxbZeoe" data-callback="onSubmit">Отправить</button>
            <!-- <button id="submit" onclick="validation">Отправить</button> -->
        </form>
    </div>
    
    
    <script>

        function onSubmit(token) {

            return new Promise(function(resolve, reject) {  

                if (grecaptcha === undefined) {
                    alert('Recaptcha non definito'); 
                    //return;
                    reject();
                }

                var response = grecaptcha.getResponse();
                console.log(response);

                if (!response) {
                    alert('Coud not get recaptcha response'); 
                    //return;
                    reject();
                }
                
                console.log(event);

                event.preventDefault();
                var xmlhttp = new XMLHttpRequest();

                var name = document.querySelector('input[type="text"]').value;
                var data = 'name=' + name + '&token=' + token;
                
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                    }
                };

                xmlhttp.open('POST', '/form-post.php', true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send(data);

                grecaptcha.reset();

            });
        }

        // document.getElementById('feedbackForm').addEventListener('submit', function() {
        //     event.preventDefault();

        //     var xmlhttp = new XMLHttpRequest();

        //     var name = this.querySelector('input[type="text"]').value;
        //     var data = 'name=' + name;
            
        //     xmlhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             console.log(this.responseText);
        //         }
        //     };

        //     xmlhttp.open('POST', '/form-post.php', true);
		//     xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		//     xmlhttp.send(data);
        // });    
    </script>

    <style>
        
    </style>
</body>
</html>