<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>
    <section>
        <form action="./addData.php" method="post">
            <div>
                <label for="">Product Name</label>
                <input type="text" name="product_name" id="product_name" required>
            </div>
            <div>
                <label for=""> Category</label>
                <select name="category" id="category">
                    <option value="Foods">Foods</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothes">Clothes</option>
                    <option value="Bevarages">Bevarages</option>
                    <option value="Skin Care">Skin Care</option>
                </select>
            </div>
            <div>
                <label for="">Stock Date</label>
                <input type="date" name="stock_date" id="stock_date">
            </div>
            <div>
                <label for="">Quantity</label>
                <input type="number" name="quantity" id="quantity">
            </div>
            <div>
                <label for="">Unit Price</label>
                <input type="number" name="unit_price" id="unit_price">
            </div>
            <div>
                <input type="submit" value="add">
            </div>
        </form>
    </section>
</body>

</html>