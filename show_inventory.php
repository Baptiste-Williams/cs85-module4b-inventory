<?php
// show_inventory.php

// Reflection:
// I picked these items because they’re things I actually use every day—like my backpack, laptop, iPhone chargers, wallet, and my work uniform.
// I even tested the system by changing the quantity of my laptop in phpMyAdmin, and it updated right away when I refreshed the page. That was really cool to see—it felt like I was in control of my own database.
// If this was a real inventory system, it could be used by stores or workplaces to keep track of stuff people use or borrow.
// Using PDO is helpful because it keeps the database safe from hackers trying to mess with it using fake input.

try {
  $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $db->query("SELECT * FROM items");
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<!DOCTYPE html>
  <html>
  <head>
    <title>My Inventory</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 40px;
      }
      h2 {
        margin-bottom: 20px;
      }
      .item {
        margin-bottom: 15px;
        padding: 10px;
        border-bottom: 1px solid #ccc;
      }
    </style>
  </head>
  <body>
    <h2>My Inventory</h2>";

  foreach ($items as $item) {
    echo "<div class='item'>{$item['item_name']} ({$item['quantity']} units) - {$item['category']} - Purchased on {$item['purchase_date']}</div>";
  }

  echo "</body></html>";

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

