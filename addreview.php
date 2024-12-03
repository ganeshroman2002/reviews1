<!DOCTYPE html>
<html>
<head>
  <title>Firebase Login and Registration</title>
  <!-- Include Firebase SDK -->
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

<link rel="stylesheet" type="text/css" href="addreviev.css">

  <style>
    /* Styles for the container */
.container1 {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style for the form */
#review-form {
    margin: 0;
}

/* Style for the step progress bar */
.step-progress {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.progress-bar {
    flex: 1;
    height: 10px;
    background-color: #ccc;
    border-radius: 5px;
}

/* Style for the cards */
.card {
    background-color: #f9f9f9;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 20px;
}

/* Style for labels */
label {
    font-weight: bold;
}

/* Style for input fields */
input[type="text"],
input[type="url"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Style for the rating containers */
.rating-container {
    margin-top: 20px;
}

/* Style for radio buttons and labels within rating containers */
.rating-input {
    display: flex;
    align-items: center;
}

.rating-input input[type="radio"] {
    margin-right: 5px;
}

/* Style for the average rating section */
.average-rating {
    margin-top: 20px;
    font-weight: bold;
}

.average-rating-value {
    color: #6c63ff;
    font-size: 20px;
}

/* Style for buttons */
button[type="button"],
button[type="submit"] {
    background-color: #6c63ff;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 10px 20px;
    margin-right: 10px;
    cursor: pointer;
    font-weight: bold;
}

button[type="button"]:last-child {
    margin-right: 0;
}
/* Star Rating Styles */
/* Star Rating Styles */
.rating-container {
  display: flex;
  align-items: center;
    justify-content: space-between;

}
.rating-container-lefts{
  float: right;
}
.rating-container label {
  margin-right: 5px; /* Adjust the spacing between label and stars */
}

.rating-input {
  display: flex;
  align-items: center;
}
.rating-input-Packaging-and-Unboxing {
  display: flex;
  align-items: center;
}
.rating-input-Performance-and-Functionality {
  display: flex;
  align-items: center;
}
.rating-input-Design-and-Build-Quality {
  display: flex;
  align-items: center;
}
.rating-input-User-Experience {
  display: flex;
  align-items: center;
}
.rating-input-Price-and-Value-for-Money {
  display: flex;
  align-items: center;
}
.rating-input-Customer-Support-and-Warranty {
  display: flex;
  align-items: center;
}

.rating-input input[type="radio"] {
  display: none;
}
.rating-input-Packaging-and-Unboxing input[type="radio"] {
  display: none;
}
.rating-input-Performance-and-Functionality input[type="radio"] {
  display: none;
}
.rating-input-Design-and-Build-Quality input[type="radio"] {
  display: none;
}
.rating-input-User-Experience input[type="radio"] {
  display: none;
}
.rating-input-Price-and-Value-for-Money input[type="radio"] {
  display: none;
}
.rating-input-Customer-Support-and-Warranty input[type="radio"] {
  display: none;
}

.rating-input label {
  cursor: pointer;
  font-size: 24px; /* Adjust the font size as needed */
  margin-right: 5px; /* Adjust the spacing between stars */
  position: relative; /* Add position relative for pseudo-elements */
}
.rating-input-Packaging-and-Unboxing label {
  cursor: pointer;
  font-size: 24px; /* Adjust the font size as needed */
  margin-right: 5px; /* Adjust the spacing between stars */
  position: relative; /* Add position relative for pseudo-elements */
}
.rating-input-Performance-and-Functionality label {
  cursor: pointer;
  font-size: 24px; /* Adjust the font size as needed */
  margin-right: 5px; /* Adjust the spacing between stars */
  position: relative; /* Add position relative for pseudo-elements */
}
.rating-input-Design-and-Build-Quality label {
  cursor: pointer;
  font-size: 24px; /* Adjust the font size as needed */
  margin-right: 5px; /* Adjust the spacing between stars */
  position: relative; /* Add position relative for pseudo-elements */
}
.rating-input-User-Experience label {
  cursor: pointer;
  font-size: 24px; /* Adjust the font size as needed */
  margin-right: 5px; /* Adjust the spacing between stars */
  position: relative; /* Add position relative for pseudo-elements */
}
.rating-input-Price-and-Value-for-Money label {
  cursor: pointer;
  font-size: 24px; /* Adjust the font size as needed */
  margin-right: 5px; /* Adjust the spacing between stars */
  position: relative; /* Add position relative for pseudo-elements */
}
.rating-input-Customer-Support-and-Warranty label {
  cursor: pointer;
  font-size: 24px; /* Adjust the font size as needed */
  margin-right: 5px; /* Adjust the spacing between stars */
  position: relative; /* Add position relative for pseudo-elements */
}

.rating-input label:before {
  content: '\2605'; /* Filled star */
}
.rating-input-Packaging-and-Unboxing label:before {
  content: '\2605'; /* Filled star */
}
.rating-input-Performance-and-Functionality label:before {
  content: '\2605'; /* Filled star */
}
.rating-input-Design-and-Build-Quality label:before {
  content: '\2605'; /* Filled star */
}
.rating-input-User-Experience label:before {
  content: '\2605'; /* Filled star */
}
.rating-input-Price-and-Value-for-Money label:before {
  content: '\2605'; /* Filled star */
}
.rating-input-Customer-Support-and-Warranty label:before {
  content: '\2605'; /* Filled star */
}


.rating-input label:after {
  content: '\2606'; /* Empty star */
  position: absolute;
  top: 0;
  left: 0;
/*  color: #ccc; /* Change the color of the empty star (use any color you prefer) */*/
}
.rating-input-Packaging-and-Unboxing label:after {
  content: '\2606'; /* Empty star */
  position: absolute;
  top: 0;
  left: 0;
/*  color: #ccc; /* Change the color of the empty star (use any color you prefer) */*/
}
.rating-input-Performance-and-Functionality label:after {
  content: '\2606'; /* Empty star */
  position: absolute;
  top: 0;
  left: 0;
/*  color: #ccc; /* Change the color of the empty star (use any color you prefer) */*/
}
.rating-input-Design-and-Build-Quality label:after {
  content: '\2606'; /* Empty star */
  position: absolute;
  top: 0;
  left: 0;
/*  color: #ccc; /* Change the color of the empty star (use any color you prefer) */*/
}
.rating-input-User-Experience label:after {
  content: '\2606'; /* Empty star */
  position: absolute;
  top: 0;
  left: 0;
/*  color: #ccc; /* Change the color of the empty star (use any color you prefer) */*/
}
.rating-input-Price-and-Value-for-Money label:after {
  content: '\2606'; /* Empty star */
  position: absolute;
  top: 0;
  left: 0;
/*  color: #ccc; /* Change the color of the empty star (use any color you prefer) */*/
}
.rating-input-Customer-Support-and-Warranty label:after {
  content: '\2606'; /* Empty star */
  position: absolute;
  top: 0;
  left: 0;
/*  color: #ccc; /* Change the color of the empty star (use any color you prefer) */*/
}

.rating-input input[type="radio"]:checked ~ label:after {
  content: '\2605'; /* Filled star */
  color: gold; /* Change the color of the filled star (use any color you prefer) */
}
  .rating-input-Packaging-and-Unboxing input[type="radio"]:checked ~ label:after {
    content: '\2605'; /* Filled star */
    color: gold; /* Change the color of the filled star (use any color you prefer) */
  }
  .rating-input-Performance-and-Functionality input[type="radio"]:checked ~ label:after {
    content: '\2605'; /* Filled star */
    color: gold; /* Change the color of the filled star (use any color you prefer) */
  }
  .rating-input-Design-and-Build-Quality input[type="radio"]:checked ~ label:after {
    content: '\2605'; /* Filled star */
    color: gold; /* Change the color of the filled star (use any color you prefer) */
  }
  .rating-input-User-Experience input[type="radio"]:checked ~ label:after {
    content: '\2605'; /* Filled star */
    color: gold; /* Change the color of the filled star (use any color you prefer) */
  }
  .rating-input-Price-and-Value-for-Money input[type="radio"]:checked ~ label:after {
    content: '\2605'; /* Filled star */
    color: gold; /* Change the color of the filled star (use any color you prefer) */
  }
  .rating-input-Customer-Support-and-Warranty input[type="radio"]:checked ~ label:after {
    content: '\2605'; /* Filled star */
    color: gold; /* Change the color of the filled star (use any color you prefer) */
  }

.step-progress {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  margin-bottom: 20px;
}

.progress-bar {
  height: 10px;
  width: 0;
  background-color: #6c1fb3;
  transition: width 0.3s ease-in-out;
}

  </style>

</head>
<body>


<?php include 'assets/php/navbar.php' ?>



<div class="container1" style="  margin-top: 100px;">
  <h1>Write Review</h1>
  <form onsubmit="event.preventDefault(); register();" enctype="multipart/form-data" id="review-form">
    <!-- Card 1: Information -->
    <!-- Step progress bar -->
      <div class="step-progress">
        <div class="progress-bar" id="progress-bar"></div>
      </div>

    <div id="card1" class="card">
      <label>Name:</label>
      <input type="text" id="register-name" required>
      <label>Information:</label>
      <input type="text" id="register-info" required>
      <label>Category:</label>
      <select id="category-select" required>
        <option value="">Select category</option>
      </select>
            <select id="category-company" required>
        <option value="">Select company</option>
      </select>
      <label>Link:</label>
      <input type="url" id="register-link" required>
      <button type="button" onclick="showCard('card2', 2)">Next</button>
    </div>


    <!-- Card 2: Image -->
    <div id="card2" class="card" style="display: none;">
      <label>Image:</label>
      <input type="file" id="register-image" accept="image/*" onchange="previewImage(event)" required>
      <img id="image-preview" src="#" alt="Image Preview" style="max-width: 40%; margin-top: 10px; display: none;">
      <button type="button" onclick="showCard('card1', 1)">Previous</button>
      <button type="button" onclick="showCard('card3', 3)">Next</button>
    </div>



    <div id="card3" class="card" style="display: none;">

<div id="review1" class="rating-container">
<label class="labelname">Rating:</label>
  <div class="rating-input">
  <input type="radio" name="rating" value="5" id="star5" required />
  <label for="star5">5 stars</label>
  <input type="radio" name="rating" value="4" id="star4" />
  <label for="star4">4 stars</label>
  <input type="radio" name="rating" value="3" id="star3" />
  <label for="star3">3 stars</label>
  <input type="radio" name="rating" value="2" id="star2" />
  <label for="star2">2 stars</label>
  <input type="radio" name="rating" value="1" id="star1" />
  <label for="star1">1 star</label>
  </div>
</div>

<div id="review2" class="rating-container">
<label class="labelname1">Packaging and Unboxing:</label>
  <div class="rating-input-Packaging-and-Unboxing">
  <input type="radio" name="rating1" value="5" id="star5-1" required />
  <label for="star5-1">5 stars</label>
  <input type="radio" name="rating1" value="4" id="star4-1" />
  <label for="star4-1">4 stars</label>
  <input type="radio" name="rating1" value="3" id="star3-1" />
  <label for="star3-1">3 stars</label>
  <input type="radio" name="rating1" value="2" id="star2-1" />
  <label for="star2-1">2 stars</label>
  <input type="radio" name="rating1" value="1" id="star1-1" />
  <label for="star1-1">1 star</label>
  </div>
</div>

<div id="review3" class="rating-container">
<label class="labelname2">Performance and Functionality:</label>
  <div class="rating-input-Performance-and-Functionality">
  <input type="radio" name="rating2" value="5" id="star5-2" required />
  <label for="star5-2">5 stars</label>
  <input type="radio" name="rating2" value="4" id="star4-2" />
  <label for="star4-2">4 stars</label>
  <input type="radio" name="rating2" value="3" id="star3-2" />
  <label for="star3-2">3 stars</label>
  <input type="radio" name="rating2" value="2" id="star2-2" />
  <label for="star2-2">2 stars</label>
  <input type="radio" name="rating2" value="1" id="star1-2" />
  <label for="star1-2">1 star</label>
  </div>
</div>

<div id="review4" class="rating-container">
<label class="labelname3">Design and Build Quality:</label>
  <div class="rating-input-Design-and-Build-Quality">
  <input type="radio" name="rating3" value="5" id="star5-3" required />
  <label for="star5-3">5 stars</label>
  <input type="radio" name="rating3" value="4" id="star4-3" />
  <label for="star4-3">4 stars</label>
  <input type="radio" name="rating3" value="3" id="star3-3" />
  <label for="star3-3">3 stars</label>
  <input type="radio" name="rating3" value="2" id="star2-3" />
  <label for="star2-3">2 stars</label>
  <input type="radio" name="rating3" value="1" id="star1-3" />
  <label for="star1-3">1 star</label>
  </div>
</div>

<div id="review5" class="rating-container">
<label class="labelname4">User Experience:</label>
  <div class="rating-input-User-Experience">
  <input type="radio" name="rating4" value="5" id="star5-4" required />
  <label for="star5-4">5 stars</label>
  <input type="radio" name="rating4" value="4" id="star4-4" />
  <label for="star4-4">4 stars</label>
  <input type="radio" name="rating4" value="3" id="star3-4" />
  <label for="star3-4">3 stars</label>
  <input type="radio" name="rating4" value="2" id="star2-4" />
  <label for="star2-4">2 stars</label>
  <input type="radio" name="rating4" value="1" id="star1-4" />
  <label for="star1-4">1 star</label>
</div>
</div>

<div id="review6" class="rating-container">
<label class="labelname5">Price and Value for Money:</label>
  <div class="rating-input-Price-and-Value-for-Money">
  <input type="radio" name="rating5" value="5" id="star5-5" required />
  <label for="star5-5">5 stars</label>
  <input type="radio" name="rating5" value="4" id="star4-5" />
  <label for="star4-5">4 stars</label>
  <input type="radio" name="rating5" value="3" id="star3-5" />
  <label for="star3-5">3 stars</label>
  <input type="radio" name="rating5" value="2" id="star2-5" />
  <label for="star2-5">2 stars</label>
  <input type="radio" name="rating5" value="1" id="star1-5" />
  <label for="star1-5">1 star</label>
  </div>
</div>

<div id="review7" class="rating-container">
<label class="labelname6">Customer Support and Warranty:</label>
  <div class="rating-input-Customer-Support-and-Warranty">
  <input type="radio" name="rating6" value="5" id="star5-6" required />
  <label for="star5-6">5 stars</label>
  <input type="radio" name="rating6" value="4" id="star4-6" />
  <label for="star4-6">4 stars</label>
  <input type="radio" name="rating6" value="3" id="star3-6" />
  <label for="star3-6">3 stars</label>
  <input type="radio" name="rating6" value="2" id="star2-6" />
  <label for="star2-6">2 stars</label>
  <input type="radio" name="rating6" value="1" id="star1-6" />
  <label for="star1-6">1 star</label>
  </div>
</div>

<div id="average-rating-overall" class="average-rating">
    <span>Overall Average Rating: </span>
    <span class="average-rating-value">0</span>
</div>


<!-- ... existing code ... -->



      <button type="button" onclick="showCard('card2', 2)">Previous</button>

    <button type="submit">Submit</button>
  </form>
</div>
    </div>
<?php include 'assets/php/footer.php' ?>

  <script>

  let currentStep = 1;
  const progressBar = document.getElementById('progress-bar');

  function showCard(cardId, step) {
    // Hide all cards
    document.getElementById('card1').style.display = 'none';
    document.getElementById('card2').style.display = 'none';
    document.getElementById('card3').style.display = 'none';

    // Show the selected card
    document.getElementById(cardId).style.display = 'block';

    // Update current step and progress bar width
    currentStep = step;
    updateProgressBar(currentStep);
  }


  function updateProgressBar(step) {
    const totalSteps = 3; // Total number of steps
    const width = ((step - 1) / (totalSteps - 1)) * 100;
    progressBar.style.width = `${width}%`;
  }

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

// Function to fetch category names from Firebase
function fetchCategories() {
  var categoriesRef = firebase.database().ref('categories');
  var categorySelect = document.getElementById('category-select'); // Replace with your actual select element ID

  categoriesRef.once('value', function(snapshot) {
    var categories = snapshot.val();
    for (var categoryId in categories) {
      var categoryOption = document.createElement('option');
      categoryOption.value = categoryId;
      categoryOption.textContent = categories[categoryId].categoryName;
      categorySelect.appendChild(categoryOption);
    }
  });
}

// Call the fetchCategories function when the page is loaded
window.addEventListener('load', function() {
  fetchCategories();
});

    var companiesRef = firebase.database().ref('companies');
var companySelect = document.getElementById('category-company');

companiesRef.once('value', function(snapshot) {
  var companies = snapshot.val();
  for (var companyId in companies) {
    var companyOption = document.createElement('option');
    companyOption.value = companyId;
    companyOption.textContent = companies[companyId].companyName;
    companySelect.appendChild(companyOption);
  }
});

    // Register function to handle form submission
    function register() {
      var submitButton = document.querySelector('button[type="submit"]');
      submitButton.disabled = true; // Disable the submit button to prevent multiple submissions
      submitButton.textContent = 'Submitting...'; // Update the button text to indicate submission is in progress

      var nameInput = document.getElementById('register-name');
      var infoInput = document.getElementById('register-info');
      var categoryInput = document.getElementById('category-select');
      var companyInput = document.getElementById('category-company');
      var imageInput = document.getElementById('register-image');
      var ratingInput = document.querySelector('input[name="rating"]:checked');
      var ratingInput1 = document.querySelector('input[name="rating1"]:checked');
      var ratingInput2 = document.querySelector('input[name="rating2"]:checked');
      var ratingInput3 = document.querySelector('input[name="rating3"]:checked');
      var ratingInput4 = document.querySelector('input[name="rating4"]:checked');
      var ratingInput5 = document.querySelector('input[name="rating5"]:checked');
      var ratingInput6 = document.querySelector('input[name="rating6"]:checked');
      var linkInput = document.getElementById('register-link');

      var rating = ratingInput ? ratingInput.value : '';
      var rating1 = ratingInput1 ? ratingInput1.value : '';
      var rating2 = ratingInput2 ? ratingInput2.value : '';
      var rating3 = ratingInput3 ? ratingInput3.value : '';
      var rating4 = ratingInput4 ? ratingInput4.value : '';
      var rating5 = ratingInput5 ? ratingInput5.value : '';
      var rating6 = ratingInput6 ? ratingInput6.value : '';
      var name = nameInput.value;
      var info = infoInput.value;
      var categoryId = categoryInput.value;
      var categoryName = categoryInput.options[categoryInput.selectedIndex].text;
      var companyId = categoryInput.value;
      var companyName = companyInput.options[companyInput.selectedIndex].text;

      var imageFile = imageInput.files[0];
      var imageName = Date.now() + '_' + imageFile.name;
      var storageRef = firebase.storage().ref('images/' + imageName);
      var uploadTask = storageRef.put(imageFile);
var companyUID = companyInput.value; // This will get the value (company UID) of the selected option

      // Perform registration logic or save the data to Firebase
      // Example code to save the data to Firebase Realtime Database
      var userData = {
        name: name,
        info: info,
        category: categoryName,
        company: companyName,
        companyUID: companyUID,
        link: linkInput.value,
        rating: rating,
        rating1: rating1,
        rating2: rating2,
        rating3: rating3,
        rating4: rating4,
        rating5: rating5,
        rating6: rating6,
        image: imageName // Save the image filename to the userData object
      };

      var usersRef = firebase.database().ref('reviews');
      var newReviewRef = usersRef.push(userData); // This will generate a unique review UID
      firebase.database().ref('categoriesreviews/' + categoryId + '/reviews/' + newReviewRef.key).set(true);
      firebase.database().ref('companiesreviews/' + companyId + '/reviews/' + newReviewRef.key).set(true);

      // Upload the image file to Firebase Storage
      uploadTask.on(
        'state_changed',
        function(snapshot) {
          // This function is called during the upload process (optional)
          // You can use this to show the upload progress, if desired
          var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
          console.log('Upload is ' + progress + '% done');
        },
        function(error) {
          // Handle errors during the upload process
          console.error('Error uploading image:', error);
          submitButton.disabled = false; // Enable the submit button again
          submitButton.textContent = 'Submit'; // Reset the button text
        },
        function() {
          // The upload is complete, get the download URL of the image
          uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
            // Update the userData object with the image URL
            userData.image = downloadURL;

            // Save the data to Firebase Realtime Database with the updated image URL
            usersRef.child(userData.key).set(userData);

            // Reset the form after successful registration
            document.getElementById('review-form').reset();

            // Show a success message to the user
            alert('Review submitted successfully!');

            // Enable the submit button again
            submitButton.disabled = false;
            submitButton.textContent = 'Submit';

            console.log('Data saved to the database successfully!');
          });
        }
      );
    }
    function addReviewToFirebase(reviewData) {
      // Get a reference to the database
      const database = firebase.database();

      // Set the data in the database
      database.ref("reviews").push(reviewData)
        .then(() => {
          console.log("Review data added successfully!");
        })
        .catch((error) => {
          console.error("Error adding review data:", error);
        });
    }

    // Function to get the selected rating from a rating container
    function getSelectedRating(containerId) {
      const container = document.querySelector(`#${containerId}`);
      const selectedRating = container.querySelector("input[name='rating']:checked").value;
      return selectedRating;
    }


    // Event listener for the form submission
    // Event listener for the form submission
