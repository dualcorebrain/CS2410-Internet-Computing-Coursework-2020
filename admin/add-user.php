<?php include "header.php";

if($_SESSION["user_role"] == '0'){
    header("Location: {$hostname}/admin/post.php");


}
if(isset($_POST['save'])){
    include "config.php";


    //protects against hacking, password uses MD5 encryption
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    //checking is username already exists
    try{

    $sql = "SELECT username FROM user WHERE username = '{$user}'";

    $result = mysqli_query($conn, $sql) or die ("Query Failed");

    if(mysqli_num_rows($result) > 0 ){
        echo "<p style='color:red;text-align:center;margin:10px 0;'> Username already exists please enter another username</p>";
    }
    else{
        $sql1 = "INSERT INTO user (first_name, last_name, username, email, password, role)
                VALUES ('{$fname}', '{$lname}', '{$user}', '{$email}','{$password}', '{$role}')";
        
        if(mysqli_query($conn, $sql1)){             //This redirects to the users page after completion
            header("Location: {$hostname}/admin/users.php");
        }
        else{
            throw new Exception($e);
        }

    }
    }
    catch(Exception $e){
        print_r($e);
    }

}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">


                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" placeholder="Email" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>        <!-- "1" for Admin and "0" for Normal user for the SQL database-->
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->


               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
