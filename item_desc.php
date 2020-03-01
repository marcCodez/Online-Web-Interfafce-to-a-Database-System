<?php
/*calls the php file to set up connection with the Poti database */
    include('databaseSetup.php');
    session_start();
?>
<html>
<head>
    <title>Product Description</title>

    <!-- Quantity ia validated via Javascript before the data is submitted. Checks if
    input is over 20, less than or equal to 0, not a number and   -->
        <script type="text/javascript">
            function check_amount(amount) {
                var quantity = document.getElementById('quantity_selected').value;
                if (quantity > 20) {
                    alert("Maximum amount of 20!");
                    return false;
                }
                else if (quantity < 0) {
                    alert("Input has to be greater than 0!");
                    return false;
                }
                else if (amount < quantity) {
                    alert("Stock is limited for the amount selected!");
                    return false;
                }
                else if (quantity == 0 || quantity == null) {
                    alert("0 value is not permitted!");
                    return false;
                }
                else if (isNaN(quantity)) {
                  alert("characters are not permitted!");
                    return false;
                }

            }
        </script>

<!-- Style sheet to format table -->
    <style>

    * {
 font-family: Arial;
}

    table, th , td  {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 7px;
    }
    table tr:nth-child(odd) {
      background-color: #335284;
      color: white;
    }
    table tr:nth-child(even) {
      background-color: #ffffff;
    }
    </style>


</head>
<body>
<?php
/* Gets the product id from the products table and displays the product details that
corresponds with the selcted product id, achieved via a sql database query*/
if (empty($_SESSION['check'])){
    if ($_GET['product_id']) {
        $product_id = $_GET['product_id'];
    }
    $sql = "SELECT * FROM products where product_id = $product_id";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
?>

<table class="table" width=90% align="left">
  <!-- Structure/styling of product description table, collects product information by printing the coressponding product attribut -->
    <tr valign="middle">
        <td><h1><?php print $row['product_name'];?></h1></td>
    </tr>
    <tr>
        <td><?php print $row['unit_quantity'];?></td>
    </tr>
    <tr>
        <td style="font-weight: bold"><span style="font-size:15px;"></span>Price: $<?php print $row['unit_price'];?></td>
    </tr>
    <tr>
        <td style="font-size:15px;">Quantity Available: <?php print $row['in_stock'];?></td>
    </tr>
    <form action="prod_cart.php" method="post" onsubmit="return check_amount(<?php print $row['in_stock'];?>)" name="selectquant" target="bottomright">
        <tr>
            <td>
                <p style="font-size:15px;">Select Quantity: </p>
                <input placeholder="Amount" type="number" name="quantity_selected" id="quantity_selected" style="height:20px; width:70px">
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="unit_price" value="<?php print $row['unit_price'];?>">
                <input type="hidden" name="product_name" value="<?php print $row['product_name'];?>">
                <input type="hidden" name="product_id" value="<?php print $row['product_id'];?>">
                <input type="submit" id="add" name="add" value="Add" style="height:100px; width:70px">
            </td>
        </tr>
    </form>
</table>
<?php
}
else {
    print "<h3 style='color:red;'>There is one order in process. <br><br>Please press check out button below to complete your order first.</h3>";
}
?>
</body>
</html>
