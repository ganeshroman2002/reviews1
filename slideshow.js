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


              <div class="slideshow-container">
        <!-- Slides will be displayed here -->
    </div>

    <div style="text-align:center">
        <!-- Navigation dots will be displayed here -->
    </div>

        /* Style for the slideshow container */
    .slideshow-container {
        position: relative;
        margin: 0 auto;
    }

    /* Style for the individual slides */
    .mySlides {
        display: none;
    }

    /* Style for the slideshow images */
    .mySlides img {
    width: 100%;
    height: auto;
}

   

    /* Style for the individual navigation dots */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 5px;
        background-color: #bbb; /* Inactive dot color */
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.3s ease;
        cursor: pointer;
    }

    /* Style for the active dot */
    .dot.active {
        background-color: #555; /* Active dot color */
    }