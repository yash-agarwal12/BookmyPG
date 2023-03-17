-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 08:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookmypg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `area_id` int(3) NOT NULL,
  `area_name` varchar(15) NOT NULL,
  `area_cityname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`area_id`, `area_name`, `area_cityname`) VALUES
(1, 'Navrangpura', 'Ahmedabad'),
(2, 'Naranpura', 'Ahmedabad'),
(3, 'Mani Nagar', 'Ahmedabad'),
(4, 'CG Road', 'Ahmedabad'),
(5, 'Paldi', 'Ahmedabad'),
(6, 'Sarkhej', 'Ahmedabad'),
(7, 'Thaltej', 'Ahmedabad'),
(8, 'Prahlad Nagar', 'Ahmedabad'),
(9, 'Bopal', 'Ahmedabad'),
(10, 'Science City', 'Ahmedabad'),
(11, 'Ambawadi', 'Ahmedabad'),
(12, 'Swastik Char Ra', 'Ahmedabad'),
(13, 'Vastrapur', 'Ahmedabad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(5) NOT NULL,
  `pg_id` int(5) NOT NULL,
  `booking_desc` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL,
  `booking_date` date NOT NULL DEFAULT current_timestamp(),
  `booking_startdate` date NOT NULL,
  `booking_chargeamount` int(5) NOT NULL,
  `booking_status` varchar(15) NOT NULL,
  `user_idproof` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `pg_id`, `booking_desc`, `user_id`, `booking_date`, `booking_startdate`, `booking_chargeamount`, `booking_status`, `user_idproof`) VALUES
(1, 2, '3 sharing room', 2, '2022-01-19', '2022-01-24', 10000, 'pending', 'upload/2022-02-08 (132).png'),
(2, 4, 'four sharing', 3, '2022-04-02', '2022-03-31', 6000, 'Pending', 'upload/2022-02-08 (132).png'),
(3, 5, 'triple sharing', 5, '2022-02-26', '2022-03-23', 7500, 'Pending', 'upload/2022-02-08 (150).png'),
(4, 7, 'double bed', 1, '2022-04-02', '2022-05-04', 12000, 'Pending', 'upload/2022-02-08 (150).png'),
(5, 1, 'double bed', 4, '2022-03-02', '2022-03-23', 4000, 'Pending', 'upload/2022-02-08 (150).png'),
(6, 4, 'four sharing', 9, '2022-04-02', '2022-04-23', 6000, 'Pending', 'upload/unit1&2_merged.pdf'),
(35, 3, '2 sharing', 10, '2022-04-03', '2022-04-06', 4500, 'Pending', 'upload/gandhi.jfif'),
(36, 6, '2 sharing', 6, '2022-04-03', '2022-04-22', 7500, 'Pending', 'upload/userrishi.jpeg'),
(37, 1, 'sds', 4, '2022-04-06', '2022-04-06', 4000, 'Pending', 'At-logo-portrait.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookmark`
--

