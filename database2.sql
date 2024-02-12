-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table database.branch: ~36 rows (approximately)
DELETE FROM `branch`;
INSERT INTO `branch` (`branch_name`, `branch_id`, `faculty_id`, `innitial`) VALUES
	('สาขาการบัญชี', 1521, 1500, 'AC.'),
	('สาขาการเงิน', 1522, 1500, 'FN.'),
	('สาขาการตลาด', 1523, 1500, 'MK.'),
	('สาขาระบบสารสนเทศ', 1531, 1500, 'IS.'),
	('สาขาการจัดการ', 1532, 1500, 'MG.'),
	('สาขาคณิตศาสตร์และสถิติประยุกต์', 1621, 1600, 'ST.'),
	('สาขาเคมีประยุกต์', 1622, 1600, 'CHS.'),
	('สาขาฟิสิกส์ประยุกต์', 1623, 1600, 'PHY.'),
	('สาขาวิชาวิทยาการวัสดุและนวัตกรรม', 1624, 1600, 'MSI.'),
	('สาขาวิทยาการคอมพิวเตอร์', 1625, 1600, 'CS.'),
	('สาขาวิชาเทคโนโลยีโลจิสติกส์', 1626, 1600, 'LT.'),
	('สาขาวิชาการท่องเที่ยว', 1631, 1600, 'TOU.'),
	('สาขาวิชาเทคโนโลยีสื่อสารมวลชน', 1632, 1600, 'MCT.'),
	('สาขาวิศวกรรมโยธา', 1721, 1700, 'CE.'),
	('สาขาวิศวกรรมสำรวจ', 1722, 1700, 'SE.'),
	('สาขาวิศวกรรมไฟฟ้า', 1731, 1700, 'EE.'),
	('สาขาวิศวกรรมโทรคมนาคม', 1732, 1700, 'TE.'),
	('สาขาวิศวกรรมคอมพิวเตอร์', 1733, 1700, 'CPE.'),
	('สาขาวิศวกรรมอิเล็กทรอนิกส์', 1734, 1700, 'EEE.'),
	('สาขาวิศวกรรมเครื่องกล', 1741, 1700, 'ME.'),
	('สาขาวิศวกรรมเครื่องจักรกลเกษตร', 1742, 1700, 'AME.'),
	('สาขาวิศวกรรมหลังการเก็บเกี่ยวและแปรสภาพ', 1743, 1700, 'PPE.'),
	('สาขาวิศวกรรมพลักงงานและการปรับอากาศ', 1745, 1700, 'RAE.'),
	('สาขาวิศวกรรมเมคคาทรอนิกส์', 1746, 1700, 'MCE.'),
	('สาขาวิศวกรรมอุตสาหการ', 1751, 1700, 'IE.'),
	('สาขาวิศวกรรมวัสดุ', 1752, 1700, 'TDE.'),
	('สาขาทัศนศิลป์', 1824, 1800, 'VA.'),
	('สาขาออกแบบผลิตภัณฑ์อุตสาหกรรม', 1825, 1800, 'ID.'),
	('สาขาออกแบบเซรามิก', 1826, 1800, 'CD.'),
	('สาขาออกแบบบรรจุภัณฑ์', 1827, 1800, 'PD.'),
	('สาขาเทคโนโลยีออกแบบนิเทศศิลป์', 1828, 1800, 'CDT.'),
	('สาขาสถาปัตยกรรม', 1831, 1800, 'AAR.'),
	('สาขาสถาปัตยกรรมภายใน', 1832, 1800, 'AIA.'),
	('สาขาการจัดการผังเมือง', 1833, 1800, 'AUP.'),
	('สาขาเทคโนโลยีมัลติมีเดีย', 1834, 1800, 'AMT.');

-- Dumping data for table database.faculty: ~4 rows (approximately)
DELETE FROM `faculty`;
INSERT INTO `faculty` (`faculty_name`, `faculty_id`) VALUES
	('คณะบริหารธุรกิจ', 1500),
	('คณะวิทยาศาสตร์และศิลปศาสตร์', 1600),
	('คณะวิศวกรรมศาสตร์และสถาปัตยกรรมศาสตร์\r', 1700),
	('คณะศิลปกรรมและออกแบบอุตสาหกรรม', 1800);

-- Dumping data for table database.student_info: ~0 rows (approximately)
DELETE FROM `student_info`;
INSERT INTO `student_info` (`number`, `user_id`, `first_name`, `last_name`, `faculty`, `branch`, `innitial`, `sectionn`, `expi`, `teacher`, `birth_date`, `old_school`, `email`, `img_name`, `password_account`, `role_account`) VALUES
	(8, '651723103035', 'phiraphat', 'klintan', 1600, 1624, 'MSI.', '123', 'ป.ตรี', 'dwa', '2024-02-10', 'dwadwa', 'ddadwadwadwadwa@gmail.com', '', '$2y$10$yBO81FmYyuJjClUvNRLwaeupSOhz33kmSGWfsR8ea0ZWRAZAisGyu', 2),
	(9, 'กไฟกไฟ', 'dwadwa', 'กไฟก', 1600, 1623, NULL, 'กไฟกไฟ', 'กไฟกไฟ', 'กไฟกไฟ', '2024-02-12', 'กไฟกไฟ', 'dwadwa@gmail.com', 'korn.jpg', NULL, NULL);

-- Dumping data for table database.user_role: ~2 rows (approximately)
DELETE FROM `user_role`;
INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
	(1, 'admin'),
	(2, 'member');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
