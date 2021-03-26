<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class TopsidePreparation extends DatabaseHandling
{
    private $procedureName;
    protected $tableName;

    function __construct($databaseName)
    {
        $this->procedureName = "topsidePreparationInfoAdd";
        $this->tableName = "topsidepreparation";
        parent::__construct($databaseName, $this->tableName);
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if (!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS $this->procedureName;"))
            LogError("[Topside Preparation CheckProcedure] Error occured: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if (!$this->databaseConnection->query("CREATE PROCEDURE $this->procedureName(IN companyName TEXT, 
        IN disconnect varchar(8), IN utilities varchar(8), IN liftingPrep varchar(8)) 
        BEGIN INSERT INTO $this->tableName (companyName, disconnect, utilities, liftingPrep) VALUES (companyName, 
        disconnect, utilities, liftingPrep); END;"))
            LogError("[Topside Preparation CreateProcedure] Error occured: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $disconnect, $utilities, $liftingPrep)
    {
        if (!$this->databaseConnection->query("CALL $this->procedureName('$companyName', '$disconnect', '$utilities', '$liftingPrep');"))
            LogError("[TopsidePreparation Insert Informaton] Error occured: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyName, $disconnect, $utilities, $liftingPrep)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET disconnect = ?,
        utilities = ?, liftingPrep = ? WHERE companyName = ?");
        $statement->bind_param("ssss", $disconnect, $utilities, $liftingPrep, $companyName);
        $statement->execute();
        $statement->close();
    }
}

?>