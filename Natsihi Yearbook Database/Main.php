<!DOCTYPE HTML> 
<html>
<head>
  <meta name="HandheldFriendly" content="true" />
  <meta name="MobileOptimized" content="320" />
  <meta name="Viewport" content="width=device-width" />

<title>Natsihi Yearbook Database</title>

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!--<link rel = "stylesheet" type="text/css" href="styles.css">-->
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>

<body> 

<h1> Welcome to the yearbook database! </h1>

<?php
// define variables and set to empty values
$inputErr = $QErr = "";
$input = $query = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["input"])) {
     $inputErr = "input is required";
   } else {
     $input = test_input($_POST["input"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z0-9]*$/",$input)) {
       $inputErr = "Only letters and white space allowed"; 
     }
   }

   if (empty($_POST["query1"])) {
     $QErr = "Query is required";
   } else {
     $query1 = test_input($_POST["query1"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<div id = "show" >
<h1>Find all the yearbook information you need</h1>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   <Ttt>Your Search:</Ttt> <input type="text" name="input" class="tBoxStl" value="<?php echo $input;?>">
   <span class="error"> <?php echo $inputErr;?></span>
   <br><br> 
   
<Ttt>Query:</Ttt><span class="error"> <?php echo $QErr;?></span><br></br>
   <input type="radio" name="query1" id="r1" <?php if (isset($query1) && $query1=="CountColor") echo "checked";?>  value="CountColor">
   <label for="r1"><span></span>Pages in Color Section</label>
  <p>
   <input type="radio" name="query1" id="r2" <?php if (isset($query1) && $query1=="NeedStory") echo "checked";?>  value="NeedStory">
   <label for="r2"><span></span>Find Who Has Few Stories </label>
  <p>
   <input type="radio" name="query1" id="r3" <?php if (isset($query1) && $query1=="GetDeadline") echo "checked";?>  value="GetDeadline">
   <label for="r3"><span></span>Find Deadlines</label>
  <p>
   <input type="radio" name="query1" id="r4" <?php if (isset($query1) && $query1=="GetEditorAssignment") echo "checked";?>  value="GetEditorAssignment">
   <label for="r4"><span></span>Editor Assignment</label>
  <p>
   <input type="radio" name="query1" id="r5" <?php if (isset($query1) && $query1=="GetEmail") echo "checked";?>  value="GetEmail">
   <label for="r5"><span></span>Find an Email</label>
  <p>
   <input type="radio" name="query1" id="r6" <?php if (isset($query1) && $query1=="GetStoryDue") echo "checked";?>  value="GetStoryDue">
   <label for="r6"><span></span>Get Story Deadline</label>
  <p>
   <input type="radio" name="query1" id="r7" <?php if (isset($query1) && $query1=="GetColor") echo "checked";?>  value="GetColor">
   <label for="r7"><span></span>Get Color</label>
  <p>
   <input type="radio" name="query1" id="r8" <?php if (isset($query1) && $query1=="ShowStories") echo "checked";?>  value="ShowStories">
   <label for="r8"><span></span>Show Stories</label>   

<br><br><input type="submit" name="submit" value="Submit" class="btn-style" ></br></br>

</form>
 
<?php

include 'DatabaseConnect.php';

connecter($query1, $input);// query , user input,

?>

</div>
</body>
</html>