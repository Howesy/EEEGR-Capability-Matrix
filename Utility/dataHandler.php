<?php

include_once(__DIR__ . "/errorLogging.php");

class DataHandler
{
    public function VerifyArrayIntegrity(array $specifiedArray)
    {
        $predefinedArrayKeys = array(
        "CompanyInformation",
        "FacilityCosts",
        "LateLifeProduction",
        "Monitoring",
        "OnshoreRecycling",
        "PipelineSafety",
        "PlanningElement",
        "SiteRemedation",
        "SubseaInfrastructure",
        "SubstructureRemoval",
        "TopsidePreparation",
        "TopsideRemoval",
        "WellAbandonment");

        $missingArrayKeys = array_diff_key(array_flip($predefinedArrayKeys), $specifiedArray);
        
        if (!$missingArrayKeys)
        {
            $currentDateTime = date("d-m-Y g:i a");
            LogError("$currentDateTime Error Occured: Constructed array data was missing essential core keys.");
            return false;
        }

        return true;
    }

    public function VerifyPostedData($postedData)
    {
        return !empty($postedData);
    }
}

?>