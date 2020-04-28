-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 12:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espals_community`
--

-- --------------------------------------------------------

--
-- Table structure for table `espals_block_user`
--

CREATE TABLE `espals_block_user` (
  `id` int(11) NOT NULL,
  `blocked_user` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `espals_community_category`
--

CREATE TABLE `espals_community_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(500) NOT NULL,
  `img_url` varchar(500) DEFAULT NULL,
  `members` int(11) NOT NULL DEFAULT 0,
  `restriction` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(1080) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `espals_community_comment`
--

CREATE TABLE `espals_community_comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT 0,
  `parent_comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_sender_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_type` varchar(50) NOT NULL,
  `comment_image_url` varchar(200) DEFAULT NULL,
  `comment_upvote` int(11) NOT NULL DEFAULT 0,
  `comment_downvote` int(11) NOT NULL DEFAULT 0,
  `comment_earnings` decimal(65,30) NOT NULL DEFAULT 0.000000000000000000000000000000,
  `comment_report` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `espals_community_images`
--

CREATE TABLE `espals_community_images` (
  `id` int(11) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_count` int(11) NOT NULL,
  `up_vote` int(11) NOT NULL,
  `down_vote` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `espals_community_post`
--

CREATE TABLE `espals_community_post` (
  `id` int(11) NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_title` text DEFAULT NULL,
  `post_type` text NOT NULL,
  `post_url` varchar(1080) NOT NULL,
  `post_unique_id` varchar(10) NOT NULL,
  `mySay` text DEFAULT NULL,
  `post_content` text DEFAULT NULL,
  `community` int(11) NOT NULL,
  `is_multi_image` int(11) NOT NULL DEFAULT 0,
  `external_link` varchar(1000) DEFAULT NULL,
  `up_vote` int(11) NOT NULL DEFAULT 0,
  `down_vote` int(11) NOT NULL DEFAULT 0,
  `post_comment_count` int(11) NOT NULL DEFAULT 0,
  `post_earnings` decimal(65,30) NOT NULL DEFAULT 0.000000000000000000000000000000,
  `is_approve` int(11) NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `post_images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `espals_community_vote`
--

CREATE TABLE `espals_community_vote` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_author` int(11) NOT NULL,
  `earn` decimal(65,30) NOT NULL,
  `isclaimed` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `espals_follow_system`
--

CREATE TABLE `espals_follow_system` (
  `id` int(11) NOT NULL,
  `following` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `espals_joined_community`
--

CREATE TABLE `espals_joined_community` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `espals_notifications`
--

CREATE TABLE `espals_notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `espals_transaction`
--

CREATE TABLE `espals_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `redirecturl` varchar(200) NOT NULL,
  `reference` varchar(200) NOT NULL,
  `response` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `trans` varchar(50) NOT NULL,
  `trxref` varchar(200) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `espals_withdrawal`
--

CREATE TABLE `espals_withdrawal` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `amount` decimal(65,30) NOT NULL,
  `user` int(11) NOT NULL,
  `settled` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `espal_reward_point`
--

CREATE TABLE `espal_reward_point` (
  `id` int(11) NOT NULL,
  `point` double(65,30) NOT NULL,
  `type` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `refer`
--

CREATE TABLE `refer` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `referred_by` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `earned` decimal(65,30) NOT NULL DEFAULT 0.000000000000000000000000000000,
  `claim_amount` decimal(65,30) DEFAULT 0.000000000000000000000000000000,
  `date_update` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `user_code` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_email_code` varchar(100) NOT NULL,
  `user_img` varchar(250) NOT NULL DEFAULT 'user_default',
  `earnings` decimal(65,30) NOT NULL DEFAULT 0.000000000000000000000000000000,
  `power` decimal(65,30) NOT NULL DEFAULT 0.000000000000000000000000000000,
  `about` varchar(200) DEFAULT NULL,
  `banner` varchar(1000) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `has_community` int(11) NOT NULL DEFAULT 0,
  `is_mod` int(11) NOT NULL DEFAULT 0,
  `mSlug` text DEFAULT NULL,
  `kSlug` text DEFAULT NULL,
  `pSlug` text DEFAULT NULL,
  `membership_type` varchar(50) DEFAULT 'regular',
  `membership_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `user_code`, `password`, `user_email_code`, `user_img`, `earnings`, `power`, `about`, `banner`, `is_active`, `create_at`, `update_at`, `has_community`, `is_mod`, `mSlug`, `kSlug`, `pSlug`, `membership_type`, `membership_date`) VALUES
(12, 'xbit', 'dteweb@outlook.com', '0e03c6205ea671d7d41a0e3aabfc9d15d97e5ed3', '6bdc0c6cc2042378535c5ed52035345fc25ce4b8', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', '', '', 0, '2019-09-11 11:59:57', '2019-09-11 11:59:57', 1, 0, 'aWtIRjJNT0xUWXNUU09JS2FlakNrOVg1LzBGMW1oZEJVNHFpSmJwZmo1MXlJQ3dtdmhCdUtqd0txeXdVbVVDcGdyZm1VL1dLRGh5cERFKzc4TEdnQmlsZjZFaTRQeGx4L1JqNk5mczE1MXc9OjquoRgflRK3Zj2ZOQ3y4An0', 'bTkzM0tNTjJWT0pEMlZ3N1JlcW5nVFdKNDNwR1dNMVorcC9maEZ2a2loY1M4WkZpQzF3VXNoZVNtOXlndWxMZFBVR3lUNUNQS05RTCtJNXpNcFBHdllEZWVka2h6TDF6SHp0S2g5ZnNQdTA9OjpkT3pZxhJCcDTGWnJWHwor', 'ZGV3UEhQbFMyWi8wZHlrdHoyNzR3Ukc0MEdWeGpYNG1NdDhQZlY0TERLOXdNcWRxYWdVaWwzc1FPaEh2cGJ2azo6InN1umAf3cKA3/q6SBNGfQ==', 'premium', '2019-09-11 10:59:57'),
(13, 'Zealous', 'anyanwupaul@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', 'a19cc3ec3a6dccc05aa2c70d40a388099015dc3d', 'user_default', '14.300000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-11 17:49:54', '2019-09-11 17:49:54', 0, 0, 'MjZ6anRURWNadnhPWkZVMUVCN0xxQmRncnIyTTNDRUdNWGhmaVVqUldlT2s5UkI2d2dhRzJQV0IvYUhTdXRXSnpMamduR2c4bGlxZ0FSQm1jcjJaNHdMREdOLzV4YzVvRWVQcVo5ZVlSRUU9Ojq35KGZUewW96KTZE60AucA', 'OEJvWHJSNVV5OFZvMVVnSGRWKzhkbVE0cDBVWmdpRkh2TGRNU3RPaHJyeCtCVXErUFhadTRiYnMzTnMzNWlVS2ZXcklNWnlweENtN1dNOWFPMk0vWXdVa1ZmUDRuSm5oSFVqV2xKRElwUjg9OjqidiE7SNpeH2LtnBfPIVgn', 'Uk5YOHp3T3BXMXVvTEVSenpoVnRnaEs1TUlzNXVpWFlmWXNOT1ZvSy9xZWY1QzRSWktUM2pYWVVkQlhqOFVNODo6OcxgOapAD5Lg4UYFf+ktAQ==', 'regular', '2019-09-11 16:49:54'),
(14, 'Workman', 'Kemfe.com@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '4863dec982018cb63214f8c999df648407f0fdc1', 'user_default', '51169.000000000000000000000000000000', '50020.000000000000000000000000000000', NULL, NULL, 0, '2019-09-11 17:51:23', '2019-09-11 17:51:23', 1, 0, 'NkZlb29RU25VYjNDR0NNc3NZWUFhNzhxaEM5TzVxRHZZekwzRTZQYWVCbWNMaFJWcTA0WUxOL3RQVXRvRmZ4WkdyUHgyOFpSbHF2Tk43UVJ0MWxaQjVvTEZrWG5sbHhIREFsMFRwWTAyUTA9OjoVY77ndmGK4grgApA+PzmF', 'Z3pibTJNUVRMWHdmNTc3S2dYeERIOHlXeGJTZ1V6RGFUM3pqNE1GOUs1L1VUNTAyQU9laWluSUxEMC9GenBwKzd3MUpKYlk1T2txclA5Y0kvQTRiQ3VUUXpjYU9HSlBGSXhQWXhkL1YwZk09Ojpwsh2oyZUFeFNXY05kJK2M', 'MUd6c1JaVG1xMEQyUlVOZFlZU3BaSnZXK0hTZld6d3dKWU9iQ3lQaTJOV0ZSWHFuc01MMWNsM0VmUkJUUTgvUTo6K9oo/7hswIqEvLa9YIwbNg==', 'regular', '2019-09-11 16:51:23'),
(15, 'Xbit247', 'dteweb3@outlook.com', '0e03c6205ea671d7d41a0e3aabfc9d15d97e5ed3', 'ff5b3a1017c0d61f31f52c94e0eed509c8c29130', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-11 17:59:13', '2019-09-11 17:59:13', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-11 16:59:13'),
(16, 'Victormoses_1', 'mosesv742@gmail.com', 'c19161094bb397037a01dc8bbd6f1e47f1d36b03', '62c7b7f07fc962ca8253aee17187b83923b98715', '5d7940f4b2d35.jpeg', '38.500000000000000000000000000000', '5000601.400000000000000000000000000000', 'I\'m a fashion designer by profession and forex and crypto trader', '5dcdb8c98a6b0.jpeg', 0, '2019-09-11 19:40:33', '2019-09-11 19:40:33', 1, 0, 'cVIwRzk0MnVEazYvNjlUVUYxbzhWL1lmZXlnR2FrSFkzVUNYcW9mckdXSmJ2UEI0dzBFVi9WY3ZkbGZFa3VzUUZidGtXdU1mRldSZmh4TTRIWDZHK1BNNE9YY1RXYkZhQ2x5UDN3M3daYkU9OjpLkxspYJZTVr2dWEW3IqPe', 'REE4ejJiUjF4R0MzT0haTFpCckZQRkptcjZQRGRZTFdrZG93TldjbUJiR1MrUHQ4Q0p0Y1JCRXpuSVltK0I3OXpKSXQ5Mmk3TGl6K3p2ZmZOcVFwQlhJZkV0aXA0dkVJSGdLZmxsM2dZaUk9OjqnRchxCHiRteJlb+gwlyM9', 'WkhIQThLUjIwbmRYNUpVV2MyQ1RZY21qSWdLTHdzdVdRZHdrMnRNYnA1RWFjaHo2akd5QXpnOHV4Zk9kaFQrTDo609hFljdZwJhE+RoC393Bag==', 'regular', '2019-09-11 18:40:33'),
(17, 'ogemdi', 'ogemdiugoji@gmail.com', '35b2d4d07e040fa21057f31a643b097761eea402', '43b722142107e0fe67ad21fb44d3ed1ad0255a69', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-14 09:55:27', '2019-09-14 09:55:27', 0, 0, 'TlNIVW1xNjE3b1k3MndtTUdwOFdwK29QVFljenFhUmphT1NobUpCV2F1WXRCcmJFUzNKRkRYYzBrV3VMZVoyWkxXaTZXM0hYQlR1NGRlSmpXQjl5b0syMkQxYTFTZUt3ZUczY1c5czRvU3E0My8xTE1RSnFnTlRIS3pWT0V4c1k6OmuJoIJTW4I6pdqmW57Dt30=', 'czFWblh4anEwc2l3SVIwOVVYZks2M0Y4YWczeE04SHE1ZVhwazlnT0FrNjhKZjRnU01EU3FMS0gvSjhOTkVZbzhteXBXUUF4WFNDR2NhVzVKWkI1ZXVnd0JkWEppQXlVejlyeURDdUkxVFU9OjqPIziz4Qnt5xBnlU+wrzpX', 'SzE5TnNuNUMxc2FlcXFPYkJhTW5vM1kvdzFGT1NTZGYxK2ZJejN5MWNRWDE5NFVVL2ppZS92VXYvdkgxRllGODo66DtC8ttbbM+9b7BgQiq+vg==', 'regular', '2019-09-14 08:55:27'),
(18, 'Chekwube', 'cheksconnect@gmail.com', '1e3f0eeb7b4ec1fb3451c7c3c48779bfd25d8746', '7df87afca037ad21283c5064e162b39a9538ede0', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-18 02:09:06', '2019-09-18 02:09:06', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-18 01:09:06'),
(19, 'KOKO', 'koko@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '678149010cdeb0042a109a9b4d6832ee31b50928', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-18 03:51:20', '2019-09-18 03:51:20', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-18 02:51:20'),
(20, 'ecn', 'dteweb4@outlook.com', '0e03c6205ea671d7d41a0e3aabfc9d15d97e5ed3', '07782d7283e7b4803321ab3f4a11afae21a39d3c', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-18 15:10:47', '2019-09-18 15:10:47', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-18 14:10:47'),
(21, 'ecn322', 'dteweeerrrrb@outlook.com', '0e03c6205ea671d7d41a0e3aabfc9d15d97e5ed3', 'c1c0cb8bbae0957be16ac260e455511684057a9d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-18 15:11:25', '2019-09-18 15:11:25', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-18 14:11:25'),
(22, 'Harry247', 'Kk@gmail.com', 'd16bb6657838ea63cf578e7dfcab1e759a61ae96', '946102ec0bb93943230494429da7e576820bee39', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-18 15:36:02', '2019-09-18 15:36:02', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-18 14:36:02'),
(23, 'Mark', 'mark@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '31e9697d43a1a66f2e45db652019fb9a6216df22', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-18 15:39:50', '2019-09-18 15:39:50', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-18 14:39:50'),
(24, 'GGG', 'Ggg03@gmail.com', '93b49e9719babf7eb33c28b9bdfc901ef6358e9c', '0eb9134908bf3052cb06a8cc617e0deb5188f0b7', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-20 22:02:59', '2019-09-20 22:02:59', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-20 21:02:59'),
(25, 'joe', 'joe@gmail.com', 'df3dd13dc2d233cab76a7fedbebffdfba9bdd897', '16a9a54ddf4259952e3c118c763138e83693d7fd', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-21 23:52:07', '2019-09-21 23:52:07', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-21 22:52:07'),
(26, 'henrik', 'onyeiwuhenrik@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'a076b11c2cc63ccdc903dbe182e1eecc3cbbc094', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-26 12:39:18', '2019-09-26 12:39:18', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-26 11:39:18'),
(27, 'Holdabit', 'holdabit@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', '48123c58fa98e941fd237233def04620f93aeeab', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-26 16:55:45', '2019-09-26 16:55:45', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-26 15:55:45'),
(28, 'Futureboy', 'henrikonyeiwu@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'd1e45b9434afd2d2016bb6bc4a044e8dd0a5ce78', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-27 17:53:14', '2019-09-27 17:53:14', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-27 16:53:14'),
(29, 'Futureboyz', 'futureboy@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', '2b15dff5725146eca81e7afb60250cfa4796eaea', 'user_default', '120.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-30 13:36:07', '2019-09-30 13:36:07', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-30 12:36:07'),
(30, 'Zuby', 'zuby@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', '8f0e206dae6d7da3391913c0e1b0f20e4a368858', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-30 14:55:12', '2019-09-30 14:55:12', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-30 13:55:12'),
(31, 'holdacoin', 'holdacoin@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', '51abf012112a3847310421a1f46d82b99de92244', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-09-30 16:31:02', '2019-09-30 16:31:02', 0, 0, NULL, NULL, NULL, 'regular', '2019-09-30 15:31:02'),
(32, 'JJC', 'JJC@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'df4615b5338c4c071abff5ddaff1072348f43124', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-02 12:40:24', '2019-10-02 12:40:24', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-02 11:40:24'),
(33, 'zapman', 'zapman@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '271740e9c1c60b620b85c1085968e7009e21b717', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-03 02:02:01', '2019-10-03 02:02:01', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-03 01:02:01'),
(34, 'Ebrinix', '121ebrinix@gmail.com', '5fa339bbbb1eeaced3b52e54f44576aaf0d77d96', '548866bafa79374a340ba3a5ffebebb8f52e39cd', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-03 12:50:48', '2019-10-03 12:50:48', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-03 11:50:48'),
(35, 'thinktank', 'ThinkTank@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'e0fc7605b195a5293a5fcdbaf3a0ad1c49593434', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-04 15:38:11', '2019-10-04 15:38:11', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-04 14:38:11'),
(36, 'Lekanz', 'oyinlolaahmed004@gmail.com', 'bb1088062355fc11d912ef4ab2e2bc0a14078ebe', '166432a6607ef742fa19fc0f62946e06da604094', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-05 21:39:19', '2019-10-05 21:39:19', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-05 20:39:19'),
(37, 'Deh_superA', 'dehsupera@gmail.com', '03c895f7361f1a4847f0ea1774dca3c458816fd2', '8ba16009b065137b9e9eb073b2197e61dbbeca7b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 15:13:04', '2019-10-06 15:13:04', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 14:13:04'),
(38, 'stepheb', 'atulukustephen08@gmail.com', '98955b7ffe3ad6a9400abbf4007eafd81ecc7b37', '249cbb85b1332a92766ec421cf66d030f77bb517', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 15:13:58', '2019-10-06 15:13:58', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 14:13:58'),
(39, 'Markportter01@gmail.com', 'Maryluzlove12@gmail.com', '158bc2fcd4606d6fd53eff518860956eef6811a3', 'd1d28d6f7dc166047a4f920ca2000674bfe522d9', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 15:14:10', '2019-10-06 15:14:10', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 14:14:10'),
(40, 'Omale2017', 'peterdhc@yahoo.com', 'd60612679ed86ea9e77efa9bbd25e63864a553d0', '1572a94f2faf03c6e93051cc6ffc038d0c023169', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 15:29:47', '2019-10-06 15:29:47', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 14:29:47'),
(41, 'zerodigit', 'FrancisKelly200@gmail.com', 'aaa0e2578b7c81c0c2e999899c9aa43ea65488eb', 'a252b3764b0660e274b9a54b63666fe45b21f1b5', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 15:29:49', '2019-10-06 15:29:49', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 14:29:49'),
(42, 'EmmzyOG', 'Youngeduke@yahoo.com', '1538e98ad0b15f4fa6826a0caa5bc3db144eccf9', '1e99df65426f42ab980185b5319705bd1788f7d4', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 15:31:14', '2019-10-06 15:31:14', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 14:31:14'),
(43, 'Tinkerbell', 'nedum009@gmail.com', '53a69c53a3e2458ff176a179fec2def0b4121cba', 'b58b0d992e8b1013fc8a59b2ca2142bd2418b75b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 15:34:05', '2019-10-06 15:34:05', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 14:34:05'),
(44, 'MartinsRich', 'martinsrich9@gmail.com', '6daf59e37622cd8efc4c933ea685b646e451cfc5', '00d6adfdea4af4a54cb0fde74cbf30f16ad4545d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 15:36:53', '2019-10-06 15:36:53', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 14:36:53'),
(45, 'tomiwa123', 'tomiwatomzy66@gmail.com', '9926d5664aec4bd4a02d35868511d4fde9c0c784', 'df7a5f2f3ebe3ad48e386c167990911b7e944c1d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 15:40:34', '2019-10-06 15:40:34', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 14:40:34'),
(46, 'Judith', 'juditare63@gmail.com', '3db8f48d0a74414d94360803e61e659fa8e45322', 'f08c55b865fae4b5c42acce90ba141ed39af1b08', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 15:51:49', '2019-10-06 15:51:49', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 14:51:49'),
(47, 'Jonathan2001', 'joyeniyi2020@gmail.com', '83bcc6d5e84d36cfa08e1a3807731cbefe6c984e', 'c13714a372e85188dfaa8e02792b3d97a2f86ece', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 16:01:57', '2019-10-06 16:01:57', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 15:01:57'),
(48, 'jeremiah', 'Jeremiaheffiang8@gmail.com', 'a7794a9d6b39a29066c1e3c42ad1b35a7fd05605', 'a9df78b4b5c00745f26b0821b2cc57336a474862', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 16:31:36', '2019-10-06 16:31:36', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 15:31:36'),
(49, 'dixion dopemontana', 'dick22@gmail.com', '4738a1cc7d5b0fd21994103bc9939e61236aa1c3', 'b0b11b9ca0eef2af7e1b3b45a3bb0f00b0c6c33a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', 'I\'m a man of integrity and understanding which bring out the creativity and making in my fields I sing and write I also believed in those that work with just a mind.', NULL, 0, '2019-10-06 16:40:32', '2019-10-06 16:40:32', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 15:40:32'),
(50, 'Abdulsalam', 'Salamie100@gmail.com', '1cb7723bb03b2533eee11c46b219c0312e5c647e', '6ae3d72b9d43790e517bedb380cf504c2aecf644', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-06 16:43:04', '2019-10-06 16:43:04', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-06 15:43:04'),
(51, 'Kasa', 'Chibundumfavour@gmail.com', '9d1b07ede1a6eacecedd3066d660beb192259359', 'ff8b8e09b351acd9ea0b69791914e3215bc57438', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-08 09:21:53', '2019-10-08 09:21:53', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-08 08:21:53'),
(52, 'Hannah', 'hannahsundy09@gmail.com', '2b7471ffce51921403c6941f379022f39462e94b', 'da427397a1a46ba649f80d417aafa3a1474a1161', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-08 13:38:57', '2019-10-08 13:38:57', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-08 12:38:57'),
(53, 'Frankhodl', 'Frankhodl@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'd06fda5df5099617fe7ba0125ee780109f1d41b7', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-10 13:40:43', '2019-10-10 13:40:43', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-10 12:40:43'),
(54, 'UpLibra', 'UpLibra@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'fc690b9060e16e7a1fb4666490a3de5ea289493d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-11 11:39:12', '2019-10-11 11:39:12', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-11 10:39:12'),
(55, 'Cheeko_Shak', 'cheeko@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'ee0272f4040ec59058b190ced08edfa8b2917080', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-11 12:15:16', '2019-10-11 12:15:16', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-11 11:15:16'),
(56, 'Larwlley', 'jacoboliviasophia@gmail.com', 'eba127b21b7ce63f9e7393bd388f7e03d872c4e5', '3d842b2d8af66c415150d0c10e3f9410b6952d1a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-11 14:22:31', '2019-10-11 14:22:31', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-11 13:22:31'),
(57, 'bariye', 'Bariye@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', '4eed31d8e7b23a9d16eda901a97532e6cc51d9d6', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-11 16:20:57', '2019-10-11 16:20:57', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-11 15:20:57'),
(58, 'Diwaves', 'diwaves97@yahoo.com', 'ddb0fe7202712bff1222000136d2e40999b0b705', '3b5ceaf364b6ebe9788aff0aa54826d3a0be1da5', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-11 20:41:14', '2019-10-11 20:41:14', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-11 19:41:14'),
(59, 'chieke57', 'chieke57@gmail.com', 'f55290b7c2dcc6f91d9a208e1cb548d27ef087c2', 'fc0fdb125aa5e62ff93b8cf329909eeb683dc351', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-12 12:10:57', '2019-10-12 12:10:57', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-12 11:10:57'),
(60, 'moray', 'gabrielade2019@gmail.com', '7316d4c08b8407464dceafc2b0520df28afe8c73', '26ae1c3444ea4777243965237f8d24e751f9aac3', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-12 13:51:07', '2019-10-12 13:51:07', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-12 12:51:07'),
(61, 'Ahmed_Kareem', 'ahmeedatandak50@gmail.com', '1a21ce8627d23c9b9244831f493fa043f374f77e', '01c62c2d6e7d6618d805506e2bb4b83612d15e54', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-12 17:11:09', '2019-10-12 17:11:09', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-12 16:11:09'),
(62, 'usmanrikoto', 'usmanyusufrikoto@gmail.com', '4f0c013c3ab321cba15db0fd36e2612038e9cace', 'ec56b639df9a0ad9ea77c0294ffc8b1586aa969d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-12 20:26:24', '2019-10-12 20:26:24', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-12 19:26:24'),
(63, 'philanthropist', 'chisomsolomon61@gmail.com', '08c7166292a74dee92ca7d68cd5bdac442eb5dd0', 'e0f7ef1dc70e3a41d5c1a211c044abfa1ebd597d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-13 19:43:15', '2019-10-13 19:43:15', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-13 18:43:15'),
(64, 'Kelaniaishat06', 'Kelaniaishat64@gmail.com', '8f13efe0b0cc876e5a6635c21f5b6a11bdd3551a', '11caafb778bb335c7b67ae1b19517045412809f5', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-13 23:57:48', '2019-10-13 23:57:48', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-13 22:57:48'),
(65, 'Yhemi', 'olasunkanmiopeyemi7@gmail.com', 'a3500cf5ea8febf7ef906fab692f1ecf745cf646', '6087057dcd944b98df9b43f56295f0da7c589fae', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-14 15:35:53', '2019-10-14 15:35:53', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-14 14:35:53'),
(66, 'Richie', 'Oluwarichie6@gmail.com', '7fc33b36854a97bf745dd65377b2031bf6dbefac', '47cfd0a95ec232ed09d5fa429d28bf5708e93e2d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-14 17:29:28', '2019-10-14 17:29:28', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-14 16:29:28'),
(67, 'Prinzy', 'dogalaprince15@gmail.com', '4e8b8f8bfd13afc9f5890ba894605944bccb0d0f', '2e62a296091b58a5f9775fd679db61004a075400', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-14 17:45:37', '2019-10-14 17:45:37', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-14 16:45:37'),
(68, 'Clever10', 'www.cleversmith58@gmail.com', 'df790a07c1c0c1a13ec764bdb91e2f496f940e55', 'ec0b9095f0e24158c757c201d41cb3d29aab29ad', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-14 19:35:24', '2019-10-14 19:35:24', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-14 18:35:24'),
(69, 'Nneoma', 'ojikeblessing73@gmail.com', '51efc284613b5a392fcf3660ba152641a586ef7e', '20d878937ff0af59c05df9d9c6ab822229f00d3b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-14 21:21:39', '2019-10-14 21:21:39', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-14 20:21:39'),
(70, 'suleimanh174@gmail.com', 'suleimanh174@gmail.com', '1e558675c528d4ad93ef09305c8df07bdef72c25', '2a546eb3f7ec4f71e2ef07353085c44e8ef34c27', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-14 21:34:24', '2019-10-14 21:34:24', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-14 20:34:24'),
(71, 'Tosin', 'tosinlayande@gmail.com', '6b6551c72327036fd3dbd51f9703e90242109ff5', '75946e8841f8e6b94f154397e1e94a936931848f', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-15 10:59:07', '2019-10-15 10:59:07', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-15 09:59:07'),
(72, 'Haruna15', 'Harunaazeez15@gmail.com', 'b5b88adeeae0e0c30128b0a129d41a9299501101', '96452c0f5b71345ae1c18693a0cd955c67f86011', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-15 13:08:37', '2019-10-15 13:08:37', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-15 12:08:37'),
(73, 'Bamidele', 'Bamidelesalam40@gmail.com', 'bbbc2fe864ee8608b1ed89a5e2fc10ded3cd50b4', '25de0c49dda560604ad43848f6d20faa0aa1aae6', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-15 19:43:19', '2019-10-15 19:43:19', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-15 18:43:19'),
(74, 'Tksaven', 'Bsonzy6273@gmail.com', 'feb277d657bcd7337ded566f0e07bb432b2a7b34', '3b45b18676820a7862568884a3bfb905703ce5ec', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-15 23:42:26', '2019-10-15 23:42:26', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-15 22:42:26'),
(75, 'Blueblood', 'blueblooda@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'e70a1b457a58e665a6f3a03ca937616753192bce', 'user_default', '0.000000000000000000000000000000', '50000.000000000000000000000000000000', NULL, NULL, 0, '2019-10-16 13:24:55', '2019-10-16 13:24:55', 0, 0, 'R05ydFlrSlkxdzZ4bk1HQ1IzL2g3bmM0enNKeHUvenJoa0tuTzMvSStMQjNYZ0VxMXY0OHJVUEJXU1NrRGY1TWswNUdKemorZ1RYbWlBQVF4d3I3b0VRRUwyNUVSTDVIaVdndTZmT3dQekU9Ojo9OJ7yxAgYgrIeQ4UfFihS', 'OW9RT2ROTHNvb3Zld29GbHhnM3lCemhsbEYvVmNVWjZ6Q0wxcTNaSnZCaThHUE4yZ0dHMVRpc0Q1Z1BXNWxCeDM4K0syM09nRkJwSVZBNEppOHNMNFcyYUNwc05KbXhESkhSNnRsTXRvYkE9Ojqh8OKCOM6mRPgFqODGJTsH', 'cFE0RnpZSXJFWCs5UzJJZmhuamx2THBpZVRydStySHdmd3R2SmloM1RXNnhKcEVFVUthdnFjSlhPLys4dUh0eTo6RjoPsZmcdyGmJ2OBFb4M5A==', 'regular', '2019-10-16 12:24:55'),
(76, 'Omore', 'Omore@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'e81474ad4ea08ad1a952dd36870be8d975968916', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-16 17:20:14', '2019-10-16 17:20:14', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-16 16:20:14'),
(77, 'Alicia', 'aliciatony3@gmail.com', '58e6025b9c1f5e691d2b003fe98e7a73c7a509c4', '76f9a187fef85f1ecffb707fdb0d4fb9813caa5f', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-16 19:20:15', '2019-10-16 19:20:15', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-16 18:20:15'),
(78, 'Lloyd', 'angeljames745@gmail.com', '6022ae0e046ae750dbb3796fdf46219b8e322e03', '244cdcfd15aeedd910ba5e68b398985f531c14ea', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-16 20:47:00', '2019-10-16 20:47:00', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-16 19:47:00'),
(79, 'Omotoyosi', 'lomotoyosi15@gmail.com', '3e085433933e2615048ae604c3d327e7bc7ffded', '2f86eb69e1390a4d5fae56f52a18191752e41e92', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-16 23:12:03', '2019-10-16 23:12:03', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-16 22:12:03'),
(80, 'Splash', 'Chidiebubeanyadoo@gmail.com', 'd7c50a080cb30eef6646744884a95ef9dd00d4ed', '76ce312eb0311248ff98a96cf96b76a236fd20fa', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-17 10:34:38', '2019-10-17 10:34:38', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-17 09:34:38'),
(81, 'Emiratenegs', 'negbeneborehigementor@gmail.com', '0c99d45a90dbe412575894f35cb08f85a94f15e2', '9e3c7243105e83fd7a07d8372646f589ff84ea21', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-17 13:03:52', '2019-10-17 13:03:52', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-17 12:03:52'),
(82, 'Walex', 'walexjulius13@gmail.com', 'b99c5e7cc5507c9a07df45a2ecf02db4172f3ea1', '5cf295201a98e9787535ce0dfb5c0834cd883de1', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-17 18:47:24', '2019-10-17 18:47:24', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-17 17:47:24'),
(83, 'Isahrahma204', 'Kingberry204@gmail.com', '392af06a0a37043c5dcdbbdffea9c7e9805ea66d', '0f8013f9c5cbda9fa1a375a32b0507bb42b8196e', '5da900c66f43f.jpeg', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-18 00:50:06', '2019-10-18 00:50:06', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-17 23:50:06'),
(84, 'Isaherico', 'isaherico0@gmail.com', 'c3b9c6703c2b380339478ba404013a2e8a7d4ec8', 'ffdc270fc1f9fd9a71c1c0daa64023d65132c2ef', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-18 02:35:59', '2019-10-18 02:35:59', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-18 01:35:59'),
(85, 'Angelewhite', 'Kokosax1@gmail.com', '2605813e089e1091f249a197afe7d4d46c8455c5', '2d9785cc54013e848af25a09bb005ca5aba9a767', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-18 03:10:11', '2019-10-18 03:10:11', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-18 02:10:11'),
(86, 'Kaffo_', 'olaidekaffo@gmail.com', '89222be28eed44efb5d19858887ba907538d6d28', '710dd9c9f585d7643d35f59046bbfb3f61e540d9', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-18 10:49:40', '2019-10-18 10:49:40', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-18 09:49:40'),
(87, 'Sandy23', 'emema103@gmail.com', 'edbc299fef0bbf34c9f12da967133b4338c95ba0', 'a42f24cc986da5decec1f67b4e5df9880206f2d4', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-19 13:21:40', '2019-10-19 13:21:40', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-19 12:21:40'),
(88, 'adegunle', 'adegunletimothy@gmail.com', 'ffc9b16cf86a5ca390acbf5813cc93a25c6bbf92', 'bc3d5582364972bfe640b2a9c87422a5625ae0db', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-19 15:38:41', '2019-10-19 15:38:41', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-19 14:38:41'),
(89, 'Ubongevans', 'Ubongevans63@gmail.com', '342965ccac429b1b7762d848fdfe3a4a25b830ab', '04348c6463529983038586b0706eb6bbba4c5d49', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-19 15:58:20', '2019-10-19 15:58:20', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-19 14:58:20'),
(90, 'Starboy11134', 'Starboy11134@gmail.com', '16ddca770ff01850f31763a9c9548e3923c8b684', '615c22b6c24d943c9560463f2d23909848594ecf', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-19 16:55:46', '2019-10-19 16:55:46', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-19 15:55:46'),
(91, 'Precious', 'berjeprecious@gmail.com', '5e39cbc48e7679f875e479fc8a90215a4991cfff', '4855e44268ec6bbc195a836c54e08a036535847d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-19 18:03:32', '2019-10-19 18:03:32', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-19 17:03:32'),
(92, 'Phada', 'victorolamilekan3@gmail.com', 'ba14b0fd97f6ab581cc77d6944ff90aad627ca76', '8a13f9f387079a3c6c5f5841fe621040b0ef2486', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-20 00:32:52', '2019-10-20 00:32:52', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-19 23:32:52'),
(93, 'MichaelVictor', 'Trumpetclass48@gmail.com', '1af79cc5a09bc2f56d95ace49ddfbf6787ac4626', '24d73bc3e5b53182ac73ac6cb16dcd9ced63b868', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-20 10:41:31', '2019-10-20 10:41:31', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-20 09:41:31'),
(94, 'Fortune', 'Samuelfortune74@gmail.com', '1902727df6aead831a3e1900fefdee6b751b5370', '7517bda593c36fb1bab9e35881199987fcfe642c', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-20 11:04:03', '2019-10-20 11:04:03', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-20 10:04:03'),
(95, 'Emmytalkando', 'emmytalkando@gmail.com', 'bc73b0ce7ed0809677b9a1094700dc97d0b93a07', 'fea5d6d69ba023d58f0a633e76f63bbe37664dc8', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-20 12:16:09', '2019-10-20 12:16:09', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-20 11:16:09'),
(96, 'christokad', 'kachris46@gmail.com', 'be1985e1d32762523a115663db8e93f6527d4e55', 'bef0730eaddf167cee6b5271e92e0a3938c3dea1', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-20 14:38:56', '2019-10-20 14:38:56', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-20 13:38:56'),
(97, 'Adenekan24', 'Adenekanafeez231@gmail.com', '3ad7384dcb9bc7f6caf00610fbf766f4f6c6dc8c', '35624c91cd15b46528932876f48ac173fe9e3b5a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-20 19:51:07', '2019-10-20 19:51:07', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-20 18:51:07'),
(98, 'Muosowo1', 'mauriceosang96@gmail.com', '335e97fa444eff34d114d4d0e46e718ed4e248f6', 'a8a5d6ae15ca74251e5639a7d0d3b76e99d1020e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-20 20:45:30', '2019-10-20 20:45:30', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-20 19:45:30'),
(99, 'michelle', 'michellertradway000@gmail.com', 'c6194046c29bfd4fd8a992fb1a9bff94f4cf9a16', '7212a9e01329ea93a57f574bd9bf77695d5fdca4', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-21 00:06:29', '2019-10-21 00:06:29', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-20 23:06:29'),
(100, 'Tosben', 'omosowontosin2016@gmail.com', '139f6eeb241d60cf216c4a2d542f6527a31038df', 'c85b101d4fcb050d514fa1f216456131ec2caf6e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-21 14:37:04', '2019-10-21 14:37:04', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-21 13:37:04'),
(101, 'NathaZord', 'maranatharotimi9@gmail.com', '4dcec0c8781efe38755db839b8da918bde575f8c', '228a279607145f407fa3cf40600cac13481e510f', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-21 21:03:11', '2019-10-21 21:03:11', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-21 20:03:11'),
(102, 'Kartel', 'alabifarouq@gmail.com', 'a0b9404db84c6ee6ab5ef6dc2bdf8611ebef8d33', 'cde887ea4850ddc811a6056742a30525b3c74575', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-22 00:21:02', '2019-10-22 00:21:02', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-21 23:21:02'),
(103, 'Lolagreat', 'Lolagreat222@gmail.com', 'd740ea12e1a4fdde020902df51cf8095d184bc8e', 'fdf66332b80b770e5d0a9c55d32f216e729a25f5', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-22 14:38:11', '2019-10-22 14:38:11', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-22 13:38:11'),
(104, 'rukki01', 'rukaiyaabdulmalik0@gmail.com', '1dedb109a5d5048a4368ffd986bf3e7c6f5ed0fe', 'a2d568335ca60159966f4816824af38cc3c2f9f2', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-22 15:58:50', '2019-10-22 15:58:50', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-22 14:58:50'),
(105, 'AliteDany', 'alitedaniel092@gmail.com', 'b594c66c3f9aa55d3ebecd9dc309cbb1ade5250e', 'fa019a6eb091aabe12ebc73e6c9550c784456409', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-22 18:42:59', '2019-10-22 18:42:59', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-22 17:42:59'),
(106, 'Salvador', 'Simeonysalvadordsavitar3s@gmail.com', '1218bdf23d3b9a4e9712853a9cf71fb23c9f5c4c', 'f8f4353cfbe5e393528f8bfdb19b651b15453054', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-23 19:47:05', '2019-10-23 19:47:05', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-23 18:47:05'),
(107, 'Gracetaiwo', 'Graceojo234@yahoo.com', '327d68f661f360de3a7371e9332af1b0743c0bd1', 'a134e0f6b204da8a670f8caaf45967f3d51c917d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-23 20:25:28', '2019-10-23 20:25:28', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-23 19:25:28'),
(108, 'Vikky', 'Victorcynthia67@gmail.com', 'a358b892516ef70f8970e53e5e86154ddbd2d42d', 'dd74f771d6c24aa3d0f0b28c098d0d80425811d4', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-23 21:55:47', '2019-10-23 21:55:47', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-23 20:55:47'),
(109, 'Obadiah21', 'obadiahh551@gmail.com', '6030f5cc6bfdc07eec37ac488135c292bb2458e4', '4d7c6ddb326c03ade7d77d7c838751556f42e22a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-25 10:27:53', '2019-10-25 10:27:53', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-25 09:27:53'),
(110, 'Megachoice', 'Owezimg@gmail.com', '79937efbc83111dc608d78286b12e128f85a6054', '6fd23cd7c5b46d097bcefab8e59a9187fe8ba879', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-25 13:20:49', '2019-10-25 13:20:49', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-25 12:20:49'),
(111, 'Elizabeth1998.', 'elizabethtaiwo05@gmail.com', '816e493c8cfac1bfa123c2b88d8f682068beb38c', '329197b8750393ad83bc4cff98c82c53e86a2af9', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-25 13:32:41', '2019-10-25 13:32:41', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-25 12:32:41'),
(112, 'EbubeMJ', 'godswillchukwudiebube@gmail.com', '34cee40fc2ae01cf30cbc378bc3c1bea90228028', '18b2cd2dfae092c04d5fdc51f7389a4c5b048c2a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-25 15:38:10', '2019-10-25 15:38:10', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-25 14:38:10'),
(113, 'Xcellenci', 'giftedmail12@gmail.com', 'fd0c6d088a7eb2cd4c63b4baf05a115574c18461', '49431e79a99c7aae977bc10792fa1144540e88d2', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-25 17:18:54', '2019-10-25 17:18:54', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-25 16:18:54'),
(114, 'esthylo', 'esthylo15@gmail.com', 'cd051b262c407c0868707448fe6ea32a842ea781', '8d4c177e3878ef434f8fa4d9ea97b1543f0fd028', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-25 17:45:00', '2019-10-25 17:45:00', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-25 16:45:00'),
(115, 'Samsonsmith', 'Paigebilly223@gmail.com', 'dcfc840dfaf7a2b933782df562c4012c3be67f0c', '9d3adcf436d5647d4f521551612b42adb1457868', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-26 00:16:58', '2019-10-26 00:16:58', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-25 23:16:58'),
(116, 'Pounds', 'Innopounds123@gmail.com', 'b80902d9f8b57cfa8fb4e74dd975f18276eeee5b', '0c8c0a451a06696c9547e5c52e2f9c805fbb57d8', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-26 03:53:34', '2019-10-26 03:53:34', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-26 02:53:34'),
(117, 'Eddie', 'edimaeejohnson@gmail.com', 'deedc0b6d12c9e2061f17771778d9ad636ae2155', '8fa705169c64ef13aaf1643c4ecefa670c672326', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-26 07:50:31', '2019-10-26 07:50:31', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-26 06:50:31'),
(118, 'Godswill', 'godswillikpi100@gmail.com', 'e90f3faa8ae2a5d79c05a6621f29119f59ccbd05', '83e4b4447e4e54c89d2875c59e5224368b7ec842', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-26 09:01:11', '2019-10-26 09:01:11', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-26 08:01:11'),
(119, 'Omobolanle', 'Itunuazeez954@gmail.com', 'fdeff4f5fcece6a28f6bcd8f2799f0c1c7910f75', '9ba17b85ac97883fb310e28f6e5a8ecec7fc8493', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-26 09:03:10', '2019-10-26 09:03:10', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-26 08:03:10'),
(120, 'JOYFULJOHN', 'nosiyede@yahoo.com', '54c273c63b3e2d6d4d95690df33c1cf64c8ee4eb', 'e98b6ce34e90fdf95efa4c78e341e4db7f1240c3', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-26 12:52:52', '2019-10-26 12:52:52', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-26 11:52:52'),
(121, 'ariyoabiola5@gmail.com', 'ariyoabiola5@gmail.com', 'a72c3584090b468ec2463bd95e2cced622d857a1', 'cb2d7d5b2ba8fb5efd035a56905ecfaf65d23359', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-26 14:08:50', '2019-10-26 14:08:50', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-26 13:08:50'),
(122, 'Olamide', 'Salakoolamide111@gmail.com', 'e5d5bcf4e1e631f4416de450329b148a4fb131c0', '9ecedb46b1cb47a9ab34814ee5ada82c2c3a8342', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-26 16:10:11', '2019-10-26 16:10:11', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-26 15:10:11'),
(123, 'Lynda', 'somtoejefobiri@gmail.com', '7d926e5ad82c14958f3fb3c5c03f92f9a29c2306', '1032b239a492ecd195a656ac6463f9f5ce2dd117', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-26 18:48:45', '2019-10-26 18:48:45', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-26 17:48:45'),
(124, 'Jossylard', 'Jossylard2@gmail.com', '6ccf3f312d2b128c65c1786b5a61d9593e02f780', '1e28223e7edcde950521fddb3e88957a3726c3fc', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-26 20:07:50', '2019-10-26 20:07:50', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-26 19:07:50'),
(125, 'Gift', 'godsgiftakubueze@gmail.com', 'a1f243376cf0eab9f6ab7c83999a6c6b60e89526', '8d0a32ed63390771166c129d77e7019ed5faf21b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-26 21:12:34', '2019-10-26 21:12:34', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-26 20:12:34'),
(126, 'Nelson1576', 'Cickybelly@gmail.com', '9effcc4c80780a427f2724fd2a887704a5e1f688', '1d89468560d4228565fcc2c409b8162ca2b55276', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-26 23:23:57', '2019-10-26 23:23:57', 0, 0, 'SlJPamZUQm5LZVdIeFlIcUUwU2NkM1V4VG5QUEpCSUVWVmwrWTY1RmowckhTeTE0MDlJUmQyaUNTRmErcHBLbW84SU1DMlE2QUd6Z25wb2wwZGJpR2NDTm9TZUk3ZVZTcDdKdW9TaHR3U3M9Ojr57nebRf7X1aeEjMKkFoKa', 'bGNVdWlkYzlEeU5QbzhaWDdLQzN0Ui9FbEhJa2RuQUVvTmZOekZsVmtIanpFaVhYRUorQUYvcUpTMHlacmZjL214K2xaZEdtQWl6VWdMb2dWT1h5aDBxZ1ZTR245TkJoNzV4T09aalljZHM9Ojo/6RsktyucJ5HTn1FJde3v', 'bjErWEd1U3FSMzhVY3ZYL0JYQzdxQzNnZkMyMXhDUkRDWERXbDFqMzZjd2xSMXBZS2QxOUJLckxram1CUGs3czo60hdF24iz7fs6PlRF1aegMw==', 'regular', '2019-10-26 22:23:57'),
(127, 'frankpmd', 'frankpmd72@gmail.com', '9440441ab2a0a4db0725a396bc6fdfa7ffe19d8d', '46c8e7334bcdafb077d228c9adccb1afb8b7bc75', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-27 00:16:53', '2019-10-27 00:16:53', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-26 23:16:53'),
(128, 'Didiane01', 'Didianeloko0@gmail.com', 'a0d11b16d2b7223a5ab9cee8169e7a785c2bf30e', 'a0d11b16d2b7223a5ab9cee8169e7a785c2bf30e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-27 12:26:39', '2019-10-27 12:26:39', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-27 11:26:39'),
(129, 'Babytife', 'Fajinmiboluwatife10@gmail.com', '432d6684858ff3d47e874a9ea64bcc5f94125159', '270dd0611154e65a09668ed56ff9bd4b8a0c1658', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-27 13:23:25', '2019-10-27 13:23:25', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-27 12:23:25'),
(130, 'Gotti', 'anyanwu@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '88f563799d44f8f31164b4b35f99623b02a55022', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-27 14:28:54', '2019-10-27 14:28:54', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-27 13:28:54'),
(131, 'Ogbuisrael', 'clackpeterson114@gmail.com', '50383165eee8c121239499099bf3f642f44aaae2', '6814d7d755053622e114445d6cc3420ea0810cfb', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-27 17:14:28', '2019-10-27 17:14:28', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-27 16:14:28'),
(132, 'Golden', 'Obiohagolden@gmail.com', 'ed9201a8735fd4b5c6b235aa78beb31b96bac251', '52b464d213a3c6038af4cc4004c65c52758d2994', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-28 01:32:15', '2019-10-28 01:32:15', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-28 00:32:15'),
(133, 'Feel', 'felixoyeyemi@gmail.com', 'badd29e336fb227dcd79e687b7b082bb62d105dc', '6b8eb59e0f1bbd1ddf7cfb5b6a4edda809c88258', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-28 08:39:47', '2019-10-28 08:39:47', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-28 07:39:47'),
(134, 'satiapopcon', 'satiapopcon@gmail.com', '1eabd2e7d78ae16d4aca755b5c39f4a2194a0a68', '631fe9b1a49699e33a8716deeb563923dafaf0ac', 'user_default', '0.200000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-28 17:35:49', '2019-10-28 17:35:49', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-28 16:35:49'),
(135, 'johnenu', 'johnenu15@gmail.com', '66d90f766e69db4154f9947c71b1e2685bc4598e', 'dc8b97dd232062319d7e413a70dd570ca3135a8c', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-28 17:57:34', '2019-10-28 17:57:34', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-28 16:57:34'),
(136, 'rantimidunamis', 'oluwagbotemi133@gmail.com', 'd7f0bd127f2f8c1cf5ba653541af6ef82eb97060', 'a8d2dfa2173ee3a25445f1f4589c1841b3116c13', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-28 22:00:33', '2019-10-28 22:00:33', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-28 21:00:33'),
(137, 'Therock', 'marcellinusovuoba.therock@gmail.com', 'd49de9d1a3bcdb2f4d87d031bc66d1b2b3a7ea17', '7dd8d137af1267b59b1c7e9a28c5dd6cc9f624e4', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-29 23:25:23', '2019-10-29 23:25:23', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-29 22:25:23'),
(138, 'Chris', 'chrisiniabasi@yahoo.com', '7e7a80f6801aafc82ba21f690dd832395f000cbe', '1001b22c8e4adeb77ef10481ad06ff9c35006cb3', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-30 09:40:21', '2019-10-30 09:40:21', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-30 08:40:21'),
(139, 'BinitieWilson', 'binitieoritsemisan@gmail.com', '6617b9cefbc68664fe3ad254bcc880ad952ed540', 'fd2ed5445079258e75c235c9c3a098d2f608a792', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-30 14:27:03', '2019-10-30 14:27:03', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-30 13:27:03'),
(140, 'leksoyche', 'leksoyche@gmail.com', 'cfc2f63fb90e1802943afa76d26ea4f8288fba93', '38eeb306ee8daaa6ea6dd07e145c4f57a6730d10', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-31 07:07:25', '2019-10-31 07:07:25', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-31 06:07:25'),
(141, 'jerry77', 'jerrybarnabas7@gmail.com', '453775370022339882deaf3fc010928143c0d684', '57df7705e30a4fe5cacb4dfb85d013951cece031', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-31 09:44:55', '2019-10-31 09:44:55', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-31 08:44:55'),
(142, 'divirage', 'diviboi30@gmail.com', '4b4355b751ba36e915d36e606e21f0a2ca0431e7', '6291766bd055bfe6d5336f0e75444072acff2290', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-31 12:08:31', '2019-10-31 12:08:31', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-31 11:08:31'),
(143, 'andrew', 'kimberlykurt998@gmail.com', '2115e5894e2ec71e28560a19a958e24270350ae5', '02e0a999c50b1f88df7a8f5a04e1b76b35ea6a88', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-10-31 17:01:03', '2019-10-31 17:01:03', 0, 0, NULL, NULL, NULL, 'regular', '2019-10-31 16:01:03'),
(144, 'Tuul', 'Tuul@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'd2011d24fc795a2310809fcf1c60c8d261e62117', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-02 08:59:37', '2019-11-02 08:59:37', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-02 07:59:37'),
(145, 'Juuls', 'juuls@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'db3b8e913a11ff8426fd9433eea08312f1ee7c00', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-02 20:55:16', '2019-11-02 20:55:16', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-02 19:55:16'),
(146, 'Ogbeni_Sean', 'ogbenisean@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', '8fc0f32d240111c0556d080a0cf4125ea8342aa6', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-05 14:07:09', '2019-11-05 14:07:09', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-05 13:07:09'),
(147, '(ryptonator', 'cryptonator@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'f3bd38599daada3f4a4ab4963f5174e77ea4974a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-07 15:26:02', '2019-11-07 15:26:02', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-07 14:26:02'),
(148, 'ewealth', 'ewealthatlantic@gmail.com', 'bef2fa91921ffa18d52dbd116c5b6c4758a63a50', '13f682bed22461afd3e75578570b2ad385323604', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-07 17:47:03', '2019-11-07 17:47:03', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-07 16:47:03');
INSERT INTO `user` (`id`, `user_id`, `user_code`, `password`, `user_email_code`, `user_img`, `earnings`, `power`, `about`, `banner`, `is_active`, `create_at`, `update_at`, `has_community`, `is_mod`, `mSlug`, `kSlug`, `pSlug`, `membership_type`, `membership_date`) VALUES
(149, 'Mithu', 'mithu.uni@gmail.com', '286675fbc01d24e98d53084c7c5a2e5e60018648', '953a6c17eb1757ef4096718c807314f0bcfb4e26', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-14 17:56:06', '2019-11-14 17:56:06', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-14 16:56:06'),
(150, 'KentLaw', 'iiozuo@icloud.com', 'c393a9dc6c9bca90be782610f8d6f55e477fd880', '93558e224c463d26478a08fbe63c8141839389c8', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-16 15:51:53', '2019-11-16 15:51:53', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-16 14:51:53'),
(151, 'Chukwueloka', 'eloka4rever@hotmail.com', '84605ecbc2b3b0a786efddee374d7c9033f1ee1f', 'cf2690112f649b5f0309e17815afb11eb1b64ede', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-16 20:42:10', '2019-11-16 20:42:10', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-16 19:42:10'),
(152, 'kunle247', 'kunle247@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '7bc737fecf3e69c5d70a0d222ce90a511e3da433', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-17 15:17:39', '2019-11-17 15:17:39', 0, 0, 'Q0JwNTZTU2h0QkhTSUEyODJoWHpkM0NkNVp2VmtSQTREdDZnY0ZLelRpNVBqdldVTmJxM3BYNnlZUG9yanJPbEFKVktQSlpkanlQWWRaTXhkdURvREFyNFZCc0VQVUlUL1oyNHlDUmhtM2M9OjrdBQ6i8agYRtE+ynmDrVLM', 'a3FIN2o0bkROSlc1RFpjVEFraGhZV1FQVUsvcTh4aVVjMG5mL0R4MVlFbVhxa3gxZWIyY2xZZEhmYTE3NVlMOWRLWHhFMWJ5Yjl1VHp3eCtHT2VPOEF6eVd5WWJaUkhaY3B2ZXZaYnhVa0E9Ojr3GjAk4OBNasu7OJawVdok', 'UE9aTW92N1BnaHpISGhQSytmOG1Vd0dnVXVNT2pmM0U3LzVBRE5ERnZieGExWUtNUXY4N1V4d0FxU0sxcHlpWTo600utJO0zAX8wxEI/OvjGrQ==', 'regular', '2019-11-17 14:17:39'),
(153, 'Marak', 'marak@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '01ec3d795b92a84d15985cf369706a204de26587', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-17 16:14:21', '2019-11-17 16:14:21', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-17 15:14:21'),
(154, 'Rawdev', 'chidubem@rawdev.com.ng', '614e00a6cf5e0a27838ec055ff89e945f681054f', '7962d069321e08cd65e6332439e9516ed05808ed', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-17 16:21:07', '2019-11-17 16:21:07', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-17 15:21:07'),
(155, 'Mara12', 'mara12@gmail.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '1d3157c503e9b15d7f56259bb28ba3d0e9590e51', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-17 16:26:05', '2019-11-17 16:26:05', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-17 15:26:05'),
(156, 'essy', 'essy@bitzamp.com', 'd16bb6657838ea63cf578e7dfcab1e759a61ae96', '45fda56de0fc0589988d6e794c8bbb3c39698d6e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-17 16:28:43', '2019-11-17 16:28:43', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-17 15:28:43'),
(157, 'LegitMoney', 'LegitMoney@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '7be92d3dd7662dfaced6a09082d7fff274677d96', 'user_default', '50005.000000000000000000000000000000', '50000.000000000000000000000000000000', NULL, NULL, 0, '2019-11-17 17:15:00', '2019-11-17 17:15:00', 1, 0, 'MVBwbFZtd3lLWUFGWHZpY2N2WnltRm1JZ1NZdUJpbFFlbmZ6S3JvMlB2YXlXalE1d2kwQ0MyWEpuanM0emMyZTdzK1BNYUVTRFd4UUViNUF1ZFlLZ0h4OFdiRmVtZTBlMytSQm9Vd25qMDQ9OjpQypIIOA7U/gxcJOKOwzMt', 'cFU1WjQvRThieWowdyswUkExWXd0cXErVDZiaGVkSzYxVG5ueUhsc0JBcWNuYmtHWXdvQXRVOXRlWi9YZnhSMnMwZlFvRUVhZWxxLzZBM3BZTi92QWpvOHJnZjlkajJScE43T2puUFZ1U1k9Ojo7j/yFAmqCBayTGFhr8DQE', 'R2JnWlZtdHR0cHJTSWtCMUJYdjkxNVNxM0l1eDdIL2lGYitTT1RhNEFmMERQL241R2FwSk5kUEYySDBxQ0hUSjo6xHe2D0AChCGCJt+yUPli6g==', 'regular', '2019-11-17 16:15:00'),
(158, 'aka', 'aka@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '76ce26c45890f345cb4a4fcea195be41273629d2', 'user_default', '30000.000000000000000000000000000000', '70000.000000000000000000000000000000', NULL, NULL, 0, '2019-11-18 05:48:30', '2019-11-18 05:48:30', 0, 0, 'UW5pOTlNK3hhcUl3QkdlRC9XTlJXRmdKYVdYNkRjY3NmMVVDZkI0VnRmc2xsd3Azbm5VMmFnT3ErNW92ZkdQMXB3cWVKOHE3OFZuemFVVmkyS0VzQmY4c1Q1bnBrLzV6OVpucDY2MVRGVkk9OjpMmk0wjckN+8d+iIqrB66q', 'dEgrTlRobmdFL29sZnJ0YmF3dDdHVE5zSmxzcitYL3A5Q1ZIdDFqU0c3M3ZEcEQ4S1NFRXo2Tzd5anA0dkkyb1FFNjJRMWZ4dUtmZjRWc1RYZ3VjN1lSaks1NmtRNGRjSmNKOU1zLzB4OEE9OjpXVPedRQ9R0t7z8g+fyzrx', 'WFpqTjE3Tno3Um1HczJudkpiNXlhSjJYVVlkM1EyVVBjbjJCRXpEWW8wZjRPbnZacFpGaXVjdHo2VENyL05rbzo6+lEQisKtwUmmTlusq/N2Ww==', 'regular', '2019-11-18 04:48:30'),
(159, 'okohjude6@gmail.com', 'okohjude6@gmail.com', 'ae68844bee69615b5be5356cbd641db4be60c732', '34b918c67dbe389aa23e4c7c2684266ca4a21860', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-18 08:14:40', '2019-11-18 08:14:40', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-18 07:14:40'),
(160, 'Joeclassique', 'iamsamsondwayne@gmail.com', '44a49050e2016f9eb8c94e08ad8f1e9ccc8e9aa8', '6e591c148c90e3b891857ef658ff6fed439c3e60', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-19 16:03:54', '2019-11-19 16:03:54', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-19 15:03:54'),
(161, 'Bigman', 'bigman@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '68e026922dbf29d06e9188a5d4fc89409cd3652a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-21 01:26:38', '2019-11-21 01:26:38', 0, 0, 'UGNJVy90UnRJblFwMHN2ZjNVZE4zWHFNazI5cFh1Y2RJT3RUZWxzc2I1aTMxSzM2UmMxcTlnNW43TnBKYVV6bmY5SFJSRWhyUEFyZ0xTN3loRExJazg2LzlNWWhRMjc1eGg5QWJSYnExUFU9OjrcE/BMQKrCEdBbjPgOWZ7K', 'cHhVNXNkSFp4OHRkaUp1cXdYSzlCNG43TEloTmdOUVdZa253YnZ0U1U0V1h0SVRuZjc3YWh6NXVBbkc0Vkxma1BRemgvemhwMFdXTWxaQjRvb2hsanJaWjczNTI4aHRGLzFPTGVHWjBwc1E9OjoEbWaw+bbksh8ck3DGEgS9', 'cVhhcUdZSXdyaVRKQ3dOSWF1Q2pWRElJVXU2WW9Wc29ZUDV0bUN5Vjl0Vkg5azFmaHMwRnBxSmhWWGxmYzMvMzo6rIA8omwinnlHrioL2efXvA==', 'regular', '2019-11-21 00:26:38'),
(162, 'Karma', 'Henrynwachi7@gmail.com', '887f81a76a0c9c3b63a836dfdb60f9309a5ec792', '835db6cf74c39f78cc6a89ccd0b07490be2e3f7d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-23 00:05:19', '2019-11-23 00:05:19', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-22 23:05:19'),
(163, 'Margaret', 'mcarruth18@hotmail.co.uk', 'bf4c96e8b97350ee884eddde9cdc0a82166215bd', 'd2dcb780b784b9047658cee188d53b72dc931229', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-24 14:30:27', '2019-11-24 14:30:27', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-24 13:30:27'),
(164, 'Famuelt', 'Feo044@gnail.com', '5f748911b86f66417db683cdb8ffed6a79a11474', 'a92dbbb5b27658b63cd55a578e0c3a7d4c59cf87', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-25 20:08:13', '2019-11-25 20:08:13', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-25 19:08:13'),
(165, 'BahdGuyFarouk', 'BahdGuyFarouk@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', '20595a451b7d94b5a21be70ae9bfa32a568694e1', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-26 10:25:55', '2019-11-26 10:25:55', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-26 09:25:55'),
(166, 'Obiben', 'Onyebumobinna@gmail.com', '8963054463fe5404fbdb9be15484bf6527d23822', '85b46d9b5acad956d79ad2cba80bcfdbf0f33c24', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-26 17:41:20', '2019-11-26 17:41:20', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-26 16:41:20'),
(167, 'Nguyentieng', 'nguyentieng67@gmail.com', '8730f5afee127c909a05e61d37662ee7ab1a4586', '50f294e0eaaa3577981bcdf0f0f1f13c02c5f8bd', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-27 00:03:43', '2019-11-27 00:03:43', 0, 0, 'bFdyOUphSVJycWlJMjQwNk1PSXNGVkdDemw5TVVJbDREaXVaOGZVM3VWVXE3UEo0NzNndmVCUmpXTHA2WDNGZWx3NmlBMnFLZDIyT2JmYzlrdHFwWVYwWXZIOVBLNS9BWnQxZEQxZ2dXWU09OjoolgTaifJuT9BrV/ml2gKa', 'RXBLTmpYMDdOWDBuZGx5R2NRR3NQWTE1ck1zdURFeDZEeWoya2VHNnZyOEFFUTlWSThlNzlGTGZWK1NBMEFRSFhNem1xL3ZKWWdnVFVYZjVMSkxNZzg3c2tSVk5kTmNLbDVSS0Q3Z2Q2NmM9OjpTb60LJ+L9JZKSHduRLR+P', 'NGNjY1hCMnhUUWV3TzJuYS84ak1oTXZZOHFiVFVOb1V4OEJzUzNwc044Yk5kWm1LWXFyZllqMHdzd1lnZHM3ODo6UZHHLIU4IYxScF7f04Q8Bg==', 'regular', '2019-11-26 23:03:43'),
(168, 'LawrenceJohnl', 'lawrence1997lj@gmail.com', 'a7f65f473b819b17e2dad660ee50dff4b43ac0f0', '6eb76980d5863873fccd88bda61f1bd9dee331b0', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-29 08:39:34', '2019-11-29 08:39:34', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-29 07:39:34'),
(169, 'kkkdda', 'panasun42@live.com', '523fd1e34c4daa5e02e04b2500a2b3ada2e72580', '36383afe938f5292d427c63348de2bd02169efe3', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-29 08:48:58', '2019-11-29 08:48:58', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-29 07:48:58'),
(170, 'Carldavids', 'Daviscarl15@gmail.com', 'ae02f11abc8f178ef8ae05a9dccb65f9654cb7f2', 'c04fb384b1d8b6da35eaff61a3b3a236c1ef5c2f', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-29 10:50:04', '2019-11-29 10:50:04', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-29 09:50:04'),
(171, 'ODOKPORO', 'jackjustice44@gmail.com', '352327d5118536c6586ed95c3b714c878f158779', 'd3f532c4e3bb99dd090fbe770cc1bd34d9e79ab4', 'user_default', '5.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-29 11:55:18', '2019-11-29 11:55:18', 0, 0, 'N2FOOUkrckt1Vk95eTJNVmFrcm9zMlFaSkE1NWlZUTJxMzdBalRNUmlKRHlsSGE1b1E1dDhadVFiU0l1TXFMN3d5eVptSTVpeHcrK3JuR3hqWHpvWGh1b0dPczRzdU02US9FNU5CK1RqRTQ9Ojq1bSCnjFuWF9xjX9ey1rKf', 'YXQrODVoSGE1Q2grTWExUjVxSHJ1Zmx2aEk4L3dyTmxsRDdNRWRIVi9QVHZsSWxCZlE4SERvYzdENnZmeGJlUStKVmQ5VW1UTTc1eTJtT1MrbXBJQzNoNGduUnlyV2pOc1NFZ1k3Q1ViVk09OjqMCeQiAkj4j3g50CZN2M4E', 'WDh4cGtpYnBNNmVBYmplVmg0eXkwSFk5aUUxQkV0S3dVYkZ3SG4rMlBidUpwcnVpTG00a0g5VFFTQzVETjFlbjo6Xvu/pp2NaJtGxii1ugNr8w==', 'regular', '2019-11-29 10:55:18'),
(172, 'Kceeakunne', 'charlesakunne55@gmail.com', 'd00d433d2a0b647d0e98054492bf21dc378dd212', 'cde170b7a1b904b92d03d5b9041c52b8df6d4b61', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-29 12:14:22', '2019-11-29 12:14:22', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-29 11:14:22'),
(173, 'Nsikak', 'Nsikakm6@gmail.com', '4b64fd9bd15fec1c1e953417e0edba9b3c2a177b', '14b49e767fb76c98bd3e8ced4b2c767a4e81d86b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-29 15:00:17', '2019-11-29 15:00:17', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-29 14:00:17'),
(174, 'Chuks', 'Chukkyboy62@gmail.com', '0197fe4fef67e721fc99475021eb495228603cf0', '0eaeae5229eaaa12d0b4cbf4e58edf2078029c5d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-29 15:00:55', '2019-11-29 15:00:55', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-29 14:00:55'),
(175, 'crownstar', 'PrincewillNwaobasi@gmail.com', 'c4eff5fde7bdfc4edae4672f8c20f28f8a85058f', '54b569a232d3e8c1fdfc0ed17b121af961af0983', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-29 18:30:23', '2019-11-29 18:30:23', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-29 17:30:23'),
(176, 'Daniel', 'Danielmilik234@gmail.com', '0ebcdc7babc0de9a1d6c7d1c180bfcb8183fa492', '7b37259e149636e3330d530cbf408f2b8c1eda6a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-29 21:09:27', '2019-11-29 21:09:27', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-29 20:09:27'),
(177, 'chimasixtus', 'chineysix4rea@gmail.com', '38492a33771ea7caa2e9a8db637b767045426e5c', 'b774bada778cc9fbc979f366f615526381619e88', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-30 00:06:03', '2019-11-30 00:06:03', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-29 23:06:03'),
(178, 'Ayistar', 'ayistar1@gmail.com', 'beb6f6d4eba54d7ab5d59708dd2944e6aff1fb19', '6e29072e43a80327fc7288621476404fc193c032', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-11-30 10:22:09', '2019-11-30 10:22:09', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-30 09:22:09'),
(179, 'Goodluck', 'Goodluckokere6@gmail.com', 'c988ea67315b6c5b195529e59cca598bcca9a79d', 'a2552aff949cd84c755177608284195b206b5b59', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-01 00:19:58', '2019-12-01 00:19:58', 0, 0, NULL, NULL, NULL, 'regular', '2019-11-30 23:19:58'),
(180, 'swpenuel', 'perky.peniel@gmail.com', '86d6f6929f047886917d60a3347df646b88954e7', 'efe87983bf43a92302a4b97b7f504f416e175e53', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-01 08:31:00', '2019-12-01 08:31:00', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-01 07:31:00'),
(181, 'Giftawa', 'Giftawa2015@gmail.com', '1ed4d53c3ae9b7186e3ceac1c0747a286e84872a', 'e861bbfccfc3cb5e4091c66f747b545d2cd01918', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-01 14:55:31', '2019-12-01 14:55:31', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-01 13:55:31'),
(182, 'Chaunca007', 'Ojumu_ayo@yahoo.com', 'e49512971bff702ec70c0acd919fee2f9119cc42', 'a471446ca350e7bae2eb70b5298aa7780783289c', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-01 17:13:01', '2019-12-01 17:13:01', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-01 16:13:01'),
(183, 'GPromise', 'gpromise790@gmail.com', 'bcaa00987afb1640d1fd5b576db08563e8c04c55', '903dd7838b16bc837dda9230bdee6f05a262d989', 'user_default', '40021.000000000000000000000000000000', '50000.000000000000000000000000000000', NULL, NULL, 0, '2019-12-01 17:31:02', '2019-12-01 17:31:02', 1, 0, 'MG56cW00eUNpRWxWNm1SbUhnZUlNeWVySThWVVRuZlhpcmI1ekE4Q1lOV0RJNnpSOXRMR3FzdEx6NFJtclB1ZmZUZ1ExODFuNnNiRU1rM002WE5DTkErTEt1YXpyTTAyejZHWkFpYkFPN289OjqrkrwC1NMHdwivU0nxS3fz', 'TUVzYUIwdmRVRVFvY0YrMkk3UC8zRHFBZ2NycjNjS1J4V0dSMWc3OC8zRk1LRTNaaVBZUklLMS9UbGN0U20zdDhmeHU5cHpTL3pkMHZlQVRtdmxwNUNtaHBreVM4SldKOStkSGZHZ0YzTXM9Ojo+jGsqFRuDdltJB6zXGMW0', 'dzhaWUVhRkdwUWdka2t0Y2JORnhIMlFiOGJkZy9Dc0VvazhBaE5SdU9mM3dFWE1rMzdVQk9OejhOMTlqL05HVzo69t4kVQL3shty2qXXMfmQng==', 'regular', '2019-12-01 16:31:02'),
(184, 'Cosmasendurance', 'Endurancecosmas@yahoo.com', '66883a15314042b4328ad3da7342e6cc8569b73e', 'c2b28f24c3bb946b256af4d1beaa500d6fc3819f', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-01 21:17:02', '2019-12-01 21:17:02', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-01 20:17:02'),
(185, 'joel68', 'ricardoisma@gmail.com', '1e19fcfd166b84cd62b4197cadd66a0b696c355d', '7d0d6e991d0ce2008dcf14cc6e982c28b208bf56', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-01 23:45:39', '2019-12-01 23:45:39', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-01 22:45:39'),
(186, 'xender', 'johnpauljudejj@gmail.com', '432d5db66af22dd83e26de184638b285521ba684', '7a101ff75bf2d20ed2473c555769f1a4c30a38b3', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 08:56:43', '2019-12-02 08:56:43', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 07:56:43'),
(187, 'Victor', 'Hibasil@outlook.com', '4fce0d7ea59f5f06319a77b2528c95b56df4861f', 'b6877f3bc6606b25efb910b73ade3a3021c2892d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 13:46:49', '2019-12-02 13:46:49', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 12:46:49'),
(188, 'Imran37', 'imranismail206@gmail.com', '4c7db49f133c7a3ab3db82430efc53759b7204c2', '211d4c9ee062c88fb1ea6e9208c470c848b7291a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 13:55:57', '2019-12-02 13:55:57', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 12:55:57'),
(189, 'TalkSport', 'TalkSport@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'ee96ad339fe7137e139fb1925c0074949cb32401', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 14:33:02', '2019-12-02 14:33:02', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 13:33:02'),
(190, 'Aminu1', 'aminu4483@gmail.com', 'e7f9ca6756006a88949064b13b8d8a146f01640f', '820038b5c381e33482ca3400ec0de0a4fdcbeec1', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 14:49:11', '2019-12-02 14:49:11', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 13:49:11'),
(191, 'Rexmary', 'austinerexmary247@gmail.com', 'b774d5a3951fd39f974913cfcc97935cb3f534e1', 'b154a51d589ad0d7f68dac5e6c77dfabedd1fcd2', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 15:35:50', '2019-12-02 15:35:50', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 14:35:50'),
(192, 'Muhseentech', 'abdulmuhseen111@gmail.com', '75f8a1d793a9dd953001417705d957639608fe12', '71f9a963d43c5c20d196362b9c2a34a8700e762a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 15:48:15', '2019-12-02 15:48:15', 0, 0, 'S2ZMUGZoam53NEppU1BFRzB4RHorOGw3UFhaSzVxZ2N2cmpWTnBqdERMMTVkaHFVYWRxYXVVNEo2b3BrSTFXdTR5b1R0Y3hwZ3pPeFlSWFBEb3VrWitHSGRuOEp1UVl1Y0VSUFZEN1c1QTg9OjoUL73FDNwIwVJkLKwuwxqH', 'bmJlUHdWV1lGeHNhb0c5UHlmRnRCZmJldG1ZK1hsZFZITnNaZEpGQ3FkVUFJWklvVmhLZU5qRnF5S2RxMElyZFRwaTZnNlRlQVVxNmRDZE1NQkludTY3R09CTHNDOXFUV1ZiNnlmWC92Z2c9Ojr42KNShHlkiSydSV7Z5bgw', 'ZmxNUFp1a1FrVEc2MzRVVkxzYWtDZjJocWhrUTVKK1NESDdPTEVLMFNDb1BTeVM2L0NWeWNaWkZ6ZTFjWnF1Kzo6U/PXKZluXBcSpFIS51XmlA==', 'regular', '2019-12-02 14:48:15'),
(193, 'Nsilas', 'silasjohnson053@gmail.com', '101c77a324638a0b59af413cdb70ff54f8e92d80', 'a723cd2fa1a8ba3245820ce548210e4f84d4e56a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 15:48:30', '2019-12-02 15:48:30', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 14:48:30'),
(194, 'KennyG7', 'olopadegbenga7@gmail.com', 'c4ca0a8cbcb67846c0542f470ba522d7bd6a0aa7', '64bd43bde545ba8e63ac85869568b96d67863ac7', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 15:57:14', '2019-12-02 15:57:14', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 14:57:14'),
(195, 'Ssoreal', 'ssoreal123@gmail.com', 'f7fccbde78ec6ba5efe77b7fffd9b736764d878e', '5d8f0b1e87eb3410c4720ad34f595305050fd7f8', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 15:58:28', '2019-12-02 15:58:28', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 14:58:28'),
(196, 'Ynkay', 'Yinkahammed05@gmail.com', '2012b0f5bb13e97addc79e675aa44a29cdf80de2', 'ee2b52d3c8f2535a217cba388e724b360daa2105', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:03:08', '2019-12-02 16:03:08', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 15:03:08'),
(197, 'Glolight', 'glohart74@gmail.com', '68880c1b70aeeb596c91bc192b9064f157445353', 'e2a8f0a6eb85b525547dd7f4b29ec8f22abf368a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:05:27', '2019-12-02 16:05:27', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 15:05:27'),
(198, 'Emrys', 'emrys195@gmail.com', 'ba73c0fcee8ae8f3d3d387d8302536079082be2d', '91542c975477423deaaa883e6a42e97fe267db81', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:17:26', '2019-12-02 16:17:26', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 15:17:26'),
(199, 'Ugrosy', 'emeruwarosy@gmail.com', '84ec20d2e97f316314f0218472f543b076a03f5b', 'ac634c8b416d8183e4880460caea280f1fb0faf8', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:20:19', '2019-12-02 16:20:19', 0, 0, 'djhpZE0rSUR4a3RxZW16ckFVaHRMTk1GbHRJTmVFSG5HQTQrOGhkc0ppYTR0TDd5aXFxU1hpeUxyaFF4U2IxdlVmWTlsdTNKbDlZb2VodDRaREROYUNVTUhHaEc5UlU5ZjFPQkZaK0ljSDQ9OjrK3v9EMeQdIPmHhnqGMWno', 'R3piblZYSlBXb3NCaEVBMjZiay82a3A1Umc1QXlqS1FTMjREcjZQaHlaWmVaSmtTVmtBcjIwNnhUWFgvWG4xTTRDZ0hRMktJWkp0THNvZHhycG5PMVF4MVQ0ZkdDU013SWpzUnBvQW5JbGM9OjpuK+TQFlqh0/xVDiv5c4CX', 'Sk1FYlVkSW53MTVsak1VWUo0M0lhbW1LQ1lEZUw3NCs4Tis3dXBTcEs4QTZFdzBmbWNhRnE5ZzRlQVVtQWdJaTo6j/CWpdnpHKo5iyYek+rkVA==', 'regular', '2019-12-02 15:20:19'),
(200, 'fabian42332', 'omasorofabian@gmail.com', 'ca10933f7045a66041fff2939c6276e2e58e020d', 'aa317fdead01a9ce8a078592b0105ee3d646b1fa', 'user_default', '142.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:25:15', '2019-12-02 16:25:15', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 15:25:15'),
(201, 'Jeremiah17', 'jeremiahozoemela@gmail.com', 'ad7c6f956c80b380b4427a2fd21f46917c974e65', 'd8cab655b07feb25384b5f75ac4aa16f516a1cd6', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:27:58', '2019-12-02 16:27:58', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 15:27:58'),
(202, 'Haileyempire', 'boluwatife44444amusa@gmail.com', '0c9ed084d2b2234ae10f0cab49fb68b7f23b8ce2', 'af37ca020d8dde34a9e8cf44f3358ad0550dde47', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:28:30', '2019-12-02 16:28:30', 0, 0, 'SXBYKzZYN1ppTzZnOE5xUC9jd1lQTXlqTnhVUGpSdHBjalN3N3BnbEhuT2JHREFSTGx6ZjhwUmF4bnNjQjh6amlHWmFpZk9GZ2NKeWdHMTVLam15ZTErZ3hSTUZpNXhHV01PQUdCWXRUTjA9OjoF6Hsp+j96Ym8C2eL9BcZs', 'ZE1teDVOYmxJQkZOaGVPWHB3b2NKc3VpNVlGL3VEbEU1KzQyUHpJT25BZDZLSWQ4MnVJWnpDZnk0bGVoa3pNSS83aHNrMDNmZ05WS3N1WCszZXFMdm52WGd0OFJ5SWlqYis0SndrdXE5SzA9OjrmVnnrruPHKA2Emd8CVQNv', 'RWNNVmJDZGs2Z3JiMkVhM1pyZ3lvMnc5VEpHYU44cmoycjUwUUJvVnh2STVXUE5EY1JVTlJKRUR3Mm1BZ240Uzo6Fnj+hAa7VyuwmGlhatvqGQ==', 'regular', '2019-12-02 15:28:30'),
(203, 'Brown\'s pot', 'Ezealaostyn@gmail.com', 'cdebc6b1830243f7a48ffb677c3fbe22d7d6b508', '3a47350b7d7cb691a01ccff5ad5d3aca87290c28', '5de5b84c711b9.jpeg', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:32:01', '2019-12-02 16:32:01', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 15:32:01'),
(204, 'Ezepub', 'oguguaeze06@gmail.com', '972d53b89292398417164789ff340a1094667c45', '046bcc8c10f2e88a53ffd9b0e96f481ee583051f', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:32:43', '2019-12-02 16:32:43', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 15:32:43'),
(205, 'frances99', 'okoyeamarachi99@gmail.com', '7b85f848bbdc2e89455106e0021f889f05aace95', '7b85f848bbdc2e89455106e0021f889f05aace95', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:43:20', '2019-12-02 16:43:20', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 15:43:20'),
(206, 'Ayoade558', 'ayoade558@gmail.com', '71f428a059b6a5db08438947668c40adae49452f', '9d7c47f7181e06aa5585398679cc941099b14bbd', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:47:34', '2019-12-02 16:47:34', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 15:47:34'),
(207, 'Saintlekaz', 'olamilekanojukotimi@gmail.com', '2c285d80fae6bee6b518c8b8fd723a8eeaa68974', '9f2b85e5dff99ecac3a0eb7f3bf2fb230ad152d9', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:50:50', '2019-12-02 16:50:50', 0, 0, 'MVBDZFZqQWhQdVZRR1VLU2RCSnl6bzJETXg2b2h4ZU05dndFbzJVcWVoakdLSUpTY1BrNm9JeDN1cnJIWFNJVWhXbWtUcFNnbEYyZVdwTkNubTNITUdQSU1iWGs5STJ4N0dVZUhrekxKZ0E9OjpHa3hRWLLHLhSl80dVxJ3K', 'MVE3VlBhVEFlUTNIOTJSR1JRYmM1cStZR2ttZldTU2RoVDdqb2lCMUV4SHIyLzgxNE1nK0JPVlc5emx4Y3o1d3VKeTQ0ZGd4VU53eXY2ajF1d3p1NEljWEVERXdIN3A0L2JyRFZHejhLaWM9Ojq8ipHEY9GsjheuTL9Dtyb0', 'RWx4NUlwNHlOVnFJMzNjd0dxQUw1ZkRtT3pQQ2NqS0xBdkYxUURZTDYzb04zZEJldGZYYzhtSXc3ZDY0T2tVdjo6ZU0UY1Z/TuzPXTMQ8Z1DVA==', 'regular', '2019-12-02 15:50:50'),
(208, 'votejarbless90', 'jarblessvote@gmail.com', '4dc7c9ec434ed06502767136789763ec11d2c4b7', 'cbab88fc5578c522c55d26ff9a287f6abc9a940e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:56:40', '2019-12-02 16:56:40', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 15:56:40'),
(209, 'Nicholas Umunna', 'nicogeorge956@gmail.com', '631fd62aa8c22f56d6a72d6801d8ac1db741e4e8', 'd36e4f5bbc296c83e1f12370435327ad29a02b32', 'user_default', '20.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 16:57:01', '2019-12-02 16:57:01', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 15:57:01'),
(210, 'Seadove', 'Puregoldd73@gmail.com', '2e30c4230a5fe0aea5021ec8cbb9e8e81714e7cc', 'b7a0e166d5595c1b02315a8a440fbcff46352b5d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 17:01:54', '2019-12-02 17:01:54', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 16:01:54'),
(211, 'Ddumle', 'Dumledornanu@gmail.com', '6c9e47595e1b597f8edfb972fd3bfd8248b9741a', 'c0fbcb5e85833d4d1dad9e402ff1c79eeb31670d', 'user_default', '164.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 17:02:19', '2019-12-02 17:02:19', 0, 0, 'N0lHemxPNGhOb0E3dzFzSFAxYTZuWEtMM0ZPRUxnQldlekxvRUxkZ01tdEMrWHdaQ3U4dWE2L2x0SXFlSVNaempQaXpCWTZwWkprUnFGcDRabGk4Z1kyYmxKSENQckY1dkFHdkFuQXVVcEE9OjoBd6RlCVeeXe+L7YjAsN4I', 'ZHN4R1ZVL3RLSXVtNWdsZ1ZwdGRGSUVpNERnTmoxNjBWamVlYUhrYWFLRFlPZWFJNFpVVnRYbWRZd2VBd3dBRU1WR1pyTlJTVWRxSjlXTU9ySmFaWnQ5R0FyOGlJeTljcUc2cmt6Nm9tNDg9Ojrn/Zbgu7IktHhcjgp3XkpX', 'eVR6enM1eUlJY25wejgvMzJKb2tkcEpYNVVSOFBoekVsbU1hcUUrcTNvWitwYlJTL0w0ZGF6cG10VWl3UG1nSTo64CoEZuHKmGYEPQXU48lo0A==', 'regular', '2019-12-02 16:02:19'),
(212, 'haybeecash5@gmail.com', 'haybeecash5@gmail.com', 'f886c3cfd92a3e95c765b3407e53046451cfcda5', 'b9ca264dd1de848cfd3f29f49c9110f03ea1fabf', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 17:02:44', '2019-12-02 17:02:44', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 16:02:44'),
(213, 'Henry', 'henryolamide6@gmail.com', '732aa99d58f81f26a62738ff5f8501f8645ea415', '226a7752b68099e59eeadd7556ad48f44e5403f0', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 17:14:38', '2019-12-02 17:14:38', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 16:14:38'),
(214, 'Pwai', 'waleolaide40@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '212d7da0a00d60ecc14e092f7d89d6a213558dc0', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 17:20:19', '2019-12-02 17:20:19', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 16:20:19'),
(215, 'Flexyb2019', 'felix22@gmail.com', '2e6874f563f27e058c6f98786ae3d309ecec2eb5', '473165c9a8756e10189231dc4338c93b6b192a4f', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 17:34:49', '2019-12-02 17:34:49', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 16:34:49'),
(216, 'Sathia', 'godstimeanyakamkpa2018@gmail.Com', 'f5e5823fff6a584781bee72e110b4dcf6f557433', '11d79af8e35b2f5a74d18faabc5306c560d4b245', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 17:44:53', '2019-12-02 17:44:53', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-02 16:44:53'),
(217, 'Joseph', 'anyjoe032@gmail.com', '230991abcd77e8173edb0af392e1f11120051e29', 'f62243e5c8460f0a3d9a5df866d1fa391791c442', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-02 20:26:20', '2019-12-02 20:26:20', 0, 0, 'MGZzZVdDTmd5NnVKeUNGemZ3RnZ0WHZyS3NoSmxSTy85bXNGNlNoWC9iNHNmd0c4MWZ2TEI3enZSQWdaaEtMd2U1VTJaM1pEYWZRMEJrR0N1T1lPMnM0VGlIT0dOS0xIVjJ4VHNrVGVYczREajFkQ0RUdkR4UVdWUVZGQU1Bcis6OhS6VbeDEKr2imtN8ui1j9s=', 'VVFLZytZdWVSTStMajlkaElXdk1ERVcxSW81U3ZJS1JKN0hpbW9ZM1FxV0RXL2hWQWd3YUlKQWxpUHNXZ0RJQUR4anlwRTNwZ3ZHSzJFWlZ2aGMyK2FGSExFNWk1RTlBZUdTN1A1NWl2T2c9OjqGivfOUcCEvEKVBX8fxK4I', 'T3Z4ZGlkTm4xNHZpM2tGUTNEV0RGSWRkMzI3cEl4S3gwcFF6T2d4WjN0ZGlNdS9FU1FNdWhoZlE5QVVLelpRSzo6b/mpCtl/8oBjV06eSKobTA==', 'regular', '2019-12-02 19:26:20'),
(218, 'Thunder07', 'tericsum07@gmail.com', '260632e2c8544612e43e6b1bfa682a95fb0c5fab', '260632e2c8544612e43e6b1bfa682a95fb0c5fab', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-03 07:10:19', '2019-12-03 07:10:19', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-03 06:10:19'),
(219, 'Meegabz', 'meegabz@gmail.com', 'b2b354a96fdfa1766acd10da6649046989ffd28b', 'b580b605f062acbb33b587620e5b5322881f9046', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-03 09:08:46', '2019-12-03 09:08:46', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-03 08:08:46'),
(220, 'Pricybeauty', 'Kalupricillapatience@gmail.com', '6dabb200841793f7a152a8405359b529090d5111', '70a4eaa89a7af9256b5d0592f0c07142baa44400', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-03 11:42:01', '2019-12-03 11:42:01', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-03 10:42:01'),
(221, 'Okonis007', 'gsunday447@gmail.com', '9dd192f84e84563d437d375f3b8d3f7a4c6079ff', '176694e8a9b83b0bae514eb6de9f28cdf77b512e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-03 11:55:05', '2019-12-03 11:55:05', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-03 10:55:05'),
(222, 'benevolent2000', 'panirisnetwork@outlook.com', '2c57626a05e2a6c4361e1656e39c192e89432059', 'de17dd5193bb77d1878d1f5437223e43ba6f4c1d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-03 13:50:33', '2019-12-03 13:50:33', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-03 12:50:33'),
(223, 'paflex', 'ukosaviour21@gmail.com', '9d845bb3a911bcc0bc57c8232832ea13fa046d03', '6b28d6c99697f2f8540056a2f6b2ce47589d7c84', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-03 14:40:43', '2019-12-03 14:40:43', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-03 13:40:43'),
(224, 'sirchris', 'christianudoh4life@yahoo.com', '51de2b835bd35a67eb32dbcd3d77d4b96e5aa39d', '14bfbc9cf36af70a3fdda1aabc2f36e440db4959', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-03 14:46:18', '2019-12-03 14:46:18', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-03 13:46:18'),
(225, 'Isaac', 'kindis4best@gmail.com', '09fdeb10ae5625ca3c620126996b19a4649964cd', '8eb4d8cb5529ed70cad8bc48356ffbb284e204e2', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-03 15:10:47', '2019-12-03 15:10:47', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-03 14:10:47'),
(226, 'Mikeme221', 'oloyedeme@gmail.com', 'd209198a7ece38eaf4401fb6b093ce1ee9d7b45e', 'd86b02330e5f074c331cb0fe7bee86d931503546', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-03 17:12:51', '2019-12-03 17:12:51', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-03 16:12:51'),
(227, 'Bashir', 'Albasheer4scam@gmail.com', '426170b97eb629dd636c054150c5e15152368dbc', '0e9496337cae15b73cb5e3d1d90479befd78f8ac', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-03 19:12:03', '2019-12-03 19:12:03', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-03 18:12:03'),
(228, 'Camlawrence', 'Lawrencechijioke093@gmail.com', '6eb3aafef7cd81ca197d62e2ed8f24daed271e74', '0dabac569438c5323d43ac57b2e50d5d48e8d4f3', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-03 21:18:05', '2019-12-03 21:18:05', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-03 20:18:05'),
(229, 'sylverozeg@gmail.com', 'sylverozeg@gmail.com', '0dba7696cfe1631ef96062376c986d4e3fa7a64a', '0aaf5e40560d3a0818919dfb072cfec5021c3245', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-03 22:28:32', '2019-12-03 22:28:32', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-03 21:28:32'),
(230, 'Nmagold', 'goldenkiss4me@gmail.com', 'a4d50c0c4e169c3c955093d1c67b8a46795ef73e', '0079d02c2131a01620a15fa6e6c9ba261cafde4b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-04 11:34:04', '2019-12-04 11:34:04', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-04 10:34:04'),
(231, 'Khal_Rafat', 'Khal_Rafat@gmail.com', '869d4592d897b2d4b6a64d49b02882b7654b463d', 'e14f78ba29c4e259cea27346aecc788338315fe2', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-04 12:30:59', '2019-12-04 12:30:59', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-04 11:30:59'),
(232, 'MasterIC', 'masterisrael746@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '7afddf7c800a0eeedebbb31ffdb251016684925c', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-04 17:56:43', '2019-12-04 17:56:43', 0, 0, 'aWJYTzVrTzZOUXFLNHVpa2VmelZKNWNPL1hrOE1MZGFaYjBHci9xL0x2dkJ6S1RLMEIyWG4yU1ZOUkh1Skx6akJoMHUxV2haVXhLOVYycTgwMEpqMFFkR0dRUFRrZjNUcTc5ZDUrOGlTNnM9OjrVru0RHdv7lgXbcuHrYPWJ', 'Vi9uT1RIMGxBZWZkNlJ6T0ZtZG1uVk0xQU1ya2JKK2xhWExsUTZrRitoS3hHaE1yT1RoOVJ5c2VwWXduK3YrY1J6NlFjRVp1M2U0a1JlYXZoM3F1cnpaT24vTG9xbW02c2wwYW10bVlZbjg9OjoP2jSQHC9h/yCZmYjA8owL', 'cE5YKzU0cG9NMSs4WDYzRGVMSXNBRXBMWU11bVNCU21jb0c2bFhBWldaRmlPVGg1TCtNL2xDZHlCMGk5Rmk3RTo6YioN6geS0tJ91bHwfQTV2A==', 'regular', '2019-12-04 16:56:43'),
(233, 'Caniel', 'Charlesmambo220@gmail.com', '9ba9a1f97dc0c9a822aa6fab0bbada24baad6d8d', 'd38371ce9c6e7684322369637c570d41616ad065', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 00:01:14', '2019-12-05 00:01:14', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-04 23:01:14'),
(234, 'Takemore', 'takemore@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '34128336a90ace9dc91b7de456b56a4cd9ae356a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 00:17:34', '2019-12-05 00:17:34', 0, 0, 'L04vY1JZVUsvU0lYcTN1bjJSRFlkK3h5Sk94ckJwUjdXWmpnZDhxRVNibyttL1NqUEFoM1p0dzNkY2o3T3QrVG04RFNvMXl6SFBmQ1UxOWVlaFdid1lKVDA2U09wdFp2VnJRRUUySzNSU0E9Ojoua2ksaTmpSzegGoqmhbzq', 'VWNFRUlhQUlyeWVvd2VHdnk0eS9ET01HQ3Qzb2hQbUpJZE84bkR4ZXg0NDhiK0tCS0JhLzhhMUU2dHdoVS9NbFN1c0UrSHFxNVFHdFFUWmN0VFZ0Nm5MRE9oTE1mV0NmcUNvRUxDcW5sL1U9Ojr3LxZ8xJeoAzmjs8fRWOPY', 'cVFEZ1A1SUROaXhTeThIVUE1TTFzVS9acnYweFB4a3EzQm15TlBUWHNXdENuak1pNzZDRnI1U2pSd3pQeXMxeDo6aY/HUIYTND7oMNwYIxNRfQ==', 'regular', '2019-12-04 23:17:34'),
(235, 'Answerme4', 'answerme4@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', 'dba026eb3790d9bd35e1f566fa78dcca17b517e7', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 03:17:47', '2019-12-05 03:17:47', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 02:17:47'),
(236, 'Cater', 'Raphaeljustice7@gmail.com', 'f111217837c91d818582355ce762002e56adef65', 'd6dd2e69837def7d8b8c04b746ef841ec68bf8c9', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 07:02:29', '2019-12-05 07:02:29', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 06:02:29'),
(237, 'Constantine', 'lawanisamuelolakunle@gmail.com', 'd1936f27a08703d7bbeceb2d68220a5e0588e2d8', 'd9f22e0293ecfe89634f70cb5dbc7294bd96e77d', 'user_default', '2412.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 07:48:10', '2019-12-05 07:48:10', 0, 0, 'U3NrYndPWHE0aW1VRGEvWmx5VDdMZTh2TDNoRDRobDlVUVhwUVltdmIyMXg4UWNlRVlmVjNsUXF3RE1aR1lvNWMrVWRJdEpZZ2Y1UVIzZVJUOWZLOEMydHRBLzltZDlzekl4QTE0MFRLSmc9OjpOethOfMRQBQtH1H2HAYHm', 'OTVOT1d1V0NxL3BUZTVlU2R3S29Vdyt2S29vejFVanZBbkhlWTZ2dHBUS2Y2Rzl1QTZMRllQVTdpL1llUmFWZTJ6VldqQ0x0b0N6YTZsNzRrS2RkNUxwb3daWTZYaFlhb0VaaHZjVFl4U1k9OjqmSgdOVLIjjBJdFSc/Hj11', 'cHVLQ25KQTJjQ0JYZURCNWxjaUh3TXE3NG9BVzUxdFNjenV6d1FDWVdxVHRiSEQ5aUJMdzUzdXNUTFhDQzJpWjo6ahj88o9uLZo0i5ijDdMNvQ==', 'regular', '2019-12-05 06:48:10'),
(238, 'Cheeoma', 'cecilianwoke49@gmail.com', '739bd0d367d1985824a1b010e1fe8d98e3c49b8e', '4f32732394bcc34423a5d5ecf6b310485a4cd841', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 08:19:13', '2019-12-05 08:19:13', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 07:19:13'),
(239, 'Whyte55', 'whyte005@gmail.com', '779578bfbdac1848579a76dd3fc6e4c719d64d4c', '0a82bd2ce36507698071ff71e21e8e686002371a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 08:23:03', '2019-12-05 08:23:03', 0, 0, 'ZENGNDVtSWpkNzJkQ3VFRE13ZXdPNVkzVElkdTZLZkZSUzVsU01DVStHZmRSdDVQdkxxbm1ENkVRZ1p2SE84OWdzRmk3ejVRazg3NkFxVUR4UkhVWjZkZi9oSmIvc1YyNlZrU2p3Smtla3M9Ojp39gpzoH9T2mTztBYkdtAB', 'QTM4OWlkanVjSGRaMXFqeVo0T2kzdmRmNER3MXRWOEw1ZnB0aFl4YXpzNWtqVVlsbmY2YTYvTXlrQTFGSEtsUEF5WS96c0dnbWtFTmlOcitMQ0VIMEE5L1hPS0pGY2t6ZnJwaUlJcjZuaEk9OjpmOQbPSscgZPPl8B25OfCF', 'c1ZXKzByKy84NGVGRFlFR280Z09sVjFCZHdYczV4ZTVJbkR1YlBvV1pxUVNXZ1V4RmxvQXpNUjQ5TlRPLy82TDo6H9Cji/s72ztONdlziV9I7Q==', 'regular', '2019-12-05 07:23:03'),
(240, 'Kiki', 'jinadutoyin2@gmail.com', '9c5b961dc1bf105c83d6b81b742eef9e6c96def3', '6ff024db4f9608642eef141fe1761b790af36e04', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 08:28:41', '2019-12-05 08:28:41', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 07:28:41'),
(241, 'Davefrost', 'davefrost446@gmail.com', 'e603a02d2bef91a27944812ea1666f827739dee2', 'c46c6132a3e8c1f0b510b13bf4550e634fa92c11', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 09:28:00', '2019-12-05 09:28:00', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 08:28:00'),
(242, 'Barry', 'bbarikwui@gmail.com', 'e2ddf793e0271deca0bf21004e4026fa9ec10b5a', 'a762d490807d1de275a94823178d08a4ff68cd64', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 09:33:53', '2019-12-05 09:33:53', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 08:33:53'),
(243, 'UgwuEmmaneel', 'uwuemmanuelobinna200@gmail.com', '68717f65cde391aed33efa3cc57393fb47f26588', 'bc80fcde141da201303c2827452facc4c0327b3c', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 10:24:58', '2019-12-05 10:24:58', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 09:24:58'),
(244, 'Sephat', 'josephatanyanwu@gmail.com', '1705296dc8282b6b62ad569d2bc99cd769c1426c', '76253687afbb23aada9f958f9fe2d4410f963d1d', 'user_default', '2432.000000000000000000000000000000', '50000.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 10:49:39', '2019-12-05 10:49:39', 0, 0, 'SnV4YzhDWW9nRUc5bVp0TVhrc3lXY2VLZmxIRkNKeFl2em9idDdZSEkyNWxMeEpzVloySmVKcWMzejFHMWJtUkdBbDhZNjM2U2JJeElPdmVGcTl1VEJicmNVcWNnRk03UU11WjZmMzNFaFk9OjqGNr/O2I7tROCweZgGhSvj', 'aEowYTdwcXg1UVp6ZmZOZXRoVE9wckkwM0piRUYvUGZNNUg1a28yY1dmSmJWcEthUGJ5eDFROVowQ0xJY1B4SzluemZ6VUx6TmRsMjF2SFA1dzlReXRKVWZoa0s4cmFRUnBwQit0L1V2UGs9OjpN4kiEg8zDaJBEISiVsrc8', 'T0Q3YmZRV3lSRFYzZVdvRnRSNU8waDkxZDBiTVRFNTNmVmdxRXpUb1dtRDJyb0dNQjJZSEZOMnJESWRBaHp4eTo6IBSf9sgiVf6UYfCz/lZwdA==', 'regular', '2019-12-05 09:49:39'),
(245, 'Papaarinze1', 'papaarinze1@gmail.com', '2fc7ed7d48b7407529ce66178545b31fb65c64e0', 'a03784a7e7c15d7638f63efd20de1610d3b9a717', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 11:17:52', '2019-12-05 11:17:52', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 10:17:52'),
(246, 'Promisetitus', 'promisejonah4@gmail.com', 'a468d644d1d1ca8168a6957b58a145660d3f2fd7', '7586d909cfce3c506e71faaa8a8fe8010743134d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 12:05:20', '2019-12-05 12:05:20', 0, 0, 'dmgzTnNXN0Zma3Y0S0puWmdRZ29lQjNieTNJUmtoa1I2bDRlTWJvUFZYOVA2ZGFmTVJ1ZEZ3azhFMHYyeGc3cldyUEx0QWFSQ1BXcEE2ZmpLSUlHazhtRUM3NTVYc0Q4WU1XSkttWi9rN2M9OjqANn5i5DIWfBDJTzoATCAB', 'K0w5UXRtL0hwWnlmdkNaQlhRcnRqRlUvNW5Ha09qRmx5ZGhwc1RnWXVlbnNvaU5kdy9EUW1Jb3ZVa0ROOHhUUGoraGcvU3lXTGNmMTJPejV0eWxiaTdJSS81bllpZ1JqaWs0SU45V2pVdG89Ojrsf1yNielL24fASuf+q/zT', 'Ujd4VXNyOURab3I3bUVNeXh1ckdFRnhaMUlYeXRBV3FXZFZFRGpRVFZmcUswTHdUNmZhZm1TaWQvL2pVTXh2Vzo6eGuEUKdHvv7stBI28waB3Q==', 'regular', '2019-12-05 11:05:20'),
(247, 'Teachmekemfe', 'teachmekemfe@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '4709f9ac1d890f343cf0c2b496168a5fc5288236', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 12:14:30', '2019-12-05 12:14:30', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 11:14:30'),
(248, 'Emmanuel', 'emmamechie6@gmail.com', '7bfb9bd048d2a7919bbb4e770afed421e5dfc9a1', '0bc2dbb1c74b904b66ce6f7467e86b30ae3694e5', 'user_default', '44.000000000000000000000000000000', '50000.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 12:17:03', '2019-12-05 12:17:03', 0, 0, 'd3oxUG03QlpJTkF3UDI2ZHF3M3AxaklaeU02NzJpeGtlNUNUZVUzRllwU2FBRmpMc1ZTRVN0ZnNGYmhYNVo1U1Y4ZkhRU09GUFNmTHdnT2NqTDhYSlNURW5JVUpZVW5CY3AvWWtraktJSVk9OjoLajZuK7BcnzBgfljJpyl5', 'NWx3RjFkdkN3UTBmOG1IWms3NkFDbmdPQXhpYnBlZVYzWkVoS1NOUnNrZjB4VklmZ0lPYzRqZVBwKzFwOUZ0YnBSUUVSMW5NdXZRWmZLbXY3cFFWSGxoMXY2WDFqWVIzemxIYWNYSnRmOXM9OjrNTGx80oLqkenAL+OFUPfE', 'NjNhQlF2dmtyQTFRcEN3ZlU1VjFWclpFQVNKQUN4aWloZktmaUkwZ21Sd1g0WHVHckMvMUc2NEJQdzFVT1h2MTo6ZMTIjYZFLWV3/G//QcNGLQ==', 'regular', '2019-12-05 11:17:03'),
(249, 'Askmekemfe', 'Askmekemfe@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '7eda69e18caeaacc0fd5bbee2efe8a921d3ada2d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 12:22:20', '2019-12-05 12:22:20', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 11:22:20'),
(250, 'sandex', 'sandex@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '587dc566ea6cbaec51bb0bd8c62cdb8f430e72c0', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 12:25:45', '2019-12-05 12:25:45', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 11:25:45'),
(251, 'keylaz', 'keylaz2013@gmail.com', '8f1566a148b19f359787459a85c5c16cf51b541f', '52d2f0d6ad1029160ceed80b4b0b8b34c2166743', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 13:46:58', '2019-12-05 13:46:58', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 12:46:58'),
(252, 'Temitope', 'Topehammed147@gmail.com', '6fb82577f0d52605af61bb8a81cc05cad3b87b8f', '7081ad8596a5e1f8c199b857830e9f9dbd44516e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 14:34:10', '2019-12-05 14:34:10', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 13:34:10'),
(253, 'omorodion', 'ggloryokogbo@gmail.com', '963424d89f32a3dabf218d378afa853b993c009c', '7cdab3b4192d206e0cc8830860bbe64fcb4ce268', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 15:26:27', '2019-12-05 15:26:27', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 14:26:27'),
(254, 'Nweke', 'kingdmarketing@yahoo.com', '4e909647ea42dbfd5d4c2a686d0a0ce35ea26963', 'b148a1b19097fbec55dbeb07b04606ddcdec0070', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 15:44:05', '2019-12-05 15:44:05', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 14:44:05'),
(255, 'username123', 'username123@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '238f32a8338b7e68b7adf60f7fa34785f9b208dd', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 15:55:19', '2019-12-05 15:55:19', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 14:55:19'),
(256, 'harick', 'harick@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '8374ef24a31c71dc7faee6f13a211b7a83c39017', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 16:27:36', '2019-12-05 16:27:36', 0, 0, 'cFJxYnpXRXJOZ1AzY1NHUWRla1E1WmV5TmpPM2VwYkNXVmNmeGZiemhXczZtUkEzOW1uUk8xRnQ4N1BpUjZlcC9XSjZobU1BVmhyZzZyeXpVQmJZZGd4VVZCaXdzekNkb2l6YWw3T0dxcjA9OjqtW6Jz46iwMxXT9cQcR8bo', 'NnNHdmlpS2JBUDREeGFkYjRKRm5QWkNvWDhIOFNVWHdDd3VHSXNMdk1tb0Q5OC9mVzBHZFBNZytuL2N3Z3FHR1pQTi9iMHV0cFRsbXpIQlNLUnFlL0Z6Ymc0VkswZGxPYnJLRTFSRHRCSWc9OjpgQbuJtFV6sJXfMd8PP6xs', 'MVJFcjBBaTJLMndnVVRTcVZrdmFGeTZaSkEzVUNLYjRtOGJ2TkFXcnNTMkd2RlZGNFZjL3g2WlNWRWQzZzJXODo6A/z1OWycOl8kixBuKHDKJw==', 'regular', '2019-12-05 15:27:36'),
(257, 'Mufia', 'alabiolushola0423@icloud.com', 'e55ab6012b93b35e36fbf8c86402408708be328a', '5420fc5f4463d111067c8b38c122e81dd3eb40f9', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 17:02:59', '2019-12-05 17:02:59', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 16:02:59'),
(258, 'kyriangerald', 'kyriangerald@gmail.com', '6e5071c3c4dbb4fbe5d756362199ed5eafee2c5e', 'ea17b0fd36b39a66b13c6ababa1ec466629205ef', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 17:56:02', '2019-12-05 17:56:02', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 16:56:02'),
(259, 'Ibrahimumaryunusajegah', 'ibrahimumaryunusajega@gmail.com', '70da90dc185d3f6d00e84197d5edabe5aa461ba5', '555a724446f2ce0dafad2fe66c9bf5238da1e1f2', 'user_default', '1320.000000000000000000000000000000', '50000.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 19:08:05', '2019-12-05 19:08:05', 1, 0, 'eEV2eXBlOTFlcFh6ZGhITlBhUzFnR3NxdWQ0Mm5IU1puczc4VU1FV1RpNG9naXE5V3Y0VGcwQ3dGYmxIRk9MK01Iekg5MHk3TDNYajJYdEgwTlNtZWZGa3pkaDV5Y0FSNUFsaVBVWkhSdUE9OjrmZ/HvI3jMo+W6aZz8SGE3', 'RDdoVUtHQ0NrOEU5UVQwS21vWE5IelAxMEwzcVNJWVBscGUwYU5nTmI1THZPL2x0R2FmR2l4TU84SExZdGNiYVVYWEFMQWNjaGUxREN1YWhqVTdmd1p4b0JwdGwzZXBHZmpjYzRteE1Ubk09OjrVqtn4QmyApzStbkhTsiz/', 'b1NRRCtRZGo1d1Q2ZVBMNzN6elRxdDE3K2prQjd4cjF4VEx0dFdMYmtra1VHejk1dGxLZGVmMTI3M0lhRjhpZjo6cqvjXQq9F7Vx3E/W17AzmQ==', 'regular', '2019-12-05 18:08:05'),
(260, 'preshito', 'npreshito@gmail.com', '734a2160820d268dd63d31dccb8eb1f107038709', 'c509876608db58b4a62361cffe2b4d9149ccc484', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-05 22:36:04', '2019-12-05 22:36:04', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-05 21:36:04'),
(261, 'MillzJackson', 'Jacksonjollyboy@gmail.com', 'efd8e6c0dacdf4a553f2e7ee9a50d90f3e0e473f', '9cca4cd990f025d4e29108243a543470c3e4aad4', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 03:55:25', '2019-12-06 03:55:25', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 02:55:25'),
(262, 'Singtonedangiwa@gmail.com', 'Singtonedangiwa@gmail.com', '115446cddea6ff41da132c18d7dceb41281d4daa', '8f4881674b31cf1c6de50e2bde4991f2fc8ac456', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 06:03:07', '2019-12-06 06:03:07', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 05:03:07'),
(263, 'Donald0170', 'Donaldmoses180@gmail.com', '55aea77adad1776a824ee582347bf23ca2006c59', 'eb7c12e67be3e99299255d182c9b11bca8270438', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 08:01:50', '2019-12-06 08:01:50', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 07:01:50'),
(264, 'Chikastanley', 'chikastanley@ymail.com', '93df716ee7ab5d9caac54756370473068c42a851', 'fef4c55f15a43b155e80878e711f57290d1f6dcb', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 08:31:16', '2019-12-06 08:31:16', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 07:31:16');
INSERT INTO `user` (`id`, `user_id`, `user_code`, `password`, `user_email_code`, `user_img`, `earnings`, `power`, `about`, `banner`, `is_active`, `create_at`, `update_at`, `has_community`, `is_mod`, `mSlug`, `kSlug`, `pSlug`, `membership_type`, `membership_date`) VALUES
(265, 'MichaelRoi', 'obinnamichael1997@gmail.com', 'a4955c7a2780e330eec4cef12082734f37d21e32', '6440a86422ccc5d1b0ecbedc4241784df66852d2', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 10:51:29', '2019-12-06 10:51:29', 0, 0, 'Ujh0VG9BdGh6R3o4RjRZTlJkalpYcGUwK3F5UjY0S1BTWjg2U2xoTHFRWEpQYmdySmdhTnh2d0JGYS9MY01Fc3B5QXFLelVydmVjemNpWmIvVXozRW9TS3M4cUlxNHRkZ21ROXNFV1J3cWM9Ojr8SShMXWAa7QbRz8ptByK1', 'TkpUNG8yZXp6VzhGZkxlL05IQkNWeFZjQ2NYTzRVMnBJTENGWEpBVzREKzFVOHpzL3YvSk1idUxuclJ2Zm5LY2dTNXlxUmVSbldaMUNWbDRhNE9rS2MwbVZyOWFiaGNDdUlKamltbWdlOVU9OjpkKAwyY+c7qOXQd1hRkR8H', 'SmIvTmJZZmZhR0VvQ1daWk1FbFB1N1dOVStjbEswa2gwUmRQaUxJdFRkUWJ5ODhqRXp6aXZOU1A4bTBrWk13OTo6vwKbRxSQwcnHEoMnWrawlQ==', 'regular', '2019-12-06 09:51:29'),
(266, 'Alabaster', 'Cjabere@gmail.com', 'f6eb5b4d3fc2b78e05b14e6db0e5d0709814c5ae', '79456fc6c57c97faa7ed5e1d367579d8f2bab6ee', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 10:57:48', '2019-12-06 10:57:48', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 09:57:48'),
(267, 'mopraise', 'royaltouchconceptz@gmail.com', '6572aa707a9b7d85d7cf5156cbcc7aae1ed310e7', 'dc4518ecc58b6d4f0ebb91ae0c524fc69a87bb89', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 12:52:39', '2019-12-06 12:52:39', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 11:52:39'),
(268, 'Viviluv', 'Udoyev@gmail.com', 'f622264ea7a7ad96313f5465122f6665734a0046', '98176f4a413aa008e56d62b8553caf7634c5e2db', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 14:58:23', '2019-12-06 14:58:23', 0, 0, 'TStyT3ZIQXdQVlFwdU5PRVJsS3YrbEZXa0VYdFUvd2xqMzVRaWdDa3FCK1RTTUZ1VWVPdWV1Y2hNajcxUUVNcjRwZUZJcnVkam9HUE1RcGxLNTd1Q0R5Q0NDTHF1SnZXVGVEcHNSY0UzeHc9OjpRlTrvL77snS9byRZ7bBnm', 'Y3NqeDhKSkRiN3lRN3pSTTVrT0JRbnVleis0eVdzTlhIb3N3MEdzbGRSc1ZmeHJqbkZRYklWRjJjaG50UmhDYW5GK3VxeG1FS1dnOER5dU4vbDNVeGV4SkJhMkpGQUVVMno0Ykx0UW1obUE9OjpnNq7icD6X2zvfifar3LMx', 'cEVIQTVJQkxMVnpYeDJMM21wMnRnREx4cUVCVXkxWVdTVzdUK2d1VkFOaFNOdi8xMkFUQVc3QUxtRUdHN1VCOTo6XMsp6PstVRo4Fi28w0ILoA==', 'regular', '2019-12-06 13:58:23'),
(269, 'Phillips', 'summalavin@gmail.com', 'c53c0a116cbffd46c3d85ac4fda5877a4e658246', 'b80027cee0b28b06837d4cef2cc9680981cce710', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', 'Simple and extrovert', NULL, 0, '2019-12-06 15:22:01', '2019-12-06 15:22:01', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 14:22:01'),
(270, 'suzzan', 'susanoikeh@gmail.com', 'ef30b5aebf675779adbc28f8d62d8f65ecd1ef60', 'c5079663e71e59a7891a7eb7b3d9c3dc86e02ca3', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 15:45:24', '2019-12-06 15:45:24', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 14:45:24'),
(271, 'Ekene2020', 'ekeneonoyima@gmail.com', 'b1cad75a128466ae122c6b4cd354da845086ccff', '935c30ce9d46bb8559c8e0627b9600afaa48086a', '5dea7ec50d8e1.jpeg', '128.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, '5dea7effd8a6a.jpeg', 0, '2019-12-06 17:10:06', '2019-12-06 17:10:06', 0, 0, 'aldveTVpWVhJUHFYM3NQQUlvczVuNU12U1lQdWdGQ0JwWG9jRzlkV2d1bHo2b3ZlcFJ5RStoaHp6QzNvZklLWUM4STgvcVMvTFJSMVhyNEdBV29IRUpPWFIyUDRWSmZmWlNzTnFocFl1bDQ9OjpBhJMLt3fS4uz/ns/mRjG3', 'Mk9BbExTOFhPWnV3RXJkWkdCY3dpbjY4SUd2Sm9CeEp1aXJEdzQ3U3hhcS9mRk1mRnJ5WnhHN0NHSnRleDFUeGxrM3JpbzZjcVUra1YzeDB1dVQ5Zk1SOWFmcXNJbE0zWUFBSVZ3eVFKRDA9OjqMIS7W/Wnm80BXFj8D4Uo3', 'U0lqVCtpSGN3V2FBK1UzUDJrMG5xbW9sVW9qNnJuN0VybGFqcjJWZm1ieXF0aXh3YktJbjdnZC9PNDlMcUw0MDo6g5i+v4Og9M7KLmlskGz0Jw==', 'regular', '2019-12-06 16:10:06'),
(272, 'Jude', 'Judeudogwu16@gmail.com', '6551188ee01cd4d8ef9ddd3a484f694bf293bbc5', 'ae6248d3c30b2c4b531dc1f152afc16810f64edf', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 20:05:57', '2019-12-06 20:05:57', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 19:05:57'),
(273, 'Godspower', 'powerkhuzye@gmail.com', '973e426e1889b8196656e69307a71f7749c0d86f', 'a35e021b466302508c4dacfddee33bd3daa67aad', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 20:09:42', '2019-12-06 20:09:42', 0, 0, 'SWNWaGFSNi9oOUlvV2Q1QjdmUXJYT1lxUkU4cVJpeG9hUkdPM2ZkOTVmdS9zcTUzTTFYaHV1d3dCTFJEQkJjU0pqTjRRYk00YVVRa09tS0xhRlhkVHJNME1kUVovV0xXZDdVZEQvNTRjMlk9Ojpexclnh4LFkeVD71LMwloR', 'aWNHekxLRDZkUnVLb3oyL2x1Q01YczlYNVBWZXZ3MDR2RFNGMXhyd05tTDMvbWRWcXREeDVHTS9LMlJBMTdZOEFiOFdHd1hsemhPYjZnNk5LZEtxK2NOZCtBSnpEVFAvRVdkMXFUcWtpYWs9OjoWG868Bq48X+TGXh3pyraF', 'd3FWZGs4WmIvMGQ3L2RQNCtTbFpFenB2aHZVb3NNOGppQjB4aXh1MjRlODFBSE0vY2xxOERNNE1tS2NPaHVpSTo6UPaiEDS8zf0wJgvq/A19rg==', 'regular', '2019-12-06 19:09:42'),
(274, 'HumbleDivine', 'celestinedivine51@gmail.com', 'dc2ae2fe1bdf0fc9128897b6ec71d3fe3ae2e632', '66d91fe4da3e5d337f1371ccfd7f3e2f2894101e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 20:19:02', '2019-12-06 20:19:02', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 19:19:02'),
(275, 'Clemzycute', 'nathclemzy204@gmail.com', '19fcfa04f11197707b948787e000219f085532e6', 'b52d396c5eb90c7429ad7422681fb63f59a178c7', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 22:21:57', '2019-12-06 22:21:57', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 21:21:57'),
(276, 'Favourphillips', 'ogbulejamb201984@yahoo.com', '0dab26030be1a7c4876a7b0827bb0f8e702f7d76', '50e1c3a89d120d7e810312e59ea0612e7f7ea25a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-06 23:31:52', '2019-12-06 23:31:52', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 22:31:52'),
(277, 'Ballo', 'Ogloconpoint@gmail.com', 'd2dfb9bb39b309a19bad2dd1a0f065b7d3684225', '9606666377d3dd5cf3419e3e344d2ea5bdbedefb', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-07 00:33:00', '2019-12-07 00:33:00', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-06 23:33:00'),
(278, 'johncy', 'johnugonna4@gmail.com', '8c6ced7141de36773c85aa46fc73c128eb5ce93f', '7d9e4ce1d84ca93d6af687bfdc7084767901e003', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-07 09:56:54', '2019-12-07 09:56:54', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-07 08:56:54'),
(279, 'Splendour', 'Splendour7570@gmail.com', 'c260dc2e45933a6e6b42c76edf84e202fee91406', 'e45598c857ea135a44e425538a10dc1b6b903281', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-07 11:06:53', '2019-12-07 11:06:53', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-07 10:06:53'),
(280, 'Henryndu24', 'henryndu24@gmail.com', '94fc00b497808ee1fd51ade4a24e718be3d2c5e2', '351c75a32f8c6aea4f917777b65bc3caac7055c7', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-07 12:12:24', '2019-12-07 12:12:24', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-07 11:12:24'),
(281, 'Doyenne', 'Doyeneva@gmail.com', '89f901127e3422fc33d6329f6b59c7c1a95a1ab9', '694a9304fd50064814730d877dc8553be8d04290', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-07 14:15:44', '2019-12-07 14:15:44', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-07 13:15:44'),
(282, 'Bobby', 'Bemmy277@gmail.com', 'b97ffe040cf2f4c7cc555c89d210e17c760c9683', '6028c94f2113ccbdea89f2c561aa532ffa4a9eca', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-07 15:37:44', '2019-12-07 15:37:44', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-07 14:37:44'),
(283, 'maker', 'Maker@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '00de3ec6e1619105f06696c9ab7f78ec81fd2aed', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-07 15:43:44', '2019-12-07 15:43:44', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-07 14:43:44'),
(284, 'Queenc', 'queencodoc@gmail.com', 'f529646caf7f9ee3479afe5813722c2717345414', '68ed1316fe5346c11e13204273b4c3585ae2b154', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-07 16:59:08', '2019-12-07 16:59:08', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-07 15:59:08'),
(285, 'OKOROBRIGHTUDO', 'brightsimon2003@gmail.com', '3b3ddbc521afc5cbfa9543d5b6f12e330b296141', 'fed68dfe160d0cc2b9634e3c7e2bbedef4f0abf4', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-07 18:42:58', '2019-12-07 18:42:58', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-07 17:42:58'),
(286, 'Mosrek3', 'mistermoses3@gmail.com', '48888c59ee0c22231d7569230186ca5d8d93ddf1', 'd46e56924b7a17e00f9a1582c3ad39760eecf359', 'user_default', '4.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-07 20:13:18', '2019-12-07 20:13:18', 0, 0, 'dFlBWHo3UTRhTXJKMkU0VWhGZDVrWHZURDh3V3pCVjNqNlVvVkVXZ3FuTFJ1OCtDT2MwN3FoTGxWSWl1YlYrbURTTHBlZmIyZUdYU0hpZWkvVTI1amo4SjMwWWRsQ3prdDIvN3hNSGs2Uk5QR0hKTm1qMHE2b1F0MWZYMElZRXA6OlAieOl3w8B1+HoCOe/Pexk=', 'd0RHZ3dYNHZ2Kzh0MnVTc0IvcG5Xbk9CNmtZM3ZRV2twWnk1bEdFMENOQUVFWC9hQnFzb0hFaFUveW1hTWNlSGJaUFJlMGZWK21TQWNjeXBEeUNqUHdidWFuNldpb0RJeUp5b1krU2tqTzg9OjoRr59ABfTWGen09OW3Uks+', 'd1JxWmYwTVFOeDVZM1d4QkoyOU43SHMyeU04UTRIK1hqSlZoREJqeXN6ZWNvcmRWb2Q2YVZ2V09Hd2MvazN3VTo6kKk2TboFM7WEHg3Pd+QOUQ==', 'regular', '2019-12-07 19:13:18'),
(287, 'BlaqRuby', 'Odemadighithankgodwilson@gmail.com', '2df89653abd4c0649f133135a00ec1687b36a787', 'a6301e00328121de167cc82f29ecb3f3c5ec74c6', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-07 22:57:56', '2019-12-07 22:57:56', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-07 21:57:56'),
(288, 'Nwigwe', 'nwigweabednego99@gmail.com', '3a87af3ddf24756291760a6799605840650562e9', '089a08269646221b9d05c3066a048d7e7ed1e6fa', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-08 11:10:19', '2019-12-08 11:10:19', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-08 10:10:19'),
(289, 'goodson19', 'goodsonobioma@gmail.com', 'b11cc405d89b3a208b49d60fbcf91b29e1d8c680', '4eec1f88ee11310cb249a6ed95c49112db61cd19', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-08 11:12:38', '2019-12-08 11:12:38', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-08 10:12:38'),
(290, 'Jumbo43', 'jumbo43@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '1d354d338c086e60e349bd3b099f5998d1ef06a3', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-08 17:10:46', '2019-12-08 17:10:46', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-08 16:10:46'),
(291, 'Jumbo432', 'jumbo432@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', 'a923327372e2145474e2dae51bd8a39147df17f4', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-08 17:24:28', '2019-12-08 17:24:28', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-08 16:24:28'),
(292, 'AskingKFC', 'AskingKFC@gmail.com', '26c6e8562e153cf92f072b495c7222322fef696a', '0efa46713e40eee0d4c786333350ee1aaaca2b35', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-08 17:43:45', '2019-12-08 17:43:45', 0, 0, 'Vm5zR1ptY0dXTjd6eUVucmJjQUkybkd1SzF6QnBHaXMzdVdVRytaT0tsQzJZcFpiUzlrUTV5OEU3clg1OTNUWWtCZVUwY2N2VnNWMlgxYWxHS0VtOS9tNWhKdDlaWUhmWXEvUEZGRDBmZjA9OjpK5O3EQKOxt/byI0D/dKD5', 'S3JMVEk0MUNwSHljMGJlemN2NVkxdUJqSkR3UFJKenJrQXdsNWU3dkJBREVURzJzZkhiVFlFbXFKUzBMekp4TUNOcU1kemtDMXNiV1hrc0pvS3FPUFRaT0hNY0ZhRFhrc1ZUQlVUcHFiMlk9OjqhA+3KnoKQvuvvk9P+htTi', 'RWNkK1R6WFBuZ29FM2hSM1BDbjdycGJycGhhWFMrK3VHVlhkYU45NFBESlhtMFJveURibjdZZzB2RzlNdGtydzo6bgfj4c5O0QxgnclqFAumTQ==', 'regular', '2019-12-08 16:43:45'),
(293, 'Vincikings', 'Youngceovk@gmail.com', '5683c74eaf642f92bea533521cd4e31312647028', 'e21114c14b5c729b94d5b48795830765239399f7', 'user_default', '40.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-09 04:49:19', '2019-12-09 04:49:19', 0, 0, 'SngyVFBRdnBmMkdNWDFWMHVJMVZEN2dOZlVsRTBkZmRnMS9ucEsvaTZwaUVmaDJGeG90OC9MTHdpTkRXTk1RU2Z4L2FqaUQ1Tk1ianRHYjRwdWUxSCtRZlFhTk92alBlMFFibm1BVmlFNlBpK1hCMmxJUUlzdEkzOWEyeFFFU086OrzK+FXjORuZzVrwbZmZjjs=', 'SU5sWElISTcvek80aGluRU9JY1NobG9LRnBYRzg2bWRhL2NkK2VDaVJyYlo0TVdJSG9CSHRuNytYdDI0QlFQL2ttcWM1NDRZV2xrUGQ2dWhlSUd4M3pZVG1CZjY4cEpkMllIN2wwM1V5T009Ojo7WkYOBf9JvPAYN/VJTvLW', 'Q21YZW9obVEveVprVEtuYTA5ZjRpVHVsM0xwMDlTcEtFTTdJc29jRW9BTEFYZ1B4TE15VnZndXdicFFXaEc0cjo6du/TfU+taE4EW8ygNKi45w==', 'regular', '2019-12-09 03:49:19'),
(294, 'Moses tom', 'mosestom84@gmail.com', 'd1d6568209b0f8d982c416247268375e462c51dd', '4b8891003087ebb9804519961f3b832ca9d57d18', 'user_default', '104.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-09 07:23:38', '2019-12-09 07:23:38', 0, 0, 'dHJjWGZiWnNBK25xRk01QTRMZGphSkQ3MEFLZWU4SG5pamVCUWRJV1p4Z0I0Mlp4QWs2cS8xcXhkWkhFVlN6aU5XYXlGdGRNdGl6QWdpRDgycVZFN1ZYaVUxcnVPTjVOTGhYWkZ5V3FnM0U9OjrtiuyKkqKx6Bi4sZzItJ9B', 'aFRQUnllZG05bUZvTVRpbmg2RTJOckIwY0FCT1lBYnlqQllWQU0xZDE2a2hTU0hIdUhOS2pPdzlXc0YrMmpaYVE0Ky8xb2pFRFJKQ29sMFpPa1lLQUFUUnJFbFpKckgwZG41aW1VSjlaMnc9OjpTL/hs3RUs7Y/B6RHzES4Z', 'TkJxUWZSV25SaWZENGEvdHpSZ0pXNGhRanVzelpDQjNCd2dzZG1LcHBQbE9WNVFITko4OXc4RVRwbUQ5U1BDczo6Wt3DeuTlCG++aJm96aU8ww==', 'regular', '2019-12-09 06:23:38'),
(295, 'Myname', 'omanmanwachukwu666@gmail.com', '8acf031ae7eb54f07362e3ee034b01d136d81762', '0bbe18a1b63586357dfb053180f90e55c92805af', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-09 09:39:15', '2019-12-09 09:39:15', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-09 08:39:15'),
(296, 'pp5007', 'princeprecious223@gmail.com', 'f3d06289f6f68bbfd0ef328277a480f307a3e0f7', '99b0b2a29f25f152798eef2de5c8f8ef24752cc1', 'user_default', '100.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-09 12:00:11', '2019-12-09 12:00:11', 0, 0, 'eWZYZDgzTUFsUUVmaEE5U2FUUHhuQVlSeHpWT1lEZURaajlxdXpaUk8wK3RhVVFpQU1wL0FHVzBIMTFBdWhLZFpXaWE0ZXp0Y29EV0g2ZTlMMk1naUNPbXJjcHV4aWJGWjVKY2Rta21lSlY4TjFhaXNvM04zUTRZR2VvQTl6ems6OmCjwWpLwEr/ZgAvTkiBYm4=', 'SGJjdm43djdodGJQOVBvNHptUVEzRm1KdkltdFJha1pwQ2dpVEFORTdwVm9tMjUzYWN1RElpamwrTWxHa2pWUzIwcWdRUDJOU3NkOUYrbEJXcDlvSHY5aXJYYitTM2ZMVFJGQll3S3ExajA9Ojrka3TI1aLaQOgsWhzTYYjt', 'VC9hTm1rbzF0YXo5WU9IOGJQaHlKU1hvTXc0TFhZSW5YUzJoWXdGR09TcjlNUmI3Ri80WkpQRjY5UHRzK0c3Zzo6Ie+MTHFCIzrme/aLxQuBJQ==', 'regular', '2019-12-09 11:00:11'),
(297, 'Uzokel', 'uzokel@gmail.com', '42ad8b6d2f90c4c7007d0f0137d2d42d91f42984', 'b4c94247bb7b4e821bd05d9453d893dde8e99b56', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-09 12:49:41', '2019-12-09 12:49:41', 0, 0, 'N29yanRDNU16VG1Ob1lMZURSN3dyQ3JheW5hV3lmNzBpK3l4TVlhcll0dmFDWGg5R1VLVWVsL2dqNG9qTGlaQ0FTellHSGE0Uk54UXhZMmE4MC9waGFsc0wrRHVCYTFJL3B6Z09NejM2NW89OjqYRoRYyDEwo07BP5TegTH9', 'QVhNNk8vUU15MSt3Y0ViT0dzL3h3TXJEQ1E4MlY5ckU4NkhxRTRHWmR5MzVzWDRITEdrcksyVngwUXRTZG5CUEIyK0N2RFVXcXd6VTNXdm5HRVRtTTJuUTdXa3lSSXFxLytpWEE5UENsWUE9OjqVRxh0FQhpCeyoDscPNXdN', 'Nm9KZ09EamFwdng3dWFaYXlObis5Z2w1bE9wRVZ6R2U0Q0NMNFpkUWU4UjNyYThjWEZLeVdWWkZzMkdZY2pFZjo6AIwxTAX7ZPIH1W82A0Ce7A==', 'regular', '2019-12-09 11:49:41'),
(298, 'moonswamp', '5163858@qq.com', '3acdd18b0ec85c90fd09bced0f1ac574fedeac8e', '6b7461924d11b40a3267ea2adde11f2f1cbd54b6', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-09 14:20:08', '2019-12-09 14:20:08', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-09 13:20:08'),
(299, 'Yhucee', 'uchennanwaobasi@gmail.com', '2d8ebf3023873997fd4f0b1769bacc526084da0c', '6ec1a03c6ca7816b4aa85bcc58fd24b98818c527', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-09 18:27:22', '2019-12-09 18:27:22', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-09 17:27:22'),
(300, 'Genesis', 'chimeremezetochukwu@gmail.com', '1936d6a200e69969abd69cee2a982a5a1a797869', '17b30f8a9fe5ebe2f375cd4c125a11e593d5cf5a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-09 18:43:24', '2019-12-09 18:43:24', 0, 0, 'SEdPL213N09IazFudzhQNjB6L3RkWXovVmVnZTZROExWd1ZYNElqS05JTnJpRDlFTUMzcStkSlF0czdyQldpQUNJUWxLWjdSQmNqVllRSXdheFZWYXhYTWtkNTlpZzJidW1kbytuMU5ucGs9OjpZuITiQFK0GgLH3RXCDCZC', 'WjVuWjQwQStlb3V5MTlhRy9iYnRnU1RVL3ljbUQzS252NXp2SnpTRXIxaTBEMEZEK1kxZG5aSjNJQnZxdzFCcVhRYXBjZDkwTjZuQy9YMzlOVWw4WXBMbEQ2bFV1aWU0MzFxZHVNY01ibDQ9Ojp8/aZykpmjZ0BszC5Hn8Df', 'aEFodWFtcGZTVUI5RXdTd1lGYWVuenFzTFZSUTNjeSsyT28vZFB1ZUlaNzNKQ1BteTdna2trVEx2THdiWlFYRDo65ubBYQahvwdpbNgfw68Ccg==', 'regular', '2019-12-09 17:43:24'),
(301, 'Michagon', 'agonsimichael1233@gmail.com', '61bd56c32150e20827e0a64f87e5951f8fc82989', '27fa9ea3d40c8796c6f7b9ede49d2d31feb769f4', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-09 20:03:30', '2019-12-09 20:03:30', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-09 19:03:30'),
(302, 'Emmanuelobinkwocha', 'Emmanuelfreshy@gmail.com', '583cd608a21f278f10e35dae92fbe2e72b8f602e', '5665885911003f7b4c0c1311fbccb811b11acae3', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-10 12:51:49', '2019-12-10 12:51:49', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-10 11:51:49'),
(303, 'Francis2004', 'nwalafrancis94@gmail.com', '03173db60c3f40dbee87837df6d2246424ac9624', 'e69e394a3b0274ce145e4f26576e2d5a2d13f074', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-10 14:21:09', '2019-12-10 14:21:09', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-10 13:21:09'),
(304, 'RyanWalker', 'chukwuebukanwachukwu3@gmail.com', '0b3ee2ca68f2abcc5fc632123a1c42226e88ba8e', '96f870fbd39353b488e5fda145962b9d5af691b1', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-10 19:20:15', '2019-12-10 19:20:15', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-10 18:20:15'),
(305, 'Richard', 'richardchekwas921@gmail.com', 'df8bee8242420fe81f59f93cdabf632109a656d7', '5c796969877f11c7bb68138d2379c3dc7ca64a96', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-10 20:58:59', '2019-12-10 20:58:59', 0, 0, 'dFNTMUthUnhEcVNHeHh0U3hQZ1c4UmYzZ2NobVhDRG9IL3RkUlJQeC9sOWRhZVRudDBnZStCRTFhWVhNeUYvaUJZWVNrYnAzTDBLS2NaTFZJSFF3enMvUFd5SEE4bjU3dGk5MWNxZ1p5V2dGamxBby9KWllDYzFoRkFpV29KV0w6OmDNMyF9/DkqWCKbxf8il5g=', 'elpSZUJsaFRpRTNnb3lCYVB4ZmtPSW9FVjg4L0ZuYkhpTXphNE4vNEZVY3gzZjRoanVkbWJIb25oZXZCYnZkWVhCb3U2ckJzSUQ1dFgyYWZua2MzMjhlVEZWY3VuZDRzUndXbjViSDIvVzA9Ojr6Z1DEXZfDIVD+tsR+Rdin', 'YnlJNGNEMmtBclNYdS94M2YzRGxxb1hNQVlrd2FWN016bkZOajhaQWpQM2hxY1FuZU5hUGcxeWN0amFpUnhiYTo6MpRk7GIIR+t7Ep8+XqZOKA==', 'regular', '2019-12-10 19:58:59'),
(306, 'A', 'bitzeroshi@gmail.com', '678485249d83a9d71b3e5173177d45dbe5ee8945', '6dcd4ce23d88e2ee9568ba546c007c63d9131c1b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-11 01:47:48', '2019-12-11 01:47:48', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-11 00:47:48'),
(307, 'Bitcoin', 'j.sen@hotmail.com', '678485249d83a9d71b3e5173177d45dbe5ee8945', '42bd6b9eeb1da01504fefe014e16415246c0f66f', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-11 01:49:00', '2019-12-11 01:49:00', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-11 00:49:00'),
(308, 'Binance', 'binancecoin@gmail.com', '678485249d83a9d71b3e5173177d45dbe5ee8945', '7f0dc9146570c608ac9d6e0d11f8d409a1ee6ed1', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-11 01:55:55', '2019-12-11 01:55:55', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-11 00:55:55'),
(309, 'Crypto', 'ojsen.com@gmail.com', '678485249d83a9d71b3e5173177d45dbe5ee8945', 'e849494484ed2e3c1a93babc3e347d2e98ac8604', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-11 02:03:44', '2019-12-11 02:03:44', 0, 0, 'TlUvYVBhQllPMDFXbjEzeHlwK2VNSGJiOGUyQnFhVGVocnZlSWZmRlB3cXNYcVh4a1A3SUl0TzJxdklLVFY4KytqKzBTbER3KzMrOEJ5WE1MdmVWNDk0emN2OXhYbGo2RnhabzJHdzRMa0YrMUkrOWJVQzZRcEszOGsyWTlPOEo6Ok6GGDHvGl004JnyjjzaEIg=', 'NFMrSndUZ0pOUmF2TkhML05NYWRrZmxDTGpBK2Eya3FvUGNWMDF6NjVjUkFaWkZ4MUJ5RkR3eWFEeitraGg5WUVIRkpNNStBK01QdUpDZDMvdXlWOENKL1JVTmxZVzdzTlZaN1JCaU9LSUk9OjpaSbGHws/DqkbNbfktu831', 'NkJmZzdJbTFOQ1BmLzRmQ1pxdGRBb0YzeFhQa3lvaUpRSGNmVFlJUjZ5bDFONVpCYUc1MmVBNjc3SnJCRDhTaTo6NrKQEJs3XsXSmKokV+47iw==', 'regular', '2019-12-11 01:03:44'),
(310, 'X', 'whippergirl@protonmail.com', '678485249d83a9d71b3e5173177d45dbe5ee8945', 'c032adc1ff629c9b66f22749ad667e6beadf144b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-11 02:17:18', '2019-12-11 02:17:18', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-11 01:17:18'),
(311, 'Deworld', 'Deworldemmaco@gmail.com', '66435385d0b72e62a61ff5f379da49ec539711a6', 'fd96db9086f90df006df18e0f7bce53e5d7587f8', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-11 08:33:21', '2019-12-11 08:33:21', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-11 07:33:21'),
(312, 'Chineduudeh', 'Chineduudeh977@gmail.com', '79ec072e0e48791aeeedd8d5b2d7a3881e4dfd68', 'fcf2120432e2a11b1ed974d9505ff2ab8a760999', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-11 11:41:24', '2019-12-11 11:41:24', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-11 10:41:24'),
(313, 'Danick', 'Millguy9@gmail.com', 'c66e761eb1dc9d37a92dcf8bf95b3eb50a5c1802', 'd344207b90eb7be0d5be0044af86fd739c851891', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-11 13:16:12', '2019-12-11 13:16:12', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-11 12:16:12'),
(314, 'Blazen', 'blaiseokere2@gmail.com', '39d9876d51dfc767fba158b2d58c2e88716fadb6', '787a2938629f3ba445eb0008358519da9f2a2437', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-11 23:32:27', '2019-12-11 23:32:27', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-11 22:32:27'),
(315, 'Goodluck11', 'divinevictor62@gmail.com', 'edd19443c0876a9a6eb694502b8d6e18d2250382', 'd62c8e2275eac3b034eaa0330af14f8d2eaea71a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-12 12:11:55', '2019-12-12 12:11:55', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-12 11:11:55'),
(316, 'Clinblinkz9', 'ukazuclinton62@gmail.com', '6a6941febf8c0d30b9d86f8b32f129499e1b8061', '47d65512cddc04abadf076b2b005baa955a3e157', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-12 15:44:27', '2019-12-12 15:44:27', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-12 14:44:27'),
(317, 'DESTINY', 'obidestiny5@gmail.com', '471ca7f8cc709269c8ecdcfdebf6a77f659da824', '4160c3ce1f22942e5331777e199cc8a0f24cab5e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-12 18:56:08', '2019-12-12 18:56:08', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-12 17:56:08'),
(318, 'Willie320', 'Okegbewilliam@gmail.com', '8c5581d829775ab1b25dc03b54ac7e982d0e60c9', '6fc523b69c13db282e66aafffd718913dfd09abd', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-13 09:00:33', '2019-12-13 09:00:33', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-13 08:00:33'),
(319, 'Hexane', 'edethenry00@gmail.com', '93defd5f4e9f5eb407b361c1a52c78440e7381f5', 'd80b9169a05a79ce5a80cfff95fc65e44add8093', 'user_default', '16.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-13 11:10:52', '2019-12-13 11:10:52', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-13 10:10:52'),
(320, 'Joy', 'henryekanem10@gmail.com', '10798f02a62bcd091b90e065fffef21f23d0659e', 'c317214e790cb0581de3943ca2ca61b485d0061e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-13 21:42:45', '2019-12-13 21:42:45', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-13 20:42:45'),
(321, 'Uchemoney', 'uchennaogbonna1234@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '519dc93ff9b6f707074dc1c753007dde64b553f2', 'user_default', '284.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-14 06:15:11', '2019-12-14 06:15:11', 0, 0, 'M3dqNFU1akhyRXpmdk9wU08wbmdlK1Y2OVBKVjlaYUx5elBpMzFna1FXRVlEUE9URGNzL2hsckNEaDg0TTNFbjBnaDJ1QWV6VlFaUXROU0tYaTVLbFNvS0J5NEt6NW5ia2hCcUpEK2FlQ0k9OjqkStnvC9NAQyOaqjnk1GGX', 'cWROem1SQnEvRXQ1UnNDL2RYbFgwNGtYblNFQVZWQ1MyOFBDYmhzNy8zQSswaVNmM2JvYy9nVTVFZktqTVoyeCt6S1RaWEtoaUtHdXRNenIrZlZqNDV3aXVjclpCdHJURExyUTFIbUxTems9Ojp7cK28yaZTe6MChXf/NP+O', 'L01YcDNqZVhlVzEzNno4eHFCVm5uaTRqTi9Cb1Rucld3eWxOeXZ0cFc3NkFBS2tzRzBYYzRhTGN2cUwvRnRhVjo6EpvKQH7JU9Aisk/dyTYjQw==', 'regular', '2019-12-14 05:15:11'),
(322, 'okpekwu', 'Johnokpekwu@gmail.com', 'b91ba0f74417fdd885af8457c2a805828316bf10', '254bc51d79c611342837cf4cfd513acdd8c9fb98', 'user_default', '290.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-14 10:38:17', '2019-12-14 10:38:17', 0, 0, 'YUt3WE05OVZ3N2s4eFFnNW5HT2dmMlI2MGRLanQwSnNuYzdUTlhSNUVoVHZneUIzUTZCK3FiblVqdzR3MVdUK1BSUVhQRGhQZ2MrQkcxSW02dWhBRjlOaS8ydDhjbGI4Z2E2TEJGVWk5dXM9OjrvhPoiBVhPWWx+r3GRY3ro', 'N1hvalMvL1JoS2FvM1BzRER1S3RqZHNMSlpWTXlITzg1dGgzMm9xWVRUM0F6aWhja3Vxb2syZTN6dXI3bUtFZTVER2dLRithUEZSZ3dHL3JESE1ncHIrZEphZytmUWdoRy9tb3JoM0p0c1E9OjqBSP5J5hEo9iPMRg97ZZVT', 'U1dXUXFsZVZ5QW84MDFRQk1YdUt4SkcrYmNJeURPZ2RJN0pYbHpxMmlBMGUvU1BFaHZGOSt2alR4UVpRVnFmUjo6VW3sqaSLVTfskMhqvVKdsA==', 'regular', '2019-12-14 09:38:17'),
(323, 'EmmanuelJustice', 'emmanueljustice996@gmail.com', '7b07686133e5e903548bd9310d014d732d6c7f99', '5dac5030c07cb1aa2af3b65764ab8386a4a7cdac', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-15 16:06:01', '2019-12-15 16:06:01', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-15 15:06:01'),
(324, 'Ezonebi21', 'ezonebi21@gmail.com', '4f748b3b41cf542ac30ae8bbf77242b4483be19e', '966d91542fecd6f5ff3531793aba18463de12145', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-16 09:16:44', '2019-12-16 09:16:44', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-16 08:16:44'),
(325, 'DesmondOsazuwa', 'desmondosazuwa6@gmail.com', 'f30de9cfa6cf2b34f1c85db60253f534c778e1bf', '2c284d17be5117cedc95c26c2c68af80f60450b3', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-16 16:29:25', '2019-12-16 16:29:25', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-16 15:29:25'),
(326, 'okwarachidi', 'okwarachidi16@gmail.Com', 'fbc6692fff21d62207d6d0d524b78043c3e0be3a', '008f0128b1de052c7b33f5d25da024a43d34d25b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-16 20:26:46', '2019-12-16 20:26:46', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-16 19:26:46'),
(327, 'macvink17', 'macvink17@yahoo.com', '0fb78032884866c22066f1d0f93c7b16987688da', '2f93308165ccd6d4a8b921d445c34cbc252d0da4', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-16 20:55:45', '2019-12-16 20:55:45', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-16 19:55:45'),
(328, 'DanielJoseph', 'Dannyjacejoseph@gmail.com', '2cd9d6ecf97a3c49f1c6a6db8a714d9598e7424c', 'b677cf387e843d22fae2babce4429aa5d37482f3', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-17 18:23:48', '2019-12-17 18:23:48', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-17 17:23:48'),
(329, 'mega-king', 'www.offorjamesonyekachi@gmail.com', '14deba54e90635c1936fc5bec2422a1055d13477', '4a31374faf870e73e125d3babd691fdfbd38c220', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-17 22:31:10', '2019-12-17 22:31:10', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-17 21:31:10'),
(330, 'Wealthyvik', 'wealthyvik@gmail.com', '5705be5c6208f18478c2e1d4427f96ee0b018bb3', 'b95abaf49479f6cb90c70d5e455eae697ff48cf9', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-17 23:30:50', '2019-12-17 23:30:50', 0, 0, 'Tkd5Y3hvaFArM3VIb1F2QWNYZGhzVHJmOTRZTU4zR2VvUnRHci9TVWw5MVJXT0U3WDZCeWdGL3IvUGlYc0F1bGNJNXMwcjhXNVpXMjdnNVFaVW9xUEJJTzFlSTJyNmpBcmZtdnFhRWZuRms9OjoxlJW5VLIEoHV+eG2ze7OK', 'TkxoZzZEZXJ3SnhQbDhOUU9GVFBuYlZaallVZFFMZEtENHE2WlZ6WVU4azFaVDlkTFYxbzc3RHNIMFNUSG4vQ1MraVhKeXI0M2lMNmNaajRWQk1CTEdGbzNySnNFTEsrNFh2b1pSOEUrQWc9OjpA0SsFtmGEvOQ0Yv8SjE4y', 'eHp0SnVvdkdDUEtmeHg1ejFFRDVqWW8rbVpZc3FzaFdjcUl3bmV2YldSa01TMGxLSm1YMmkyamZuSXVOMlhvMzo6CUZTC6zkIc6bGbw2722aGQ==', 'regular', '2019-12-17 22:30:50'),
(331, 'Maria', 'Chika.ojike1995@gmail.com', 'eda5d594a8a90dd65f609372260ca72749fcaaf0', '3e182b1ea9376483a38614d916a0b666ef531b6d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-18 05:04:50', '2019-12-18 05:04:50', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-18 04:04:50'),
(332, 'egbulehumphrey', 'egbulehumphrey@gmail.com', 'c751862792a029d2a30d450151f3eecc087a5af4', 'a5a7989da68a0eb12ac31c4e38e108b310978856', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-18 10:41:16', '2019-12-18 10:41:16', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-18 09:41:16'),
(333, 'victoryeugene1', 'victoryeugene1@gmail.com', '9ba3ade0d1415fe98175be08b96026eaf661b3b1', 'c9c843509cd82b617d92d987c0944462abae45f5', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-19 08:14:38', '2019-12-19 08:14:38', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-19 07:14:38'),
(334, 'hesiod', 'Akporokah95@gmail.com', '0f4edf9ab90e943759b89534fbb24db9c16e1d9f', '5789c876d89d827f1f0263fb0e980617c42d2735', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-19 12:54:26', '2019-12-19 12:54:26', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-19 11:54:26'),
(335, 'chidieberebrown', 'chidieberebrown77@email.com', 'ad5a6ba4c428231dc75a74447e64cee32d2128e2', '19d681d30dec467ca92f21d46d87503e73b45480', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-19 23:19:15', '2019-12-19 23:19:15', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-19 22:19:15'),
(336, 'Smarteyezboxx', 'ekaneminimfon@yahoo.com', '90f4a921efb173f4cdb51af637e017f030181f7a', '87facc5ec87bbabde41e1ae2f3bd5657a5a43756', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-20 07:09:33', '2019-12-20 07:09:33', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-20 06:09:33'),
(337, 'Patrickwealth', 'patoitodo@gmail.com', '4a0b84a86b6e5a01ad94571c17d83c3244866ac1', '29a0b1c3e1657ee40b93c39fb00e120d6402bec7', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-20 21:04:00', '2019-12-20 21:04:00', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-20 20:04:00'),
(338, 'Ibekwevic', 'Ibekwevictorchibuzor@gmail.com', '7603b22b84c8de5026e9e119b6bf016bf587ff41', '0bad8e25a46f249e3c7d22ea00607101fe169b11', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-21 00:08:15', '2019-12-21 00:08:15', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-20 23:08:15'),
(339, 'Benson', 'Coachbenson247@gmail.com', '834ef6ab6cb84b8be78f79339580d628fdc7a9db', '2a4c409804f6c7e1354dd0c696a7099f717277a4', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-21 01:28:20', '2019-12-21 01:28:20', 0, 0, 'QXFKRmhkditYeGtvNDZPbVZHNGRDSFVpczE0RjVmUVJRbmRvUDlyNWZ3Z1gzbEsrNTYvcnNHZ2Ywd25EUGNFY2Q1WjUrZFdjTmRpbWI3aE1XdG55Y05GNnhwSFpPcHM4UXQ0d3o0SUFiV3M9OjqNoPdVRFnl+y1OTDj1D+lC', 'cGU3SVkzaWRQdXlJYjRySUFGUDFKT3VQeGpOUE5nMlZnbVZJYkFYM1R3V3Z5K09FcmszRnJGMGxYWEZpaTZZQnpqSWp2dWtyMnlJLy9BVW9nT3Z1WWZaRWthL2trTVUyb0sybFFXanBOUlE9Ojp6RRJO44x6jI7C299ZYpUn', 'NTFVMXpVSFZJbkcvR1htQnZLNW02M3NLbXdXclZVNnFVcnAzVmtIRFFValdMekV5Ly9CZ2dyN2pSL2ZnSDk3czo6ibVAi0kDCTHgGy1SPxlKag==', 'regular', '2019-12-21 00:28:20'),
(340, 'Dimkpa', 'itz_dims@yahoo.com', 'd5811f4628187ac6ad7fa9db9690504e8fb100c0', '95ccdb6f41bc4c13b3002f83c95f82e30d3653e0', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-22 06:04:18', '2019-12-22 06:04:18', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-22 05:04:18'),
(341, 'victorysamuelp@gmail.com', 'victorysamuelp@gmail.com', '0b5da18043caf58f3b354c6f0fe85152ee2699c5', 'fcfab61e43c76a54b0201c362e2fe48b80b8639b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-22 12:01:39', '2019-12-22 12:01:39', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-22 11:01:39'),
(342, 'GREATGOD', '1DIGITALNG@gmail.com', '2c9869ef82e34bca1afa0704b68acc7138902b9d', '3da053640c25e2c6e336c8802531c9b0ebb1c456', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-23 00:07:06', '2019-12-23 00:07:06', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-22 23:07:06'),
(343, 'Josephine23', 'Josephineemeka23@gmail.com', '224f9dc41e7a810a51136689de92b4f0a904a9ad', 'fdb6cb3b623f2817688441f161d7ba48f0d9e4aa', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-23 01:13:59', '2019-12-23 01:13:59', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-23 00:13:59'),
(344, 'Emzzyglows', 'emzzyglows2019@gmail.com', '40441c11576e43c92666f6296f1a150fb7ad0285', 'eda2683edccc1644c9d0190871d61ea5afc62812', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-23 08:15:30', '2019-12-23 08:15:30', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-23 07:15:30'),
(345, 'Vnsini', 'kingvikkie@gmail.com', 'ed149153cb58b775a3640e10143688bf3a48c8a9', 'f2a2b2bee074c74b4fdcf4f5431065f66d3198b7', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-24 12:29:43', '2019-12-24 12:29:43', 0, 0, 'bGs0YU9oMk1qMSt4aG1KbHpxdTNyVGhqSWh6dzg5OE5LMkczdEFjYWFqeGhFbkJXd0pOMXYzS3YzaEgxK2RqaFJwNDMycnQvQ1dGVVZOdmlWdlpYR3BzbGxUKzR1cE5yUDRUd0NUSGFya2s9Ojp7dd45rVwXQSGQ1nh7Bxku', 'cUlWaFI0aUNjaVdaajBFanB2eVBIWmp2c1JxcmxhdmtrL1dLSDVnajdmYUI2TzJMa05xcXpvZTFVaExSL1JuTkR2dk9leEFpMUVPUThqMmRMZlkrdTZvNFBSQk5obTJLTGJ1SnNDMnhIR1k9OjoeHkbpUI0um4DZ6w22G0xG', 'Zk9WWTJsOHNvU1FjZFdleFpQY2hVNVJmeXplZDlCdTRnVUJSUzZxYUZ3bU8zaXA3MTljK2dycUk0aDNnVS9naTo6OvL8t6KFwGsXgGu+lAdloA==', 'regular', '2019-12-24 11:29:43'),
(346, 'seyiamos', 'seyiamos277@gmail.com', '89a6d9cd2eed63f8b28addc094e259a30cd08a5a', '8cb3bb43fc5cab10f58cda37b62b64fc0f205151', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-24 15:20:44', '2019-12-24 15:20:44', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-24 14:20:44'),
(347, 'Philip0123', 'Philipvin8@gmail.com', '7cb279fa87d3c1f49d7dc017fbbb3e51b5870662', 'd7c460909228a10cd61946ecf196003254b083d5', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-25 03:10:27', '2019-12-25 03:10:27', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-25 02:10:27'),
(348, 'Deborah', 'uchendudebbra@gmail.com', '69baca68f3358162928949d02aeac1bfc9219c1c', 'c6ab030dacd891dee2926c589f31c36b23ef6154', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-25 10:34:36', '2019-12-25 10:34:36', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-25 09:34:36'),
(349, 'Emmanuel2002', 'emmanuelhenry195@gmail.com', '05a3dd4b091f65d0cb95d110d182e6128dc48f86', '0cb21be63e6d6c89ab635951f20ec5465a81e7bd', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-26 11:26:06', '2019-12-26 11:26:06', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-26 10:26:06'),
(350, 'bukky', 'adejojuolubukola@gmail.com', 'a19e31d69f080de07654ce23c1ab9119bf0b3d65', '75c9d9e72e2cc7581ea40d73b8c9544d358be078', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-27 10:20:53', '2019-12-27 10:20:53', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-27 09:20:53'),
(351, 'Royalle', 'enkay160@gmail.com', '97a00810273cc07ee73837c38fcdadf536ddd4ba', 'ed38fea2a223d6023f13e0c3dbb20c9eb8e98e9a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-28 00:28:27', '2019-12-28 00:28:27', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-27 23:28:27'),
(352, 'Wisdomdick', 'Wisdomdick105@gmail.com', 'abf66d1148905021dc3e3a29cc05f9a66c1c7066', '3f8266e7f0fa4d667fbdc8980639ec9dfa636e4b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-28 21:25:50', '2019-12-28 21:25:50', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-28 20:25:50'),
(353, 'centsima', 'centsima360@gmail.com', 'f30d84736fd16e1e7b043fb63a83f5876071ff92', '56a5fc8cffc6db39aa6b0f129b03bf813e890342', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-30 13:56:52', '2019-12-30 13:56:52', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-30 12:56:52'),
(354, 'Deinbo', 'deinbo900@googlemail.com', 'ab6183b953be897365aa770a6f5e670ea1f8a98c', '143644404a91cd2282cd4b49c27e286e2175fe07', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-30 16:58:08', '2019-12-30 16:58:08', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-30 15:58:08'),
(355, 'brightchimezie', 'Brightchimezie5star@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1f4a766f95e6fc1a020995678985c344725df4be', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2019-12-31 19:52:07', '2019-12-31 19:52:07', 0, 0, NULL, NULL, NULL, 'regular', '2019-12-31 18:52:07'),
(356, 'Nevado', 'obiajunwahenry14@gmail.com', '427b609fc90f34f40493fbcd8397b6ca4193aac8', '82c434dff6e96a40ed01f1aaa5f0fca96b425807', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-03 00:45:44', '2020-01-03 00:45:44', 0, 0, 'WkVhK3N3d3pwenk3UHRDOW9LREFnajFsdURYUkRoNGtnZ1JFS1k5ck0xSW5GclVVOFJUNzRKc1ZObEtJanRpL21Oc0dGM0xZOVFqUHhtWWdxVDZCUmdvU0Z3N3Y4U1VQa0I0YjhYaFViT2c9OjoElCRduLLzDeGEP5OF7ygj', 'a3pXT2NIRTRTZ1BnVks0QXBhMytXVkV0a215MVJBNTdMN2lLVGJoK29uSHJrbTZRem96b1J3UElRNEFnTHdPOVhiakJLNktxR01aaFQ4MStFWkVPb0VpUHMvcWpUSkJyUnE2NlgzQkVPSFU9OjolunKQNN2UUrHejTDbp/q3', 'aVZOSUJGU0MrUDYzSXU0a3V3ZW83WFJKOExrcW1VTUhTNUw1M24wZy9TaEZYZGtuNFpZU1JRQlg2V09Kbm5Lczo6lXceiMw4jqZNznKs6Ravzg==', 'regular', '2020-01-02 23:45:44'),
(357, 'Tekena', 'onikiotamunotekena@gmail.com', '0ffbfd79e3b3bf977b49545ce3ef9090f143a85e', '10dd375f022a1ba847f05e9d24a118844aa3e819', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-03 18:47:30', '2020-01-03 18:47:30', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-03 17:47:30'),
(358, 'Ibinabo', 'ibinaboibisaki@gmail.com', '7b9eb5f242627814a3152bb3b617226e1d8eff9f', '3cb200191ad8e0d3b644dafafb3fc476f096dd40', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-05 18:14:29', '2020-01-05 18:14:29', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-05 17:14:29'),
(359, 'Ekikere9', 'ekikereakpan5@gmail.com', '27a8ecfb59f0f90e8de41504ad303db116a8e787', '1c9b450aaad3add504a6efbc19620812cb9e1e08', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-07 13:41:10', '2020-01-07 13:41:10', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-07 12:41:10'),
(360, 'Jesse Cochran', 'cochranizer.cryptext@gmail.com', '05afa997f73f0fa87edb79c4d6257cb3cb6a77e7', '1ea038b52b9e45301433077674e05389aa9ef8ee', '5e171286c75f1.jpeg', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, '5e17129d9a9b7.jpeg', 0, '2020-01-09 12:45:11', '2020-01-09 12:45:11', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-09 11:45:11'),
(361, 'emmafresh', 'nwahiriemmanuel30@gmail.com', 'a7fbef9da7d379a55e078fa2c1d81bd7ef3eeedb', 'ce79780bd4a2e75d3af45907dae06da0e1fcb209', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-11 18:13:49', '2020-01-11 18:13:49', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-11 17:13:49'),
(362, 'johnnwanze', 'eaglecement4me@gmail.com', '88d6c17bbef50a40f99563b148b7b0bf90c9e1d1', '7c260b4841681e661a95c9574ab28cafe1fd9c83', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-12 14:15:33', '2020-01-12 14:15:33', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-12 13:15:33'),
(363, 'jaman1000', 'jizzyjayvl@gmail.com', '8d57b5fd0101f056c221a6624dbb7623c524376d', 'b6658103abdc993ccb306b74f68c3d2ae142cc16', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-12 16:32:32', '2020-01-12 16:32:32', 0, 0, 'SVRiZjhyWWVyU0ZoZktaeGN1VDFJYmdlN1daWUkxeEp4aVI2MU8wU1VQNzRyUlF4akVpd3c2cHNtUjY4T1VRajdGVXJzbCs0RktvYzFsNkU0V3NweUtJRndnOG5qWmhUdUdMQ2xEL3ZGMFU9Ojp8rfWgACf7B4uvxEtTI9nS', 'TEJOL3BRZkI2SHhYWHFzTVFES1J6QTRFMUhGa1g2VjEwSkJNM294UFZiVzM3ZFN5L09CdUpTVjRLUjZJMFZxemZaYVZWUEN0ZWVQckl5MDVQdzJxenpRY0dwVjB4V3lnbW9EUTN5VXJWdEk9OjorK9cTtQsINT7P3r0zfLNy', 'QzhxMXp2NEVLWS9uRlMvWGRPZ0MrbTJ6ZjR4VkxRbnlIeXdGOU85THdIWjhwTlVSSldGYW4vQTl6SW1QOHlGNTo6pFkqBcqaX3mKNsXM2hz2BQ==', 'regular', '2020-01-12 15:32:32'),
(364, 'jason2000', 'jamanogada@gmail.com', '8d57b5fd0101f056c221a6624dbb7623c524376d', '19111acb4f04847aa6d00fdf7e5bc14c6f095cb7', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-12 18:21:50', '2020-01-12 18:21:50', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-12 17:21:50'),
(365, 'Diegostorms', 'diegostorms456@gmail.com', 'c0925e82ef5e6ffb3c5089c62b03b4ee43f41b1f', '5ba883f5fbec6d68ff0a776e307318bd2fa38e4f', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-13 08:47:50', '2020-01-13 08:47:50', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-13 07:47:50'),
(366, 'Bankjbliss', 'Bankjbliss@gmail.com', 'a848c52fc808710e34e0179a221e4c302b6771e9', '8901be30bd5a5a575dc45dd03a608980e5b530ed', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-13 11:34:33', '2020-01-13 11:34:33', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-13 10:34:33'),
(367, 'Fidelis', 'fastgaamz@gmail.com', 'a9fa02898537a8372bbf40cbb29faef538e3187f', '359ab1d6d22f15e0becab992bd6805eb932667fd', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-14 07:30:53', '2020-01-14 07:30:53', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-14 06:30:53'),
(368, 'Nicholas', 'enicholas740@gmail.com', '587cf02b2e786832a7abc66033e64ea4a131d9cf', '1659814fcd2a43cce2f80051c6d76e6fc643101e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-14 20:22:56', '2020-01-14 20:22:56', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-14 19:22:56'),
(369, 'Chro ni cle', 'Jeremiahnzie@gmail.com', '0b4f6b4bff2e3325e14c9422f39b063980a5a9ce', '3cd1b98a95e3eaead219f4048c2f33dbdbb23b7d', '5e38e8f208daf.jpeg', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-14 21:19:19', '2020-01-14 21:19:19', 0, 0, 'RjYxV0ZUcWM1Y0pMUFFDWEZKZ3ArOGdudmYrUTJuTWlZcjU4YUErd1lOU3poUHVoY1lUczQrcEV2QnN1MzFCV2VSMkpBbzZ4VlRqNXZmVlBnTHovaVBEQzZJcEpKYzF2SWRqVFRDc2hpZDM3U1FkcGFnTTdzRFBTbUFvYW40TEs6OsJ8666uGOFRGqz5wn3BpvM=', 'QXQzUzIvekNZWXBZbGw4Y0VwdytGMmpEM0FYTUdxaEZ5QTdQbHVmWnkyYlQ0MU05dWpKVlpwaVZiOEhsRGJJTEJlZC9QZlc4UzI1L3JYNFJhNTZjMDJaOTAwdDNjbHZUZEFxaWIzcTZQSzg9OjqXVvaZNuT4bZ4WiW3lOJbZ', 'K1ltRzhjNWtud3lxMnUxN0g3TTFwL1ovaDF2dDM3ZThPbVZUOWhjNENEYkNkYldxZEd3aGV5Vk1oRVFhYlFTTjo6X3xE1Bqa6XglPdKKO9Daow==', 'regular', '2020-01-14 20:19:19'),
(370, 'brahomovitch', 'brahomovitch@yahoo.fr', 'dff89f7bea43e690b3ffae0dbd93af8920b4e6fa', 'cf436953564f919431b44334d1dc070043751a76', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-17 09:04:53', '2020-01-17 09:04:53', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-17 08:04:53'),
(371, 'Precious146', 'Preciousemeka146@gmail.com', 'cf4daa5f45b10efc825a1b3d143dae8d3ff5d3f2', '4d98aac86e7107fd0b110f364594ff198a970df1', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-18 15:33:51', '2020-01-18 15:33:51', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-18 14:33:51'),
(372, 'dimz', 'its_dimz@yahoo.com', 'd5811f4628187ac6ad7fa9db9690504e8fb100c0', '7961c386710098c1a7e7dbab25b67e5cae769b2e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-18 23:24:43', '2020-01-18 23:24:43', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-18 22:24:43'),
(373, 'Casmir', 'Okwaraobinna50@gmail.com', '26f1dc3ca0ddae1ad87783f022920c1b3cb088a4', '6c8251c512dddf43d22862012ce1a3818a7a7af5', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-19 14:50:40', '2020-01-19 14:50:40', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-19 13:50:40'),
(374, 'kellyrobinson', 'tariuwaezekiel@yahoo.com', '8227cd9b29349ff04d3a9a549ab7b131938a6db0', '8dff8c74883e136857ac388e469026d622a9bc96', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-21 19:57:01', '2020-01-21 19:57:01', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-21 18:57:01'),
(375, 'wilsonchilboy', 'wilsonchilboy@gmail.com', '31b306f6d9ee54ee2e39a884f72d586874b45ec4', 'b67396caa8325170cafaa5aad804272555262228', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-22 09:23:04', '2020-01-22 09:23:04', 0, 0, 'SXU5MTltb0ZFWHFDY0NkZE5aZU94Y0RJV3FtYVNvNHVNd3ZMc2NiOWRORVFGbmFOWW5Sejc4QVoxdkdkSGVFdEIwVWhIamtidVBlNjFpUXF2N3dOSVZhWC84bVl0ci9aOTdOSmZQSEwwdTg9OjqwUYkb7ET5qDAFRKOZeGNh', 'SDVmMDhSbHRvRHNjNkp3Sit5b01wV1hKMUY2WGRnVk1Nd1JzblNMYTJ5Ulgxc1lUbEwzTU9xK0ZXTFJzZWlWQjlyRVlPSDF1MDhkUmwybnFXcDY5VGVxWnYvQXg4SnZ1dUtReENVWTR0UVk9OjqYQZtFD+13N8OSHhIPs570', 'WFZQeVdJV09mSk10Q3JBMjRHUEFqTzZQZTlEQi9kNVJLSkxZc0hxdzRTOHVSMkcyYndzckNydW4rQXlDRFE2ajo6R+o6yLiKCxOaMj+DqZJZXQ==', 'regular', '2020-01-22 08:23:04'),
(376, 'Apoloman2003', 'Apoloman2003@yahoo.com', '0e58b419516a2ffecd7415e44c903cd3013c6479', 'f339e0d7a25505278c152c2cc6e51ed2731913d4', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-25 08:53:31', '2020-01-25 08:53:31', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-25 07:53:31'),
(377, 'okereke001', 'okpolistic@yahoo.com', 'c3738f557808022b699b8091c8a9cf4dc681009c', '5fd6138aed4fef500a8af6a75b6890f80560ae9d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-25 14:15:02', '2020-01-25 14:15:02', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-25 13:15:02'),
(378, 'Chidera', 'Christopherhenry899@gmail.com', '7b5a6db9ff3c59964591cef26f27f939349c5cda', '5185ced5f85ecce0fd76ae151a285960ac21b43d', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-27 10:40:38', '2020-01-27 10:40:38', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-27 09:40:38'),
(379, 'Nwatan', 'thankgodmahakwe88@gmail.com', 'd861fe8c843dcdd4bbcd8c745e07e09c8810c827', '3bc32f19ee80b14b5bd576c2dc88576432a6f06e', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-28 00:52:28', '2020-01-28 00:52:28', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-27 23:52:28'),
(380, 'Samibube', 'modish3400@gmail.com', '4a07ee6313f32b76cc13f0831ee3082015951eb3', 'ee033ca544be179ae699b31ac02e7f4752950323', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-28 12:30:03', '2020-01-28 12:30:03', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-28 11:30:03');
INSERT INTO `user` (`id`, `user_id`, `user_code`, `password`, `user_email_code`, `user_img`, `earnings`, `power`, `about`, `banner`, `is_active`, `create_at`, `update_at`, `has_community`, `is_mod`, `mSlug`, `kSlug`, `pSlug`, `membership_type`, `membership_date`) VALUES
(381, 'Rafsank', 'rafsanktiwayne@gmail.com', 'c2df879d3296645067f7d498117b1d593be80464', 'b3dcd009e65287bc69c3b1d819803c49859c3bb5', 'user_default', '119.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-28 13:50:24', '2020-01-28 13:50:24', 0, 0, 'ck14U1NiMG5hZmlRZnNoZSs0dlg2Q3VaSU8vVkFhU2FreUxxaS9OTFhRcDJjeG1Ydk9WR1pNZDl5VWhlaWE3NmluNkVNa2JqTzhLVkZhNkJLQktjamN4Tk1SbnBoNVNHdnJPUERnZTA4SWM9Ojo4D+8jm3Mq0V26W9v0uF/H', 'blNyQUg3NWVWNnRHUlN0U0poK3M3NTRLVi9qbzdBcUUrOTUycnVJeDJtUFBCMHJLNlUybDU0LytDQnBENnliK0xJYVQzZzIwMitNTXJFNFdoVDVxLzNEbFo4WElRZEUzbVZFWmdqanpZQlE9Ojoh8QTxhbIjQGEWUwmHQmqb', 'V0s4Z2RoMCs4WDRxZ0dRbFM3T2tIZWVWZmpFQm9oTEMwUWtEcnoydksyTy9VMXJ3ckxrTElqVUc2SGY2VllZTTo6PxO+MQxTMBENpuzm7LhrsQ==', 'regular', '2020-01-28 12:50:24'),
(382, 'JoJo', 'wellshenry755@gmail.com', '17e7671c5770db295294032ee1e671a9979aaedd', '8b2858a573da00695568de91ae2540d251d4fc1a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-28 14:40:29', '2020-01-28 14:40:29', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-28 13:40:29'),
(383, 'Mhan', 'enterherefindme@gmail.com', 'a9749253c369d0c8855999e9df1e54ffb9cb0e5f', 'c3f00206c72f1d5919238dca7fcbd91129f16199', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-28 15:10:27', '2020-01-28 15:10:27', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-28 14:10:27'),
(384, 'Turner', 'sydneycharles617@gmail.com', 'c95259de1fd719814daef8f1dc4bd64f9d885ff0', '476b5280c4b2e74bc9d97590077d3ec43529189b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-28 22:09:43', '2020-01-28 22:09:43', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-28 21:09:43'),
(385, 'buchibanks', 'buchibanks@gmail.com', 'a543742a121a6b72d021ac7e0220016c5712fa65', 'd7782920f8c12bded3af2f9b03bd21b78874c245', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-01-31 19:24:49', '2020-01-31 19:24:49', 0, 0, NULL, NULL, NULL, 'regular', '2020-01-31 18:24:49'),
(386, 'presh', 'Okoroprecious4@gmail.com', '6aa73d7b3c7f995ccdebeae96573e76728fb0aef', '2f097ba30545ff3bc4814a7d2d083b8a2b1227b5', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-02-01 09:22:17', '2020-02-01 09:22:17', 0, 0, NULL, NULL, NULL, 'regular', '2020-02-01 08:22:17'),
(387, 'Francse', 'francodoski080@gmail.com', '872748e5a0698e9988a4cc289a03fe454bb474a1', 'aae4140229a214923f485d13d4d0fd8ded87d46a', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-02-01 20:24:24', '2020-02-01 20:24:24', 0, 0, 'R0F2YnhYcmh4cE52cFRLa1BoM3VtT09TS2lvNzhIaVZqSitSMk8zNkIvU0h1aitxcW92QTdCVU9QRHVhQ2I2T3IzNHoxdStFUUYwdGVpUnlGQlFxOHVxUnptNThUR1c3U0lUZEZERnRMY1E9OjpzWYKJCVm7j27qIniCtajF', 'QlJDOEMwY284aGpQQ1pPOXU1SDcreVdTOVQ0RGVOamhPWXU1RW1WM25KTkRQNVMxSnJRVk9LaUN1WHc0ckNQclBWRWljcFZNVjVQQjA0ekJCa2VNRFNPWUlaWjFhZHg1TVRtWGc1VkROVGM9OjosOUOq3u5PHBKzKGe5gfjK', 'ekZBZk9CbDFvRjRMR2trWXlWa3JPMitTSGFQcnNJRzNsMjUrSFNSbjdDdHJIV3E1Zk9ndmFma21PSXlVbXZxaDo6e5GotZYflc7VRnjizcHnJw==', 'regular', '2020-02-01 19:24:24'),
(388, 'carljavier', 'arthurugochukwu34@gmail.com', '8df2cf998dcaed9186bb69e7ddd8c1600dde59d0', 'fd1ac7ee8b49676bc8301f3afc0e906f4d661c88', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-02-03 01:39:18', '2020-02-03 01:39:18', 0, 0, NULL, NULL, NULL, 'regular', '2020-02-03 00:39:18'),
(389, 'Daniswealth', 'cosmosdan1970@gmail.com', '1df7ccb6542a4e373c39741ccc565f7abc39f054', 'd6594e50aa3f666a1ad6b2d4e0a172c54ee76c21', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-02-07 16:04:31', '2020-02-07 16:04:31', 0, 0, NULL, NULL, NULL, 'regular', '2020-02-07 15:04:31'),
(390, 'Godknows', 'Angelwhyte60@gmail.com', '4a830f9da27113ef3a0e6c5329daf32b9478b59c', '52c885bf90a4a4d191ab5a3cadb4d9343789880b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-02-12 16:22:12', '2020-02-12 16:22:12', 0, 0, NULL, NULL, NULL, 'regular', '2020-02-12 15:22:12'),
(391, 'CELESTINE', 'celenwabs@gmail.com', 'b151dccd0f9ff41dedef3f0335fd2716f6b6d2fa', 'b1c13377506e6293f4131258ad2b545d48c4df0b', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-02-13 14:39:06', '2020-02-13 14:39:06', 0, 0, NULL, NULL, NULL, 'regular', '2020-02-13 13:39:06'),
(401, 'test', 'test@test.com', '0e03c6205ea671d7d41a0e3aabfc9d15d97e5ed3', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'user_default', '0.000000000000000000000000000000', '0.000000000000000000000000000000', NULL, NULL, 0, '2020-03-12 13:42:05', '2020-03-12 13:42:05', 0, 0, NULL, NULL, NULL, 'regular', '2020-03-12 13:42:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `espals_block_user`
--
ALTER TABLE `espals_block_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espals_community_category`
--
ALTER TABLE `espals_community_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espals_community_comment`
--
ALTER TABLE `espals_community_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espals_community_images`
--
ALTER TABLE `espals_community_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espals_community_post`
--
ALTER TABLE `espals_community_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espals_community_vote`
--
ALTER TABLE `espals_community_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espals_follow_system`
--
ALTER TABLE `espals_follow_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espals_joined_community`
--
ALTER TABLE `espals_joined_community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espals_notifications`
--
ALTER TABLE `espals_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espals_transaction`
--
ALTER TABLE `espals_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espals_withdrawal`
--
ALTER TABLE `espals_withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espal_reward_point`
--
ALTER TABLE `espal_reward_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refer`
--
ALTER TABLE `refer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `espals_block_user`
--
ALTER TABLE `espals_block_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espals_community_category`
--
ALTER TABLE `espals_community_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espals_community_comment`
--
ALTER TABLE `espals_community_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espals_community_images`
--
ALTER TABLE `espals_community_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espals_community_post`
--
ALTER TABLE `espals_community_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espals_community_vote`
--
ALTER TABLE `espals_community_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espals_follow_system`
--
ALTER TABLE `espals_follow_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espals_joined_community`
--
ALTER TABLE `espals_joined_community`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espals_notifications`
--
ALTER TABLE `espals_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espals_transaction`
--
ALTER TABLE `espals_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espals_withdrawal`
--
ALTER TABLE `espals_withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espal_reward_point`
--
ALTER TABLE `espal_reward_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refer`
--
ALTER TABLE `refer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
