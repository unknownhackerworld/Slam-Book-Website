<?php

$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];
$q6 = $_POST['q6'];
$q7 = $_POST['q7'];
$q8 = $_POST['q8'];
$q9 = $_POST['q9'];
$q10 = $_POST['q10'];
$q11= $_POST['q11'];
$q12 = $_POST['q12'];
$q13 = $_POST['q13'];
$q14 = $_POST['q14'];
$q15 = $_POST['q15'];
$q16 = $_POST['q16'];
$q17 = $_POST['q17'];
$q18 = $_POST['q18'];
$q19 = $_POST['q19'];
$q20 = $_POST['q20'];
$q21 = $_POST['q21'];
$q22= $_POST['q22'];
$q23 = $_POST['q23'];

if ((!empty($q1) || !empty($q2) || !empty($q3) || !empty($q4) || !empty($q5) || !empty($q6) || !empty($q7) || !empty($q8) || !empty($q9)  || !empty($q10)  || !empty($q11)  
  || !empty($q12) || !empty($q13) || !empty($q14) || !empty($q15) || !empty($q16) || !empty($q17) || !empty($q18) || !empty($q19) || !empty($q20) 
  || !empty($q21) || !empty($q22) || !empty($q23) )) {
	
        
           $host = "localhost";
       	   $dbUsername = "";
       	   $dbPassword = "";
       	   $dbName = "";

       	   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

       	   if (mysqli_connect_error()) {
       	   		
       	   		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
       	   	
       	   	} else{

                  $SELECT = "SELECT q6 From slambook Where q6 = ? Limit 1 ";
                  $INSERT = "INSERT Into slambook (q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20,q21,q22,q23) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                  //Prepare Statement

                  $stmt = $conn->Prepare($SELECT);
                  $stmt->bind_param("s", $q6);
                  $stmt->execute();
                  $stmt->bind_result($q6);
                  $stmt->store_result();
                  $rnum = $stmt->num_rows;

                  if ($rnum==0) {
                  	
                  	$stmt->close();

                  	$stmt = $conn->prepare($INSERT);
                  	$stmt->bind_param("sssssssssssssssssssssss", $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10, $q11, $q12, $q13, $q14, $q15, $q16, $q17, 
                  		$q18, $q19, $q20, $q21, $q22, $q23);

                  	$stmt->execute();	
                    echo '<script language="Javascript">';  
                  	echo 'alert("Thanks for submitting form")';
                      echo '</script>';
                      die();


                  }else {
                    echo '<script language="Javascript">';
                  	echo 'alert("You already filled the form")';
                    echo '</script>';
                      die();
                  } 
                  	$stmt->close();
                  	$conn->close();

       	   	}	



} else{
    echo '<script language="Javascript">';
	echo 'alert("All fields are required")';
    echo '</script>';
	die();
}



?>
