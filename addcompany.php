<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ProductReviewPro</title>
  <link rel="stylesheet" type="text/css" href="addcompany.css">
  <script type="text/javascript" src="script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Include the Firebase JavaScript SDK -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
  <!-- <script src="company.js"></script> -->
  <style>


/* Additional styling for payment form fields and button can be added here */

  </style>
</head>
<body>
<?php include 'assets/php/navbar.php' ?>


<div class="company-card" style="margin-top: 100px;">
  <form onsubmit="event.preventDefault(); addCompany();" enctype="multipart/form-data" id="company-form" class="company-form">
    <div class="left-section">
      <input type="file" id="companyImage" accept="image/*" required>
      <img id="image-preview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 400px; margin-top: 10px; display: none;">
    </div>
    <div class="right-section">
      <input type="text" id="companyName" placeholder="Enter company name" required>
      <input type="email" id="companyEmail" placeholder="Enter company email" required> <!-- Added email input field -->
      <textarea id="companyDescription" placeholder="Enter company description" required></textarea>
    </div>
    <button type="submit">Add Company</button>
  </form>
</div>


<!-- Payment Modal -->
<div id="paymentModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closePaymentModal()">&times;</span>
    <h2>Payment Information</h2>
    <!-- Add your payment form fields here, e.g., card number, expiration date, etc. -->
    <input type="text" id="cardNumber" placeholder="Card Number" required>
    <input type="text" id="expirationDate" placeholder="Expiration Date" required>
    <input type="text" id="cvv" placeholder="CVV" required>
    <!-- Add a submit button for payment -->
    <button onclick="processPayment()">Submit Payment</button>
  </div>
</div>
<script type="text/javascript">
  // Function to open the payment modal
function openPaymentModal() {
  var modal = document.getElementById("paymentModal");
  modal.style.display = "block";
}

// Function to close the payment modal
function closePaymentModal() {
  var modal = document.getElementById("paymentModal");
  modal.style.display = "none";
}

// Function to process payment (you can implement your payment processing logic here)
function processPayment() {
  // Add your payment processing logic here, e.g., validate card info, charge payment, etc.
  // Close the modal after successful payment
  closePaymentModal();
}

// Attach an event listener to the "Add Company" button to open the payment modal
document.getElementById("company-form").addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent form submission
  openPaymentModal(); // Open the payment modal
});

</script>


  <h1>Companies</h1>
  <div class="companies">
    <div class="scrollmenu" id="companyList">
      <!-- Company details will be dynamically added here -->
    </div>
  </div>
</div>
<a href="index.html" class="add-category-btn floating-btn">
  <i class="fa fa-home"></i>
</a>
<a href="#top" class="floating-btn2">
  <i class="fa fa-arrow-up"></i>
</a>
<?php include 'assets/php/footer.php' ?>

<script type="text/javascript">
  // Function to toggle responsive navigation
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

// Initialize Firebase
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

// Get a reference to the Firebase Realtime Database
var database = firebase.database();

// Function to add a new company to the Firebase database
function addCompany() {
    var companyName = document.getElementById('companyName').value;
    var companyDescription = document.getElementById('companyDescription').value;
    var companyEmail = document.getElementById('companyEmail').value; // Added email field
    var companyImageInput = document.getElementById('companyImage');
    var companyImageFile = companyImageInput.files[0];

    if (companyName && companyDescription && companyEmail && companyImageFile) {
        var newCompanyRef = database.ref('companies');
        var newCompanyKey = newCompanyRef.push().key;

        var storageRef = firebase.storage().ref();
        var imageRef = storageRef.child('images/' + newCompanyKey + '_' + companyImageFile.name);

        imageRef.put(companyImageFile).then(function(snapshot) {
            return snapshot.ref.getDownloadURL();
        }).then(function(downloadURL) {
            var companyData = {
                companyName: companyName,
                companyDescription: companyDescription,
                companyEmail: companyEmail, // Added email field
                companyImage: downloadURL
            };

            return newCompanyRef.child(newCompanyKey).set(companyData);
        }).then(function() {
            console.log('Company added successfully!');
            document.getElementById('companyName').value = '';
            document.getElementById('companyDescription').value = '';
            document.getElementById('companyEmail').value = ''; // Clear email field
            companyImageInput.value = '';
            document.getElementById('image-preview').src = '';
            document.getElementById('image-preview').style.display = 'none';
        }).catch(function(error) {
            console.error('Error adding company:', error);
        });
    } else {
        console.error('Please provide company name, description, email, and image.');
    }
}


  $('body').on('mouseenter mouseleave','.nav-item',function(e){
      if ($(window).width() > 750) {
        var _d=$(e.target).closest('.nav-item');_d.addClass('show');
        setTimeout(function(){
        _d[_d.is(':hover')?'addClass':'removeClass']('show');
        },1);
      }
  }); 
// Function to display image preview
function previewImage(event) {
  var imagePreview = document.getElementById('image-preview');
  var selectedImage = event.target.files[0];

  if (selectedImage) {
    imagePreview.style.display = 'block';
    imagePreview.src = URL.createObjectURL(selectedImage);
  } else {
    imagePreview.style.display = 'none';
    imagePreview.src = '';
  }
}

// Fetch companies from Firebase and populate the UI
function fetchCompanies() {
  var companyList = document.getElementById('companyList');
  var companiesRef = database.ref('companies');

  companiesRef.on('value', function(snapshot) {
    companyList.innerHTML = '';

    snapshot.forEach(function(childSnapshot) {
      var companyKey = childSnapshot.key;
      var companyName = childSnapshot.val().companyName;
      var companyImage = childSnapshot.val().companyImage;

      var companyContainer = document.createElement('div');
      companyContainer.className = 'company-container';

      var companyLogo = document.createElement('img');
      companyLogo.src = companyImage;
      companyLogo.alt = companyName + ' Logo';

      var companyHeading = document.createElement('h3');
      companyHeading.textContent = companyName;

      companyContainer.appendChild(companyLogo);
      companyContainer.appendChild(companyHeading);

      companyList.appendChild(companyContainer);
    });
  });
}

// Fetch companies when the page loads
window.addEventListener('load', function() {
  fetchCompanies();
});

// Attach event listener to companyImage input
document.getElementById('companyImage').addEventListener('change', previewImage);

</script>

</body>
</html>
  