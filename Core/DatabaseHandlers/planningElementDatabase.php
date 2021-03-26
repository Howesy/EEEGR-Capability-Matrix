<?php

include_once("../Utility/databaseHandling.php");
include_once("../Utility/errorLogging.php");

class PlanningElement extends DatabaseHandling
{
    private $procedureName;
    protected $tableName;

    function __construct($databaseName)
    {
        $this->procedureName = "planningElementInfoAdd";
        $this->tableName = "planningelement";
        parent::__construct($databaseName, $this->tableName);
        $this->CheckProcedure();
        $this->CreateProcedure();
    }

    private function CheckProcedure()
    {
        if(!$this->databaseConnection->query("DROP PROCEDURE IF EXISTS $this->procedureName;"))
            LogError("[Planning Element CheckProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    private function CreateProcedure()
    {
        if (!$this->databaseConnection->query("CREATE PROCEDURE $this->procedureName (IN companyName TEXT, 
        IN costEstimation varchar(8), IN comparativeAssessment varchar(8), IN environmentalStudies varchar(8), 
        IN stakeholderEngagement varchar(8), IN technicalEngineeringDesign varchar(8), IN subsurface varchar(8), IN healthAndSafety varchar(8), IN projectManagement varchar(8), 
        IN wasteCharacterisation varchar(8), IN materialsInventory varchar(8), IN insurance varchar(8), 
        IN copApplication varchar(8), IN marineSampling varchar(8), IN riskAssessments varchar(8))
        BEGIN INSERT INTO $this->tableName (companyName, costEstimation, comparativeAssessment, 
        environmentalStudies, stakeholderEngagement, technicalEngineeringDesign, subsurface, healthAndSafety, 
        projectManagement, wasteCharacterisation, materialsInventory, insurance, copApplication, marineSampling, 
        riskAssessments) VALUES (companyName, costEstimation, comparativeAssessment, 
        environmentalStudies, stakeholderEngagement, technicalEngineeringDesign, subsurface, healthAndSafety, 
        projectManagement, wasteCharacterisation, materialsInventory, insurance, copApplication, marineSampling, 
        riskAssessments); END;"))
            LogError("[Planning Element CreateProcedure] Encountered an error: {$this->databaseConnection->error}");
    }

    //15 Parameters
    public function InsertInformation($companyName, $costEstimation, $comparativeAssessment, $environmentalStudies, 
    $stakeholderEngagement, $technicalEngineeringDesign, $subsurface, $healthAndSafety, $projectManagement, 
    $wasteCharacterisation, $materialsInventory, $insurance, $copApplication, $marineSampling, $riskAssessments)
    {
        if (!$this->databaseConnection->query("CALL $this->procedureName('$companyName', '$costEstimation', '$comparativeAssessment', '$environmentalStudies', 
        '$stakeholderEngagement', '$technicalEngineeringDesign', '$subsurface', '$healthAndSafety', '$projectManagement', 
        '$wasteCharacterisation', '$materialsInventory', '$insurance', '$copApplication', '$marineSampling', '$riskAssessments')"))
            LogError("[Planning Element] Error encountered: {$this->databaseConnection->error}");
    }

    public function UpdateInformation($companyName, $costEstimation, $comparativeAssessment, $environmentalStudies, 
    $stakeholderEngagement, $technicalEngineeringDesign, $subsurface, $healthAndSafety, $projectManagement, 
    $wasteCharacterisation, $materialsInventory, $insurance, $copApplication, $marineSampling, $riskAssessments)
    {
        $statement = $this->databaseConnection->prepare("UPDATE $this->tableName SET costEstimation = costEstimation, comparativeAssessment = comparativeAssessment, 
        environmentalStudies = ?, stakeholderEngagement = ?, technicalEngineeringDesign = ?, subsurface = ?, healthAndSafety = ?, projectManagement = ?, wasteCharacterisation = ?,
        materialsInventory = ?, insurance = ?, copApplication = ?, marineSampling = ?, riskAssessments = ? WHERE companyName = ?");
        $statement->bind_param("sssssssssssssss", $costEstimation, $comparativeAssessment, $environmentalStudies, 
        $stakeholderEngagement, $technicalEngineeringDesign, $subsurface, $healthAndSafety, $projectManagement, 
        $wasteCharacterisation, $materialsInventory, $insurance, $copApplication, $marineSampling, $riskAssessments, $companyName);
        $statement->execute();
        $statement->close();
    }
}

?>