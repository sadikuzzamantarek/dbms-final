<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
    <section>
    <?php
            include "./db.php";

            $id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

            $query = "SELECT * FROM products WHERE id=$id";
            $result = mysqli_query($db, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            ?>
        <form action="./updateData.php?id=<?php echo $id; ?>" method="post">
       

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div>
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" value="<?php echo htmlspecialchars($row['product_name']); ?>" required>
            </div>
            <div>
                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value="Foods" <?php echo $row['category'] == "Foods" ? "selected" : ""; ?>>Foods</option>
                    <option value="Electronics" <?php echo $row['category'] == "Electronics" ? "selected" : ""; ?>>Electronics</option>
                    <option value="Clothes" <?php echo $row['category'] == "Clothes" ? "selected" : ""; ?>>Clothes</option>
                    <option value="Bevarages" <?php echo $row['category'] == "Bevarages" ? "selected" : ""; ?>>Bevarages</option>
                    <option value="Skin Care" <?php echo $row['category'] == "Skin Care" ? "selected" : ""; ?>>Skin Care</option>
                </select>
            </div>
            <div>
                <label for="stock_date">Stock Date</label>
                <input type="date" name="stock_date" id="stock_date" value="<?php echo htmlspecialchars($row['stock_date']); ?>">
            </div>
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>">
            </div>
            <div>
                <label for="unit_price">Unit Price</label>
                <input type="number" name="unit_price" id="unit_price" value="<?php echo htmlspecialchars($row['unit_price']); ?>">
            </div>
            <div>
                <input type="submit" value="Update">
            </div>

            <?php
            } else {
                echo "<p>Product not found!</p>";
            }
            ?>
        </form>
    </section>
</body>

</html>
