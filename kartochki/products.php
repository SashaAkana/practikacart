<?php
// Чтение данных из ini файла
function load_products_from_ini($filename) {
    $products = parse_ini_file($filename, true);
    return $products;
}

// Создание оболочки карточки
function display_product_card($product) {
    echo "<div class='product-card'>";
    echo "<h2>" . htmlspecialchars($product['name']) . "</h2>";
    echo "<p>ID: " . htmlspecialchars($product['id']) . "</p>";
    echo "<p>Описание: " . htmlspecialchars($product['description']) . "</p>";
    echo "<p>Цена: " . htmlspecialchars($product['price']) . " руб.</p>";
    echo "<p>Количество на складе: " . htmlspecialchars($product['stock']) . "</p>";
    echo "</div>";
}

// Вывод всех товаров
function display_all_products($products) {
    foreach ($products as $product) {
        display_product_card($product);
    }
}

// Обращение к файлу
$products = load_products_from_ini('products.ini');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Карточки товаров</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .product-card {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 220px;
            display: inline-block;
            vertical-align: top;
            border-radius: 5px;
        }
        .product-card h2 {
            font-size: 18px;
            margin: 0 0 10px;
        }
        .product-card p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Список товаров</h1>
    <?php display_all_products($products); ?>
</body>
</html>
