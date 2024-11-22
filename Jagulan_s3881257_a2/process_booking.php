<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // print_r($_POST);
    // Initialize variables
    $pid = $bookingDate = $selectedTime = $reason = $timestamp = "";
    $errors = [];

    // Validate Patient ID
    if (isset($_POST["pid"])) {
        $pid = $_POST["pid"];
        if (!preg_match('/[A-Z]{2}[0-9]+[A-Z]/', $pid)) {
            $errors[] = "Invalid Patient ID format.";
        }
    } else {
        $errors[] = "Patient ID is missing.";
    }

    // Validate Booking Date
    if (isset($_POST["date"])) {
        $bookingDate = $_POST["date"];
        if (empty($bookingDate)) {
            $errors[] = "Please select a Booking Date.";
        }
    } else {
        $errors[] = "Booking Date is missing.";
    }

    // Validate Preferred Time Slot
    if (isset($_POST["selected_time"])) {
        $selectedTime = $_POST["selected_time"];
        if (empty($selectedTime)) {
            $errors[] = "Please select a Preferred Time Slot.";
        }
    } else {
        $errors[] = "Preferred Time Slot is missing.";
    }

    // Validate Appointment Reason
    if (isset($_POST["reason"])) {
        $reason = $_POST["reason"];
        if (empty($reason)) {
            $errors[] = "Please select an Appointment Reason.";
        }
    } else {
        $errors[] = "Appointment Reason is missing.";
    }

    // Check for validation errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
           // If all validation passes, write data to the appointments.txt file
           $timestamp = date("l, dS F Y h:i A");
           $data = [$pid, $bookingDate, $selectedTime, $reason, $timestamp];
   
           // Open the file for appending
           $file = fopen("appointments.txt", "a");
   
           // Write the data in CSV format
           fputcsv($file, $data);
   
           // Close the file
           fclose($file);
   
           // Redirect to a thank you page
           header("Location: thank_you.php");
           exit();
    }
}
?>
