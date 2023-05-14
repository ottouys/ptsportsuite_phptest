(function($) {

    
    $(document).ready(function() {         
       
        // getProductsInCategory()
        $('#categoryCheckerForm').on('submit', function(event){
            // Make sure the form doesn't submit
            event.preventDefault();

            // FormData
            var myformData = new FormData(this);

            $.ajax({
                method: 'POST',
                processData: false,
                contentType: false,
                cache: false,
                url: "formactions.php",
                data: myformData,
                enctype: 'multipart/form-data',
                success: function(resultData) { 
                    resultDataDecoded = JSON.parse(resultData);                 

                    $('#categoryCheckerResults').html(resultDataDecoded.value);
                }
          });
            
        });

        // doesProductExistInCategory()
        $('#productCatCheckerForm').on('submit', function(event){
            // Make sure the form doesn't submit
            event.preventDefault();

            // FormData
            var myformData = new FormData(this);

            $.ajax({
                method: 'POST',
                processData: false,
                contentType: false,
                cache: false,
                url: "formactions.php",
                data: myformData,
                enctype: 'multipart/form-data',
                success: function(resultData) { 
                    $('#productCatCheckerResults').html(resultData);
                }
          });
            
        });

        // Show all products
        $('#getAllProducts').on('click', function(event){
            
        
            $.ajax({
                method: 'POST',               
                url: "formactions.php",
                data: {
                    formFlag: 'GetAllProductData_flag'
                },                
                success: function(resultData) {
                    $('#productList').html(resultData);
                }
        });
        });
        
    
    }); // document ready
       
      
      
})(jQuery);