<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php 
    $materials = [
        'ткань 1' => ['ткань 1.1', 'ткань 1.2', 'ткань 1.3', 'ткань 1.4', 'ткань 1.5'],
        'ткань 2' => ['ткань 2.1', 'ткань 2.2', 'ткань 2.3', 'ткань 2.4', 'ткань 2.5'],
        'ткань 3' => ['ткань 3.1', 'ткань 3.2', 'ткань 3.3', 'ткань 3.4', 'ткань 3.5'],
        'ткань 4' => ['ткань 4.1', 'ткань 4.2', 'ткань 4.3', 'ткань 4.4', 'ткань 4.5'],
        'ткань 5' => ['ткань 5.1', 'ткань 5.2', 'ткань 5.3', 'ткань 5.4', 'ткань 5.5']
    ];

    
?>

<input type="checkbox" name="material" value="ткань 1"> Ткань 1
<input type="checkbox" name="material" value="ткань 2"> Ткань 2
<input type="checkbox" name="material" value="ткань 3"> Ткань 3
<input type="checkbox" name="material" value="ткань 4"> Ткань 4
<input type="checkbox" name="material" value="ткань 5"> Ткань 5

<?php include __DIR__ . '/get_material.php' ?>

<script>
    var inputs = document.getElementsByTagName('input');

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('click', function() {
            if (this.checked == true) {
                //console.log(this.value);

                var xmlhttp = new XMLHttpRequest();

                var data = 'material=' + this.value;

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                    }
                }

                xmlhttp.open('POST', '/get_material.php', true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send(data);
            }
        });
    }
    
</script>
</body>
</html>

