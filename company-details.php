<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Details</title>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Add your CSS stylesheets or links here if needed -->
</head>
<body>
    <?php include 'assets/php/navbar.php' ?>

    <header>
        <h1>Company Details</h1>
    </header>
    <main>
        <!-- Add your company details here -->
        <div class="company-info" style="margin-top: 100px;">
            <h2>Company Name</h2>
            <p>Company Description</p>
            <img src="company-logo.jpg" alt="Company Logo">
            <!-- Add more company details as needed -->
        </div>
    </main>
    <!-- Add your footer here if needed -->
<?php include 'assets/php/footer.php' ?>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
    // Get the query parameters from the URL
    var urlParams = new URLSearchParams(window.location.search);
    
    // Check if the necessary parameters are present
    if (urlParams.has('name') && urlParams.has('description') && urlParams.has('logo')) {
        // Retrieve the company details from the query parameters
        var companyName = urlParams.get('name');
        var companyDescription = urlParams.get('description');
        var companyLogo = urlParams.get('logo');
        
        // Populate the page with the company details
        document.querySelector('.company-info h2').textContent = companyName;
        document.querySelector('.company-info p').textContent = companyDescription;
        document.querySelector('.company-info img').src = companyLogo;
    } else {
        // Handle the case where the necessary parameters are missing
        console.error('Missing or invalid query parameters.');
    }
});

    </script>
</body>
</html>
