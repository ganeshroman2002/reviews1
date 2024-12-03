<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ProductReviewPro</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <script type="text/javascript" src="script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

  <!-- Include the Firebase JavaScript SDK -->
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
  <!-- <script src="company.js"></script> -->
  <style>
.container1 {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  text-align: center;
}

h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

form {
  text-align: left;
}

input[type="text"],
input[type="file"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

/* Styles for the image preview */
#image-preview {
  max-width: 100%;
  margin-top: 10px;
  display: none;
}

/* Styles for the "Add Category" button */
button[type="submit"] {
  background-color: #6c63ff;
  color: white;
  border: none;
  border-radius: 3px;
  padding: 10px 20px;
  cursor: pointer;
}

/* Hover effect for the button */
button[type="submit"]:hover {
  background-color: #554fd8;
}

img{
  max-width: 100px;
}
  </style>
}
</head>
<body>

<?php include 'assets/php/navbar.php' ?>


  <div class="container1" style="  margin-top: 100px;">
    <h1>Add Category</h1>
    <form onsubmit="event.preventDefault(); addCategory();" enctype="multipart/form-data" id="category-form">
      <input type="text" id="categoryName" placeholder="Enter category name" required>
      <input type="file" id="categoryImage" accept="image/*" required>
      <img id="image-preview" src="#" alt="Image Preview" style="max-width: 40%; margin-top: 10px; display: none;">
      <button type="submit">Add Category</button>
    </form>
    
    <h1>Categories</h1>
    <div class="categories">
      <div class="scrollmenu" id="categoryList">
        <!-- Category details will be dynamically added here -->
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
    // JavaScript code for adding categories
function addCategory() {
  var categoryName = document.getElementById('categoryName').value;
  var categoryImageInput = document.getElementById('categoryImage');
  var categoryImageFile = categoryImageInput.files[0];

  if (categoryName && categoryImageFile) {
    var categoriesRef = database.ref('categories');

    // Check if a category with the same name already exists
    categoriesRef.orderByChild('categoryName').equalTo(categoryName).once('value', function(snapshot) {
      if (snapshot.exists()) {
        console.log('Category with the same name already exists!');
        // You can display a message to the user here, for example:
        // alert('Category with the same name already exists!');
      } else {
        // Create a new category
        var newCategoryRef = database.ref('categories/' + categoryName);

        var storageRef = firebase.storage().ref();
        var imageRef = storageRef.child('images/' + categoryName + '_' + categoryImageFile.name);

        imageRef.put(categoryImageFile).then(function(snapshot) {
          return snapshot.ref.getDownloadURL();
        }).then(function(downloadURL) {
          var categoryData = {
            categoryName: categoryName,
            categoryImage: downloadURL
            categoryUID: categoryUID
          };

          return newCategoryRef.set(categoryData); // Set data at the new category's key
        }).then(function() {
          console.log('Category added successfully!');
          document.getElementById('categoryName').value = '';
          categoryImageInput.value = '';
          document.getElementById('image-preview').src = '';
          document.getElementById('image-preview').style.display = 'none';
        }).catch(function(error) {
          console.error('Error adding category:', error);
        });
      }
    });
  } else {
    console.error('Please provide category name and image.');
  }
}

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

    // Function to fetch categories from Firebase and populate the UI
    function fetchCategories() {
      var categoryList = document.getElementById('categoryList');
      var categoriesRef = database.ref('categories');

      categoriesRef.on('value', function(snapshot) {
        categoryList.innerHTML = '';

        snapshot.forEach(function(childSnapshot) {
          var categoryKey = childSnapshot.key;
          var categoryName = childSnapshot.val().categoryName;
          var categoryImage = childSnapshot.val().categoryImage;
          var categoryUID = childSnapshot.val().categoryUID;

          var categoryContainer = document.createElement('div');
          categoryContainer.className = 'category-container';

          var categoryLogo = document.createElement('img');
          categoryLogo.src = categoryImage;
          categoryLogo.alt = categoryName + ' Logo';

          var categoryHeading = document.createElement('h3');
          categoryHeading.textContent = categoryName;

          categoryContainer.appendChild(categoryLogo);
          categoryContainer.appendChild(categoryHeading);

          categoryList.appendChild(categoryContainer);
        });
      });
    }

    // Fetch categories when the page loads
    window.addEventListener('load', function() {
      fetchCategories();
    });

    // Attach event listener to categoryImage input
    document.getElementById('categoryImage').addEventListener('change', previewImage);
</script>

</body>
</html>
  