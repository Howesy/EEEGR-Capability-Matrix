<?php



include_once("../Core/databaseCoordinate.php");
include_once("../Utility/dataHandler.php");
include_once("../Utility/extraUtility.php");

$databaseCoordinate = new DatabaseCoordinate("eeegr");
$retrievedCompanyName = isset($_GET["companyName"]) ? $_GET["companyName"] : "";
if ($retrievedCompanyName == "") die("Please provide a company name to retrieve data.");



?>