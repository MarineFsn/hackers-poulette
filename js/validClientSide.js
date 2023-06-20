document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contactForm");
  const nameInput = document.getElementById("name");
  const firstnameInput = document.getElementById("firstname");
  const emailInput = document.getElementById("email");
  const descriptionInput = document.getElementById("description");

  form.addEventListener("submit", function (event) {
    let isValid = true;

    const errorMessages = form.getElementsByClassName("error");
    for (let i = 0; i < errorMessages.length; i++) {
      errorMessages[i].textContent = "";
    }

    if (nameInput.value.trim().length < 2) {
      isValid = false;
      document.getElementById("nameError").textContent =
        "Lastname must be at least 2 characters long.";
      nameInput.style.borderColor("border-red-500");
    } else {
      nameInput.classList.remove("border-red-500");
    }

    if (firstnameInput.value.trim().length < 2) {
      isValid = false;
      document.getElementById("firstnameError").textContent =
        "Firstname must be at least 2 characters long.";
      firstnameInput.classList.add("border-red-500");
    } else {
      firstnameInput.classList.remove("border-red-500");
    }

    if (
      !emailInput.value
        .trim()
        .match(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/)
    ) {
      isValid = false;
      document.getElementById("emailError").textContent =
        "Invalid email address.";
      emailInput.classList.add("border-red-500");
    } else {
      emailInput.classList.remove("border-red-500");
    }

    if (descriptionInput.value.trim().length < 2) {
      isValid = false;
      document.getElementById("descriptionError").textContent =
        "Description must be at least 2 characters long.";
      descriptionInput.classList.add("border-red-500");
    } else {
      descriptionInput.classList.remove("border-red-500");
    }

    if (!isValid) {
      event.preventDefault();
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  let successDialog = document.getElementById("successDialog");
  let closeDialog = document.getElementById("closeDialog");

  if (window.location.search.includes("success=true")) {
    successDialog.classList.remove("hidden");
  }

  closeDialog.addEventListener("click", function () {
    successDialog.classList.add("hidden");
  });
});
