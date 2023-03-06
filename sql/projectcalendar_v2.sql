-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 09:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectcalendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `in_out` varchar(30) NOT NULL COMMENT 'ภายในเขตอำเภอ/ภายนอกเขตอำเภอ',
  `in_out_id` int(1) NOT NULL COMMENT '1/2(ภายในเขตอำเภอเมือง/ภายนอกเขตอำเภอเมือง)',
  `pre` varchar(10) NOT NULL,
  `fname` varchar(30) NOT NULL COMMENT 'ชื่อผู้ขอ',
  `lname` varchar(30) NOT NULL COMMENT 'นามสกุลผู้ขอ',
  `position` varchar(30) NOT NULL COMMENT 'ตำแหน่ง',
  `level` varchar(30) DEFAULT NULL COMMENT 'ระดับ',
  `request_for` varchar(100) NOT NULL COMMENT 'ความประสงค์เดินทาง',
  `location` varchar(255) NOT NULL COMMENT 'สถานที่จะไป',
  `passenger` int(3) NOT NULL COMMENT 'จำนวนผู้เดินทาง',
  `teacher` int(3) DEFAULT NULL COMMENT 'จำนวนอาจารย์-เจ้าหน้าที่',
  `student` int(3) DEFAULT NULL COMMENT 'จำนวนนักศึกษา',
  `date_from` date NOT NULL COMMENT 'วันที่เดินทางไป',
  `time_from` time NOT NULL COMMENT 'เวลาเดินทางไป',
  `date_to` date NOT NULL COMMENT 'วันที่เดินทางกลับ',
  `time_to` time NOT NULL COMMENT 'เวลาเดินทางกลับ',
  `distance` int(6) DEFAULT NULL COMMENT 'รวมระยะทาง',
  `caretaker` varchar(60) DEFAULT NULL COMMENT 'ผู้ดูแลรถระหว่างเดินทาง',
  `name_request` varchar(60) NOT NULL COMMENT 'ลงชื่อผู้ขออนุญาติ',
  `status` int(1) NOT NULL COMMENT 'สถานะ 1/2/3(รออนุมัติ/อนุมัติ/ไม่อนุมัติ)',
  `remark` varchar(50) DEFAULT NULL COMMENT 'ความเห็น หัวหน้าแผนกงานยานพาหนะ (สำหรับการจองนอกเขต)',
  `vehicle_id` int(11) DEFAULT NULL COMMENT 'ไอดีของรถ',
  `driver_id` int(11) DEFAULT NULL COMMENT 'ไอดีของคนขับรถ',
  `allowance` varchar(10) DEFAULT NULL COMMENT 'เบี้ยเลี้ยง',
  `manager_name` varchar(60) DEFAULT NULL COMMENT 'ลงชื่อหัวหน้าแผนกยานพาหนะ',
  `manager_date` date DEFAULT NULL COMMENT 'ลงวันที่หัวหน้าแผนกยานพาหนะ',
  `remark_mg2` varchar(30) DEFAULT NULL COMMENT 'ความเห็นผู้อำนวนการสำนักงานวิทยาเขตขอนแก่น',
  `manager2_name` varchar(60) DEFAULT NULL COMMENT 'ลงชื่อผู้อำนวนการสำนักงานวิทยาเขตขอนแก่น',
  `manager2_date` date DEFAULT NULL COMMENT 'ลงวันที่ผู้อำนวนการสำนักงานวิทยาเขตขอนแก่น',
  `remark_mg3` varchar(30) DEFAULT NULL COMMENT 'ความเห็นรองอธิการบดีประจำวิทยาเขตขอนแก่น',
  `manager3_name` varchar(60) DEFAULT NULL COMMENT 'ลงชื่อรองอธิการบดีประจำวิทยาเขตขอนแก่น',
  `manager3_date` date DEFAULT NULL COMMENT 'ลงวันที่รองอธิการบดีประจำวิทยาเขตขอนแก่น',
  `date_out` date DEFAULT NULL COMMENT 'ลงวันที่รถออก',
  `time_out` time DEFAULT NULL COMMENT 'ลงเวลารถออก',
  `sec_out` varchar(60) DEFAULT NULL COMMENT 'ลงชื่อแผนกรักษาความปลอดภัยตอนรถออก',
  `date_in` date DEFAULT NULL COMMENT 'ลงวันที่รถเข้า',
  `time_in` time DEFAULT NULL COMMENT 'ลงเวลารถเข้า',
  `sec_in` varchar(60) DEFAULT NULL COMMENT 'ลงชื่อแผนกรักษาความปลอดภัยตอนรถเข้า',
  `mile_st` int(5) DEFAULT NULL COMMENT 'เข็มไมล์(ก่อนใช้)',
  `mile_end` int(5) DEFAULT NULL COMMENT 'เข็มไมล์(หลังใช้)',
  `status_order` varchar(20) NOT NULL COMMENT 'สถานะ(ยังไม่เริ่มดำเนินการ/กำลังดำเนินการ/ดำเนิการสำเสร็จ)',
  `status_orderID` int(1) NOT NULL COMMENT 'สถานะ1/2/3(ยังไม่เริ่มดำเนินการ/กำลังดำเนินการ/ดำเนิการสำเสร็จ)',
  `tel` varchar(14) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วัน-เวลาที่สร้างรายการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `in_out`, `in_out_id`, `pre`, `fname`, `lname`, `position`, `level`, `request_for`, `location`, `passenger`, `teacher`, `student`, `date_from`, `time_from`, `date_to`, `time_to`, `distance`, `caretaker`, `name_request`, `status`, `remark`, `vehicle_id`, `driver_id`, `allowance`, `manager_name`, `manager_date`, `remark_mg2`, `manager2_name`, `manager2_date`, `remark_mg3`, `manager3_name`, `manager3_date`, `date_out`, `time_out`, `sec_out`, `date_in`, `time_in`, `sec_in`, `mile_st`, `mile_end`, `status_order`, `status_orderID`, `tel`, `document`, `created`) VALUES
