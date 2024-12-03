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

  // Fetch categories from Firebase
function fetchCategories() {
  var categoryList = document.getElementById('categoryList');
  var categoriesRef = database.ref('categories');

  categoriesRef.on('value', function(snapshot) {
    categoryList.innerHTML = '';

    snapshot.forEach(function(childSnapshot) {
      var categoryKey = childSnapshot.key;
      var categoryName = childSnapshot.val().categoryName;
      var categoryImage = childSnapshot.val().categoryImage;

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

function addCategory() {
  var categoryName = document.getElementById('categoryName').value;
  var categoryImageInput = document.getElementById('categoryImage');
  var categoryImageFile = categoryImageInput.files[0];

  if (categoryName && categoryImageFile) {
    var newCategoryRef = database.ref('categories');
    var newCategoryKey = newCategoryRef.push().key;

    var storageRef = firebase.storage().ref();
    var imageRef = storageRef.child('category_images/' + newCategoryKey + '_' + categoryImageFile.name);

    imageRef.put(categoryImageFile).then(function(snapshot) {
      return snapshot.ref.getDownloadURL();
    }).then(function(downloadURL) {
      var categoryData = {
        categoryName: categoryName,
        categoryImage: downloadURL
      };

      return newCategoryRef.child(newCategoryKey).set(categoryData);
    }).then(function() {
      console.log('Category added successfully!');
      document.getElementById('categoryName').value = '';
      categoryImageInput.value = '';
      document.getElementById('category-image-preview').src = '';
      document.getElementById('category-image-preview').style.display = 'none';
    }).catch(function(error) {
      console.error('Error adding category:', error);
    });
  } else {
    console.error('Please provide category name and image.');
  }
}
// Fetch categories when the page loads
window.addEventListener('load', function() {
  fetchCategories();
});
  Category
  category