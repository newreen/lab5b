<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
            max-width: 400px; /* Set a maximum width for the form */
            margin: auto; /* Center the form */
            background: #fff; /* White background for the form */
            padding: 20px; /* Padding inside the form */
            border-radius: 5px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Subtle shadow effect */
        }
        form {
            display: flex; /* Use flexbox for layout */
            flex-direction: column; /* Stack elements vertically */
        }
        label {
            margin-bottom: 5px; /* Space between label and input */
            font-weight: bold; /* Bold labels for clarity */
        }
        input[type="text"],
        input[type="password"] {
            width: 100%; /* Full width inputs */
            padding: 10px; /* Padding for inputs */
            margin-bottom: 15px; /* Space below inputs */
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 4px; /* Rounded corners for inputs */
        }
        input[type="submit"] {
            background-color: #28a745; /* Green background for submit button */
            color: white; /* White text on button */
            border: none; /* No border */
            padding: 10px; /* Padding inside button */
            cursor: pointer; /* Pointer cursor on hover */
            border-radius: 4px; /* Rounded corners for button */
        }
        input[type="submit"]:hover {
            background-color: #218838; /* Darker green on hover */
        }
        p {
            text-align: center; /* Center align paragraph text */
        }
        a {
            color: #007bff; /* Link color */
            text-decoration: none; /* No underline on links */
        }
        a:hover {
            text-decoration: underline; /* Underline on hover for links */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="authenticate.php" method="post">
            <label for="matric">Matric:</label>
            <input type="text" id="matric" name="matric" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
            
            <p><a href="registration.php">Register</a></p>
        </form>
    </div>
</body>
</html>
