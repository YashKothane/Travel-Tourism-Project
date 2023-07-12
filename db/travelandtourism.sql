-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 05:15 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelandtourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `id` int(11) NOT NULL,
  `bookingid` int(11) NOT NULL,
  `booking_date` date NOT NULL DEFAULT current_timestamp(),
  `roomid` int(11) NOT NULL,
  `hotelid` int(11) NOT NULL,
  `custid` int(11) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `adult` tinyint(1) NOT NULL,
  `child` tinyint(1) NOT NULL,
  `amount_paid` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`id`, `bookingid`, `booking_date`, `roomid`, `hotelid`, `custid`, `checkin_date`, `checkout_date`, `adult`, `child`, `amount_paid`) VALUES
(3, 210218001, '2021-02-18', 3, 2, 3, '2021-02-19', '2021-02-20', 2, 0, 5500),
(4, 210218001, '2021-02-18', 4, 2, 3, '2021-02-19', '2021-02-20', 2, 0, 7000),
(5, 210223001, '2021-02-23', 3, 2, 3, '2021-02-26', '2021-02-27', 2, 0, 5500),
(6, 210223001, '2021-02-23', 4, 2, 3, '2021-02-26', '2021-02-27', 2, 0, 7000),
(7, 210224001, '2021-02-24', 3, 2, 3, '2021-03-22', '2021-03-23', 2, 0, 5500),
(8, 210224001, '2021-02-24', 5, 3, 3, '2021-03-22', '2021-03-23', 2, 0, 2699),
(10, 210226003, '2021-02-26', 3, 2, 3, '2021-03-02', '2021-03-03', 2, 0, 5500),
(11, 210228003, '2021-02-28', 3, 2, 3, '2021-03-02', '2021-03-03', 2, 0, 5500),
(12, 210303003, '2021-03-03', 10, 5, 3, '2021-03-06', '2021-03-13', 2, 1, 21000);

-- --------------------------------------------------------

--
-- Table structure for table `cart_car`
--

