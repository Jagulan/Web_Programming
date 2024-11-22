function toUpperCaseAndValidate(input) {
  input.value = input.value.toUpperCase();
  validatePatientId(input.value);
}

function validatePatientId(pid) {
  // Get the error div element
  var errorDiv = document.getElementById("pid-error");

  // Perform validation checks
  if (!pid.match(/[A-Z]{2}[0-9]+[A-Z]/)) {
    errorDiv.textContent = "Invalid Patient ID format.";
    return false;
  } else {
    errorDiv.textContent = ""; // Clear the error message
  }
  return true;
}

function showAdvice(reason) {
  var adviceText = "";
  switch (reason) {
    case "childhood":
      adviceText =
        "Childhood vaccines: A disclaimer that multiple vaccines are normally administered in combination and may cause the child to be sluggish or feverous for 24 – 48 hours afterwards.";
      break;
    case "influenza":
      adviceText =
        "Influenza: The best time to get vaccinated is in April and May each year for optimal protection over the winter months.";
      break;
    case "covid":
      adviceText =
        "Covid Booster Shot: Advice that everyone should arrange to have their third shot as soon as possible and adults over the age of 30 should have their fourth shot to protect against new variant strains.";
      break;
    case "blood":
      adviceText =
        "Blood Test: That some tests require some fasting ahead of time and that a staff member will advise them on this prior to the appointment.";
      break;
  }
  document.getElementById("advice").innerText = adviceText;
}

function validateForm() {
  var form = document.getElementById("booking-form");
  var pidInput = form["pid"];
  var dateInput = form["date"];

  // Clear any existing error messages
  document.getElementById("pid-error").textContent = "";
  document.getElementById("date-error").textContent = "";

  var isPidValid = validatePatientId(pidInput.value);
  
  // Check if all fields are valid
  if (!isPidValid || !dateInput) {
    return false;
  }
  // Add other validation if needed
  return true;
}

document
  .getElementById("date")
  .setAttribute("min", new Date().toISOString().split("T")[0]);

// select the clicked segment and assign the value to hidden input
const segments = document.querySelectorAll(".segment");

for (const segment of segments) {
  segment.addEventListener("click", function () {
    // Deselect all segments
    segments.forEach((seg) => seg.classList.remove("selected"));

    // Select the clicked segment
    this.classList.add("selected");

    // Set the value of the hidden input field
    document.getElementById("selected-time").value =
      this.getAttribute("data-value");

    // Action based on the selected segment
    console.log(`Selected time slot: ${this.getAttribute("data-value")}`);
  });
}
