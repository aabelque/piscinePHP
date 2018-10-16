<?php
require_once('model/conn.php');
session_destroy();
header("Location: index.php");
?>
