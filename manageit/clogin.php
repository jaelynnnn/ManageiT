<?php

// Include the database connection
include 'config.php'; // Adjust the path if necessary

// Collecting data from rcompany.html
$company_name = $_POST['company_name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$key = $_POST['key'] ?? '';
$confirm_key = $_POST['confirm_key'] ?? '';

// Making sure the passwords match
$errors = [];
if ($password !== $confirm_password) {
    $errors[] = "Passwords do not match.";
}
if ($key !== $confirm_key) {
    $errors[] = "Company keys do not match.";
}

if (empty($errors)) {
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO companies (company_name, email, password, company_key) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $company_name, $email, $hashed_password, $key);
    
    // Execute and check for success
    if ($stmt->execute()) {
        // Redirect to clogin.html on success
        header("Location: /your_project_folder/pages/clogin.html");
        exit(); // Make sure to call exit after header redirect
    } else {
        echo "Error: " . htmlspecialchars($stmt->error); // Escape potential XSS
    }
    
    $stmt->close();
} else {
    // Display errors
    foreach ($errors as $error) {
        echo "<p>" . htmlspecialchars($error) . "</p>"; // Escape potential XSS
    }
}

$conn->close();
?>
