<?php

include("connect.php");

     if(isset($_POST['btn-upload'])) {
         $tableno = mysqli_real_escape_string($con, $_POST['tableno']);
         $kind = mysqli_real_escape_string($con, $_POST['kind']);
         $capacity = mysqli_real_escape_string($con, $_POST['capacity']);
         $progress =$_POST['progress'];
         $sql = "insert into table_desc (capacity,types,available,tableno) values ('$capacity','$kind','$progress','$tableno')";
         mysqli_query($con,$sql);
       }
?>




<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
          crossorigin="anonymous">
          <link rel="stylesheet" type="text/css" href="css/style.css">
          <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

          <!--google fonts-->
          <link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">

    </head>
    <body>
        <div class="container-fluid">
            <div class="row" style="height:15vh; width: 100vw; background-color: #d9d9d9;">
                <div class="col-md-2 logo text-center">
                    <img src="images/logo.png" alt="logo" class="img-fluid">
                </div>
                <div class="col-md-10 hello">
                    <h1>INVENTORY</h1>
                    <p><i class="far fa-user"></i> Hello Merchant <br>Branch: Indiranagar</p>
                </div>
            </div>
            <div class="row" style="height:100vh; width: 100vw;">
              <div class="col-md-2 option">
                  <ul class="nav flex-column">
                          <li class="nav-item">
                                  <a class="nav-link active" href="dashboard.php"><i class="fas fa-home"></i>Home</a>
                                </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="inventory.php"><i class="fas fa-bars"></i>Availibility</a>
                      </li>
                        <li class="nav-item">
                          <a class="nav-link" href="orders.php"> <i class="fas fa-clipboard-check"></i>Orders</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="booktable.php"> <i class="fas fa-clipboard-check"></i>Book a table</a>
                        </li>

                    </ul>
              </div>
                <div class="col-md-10">
                      <!--  <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-secondary">Accept</button>
                                <button type="button" class="btn btn-secondary">Reject</button>
                        </div> -->

                  <div class="container">

                  <a href="#demo" class="btn btn-info" data-toggle="collapse">Add Table??</a>
                  <div id="demo" class="collapse">
                    <form method="POST" action="booktable.php" enctype="multipart/form-data">
                    <h2 style ="color:#04223a;"> Table Information </h2>
                    <br>
                    <div>
                    <input type="digit" name="tableno" placeholder="Table Number" required><br>
                    <br>
                     <input type="number" min="0" name="capacity" placeholder="Capacity" required><br>
                      <br>
                     <input type="text" name="kind" placeholder="Table Type" required><br>
                     <br>
                     <h5>Available?</h5>
                     Yes:<input type="checkbox" name="progress" id="progress1" value="Yes" tabIndex="1" onClick="ckChange(this)">
                     No:<input type="checkbox" name="progress" id="progress2" value="No" tabIndex="1" onClick="ckChange(this)">

                  <button type="submit" class="btn btn-default" name="btn-upload">Add</button>
                    </form>

                  </div>
                </div>

                </div>
                <div class="container">

                    <div class="table-responsive-sm">

                      <table class="table">
                        <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Table Number</th>
                            <th scope="col">Type</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">Available?</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = $con->query('SELECT * FROM table_desc');

                          if($query->num_rows > 0){
                            while($row = $query->fetch_assoc()){
                                $itemURL = $row['tableno'];
                                $typeURL = $row['types'];
                                $priceURL =  $row['capacity'];
                                $descriptionURL = $row['available'];
                          ?>

                          <tr>

                            <td><?php echo $itemURL;?></td>
                            <td><?php echo $typeURL;?></td>
                            <td><?php echo $priceURL;?></td>
                            <td><?php echo $descriptionURL;?></td>
                            <td><a href="edittable.php?edit=<?php echo $row['tableid']?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                            <td><a href="deletetable.php?id=<?php echo $row['itmid']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>

                          </tr>
                        <?php }
                        }
                        else{ ?>
                          <center>  <h1>Coming Soon...</h1></center>
                        <?php } ?>
                        </tbody>
                      </table>
                    </table>
                  </div>
                </div>
            </div>
        </div>
      </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>

        function ckChange(ckType){
            var ckName = document.getElementsByName(ckType.name);
            var checked = document.getElementById(ckType.id);

            if (checked.checked) {
              for(var i=0; i < ckName.length; i++){

                  if(!ckName[i].checked){
                      ckName[i].disabled = true;
                  }else{
                      ckName[i].disabled = false;
                  }
              }
            }
            else {
              for(var i=0; i < ckName.length; i++){
                ckName[i].disabled = false;
              }
            }
        }
        </script>
    </body>
</html>
