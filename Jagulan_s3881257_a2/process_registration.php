<?php
function usernameExists($username) {
    $usersFile = 'users.txt';

    if (file_exists($usersFile)) {
        $file = fopen($usersFile, "r");
        while (($data = fgetcsv($file)) !== false) {
            $storedUsername = $data[0]; // Assuming username is in the first column
            if (trim($username) === trim($storedUsername)) {
                fclose($file);
                // echo "UserName Exists";
                return true; // Username exists
            }
        }

        fclose($file);
    }
    // echo "UserName DOesnt Exist";
    return false; // Username does not exist
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables
    $newUsername = $newPassword = "";
    $errors = [];

    // Validate New Username
    if (isset($_POST["new-username"])) {
        $newUsername = $_POST["new-username"];
        if (empty($newUsername)) {
            $errors[] = "Please enter a New Username.";
        } elseif (usernameExists($newUsername)) {
            $errors[] = "Username already exists. Please choose another.";
        }
    } else {
        $errors[] = "New Username is missing.";
    }

    // Validate New Password
    if (isset($_POST["new-password"])) {
        $newPassword = $_POST["new-password"];
        if (empty($newPassword)) {
            $errors[] = "Please enter a New Password.";
        }
    } else {
        $errors[] = "New Password is missing.";
    }

    // Check for validation errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        // Define the new user data as an array
        $newUserData = ["Username" => $newUsername, "Password" => $newPassword];

        // Open the file for appending
        $file = fopen("users.txt", "a");

        // Write the data in CSV format
        fputcsv($file, $newUserData);

        // Close the file
        fclose($file);

        // Display an alert message
        echo '<script>alert("Registration successful!");</script>';
        echo " <script>window.location.replace('administration.php')</script>";

    }
}
?>