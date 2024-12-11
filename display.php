<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
   header('Location: login.php');
   exit();
}

$conn = new mysqli('localhost', 'root', '', 'lab_5b');

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM users");

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>User List</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }";
echo "h2 { color: #333; text-align: center; }";
echo ".container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }";
echo "table { width: 100%; border-collapse: collapse; margin-top: 20px; }";
echo "th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }";
echo "th { background-color: #28a745; color: white; }";
echo "tr:hover { background-color: #f1f1f1; }";
echo "a { color: #007bff; text-decoration: none; }";
echo "a:hover { text-decoration: underline; }";
echo ".delete-button { background-color: #dc3545; color: white; border: none; padding: 6px 12px; cursor: pointer; border-radius: 4px; }";
echo ".delete-button:hover { background-color: #c82333; }"; // Darker red on hover
echo "</style>";
echo "</head>";
echo "<body>";
echo "<div class='container'>";
echo "<h2>User List</h2>";
echo "<table>";
echo "<tr><th>Matric</th><th>Name</th><th>Access Level</th><th>Actions</th></tr>";

while ($row = $result->fetch_assoc()) {
   echo "<tr>";
   echo "<td>" . htmlspecialchars($row['matric']) . "</td>";
   echo "<td>" . htmlspecialchars($row['name']) . "</td>";
   echo "<td>" . htmlspecialchars($row['accessLevel']) . "</td>";
   echo "<td>
           <a href='update.php?matric=" . htmlspecialchars($row['matric']) . "'>Update</a> | 
           <form action='delete.php' method='post' style='display:inline-block;' onsubmit=\"return confirm('Are you sure you want to delete this user?');\">
               <input type='hidden' name='matric' value='" . htmlspecialchars($row['matric']) . "'>
               <button type='submit' class='delete-button'>Delete</button>
           </form>
         </td>";
   echo "</tr>";
}
echo "</table>";
echo "</div>"; // Close container
echo "</body></html>";

$conn->close();
?>
