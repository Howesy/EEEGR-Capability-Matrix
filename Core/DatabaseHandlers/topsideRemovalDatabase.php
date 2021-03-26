<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class TopsideRemoval extends DatabaseHandling
{
    private $procedureName;
    protected $tableName;

    function __construct($databaseName)
    {
        $this->procedureName = "topsideRemovalInfoAdd";
        $this->tableName = "topsideremoval";
        parent::__construct($databaseName, $this->tableName);
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if (!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS $this->procedureName;"))
            LogError("[Topside Removal CheckProcedure] Error occured: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if (!$this->databaseConnection->query("CREATE PROCEDURE $this->procedureName(IN companyName TEXT, 
        IN liftingPreparation varchar(8), IN singleLift varchar(8), IN multipleLifts varchar(8), 
        IN demolition varchar(8)) BEGIN INSERT INTO $this->tableName (companyName, liftingPreparation, singleLift, 
        multipleLifts, demolition) VALUES (companyName, liftingPreparation, singleLift, multipleLifts, demolition); END;"))
            LogError("[Topside Removal CreateProcedure] Error occured: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $liftingPreparation, $singleLift, $multipleLifts, $demolition)
    {
        if (!$this->databaseConnection->query("CALL $this->procedureName('$companyName', '$liftingPreparation', '$singleLift', 
        '$multipleLifts', '$demolition');"))
            LogError("[Topside Removal Insert Information] Error Occured: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyName, $liftingPreparation, $singleLift, $multipleLifts, $demolition)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET liftingPreparation = ?, 
        singleLift = ?, multipleLifts = ?, demolition = ? WHERE companyName = ?");
        $statement->bind_param("sssss", $liftingPreparation, $singleLift, $multipleLifts, $demolition, $companyName);
        $statement->execute();
        $statement->close();
    }
}

?>