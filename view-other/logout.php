<?php
include_once '../model/session.php';
init();
session_destroy();
header('location:../index.php');
?>