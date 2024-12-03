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


function addCategory() {
  var categoryName = document.getElementById('categoryName').value;

  // Reference the "categories" node and generate a new unique key
  var newCategoryRef = database.ref('categories');
  
  // Query the categories to check if the category already exists
  newCategoryRef.orderByChild('categoriesname').equalTo(categoryName).once('value', function(snapshot) {
    if (snapshot.exists()) {
      console.log('Category already exists!');
      return;
    }

    var newCategoryKey = newCategoryRef.push().key;

    // Create a category object with the name
    var categoryData = {
      categoriesname: categoryName
    };

    // Set the category data at the new category key in the database
    newCategoryRef.child(newCategoryKey).set(categoryData)
      .then(function() {
        console.log('Category added successfully!');
      })
      .catch(function(error) {
        console.error('Error adding category:', error);
      });

    // Clear the input field
    document.getElementById('categoryName').value = '';
  });
}

// Fetch categories when the page loads
window.addEventListener('load', function() {
  fetchCategories();
});
