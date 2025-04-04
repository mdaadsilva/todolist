<?php
session_start();
session_destroy();
header("Location: /todolist/login/login.php");
exit();
