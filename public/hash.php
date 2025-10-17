<?php
$names = ["sandy123", "juan123", "jhon123", "cyruz123", "samantha123", "andrea123"];

foreach ($names as $pass) {
    echo $pass . " => " . password_hash($pass, PASSWORD_DEFAULT) . "<br>";
}
?>
