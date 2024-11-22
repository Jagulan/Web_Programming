<?php
session_start();
require_once("includes/tools.php");
//include header
$title = "Administration Page";
require_once("includes/header.php");
?>
<header>
    <div id="branding">
        <h1>City Health Hub</h1>
    </div>
    <nav>
        <a href="index.php">Back to Main Page</a>
    </nav>
</header>
<div class="container mt-5">
    <?php
    // Check if the user is logged in
    if (!isset($_SESSION['user'])) {
        // Display login form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Perform authentication here
            if (authenticate($username, $password)) {
                // Authentication successful
                $_SESSION['user'] = $username;
                echo " <script>window.location.replace('administration.php')</script>";
            } else {
                // Log unsuccessful login attempts
                $attemptLog = ["Username" => $username, "Date-Time" => date("Y-m-d H:i:s")];

                // Open the file for appending
                $file = fopen("accessattempts.txt", "a");

                // Write the data in CSV format
                fputcsv($file, $attemptLog);

                // Close the file
                fclose($file);

                echo '<div class="alert alert-danger" role="alert">Login failed. Please try again.</div>';

            }
        }
        ?>

        <div class="card">
            <div class="card-header">
                Login Form
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>

    <?php } else { // User is logged in ?>
        <div class="alert alert-success mt-3" role="alert">
            Welcome,
            <?php echo $_SESSION['user']; ?>!
        </div>

        <form action="logout.php" method="post" class="mt-3">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

        <!-- Display bookings table -->
        <?php
        $appointmentsFile = 'appointments.txt';

        if (file_exists($appointmentsFile)) {
            $file = fopen($appointmentsFile, 'r');

            ?>
            <div class="card mt-3">
                <div class="card-header">
                    All Bookings
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Patient's Id</th>
                                <th scope="col">Booking Date</th>
                                <th scope="col">Time Slot</th>
                                <th scope="col">Appointment Reason</th>
                                <th scope="col">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while (($data = fgetcsv($file)) !== false) {
                                list($name, $bookingDate, $selectedTimes, $reason, $timestamp) = $data;
                                $formattedDate = convert_date_format($bookingDate);
                                ?>

                                <tr>
                                    <td>
                                        <?php echo $name; ?>
                                    </td>
                                    <td>
                                        <?php echo $formattedDate; ?>
                                    </td>
                                    <td>
                                        <?php echo $selectedTimes; ?>
                                    </td>
                                    <td>
                                        <?php echo $reason; ?>
                                    </td>
                                    <td>
                                        <?php echo $timestamp; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php

            fclose($file);
        }
        ?>

        <!-- User registration form -->
        <div class="card mt-3 mb-3">
            <div class="card-header">
                Registration Form
            </div>
            <div class="card-body">
                <form action="process_registration.php" method="post">
                    <div class="mb-3">
                        <label for="new-username" class="form-label">New Username:</label>
                        <input type="text" id="new-username" name="new-username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="form-label">New Password:</label>
                        <input type="password" id="new-password" name="new-password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register New User</button>
                </form>
            </div>
        </div>
    <?php } ?>
</div>

<?php require_once("includes/footer.php");?>