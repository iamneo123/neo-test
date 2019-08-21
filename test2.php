<html>
<head>
<script>
  function onSubmit(token) {

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
        
        //event.preventDefault();
        var xmlhttp = new XMLHttpRequest();

        var name = document.getElementById('field').value;
        var data = 'name=' + name + '&token=' + token;
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };

        xmlhttp.open('POST', '/form-post.php', true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);

    });

  }

  function validate(event) {
    event.preventDefault();
    grecaptcha.execute();
  }

  function onload() {
    var element = document.getElementById('submit');
    element.onclick = validate;
  }
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
   <form>
     Name: (required) <input id="field" name="field">
     <div id='recaptcha' class="g-recaptcha"
          data-sitekey="6Lc2EK8UAAAAAGb39MKaILHZA_ZVc6JPVzxbZeoe"
          data-callback="onSubmit"
          data-size="invisible"></div>
     <button id='submit'>submit</button>
   </form>
<script>onload();</script>
</body>
</html>