/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : allowing

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2016-09-08 14:47:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for model
-- ----------------------------
DROP TABLE IF EXISTS `model`;
CREATE TABLE `model` (
  `name` varchar(30) NOT NULL COMMENT '模型英文名称',
  `name_zh` varchar(30) NOT NULL COMMENT '模型中文名称',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for model_field
-- ----------------------------
DROP TABLE IF EXISTS `model_field`;
CREATE TABLE `model_field` (
  `name` varchar(30) NOT NULL COMMENT '字段名称',
  `name_zh` varchar(30) NOT NULL COMMENT '字段名称中文',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `model_name` varchar(30) NOT NULL COMMENT '所属模型',
  PRIMARY KEY (`name`),
  KEY `model_name` (`model_name`),
  CONSTRAINT `model_field_ibfk_1` FOREIGN KEY (`model_name`) REFERENCES `model` (`name`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for model_nav
-- ----------------------------
DROP TABLE IF EXISTS `model_nav`;
CREATE TABLE `model_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(30) NOT NULL COMMENT '分类名称',
  `type` enum('cat','url','single_page') NOT NULL DEFAULT 'cat' COMMENT '类型',
  `content` text NOT NULL COMMENT '如果是单页或链接，就写到这里',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for model_record
-- ----------------------------
DROP TABLE IF EXISTS `model_record`;
CREATE TABLE `model_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `model_name` varchar(30) NOT NULL COMMENT '所属模型',
  `subject` varchar(255) NOT NULL COMMENT '主题',
  `created_at` int(10) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(10) unsigned NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `model_name` (`model_name`),
  CONSTRAINT `model_record_ibfk_1` FOREIGN KEY (`model_name`) REFERENCES `model` (`name`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for model_record_ext
-- ----------------------------
DROP TABLE IF EXISTS `model_record_ext`;
CREATE TABLE `model_record_ext` (
  `model_record_id` int(10) unsigned NOT NULL COMMENT '所属记录',
  `field` varchar(30) NOT NULL COMMENT '字段名称',
  `value` text NOT NULL COMMENT '值',
  PRIMARY KEY (`model_record_id`),
  KEY `field` (`field`),
  CONSTRAINT `model_record_ext_ibfk_1` FOREIGN KEY (`model_record_id`) REFERENCES `model_record` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `model_record_ext_ibfk_2` FOREIGN KEY (`field`) REFERENCES `model_field` (`name`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
