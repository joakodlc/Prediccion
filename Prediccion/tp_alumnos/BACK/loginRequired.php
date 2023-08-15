<?php
// define variables and set to empty values
$nameErr = $passErr = "";
$name = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["nombre"]);
    }

    if (empty($_POST["password"])) {
        $passErr = "Password is required";
      } else {
        $pass = test_input($_POST["password"]);
      }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>