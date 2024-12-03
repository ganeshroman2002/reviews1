<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Product Review Pro</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="./style.css">
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
<!--     <script src="./database.js"></script>
  <script src="./script.js"></script>
 -->

<style type="text/css">

</style>
</head>
<body>

<?php include 'assets/php/navbar.php' ?>


  
      <!-- Start Landing Page -->
<div class="landing-page">
  <div class="content">
    <div class="container">
      <div class="info">
        <h1>Read reviews. Write reviews.</h1>
        <p>Find companies you can trust.</p>
        <form id="search-form" action="search.html" method="GET">
  <input class="search" type="text" name="query" placeholder="Search...">
  <button type="submit">Search</button>
</form>

      </div>
      <div class="image">
        <img src="https://i.postimg.cc/65QxYYzh/001234.png">
      </div>
    </div>
  </div>
</div>

      <!-- End Landing Page -->




    <div class="bcontainer1">
          <div class="large-container">

        <!-- Content for the first container (Top-left) -->
        <h2>Be heard</h2>
        <p>Product Review Pro is a review platform that’s open to everyone. Share your experiences to help others make better choices and encourage companies to up their game.</p>
        <a href="business.php" class="container1btn">What We Do</a>
        </div>
    <div class="small-container">
        <!-- Content for the second container (Top-right) -->
        <h2>Our 2022 Transparency Report has landed</h2>
        <p>We’re looking back on a year unlike any other. Read about how we ensure our platform’s integrity.</p>
                <a href="#" class="container1btn">Take A Look</a>
    </div>
    </div>
  </div>
        <div class="bcontainer1">
    <div class="small-container">
        <!-- Content for the third container (Bottom-left) -->
        <h2>register your brand name</h2>
        <p>register your brand name With Us.</p>
                        <a href="addcompany.html" class="container1btn">register now</a>

    </div>
    <div class="large-container">
        <!-- Content for the fourth container (Bottom-right) -->
        <h2>APIs (For Business) </h2>
        <p>Get APIs</p>
                        <a href="APIRegistration.html" class="container1btn">Take A Look</a>

    </div>
</div>



      <div class="landing-page">
        <div class="content">
          <div class="container">
            <div class="info">
              <h1>Real reviews, trusted by millions, to help drive revenue for your business</h1>
              <p>Attract and keep customers with Product Review Pro review platform.</p>
              <a href="subscription.php" class="container1btn">Get Plans</a>
              
            </div>
            <div class="image">
              <img src="https://unsplash-assets.imgix.net/marketing/vertise/header.png?auto=format&fit=crop&q=60">
            </div>
          </div>
        </div>
      </div>









<div class="categories">
  <div class="explore-view-all" >
    <h1 class="explore-link">Explore Categories</h1>
    <a class="view-all-link" href="#">View All</a>
  </div>
  <div id="categoryList"  style="margin-top: 100px;">
    <!-- Category details will be dynamically added here -->
  </div>
</div>

<div class="companies">
  <div class="company-container">
    <div id="companyContainer">
      <!-- Company containers will be dynamically added here -->
    </div>
  </div>
</div>


<div class="recentReviews">
    <h1>Recent Reviews</h1>
    <div id="recentReviewsContainer" class="auto-scroll">
        <!-- Recent reviews will be dynamically added here -->
    </div>
</div>



<?php include 'assets/php/footer.php' ?>

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script  src="./script.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.7.0/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>

    <script>
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
  firebase.initializeApp(firebaseConfig);
      // Reference the "reviews" node in the database
var reviewsRef = firebase.database().ref('reviews');

// Query to fetch the most recent 10 reviews
reviewsRef.orderByChild('timestamp') // Assuming you have a "timestamp" field in your reviews
          .limitToLast(10) // Change the limit as needed
          .once('value', function(snapshot) {
  var cardContainer = document.getElementById('recentReviewsContainer'); // Change this to your container ID

  snapshot.forEach(function(childSnapshot) {
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

    var cardLink = document.createElement('a'); // Create an <a> element
    cardLink.classList.add('card-link');
    cardLink.href = reviewData.link; // Set the href attribute to the reviewData.link value
    cardLink.textContent = "View Product"; // Set the link text

    var cardImage = document.createElement('img');
    cardImage.classList.add('card-image');

    // Get the download URL of the image from Firebase Storage
    var storageRef = firebase.storage().ref('images/' + reviewData.image);
    storageRef.getDownloadURL().then(function(downloadURL) {
      cardImage.src = downloadURL; // Set the image src once the download URL is retrieved
    }).catch(function(error) {
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
      var clickedReview = reviewData;
      sessionStorage.setItem('selectedReview', JSON.stringify(clickedReview));

      var detailUrl = 'viewpage.php?reviewId=' + reviewId;
      window.location.href = detailUrl; // Redirect to the detail page
    });

    cardContainer.appendChild(card);
  });
});
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
// JavaScript to stop scrolling on hover
document.getElementById('recentReviewsContainer').addEventListener('mouseenter', function() {
  // Pause the scroll animation on hover
  var elements = document.getElementsByClassName('auto-scroll');
  for (var i = 0; i < elements.length; i++) {
    elements[i].style.animationPlayState = 'paused';
  }
});
// Function to shorten the description to two lines
function getShortenedDescription(description) {
  const maxLength = 100; // Adjust this value as needed
  if (description.length <= maxLength) {
    return description;
  }
  return description.substring(0, maxLength) + "...";
}

