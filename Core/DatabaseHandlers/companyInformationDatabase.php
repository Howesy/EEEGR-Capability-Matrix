<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class CompanyInformation extends DatabaseHandling
{
    function __construct($databaseName)
    {
        parent::__construct($databaseName, "companyinformation");
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if(!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS insertCompanyInformation;"))
            LogError("[Company Information] Check Procedure Error: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if(!$this->databaseConnection->query("CREATE PROCEDURE insertCompanyInformation(IN companyName TEXT, 
        IN phoneNumber TEXT, IN companyEmailAddress TEXT, IN maintainerName TEXT, IN maintainerEmailAddress TEXT, IN maintainerPhone TEXT, 
        IN companyLocation TEXT) BEGIN INSERT INTO companyinformation (companyName, phoneNumber, 
        companyEmailAddress, maintainerName, maintainerEmailAddress, maintainerPhone, companyLocation) VALUES (companyName, phoneNumber, 
        companyEmailAddress, maintainerName, maintainerEmailAddress, maintainerPhone, companyLocation); END;"))
            LogError("[Company Information] Create Procedure Error: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $companyPhoneNumber, $companyEmailAddress, $maintainerName, $maintainerEmailAddress, $maintainerPhone, $companyAddress)
    {
        if(!$this->databaseConnection->query("CALL insertCompanyInformation('$companyName', '$companyPhoneNumber', 
        '$companyEmailAddress', '$maintainerName', '$maintainerEmailAddress', '$maintainerPhone', '$companyAddress');"))
            LogError("[Company Information] Insert Information Error: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyPhoneNumber, $companyEmailAddress, $maintainerName, $maintainerEmailAddress, $maintainerPhone, $companyAddress, $companyName)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET phoneNumber = ?, 
        companyEmailAddress = ?, maintainerName = ?, maintainerEmailAddress = ?, maintainerPhone = ?, companyLocation = ? WHERE companyName = ?");
        $statement->bind_param("sssssss", );
        $statement->execute();
        $statement->close();
    }
}

?>