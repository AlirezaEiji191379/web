<?php
include_once ("Functions.php");
include_once ("../DBInformation/dbInf.php");
checkSelectedOptions();
addKeyToDB();
header("location: ../../Pages/adminPanel/adminPanel.php");












