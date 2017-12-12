<?php
 include_once('utils.php');
 $username="";
 $fullname="";
 $email="";
 if(isset($_GET['username'])){
	 $username=$_GET['username'];
 }
 if(isset($_GET['fullname'])){
	 $fullname=$_GET['fullname'];
 }
 if(isset($_GET['email'])){
	 $email=$_GET['email'];
 }
  if(isset($_GET['msg'])){
	 $msg=$_GET['msg'];
	 if($msg === '2'){

		 phpAlert('The passwords do not match');
	 }
	 else if($msg === '3'){
		 phpAlert('The password must have at least 8 characters');
	 }
	 else if($msg === '4'){
		  phpAlert('The username must have at least 4 characters');
	 }
	 else if($msg === '5'){
		 phpAlert('Password must have at least one character from 3 of the following 4 categories: \n- Uppercase letters\n- Lowercase letteres\n- Base 10 digits\n- Nonalphanumeric characters\n');
	 }
	 else if($msg === '1'){
		 phpAlert('Your username already exists');
	 }
  }
?>
<section class="session">
  <article id="register">
    <h3>Register a new account</h3>
	<p class="requiredfields">All fields are required.</p>
    <form class="registerform" action="new_user.php" method="post">
      <label>Username<br>
        <input type="text" name="username" placeholder="username" value="<?=$username?>" required autocomplete="off">
      </label>
      <br>
      <label>Name<br>
        <input type="text" name="fullname" placeholder="John Doe" value="<?=$fullname?>" autocomplete="off">
      </label>
      <br>
      <label>Password<br>
        <input type="password" name="password" placeholder="&#8226&#8226&#8226&#8226&#8226&#8226&#8226&#8226" value="" required>
      </label>
      <br>
      <label>Confirm Password<br>
        <input type="password" name="confirmpassword" placeholder="&#8226&#8226&#8226&#8226&#8226&#8226&#8226&#8226" value="" required>
      </label>
      <br>

      <label>Email<br>
        <input type="email" name="email" placeholder="email@example.com" value="<?=$email?>" required autocomplete="off">
      </label>
      <br>
      <input class="submit" type="submit" value="Register">
    </form>
  </article>
</section>
