<?php
date_default_timezone_set("Asia/Colombo");



cronejob();


function cronejob(){

$servername = "localhost";
$username = "corona";
$password = "root";
$dbname = "corona";

$conn = new mysqli($servername, $username, $password, $dbname);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://hpb.health.gov.lk/api/get-current-statistical",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$response = json_decode($response, true); //because of true, it's in an array
//because of true, it's in an array

$apicount = $response['data']['local_total_cases'];





$today = Date('Y-m-d');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT MAX(`date`) as `date` FROM `daycount`";
//$sql = "SELECT `date`,count FROM `daycount` group by count order by `date` desc limit 1;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        $dbdate = $row["date"];
       // $count = $row["count"];
    }


} else {
    echo "0 results";
}

$sql2 = "SELECT SUM(count) as fullcount from daycount";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
       // $dbdate = $row["date"];
        $count = $row2["fullcount"];
    }


} else {
    echo "0 results";
}





if($dbdate!=$today&&intval($apicount)>0){


	$datetoinsert = $today;
	$newcount = intval($apicount)-$count;
	//echo $apicount;


$sql = "INSERT INTO daycount (`date`,count)
VALUES ('".$datetoinsert."', ".$newcount.")";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} 


}else if($dbdate==$today&&$count<intval($apicount)){


	$sql4 = "SELECT SUM(count) as fullcount from daycount where `date`<'".$today."'";
$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {
    // output data of each row
    while($row4 = $result4->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
       // $dbdate = $row["date"];
        $yesterdaysum = $row4["fullcount"];
    }


} else {
    echo "0 results";
}

//echo $yesterdaysum;


	$datetoinsert2 = $today;
	$newcount2 = intval($apicount)-$yesterdaysum;
	//echo('AAAA');
	
	$sql3 = "UPDATE daycount SET count=".$newcount2." WHERE `date`='".$datetoinsert2."'";

if ($conn->query($sql3) === TRUE) {
    //echo "New record created successfully";
} 


}

$conn->close();


}

?>