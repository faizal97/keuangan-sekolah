<?php 
session_start();
session_unset($_SESSION['admin']);
session_unset($_SESSION['key']);
header("Location: ../");
 ?>