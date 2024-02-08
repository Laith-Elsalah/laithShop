<?php
    $servername = "localhost";
    $username = "id21859149_admin";
    $password = "12345Asdfg@";
    $dbname = "id21859149_dbshop";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        // collect value of input field
        
        $productName = $_REQUEST['productName'];
        $productCategory = $_REQUEST['productCategory'];
        $productDescription = $_REQUEST['productDescription'];
        $productPrice = $_REQUEST['productPrice'];
        $productImage = $_REQUEST['productImage'];

        // Validate productName using preg_match
        if (!preg_match("/^[A-Za-z]+$/", $productName)) {
            die("Error: Product Name should contain only letters.");
        }
        // Validate productCategory using preg_match
        if (!preg_match("/^(men|women)$/i", $productCategory)) {
            die("Error: Product Category should be 'men' or 'women'.");
        }
        
        
        
        $sqlquery = "INSERT INTO products (ProductName, Category, descriptionP, Price, ProductImageURL) VALUES ('$productName','$productCategory' , '$productDescription' , '$productPrice' , '$productImage')";
        $result = mysqli_query($conn, $sqlquery);
        if ($result) {
            $msg = "record inserted successfully";
        } else {
            $msg = "Error inserting record: " . mysqli_error($conn);
        }
        echo $msg;

   }

?>