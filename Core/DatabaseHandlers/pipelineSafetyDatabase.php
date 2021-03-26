<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class PipelineSafety extends DatabaseHandling
{
    private $procedureName;
    protected $tableName;

    function __construct($databaseName)
    {
        $this->procedureName = "pipelineSafetyInfoAdd";
        $this->tableName = "pipelinesafety";
        parent::__construct($databaseName, $this->tableName);
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if(!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS $this->procedureName;"))
            LogError("[Pipeline Safety CheckProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if (!$this->databaseConnection->query("CREATE PROCEDURE $this->procedureName(IN companyName TEXT, 
        IN cleanupFlushing varchar(8), IN isolation varchar(8), IN hazardousWasteRemoval varchar(8), 
        IN opexReductionScopes varchar(8)) BEGIN INSERT INTO $this->tableName (companyName, cleanupFlushing, 
        isolation, hazardousWasteRemoval, opexReductionScopes) VALUES (companyName, cleanupFlushing, isolation, 
        hazardousWasteRemoval, opexReductionScopes); END;"))
            LogError("[Pipeline Safety CreateProcedure] Error Occured: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $cleanupFlushing, $isolation, $hazardousWasteRemoval, $opexReductionScopes)
    {
        if(!$this->databaseConnection->query("CALL $this->procedureName('$companyName', '$cleanupFlushing', '$isolation', '$hazardousWasteRemoval', '$opexReductionScopes')"))
            LogError("[Pipeline Safety InsertInformation] Failed: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyName, $cleanupFlushing, $isolation, $hazardousWasteRemoval, $opexReductionScopes)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET cleanupFlushing = ?, 
        isolation = ?, hazardousWasteRemoval = ?, opexReductionScopes = ? WHERE companyName = ?");
        $statement->bind_param("sssss", $cleanupFlushing, $isolation, $hazardousWasteRemoval, $opexReductionScopes, $companyName);
        $statement->execute();
        $statement->close();
    }
}

?>