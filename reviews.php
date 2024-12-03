<!-- reviews.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
      <link rel="stylesheet" href="./reviews.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Include Firebase SDK and configuration (replace with your own config) -->
    <script src="https://www.gstatic.com/firebasejs/8.7.0/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>    <script>
        // Firebase configuration (replace with your own config)
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
    </script>
</head>
<body>
    <?php include 'assets/php/navbar.php' ?>

    <h1>Reviews Page</h1>
    <div id="reviewsList" id="cardContainer" data-review-key="${childSnapshot.key}">
        <!-- Reviews for the selected category will be dynamically added here -->
    </div>
<?php include 'assets/php/footer.php' ?>

    <script>
        // Function to parse query parameters from URL
        function getQueryParam(param) {
            var urlSearchParams = new URLSearchParams(window.location.search);
            return urlSearchParams.get(param);
        }

        // Retrieve the selected category from the URL
        var selectedCategory = getQueryParam('category');

        // Reference the "reviews" node in the database
        var reviewsRef = firebase.database().ref('reviews');

        // Reference the reviews list
        var reviewsList = document.getElementById('reviewsList');

        // Function to display stars based on the rating
        function displayStars(rating) {
            var stars = "";
            for (var i = 1; i <= 5; i++) {
                if (i <= rating) {
                    stars += "<span class='star active'>&#9733;</span>";
                } else {
                    stars += "<span class='star'>&#9734;</span>";
                }
            }
            return stars;
        }

        // Fetch and display reviews for the selected category
        reviewsRef.orderByChild('category').equalTo(selectedCategory).once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var reviewData = childSnapshot.val();
                var reviewId = childSnapshot.key;

                var card = document.createElement('div');
                card.classList.add('card');
                card.id = 'card_' + reviewId;

                var cardContent = document.createElement('div');
                cardContent.classList.add('card-content');

                var cardTitle = document.createElement('div');
                cardTitle.classList.add('card-title');
                cardTitle.textContent = "Title: " + reviewData.name;

                var cardDescription = document.createElement('div');
                cardDescription.classList.add('card-description');
                cardDescription.textContent = "Description: " + reviewData.info;

                var cardCategory = document.createElement('div');
                cardCategory.classList.add('card-category');
                cardCategory.textContent = "Category: " + reviewData.category;

                var cardCompany = document.createElement('div');
                cardCompany.classList.add('card-company');
                cardCompany.textContent = "Company: " + reviewData.company;

                var cardRating = document.createElement('div');
                cardRating.classList.add('card-rating');
                cardRating.innerHTML = "Rating: " + displayStars(reviewData.rating);

                var cardLink = document.createElement('div');
        cardLink.classList.add('card-link');
        cardLink.innerHTML = "Link: <a href='" + reviewData.link + "'>" + reviewData.link + "</a>";

                var cardImage = document.createElement('img');
                cardImage.classList.add('card-image');

                // Get the download URL of the image from Firebase Storage
                var storageRef = firebase.storage().ref('images/' + reviewData.image);
                storageRef.getDownloadURL().then(function (downloadURL) {
                    cardImage.src = downloadURL; // Set the image src once the download URL is retrieved
                }).catch(function (error) {
                    console.error('Error getting image URL:', error);
                    cardImage.src = 'default-image.jpg'; // Use a default image in case of an error
                });

                cardContent.appendChild(cardTitle);
                cardContent.appendChild(cardDescription);
                cardContent.appendChild(cardCategory);
                cardContent.appendChild(cardCompany);
                cardContent.appendChild(cardRating);
                cardContent.appendChild(cardLink);
                cardContent.appendChild(cardImage);

                card.appendChild(cardContent);
        card.addEventListener('click', function() {
  var reviewId = childSnapshot.key;
  var clickedReview = reviewData; // Use the appropriate review data here

  // Store the clicked review in sessionStorage
  sessionStorage.setItem('selectedReview', JSON.stringify(clickedReview));

  // Redirect to the detail page
  window.location.href = 'viewpage.php';
});
                reviewsList.appendChild(card);
            });
        });


    </script>
</body>
</html>
