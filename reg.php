<?php
    //including the Database Connection (connect.php) as rewriting it would not be necessary.
  include("connect.php");
    //if the user clicks on the register button
    if (isset($_POST))
    {
      //Escape the Special Characters string
	     $sname = $_POST['sname'];
	     $school = $_POST['school'];
       $class = $_POST['class'];
       $pname = $_POST['pname'];
	     $mobile = $_POST['mobile'];
       $email = $_POST['email'];

       //perform the sql query of inserting the values to the table ureg;
       $query = "INSERT INTO student (sname, school, class, pname, mobile, email) VALUES ('$sname', '$school', '$class', '$pname', '$mobile', '$email')";
       $result = mysqli_query($db,$query);

       //if the values given by the user are inserted successfully, redirect to another page
       if($result){
         echo "<script>alert('Thank you for Registering! Please fill this form to proceed to the Test')</script>";
        echo "<script type='text/javascript'>window.location.href = 'https://docs.google.com/forms/d/e/1FAIpQLSeYTTf-9Z85LVUL45vTZIxuiYPq5BQyPMS0jNVgeigNERgvUg/viewform'</script>";
        }
      //if the values given by user are not inserted to the table, redirect to same page
       else{
         echo "<script>alert('Registration Failed. Try Again!')</script>";
        echo "<script type='text/javascript'>window.location.href = 'register.html'</script>";
      }
    }


    //close the Database Connection
  mysqli_close($db);
?>
