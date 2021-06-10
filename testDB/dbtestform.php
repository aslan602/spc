<?php
       

    $post = $_POST["spcname"];
    $verified = test_input($post);
    echo "The verified info from the form is $verified ";

    require 'dbpdoconfig.php'; 
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        echo "Connected to $dbname at $host successfully. ";
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname : " . $pe->getMessage());
    };

    try {
      $statement = $conn->prepare("INSERT INTO test (testname) VALUES (?)"); 
      //$statement->bindValue(':$verified', $verified, PDO::PARAM_STR);    
      $isSuccess = $statement->execute([$verified]);
      if ($isSuccess) {
        echo "The data was written to the database!  Success! ";
      }
      else {
        echo "The data FAILED to write to the database!";
      }

    } catch (PDOException $pe) {
      die("Could not connect to the database $dbname : " . $pe->getMessage());
    };
    
    function test_input($data) {
        echo "The raw data is " . $data;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };    
    
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="css/test.css">
    <script defer src="js/test.js"></script>
    <title>Test for spc database</title>    
</head>
<body>
  <p>Database was written to.  Please clich button to continue.</p><br>
  <input type="button" id="return" value="Return" onclick="clearform()">
</body>
</html>
