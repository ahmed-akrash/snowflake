-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 09:40 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snowflake`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `id` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `blocked_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `time`, `user_id`, `blocked_user_id`) VALUES
(1, '2018-07-24 15:20:38', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text` varchar(150) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `text`, `time`, `post_id`, `user_id`) VALUES
(1, 'ايه ياض', '2018-07-27 07:12:53', 126, 1),
(2, '؟؟؟؟؟؟؟', '2018-07-27 07:13:12', 124, 1),
(3, 'جامده', '2018-07-27 07:13:27', 122, 1),
(4, 'الله', '2018-07-27 07:13:44', 9, 1),
(5, 'جميل', '2018-07-27 07:15:54', 127, 5),
(6, 'ولعه', '2018-07-27 07:16:07', 126, 5),
(7, 'عااااش', '2018-07-27 07:16:21', 124, 5),
(8, 'سارقها', '2018-07-27 07:16:37', 123, 5),
(9, 'كبري استالي', '2018-07-27 07:17:03', 102, 5),
(10, 'روعه', '2018-07-27 07:17:15', 9, 5),
(11, 'ايه ياض؟', '2018-07-27 07:17:40', 11, 5),
(12, 'ههههههههههههههه', '2018-07-27 07:19:59', 129, 4),
(13, 'روعه يا امي', '2018-07-27 07:20:13', 131, 4),
(14, 'فاكر يا صلاح؟', '2018-07-27 07:20:35', 130, 4),
(15, 'صح', '2018-07-27 07:20:55', 128, 4),
(16, 'يوفقك يا حماده', '2018-07-27 07:21:13', 124, 4),
(17, 'في ايه هنا؟', '2018-07-27 07:21:30', 126, 4),
(18, 'وحشه', '2018-07-27 07:21:48', 123, 4),
(19, 'كان يوم تحفه', '2018-07-27 07:22:13', 102, 4),
(20, 'الله', '2018-07-27 07:22:28', 9, 4),
(21, 'مالك يا حاجه؟\r\n', '2018-07-27 07:24:52', 133, 2),
(22, 'الله لو عملتيها', '2018-07-27 07:25:10', 132, 2),
(23, 'روعه', '2018-07-27 07:25:35', 131, 2),
(24, 'يا حبيبي', '2018-07-27 07:25:52', 127, 2);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `followed_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `time`, `user_id`, `followed_user_id`) VALUES
(4, '2018-07-24 09:04:58', 1, 5),
(6, '2018-07-24 10:15:37', 2, 5),
(10, '2018-07-25 08:55:40', 2, 1),
(11, '2018-07-25 23:28:12', 5, 1),
(12, '2018-07-26 14:06:11', 5, 2),
(13, '2018-07-27 09:28:31', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `other_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `text`, `time`, `user_id`, `other_user_id`) VALUES
(1, 'hi mody', '2018-07-25 17:36:10', 1, 2),
(2, 'hii mody', '2018-07-25 17:38:37', 1, 2),
(3, 'hi mahmoud', '2018-07-25 17:40:33', 5, 5),
(4, 'hii\r\n', '2018-07-25 17:42:49', 5, 5),
(5, 'hii', '2018-07-25 21:02:22', 5, 2),
(6, 'how are you salah', '2018-07-25 21:04:08', 2, 5),
(7, 'im fine bro what about you?\r\n', '2018-07-25 21:04:56', 5, 2),
(8, 'good thanks', '2018-07-25 21:05:16', 2, 5),
(9, 'hiii me hahah\r\n', '2018-07-25 21:26:47', 2, 2),
(10, 'hi reda', '2018-07-25 21:29:58', 5, 1),
(11, '???', '2018-07-25 21:33:36', 5, 1),
(12, 'yes im here', '2018-07-25 21:35:02', 1, 5),
(13, 'hello salah', '2018-07-25 21:35:10', 1, 5),
(15, 'hhhh too late man\r\n', '2018-07-25 22:43:34', 5, 1),
(16, 'im sorry bro hhhh', '2018-07-25 22:44:52', 1, 5),
(18, 'dont warrt it is oki', '2018-07-25 23:00:05', 5, 1),
(19, 'thanks bro it is nice from you', '2018-07-25 23:00:57', 1, 5),
(20, 'hahah oki', '2018-07-25 23:01:16', 5, 1),
(21, 'how about your stady?\r\n', '2018-07-25 23:02:18', 1, 5),
(22, 'hard', '2018-07-25 23:03:00', 5, 1),
(23, 'you need to try more hard', '2018-07-25 23:03:32', 1, 5),
(24, 'no it really so hard how do you pass it?\r\n', '2018-07-25 23:04:05', 5, 1),
(25, 'im fucked off', '2018-07-25 23:04:20', 1, 5),
(26, 'finally im done', '2018-07-25 23:16:55', 1, 5),
(27, 'hhhhh', '2018-07-25 23:31:00', 1, 5),
(28, 'im not', '2018-07-25 23:37:47', 5, 1),
(29, 'i see', '2018-07-25 23:39:15', 1, 5),
(30, 'what shood i do', '2018-07-25 23:39:32', 5, 1),
(31, 'i think you should shift your study', '2018-07-25 23:41:58', 1, 5),
(32, 'are you sure', '2018-07-25 23:42:32', 5, 1),
(33, 'i think you should shift your study', '2018-07-25 23:43:12', 1, 5),
(34, 'fffffff', '2018-07-25 23:43:22', 1, 5),
(35, 'are you sure', '2018-07-25 23:49:05', 5, 1),
(36, 'are you sure', '2018-07-25 23:50:20', 5, 1),
(37, 'no', '2018-07-25 23:50:35', 1, 5),
(38, 'thanks any way', '2018-07-25 23:54:28', 5, 1),
(39, 'you are welcome', '2018-07-25 23:55:11', 1, 5),
(40, 'oki', '2018-07-25 23:55:31', 5, 1),
(41, 'hi', '2018-07-26 06:40:41', 1, 5),
(42, 'hi bro', '2018-07-26 06:56:45', 5, 1),
(43, 'how are you now?', '2018-07-26 06:59:57', 1, 5),
(45, '01010515363', '2018-07-26 07:01:38', 1, 5),
(46, 'that is my phone', '2018-07-26 07:01:59', 1, 5),
(47, 'call me', '2018-07-26 07:03:22', 1, 5),
(48, 'oki iwill afternoon', '2018-07-26 07:04:19', 5, 1),
(49, 'thanks', '2018-07-26 07:09:04', 1, 5),
(50, 'oki', '2018-07-26 07:09:47', 5, 1),
(51, 'im calling you', '2018-07-26 07:11:00', 5, 1),
(52, 'oki ', '2018-07-26 07:12:51', 1, 5),
(53, 'oki ', '2018-07-26 07:12:55', 1, 5),
(60, 'hhhh\r\n\r\n', '2018-07-26 07:38:17', 1, 5),
(61, 'no way bro\r\nim good\r\n', '2018-07-26 07:38:35', 1, 5),
(64, 'ازيك يا امي\r\n', '2018-07-26 12:12:09', 1, 4),
(65, 'ماما عامله ايه\r\n', '2018-07-26 12:13:31', 5, 4),
(66, 'HI IT IS ME', '2018-07-26 14:20:27', 1, 1),
(67, 'salah\r\n', '2018-07-26 14:32:50', 1, 5),
(68, 'oki\r\n', '2018-07-26 14:35:43', 1, 5),
(69, 'وحشتيني يا امي\r\n', '2018-07-26 14:35:59', 1, 4),
(70, 'ههههههه\r\n', '2018-07-26 14:36:12', 1, 1),
(71, 'رد علي الفون يالا', '2018-07-27 07:23:01', 4, 1),
(72, 'انت فين', '2018-07-27 07:23:17', 4, 3),
(73, 'محمود هات معاك فينو وطعميه', '2018-07-27 07:23:46', 4, 2),
(74, 'بس يالا يا حيوان', '2018-07-27 07:23:56', 4, 5),
(75, '123 test', '2018-07-27 07:24:09', 4, 4),
(76, 'hkkj', '2018-07-27 07:28:48', 4, 1),
(77, 'ياكلب', '2018-07-27 07:29:03', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  `place` varchar(150) NOT NULL,
  `post_id` int(11) DEFAULT '0',
  `img_id` int(11) DEFAULT '0',
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `place`, `post_id`, `img_id`, `time`, `user_id`, `owner`) VALUES
(3, 'share', 'post', 102, NULL, '2018-07-23 15:03:09', 1, 1),
(6, 'share', 'post', 122, NULL, '2018-07-23 15:19:58', 1, 2),
(10, 'like', 'post', 9, NULL, '2018-07-23 15:31:43', 1, 2),
(12, 'like', 'img', NULL, 8, '2018-07-23 15:31:51', 1, 2),
(13, 'like', 'img', NULL, 7, '2018-07-23 15:31:52', 1, 2),
(14, 'like', 'img', NULL, 6, '2018-07-23 15:31:55', 1, 2),
(15, 'like', 'post', 102, NULL, '2018-07-24 02:16:33', 1, 1),
(16, 'like', 'post', 122, NULL, '2018-07-24 02:16:44', 1, 2),
(17, 'like', 'post', NULL, NULL, '2018-07-24 02:16:46', 1, 5),
(18, 'like', 'post', NULL, NULL, '2018-07-24 02:16:50', 1, 5),
(19, 'like', 'post', 102, NULL, '2018-07-24 02:16:52', 1, 1),
(20, 'like', 'post', NULL, NULL, '2018-07-24 02:16:54', 1, 3),
(21, 'like', 'post', 11, NULL, '2018-07-24 02:16:57', 1, 3),
(22, 'like', 'post', NULL, NULL, '2018-07-24 02:16:59', 1, 3),
(23, 'like', 'post', 9, NULL, '2018-07-24 02:17:01', 1, 2),
(24, 'like', 'post', NULL, NULL, '2018-07-24 02:17:04', 1, 2),
(25, 'like', 'post', NULL, NULL, '2018-07-24 02:17:06', 1, 2),
(26, 'like', 'post', NULL, NULL, '2018-07-24 02:17:09', 1, 4),
(27, 'like', 'post', NULL, NULL, '2018-07-24 02:17:13', 1, 4),
(28, 'share', 'post', 122, NULL, '2018-07-24 02:20:45', 1, 2),
(29, 'comment', 'post', 123, NULL, '2018-07-24 02:21:06', 1, 1),
(30, 'comment', 'post', 122, NULL, '2018-07-24 02:21:18', 1, 2),
(31, 'comment', 'post', NULL, NULL, '2018-07-24 02:21:29', 1, 5),
(32, 'comment', 'post', 102, NULL, '2018-07-24 02:21:41', 1, 1),
(33, 'comment', 'post', 11, NULL, '2018-07-24 02:21:53', 1, 3),
(34, 'comment', 'post', NULL, NULL, '2018-07-24 02:22:06', 1, 3),
(35, 'comment', 'post', 9, NULL, '2018-07-24 02:22:21', 1, 2),
(36, 'comment', 'post', NULL, NULL, '2018-07-24 02:22:38', 1, 4),
(38, 'like', 'post', 123, NULL, '2018-07-24 03:10:27', 1, 1),
(39, 'like', 'post', 102, NULL, '2018-07-24 03:10:30', 1, 1),
(40, 'like', 'post', 102, NULL, '2018-07-24 05:07:49', 1, 1),
(41, 'like', 'post', 122, NULL, '2018-07-24 05:18:50', 4, 2),
(42, 'like', 'post', 122, NULL, '2018-07-24 05:22:19', 4, 2),
(43, 'like', 'post', 123, NULL, '2018-07-24 09:51:05', 1, 1),
(44, 'like', 'post', 102, NULL, '2018-07-24 09:51:07', 1, 1),
(45, 'like', 'img', NULL, 4, '2018-07-24 11:50:46', 1, 1),
(46, 'like', 'img', NULL, 3, '2018-07-24 11:50:47', 1, 1),
(47, 'like', 'img', NULL, 5, '2018-07-24 11:50:49', 1, 1),
(48, 'like', 'post', 124, NULL, '2018-07-24 15:25:38', 1, 1),
(49, 'like', 'post', 124, NULL, '2018-07-25 06:46:48', 1, 1),
(50, 'like', 'post', 122, NULL, '2018-07-25 06:46:51', 1, 2),
(51, 'like', 'post', NULL, NULL, '2018-07-25 06:46:53', 1, 5),
(52, 'like', 'post', NULL, NULL, '2018-07-25 06:46:55', 1, 5),
(53, 'like', 'post', 102, NULL, '2018-07-25 06:46:56', 1, 1),
(54, 'like', 'post', 9, NULL, '2018-07-25 06:46:59', 1, 2),
(55, 'share', 'post', NULL, NULL, '2018-07-25 06:47:02', 1, 2),
(56, 'like', 'post', NULL, NULL, '2018-07-25 06:47:03', 1, 2),
(57, 'like', 'post', 126, NULL, '2018-07-25 09:41:28', 2, 2),
(58, 'like', 'post', 123, NULL, '2018-07-25 09:42:03', 2, 1),
(59, 'like', 'post', 126, NULL, '2018-07-25 09:42:06', 2, 2),
(60, 'like', 'post', NULL, NULL, '2018-07-25 09:47:02', 1, 1),
(61, 'like', 'post', 126, NULL, '2018-07-25 09:47:04', 1, 2),
(62, 'comment', 'post', 126, NULL, '2018-07-25 09:47:16', 1, 2),
(63, 'like', 'post', 126, NULL, '2018-07-25 09:47:22', 1, 2),
(64, 'like', 'post', NULL, NULL, '2018-07-25 10:45:03', 1, 4),
(65, 'like', 'post', NULL, NULL, '2018-07-25 10:56:35', 1, 1),
(66, 'like', 'post', 126, NULL, '2018-07-25 15:22:04', 1, 2),
(67, 'like', 'post', NULL, NULL, '2018-07-25 15:22:07', 1, 1),
(68, 'like', 'post', 126, NULL, '2018-07-26 06:37:33', 1, 2),
(69, 'like', 'post', NULL, NULL, '2018-07-26 06:37:36', 1, 1),
(70, 'like', 'post', 123, NULL, '2018-07-26 14:22:01', 1, 1),
(71, 'like', 'post', 127, NULL, '2018-07-27 07:12:12', 1, 1),
(72, 'like', 'post', 126, NULL, '2018-07-27 07:12:13', 1, 2),
(73, 'like', 'post', 124, NULL, '2018-07-27 07:12:16', 1, 1),
(74, 'like', 'post', 123, NULL, '2018-07-27 07:12:19', 1, 1),
(75, 'like', 'post', 122, NULL, '2018-07-27 07:12:22', 1, 2),
(76, 'like', 'post', 102, NULL, '2018-07-27 07:12:24', 1, 1),
(77, 'like', 'post', 9, NULL, '2018-07-27 07:12:26', 1, 2),
(78, 'comment', 'post', 126, NULL, '2018-07-27 07:12:53', 1, 2),
(79, 'like', 'post', 124, NULL, '2018-07-27 07:13:04', 1, 1),
(80, 'comment', 'post', 124, NULL, '2018-07-27 07:13:12', 1, 1),
(81, 'comment', 'post', 122, NULL, '2018-07-27 07:13:27', 1, 2),
(82, 'comment', 'post', 9, NULL, '2018-07-27 07:13:43', 1, 2),
(83, 'like', 'post', 129, NULL, '2018-07-27 07:15:41', 5, 5),
(84, 'like', 'post', 128, NULL, '2018-07-27 07:15:44', 5, 5),
(85, 'like', 'post', 127, NULL, '2018-07-27 07:15:46', 5, 1),
(86, 'comment', 'post', 127, NULL, '2018-07-27 07:15:54', 5, 1),
(87, 'comment', 'post', 126, NULL, '2018-07-27 07:16:06', 5, 2),
(88, 'comment', 'post', 124, NULL, '2018-07-27 07:16:21', 5, 1),
(89, 'like', 'post', 123, NULL, '2018-07-27 07:16:28', 5, 1),
(90, 'comment', 'post', 123, NULL, '2018-07-27 07:16:37', 5, 1),
(91, 'comment', 'post', 102, NULL, '2018-07-27 07:17:03', 5, 1),
(92, 'like', 'post', 9, NULL, '2018-07-27 07:17:09', 5, 2),
(93, 'comment', 'post', 9, NULL, '2018-07-27 07:17:15', 5, 2),
(94, 'comment', 'post', 11, NULL, '2018-07-27 07:17:40', 5, 3),
(95, 'share', 'post', 102, NULL, '2018-07-27 07:17:50', 5, 1),
(96, 'like', 'post', 133, NULL, '2018-07-27 07:19:40', 4, 4),
(97, 'like', 'post', 132, NULL, '2018-07-27 07:19:42', 4, 4),
(98, 'like', 'post', 131, NULL, '2018-07-27 07:19:44', 4, 4),
(99, 'like', 'post', 130, NULL, '2018-07-27 07:19:46', 4, 5),
(100, 'like', 'post', 129, NULL, '2018-07-27 07:19:50', 4, 5),
(101, 'comment', 'post', 129, NULL, '2018-07-27 07:19:59', 4, 5),
(102, 'comment', 'post', 131, NULL, '2018-07-27 07:20:13', 4, 4),
(103, 'like', 'post', 131, NULL, '2018-07-27 07:20:19', 4, 4),
(104, 'comment', 'post', 130, NULL, '2018-07-27 07:20:35', 4, 5),
(105, 'like', 'post', 127, NULL, '2018-07-27 07:20:45', 4, 1),
(106, 'like', 'post', 128, NULL, '2018-07-27 07:20:47', 4, 5),
(107, 'comment', 'post', 128, NULL, '2018-07-27 07:20:55', 4, 5),
(108, 'comment', 'post', 124, NULL, '2018-07-27 07:21:13', 4, 1),
(109, 'comment', 'post', 126, NULL, '2018-07-27 07:21:30', 4, 2),
(110, 'like', 'post', 123, NULL, '2018-07-27 07:21:40', 4, 1),
(111, 'comment', 'post', 123, NULL, '2018-07-27 07:21:48', 4, 1),
(112, 'like', 'post', 122, NULL, '2018-07-27 07:21:56', 4, 2),
(113, 'comment', 'post', 102, NULL, '2018-07-27 07:22:13', 4, 1),
(114, 'comment', 'post', 9, NULL, '2018-07-27 07:22:28', 4, 2),
(115, 'like', 'post', 133, NULL, '2018-07-27 07:24:36', 2, 4),
(116, 'comment', 'post', 133, NULL, '2018-07-27 07:24:52', 2, 4),
(117, 'comment', 'post', 132, NULL, '2018-07-27 07:25:10', 2, 4),
(118, 'comment', 'post', 131, NULL, '2018-07-27 07:25:34', 2, 4),
(119, 'comment', 'post', 127, NULL, '2018-07-27 07:25:52', 2, 1),
(120, 'like', 'post', 122, NULL, '2018-07-27 07:26:10', 2, 2),
(121, 'like', 'post', 133, NULL, '2018-07-27 07:27:14', 4, 4),
(122, 'like', 'post', 132, NULL, '2018-07-27 07:27:47', 4, 4),
(123, 'like', 'img', NULL, 12, '2018-07-27 07:28:10', 4, 4),
(124, 'like', 'post', 9, NULL, '2018-07-27 07:29:51', 4, 2),
(125, 'share', 'post', 9, NULL, '2018-07-27 07:29:53', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `text` varchar(500) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) DEFAULT '0',
  `comments` int(11) DEFAULT '0',
  `share` int(11) DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `text`, `time`, `likes`, `comments`, `share`, `user_id`) VALUES
(9, 'peace', '2018-07-18 08:28:01', 12, 3, 3, 2),
(11, 'toshka photography ', '2018-07-18 08:29:44', 5, 1, 0, 3),
(102, 'alex', '2018-07-22 14:46:48', 24, 2, 14, 1),
(122, 'music', '2018-07-23 09:45:52', 9, 1, 2, 2),
(123, 'music', '2018-07-24 02:20:45', 7, 2, 0, 1),
(124, 'wow', '2018-07-24 15:25:33', 4, 3, 0, 1),
(126, 'reda', '2018-07-25 09:29:49', 7, 3, 0, 2),
(127, 'right', '2018-07-27 07:12:05', 3, 2, 0, 1),
(128, 'صح', '2018-07-27 07:14:28', 2, 1, 0, 5),
(129, 'ههههههههههه', '2018-07-27 07:15:39', 2, 1, 0, 5),
(130, 'alex', '2018-07-27 07:17:50', 1, 1, 0, 5),
(131, 'تحفه', '2018-07-27 07:18:51', 2, 2, 0, 4),
(132, 'اممممم', '2018-07-27 07:19:03', 2, 1, 0, 4),
(133, 'حسبي الله نعمه الوكيل', '2018-07-27 07:19:34', 3, 1, 0, 4),
(134, 'peace', '2018-07-27 07:29:53', 0, 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pro_img`
--

CREATE TABLE `pro_img` (
  `id` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `like` int(11) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pro_img`
--

INSERT INTO `pro_img` (`id`, `time`, `like`, `view`, `user_id`) VALUES
(3, '2018-07-18 08:32:48', 45, 1, 1),
(4, '2018-07-18 08:33:10', 66, 1, 1),
(5, '2018-07-18 08:33:24', 69, 1, 1),
(6, '2018-07-23 09:47:22', 3, 9, 2),
(7, '2018-07-23 09:48:49', 2, 9, 2),
(8, '2018-07-23 09:48:56', 2, 9, 2),
(9, '2018-07-23 09:49:05', 2, 9, 2),
(10, '2018-07-27 07:14:51', 0, 0, 5),
(11, '2018-07-27 07:15:03', 0, 0, 5),
(12, '2018-07-27 07:28:07', 1, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(150) NOT NULL,
  `birth_day` varchar(150) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `job` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `secret` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `birth_day`, `bio`, `job`, `city`, `time`, `secret`) VALUES
(1, 'ahmed reda', '$2y$10$Jha0JabSx7MqTazEsvYuueHhfuX9aRK.Sty1yZgl7ByD9gHdm3J2u', 'abo.reda5363@gmail.com', '1995-08-06', 'الحمد لله كثيرا', 'software engineer', 'suez', '2018-07-26 14:24:32', 'sanna'),
(2, 'mahmoud reda', '$2y$10$xGgJTHt7ehN5WYOwcuof3uEl0K89rD/R0P/3cUfBo.CvsWNDjsKvm', 'mahmoud.reda57357@gmail.com', '1993-07-01', 'be good man !!', 'accountantant', 'suez', '2018-07-25 11:20:26', '0'),
(3, 'akrash', '$2y$10$xGgJTHt7ehN5WYOwcuof3uEl0K89rD/R0P/3cUfBo.CvsWNDjsKvm', 'akrash@gmail.com', '1960-05-10', 'متطلبش مني فلوس', 'رائيس قسم الضواغط بزجاج الدوائي', 'السويس', '2018-07-26 14:23:22', '0'),
(4, 'sanna mahmoud', '$2y$10$L7znh8yQiEGyPf4G6T7g1.XdS8CPfhyNyWP.yVZVtwBOU5Kx0h4FW', 'sanna@gmail.com', '1920-10-06', 'سبحان الله', 'teacher', 'suez', '2018-07-27 07:31:25', '0'),
(5, 'salah reda', '$2y$10$dR4TkdBYzwjps3Td0/n5XeVU8NwM1pOjHyoHu1tE2DJ7N.oTF4RYS', 'salah_reda@gmail.com', '2000-02-06', 'عشانا عليك يارب', 'salerman', 'suez', '2018-07-26 12:14:24', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `blocked_user_id` (`blocked_user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `followed_user_id` (`followed_user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `other_user_id` (`other_user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `place_id` (`post_id`),
  ADD KEY `place_id_2` (`post_id`),
  ADD KEY `place_id_3` (`post_id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pro_img`
--
ALTER TABLE `pro_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `pro_img`
--
ALTER TABLE `pro_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `block`
--
ALTER TABLE `block`
  ADD CONSTRAINT `block_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `block_ibfk_2` FOREIGN KEY (`blocked_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`followed_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`other_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_ibfk_5` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `notifications_ibfk_6` FOREIGN KEY (`img_id`) REFERENCES `pro_img` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pro_img`
--
ALTER TABLE `pro_img`
  ADD CONSTRAINT `pro_img_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
