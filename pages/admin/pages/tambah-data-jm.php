<?php
include '../../../kontrol/tukangshare.php';
include '../../../koneksi.php';
?>
<html>
<head>
    <title>Add Users</title>
</head>

<body>
Go to Home




<form action="add.php" method="post" name="form1">

    Name	<input type="text" name="name">
    Email	<input type="text" name="email">
    Mobile	<input type="text" name="mobile">
    <input type="submit" name="Submit" value="Add">

</form>

<?php

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // include database connection file


    // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO jm (jenis_montor,jm_model.id_jm , model,mobile) VALUES('$name','$email','$mobile')");

    // Show message when user added
    echo "User added successfully. View Users";
}
?>
</body>
</html>