<?php
require_once 'mobile_detect.php';
require_once 'config.php';
require_once 'functions.php';
$detect = new Mobile_Detect;
$isMobile = $detect->isMobile();
$css = $isMobile ? 'mobile.css' : 'desktop.css';
$break = $isMobile ? '' : '<br>';