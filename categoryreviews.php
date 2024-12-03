<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Category Reviews - Product Review Pro</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./style.css">
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
  <style type="text/css">
    /* Add your custom styles for this page if needed */
  </style>
</head>
<body>
  <?php include 'assets/php/navbar.php' ?>

  <!-- Your HTML content for displaying related reviews goes here -->
  <div class="container">
    <h1>Category Reviews - <span id="categoryName"></span></h1>
    <div id="reviewList">
      <!-- Reviews related to the selected category will be displayed here -->
    </div>
  </div>
<?php include 'assets/php/footer.php' ?>

  <!-- Include your JavaScript code to fetch and display reviews here -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
  <script src="./script.js"></script>
  <script type="text/javascript">
    var firebaseConfig = {
  var firebaseConfig = {
  apiKey: "AIzaSyCme0h9jCxSQzAkeoYdV7Csl8rqQuGorH8",
  authDomain: "rewiews-737d5.firebaseapp.com",
  databaseURL: "https://rewiews-737d5-default-rtdb.firebaseio.com",
  projectId: "rewiews-737d5",
  storageBucket: "rewiews-737d5.appspot.com",
  messagingSenderId: "887594559229",
  appId: "1:887594559229:web:9db205865786f493f88094",
  measurementId: "G-0EQKTQSH2P"
};    };

    firebase.initializeApp(firebaseConfig);

    // Function to fetch and display reviews for the selected category
// Function to fetch and display reviews for the selected category
function fetchReviewsForCategory(categoryName) {
  var reviewList = document.getElementById('reviewList');

  // Reference to the Firebase Realtime Database
  var database = firebase.database();

  // Reference to the "reviews" node in the database
  var reviewsRef = database.ref('reviews');

  // Clear existing review cards
  reviewList.innerHTML = '';

  // Query the reviews based on the selected category
  reviewsRef.orderByChild('category').equalTo(categoryName).once('value')
    .then(function(snapshot) {
      snapshot.forEach(function(childSnapshot) {
        var reviewData = childSnapshot.val();
        var reviewId = childSnapshot.key;

        // Create a review card element
        var reviewCard = document.createElement('div');
        reviewCard.classList.add('review-card');

        // Populate the review card with review data
        var reviewTitle = document.createElement('h3');
        reviewTitle.textContent = "Title: " + reviewData.name;

        var reviewDescription = document.createElement('p');
        reviewDescription.textContent = "Description: " + reviewData.info;

        var reviewRating = document.createElement('p');
        reviewRating.textContent = "Rating: " + reviewData.rating + "/5";

        // Append elements to the review card
        reviewCard.appendChild(reviewTitle);
        reviewCard.appendChild(reviewDescription);
        reviewCard.appendChild(reviewRating);

        // Append the review card to the review list
        reviewList.appendChild(reviewCard);
      });
    })
    .catch(function(error) {
      console.error('Error fetching reviews:', error);
    });
}

  </script>
</body>
</html>
