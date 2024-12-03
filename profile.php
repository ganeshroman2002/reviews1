<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <!-- Display user information here -->
    <p>Welcome, <span id="user-email"></span>!</p>
    <!-- Other profile information can be added here -->
    <a href="#" onclick="logout()">Logout</a>
    <div id="profile-page">
  <h1>User Profile</h1>
  <div id="reviews-container">
    <!-- User reviews will be displayed here -->
  </div>
</div>

    <script src="profile.js"></script>
    <script type="text/javascript">
        // profile.js

// Firebase configuration (same as in your previous code)
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

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Check if the user is logged in
firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        // User is signed in
        document.getElementById("user-email").textContent = user.email;
        // You can fetch and display other user information here
    } else {
        // User is not logged in, redirect to the login page
        window.location.href = "login.html";
    }
});

// Function to log out
function logout() {
    firebase.auth().signOut().then(function() {
        // Sign-out successful, redirect to the login page
        window.location.href = "login.html";
    }).catch(function(error) {
        // An error happened while signing out
        console.error("Logout error: ", error);
    });
}
// Fetch user reviews based on the current user's UID
// Assuming you have already initialized Firebase and the user is authenticated

// Get the current user's ID
var currentUserId = firebase.auth().currentUser.uid;

// Reference the "reviews" node in the database
var reviewsRef = firebase.database().ref('reviews');

// Fetch reviews associated with the current user
reviewsRef.orderByChild('userId').equalTo(currentUserId).once('value', function(snapshot) {
  // Iterate through the snapshot to retrieve the user's reviews
  snapshot.forEach(function(childSnapshot) {
    var reviewData = childSnapshot.val();
    
    // Process the review data (e.g., display it on the page)
    console.log(reviewData);
  });
});


    </script>
</body>
</html>
