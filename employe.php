
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Hamza_Nawabi -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bs.css">
    <script src="js.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>events</title>
    <link rel="stylesheet" href="SmalStyle.css">
    <style>
      .form-control:focus{
        box-shadow:3px 2px 12px black;
      }
    </style>

</head>
<body>
  
    <!-- Navbar section -->
   
    <nav class="navbar navbar-expand-md" style="background-color: var(--bg); ">
      <div class="container-fluid">
         <a class="navbar-brand active" href="#">
          <img src="img/home/StartupistanLogo.png" class=" ms-md-5 m-1 me-0 " style="height: 50px;"  alt="">
         </a>
          <button class="navbar-toggler navbar-toggler-md " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" 
             aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ><span>
          </button>
          <div class="collapse navbar-collapse justify-content-end p-3 fw-bold fs-6" id="navbarNavAltMarkup">
           <div class="navbar-nav">
            <a class="nav-link m-4 text-primary mb-0 mt-1 p-2" href="about.html">ABOUT</a>
            <a class="nav-link m-4 text-primary mb-0 mt-1 p-2" href="events.html">EVENTS</a>
            <a class="nav-link m-4  text-primary mb-0 mt-1 p-2 " id="parent"
            href="programs.html">PROPGRAMS <span id="titlehider"> 
             web-development bootcamp digital-orientation-course</span></a>
            <a class="nav-link m-4 text-primary mb-0 mt-1 p-2 bg-primary text-light" href="apply.html" style="border-radius:10px ; ">APPLY NOW</a>
          </div>
        </div>
      </div>
    </nav>
  
    
    <!-- Section First Home page  -->
    <div class="container"><br><br>
    <div class="card mb-5">
        <div class="card-header bg-dark">
        <button type="button" class="btn btn-outline-secondary  " data-bs-toggle="modal" data-bs-target="#saveStudentModal">Add New Person</button>
        </div>
        <div class="card-body m-0 p-0">
           <div class="table-responsive-sm">
            <table class="table table-primary table-bordered m-0 p-0 table-hover table-striped">
                <thead>
                    <div id="myAlert" class="alert  m-0 d-none" role="alert">
                        
                    </div>
                    
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">phone</th>
                        <th scope="col">email</th>
                        <th scope="col">course</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    $con = mysqli_connect('localhost','root','','db_students');
                    $query = "SELECT * FROM students";

                    $query_run = mysqli_query($con,$query);

                    foreach($query_run as $st){
                        ?>
                    <tr>
                        <td> <b><?= $i++?></td>
                        <td><?= $st['name'];?></td>
                        <td><?= $st['phone'];?></td>
                        <td><?= $st['email'];?></td>
                        <td><?= $st['course'];?></td>
                        <td>
                            <button class='infoStudentBtn btn btn-info btn-sm' value="<?= $st['id'];?>">info</button>
                            <button class='editStudentBtn btn btn-primary btn-sm'value="<?= $st['id'];?>">Edit</button>
                            <button class='deleteStudentBtn btn btn-danger btn-sm'value="<?= $st['id'];?>">Delete</button>
                        </td>
                    </tr>
                   <?php } ?>
                </tbody>
            </table>
           </div>
           
        </div>
    </div>
   </div>
    <!-- =========================Save Student Modal======================================== -->    
    <!-- Modal Body-->
    <div class="modal fade" id="saveStudentModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Add New Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div id="errorMessage"></div>
                        <form id="saveStudent">
                            <label for="name">Student <b>Name</b>:</label>
                            <input type="text" name="name" id="name" class="form-control">
                            
                            <label for="name">Student <b>email</b>:</label>
                            <input type="text" name="email" id="email" class="form-control">

                            <label for="name">Student <b>phone</b>:</label>
                            <input type="text" name="phone" id="phone" class="form-control">

                            <label for="name">Student <b>course</b>:</label>
                            <input type="text" name="course" id="course" class="form-control">

                    </div>
                </div>
                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-primary">Create</button>
                            </div>
                        </form>
            </div>
        </div>
    </div>

    <!-- ===============================Info Modale============================================= -->   
    <!-- Modal -->
    <div class="modal fade" id="infoStuddentModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">The Student Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                       <table>
                       <tr>
                            <th>Name: </th>
                            <td id="stName"></td>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <td id="stEmail"></td>
                        </tr>
                        <tr>
                            <th>Phone: </th>
                            <td id="stPhone"></td>
                        </tr>
                        <tr>
                            <th>Course: </th>
                            <td id="stCourse"></td>
                        </tr>
                       </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================================Edit Student===================================== -->
    <div class="modal fade" id="studentEditModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Add New Person</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div id="errorMessage"></div>
                                    <form id="updateStudent">
                                        <h1 id="myName"></h1>
                                        <input type="hidden" name="student_id" id="student_id" >
                                        <label for="name">Student <b>Name</b>:</label>
                                        <input type="text" name="name" id="the_name" class="form-control">
                                        
                                        <label for="name">Student <b>email</b>:</label>
                                        <input type="text" name="email" id="the_email" class="form-control">

                                        <label for="name">Student <b>phone</b>:</label>
                                        <input type="text" name="phone" id="the_phone" class="form-control">

                                        <label for="name">Student <b>course</b>:</label>
                                        <input type="text" name="course" id="the_course" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-primary">Update</button>
                            </div>
                        </form>
            </div>
        </div>
    </div>
    
    
    
 


    <!-- The footer section  -->
               <div class="footer bg-primary p-3 p-sm-5" >
                  
                       <div class="row">
                            <div class="col-lg-6 ">
                              <strong class="display-5 fw-bold" style="color: white;">Startupistan</strong><br><br>
                                  <div class="link-group text-light" style="height:180px ;">
                                 <a href="#">about us</a><br>
                                 <a href="#">community</a><br>
                                 <a href="#">programs</a><br>
                                 <a href="#">stories</a><br><br>
                                </div>
                                 <p class="pt-5" style="color: white;">Teaching the DNA of the future from Berlin to Kabul &#128518;
                                 <span style="font-size:170%;color:red;"> &hearts; </span></p>

                            </div>
                            <div class="col-lg-6">
                              <h4 class="text-light text-uppercase">join our community</h4><br>
                              <p class="text-light h5 text-uppercase" style="line-height:40px ;">Be the first to get invited to our courses & even learn about what we are up to <br>and the oppotunities to get involved</p>
                       
                  <input type="email" class="shadow p-3 px-md-5 w-50" style="" name="email"
                   placeholder="Email Addrss" id="" pattern="[a-z , 0-9 , @ , . ]*" >
                  <button class="btn w-md-25 p-3 btn-lg btn-outline-light mb-1">Subscribe</button>
               <br>
                             <div class="row">
                                <div class="col mt-4" id="icon">
                                  <a href="#"class="text-white ps-2   shadow me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="padding-top:10px;" width="50 "  fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                      </svg>
  
                                  </a>
                                  <a href="#"class="text-white ps-2  shadow me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"style="padding-top:10px;"  width="50" fill="currentColor" class="bi bi-messenger" viewBox="0 0 16 16">
                                        <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"/>
                                      </svg>
                                  </a>
                                  <a href="#"class="text-white  ps-2  shadow me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="padding-top:10px;" width="50" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                      </svg>
                                  </a>
                                  <a href="#"class="text-white  ps-2  shadow me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="padding-top:10px;" width="50" fill="currentColor" class="bi bi-paypal" viewBox="0 0 16 16">
                                        <path d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z"/>
                                      </svg>
                                  </a>
                                  <a href="#"class="text-white   shadow me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="padding-top:10px;" width="50" fill="currentColor" class="bi bi-browser-edge" viewBox="0 0 16 16">
                                        <path d="M9.482 9.341c-.069.062-.17.153-.17.309 0 .162.107.325.3.456.877.613 2.521.54 2.592.538h.002c.667 0 1.32-.18 1.894-.519A3.838 3.838 0 0 0 16 6.819c.018-1.316-.44-2.218-.666-2.664l-.04-.08C13.963 1.487 11.106 0 8 0A8 8 0 0 0 .473 5.29C1.488 4.048 3.183 3.262 5 3.262c2.83 0 5.01 1.885 5.01 4.797h-.004v.002c0 .338-.168.832-.487 1.244l.006-.006a.594.594 0 0 1-.043.041Z"/>
                                        <path d="M.01 7.753a8.137 8.137 0 0 0 .753 3.641 8 8 0 0 0 6.495 4.564 5.21 5.21 0 0 1-.785-.377h-.01l-.12-.075a5.45 5.45 0 0 1-1.56-1.463A5.543 5.543 0 0 1 6.81 5.8l.01-.004.025-.012c.208-.098.62-.292 1.167-.285.129.001.257.012.384.033a4.037 4.037 0 0 0-.993-.698l-.01-.005C6.348 4.282 5.199 4.263 5 4.263c-2.44 0-4.824 1.634-4.99 3.49Zm10.263 7.912c.088-.027.177-.054.265-.084-.102.032-.204.06-.307.086l.042-.002Z"/>
                                        <path d="M10.228 15.667a5.21 5.21 0 0 0 .303-.086l.082-.025a8.019 8.019 0 0 0 4.162-3.3.25.25 0 0 0-.331-.35c-.215.112-.436.21-.663.294a6.367 6.367 0 0 1-2.243.4c-2.957 0-5.532-2.031-5.532-4.644.002-.135.017-.268.046-.399a4.543 4.543 0 0 0-.46 5.898l.003.005c.315.441.707.821 1.158 1.121h.003l.144.09c.877.55 1.721 1.078 3.328.996Z"/>
                                      </svg>
                                  </a>
                                </div>
                             </div>
                            </div>
                        </div>
                        <div class="container text-light">
                          <center>
                          <h4>Say hi - wo'd love to chat</h4>
                          <h5>Hello@startupistan.org </h5>
                          <h5>IMPRINT-DISCLAIMER-PRIVACY POLICY</h5>
                            <h5>© Hamza_Nawabi </h5>
                        </center>
                        </div>
                    
                </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script> -->

                
</body>
<script src="jquery.min.js"></script>
<script src="code.js"></script>
</html>