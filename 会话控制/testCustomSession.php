<?php

require_once 'CustomSession.php';
$CustomSession=new CustomSession;
ini_set('session.save_handler','user');
session_set_save_handler($CustomSession, true);
session_start();
$_SESSION['username']='king';
$_SESSION['age']=23;
$_SESSION['test']='this is a test';
$_SESSION['email']='muke@imooc.com';

session_destroy();