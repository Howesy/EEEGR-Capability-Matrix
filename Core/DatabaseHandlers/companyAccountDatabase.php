<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class CompanyAccount extends DatabaseHandling
{
    function __construct($databaseName)
    {
        parent::__construct($databaseName, "companyaccount");
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if(!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS companyAccountInfoAdd;"))
        LogError("[Company Account CheckProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if (!$this->databaseConnection->query("CREATE PROCEDURE companyAccountInfoAdd(IN companyName TEXT, IN companyPassword TEXT)
        BEGIN INSERT INTO companyaccount (companyName, companyPassword) VALUES (companyName, companyPassword); END;"))
            LogError("[Substructure Removal CreateProcedure] Error Occured: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $companyPassword)
    {
        if(!$this->databaseConnection->query("CALL companyAccountInfoAdd('$companyName', '$companyPassword');"))
            LogError("[Company Information] Insert Information Error: {$this->databaseConnection->error}");
    }

    public function CheckCompanyExistence($companyName)
    {
        $statement = $this->databaseConnection->prepare("SELECT companyName FROM companyaccount WHERE companyName = ?");
        $statement->bind_param("s", $companyName);
        $statement->execute();
        $statement->store_result();
        return ($statement->num_rows > 0);
    }

    public function CheckLoginAttempt($companyName, $password)
    {
        $hashedUserPassword = hash("sha256", $password);
        $statement = $this->databaseConnection->prepare("SELECT companyPassword FROM companyaccount WHERE companyName = ?");
        $statement->bind_param("s", $companyName);
        $statement->execute();
        $statement->bind_result($retrievedPassword);
        $statement->fetch();
        return ($hashedUserPassword == $retrievedPassword);
    }
}

?>