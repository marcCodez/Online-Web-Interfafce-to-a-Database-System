<?php
    session_start();
    foreach($_SESSION["cartedProducts"] as $values => $atrrib) {
        $details .=  $atrrib["pName"]." $".$atrrib["cost"]."x".$atrrib["quantSelec"]."= $". number_format($atrrib["quantSelec"] * $atrrib["cost"], 2)."<br>";
        $final = $final + ($atrrib["quantSelec"] * $atrrib["cost"]);
    }
    $emailSend = $_POST["client"];
    $title = "Your Order";
    $txt = "Order Final Total: $". $final ."Details Review: ".$details."";
    $emailFrom = "From: marcpulz@onlinegrocery.com";
    mail($emailSend,$title,$txt,$emailFrom);
    $success = mail($emailSend,$title,$txt, $emailFrom);
    if (!$success) {
        $alert = "error: email confirmation failed!";
    }
    else{
        $alert = "Order Successful!<br> <h4>Check your email for confirmation!</h4> <br><h4>Summary: </h4>";
    }

?>

<html>
<head>
<title>Online Grocery</title>
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

    <h2><?php echo $alert?></h2>
    <table>
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
        }
    ?>
    <tr>
        <td align="right" colspan="4" style="font-weight:bold;">Final Total: $<?php print number_format($final, 2);?></td>
    </table>
</tr>
    <a href="empty_complete.php" id="empty_complete" target="bottomright"></a>
    <script>
        document.getElementById('empty_complete').click();
    </script>
    <?php
        session_destroy();
    ?>
</body>
</html>
