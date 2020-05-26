<?php
  include('config/db_connect.php');

  $first_name = $last_name = $email = $phone_number = $subject = $message = '';
  $errors = array('first_name' => '', 'last_name' => '', 'email' => '', 'phone_number' => '', 'subject' => '', 'message' => '');
  $success = '';

  if(isset($_POST['submit'])) {
        //first name validation
        if(empty($_POST['first_name'])) {
            $errors['first_name'] = 'Please input your first name.';
        } else {
            $first_name = $_POST['first_name'];
            if(!preg_match("/^[a-zA-Z '.-]*$/", $first_name)) {
                $errors['first_name'] = 'Please input a valid first name.';
            }
        }
        //last name validation
        if(empty($_POST['last_name'])) {
            $errors['last_name'] = 'Please input your last name.';
        } else {
            $last_name = $_POST['last_name'];
            if(!preg_match("/^[a-zA-Z '.-]*$/", $last_name)) {
                $errors['last_name'] = 'Please input a valid last name.';
            }
        }
        //email validation
        if(empty($_POST['email'])) {
          $errors['email'] = 'Please input your email';
        } else {
            $email = $_POST['email'];
            if(!preg_match("^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$^", $email)) {
              $errors['email'] = 'Please input a valid email.';
            }
        }
        //save phone number -- Validate only if there is an input
        if(!empty($_POST['phone_number'])) {
          $phone_number = $_POST['phone_number'];
        }
        //subject validation
        if(empty($_POST['subject'])) {
          $errors['subject'] = "Please input your subject.";
        } else {
          $subject = $_POST['subject'];
        }
        //message Validation
        if(empty($_POST['message'])) {
          $errors['message'] = "Please input your message.";
        } else {
          $subject = $_POST['message'];
        }

        //connect to database
        if(array_filter($errors)) {
          //No error
        } else {
          $first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
          $last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
          $email = mysqli_real_escape_string($connect, $_POST['email']);
          $phone_number = mysqli_real_escape_string($connect, $_POST['phone_number']);
          $subject = mysqli_real_escape_string($connect, $_POST['subject']);
          $message = mysqli_real_escape_string($connect, $_POST['message']);

          //save to sql
          $sql = "INSERT INTO contact_info(First_Name, Last_Name, Email, Phone_Number, Subject, Message) VALUES('$first_name', '$last_name', '$email', '$phone_number', '$subject', '$message')";

          if(mysqli_query($connect, $sql)) {
              //Success - Clear form after submit
              $first_name = '';
              $last_name = '';
              $email = '';
              $phone_number = '';
              $subject = '';
              $message = '';

              $success = "Your message has been sent!";
          } else {
            echo 'query error'. mysqli_error($connect);
          }
        }
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

       <?php include("components/header.php"); ?>
       <br /><br /><br />
       <div class="container" id="my_form" data-aos="fade-up">
         <form id="myForm" action="contacts.php" method="post">

              <fieldset>
                <legend>Contact Info</legend>
                <p>Are you ready to discuss your content marketing needs? Contact me via email at aamagantal@gmail.com or using the form below to find out how I can help your business.</p>

                <br />

                <label>Name *</label>
                <div class="row">
                  <div class="col">
                    <input name ="first_name" type="text" class="form-control" placeholder="Enter your first name" value= "<?php echo htmlspecialchars($first_name); ?>">
                     <small class="form-text text-muted">&nbsp; First name</small>
                     <div class="text-danger">
                       <?php echo $errors['first_name']; ?>
                     </div>
                  </div>
                  <div class="col">

                    <input name = "last_name" type="text" class="form-control" placeholder="Enter your last name" value= "<?php echo htmlspecialchars($last_name); ?>">
                    <small class="form-text text-muted">&nbsp; Last name</small>
                    <div class="text-danger">
                      <?php echo $errors['last_name']; ?>
                    </div>
                  </div>
                </div>

                <br />  <br />

                <div class="row">
                  <div class="col">
                    <label for="email">Email address *</label>
                    <input name = "email" type="email" class="form-control" autocomplete="off" placeholder="Enter your email" value= "<?php echo htmlspecialchars($email); ?>">
                    <div class="text-danger">
                      <?php echo $errors['email']; ?>
                    </div>
                  </div>
                  <div class="col">
                    <label for="phone_number">Phone number</label>
                    <input name = "phone_number" type="telephone" class="form-control" autocomplete="off" minlength="10" maxlength="10" placeholder="Enter your phone number" value= "<?php echo htmlspecialchars($phone_number); ?>">
                    <div class="text-danger">
                      <?php echo $errors['phone_number']; ?>
                    </div>
                  </div>
                </div>

                <br /> <br />

               <div class="form-group">
                 <label for="subject">Subject *</label>
                 <input name = "subject" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter subject" value= "<?php echo htmlspecialchars($subject); ?>">
                 <div class="text-danger">
                   <?php echo $errors['subject']; ?>
                 </div>
              </div>

              <br />

              <div class="form-group">
                <label for="message">Message *</label>
                <textarea name = "message" class="form-control" id="your_message" rows="5" placeholder="Enter your message" value= "<?php echo htmlspecialchars($message); ?>"></textarea>
                <div class="text-danger">
                  <?php echo $errors['message']; ?>
                </div>
              </div>
              <br />
              <a class="twitter-follow-button" data-size="medium" data-show-screen-name="true" data-show-count="false" href="https://twitter.com/AgantalAzis">Follow @AgantalAzis</a>  
              <br /><br />
              <button type="submit" name="submit" class="btn btn-info" onclick="submit()" style="letter-spacing: 0.1em;">Submit</button>
              <p style="display: inline-block; margin-left: 20px;"><?php echo htmlspecialchars($success); ?></p>
              <br /> <br />
            </fieldset>

         </form>
       </div>
        <br/><br/><br/><br/>

       <?php include("components/footer.php"); ?>
</html>
