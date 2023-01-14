<?php
if (!isset($_SESSION)) {
    session_start();
    $_SESSION["staffID"] = "1220016";
}
$staffD = $_SESSION["staffID"];
$passportUnique = $staffD . "passportAECleanCodes";
$studyLeaveUnique = $staffD . "studyLeaveAECleanCodes";
$masterListUnique = $staffD . "masterListAECleanCodes";
$matriculaUnique = $staffD . "matriculaAECleanCodes";
$ssnitUnique = $staffD . "ssnitCardAECleanCodes";
$ghanaCardUnique = $staffD . "ghanaCardAECleanCodes";
$admissionUnique = $staffD . "admissionAECleanCodes";


