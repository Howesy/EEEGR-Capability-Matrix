<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class SubseaInfrastructure extends DatabaseHandling
{
    private $procedureName;
    protected $tableName;

    function __construct($databaseName)
    {
        $this->procedureName = "subseaInfoAdd";
        $this->tableName = "subseainfrastructure";
        parent::__construct($databaseName, $this->tableName);
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if(!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS $this->procedureName;"))
            LogError("[Subsea Infrastructure CheckProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if (!$this->databaseConnection->query("CREATE PROCEDURE $this->procedureName(IN companyName TEXT, 
        IN reconfiguration varchar(8), IN preperation varchar(8), IN disconnect varchar(8), IN structureRecovery varchar(8),
        IN pipelineRecovery varchar(8), IN debrisRecovery varchar(8), IN xmasRecovery varchar(8))
        BEGIN INSERT INTO $this->tableName (companyName, reconfiguration, preperation, disconnect, structureRecovery, pipelineRecovery, debrisRecovery, xmasRecovery) VALUES (companyName, reconfiguration, preperation, disconnect, structureRecovery, pipelineRecovery, debrisRecovery, xmasRecovery); END"))
            LogError("[Subsea Infrastructure CreateProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $reconfiguration, $preperation, $disconnect, $structureRecovery, $pipelineRecovery, $debrisRecovery, $xmasRecovery)
    {
        if (!$this->databaseConnection->query("CALL $this->procedureName('$companyName', '$reconfiguration', '$preperation', '$disconnect', '$structureRecovery', '$pipelineRecovery', '$debrisRecovery', '$xmasRecovery')"))
            LogError("[Subsea Infrastructure] Error encountered: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyName, $reconfiguration, $preperation, $disconnect, $structureRecovery, $pipelineRecovery, $debrisRecovery, $xmasRecovery)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET reconfiguration = ?, preperation = ?,
        disconnect = ?, structureRecovery = ?, pipelineRecovery = ?, debrisRecovery = ?, xmasRecovery = ? WHERE companyName = ?");
        $statement->bind_param("ssssssss", $reconfiguration, $preperation, $disconnect, $structureRecovery, $pipelineRecovery, $debrisRecovery, $xmasRecovery, $companyName);
        $statement->execute();
        $statement->close();
    }
}

?>