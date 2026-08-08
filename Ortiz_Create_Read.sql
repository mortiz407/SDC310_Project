--Create Catalog page
INSERT INTO catalog (ProductID, ProductName,ProductDescription, ProductCost, Quantity) VALUES
(1, 'Strawberry Lemonade', 'Handcrafted lemonade with fresh Strawberries', 4.00, 0),
(2, 'Blueberries Lemonade', 'Handcrafted lemonade with fresh Blueberries', 4.00, 0),
(3, 'Watermelon Lemonade', 'Handcrafted lemonade with fresh Watermelon', 4.00, 0),
(4, 'Pinapples Lemonade', 'Handcrafted lemonade with fresh Pinapples', 4.00, 0),
(5, 'Mangos Lemonade', 'Handcrafted lemonade with fresh Mangos', 4.00, 0);

--Create Shopping cart page
INSERT INTO cart (ProductID, ProductName,QuantityOrdered, ProductCost, ProductTotal) VALUES
(1, 'Strawberry Lemonade', 0,4.00, 0),
(2, 'Blueberries Lemonade', 0,4.00, 0),
(3, 'Watermelon Lemonade', 0,4.00, 0),
(4, 'Pinapples Lemonade', 0,4.00, 0),
(5, 'Mangos Lemonade', 0,4.00, 0);

--Read catalog
SELECT *
FROM catalog;

--Read cart
SELECT *
FROM cart;