<?php
$conn = new mysqli('localhost', 'root', 'root', 'js');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Escape special characters in the form values
  $name = $conn->real_escape_string($name);
  $phone = $conn->real_escape_string($phone);
  $email = $conn->real_escape_string($email);
  $password = $conn->real_escape_string($password);

  // Construct the SQL query with concatenated values
  $sql = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "Registration Successful";
  } else {
    echo "Error inserting user: " . $conn->error;
  }

  $conn->close();
}
?>
