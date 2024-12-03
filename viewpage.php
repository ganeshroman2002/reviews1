<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Review Details</title>
    <script src="https://www.gstatic.com/firebasejs/8.7.0/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="./reviews.js"></script>
  <script src="./reviewdatabase.js"></script>
  <style type="text/css">
        body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f7f7f7;
    }

    h1 {
      text-align: center;
      margin: 20px 0;
    }

    #reviewDetails {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      margin-top: 0;
    }

    p {
      margin: 10px 0;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    a {
      color: #007bff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <?php include 'assets/php/navbar.php' ?>

  <h1>Review Details</h1>
  <div id="reviewDetails">
    <!-- Details will be dynamically populated here -->
  </div>
<?php include 'assets/php/footer.php' ?>

  <script>

    // Retrieve the selected review data from sessionStorage
    var selectedReview = JSON.parse(sessionStorage.getItem('selectedReview'));

    // Populate the page elements with review data
    var reviewDetailsDiv = document.getElementById('reviewDetails');
    reviewDetailsDiv.innerHTML = `
      <h2>Title: ${selectedReview.name}</h2>
      <p>Description: ${selectedReview.info}</p>
      <p>Category: ${selectedReview.category}</p>
      <p>Rating: ${selectedReview.rating}</p>
<p><a href="${selectedReview.link}" target="_blank">View Product</a></p>
    `;

    // Clear the selectedReview data from sessionStorage (optional)
    sessionStorage.removeItem('selectedReview');

    // Fetch and display the image for the selected review
    var cardImage = document.createElement('img');
    cardImage.classList.add('card-image');

    // Get the download URL of the image from Firebase Storage
    var storageRef = firebase.storage().ref('images/' + selectedReview.image); // Use selectedReview.image
    storageRef.getDownloadURL().then(function(downloadURL) {
      cardImage.src = downloadURL; // Set the image src once the download URL is retrieved
    }).catch(function(error) {
      console.error('Error getting image URL:', error);
      cardImage.src = 'default-image.jpg'; // Use a default image in case of an error
    });

    // Append the image element to the reviewDetailsDiv
    reviewDetailsDiv.appendChild(cardImage);
  </script>
</body>
</html>
