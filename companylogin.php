<!DOCTYPE html>
<html>
<head>
    <title>Company Registration and Login</title>
    <!-- Include CSS stylesheets if needed -->
      <link rel="stylesheet" href="subscription.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
        <?php include 'assets/php/navbar.php' ?>

    <div id="company-login-page">
        <div class="container1">
            <form id="company-login-form" onsubmit="event.preventDefault(); companyLogin();">
                <h1>Company Login</h1>
                <h1>Welcome Back!</h1>
                <p>Log in to access your company account and enjoy our services.</p>
                <label for="company-login-email">Email:</label>
                <input type="email" id="company-login-email" required>
                <label for="company-login-password">Password:</label>
                <input type="password" id="company-login-password" required>
                <button type="submit">Login</button>
                <div>
                    <p>Don't have a company account? <a href="#" onclick="toggleCompanyForm()">Sign Up</a></p>
                </div>
            </form>
<form id="company-register-form" style="display: none;" onsubmit="event.preventDefault(); companyRegister();" enctype="multipart/form-data">
    <h1>Company Registration</h1>
    <h1>Join Us Today!</h1>
    <p>Sign up to create your company account and start using our services.</p>
    <label for="company-register-email">Email:</label>
    <input type="email" id="company-register-email" required>
    
    <!-- Add input fields for company name and description -->
    <label for="company-register-name">Company Name:</label>
    <input type="text" id="company-register-name" placeholder="Enter company name" required>
    
    <label for="company-register-description">Company Description:</label>
    <textarea id="company-register-description" placeholder="Enter company description" required></textarea>

    <!-- Input field for company image -->
    <label for="company-register-image">Company Image:</label>
    <input type="file" id="company-register-image" accept="image/*" required>
    
    <label for="company-register-password">Password:</label>
    <input type="password" id="company-register-password" required>
    <button type="submit">Register</button>
    <div>
        <p>Already have a company account? <a href="#" onclick="toggleCompanyForm()">Login</a></p>
    </div>
</form>

        <div id="company-uid-container" style="display: none; margin-top: 100px;"></div> <!-- Container for displaying UID -->
        <button id="logout-button" style="display: none;" onclick="companyLogout();">Logout</button> <!-- Logout button -->
        
        </div>
    </div>
<?php include 'assets/php/footer.php' ?>

    <!-- Include Firebase SDK scripts -->
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>


    <script>
        // Your Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCme0h9jCxSQzAkeoYdV7Csl8rqQuGorH8",
    authDomain: "rewiews-737d5.firebaseapp.com",
    databaseURL: "https://rewiews-737d5-default-rtdb.firebaseio.com",
    projectId: "rewiews-737d5",
    storageBucket: "rewiews-737d5.appspot.com",
    messagingSenderId: "887594559229",
    appId: "1:887594559229:web:9db205865786f493f88094",
    measurementId: "G-0EQKTQSH2P"
  };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        // Function to handle company registration
// Function to handle company registration
    // Function to handle company registration
    function companyRegister() {
        var companyRegisterEmail = document.getElementById('company-register-email').value;
        var companyRegisterName = document.getElementById('company-register-name').value;
        var companyRegisterDescription = document.getElementById('company-register-description').value;
        var companyRegisterImageInput = document.getElementById('company-register-image');
        var companyRegisterPassword = document.getElementById('company-register-password').value;

        // Check if all required fields are filled
        if (companyRegisterEmail && companyRegisterName && companyRegisterDescription && companyRegisterImageInput.files[0] && companyRegisterPassword) {
            // Create a new Firebase authentication user
            firebase.auth().createUserWithEmailAndPassword(companyRegisterEmail, companyRegisterPassword)
                .then((userCredential) => {
                    // New company registered successfully
                    var user = userCredential.user;

                    // Get the user's UID
                    var userId = user.uid;

                    // Reference to the Firebase Realtime Database
                    var database = firebase.database();

                    // Upload the company image to Firebase Storage
                    var storageRef = firebase.storage().ref();
                    var imageRef = storageRef.child('company_images/' + userId + '_' + companyRegisterImageInput.files[0].name);

                    imageRef.put(companyRegisterImageInput.files[0]).then(function(snapshot) {
                        // Get the download URL of the uploaded image
                        return snapshot.ref.getDownloadURL();
                    }).then(function(downloadURL) {
                        // Add company data to the database, including the image URL
                        var companyData = {
                            companyEmail: companyRegisterEmail,
                            companyName: companyRegisterName,
                            companyDescription: companyRegisterDescription,
                            companyImage: downloadURL
                            // Add more data fields as needed
                        };

                        // Store company data in the database
                        database.ref('companies/' + userId).set(companyData);

                        alert("Company registration successful!");
                    }).catch(function(error) {
                        // Handle errors during image upload
                        console.error("Error uploading image:", error);
                    });
                })
                .catch((error) => {
                    // Handle errors during company registration
                    var errorCode = error.code;
                    var errorMessage = error.message;
                    alert("Company registration failed: " + errorMessage);
                });
        } else {
            alert("Please fill in all required fields.");
        }
    }


        // Function to handle company login
        function companyLogin() {
            var companyLoginEmail = document.getElementById('company-login-email').value;
            var companyLoginPassword = document.getElementById('company-login-password').value;

            firebase.auth().signInWithEmailAndPassword(companyLoginEmail, companyLoginPassword)
                .then((userCredential) => {
                    // Company logged in successfully
                    var user = userCredential.user;
                    alert("Company login successful!");
                })
                .catch((error) => {
                    // Handle errors during company login
                    var errorCode = error.code;
                    var errorMessage = error.message;
                    alert("Company login failed: " + errorMessage);
                });
        }

        // Function to toggle between registration and login forms
        function toggleCompanyForm() {
            var companyLoginForm = document.getElementById("company-login-form");
            var companyRegisterForm = document.getElementById("company-register-form");

            if (companyLoginForm.style.display === "none") {
                companyLoginForm.style.display = "block";
                companyRegisterForm.style.display = "none";
            } else {
                companyLoginForm.style.display = "none";
                companyRegisterForm.style.display = "block";
            }
        }
            function displayCompanyUID() {
        var user = firebase.auth().currentUser;
        var companyUidContainer = document.getElementById('company-uid-container');
        var logoutButton = document.getElementById('logout-button');

        if (user) {
            // User is signed in
            companyUidContainer.style.display = 'block'; // Show UID container
            companyUidContainer.textContent = "Company UID: " + user.uid;

            logoutButton.style.display = 'block'; // Show logout button

            // Hide login form
            var companyLoginForm = document.getElementById("company-login-form");
            companyLoginForm.style.display = "none";
        } else {
            // No user is signed in
            companyUidContainer.style.display = 'none'; // Hide UID container
            logoutButton.style.display = 'none'; // Hide logout button

            // Show login form
            var companyLoginForm = document.getElementById("company-login-form");
            companyLoginForm.style.display = "block";
        }
    }

    // Function to handle company logout
    function companyLogout() {
        firebase.auth().signOut().then(function() {
            // Sign-out successful.
            alert("Company logout successful!");
        }).catch(function(error) {
            // An error happened.
            alert("Company logout failed: " + error.message);
        });
    }

    // Check the user's login status on page load
    firebase.auth().onAuthStateChanged(function(user) {
        displayCompanyUID(); // Display UID, logout button, or login form initially
    });
    </script>
</body>
</html>
