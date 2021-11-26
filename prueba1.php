<?php
if(isset($_GET['canc'])){
    $c = $_GET['canc'];
    $cse = explode(" ", $c);
    $canc = $cse[0];
    $i=0;
    foreach($cse as $ca){
        if($cse[$i]!=$cse[0]){
            $canc = $canc . "%20" . $ca;
        } 
        $i++;
    }

}

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://shazam.p.rapidapi.com/auto-complete?term=kiss%20the&locale=en-US",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: shazam.p.rapidapi.com",
		"x-rapidapi-key: 0d9503dfdfmsh15dd9ce2c27de24p1c4431jsn1a1717f999bb"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
$nres = "'".$response."'";
curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
    $info = json_decode($response, true);
	$canciones = $info['hints'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar nombre de canciones</title>
</head>
<body  >
    <center>
        <div>
            <form action="" method="GET">
                <h3>Cancion:</h3><br>
                <input type="text" name="canc"> <br><br>
                <button type="submit">Consultar</button>
            </form>
        </div>
        <?php
        if(isset($response)!=null){
        ?>
        <table width="300">
            <tr>
                <td><h2>Resultados</h2></td>
            </tr>
            <?php
            for($i=0;$i<count($canciones);$i++){?>
            <tr>
                <td><?php echo $canciones[$i]['term']?></td>
                <td><a href="https://www.youtube.com/results?search_query=<?php echo $canciones[$i]['term'] ?>"> <img src="logo.jpg" width="20px" height="20px"></a></td>
            </tr>
            <?php
        }
        ?>
        </table>
<?php
}
?>
    </center>
</body>
</html>