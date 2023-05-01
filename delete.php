<?php

require "database.php";

// if (!isset($_SESSION["user"])) {
//   header("Location: login.php");
//   return;
// }

$id = $_GET["id"];

$statement = $conn->prepare("SELECT * FROM books WHERE id = :id");
$statement->execute([":id" => $id]);

if ($statement->rowCount() == 0){
  http_response_code(404);
  echo("HTTP 404 NOT FOUND MAMAWEBO");
  return;
}

$conn->prepare("DELETE FROM books WHERE id = :id")->execute([":id" => $id]);

header("Location: home.php");

?>