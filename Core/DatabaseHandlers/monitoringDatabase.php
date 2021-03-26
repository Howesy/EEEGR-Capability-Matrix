<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class Monitoring extends DatabaseHandling
{
    private $procedureName;
    protected $tableName;

    function __construct($databaseName)
    {
        $this->procedureName = "monitoringInfoAdd";
        $this->updateProcedureName = "updateMonitoring";
        $this->tableName = "monitoring";
        parent::__construct($databaseName, $this->tableName);
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if(!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS $this->procedureName;"))
            LogError("[Monitoring CheckProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if (!$this->databaseConnection->query("CREATE PROCEDURE $this->procedureName(IN companyName TEXT, 
        IN derogatedStructure varchar(8), IN wells varchar(8), IN environmental varchar(8), 
        IN pipelines varchar(8)) BEGIN INSERT INTO $this->tableName (companyName, derogatedStructure, wells, 
        environmental, pipelines) VALUES (companyName, derogatedStructure, wells, 
        environmental, pipelines); END;"))
            LogError("[Monitoring CreateProcedure] Error Occured: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $derogatedStructure, $wells, $environmental, $pipelines)
    {
        if(!$this->databaseConnection->query("CALL $this->procedureName('$companyName', '$derogatedStructure', '$wells', '$environmental', '$pipelines');"))
            LogError("[Monitoring] InsertInformation Failed: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyName, $derogatedStructure, $wells, $environmental, $pipelines)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET derogatedStructure = ?, wells = ?, 
        environmental = ?, pipelines = ? WHERE companyName = ?");
        $statement->bind_param("sssss", $derogatedStructure, $wells, $environmental, $pipelines, $companyName);
        $statement->execute();
        $statement->close();
    }
}

?>