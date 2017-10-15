/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : zanproject

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-08-14 17:18:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pft_user_access_token
-- ----------------------------
DROP TABLE IF EXISTS `pft_user_access_token`;
CREATE TABLE `pft_user_access_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'access_token 存储表',
  `scopes` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `expiry_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `redirect_url` text COLLATE utf8_bin,
  `is_enable` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for pft_user_client
-- ----------------------------
DROP TABLE IF EXISTS `pft_user_client`;
CREATE TABLE `pft_user_client` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `redirect_url` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for pft_user_refresh_token
-- ----------------------------
DROP TABLE IF EXISTS `pft_user_refresh_token`;
CREATE TABLE `pft_user_refresh_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) COLLATE utf8_bin NOT NULL,
  `access_token` varchar(225) COLLATE utf8_bin NOT NULL,
  `expiry_time` datetime NOT NULL,
  `is_enable` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
