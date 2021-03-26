<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class LateLifeProduction extends DatabaseHandling
{
    private $procedureName;
    protected $tableName;

    function __construct($databaseName)
    {
        $this->procedureName = "lateLifeProductionInfoAdd";
        $this->tableName = "latelifeproduction";
        parent::__construct($databaseName, $this->tableName);
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if(!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS $this->procedureName;"))
            LogError("[Late Life Production CheckProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if (!$this->databaseConnection->query("CREATE PROCEDURE $this->procedureName(IN companyName TEXT, 
        IN simplification varchar(8), IN dutyHolder varchar(8), IN operationMaintenance varchar(8), 
        IN operationStrategy varchar(8), IN decomScope varchar(8), IN reservoirStudies varchar(8), 
        IN isolationStrategy varchar(8), IN inserviceDecommissioning varchar(8)) BEGIN INSERT INTO $this->tableName
        (companyName, simplification, dutyHolder, operationmaintenance, operationStrategy, decomScope, reservoirStudies,
        isolationStrategy, inserviceDecommissioning) VALUES (companyName, simplification, dutyHolder, operationmaintenance, operationStrategy, decomScope, reservoirStudies,
        isolationStrategy, inserviceDecommissioning); END;"))
            LogError("[Late Life Production CreateProcedure] Error Occured: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $simplification, $dutyHolder, $operationMaintenance, $operationStrategy, $decomScope, $reservoirStudies,
    $isolationStrategy, $inserviceDecommissioning)
    {
        if(!$this->databaseConnection->query("CALL lateLifeProductionInfoAdd('$companyName', '$simplification', '$dutyHolder', '$operationMaintenance', '$operationStrategy', '$decomScope', '$reservoirStudies',
        '$isolationStrategy', '$inserviceDecommissioning')"))
            LogError("[Late Life Production InsertInformation] Failed: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyName, $simplification, $dutyHolder, $operationMaintenance, $operationStrategy, $decomScope, $reservoirStudies,
    $isolationStrategy, $inserviceDecommissioning)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET simplification = ?,
        dutyHolder = ?, operationMaintenance = ?, operationStrategy = ?,
        decomScope = ?, reservoirStudies = ?, isolationStrategy = ?,
        inserviceDecommissioning = ? WHERE companyName = ?");
        $statement->bind_param("sssssssss", $simplification, $dutyHolder, $operationMaintenance, $operationStrategy, $decomScope, $reservoirStudies,
        $isolationStrategy, $inserviceDecommissioning, $companyName);
        $statement->execute();
        $statement->close();
    }
}

?>