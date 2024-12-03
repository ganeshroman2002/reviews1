<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - ProductReviewPro</title>
  <link rel="stylesheet" href="style.css"> <!-- Add your stylesheet link here -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<style type="text/css">
  /* Reset styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

/* Header styles */
header {
    background-color: #007BFF;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

header h1 {
    font-size: 2rem;
    margin-bottom: 10px;
}

nav ul {
    list-style-type: none;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
}

/* Section styles */
.about, .team, .contact {
    background-color: #fff;
    padding: 20px;
    margin: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.about h2, .team h2, .contact h2 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.about p, .team-member p, .contact p {
    font-size: 1rem;
    line-height: 1.4;
    color: #333;
}

.team-member {
    text-align: center;
    margin-top: 20px;
}

.team-member img {
    max-width: 100px;
    border-radius: 50%;
}

/* Footer styles */
footer {
    text-align: center;
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}

/* Responsive styles */
@media (max-width: 768px) {
    header h1 {
        font-size: 1.5rem;
    }

    nav ul li {
        margin-right: 10px;
    }

    .about, .team, .contact {
        margin: 10px;
    }
}

</style>
</head>
<body>
  <header>
    <h1>About Us</h1>
<?php include 'assets/php/navbar.php' ?>

  </header>

  <section class="about">
    <h2>Our Mission</h2>
    <p>
      Welcome to ProductReviewPro, your trusted source for unbiased product reviews. Our mission is to simplify your buying journey by offering comprehensive and honest reviews of a wide range of products and services. We aim to be your go-to source for reliable information, enabling you to choose the best products that suit your needs and preferences.
    </p>
  </section>

  <section class="team">
    <h2>Meet Our Team</h2>
    <div class="team-member">
      <img src="./assets/0012.jpg" alt="Team Member 1">
      <h3>Ganesh Anil Jadhav</h3>
      <p>Product Reviewer</p>
    </div>
    <div class="team-member">
      <img src="./assets/WhatsApp Image 2023-09-30 at 16.52.57.jpg" alt="Team Member 2">
      <h3>Vishvjit Vitthal Gore</h3>
      <p>Content Writer</p>
    </div>
    <!-- Add more team members as needed -->
  </section>

  <section class="contact">
    <h2>Contact Us</h2>
    <p>We value your feedback and inquiries. If you have any questions, suggestions, or collaboration opportunities, please feel free to reach out to us:</p>
    <ul>
      <li>Email: <a href="mailto:info@productreviewpro.com">info@productreviewpro.com</a></li>
      <li>Phone: +1 (123) 456-7890</li>
    </ul>
  </section>

  <footer>
<?php include 'assets/php/footer.php' ?>
  </footer>
</body>
</html>
