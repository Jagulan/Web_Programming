<?php
session_start();
require_once("includes/tools.php");
//include header
$title = "Thanks For Booking";
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
<main>
    <div class="container">

        <div class="card">
            <div class="card-body">
                <h3 class="text-center">THANK YOU FOR BOOKING WITH US, You Will Soon be Contacted by our Team</h3>
                <p class="text-center"><a href="index.php">Back Home</a></p>
            </div>
        </div>
    </div>
</main>
<script src="script.js"></script>

<!-- Footer -->
<?php require_once("includes/footer.php") ?>