document.addEventListener("submit", function(event) {
  event.preventDefault();

  // Get the selected ratings for each review category
  const packagingRating = getSelectedRating("review1");
  const performanceRating = getSelectedRating("review2");
  const designRating = getSelectedRating("review3");
  const userExperienceRating = getSelectedRating("review4");
  const priceRating = getSelectedRating("review5");
  const customerSupportRating = getSelectedRating("review6");

  // Create objects to hold the review data for each category
  const packagingReview = {
    category: "Packaging and Unboxing",
    rating: packagingRating,
    // Include other form fields related to this category here
  };

  const performanceReview = {
    category: "Performance and Functionality",
    rating: performanceRating,
    // Include other form fields related to this category here
  };

  const designReview = {
    category: "Design and Build Quality",
    rating: designRating,
    // Include other form fields related to this category here
  };

  const userExperienceReview = {
    category: "User Experience",
    rating: userExperienceRating,
    // Include other form fields related to this category here
  };

  const priceReview = {
    category: "Price and Value for Money",
    rating: priceRating,
    // Include other form fields related to this category here
  };

  const customerSupportReview = {
    category: "Customer Support and Warranty",
    rating: customerSupportRating,
    // Include other form fields related to this category here
  };

  // Add each category's review data to Firebase
  addReviewToFirebase(packagingReview);
  addReviewToFirebase(performanceReview);
  addReviewToFirebase(designReview);
  addReviewToFirebase(userExperienceReview);
  addReviewToFirebase(priceReview);
  addReviewToFirebase(customerSupportReview);

  // Show a success message to the user
  alert('Reviews submitted successfully!');
});


