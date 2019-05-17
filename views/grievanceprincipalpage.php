<?php
include_once '../helpers/init.php';

if (!isset($_SESSION['USERNAME'])){
       header('Location:principallogin.php');
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
           <form class="form-inline" action="../process/principallogin.php" method="post">
            <button class="btn btn-dark my-2 my-sm-0" type="submit"name="logout">LOGOUT</button>
           </form>
         </ul>
     </div>

   </nav>
   <body>

    <div class="container-fluid">
      <?php require 'sub-views/principalsidenav.php'; ?>
       <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
       <div id="main">

         <div class="container">
           <?php
           include_once '../helpers/init.php';

           $case_id = $_GET['id'];

           // echo "NO".$case_id;

           $sql = "SELECT * FROM grievancec WHERE id=$case_id";
           $statement = $conn->prepare($sql);
           $statement->execute();
           $result = $statement->fetchAll();

           foreach ($result as $key => $value) {
           // code...
           // echo "NAME:".$value['name'];
           }
           ?>

             <div class="bx">
               <div class="shadow-lg p-3 mb-5 bg-white rounded">
                 <h1 class="display-4">Grievance Redressal</h1>
                  <h1 class="lead"> <mark>Student Details</mark></h1>
                  <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                          <label for="">Student Name <span class="text-danger">*</span></label>
                          <h5 class="lead"><?php echo $value['name'];  ?></h5>
                        </div>
                        <div class="form-group">
                          <label for="">Roll No.<span class="text-danger">*</span></label>
                          <h5 class="lead"><?php echo $value['rollno'];  ?></h5>
                        </div>
                        <div class="form-group">
                          <label class="">Department<span class="text-danger">*</span></label>
                        <h5 class="lead"><?php echo $value['department'];  ?></h5>
                        </div>

                        <div class="form-group">
                          <label class="">Contact No<span class="text-danger">*</span></label>
                          <h5 class="lead"><?php echo $value['contactno'];  ?></h5>
                        </div>

                        <div class="form-group">
                          <label class="">Email ID<span class="text-danger">*</span></label>
                          <h5 class="lead"><?php echo $value['email'];  ?></h5>
                        </div>
                        <div class="w-25 p-3"></div>
                        <label class="lead"> <mark>Grievance Details</mark></label>
                        <br>
                        <div class="form-group">
                          <label for="">Grievance Reg.No.</label>
                          <h5 class="lead"><?php echo $value['id'];  ?></h5>
                        </div>
                        <div class="form-group">
                          <label for="">Grievance Type<span class="text-danger">*</span></label>
                          <h5 class="lead"><?php echo $value['grievancetype'];  ?></h5>
                        </div>
                        <div class="form-group">
                          <label for="">File Attachement</label>
                          <a href="grievanceimageprincipal.php?id=<?php echo $value['id'];?>" class="btn btn-info">View</a>
                        </div>
                        <div class="form-group">
                          <label for="">Status</label>
                          <h5 class="lead"><?php echo $value['status'];  ?></h5>
                        </div>

                        <div class="form-group">
                          <label class="">Description of Grievance<span class="text-danger">*</span></label>
                          <p class="lead"><?php echo $value['description'];  ?></p>
                        </div>
                        <hr>
                        <form class="form-inline" action="../process/grievanceprocessP.php" method="post">

                       <div class="form-group">
                         <label for="">Choose Action</label>
                         <select name="grievanceStatus" class="custom-select mr-sm-2" required id="inlineFormCustomSelect">
                           <option selected>Choose...</option>
                           <option value="In Processing">In Processing</option>
                           <option value="Solved">Solved</option>
                           <option value="Rejected">Rejected</option>
                         </select>
                       </div>
                         <br>
                         <div class="form-group">
                           <label for="">Message</label>
                           <textarea name="message" class="form-control" rows="5" id="comment" required></textarea>
                         </div>
                         <input type="hidden" name="case_id" value="<?php echo $value['id'];  ?>" />
                         <button class="btn btn-info my-2 my-sm-0" type="submit"name="responceP">Submit</button>
                       </form>

                    </div>
                  </div>
               </div>
              </div>
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
