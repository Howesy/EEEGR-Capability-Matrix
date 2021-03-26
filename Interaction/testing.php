<?php
include_once("../Core/databaseCoordinate.php");
$companyLocation = "Unit 4 Ground Floor Wellington Park, Excalibur Road, Beacon Business Park, Great Yarmouth, Norfolk, NR31 7BB";
$databaseCoordinate = new DatabaseCoordinate("eeegr");
echo var_dump($databaseCoordinate->companyInformation->RetrieveDatabaseData());
echo $databaseCoordinate->companyInformation->RetrieveDataIndexes();
//$databaseCoordinate->InitializeCompanyInformation("EEEGR", "01493 412199", "office@eeegr.com", "charlie.howes@eeegr.com", $companyLocation);
echo("<br> | Initialized Testing File | : [Activated all allocated and coordinated files]");
?>