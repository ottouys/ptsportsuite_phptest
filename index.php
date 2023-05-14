<?php

require_once('./classes.php');

// Timestamp
$date = new DateTime('2008-09-22');
$timestamp = $date->getTimestamp();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body{
            font-size:16px;
            padding-bottom:10rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>PT Sportsuite PHP Test</h1>             

                <h3>Get all products by category </h3>
                <p>(Hint: Can check the existing products after the forms)</p>
                <form id="categoryCheckerForm" action="formactions.php" method="post">
                    <!-- Hidden Fields -->
                    <input type="hidden" name="formFlag" value="categoryChecker_Flag">

                    <div class="form-group">
                        <input type="text" name="categoryString" id="categoryString" value="" class="form-control" placeholder="Enter the category">                    
                    </div>

                    <button type="submit" class="btn btn-primary">Search Categories</button>
                </form>

                <!-- Results will be displayed here  -->
                <div id="categoryCheckerResults"></div>

                <hr/>

                <h3>Check if product exists in category</h3>
                <p>(Hint: Can check the existing products after the forms)</p>

                <form id="productCatCheckerForm" action="formactions.php" method="post">
                    <!-- Hidden Fields -->
                    <input type="hidden" name="formFlag" value="productCatChecker_Flag">

                    <div class="form-group">
                        <input type="text" name="categoryString" id="categoryString" value="" class="form-control" placeholder="Enter the category">
                                           
                    </div>

                    <div class="form-group">
                        <input type="text" name="productString" id="productString" value="" class="form-control" placeholder="Enter the product">                    
                    </div>

                    <button type="submit" class="btn btn-primary">Search Categories and Products</button>
                </form>

                <!-- Results will be displayed here  -->
                <div id="productCatCheckerResults"></div>

                <hr/>

                <h3>Get All current Products</h3>
                <button type="button" class="btn btn-primary" id="getAllProducts">Get All current Products</button>
                <div id="productList"></div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Sitejs -->
    <script src="site.js?v=<?php echo $timestamp; ?>"></script>
</body>
</html>