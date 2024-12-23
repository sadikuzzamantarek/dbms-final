<?php
include './db.php';

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $address = $_POST['address'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $level = $_POST['level'] ?? '';
    $term = $_POST['term'] ?? '';

    if (empty($name) || empty($address) || empty($phone) || empty($dob) || empty($gender) || empty($level) || empty($term)) {
        $error = "All fields are required";
    } else {
        $query = "INSERT INTO students (name, address, phone, dob, gender, level, term) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $db->prepare($query);
        $stmt->bind_param("sssssss", $name, $address, $phone, $dob, $gender, $level, $term);
        
        if ($stmt->execute()) {
            $success = "Student added successfully";
            header("Location: index.php");
            exit();
        } else {
            $error = "Error adding student: " . $db->error;
        }
        $stmt->close();
    }
}
$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <h2>Add New Student</h2>
    
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    
    <?php if (!empty($success)): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Student Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>
        </div>

        <div class="form-group">
            <label for="phone">Phone No:</label>
            <input type="text" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="dob">Birthdate:</label>
            <input type="date" id="dob" name="dob" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="radio" id="male" name="gender" value="Male" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female" required>
            <label for="female">Female</label>
        </div>

        <div class="form-group">
            <label for="level">Level:</label>
            <select id="level" name="level" required>
                <option value="">Select Level</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>

        <div class="form-group">
            <label for="term">Term:</label>
            <select id="term" name="term" required>
                <option value="">Select Term</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>

        <button type="submit">Add Student</button>
    </form>
</body>
</html>