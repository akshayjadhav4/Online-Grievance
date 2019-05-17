
<?php
include_once '../helpers/init.php';

if (!isset($_SESSION['ADMINNAME'])){
       header('Location:adminlogin.php');
     }

     try {
             // FETCH DATA of student
             $unverified=0;
             $stmt = $conn->prepare("SELECT * FROM student WHERE status='$unverified'");
             $stmt->execute();
             // set the resulting array to associative
             $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

           } catch (PDOException $e) {
              echo "Error: " . $e->getMessage();
           }
 ?>
 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
     <link rel="stylesheet" href="../assests/css/style.css">

     <title>Grievance Redressal</title>
   </head>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <span class="navbar-brand mb-0 h1">Grievance Redressal</span>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
         </ul>
         <ul class="navbar-nav">
           <form class="form-inline" action="../process/adminlogin.php" method="post">
            <button class="btn btn-dark my-2 my-sm-0" type="submit"name="logout">LOGOUT</button>
           </form>
         </ul>
     </div>

   </nav>
   <body>
     <div class="container-fluid">
       <?php
       if(isset($_SESSION["message"]))
             { ?>
                 <div class="alert alert-<?=$_SESSION['msg_type']; ?>" role="alert">
                   <?php echo $_SESSION['message']; ?>
                 </div>
               <?php  unset($_SESSION["message"]);
             }
        ?>
      <?php require 'sub-views/admindashside.php'; ?>





        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
        <div id="main">
          <div class="container">
            <h1 class="display-4">Verify Student</h1>

            <!-- <p class="card-text">Name : <?php  echo $value['fullname']; ?></p> -->
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>FullName</th>
                    <th>Phone NO.</th>
                    <th>Email</th>
                    <th>Adminssion year</th>
                    <th>Department</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php try{
                   foreach ($stmt->fetchAll() as $key => $value) {
                  ?>
                  <tr>
                    <td><?php  echo $value['fullname']; ?></td>
                    <td><?php  echo $value['phonenumber']; ?></td>
                    <td><?php  echo $value['email']; ?></td>
                    <td><?php  echo $value['year']; ?></td>
                    <td><?php  echo $value['department']; ?></td>
                    <td>
                      <?php
                          $status = $value['status'];
                          if ($status!=1) { ?>
                            <form class="form-inline" action="../process/studentregi.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                            <button class="btn btn-success my-2 my-sm-0" type="submit"name="verified">Verified</button>
                         </td>
                        <?php  }
                       ?>
                  </tr>
                </tbody>
              <?php }
              } catch (PDOException $e) {
                //throw $th;
                echo "Connection failed: " . $e->getMessage();

              }?>
              </table>
            </div>

        </div>
     </div>

 <script type="text/javascript">
     /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
           document.getElementById("main").style.marginLeft = "250px";
         }

         /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
           document.getElementById("main").style.marginLeft = "0";
         }
 </script>
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   </body>
 </html>
