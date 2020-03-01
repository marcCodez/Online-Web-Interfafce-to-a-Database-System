<?php
session_start();
?>

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

<html>
<head>
<title>Purchase</title>

</head>
<body>

    <h2> Purchase Form</h2>
    <p>(<span style="color:red;">* </span>= compulsory)</p>
    <div>
        <form action="email_confirm.php" method="POST">
            <table class="table" align="left">
                <tr>
                    <td>Full Name: <span style="color:red">* </span></td>
                    <td><input type="text" name="fullname" id="fullname" size="66" required></td>
                </tr>
                <tr>
                    <td>Address: <span style="color:red">* </span></td>
                    <td><input type="text" name="address" id="addr" size="55" required></td>
                </tr>
                <tr>
                    <td>Suburb: <span style="color:red">* </span></td>
                    <td><input type="text" name="suburb" id="sub" size="55" required></td>
                </tr>
                <tr>
                    <td>State: <span style="color:red">* </span></td>
                    <td><input type="text" name="state" id="state" size="55" required></td>
                </tr>
                <tr>
                    <td>Available Countries: <span style="color:red">* </span></td>
                    <td><select name="count" id="count" required>
                        <option value=""> Select Country </option>
                        <option value="Australia">Australia</option>
                        <option value="America">America</option>
                        <option value="Japan">Japan</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Philippines">Philippines</option>



                    </select>
                  </td>
                </tr>
                <tr>
                    <td>Email: <span style="color:red">* </span></td>
                    <td><input type="email" name="em" id="em" size="55" required></td>
                </tr>
                <tr>
                    <td><input type="submit" id="process" name="process" value="Purchase"></td>

                </tr>
                </form>
            </table>

    </div>
</body>
</html>
