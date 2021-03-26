<?php
include(__DIR__ . "/DatabaseHandlers/companyInformationDatabase.php");
include(__DIR__ . "/DatabaseHandlers/companyAccountDatabase.php");
include(__DIR__ . "/DatabaseHandlers/facilityCostsDatabase.php");
include(__DIR__ . "/DatabaseHandlers/lateLifeProductionDatabase.php");
include(__DIR__ . "/DatabaseHandlers/monitoringDatabase.php");
include(__DIR__ . "/DatabaseHandlers/onshoreRecyclingDatabase.php");
include(__DIR__ . "/DatabaseHandlers/pipelineSafetyDatabase.php");
include(__DIR__ . "/DatabaseHandlers/planningElementDatabase.php");
include(__DIR__ . "/DatabaseHandlers/siteRemedationDatabase.php");
include(__DIR__ . "/DatabaseHandlers/subseaInfrastructureDatabase.php");
include(__DIR__ . "/DatabaseHandlers/substructureRemovalDatabase.php");
include(__DIR__ . "/DatabaseHandlers/topsidePreparationDatabase.php");
include(__DIR__ . "/DatabaseHandlers/topsideRemovalDatabase.php");
include(__DIR__ . "/DatabaseHandlers/wellAbandonmentDatabase.php");

include("../Utility/dataHandler.php");
include("../Utility/array.php");

class DatabaseCoordinate
{
    public $dataHandler;

    public $companyInformation;
    public $companyAccount;
    public $facilityCosts;
    public $lateLifeProduction;
    public $monitoring;
    public $onshoreRecycling;
    public $pipelineSafety;
    public $planningElement;
    public $siteRemedation;
    public $subseaInfrastructure;
    public $substructureRemoval;
    public $topsidePreparation;
    public $topsideRemoval;
    public $wellAbandonment;

    function __construct($databaseName)
    {
        $this->dataHandler = new DataHandler();
        $this->companyInformation = new CompanyInformation($databaseName);
        $this->companyAccount = new CompanyAccount($databaseName);
        $this->facilityCosts = new FacilityCosts($databaseName);
        $this->lateLifeProduction = new LateLifeProduction($databaseName);
        $this->monitoring = new Monitoring($databaseName);
        $this->onshoreRecycling = new OnshoreRecycling($databaseName);
        $this->pipelineSafety = new PipelineSafety($databaseName);
        $this->planningElement = new PlanningElement($databaseName);
        $this->siteRemedation = new SiteRemedation($databaseName);
        $this->subseaInfrastructure = new SubseaInfrastructure($databaseName);
        $this->substructureRemoval = new SubstructureRemoval($databaseName);
        $this->topsidePreparation = new TopsidePreparation($databaseName);
        $this->topsideRemoval = new TopsideRemoval($databaseName);
        $this->wellAbandonment = new WellAbandonment($databaseName);
    }

    public function InitializeCompanyAccount($companyName, $companyPassword)
    {
        $companyPassword = hash("sha256", $companyPassword);
        $this->companyAccount->InsertInformation($companyName, $companyPassword);
    }

    public function InitializeCompanyInformation($companyName, $companyPhoneNumber, $companyEmailAddress, $maintainerName, $maintainerEmailAddress, $maintainerPhone, $companyAddress)
    {
        $this->companyInformation->InsertInformation($companyName, $companyPhoneNumber, $companyEmailAddress, $maintainerName, $maintainerEmailAddress, $maintainerPhone, $companyAddress);
    }

    public function TranslateData($parsedData)
    {
        $translatedData = "";

        switch ($parsedData)
        {
            case "Core":
                $translatedData = "core";
                break;

            case "True":
                $translatedData = "true";
                break;

            case "Orange":
                $translatedData = "orange";
                break;

            default:
                $translatedData = "false";
        }

        return $translatedData;
    }
    
