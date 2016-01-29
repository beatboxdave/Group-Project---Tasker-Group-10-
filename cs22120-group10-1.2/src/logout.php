<?php

session_start();
session_destroy(); // Destroys all sessions
header('Location: index.php'); // Redirection back to the login page.
?>