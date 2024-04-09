<link rel="stylesheet" href="css/contact.css">

<?php include 'components/header.php';
?>


        
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Contact Us</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->
  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
          <?php
          if(isset($_GET["success"])){
            echo "<h4>Email Sent Successfully.<br> We will Contact you as soos as possible.</h4>";
            
          }
          
          if(isset($_GET["missing"])){
            echo "<h4 >Please fill all the fields </h4>";
          }
          ?>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form form1" action="contactProcess.php" method="post" >
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="description" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder = 'Enter Message' ></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name' >
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address' >
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder = 'Enter Subject'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="submit" name="send" value="SEND MESSAGE" class="button button-contactForm btn_4 boxed-btn">
            </div>
            
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>North Urban Center, Tunis.</h3>
              <p>foodHub</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>( +216 ) 55 556 373 </h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>benameureya953@gmail.com</h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

<?php include 'components/footer.php'?>