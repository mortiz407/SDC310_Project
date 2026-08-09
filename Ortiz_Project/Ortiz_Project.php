<?php
$database = new PDO("mysql:host=localhost;dbname=sdc310_project;charset=utf8mb4","root","");

$products = $database->query("SELECT * FROM catalog")->fetchAll();
?>

<html>

  <head>
    <title>Mannuel Ortiz Project</title>
  </head>

  <body>
    <h1 style="text-align: center;">Product Catalog</h1>

    <?php if (count($products) > 0):
      foreach ($products as $product):
    ?>
        <div>
          <h3 style="text-align: center;">
            ID: <?= $product['ProductID']?>  | <?= htmlspecialchars($product['ProductName'])?> |
             $<?= number_format($product['ProductCost'], 2)?>
          </h3>
          <p style="text-align: center;"><?= htmlspecialchars($product['ProductDescription'])?></p>
        </div>
    <?php endforeach;
      else: ?>
        <p>No product was found in catalog</p>
    <?php endif; ?>
  </body>
</html>