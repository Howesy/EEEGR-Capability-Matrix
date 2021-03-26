<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class WellAbandonment extends DatabaseHandling
{
    private $procedureName;
    protected $tableName;

    function __construct($databaseName)
    {
        $this->procedureName = "wellAbandonmentInfoAdd";
        $this->tableName = "wellabandonment";
        parent::__construct($databaseName, $this->tableName);
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if(!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS $this->procedureName;"))
            LogError("[Well Abandonment CheckProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if(!$this->databaseConnection->query("CREATE PROCEDURE $this->procedureName(IN companyName TEXT, 
        IN wellKill varchar(8), IN preperation varchar(8), IN abandonment varchar(8), IN removal varchar(8), 
        IN workingPlatforms varchar(8)) BEGIN INSERT INTO $this->tableName (companyName, wellKill, preperation, 
        abandonment, removal, workingPlatforms) VALUES (companyName, wellKill, preperation, abandonment, removal, 
        workingPlatforms); END;"))
            LogError("[Well Abandonment CreateProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $wellKill, $preparation, $abandonment, $removal, $workingPlatforms)
    {
        if (!$this->databaseConnection->query("CALL $this->procedureName('$companyName', '$wellKill', '$preparation', '$abandonment', '$removal', '$workingPlatforms')"))
            LogError("[Well Abandonment Insert Information] Encountered an error: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyName, $wellKill, $preparation, $abandonment, $removal, $workingPlatforms)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET wellKill = ?, preperation = ?,
        abandonment = ?, removal = ?, workingPlatforms = ? WHERE companyName = ?");
        $statement->bind_param("ssssss", $wellKill, $preparation, $abandonment, $removal, $workingPlatforms, $companyName);
        $statement->execute();
        $statement->close();
    }
}

?>