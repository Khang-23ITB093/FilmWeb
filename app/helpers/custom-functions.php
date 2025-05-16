<?php
function convertYearMonthToMonthName1($yearMonth) {

    // Ensure the input is exactly 6 characters and numeric
    if (strlen($yearMonth) !== 6 || !is_numeric($yearMonth)) {
        return "Invalid format. Please provide a 'YYYYMM' string.";
    }

    // Create a DateTime object from the year-month string
    $date = DateTime::createFromFormat("Ym", $yearMonth);
    
    // Return the formatted month name (e.g., "January")
    return $date ? $date->format("F") : "Invalid date format.";
}
