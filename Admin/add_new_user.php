<?php
include "header.php";
include "connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add New User</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add new user</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form2" action="" method="post" class="form-horizontal"> 
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" name="firstname"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" name="lastname"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">User Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="User Name" name="username" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"> Input Password</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="Enter Password" name="upassword" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"> Select role</label>
              <div class="controls">
               <select name="role" >
                <option >admin</option>
                <option >user</option>
        
               </select>
              </div>
            </div>
            <div class="alert alert-danger"id="error" style="display:none">
               This username already exist!
                </div>
                
            <center>
                <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>
            </center>
            <div class="alert alert-success"id="success" style="display:none">
                 Record Inserted Successfully!
                </div>
            
          </form>
        </div>
      </div>
      
</div>
<?php
if(isset($_POST["submit1"])){
 

    $count=0;
            $res=mysqli_query($link,"SELECT * FROM `user_registration` WHERE username='$_POST[username]' ");
            $count=mysqli_num_rows($res);

        if($count>0)
    {
       ?>
       <script type ="text/javascript">
        document.getElementById("success").style.display="none";
        document.getElementById("error").style.display="block";
        </script>
       
       
       <?php
    }
else
{
    $fname=$_POST['firstname']??"";
    $lname=$_POST['lastname']??"";
    $uname=$_POST['username'];
    $upswrd=$_POST['upassword'];
    $role=$_POST['role'];
   
    
    mysqli_query($link,"INSERT INTO user_registration(id,firstname,lastname,username,upassword,urole,ustatus)values(NULL,'$fname','$lname','$uname','$upswrd','$role','active')");
    
    ?>
       <script type ="text/javascript">
        document.getElementById("success").style.display="block";
        document.getElementById("error").style.display="none";
        </script>
       
       
       <?php
}


}
?>




<?php
include "footer.php";
?>
