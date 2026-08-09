--Create Catalog page database
INSERT INTO catalog (ProductID, ProductName,ProductDescription, ProductCost, Quantity) VALUES
(1, 'Strawberry Lemonade', 'Handcrafted lemonade with fresh Strawberries', 4.00, 0),
(2, 'Blueberries Lemonade', 'Handcrafted lemonade with fresh Blueberries', 4.00, 0),
(3, 'Watermelon Lemonade', 'Handcrafted lemonade with fresh Watermelon', 4.00, 0),
(4, 'Pinapples Lemonade', 'Handcrafted lemonade with fresh Pinapples', 4.00, 0),
(5, 'Mangos Lemonade', 'Handcrafted lemonade with fresh Mangos', 4.00, 0);

--Create Shopping cart page table 
CREATE TABLE cart (
  ProductID INT NOT NULL,
  ProductName VARCHAR(100) NOT NULL,
  QuantityOrder INT NOT NULL,
  ProductCost DECIMAL(10,2) NOT NULL,
  ProductTotal DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (ProductID)
  );

--Read catalog
SELECT *
FROM catalog;

--Read and check if table was created
SELECT *
FROM cart;
