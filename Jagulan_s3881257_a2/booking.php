<?php
session_start();
require_once("includes/tools.php");
//include header
$title = "Booking - Russel Street Medical";
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
    <form action="process_booking.php" method="POST" id="booking-form" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="pid">Patient Id</label>
            <input type="text" name="pid" id="pid" required pattern="[A-Z]{2}[0-9]+[A-Z]"
                oninput="toUpperCaseAndValidate(this)" placeholder="Example: XY123Z">
            <div class="error" id="pid-error"></div>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" required min="today">
        </div>

        <div class="pill-group">
            <div class="segment" data-value="9am-12pm">9am - 12pm</div>
            <div class="segment" data-value="12pm-3pm">12pm - 3pm</div>
            <div class="segment" data-value="3pm-6pm">3pm - 6pm</div>
            <input type="hidden" name="selected_time" id="selected-time" value="">
        </div>

        <div class="form-group">
            <label for="reason">Appointment Reason</label>
            <select name="reason" id="reason" required onchange="showAdvice(this.value)">
                <option value="">Please Select</option>
                <option value="childhood">Childhood Vaccination Shots</option>
                <option value="influenza">Influenza Shot</option>
                <option value="covid">Covid Booster Shot</option>
                <option value="blood">Blood Test</option>
            </select>
            <div id="advice"></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-secondary" formnovalidate>Submit without validation</button>

    </form>
</main>
<script src="script.js"></script>

<!-- Footer -->
<?php require_once("includes/footer.php") ?>