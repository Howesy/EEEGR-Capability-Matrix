<?php

session_start();

include_once("../Core/databaseCoordinate.php");
include_once("../Utility/dataHandler.php");
include_once("../Utility/extraUtility.php");

$databaseCoordinate = new DatabaseCoordinate("eeegr");
$dataHandler = new DataHandler();

if (!isset($_SESSION["loggedIn"]))
{
    header("location: login.php");
}

if (isset($_POST["submit"]))
{
    //Facility Costs Section
    $postedFacilityDutyHolderOption = isset($_POST["facilityDutyHolder"]) ? $_POST["facilityDutyHolder"] : "";
    $postedMaintenanceContractsOption = isset($_POST["maintenanceContracts"]) ? $_POST["maintenanceContracts"] : "";
    $postedSupportVesselsOption = isset($_POST["supportVessels"]) ? $_POST["supportVessels"] : "";
    $postedWorkingVesselsOption = isset($_POST["workingVessels"]) ? $_POST["workingVessels"] : "";
    $postedSurveyVesselsOption = isset($_POST["surveyVessels"]) ? $_POST["surveyVessels"] : "";
    $postedGoodsTransportOption = isset($_POST["goodsTransport"]) ? $_POST["goodsTransport"] : "";
    $postedHelicopterOpsOption = isset($_POST["helicopterOps"]) ? $_POST["helicopterOps"] : "";
    $postedAccommodationPlatformsOption = isset($_POST["accommodationPlatforms"]) ? $_POST["accommodationPlatforms"] : "";
    $postedWalkToWorkOption = isset($_POST["walkToWork"]) ? $_POST["walkToWork"] : "";
    $postedOnshoreLogisticsOption = isset($_POST["onshoreLogistics"]) ? $_POST["onshoreLogistics"] : "";
    $postedPersonnelLogisticsOption = isset($_POST["personnelLogistics"]) ? $_POST["personnelLogistics"] : "";
    $postedEquipmentLogisticsOption = isset($_POST["equipmentLogistics"]) ? $_POST["equipmentLogistics"] : "";
    $postedLogisticManagementOption = isset($_POST["logisticManagement"]) ? $_POST["logisticManagement"] : "";
    $postedOnshoreStorageOption = isset($_POST["onshoreStorage"]) ? $_POST["onshoreStorage"] : "";

    //Late Life Production Section
    $postedSimplificationOption = isset($_POST["simplification"]) ? $_POST["simplification"] : "";
    $postedDutyHolderOption = isset($_POST["dutyHolder"]) ? $_POST["dutyHolder"] : "";
    $postedOperationMaintenanceOption = isset($_POST["operationMaintenance"]) ? $_POST["operationMaintenance"] : "";
    $postedOperationStrategyOption = isset($_POST["operationStrategy"]) ? $_POST["operationStrategy"] : "";
    $postedDecomScopeOption = isset($_POST["decomScope"]) ? $_POST["decomScope"] : "";
    $postedReservoirStudiesOption = isset($_POST["reservoirStudies"]) ? $_POST["reservoirStudies"] : "";
    $postedIsolationStrategyOption = isset($_POST["isolationStrategy"]) ? $_POST["isolationStrategy"] : "";
    $postedInserviceDecommissioningOption = isset($_POST["inserviceDecommissioning"]) ? $_POST["inserviceDecommissioning"] : "";

    //Monitoring Section
    $postedDerogatedStructureOption = isset($_POST["derogatedStructure"]) ? $_POST["derogatedStructure"] : "";
    $postedWellsOption = isset($_POST["wells"]) ? $_POST["wells"] : "";
    $postedEnvironmentalOption = isset($_POST["environmental"]) ? $_POST["environmental"] : "";
    $postedPipelinesOption = isset($_POST["pipelines"]) ? $_POST["pipelines"] : "";

    //Onshore Recycling Section
    $postedBerthingOption = isset($_POST["berthing"]) ? $_POST["berthing"] : "";
    $postedLoadingOption = isset($_POST["loading"]) ? $_POST["loading"] : "";
    $postedOnsiteHandlingOption = isset($_POST["onsiteHandling"]) ? $_POST["onsiteHandling"] : "";
    $postedPreCleaningOption = isset($_POST["preCleaning"]) ? $_POST["preCleaning"] : "";
    $postedMechanicalDismantlingOption = isset($_POST["mechanicalDismantling"]) ? $_POST["mechanicalDismantling"] : "";
    $postedProcessingOption = isset($_POST["processing"]) ? $_POST["processing"] : "";
    $postedOnsitePermitsOption = isset($_POST["onsitePermits"]) ? $_POST["onsitePermits"] : "";
    $postedOnsiteStoringOption = isset($_POST["onsiteStoring"]) ? $_POST["onsiteStoring"] : "";
    $postedOnwardWasteManagementOption = isset($_POST["onwardWasteManagement"]) ? $_POST["onwardWasteManagement"] : "";
    $postedWasteDisposalOption = isset($_POST["wasteDisposal"]) ? $_POST["wasteDisposal"] : "";

    //Pipeline Safety Section
    $postedCleanupFlushingOption = isset($_POST["cleanupFlushing"]) ? $_POST["cleanupFlushing"] : "";
    $postedIsolationOption = isset($_POST["isolation"]) ? $_POST["isolation"] : "";
    $postedHazardousWasteRemovalOption = isset($_POST["hazardousWasteRemoval"]) ? $_POST["hazardousWasteRemoval"] : "";
    $postedOpexReductionScopesOption = isset($_POST["opexReductionScopes"]) ? $_POST["opexReductionScopes"] : "";

    //Planning Element Section
    $postedCostEstimationOption = isset($_POST["costEstimation"]) ? $_POST["costEstimation"] : "";
    $postedComparativeAssessmentOption = isset($_POST["comparativeAssessment"]) ? $_POST["comparativeAssessment"] : "";
    $postedEnvironmentalStudiesOption = isset($_POST["environmentalStudies"]) ? $_POST["environmentalStudies"] : "";
    $postedStakeholderEngagementOption = isset($_POST["stakeholderEngagement"]) ? $_POST["stakeholderEngagement"] : "";
    $postedTechnicalEngineeringDesignOption = isset($_POST["technicalEngineeringDesign"]) ? $_POST["technicalEngineeringDesign"] : "";
    $postedSubsurfaceOption = isset($_POST["subsurface"]) ? $_POST["subsurface"] : "";
    $postedHealthAndSafetyOption = isset($_POST["healthAndSafety"]) ? $_POST["healthAndSafety"] : "";
    $postedProjectManagementOption = isset($_POST["projectManagement"]) ? $_POST["projectManagement"] : "";
    $postedWasteCharacterisationOption = isset($_POST["wasteCharacterisation"]) ? $_POST["wasteCharacterisation"] : "";
    $postedMaterialsInventoryOption = isset($_POST["materialsInventory"]) ? $_POST["materialsInventory"] : "";
    $postedInsuranceOption = isset($_POST["insurance"]) ? $_POST["insurance"] : "";
    $postedCopApplicationOption = isset($_POST["copApplication"]) ? $_POST["copApplication"] : "";
    $postedMarineSamplingOption = isset($_POST["marineSampling"]) ? $_POST["marineSampling"] : "";
    $postedRiskAssessmentsOption = isset($_POST["riskAssessments"]) ? $_POST["riskAssessments"] : "";

    //Site Remedation Section
    $postedRockDumpingOption = isset($_POST["rockDumping"]) ? $_POST["rockDumping"] : "";
    $postedTrenchingOption = isset($_POST["trenching"]) ? $_POST["trenching"] : "";
    $postedReefingOption = isset($_POST["reefing"]) ? $_POST["reefing"] : "";
    $postedMarineSignalsOption = isset($_POST["marineSignals"]) ? $_POST["marineSignals"] : "";
    $postedOvertrawlingOption = isset($_POST["overtrawling"]) ? $_POST["overtrawling"] : "";
    $postedSurveyingOption = isset($_POST["surveying"]) ? $_POST["surveying"] : "";
    $postedPileManagementOption = isset($_POST["pileManagement"]) ? $_POST["pileManagement"] : "";
    $postedOilfieldDebrisClearanceOption = isset($_POST["oilfieldDebrisClearance"]) ? $_POST["oilfieldDebrisClearance"] : "";

    //Subsea Infrastructure Section
    $postedReconfigurationOption = isset($_POST["reconfiguration"]) ? $_POST["reconfiguration"] : "";
    $postedPreperationOption = isset($_POST["preperation"]) ? $_POST["preperation"] : "";
    $postedSubseaDisconnectOption = isset($_POST["disconnect"]) ? $_POST["disconnect"] : "";
    $postedStructureRecoveryOption = isset($_POST["structureRecovery"]) ? $_POST["structureRecovery"] : "";
    $postedPipelineRecoveryOption = isset($_POST["pipelineRecovery"]) ? $_POST["pipelineRecovery"] : "";
    $postedDebrisRecoveryOption = isset($_POST["debrisRecovery"]) ? $_POST["debrisRecovery"] : "";
    $postedXmasRecoveryOption = isset($_POST["xmasRecovery"]) ? $_POST["xmasRecovery"] : "";

    //Substructure Removal Section:
    $postedTopsideLiftingPrepOption = isset($_POST["topsideLiftingTopsidePrep"]) ? $_POST["topsideLiftingPrep"] : "";
    $postedCuttingOption = isset($_POST["cutting"]) ? $_POST["cutting"] : "";
    $postedSubseaExcavatorOption = isset($_POST["subseaExcavator"]) ? $_POST["subseaExcavator"] : "";
    $postedSingleLiftOption = isset($_POST["singleLift"]) ? $_POST["singleLift"] : "";

    //Topside Preparation Section:
    $postedDisconnectOption = isset($_POST["topsideDisconnect"]) ? $_POST["topsideDisconnect"] : "";
    $postedUtilitiesOption = isset($_POST["utilities"]) ? $_POST["utilities"] : "";
    $postedLiftingSubstructurePrepOption = isset($_POST["liftingSubstructurePrep"]) ? $_POST["liftingSubstructurePrep"] : "";
    $postedLiftingPreparationOption = isset($_POST["liftingPreparation"]) ? $_POST["liftingPreparation"] : "";

    //Topside Removal Section:
    $postedTopsideSingleLiftOption = isset($_POST["topsideSingleLift"]) ? $_POST["topsideSingleLift"] : "";
    $postedMultipleLiftsOption = isset($_POST["multipleLifts"]) ? $_POST["multipleLifts"] : "";
    $postedDemolitionOption = isset($_POST["demolition"]) ? $_POST["demolition"] : "";

    //Well Abandonment Section:
    $postedWellKillOption = isset($_POST["wellKill"]) ? $_POST["wellKill"] : "";
    $postedPreparationOption = isset($_POST["preparation"]) ? $_POST["preparation"] : "";
    $postedAbandonmentOption = isset($_POST["abandonment"]) ? $_POST["abandonment"] : "";
    $postedRemovalOption = isset($_POST["removal"]) ? $_POST["removal"] : "";
    $postedWorkingPlatformsOption = isset($_POST["workingPlatforms"]) ? $_POST["workingPlatforms"] : "";

    $companyCapabilityMatrix = array(
        "companyName" => $_SESSION["companyName"],

        "PlanningElement" => array(
            "costEstimation" => $databaseCoordinate->TranslateData($postedCostEstimationOption),
            "comparativeAssessment" => $databaseCoordinate->TranslateData($postedComparativeAssessmentOption),
            "environmentalStudies" => $databaseCoordinate->TranslateData($postedEnvironmentalStudiesOption),
            "stakeholderEngagement" => $databaseCoordinate->TranslateData($postedStakeholderEngagementOption),
            "technicalEngineeringDesign" => $databaseCoordinate->TranslateData($postedTechnicalEngineeringDesignOption),
            "subsurface" => $databaseCoordinate->TranslateData($postedSubsurfaceOption),
            "healthAndSafety" => $databaseCoordinate->TranslateData($postedHealthAndSafetyOption),
            "projectManagement" => $databaseCoordinate->TranslateData($postedProjectManagementOption),
            "wasteCharacterisation" => $databaseCoordinate->TranslateData($postedWasteCharacterisationOption),
            "materialsInventory" => $databaseCoordinate->TranslateData($postedMaterialsInventoryOption),
            "insurance" => $databaseCoordinate->TranslateData($postedInsuranceOption),
            "copApplication" => $databaseCoordinate->TranslateData($postedCopApplicationOption),
            "marineSampling" => $databaseCoordinate->TranslateData($postedMarineSamplingOption),
            "riskAssessments" => $databaseCoordinate->TranslateData($postedRiskAssessmentsOption),
        ),

        "LateLifeProduction" => array(
            "simplification" => $databaseCoordinate->TranslateData($postedSimplificationOption),
            "dutyHolder" => $databaseCoordinate->TranslateData($postedDutyHolderOption),
            "operationMaintenance" => $databaseCoordinate->TranslateData($postedOperationMaintenanceOption),
            "operationStrategy" => $databaseCoordinate->TranslateData($postedOperationStrategyOption),
            "decomScope" => $databaseCoordinate->TranslateData($postedDecomScopeOption),
            "reservoirStudies" => $databaseCoordinate->TranslateData($postedReservoirStudiesOption),
            "isolationStrategy" => $databaseCoordinate->TranslateData($postedIsolationStrategyOption),
            "inserviceDecommissioning" => $databaseCoordinate->TranslateData($postedInserviceDecommissioningOption),
        ),

        "FacilityCosts" => array(
            "facilityDutyHolder" => $databaseCoordinate->TranslateData($postedFacilityDutyHolderOption),
            "maintenanceContracts" => $databaseCoordinate->TranslateData($postedMaintenanceContractsOption),
            "supportVessels" => $databaseCoordinate->TranslateData($postedSupportVesselsOption),
            "workingVessels" => $databaseCoordinate->TranslateData($postedWorkingVesselsOption),
            "surveyVessels" => $databaseCoordinate->TranslateData($postedSurveyVesselsOption),
            "goodsTransport" => $databaseCoordinate->TranslateData($postedGoodsTransportOption),
            "helicopterOps" => $databaseCoordinate->TranslateData($postedHelicopterOpsOption),
            "accommodationPlatforms" => $databaseCoordinate->TranslateData($postedAccommodationPlatformsOption),
            "walkToWork" => $databaseCoordinate->TranslateData($postedWalkToWorkOption),
            "onshoreLogistics" => $databaseCoordinate->TranslateData($postedOnshoreLogisticsOption),
            "personnelLogistics" => $databaseCoordinate->TranslateData($postedPersonnelLogisticsOption),
            "equipmentLogistics" => $databaseCoordinate->TranslateData($postedEquipmentLogisticsOption),
            "logisticManagement" => $databaseCoordinate->TranslateData($postedLogisticManagementOption),
            "onshoreStorage" => $databaseCoordinate->TranslateData($postedOnshoreStorageOption)
        ),

        "WellAbandonment" => array(
            "wellKill" => $databaseCoordinate->TranslateData($postedWellKillOption),
            "preparation" => $databaseCoordinate->TranslateData($postedPreparationOption),
            "abandonment" => $databaseCoordinate->TranslateData($postedAbandonmentOption),
            "removal" => $databaseCoordinate->TranslateData($postedRemovalOption),
            "workingPlatforms" => $databaseCoordinate->TranslateData($postedWorkingPlatformsOption),
        ),

        "PipelineSafety" => array(
            "cleanupFlushing" => $databaseCoordinate->TranslateData($postedCleanupFlushingOption),
            "isolation" => $databaseCoordinate->TranslateData($postedIsolationOption),
            "hazardousWasteRemoval" => $databaseCoordinate->TranslateData($postedHazardousWasteRemovalOption),
            "opexReductionScopes" => $databaseCoordinate->TranslateData($postedOpexReductionScopesOption)
        ),

        "TopsidePreparation" => array(
            "disconnect" => $databaseCoordinate->TranslateData($postedDisconnectOption),
            "utilities" => $databaseCoordinate->TranslateData($postedUtilitiesOption),
            "liftingPrep" => $databaseCoordinate->TranslateData($postedTopsideLiftingPrepOption)
        ),

        "TopsideRemoval" => array(
            "liftingPreparation" => $databaseCoordinate->TranslateData($postedLiftingPreparationOption),
            "topsideSingleLift" => $databaseCoordinate->TranslateData($postedTopsideSingleLiftOption),
            "multipleLifts" => $databaseCoordinate->TranslateData($postedMultipleLiftsOption),
            "demolition" => $databaseCoordinate->TranslateData($postedDemolitionOption)
        ),

        "SubstructureRemoval" => array(
            "liftingPrep" => $databaseCoordinate->TranslateData($postedLiftingSubstructurePrepOption),
            "cutting" => $databaseCoordinate->TranslateData($postedCuttingOption),
            "subseaExcavator" => $databaseCoordinate->TranslateData($postedSubseaExcavatorOption),
            "singleLift" => $databaseCoordinate->TranslateData($postedSingleLiftOption)
        ),

        "OnshoreRecycling" => array(
            "berthing" => $databaseCoordinate->TranslateData($postedBerthingOption),
            "loading" => $databaseCoordinate->TranslateData($postedLoadingOption),
            "onsiteHandling" => $databaseCoordinate->TranslateData($postedOnsiteHandlingOption),
            "preCleaning" => $databaseCoordinate->TranslateData($postedPreCleaningOption),
            "mechanicalDismantling" => $databaseCoordinate->TranslateData($postedMechanicalDismantlingOption),
            "processing" => $databaseCoordinate->TranslateData($postedProcessingOption),
            "onsitePermits" => $databaseCoordinate->TranslateData($postedOnsitePermitsOption),
            "onsiteStoring" => $databaseCoordinate->TranslateData($postedOnsiteStoringOption),
            "onwardWasteManagement" => $databaseCoordinate->TranslateData($postedOnwardWasteManagementOption),
            "wasteDisposal" => $databaseCoordinate->TranslateData($postedWasteDisposalOption)
        ),

        "SubseaInfrastructure" => array(
            "reconfiguration" => $databaseCoordinate->TranslateData($postedReconfigurationOption),
            "preperation" => $databaseCoordinate->TranslateData($postedPreperationOption),
            "subseaDisconnect" => $databaseCoordinate->TranslateData($postedSubseaDisconnectOption),
            "structureRecovery" => $databaseCoordinate->TranslateData($postedStructureRecoveryOption),
            "pipelineRecovery" => $databaseCoordinate->TranslateData($postedPipelineRecoveryOption),
            "debrisRecovery" => $databaseCoordinate->TranslateData($postedDebrisRecoveryOption),
            "xmasRecovery" => $databaseCoordinate->TranslateData($postedXmasRecoveryOption)
        ),
    
        "SiteRemedation" => array(
            "rockDumping" => $databaseCoordinate->TranslateData($postedRockDumpingOption),
            "trenching" => $databaseCoordinate->TranslateData($postedTrenchingOption),
            "reefing" => $databaseCoordinate->TranslateData($postedReefingOption),
            "marineSignals" => $databaseCoordinate->TranslateData($postedMarineSignalsOption),
            "overtrawling" => $databaseCoordinate->TranslateData($postedOvertrawlingOption),
            "surveying" => $databaseCoordinate->TranslateData($postedSurveyingOption),
            "pileManagement" => $databaseCoordinate->TranslateData($postedPileManagementOption),
            "oilfieldDebrisClearance" => $databaseCoordinate->TranslateData($postedOilfieldDebrisClearanceOption)
        ),

        "Monitoring" => array(
            "derogatedStructure" => $databaseCoordinate->TranslateData($postedDerogatedStructureOption),
            "wells" => $databaseCoordinate->TranslateData($postedWellsOption),
            "environmental" => $databaseCoordinate->TranslateData($postedEnvironmentalOption),
            "pipelines" => $databaseCoordinate->TranslateData($postedPipelinesOption)
        )
    );

    //echo var_dump($companyCapabilityMatrix["WellAbandonment"]);
    $databaseCoordinate->UpdateCompanyCapability($companyCapabilityMatrix);
    WebsiteAlert("Successfully updated your company capability matrix!");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./CSS/global.css">
        <script src="./Scripts/updateCompany.js"></script>
        <link rel="stylesheet" href="./CSS/companyCapability.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Update Company Information</title>
    </head>

    <body>
    <nav class="navbar">
        <ul>
            <li><a href="https://www.eeegr.com/"><img class="lol" src="./Assets/logo.svg"></a></li>
            <li><a href=""><img src="./Assets/sfe.png"></a></li>
            <li>
                <div class="don">
                <p class="ii">T: <strong> 01493 412199</strong></p>
                <p class="ii">E: <strong> office@EEEGR.com</strong></p>
                </div>
            </li>
        </ul>
        </nav>
        <a href="https://www.linkedin.com/company/eeegr/" class="fa fa-linkedin"></a>
        <a href="https://twitter.com/EEEGR?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="oo fa fa-twitter"></a>
        <br><br>
        <h5 class="top textAlignCenter">Update your company information:</h5>
        <p class="bro textAlignCenter">• Select 'Core' if a specific section is the core working area of your business. <br>• Select 'Green' if you have operated and have the capabilty to operate
            in that specific area prior to July 2017. <br>• Select 'Orange' if you have the capability for a particular activity or service but have not yet undertaken this activity 
            or service priror to July 2017. <br>• Leave the selection blank if you do not provide it.
        </p>

        <br>

<form action="companyCapability.php" method="POST">

<label class='container textAlignCenter'><b>Planning Element:</b></label>
<table style='width: 100%'>
    <tr>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Cost Estimation</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='costEstimation'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='costEstimation'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='costEstimation'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Comparative Assessment</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='comparativeAssessment'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='comparativeAssessment'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='comparativeAssessment'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Environmental Studies</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='environmentalStudies'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='environmentalStudies'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='environmentalStudies'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Stakeholder Engagement</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='stakeholderEngagement'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='stakeholderEngagement'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='stakeholderEngagement'><span class='first checkmark'></span></label>
            </div>
        </th>
    </tr>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Technical Engineering Design</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='technicalEngineeringDesign'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='technicalEngineeringDesign'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='technicalEngineeringDesign'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Subsurface</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='subsurface'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='subsurface'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='subsurface'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Health And Safety</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='healthAndSafety'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='healthAndSafety'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='healthAndSafety'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Project Management</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='projectManagement'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='projectManagement'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='projectManagement'><span class='first checkmark'></span></label>
        </div>
    </th>
    </tr>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Waste  Characterisation</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='wasteCharacterisation'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='wasteCharacterisation'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='wasteCharacterisation'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Materials Inventory</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='materialsInventory'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='materialsInventory'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='materialsInventory'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Insurance</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='insurance'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='insurance'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='insurance'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Cop Application</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='copApplication'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='copApplication'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='copApplication'><span class='first checkmark'></span></label>
        </div>
    </th>
    </tr>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Marine Sampling</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='marineSampling'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='marineSampling'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='marineSampling'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Risk Assessments</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='riskAssessments'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='riskAssessments'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='riskAssessments'><span class='first checkmark'></span></label>
        </div>
    </th>
    </tr>
</table>
</div>
<br>
<br>
<label class='container textAlignCenter'><b>Late Life Production:</b></label>
<table style='width: 100%'>
    <tr>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Simplification</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='simplification'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='simplification'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='simplification'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Duty Holder</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='dutyHolder'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='dutyHolder'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='dutyHolder'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Operations & Maintenance</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='operationMaintenance'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='operationMaintenance'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='operationMaintenance'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Operations Strategy</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='operationStrategy'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='operationStrategy'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='operationStrategy'><span class='first checkmark'></span></label>
            </div>
        </th>
    </tr>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Decom Scope</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='decomScope'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='decomScope'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='decomScope'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Reservoir Studies</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='reservoirStudies'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='reservoirStudies'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='reservoirStudies'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Isolation Strategy</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='isolationStrategy'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='isolationStrategy'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='isolationStrategy'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Inservice Decommissioning</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='inserviceDecommissioning'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='inserviceDecommissioning'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='inserviceDecommissioning'><span class='first checkmark'></span></label>
        </div>
    </th>
    </tr>
    </tr>
</table>
</div>
<br>
<br>
<label class='container textAlignCenter'><b>Facility Costs:</b></label>
<table style='width: 100%'>
    <tr>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Facility Duty Holder</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='facilityDutyHolder'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='facilityDutyHolder'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='facilityDutyHolder'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Maintenance Contracts</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='maintenanceContracts'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='maintenanceContracts'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='maintenanceContracts'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Support Vessels</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='supportVessels'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='supportVessels'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='supportVessels'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Working Vessels</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='workingVessels'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='workingVessels'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='workingVessels'><span class='first checkmark'></span></label>
            </div>
        </th>
    </tr>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Survey Vessels</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='surveyVessels'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='surveyVessels'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='surveyVessels'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Goods Transport</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='goodsTransport'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='goodsTransport'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="True" name='goodsTransport'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Helicopter Ops</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='helicopterOps'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='helicopterOps'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='helicopterOps'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Accommodation Platforms</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='accommodationPlatforms'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='accommodationPlatforms'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='accommodationPlatforms'><span class='first checkmark'></span></label>
        </div>
    </th>
    </tr>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Walk To Work</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='walkToWork'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='walkToWork'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='walkToWork'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Onshore Logistics</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='onshoreLogistics'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='onshoreLogistics'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='onshoreLogistics'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Personnel Logistics</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='personnelLogistics'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='personnelLogistics'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='personnelLogistics'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Equipment Logistics</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='equipmentLogistics'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='equipmentLogistics'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='equipmentLogistics'><span class='first checkmark'></span></label>
        </div>
    </th>
    </tr>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Logistic Management</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='logisticManagement'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='logisticManagement'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='logisticManagement'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Onshore Storage</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='onshoreStorage'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='onshoreStorage'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='onshoreStorage'><span class='first checkmark'></span></label>
        </div>
    </th>
    </tr>
</table>
</div>
<br>
<br>
<label class='container textAlignCenter'><b>Well Abandonment:</b></label>
<table style='width: 100%'>
    <tr>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Well Kill</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='wellKill'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='wellKill'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='wellKill'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Preparation</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='preparation'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='preparation'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='preparation'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Abandonment</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='abandonment'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='abandonment'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='abandonment'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Removal</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='removal'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='removal'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='removal'><span class='first checkmark'></span></label>
            </div>
        </th>
    </tr>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Working Platforms</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='workingPlatforms'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='workingPlatforms'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='workingPlatforms'><span class='first checkmark'></span></label>
        </div>
    </th>
    </tr>
</table>
</div>
<br>
<br>
<label class='container textAlignCenter'><b>Pipeline Safety: </b></label>
<table style='width: 100%'>
    <tr>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Cleanup Flushing</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='cleanupFlushing'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='cleanupFlushing'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='cleanupFlushing'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Isolation</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='isolation'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='isolation'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='isolation'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Hazardous Waste Removal</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='hazardousWasteRemoval'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='hazardousWasteRemoval'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='hazardousWasteRemoval'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Opex Reduction Scopes</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='opexReductionScopes'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='opexReductionScopes'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='opexReductionScopes'><span class='first checkmark'></span></label>
            </div>
        </th>
    </tr>
    </tr>
</table>
</div>
<br>
<br>
<label class='container textAlignCenter'><b>Topside Preparation:</b></label>
<table style='width: 100%'>
    <tr>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Disconnect</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='disconnect'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='disconnect'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='disconnect'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Utilities</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='utilities'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='utilities'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='utilities'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Lifting Preperation</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='topsideLiftingPrep'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='topsideLiftingPrep'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='topsideLiftingPrep'><span class='first checkmark'></span></label>
            </div>
        </th>
    </tr>
</table>
</div>
<br>
<br>
<label class='container textAlignCenter'><b>Topside Removal:</b></label>
<table style='width: 100%'>
    <tr>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Lifting Preparation</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='liftingPreparation'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='liftingPreparation'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='liftingPreparation'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Topside Single Lift</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='topsideSingleLift'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='topsideSingleLift'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='topsideSingleLift'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Multiple Lifts</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='multipleLifts'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='multipleLifts'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='multipleLifts'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Demolition</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='demolition'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='demolition'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='demolition'><span class='first checkmark'></span></label>
            </div>
        </th>
    </tr>
    </tr>
</table>
</div>
<br>
<br>
<label class='container textAlignCenter'><b>Substructure Removal:</b></label>
<table style='width: 100%'>
    <tr>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Lifting Prep</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='liftingPrep'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='liftingPrep'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='liftingPrep'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Cutting</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='cutting'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='cutting'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='cutting'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Subsea Excavator</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='subseaExcavator'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='subseaExcavator'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='subseaExcavator'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Single Lift</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='singleLift'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='singleLift'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='singleLift'><span class='first checkmark'></span></label>
            </div>
        </th>
    </tr>
    </tr>
</table>
</div>
<br>
<br>
<label class='container textAlignCenter'><b>Onshore Recycling:</b></label>
<table style='width: 100%'>
    <tr>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Berthing</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='berthing'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='berthing'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='berthing'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Loading</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='loading'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='loading'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='loading'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Onsite Handling</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='onsiteHandling'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='onsiteHandling'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='onsiteHandling'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Pre Cleaning</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='preCleaning'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='preCleaning'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='preCleaning'><span class='first checkmark'></span></label>
            </div>
        </th>
    </tr>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Mechanical Dismantling</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='mechanicalDismantling'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='mechanicalDismantling'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='mechanicalDismantling'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Processing</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='processing'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='processing'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='processing'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Onsite Permits</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='onsitePermits'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='onsitePermits'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='onsitePermits'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Onsite Storing</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='onsiteStoring'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='onsiteStoring'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='onsiteStoring'><span class='first checkmark'></span></label>
        </div>
    </th>
    </tr>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Onward Waste Management</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='onwardWasteManagement'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='onwardWasteManagement'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='onwardWasteManagement'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Waste Disposal</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='wasteDisposal'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='wasteDisposal'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='wasteDisposal'><span class='first checkmark'></span></label>
        </div>
    </th>
    </tr>
</table>
</div>
<br>
<br>
<label class='container textAlignCenter'><b>Subsea Infrastructure:</b></label>
<table style='width: 100%'>
    <tr>
        <th>
            <div class='bruh ontainer textAlignCenter'>
                <h5>Reconfiguration</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='reconfiguration'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='reconfiguration'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='reconfiguration'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Preperation</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='preperation'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='preperation'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='preperation'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Subsea Disconnect</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='subseaDisconnect'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='subseaDisconnect'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='subseaDisconnect'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Structure Recovery</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='structureRecovery'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='structureRecovery'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='structureRecovery'><span class='first checkmark'></span></label>
            </div>
        </th>
    </tr>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Pipeline Recovery</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='pipelineRecovery'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='pipelineRecovery'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='pipelineRecovery'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Debris Recovery</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='debrisRecovery'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='debrisRecovery'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='debrisRecovery'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Xmas Recovery</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='xmasRecovery'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='xmasRecovery'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='xmasRecovery'><span class='first checkmark'></span></label>
        </div>
    </th>
    </tr>
</table>
</div>
<br>
<br>
<label class='container textAlignCenter'><b>Site Remedation:</b></label>
<table style='width: 100%'>
    <tr>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Rock Dumping</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='rockDumping'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='rockDumping'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='rockDumping'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Trenching</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='trenching'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='trenching'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='trenching'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Reefing</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='reefing'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='reefing'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='reefing'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Marine Signals</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='marineSignals'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='marineSignals'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='marineSignals'><span class='first checkmark'></span></label>
            </div>
        </th>
    </tr>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Overtrawling</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='overtrawling'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='overtrawling'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='overtrawling'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Surveying</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='surveying'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='surveying'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='surveying'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Pile Management</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='pileManagement'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='pileManagement'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='pileManagement'><span class='first checkmark'></span></label>
        </div>
    </th>
    <th>
        <div class='bruh container textAlignCenter'>
            <h5>Oilfield Debris Clearance</h5>
            <label class='container'>Core
                <input type='radio' value="Core" name='oilfieldDebrisClearance'><span class='first checkmark'></span></label>
            <label class='container'>Green
                <input type='radio' value="True" name='oilfieldDebrisClearance'><span class='first checkmark'></span></label>
            <label class='container'>Orange
                <input type='radio' value="Orange" name='oilfieldDebrisClearance'><span class='first checkmark'></span></label>
        </div>
    </th>
    </tr>
    </tr>
</table>
</div>
<br>
<br>
<label class='container textAlignCenter'><b>Monitoring:</b></label>
<table style='width: 100%'>
    <tr>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Derogated Structure</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='derogatedStructure'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='derogatedStructure'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='derogatedStructure'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Wells</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='wells'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='wells'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='wells'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Environmental</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='environmental'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='environmental'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='environmental'><span class='first checkmark'></span></label>
            </div>
        </th>
        <th>
            <div class='bruh container textAlignCenter'>
                <h5>Pipelines</h5>
                <label class='container'>Core
                    <input type='radio' value="Core" name='pipelines'><span class='first checkmark'></span></label>
                <label class='container'>Green
                    <input type='radio' value="True" name='pipelines'><span class='first checkmark'></span></label>
                <label class='container'>Orange
                    <input type='radio' value="Orange" name='pipelines'><span class='first checkmark'></span></label>
            </div>
        </th>
    </tr>
    </tr>
</table>
</div>
<br>

<div class="textAlignCenter">
    <br><input class="textAlignCenter" name="submit" type="submit" value="Update Company Capability">  
    </div>
</form>

<div class="main-footer">
    <h2 class="contact"><strong>Contact</strong></h2>
    <div class="oioioi">            
        <div class="oi">
        Tel: <strong>01493 412199</strong><br>
        Email:<strong> office@EEEGR.com</strong>
        <p>Company Registration: 4117847 <br>
        VAT Number: 770 8689 80	</p>

    </div>
    <div class="oioi">
        <strong>EEEGR</strong>
        <p>Unit 4 Ground Floor Wellington Park,
        Excalibur Road, Beacon Business Park,
        Great Yarmouth, Norfolk, NR31 7BB</p>
    </div>
</div>            
</div>

<div class="bottom">
    <p class="links"><a class="links" href="#"></a></p>
    <a class="links" href="#">Membership</a>
    <a class="links" href="#">Skills</a>
    <a class="links" href="#">Sectors</a>
    <a class="links" href="#">Sigs</a>
    <a class="links" href="#">Events</a>
    <a class="links" href="#">Jobs</a>
    <a class="links" href="#">Privacy Statement</a>
</div>

    </body>
</html>