-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Apr 06, 2024 at 12:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodhub`
--
create database foodhub;

-- --------------------------------------------------------
use foodhub;
--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Time` int(11) NOT NULL,
  `NbServings` int(11) NOT NULL,
  `Difficulty` varchar(255) NOT NULL,
  `Ingredients` varchar(255) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Confirm` tinyint(1) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `AverageRating` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`Id`, `Name`, `Type`, `Time`, `NbServings`, `Difficulty`, `Ingredients`, `Description`, `Image`, `Confirm`, `IdUser`, `AverageRating`) VALUES
(1, 'French Toast', 'Breakfast', 20, 4, 'Easy', '- 4 large eggs\n- 2/3 cup milk\n- 2 teaspoons cinnamon\n- Pinch nutmeg\n- 8 thick slices slightly stale Italian bread ¾ inch\n- 2 tablespoons melted butter or neutral oil\n- Maple syrup, butter, fruit, and confectioners’ sugar for serving', 'To make this easy French toast recipe:\nWhisk egg, vanilla and cinnamon in shallow dish. Stir in milk.\nDip bread slices in egg mixture, turning to coat evenly on both sides.\nCook bread slices on lightly greased nonstick griddle or skillet on medium heat until cooked through and browned on both sides. Serve with Easy Spiced Syrup (recipe follows), if desired. Voila, easy French toast.	Easy Spiced Syrup: Add 1 teaspoon McCormick® Pure Vanilla Extract and 1/4 teaspoon McCormick® Ground Cinnamon to 1 cup pancake syrup; stir well to mix. Serve warm, if desired.', '1.jpg', 1, 1, 2),
(2, 'Croque Madame', 'Breakfast', 30, 2, 'Medium', '- 4 (1/2-inch-thick) good-quality firm white sandwich bread slices\r\n- 3 tablespoons unsalted butter, softened, divided\r\n- 1 tablespoon all-purpose flour\r\n- ¾ cup whole milk\r\n- 4 ounces Gruyère cheese, grated\r\n- ½ teaspoon kosher salt\r\n- ¼ teaspoon black p', 'Spread butter on bread, make Mornay sauce, assemble sandwiches, and broil. Fry eggs and top each sandwich. Garnish with chives and sea salt.', '2.webp', 1, 1, 0),
(3, 'Chicken Curry', 'Dinner', 45, 4, 'Medium', '- 2 lbs. chicken cut into serving pieces\r\n- 1 tablespoon curry powder\r\n- 1 piece potato cubed\r\n- 4 cloves garlic minced\r\n- 2 stalks celery sliced\r\n- 1 piece red bell pepper sliced\r\n- 2 pieces long green pepper\r\n- 1 piece onion chopped\r\n- 2 thumbs ginger c', 'Heat oil in a pan and sauté the onion paste, garlic and ginger paste till golden brown.Add tomato puree. When the tomato puree dries up, add coriander powder, cumin powder, garam masala, red chilli powder, turmeric powder and salt. Let the spices cook.Add chicken pieces into the masala. Stir well and cook till they are golden brown.Add 1/2 cup of water and stir. Cover with a lid and let it simmer till the chicken is cooked.Finally Garnish with chopped coriander and serve.', '3.jpg', 1, 1, 0),
(4, 'Frito Pie', 'Dinner', 40, 6, 'Easy', '- 1/2 pound ground beef\n- 1/4 cup water\n- 1 tablespoon tomato paste\n- 1 tablespoon chili powder\n- 1/2 teaspoon ground cumin\n- 1/4 teaspoon onion powder\n- 1/4 teaspoon garlic powder\n- 1/4 cup chili beans\n- Fritos corn chips\n- Diced onions, jalapeñ', 'Brown beef and season with a packet of taco seasoning. Stir in remaining filling ingredients.\nLayer Fritos, cheese, and the meat mixture in a casserole dish per the recipe below.\nTop with more cheese and bake until bubbly.', '4.webp', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Rate` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Recipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`Id`, `Title`, `Description`, `Rate`, `User`, `Recipe`) VALUES
(3, 'Amazing', 'Love this recipe!!', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `nbPost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Email`, `UserName`, `Password`, `Gender`, `Status`, `nbPost`) VALUES
(2, 'samarbenhouidi6@gmail.com', 'samar insat', '$2y$10$2iZimtKynVlyuk/T/7Z8IuSCu0AbAuUiNg8mN9/IED9IGEIybAETy', '1', 0, 0),
(23, 'benameureya953@gmail.com', 'Eya BenAmeur', '$2y$10$UMu1IJoQOjLzY5lO0hONw.wPQ8uGJK6yVURUCD5DFX91ZqqgZSHqq', '1', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

CREATE VIEW `confirmed_recipes` AS
SELECT
  `Id`,
  `Name`,
  `Type`,
  `Time`,
  `NbServings`,
  `Difficulty`,
  `Ingredients`,
  `Description`,
  `Image`,
  `IdUser`,
  `AverageRating`
FROM
  `recipes`
WHERE
  `Confirm` = 1;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
