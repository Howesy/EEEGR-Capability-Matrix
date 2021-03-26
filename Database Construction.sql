-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 17, 2019 at 12:17 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eeegr`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `companyAccountInfoAdd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `companyAccountInfoAdd` (IN `companyName` TEXT, IN `companyPassword` TEXT)  BEGIN INSERT INTO companyaccount (companyName, companyPassword) VALUES (companyName, companyPassword); END$$

DROP PROCEDURE IF EXISTS `facilityCostsAddInfo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `facilityCostsAddInfo` (IN `companyName` TEXT, IN `dutyHolder` VARCHAR(8), IN `maintenanceContracts` VARCHAR(8), IN `supportVessels` VARCHAR(8), IN `workingVessels` VARCHAR(8), IN `surveyVessels` VARCHAR(8), IN `goodsTransport` VARCHAR(8), IN `helicopterOps` VARCHAR(8), IN `accommodationPlatforms` VARCHAR(8), IN `walkToWork` VARCHAR(8), IN `onshoreLogistics` VARCHAR(8), IN `personnelLogistics` VARCHAR(8), IN `equipmentLogistics` VARCHAR(8), IN `logisticManagement` VARCHAR(8), IN `onshoreStorage` VARCHAR(8))  BEGIN INSERT INTO facilitycosts
        (companyName, dutyHolder, maintenanceContracts, supportVessels, workingVessels, surveyVessels, 
        goodsTransport, helicopterOps, accommodationPlatforms, walkToWork, onshoreLogistics, personnelLogistics, 
        equipmentLogistics, logisticManagement, onshoreStorage) VALUES (companyName, dutyHolder, 
        maintenanceContracts, supportVessels, workingVessels, surveyVessels, goodsTransport, helicopterOps, 
        accommodationPlatforms, walkToWork, onshoreLogistics, personnelLogistics, equipmentLogistics, 
        logisticManagement, onshoreStorage); END$$

DROP PROCEDURE IF EXISTS `insertCompanyInformation`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCompanyInformation` (IN `companyName` TEXT, IN `phoneNumber` TEXT, IN `companyEmailAddress` TEXT, IN `maintainerName` TEXT, IN `maintainerEmailAddress` TEXT, IN `maintainerPhone` TEXT, IN `companyLocation` TEXT)  BEGIN INSERT INTO companyinformation (companyName, phoneNumber, 
        companyEmailAddress, maintainerName, maintainerEmailAddress, maintainerPhone, companyLocation) VALUES (companyName, phoneNumber, 
        companyEmailAddress, maintainerName, maintainerEmailAddress, maintainerPhone, companyLocation); END$$

DROP PROCEDURE IF EXISTS `lateLifeProductionInfoAdd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `lateLifeProductionInfoAdd` (IN `companyName` TEXT, IN `simplification` VARCHAR(8), IN `dutyHolder` VARCHAR(8), IN `operationMaintenance` VARCHAR(8), IN `operationStrategy` VARCHAR(8), IN `decomScope` VARCHAR(8), IN `reservoirStudies` VARCHAR(8), IN `isolationStrategy` VARCHAR(8), IN `inserviceDecommissioning` VARCHAR(8))  BEGIN INSERT INTO latelifeproduction
        (companyName, simplification, dutyHolder, operationmaintenance, operationStrategy, decomScope, reservoirStudies,
        isolationStrategy, inserviceDecommissioning) VALUES (companyName, simplification, dutyHolder, operationmaintenance, operationStrategy, decomScope, reservoirStudies,
        isolationStrategy, inserviceDecommissioning); END$$

DROP PROCEDURE IF EXISTS `monitoringInfoAdd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `monitoringInfoAdd` (IN `companyName` TEXT, IN `derogatedStructure` VARCHAR(8), IN `wells` VARCHAR(8), IN `environmental` VARCHAR(8), IN `pipelines` VARCHAR(8))  BEGIN INSERT INTO monitoring (companyName, derogatedStructure, wells, 
        environmental, pipelines) VALUES (companyName, derogatedStructure, wells, 
        environmental, pipelines); END$$

