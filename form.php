<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 50px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f2f2f2;
    }

    .container h1 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .form-group button[type="submit"] {
      background-color: #6c4caf;
      width: 106%;
      padding: 10px;
      color: white;
      cursor: pointer;
    }

    .form-group button[type="submit"]:hover {
      background-color: #6c4caf;
    }

    .error-message {
      color: red;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Registration Form</h1>
    <form id="registrationForm" action="register.php" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <span id="nameError" class="error-message"></span>
      </div>

      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <span id="phoneError" class="error-message"></span>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <span id="emailError" class="error-message"></span>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <span id="passwordError" class="error-message"></span>
      </div>

      <div class="form-group">
        <button type="submit" id="registerButton">Register</button>
      </div>
    </form>
  </div>

  <script>
    const form = document.getElementById("registrationForm");
    const nameInput = document.getElementById("name");
    const phoneInput = document.getElementById("phone");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");

    form.addEventListener("submit", function (event) {
      event.preventDefault();

      const nameValue = nameInput.value.trim();
      const phoneValue = phoneInput.value.trim();
      const emailValue = emailInput.value.trim();
      const passwordValue = passwordInput.value.trim();

      let isValid = true;

      // Clear previous error messages
      const errorMessages = document.getElementsByClassName("error-message");
      for (let i = 0; i < errorMessages.length; i++) {
        errorMessages[i].textContent = "";
      }

      // Name validation
      if (nameValue === "") {
        document.getElementById("nameError").textContent =
          "Please enter your name";
        isValid = false;
      }

      // Phone validation
      const phoneRegex = /^[0-9]{10}$/;
      if (!phoneRegex.test(phoneValue)) {
        document.getElementById("phoneError").textContent =
          "Please enter a valid 10-digit phone number";
        isValid = false;
      }

      // Email validation
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(emailValue)) {
        document.getElementById("emailError").textContent =
          "Please enter a valid email address";
        isValid = false;
      }

      // Password validation
      const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
      if (!passwordRegex.test(passwordValue)) {
        document.getElementById("passwordError").textContent =
          "Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character";
        isValid = false;
      }

      if (isValid) {
        // Submit the form
        form.submit();
      }
    });
  </script>
</body>
</html>
