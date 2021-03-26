<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class SubstructureRemoval extends DatabaseHandling
{
    private $procedureName;
    protected $tableName;

    function __construct($databaseName)
    {
        $this->procedureName = "substructureRemovalInfoAdd";
        $this->tableName = "substructureremoval";
        parent::__construct($databaseName, $this->tableName);
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if(!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS $this->procedureName;"))
        LogError("[Substructure Removal CheckProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if (!$this->databaseConnection->query("CREATE PROCEDURE $this->procedureName(IN companyName TEXT, 
        IN liftingPrep varchar(8), IN cutting varchar(8), IN subseaExcavator varchar(8), IN singleLift varchar(8))
        BEGIN INSERT INTO $this->tableName (companyName, liftingPrep, cutting, subseaExcavator, singleLift) VALUES 
        (companyName, liftingPrep, cutting, subseaExcavator, singleLift); END;"))
            LogError("[Substructure Removal CreateProcedure] Error Occured: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $liftingPrep, $cutting, $subseaExcavator, $singleLift)
    {
        if(!$this->databaseConnection->query("CALL $this->procedureName('$companyName', '$liftingPrep', '$cutting', '$subseaExcavator', '$singleLift');"))
            LogError("[Substructure Removal InsertInformation] Failed: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyName, $liftingPrep, $cutting, $subseaExcavator, $singleLift)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET liftingPrep = ?, cutting = ?, subseaExcavator = ?,
        singleLift = ? WHERE companyName = ?");
        $statement->bind_param("sssss", $liftingPrep, $cutting, $subseaExcavator, $singleLift, $companyName);
        $statement->execute();
        $statement->close();
    }
}

?>