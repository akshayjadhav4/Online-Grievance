<?php
include_once '../helpers/init.php';

if (!isset($_SESSION['USERNAMES'])){
       header('Location:studentlogin.php');
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
           <form class="form-inline" action="../process/studentlogin.php" method="post">
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
      <?php require 'sub-views/studentsidenav.php'; ?>
       <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
       <div id="main">
         <div class="container">
             <div class="bx">
               <div class="shadow-lg p-3 mb-5 bg-white rounded">
                 <h1 class="display-4">Grievance Redressal</h1>
                  <h1 class="lead"> <mark>Student Details</mark></h1>
                  <h6 class="text-danger">*Required</h6>

                  <div class="row">
                    <div class="col-lg-6 col-sm-12">
                      <form action="../process/registergrievance.php" enctype="multipart/form-data" method="post" autocomplete="off">
                        <div class="form-group">
                          <label for="">Student Name <span class="text-danger">*</span></label>
                          <input class="form-control" type="text" name="studentName" required  placeholder="Enter Full Name">
                        </div>
                        <div class="form-group">
                          <label for="">Roll No.<span class="text-danger">*</span></label>
                          <input class="form-control" type="text" name="studentRollNo" required  placeholder="Enter Roll No.">
                        </div>
                        <div class="form-group">
                          <label class="">Department<span class="text-danger">*</span></label>
                          <input type="text" name="studentDepartment" value="" class="form-control" placeholder="Enter Department" required>
                        </div>

                        <div class="form-group">
                          <label class="">Contact No<span class="text-danger">*</span></label>
                          <input type="text" name="studentContactNo" value="" class="form-control" placeholder="Enter Contact No" required>
                        </div>

                        <div class="form-group">
                          <label class="">Email ID<span class="text-danger">*</span></label>
                          <input type="text" name="studentEmailID" value="" class="form-control" placeholder="Enter Email ID" required>
                        </div>
                        <div class="w-25 p-3"></div>
                        <label class="lead"> <mark>Grievance Details</mark></label>
                        <br>
                        <div class="form-group">
                          <label for="">Choose Grievance Type<span class="text-danger">*</span></label>
                          <select name="grievanceType" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Choose...</option>
                            <option value="Hostel Related">Hostel Related</option>
                            <option value="Grade/Marks Related">Grade/Marks Related</option>
                            <option value="Teacher Related">Teacher Related</option>
                            <option value="Attendance Related">Attendance Related</option>
                            <option value="Infrastructure Related">Infrastructure Related</option>
                            <option value="Library Related">Library Related</option>
                            <option value="Sports Related">Sports Related</option>
                            <option value="Internet Related">Internet Related</option>
                            <option value="Lecture Related">Lecture Related</option>
                            <option value="Ragging Related">Ragging Related</option>
                            <option value="NSS/NCC Related">NSS/NCC Related</option>
                            <option value="Canteen Related">Canteen Related</option>
                            <option value="Student Section Related">Student Section Related</option>
                            <option value="Account Section Related">Account Section Related</option>
                            <option value="Purchases/Stores Related">Purchases/Stores Related</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Upload Image<span class="text-danger">*</span></label>
                          <input type="file" name="image"class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                          <label class="">Description of Grievance<span class="text-danger">*</span></label>
                          <textarea name="desc" class="form-control" rows="5" id="comment" required></textarea>
                        </div>


                        <input type="hidden" name="USER_ID" value="<?php echo $_SESSION['USER_ID']; ?>">
                        <button class="btn btn-info"type="submit" name="submit">SUBMIT</button>
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
