<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa Engine</title>
</head>
<body>
<!--
    <div>
        <script async src="https://cse.google.com/cse.js?cx=737aa4a414a0d4bb1">
        </script>
        <div class="gcse-search"></div>
    </div>
-->

<div>
    <form method='post'>
        <input type='text' name='q' placeholder='Pesquisa...'>
        <input type='submit' name='acao' value='Buscar!'>

    </form>

    <?php
    
        if(isset($_POST['acao'])){
            $q = urlencode($_POST['q']);
            
            $url = 	"https://www.googleapis.com/customsearch/v1?key=[your-api-key]&cx=737aa4a414a0d4bb1&q=" . $q;

            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

            $result = curl_exec($handle);
            $result = json_decode($result);
            curl_close($handle);

            for($i = 0; $i < count($result->items); $i++){
                echo "<a href='". $result->items[$i]->link ."'>" .$result->items[$i]->htmlTitle . "</a>";
                echo "<br><br>";
            }
            


        }
    ?>
</div>
    

</body>
</html>
