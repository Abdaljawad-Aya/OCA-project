-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2021 at 03:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project6`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`) VALUES
(4, 'Monther', 'meduwudefe@mailinator.com', 'Pa$$w0rd!', '../images/banner-02.jpg'),
(5, 'Ahmad', 'ahmad@gmail.com', 'Pa$$w0rd!', '../images/product-min-02.jpg'),
(6, 'Dana', 'vopipahawy@mailinator.com', 'Pa$$w0rd!', '../images/product-10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(20) NOT NULL,
  `brand_logo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_logo`) VALUES
(3, 'H&M', '../images/brands/hm-logo.png'),
(4, 'GAP', '../images/brands/Gap-Logo.png'),
(5, 'ZARA', '../images/brands/zara-logo.png'),
(6, 'ADIDAS', '../images/brands/adidas-logo.png'),
(7, 'Nike', '../images/brands/nike-logo.png'),
(8, 'PUMA', '../images/brands/puma-logo.png'),
(9, 'Apple', '../images/brands/Apple-logo.png'),
(10, 'LENOVO', '../images/brands/Lenovo-logo.png'),
(11, 'HP', '../images/brands/HP-logo.png'),
(12, 'WD Elements', '../images/brands/wd-logo.png'),
(13, 'Seagate', '../images/brands/Seagate-logo.png'),
(14, 'Samsung', '../images/brands/Logo-Samsung.png'),
(15, 'Huawei', '../images/brands/huawei-logo.png'),
(16, 'Growing Gardens', '../images/brands/growing gardens.png'),
(17, 'Ikea', '../images/brands/ikea-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_desc`, `category_image`) VALUES
(19, 'Electronics', 'Electronics is a category where Aroma’s own brands really shine: Aroma Devices has its own set of subcategories,  including Kindle E-readers, Fire Tablets, Fire TV, and Echo & Alexa.The Electronics category on Amazon is made up of the following subcategories: TV & Video, Audio & Home Theater, Computers, Camera & Photo, Wearable Technology, Car Electronics & GPS, Portable Audio, Cell Phones, Office Electronics, Musical Instruments', '../images/categories/Electtronics.png'),
(20, 'Clothes', 'Clothing (also known as clothes, apparel and attire) is items worn on the body. Clothing is typically made of fabrics or textiles but over time has included garments made from animal skin or other thin sheets of materials put together. The wearing of clothing is mostly restricted to human beings and is a feature of all human societies. The amount and type of clothing worn depends on gender, body type, social, and geographic considerations.', '../images/categories/clothes.png'),
(21, 'Home Decoration', 'nterior design is the art and science of enhancing the interior of a building to achieve a healthier and more aesthetically pleasing environment for the people using the space. An interior designer is someone who plans, researches, coordinates, and manages such enhancement projects. Interior design is a multifaceted profession that includes conceptual development, space planning, site inspections, programming, research, communicating with the stakeholders of a project, construction management, and execution of the design.', '../images/categories/Home_Decaoration.png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(20) DEFAULT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_location` varchar(100) DEFAULT NULL,
  `customer_mobile` varchar(10) DEFAULT NULL,
  `customer_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_location`, `customer_mobile`, `customer_image`) VALUES
(4, 'dana toughoj', 'cehory@mailinator.com', 'Pa$$w0rd!', 'Amman', '0786465372', '../images/customers/product-16.jpg'),
(5, 'Amal Velasquez', 'fogamefu@mailinator.com', 'Pa$$w0rd!', 'Nulla perferendis id', NULL, '../images/customers/slide-07.jpg'),
(6, 'dana toughoj', 'danatoughoj@gmail.com', 'Dana_123456', 'Amman', '0786465372', '../images/customers/developer2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_type` varchar(20) NOT NULL,
  `purchase_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `total`, `order_type`, `purchase_date`) VALUES
(36, 4, 2984, 'Cash on Delivery', '2021-02-06'),
(37, 4, 2984, 'Cash on Delivery', '2021-02-06'),
(38, 4, 2400, 'Cash on Delivery', '2021-02-06'),
(39, 6, 86, 'Cash on Delivery', '2021-02-06'),
(42, 6, 1070, 'Cash on Delivery', '2021-02-07'),
(43, 6, 4824, 'Cash on Delivery', '2021-02-07'),
(44, 6, 80, 'Cash on Delivery', '2021-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_products_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_products_id`, `order_id`, `product_id`, `quantity`) VALUES
(68, 39, 10, 1),
(69, 39, 11, 3),
(72, 42, 39, 1),
(73, 42, 10, 5),
(74, 43, 11, 1),
(75, 43, 40, 4),
(76, 44, 66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `discount` float NOT NULL DEFAULT 1,
  `product_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `discount`, `product_desc`, `product_image`, `product_quantity`, `sub_category_id`, `brand_id`) VALUES
(10, 'Splendid Puff Sleeve', 20, 0.3, 'This Splendid pullover is a welcome update to the usual long sleeved tees in your closet. Wear this puff-sleeve top with everything from denim skirts, to cropped trousers—the options are almost endless!Imported Shell: 40% viscose/30% nylon/25% polyester/5% cashmere Fabric: Lightweight knit Dry clean Crew neckline and long puff sleeves, Ribbed edges Length: 22.5in / 57cm, from shoulder', '../images/products/sweater8.png', 100, 7, 3),
(11, 'Bassike Oversized Knit', 30, 0.2, 'A cool and cozy layer for all your weekend adventures, this Bassike sweater features a stylish stand collar and bold stripes, while exaggerated cuffs punctuate extra-long sleeves.Color: Natural/Pink/Black 70% cotton Imported Shell: 70% cotton/30% merino wool Fabric: Heavyweight knit Hand wash or dry clean Stand collar, Long sleeves with exaggerated cuffs Length: 19.75in / 50cm, from shoulder', '../images/products/sweater16.png', 100, 7, 5),
(12, 'Briallon Cardigan', 35, 1, 'A cute addition to any cardigan collection, this LOVESHACKFANCY sweater is adorned with plush embroidered shapes. Wear yours with light-wash denim and a monochrome tee.Color: Oatmeal Imported Shell: 43% nylon/30% cotton/27% wool Fabric: Mid-weight chunky knit Hand wash Button placket and long sleeves, Plush floral embroidery, Ribbed edges Length: 18in / 46cm, from shoulder', '../images/products/sweater12.jpg', 100, 7, 4),
(13, 'Cotton Mock Neck', 46, 1, 'A relaxed silhouette and ruffled yoke are unique details on this 525 sweater. Pair it with black denim and ankle boots for a put-together look.Color: Burnt Sienna 100% Cotton Imported Shell: 100% cotton Fabric: Lightweight ribbed knit Wash cold Mock neck and long sleeves, Ruffle yoke Length: 17.75in / 45cm, from shoulders', '../images/products/sweater11.jpg', 100, 7, 4),
(14, 'Phat Buddha', 60, 0.5, 'Bring a touch of charming, retro-inspired style to your off-duty wardrobe with this Phat Buddha sweater, which features a classic half-zip design and extra-plush fleece fabric.Color: Black Shell: 100% polyester Fabric: Lightweight fleece Hand wash Fold-over collar with half-zip placket, Leopard-print ribbed edges Length: 22in / 56cm, from shoulder', '../images/products/sweater3.png', 100, 7, 5),
(15, ' Brushed Crew Sweater', 54, 1, 'Winter style gets a fun update via this Essentiel Antwerp jacket, a plush layer with imitation pearl accents and touches of colorful thread. To complete your look, add a high-rise pair of sweats or trousers.Color: Disco Pink Imported Shell: 45% wool/30% alpaca/25% polyamide Fabric: Mid-weight brushed knit Dry clean Crew neckline and long sleeve, Ribbed edges Length: 29.25in / 74cm, from shoulder', '../images/products/sweater14.jpg', 100, 7, 3),
(16, 'Ditsy Floral Dress', 120, 1, 'Color: Black Imported Shell: 50% cotton/50% viscose Lining: 100% cotton Fabric: Lightweight, non-stretch weave Hand wash or dry clean Square neck and puff sleeves with elastic ruffle cuffs, Smocked elastic waistband', '../images/products/dress12.jpg', 100, 11, 5),
(17, 'Zirror Tafta', 300, 1, 'Color: Combo1 Black Imported Shell: 100% polyester Lining: 100% viscose Fabric: Lightweight, non-stretch taffeta Wash cold or dry clean Ruffle trim, Round neckline, 3/4 puff sleeves with elastic cuffs', '../images/products/dress9.jpg', 100, 11, 3),
(18, 'Romwe Ruched Dress', 250, 1, '93% Cotton, 7% Spandex Pull On closure Material: Cotton and Spandex, stretchy and soft Feature: Square neck, lettuce trim, ruched bust, solid color, short sleeve, above knee length bodycon dress Occasion: Good choise for party, work, office, nightout, vacation, dinner date and so on Style: This dress can perfectly show your body curve,make you more attractive and lovely Size: Please refer to the size chart as below(not amazon size)', '../images/products/dress17.jpg', 100, 11, 4),
(19, 'Derek Lam 10 Crosby', 90, 1, 'Color: Grey Melange 100% Cotton Imported Shell: 100% cotton Fabric: Mid-weight french terry Dry clean Ruffle hem, Crew neckline and long puff sleeves , Ribbed edges Length: 32.75in / 83cm, from shoulder', '../images/products/dress18.jpg', 100, 11, 5),
(20, 'Plaid Dress', 55, 1, 'Color: Black 65% Polyester, 35% Cotton Zipper closure Material: Cotton and Polyester Feature: Plaid, zipper back, adjustable strap, flared hem, high waist overall dress A great choice for come with a long/short sleeve t-shirt, leggings Sweet and stylish overall dress, suitable for vacation, casual wearing, school, party and daily wear Size: Please refer to the size chart as below(not amazon size)', '../images/products/dress19.jpg', 100, 11, 5),
(21, 'Alexis Dress', 60, 1, 'Color: Berry Embroidery Imported Shell: 100% linen Lining: 100% cotton Fabric: Mid-weight, non-stretch linen weave Dry clean Square neckline, Hook-and-eye and hidden zip at back, Empire waist and tiered skirt, Embroidered geometric floral pattern', '../images/products/dress20.jpg', 299, 11, 3),
(22, 'SLVRLAKE Jeans', 32, 1, 'Another wardrobe staple from SLVRLAKE, these jeans feature allover fading for that perfectly worn-in look, while a classic straight-cut lends itself well to sky-high heels and casual flats alike.Color: Sweet Thing Shell: 100% cotton Fabric: Mid-weight, non-stretch denim Wash cold Fading and whiskering Rise: 10.75in / 27cm', '../images/products/jeans1.jpg', 100, 12, 3),
(23, 'ASKK Jax Jeans', 66, 1, 'The ASKK NY Jax Jeans are crafted from soft, stretch denim, and are detailed with light fading throughout. The ankle-grazing silhouette is detailed with a raw hem, making them pair well with sneakers and sandals alike.Color: Russell Shell: 98% cotton/2% polyurethane Fabric: Mid-weight stretch denim Wash cold Fading and whiskering Rise: 9in / 23cm', '../images/products/jeans2.jpg', 100, 12, 4),
(24, 'Waist Jeans', 56, 0.4, 'These high-rise Good American skinny jeans are crafted from soft, stretchy denim, and feature a jet-black wash that makes them easy to work into casual and polished looks alike.Color: Black Shell: 47% cotton/44% rayon/8% elasterell-p/1% spandex Fabric: Lightweight, super-stretch denim Wash cold Rise: 10.75in / 27cm Inseam: 28in / 71cm', '../images/products/jeans3.jpg', 100, 12, 5),
(25, 'London Jeans', 87, 1, 'Make the most of your next day off in these high-quality SLVRLAKE jeans. Show off the high waist with a tucked-in tee for a put-together yet relaxed look.Color: Heartache Shell: 100% cotton Fabric: Mid-weight, non-stretch denim Wash cold High-rise silhouette, Fading and whiskering Rise: 11in / 28cm', '../images/products/jeans5.jpg', 100, 12, 3),
(26, 'Straight Leg Jeans', 34, 1, 'These SLVRLAKE jeans crafted in non-stretch denim with a forever classic high rise and straight cut make a solid addition to your denim collection. Off-white is easily paired with just about anything and this pair is seamlessly dressed up or down.Color: Ecru Shell: 100% cotton Fabric: Mid-weight, non-stretch denim Wash cold High rise silhouette Rise: 11in / 28cm', '../images/products/jeans6.jpg', 100, 12, 3),
(27, 'Crop Bootcut Jeans', 86, 1, 'An everyday pair from one of our go-to denim brands, these J Brand Franky High Rise Bootcut Jeans are crafted from soft stretch denim and have an ankle-grazing silhouette.Color: Earthen Imported Shell: 43% viscose/33% cotton/17% lyocell/5% polyester/2% elastane Fabric: Lightweight, super-stretch denim Wash cold Ankle-length, boot-cut silhouette, Fading and whiskering Rise: 10.75in / 27cm', '../images/products/jeans7.jpg', 100, 12, 4),
(28, 'Ankle Skinny Jeans', 50, 1, 'An easy, everyday pair from one of our go-to denim brands, these Rag & Bone/JEAN Mid-rise Ankle Skinny jeans have a soft stretch and are presented in a deep dark wash that goes with just about everything.Color: Carmen Shell: 50% modal/40.5% cotton/8% polyester/1.5% elastane Fabric: Mid-weight stretch denim Wash cold Fading and whiskering Rise: 9in / 23cm', '../images/products/jeans8.jpg', 100, 12, 4),
(29, 'Ultraboost 21 Shoes', 100, 1, 'Prototype after prototype. Innovation after innovation. Testing after testing. Meet us in the hot pursuit of the pinnacle harmonization of weight, cushioning, and responsiveness. Ultraboost 21. Say hello to incredible energy return.', '../images/products/shoes1.jpg', 100, 13, 6),
(30, 'DNA Shoes', 120, 1, 'A run on the boardwalk or picking up trash on the coastline. This version of the adidas Ultraboost Shoes are for people who enjoy the beach but also keep its interests at heart. The soft adidas Primeknit upper offers a mix of support and flex. The Boost outsole offers comfort youll have to feel to believe.n', '../images/products/shoes2.jpg', 100, 13, 6),
(31, 'CLR 101 Shoes', 200, 1, 'In partnership with S.E.E.D., the School for Experiential Education in Design, we invited the inaugural class to reimagine the iconic Superstar. The Superstar Gen 2020 CLR 101 has all the signature makers that made them iconic, from the classic 3-stripes to the rubber shell toe and it marks the beginning for the S.E.E.D. designers.', '../images/products/shoes3.jpg', 100, 13, 6),
(32, 'Daily 3.0 Shoes', 60, 1, 'A fresh take on a classic, these adidas shoes blend a heritage feel with modern materials and design. Your walk across campus has never looked or felt this good.', '../images/products/shoes4.jpg', 100, 13, 6),
(33, 'Air Jordan 6 Retro', 99, 1, 'Taking color, material and graphic cues from the AJ7 nicknamed \"Hare Jordan,\" the Air Jordan 6 Retro hops out in celebration of the Spring holiday with a fresh remastering of iconic AJ heritage.  Shown: White/Black/Carmine Style: CT8529-106', '../images/products/shoes5.jpg', 100, 13, 7),
(34, 'Nike Blazer Shoes', 150, 0.6, 'In the 70s, Nike was the new shoe on the block. So new in fact, we were still breaking into the basketball scene and testing prototypes on the feet of our local team. Of course, the design improved over the years, but the name stuck. The Nike Blazer Mid 77 Vintage—classic since the beginning.', '../images/products/shoes7.jpg', 100, 13, 7),
(35, 'Infinity Run Shoes', 200, 1, 'The Nike React Infinity Run Flyknit 2 continues to help keep you running. A refreshed upper uses Flywire technology that combines with Flyknit for support and breathability where you need it. The high foam heights provide soft responsiveness and long-lasting comfort. Its still one of our most tested shoes, designed to help you feel the potential when your foot hits the pavement.', '../images/products/shoes8.jpg', 100, 13, 7),
(36, 'Suede Classic Shoes', 160, 1, 'The Suede has been kicking around for a long time. From 60s basketball warm-up shoe to 90s hip hop legend, its been worn by greats across generations and made its mark on.  Style: 352634_03  Color: black-white', '../images/products/shoes9.jpg', 100, 13, 8),
(37, 'RS-Fast Shoes', 50, 1, 'Faster and fresher than any of our RS kicks yet. The RS-Fast is reinventing street style with a progressive design that combines early 2000s cues and futuristic vibes. Style: 380562_05  Color: Puma Black-White-Red Blast', '../images/products/shoes11.jpg', 100, 13, 8),
(38, 'All-Pro Basketball Shoes', 40, 1, 'The legendary Clyde franchise is taking style and performance to a new level with the Clyde All-Pro. We’re soaring into this season with this lightweight pair of kicks that ar.  Style: 194039_03  Color: Puma White-Puma Black', '../images/products/shoes12.jpg', 200, 13, 8),
(39, 'Apple M1 Chip ', 1000, 1, 'Apple M1 chip with 8-core CPU, 8-core GPU, and 16-core Neural Engine 8GB unified memory 256GB SSD storage¹ 13-inch Retina display with True Tone Magic Keyboard Touch Bar and Touch ID Force Touch trackpad Two Thunderbolt / USB 4 ports', '../images/products/apple-laptop2.jpg', 100, 14, 9),
(40, 'MacBook Pro', 1200, 1, '2.6GHz 6-core 9th-generation Intel Core i7 processor Turbo Boost up to 4.5GHz AMD Radeon Pro 5300M with 4GB of GDDR6 memory 16GB of 2666MHz DDR4 memory 512GB of SSD storage¹ 16-inch Retina display with True Tone Magic Keyboard Touch Bar and Touch ID Four Thunderbolt 3 ports', '../images/products/apple-laptop3.jpg', 100, 14, 9),
(41, 'HP Laptop 15t-dw300', 900, 0.5, 'Stay connected to what matters most with long-lasting battery life and a sleek and portable, micro-edge bezel design. Built to keep you productive and entertained from anywhere, the HP 15 laptop features reliable performance and an expansive display - letting you stream, surf and speed through tasks from sun up to sun down.', '../images/products/hp-laptop1.jpg', 100, 14, 11),
(42, 'HP ENVY Laptop', 750, 1, 'As big as your imagination. The immersive, 17 display allows you to easily create true-to-life visuals with stunning, accurate colors. Customizable performance puts the controls in your hands, and peace of mind features ensure your creations are safe-guarded until you’re ready to share them.', '../images/products/hp-laptop2.jpg', 100, 14, 11),
(43, 'HP Spectre', 800, 1, 'HP most powerful Spectre convertible yet looks stunning and runs smooth with a jaw-dropping high definition, near-borderless 4K UHD[2] display and up to 6 hours and 45 minutes of battery life that takes you from day to night. Add in the security features you need for peace of mind and this stylish powerhouse has everything you need to power through.', '../images/products/hp-laptop3.jpg', 100, 14, 11),
(44, 'HP Pavilion', 1500, 1, 'Sacrifice nothing with the thin and powerful HP Pavilion Gaming Laptop. Experience high-grade graphics and processing power for gaming and multitasking, plus improved thermal cooling for overall performance and stability. Immerse yourself in the game with a narrow bezel display and custom-tuned audio. The perfect balance between work and play, so you can do it all.', '../images/products/hp-laptop4.jpg', 100, 14, 11),
(45, 'ThinkPad X1 Carbon', 950, 1, 'One of our first Intel® mobility-certified laptops, the 14 X1 Carbon Gen 8 delivers superb mobile performance with long-lasting battery life, best-in-class connectivity, and rapid charging technology. Enjoy advanced security options, enhanced audio, and amazing displays. This legendary laptop combines exquisite detail, durability, and power to create the ultimate in premium performance.', '../images/products/lenovo-laptop1.jpg', 100, 14, 10),
(46, 'Yoga C940 (15)', 600, 1, 'Meet the Yoga C940, a powerhouse 15.6 entertainment 2-in-1 engineered with your experience in mind. Stylish design touches like ultrathin bezels come together with robust multimedia features and speedy processing—along with NVIDIA® discrete graphics to fuel your creativity. Crafted from premium aluminium, this performance laptop embodies world-class craftsmanship and elevated design. ', '../images/products/lenovo-laptop2.jpg', 100, 14, 10),
(47, 'Legion 5i (17)', 650, 1, 'Offering everything you need to start dominating the most popular AAA titles, the Legion 5i 17 pairs flexibility with incredible power, as well as a clean and minimalist design. Powered by 10th Gen Intel® Core™ H Series processors, NVIDIA® GeForce™ graphics, and a vast 17.3 display, you can watch your favorite games come to life.', '../images/products/lenovo-laptop3.jpg', 100, 14, 10),
(48, 'Lenovo ThinkBook 15', 450, 1, 'Powered by Windows 10 Pro and up to 10th Gen Intel® Core™ processing, the Lenovo ThinkBook 15 combines high performance with intuitive, time-saving features. Built with security, reliability, and durability in mind, this 15-inch business laptop enables you to work confidently anywhere. Options include Intel® Optane™ memory, WiFi 6, and discrete graphics.', '../images/products/lenovo-laptop4.jpg', 100, 14, 10),
(49, 'WD Elements Desktop', 200, 1, 'High Capacity in a Compact Design The compact design offers up to 18TB capacity, making WD Elements desktop storage the ideal solution for easy, add-on storage of all your important photos, music, videos and files. ', '../images/products/wd2.jpg', 100, 15, 12),
(50, 'WD Elements Portable', 50, 1, 'WD Quality Inside And Out We know your data is important to you. So we build the drive inside to our demanding requirements for durability, shock tolerance, and long-term reliability. Then we protect the drive with a durable enclosure designed for style and protection.', '../images/products/wd4.jpg', 100, 15, 12),
(51, 'WD My Cloud Expert', 1100, 1, 'High-Performance Storage To Save, Stream And Share Anywhere  Keep your media safe in a single place on this high-performance Network Attached Storage (NAS) device, and access and stream it from anywhere with an internet connection.', '../images/products/wd3.jpg', 100, 15, 12),
(52, 'Seagate Basic', 40, 1, 'Whether you want to free up hard drive space on your Windows computer or simply back up files so that you’ve got a second copy, Seagate Basic makes it ridiculously easy — just drag and drop! With up to 5 TB of capacity, there’s plenty of room for your growing collection of files.', '../images/products/SG1.jpg', 100, 15, 13),
(53, 'Seagate Central', 250, 1, 'But wait a minute! This review is all about the Seagate® Central. For under $170.00 for the 2 TB model and under $230.00 for the 4 TB model, it’s competitive with any number of NAS devices. One thing they don’t have, however, is the killer brand of Seagate. Seagate has been around for a long time, because they make superior products and because they’re quick to innovate with appropriate new technology, and they back their products up. My experiences with Seagate go back to my first office PC (sorry, Mac users…) that had a Seagate ST-225 20 megabyte (yes, megabyte) hard drive. It was built like a tank and never failed me. But I digress…', '../images/products/SG2.jpg', 100, 15, 13),
(54, 'Seagate Backup Plus', 70, 1, 'Small enough for a loaded laptop bag, spacious enough for loads of content — Seagate® Backup Plus Slim portable drive is the perfect marriage of easy portability and truly useful file storage. Easily plug into Windows and Mac® computers via USB 3.0, and enjoy helpful tools like customized backup and folder mirroring.', '../images/products/SG3.jpg', 100, 15, 13),
(55, 'iPhone 11', 900, 1, 'As part of our efforts to reach our environmental goals, iPhone 11 does not include a power adapter or EarPods. Included in the box is a USB‑C to Lightning cable that supports fast charging and is compatible with USB‑C power adapters and computer ports.  We encourage you to re‑use your current USB‑A to Lightning cables, power adapters, and headphones which are compatible with this iPhone. But if you need any new Apple power adapters or headphones, they are available for purchase.', '../images/products/apple-mobile1.jpg', 100, 16, 9),
(56, 'iPhone 11 Pro', 1000, 1, 'As part of our efforts to reach our environmental goals, iPhone 11 does not include a power adapter or EarPods. Included in the box is a USB‑C to Lightning cable that supports fast charging and is compatible with USB‑C power adapters and computer ports.  We encourage you to re‑use your current USB‑A to Lightning cables, power adapters, and headphones which are compatible with this iPhone. But if you need any new Apple power adapters or headphones, they are available for purchase.', '../images/products/apple-mobile2.jpg', 100, 16, 9),
(57, 'iPhone XR', 800, 1, 'As part of our efforts to reach our environmental goals, iPhone XR does not include a power adapter or EarPods. Included in the box is a USB‑C to Lightning cable that supports fast charging and is compatible with USB‑C power adapters and computer ports.  We encourage you to re‑use your current USB‑A to Lightning cables, power adapters, and headphones which are compatible with this iPhone. But if you need any new Apple power adapters or headphones, they are available for purchase.', '../images/products/apple-mobile3.jpg', 100, 16, 9),
(58, 'iPhone 12 mini', 950, 1, 'iPhone 12 mini packs big features in a 5.4-inch design. 5G to download movies on the fly and stream high-quality video. A beautifully bright and compact Super Retina XDR display. Ceramic Shield with 4x better drop performance. Incredible low-light photography with Night mode on all cameras. Cinema-grade Dolby Vision HDR video recording, editing, and playback. Powerful A14 Bionic chip. And new MagSafe accessories for easy attach and faster wireless charging. Its big news for mini.', '../images/products/apple-mobile4.jpg', 100, 16, 9),
(59, 'Samsung Galaxy S21', 300, 1, 'With the ability to record in 8K, your videos arent just cinema quality, theyre double the resolution of 4K video. Or use the 64MP camera for still shots that come out clear whether its day or night. Better yet, why not do both? Single Take AI transcends the usual restrictions of photo and video editing to capture lifes greatest moments, wherever they happen, in one single take¹. Galaxy S21 5G, made for the epic in every day.', '../images/products/samsung-mobile4.jpg', 100, 16, 14),
(60, 'Samsung Galaxy Note9', 450, 1, 'The S Pens learned some new tricks. Use it to take photos without touching your phone, as well as to take notes and create masterpieces on the screen. See your photos get better, with clever AI to help you get the most out of every shot. And get a battery that will keep up with you, even on your busiest days.', '../images/products/samsung-mobile3.jpg', 100, 16, 14),
(61, 'Samsung Galaxy Note 20', 500, 1, 'Tashi InfoComm Limited is the first private cellular company in Bhutan, a separate entity under Tashi Group of Companies. The company was incorporated on January 23, 2007, under the Companies Act of Bhutan 2016, after it won an international bid to operate as the second cellular operator in Bhutan.', '../images/products/samsung-mobile2.jpg', 100, 16, 14),
(62, 'Samsung A10s 10', 450, 1, '6.2 inches of HD+ TFT screen for a phone youll love to watch. Whether youre into sitcoms or MMORPGs, Galaxy A10ss Infinity-V Display changes the way you experience them by putting you right in the action. See how far the experience takes you on the v-cut screen.', '../images/products/samsung-mobile1.jpg', 100, 16, 14),
(63, 'HUAWEI Y6 Prime', 250, 1, 'Unique Faux Leather Design Limitless 6.09 Dewdrop Display Stunning 8 MP Selfie CameraTwo-day delivery on all in-stock items excluding orders made on Thursday, during the week end or official holidays. Which will be processed on the first working day after holiday. Delivery service is available inside Jordan only (Except for Aqaba). For More information you may check Shipping Policy: https://huaweieshop.jo/shipping-policy', '../images/products/huawei-mobile1.jpg', 100, 16, 15),
(64, 'HUAWEI P20', 300, 1, 'If you’re looking for a phone that captures striking photographs, then you’re in luck with the Huawei P30 Lite New Edition. With its amazing triple camera system and large HD display – this is the phone for you.  • 48MP + 8MP + 2MP triple rear cameras for crisp photographs. • 6.1-inch Full HD dewdrop display, perfect for streaming videos. • Impressive 256GB storage – so you never run out of space.', '../images/products/huawei-mobile2.jpg', 100, 16, 15),
(65, 'Huawei Y7P', 400, 1, 'Huawei Mobile Y7P Aurora Blue Y7PBL   6.39 Inches HD  Octa-core Kirin 710 - 4GB RAM + 64GB ROM EMUI 9.1 Non-removable Li-Po 4000 mAh Battery Front Camera : 8 MP Rear Camera : 48 MP & 8 MP & 2 MP Fingerprint Warranty: 1 Year* *Terms and conditions apply ', '../images/products/huawei-mobile3.jpg', 100, 16, 15),
(66, 'HUAWEI Y9', 399, 0.8, 'Two-day delivery on all in-stock items excluding orders made on Thursday, during the week end or official holidays. Which will be processed on the first working day after holiday. Delivery service is available inside Jordan only (Except for Aqaba). For More information you may check Shipping Policy: https://huaweieshop.jo/shipping-policy', '../images/products/huawei-mobile4.jpg', 100, 16, 15),
(67, 'Godwin Cachepot Plant', 30, 1, 'GODWIN CACHEPOT By Longhi Collection Loveluxe 2020 – Sartoria collection Type Round plant pot Materials Leather, Fiberglass (GRP) Designers Giuseppe Iasparra Manufacture year 2013 Product code Y 712 Godwin cachepot is a cachepot for potted plants and flowers.‎ Fiberglass structure covered in leather or fabric from the catalogue.‎ Metal base and top in the finishes: - bright light gold, - matt Champagne gold, - bright chrome, - bright black chrome, - matt satin bronze, - bright pink gold, - matt pink gold.‎', '../images/products/plant6.jpg', 100, 17, 16),
(68, 'Ruini Flower pot', 40, 0.7, 'Modular plant pot made of steel, perfect for outdoor environments.‎  FEATURES: - Modular - Internal support for the flowerpot - Perfect for outdoor environments - Steel structure, accessories and bowl - Lateral holes for a pratical movements - Anti-slip pads - The magnetic tray is always anchored, ensuring the movement - Customizable', '../images/products/plan5.jpg', 100, 17, 16),
(69, 'STRATUM | Corner sofa', 1000, 1, 'STRATUM is a modular sofa consisting of two layers.‎ LAYER 1: Sofa with internal wooden structure with polyurethane foam padding and seat cushions in non-deformable polyurethane.‎ Removable cushions and frame cover.‎ Straight module with 1 arm left/right.‎ LAYER 2: Sofa with internal wooden structure with polyurethane foam padding and seat cushions in non-deformable polyurethane.‎ Removable cushions and frame cover.‎ Deeper modules with wing to connect to Layer 1.‎', '../images/products/fur1.jpg', 100, 18, 17),
(70, 'Classic Chair', 50, 1, 'Were head over heels in love with contemporary design and superb quality. We literally search the world to bring you the very best in selection, style and quality, then back it with unmatched customer service and design advice.  The way we see it, lifes too short for dull, boring furniture. ', '../images/products/fur2.jpg', 100, 18, 17),
(71, 'Senso Sofa - Cognac', 600, 1, 'With its solid wood feet and a two-tone color variation in the supple leather cover, the Senso sofa will give a touch of originality to your living room. This Italian-made sofa is great for lounging and it features comfortable seats with adjustable headrests. ', '../images/products/fur3.jpg', 100, 18, 17),
(72, 'Ray Dining Chair', 30, 1, 'The Ray dining chair is all Italian-made with the best top grain leather.  We stock the Ray dining chair in Light Grey leather with legs in Anthracite powder-coat.', '../images/products/fur4.jpg', 100, 18, 17),
(73, 'Reclining Chair', 200, 1, 'The Sorento is a new and luxurious, Italian-made recliner chair. The quality of the design, the materials and the craftsmanship represents an incredible value, and the comfort is extraordinary. The Sorento chair features a motorized reclining seat. ', '../images/products/fur6.jpg', 100, 18, 17),
(74, 'Diavoletti Family', 350, 1, 'The Diavoletti Family by Daniel Eltner is a collection of three different vases, each with a distinct colour.‎ Red Diavoletto, pink Diavoletta and yellow Diavoletto form an enigmatic contemporary tryptic, an ironic reinterpretation of the symbolic talisman through which to exorcise the trials and tribulations of everyday life.‎ Made of ceramic, the Diavoletti Family vases have a matte exterior and glossy interior, and are made using ancient techniques from the 1700s.‎ The elements appear bizarre and surreal, inspired by the idols from the Cycladic civilization on the island of Mykonos.‎', '../images/products/vase1.jpg', 100, 19, 17),
(75, 'Hineri', 20, 1, 'Type Marble vase Materials Marble Designers Setsu & Shinobu Ito Manufacture year 2020 Product code GA286 / GA287 / GA288 / GA289 HINERI is sculpture-vase consisting of a twisted cylinder in Carrara and Nero Marquina marble, design by Setsu & Shinobu Ito.‎', '../images/products/vase2.jpg', 100, 19, 17),
(76, 'Gli Oggetti - RIPS', 35, 1, 'When used as a flower vase Rips merges harmoniously with its contents, highlighting their shapes and colours.‎ The outer surface is decorated with a motif of diagonal lines in relief that create an optical effect which is emphasised by the water and branches in the vase.‎ The oblique lines make the surface three dimensional and underline the beauty of the blown glass in an original way, as if they were lines of stitching on leather.‎ The relief has two different directions, which follow the three main sections of the object, highlighting the vases variations in volume.‎', '../images/products/vase4.jpg', 100, 19, 17),
(77, 'Wall-mounted steel clock', 10, 1, 'Dont lose another minute! Tolix reveals Tolix Time, a colorful clock.‎ Minimalist yet playful in design, it lights up the wall in a bedroom, the kitchen or a bathroom.‎ Made using metal pieces that are assembled together in a round shape, the wall clock is available in all colors and can be made of 2 or 3 parts.‎  Monochrome, two-color, or three-color, with a perforated section or completely solid, Tolix Time offers an infinite number of combinations.‎ No more excuses for being late.‎ And every reason to sit and watch time go by.‎', '../images/products/clock2.jpg', 100, 20, 17),
(78, 'Stamped plate clock', 50, 1, 'Type Wall-mounted Stamped plate clock Materials Stamped plate Manufacture year 2020 Product code IT910 The Monet wall clock is a tribute to the creativity of the famous French painter.‎  Materials: Laser-cut, bent, powder-coated metal sheet, digital high-resolution print', '../images/products/clock3.jpg', 100, 20, 17),
(79, 'wooden clock', 40, 1, 'Type Wall-mounted wooden clock Materials Wood Designers Opaca Lab Manufacture year 2019 Product code T7951 An twist of wood and metal for an analogue clock in the name of simplicity and design.‎ A needle in satin gold finish to give a just touch of class.‎', '../images/products/clock4.jpg', 100, 20, 17),
(80, 'Light Blue Tay Clock', 45, 1, 'Vulcano is the wall-clock that reminds us that time always depends on the laws of nature: beautiful and feared, the volcanos are built during the centuries, eruption after eruption, layer after layer.‎ The design and the form of Vulcano tell the perfection of the universe and its equilibrium that is always changing, uniting natural and precious wood species to the passing of time that moulds everything.‎ The clean and minimal design makes Vulcano suitable for different spaces of the house, from the living to the kitchen, to the office.‎', '../images/products/clock5.jpg', 100, 20, 17),
(81, 'Casamania & Horm', 600, 1, 'Collection Summit Type 2 seater fabric sofa Materials Fabric Designers Giulio Iacchetti Manufacture year 2015 Summit Standard is a 2 seater fabric sofa.‎ Structure composed of black painted metal frame with mdf bottoms.‎ Upholstered in leather, faux leather or fabric.‎', '../images/products/clock6.jpg', 100, 18, 17),
(82, 'Calligaris', 30, 1, 'CIRCLES By Calligaris Type Metal plant pot / pedestal Materials Metal Designers Busetti Garuti Redaelli Metal plant pot / pedestal.‎', '../images/products/plant2.jpg', 100, 17, 16),
(83, 'Window Garden Plant', 35, 1, 'ollection Window garden Type Porcelain vase system for hydroponic cultivation Materials Porcelain Designers BIG - Bjarke Ingels Group Manufacture year 2016 Window garden pendant is an intelligent irrigation system incorporated into high-pressure cast porcelain vases.‎ The vases themselves are designed to allow for hydroponic cultivation and each one has a small indentation around its circumference where a steel wire fixes it to the structure.‎', '../images/products/plant1.jpg', 100, 17, 16),
(84, 'Paola Lenti', 25, 1, 'Type Stainless steel plant pot Materials Stainless steel Designers Bestetti Associati Studio Rectangular and round planter cover available in different dimensions.‎ Structure made of varnished stainless steel.‎', '../images/products/plant3.jpg', 100, 17, 16);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `review` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `customer_id`, `products_id`, `review`) VALUES
(1, 6, 11, 'wow very good'),
(2, 6, 11, 'Hi'),
(3, 6, 11, 'bye'),
(4, 6, 41, 'Hello'),
(5, 6, 41, 'Thank you Ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `sub_category_desc` text NOT NULL,
  `sub_category_image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_category_id`, `sub_category_name`, `sub_category_desc`, `sub_category_image`, `category_id`) VALUES
(7, 'Sweaters', 'A sweater is a piece of clothing worn on the upper body to keep the person warm. Sweaters are usually knitted or crocheted. Other names for sweaters are pullover, jersey, or jumper. Sweaters that open in the front are often called cardigans. They are named after James Brudenell, 7th Earl of Cardigan, a British general during the Crimean War, who led the famous charge of the Light Brigade. Sweaters without sleeves are often called vests. Sweaters can be worn all year long for comfort and warmth.', '../images/subCat/sweaters.jpg', 20),
(11, 'Dresses', 'Companys remarkable collection of womens dresses is sure to have you covered for any occasion. Company has a variety of dresses for every occasion, including styles such as fit and flare, sheath, and maxi. Choose from a wide variety of colors ranging from formal black, blue, and white, to modern pink, red, and purple. With dresses available in any size and fit, find the one that matches your exact needs.', '../images/subCat/dresses.jpg', 20),
(12, 'Jeans', 'Regardless of the circumstance, Companys impressive selection of mens jeans is sure to have something for you. Whether you prefer relaxed, slim, or classic fit, Company has you covered. Pick the one that fits your style from a wide variety of colors ranging from timeless black, blue, and grey, to bold red and orange. With jeans available in waist sizes from 28 to 60, find the one that matches your exact needs.', '../images/subCat/jeans.jpg', 20),
(13, 'Shoes', 'Looking for a pair of shoes? We have a massive assortment of shoes for men in all varieties and styles. Find your perfect match with shoes available in sizes from 3 to 18. The Companys collection is available in a diversity of colors with more traditional options such as black and brown, to more bold colors like red and green. Company carries only the highest quality of products featuring nearly 600 items rated 4 stars or better.', '../images/subCat/shoes.jpg', 20),
(14, 'Laptops', 'A laptop or laptop computer, is a small, portable personal computer (PC) with a clamshell form factor, typically having a thin LCD or LED computer screen mounted on the inside of the upper lid of the clamshell and an alphanumeric keyboard on the inside of the lower lid. The clamshell is opened up to use the computer. Laptops are folded shut for transportation, and thus are suitable for mobile use.', '../images/subCat/laptops_subcategories.jpg', 19),
(15, 'Hard Drives', 'A hard disk drive (HDD), hard disk, hard drive, or fixed disk[b] is an electro-mechanical data storage device that stores and retrieves digital data using magnetic storage and one or more rigid rapidly rotating platters coated with magnetic material. The platters are paired with magnetic heads, usually arranged on a moving actuator arm, which read and write data to the platter surfaces.', '../images/subCat/hard-drives-subctegory.jpg', 19),
(16, 'Mobile Phones', 'A mobile phone, cellular phone, cell phone, cellphone, handphone, or hand phone, sometimes shortened to simply mobile, cell or just phone, is a portable telephone that can make and receive calls over a radio frequency link while the user is moving within a telephone service area. The radio frequency link establishes a connection to the switching systems of a mobile phone operator, which provides access to the public switched telephone network (PSTN).', '../images/subCat/mobiles_subcategory.jpg', 19),
(17, 'Plant Decorations', 'Few items make our houses cheerful like plants. Plants make a room lively and purify air. In this category you can test your green thumb choosing plants, vases and vase holders, beautiful vegetal tableaux and entire green walls. The best of international design is only here on Archiproducts!', '../images/subCat/plant4.jpg', 21),
(18, 'Furniture', 'When choosing furniture, it is necessary to take into consideration the style that you wish to use in your own spaces. An interior design project includes a variety of products, articles and models in different shapes and materials, from leather and wood to metal and velvet finishes. From iconic pieces of classical inspiration to contemporary metal solutions, the composition of the furniture can involve the use of elements with common or contrasting characteristics, preferring an impressive mix&match. For this reason, it is essential to evaluate both aesthetics and functionality, to be sure of designing an environment that is both beautiful and comfortable.', '../images/subCat/furniture-subcategory.jpg', 21),
(19, 'Vases', 'A vase is an open container. It can be made from a number of materials, such as ceramics, glass, non-rusting metals, such as aluminium, brass, bronze, or stainless steel. Even wood has been used to make vases, either by using tree species that naturally resist rot, such as teak, or by applying a protective coating to conventional wood or plastic. Vases are often decorated, and they are often used to hold cut flowers. Vases come in different sizes to support whatever flower it is holding or keeping in place.', '../images/subCat/vases-sub-categories.jpg', 21),
(20, 'Clocks', 'A clock is a device used to measure, keep, and indicate time. The clock is one of the oldest human inventions, meeting the need to measure intervals of time shorter than the natural units: the day, the lunar month, and the year. Devices operating on several physical processes have been used over the millennia.  Some predecessors to the modern clock may be considered as \"clocks\" that are based on movement in nature: A sundial shows the time by displaying the position of a shadow on a flat surface. There is a range of duration timers, a well-known example being the hourglass.', '../images/subCat/clock1.jpg', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_products_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `sub_category_id` (`sub_category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD UNIQUE KEY `sub_category_name` (`sub_category_name`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`sub_category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product` FOREIGN KEY (`products_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
