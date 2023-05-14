<?php

    // Include our backend functionality
    require_once('./classes.php');

    // Debug
    // print "<pre>";
    // print_r($_POST['formFlag']);
    // print "</pre>";

    // Check if correct flag
    if(isset($_POST['formFlag'])) {   
        // Category Checker
        if($_POST['formFlag'] === 'categoryChecker_Flag') {
            // Category String Checker
            if(!empty($_POST['categoryString'])){
                // String posted
                $categoryString = $_POST['categoryString'];

                $dataHandler = new DataHandler();                    
                $data = $dataHandler->getAllData();

                // Lets do the check
                $productsInCategory = $dataHandler->getProductsInCategory($categoryString);                    

                // print "<pre>Category Results: ";
                // print_r($productsInCategory['status']);
                // print "</pre>";

                if( $productsInCategory['status'] === 400){
                    echo json_encode([
                        'status' => 400,
                        'value' => $productsInCategory['value']
                    ]);
                } else if ( $productsInCategory['status'] === 200 ){
                    echo json_encode([
                        'status' => 200,
                        'value' => $productsInCategory['value']
                    ]);
                } else {
                    echo json_encode([
                        'status' => 400,
                        'value' => 'An Error has occured.'
                    ]);
                }
                
            } else{
                echo json_encode([
                    'status' => 400,
                    'value' => 'Sorry, an error has occured. Please try again'
                ]);
            }
        }

        // Category Checker
        if($_POST['formFlag'] === 'productCatChecker_Flag') {
            // Category String Checker
            if(!empty($_POST['categoryString']) && !empty($_POST['productString'])){
                // String posted
                $categoryString = $_POST['categoryString'];
                $productString = $_POST['productString'];

                $dataHandler = new DataHandler();                    
                $data = $dataHandler->getAllData();

                // Lets do the check
                $productsInCategory = $dataHandler->doesProductExistInCategory($categoryString, $productString); 

                // Output
                if( $productsInCategory ){
                    echo "<p style='color:green;'>Product does exist in category<p>";
                }  else {
                    echo "<p style='color:red;'>Product does NOT exist in category<p>";
                }
                
            } else{
                echo "<p style='color:red;'>An error has occurred. Please ensure you enter both the username and <p>";
            }
        }

        // Category Checker
        if($_POST['formFlag'] === 'GetAllProductData_flag') {
            $dataHandler = new DataHandler(); 
            echo $dataHandler->tableProductsAll();
        }
    }

?>