<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
   header('Location: login.php');
   exit();
}

$conn = new mysqli('localhost', 'root', '', 'lab_5b');

$matric = $_GET['matric'];
$result = $conn->query("SELECT * FROM users WHERE matric='$matric'");
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = $_POST['name'];
   $accessLevel = $_POST['accessLevel'];

   $sql = "UPDATE users SET name='$name', accessLevel='$accessLevel' WHERE matric='$matric'";
   
   if ($conn->query($sql) === TRUE) {
       header('Location: display.php');
       exit();
   } else {
       echo "<div style='color: red;'>Error updating record.</div>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"],
        .delete-button {
            background-color: #28a745; /* Green for update button */
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #218838; /* Darker green on hover */
        }
        .delete-button {
            background-color: #dc3545; /* Red for delete button */
        }
        .delete-button:hover {
            background-color: #c82333; /* Darker red on hover */
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update User</h2>
    <form action="" method="post">
       <label for="name">Name:</label>
       <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

       <label for="accessLevel">Access Level:</label>
       <select id="accessLevel" name="accessLevel" required>
           <option value="">Please select</option>
           <option value="lecture" <?php if($user['accessLevel'] == 'lecture') echo 'selected'; ?>>Lecture</option>
           <option value="student" <?php if($user['accessLevel'] == 'student') echo 'selected'; ?>>Student</option>
       </select>

       <input type="submit" value="Update">
    </form>

    <!-- Delete Button -->
    <form action="delete.php?matric=<?php echo htmlspecialchars($user['matric']); ?>" method="post" style="margin-top: 10px;">
        <button type="submit" class="delete-button">Delete User</button>
    </form>
</div>

<?php
$conn->close();
?>