    //A database | array | code helping function, save hours of time.
    public function SaveTime()
    {
        $arrayThing = new ArrayConstruct();
        $arrayKeys = array();
        foreach($arrayThing->companyCapabilityMatrix as $value)
        {
            foreach(array_keys($value) as $key)
            {
                $arrayKeys[] = $key;
            }
        }
        
        foreach($arrayKeys as $keys)
        {
            $upperCaseName = ucwords($keys);

            // echo "<br><small>$upperCaseName</small><br>";
            // echo "<input type='radio' name='$keys' value='Core'> Core ";
            // echo "<input type='radio' name='$keys' value='True'> Green ";
            // echo "<input type='radio' name='$keys' value='Orange'> Orange ";

            //echo '$' . 'posted' . "$upperCaseName" . 'Option ' . '= isset($_POST[' . '"' . "$keys" . '"' . ']) ' . '? $_POST[' . '"' ."$keys" . '"' .']' . ' : "";' . "<br>";
            //echo '"' . "$keys" . '"' . ' => ' . '$' . 'databaseCoordinate->TranslateData(' . '$' . 'posted'. "$upperCaseName" . '),' . "<br>";
        }
    }

    public function InitializeCompanyCapability(array $companyInformation)
    {
        if ($this->dataHandler->VerifyArrayIntegrity($companyInformation))
        {
            $companyName = $companyInformation["companyName"];

            $dataFacilityCosts = $companyInformation["FacilityCosts"];
            $dataLateLifeProduction = $companyInformation["LateLifeProduction"];
            $dataMonitoring = $companyInformation["Monitoring"];
            $dataOnshoreRecycling = $companyInformation["OnshoreRecycling"];
            $dataPipelineSafety = $companyInformation["PipelineSafety"];
            $dataPlanningElement = $companyInformation["PlanningElement"];
            $dataSiteRemedation = $companyInformation["SiteRemedation"];
            $dataSubseaInfrastructure = $companyInformation["SubseaInfrastructure"];
            $dataSubstructureRemoval = $companyInformation["SubstructureRemoval"];
            $dataTopsidePreparation = $companyInformation["TopsidePreparation"];
            $dataTopsideRemoval = $companyInformation["TopsideRemoval"];
            $dataWellAbandonment = $companyInformation["WellAbandonment"];

            $this->facilityCosts->InsertInformation($companyName, $dataFacilityCosts["facilityDutyHolder"], $dataFacilityCosts["maintenanceContracts"], $dataFacilityCosts["supportVessels"], $dataFacilityCosts["workingVessels"], $dataFacilityCosts["surveyVessels"], $dataFacilityCosts["goodsTransport"], $dataFacilityCosts["helicopterOps"], $dataFacilityCosts["accommodationPlatforms"], $dataFacilityCosts["walkToWork"], $dataFacilityCosts["onshoreLogistics"], $dataFacilityCosts["personnelLogistics"], $dataFacilityCosts["equipmentLogistics"], $dataFacilityCosts["logisticManagement"], $dataFacilityCosts["onshoreStorage"]);
            $this->lateLifeProduction->InsertInformation($companyName, $dataLateLifeProduction["simplification"], $dataLateLifeProduction["dutyHolder"], $dataLateLifeProduction["operationMaintenance"], $dataLateLifeProduction["operationStrategy"], $dataLateLifeProduction["decomScope"], $dataLateLifeProduction["reservoirStudies"], $dataLateLifeProduction["isolationStrategy"], $dataLateLifeProduction["inserviceDecommissioning"]);
            $this->monitoring->InsertInformation($companyName, $dataMonitoring["derogatedStructure"], $dataMonitoring["wells"], $dataMonitoring["environmental"], $dataMonitoring["pipelines"]);
            $this->onshoreRecycling->InsertInformation($companyName, $dataOnshoreRecycling["berthing"], $dataOnshoreRecycling["loading"], $dataOnshoreRecycling["onsiteHandling"], $dataOnshoreRecycling["preCleaning"], $dataOnshoreRecycling["mechanicalDismantling"], $dataOnshoreRecycling["processing"], $dataOnshoreRecycling["onsitePermits"], $dataOnshoreRecycling["onsiteStoring"], $dataOnshoreRecycling["onwardWasteManagement"], $dataOnshoreRecycling["wasteDisposal"]);
            $this->pipelineSafety->InsertInformation($companyName, $dataPipelineSafety["cleanupFlushing"], $dataPipelineSafety["isolation"], $dataPipelineSafety["hazardousWasteRemoval"], $dataPipelineSafety["opexReductionScopes"]);
            $this->planningElement->InsertInformation($companyName, $dataPlanningElement["costEstimation"], $dataPlanningElement["comparativeAssessment"], $dataPlanningElement["environmentalStudies"], $dataPlanningElement["stakeholderEngagement"], $dataPlanningElement["technicalEngineeringDesign"], $dataPlanningElement["subsurface"], $dataPlanningElement["healthAndSafety"], $dataPlanningElement["projectManagement"], $dataPlanningElement["wasteCharacterisation"], $dataPlanningElement["materialsInventory"], $dataPlanningElement["insurance"], $dataPlanningElement["copApplication"], $dataPlanningElement["marineSampling"], $dataPlanningElement["riskAssessments"]);
            $this->siteRemedation->InsertInformation($companyName, $dataSiteRemedation["rockDumping"], $dataSiteRemedation["trenching"], $dataSiteRemedation["reefing"], $dataSiteRemedation["marineSignals"], $dataSiteRemedation["overtrawling"], $dataSiteRemedation["surveying"], $dataSiteRemedation["pileManagement"], $dataSiteRemedation["oilfieldDebrisClearance"]);
            $this->subseaInfrastructure->InsertInformation($companyName, $dataSubseaInfrastructure["reconfiguration"], $dataSubseaInfrastructure["preperation"], $dataSubseaInfrastructure["disconnect"], $dataSubseaInfrastructure["structureRecovery"], $dataSubseaInfrastructure["pipelineRecovery"], $dataSubseaInfrastructure["debrisRecovery"], $dataSubseaInfrastructure["xmasRecovery"]);
            $this->substructureRemoval->InsertInformation($companyName, $dataSubstructureRemoval["liftingPrep"], $dataSubstructureRemoval["cutting"], $dataSubstructureRemoval["subseaExcavator"], $dataSubstructureRemoval["singleLift"]);
            $this->topsidePreparation->InsertInformation($companyName, $dataTopsidePreparation["disconnect"], $dataTopsidePreparation["utilities"], $dataTopsidePreparation["liftingPrep"]);
            $this->topsideRemoval->InsertInformation($companyName, $dataTopsideRemoval["liftingPreparation"], $dataTopsideRemoval["topsideSingleLift"], $dataTopsideRemoval["multipleLifts"], $dataTopsideRemoval["demolition"]);
            $this->wellAbandonment->InsertInformation($companyName, $dataWellAbandonment["wellKill"], $dataWellAbandonment["preparation"], $dataWellAbandonment["abandonment"], $dataWellAbandonment["removal"], $dataWellAbandonment["workingPlatforms"]);
        }
        else
        {
            LogError("[MAJOR ERROR] Coordinate Initialize Company Capability Failed! Array missing specific data keys, double check your data handling.");
        }
    }

