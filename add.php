<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST");

header("Access-Control-Allow-Headers: X-Requested-With");

   $connect=mysqli_connect("localhost","root","","tajinder")or die("connectin failed");
   if(isset($_POST['select']))
{
    if($_POST['radio'] && $_POST['select'] ){
        $query="insert into tabe(rad, sel) values('".$_POST['radio']."', '".$_POST['select']."')" ;
        if(mysqli_query($connect,$query))
        {
           
           $data = array("data" => "You Data added successfully");
           echo json_encode($data);
           //return response()->json(["data" => "You Data added successfully"]);
        }
        else
        {
           echo "Error: " . $query . "<br>" . $connect->error;
        }
    }
    else{
        $data = array("data" => "Required fields are missing");
           echo json_encode($data);
    }
}


else{
    $trp = mysqli_query($connect, "SELECT * from add");
    $rows = array();
    while($r = mysqli_fetch_assoc($trp)) {
        $rows[] = $r;
    }
    print json_encode($rows);
 }
		
		
?> 