CREATE TABLE `tbl_bookmark` (
  `bookmark_id` int(5) NOT NULL,
  `pg_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bookmark`
--

INSERT INTO `tbl_bookmark` (`bookmark_id`, `pg_id`, `user_id`) VALUES
(1, 1, 2),
(2, 3, 1),
(3, 2, 5),
(5, 4, 3),
(6, 1, 1),
(7, 1, 1),
(8, 3, 1),
(9, 1, 1),
(10, 2, 1),
(11, 2, 1),
(12, 1, 1),
(13, 1, 1),
(16, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `pg_id` int(5) NOT NULL,
  `feedback_details` varchar(300) NOT NULL,
  `feedback_date` date NOT NULL DEFAULT current_timestamp(),
  `feedback_reply` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `user_id`, `pg_id`, `feedback_details`, `feedback_date`, `feedback_reply`) VALUES
(1, 1, 3, 'The laundry services were not provided.\r\nFood not good.\r\n', '2020-02-13', ''),
(2, 3, 2, 'Cleaning services not provided regularly.', '2022-02-26', 'We will try to improve our services.'),
(3, 2, 1, 'Laundry not provided.', '2022-02-10', ''),
(4, 5, 4, 'Good food and ambience.', '2022-02-04', ''),
(5, 4, 5, 'The staff is very co-operative. Food is good.', '2022-02-11', 'Thanks for the feedback.'),
(6, 1, 0, 'mmlmmlmmlmmiinnnnn', '0000-00-00', ''),
(7, 1, 5, 'hi hello wassupp', '0000-00-00', ''),
(8, 1, 6, 'ok', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(5) NOT NULL,
  `booking_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `payment_date` date NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(15) NOT NULL,
  `payment_status` varchar(15) NOT NULL,
  `payment_amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `booking_id`, `user_id`, `payment_date`, `payment_method`, `payment_status`, `payment_amount`) VALUES
(1, 1, 2, '2022-01-24', 'net banking', 'successful', 8000),
(2, 3, 5, '2022-02-05', 'UPI ', 'successful', 20000),
(3, 5, 4, '2022-01-28', 'net banking', 'successful', 15000),
(4, 2, 3, '2022-01-19', 'UPI', 'successful', 9000),
(5, 4, 1, '2022-01-12', 'net banking', 'successful', 12000),
(6, 6, 9, '2022-04-23', 'UPI', 'Successful', 4500),
(16, 35, 10, '2022-04-03', 'UPI', 'Successful', 4500),
(17, 36, 6, '2022-04-03', 'UPI', 'Successful', 7500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pgimages`
--

CREATE TABLE `tbl_pgimages` (
  `pgimage_id` int(5) NOT NULL,
  `pg_id` int(5) NOT NULL,
  `pgimage_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pgimages`
--

INSERT INTO `tbl_pgimages` (`pgimage_id`, `pg_id`, `pgimage_path`) VALUES
(2, 1, 'pg1p1.jpg'),
(3, 1, 'pg1p2.jpg'),
(4, 1, 'pg1p3.jpg'),
(5, 2, 'pg2p1.jpg'),
(6, 2, 'pg2p2.jpg'),
(7, 3, 'pg3p1.jpg'),
(8, 3, 'pg3p2.jpg'),
(9, 3, 'pg3p3.jpg'),
(10, 3, 'pg3p4.jpg'),
(11, 3, 'pg3p5.jpg'),
(12, 3, 'pg3p6.jpg'),
(13, 3, 'pg3p7.jpg'),
(14, 6, 'pg6p1.jpg'),
(15, 6, 'pg6p2.jpg'),
(16, 6, 'pg6p3.jpg'),
(17, 6, 'pg6p4.jpg'),
(18, 6, 'pg6p5.jpg'),
(19, 6, 'pg6p6.jpg'),
(20, 6, 'pg6p7.jpg'),
(21, 7, 'pg7p1.jpeg'),
(22, 7, 'pg7p2.jpeg'),
(23, 7, 'pg7p3.jpeg'),
(24, 7, 'pg7p4.jpeg'),
(25, 8, 'pg8p1.jpg'),
(26, 8, 'pg8p2.jpg'),
(27, 8, 'pg8p3.jpg'),
(28, 8, 'pg8p4.jpg'),
(29, 8, 'pg8p5.jpg'),
(30, 8, 'pg8p6.jpg'),
(31, 9, 'pg9p1.jpg'),
(32, 9, 'pg9p2.jpg'),
(33, 9, 'pg9p3.jpeg'),
(34, 9, 'pg9p4.jpg'),
(35, 10, 'pg10p1.jpg'),
(36, 10, 'pg10p2.jpg'),
(37, 10, 'pg10p3.jpg'),
(38, 10, 'pg10p4.jpg'),
(39, 10, 'pg10p5.jpg'),
(40, 10, 'pg10p6.jpg'),
(41, 10, 'pg10p7.jpg'),
(42, 11, 'pg11p1.jpeg'),
(43, 11, 'pg11p2.jpeg'),
(44, 11, 'pg11p3.jpeg'),
(45, 11, 'pg11p4.jpeg'),
(46, 11, 'pg11p5.jpeg'),
(47, 12, 'pg12p1.jpg'),
(48, 12, 'pg12p2.jpg'),
(49, 12, 'pg12p3.jpg'),
(50, 12, 'pg12p4.jpg'),
(51, 13, 'pg13p1.jpg'),
(52, 13, 'pg13p2.jpg'),
(53, 13, 'pg13p3.jpg'),
(54, 13, 'pg13p4.jpg'),
(55, 14, 'PG14P1.jpg'),
(56, 14, 'PG14P2.jpg'),
(57, 14, 'PG14P3.jpg'),
(58, 14, 'PG14P4.jpg'),
(59, 15, 'pg15p8.jpg'),
(60, 15, 'pg15p1.jpg'),
(61, 15, 'pg15p2.jpg'),
(62, 15, 'pg15p3.jpg'),
(63, 15, 'pg15p4.jpg'),
(64, 15, 'pg15p5.jpg'),
(65, 15, 'pg15p6.jpg'),
(66, 15, 'pg15p7.jpg'),
(67, 4, 'pg4p1.jpg'),
(68, 4, 'pg4p2.jpg'),
(69, 4, 'pg4p3.jpg'),
(70, 4, 'pg4p4.jpg'),
(71, 4, 'pg4p5.jpg'),
(72, 5, 'pg5p1.jpg'),
(73, 5, 'pg5p2.jpg'),
(74, 5, 'pg5p3.jpg'),
(75, 5, 'pg5p4.jpg'),
(76, 5, 'pg5p5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pg_category`
--

CREATE TABLE `tbl_pg_category` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pg_category`
--

INSERT INTO `tbl_pg_category` (`category_id`, `category_name`) VALUES
(1, 'Apartment'),
(2, 'Paying Guest'),
(3, 'Hostel'),
(4, 'Flats');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pg_master`
--

CREATE TABLE `tbl_pg_master` (
  `pg_id` int(5) NOT NULL,
  `pg_ownername` varchar(30) NOT NULL,
  `category_id` int(5) NOT NULL,
  `pg_name` varchar(20) NOT NULL,
  `pg_email` varchar(35) NOT NULL,
  `pgowner_gender` varchar(6) NOT NULL,
  `pg_password` varchar(15) NOT NULL,
  `pg_phonenumber` bigint(10) NOT NULL,
  `pg_address` varchar(150) NOT NULL,
  `pg_registrationdocs` varchar(50) NOT NULL,
  `pgowner_dob` date NOT NULL,
  `area_id` int(3) NOT NULL,
  `pg_depositamount` int(5) NOT NULL,
  `pg_monthlycharge` int(5) NOT NULL,
  `pg_isgirlsboys` varchar(1) NOT NULL,
  `pg_operatingsince` date NOT NULL,
  `pg_idproof` varchar(50) NOT NULL,
  `pg_sharing` int(1) NOT NULL,
  `pg_isverified` varchar(1) NOT NULL,
  `pg_desc` varchar(3000) NOT NULL,
  `pg_amenities` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pg_master`
--

INSERT INTO `tbl_pg_master` (`pg_id`, `pg_ownername`, `category_id`, `pg_name`, `pg_email`, `pgowner_gender`, `pg_password`, `pg_phonenumber`, `pg_address`, `pg_registrationdocs`, `pgowner_dob`, `area_id`, `pg_depositamount`, `pg_monthlycharge`, `pg_isgirlsboys`, `pg_operatingsince`, `pg_idproof`, `pg_sharing`, `pg_isverified`, `pg_desc`, `pg_amenities`) VALUES
(1, 'Poonam Bramhbhatt', 2, 'Raghav PG', 'raghavpg_amd@gmail.com', 'Female', 'poonam13$', 7002456641, 'Block Number 225,\r\nArunoday Park Society\r\nSt. Xavier\'s college Corner\r\nAhmedabad', '\"C:\\xampp\\htdocs\\images\\p1.png\"', '2012-02-09', 2, 4000, 4000, 'g', '2018-02-07', '\"C:\\xampp\\htdocs\\images\\p1.png\"', 2, 'y', 'Move into Raghav Girls PG, a professionally managed PG home in Navrangpura, Ahmedabad. Located in a safe neighborhood, this female PG offers various modern amenities for your comfort, such as TV, AC, Food, Power Backup, Wi-Fi etc. This PG has double occupancy type. This PG is nearby major commercial and educational hubs. \r\n\r\nWe also follow all the covid protocols to ensure a safe and secure stay.', 'Wifi,Laundry,AC'),
(2, 'Ankur Prasad', 2, 'Ripon House', 'perfectfor1234@gmail.com', 'male', '@nkur123', 9754896324, '10 Swastic Char RastaMani NagarAhmedabad', 'C:\\xampp\\htdocs\\regis_images\\p2.png', '2013-02-06', 2, 10000, 10000, 'b', '2016-02-10', 'C:\\xampp\\htdocs\\ownerid_images\\p2.png', 3, 'y', 'There’s more to life at Ripon House than any ladies PG in Ahmedabad. It’s fully-furnished, tastefully-designed and ideally located PG in the city. Unlike most girls PGs, we take care of all your needs - food to housekeeping to even a doctor on call.\r\n\r\nOur living experience is a major upgrade, thanks to our tech-integrations like the biometric security. But technology doesn’t mean lack of human connection here. Our regular movie screenings, game nights, skill-building workshops are tailor made for interaction between you and your co-residents, and builds a feeling of family.\r\n\r\nSpeaking of family, when it comes to COVID-19, we\'ll protect you like you\'re a member of ours. Residence sanitisation, thermal monitoring, social distancing, every safety measure is in place. Now, there’s a lot more at Risbon House compared to a ladies PG in Delhi. But it would be best if you visit the resident and find it out for yourself. So you can be assure be assured that Risbon House is the best place to be your second home.', 'Wifi,Food'),
(3, 'Durga Devi', 3, 'Eqinox', 'eqinoxamd2@gmail.com', 'female', 'ddequinox2', 7584236785, 'Block 31Gandhi Road, Ratan Singh SocietyAhmedabad', 'C:\\xampp\\htdocs\\regis_images\\p3.png', '2012-02-15', 4, 4500, 4500, 'g', '2014-07-04', 'C:\\xampp\\htdocs\\ownerid_images\\p3.png', 3, 'y', 'Whether you\'re looking for a PG or a flat, it does not get better than this !!!\r\nEquinox, a fully furnished unit is an ideal choice for those who enjoy a hassle-free stay in the busiest hub of the city. Indulge in the luxury of services added to your package with AC, Purified RO water, DTH, regular housekeeping & maintenance services. Situated in CG Road, it\'s ideal for working professionals and students.', 'Laundry,AC'),
(4, 'Nishant  Agarwal', 1, 'Chester House', 'chesteramd@gmail.com', 'male', 'che$ter43', 8854682145, '54 Pheonix Society\r\nSarkhej\r\nAhmedabad', 'C:\\xampp\\htdocs\\regis_images\\p4.png', '2012-02-02', 3, 6000, 6000, 'g', '2018-07-12', 'C:\\xampp\\htdocs\\ownerid_images\\p4.png', 4, 'y', 'Chester House isn\'t even trying to be a PG in Sarkhej, Ahmedabad. It already is your second home. That is so because of all the home-like comforts that are waiting for you. And it happens as-and-soon you step inside this fully-furnished residence. Housekeeping, high-speed wifi, delicious meals, and a wide range of other amenities are thoughtfully chosen to not let you miss home, even hundreds of miles away from it.\r\n\r\nWe firmly believe in not taking any chances. That’s why we’ve introduced measures to monitor the current status of all our residents, including examination of their medical and travel history to rule out any possibilities.\r\n->Thermal Monitoring at Entry/Exit\r\n->Medical &\r\n->Travel History\r\n\r\nFirst and foremost, we’ve adopted thorough hygiene processes over and above our usual protocol. From regular disinfection to the provision of sanitizers, only the very best practices are employed to prevent the manifestation of the novel coronavirus in our residences.\r\n\r\n\r\n24x7 Quick\r\nResponse Teams', 'Wifi,Food'),
(5, 'Aman Srivastava', 2, 'Four Walls Boys PG', 'fourwall12@gmail.com', 'male', 'fourw@ll$1', 6658941235, '66 Prahlad Nagar\r\nAhmedabad', 'C:\\xampp\\htdocs\\regis_images\\p5.png', '2013-02-14', 5, 7500, 7500, 'b', '2019-09-12', 'C:\\xampp\\htdocs\\ownerid_images\\p5.png', 3, 'y', 'Four Walls Pg in Ahmedabad is one of the leading businesses in the Paying Guest Accommodations. Also known for Paying Guest Accommodations For Men, Paying Guest Accommodations, Paying Guest Accommodations For Boy Student, AC Paying Guest Accommodations, AC Paying Guest Accommodations For Men and much more. Find Address, Contact Number, Reviews & Ratings, Photos, Maps of Four Walls Pg, Ahmedabad.\r\n\r\nIt has a wide range of products and / or services to cater to the varied requirements of their customers. The staff at this establishment are courteous and prompt at providing any assistance. They readily answer any queries or questions that you may have. Pay for the product or service with ease by using any of the available modes of payment, such as Cash, Credit Card, Debit Card, Visa Card. ', 'Wifi,Food'),
(6, 'Vipin Srahya', 2, 'Cloudnine homes', 'cloudninehomes12@gmail.com', 'male', 'cloudNine_12', 9756645731, '92, AJC Bose Road, Naranpura, Ahmedabad', 'p6.png', '1989-06-17', 2, 7500, 7500, 'g', '0000-00-00', 'owner6.png', 2, 'y', 'Cloud nine pg for girls, is a professionally managed pg, with more than 1o years of being in operation.\r\nIt provides a safe and trusted environment for girls. It has professional cooks to prepare three-time meals and offer hygienic and healthy foods.\r\nIt has WiFi and has AC. It also have laundry facility.\r\nCloud nine pg is more like a second home.', 'Wifi,food,AC'),
(7, 'Priyank Shah', 3, 'Zolo Nest', 'zolonest12@hotmail.com', 'male', 'zolo12zolo', 8654729864, '229, Swastik Char Rasta, Anubhav Society, Ahmedabad-381009', 'p7.png', '1992-03-14', 12, 12000, 12000, 'b', '2016-03-25', 'owner7.png', 2, 'y', 'This is fully furnished property with all amenities like AC, TV, Geyser, WiFi, DTH, house keeping ,power back ,security etc. Property is very near to metro stations like MG road and IFFCO Chowk.\r\n\r\nFood is charged on pro-rata basis with a subscription charge of Rs. 2999 per month.\r\nNorth and South Indian cuisine available.\r\n\r\nWe offer double sharing rooms with all the essential amenities such as AC, laundry and many more.', 'Wifi,Food,Laundry,AC'),
(8, 'Amit Shah', 1, 'Jayant rooms', 'jayant223@gmail.com', 'male', 'jayant12_12', 8473917005, 'Block no. 20, Opposite IIM Ahmedabad, Vastrapur, Ahmedabad', 'p8.png', '1994-10-07', 13, 6000, 6000, 'b', '2017-03-15', 'owner8.png', 4, 'y', 'Jayant Rooms has fully-furnished rooms and common areas, this residence also provides you with all the comforts that you\'re used to back home. On offer are professional housekeeping services, high-speed internet and delicious, home-style nutritional meals, to name a few.\r\n\r\nThe comfort level is further raised with the use of our tech-integrations, biometric entrance and use of machine learning, that take boring everyday tasks to the online world. With a dose of technology, we also prescribe old-school human connection. Our regularly held movie screenings, game nights and other events and workshops offer opportunities to make lifetime memories with your co-residents. And since you\'re a member of our family, you deserve best-in-class safety measures against COVID-19. \r\n\r\nThat\'s why we\'re already implementing them - from thermal monitoring to residence sanitization - in our premises. So this feeling of family, together with the comforts and technology, puts Jayant Rooms in top position compared to the local PG in Vadgaon. But don\'t go by our word alone. Visit your second house and see what makes it a winner.', 'Food,AC'),
(9, 'Ashish Ranjan', 2, 'Sunshine Girls PG', 'sunshine121@gmail.com', 'male', 'sun$hine12', 8896525896, '191, Falgun Bulglows, Vijay Cross Road, Navrangpura, Ahmedabad', 'p9.png', '1982-03-11', 1, 9000, 9000, 'g', '2012-04-14', 'owner9.png', 4, 'y', 'Sunshine Girls Pg has meticulously designed rooms keeping in mind the needs of long term and short term stays. The rooms are equipped with all the amenities including a study/office table, comfortable chair, charging point, mouth-watering delicious meals, charging points, private parking. The bathroom has all the modern fittings such as a shower and western seat. Warm water is available 24/7.\r\n', 'Wifi,Food,AC'),
(10, 'Anita Shekhawat', 2, 'Joy Girls PG', 'joyanita17.amd@gmail.com', 'g', 'joyanita@71', 7548963587, 'Bungalow no. 69, Prahlad Nagar, Ahmedabad', 'p10.png', '1998-08-07', 8, 10000, 10000, 'g', '2019-09-12', 'owner10.png', 3, 'y', 'Joy Girls PG is an affordable Student housing PG that comes equipped with all the conveniences of living space with a lockin period of six months. Air-conditioned fully furnished spacious rooms (including study table, chair, wardrobe), quality furnishings, nutritious food, unlimited high-speed WiFi, RO, Washing machine, and impeccable housekeeping are just a few of the perks that come included in the overall rent. ', 'Wifi,Food,AC,Laundry'),
(11, 'Parag Mishra', 1, 'Pratham Boys Hostel', 'prathamboyshostel21@gmail', 'male', 'pratham$21', 9965874589, '55 Gandhi Ashram Road, Ambawadi, Ahmedabad.', 'p11.png', '1993-10-14', 11, 6800, 6800, 'b', '2012-04-13', 'owner11.png', 4, 'y', 'Pratham Boys Hostel has large size spacious room. Can accommodate 4 people.Large size rooms to accommodate four people. The rooms are clean and tidy. We ensure the place Safe and Secure while you stay.\r\n\r\nMeticulously designed rooms keeping in mind the needs of long-term and short-term stays. The rooms are equipped with all the amenities including study/office table, comfortable chair, charging point, mouth watering delicious meals, charging points, private parking. The bathroom has all the modern fittings such as shower and western seat. Warm water is available 24/7.\r\n\r\n', 'Food,Laundry'),
(12, 'Sneha Warsi', 3, 'Columbus Girls PG', 'columbuspg12@gmail.com', 'female', 'columbo@123', 8573910046, 'House no. 21, beside Apollo Pharmacy, Science City, Ahmedabad', 'p12.png', '1988-07-07', 10, 8500, 8500, 'g', '2020-05-02', 'owner12.png', 3, 'y', 'Columbus Girls Pg is a luxury PG in Science City, Ahmedabad, which has single rooms triple sharing rooms, together with a wide range of amenities and facilities to choose from. The resident also gets individual Wi-Fi login ids and passwords for seamless internet browsing. Apart from that, an individual also gets to avail services like housekeeping, security, and parking. The property is under CCTV Surveillance 24x7 and making it one of the secured properties in the area.', 'Wifi,Food,AC'),
(13, 'Puneet Kapoor', 2, 'Gopal PG', 'gopalpg321@gmail.com', 'male', 'gopal221amd', 8547965872, 'Flat 21, CG Road, Ahmedabad', 'p13.png', '1993-10-08', 4, 8000, 8000, 'b', '2022-04-22', 'owner13.png', 3, 'y', 'Are you a student or a working professional looking for an affordable rental coliving space? Gopal is the place for you to be. It is a fully-furnished and elegant coliving space specially designed for the millennial generation It provides well-equipped triple occupancy rooms with attached bathrooms. It comprises stunning balconies, a common movie hall, and an open kitchen. The ambiance is very peaceful, positive, and homely. The entire property is cleaned and sanitized frequently to avoid any type of infection. You will be provided with all the modern-day amenities such as housekeeping service, healthy food, high-level security, fast speed internet connection, refrigerator, DTH, power backup, geyser, healthy food, and much more.', 'Wifi,Food,AC'),
(14, 'Julie Christian', 2, 'Aria Girls PG', 'ariagirlspg21@gmail.com', 'female', '@ri@2412', 8879658426, 'Flat no. 21, Ambe Society, Ambawadi, Ahmedabad.', 'p14.png', '1984-03-15', 11, 9500, 9500, 'g', '2012-07-21', 'owner14.png', 3, 'y', 'Welcome to Aria! It is a fully-furnished and ready-to-move-in coliving space located on Ambawadi, Ahmedabad. This well-built coliving space has triple occupancy rooms which are sufficiently ventilated. It is well-equipped with all the modern-day conveniences such as chic furniture, attached bathrooms, modern interiors, washing machine, refrigerator, unlimited internet connection, wardrobe, high-level security, air conditioning, power backup and much more.\r\n\r\n The nearby hospitals are NRS Hospital, Mission Hospital, Mercy Hospital, Miot Hospitals and many others. Public transport service is also easily available in this area. Get your room booked in this affordable and elegant coliving space. Hurry up!\r\n', 'Wifi,Food,AC'),
(15, 'Shruti Jha', 3, 'Veena Paying Guest', 'veenapg16@gmail.com', 'female', 'veena@90pg', 9987852100, '193, Sanjay Society, Sarkhej, Ahmedabad', 'p15.png', '1977-09-29', 6, 10000, 10000, 'g', '2017-10-11', 'owner15.png', 2, 'y', 'This PG is available for Students and last Entry is till 10:30 pm. Non-veg food is not allowed. Guests of opposite gender are not allowed. Visitors are allowed. Guardian is allowed.\r\n\r\nIt has double sharing occupancy rooms and offers all basic amenities such as food, wifi. Drinking is not allowed. Smoking is not allowed', 'Wifi,Food,AC'),
(32, 'A', 0, 'A', 'A@aa.a', 'male', 'a', 12121, 'ffg', '', '2022-04-06', 0, 100, 1000, 'g', '2022-04-06', '', 0, '', '', 'fgfd'),
(33, 'A', 0, 'A', 'A@aa.a', 'male', 'a', 12121, 'ffg', '', '2022-04-06', 0, 100, 1000, 'g', '2022-04-06', '', 0, '', '', 'fgfd'),
(34, 'A', 0, 'A', 'A@aa.a', 'male', 'a', 12121, 'ffg', '', '2022-04-06', 0, 100, 1000, 'g', '2022-04-06', '', 0, '', '', 'fgfd'),
(35, 'A', 0, 'A', 'akash@gmail.com', 'female', '1', 8000147888, 'C2 403 Ratnaruchi Vatika App', 'project ppt.pdf', '2022-04-06', 0, 1, 11, 'g', '2022-04-06', 'project ppt.pdf', 0, '', '', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_master`
--

CREATE TABLE `tbl_user_master` (
  `user_id` int(5) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `user_fname` varchar(15) NOT NULL,
  `user_lname` varchar(15) NOT NULL,
  `user_gender` varchar(6) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_phonenumber` bigint(10) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `user_address` varchar(150) NOT NULL,
  `user_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_master`
--

INSERT INTO `tbl_user_master` (`user_id`, `is_admin`, `user_fname`, `user_lname`, `user_gender`, `user_email`, `user_password`, `user_phonenumber`, `user_photo`, `user_address`, `user_dob`) VALUES
(1, 0, 'Pooja', 'Agarwal', 'Female', 'pooja12ag@gmail.com', 'pooja101@', 8092072112, 'C:\\xampp\\htdocs\\images\\p1.png', 'House Number:21,\r\nNetaji Colony,\r\nJamshedpur', '2012-01-03'),
(2, 0, 'Snehpreet', 'Kaur', 'female', 'sneh27@gmail.com', '$nehh12', 9125487562, 'C:\\xampp\\htdocs\\userimages\\u2.png', '12 R.N Tagore Road\r\nDum Dum\r\nKolkata', '2012-02-15'),
(3, 0, 'Vaibhav', 'Singh', 'male', 'vaibhav7@gmail.com', 'v@isig41', 7548963214, 'C:\\xampp\\htdocs\\userimages\\u3.png', 'House No:5, Road no:1\r\nTelco Colony\r\nJamshedpur', '2012-02-13'),
(4, 1, 'Jasleen', 'Kaur', 'female', 'jasleen.27jsr@gmail.com', 'jasleen27', 9709142187, 'C:\\xampp\\htdocs\\userimages\\u4.png', '', '2012-02-09'),
(5, 0, 'Mrunal', 'Singh', 'female', 'perfectfor1234@gmail.com', 'singhm$12', 9931129741, 'C:\\xampp\\htdocs\\userimages\\u5.png', '33 Indra Nagar,\r\nSubhash Colony\r\nPatna', '2012-02-02'),
(6, 0, 'Rishi', 'Singh', 'male', 'rishi12singh@gmail.com', 'rishi123', 8569745986, 'upload/userrishi.jpeg', 'Bombay Golden Transport Pvt Ltd, Kankriya Road, Raipur', '1995-03-10'),
(8, 0, 'Disha', 'Pol', 'female', 'dishapole61@gmail.com', 'yashagarwal', 8562459745, 'upload/pngfind.com-15-august-png-2973632.png', 'jksjkjls', '2022-03-03'),
(9, 0, 'Jenil', 'Dattani', 'male', 'jenildattani21@gmail.com', 'jenil21', 7896586458, 'upload/pngfind.com-jingle-bells-png-624280.png', 'lkemlkfdlew;fd.\'de', '2022-03-27'),
(10, 0, 'piya', 'Singh', 'male', 'piya27jsr@gmail.com', 'piya123', 7589632145, 'upload/WhatsApp Image 2022-03-23 at 12.10.56 AM.jp', 'Bombay Golden Transport Pvt Ltd, Kankriya Road, Raipur', '2022-04-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_bookmark`
--
ALTER TABLE `tbl_bookmark`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_pgimages`
--
ALTER TABLE `tbl_pgimages`
  ADD PRIMARY KEY (`pgimage_id`);

--
-- Indexes for table `tbl_pg_category`
--
ALTER TABLE `tbl_pg_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_pg_master`
--
ALTER TABLE `tbl_pg_master`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `tbl_user_master`
--
ALTER TABLE `tbl_user_master`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `area_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_bookmark`
--
ALTER TABLE `tbl_bookmark`
  MODIFY `bookmark_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_pgimages`
--
ALTER TABLE `tbl_pgimages`
  MODIFY `pgimage_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_pg_category`
--
ALTER TABLE `tbl_pg_category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pg_master`
--
ALTER TABLE `tbl_pg_master`
  MODIFY `pg_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_user_master`
--
ALTER TABLE `tbl_user_master`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
