-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2018 at 01:33 PM
-- Server version: 5.5.56-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jstewart39_2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `campgrounds`
--

CREATE TABLE `campgrounds` (
  `name` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `gps_lat` decimal(10,6) NOT NULL,
  `gps_long` decimal(10,6) NOT NULL,
  `totalsites` int(11) NOT NULL,
  `power` tinyint(1) NOT NULL,
  `fishing` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `siterate` int(11) NOT NULL,
  `rating` decimal(8,2) NOT NULL,
  `ratingcount` int(11) NOT NULL,
  `popularity` int(11) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `image_file` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campgrounds`
--

INSERT INTO `campgrounds` (`name`, `phone`, `address`, `location`, `gps_lat`, `gps_long`, `totalsites`, `power`, `fishing`, `description`, `siterate`, `rating`, `ratingcount`, `popularity`, `image_title`, `image_file`, `cid`) VALUES
('Centennial Park Family Campground - Joseph Lake', '7809412124', '22031 Twp. Rd. 500', 'Leduc County', '53.279470', '-113.078230', 72, 1, 0, 'Quiet Family campground - Group use area - Golf course 2km west - Bird Watching Area - Volleyball - Pets on Leash', 29, '4.10', 1, 0, 'Joseph Lake Centennial Park Campsites', 'AB0482F.jpg', 1),
('Black Nugget Lake Campground', '7806632421', '49117 Rge. Rd. 182', 'Ryley', '53.214240', '-112.536755', 65, 1, 1, 'Redeveloped site of former coalmine / Bird Watching - Migratory Waterfowl / Group Sites & Group Areas / Electric Motor Boats Only / Manager on-site', 30, '4.20', 1, 1, 'Black Nugget Lake Campsite', 'AB0590C.jpg', 3),
('Chip Lake Park', '7808981446', '', 'Wildwood', '53.669395', '-115.350423', 35, 0, 1, 'Group area / Security Patrol / $25.00 per unit per night.', 25, '4.40', 1, 0, 'Chip Lake Park Campsite', 'AB0266D.jpg', 4),
('Battle Lake Park Campground', '7803523321', '', 'Wetaskiwin', '52.965741', '-114.165568', 40, 1, 0, 'RATES SUBJECT TO CHANGE / 27 Designated sites / Trolling motors only / Within 10 minutes of several golf courses', 27, '4.40', 1, 0, 'Campsite at Battle Lake Park Campground', 'AB0441-3.jpg', 5),
('Camp in Town', '7807065050', '5200 Riverside', 'Whitecourt', '54.135490', '-115.687330', 60, 1, 0, 'Year round camping available / Monthly and weekly rates / In town, close to town services and events', 25, '2.90', 1, 0, 'Camp in Town Campsite', 'AB0643-5.jpg', 6),
('Pigeon Lake Provincial Park', '780-586-2864', 'Township Rd 470A, Mulhurst, AB T0C 2C0', 'Poplar Bay', '53.025240', '-114.138719', 153, 1, 1, 'A sandy beach and swimming are available. Sites in the A-loop are large and well-spaced under mixed forest, consisting largely of balsam poplar and aspen. The B section sites are close together, those in C are quite open and placed along the road. D-loop is available through reservation only for group camping. The remaining loops, E through G, are fairly closely spaced. Minigolf at Pigeon Lake Village. Campers up to 18.3 meters long accommodated.', 23, '5.00', 1, 3, 'Dock at Pigeon Lake Provincial Park Campground', 'AB0498C.jpg', 20),
('Burma Park', '403-578-4040', '', 'Brownfield', '52.400572', '-111.411499', 21, 1, 1, 'Random & designated sites / 3 Ball diamonds / Shower facilities $2.00 Charge. Pets off leash. Most of the campsites are quite large and surrounded by forest.', 20, '17.00', 4, 14, 'Campsite at Burma Park', 'AB0119-2.jpg', 21),
('Big Knife Provincial Park', '403-742-7516', '', 'Forestburg', '52.489396', '-112.219680', 51, 0, 1, 'Large sites, well-spaced in general, under aspen trees or in grassy field. The walk-in day use area has a wading pool. There are 11 walk-in tenting sites under spruce and about 9 overflow sites in a big field, in addition to the 50 regular sites. In the Battle River Valley. RATES SUBJECT TO CHANGE / 11 walk-in tenting sites / 12 km hiking trails.', 21, '10.00', 3, 9, 'Campsite at Big Knife Provincial Park', 'AB0289E.jpg', 22),
('Aspen Beach Provincial Park', '4037484066', 'Aspen Beach Box 681 Bentley, AB T0C 0J0', 'Bentley', '52.460119', '-113.979420', 255, 1, 1, 'RATES SUBJECT TO CHANGE / Campsite & group camping reservations: Reserve.AlbertaParks.ca or 1-877-537-2757 / 2015 campsite reservations begin Feb. 17 / 2 campgrounds (Lakeview and Brewers), 1 group campground, 1 day use area', 23, '11.00', 3, 8, 'Campsite at Aspen Beach Provincial Park', 'AB0085B.jpg', 23),
('Coal Lake South Park', '780-362-0097', '', 'Wetaskiwin', '53.003320', '-113.217390', 25, 0, 1, 'Coal Lake Dam is nearby, providing fishing opportunities. Campsites are in grassy field under mostly balsam poplar, below the dam. Most are well spaced and large but there isn\'t much ground cover for privacy.', 25, '9.00', 5, 11, 'Campsite at Coal Lake South Park', 'AB0136B.jpg', 24),
('Buck Lake Park', '780-621-6856', '', 'Wetaskiwin', '52.948880', '-114.767464', 35, 0, 1, 'RATES SUBJECT TO CHANGE / Coin showers / No reservations please / Located in the Hamlet of Buck Lake.', 27, '7.00', 2, 5, 'Campsite at Buck Lake Park', 'AB0002A.JPG', 25),
('Bear Lake Campground', '780-693-2479', '55118 Hwy 748 E', 'Edson', '53.739485', '-116.157692', 34, 0, 1, 'Day use area on site / Volleyball / Firewood $5 / Reservations available / Playground / Concession', 17, '17.00', 4, 12, 'Campsite at Bear Lake Campground', 'AB0003A.jpg', 26),
('Cold Lake Provincial Park', '780-594-7856', 'PO Box 8208, 1020 8th Ave Cold Lake, AB T9M 1N1', 'Cold Lake', '54.604929', '-110.073352', 117, 1, 1, 'Spacious and well separated sites with good undergrowth. Aspen, white spruce birch and balsam poplar forest. Cold clean water in Cold Lake. There is a small sandy beach at the day use area. RATES SUBJECT TO CHANGE / Campsite & group camping reservations: Reserve.AlbertaParks.ca or 1-877-537-2757 / Change houses / Hiking trails / Playgrounds / 12 walk-in tenting sites', 23, '7.00', 2, 5, 'Campsite with tent at Cold Lake Provincial Park', 'AB0166B.jpg', 27),
('Beaver Lake Campground', '780-623-9222', 'Box 2511 Lac La Biche, AB T0A 2C0', 'Lac La Biche', '54.757981', '-111.881065', 92, 1, 1, 'Some sites are open and some are made private by the vegetation of a mixed forest. To reach the power boxes, you may need a very long extension cord. Lakeside sites have views but no services. There are 11 overflow sites, all unserviced. Formerly this campground was called Fish\'n Friends.', 23, '4.00', 1, 3, 'Campsite at Beaver Lake Campground', 'AB0414-12.jpg', 28),
('Calling Lake Provincial Park', '780-331-9812', '2nd Flr, 4810-50 st Athabasca, AB T9S 1C9', 'Athabasca', '55.176535', '-113.274738', 81, 1, 1, 'Fairly open sites with medium spacing, away from lakeside. Limited services after mid-September / Bird watching / Ice fishing.', 29, '3.00', 1, 3, 'Campsite at Calling Lake Provincial Park', 'AB0131D.jpg', 29),
('Carson-Pegasus Provincial Park', '780-778-2664', '', 'Spruce Grove', '54.297304', '-115.643441', 182, 1, 1, 'Campsite reservations: 780-778-2664 / Wheelchair-accessible fishing area / 27 pull-thru sites & 15 walk-in tenting sites / Senior discount / Ice fishing access', 23, '13.00', 4, 9, 'Campsite at Carson-Pegasus Provincial Park', 'AB0004A.JPG', 30),
('Andrew R.V. Park', '780-365-3687', '5021-50 St, Andrew, AB T0B 0C0', 'Andrew', '53.877564', '-112.331397', 16, 1, 0, 'Overflow sites avail. Close to minigolf, playground, recreation complex (fitness area, sauna, whirlpool & bowling alley). Located beside railway in open field. The power-only sites appear to have no tables and are quite small.', 30, '5.00', 2, 11, 'Open Camping Area at Andrew R.V. Park', 'AB0043B.jpg', 31),
('Camp\'N RV - Lloydminster', '780-875-4663', 'Hwy #16 & Range Road 22', 'Lloydminster', '53.296540', '-110.201690', 56, 1, 0, 'Year round full service camping sites (power, water, sewer) shower house, laundry, WiFi, 30 & 50 Amp receptacles. RV & Boat Storage is also available at this location.', 27, '11.00', 4, 10, 'Aerial view of Camp\'N RV - Lloydminster Campground', 'AB0001A.JPG', 32),
('Capt. Ayre Lake & Resort', '780-753-6261', 'Box 1712 Provost, AB T0B 3S0', 'Provost', '52.295220', '-110.714690', 83, 1, 1, 'No reservations - First Come, First Served * Beach volleyball * Ball Diamonds * Hall facility, bookings and off-season number 780-753-6261 * Swimming lessons avail.Jul * 9-hole golf course nearby * Boat speed limit - 12 kph * Group MD Lot $50.00 * Group Site $90.00', 17, '3.00', 1, 5, 'Campsite at Capt. Ayre Lake & Resort', 'AB0123D.jpg', 33),
('Bannister Campground', '780-753-2261', '4904 - 51 Avenue, Provost, AB T0B 3S0', 'Provost', '52.355097', '-110.249360', 52, 1, 0, 'Campground section A: 8 Sites with campstove P: / Section B (Bannister): 45 sites PWS: / CC accepted at Town office (4904-51 Ave, Hours 8:30 am-4:30 pm) / Adj. to Comm Centre, Bowling Alley, Tennis Courts, Skateboard Park & Ball Diamonds / Wkly/Mthly rates', 21, '13.00', 5, 15, 'Campsites at Bannister Campground', 'AB0516-3.jpg', 34),
('Cache Lake Campground', '780-865-5600', '', 'Hinton', '53.491085', '-117.803063', 14, 0, 0, 'This is a campground within William A. Switzer Prov. Park. Under lodgepole pines. Campers up to 13.7 meters long accommodated. Open May-first snowfall.', 21, '3.00', 2, 6, 'Campsite at Cache Lake Campground', 'AB0364A.jpg', 35),
('Anthony Henday Campground', '403-318-3508', '5639 - 53 Ave, Innisfail, AB', 'Innisfail', '52.033181', '-113.960032', 42, 1, 0, 'Small lake nearby. On the edge of town near the highway. Sites fairly close together but some cover between. Mostly aspen. The campground is connected by paved trails to nearby lakes, recreation areas as well as to downtown Innisfail. Near to Discovery Wildlife Park. Tenting area / Treed sites / Golf course close by / Hot Showers / Bike Trails Close by.', 15, '5.00', 2, 12, 'Campsite at Anthony Henday Campground', 'AB0372F.jpg', 36),
('Castor Rec. Area & Campground', '4038823225', '', 'Castor', '52.216611', '-111.906918', 20, 1, 0, 'Adjacent to golf course and 3 shale ball diamonds. This is a first come first serve campsite. Reservations are not taken.', 10, '4.00', 3, 8, 'Campsites at Castor Rec. Area & Campground', 'AB0151B.jpg', 37),
('Prairie Creek Provincial Recreation Area', '403-845-8349', 'Box 298 Rocky Mountain House, AB T4T 1A2', 'Caroline', '52.247962', '-115.303316', 50, 0, 1, 'Very large, well-spaced campsites with gravel pads in a spruce forest with good undergrowth. Equestrian trails.', 26, '9.00', 2, 5, 'Campsite at Prairie Creek Provincial Recreation Area', 'AB0019C.jpg', 38),
('Brazeau River Prov. Rec. Area', '780-865-2154', '', 'Edson', '52.879022', '-116.555957', 7, 0, 1, 'The large, well-spaced sites are in a mixed forest setting. Trails for OHV and equestrian useare available. Campsites on either side of Brazeau River / Canoeing/rafting staging area / Informal OHV & equestrian trails in the vicinity.', 10, '3.00', 1, 3, 'Campsite at Brazeau River Prov. Rec. Area', 'AB0002C.jpg', 39),
('Arm Lake Recreation Area', '780-842-4727', '', 'Wainwright', '52.754395', '-110.592088', 127, 1, 1, 'There are a variety of sites, most are surrounded by thick brush. Some of the sites are along the edge of the golf course. Some have lake views. There is a sandy beach. The golf club house has a restaurant. Camp kitchen with power / 9-hole golf course / Power Cart Rentals / Family center / Restaurant / Pets on leash / No Quads.', 12, '3.00', 1, 6, 'Campsite at Arm Lake Recreation Area', 'AB0247-6.jpg', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campgrounds`
--
ALTER TABLE `campgrounds`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campgrounds`
--
ALTER TABLE `campgrounds`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
