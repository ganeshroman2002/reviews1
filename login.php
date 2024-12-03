<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Login / Register panel effects</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Bitter:400,700'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.9/css/all.css'>
<link rel="stylesheet" href="./login.css">
<link rel="stylesheet" href="./style.css">
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>

</head>
<body>
<div id="login-status">Logged In as: [User Email]</div>

<!-- partial:index.partial.html -->
<div class='wrapper' id='wrapper'>
  <p class='announcement'>* Better viewed on Firefox</p>
  <div class='card-group' data-active-card='login' id='card-group'>
    <div class='transition-animation' id='transition-animation'></div>
    <div class='card card-login' id='login'>
      <h1 class='title'>LOGIN</h1>
      <hr>
      <p class='disclaimer'>Now it's time to access <br> your account</p>

      <form onsubmit="event.preventDefault(); login();">
      <div class='input-group'>
      <input type="email" id="login-email" required>
      <label id="name" for="login-email">Email:</label>
      </div>
      

      <div class='input-group'>
      <input type="password" id="login-password" required>
      <label for="login-password">Password:</label>
      <button class='btn-default' type="submit">Login</button>
    </div>
    </form>
      <div class='card-footer'>
        <p>Don't have an account yet? <br> Click on the button below</p>
        <button class='btn-default btn-invert' data-action='register' id='btn-register' type='javascript:void(0)'>Register <span class="fas fa-check"></span></button>
      </div>
    </div>
    <div class='card card-register' id='register'>
      <h1 class='title'>REGISTER</h1>
      <hr>
      <p class='disclaimer'>Now it's time to create <br> your account</p>
      <form id='register-form' onsubmit="event.preventDefault(); register();">
      <div class='input-group'>
        <input  type="email" id="register-email" required>
        <label id="name" for="register-email">Email:</label>
      </div>

        <div class='input-group'>
          <input type="password" id="register-password" required>
          <label for="register-password">Password:</label>
        </div>
      <button class='btn-default' type="submit">Register</button>
    </form>
      <div class='card-footer'>
        <p>Already have an account? <br> Click on the button below</p>
        <button class='btn-default btn-invert' data-action='login' id='btn-register' type='javascript:void(0)'>Login <span class="fas fa-arrow-right"></span></button>
      </div>
    </div>
  </div>
</div>
<!-- Add this button to your HTML -->
    <button onclick="logout()">Logout</button>

<!-- partial -->
  <script  src="./login.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script><script  src="./script.js"></script>
  <script type="text/javascript">
        function toggleForm() {
      var loginForm = document.getElementById("login-form");
      var registerForm = document.getElementById("register-form");

      if (loginForm.style.display === "none") {
        loginForm.style.display = "block";
        registerForm.style.display = "none";
        document.getElementById("switch-button").innerText = "Sign Up";
      } else {
        loginForm.style.display = "none";
        registerForm.style.display = "block";
        document.getElementById("switch-button").innerText = "Sign In";
      }
    }
  </script>
  <div  id="subscription-page" style="display: none; margin-top: 200px;">
<script type="text/javascript">
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

    // Get a reference to the Firebase Realtime Database
    var database = firebase.database();

    // Register a new user
    function register() {
      var email = document.getElementById("register-email").value;
      var password = document.getElementById("register-password").value;

      firebase.auth().createUserWithEmailAndPassword(email, password)
        .then((userCredential) => {
          // New user registered successfully
          var user = userCredential.user;

          // Add user data to the database
          var userData = {
            email: user.email,
            uid: user.uid
          };

          // Use the child() method to add a new child under "users" with the user's UID
          database.ref("users").child(user.uid).set(userData);

          alert("Registration successful!");
        })
        .catch((error) => {
          // Handle errors during registration
          var errorCode = error.code;
          var errorMessage = error.message;
          alert("Registration failed: " + errorMessage);
          window.location.href = "login.php";
        });
    }

    // Login a user
// Login a user
function login() {
    var email = document.getElementById("login-email").value;
    var password = document.getElementById("login-password").value;

    firebase.auth().signInWithEmailAndPassword(email, password)
        .then((userCredential) => {
            // User logged in successfully
            var user = userCredential.user;
            alert("Login successful!");

            // Check if the user is already logged in, and redirect accordingly
            firebase.auth().onAuthStateChanged(function(user) {
                if (user) {
                    // User is signed in, redirect to the profile page
                    window.location.href = "profile.php";
                }
            });
        })
        .catch((error) => {
            // Handle errors during login
            var errorCode = error.code;
            var errorMessage = error.message;
            alert("Login failed: " + errorMessage);
        });
}
// Check if the user is logged in
firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        // User is signed in, redirect to the profile page
        window.location.href = "profile.php";
    } else {
        // User is not logged in
        document.getElementById("login-status").innerHTML = "Not Logged In";
        document.getElementById("registration-form").style.display = "block";
        document.getElementById("login-form").style.display = "block";
    }
}); 

</script>
<script type="text/javascript">
function logout() {
  firebase.auth().signOut().then(function () {
    alert("Logged out successfully!");
  }).catch(function (error) {
    alert("Error logging out: " + error.message);
  });
}
</script>
</body>
</html>