DROP PROCEDURE IF EXISTS `onshoreInfoAdd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `onshoreInfoAdd` (IN `companyNameR` TEXT, IN `berthingR` VARCHAR(8), IN `loadingR` VARCHAR(8), IN `onsiteHandlingR` VARCHAR(8), IN `preCleaningR` VARCHAR(8), IN `mechanicalDismantlingR` VARCHAR(8), IN `processingR` VARCHAR(8), IN `onsitePermitsR` VARCHAR(8), IN `onsiteStoringR` VARCHAR(8), IN `onwardWasteManagementR` VARCHAR(8), IN `wasteDisposalR` VARCHAR(8))  BEGIN INSERT INTO onshorerecycling (companyName, berthing, loading, onsiteHandling, preCleaning, mechanicalDismantling, processing, onsitePermits, onsiteStoring, onwardWasteManagement, wasteDisposal) VALUES (companyNameR, berthingR, loadingR, onsiteHandlingR, preCleaningR, mechanicalDismantlingR, processingR, onsitePermitsR, onsiteStoringR, onwardWasteManagementR, wasteDisposalR); END$$

DROP PROCEDURE IF EXISTS `pipelineSafetyInfoAdd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `pipelineSafetyInfoAdd` (IN `companyName` TEXT, IN `cleanupFlushing` VARCHAR(8), IN `isolation` VARCHAR(8), IN `hazardousWasteRemoval` VARCHAR(8), IN `opexReductionScopes` VARCHAR(8))  BEGIN INSERT INTO pipelinesafety (companyName, cleanupFlushing, 
        isolation, hazardousWasteRemoval, opexReductionScopes) VALUES (companyName, cleanupFlushing, isolation, 
        hazardousWasteRemoval, opexReductionScopes); END$$

DROP PROCEDURE IF EXISTS `planningElementInfoAdd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `planningElementInfoAdd` (IN `companyName` TEXT, IN `costEstimation` VARCHAR(8), IN `comparativeAssessment` VARCHAR(8), IN `environmentalStudies` VARCHAR(8), IN `stakeholderEngagement` VARCHAR(8), IN `technicalEngineeringDesign` VARCHAR(8), IN `subsurface` VARCHAR(8), IN `healthAndSafety` VARCHAR(8), IN `projectManagement` VARCHAR(8), IN `wasteCharacterisation` VARCHAR(8), IN `materialsInventory` VARCHAR(8), IN `insurance` VARCHAR(8), IN `copApplication` VARCHAR(8), IN `marineSampling` VARCHAR(8), IN `riskAssessments` VARCHAR(8))  BEGIN INSERT INTO planningelement (companyName, costEstimation, comparativeAssessment, 
        environmentalStudies, stakeholderEngagement, technicalEngineeringDesign, subsurface, healthAndSafety, 
        projectManagement, wasteCharacterisation, materialsInventory, insurance, copApplication, marineSampling, 
        riskAssessments) VALUES (companyName, costEstimation, comparativeAssessment, 
        environmentalStudies, stakeholderEngagement, technicalEngineeringDesign, subsurface, healthAndSafety, 
        projectManagement, wasteCharacterisation, materialsInventory, insurance, copApplication, marineSampling, 
        riskAssessments); END$$

DROP PROCEDURE IF EXISTS `siteRemedationInfoAdd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `siteRemedationInfoAdd` (IN `companyName` TEXT, IN `rockDumping` VARCHAR(8), IN `trenching` VARCHAR(8), IN `reefing` VARCHAR(8), IN `marineSignals` VARCHAR(8), IN `overtrawling` VARCHAR(8), IN `surveying` VARCHAR(8), IN `pileManagement` VARCHAR(8), IN `oilfieldDebrisClearance` VARCHAR(8))  BEGIN INSERT INTO siteremedation (companyName, rockDumping, trenching, reefing, marineSignals, 
        overtrawling, surveying, pileManagement, oilfieldDebrisClearance) VALUES (companyName, rockDumping, trenching, reefing, marineSignals, 
        overtrawling, surveying, pileManagement, oilfieldDebrisClearance); END$$

DROP PROCEDURE IF EXISTS `subseaInfoAdd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `subseaInfoAdd` (IN `companyName` TEXT, IN `reconfiguration` VARCHAR(8), IN `preperation` VARCHAR(8), IN `disconnect` VARCHAR(8), IN `structureRecovery` VARCHAR(8), IN `pipelineRecovery` VARCHAR(8), IN `debrisRecovery` VARCHAR(8), IN `xmasRecovery` VARCHAR(8))  BEGIN INSERT INTO subseainfrastructure (companyName, reconfiguration, preperation, disconnect, structureRecovery, pipelineRecovery, debrisRecovery, xmasRecovery) VALUES (companyName, reconfiguration, preperation, disconnect, structureRecovery, pipelineRecovery, debrisRecovery, xmasRecovery); END$$

DROP PROCEDURE IF EXISTS `substructureRemovalInfoAdd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `substructureRemovalInfoAdd` (IN `companyName` TEXT, IN `liftingPrep` VARCHAR(8), IN `cutting` VARCHAR(8), IN `subseaExcavator` VARCHAR(8), IN `singleLift` VARCHAR(8))  BEGIN INSERT INTO substructureremoval (companyName, liftingPrep, cutting, subseaExcavator, singleLift) VALUES 
        (companyName, liftingPrep, cutting, subseaExcavator, singleLift); END$$