(1, 'ภายในอำเภอเมือง', 1, 'นาง', 'วรรณรัต', 'ทะแพงพันธ์', 'นักวิชาการ', NULL, 'ขนของงานรับปริญญา', 'อาคาร 12 และอาคาร 18', 6, NULL, NULL, '2022-11-01', '08:00:00', '2022-11-01', '17:00:00', NULL, NULL, 'วรรณรัต ทะแพงพันธ์', 2, NULL, 9, 8, NULL, 'ชุติกาญจน์ ลครเขต', '2023-01-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ดำเนินการสำเร็จแล้ว', 2, '', NULL, '2023-02-08 08:59:41'),
(2, 'นอกอำเภอเมือง', 2, 'อ.', 'วุฒิชัย', 'จันโทร์', 'รองคณบดีฝ่ายบริหาร', '-', 'ร่วมเป็นเกียรติ์ในพิธีเปิดการประกวดสิ่งประประดิษฐ์', 'วิทยาลัยการอาชีพพล อ.พล', 2, 2, 0, '2022-12-15', '06:30:00', '2022-12-15', '16:00:00', 90, 'อาจารย์วุฒิชัย จันโทร์', 'อาจารย์วุฒิชัย จันโทร์', 2, '-', 5, 10, '1000', 'ชุติกาญจน์ ลครเขต', '2023-01-04', 'อนุมัติ', 'ชุติกาญจน์ ลครเขต (แทน)', '2023-01-04', 'อนุมัติ', 'อ.ปริญ นาชัยสิทธิ์', '2023-01-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'กำลังดำเนินการ', 0, '', NULL, '2023-01-04 09:58:19'),
(3, 'นอกอำเภอเมือง', 2, 'น.ส.', 'คนึงนิจ', 'กลิ่นขจร', 'ผู้อำนวยการสำนักงานฯ', '-', 'เข้าร่วมโครงการฝึกอบรมเชิงปฏิบัติ', 'มุกดาหาร', 2, 2, 0, '2022-11-30', '07:00:00', '2022-12-02', '21:00:00', 444, 'น.ส.คนึงนิจ กลิ่นขจร', 'น.ส.คนึงนิจ กลิ่นขจร', 2, '-', 7, 5, '-', 'ชุติกาญจน์ ลครเขต', '2023-01-04', 'อนุมัติ', 'ชุติกาญจน์ ลครเขต (แทน)', '2023-01-04', 'อนุมัติ', 'อ.ปริญ นาชัยสิทธิ์', '2023-01-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'กำลังดำเนินการ', 0, '', NULL, '2023-01-04 10:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `event_google`
--

CREATE TABLE `event_google` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `datetimeTst` varchar(30) NOT NULL,
  `datetimeTend` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_google`
--

INSERT INTO `event_google` (`id`, `title`, `description`, `location`, `date_from`, `date_to`, `time_from`, `time_to`, `datetimeTst`, `datetimeTend`, `created`) VALUES
(1, 'อาคาร 12 และอาคาร 18', 'ขนของงานรับปริญญา', 'อาคาร 12 และอาคาร 18', '2022-11-01', '2022-11-01', '08:00:00', '17:00:00', '2022-11-01T08:00:00+07:00', '2022-11-01T17:00:00+07:00', '2023-01-04 09:22:32'),
(2, 'วิทยาลัยการอาชีพพล อ.พล', 'ร่วมเป็นเกียรติ์ในพิธีเปิดการประกวดสิ่งประประดิษฐ์', 'วิทยาลัยการอาชีพพล อ.พล', '2022-12-15', '2022-12-15', '06:30:00', '16:00:00', '2022-12-15T06:30:00+07:00', '2022-12-15T16:00:00+07:00', '2023-01-04 09:58:19'),
(3, 'มุกดาหาร', 'เข้าร่วมโครงการฝึกอบรมเชิงปฏิบัติ', 'มุกดาหาร', '2022-11-30', '2022-12-02', '07:00:00', '21:00:00', '2022-11-30T07:00:00+07:00', '2022-12-02T21:00:00+07:00', '2023-01-04 10:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `notify_line`
--

CREATE TABLE `notify_line` (
  `notify_id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notify_line`
--

INSERT INTO `notify_line` (`notify_id`, `token`) VALUES
(1, 'XXWx07x0nEy394QoUmkLYGMSC1ylEkjle5yGHw9WGlu');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type_name`) VALUES
(1, 'รถกระบะ'),
(2, 'รถมินิบัส'),
(3, 'รถไมโครบัส'),
(4, 'รถตู้'),
(5, 'รถประเภท 6 ล้อ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `userlevel` int(1) NOT NULL COMMENT '1 คือ ผู้ดูแลระบบ\r\n2 คือ พนักงานขับรถ',
  `pre` varchar(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `position` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text DEFAULT NULL COMMENT 'รหัสผ่าน',
  `tel` varchar(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `userlevel`, `pre`, `fname`, `lname`, `sex`, `position`, `email`, `password`, `tel`, `photo`) VALUES
(1, 1, 'นาย', 'ชินวุฒิ', 'รัตนบุรี', 'ชาย', 'ผู้ดูแลระบบ', 'chinnawut.ra@rmuti.ac.th', '14158', '0836784303', 'IMG-63284dc8f111d2.37807443.jpg'),
(2, 2, 'นางสาว', 'ยิ่งตะวัน', 'แสงสุวรรณดี', 'หญิง', 'พนักงานขับรถ', 'yingtawan.sa@rmuti.ac.th', '123', '0981397962', 'IMG-63284d92aef534.15319327.jpg'),
(3, 2, 'นาย', 'เกีตรติศักดิ์', 'สะตะ', 'ชาย', 'พนักงานขับรถ', 'test1@gmail.com', '', '0874704877', 'IMG-63b5489843e944.80783356.jpg'),
(4, 1, 'นาย', 'พัฒนา', 'ทิพม่อม', 'ชาย', 'ผู้ดูแลระบบ', 'test2@gmail.com', '', '0911284427', 'IMG-63b548b017ad58.98353581.jpg'),
(5, 2, 'นาย', 'สุวรรณ', 'นิยมทอง', 'ชาย', 'พนักงานขับรถ', 'test3@gmail.com', '', '0879857823', 'IMG-63b548eae2f403.81605857.jpg'),
(6, 2, 'นาย', 'บุญถิ่น', 'ถิ่นถาน', 'ชาย', 'พนักงานขับรถ', 'test4@gmail.com', '', '0862365474', 'IMG-63b5490704df40.98466244.jpg'),
(7, 2, 'นาย', 'สมชาย', 'นะคำศรี', 'ชาย', 'พนักงานขับรถ', 'test5@gmail.com', '', '0963537443', 'IMG-63b549345b4724.61714182.jpg'),
(8, 2, 'นาย', 'ธีรสิทธิ์', 'ประเสริฐสังข์', 'ชาย', 'พนักงานขับรถ', 'test6@gmail.com', '', '0629892953', 'IMG-63b5495334c379.74759738.jpg'),
(9, 2, 'นาย', 'เดวิด', 'ทาปุ๋ย', 'ชาย', 'พนักงานขับรถ', 'test7@gmail.com', '', '0877729322', 'IMG-63b5496b9f5313.76769800.jpg'),
(10, 2, 'นาย', 'ไอศูรย์', 'เงาพระฉาย', 'ชาย', 'พนักงานขับรถ', 'test8@gmail.com', '', '0810527121', 'IMG-63b54978ac9d27.28832897.jpg'),
(11, 2, 'นาย', 'พงศกร', 'ลาโกตร', 'ชาย', 'พนักงานขับรถ', 'test8@gmail.com', '', '0833608515', 'IMG-63b5499f0ac026.76424321.jpg'),
(12, 1, 'นาง', 'ชุติกาญจน์', 'ลครเขต', 'หญิง', 'ผู้ดูแลระบบ', 'chinnawut14158@gmail.com', '1234', '0858541901', 'IMG-63a029251f2ce3.73570128.png');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `vehicle_name` varchar(50) NOT NULL,
  `seat` varchar(30) NOT NULL,
  `license_plate` varchar(30) NOT NULL,
  `mile` varchar(10) NOT NULL,
  `vehicle_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `type_id`, `vehicle_name`, `seat`, `license_plate`, `mile`, `vehicle_photo`) VALUES
(1, 4, 'TOYOTA', '10', 'นข - 4708', '0', 'IMG-63a03e3634f725.33192527.jpg'),
(2, 4, 'TOYOTA', '10', 'นข - 9921', '0', 'IMG-63b54aa60f5239.11464543.jpg'),
(3, 4, 'TOYOTA', '10', 'นข - 9924', '0', 'IMG-63b54a40081914.45635862.jpg'),
(4, 4, 'TOYOTA', '10', 'นข - 3884', '0', 'IMG-63b405d4ca1ff5.06899651.jpg'),
(5, 4, 'TOYOTA', '10', 'นข - 9923', '0', 'IMG-63b54a197fb330.55151580.jpg'),
(6, 4, 'TOYOTA', '10', 'นข - 3883', '0', 'IMG-63b4059d867cc6.86181530.jpg'),
(7, 4, 'TOYOTA', '10', 'นข - 9920', '0', 'IMG-63b54a6f7fcf00.12137546.jpg'),
(8, 1, 'TOYOTA VEGO', '3', 'กธ - 6218', '0', 'IMG-63a03e3634f725.33192527.jpg'),
(9, 1, 'TOYOTA VEGO', '4', 'กธ - 6219', '33', 'IMG-63b402fc157bc7.56000687.jpg'),
(10, 1, 'FORD', '4', 'ผพ - 2795', '0', 'IMG-63a03e3634f725.33192527.jpg'),
(11, 2, 'TOYOTA', '20', '40 - 0411', '0', 'IMG-63a03e3634f725.33192527.jpg'),
(12, 2, 'TOYOTA', '20', '40 - 0635', '0', 'IMG-63b407791e79f4.63703186.jpg'),
(13, 3, 'TOYOTA', '20', '40 - 0636', '0', 'IMG-63b40487325a71.11129137.jpg'),
(14, 5, 'ISUZU', '-', '40 - 0162', '0', 'IMG-63b406fc4d7879.00675803.jpg'),
(15, 5, 'HINO', '-', '82 - 8504', '0', 'IMG-63b40660379e01.09934800.jpg'),
(16, 5, '-', '-', '40 - 0477', '0', 'IMG-63a03e3634f725.33192527.jpg'),
(17, 5, 'TOYOTA', '-', '82 - 9096', '0', 'IMG-63b406a92c5745.61661125.jpg');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_google`
--
ALTER TABLE `event_google`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify_line`
--
ALTER TABLE `notify_line`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `event_google`
--
ALTER TABLE `event_google`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notify_line`
--
ALTER TABLE `notify_line`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
