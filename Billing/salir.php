<?php

// Inialize session
session_start();

// Delete certain session
unset($_SESSION['usuario']);
unset($_SESSION['incorrecto']);
unset($_SESSION['query2']);
// Delete all session variables
// session_destroy();

// Jump to login page
header('Location: index.php');
