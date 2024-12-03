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
// Function to open related products page
// Add event listener to category cards
// document.addEventListener('DOMContentLoaded', function () {
//   var categoryList = document.getElementById('categoryList');

//   if (categoryList) {
//     categoryList.addEventListener('click', function (event) {
//       if (event.target.classList.contains('category-container')) {
//         var categoryId = event.target.getAttribute('data-category-id'); // Add this attribute to store the category ID
//         var categoryName = event.target.querySelector('h6').textContent;

//         // Open the "relatedreviews.html" page with the selected category ID and name as query parameters
//         window.location.href = 'relatedreviews.html?categoryId=' + encodeURIComponent(categoryId) + '&categoryName=' + encodeURIComponent(categoryName);
//       }
//     });
//   } else {
//     console.error('Category list element not found.');
//   }
// });

        // Reference the "categories" node in the database
        var categoriesRef = firebase.database().ref('categories');

        // Fetch and display categories
        function fetchCategories() {
            var categoryList = document.getElementById('categoryList');
            categoriesRef.on('value', function (snapshot) {
                categoryList.innerHTML = '';

                snapshot.forEach(function (childSnapshot) {
                    var categoryKey = childSnapshot.key;
                    var categoryName = childSnapshot.val().categoryName;
                    var categoryImage = childSnapshot.val().categoryImage;

                    var categoryContainer = document.createElement('div');
                    categoryContainer.className = 'category-container';

                    var categoryLogo = document.createElement('img');
                    categoryLogo.src = categoryImage;
                    categoryLogo.alt = categoryName + ' Logo';

                    var categoryHeading = document.createElement('h6');
                    categoryHeading.textContent = categoryName;

                    // Add a click event listener to each category container
                    categoryContainer.addEventListener('click', function () {
                        // Redirect to a new page with the selected category's name as a query parameter
                        window.location.href = 'reviews.php?category=' + encodeURIComponent(categoryName);
                    });

                    categoryContainer.appendChild(categoryLogo);
                    categoryContainer.appendChild(categoryHeading);

                    categoryList.appendChild(categoryContainer);
                });
            });
        }

        // Fetch categories when the page loads
        window.addEventListener('load', function () {
            fetchCategories();
        });


        firebase.initializeApp(firebaseConfig);
        const storageRef = firebase.storage().ref();
        const db = firebase.database();

        const slideshowContainer = document.querySelector(".slideshow-container");

        // Function to fetch and display images
        function fetchAndDisplayImages() {
            // Fetch images from Firebase Storage
            // Modify this part based on your Firebase Storage structure
            // For example, if images are stored in a "slides" folder, you can list the files in that folder.
            storageRef.child("slideimages").listAll().then((result) => {
                result.items.forEach((item, index) => {
                    // Get the download URL for each image
                    item.getDownloadURL().then((imageUrl) => {
                        // Create a slide for each image
                        const slide = document.createElement("div");
                        slide.className = "mySlides";
                        slide.innerHTML = `<img src="${imageUrl}" style="width:100%; height:400px;">`;
                        slideshowContainer.appendChild(slide);
                    });
                }); 

                // Display the first slide
                showSlides(1);
            }).catch((error) => {
                console.error("Error fetching images:", error);
            });
        }

        // Call the function to fetch and display images
        fetchAndDisplayImages();

        let slideIndex = 0; // Initialize the index to 0

        // Automatically advance to the next slide every 2 seconds (2000 milliseconds)
        setInterval(() => {
            showSlides(slideIndex + 1);
        }, 2000);

        // Function to display the slides
        function showSlides(n) {
            const slides = document.getElementsByClassName("mySlides");
            
            // Hide all slides
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            // Update the slide index, looping to the first slide if necessary
            slideIndex = n > slides.length ? 1 : (n < 1 ? slides.length : n);

            // Display the current slide
            slides[slideIndex - 1].style.display = "block";
        }

  // Get a reference to the Firebase Realtime Database
  var database = firebase.database();
// Function to open related products page
// Add event listener to category cards
// document.addEventListener('DOMContentLoaded', function () {
//   var categoryList = document.getElementById('categoryList');

//   if (categoryList) {
//     categoryList.addEventListener('click', function (event) {
//       if (event.target.classList.contains('category-container')) {
//         var categoryId = event.target.getAttribute('data-category-id'); // Add this attribute to store the category ID
//         var categoryName = event.target.querySelector('h6').textContent;

//         // Open the "relatedreviews.html" page with the selected category ID and name as query parameters
//         window.location.href = 'relatedreviews.html?categoryId=' + encodeURIComponent(categoryId) + '&categoryName=' + encodeURIComponent(categoryName);
//       }
//     });
//   } else {
//     console.error('Category list element not found.');
//   }
// });


(function($) { "use strict";

	// $(function() {
	// 	var header = $(".start-style");
	// 	$(window).scroll(function() {    
	// 		var scroll = $(window).scrollTop();
		
	// 		if (scroll >= 10) {
	// 			header.removeClass('start-style').addClass("scroll-on");
	// 		} else {
	// 			header.removeClass("scroll-on").addClass('start-style');
	// 		}
	// 	});
	// });		
		
	//Animation
	
	// $(document).ready(function() {
	// 	$('body.hero-anime').removeClass('hero-anime');
	// });

	//Menu On Hover
		
	$('body').on('mouseenter mouseleave','.nav-item',function(e){
			if ($(window).width() > 750) {
				var _d=$(e.target).closest('.nav-item');_d.addClass('show');
				setTimeout(function(){
				_d[_d.is(':hover')?'addClass':'removeClass']('show');
				},1);
			}
	});	
	
	//Switch light/dark
	
	// $("#switch").on('click', function () {
	// 	if ($("body").hasClass("dark")) {
	// 		$("body").removeClass("dark");
	// 		$("#switch").removeClass("switched");
	// 	}
	// 	else {
	// 		$("body").addClass("dark");
	// 		$("#switch").addClass("switched");
	// 	}
	// });  
	
  })(jQuery);

  