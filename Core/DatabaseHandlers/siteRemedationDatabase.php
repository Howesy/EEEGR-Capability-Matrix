<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class SiteRemedation extends DatabaseHandling
{
    private $procedureName;
    protected $tableName;

    function __construct($databaseName)
    {
        $this->procedureName = "siteRemedationInfoAdd";
        $this->tableName = "siteremedation";
        parent::__construct($databaseName, $this->tableName);
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if(!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS $this->procedureName;"))
            LogError("[SiteRemedation CheckProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if (!$this->databaseConnection->query("CREATE PROCEDURE $this->procedureName(IN companyName TEXT, 
        IN rockDumping varchar(8), IN trenching varchar(8), IN reefing varchar(8), 
        IN marineSignals varchar(8), IN overtrawling varchar(8), IN surveying varchar(8), 
        IN pileManagement varchar(8), IN oilfieldDebrisClearance varchar(8))
        BEGIN INSERT INTO $this->tableName (companyName, rockDumping, trenching, reefing, marineSignals, 
        overtrawling, surveying, pileManagement, oilfieldDebrisClearance) VALUES (companyName, rockDumping, trenching, reefing, marineSignals, 
        overtrawling, surveying, pileManagement, oilfieldDebrisClearance); END;"))
            LogError ("[SiteRemedation CreateProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $rockDumping, $trenching, $reefing, $marineSignals, 
    $overtrawling, $surveying, $pileManagement, $oilfieldDebrisClearance)
    {
        if (!$this->databaseConnection->query("CALL $this->procedureName('$companyName', '$rockDumping', '$trenching', '$reefing', '$marineSignals', 
        '$overtrawling', '$surveying', '$pileManagement', '$oilfieldDebrisClearance')"))
        LogError("[Subsea Infrastructure] Error encountered: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyName, $rockDumping, $trenching, $reefing, $marineSignals, 
    $overtrawling, $surveying, $pileManagement, $oilfieldDebrisClearance)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET rockDumping = ?, trenching = ?, reefing = ?,
        marineSignals = ?, overtrawling = ?, surveying = ?, pileManagement = ?, oilfieldDebrisClearance = ? WHERE companyName = ?");
        $statement->bind_param("sssssssss", $rockDumping, $trenching, $reefing, $marineSignals, $overtrawling, $surveying, $pileManagement, $oilfieldDebrisClearance, $companyName);
        $statement->execute();
        $statement->close();
    }
}

?>