DROP PROCEDURE IF EXISTS `topsidePreparationInfoAdd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `topsidePreparationInfoAdd` (IN `companyName` TEXT, IN `disconnect` VARCHAR(8), IN `utilities` VARCHAR(8), IN `liftingPrep` VARCHAR(8))  BEGIN INSERT INTO topsidepreparation (companyName, disconnect, utilities, liftingPrep) VALUES (companyName, 
        disconnect, utilities, liftingPrep); END$$

DROP PROCEDURE IF EXISTS `topsideRemovalInfoAdd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `topsideRemovalInfoAdd` (IN `companyName` TEXT, IN `liftingPreparation` VARCHAR(8), IN `singleLift` VARCHAR(8), IN `multipleLifts` VARCHAR(8), IN `demolition` VARCHAR(8))  BEGIN INSERT INTO topsideremoval (companyName, liftingPreparation, singleLift, 
        multipleLifts, demolition) VALUES (companyName, liftingPreparation, singleLift, multipleLifts, demolition); END$$

DROP PROCEDURE IF EXISTS `wellAbandonmentInfoAdd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `wellAbandonmentInfoAdd` (IN `companyName` TEXT, IN `wellKill` VARCHAR(8), IN `preperation` VARCHAR(8), IN `abandonment` VARCHAR(8), IN `removal` VARCHAR(8), IN `workingPlatforms` VARCHAR(8))  BEGIN INSERT INTO wellabandonment (companyName, wellKill, preperation, 
        abandonment, removal, workingPlatforms) VALUES (companyName, wellKill, preperation, abandonment, removal, 
        workingPlatforms); END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `companyaccount`
--

DROP TABLE IF EXISTS `companyaccount`;
CREATE TABLE IF NOT EXISTS `companyaccount` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `companyPassword` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `companyinformation`
--

DROP TABLE IF EXISTS `companyinformation`;
CREATE TABLE IF NOT EXISTS `companyinformation` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `phoneNumber` text NOT NULL,
  `companyEmailAddress` text NOT NULL,
  `maintainerPhone` text NOT NULL,
  `maintainerName` text NOT NULL,
  `maintainerEmailAddress` text NOT NULL,
  `companyLocation` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facilitycosts`
--

DROP TABLE IF EXISTS `facilitycosts`;
CREATE TABLE IF NOT EXISTS `facilitycosts` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `dutyHolder` varchar(8) NOT NULL,
  `maintenanceContracts` varchar(8) NOT NULL,
  `supportVessels` varchar(8) NOT NULL,
  `workingVessels` varchar(8) NOT NULL,
  `surveyVessels` varchar(8) NOT NULL,
  `goodsTransport` varchar(8) NOT NULL,
  `helicopterOps` varchar(8) NOT NULL,
  `accommodationPlatforms` varchar(8) NOT NULL,
  `walkToWork` varchar(8) NOT NULL,
  `onshoreLogistics` varchar(8) NOT NULL,
  `personnelLogistics` varchar(8) NOT NULL,
  `equipmentLogistics` varchar(8) NOT NULL,
  `logisticManagement` varchar(8) NOT NULL,
  `onshoreStorage` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `latelifeproduction`
--

DROP TABLE IF EXISTS `latelifeproduction`;
CREATE TABLE IF NOT EXISTS `latelifeproduction` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `simplification` varchar(8) NOT NULL,
  `dutyHolder` varchar(8) NOT NULL,
  `operationMaintenance` varchar(8) NOT NULL,
  `operationStrategy` varchar(8) NOT NULL,
  `decomScope` varchar(8) NOT NULL,
  `reservoirStudies` varchar(8) NOT NULL,
  `isolationStrategy` varchar(8) NOT NULL,
  `inserviceDecommissioning` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

DROP TABLE IF EXISTS `monitoring`;
CREATE TABLE IF NOT EXISTS `monitoring` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `derogatedStructure` varchar(8) NOT NULL,
  `wells` varchar(8) NOT NULL,
  `environmental` varchar(8) NOT NULL,
  `pipelines` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `onshorerecycling`
