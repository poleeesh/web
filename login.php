<?php
$dbconn = pg_connect("host=localhost dbname=web_laba user=postgres password=polina-")
    or die('Could not connect: ' . pg_last_error());
$login = $_POST['login'];
$password = $_POST['password'];

$query = "SELECT * FROM logg where login ="."'$login'"." and password ="."'$password'";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$line = pg_fetch_array($result, null, PGSQL_ASSOC);

if (!empty($line)) {
    echo "<script>
    alert('Вы успешно вошли!');
    window.location.href='index.html';
    </script>";
    } else {
    echo "<script>
    alert('Неправильный логин или пароль');
    window.location.href='login.html';
    </script>";
 }

pg_free_result($result);

pg_close($dbconn);
?>
