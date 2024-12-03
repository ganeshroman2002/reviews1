<!DOCTYPE html>
<html>
<head>
  <title>Online Service Subscriptions</title>
  <link rel="stylesheet" href="subscription.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <?php include 'assets/php/navbar.php' ?>

<div id="login-page">
    <div class="container1">
        <form id="login-form" onsubmit="event.preventDefault(); login();">
            <h1>Login</h1>
            <h1>Welcome Back!</h1>
            <p>Log in to access your account and enjoy our services.</p>
            <label for="login-email">Email:</label>
            <input type="email" id="login-email" required>
            <label for="login-password">Password:</label>
            <input type="password" id="login-password" required>
            <button type="submit">Login</button>
            <div>
                <p>Don't have an account? <a href="#" onclick="toggleForm()">Sign Up</a></p>
            </div>
        </form>
        <form id="register-form" style="display: none;" onsubmit="event.preventDefault(); register();">
            <h1>Register</h1>
            <h1>Join Us Today!</h1>
            <p>Sign up to create your account and start exploring our services.</p>
            <label for="register-email">Email:</label>
            <input type="email" id="register-email" required>
            <label for="register-password">Password:</label>
            <input type="password" id="register-password" required>
            <button type="submit">Register</button>
            <div>
                <p>Already have an account? <a href="#" onclick="toggleForm()">Sign In</a></p>
            </div>
        </form>
    </div>
</div>

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

<div class="pricing-section">
    <!-- Pricing Card 1: Standard -->
    <div class="pricing-card">
        <h2>Standard</h2>
        <p class="plan-description">For smaller businesses ready to expand their brand reach and online presence</p>
        <div class="price-details" id="basic-plan">
            <p class="price">From $250</p>
            <p class="billing-details">per domain per month</p>
        </div>
        <button class="book-demo-button" id="subscribe-basic" onclick="subscribe('basic-plan')">Subscribe</button>

        <ul class="features">
            <li>500 verified review invitations per month</li>
            <li>500 additional invitations for past customers in each of your first three months</li>
            <li>8 website widgets to display your star rating and review count</li>
            <li>An ad-free profile page</li>
            <li>Image and video generators</li>
            <li>Social sharing</li>
            <li>Analytics dashboards to learn more from your feedback</li>
            <li>Third-party eCommerce, helpdesk, and marketing integrations</li>
        </ul>
                        <button class="view-features-button">View All Features</button>

    </div>
        <!-- Pricing Card 2: Growth -->
    <div class="pricing-card">
        <h2>Growth</h2>
        <p class="plan-description">For growing businesses looking to convert more customers with review content</p>
        <div class="price-details" id="Growth-plan">
            <p class="price">From $600</p>
            <p class="billing-details">per domain per month</p>
        </div>
        <button class="book-demo-button" id="subscribe-Growth" onclick="subscribe('Growth-plan')">Subscribe</button>

        <ul class="features">
            <li>Access to everything in Standard</li>
            <li>750 verified review invitations per month</li>
            <li>750 additional invitations for past customers in each of your first three months</li>
            <li>Personalize your profile, invitations and more with your own branding</li>
            <li>Access our full 22 widget library to showcase review content on your website and emails</li>
            <li>Targeted TrustBox widgets displaying relevant reviews by tag</li>
            <li>Advanced review analysis with tag and keyword filters</li>
        </ul>
                        <button class="view-features-button">View All Features</button>

    </div>

    <!-- Pricing Card 3: Scale -->
    <div class="pricing-card">
        <h2>Scale</h2>
        <p class="plan-description">For scaling businesses who want to maximize their performance with a high volume of reviews</p>
        <div class="price-details" id="premium-plan">
            <p class="price">From $900</p>
            <p class="billing-details">per domain per month</p>
        </div>
        <button class="book-demo-button" id="subscribe-premium" onclick="subscribe('premium-plan')">Subscribe</button>

        <ul class="features">
            <li>Access to everything in Growth</li>
            <li>Unlimited verified review invitations</li>
            <li>Invite unlimited past customers to leave reviews in your first three months</li>
            <li>Collect more reviews to showcase throughout your buyer's journey and drive conversions</li>
            <li>Build a customer-centric business with even more insights and analytics from your feedback, increasing loyalty and repeat sales</li>
        </ul>
                        <button class="view-features-button">View All Features</button>

    </div>
</div>
<!-- <div class="container" id="subscription-page" style="display: none;">
    <div class="subscription-card" id="basic-plan">
      <h2>Basic Plan</h2>
      <p>Access to basic features</p>
      <ul>
        <li>Feature 1</li>
        <li>Feature 2</li> -->
        <!-- Add more features here -->
      <!-- </ul>
      <span class="price">$9.99/month</span>
      <button id="subscribe-basic" onclick="subscribe('basic-plan')">Subscribe</button>
  </div> -->

