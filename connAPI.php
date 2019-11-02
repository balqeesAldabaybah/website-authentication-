<?php
 session_start();
 include 'db_connection.php';
 header("Access-Control-Allow-Origin: *" );




 function SelectAll(){
	
	 if(!$_SESSION['userid']){
		 header('location:login.html');
		 exit();
	 }
	$conn = openConn();
	$result = mysqli_query($conn , "select * from questions ");
	//print_r($result);
	closeConn($conn);

	$arr_out = array();
	while($r = mysqli_fetch_assoc($result)) {
		//print_r( $r); echo "<br/>" ; echo $r["No_Options"];
		$arr_out[] = $r;
	}

	echo json_encode( $arr_out);
 }


//   function SelectQuesByID($id){
// 	$conn = openConn();
// 	$result = mysqli_query($conn , "select * from questions where ID=".$id);
// 	$json =  mysqli_fetch_object($result);
// 	//echo json_encode($json)."<br/>";
// 	//print_r( $json);
// 	//print_r($result);
// 	closeConn($conn);
// 	return json_encode($json);
//  }

//  function test(){
// 	 $arr = [ Array ("id" => 1, "ques" => "what is your name" ) ,
// 			   Array ("id" => 2, "ques" => "what is your hobby" ) ,
// 			   Array ("id" => 3, "ques" => "what is your t" ) ,
// 			];
// 	 print json_encode($arr);

//  }
 SelectAll()


?>