    public function UpdateCompanyCapability(array $companyInformation)
    {
        if ($this->dataHandler->VerifyArrayIntegrity($companyInformation))
        {
            $companyName = $companyInformation["companyName"];

            $dataFacilityCosts = $companyInformation["FacilityCosts"];
            $dataLateLifeProduction = $companyInformation["LateLifeProduction"];
            $dataMonitoring = $companyInformation["Monitoring"];
            $dataOnshoreRecycling = $companyInformation["OnshoreRecycling"];
            $dataPipelineSafety = $companyInformation["PipelineSafety"];
            $dataPlanningElement = $companyInformation["PlanningElement"];
            $dataSiteRemedation = $companyInformation["SiteRemedation"];
            $dataSubseaInfrastructure = $companyInformation["SubseaInfrastructure"];
            $dataSubstructureRemoval = $companyInformation["SubstructureRemoval"];
            $dataTopsidePreparation = $companyInformation["TopsidePreparation"];
            $dataTopsideRemoval = $companyInformation["TopsideRemoval"];
            $dataWellAbandonment = $companyInformation["WellAbandonment"];

            $this->facilityCosts->UpdateInformation($companyName, $dataFacilityCosts["facilityDutyHolder"], $dataFacilityCosts["maintenanceContracts"], $dataFacilityCosts["supportVessels"], $dataFacilityCosts["workingVessels"], $dataFacilityCosts["surveyVessels"], $dataFacilityCosts["goodsTransport"], $dataFacilityCosts["helicopterOps"], $dataFacilityCosts["accommodationPlatforms"], $dataFacilityCosts["walkToWork"], $dataFacilityCosts["onshoreLogistics"], $dataFacilityCosts["personnelLogistics"], $dataFacilityCosts["equipmentLogistics"], $dataFacilityCosts["logisticManagement"], $dataFacilityCosts["onshoreStorage"]);
            $this->lateLifeProduction->UpdateInformation($companyName, $dataLateLifeProduction["simplification"], $dataLateLifeProduction["dutyHolder"], $dataLateLifeProduction["operationMaintenance"], $dataLateLifeProduction["operationStrategy"], $dataLateLifeProduction["decomScope"], $dataLateLifeProduction["reservoirStudies"], $dataLateLifeProduction["isolationStrategy"], $dataLateLifeProduction["inserviceDecommissioning"]);
            $this->monitoring->UpdateInformation($companyName, $dataMonitoring["derogatedStructure"], $dataMonitoring["wells"], $dataMonitoring["environmental"], $dataMonitoring["pipelines"]);
            $this->onshoreRecycling->UpdateInformation($companyName, $dataOnshoreRecycling["berthing"], $dataOnshoreRecycling["loading"], $dataOnshoreRecycling["onsiteHandling"], $dataOnshoreRecycling["preCleaning"], $dataOnshoreRecycling["mechanicalDismantling"], $dataOnshoreRecycling["processing"], $dataOnshoreRecycling["onsitePermits"], $dataOnshoreRecycling["onsiteStoring"], $dataOnshoreRecycling["onwardWasteManagement"], $dataOnshoreRecycling["wasteDisposal"]);
            $this->pipelineSafety->UpdateInformation($companyName, $dataPipelineSafety["cleanupFlushing"], $dataPipelineSafety["isolation"], $dataPipelineSafety["hazardousWasteRemoval"], $dataPipelineSafety["opexReductionScopes"]);
            $this->planningElement->UpdateInformation($companyName, $dataPlanningElement["costEstimation"], $dataPlanningElement["comparativeAssessment"], $dataPlanningElement["environmentalStudies"], $dataPlanningElement["stakeholderEngagement"], $dataPlanningElement["technicalEngineeringDesign"], $dataPlanningElement["subsurface"], $dataPlanningElement["healthAndSafety"], $dataPlanningElement["projectManagement"], $dataPlanningElement["wasteCharacterisation"], $dataPlanningElement["materialsInventory"], $dataPlanningElement["insurance"], $dataPlanningElement["copApplication"], $dataPlanningElement["marineSampling"], $dataPlanningElement["riskAssessments"]);
            $this->siteRemedation->UpdateInformation($companyName, $dataSiteRemedation["rockDumping"], $dataSiteRemedation["trenching"], $dataSiteRemedation["reefing"], $dataSiteRemedation["marineSignals"], $dataSiteRemedation["overtrawling"], $dataSiteRemedation["surveying"], $dataSiteRemedation["pileManagement"], $dataSiteRemedation["oilfieldDebrisClearance"]);
            $this->subseaInfrastructure->UpdateInformation($companyName, $dataSubseaInfrastructure["reconfiguration"], $dataSubseaInfrastructure["preperation"], $dataSubseaInfrastructure["subseaDisconnect"], $dataSubseaInfrastructure["structureRecovery"], $dataSubseaInfrastructure["pipelineRecovery"], $dataSubseaInfrastructure["debrisRecovery"], $dataSubseaInfrastructure["xmasRecovery"]);
            $this->substructureRemoval->UpdateInformation($companyName, $dataSubstructureRemoval["liftingPrep"], $dataSubstructureRemoval["cutting"], $dataSubstructureRemoval["subseaExcavator"], $dataSubstructureRemoval["singleLift"]);
            $this->topsidePreparation->UpdateInformation($companyName, $dataTopsidePreparation["disconnect"], $dataTopsidePreparation["utilities"], $dataTopsidePreparation["liftingPrep"]);
            $this->topsideRemoval->UpdateInformation($companyName, $dataTopsideRemoval["liftingPreparation"], $dataTopsideRemoval["topsideSingleLift"], $dataTopsideRemoval["multipleLifts"], $dataTopsideRemoval["demolition"]);
            $this->wellAbandonment->UpdateInformation($companyName, $dataWellAbandonment["wellKill"], $dataWellAbandonment["preparation"], $dataWellAbandonment["abandonment"], $dataWellAbandonment["removal"], $dataWellAbandonment["workingPlatforms"]);
        }
    }
}

?>