CREATE TABLE `cart_car` (
  `id` int(11) NOT NULL,
  `custid` int(11) NOT NULL,
  `carid` int(11) NOT NULL,
  `starting_point` varchar(200) NOT NULL,
  `pickup_time` varchar(100) NOT NULL,
  `pickup_date` date NOT NULL,
  `dropoff_time` varchar(100) NOT NULL,
  `dropoff_date` date NOT NULL,
  `end_point` varchar(200) NOT NULL,
  `currentdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_room`
--

CREATE TABLE `cart_room` (
  `id` int(11) NOT NULL,
  `currentdate` date NOT NULL DEFAULT current_timestamp(),
  `roomid` int(11) NOT NULL,
  `hotelid` int(11) NOT NULL,
  `custid` int(11) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `adult` tinyint(1) NOT NULL,
  `child` tinyint(1) NOT NULL,
  `amount_to_pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `car_booking`
--

CREATE TABLE `car_booking` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `carid` int(11) NOT NULL,
  `custid` int(11) NOT NULL,
  `starting_point` varchar(200) NOT NULL,
  `pickup_time` varchar(100) NOT NULL,
  `pickup_date` date NOT NULL,
  `dropoff_time` varchar(100) NOT NULL,
  `dropoff_date` date NOT NULL,
  `end_point` varchar(200) NOT NULL,
  `booking_date` date NOT NULL DEFAULT current_timestamp(),
  `amount_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_booking`
--

INSERT INTO `car_booking` (`id`, `booking_id`, `carid`, `custid`, `starting_point`, `pickup_time`, `pickup_date`, `dropoff_time`, `dropoff_date`, `end_point`, `booking_date`, `amount_paid`) VALUES
(1, 210225001, 1, 3, 'Dombivli', '13:00 PM', '2021-02-27', '13:00 PM', '2021-02-28', 'Mulund', '2021-02-25', 885),
(2, 210225001, 2, 3, 'Dombivli', '08:46 AM', '2021-02-28', '09:47 AM', '2021-03-01', 'Mulund', '2021-02-25', 2513),
(5, 210226001, 2, 3, 'Dombivli', '09:51 PM', '2021-02-28', '21:51', '2021-03-01', 'Mulund', '2021-02-26', 2513);

-- --------------------------------------------------------

--
-- Table structure for table `car_list`
--

CREATE TABLE `car_list` (
  `carid` int(11) NOT NULL,
  `carname` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `seater` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `ACNONAC` varchar(6) NOT NULL,
  `luggage` int(11) NOT NULL,
  `isDeleted` varchar(3) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_list`
--

INSERT INTO `car_list` (`carid`, `carname`, `description`, `seater`, `image`, `price`, `ACNONAC`, `luggage`, `isDeleted`) VALUES
(1, 'Hyundai i20', 'The all-new i20 has been inspired from Hyundaiâ€™s design DNA of â€œsensuous sportinessâ€ with a dynamic look on the outside & luxurious feeling on the inside. Its breathtaking presence casts a magnetic charm; while its connected and intuitive features e', 5, 'hyundaii20.jpg', 885, 'AC', 3, 'N'),
(2, 'Tata Tiago', 'The price of Tata Tiago starts at Rs. 4.85 Lakh and goes upto Rs. 6.84 Lakh. Tata Tiago is offered in 9 variants - the base model of Tiago is XE and the top variant Tata Tiago XZA Plus Dual Tone Roof AMT which comes at a price tag of Rs. 6.84 Lakh.', 5, 'tatatiago.jpg', 2513, 'AC', 3, 'N'),
(3, 'Maruti Swift AT', 'Maruti Suzuki Swift is a 5 seater Hatchback available in a price range of â‚¹ 5.73 - 8.41 Lakh. It is available in 9 variants, 1 engine option and 2 transmission options : Manual and AMT. Other key specifications of the Swift include a Kerb Weight of 875 ', 5, 'maruti.jpg', 2687, 'AC', 3, 'N'),
(4, 'Toyota Glanza (Petrol)', 'Toyota Glanza is the first product to be introduced under the Toyota-Suzuki joint venture agreement. The Glanza is available in two variants â€“ G and V in four trims - G MT, V MT, G CVT, and V CVT. The hatchback is available in five colours - red, blue, ', 5, 'toyota.jpg', 2889, 'AC', 3, 'N'),
(5, 'Mahindra Scorpio', 'Mahindra introduced the new-gen Scorpio back in 2015. Promptly after two years, the Scorpio got a mid-life update with a slightly tweaked cosmetic, new seating configuration and a bump in power output. The variants moniker also shifted from even alpha-num', 7, 'mahindra-scorpio.jpg', 3079, 'AC', 5, 'N'),
(6, 'Ford Ecosport', 'The new Ford EcoSport has been launched with more features over its predecessor. Ford EcoSport is available in six trims â€“ Ambiente, Trend, Titanium, Titanium+, EcoSport S and the Thunder Edition. The newly introduced feature-loaded Thunder Edition is b', 5, 'ford.jpg', 3458, 'AC', 3, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `suggestions` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `suggestions`) VALUES
(1, 'nikhil aggarwal', 'nikhil@email.com', 'No Suggestions');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotelid` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `hotel_img` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `isDeleted` varchar(2) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotelid`, `hotel_name`, `hotel_img`, `description`, `city`, `address`, `isDeleted`) VALUES
(1, 'JW Marriott', 'marriott.jpg', 'Marriott Hotels & Resorts is Marriott International\'s brand of full-service hotels and resorts based in Bethesda, Maryland. As of June 30, 2020, there were 582 hotels and resorts with 205,053 rooms operating under the brand, in addition to 160 hotels with 47,765 rooms in the pipeline.', 'Mumbai', 'Chhatrapati Shivaji International Airport, IA Project Rd, Navpada, Vile Parle East, Vile Parle, Andheri, Maharashtra 400099', 'N'),
(2, 'Taj Lands End', 'TajLandsEnd.jpg', 'Overlooking the Arabian Sea, this high-end hotel is 3.3 km from Bandra train station and 7.8 km from the Bandra Kurla Complex business center. Traditional rooms with sea views feature Wi-Fi, desks, and tea and coffeemaking facilities. Club-level rooms and suites provide butler service and access to a lounge with free breakfast and evening cocktails. Plush suites add separate living rooms, and some', 'Mumbai', 'Band Stand, BJ Road, Mount Mary, Bandra West, Mumbai, Maharashtra 400050', 'N'),
(3, 'Radisson Blu Hotel Pune Kharadi', 'radissonpune.jpg', 'This upscale hotel, set in a streamlined, modern building, is a minute\'s walk from a bus stop, 5 km from Aga Khan Palace and 7 km from Pune Golf Course.', 'Pune', 'Nagar Bypass Road, Pandhari Nagar, Kharadi, Pune, Maharashtra 411014', 'N'),
(4, 'Hyatt Pune', 'hyattpune.jpg', 'Next to the Aga Khan Palace, this upscale hotel in a contemporary building with a polished lobby is 4 km from Pune Golf Course and 7 km from Shaniwar Wada, an18th-century fort. Modern rooms & suites in a polished, high-end hotel with 2 restaurants, a spa & an outdoor pool.', 'Pune', 'Adjacent To Aga Khan Palace, 88, Nagar Rd, Kalyani Nagar, Pune, Maharashtra 411006', 'N'),
(5, 'Vivanta Bengaluru Residency Road', 'vivanta.JPG', 'This upscale hotel in a modern building with gardens is a 4-minute walk from Bangalore Central Mall and 9 minutes by foot from the nearest metro station. The 18th-century Bangalore Fort is 6 km away. Warm, understated rooms come with cable TV and free Wi-Fi, plus minibars, and tea and coffeemaking equipment; some have pool views. Suites add sitting areas. Room service is available.  Parking is com', 'Bangalore', '66, Residency Rd, Ashok Nagar, Bengaluru, Karnataka 560025', 'N'),
(6, 'JW Marriott Hotel Bengaluru', 'marriottbanglore.JPG', 'This upscale hotel is 8 minutes\' walk from the landmark Cubbon Park and 1.4 km from a metro stop. The airy, sophisticated rooms offer free Wi-Fi, flat-screens and iPod docks, as well as minibars, and tea and coffeemaking facilities. Upgraded rooms add executive lounge access; some have balconies. Suites include sitting areas, and some have separate living rooms. Room service is available 24/7.  Am', 'Bangalore', '24, 1, Vittal Mallya Rd, KG Halli, Shanthala Nagar, Ashok Nagar, Bengaluru, Karnataka 560001', 'N'),
(7, 'Novotel Hyderabad Convention Centre', 'novotel.JPG', 'Adjacent to Hyderabad International Convention Centre, this contemporary business hotel is 2 km from the Hitech City MMTS Station and 3.2 km from Shilparamam, an arts-and-crafts village. Modern rooms have flat-screen TVs and Wi-Fi, plus minibars and tea and coffeemaking facilities. Club rooms and suites add lounge access and free breakfast; suites also add living areas with sofas. Room service is ', 'Hyderabad', 'P.O Bag 1101, Near Hitec City, Kondapur, Telangana 500081', 'N'),
(8, 'Pearl Palace Heritage', 'jaipur.JPG', 'An 8-minute walk from a metro station, this elegant heritage-style hotel filled with detailed handcrafted artwork is 5 km from the red-and-pink sandstone Hawa Mahal palace. Itâ€™s 6 km from the 1734-era Nahargarh Fort. The colourful themed rooms feature ornate traditional decor. All come with tea and coffeemaking facilities, minifridges and flat-screen TVs, plus safes and free Wi-Fi. Some add balc', 'Jaipur', '54, Lane Number 2, Ajmer Road, Gopalbari, Jaipur, Rajasthan 302001', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_review`
--

CREATE TABLE `hotel_review` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `hotelid` int(11) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_review`
--

INSERT INTO `hotel_review` (`id`, `name`, `email`, `rating`, `description`, `hotelid`, `created_date`) VALUES
(1, 'ketaki chonkar', 'ketaki@email.com', 7, 'Awesome place to stay', 2, '2021-02-28'),
(2, 'nikhil aggarwal', 'nikhil@email.com', 4, 'Great Place', 2, '2021-02-28'),
(3, 'nikhil aggarwal', 'nikhil@email.com', 8, 'Excellent Place to stay', 5, '2021-03-01'),
(4, 'Harry Styles', 'harry@1d.com', 10, 'Awesome place to stay', 5, '2021-03-01'),
(5, 'Harry Potter', 'harry@hogwarts.com', 8, 'Very nice service', 6, '2021-03-01'),
(6, 'nikhil aggarwal', 'nikhil@email.com', 10, 'Awesome Place', 6, '2021-03-01'),
(7, 'ketaki chonkar', 'ketaki@email.com', 9, 'Great Place', 6, '2021-03-01'),
(8, 'Test data', 'test@email.com', 10, 'Great Place', 1, '2021-03-01'),
(9, 'demo', 'demo@email.com', 10, 'Test Data', 1, '2021-03-01'),
(10, 'java', 'java@email.com', 8, 'Beautiful Place', 4, '2021-03-01'),
(11, 'nikhil aggarwal', 'nikhil@email.com', 10, 'Beautiful Place', 3, '2021-03-01'),
(12, 'krishna', 'krishna@email.com', 10, 'Great Place', 3, '2021-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `booking_id` int(20) NOT NULL,
  `holdername` varchar(50) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `paymentdate` date NOT NULL,
  `payment_id` int(8) NOT NULL,
  `amount_paid` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`booking_id`, `holdername`, `cust_id`, `paymentdate`, `payment_id`, `amount_paid`) VALUES
(210218001, 'Nikhil Agarwal', 3, '2021-02-18', 6210218, 12500),
(210223001, 'Nikhil Agarwal', 3, '2021-02-23', 6210223, 12500),
(210224001, 'Nikhil Agarwal', 3, '2021-02-24', 6210224, 8199),
(210225001, 'Nikhil Agarwal', 3, '2021-02-25', 6210225, 3398),
(210226001, 'Nikhil Agarwal', 3, '2021-02-26', 6210226, 2513),
(210226003, 'Nikhil Agarwal', 3, '2021-02-26', 8210234, 5500),
(210228003, 'Nikhil Agarwal', 3, '2021-02-28', 11210228, 5500),
(210303003, '', 3, '2021-03-03', 11210303, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `roomid` int(10) NOT NULL,
  `hotelid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` int(6) NOT NULL,
  `person_allowed` int(2) NOT NULL,
  `no_of_beds` int(1) NOT NULL,
  `extra_allowed` int(1) NOT NULL,
  `total_room` int(11) NOT NULL,
  `isDeleted` varchar(2) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`roomid`, `hotelid`, `title`, `image`, `description`, `price`, `person_allowed`, `no_of_beds`, `extra_allowed`, `total_room`, `isDeleted`) VALUES
(3, 2, 'Luxury Room', 'taj1.jpeg', 'Bedecked in an interplay of muted pastels and warm woods, our Luxury Rooms are designed to relax and soothe. From these plush rooms, take in the dazzling view of the Arabian Sea.', 5500, 3, 1, 0, 10, 'N'),
(4, 2, 'Serene Infinity Sea View', 'taj2.jpeg', 'Offering clear uninterrupted views of the Arabian sea, our 37 sqm. Serene Infinity Sea View rooms exudes luxury. Enjoy endless possibilities with our signature Taj hospitality & modern in-room amenities.', 7000, 3, 1, 1, 5, 'N'),
(5, 3, 'Standard Room', 'radisson1.jpg', 'The Radisson Blu offers 96 standard rooms with the choice of one king bed or two twin beds. These beautifully appointed rooms feature modern dÃ©cor and are equipped with amenities like free Wi-Fi, a flat-screen TV with mirror casting, and room service. Stay focused at the work desk with an ergonomic', 2699, 3, 1, 1, 5, 'N'),
(6, 3, 'Business Class Room', 'radisson2.jpg', 'Ideal for corporate travelers visiting Pune, our 36 Business Class rooms feature additional space and a range of upgraded amenities and services, such as two complimentary IMFL (Indian Spirit) drinks. You can also take advantage of refreshments from the minibar, a selection of weekday newspapers and', 4000, 3, 1, 1, 5, 'N'),
(7, 4, 'Hyatt Executive Suite', 'hyatt1.jpg', 'Enjoy this regal 55-square-metre suite appointed with one king bed, work desk, separate dining and living areas, and fruit platter. This is a premium suite. See World of Hyatt programme terms for upgrade eligibility.', 2500, 3, 1, 1, 5, 'N'),
(8, 6, 'Deluxe King', 'marriott1.jpg', 'Elevate your stay at our luxurious Executive Suite, which promises a relaxing and pristine experience.', 7019, 3, 1, 1, 5, 'N'),
(9, 6, 'Deluxe Twin, Guest room', 'marriott2.jpg', 'Upgrade your accommodations and enjoy stunning panoramas from your spacious private balcony.', 7799, 3, 1, 1, 5, 'N'),
(10, 5, 'Superior Room', 'vivanta1.jpeg', 'Superior Room with its distinctive character, intelligent lighting and soothing colour tones offers the most comfortable stay. Ergonomic work stations, In-room dining menu lets you work and unwind.The room has an LED TV and a  minibar. A work desk, multi-line telephone and electronic safe are few am', 3000, 3, 1, 1, 5, 'N'),
(11, 5, 'Deluxe Room', 'vivanta2.jpeg', 'Sophisticated and warm colour palettes combined with textured furnishing gives the room a sophisticated style of a personalized city residence. The room has an LED TV and a minibar. A work desk, multi-line telephone and electronic safe are few amenities provided, to ensure your business is smooth an', 3500, 4, 1, 1, 5, 'N'),
(12, 1, 'Deluxe King Guest Room', 'marriottmum1.jpg', 'Our spacious rooms make for a luxurious space to unwind after a long day\'s work.', 4770, 4, 1, 1, 5, 'N'),
(13, 1, 'Deluxe Pool View', 'marriottmum2.jpg', 'Our spacious rooms make for a luxurious space to unwind after a long day\'s work.', 5300, 4, 1, 0, 4, 'N'),
(14, 7, 'Standard 1 Queen Bed', 'novotel1.jpg', 'This 30 mÂ² room includes a Queen size bed, free WIFI, spacious workstation, 43\" LED SMART TV, hair dryer, responsive climate control, electronic safe and tea and coffee facilities. Up to 2 adults and 2 child.', 5500, 3, 1, 1, 5, 'N'),
(15, 8, 'Jaisalmer Premium I', 'jaipur2.JPG', 'Located in the great Thar Desert, Jaisalmer is an important destination of Rajasthan. It is regarded as the western sentinel of entire India and a place well worth visiting to get an idea of native Rajasthan. The magnificent yellow sand stone carvings on mantions on buildings display the love and in', 6000, 3, 2, 1, 6, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone_no`, `dob`, `gender`, `password`) VALUES
(3, 'Nikhil Agarwal', 'nikhilagarwal20@gmail.com', 9594881585, '2021-02-19', 'M', 'nik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_car`
--
ALTER TABLE `cart_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_room`
--
ALTER TABLE `cart_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_booking`
--
ALTER TABLE `car_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_list`
--
ALTER TABLE `car_list`
  ADD PRIMARY KEY (`carid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotelid`);

--
-- Indexes for table `hotel_review`
--
ALTER TABLE `hotel_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`),
  ADD UNIQUE KEY `user_phone_number_unique` (`phone_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart_car`
--
ALTER TABLE `cart_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart_room`
--
ALTER TABLE `cart_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `car_booking`
--
ALTER TABLE `car_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `car_list`
--
ALTER TABLE `car_list`
  MODIFY `carid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hotel_review`
--
ALTER TABLE `hotel_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
  MODIFY `roomid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
