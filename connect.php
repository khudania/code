<?php

//Local DB
// $db = mysqli_connect('localhost', 'root', '123456');
// if (!$db){
//     die("Database Connection Failed".mysqli_error($db));
// }
// $select_db = mysqli_select_db($db, 'codeathon');
// if (!$select_db){
//     die("Database Selection Failed".mysqli_error($db));
// }


//Server DB
$db=mysqli_connect("localhost","cipherathon","info@fame") or die("unable to connect");
mysqli_select_db($db,'Cipherathon');
?>
