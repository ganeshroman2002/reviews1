    // The same script as before, no changes needed

    // Reference the "reviews" node in the database
    var reviewsRef = firebase.database().ref('reviews');

    // Fetch and display reviews as cards
reviewsRef.once('value', function(snapshot) {
  var cardContainer = document.getElementById('cardContainer');

  snapshot.forEach(function(childSnapshot) {
    var reviewData = childSnapshot.val();
    var reviewId = childSnapshot.key;

    var card = document.createElement('div');
    card.classList.add('card');
    card.id = 'card_' + reviewId;

        var card = document.createElement('div');
        card.classList.add('card');

        var cardContent = document.createElement('div');
        cardContent.classList.add('card-content');

        // var cardId = document.createElement('div');
        // cardId.classList.add('card-id');
        // cardId.textContent = "Card ID: " + reviewId;

        var cardTitle = document.createElement('div');
        cardTitle.classList.add('card-title');
        cardTitle.textContent = "Title: " + reviewData.name;

        var cardDescription = document.createElement('div');
        cardDescription.classList.add('card-description');
        cardDescription.textContent = "Description: " + reviewData.info;

        var cardCategory = document.createElement('div');
        cardCategory.classList.add('card-category');
        cardCategory.textContent = "Category: " + reviewData.category;

                var cardcompany = document.createElement('div');
        cardcompany.classList.add('card-company');
        cardcompany.textContent = "Company: " + reviewData.company;


        var cardRating = document.createElement('div');
        cardRating.classList.add('card-rating');
        cardRating.innerHTML = "Rating: " + displayStars(reviewData.rating);

        var cardLink = document.createElement('div');
        cardLink.classList.add('card-link');
        cardLink.innerHTML = "Link: <a href='" + reviewData.link + "'>" + reviewData.link + "</a>";

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
        cardContent.appendChild(cardcompany);
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


    // Function to display stars based on the rating
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
