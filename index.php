<?php
date_default_timezone_set('Asia/Jakarta');
// Api Url
$api_url = 'https://api.kawalcorona.com/indonesia/';
$api2_url = 'https://api.kawalcorona.com/';

// Read JSON file
$json_data = file_get_contents($api_url);
$json2_data = file_get_contents($api2_url);

// Decode JSON data into PHP array
$covdata = json_decode($json_data);
$dated = json_decode($json2_data);
//print_r($date);
// echo "Status Code " . $pingdata->status_code;
//if($pingdata->status_code == 200){
//	$status = 'Online';
//	$color = 'online';
//}else{
//	$status = 'Offline';
//	$color = 'offline';
//}

// bind data
$pos = $covdata[0]->positif;
$sem = $covdata[0]->sembuh;
$men = $covdata[0]->meninggal;
$dir = $covdata[0]->dirawat;
$date = $dated[0]->attributes->Last_Update;
/** debug datee **/
//print_r($date);
/** date convert to d-m-y H:i:s **/
$mil = $date;
$seconds = $mil / 1000;
//echo date("d-m-Y H:i:s", $seconds );
?>
<head>
</head>
<body>
<link rel="stylesheet" href="css/covid.css">

<div class="bisablog-card">
    <div class="bisablog-info"><h2>DATA COVID-19 INDONESIA</h2></div>
    <p class="bisablog-positif">&#128567 Positif: <span id="terjangkit"><?php echo $pos; ?></span></p>
    <p class="bisablog-sembuh">&#128522 Sembuh: <span id="sembuh"><?php echo $sem; ?></span></p>
    <p class="bisablog-meninggal">&#128557 Meninggal: <span id="meninggal"><?php echo $men; ?></span></p>
    <div class="bisablog-info"><span><em>(Data: kawalcorona.com) Last Updated: <?php echo date("d-m-Y H:i:s", $seconds ); ?></em></span></div>
</div>