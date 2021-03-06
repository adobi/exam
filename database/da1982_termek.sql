/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : uniweb_termek

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2010-05-25 11:51:15
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `da1982_product`
-- ----------------------------
DROP TABLE IF EXISTS `da1982_product`;
CREATE TABLE `da1982_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `list_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `idx` (`name`,`list_price`,`price`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
