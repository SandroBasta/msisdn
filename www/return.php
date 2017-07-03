<?php

require ('class/Msisdn.php');
$number = $_POST['msisdn_no'];
$validate = new Msisdn($number);
echo $validate->validate();


