<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <form id="image-form">
        <input type="file" id="image-upload" accept="image/*" required>
        <button type="submit">Upload Image</button>
    </form>
    <script src="https://www.gstatic.com/firebasejs/8.7.0/firebase.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>

    <script>
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

        const imageForm = document.getElementById("image-form");
        const imageUploadInput = document.getElementById("image-upload");

        imageForm.addEventListener("submit", async (e) => {
            e.preventDefault();

            const file = imageUploadInput.files[0];

            if (!file) {
                alert("Please select an image to upload.");
                return;
            }

            try {
                // Upload the image to Firebase Storage
                const imageRef = storageRef.child(`slideimages/${file.name}`);
                await imageRef.put(file);
                const imageUrl = await imageRef.getDownloadURL();

                // Add the image URL to Firebase Database
                const newImageRef = db.ref("images").push();
                newImageRef.set({
                    imageUrl: imageUrl,
                    timestamp: firebase.database.ServerValue.TIMESTAMP,
                });

                alert("Image uploaded successfully.");
                imageUploadInput.value = ""; // Clear the file input
            } catch (error) {
                console.error("Error uploading image:", error);
                alert("An error occurred while uploading the image.");
            }
        });
    </script>
</body>
</html>
