<?php
session_start();
session_destroy();
session_unset();
echo "<script type='text/javascript'>
        alert('Logged out');
        location = '../admin_login.php';
      </script>";