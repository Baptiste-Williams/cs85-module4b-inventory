<?php
<?php
// show_inventory.php

// Reflection:

// 
// I picked these items because they’re things I actually use every day—like my backpack, laptop, iPhone chargers, wallet, and my work uniform.
// 
// I even tested the system by changing the quantity of my laptop in phpMyAdmin, and it updated right away when I refreshed the page. That was really cool to see—it felt like I was in control of my own database.
// 
// If this was a real inventory system, it could be used by stores or workplaces to keep track of stuff people use or borrow.
// 
// Using PDO is helpful because it keeps the database safe from hackers trying to mess with it using fake input.
// 
// Updated Reflection

try {
  $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $db->query("SELECT * FROM items");
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<h2>My Inventory</h2><ul>";
  foreach ($items as $item) {
    echo "<li>{$item['item_name']} ({$item['quantity']} units) - {$item['category']} - Purchased on {$item['purchase_date']}</li>";
  }
  echo "</ul>";

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
