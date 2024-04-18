-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2024 at 07:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2024_sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `status` char(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `status`) VALUES
(2, 'Laptops', 'Active'),
(3, 'Mobile', 'Active'),
(4, 'Airpods', 'Active'),
(5, 'Headphones', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `Fullname` char(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `event_id` int NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `event_date` date NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_place` varchar(255) NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `extra_images` varchar(255) NOT NULL,
  `status` char(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`event_id`, `event_title`, `event_description`, `event_date`, `event_type`, `event_place`, `main_image`, `extra_images`, `status`) VALUES
(1, 'Galore 2024', 'The college campus came alive with vibrant colors, rhythms, and flavors as students and faculty came together to celebrate \"Global Fusion: Celebrating Diversity,\" a cultural extravaganza aimed at showcasing the rich tapestry of cultures represented within the college community. The event kicked off with an energetic procession featuring students dressed in traditional attire from various countries, proudly waving flags and banners. As attendees gathered in the central courtyard, they were greeted by the tantalizing aroma of international cuisine wafting from food stalls set up around the perimeter. The main stage was adorned with cultural artifacts and decorations, setting the scene for an afternoon of performances that spanned the globe. The program began with an electrifying traditional dance from the host country, setting the tone for what promised to be a truly multicultural experience.', '2024-03-15', 'Event ', 'Hemugadhvi Hall, Rajkot', '66181e0a1b8841 (33).jpg', '66181e0a1b88c1 (5).webp,66181e0a1b88f1 (6).png,66181e0a1b8901 (17).jpg,66181e0a1b8921 (34).jpg,66181e0a1b8931 (35).jpg,66181e0a1b8941 (36).jpg', 'Deleted'),
(2, 'Galore Sports Event', 'Last week, our college hosted an exhilarating Sports Week, showcasing the talents and competitive spirit of our students across various athletic disciplines. From intense matches to friendly competitions, the campus was buzzing with energy as athletes and sports enthusiasts came together to celebrate the spirit of sportsmanship. Inter-College Football Match: The week started with a thrilling football match between our college team and a visiting team from a neighboring institution. Despite a valiant effort, our team narrowly lost, but the match showcased exceptional teamwork and skill. Basketball Tournament: The basketball tournament attracted a large crowd, with teams from different departments competing for the championship title. After intense matches and nail-biting finishes, the Department of Business emerged victorious, showcasing their prowess on the court. Athletics Competition: The athletics competition featured a range of track and field events, including sprints, long jump, and shot put. Students displayed remarkable athleticism and determination, with several records being broken and personal bests achieved. Friendly Matches and Fun Activities: In addition to competitive events, Sports Week also included friendly matches in sports like volleyball, badminton, and table tennis. Students of all skill levels participated enthusiastically, fostering a sense of camaraderie and sportsmanship.', '2024-04-03', 'Event ', 'RK University, Rajkot', '66182150271681 (34).jpg', '661821502716f1 (5).webp,66182150271731 (6).png,66182150271741 (33).jpg,66182150271751 (35).jpg,66182150271771 (36).jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `prod_id` int NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `total_price` int NOT NULL,
  `order_date` date NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `order_status` char(10) NOT NULL,
  `payment_status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `prod_id`, `user_id`, `quantity`, `total_price`, `order_date`, `transaction_id`, `order_status`, `payment_status`) VALUES
(3, 2, 'jankikansagra12@gmail.com', 2, 4000, '2024-04-17', 'order_Nzlj38aHfp849R', 'Confirmed', 'Paid'),
(4, 4, 'jankikansagra12@gmail.com', 2, 3000, '2024-04-17', 'order_Nzlj38aHfp849R', 'Confirmed', 'Paid'),
(5, 2, 'jankikansagra12@gmail.com', 2, 4000, '2024-04-17', 'order_Nzlp1zozHBph7x', 'Confirmed', 'Paid'),
(6, 2, 'jankikansagra12@gmail.com', 2, 4000, '2024-04-18', 'order_NzvM1YIqhtza7j', 'Confirmed', 'Paid'),
(7, 4, 'jankikansagra12@gmail.com', 2, 3000, '2024-04-18', 'order_NzvM1YIqhtza7j', 'Confirmed', 'Paid'),
(8, 4, 'jankikansagra12@gmail.com', 3, 4500, '2024-04-18', 'order_Nzzyffz4MYH85Z', 'Confirmed', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_description` varchar(500) NOT NULL,
  `prod_price` int NOT NULL,
  `prod_quantity` int NOT NULL,
  `prod_category` int NOT NULL,
  `prod_image` varchar(100) NOT NULL,
  `prod_extra_images` text NOT NULL,
  `status` char(8) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_description`, `prod_price`, `prod_quantity`, `prod_category`, `prod_image`, `prod_extra_images`, `status`) VALUES
(1, 'Lenovo Ideapad Slim 5', 'Lenovo IdeaPad Slim 5 Intel Core i7 12th Gen 15.6\" (39.62cm) FHD IPS Thin & Light Laptop (16GB/512GB SSD/Windows 11/Office 2021/Backlit/FPR/3months Game Pass/Storm Grey/1.85Kg), 82SF008WIN', 76550, 10, 2, '661eae1765fb3download (1).jpg', '661eae1765fbc61a930fc5d47cc0018e9160c.webp,661eae1765fbegetty_1208082286_427081.jpg,661eae1765fc0633ff27abe877267cd48ec69-mini-laptop-student-geekplus-small.jpg,661eae1765fc1best-laptops-2.jpg,661eae1765fc2bestlaptops-2048px-9765.webp,661eae1765fc3download (2).jpg,661eae1765fc4download (1).jpg,661eae1765fc5download.jpg', 'Active'),
(2, 'boAt Airpods', 'boAt Airdopes 141 Bluetooth TWS Earbuds with 42H Playtime,Low Latency Mode for Gaming, ENx Tech, IWP, IPX4 Water Resistance, Smooth Touch Controls(Pure White)', 2000, 5, 4, '661eb14a266d3download (22).jpg', '661eb14a266e0download (21).jpg,661eb14a266e3download (20).jpg,661eb14a266e5download (19).jpg,661eb14a266e6download (18).jpg', 'Active'),
(3, 'Redmi ', 'Redmi 13C 5G (Starlight Black, 6GB RAM, 128GB Storage) | MediaTek Dimensity 6100+ 5G | 90Hz Display', 24000, 4, 3, '661eb1b97715ddownload (10).jpg', '661eb1b977165download (8).jpg,661eb1b977167download (7).jpg,661eb1b977168download (6).jpg,661eb1b977169download (5).jpg,661eb1b97716adownload (4).jpg,661eb1b97716bdownload (3).jpg', 'Active'),
(4, 'BoAt Rockers HeadPhones ', 'boAt Rockerz 450R On-Ear Headphones with 15 Hours Battery, 40mm Drivers, Padded Ear Cushions, Easy Access Controls and Voice Assistant(Aqua Blue)', 1500, 3, 2, '661eb24f274dadownload (25).jpg', '661eb24f274e2images (5).jpg,661eb24f274e5images (4).jpg,661eb24f274e6images (3).jpg,661eb24f274e7images (2).jpg,661eb24f274e8download (26).jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `fullname` char(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` char(50) NOT NULL DEFAULT 'Male',
  `mobile` bigint NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Rajkot',
  `profile_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user',
  `status` char(10) NOT NULL DEFAULT 'Inactive',
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`fullname`, `email`, `gender`, `mobile`, `password`, `address`, `profile_pic`, `role`, `status`, `token`) VALUES
('Janki', 'janki.kansagra@rku.ac.in', 'Female', 1231234123, 'Janki@123', 'Rajkot', '66181bd3375d21 (3).jpg', 'Admin', 'Active', '66181bd3375ce66181bd3375d1'),
('Janki Kansagra', 'jankikansagra12@gmail.com', 'Female', 8155825235, 'JAnki@12345', 'Rajkot', '661e5e2818a61desktop-wallpaper-programming-language-bioinformatics.jpg', 'user', 'Active', '661e5e2818a5e661e5e2818a60');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int NOT NULL,
  `User_email` varchar(255) NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`cart_id`, `User_email`, `product_id`, `quantity`, `price`) VALUES
(12, 'jankikansagra12@gmail.com', 1, 1, 76550);

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `img_id` int NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `status` char(8) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`img_id`, `image_name`, `status`) VALUES
(6, '661ea4e357e1faria-slider.webp', 'Inactive'),
(7, '65f7ce361f5fdNAAC_1.webp', 'Active'),
(8, '65f7ce3c28f34nirf-ranking-slider.webp', 'Active'),
(9, '65f7ce43d6d99swacch award.webp', 'Active'),
(10, '65f7ce4acdd8dthe-art-of-living-rku-mou.webp', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `sent_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `token` varchar(256) NOT NULL,
  `otp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `prod_id_FK` (`prod_id`),
  ADD KEY `email_id_FK` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `fk_category` (`prod_category`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `email_FK` (`User_email`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_details`
--
ALTER TABLE `event_details`
  MODIFY `event_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `img_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `email_id_FK` FOREIGN KEY (`user_id`) REFERENCES `registration` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `prod_id_FK` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`prod_category`) REFERENCES `categories` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `email_FK` FOREIGN KEY (`User_email`) REFERENCES `registration` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
