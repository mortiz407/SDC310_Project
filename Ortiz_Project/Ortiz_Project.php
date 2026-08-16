<?php
    // Connect to Database
    $hostname = 'localhost';
    $username = 'root'; // Update if your environment uses 'ecpi_user'
    $password = '';     // Update if your environment uses 'Password1'
    $dbname   = 'sdc310_project';
    $conn     = mysqli_connect($hostname, $username, $password, $dbname);

    // Establish variables to support add/edit/delete
    $productId = -1;
    $productName = "";
    $productCost = "";
    $productDescription = "";

    // Variables to determine the type of operation
    $add = false;
    $edit = false;
    $update = false;
    $delete = false;

    if (isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];
        $add = isset($_POST['add']);
        $update = isset($_POST['update']);
        $edit = isset($_POST['edit']);
        $delete = isset($_POST['delete']);
    } else {
        $add = isset($_POST['add']);
    }

    if ($add) {
        // Add new product
        $productName = $_POST['product_name'];
        $productCost = $_POST['product_cost'];
        $productDescription = $_POST['product_description'];

        $addQuery = "INSERT INTO catalog (ProductName, ProductCost, ProductDescription)
                     VALUES ('$productName', '$productCost', '$productDescription')";
        mysqli_query($conn, $addQuery);

        // Clear the fields
        $productId = -1;
        $productName = "";
        $productCost = "";
        $productDescription = "";
    }

    else if ($edit) {
        // Retrieve record to allow edit
        $selQuery = "SELECT * FROM catalog WHERE ProductID = $productId";
        $result = mysqli_query($conn, $selQuery);
        $row = mysqli_fetch_assoc($result);

        // Populate the variables using exact column names
        $productName = $row['ProductName'];
        $productCost = $row['ProductCost'];
        $productDescription = $row['ProductDescription'];
    }

    else if ($update) {
        // Update record with submitted values
        $productName = $_POST['product_name'];
        $productCost = $_POST['product_cost'];
        $productDescription = $_POST['product_description'];

        $updQuery = "UPDATE catalog SET
                     ProductName = '$productName',
                     ProductCost = '$productCost',
                     ProductDescription = '$productDescription'
                     WHERE ProductID = $productId";
        mysqli_query($conn, $updQuery);

        // Clear the fields
        $productId = -1;
        $productName = "";
        $productCost = "";
        $productDescription = "";
    }

    else if ($delete) {
        // Delete selected record
        $delQuery = "DELETE FROM catalog WHERE ProductID = $productId";
        mysqli_query($conn, $delQuery);
        $productId = -1;
    }

    // Query for all stored records
    $query = "SELECT * FROM catalog";
    $result = mysqli_query($conn, $query);
?>

<style>
    table {
        border-spacing: 5px;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
        text-align: center;
    }
    th {
        background-color: lightskyblue;
    }
    tr:nth-child(even) {
        background-color: whitesmoke;
    }
    tr:nth-child(odd) {
        background-color: lightgray;
    }
</style>
<html>
    <head>
        <title>Manuel Ortiz Project</title>
    </head>

    <body>
        <h2>Product Catalog Records:</h2>
        <table>
            <tr style="font-size: large;">
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Cost</th>
                <th>Product Description</th>
                <th></th>
                <th></th>
            </tr>

            <?php while($row = mysqli_fetch_array($result)):;?>
                <tr>
                    <td><?php echo $row["ProductID"];?></td>
                    <td><?php echo $row["ProductName"];?></td>
                    <td>$<?php echo number_format($row["ProductCost"], 2);?></td>
                    <td><?php echo $row["ProductDescription"];?></td>
                    <td>
                        <form method='POST'>
                            <input type="submit" value="Edit" name="edit">
                            <input type="hidden"
                                   value="<?php echo $row["ProductID"]; ?>"
                                   name="product_id">
                        </form>
                    </td>
                    <td>
                        <form method='POST'>
                            <input type="submit" value="Delete" name="delete">
                            <input type="hidden"
                                   value="<?php echo $row["ProductID"]; ?>"
                                   name="product_id">
                        </form>
                    </td>  
                </tr>
            <?php endwhile;?>
        </table>

        <form method='POST'>
            <input type="hidden" value="<?php echo $productId; ?>" name="product_id">
            <h3>Enter Product Name: <input type="text" name="product_name"
                value="<?php echo $productName; ?>"></h3>
            <h3>Enter Product Cost: <input type="number" step="0.01" name="product_cost"
                value="<?php echo $productCost; ?>"></h3>
            <h3>Enter Product Description: <input type="text" name="product_description"
                value="<?php echo $productDescription; ?>"></h3>
            
            <?php if (!$edit): ?>
                <input type="submit" value="Add Product" name="add">
            <?php else: ?>
                <input type="submit" value="Update Product" name="update">
            <?php endif; ?>
        </form>
    </body>
</html>
