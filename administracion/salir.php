<?php
session_start();
session_unset();
?>

<body onload="top.frames['self'].document.location = '../admin.php';">