<?php

include_once("../Core/databaseCoordinate.php");
include_once("../Utility/dataHandler.php");
include_once("../Utility/extraUtility.php");

if (isset($_POST["submit"]))
{
    $databaseCoordinate = new DatabaseCoordinate("eeegr");
    $dataHandler = new DataHandler();

    $postedCompanyName = $_POST["companyName"];
    $postedCompanyNumber = $_POST["companyNumber"];
    $postedCompanyPassword = $_POST["companyPassword"];
    $postedCompanyEmail = $_POST["companyEmail"];
    $postedCompanyLocation = $_POST["companyLocation"];

    $postedMaintainerName = $_POST["maintainerName"];
    $postedMaintainerEmail = $_POST["maintainerEmail"];
    $postedMaintainerPhone = $_POST["maintainerNumber"];

    $companyName = "";

    //Facility Costs Section
    $postedFacilityDutyHolderOption = isset($_POST["dutyHolder"]) ? $_POST["dutyHolder"] : "";
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
    $postedDisconnectOption = isset($_POST["disconnect"]) ? $_POST["disconnect"] : "";
    $postedStructureRecoveryOption = isset($_POST["structureRecovery"]) ? $_POST["structureRecovery"] : "";
    $postedPipelineRecoveryOption = isset($_POST["pipelineRecovery"]) ? $_POST["pipelineRecovery"] : "";
    $postedDebrisRecoveryOption = isset($_POST["debrisRecovery"]) ? $_POST["debrisRecovery"] : "";
    $postedXmasRecoveryOption = isset($_POST["xmasRecovery"]) ? $_POST["xmasRecovery"] : "";

    //Substructure Removal Section:
    $postedTopsideLiftingPrepOption = isset($_POST["liftingTopsidePrep"]) ? $_POST["liftingTopsidePrep"] : "";
    $postedCuttingOption = isset($_POST["cutting"]) ? $_POST["cutting"] : "";
    $postedSubseaExcavatorOption = isset($_POST["subseaExcavator"]) ? $_POST["subseaExcavator"] : "";
    $postedSingleLiftOption = isset($_POST["singleLift"]) ? $_POST["singleLift"] : "";

    //Topside Preparation Section:
    $postedDisconnectOption = isset($_POST["disconnect"]) ? $_POST["disconnect"] : "";
    $postedUtilitiesOption = isset($_POST["utilities"]) ? $_POST["utilities"] : "";
    $postedLiftingSubstructurePrepOption = isset($_POST["liftingSubstructurePrep"]) ? $_POST["liftingSubstructurePrep"] : "";
    $postedLiftingPreparationOption = isset($_POST["liftingPreparation"]) ? $_POST["liftingPreparation"] : "";

    //Topside Removal Section:
    $postedSingleLiftOption = isset($_POST["singleLift"]) ? $_POST["singleLift"] : "";
    $postedMultipleLiftsOption = isset($_POST["multipleLifts"]) ? $_POST["multipleLifts"] : "";
    $postedDemolitionOption = isset($_POST["demolition"]) ? $_POST["demolition"] : "";

    //Well Abandonment Section:
    $postedWellKillOption = isset($_POST["wellKill"]) ? $_POST["wellKill"] : "";
    $postedPreparationOption = isset($_POST["preparation"]) ? $_POST["preparation"] : "";
    $postedAbandonmentOption = isset($_POST["abandonment"]) ? $_POST["abandonment"] : "";
    $postedRemovalOption = isset($_POST["removal"]) ? $_POST["removal"] : "";
    $postedWorkingPlatformsOption = isset($_POST["workingPlatforms"]) ? $_POST["workingPlatforms"] : "";

    $companyAccount = array(
        "Name" => "",
        "Password" => ""
    );

    $companyInformation = array(
        "Email" => "",
        "Phone" => "",
        "Location" => "",
    );

    $maintainerInformation = array(
        "Name" => "",
        "Email" => "",
        "Phone" => ""
    );

    $constructedErrors = "";

    if (!$dataHandler->VerifyPostedData($postedCompanyName)) 
    {
        $constructedErrors .= "You didnt include a company name! | ";
    } else $companyAccount["Name"] = $postedCompanyName;

    if (!$dataHandler->VerifyPostedData($postedCompanyNumber))
    {
        $constructedErrors .= "You didnt include a company phone number! | ";
    } else $companyInformation["Phone"] = $postedCompanyNumber;

    if (!$dataHandler->VerifyPostedData($postedCompanyPassword))
    {
        $constructedErrors .= "You didnt include a company account password! | ";
    } else $companyAccount["Password"] = $postedCompanyPassword;

    if (!$dataHandler->VerifyPostedData($postedCompanyEmail))
    {
        $constructedErrors .= "You didnt include a company email! | ";
    } else $companyInformation["Email"] = $postedCompanyEmail;

    if (!$dataHandler->VerifyPostedData($postedCompanyLocation))
    {
        $constructedErrors .= "You didnt include a company location! | ";
    } else $companyInformation["Location"] = $postedCompanyLocation;

    if (!$dataHandler->VerifyPostedData($postedMaintainerName))
    {
        $constructedErrors .= "You didnt include a company account maintainer name! | ";
    } else $maintainerInformation["Name"] = $postedMaintainerName;

    if (!$dataHandler->VerifyPostedData($postedMaintainerEmail))
    {
        $constructedErrors .= "You didnt include a company account maintainer email! | ";
    } else $maintainerInformation["Email"] = $postedMaintainerEmail;

    if (!$dataHandler->VerifyPostedData($postedMaintainerPhone))
    {
        $constructedErrors .= "You didnt include a company account maintainer phone number! | ";
    } else $maintainerInformation["Phone"] = $postedMaintainerPhone;

    if (!empty($constructedErrors))
    {
        WebsiteAlert("Errors Detected: $constructedErrors");
    }
    else
    {
        if (!$databaseCoordinate->companyAccount->CheckCompanyExistence($companyAccount["Name"]))
        {
            $companyCapabilityMatrix = array(
                "companyName" => $companyAccount["Name"],

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
                    "topsideSingleLift" => $databaseCoordinate->TranslateData($postedSingleLiftOption),
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
                    "disconnect" => $databaseCoordinate->TranslateData($postedDisconnectOption),
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

            $companyName = $companyAccount["Name"];
            $companyPassword = $companyAccount["Password"];
            $companyEmail = $companyInformation["Email"];
            $companyPhone = $companyInformation["Phone"];
            $companyLocation = $companyInformation["Location"];
            $maintainerName = $maintainerInformation["Name"];
            $maintainerEmail = $maintainerInformation["Email"];
            $maintainerPhone = $maintainerInformation["Phone"];
            $databaseCoordinate->InitializeCompanyAccount($companyName, $companyPassword);
            $databaseCoordinate->InitializeCompanyInformation($companyName, $companyPhone, $companyEmail, $maintainerName, $maintainerEmail, $maintainerPhone, $companyLocation);
            $databaseCoordinate->InitializeCompanyCapability($companyCapabilityMatrix);
            header("location: companyCapability.php");
        } else WebsiteAlert("Invalid account registration, that company already exists.");
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./CSS/accountCreation.css">
        <link rel="stylesheet" href="./CSS/global.css">
        <script src="./Scripts/accountCreation.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <nav class = "navbar">
        <ul>
            <li><a href="https://www.eeegr.com/"><img class ="lol" src="./Assets/logo.svg"></a></li>
            <li><a href=""><img src="./Assets/sfe.png"></a></li>
            <p class="text-right ii">T: <strong> 01493 412199</strong></p>
            <p class="text-right ii">E: <strong> office@EEEGR.com</strong></p>
        </ul>
        </nav>
        <a href="https://www.linkedin.com/company/eeegr/" class="drop fa fa-linkedin"></a>
        <a href="https://twitter.com/EEEGR?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="oo fa fa-twitter"></a>

        

        <div class="parallax">
            <div>
                <br><br><br><br><br><br><br><br><br>
            <p class="text">Networking. Business development. Skills and training. Industry engagement.</p>
            <b class="text">Grow your Business with EEEGR Membership</b><br><br>
            <a href="#" class="buton"><strong>Join Now</strong></a>


            </div>
        </div>
        <br>
        <h3 class="eeegr textAlignCenter">| Account Creation |</h3>
        <p align="center">Please fill out the form below to become an EEEGR member!</p>
        
        <div class="container textAlignCenter">
            <form method="POST" action="accountCreation.php">
                <label for="email">Company's name: </label><br>
                <input class="yhyh" type="text" id="email" name="companyName" placeholder="Enter your Company's name"><br>

                <label for="email">Company's Information: </label><br>
                <input class="yhyh" type="text" id="companyEmail" name="companyEmail" placeholder="Enter your Company's email">

                <label for="companyNumber"></label>
                <input class="yhyh" type="text" id="companyNumber" name="companyNumber" placeholder="Company's contact number"><br>
                
                <label for="companyLocation"></label>
                <input class="yhyh" type="text" id="companyLocation" name="companyLocation" placeholder="location of your company"><br>

                <label for="maintainerName">Maintainer Information: </label><br>
                <input class="yhyh" type="text" id="maintainerName" name="maintainerName" placeholder="Enter your Maintainer's name">

                <label for="maintainerEmail"></label>
                <input class="yhyh" type="text" id="maintainerEmail" name="maintainerEmail" placeholder="Enter your Maintainer's email"><br>

                <label for="maintainerNumber"></label>
                <input class="yhyh" type="text" id="maintainerNumber" name="maintainerNumber" placeholder="Maintainer's contact number"><br>

                <label for="password">Password: </label><br>
                <input class= "yhyh" type="password" id="password" name="companyPassword" placeholder="Enter your password"><br>

                <input name="submit" type="submit" onClick="return empty()" value="Create Account">
            </form>
        </div>

        <div class="container textAlignCenter">
            <a href="login.php" id="madeAccount">Already made an account? Sign in here!</a><br><br>
        </div>

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