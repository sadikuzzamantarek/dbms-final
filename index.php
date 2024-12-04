<?php

include './db.php';

$error = "";
$success = "";
$records = [];

// fetch all records from the database
$query = "SELECT id, name, address, phone, dob, gender, level, term FROM students";
$result = $db->query($query);

if($result){
    while($row = $result->fetch_assoc()){
        $records[] = $row;
    }
    $result->free();
} else {
    $error = "Error fetching records from the database ";
}

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
</head>
<body>
    <a href="add.php" class="btn">
        <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">
            Add New Student
        </button>
    </a>
    <?php if (!empty($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if (empty($records)): ?>
        <p>No records found</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th>Birthdate</th>
                    <th>Gender</th>
                    <th>Level Term</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                    <tr>
                        <td><?php echo $record['id']; ?></td>
                        <td><?php echo $record['name']; ?></td>
                        <td><?php echo $record['address']; ?></td>
                        <td><?php echo $record['phone']; ?></td>
                        <td><?php echo $record['dob']; ?></td>
                        <td><?php echo $record['gender']; ?></td>
                        <td><?php echo $record['level'] . ' ' . $record['term']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $record['id']; ?>">Edit</a> |
                            <a href="delete.php?id=<?php echo $record['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>