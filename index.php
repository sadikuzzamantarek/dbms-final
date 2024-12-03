<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <section>
        <table border="2px">
            <thead>
                <th>Product Name</th>
                <th>Category</th>
                <th>Stock Date</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Edit</th>
                <th>Delete</th>





            </thead>
            <tbody>

                <?php
                include "./db.php";
                $query = "SELECT * FROM products";
                $result = mysqli_query($db, $query);

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['category'] ?></td>

                        <td><?php echo $row['stock_date'] ?></td>

                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['unit_price'] ?></td>
                        <td><a href="./update.php?id=<?php echo $row['id'] ?>">Edit</a></td>
                        <td><a href="./delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>

                        </tr>

                <?php
                    }
                }

                ?>
            </tbody>
        </table>
    </section>
</body>

</html>