<!--     <div class="subscription-card" id="premium-plan">
      <h2>Premium Plan</h2>
      <p>Access to all features</p>
      <ul>
        <li>Feature 1</li>
        <li>Feature 2</li>
        <li>Feature 3</li> -->
        <!-- Add more features here -->
<!--       </ul>
      <span class="price">$19.99/month</span>
      <button id="subscribe-premium" onclick="subscribe('premium-plan')">Subscribe</button>
    </div> -->
    <button onclick="logout()">Logout</button>
<!-- </div> -->

  <!-- Include Firebase SDK scripts -->
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
  <script src="app.js"></script>
  <script type="text/javascript">
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

// Get a reference to the Firebase Realtime Database
var database = firebase.database();

// Store the current user's UID
var currentUserUID = null;

// Function to handle user authentication state change
firebase.auth().onAuthStateChanged(function (user) {
  if (user) {
    // User is logged in, show main content page
    currentUserUID = user.uid;
    document.getElementById("login-page").style.display = "none";
    document.getElementById("subscription-page").style.display = "block";

    // Call the function to update subscription buttons
    updateSubscriptionButtons(user.uid);
  } else {
    // User is not logged in, show login page
    currentUserUID = null;
    document.getElementById("login-page").style.display = "block";
    document.getElementById("subscription-page").style.display = "none";
  }
});

// Function to handle user registration
function register() {
  var email = document.getElementById("register-email").value;
  var password = document.getElementById("register-password").value;

  firebase.auth().createUserWithEmailAndPassword(email, password)
    .then((userCredential) => {
      // New user registered successfully
      var user = userCredential.user;

      alert("Registration successful!");
    })
    .catch((error) => {
      // Handle errors during registration
      var errorCode = error.code;
      var errorMessage = error.message;
      alert("Registration failed: " + errorMessage);
    });
}

// Function to handle user login
function login() {
  var email = document.getElementById("login-email").value;
  var password = document.getElementById("login-password").value;

  firebase.auth().signInWithEmailAndPassword(email, password)
    .then((userCredential) => {
      // User logged in successfully
      var user = userCredential.user;
      alert("Login successful!");
    })
    .catch((error) => {
      // Handle errors during login
      var errorCode = error.code;
      var errorMessage = error.message;
      alert("Login failed: " + errorMessage);
    });
}

// Function to log out the user
function logout() {
  firebase.auth().signOut().then(function () {
    alert("Logged out successfully!");
  }).catch(function (error) {
    alert("Error logging out: " + error.message);
  });
}

// Function to update subscription buttons based on the user's subscriptions
function updateSubscriptionButtons(uid) {
  var subscribeBasicBtn = document.getElementById("subscribe-basic");
  var subscribeGrowthBtn = document.getElementById("subscribe-Growth");
  var subscribePremiumBtn = document.getElementById("subscribe-premium");

  database.ref("subscriptions").child(uid).once("value", function (snapshot) {
    var subscriptions = snapshot.val();

    // Check if the user is subscribed to each plan and disable the buttons accordingly
    if (subscriptions && subscriptions["basic-plan"]) {
      subscribeBasicBtn.disabled = true;
      subscribeBasicBtn.innerText = "Subscribed";
    } else {
      subscribeBasicBtn.disabled = false;
      subscribeBasicBtn.innerText = "Subscribe";
    }
        if (subscriptions && subscriptions["Growth-plan"]) {
      subscribeGrowthBtn.disabled = true;
      subscribeGrowthBtn.innerText = "Subscribed";
    } else {
      subscribeGrowthBtn.disabled = false;
      subscribeGrowthBtn.innerText = "Subscribe";
    }

    if (subscriptions && subscriptions["premium-plan"]) {
      subscribePremiumBtn.disabled = true;
      subscribePremiumBtn.innerText = "Subscribed";
    } else {
      subscribePremiumBtn.disabled = false;
      subscribePremiumBtn.innerText = "Subscribe";
    }
  });
}

// Function to handle plan subscription
function subscribe(planId) {
  // Check if the user is logged in
  var user = firebase.auth().currentUser;
  if (!user) {
    alert("Please log in or create an account to subscribe.");
    return;
  }

  // Check if the user is already subscribed to the plan
  database.ref("subscriptions").child(user.uid).once("value", function (snapshot) {
    var subscriptions = snapshot.val();

    if (subscriptions && subscriptions[planId]) {
      alert("You are already subscribed to this plan!");
      return;
    }

    // If not subscribed, add the subscription to the user's data in the database
    var updates = {};
    updates[`subscriptions/${user.uid}/${planId}`] = true;
    database.ref().update(updates)
      .then(function () {
        alert("Subscription successful!");
        // Call the function to update subscription buttons after successful subscription
        updateSubscriptionButtons(user.uid);
      })
      .catch(function (error) {
        alert("Subscription failed: " + error.message);
      });
  });
}

  </script>
</body>
</html>