--

DROP TABLE IF EXISTS `onshorerecycling`;
CREATE TABLE IF NOT EXISTS `onshorerecycling` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `berthing` varchar(8) NOT NULL,
  `loading` varchar(8) NOT NULL,
  `onsiteHandling` varchar(8) NOT NULL,
  `preCleaning` varchar(8) NOT NULL,
  `mechanicalDismantling` varchar(8) NOT NULL,
  `processing` varchar(8) NOT NULL,
  `onsitePermits` varchar(8) NOT NULL,
  `onsiteStoring` varchar(8) NOT NULL,
  `onwardWasteManagement` varchar(8) NOT NULL,
  `wasteDisposal` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pipelinesafety`
--

DROP TABLE IF EXISTS `pipelinesafety`;
CREATE TABLE IF NOT EXISTS `pipelinesafety` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `cleanupFlushing` varchar(8) NOT NULL,
  `isolation` varchar(8) NOT NULL,
  `hazardousWasteRemoval` varchar(8) NOT NULL,
  `opexReductionScopes` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `planningelement`
--

DROP TABLE IF EXISTS `planningelement`;
CREATE TABLE IF NOT EXISTS `planningelement` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `costEstimation` varchar(8) NOT NULL,
  `comparativeAssessment` varchar(8) NOT NULL,
  `environmentalStudies` varchar(8) NOT NULL,
  `stakeholderEngagement` varchar(8) NOT NULL,
  `technicalEngineeringDesign` varchar(8) NOT NULL,
  `subsurface` varchar(8) NOT NULL,
  `healthAndSafety` varchar(8) NOT NULL,
  `projectManagement` varchar(8) NOT NULL,
  `wasteCharacterisation` varchar(8) NOT NULL,
  `materialsInventory` varchar(8) NOT NULL,
  `insurance` varchar(8) NOT NULL,
  `copApplication` varchar(8) NOT NULL,
  `marineSampling` varchar(8) NOT NULL,
  `riskAssessments` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siteremedation`
--

DROP TABLE IF EXISTS `siteremedation`;
CREATE TABLE IF NOT EXISTS `siteremedation` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `rockDumping` varchar(8) NOT NULL,
  `trenching` varchar(8) NOT NULL,
  `reefing` varchar(8) NOT NULL,
  `marineSignals` varchar(8) NOT NULL,
  `overtrawling` varchar(8) NOT NULL,
  `surveying` varchar(8) NOT NULL,
  `pileManagement` varchar(8) NOT NULL,
  `oilfieldDebrisClearance` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subseainfrastructure`
--

DROP TABLE IF EXISTS `subseainfrastructure`;
CREATE TABLE IF NOT EXISTS `subseainfrastructure` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `reconfiguration` varchar(8) NOT NULL,
  `preperation` varchar(8) NOT NULL,
  `disconnect` varchar(8) NOT NULL,
  `structureRecovery` varchar(8) NOT NULL,
  `pipelineRecovery` varchar(8) NOT NULL,
  `debrisRecovery` varchar(8) NOT NULL,
  `xmasRecovery` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `substructureremoval`
--

DROP TABLE IF EXISTS `substructureremoval`;
CREATE TABLE IF NOT EXISTS `substructureremoval` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `liftingPrep` varchar(8) NOT NULL,
  `cutting` varchar(8) NOT NULL,
  `subseaExcavator` varchar(8) NOT NULL,
  `singleLift` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topsidepreparation`
--

DROP TABLE IF EXISTS `topsidepreparation`;
CREATE TABLE IF NOT EXISTS `topsidepreparation` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `disconnect` varchar(8) NOT NULL,
  `utilities` varchar(8) NOT NULL,
  `liftingPrep` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topsideremoval`
--

DROP TABLE IF EXISTS `topsideremoval`;
CREATE TABLE IF NOT EXISTS `topsideremoval` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `liftingPreparation` varchar(8) NOT NULL,
  `singleLift` varchar(8) NOT NULL,
  `multipleLifts` varchar(8) NOT NULL,
  `demolition` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wellabandonment`
--

DROP TABLE IF EXISTS `wellabandonment`;
CREATE TABLE IF NOT EXISTS `wellabandonment` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `companyName` text NOT NULL,
  `wellKill` varchar(8) NOT NULL,
  `preperation` varchar(8) NOT NULL,
  `abandonment` varchar(8) NOT NULL,
  `removal` varchar(8) NOT NULL,
  `workingPlatforms` varchar(8) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
