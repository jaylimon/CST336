<?php
$nameErr= $felonErr= $residentErr= $ageErr= $citizenErr= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }else {
    $name = input($_POST["name"]);
  }
  if (empty($_POST["felon"])) {
    $felonErr = "You must select Yes or No";
  }else {
    $felon = input($_POST["felon"]);
    if($felon == "yes")
    {
      $flag1= 1;
    }
    else 
      $flag1= 3;
    
  }
  if (empty($_POST["resident"])) {
    $residentErr = "You must select Yes or No";
  }else {
    $resident = input($_POST["resident"]);
    if($resident == "no"){
      $flag2= 1;
    }else{
      $flag2= 3;
    }
    
  }
  if (empty($_POST["citizen"])) {
    $citizenErr = "You must select Yes or No";

  }else {
    $citizen = input($_POST["citizen"]);
    if($citizen == "no"){
      $flag3= 1;
    }
    else{
      $flag3= 3;
    }
  }
  if (empty($_POST["age"])) {
    $ageErr = "You must select your age";
  }else {
    $age = input($_POST["age"]);
    if($age == "seventeen"){
      $flag4= 1;
    }
    else{
      $flag4= 3;
    }
  }
  
}

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    <h1>ARE YOU ELIGIBLE TO VOTE ? <h1>
</head>
<body>

<h3>Lets begin!</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
What is your name? <input type="text" name="name" value= '<?php echo $_POST["name"] ?>'>
<span class="error">* <?php echo $nameErr;?></span>
<br>
<br>       
            
Are you a US citizen? <input type="radio" name = "citizen" value="yes"<?php if($_POST["citizen"] == 'yes') {echo 'checked';}?>>Yes
<input type="radio" name = "citizen" value="no" <?php if($_POST["citizen"] == 'no') {echo 'checked';}?>>No
<span class="error">* <?php echo $citizenErr;?></span>
<br>              
<br>
How old are you ?<select name = "age">
    <option value = "0">Age</option>
    <option value = "seventeen" <?php if($_POST["age"] == 'seventeen') {echo 'selected';}?>>under 17</option>
    <option value = "eighteen" <?php if($_POST["age"] == 'eighteen') {echo 'selected';}?>>over 18</option>
</select>
<span class="error">* <?php echo $ageErr;?></span>
<br>
<br>
Are you a current Resident of California?
<input type="checkbox" name="resident" value="yes" <?php if($_POST["resident"] == 'yes') {echo 'checked';}?>> Yes
<input type="checkbox" name="resident" value="no" <?php if($_POST["resident"] == 'no') {echo 'checked';}?>> No
<span class="error">* <?php echo $residentErr;?></span>
<br>
<br>
Are you on parole for a felony conviction?
<input type="checkbox" name="felon" value="yes" <?php if($_POST["felon"] == 'yes') {echo 'checked';}?>> Yes
<input type="checkbox" name="felon" value="no" <?php if($_POST["felon"] == 'no') {echo 'checked';}?>> No
<span class="error">* <?php echo $felonErr;?></span>
<div>
    <br/>
<input type="submit" name="submit" value="Submit">  
</div>
</form>
<?php

if($flag1 ==3 && $flag2 ==3 && $flag3 ==3 && $flag4==3){
echo  "<h1 id= 'congrats'>CONGRATS, YOU'RE ELIGIBLE TO VOTE!!!<h1>";
echo '<img src="img/vote.png" alt="icon" />';
  }else if(($flag1 ==1 or $flag2 == 1 or $flag3 ==1 or $flag4==1)){
    echo "<h2 id= 'sorry'>SORRY, YOU'RE NOT ELIGIBLE TO VOTE.<h2>";
    if($flag1==1)
    {
      echo  "<h4> YOU CANNOT BE A CONVICTED FELON.<h4>";
    }
    if($flag2==1)
    {
      echo  "<h4>YOU MUST BE A CALIFORNIA RESIDENT.<h4>";
    }
    if($flag3==1)
    {
      echo  "<h4>YOU MUST BE A U.S CITIZEN.<h4>";
    }     
    if($flag4==1)
    {
      echo  "<h4>YOU MUST BE 18 YEARS OR OLDER.<h4>";
    }    
  }
?>            
    </body>
</html>