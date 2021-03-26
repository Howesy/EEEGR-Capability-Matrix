<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class FacilityCosts extends DatabaseHandling
{
    function __construct($databaseName)
    {
        $this->procedureName = "facilityCostsAddInfo";
        $this->tableName = "facilitycosts";
        parent::__construct($databaseName, $this->tableName);
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if(!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS $this->procedureName;"))
            LogError("[Facility Costs CheckProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if (!$this->databaseConnection->query("CREATE PROCEDURE $this->procedureName(IN companyName TEXT, 
        IN dutyHolder varchar(8), IN maintenanceContracts varchar(8), IN supportVessels varchar(8), 
        IN workingVessels varchar(8), IN surveyVessels varchar(8), IN goodsTransport varchar(8), 
        IN helicopterOps varchar(8), IN accommodationPlatforms varchar(8), IN walkToWork varchar(8), 
        IN onshoreLogistics varchar(8), IN personnelLogistics varchar(8), IN equipmentLogistics varchar(8), 
        IN logisticManagement varchar(8), IN onshoreStorage varchar(8)) BEGIN INSERT INTO $this->tableName
        (companyName, dutyHolder, maintenanceContracts, supportVessels, workingVessels, surveyVessels, 
        goodsTransport, helicopterOps, accommodationPlatforms, walkToWork, onshoreLogistics, personnelLogistics, 
        equipmentLogistics, logisticManagement, onshoreStorage) VALUES (companyName, dutyHolder, 
        maintenanceContracts, supportVessels, workingVessels, surveyVessels, goodsTransport, helicopterOps, 
        accommodationPlatforms, walkToWork, onshoreLogistics, personnelLogistics, equipmentLogistics, 
        logisticManagement, onshoreStorage); END;"))
            LogError("[Facility Costs CreateProcedure] Error Occured: {$this->databaseConnection->error}");
    }

    public function InsertInformation($companyName, $dutyHolder, $maintenanceContracts, $supportVessels, 
    $workingVessels, $surveyVessels, $goodsTransport, $helicopterOps, $accommodationPlatforms, $walkToWork, 
    $onshoreLogistics, $personnelLogistics, $equipmentLogistics, $logisticManagement, $onshoreStorage)
    {
        if(!$this->databaseConnection->query("CALL $this->procedureName('$companyName', '$dutyHolder', '$maintenanceContracts', '$supportVessels', 
        '$workingVessels', '$surveyVessels', '$goodsTransport', '$helicopterOps', '$accommodationPlatforms', '$walkToWork', 
        '$onshoreLogistics', '$personnelLogistics', '$equipmentLogistics', '$logisticManagement', '$onshoreStorage')"))
            LogError("[Facility Costs InsertInformation] Failed: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyName, $dutyHolder, $maintenanceContracts, $supportVessels, 
    $workingVessels, $surveyVessels, $goodsTransport, $helicopterOps, $accommodationPlatforms, $walkToWork, 
    $onshoreLogistics, $personnelLogistics, $equipmentLogistics, $logisticManagement, $onshoreStorage)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET facilityDutyHolder = ?, 
        maintenanceContracts = ?, supportVessels = ?, workingVessels = ?, surveyVessels = ?, goodsTransport = ?, helicopterOps = ?, 
        accommodationPlatforms = ?, walkToWork = ?, onshoreLogistics = ?, personnelLogistics = ?, equipmentLogistics = ?, 
        logisticManagement = ?, onshoreStorage = ? WHERE companyName = ?");
        $statement->bind_param("sssssssssssssss", $dutyHolder, $maintenanceContracts, $supportVessels, 
        $workingVessels, $surveyVessels, $goodsTransport, $helicopterOps, $accommodationPlatforms, $walkToWork, 
        $onshoreLogistics, $personnelLogistics, $equipmentLogistics, $logisticManagement, $onshoreStorage, $companyName);
        $statement->execute();
        $statement->close();
    }
}

?>