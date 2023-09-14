<?php 

session_start();

if(!isset($_SESSION['logedin']) && !$_SESSION['logedin']) {
  echo "nee";
}