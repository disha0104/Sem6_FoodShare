<?php
include("login.php"); 
if($_SESSION['name']==''){
	header("location: signin.php");
}
// include("login.php"); 
$emailid= $_SESSION['email'];
$connection=mysqli_connect("localhost:3306","root","");
$db=mysqli_select_db($connection,'demo');
if(isset($_POST['submit']))
{
    $foodname=mysqli_real_escape_string($connection, $_POST['foodname']);
    $meal=mysqli_real_escape_string($connection, $_POST['meal']);
    $category=$_POST['image-choice'];
    $quantity=mysqli_real_escape_string($connection, $_POST['quantity']);
    // $email=$_POST['email'];
    $phoneno=mysqli_real_escape_string($connection, $_POST['phoneno']);
    $district=mysqli_real_escape_string($connection, $_POST['district']);
    $address=mysqli_real_escape_string($connection, $_POST['address']);
    $name=mysqli_real_escape_string($connection, $_POST['name']);
  

 



    $query="insert into food_donations(email,food,type,category,phoneno,location,address,name,quantity) values('$emailid','$foodname','$meal','$category','$phoneno','$district','$address','$name','$quantity')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {

        echo '<script type="text/javascript">alert("data saved")</script>';
        header("location:delivery.html");
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donate</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body style="    background-color: #06C167;">
    <div class="container">
        <div class="regformf" >
    <form action="" method="post">
        <p class="logo"> <b style="color: #06C167; ">FoodShare</b></p>
        
       <div class="input">
        <label for="foodname"  > Food Name:</label>
        <input type="text" id="foodname" name="foodname" required/>
        </div>
      
      
        <div class="radio">
        <label for="meal" >Meal type :</label> 
        <br><br>

        <input type="radio" name="meal" id="veg" value="veg" required/>
        <label for="veg" style="padding-right: 40px;">Veg</label>
        <input type="radio" name="meal" id="Non-veg" value="Non-veg" >
        <label for="Non-veg">Non-veg</label>
    
        </div>
        <br>
        <div class="input">
        <label for="food">Select the Category:</label>
        <br><br>
        <div class="image-radio-group">
            <input type="radio" id="raw-food" name="image-choice" value="raw-food">
            <label for="raw-food">
              <img src="img/raw-food.png" alt="raw-food" >
            </label>
            <input type="radio" id="cooked-food" name="image-choice" value="cooked-food"checked>
            <label for="cooked-food">
              <img src="img/cooked-food.png" alt="cooked-food" >
            </label>
            <input type="radio" id="packed-food" name="image-choice" value="packed-food">
            <label for="packed-food">
              <img src="img/packed-food.png" alt="packed-food" >
            </label>
          </div>
          <br>
        <!-- <input type="text" id="food" name="food"> -->
        </div>
        <div class="input">
        <label for="quantity">Quantity:(number of person /kg)</label>
        <input type="text" id="quantity" name="quantity" required/>
        </div>
       <b><p style="text-align: center;">Contact Details</p></b>
        <div class="input">
          <!-- <div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
          </div> -->
      <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"value="<?php echo"". $_SESSION['name'] ;?>" required/>
      </div>
      <div>
        <label for="phoneno" >PhoneNo:</label>
      <input type="text" id="phoneno" name="phoneno" maxlength="10" pattern="[0-9]{10}" required />
        
      </div>
      </div>
        <div class="input">
        <label for="location"></label>
        <label for="district">District:</label>
<select id="district" name="district" style="padding:10px;">
<option value="ahmedabad">Ahmedabad</option>
                          <option value="amreli">Amreli</option>
                          <option value="anand">Anand</option>
                          <option value="aravalli">Aravalli</option>
                          <option value="banaskantha">Banaskantha</option>
                          <option value="bharuch">Bharuch</option>
                          <option value="bhavnagar">Bhavnagar</option>
                          <option value="botad">Botad</option>
                          <option value="chhota udaipur">Chhota Udaipur</option>
                          <option value="dahod">Dahod</option>
                          <option value="dang">Dang</option>
                          <option value="devbhoomi dwarka">Devbhoomi Dwarka</option>
                          <option value="gandhinagar">Gandhinagar</option>
                          <option value="gir somnath">Gir Somnath</option>
                          <option value="jamnagar">Jamnagar</option>
                          <option value="junagadh">Junagadh</option>
                          <option value="kutch">Kutch</option>
                          <option value="kheda" selected>Kheda</option>
                          <option value="mahisagar">Mahisagar</option>
                          <option value="mehsana">Mehsana</option>
                          <option value="morbi">Morbi</option>
                          <option value="narmada">Narmada</option>
                          <option value="navsari">Navsari</option>
                          <option value="panchmahal">Panchmahal</option>
                          <option value="patan">Patan</option>
                          <option value="porbandar">Porbandar</option>
                          <option value="rajkot">Rajkot</option>
                          <option value="sabarkantha">Sabarkantha</option>
                          <option value="surat">Surat</option>
                          <option value="surendranagar">Surendranagar</option>
                          <option value="tapi">Tapi</option>
                          <option value="vadodara">Vadodara</option>
                          <option value="valsad">Valsad</option>
</select> 

        <label for="address" style="padding-left: 10px;">Address:</label>
        <input type="text" id="address" name="address" required/><br>
        
      
       
       
        </div>
        <div class="btn">
            <button type="submit" name="submit"> submit</button>
     
        </div>
     </form>
     </div>
   </div>
     
    
</body>
</html>