<?php
    
    /**
     * Feel free to change any code.
     *
     * Please complete the following assessment.
     *
     * In the file below you will see an Object $data that has categories and products inside it.
     *
     * There are two functions we would like implemented:
     * getProductsInCategory() - This function needs to return a product inside a category that we can specify.
     * doesProductExistInCategory() - This function needs to let us know if a product exists in a category that we chose.
     *
     * Hints:
     * Please make sure that the Object is extendable and other products and categories can be added and the functions will work.
     * Big-O notation.
     * Using DRY and SOLID principles.
     * You can ask for help or more information at anytime.
     * You can use any resources you like.
     * The frontend is important.
     *
     * Bonus points:
     * - PHP Unit Testing.
     * - Frontend Display/Layout/Template to process data.
     * - Git repository to track the code changes.
     *
     * You will be evaluated on the following:
     * - Code structure, readability, understandably, maintainability and layout.
     * - Code standards used.
     * - Completion of the objective.
     * - Performance of the completed structure.
     * - Frontend Display/Layout/Template to process data using Javascript and CSS.
     */    

    
     /**
      * TODO:
      * Allow adding of new products in categories      * 
      */
    
    class Product {
        public string $name;
        
        public function __construct(string $name) {
            $this->name = $name;
        }
    }
    
    class Category {
        public string $name;
        public array $products;
        
        public function __construct(string $name, array $products) {
            $this->name     = $name;
            $this->products = $products;
        }
    }

    class DataHandler {   
        public array $data;       

        public function __construct() {
            // Data population happens here
            if(empty($this->data)){
                $this->data = [
                    new Category('Mens', [new Product('Blue Shirt'), new Product('Red T-Shirt')]),
                    new Category('Kids', [new Product('Sneakers'), new Product('Toy car')]),
                ];
            }
        }

        // Basic retrieval of all data
        public function getAllData () {
            return $this->data;
        }

        // Generate a table from product array, filter by catagory
        public function tableProductsCategory (array $products, string $category): string {
            if(!empty($products)){
                $html = "<table class='table'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{$category}</th>
                    </tr>
                </thead>
                <tbody>";

                foreach ($products as $key => $product) {
                    $html .= '<tr>';
                        $html .= '<td>';
                        $html .= $key + 1;
                        $html .= '</td>';
                        $html .= '<td>';
                        $html .= $product->name;
                        $html .= '</td>';
                    $html .= '</tr>';
                }

                $html .= '</tbody></table>';

                return $html;
            } else{
                return 'Currently no categories or products';
            }
        }

        // Generate a table from category array
        public function tableProductsAll () : string {
            if(!empty($this->getAllData())){
                $html = "<table class='table'>
                            <thead>
                                <tr>
                                    <th>Product Information</th>                                    
                                </tr>
                            </thead>";

                foreach ($this->getAllData() as $key => $categoryObject) {
                    $html .= "<tr>
                                <th>#</th>
                                <th>{$categoryObject->name}</th>
                            </tr>";

                    foreach ($categoryObject->products as $key => $productObect) {
                        $html .= '<tr>';
                            $html .= '<td>';
                            $html .= $key + 1;
                            $html .= '</td>';
                            $html .= '<td>';
                            $html .= $productObect->name;
                            $html .= '</td>';
                        $html .= '</tr>';
                    }
                }                

                $html .= '</table>';

                return $html;
            } else{
                return 'Currently no categories or products';
            }
        }

        /**
         * Return a product inside a category.
         *
         * @param string $category
         *
         * @return array
         */
        public function getProductsInCategory(string $category): array {
            // Get all data
            if(!empty($this->getAllData())){
                foreach ($this->getAllData() as $key => $categoryObject) {
                    // Check if both exists
                    if(empty($categoryObject->products) || empty($categoryObject->name)){
                        return [
                            'status' => 400,
                            'value' => 'Currently no categories or products'
                        ];
                    }

                    // Check if category exists, with case insensitive regex and character length
                    if(preg_match("/$category/i", $categoryObject->name) && strcasecmp($category, $categoryObject->name) == 0) {
                        return [                            
                            'status' => 200,
                            'value' => $this->tableProductsCategory($categoryObject->products, $categoryObject->name)
                        ];
                    } else{
                        continue;
                    }
                }

                // Fallback if no matching cats
                return [
                    'status' => 400,
                    'value' => 'Category does not exists'
                ];
            } else{
                return [
                    'status' => 400,
                    'value' => 'Data currently empty'
                ];
            }
        }

        /**
         * Return a product inside a category.
         *
         * @param string $category (Category Name)
         * @param string $product (Product Name)
         *
         * @return bool
         */
        public function doesProductExistInCategory(string $category, string $product): bool {
            // Get all data
            if(!empty($this->getAllData())){
                foreach ($this->getAllData() as $key => $categoryObject) {  
                    // Check if category exists, with case insensitive regex and character length
                    if(preg_match("/$category/i", $categoryObject->name) && strcasecmp($category, $categoryObject->name) == 0) {
                        foreach ($categoryObject->products as $key => $productObect) {        
                            if( preg_match("/$product/i", $productObect->name) && strcasecmp($product, $productObect->name) == 0 ){                    
                                return true;
                            } 
                        }                        
                    } else{
                        continue;
                    }
                }

                // Fallback if no matching cats
                return false;
            } else{
                return false;
            }              
        }
    }
    
    
    
    
    
    

     