<?php
if (isset($_POST['bread'])) {
    $bread = "True";
 } else {
    $bread = "False";
 }

 if (isset($_POST['milk'])) {
    $milk = "True";
 } else {
    $milk = "False";
 }

 if (isset($_POST['butter'])) {
    $butter = "True";
 } else {
    $butter = "False";
 }

 if (isset($_POST['juice'])) {
    $juice = "True";
 } else {
    $juice = "False";
 }

 if (isset($_POST['cheese'])) {
    $cheese = "True";
 } else {
    $cheese = "False";
 }

$dbconn = pg_connect("host=localhost dbname=web_laba user=postgres password=polina-")
    or die('Could not connect: ' . pg_last_error());

$values = array(
    "name" => $_POST['name'],
    "surname" => $_POST['surname'],
    "address" => $_POST['address'],
    "phone" => $_POST['phonenumber'],
    "email" => $_POST['email'],
    "comment" => $_POST['comment'],
    "bread" => $bread,
    "butter" => $butter,
    "milk" => $milk,
    "juice" => $juice,
    "cheese" => $cheese,
);

$result = pg_insert($dbconn, "orders", $values) or die('Insert into database failed: ' . pg_last_error());

echo "<script>
    alert('Спасибо за заказ!');
    window.location.href='index.html';
    </script>";

pg_free_result($result);

pg_close($dbconn);

?>