// Function to toggle between short and full descriptions
function toggleDescription(card) {
  const shortDescription = card.querySelector('.short-description');
  const fullDescription = card.querySelector('.full-description');
  const readMoreLink = card.querySelector('.read-more-link');
  const readLessLink = card.querySelector('.read-less-link');

  readMoreLink.addEventListener('click', function () {
    shortDescription.style.display = 'none';
    fullDescription.style.display = 'block';
    readMoreLink.style.display = 'none';
    readLessLink.style.display = 'inline';
  });

  readLessLink.addEventListener('click', function () {
    shortDescription.style.display = 'block';
    fullDescription.style.display = 'none';
    readMoreLink.style.display = 'inline';
    readLessLink.style.display = 'none';
  });
}

// Call the toggleDescription function for each card
const cards = document.querySelectorAll('.card');
cards.forEach(function (card) {
  toggleDescription(card);
});

document.getElementById('recentReviewsContainer').addEventListener('mouseleave', function() {
  // Resume the scroll animation on mouseleave
  var elements = document.getElementsByClassName('auto-scroll');
  for (var i = 0; i < elements.length; i++) {
    elements[i].style.animationPlayState = 'running';
  }
});

// Fetch and display companies from Firebase
// function fetchCompanies() {
//     var companiesList = document.querySelector('.companies');
//     var companiesRef = firebase.database().ref('companies');

//     companiesRef.on('value', function(snapshot) {
//         companiesList.innerHTML = '';

//         snapshot.forEach(function(childSnapshot) {
//             var companyKey = childSnapshot.key;
//             var companyName = childSnapshot.val().companyName;
//             var companyImage = childSnapshot.val().companyImage;

//             var companyContainer = document.createElement('div');
//             companyContainer.className = 'company-container';

//             var companyLogoImg = document.createElement('img');
//             companyLogoImg.src = companyImage;
//             companyLogoImg.alt = companyName + ' Logo';

//             var companyNameHeading = document.createElement('h6');
//             companyNameHeading.textContent = companyName;

//             // Add a click event listener to each company container (optional)
//             companyContainer.addEventListener('click', function() {
//                 // You can define an action when a company is clicked
//                 // For example, redirect to a company's page or display company details.
//                 // Replace the following line with your desired action.
//                 alert('Clicked on ' + companyName);
//             });

//             companyContainer.appendChild(companyLogoImg);
//             companyContainer.appendChild(companyNameHeading);

//             companiesList.appendChild(companyContainer);
//         });
//     });
// }

function fetchCompanies() {
    var companiesList = document.querySelector('.companies');
    var companiesRef = firebase.database().ref('companies');

    companiesRef.on('value', function(snapshot) {
        companiesList.innerHTML = '';

        snapshot.forEach(function(childSnapshot) {
            var companyImage = childSnapshot.val().companyImage;

            var companyContainer = document.createElement('div');
            companyContainer.className = 'company-container';

            var companyLogoImg = document.createElement('img');
            companyLogoImg.src = companyImage;
            companyLogoImg.alt = 'Company Logo';

            // Add a click event listener to each company container
            companyContainer.addEventListener('click', function() {
    // Get the company name and other details
    var companyName = childSnapshot.val().companyName;
    var companyDescription = childSnapshot.val().companyDescription;
    var companyLogo = childSnapshot.val().companyImage;

    // Encode the details as query parameters in the URL
    var queryParams = '?name=' + encodeURIComponent(companyName) +
                     '&description=' + encodeURIComponent(companyDescription) +
                     '&logo=' + encodeURIComponent(companyLogo);

    // Redirect to company-details.html with the query parameters
    window.location.href = 'company-details.php' + queryParams;
});


            companyContainer.appendChild(companyLogoImg);

            companiesList.appendChild(companyContainer);
        });
    });
}



// Fetch companies when the page loads
window.addEventListener('load', function() {
    fetchCompanies();
});

    </script>

</body>
</html>
