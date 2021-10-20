<?php 
    $con= mysqli_connect('127.0.0.1','root','');
    mysqli_select_db($con,'manage_subs_database');
    session_start();
    if (!isset($_SESSION['user_id'])) {
    header('Location: Login.php');
    exit;
    }
    $User_id=$_SESSION['user_id'];
    $sql = "SELECT id,Subscription_name,Status,Billing_cycle,Start_date,Price FROM subscriptions WHERE user_id=$User_id";
    $fetch=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MySubscriptions</title>
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">HandSubZ</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="suggestion.php">Suggestions</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">My Subscriptions</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Monthly Total</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/img/ShoppingCartHndSub.png" alt="" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-upper  case mb-0">My Subscriptions</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">All added subscrptions</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">My Subscrptions</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Table showing all subscribed suggestions-->
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th scope="col" class="column">ID</th>
                              <th scope="col" class="column">Subscriptions</th>
                              <th scope="col" class="column">Status</th>
                              <th scope="col" class="column">Cycle</th>
                              <th scope="col" class="column">Next Payment</th>
                              <th scope="col" class="column">Total Amount</th>
                              
                            </tr>
                          </thead>
                        
                          <tbody>
                            <?php   
                              while($rows=mysqli_fetch_array($fetch))
                              {
                            ?>
                              <tr> 
                                <td><?php echo $rows['id'];?></td> 
                                <td><?php echo $rows['Subscription_name'];?></td>
                                <td><?php echo $rows['Status']; ?></td> 
                                <td><?php echo $rows['Billing_cycle']; ?></td> 
                                <td><?php echo $rows['Start_date']; ?></td> 
                                <td><?php echo $rows['Price']; ?></td> 
                              </tr> 
                            <?php } ?> 
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
        </section>
         <!-- Calculator - review Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
        <center><h2>Your Monthly total is displayed here...</h2></center>
            <div class="container">
                <center>
               <?php
                    //$resultBudg = mysqli_query($con, "SELECT Price, Billing_cycle FROM subscriptions ");
                    $resultBudg = "SELECT Billing_cycle,Price FROM subscriptions WHERE user_id=$User_id";
                    $fetch=mysqli_query($con,$resultBudg);
                    $total_cost=0;
                    while($row=mysqli_fetch_assoc($fetch)){
                        if($row['Billing_cycle']=="Yearly"){
                            $cost=$row['Price'];
                            $total_cost=$total_cost+($cost/12);
                        }
                        else{
                            $cost=$row['Price'];
                            $total_cost=$total_cost+$cost;
                        }
                    }
                    echo'Your total cost for the month is: '.$total_cost;
               ?>
               <p>Your total is displayed on the basis of your plan being either monthly or yearly</p>
           </center>
            </div>
        </section>
                <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Us</h2>
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h4 class="sent-notification"></h4>
                        <form id="myForm" name="sentMessage" novalidate="novalidate">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Name</label>
                                    <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Email Address</label>
                                    <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Subject</label>
                                    <input class="form-control" id="subject" type="tel" placeholder="Subject" required="required" data-validation-required-message="Please enter the subject of the message" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Message</label>
                                    <textarea class="form-control" id="body" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <button class="btn btn-primary btn-xl" type="button" onclick="sendEmail()" value="Send an email">SEND</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Founders</h4>
                        <p class="lead mb-0">
                            Shaurya
                            <br />
                            Eoin
                            <br />
                            Dave
                            <br />
                            Esther
                            <br />
                            Andrew
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">HandSubZ</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">About HandSubZ</h4>
                        <p class="lead mb-0">
                            A one stop service to help you handle all your subscriptions!!
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © HandSubZ 2020</small></div>
        </div>
        <!-- Scroll to Top Button-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script type="text/javascript">
            function sendEmail(){
                var name=$("#name");
                var email=$("#email");
                var subject=$("#subject");
                var body=$("#body");

                if(isNotEmpty(name)&&isNotEmpty(email)&&isNotEmpty(subject)&&isNotEmpty(body)){
                    $.ajax({
                        url:'sendEmail.php',
                        method:'POST',
                        dataType:'json',
                        data:{
                            name:name.val(),
                            email:email.val(),
                            subject:subject.val(),
                            body:body.val()
                        }, success:function(response){
                            $('#myForm')[0].reset();
                            $('.sent-notification').text("Your concern has been forwarded to us, Thank you!");
                        }
                    });
                }
            }
            function isNotEmpty(caller){
                if(caller.val()==""){
                     caller.css('border','1px solid red');
                     
                     return false;
                }
                else{
                    caller.css('border','');
                    return true;
                }
            }
        </script>

    </body>
</html>
