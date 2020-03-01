<?php
session_start();

/*Check if it is valid */
$collectID;
$collect = false;


/* destroy the session when the cart has been cleared */

if(!empty($_POST['remove'])) {
    session_destroy();
}
/* executed when cart is empty */
if (!empty($_POST["add"]) && !empty($_POST["quantity_selected"])) {
    if (!isset($_SESSION["cartedProducts"])) {
        $products = array(
            'pID' => $_POST["product_id"],
            'pName' => $_POST["product_name"],
            'cost' => $_POST["unit_price"],
            'quantSelec' => $_POST["quantity_selected"]
        );
        $_SESSION["cartedProducts"][0] = $products;
    }
    else {
        foreach($_SESSION["cartedProducts"] as $selectedP) {
            if ($selectedP['pID'] == $_POST["product_id"]) {
                $collect = true;
                $collectID = $selectedP['pID'];
                break;
            }

         }
/* item details of each product */
        if(!$collect) {
            $count = count($_SESSION["cartedProducts"]);
            $products = array(
                'pID' => $_POST["product_id"],
                'pName' => $_POST["product_name"],
                'cost' => $_POST["unit_price"],
                'quantSelec' => $_POST["quantity_selected"]
            );
            $_SESSION["cartedProducts"][$count] = $products;

    }
        else {
            $selected =$_POST["quantity_selected"];

            for ($i=0; $i < count($_SESSION["cartedProducts"]); $i++) {
                if ($_SESSION["cartedProducts"][$i]["pID"] == $collectID ) {
                    $selected =$_POST["quantity_selected"];
                    $quant = doubleval($_SESSION["cartedProducts"][$i]["quantSelec"]) + doubleval($selected);
                if ($quant > 20) {
                    print "<script>alert('Alert: Only a maximum of 20 is allowed for each product!');</script>";
                }

                    else {
                      $_SESSION["cartedProducts"][$i]["quantSelec"] = $quant;
                    $collect = false;
                  }
                }
            }
        }
    }
}

else if  (!empty($_POST["quantity_selected"])){
    print "<script>alert('Quantity needed!')</script>";
}
?>

<html>
    <head>
        <title></title>
        <!-- Style the table -->
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
        <h2 align="left">Cart</h2>
        <table class="table" align="left">
            <?php
            if(!empty($_SESSION["cartedProducts"])) {
                $final = 0;
            ?>
            <tr>
                <th width="35%">Product Name</th>
                <th width="12%">Quantity</th>
                <th width="20%">Price</th>
                <th width="20%">Item Total</th>
            </tr>
            <?php
                foreach($_SESSION["cartedProducts"] as $values => $atrrib) {
            ?>
            <tr>
                <td><?php print $atrrib["pName"];?></td>
                <td><?php print $atrrib["quantSelec"];?></td>
                <td>$ <?php print $atrrib["cost"];?></td>
                <td>$ <?php print number_format($atrrib["quantSelec"] * $atrrib["cost"], 2);?></td>
            </tr>
            <?php
            /* Total cost */
                $final = $final + ($atrrib["quantSelec"] * $atrrib["cost"]);
                }
            ?>
            <tr>
                <td align="right" colspan="2" style="font-weight:bold;">Final Total: $<?php print number_format($final, 2);?></td>
                <td>
                <form action="prod_cart.php" method="post" target="bottomright">
                    <input colspan="4" type="submit" id="remove" name="remove" value="Clear" style="height:100px; width:80px">
                </form>
              </td>
              <td>
            <form action="prod_checkout.php" method="post" target="topright" id="checkout">

                <input type="hidden" name="finalPrice" value="<?php print $final;?>">
                <input type="submit" id="checkOut" name="checkOut" value="Check Out" style="height:100px; width:80px">
            </form>

        </td>
            </tr>
            </table>

            <?php
            /* If no products in the cart */
            }
            if (empty($_SESSION["cartedProducts"])) {
                echo "<span style='color:c#335284;'>No products in Shopping Cart!</span>";
            }
            ?>

    </body>
</html>
