<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class OnshoreRecycling extends DatabaseHandling
{
    private $procedureName;
    protected $tableName;

    function __construct($databaseName)
    {
        $this->procedureName = "onshoreInfoAdd";
        $this->tableName = "onshorerecycling";
        parent::__construct($databaseName, $this->tableName);
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if (!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS $this->procedureName;"))
            LogError("[OnshoreRecycling CheckProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if (!$this->databaseConnection->query("CREATE PROCEDURE $this->procedureName(IN companyNameR TEXT,
        IN berthingR varchar(8), IN loadingR varchar(8), IN onsiteHandlingR varchar(8), IN preCleaningR varchar(8), 
        IN mechanicalDismantlingR varchar(8), IN processingR varchar(8), IN onsitePermitsR varchar(8), 
        IN onsiteStoringR varchar(8), IN onwardWasteManagementR varchar(8), IN wasteDisposalR varchar(8))
        BEGIN INSERT INTO $this->tableName (companyName, berthing, loading, onsiteHandling, preCleaning, mechanicalDismantling, processing, onsitePermits, onsiteStoring, onwardWasteManagement, wasteDisposal) VALUES (companyNameR, berthingR, loadingR, onsiteHandlingR, preCleaningR, mechanicalDismantlingR, processingR, onsitePermitsR, onsiteStoringR, onwardWasteManagementR, wasteDisposalR); END")) LogError("Error: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $berthing, $loading, $onsiteHandling, $preCleaning, $mechanicalDismantling, $processing, $onsitePermits, 
    $onsiteStoring, $onwardWasteManagement, $wasteDisposal)
    {
        if (!$this->databaseConnection->query("CALL $this->procedureName('$companyName', '$berthing', '$loading', '$onsiteHandling', '$preCleaning', '$mechanicalDismantling', '$processing', '$onsitePermits', 
        '$onsiteStoring', '$onwardWasteManagement', '$wasteDisposal');")) 
            LogError("[Onshore Recycling Insert Information] Encountered an error: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyName, $berthing, $loading, $onsiteHandling, $preCleaning, $mechanicalDismantling, $processing, $onsitePermits, 
    $onsiteStoring, $onwardWasteManagement, $wasteDisposal)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET berthing = berthingR, loading = loadingR, onsiteHandling = onsiteHandlingR,
        preCleaning = ?, mechanicalDismantling = ?, processing = ?, onsitePermits = ?, onsiteStoring = ?, onwardWasteManagement = ?,
        wasteDisposal = ? WHERE companyName = ?");
        $statement->bind_param("sssssssssss", $berthing, $loading, $onsiteHandling, $preCleaning, $mechanicalDismantling, $processing, $onsitePermits, 
        $onsiteStoring, $onwardWasteManagement, $wasteDisposal, $companyName);
        $statement->execute();
        $statement->close();
    }
}

?>