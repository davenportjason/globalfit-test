# MySQL

INSERT INTO `Categories` (`id`, `Name`, `Description`) VALUES
(1, 'Fitness', 'Fitness Description');

INSERT INTO `SubCategories` (`id`, `Category`, `Name`, `Description`) VALUES
(1, 1, 'Workout Supplies', 'Workout Supplies Description');

INSERT INTO `Products` (`id`, `Name`, `Description`, `Price`, `SalePrice`, `Active`, `OnSale`, `Category`, `SubCategory`, `ProductImage`) VALUES
(1, 'Dumbbell 9000', 'Dumbbell 9000 Description', 99.00, 80.01, 1, 1, 1, 1, 'dumbbell9000.jpg');