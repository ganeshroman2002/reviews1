<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ProductReviewPro</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
  <script src="script.js"></script>
  <script src="database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>
<style type="text/css">
/* Reset styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

/* Style for the card container */
#cardContainer {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
}

/* Style for individual review cards */

.card {
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 300px;
    padding: 20px;
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    cursor: pointer;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.card-content {
    padding: 10px;
}

.card-title {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.card-description {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 10px;
}

.card-category {
    font-size: 0.8rem;
    color: #999;
}

.card-company {
    font-size: 0.8rem;
    color: #999;
}

.card-rating {
    margin-top: 10px;
    font-size: 1rem;
}

.card-link {
    margin-top: 10px;
    font-size: 0.9rem;
    color: #007BFF;
}

.card-image {
    max-width: 100%;
    height: auto;
    margin-top: 10px;
}
</style>
</head>
<body>



<?php include 'assets/php/navbar.php' ?>


<div class="carda">
<div class="card-container" id="cardContainer" data-review-key="${childSnapshot.key}">
</div>
</div>
<?php include 'assets/php/footer.php' ?>

<script>
card.addEventListener('click', function() {
  var reviewId = childSnapshot.key;
  var clickedReview = reviewData; // Use the appropriate review data here

  // Store the clicked review in sessionStorage
  sessionStorage.setItem('selectedReview', JSON.stringify(clickedReview));

  // Redirect to the detail page
  window.location.href = 'viewpage.html';
});

const searchInput = document.getElementById("searchInput");
const searchResults = document.getElementById("searchResults");

searchInput.addEventListener("input", function () {
    const query = searchInput.value.toLowerCase();

    // Clear previous search results
    searchResults.innerHTML = "";

    // Query the Firebase Realtime Database
    database.ref("your_database_path").orderByChild("property_to_search")
        .startAt(query)
        .endAt(query + "\uf8ff")
        .once("value")
        .then(snapshot => {
            snapshot.forEach(childSnapshot => {
                const data = childSnapshot.val();
                // Display search results in the searchResults container
                const resultItem = document.createElement("div");
                resultItem.textContent = data.property_to_display;
                searchResults.appendChild(resultItem);
            });
        })
        .catch(error => {
            console.error("Error searching Firebase:", error);
        });
});

</script>

  <style>
    /* Add CSS for the star rating display */
    .star {
      font-size: 20px;
      color: gold;
    }
    .active {
      color: gold;
    }
  </style>
</body>
</html>