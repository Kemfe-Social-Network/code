-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 07:53 PM
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
