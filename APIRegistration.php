<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Registration</title>
    <link rel="stylesheet" href="styles.css"> <!-- You can create a separate CSS file for styling -->
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
</head>
<body>
    <?php include 'assets/php/navbar.php' ?>

    <div class="container" style="margin-top: 100px;">
        <h1>Registration</h1>
        <form id="registration-form">
            <label for="email">Email:</label>
            <input type="email" id="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" required>
            <button type="submit">Register</button>
        </form>
    </div>

    <script src="registration.js"></script>
</body>
</html>
<?php include 'assets/php/footer.php' ?>


    <script>
document.addEventListener("DOMContentLoaded", function() {
    const registrationForm = document.getElementById("registration-form");

    registrationForm.addEventListener("submit", function(event) {
        event.preventDefault();

        // Gather user input
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        // Create a JSON object with the user data
        const userData = {
            email: email,
            password: password
        };

        // Send a POST request to the API (hypothetical URL)
        fetch("https://api.example.com/register", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(userData)
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("Registration failed.");
            }
        })
        .then(data => {
            // Registration successful
            alert("Registration successful!");
            // Redirect to a login page or perform other actions as needed
        })
        .catch(error => {
            // Handle registration errors
            alert("Registration failed: " + error.message);
        });
    });
});


    </script> <!-- You can create a separate JavaScript file -->
</body>
</html>
