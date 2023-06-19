<?php
$name = $firstname = $email = $description = '';
$nameError = $firstnameError = $emailError = $descriptionError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name']);
    $firstname = sanitizeInput($_POST['firstname']);
    $email = sanitizeInput($_POST['email']);
    $description = sanitizeInput($_POST['description']);

    if (empty($name)) {
        $nameError = 'Lastname is required';
    } elseif (strlen($name) < 2) {
        $nameError = 'Lastname must be at least 2 characters long';
    }

    if (empty($firstname)) {
        $firstnameError = 'Firstname is required';
    } elseif (strlen($firstname) < 2) {
        $firstnameError = 'Firstname must be at least 2 characters long';
    }

    if (empty($email)) {
        $emailError = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Invalid email address';
    }

    if (empty($description)) {
        $descriptionError = 'Description is required';
    } elseif (strlen($description) < 2) {
        $descriptionError = 'Description must be at least 2 characters long';
    }

    if (empty($nameError) && empty($firstnameError) && empty($emailError) && empty($descriptionError)) {
        $host = 'localhost';
        $dbName = 'becode';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8mb4", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO hackerpoulette (lastname, firstname, email, description) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $firstname, $email, $description]);

            header('Location: index.php?success=true');
            exit;
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
}

function sanitizeInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>