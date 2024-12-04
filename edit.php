<?php
include './db.php';

$error = "";
$success = "";
$student = null;

// Fetch existing student data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM students WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    $stmt->close();
    
    if (!$student) {
        header("Location: index.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
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
        $query = "UPDATE students SET name=?, address=?, phone=?, dob=?, gender=?, level=?, term=? WHERE id=?";
        
        $stmt = $db->prepare($query);
        $stmt->bind_param("sssssssi", $name, $address, $phone, $dob, $gender, $level, $term, $id);
        
        if ($stmt->execute()) {
            $success = "Student updated successfully";
            header("Location: index.php");
            exit();
        } else {
            $error = "Error updating student: " . $db->error;
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
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    
    <?php if (!empty($success)): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
        
        <div class="form-group">
            <label for="name">Student Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" required><?php echo $student['address']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="phone">Phone No:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $student['phone']; ?>" required>
        </div>

        <div class="form-group">
            <label for="dob">Birthdate:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $student['dob']; ?>" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="radio" id="male" name="gender" value="Male" <?php echo ($student['gender'] === 'Male') ? 'checked' : ''; ?> required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female" <?php echo ($student['gender'] === 'Female') ? 'checked' : ''; ?> required>
            <label for="female">Female</label>
        </div>

        <div class="form-group">
            <label for="level">Level:</label>
            <select id="level" name="level" required>
                <option value="">Select Level</option>
                <?php for($i = 1; $i <= 4; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($student['level'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="term">Term:</label>
            <select id="term" name="term" required>
                <option value="">Select Term</option>
                <?php for($i = 1; $i <= 2; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($student['term'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <button type="submit">Update Student</button>
    </form>
</body>
</html>