// ... Your existing code ...

// Calculate overall average rating
function calculateOverallAverageRating() {
    const totalCategories = 6; // Total number of categories
    let totalRating = 0;

    for (let i = 1; i <= totalCategories; i++) {
        const categoryContainer = document.querySelector(`#review${i}`);
        const selectedRatingInput = categoryContainer.querySelector(`input[name="rating${i}"]:checked`);
        
        if (selectedRatingInput) {
            totalRating += parseFloat(selectedRatingInput.value);
        }
    }

    if (totalCategories > 0) {
        return totalRating / totalCategories;
    }

    return 0;
}

// Update the overall average rating display in real-time
function updateOverallAverageRatingDisplay() {
    const overallAverageRating = calculateOverallAverageRating();
    const overallAverageRatingDisplay = document.querySelector('#average-rating-overall .average-rating-value');
    overallAverageRatingDisplay.textContent = overallAverageRating.toFixed(2); // Display with two decimal places
}

// Attach change event listeners to all rating inputs
const allRatingInputs = document.querySelectorAll('input[type="radio"][name^="rating"]');
allRatingInputs.forEach(input => {
    input.addEventListener('change', updateOverallAverageRatingDisplay);
});

// Initialize the overall average rating display on page load
updateOverallAverageRatingDisplay();

// ... Your existing code ...


  </script>
</body>
</html> 