document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contactForm");
  const nameInput = document.getElementById("name");
  const firstnameInput = document.getElementById("firstname");
  const emailInput = document.getElementById("email");
  const descriptionInput = document.getElementById("description");

  let successDialog = document.getElementById("successDialog");
  let closeDialog = document.getElementById("closeDialog");

  if (window.location.search.includes("success=true")) {
    successDialog.classList.remove("hidden");
  }

  closeDialog.addEventListener("click", function () {
    successDialog.classList.add("hidden");
  });

  form.addEventListener("submit", function (event) {
    let isValid = true;

    if (nameInput.value.trim().length < 2) {
      isValid = false;
      document.getElementsByClassName("nameError").textContent =
        "Lastname must be at least 2 characters long.";
    } else {
      document.getElementsByClassName("nameError").textContent = "";
    }

    if (firstnameInput.value.trim().length < 2) {
      isValid = false;

      document.getElementsByClassName("firstnameError").textContent =
        "Firstname must be at least 2 characters long.";
    } else {
      document.getElementsByClassName("firstnameError").textContent = "";
    }

    if (
      !emailInput.value
        .trim()
        .match(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/)
    ) {
      isValid = false;
      document.getElementsByClassName("emailError").textContent =
        "Invalid e-mail address.";
    } else {
      document.getElementsByClassName("emailError").textContent = "";
    }

    if (descriptionInput.value.trim().length < 2) {
      isValid = false;
      document.getElementsByClassName("descriptionError").textContent =
        "Description must be at least 2 characters long.";
    } else {
      document.getElementsByClassName("descriptionError").textContent = "";
    }

    if (!isValid) {
      event.preventDefault();
    }
  });
});
