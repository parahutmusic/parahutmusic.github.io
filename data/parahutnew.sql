-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2017 at 05:46 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parahutnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

CREATE TABLE `band` (
  `band_id` int(10) NOT NULL,
  `band_name` text COLLATE utf8_unicode_ci NOT NULL,
  `music` text COLLATE utf8_unicode_ci NOT NULL,
  `band_pic` text COLLATE utf8_unicode_ci NOT NULL,
  `band_dt` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`band_id`, `band_name`, `music`, `band_pic`, `band_dt`) VALUES
(2, 'วงพัทลุง', '1.มหาลัยวัวชน\r\n2.คบแล้วจะรัก\r\n3.มดแดงเผ้าม่วง\r\n4.ที่อยู่ตรงนี้ก็มีหัวใจ\r\n5.รักนะมอมอ\r\n6.ใบไม้ไม่เคยหายไป\r\n7.ผู้หญิงกินผัว\r\n8.วัวชนฅนสู้\r\n9.มหาลัยวัวชน(English Version)\r\n10.รักหนัดเหนียน\r\n11.หญิงร้ายชายชั่ว', 'pic_band_profile/2.jpg', 'pic_band_detail/Phatthalung.jpg'),
(1, 'โอ พารา & เซาท์พาราไดส์', '1.ยางผลัดใบ\r\n2.สัญญาใบไม้\r\n3.เฟสบุ๊คบุกสวนยาง\r\n4.หญิงร้ายชายชั่ว\r\n5.ไม่ได้หลอกแต่ก็ไม่ได้รัก\r\n5.นกนางแอ่น\r\n6.ซาไก\r\n7.พันธุ์เดียวกัน\r\n', 'pic_band_profile/1.jpg', 'pic_band_detail/opara.jpg'),
(3, 'วงแบเบาะ', '1.เด็กเพื่อนเพ\r\n2.อยู่ประเด้\r\n3.หวงก้าง\r\n4.เด็กเทคนิค', 'pic_band_profile/3.jpg', 'pic_band_detail/bahbho.jpg'),
(4, 'วงกล้วยไม้', '1.รักก็บอก ไม่รักก็บอก', 'pic_band_profile/10.jpg', 'pic_band_detail/14192796_1816472768585359_8908714067962325439_n.jpg'),
(5, 'วงสาคู', '1.เด็กอ้อร้อ', 'pic_band_profile/6.jpg', 'pic_band_detail/saku.jpg'),
(6, 'ช้าง ชาลี', '1.เพียงโอกาส\r\n2.ขอได้หม้าย\r\n3.ซบที่ตรงนี้', 'pic_band_profile/12.jpg', 'pic_band_detail/chang.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `live`
--

CREATE TABLE `live` (
  `live_id` int(10) NOT NULL,
  `live_url` text COLLATE utf8_unicode_ci NOT NULL,
  `live_date` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(2) NOT NULL,
  `prename` text COLLATE utf8_unicode_ci NOT NULL,
  `member_name` text COLLATE utf8_unicode_ci NOT NULL,
  `member_nikname` text COLLATE utf8_unicode_ci NOT NULL,
  `day` text COLLATE utf8_unicode_ci NOT NULL,
  `month` text COLLATE utf8_unicode_ci NOT NULL,
  `year` text COLLATE utf8_unicode_ci NOT NULL,
  `member_edu` text COLLATE utf8_unicode_ci NOT NULL,
  `position` text COLLATE utf8_unicode_ci NOT NULL,
  `member_pic` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `prename`, `member_name`, `member_nikname`, `day`, `month`, `year`, `member_edu`, `position`, `member_pic`) VALUES
(3, 'นาย', 'จิรายุทธ กูลสุวรรณ์', 'เค', '25', '3', '2537', '- โรงเรียนหารเทารังสีประชาสรรค์', 'กีต้าร์', 'pic_member/k.jpg'),
(4, 'นาย', 'อรรถพงศ์ ชุมแก้ว', 'ตุ๊ต๊ะ', '10', '7', '2538', '- วิทยาลัยเกษตรและเทคโนโลยีสงขลา', 'กลอง', 'pic_member/ta.jpg'),
(2, 'นาย', 'ทิวากร แก้วบุญส่ง', 'โอ', '10', '3', '2527', '- โรงเรียนตะโหมด ฃ\r\n- ปริญญาตรี มหาลัยราชภัฎภุเก็ต\r\n- ปริญญาโท เทคโนโลยีสยาม', 'ร้องนำ', 'pic_member/1.jpg'),
(1, 'นาย', 'โชติพัทธ์ ศรีอนันต์', 'ช้าง', '2', '12', '2537', '- โรงเรียนหารเทารังสีประชาสรรค์ คณิตศาสตร์-อังกฤษ\r\n- มหาวิทยาลัยราชภัฏสงขลา คณะวิทยาการจัดการ สาขาวิชาคอมพิวเตอร์ธุรกิจ', 'ร้องนำ', 'pic_member/12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `memberband`
--

CREATE TABLE `memberband` (
  `mb_id` int(20) UNSIGNED NOT NULL,
  `member_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `band_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `memberband`
--

INSERT INTO `memberband` (`mb_id`, `member_id`, `band_id`) VALUES
(1, '1', '6'),
(2, '2', '1'),
(3, '3', '2'),
(4, '4', '2');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `news_name` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `news_detail` text COLLATE utf8_unicode_ci,
  `photo_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_name`, `news_date`, `news_detail`, `photo_id`) VALUES
(1, 'ภาพยนตร์ มหาลัยวัวชน Song from Phatthalung 30 มีนาคม 2560 ', '17 มีนาคม 2560 เวลา 20:59:27', 'มากกว่าหนังรัก มากกว่าหนังเพลง นี่คือหนังที่จะทำให้คุณยิ้ม หัวเราะ และอาจมีน้ำตาให้หัวใจได้อิ่ม\r\nภาพยนตร์ชีวิตของคนบ้านๆ เพื่อสร้างแรงบันดาลใจให้คนบ้านๆ ทั่วประเทศ\r\n\r\nบุญส่ง นาคภู่ : กำกับภาพยนตร์\r\nอภิชาติ จันทร์แดง, บุญส่ง นาคภู่ : บทภาพยนตร์\r\nธีรวัฒน์ รุจินธรรม, วรรธนะ วันชูเพลา : กำกับภาพ\r\nปรเมศวร์ กาแก้ว : ภาพนิ่ง\r\nทิวากร แก้วบุญส่ง (โอ พารา)\r\nเทอดพงศ์ เภอบาล (พงศ์ วงพัทลุง)\r\nยุวดา โอฬาร์กิจ (มิสคันทรี่เกิร์ลไทยแลนด์) : แสดงนำ\r\n#ปลาเป็นว่ายทวนน้ำ\r\n#พาราฮัทฟิล์ม\r\n#เดอลองกาแฟสังข์หยด กาแฟดีจากพัทลุง\r\n#มหาลัยวัวชนเดอะมูฟวี่\r\nhttps://www.facebook.com/parahutfilm\r\nตัวอย่างภาพยนตร์\r\nhttps://www.youtube.com/watch?v=_U6GDa8VCqs&t=2s', 1),
(2, '30 มีนาคมนี้ ในโรงภาพยนตร์ "มหาลัยวัวชน" Song from Phatthalung', '17 มีนาคม 2560 เวลา 21:04:23', 'เราเด็กบ้านๆ เราเด็กเลี้ยงวัว สากลัวเธอไม่ สนใจ...\r\nตัวอย่างหนัง #มหาลัยวัวชน Song from Phatthalung 30 มีนาคมนี้ในโรงภาพยนตร์\r\nภาพยนตร์ชีวิตของคนบ้านๆ เพื่อสร้างแรงบันดาลใจให้คนบ้านๆ ทั่วประเทศ \r\nเรื่องราวชีวิต ความคิด ความฝัน กำลังเคลื่อนขบวน ทั่วประเทศ !\r\n\r\n#ตัวอย่างหนัง \r\nhttps://www.youtube.com/watch?v=_U6GDa8VCqs&t=2s', 2);

-- --------------------------------------------------------

--
-- Table structure for table `photonews`
--

CREATE TABLE `photonews` (
  `photo_id` int(10) NOT NULL,
  `photo_name` text COLLATE utf8_unicode_ci NOT NULL,
  `news_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photonews`
--

INSERT INTO `photonews` (`photo_id`, `photo_name`, `news_id`) VALUES
(1, 'pic_news/Song from Phatthalung.jpg', 1),
(2, 'pic_news/Song from Phatthalung2.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `ad_idimg` int(2) NOT NULL,
  `ad_img1` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`ad_idimg`, `ad_img1`) VALUES
(1, 'pic_slide/slide1.jpg'),
(2, 'pic_slide/slide2.jpg'),
(3, 'pic_slide/Cover2.jpg'),
(4, 'pic_slide/Cover1.jpg'),
(5, 'pic_slide/Cover2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`band_id`);

--
-- Indexes for table `live`
--
ALTER TABLE `live`
  ADD PRIMARY KEY (`live_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `memberband`
--
ALTER TABLE `memberband`
  ADD PRIMARY KEY (`mb_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `photonews`
--
ALTER TABLE `photonews`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`ad_idimg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
  MODIFY `band_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `photonews`
--
ALTER TABLE `photonews`
  MODIFY `photo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `ad_idimg` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
