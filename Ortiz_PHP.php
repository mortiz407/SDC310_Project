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
          <h3>
            ID: <?= $product['ProductID']?>  | <?= htmlspecialchars($product['ProductName'])?> | <?= number_format($product['ProductCost'], 2)?>
          </h3>
          <p><?= htmlspecialchars($product['ProductDescription'])?></p>
        </div>
    <?php endforeach;
      else: ?>
        <p>No product was found in catalog</p>
    <?php endif; ?>
  </body>
</html>
