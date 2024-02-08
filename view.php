
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
        
        $searchWord = $_POST['search'];
    
        $sqlquery = "select * from products where Category= '$searchWord'"; //filter based on Category
    
        $result = $conn->query($sqlquery);

        while ($row = $result->fetch_assoc()) {
            echo "<div class='card' style =' width: 100%; border-bottom: 1px solid #333; padding:15px 0'>";
            echo "<img src='" . $row["ProductImageURL"] . "' alt='ProductImageURL' style='width:300px; height:300px;'>";
            echo "<p>Product Name: " . $row["ProductName"] . " - Category: " . $row["Category"] . " , Description: " . $row["descriptionP"] . " Price: " . $row["Price"] . "</p>";
            echo "</div>";
        }
    } else {
            echo "0 results";
        }
        $conn->close();
   
    
?>