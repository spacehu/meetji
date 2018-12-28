/*
Navicat MySQL Data Transfer

Source Server         : space_ubuntu16
Source Server Version : 50720
Source Host           : 192.168.226.129:3306
Source Database       : tiger_local

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2017-11-07 17:29:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mrhu_access_log
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_access_log`;
CREATE TABLE "mrhu_access_log" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  "ip" varchar(255) NOT NULL COMMENT 'ip',
  "machine" varchar(255) NOT NULL COMMENT '机器',
  "browser" varchar(255) NOT NULL COMMENT '浏览器',
  "user_id" varchar(255) NOT NULL COMMENT '用户id',
  "action" varchar(255) NOT NULL COMMENT '模块',
  "model" varchar(255) NOT NULL COMMENT '方法',
  "page" varchar(255) NOT NULL COMMENT '页面',
  "page_url" varchar(255) NOT NULL COMMENT '页面url',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=1418 DEFAULT CHARSET=utf8 COMMENT='访问记录表';

-- ----------------------------
-- Records of mrhu_access_log
-- ----------------------------
INSERT INTO `mrhu_access_log` VALUES ('6', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-20 15:20:10');
INSERT INTO `mrhu_access_log` VALUES ('7', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-20 17:51:14');
INSERT INTO `mrhu_access_log` VALUES ('8', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-20 17:51:47');
INSERT INTO `mrhu_access_log` VALUES ('9', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-20 17:51:48');
INSERT INTO `mrhu_access_log` VALUES ('10', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-20 17:51:48');
INSERT INTO `mrhu_access_log` VALUES ('11', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-20 17:51:48');
INSERT INTO `mrhu_access_log` VALUES ('12', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:40:31');
INSERT INTO `mrhu_access_log` VALUES ('13', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:40:58');
INSERT INTO `mrhu_access_log` VALUES ('14', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:41:49');
INSERT INTO `mrhu_access_log` VALUES ('15', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:41:57');
INSERT INTO `mrhu_access_log` VALUES ('16', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:42:33');
INSERT INTO `mrhu_access_log` VALUES ('17', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:43:24');
INSERT INTO `mrhu_access_log` VALUES ('18', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:43:27');
INSERT INTO `mrhu_access_log` VALUES ('19', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:43:28');
INSERT INTO `mrhu_access_log` VALUES ('20', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:43:28');
INSERT INTO `mrhu_access_log` VALUES ('21', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:43:28');
INSERT INTO `mrhu_access_log` VALUES ('22', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:43:28');
INSERT INTO `mrhu_access_log` VALUES ('23', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:43:32');
INSERT INTO `mrhu_access_log` VALUES ('24', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:44:18');
INSERT INTO `mrhu_access_log` VALUES ('25', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:44:19');
INSERT INTO `mrhu_access_log` VALUES ('26', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:44:19');
INSERT INTO `mrhu_access_log` VALUES ('27', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:44:19');
INSERT INTO `mrhu_access_log` VALUES ('28', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:44:20');
INSERT INTO `mrhu_access_log` VALUES ('29', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:44:20');
INSERT INTO `mrhu_access_log` VALUES ('30', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:44:20');
INSERT INTO `mrhu_access_log` VALUES ('31', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:45:03');
INSERT INTO `mrhu_access_log` VALUES ('32', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:45:39');
INSERT INTO `mrhu_access_log` VALUES ('33', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:45:47');
INSERT INTO `mrhu_access_log` VALUES ('34', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:45:47');
INSERT INTO `mrhu_access_log` VALUES ('35', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:45:47');
INSERT INTO `mrhu_access_log` VALUES ('36', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:45:47');
INSERT INTO `mrhu_access_log` VALUES ('37', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:46:17');
INSERT INTO `mrhu_access_log` VALUES ('38', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:46:27');
INSERT INTO `mrhu_access_log` VALUES ('39', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:47:04');
INSERT INTO `mrhu_access_log` VALUES ('40', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:47:25');
INSERT INTO `mrhu_access_log` VALUES ('41', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:48:00');
INSERT INTO `mrhu_access_log` VALUES ('42', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:48:00');
INSERT INTO `mrhu_access_log` VALUES ('43', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:48:00');
INSERT INTO `mrhu_access_log` VALUES ('44', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-10-currentPage-2-pagesize-4.htm', '2017-10-23 14:48:01');
INSERT INTO `mrhu_access_log` VALUES ('45', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice.htm', '2017-10-23 14:48:05');
INSERT INTO `mrhu_access_log` VALUES ('46', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 14:48:07');
INSERT INTO `mrhu_access_log` VALUES ('47', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 14:48:43');
INSERT INTO `mrhu_access_log` VALUES ('48', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 14:48:50');
INSERT INTO `mrhu_access_log` VALUES ('49', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2000.htm', '2017-10-23 14:48:52');
INSERT INTO `mrhu_access_log` VALUES ('50', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 14:48:54');
INSERT INTO `mrhu_access_log` VALUES ('51', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-1999.htm', '2017-10-23 14:48:55');
INSERT INTO `mrhu_access_log` VALUES ('52', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-1999.htm', '2017-10-23 14:49:39');
INSERT INTO `mrhu_access_log` VALUES ('53', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 14:49:41');
INSERT INTO `mrhu_access_log` VALUES ('54', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 14:49:44');
INSERT INTO `mrhu_access_log` VALUES ('55', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:49:46');
INSERT INTO `mrhu_access_log` VALUES ('56', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:51:30');
INSERT INTO `mrhu_access_log` VALUES ('57', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:51:57');
INSERT INTO `mrhu_access_log` VALUES ('58', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:52:05');
INSERT INTO `mrhu_access_log` VALUES ('59', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:52:06');
INSERT INTO `mrhu_access_log` VALUES ('60', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:52:06');
INSERT INTO `mrhu_access_log` VALUES ('61', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:52:06');
INSERT INTO `mrhu_access_log` VALUES ('62', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:52:06');
INSERT INTO `mrhu_access_log` VALUES ('63', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:52:18');
INSERT INTO `mrhu_access_log` VALUES ('64', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:53:39');
INSERT INTO `mrhu_access_log` VALUES ('65', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:54:32');
INSERT INTO `mrhu_access_log` VALUES ('66', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:54:33');
INSERT INTO `mrhu_access_log` VALUES ('67', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:54:33');
INSERT INTO `mrhu_access_log` VALUES ('68', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 14:54:33');
INSERT INTO `mrhu_access_log` VALUES ('69', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 14:54:42');
INSERT INTO `mrhu_access_log` VALUES ('70', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 14:55:25');
INSERT INTO `mrhu_access_log` VALUES ('71', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:09:52');
INSERT INTO `mrhu_access_log` VALUES ('72', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:10:06');
INSERT INTO `mrhu_access_log` VALUES ('73', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:10:38');
INSERT INTO `mrhu_access_log` VALUES ('74', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:12:03');
INSERT INTO `mrhu_access_log` VALUES ('75', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:12:57');
INSERT INTO `mrhu_access_log` VALUES ('76', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:14:02');
INSERT INTO `mrhu_access_log` VALUES ('77', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:14:26');
INSERT INTO `mrhu_access_log` VALUES ('78', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:14:49');
INSERT INTO `mrhu_access_log` VALUES ('79', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:16:25');
INSERT INTO `mrhu_access_log` VALUES ('80', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:16:59');
INSERT INTO `mrhu_access_log` VALUES ('81', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:17:11');
INSERT INTO `mrhu_access_log` VALUES ('82', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:17:18');
INSERT INTO `mrhu_access_log` VALUES ('83', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:19:04');
INSERT INTO `mrhu_access_log` VALUES ('84', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:19:06');
INSERT INTO `mrhu_access_log` VALUES ('85', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:19:14');
INSERT INTO `mrhu_access_log` VALUES ('86', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:21:05');
INSERT INTO `mrhu_access_log` VALUES ('87', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:22:21');
INSERT INTO `mrhu_access_log` VALUES ('88', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:22:49');
INSERT INTO `mrhu_access_log` VALUES ('89', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:22:49');
INSERT INTO `mrhu_access_log` VALUES ('90', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:22:49');
INSERT INTO `mrhu_access_log` VALUES ('91', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:22:50');
INSERT INTO `mrhu_access_log` VALUES ('92', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:22:52');
INSERT INTO `mrhu_access_log` VALUES ('93', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:22:54');
INSERT INTO `mrhu_access_log` VALUES ('94', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:26:44');
INSERT INTO `mrhu_access_log` VALUES ('95', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:28:44');
INSERT INTO `mrhu_access_log` VALUES ('96', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:29:00');
INSERT INTO `mrhu_access_log` VALUES ('97', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:29:30');
INSERT INTO `mrhu_access_log` VALUES ('98', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:32:31');
INSERT INTO `mrhu_access_log` VALUES ('99', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:33:15');
INSERT INTO `mrhu_access_log` VALUES ('100', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:34:21');
INSERT INTO `mrhu_access_log` VALUES ('101', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:34:22');
INSERT INTO `mrhu_access_log` VALUES ('102', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:34:22');
INSERT INTO `mrhu_access_log` VALUES ('103', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:34:22');
INSERT INTO `mrhu_access_log` VALUES ('104', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:38:47');
INSERT INTO `mrhu_access_log` VALUES ('105', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:47:52');
INSERT INTO `mrhu_access_log` VALUES ('106', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:49:19');
INSERT INTO `mrhu_access_log` VALUES ('107', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:49:42');
INSERT INTO `mrhu_access_log` VALUES ('108', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:49:56');
INSERT INTO `mrhu_access_log` VALUES ('109', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:50:09');
INSERT INTO `mrhu_access_log` VALUES ('110', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:50:10');
INSERT INTO `mrhu_access_log` VALUES ('111', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:50:10');
INSERT INTO `mrhu_access_log` VALUES ('112', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:50:10');
INSERT INTO `mrhu_access_log` VALUES ('113', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:50:10');
INSERT INTO `mrhu_access_log` VALUES ('114', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:50:24');
INSERT INTO `mrhu_access_log` VALUES ('115', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:50:24');
INSERT INTO `mrhu_access_log` VALUES ('116', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:50:25');
INSERT INTO `mrhu_access_log` VALUES ('117', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:50:25');
INSERT INTO `mrhu_access_log` VALUES ('118', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:50:26');
INSERT INTO `mrhu_access_log` VALUES ('119', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:50:47');
INSERT INTO `mrhu_access_log` VALUES ('120', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:50:57');
INSERT INTO `mrhu_access_log` VALUES ('121', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:52:08');
INSERT INTO `mrhu_access_log` VALUES ('122', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:52:09');
INSERT INTO `mrhu_access_log` VALUES ('123', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:52:09');
INSERT INTO `mrhu_access_log` VALUES ('124', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:52:09');
INSERT INTO `mrhu_access_log` VALUES ('125', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:52:10');
INSERT INTO `mrhu_access_log` VALUES ('126', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:52:10');
INSERT INTO `mrhu_access_log` VALUES ('127', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 15:54:40');
INSERT INTO `mrhu_access_log` VALUES ('128', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 15:54:41');
INSERT INTO `mrhu_access_log` VALUES ('129', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2019.htm', '2017-10-23 15:54:43');
INSERT INTO `mrhu_access_log` VALUES ('130', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2019-month-8.htm', '2017-10-23 15:54:46');
INSERT INTO `mrhu_access_log` VALUES ('131', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2019.htm', '2017-10-23 15:54:49');
INSERT INTO `mrhu_access_log` VALUES ('132', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2019.htm', '2017-10-23 15:55:41');
INSERT INTO `mrhu_access_log` VALUES ('133', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2019.htm', '2017-10-23 15:56:12');
INSERT INTO `mrhu_access_log` VALUES ('134', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2019.htm', '2017-10-23 15:56:12');
INSERT INTO `mrhu_access_log` VALUES ('135', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2019.htm', '2017-10-23 15:56:13');
INSERT INTO `mrhu_access_log` VALUES ('136', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2019.htm', '2017-10-23 15:56:13');
INSERT INTO `mrhu_access_log` VALUES ('137', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2019.htm', '2017-10-23 15:56:13');
INSERT INTO `mrhu_access_log` VALUES ('138', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2019.htm', '2017-10-23 15:56:58');
INSERT INTO `mrhu_access_log` VALUES ('139', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2019-month-8.htm', '2017-10-23 15:57:01');
INSERT INTO `mrhu_access_log` VALUES ('140', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:57:04');
INSERT INTO `mrhu_access_log` VALUES ('141', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:57:38');
INSERT INTO `mrhu_access_log` VALUES ('142', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:57:38');
INSERT INTO `mrhu_access_log` VALUES ('143', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:57:39');
INSERT INTO `mrhu_access_log` VALUES ('144', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:57:43');
INSERT INTO `mrhu_access_log` VALUES ('145', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:57:49');
INSERT INTO `mrhu_access_log` VALUES ('146', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:58:43');
INSERT INTO `mrhu_access_log` VALUES ('147', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:58:43');
INSERT INTO `mrhu_access_log` VALUES ('148', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:58:43');
INSERT INTO `mrhu_access_log` VALUES ('149', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:58:43');
INSERT INTO `mrhu_access_log` VALUES ('150', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:58:46');
INSERT INTO `mrhu_access_log` VALUES ('151', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:58:46');
INSERT INTO `mrhu_access_log` VALUES ('152', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:58:46');
INSERT INTO `mrhu_access_log` VALUES ('153', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:58:46');
INSERT INTO `mrhu_access_log` VALUES ('154', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 15:59:57');
INSERT INTO `mrhu_access_log` VALUES ('155', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:01:19');
INSERT INTO `mrhu_access_log` VALUES ('156', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:01:30');
INSERT INTO `mrhu_access_log` VALUES ('157', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:01:34');
INSERT INTO `mrhu_access_log` VALUES ('158', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:01:34');
INSERT INTO `mrhu_access_log` VALUES ('159', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:01:34');
INSERT INTO `mrhu_access_log` VALUES ('160', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:01:50');
INSERT INTO `mrhu_access_log` VALUES ('161', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:02:01');
INSERT INTO `mrhu_access_log` VALUES ('162', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:03:12');
INSERT INTO `mrhu_access_log` VALUES ('163', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:03:41');
INSERT INTO `mrhu_access_log` VALUES ('164', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:04:10');
INSERT INTO `mrhu_access_log` VALUES ('165', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:04:16');
INSERT INTO `mrhu_access_log` VALUES ('166', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:04:26');
INSERT INTO `mrhu_access_log` VALUES ('167', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:04:30');
INSERT INTO `mrhu_access_log` VALUES ('168', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:04:39');
INSERT INTO `mrhu_access_log` VALUES ('169', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:05:43');
INSERT INTO `mrhu_access_log` VALUES ('170', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:06:13');
INSERT INTO `mrhu_access_log` VALUES ('171', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:06:46');
INSERT INTO `mrhu_access_log` VALUES ('172', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:07:09');
INSERT INTO `mrhu_access_log` VALUES ('173', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:08:08');
INSERT INTO `mrhu_access_log` VALUES ('174', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:11:11');
INSERT INTO `mrhu_access_log` VALUES ('175', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:11:11');
INSERT INTO `mrhu_access_log` VALUES ('176', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:11:11');
INSERT INTO `mrhu_access_log` VALUES ('177', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:11:11');
INSERT INTO `mrhu_access_log` VALUES ('178', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:11:48');
INSERT INTO `mrhu_access_log` VALUES ('179', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:12:18');
INSERT INTO `mrhu_access_log` VALUES ('180', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:13:24');
INSERT INTO `mrhu_access_log` VALUES ('181', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:14:16');
INSERT INTO `mrhu_access_log` VALUES ('182', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:14:17');
INSERT INTO `mrhu_access_log` VALUES ('183', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:14:17');
INSERT INTO `mrhu_access_log` VALUES ('184', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:14:17');
INSERT INTO `mrhu_access_log` VALUES ('185', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:14:45');
INSERT INTO `mrhu_access_log` VALUES ('186', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:14:45');
INSERT INTO `mrhu_access_log` VALUES ('187', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:14:45');
INSERT INTO `mrhu_access_log` VALUES ('188', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:14:46');
INSERT INTO `mrhu_access_log` VALUES ('189', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:15:45');
INSERT INTO `mrhu_access_log` VALUES ('190', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:15:46');
INSERT INTO `mrhu_access_log` VALUES ('191', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:15:46');
INSERT INTO `mrhu_access_log` VALUES ('192', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-10-23 16:15:46');
INSERT INTO `mrhu_access_log` VALUES ('193', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 16:15:56');
INSERT INTO `mrhu_access_log` VALUES ('194', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 16:15:58');
INSERT INTO `mrhu_access_log` VALUES ('195', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 16:16:03');
INSERT INTO `mrhu_access_log` VALUES ('196', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album.htm', '2017-10-23 16:16:08');
INSERT INTO `mrhu_access_log` VALUES ('197', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-1-pagesize-9.htm', '2017-10-23 16:16:16');
INSERT INTO `mrhu_access_log` VALUES ('198', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album.htm', '2017-10-23 16:16:18');
INSERT INTO `mrhu_access_log` VALUES ('199', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice.htm', '2017-10-23 16:16:20');
INSERT INTO `mrhu_access_log` VALUES ('200', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice.htm', '2017-10-23 16:20:48');
INSERT INTO `mrhu_access_log` VALUES ('201', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-notice.htm', '2017-10-23 16:20:51');
INSERT INTO `mrhu_access_log` VALUES ('202', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album.htm', '2017-10-23 16:20:53');
INSERT INTO `mrhu_access_log` VALUES ('203', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-3-pagesize-9.htm', '2017-10-23 16:20:55');
INSERT INTO `mrhu_access_log` VALUES ('204', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-2-pagesize-9.htm', '2017-10-23 16:20:58');
INSERT INTO `mrhu_access_log` VALUES ('205', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-1-pagesize-9.htm', '2017-10-23 16:21:02');
INSERT INTO `mrhu_access_log` VALUES ('206', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-1-pagesize-9.htm', '2017-10-23 16:21:40');
INSERT INTO `mrhu_access_log` VALUES ('207', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-1-pagesize-9.htm', '2017-10-23 16:21:41');
INSERT INTO `mrhu_access_log` VALUES ('208', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-1-pagesize-9.htm', '2017-10-23 16:21:41');
INSERT INTO `mrhu_access_log` VALUES ('209', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-1-pagesize-9.htm', '2017-10-23 16:21:41');
INSERT INTO `mrhu_access_log` VALUES ('210', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-1-pagesize-9.htm', '2017-10-23 16:21:42');
INSERT INTO `mrhu_access_log` VALUES ('211', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-2-pagesize-9.htm', '2017-10-23 16:21:44');
INSERT INTO `mrhu_access_log` VALUES ('212', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-2-pagesize-9.htm', '2017-10-23 16:22:02');
INSERT INTO `mrhu_access_log` VALUES ('213', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-2-pagesize-9.htm', '2017-10-23 16:22:02');
INSERT INTO `mrhu_access_log` VALUES ('214', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-2-pagesize-9.htm', '2017-10-23 16:22:03');
INSERT INTO `mrhu_access_log` VALUES ('215', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-2-pagesize-9.htm', '2017-10-23 16:22:03');
INSERT INTO `mrhu_access_log` VALUES ('216', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album-currentPage-2-pagesize-9.htm', '2017-10-23 16:22:06');
INSERT INTO `mrhu_access_log` VALUES ('217', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album-currentPage-3-pagesize-9.htm', '2017-10-23 16:22:10');
INSERT INTO `mrhu_access_log` VALUES ('218', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-6.htm', '2017-10-23 16:22:45');
INSERT INTO `mrhu_access_log` VALUES ('219', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'index', 'index', 'http://tiger.lc/home-album_music-id-6-currentPage-4-pagesize-4.htm', '2017-10-23 16:36:23');
INSERT INTO `mrhu_access_log` VALUES ('220', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-10-23 16:36:39');
INSERT INTO `mrhu_access_log` VALUES ('221', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-awards.htm', '2017-10-23 16:36:44');
INSERT INTO `mrhu_access_log` VALUES ('222', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album.htm', '2017-10-23 16:36:46');
INSERT INTO `mrhu_access_log` VALUES ('223', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-26.htm', '2017-10-23 16:36:49');
INSERT INTO `mrhu_access_log` VALUES ('224', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-25.htm', '2017-10-23 16:36:51');
INSERT INTO `mrhu_access_log` VALUES ('225', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-25-currentPage-6-pagesize-4.htm', '2017-10-23 16:36:53');
INSERT INTO `mrhu_access_log` VALUES ('226', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-album_music-id-6.htm', '2017-10-23 16:37:06');
INSERT INTO `mrhu_access_log` VALUES ('227', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice.htm', '2017-10-23 16:37:19');
INSERT INTO `mrhu_access_log` VALUES ('228', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice.htm', '2017-10-23 16:37:54');
INSERT INTO `mrhu_access_log` VALUES ('229', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 16:37:56');
INSERT INTO `mrhu_access_log` VALUES ('230', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-23 16:45:43');
INSERT INTO `mrhu_access_log` VALUES ('231', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 16:45:44');
INSERT INTO `mrhu_access_log` VALUES ('232', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 16:47:17');
INSERT INTO `mrhu_access_log` VALUES ('233', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 16:47:38');
INSERT INTO `mrhu_access_log` VALUES ('234', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 16:48:29');
INSERT INTO `mrhu_access_log` VALUES ('235', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 16:49:06');
INSERT INTO `mrhu_access_log` VALUES ('236', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-23 17:03:11');
INSERT INTO `mrhu_access_log` VALUES ('237', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:31:53');
INSERT INTO `mrhu_access_log` VALUES ('238', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:49:51');
INSERT INTO `mrhu_access_log` VALUES ('239', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:56:33');
INSERT INTO `mrhu_access_log` VALUES ('240', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:56:56');
INSERT INTO `mrhu_access_log` VALUES ('241', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:57:54');
INSERT INTO `mrhu_access_log` VALUES ('242', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:57:55');
INSERT INTO `mrhu_access_log` VALUES ('243', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:57:59');
INSERT INTO `mrhu_access_log` VALUES ('244', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:58:17');
INSERT INTO `mrhu_access_log` VALUES ('245', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:59:21');
INSERT INTO `mrhu_access_log` VALUES ('246', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:59:22');
INSERT INTO `mrhu_access_log` VALUES ('247', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:59:22');
INSERT INTO `mrhu_access_log` VALUES ('248', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:59:22');
INSERT INTO `mrhu_access_log` VALUES ('249', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 15:59:46');
INSERT INTO `mrhu_access_log` VALUES ('250', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:05:48');
INSERT INTO `mrhu_access_log` VALUES ('251', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:06:19');
INSERT INTO `mrhu_access_log` VALUES ('252', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:06:33');
INSERT INTO `mrhu_access_log` VALUES ('253', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:06:47');
INSERT INTO `mrhu_access_log` VALUES ('254', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:08:02');
INSERT INTO `mrhu_access_log` VALUES ('255', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:08:24');
INSERT INTO `mrhu_access_log` VALUES ('256', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:08:41');
INSERT INTO `mrhu_access_log` VALUES ('257', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:09:39');
INSERT INTO `mrhu_access_log` VALUES ('258', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:10:19');
INSERT INTO `mrhu_access_log` VALUES ('259', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:10:19');
INSERT INTO `mrhu_access_log` VALUES ('260', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:10:19');
INSERT INTO `mrhu_access_log` VALUES ('261', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:10:34');
INSERT INTO `mrhu_access_log` VALUES ('262', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:10:34');
INSERT INTO `mrhu_access_log` VALUES ('263', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:10:51');
INSERT INTO `mrhu_access_log` VALUES ('264', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:11:19');
INSERT INTO `mrhu_access_log` VALUES ('265', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:12:01');
INSERT INTO `mrhu_access_log` VALUES ('266', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:12:42');
INSERT INTO `mrhu_access_log` VALUES ('267', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:12:50');
INSERT INTO `mrhu_access_log` VALUES ('268', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:12:50');
INSERT INTO `mrhu_access_log` VALUES ('269', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:12:57');
INSERT INTO `mrhu_access_log` VALUES ('270', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:13:22');
INSERT INTO `mrhu_access_log` VALUES ('271', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:13:23');
INSERT INTO `mrhu_access_log` VALUES ('272', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:13:24');
INSERT INTO `mrhu_access_log` VALUES ('273', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:13:24');
INSERT INTO `mrhu_access_log` VALUES ('274', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:13:37');
INSERT INTO `mrhu_access_log` VALUES ('275', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:13:38');
INSERT INTO `mrhu_access_log` VALUES ('276', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:13:38');
INSERT INTO `mrhu_access_log` VALUES ('277', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:13:38');
INSERT INTO `mrhu_access_log` VALUES ('278', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:13:54');
INSERT INTO `mrhu_access_log` VALUES ('279', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:13:55');
INSERT INTO `mrhu_access_log` VALUES ('280', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:13:55');
INSERT INTO `mrhu_access_log` VALUES ('281', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:13:55');
INSERT INTO `mrhu_access_log` VALUES ('282', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:15:23');
INSERT INTO `mrhu_access_log` VALUES ('283', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:15:24');
INSERT INTO `mrhu_access_log` VALUES ('284', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:15:24');
INSERT INTO `mrhu_access_log` VALUES ('285', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:15:24');
INSERT INTO `mrhu_access_log` VALUES ('286', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:16:23');
INSERT INTO `mrhu_access_log` VALUES ('287', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:17:02');
INSERT INTO `mrhu_access_log` VALUES ('288', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:17:28');
INSERT INTO `mrhu_access_log` VALUES ('289', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:24:21');
INSERT INTO `mrhu_access_log` VALUES ('290', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:24:22');
INSERT INTO `mrhu_access_log` VALUES ('291', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:24:23');
INSERT INTO `mrhu_access_log` VALUES ('292', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-10-24 16:25:49');
INSERT INTO `mrhu_access_log` VALUES ('293', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-article.htm', '2017-10-24 16:25:52');
INSERT INTO `mrhu_access_log` VALUES ('294', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-article-currentPage-1-pagesize-4.htm', '2017-10-24 16:25:56');
INSERT INTO `mrhu_access_log` VALUES ('295', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice.htm', '2017-10-24 16:25:59');
INSERT INTO `mrhu_access_log` VALUES ('296', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice.htm', '2017-10-24 16:28:53');
INSERT INTO `mrhu_access_log` VALUES ('297', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice.htm', '2017-10-24 16:29:09');
INSERT INTO `mrhu_access_log` VALUES ('298', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-article.htm', '2017-10-24 16:29:10');
INSERT INTO `mrhu_access_log` VALUES ('299', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice.htm', '2017-10-24 16:30:30');
INSERT INTO `mrhu_access_log` VALUES ('300', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 16:30:31');
INSERT INTO `mrhu_access_log` VALUES ('301', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice.htm', '2017-10-24 16:32:57');
INSERT INTO `mrhu_access_log` VALUES ('302', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 16:32:58');
INSERT INTO `mrhu_access_log` VALUES ('303', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice.htm', '2017-10-24 16:33:00');
INSERT INTO `mrhu_access_log` VALUES ('304', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice.htm', '2017-10-24 16:33:25');
INSERT INTO `mrhu_access_log` VALUES ('305', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice.htm', '2017-10-24 16:33:29');
INSERT INTO `mrhu_access_log` VALUES ('306', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice.htm', '2017-10-24 16:33:30');
INSERT INTO `mrhu_access_log` VALUES ('307', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice.htm', '2017-10-24 16:33:30');
INSERT INTO `mrhu_access_log` VALUES ('308', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice.htm', '2017-10-24 16:33:31');
INSERT INTO `mrhu_access_log` VALUES ('309', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 17:43:13');
INSERT INTO `mrhu_access_log` VALUES ('310', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 17:44:55');
INSERT INTO `mrhu_access_log` VALUES ('311', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 17:45:34');
INSERT INTO `mrhu_access_log` VALUES ('312', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 17:50:49');
INSERT INTO `mrhu_access_log` VALUES ('313', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-24 17:50:54');
INSERT INTO `mrhu_access_log` VALUES ('314', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 17:50:56');
INSERT INTO `mrhu_access_log` VALUES ('315', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:02:39');
INSERT INTO `mrhu_access_log` VALUES ('316', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:03:40');
INSERT INTO `mrhu_access_log` VALUES ('317', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:03:44');
INSERT INTO `mrhu_access_log` VALUES ('318', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:03:58');
INSERT INTO `mrhu_access_log` VALUES ('319', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:04:33');
INSERT INTO `mrhu_access_log` VALUES ('320', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:04:45');
INSERT INTO `mrhu_access_log` VALUES ('321', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:05:09');
INSERT INTO `mrhu_access_log` VALUES ('322', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:32:22');
INSERT INTO `mrhu_access_log` VALUES ('323', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:32:35');
INSERT INTO `mrhu_access_log` VALUES ('324', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:33:59');
INSERT INTO `mrhu_access_log` VALUES ('325', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:34:32');
INSERT INTO `mrhu_access_log` VALUES ('326', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:34:33');
INSERT INTO `mrhu_access_log` VALUES ('327', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:34:33');
INSERT INTO `mrhu_access_log` VALUES ('328', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:47:23');
INSERT INTO `mrhu_access_log` VALUES ('329', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:47:37');
INSERT INTO `mrhu_access_log` VALUES ('330', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:47:38');
INSERT INTO `mrhu_access_log` VALUES ('331', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:47:38');
INSERT INTO `mrhu_access_log` VALUES ('332', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:47:41');
INSERT INTO `mrhu_access_log` VALUES ('333', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:47:41');
INSERT INTO `mrhu_access_log` VALUES ('334', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:47:48');
INSERT INTO `mrhu_access_log` VALUES ('335', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:47:59');
INSERT INTO `mrhu_access_log` VALUES ('336', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:00');
INSERT INTO `mrhu_access_log` VALUES ('337', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:00');
INSERT INTO `mrhu_access_log` VALUES ('338', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:00');
INSERT INTO `mrhu_access_log` VALUES ('339', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:05');
INSERT INTO `mrhu_access_log` VALUES ('340', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:06');
INSERT INTO `mrhu_access_log` VALUES ('341', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:06');
INSERT INTO `mrhu_access_log` VALUES ('342', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:06');
INSERT INTO `mrhu_access_log` VALUES ('343', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:06');
INSERT INTO `mrhu_access_log` VALUES ('344', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:06');
INSERT INTO `mrhu_access_log` VALUES ('345', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:19');
INSERT INTO `mrhu_access_log` VALUES ('346', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:28');
INSERT INTO `mrhu_access_log` VALUES ('347', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:28');
INSERT INTO `mrhu_access_log` VALUES ('348', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:29');
INSERT INTO `mrhu_access_log` VALUES ('349', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:49');
INSERT INTO `mrhu_access_log` VALUES ('350', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:48:59');
INSERT INTO `mrhu_access_log` VALUES ('351', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:49:03');
INSERT INTO `mrhu_access_log` VALUES ('352', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:49:04');
INSERT INTO `mrhu_access_log` VALUES ('353', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:49:04');
INSERT INTO `mrhu_access_log` VALUES ('354', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:49:23');
INSERT INTO `mrhu_access_log` VALUES ('355', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:49:28');
INSERT INTO `mrhu_access_log` VALUES ('356', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:53:10');
INSERT INTO `mrhu_access_log` VALUES ('357', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:53:10');
INSERT INTO `mrhu_access_log` VALUES ('358', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:53:10');
INSERT INTO `mrhu_access_log` VALUES ('359', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:53:10');
INSERT INTO `mrhu_access_log` VALUES ('360', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:53:35');
INSERT INTO `mrhu_access_log` VALUES ('361', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:53:35');
INSERT INTO `mrhu_access_log` VALUES ('362', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:53:35');
INSERT INTO `mrhu_access_log` VALUES ('363', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:54:01');
INSERT INTO `mrhu_access_log` VALUES ('364', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:54:02');
INSERT INTO `mrhu_access_log` VALUES ('365', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:54:02');
INSERT INTO `mrhu_access_log` VALUES ('366', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:54:02');
INSERT INTO `mrhu_access_log` VALUES ('367', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:54:35');
INSERT INTO `mrhu_access_log` VALUES ('368', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:54:35');
INSERT INTO `mrhu_access_log` VALUES ('369', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 18:54:35');
INSERT INTO `mrhu_access_log` VALUES ('370', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-24 19:10:08');
INSERT INTO `mrhu_access_log` VALUES ('371', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 11:27:15');
INSERT INTO `mrhu_access_log` VALUES ('372', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:09:41');
INSERT INTO `mrhu_access_log` VALUES ('373', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:10:00');
INSERT INTO `mrhu_access_log` VALUES ('374', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:10:00');
INSERT INTO `mrhu_access_log` VALUES ('375', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:10:00');
INSERT INTO `mrhu_access_log` VALUES ('376', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:10:00');
INSERT INTO `mrhu_access_log` VALUES ('377', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 15:10:19');
INSERT INTO `mrhu_access_log` VALUES ('378', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:10:28');
INSERT INTO `mrhu_access_log` VALUES ('379', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:11:01');
INSERT INTO `mrhu_access_log` VALUES ('380', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:11:29');
INSERT INTO `mrhu_access_log` VALUES ('381', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-25 15:11:30');
INSERT INTO `mrhu_access_log` VALUES ('382', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 15:11:32');
INSERT INTO `mrhu_access_log` VALUES ('383', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-25 15:11:35');
INSERT INTO `mrhu_access_log` VALUES ('384', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 15:11:37');
INSERT INTO `mrhu_access_log` VALUES ('385', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-.htm', '2017-10-25 15:11:39');
INSERT INTO `mrhu_access_log` VALUES ('386', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 15:11:44');
INSERT INTO `mrhu_access_log` VALUES ('387', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:11:49');
INSERT INTO `mrhu_access_log` VALUES ('388', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:12:23');
INSERT INTO `mrhu_access_log` VALUES ('389', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:12:36');
INSERT INTO `mrhu_access_log` VALUES ('390', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:12:36');
INSERT INTO `mrhu_access_log` VALUES ('391', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:12:49');
INSERT INTO `mrhu_access_log` VALUES ('392', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:13:11');
INSERT INTO `mrhu_access_log` VALUES ('393', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 15:13:19');
INSERT INTO `mrhu_access_log` VALUES ('394', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-25 15:13:22');
INSERT INTO `mrhu_access_log` VALUES ('395', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-5.htm', '2017-10-25 15:13:25');
INSERT INTO `mrhu_access_log` VALUES ('396', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-4.htm', '2017-10-25 15:13:29');
INSERT INTO `mrhu_access_log` VALUES ('397', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-4.htm', '2017-10-25 15:13:50');
INSERT INTO `mrhu_access_log` VALUES ('398', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-3.htm', '2017-10-25 15:13:51');
INSERT INTO `mrhu_access_log` VALUES ('399', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-25 15:13:57');
INSERT INTO `mrhu_access_log` VALUES ('400', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 15:14:00');
INSERT INTO `mrhu_access_log` VALUES ('401', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:01:10');
INSERT INTO `mrhu_access_log` VALUES ('402', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:01:56');
INSERT INTO `mrhu_access_log` VALUES ('403', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:02:27');
INSERT INTO `mrhu_access_log` VALUES ('404', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:02:58');
INSERT INTO `mrhu_access_log` VALUES ('405', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:03:41');
INSERT INTO `mrhu_access_log` VALUES ('406', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:03:44');
INSERT INTO `mrhu_access_log` VALUES ('407', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:03:48');
INSERT INTO `mrhu_access_log` VALUES ('408', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:03:49');
INSERT INTO `mrhu_access_log` VALUES ('409', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:04:57');
INSERT INTO `mrhu_access_log` VALUES ('410', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:05:05');
INSERT INTO `mrhu_access_log` VALUES ('411', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:05:17');
INSERT INTO `mrhu_access_log` VALUES ('412', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:05:48');
INSERT INTO `mrhu_access_log` VALUES ('413', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:05:48');
INSERT INTO `mrhu_access_log` VALUES ('414', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:05:48');
INSERT INTO `mrhu_access_log` VALUES ('415', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:05:49');
INSERT INTO `mrhu_access_log` VALUES ('416', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:06:05');
INSERT INTO `mrhu_access_log` VALUES ('417', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:04');
INSERT INTO `mrhu_access_log` VALUES ('418', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:04');
INSERT INTO `mrhu_access_log` VALUES ('419', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:04');
INSERT INTO `mrhu_access_log` VALUES ('420', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:04');
INSERT INTO `mrhu_access_log` VALUES ('421', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:26');
INSERT INTO `mrhu_access_log` VALUES ('422', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:27');
INSERT INTO `mrhu_access_log` VALUES ('423', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:27');
INSERT INTO `mrhu_access_log` VALUES ('424', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:27');
INSERT INTO `mrhu_access_log` VALUES ('425', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:28');
INSERT INTO `mrhu_access_log` VALUES ('426', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:28');
INSERT INTO `mrhu_access_log` VALUES ('427', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:28');
INSERT INTO `mrhu_access_log` VALUES ('428', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:28');
INSERT INTO `mrhu_access_log` VALUES ('429', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:35');
INSERT INTO `mrhu_access_log` VALUES ('430', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:35');
INSERT INTO `mrhu_access_log` VALUES ('431', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:35');
INSERT INTO `mrhu_access_log` VALUES ('432', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:35');
INSERT INTO `mrhu_access_log` VALUES ('433', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:35');
INSERT INTO `mrhu_access_log` VALUES ('434', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:36');
INSERT INTO `mrhu_access_log` VALUES ('435', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:36');
INSERT INTO `mrhu_access_log` VALUES ('436', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:07:46');
INSERT INTO `mrhu_access_log` VALUES ('437', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:08:24');
INSERT INTO `mrhu_access_log` VALUES ('438', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:08:25');
INSERT INTO `mrhu_access_log` VALUES ('439', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:08:25');
INSERT INTO `mrhu_access_log` VALUES ('440', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:08:25');
INSERT INTO `mrhu_access_log` VALUES ('441', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:08:25');
INSERT INTO `mrhu_access_log` VALUES ('442', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:08:37');
INSERT INTO `mrhu_access_log` VALUES ('443', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:08:37');
INSERT INTO `mrhu_access_log` VALUES ('444', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-25 17:08:40');
INSERT INTO `mrhu_access_log` VALUES ('445', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:08:42');
INSERT INTO `mrhu_access_log` VALUES ('446', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:08:46');
INSERT INTO `mrhu_access_log` VALUES ('447', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-25 17:08:49');
INSERT INTO `mrhu_access_log` VALUES ('448', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:08:51');
INSERT INTO `mrhu_access_log` VALUES ('449', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:14:04');
INSERT INTO `mrhu_access_log` VALUES ('450', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:14:37');
INSERT INTO `mrhu_access_log` VALUES ('451', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:14:56');
INSERT INTO `mrhu_access_log` VALUES ('452', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:17:59');
INSERT INTO `mrhu_access_log` VALUES ('453', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:18:07');
INSERT INTO `mrhu_access_log` VALUES ('454', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:18:11');
INSERT INTO `mrhu_access_log` VALUES ('455', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:18:14');
INSERT INTO `mrhu_access_log` VALUES ('456', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-25 17:18:17');
INSERT INTO `mrhu_access_log` VALUES ('457', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:18:19');
INSERT INTO `mrhu_access_log` VALUES ('458', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:18:22');
INSERT INTO `mrhu_access_log` VALUES ('459', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:37:59');
INSERT INTO `mrhu_access_log` VALUES ('460', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:00');
INSERT INTO `mrhu_access_log` VALUES ('461', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:01');
INSERT INTO `mrhu_access_log` VALUES ('462', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:01');
INSERT INTO `mrhu_access_log` VALUES ('463', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:01');
INSERT INTO `mrhu_access_log` VALUES ('464', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:01');
INSERT INTO `mrhu_access_log` VALUES ('465', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:02');
INSERT INTO `mrhu_access_log` VALUES ('466', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:02');
INSERT INTO `mrhu_access_log` VALUES ('467', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:03');
INSERT INTO `mrhu_access_log` VALUES ('468', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:03');
INSERT INTO `mrhu_access_log` VALUES ('469', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:16');
INSERT INTO `mrhu_access_log` VALUES ('470', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:16');
INSERT INTO `mrhu_access_log` VALUES ('471', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:17');
INSERT INTO `mrhu_access_log` VALUES ('472', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-10-25 17:38:17');
INSERT INTO `mrhu_access_log` VALUES ('473', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-10-25 17:38:24');
INSERT INTO `mrhu_access_log` VALUES ('474', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-article.htm', '2017-10-25 17:38:25');
INSERT INTO `mrhu_access_log` VALUES ('475', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice.htm', '2017-10-25 17:38:28');
INSERT INTO `mrhu_access_log` VALUES ('476', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-10-25 17:38:38');
INSERT INTO `mrhu_access_log` VALUES ('477', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-article.htm', '2017-10-25 17:38:40');
INSERT INTO `mrhu_access_log` VALUES ('478', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-article.htm', '2017-10-25 17:39:05');
INSERT INTO `mrhu_access_log` VALUES ('479', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-10-25 17:39:07');
INSERT INTO `mrhu_access_log` VALUES ('480', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-10-25 17:39:41');
INSERT INTO `mrhu_access_log` VALUES ('481', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-10-25 17:40:18');
INSERT INTO `mrhu_access_log` VALUES ('482', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-10-25 17:40:19');
INSERT INTO `mrhu_access_log` VALUES ('483', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-10-25 17:40:19');
INSERT INTO `mrhu_access_log` VALUES ('484', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-10-25 17:40:19');
INSERT INTO `mrhu_access_log` VALUES ('485', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-10-25 18:10:03');
INSERT INTO `mrhu_access_log` VALUES ('486', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-10-25 18:10:39');
INSERT INTO `mrhu_access_log` VALUES ('487', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-10-25 18:57:50');
INSERT INTO `mrhu_access_log` VALUES ('488', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-25 18:57:51');
INSERT INTO `mrhu_access_log` VALUES ('489', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-25 18:58:51');
INSERT INTO `mrhu_access_log` VALUES ('490', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-26 11:12:43');
INSERT INTO `mrhu_access_log` VALUES ('491', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-26 19:00:58');
INSERT INTO `mrhu_access_log` VALUES ('492', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-26 19:02:04');
INSERT INTO `mrhu_access_log` VALUES ('493', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-26 19:02:32');
INSERT INTO `mrhu_access_log` VALUES ('494', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-26 19:02:50');
INSERT INTO `mrhu_access_log` VALUES ('495', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-27 12:26:28');
INSERT INTO `mrhu_access_log` VALUES ('496', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-27 12:26:28');
INSERT INTO `mrhu_access_log` VALUES ('497', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-27 12:26:29');
INSERT INTO `mrhu_access_log` VALUES ('498', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-27 12:26:29');
INSERT INTO `mrhu_access_log` VALUES ('499', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-30 15:01:48');
INSERT INTO `mrhu_access_log` VALUES ('500', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-30 15:03:15');
INSERT INTO `mrhu_access_log` VALUES ('501', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-30 15:06:49');
INSERT INTO `mrhu_access_log` VALUES ('502', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-10-30 15:37:50');
INSERT INTO `mrhu_access_log` VALUES ('503', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-video.htm', '2017-10-30 15:46:54');
INSERT INTO `mrhu_access_log` VALUES ('504', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-10-30 15:47:15');
INSERT INTO `mrhu_access_log` VALUES ('505', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 15:59:59');
INSERT INTO `mrhu_access_log` VALUES ('506', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:18:55');
INSERT INTO `mrhu_access_log` VALUES ('507', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:19:20');
INSERT INTO `mrhu_access_log` VALUES ('508', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:19:21');
INSERT INTO `mrhu_access_log` VALUES ('509', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-video.htm', '2017-10-30 16:24:18');
INSERT INTO `mrhu_access_log` VALUES ('510', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:24:20');
INSERT INTO `mrhu_access_log` VALUES ('511', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:24:50');
INSERT INTO `mrhu_access_log` VALUES ('512', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:24:51');
INSERT INTO `mrhu_access_log` VALUES ('513', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:26:20');
INSERT INTO `mrhu_access_log` VALUES ('514', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:26:21');
INSERT INTO `mrhu_access_log` VALUES ('515', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:26:21');
INSERT INTO `mrhu_access_log` VALUES ('516', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:26:21');
INSERT INTO `mrhu_access_log` VALUES ('517', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:26:21');
INSERT INTO `mrhu_access_log` VALUES ('518', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:26:21');
INSERT INTO `mrhu_access_log` VALUES ('519', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:26:44');
INSERT INTO `mrhu_access_log` VALUES ('520', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:26:45');
INSERT INTO `mrhu_access_log` VALUES ('521', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:26:45');
INSERT INTO `mrhu_access_log` VALUES ('522', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-10-30 16:26:45');
INSERT INTO `mrhu_access_log` VALUES ('523', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video.htm', '2017-10-30 16:26:49');
INSERT INTO `mrhu_access_log` VALUES ('524', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 16:26:56');
INSERT INTO `mrhu_access_log` VALUES ('525', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 16:26:58');
INSERT INTO `mrhu_access_log` VALUES ('526', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 16:27:38');
INSERT INTO `mrhu_access_log` VALUES ('527', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 16:28:06');
INSERT INTO `mrhu_access_log` VALUES ('528', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-30 16:53:35');
INSERT INTO `mrhu_access_log` VALUES ('529', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 16:53:37');
INSERT INTO `mrhu_access_log` VALUES ('530', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 16:54:28');
INSERT INTO `mrhu_access_log` VALUES ('531', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:38:40');
INSERT INTO `mrhu_access_log` VALUES ('532', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:38:40');
INSERT INTO `mrhu_access_log` VALUES ('533', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:38:52');
INSERT INTO `mrhu_access_log` VALUES ('534', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:39:52');
INSERT INTO `mrhu_access_log` VALUES ('535', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:39:52');
INSERT INTO `mrhu_access_log` VALUES ('536', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:39:52');
INSERT INTO `mrhu_access_log` VALUES ('537', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:39:52');
INSERT INTO `mrhu_access_log` VALUES ('538', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:39:53');
INSERT INTO `mrhu_access_log` VALUES ('539', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:41:27');
INSERT INTO `mrhu_access_log` VALUES ('540', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:41:28');
INSERT INTO `mrhu_access_log` VALUES ('541', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:41:28');
INSERT INTO `mrhu_access_log` VALUES ('542', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:41:28');
INSERT INTO `mrhu_access_log` VALUES ('543', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:41:29');
INSERT INTO `mrhu_access_log` VALUES ('544', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:41:43');
INSERT INTO `mrhu_access_log` VALUES ('545', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:41:50');
INSERT INTO `mrhu_access_log` VALUES ('546', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:43:22');
INSERT INTO `mrhu_access_log` VALUES ('547', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:43:22');
INSERT INTO `mrhu_access_log` VALUES ('548', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:43:22');
INSERT INTO `mrhu_access_log` VALUES ('549', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:43:22');
INSERT INTO `mrhu_access_log` VALUES ('550', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 17:43:23');
INSERT INTO `mrhu_access_log` VALUES ('551', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:24:11');
INSERT INTO `mrhu_access_log` VALUES ('552', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:25:59');
INSERT INTO `mrhu_access_log` VALUES ('553', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:26:24');
INSERT INTO `mrhu_access_log` VALUES ('554', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:26:24');
INSERT INTO `mrhu_access_log` VALUES ('555', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:26:25');
INSERT INTO `mrhu_access_log` VALUES ('556', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:26:25');
INSERT INTO `mrhu_access_log` VALUES ('557', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:27:13');
INSERT INTO `mrhu_access_log` VALUES ('558', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:27:14');
INSERT INTO `mrhu_access_log` VALUES ('559', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:27:40');
INSERT INTO `mrhu_access_log` VALUES ('560', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:32:29');
INSERT INTO `mrhu_access_log` VALUES ('561', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:46:57');
INSERT INTO `mrhu_access_log` VALUES ('562', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:47:51');
INSERT INTO `mrhu_access_log` VALUES ('563', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:47:52');
INSERT INTO `mrhu_access_log` VALUES ('564', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:47:52');
INSERT INTO `mrhu_access_log` VALUES ('565', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:47:52');
INSERT INTO `mrhu_access_log` VALUES ('566', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:47:52');
INSERT INTO `mrhu_access_log` VALUES ('567', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:47:54');
INSERT INTO `mrhu_access_log` VALUES ('568', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:48:40');
INSERT INTO `mrhu_access_log` VALUES ('569', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:48:45');
INSERT INTO `mrhu_access_log` VALUES ('570', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 18:49:42');
INSERT INTO `mrhu_access_log` VALUES ('571', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:03:03');
INSERT INTO `mrhu_access_log` VALUES ('572', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:03:04');
INSERT INTO `mrhu_access_log` VALUES ('573', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:03:04');
INSERT INTO `mrhu_access_log` VALUES ('574', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:03:04');
INSERT INTO `mrhu_access_log` VALUES ('575', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:03:04');
INSERT INTO `mrhu_access_log` VALUES ('576', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:03:17');
INSERT INTO `mrhu_access_log` VALUES ('577', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:03:25');
INSERT INTO `mrhu_access_log` VALUES ('578', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:04:18');
INSERT INTO `mrhu_access_log` VALUES ('579', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:04:19');
INSERT INTO `mrhu_access_log` VALUES ('580', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:04:19');
INSERT INTO `mrhu_access_log` VALUES ('581', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:04:19');
INSERT INTO `mrhu_access_log` VALUES ('582', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:04:19');
INSERT INTO `mrhu_access_log` VALUES ('583', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:04:20');
INSERT INTO `mrhu_access_log` VALUES ('584', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:05:22');
INSERT INTO `mrhu_access_log` VALUES ('585', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:05:22');
INSERT INTO `mrhu_access_log` VALUES ('586', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:05:23');
INSERT INTO `mrhu_access_log` VALUES ('587', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:05:23');
INSERT INTO `mrhu_access_log` VALUES ('588', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:05:23');
INSERT INTO `mrhu_access_log` VALUES ('589', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:05:23');
INSERT INTO `mrhu_access_log` VALUES ('590', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:05:44');
INSERT INTO `mrhu_access_log` VALUES ('591', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:05:45');
INSERT INTO `mrhu_access_log` VALUES ('592', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:05:45');
INSERT INTO `mrhu_access_log` VALUES ('593', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:05:45');
INSERT INTO `mrhu_access_log` VALUES ('594', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:05:45');
INSERT INTO `mrhu_access_log` VALUES ('595', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:05:46');
INSERT INTO `mrhu_access_log` VALUES ('596', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:06:39');
INSERT INTO `mrhu_access_log` VALUES ('597', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:11:39');
INSERT INTO `mrhu_access_log` VALUES ('598', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:12:34');
INSERT INTO `mrhu_access_log` VALUES ('599', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:12:34');
INSERT INTO `mrhu_access_log` VALUES ('600', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:12:35');
INSERT INTO `mrhu_access_log` VALUES ('601', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:12:35');
INSERT INTO `mrhu_access_log` VALUES ('602', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:13:19');
INSERT INTO `mrhu_access_log` VALUES ('603', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:14:06');
INSERT INTO `mrhu_access_log` VALUES ('604', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:14:07');
INSERT INTO `mrhu_access_log` VALUES ('605', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:14:25');
INSERT INTO `mrhu_access_log` VALUES ('606', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:14:25');
INSERT INTO `mrhu_access_log` VALUES ('607', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:14:25');
INSERT INTO `mrhu_access_log` VALUES ('608', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:14:26');
INSERT INTO `mrhu_access_log` VALUES ('609', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:14:26');
INSERT INTO `mrhu_access_log` VALUES ('610', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:14:42');
INSERT INTO `mrhu_access_log` VALUES ('611', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:14:43');
INSERT INTO `mrhu_access_log` VALUES ('612', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:14:43');
INSERT INTO `mrhu_access_log` VALUES ('613', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:14:43');
INSERT INTO `mrhu_access_log` VALUES ('614', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all-currentPage-1-pagesize-20.htm', '2017-10-30 19:15:18');
INSERT INTO `mrhu_access_log` VALUES ('615', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video.htm', '2017-10-30 19:15:18');
INSERT INTO `mrhu_access_log` VALUES ('616', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video.htm', '2017-10-30 19:15:33');
INSERT INTO `mrhu_access_log` VALUES ('617', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-mv.htm', '2017-10-30 19:15:34');
INSERT INTO `mrhu_access_log` VALUES ('618', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all.htm', '2017-10-30 19:15:35');
INSERT INTO `mrhu_access_log` VALUES ('619', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-concert.htm', '2017-10-30 19:15:38');
INSERT INTO `mrhu_access_log` VALUES ('620', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-concert.htm', '2017-10-30 19:16:09');
INSERT INTO `mrhu_access_log` VALUES ('621', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-concert.htm', '2017-10-30 19:16:09');
INSERT INTO `mrhu_access_log` VALUES ('622', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-live.htm', '2017-10-30 19:16:10');
INSERT INTO `mrhu_access_log` VALUES ('623', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-mv.htm', '2017-10-30 19:16:13');
INSERT INTO `mrhu_access_log` VALUES ('624', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 09:51:04');
INSERT INTO `mrhu_access_log` VALUES ('625', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 10:24:59');
INSERT INTO `mrhu_access_log` VALUES ('626', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 10:34:40');
INSERT INTO `mrhu_access_log` VALUES ('627', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 14:31:03');
INSERT INTO `mrhu_access_log` VALUES ('628', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 14:46:42');
INSERT INTO `mrhu_access_log` VALUES ('629', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 14:47:08');
INSERT INTO `mrhu_access_log` VALUES ('630', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 15:19:36');
INSERT INTO `mrhu_access_log` VALUES ('631', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 15:19:36');
INSERT INTO `mrhu_access_log` VALUES ('632', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 15:22:13');
INSERT INTO `mrhu_access_log` VALUES ('633', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 15:22:55');
INSERT INTO `mrhu_access_log` VALUES ('634', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 15:22:57');
INSERT INTO `mrhu_access_log` VALUES ('635', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 15:23:04');
INSERT INTO `mrhu_access_log` VALUES ('636', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 16:27:25');
INSERT INTO `mrhu_access_log` VALUES ('637', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 16:27:26');
INSERT INTO `mrhu_access_log` VALUES ('638', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 16:27:35');
INSERT INTO `mrhu_access_log` VALUES ('639', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 16:28:28');
INSERT INTO `mrhu_access_log` VALUES ('640', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 16:28:28');
INSERT INTO `mrhu_access_log` VALUES ('641', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 16:28:29');
INSERT INTO `mrhu_access_log` VALUES ('642', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 16:28:42');
INSERT INTO `mrhu_access_log` VALUES ('643', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 16:29:04');
INSERT INTO `mrhu_access_log` VALUES ('644', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 16:29:28');
INSERT INTO `mrhu_access_log` VALUES ('645', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-mv.htm', '2017-10-31 16:29:54');
INSERT INTO `mrhu_access_log` VALUES ('646', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 16:29:56');
INSERT INTO `mrhu_access_log` VALUES ('647', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 16:46:35');
INSERT INTO `mrhu_access_log` VALUES ('648', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 16:47:28');
INSERT INTO `mrhu_access_log` VALUES ('649', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:54:44');
INSERT INTO `mrhu_access_log` VALUES ('650', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:54:49');
INSERT INTO `mrhu_access_log` VALUES ('651', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:54:55');
INSERT INTO `mrhu_access_log` VALUES ('652', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:54:55');
INSERT INTO `mrhu_access_log` VALUES ('653', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:54:56');
INSERT INTO `mrhu_access_log` VALUES ('654', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:54:57');
INSERT INTO `mrhu_access_log` VALUES ('655', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:54:58');
INSERT INTO `mrhu_access_log` VALUES ('656', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:55:00');
INSERT INTO `mrhu_access_log` VALUES ('657', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:55:44');
INSERT INTO `mrhu_access_log` VALUES ('658', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:55:45');
INSERT INTO `mrhu_access_log` VALUES ('659', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:55:45');
INSERT INTO `mrhu_access_log` VALUES ('660', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:55:45');
INSERT INTO `mrhu_access_log` VALUES ('661', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:55:45');
INSERT INTO `mrhu_access_log` VALUES ('662', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:55:48');
INSERT INTO `mrhu_access_log` VALUES ('663', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:55:49');
INSERT INTO `mrhu_access_log` VALUES ('664', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:56:05');
INSERT INTO `mrhu_access_log` VALUES ('665', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:56:05');
INSERT INTO `mrhu_access_log` VALUES ('666', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:56:05');
INSERT INTO `mrhu_access_log` VALUES ('667', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:56:05');
INSERT INTO `mrhu_access_log` VALUES ('668', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:56:05');
INSERT INTO `mrhu_access_log` VALUES ('669', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:56:07');
INSERT INTO `mrhu_access_log` VALUES ('670', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:56:39');
INSERT INTO `mrhu_access_log` VALUES ('671', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:56:39');
INSERT INTO `mrhu_access_log` VALUES ('672', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:56:40');
INSERT INTO `mrhu_access_log` VALUES ('673', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:56:40');
INSERT INTO `mrhu_access_log` VALUES ('674', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:56:40');
INSERT INTO `mrhu_access_log` VALUES ('675', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 17:56:44');
INSERT INTO `mrhu_access_log` VALUES ('676', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:08:12');
INSERT INTO `mrhu_access_log` VALUES ('677', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:08:13');
INSERT INTO `mrhu_access_log` VALUES ('678', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:08:14');
INSERT INTO `mrhu_access_log` VALUES ('679', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:09:00');
INSERT INTO `mrhu_access_log` VALUES ('680', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:09:01');
INSERT INTO `mrhu_access_log` VALUES ('681', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:10:38');
INSERT INTO `mrhu_access_log` VALUES ('682', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:10:56');
INSERT INTO `mrhu_access_log` VALUES ('683', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:10:59');
INSERT INTO `mrhu_access_log` VALUES ('684', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:11:00');
INSERT INTO `mrhu_access_log` VALUES ('685', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:11:50');
INSERT INTO `mrhu_access_log` VALUES ('686', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:12:42');
INSERT INTO `mrhu_access_log` VALUES ('687', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:12:47');
INSERT INTO `mrhu_access_log` VALUES ('688', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:14:22');
INSERT INTO `mrhu_access_log` VALUES ('689', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:15:46');
INSERT INTO `mrhu_access_log` VALUES ('690', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:16:42');
INSERT INTO `mrhu_access_log` VALUES ('691', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:16:45');
INSERT INTO `mrhu_access_log` VALUES ('692', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:16:47');
INSERT INTO `mrhu_access_log` VALUES ('693', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-mv.htm', '2017-10-31 18:16:50');
INSERT INTO `mrhu_access_log` VALUES ('694', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:16:51');
INSERT INTO `mrhu_access_log` VALUES ('695', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:23:14');
INSERT INTO `mrhu_access_log` VALUES ('696', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:23:36');
INSERT INTO `mrhu_access_log` VALUES ('697', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:24:49');
INSERT INTO `mrhu_access_log` VALUES ('698', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video-type-all.htm', '2017-10-31 18:24:52');
INSERT INTO `mrhu_access_log` VALUES ('699', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-video_detail-id-2.htm', '2017-10-31 18:24:54');
INSERT INTO `mrhu_access_log` VALUES ('700', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-10-31 18:24:58');
INSERT INTO `mrhu_access_log` VALUES ('701', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-photo.htm', '2017-10-31 18:24:59');
INSERT INTO `mrhu_access_log` VALUES ('702', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-article.htm', '2017-10-31 18:25:01');
INSERT INTO `mrhu_access_log` VALUES ('703', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-notice.htm', '2017-10-31 18:25:02');
INSERT INTO `mrhu_access_log` VALUES ('704', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:25:04');
INSERT INTO `mrhu_access_log` VALUES ('705', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:25:48');
INSERT INTO `mrhu_access_log` VALUES ('706', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:31:21');
INSERT INTO `mrhu_access_log` VALUES ('707', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:34:11');
INSERT INTO `mrhu_access_log` VALUES ('708', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:34:48');
INSERT INTO `mrhu_access_log` VALUES ('709', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:35:57');
INSERT INTO `mrhu_access_log` VALUES ('710', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:45:50');
INSERT INTO `mrhu_access_log` VALUES ('711', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:45:58');
INSERT INTO `mrhu_access_log` VALUES ('712', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:53:05');
INSERT INTO `mrhu_access_log` VALUES ('713', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:53:27');
INSERT INTO `mrhu_access_log` VALUES ('714', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:54:06');
INSERT INTO `mrhu_access_log` VALUES ('715', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:54:14');
INSERT INTO `mrhu_access_log` VALUES ('716', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:57:24');
INSERT INTO `mrhu_access_log` VALUES ('717', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:57:51');
INSERT INTO `mrhu_access_log` VALUES ('718', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:58:11');
INSERT INTO `mrhu_access_log` VALUES ('719', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:58:26');
INSERT INTO `mrhu_access_log` VALUES ('720', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:58:44');
INSERT INTO `mrhu_access_log` VALUES ('721', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:58:55');
INSERT INTO `mrhu_access_log` VALUES ('722', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:59:13');
INSERT INTO `mrhu_access_log` VALUES ('723', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 18:59:45');
INSERT INTO `mrhu_access_log` VALUES ('724', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 19:00:06');
INSERT INTO `mrhu_access_log` VALUES ('725', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 19:01:01');
INSERT INTO `mrhu_access_log` VALUES ('726', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 19:01:52');
INSERT INTO `mrhu_access_log` VALUES ('727', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 19:02:29');
INSERT INTO `mrhu_access_log` VALUES ('728', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-video_detail-id-3.htm', '2017-10-31 19:04:21');
INSERT INTO `mrhu_access_log` VALUES ('729', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-10-31 19:04:24');
INSERT INTO `mrhu_access_log` VALUES ('730', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-photo.htm', '2017-10-31 19:04:25');
INSERT INTO `mrhu_access_log` VALUES ('731', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article.htm', '2017-10-31 19:04:26');
INSERT INTO `mrhu_access_log` VALUES ('732', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-video.htm', '2017-10-31 19:04:27');
INSERT INTO `mrhu_access_log` VALUES ('733', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-album.htm', '2017-10-31 19:04:28');
INSERT INTO `mrhu_access_log` VALUES ('734', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-awards.htm', '2017-10-31 19:04:28');
INSERT INTO `mrhu_access_log` VALUES ('735', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album.htm', '2017-10-31 19:04:30');
INSERT INTO `mrhu_access_log` VALUES ('736', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-album_music-id-24.htm', '2017-10-31 19:04:34');
INSERT INTO `mrhu_access_log` VALUES ('737', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 19:04:36');
INSERT INTO `mrhu_access_log` VALUES ('738', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 19:06:10');
INSERT INTO `mrhu_access_log` VALUES ('739', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 19:07:06');
INSERT INTO `mrhu_access_log` VALUES ('740', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 19:07:29');
INSERT INTO `mrhu_access_log` VALUES ('741', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video_detail-id-2.htm', '2017-10-31 19:07:40');
INSERT INTO `mrhu_access_log` VALUES ('742', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 19:07:41');
INSERT INTO `mrhu_access_log` VALUES ('743', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video_detail-id-2.htm', '2017-10-31 19:07:45');
INSERT INTO `mrhu_access_log` VALUES ('744', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-10-31 19:07:46');
INSERT INTO `mrhu_access_log` VALUES ('745', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:08:37');
INSERT INTO `mrhu_access_log` VALUES ('746', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:10:15');
INSERT INTO `mrhu_access_log` VALUES ('747', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:10:37');
INSERT INTO `mrhu_access_log` VALUES ('748', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:14:39');
INSERT INTO `mrhu_access_log` VALUES ('749', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:15:49');
INSERT INTO `mrhu_access_log` VALUES ('750', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:22:46');
INSERT INTO `mrhu_access_log` VALUES ('751', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:22:46');
INSERT INTO `mrhu_access_log` VALUES ('752', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:22:46');
INSERT INTO `mrhu_access_log` VALUES ('753', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:22:46');
INSERT INTO `mrhu_access_log` VALUES ('754', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:22:47');
INSERT INTO `mrhu_access_log` VALUES ('755', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:22:47');
INSERT INTO `mrhu_access_log` VALUES ('756', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:23:08');
INSERT INTO `mrhu_access_log` VALUES ('757', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:24:21');
INSERT INTO `mrhu_access_log` VALUES ('758', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video_detail-id-3.htm', '2017-11-01 11:24:25');
INSERT INTO `mrhu_access_log` VALUES ('759', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:24:26');
INSERT INTO `mrhu_access_log` VALUES ('760', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:39:06');
INSERT INTO `mrhu_access_log` VALUES ('761', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:39:07');
INSERT INTO `mrhu_access_log` VALUES ('762', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:39:07');
INSERT INTO `mrhu_access_log` VALUES ('763', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:39:07');
INSERT INTO `mrhu_access_log` VALUES ('764', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:41:06');
INSERT INTO `mrhu_access_log` VALUES ('765', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:41:07');
INSERT INTO `mrhu_access_log` VALUES ('766', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:41:07');
INSERT INTO `mrhu_access_log` VALUES ('767', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:41:07');
INSERT INTO `mrhu_access_log` VALUES ('768', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:41:07');
INSERT INTO `mrhu_access_log` VALUES ('769', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:42:25');
INSERT INTO `mrhu_access_log` VALUES ('770', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:42:26');
INSERT INTO `mrhu_access_log` VALUES ('771', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:42:26');
INSERT INTO `mrhu_access_log` VALUES ('772', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:42:38');
INSERT INTO `mrhu_access_log` VALUES ('773', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:42:38');
INSERT INTO `mrhu_access_log` VALUES ('774', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:42:39');
INSERT INTO `mrhu_access_log` VALUES ('775', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:42:55');
INSERT INTO `mrhu_access_log` VALUES ('776', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:42:55');
INSERT INTO `mrhu_access_log` VALUES ('777', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 11:42:56');
INSERT INTO `mrhu_access_log` VALUES ('778', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 12:07:18');
INSERT INTO `mrhu_access_log` VALUES ('779', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 12:07:25');
INSERT INTO `mrhu_access_log` VALUES ('780', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 12:08:17');
INSERT INTO `mrhu_access_log` VALUES ('781', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 12:08:49');
INSERT INTO `mrhu_access_log` VALUES ('782', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-2.htm', '2017-11-01 12:18:08');
INSERT INTO `mrhu_access_log` VALUES ('783', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-2.htm', '2017-11-01 14:39:52');
INSERT INTO `mrhu_access_log` VALUES ('784', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-2.htm', '2017-11-01 14:39:53');
INSERT INTO `mrhu_access_log` VALUES ('785', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-2.htm', '2017-11-01 14:41:33');
INSERT INTO `mrhu_access_log` VALUES ('786', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-photo.htm', '2017-11-01 16:19:16');
INSERT INTO `mrhu_access_log` VALUES ('787', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article.htm', '2017-11-01 16:19:17');
INSERT INTO `mrhu_access_log` VALUES ('788', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:19:19');
INSERT INTO `mrhu_access_log` VALUES ('789', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:19:27');
INSERT INTO `mrhu_access_log` VALUES ('790', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:19:37');
INSERT INTO `mrhu_access_log` VALUES ('791', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:19:38');
INSERT INTO `mrhu_access_log` VALUES ('792', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:39:58');
INSERT INTO `mrhu_access_log` VALUES ('793', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:40:00');
INSERT INTO `mrhu_access_log` VALUES ('794', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:48:58');
INSERT INTO `mrhu_access_log` VALUES ('795', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:49:00');
INSERT INTO `mrhu_access_log` VALUES ('796', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:49:49');
INSERT INTO `mrhu_access_log` VALUES ('797', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:49:54');
INSERT INTO `mrhu_access_log` VALUES ('798', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:49:58');
INSERT INTO `mrhu_access_log` VALUES ('799', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:49:58');
INSERT INTO `mrhu_access_log` VALUES ('800', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:50:20');
INSERT INTO `mrhu_access_log` VALUES ('801', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:51:31');
INSERT INTO `mrhu_access_log` VALUES ('802', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:51:34');
INSERT INTO `mrhu_access_log` VALUES ('803', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:51:53');
INSERT INTO `mrhu_access_log` VALUES ('804', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:51:58');
INSERT INTO `mrhu_access_log` VALUES ('805', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:52:21');
INSERT INTO `mrhu_access_log` VALUES ('806', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:52:23');
INSERT INTO `mrhu_access_log` VALUES ('807', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:52:23');
INSERT INTO `mrhu_access_log` VALUES ('808', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:52:24');
INSERT INTO `mrhu_access_log` VALUES ('809', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:52:24');
INSERT INTO `mrhu_access_log` VALUES ('810', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:53:52');
INSERT INTO `mrhu_access_log` VALUES ('811', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:59:12');
INSERT INTO `mrhu_access_log` VALUES ('812', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:59:14');
INSERT INTO `mrhu_access_log` VALUES ('813', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:59:16');
INSERT INTO `mrhu_access_log` VALUES ('814', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 16:59:44');
INSERT INTO `mrhu_access_log` VALUES ('815', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 17:01:37');
INSERT INTO `mrhu_access_log` VALUES ('816', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 17:01:41');
INSERT INTO `mrhu_access_log` VALUES ('817', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 17:01:43');
INSERT INTO `mrhu_access_log` VALUES ('818', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 17:01:44');
INSERT INTO `mrhu_access_log` VALUES ('819', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 17:23:04');
INSERT INTO `mrhu_access_log` VALUES ('820', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-01 17:26:21');
INSERT INTO `mrhu_access_log` VALUES ('821', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-video_detail-id-2.htm', '2017-11-01 17:32:18');
INSERT INTO `mrhu_access_log` VALUES ('822', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album.htm', '2017-11-01 17:32:21');
INSERT INTO `mrhu_access_log` VALUES ('823', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album-currentPage-3-pagesize-9.htm', '2017-11-01 17:32:22');
INSERT INTO `mrhu_access_log` VALUES ('824', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album-currentPage-3-pagesize-9.htm', '2017-11-01 17:32:58');
INSERT INTO `mrhu_access_log` VALUES ('825', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album-currentPage-3-pagesize-9.htm', '2017-11-01 17:33:21');
INSERT INTO `mrhu_access_log` VALUES ('826', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album-currentPage-3-pagesize-9.htm', '2017-11-01 17:33:42');
INSERT INTO `mrhu_access_log` VALUES ('827', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-album_music-id-6.htm', '2017-11-02 14:10:13');
INSERT INTO `mrhu_access_log` VALUES ('828', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-article.htm', '2017-11-02 14:10:15');
INSERT INTO `mrhu_access_log` VALUES ('829', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-02 14:10:15');
INSERT INTO `mrhu_access_log` VALUES ('830', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:21:14');
INSERT INTO `mrhu_access_log` VALUES ('831', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:22:41');
INSERT INTO `mrhu_access_log` VALUES ('832', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:26:43');
INSERT INTO `mrhu_access_log` VALUES ('833', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:26:47');
INSERT INTO `mrhu_access_log` VALUES ('834', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:27:46');
INSERT INTO `mrhu_access_log` VALUES ('835', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:30:08');
INSERT INTO `mrhu_access_log` VALUES ('836', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:31:36');
INSERT INTO `mrhu_access_log` VALUES ('837', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:32:31');
INSERT INTO `mrhu_access_log` VALUES ('838', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:38:25');
INSERT INTO `mrhu_access_log` VALUES ('839', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:39:49');
INSERT INTO `mrhu_access_log` VALUES ('840', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:41:48');
INSERT INTO `mrhu_access_log` VALUES ('841', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:41:48');
INSERT INTO `mrhu_access_log` VALUES ('842', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:41:49');
INSERT INTO `mrhu_access_log` VALUES ('843', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:41:49');
INSERT INTO `mrhu_access_log` VALUES ('844', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:41:49');
INSERT INTO `mrhu_access_log` VALUES ('845', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:42:49');
INSERT INTO `mrhu_access_log` VALUES ('846', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:43:23');
INSERT INTO `mrhu_access_log` VALUES ('847', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:43:23');
INSERT INTO `mrhu_access_log` VALUES ('848', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:43:23');
INSERT INTO `mrhu_access_log` VALUES ('849', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:46:18');
INSERT INTO `mrhu_access_log` VALUES ('850', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:46:53');
INSERT INTO `mrhu_access_log` VALUES ('851', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:47:09');
INSERT INTO `mrhu_access_log` VALUES ('852', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:47:52');
INSERT INTO `mrhu_access_log` VALUES ('853', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:54:40');
INSERT INTO `mrhu_access_log` VALUES ('854', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:54:41');
INSERT INTO `mrhu_access_log` VALUES ('855', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 12:54:41');
INSERT INTO `mrhu_access_log` VALUES ('856', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-03 14:38:17');
INSERT INTO `mrhu_access_log` VALUES ('857', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-photo.htm', '2017-11-03 14:38:25');
INSERT INTO `mrhu_access_log` VALUES ('858', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 14:38:30');
INSERT INTO `mrhu_access_log` VALUES ('859', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-photo.htm', '2017-11-03 14:38:33');
INSERT INTO `mrhu_access_log` VALUES ('860', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 14:38:36');
INSERT INTO `mrhu_access_log` VALUES ('861', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 14:57:38');
INSERT INTO `mrhu_access_log` VALUES ('862', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 14:57:47');
INSERT INTO `mrhu_access_log` VALUES ('863', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 14:58:26');
INSERT INTO `mrhu_access_log` VALUES ('864', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 14:58:27');
INSERT INTO `mrhu_access_log` VALUES ('865', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 14:58:27');
INSERT INTO `mrhu_access_log` VALUES ('866', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 14:58:28');
INSERT INTO `mrhu_access_log` VALUES ('867', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 14:58:40');
INSERT INTO `mrhu_access_log` VALUES ('868', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 14:58:53');
INSERT INTO `mrhu_access_log` VALUES ('869', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 14:59:08');
INSERT INTO `mrhu_access_log` VALUES ('870', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:01:51');
INSERT INTO `mrhu_access_log` VALUES ('871', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:04:37');
INSERT INTO `mrhu_access_log` VALUES ('872', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:05:44');
INSERT INTO `mrhu_access_log` VALUES ('873', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:06:10');
INSERT INTO `mrhu_access_log` VALUES ('874', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:06:39');
INSERT INTO `mrhu_access_log` VALUES ('875', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:06:59');
INSERT INTO `mrhu_access_log` VALUES ('876', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:10:29');
INSERT INTO `mrhu_access_log` VALUES ('877', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:10:39');
INSERT INTO `mrhu_access_log` VALUES ('878', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:11:10');
INSERT INTO `mrhu_access_log` VALUES ('879', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:12:09');
INSERT INTO `mrhu_access_log` VALUES ('880', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:14:34');
INSERT INTO `mrhu_access_log` VALUES ('881', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:15:03');
INSERT INTO `mrhu_access_log` VALUES ('882', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:18:18');
INSERT INTO `mrhu_access_log` VALUES ('883', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:18:31');
INSERT INTO `mrhu_access_log` VALUES ('884', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:19:00');
INSERT INTO `mrhu_access_log` VALUES ('885', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:19:01');
INSERT INTO `mrhu_access_log` VALUES ('886', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:19:01');
INSERT INTO `mrhu_access_log` VALUES ('887', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:19:01');
INSERT INTO `mrhu_access_log` VALUES ('888', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:19:21');
INSERT INTO `mrhu_access_log` VALUES ('889', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:20:01');
INSERT INTO `mrhu_access_log` VALUES ('890', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:20:14');
INSERT INTO `mrhu_access_log` VALUES ('891', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:20:15');
INSERT INTO `mrhu_access_log` VALUES ('892', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:20:15');
INSERT INTO `mrhu_access_log` VALUES ('893', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:20:15');
INSERT INTO `mrhu_access_log` VALUES ('894', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:20:15');
INSERT INTO `mrhu_access_log` VALUES ('895', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:20:34');
INSERT INTO `mrhu_access_log` VALUES ('896', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:20:45');
INSERT INTO `mrhu_access_log` VALUES ('897', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:20:56');
INSERT INTO `mrhu_access_log` VALUES ('898', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:20:57');
INSERT INTO `mrhu_access_log` VALUES ('899', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:21:11');
INSERT INTO `mrhu_access_log` VALUES ('900', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:21:31');
INSERT INTO `mrhu_access_log` VALUES ('901', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:21:32');
INSERT INTO `mrhu_access_log` VALUES ('902', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:21:32');
INSERT INTO `mrhu_access_log` VALUES ('903', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:21:50');
INSERT INTO `mrhu_access_log` VALUES ('904', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:22:07');
INSERT INTO `mrhu_access_log` VALUES ('905', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:22:19');
INSERT INTO `mrhu_access_log` VALUES ('906', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:23:05');
INSERT INTO `mrhu_access_log` VALUES ('907', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:23:06');
INSERT INTO `mrhu_access_log` VALUES ('908', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:23:06');
INSERT INTO `mrhu_access_log` VALUES ('909', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:23:20');
INSERT INTO `mrhu_access_log` VALUES ('910', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 15:23:56');
INSERT INTO `mrhu_access_log` VALUES ('911', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 16:18:13');
INSERT INTO `mrhu_access_log` VALUES ('912', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 16:29:59');
INSERT INTO `mrhu_access_log` VALUES ('913', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 16:30:00');
INSERT INTO `mrhu_access_log` VALUES ('914', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 16:30:00');
INSERT INTO `mrhu_access_log` VALUES ('915', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 16:30:00');
INSERT INTO `mrhu_access_log` VALUES ('916', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-03 16:35:34');
INSERT INTO `mrhu_access_log` VALUES ('917', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:35:36');
INSERT INTO `mrhu_access_log` VALUES ('918', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video.htm', '2017-11-03 16:35:43');
INSERT INTO `mrhu_access_log` VALUES ('919', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video.htm', '2017-11-03 16:36:48');
INSERT INTO `mrhu_access_log` VALUES ('920', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video.htm', '2017-11-03 16:37:05');
INSERT INTO `mrhu_access_log` VALUES ('921', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:38:40');
INSERT INTO `mrhu_access_log` VALUES ('922', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:39:55');
INSERT INTO `mrhu_access_log` VALUES ('923', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:39:56');
INSERT INTO `mrhu_access_log` VALUES ('924', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:39:56');
INSERT INTO `mrhu_access_log` VALUES ('925', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:39:56');
INSERT INTO `mrhu_access_log` VALUES ('926', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video.htm', '2017-11-03 16:39:58');
INSERT INTO `mrhu_access_log` VALUES ('927', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-mv.htm', '2017-11-03 16:40:00');
INSERT INTO `mrhu_access_log` VALUES ('928', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-live.htm', '2017-11-03 16:40:01');
INSERT INTO `mrhu_access_log` VALUES ('929', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-concert.htm', '2017-11-03 16:40:03');
INSERT INTO `mrhu_access_log` VALUES ('930', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-mv.htm', '2017-11-03 16:40:04');
INSERT INTO `mrhu_access_log` VALUES ('931', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-all.htm', '2017-11-03 16:40:10');
INSERT INTO `mrhu_access_log` VALUES ('932', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video.htm', '2017-11-03 16:40:11');
INSERT INTO `mrhu_access_log` VALUES ('933', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video.htm', '2017-11-03 16:43:50');
INSERT INTO `mrhu_access_log` VALUES ('934', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video.htm', '2017-11-03 16:45:07');
INSERT INTO `mrhu_access_log` VALUES ('935', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video.htm', '2017-11-03 16:46:50');
INSERT INTO `mrhu_access_log` VALUES ('936', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video.htm', '2017-11-03 16:47:22');
INSERT INTO `mrhu_access_log` VALUES ('937', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video.htm', '2017-11-03 16:47:29');
INSERT INTO `mrhu_access_log` VALUES ('938', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video.htm', '2017-11-03 16:48:00');
INSERT INTO `mrhu_access_log` VALUES ('939', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detial', 'video_detial', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:48:00');
INSERT INTO `mrhu_access_log` VALUES ('940', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video.htm', '2017-11-03 16:48:03');
INSERT INTO `mrhu_access_log` VALUES ('941', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:48:06');
INSERT INTO `mrhu_access_log` VALUES ('942', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-03 16:48:07');
INSERT INTO `mrhu_access_log` VALUES ('943', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:48:18');
INSERT INTO `mrhu_access_log` VALUES ('944', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detial', 'video_detial', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:48:20');
INSERT INTO `mrhu_access_log` VALUES ('945', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detial', 'video_detial', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:48:35');
INSERT INTO `mrhu_access_log` VALUES ('946', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:48:36');
INSERT INTO `mrhu_access_log` VALUES ('947', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:48:37');
INSERT INTO `mrhu_access_log` VALUES ('948', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:48:38');
INSERT INTO `mrhu_access_log` VALUES ('949', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:48:41');
INSERT INTO `mrhu_access_log` VALUES ('950', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:48:42');
INSERT INTO `mrhu_access_log` VALUES ('951', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:48:53');
INSERT INTO `mrhu_access_log` VALUES ('952', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:49:27');
INSERT INTO `mrhu_access_log` VALUES ('953', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:49:28');
INSERT INTO `mrhu_access_log` VALUES ('954', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:49:28');
INSERT INTO `mrhu_access_log` VALUES ('955', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:50:30');
INSERT INTO `mrhu_access_log` VALUES ('956', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:54:23');
INSERT INTO `mrhu_access_log` VALUES ('957', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:54:23');
INSERT INTO `mrhu_access_log` VALUES ('958', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:54:23');
INSERT INTO `mrhu_access_log` VALUES ('959', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:54:59');
INSERT INTO `mrhu_access_log` VALUES ('960', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:55:10');
INSERT INTO `mrhu_access_log` VALUES ('961', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:55:11');
INSERT INTO `mrhu_access_log` VALUES ('962', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-video_detail-id-4.htm', '2017-11-03 16:55:37');
INSERT INTO `mrhu_access_log` VALUES ('963', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'index', 'index', 'http://tiger.lc/home-photo.htm', '2017-11-03 16:57:56');
INSERT INTO `mrhu_access_log` VALUES ('964', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/', '2017-11-03 16:59:16');
INSERT INTO `mrhu_access_log` VALUES ('965', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 16:59:17');
INSERT INTO `mrhu_access_log` VALUES ('966', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 16:59:50');
INSERT INTO `mrhu_access_log` VALUES ('967', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:00:44');
INSERT INTO `mrhu_access_log` VALUES ('968', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:01:36');
INSERT INTO `mrhu_access_log` VALUES ('969', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:02:10');
INSERT INTO `mrhu_access_log` VALUES ('970', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-photo.htm', '2017-11-03 17:02:10');
INSERT INTO `mrhu_access_log` VALUES ('971', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:02:11');
INSERT INTO `mrhu_access_log` VALUES ('972', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-photo.htm', '2017-11-03 17:02:11');
INSERT INTO `mrhu_access_log` VALUES ('973', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:02:11');
INSERT INTO `mrhu_access_log` VALUES ('974', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-photo.htm', '2017-11-03 17:02:11');
INSERT INTO `mrhu_access_log` VALUES ('975', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:02:11');
INSERT INTO `mrhu_access_log` VALUES ('976', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-photo.htm', '2017-11-03 17:02:11');
INSERT INTO `mrhu_access_log` VALUES ('977', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:02:47');
INSERT INTO `mrhu_access_log` VALUES ('978', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:08:21');
INSERT INTO `mrhu_access_log` VALUES ('979', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:15:54');
INSERT INTO `mrhu_access_log` VALUES ('980', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:29:55');
INSERT INTO `mrhu_access_log` VALUES ('981', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:37:49');
INSERT INTO `mrhu_access_log` VALUES ('982', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:38:36');
INSERT INTO `mrhu_access_log` VALUES ('983', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:38:49');
INSERT INTO `mrhu_access_log` VALUES ('984', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:39:18');
INSERT INTO `mrhu_access_log` VALUES ('985', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:39:39');
INSERT INTO `mrhu_access_log` VALUES ('986', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:40:07');
INSERT INTO `mrhu_access_log` VALUES ('987', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:40:24');
INSERT INTO `mrhu_access_log` VALUES ('988', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:41:47');
INSERT INTO `mrhu_access_log` VALUES ('989', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:41:55');
INSERT INTO `mrhu_access_log` VALUES ('990', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:41:56');
INSERT INTO `mrhu_access_log` VALUES ('991', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:41:56');
INSERT INTO `mrhu_access_log` VALUES ('992', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:41:56');
INSERT INTO `mrhu_access_log` VALUES ('993', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:41:57');
INSERT INTO `mrhu_access_log` VALUES ('994', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:42:06');
INSERT INTO `mrhu_access_log` VALUES ('995', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:42:07');
INSERT INTO `mrhu_access_log` VALUES ('996', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:42:07');
INSERT INTO `mrhu_access_log` VALUES ('997', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:42:22');
INSERT INTO `mrhu_access_log` VALUES ('998', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:43:19');
INSERT INTO `mrhu_access_log` VALUES ('999', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:43:45');
INSERT INTO `mrhu_access_log` VALUES ('1000', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:43:57');
INSERT INTO `mrhu_access_log` VALUES ('1001', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:44:44');
INSERT INTO `mrhu_access_log` VALUES ('1002', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:45:01');
INSERT INTO `mrhu_access_log` VALUES ('1003', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:45:11');
INSERT INTO `mrhu_access_log` VALUES ('1004', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:45:20');
INSERT INTO `mrhu_access_log` VALUES ('1005', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:45:20');
INSERT INTO `mrhu_access_log` VALUES ('1006', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:45:20');
INSERT INTO `mrhu_access_log` VALUES ('1007', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:46:17');
INSERT INTO `mrhu_access_log` VALUES ('1008', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:48:49');
INSERT INTO `mrhu_access_log` VALUES ('1009', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:49:08');
INSERT INTO `mrhu_access_log` VALUES ('1010', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:49:15');
INSERT INTO `mrhu_access_log` VALUES ('1011', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:49:38');
INSERT INTO `mrhu_access_log` VALUES ('1012', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:49:49');
INSERT INTO `mrhu_access_log` VALUES ('1013', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-photo.htm', '2017-11-03 17:49:55');
INSERT INTO `mrhu_access_log` VALUES ('1014', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:49:59');
INSERT INTO `mrhu_access_log` VALUES ('1015', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:50:08');
INSERT INTO `mrhu_access_log` VALUES ('1016', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-photo.htm', '2017-11-03 17:50:10');
INSERT INTO `mrhu_access_log` VALUES ('1017', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-photo-currentPage-2-pagesize-4.htm', '2017-11-03 17:50:14');
INSERT INTO `mrhu_access_log` VALUES ('1018', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-photo-currentPage-1-pagesize-4.htm', '2017-11-03 17:50:19');
INSERT INTO `mrhu_access_log` VALUES ('1019', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-photo-currentPage-2-pagesize-4.htm', '2017-11-03 17:50:22');
INSERT INTO `mrhu_access_log` VALUES ('1020', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo-currentPage-1-pagesize-4.htm', '2017-11-03 17:50:24');
INSERT INTO `mrhu_access_log` VALUES ('1021', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video.htm', '2017-11-03 17:50:26');
INSERT INTO `mrhu_access_log` VALUES ('1022', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-concert.htm', '2017-11-03 17:50:27');
INSERT INTO `mrhu_access_log` VALUES ('1023', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video.htm', '2017-11-03 17:50:28');
INSERT INTO `mrhu_access_log` VALUES ('1024', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-video-type-concert.htm', '2017-11-03 17:50:30');
INSERT INTO `mrhu_access_log` VALUES ('1025', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice.htm', '2017-11-03 17:50:33');
INSERT INTO `mrhu_access_log` VALUES ('1026', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-11-03 17:50:35');
INSERT INTO `mrhu_access_log` VALUES ('1027', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-11-03 17:50:37');
INSERT INTO `mrhu_access_log` VALUES ('1028', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-11-03 17:50:40');
INSERT INTO `mrhu_access_log` VALUES ('1029', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-photo.htm', '2017-11-03 17:50:41');
INSERT INTO `mrhu_access_log` VALUES ('1030', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-03 17:50:41');
INSERT INTO `mrhu_access_log` VALUES ('1031', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-photo.htm', '2017-11-03 17:50:43');
INSERT INTO `mrhu_access_log` VALUES ('1032', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 17:50:45');
INSERT INTO `mrhu_access_log` VALUES ('1033', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:00:31');
INSERT INTO `mrhu_access_log` VALUES ('1034', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:01:40');
INSERT INTO `mrhu_access_log` VALUES ('1035', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:08:10');
INSERT INTO `mrhu_access_log` VALUES ('1036', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:10:35');
INSERT INTO `mrhu_access_log` VALUES ('1037', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:10:36');
INSERT INTO `mrhu_access_log` VALUES ('1038', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:10:36');
INSERT INTO `mrhu_access_log` VALUES ('1039', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:10:36');
INSERT INTO `mrhu_access_log` VALUES ('1040', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:10:40');
INSERT INTO `mrhu_access_log` VALUES ('1041', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:10:50');
INSERT INTO `mrhu_access_log` VALUES ('1042', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:10:50');
INSERT INTO `mrhu_access_log` VALUES ('1043', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:10:50');
INSERT INTO `mrhu_access_log` VALUES ('1044', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:10:50');
INSERT INTO `mrhu_access_log` VALUES ('1045', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:10:56');
INSERT INTO `mrhu_access_log` VALUES ('1046', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:10:56');
INSERT INTO `mrhu_access_log` VALUES ('1047', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:10:56');
INSERT INTO `mrhu_access_log` VALUES ('1048', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:11:01');
INSERT INTO `mrhu_access_log` VALUES ('1049', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:11:01');
INSERT INTO `mrhu_access_log` VALUES ('1050', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:11:01');
INSERT INTO `mrhu_access_log` VALUES ('1051', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:11:32');
INSERT INTO `mrhu_access_log` VALUES ('1052', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:11:32');
INSERT INTO `mrhu_access_log` VALUES ('1053', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:11:50');
INSERT INTO `mrhu_access_log` VALUES ('1054', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:12:32');
INSERT INTO `mrhu_access_log` VALUES ('1055', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:12:51');
INSERT INTO `mrhu_access_log` VALUES ('1056', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:30:11');
INSERT INTO `mrhu_access_log` VALUES ('1057', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:31:38');
INSERT INTO `mrhu_access_log` VALUES ('1058', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:31:45');
INSERT INTO `mrhu_access_log` VALUES ('1059', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:31:46');
INSERT INTO `mrhu_access_log` VALUES ('1060', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:31:46');
INSERT INTO `mrhu_access_log` VALUES ('1061', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:31:46');
INSERT INTO `mrhu_access_log` VALUES ('1062', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:33:07');
INSERT INTO `mrhu_access_log` VALUES ('1063', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:33:08');
INSERT INTO `mrhu_access_log` VALUES ('1064', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:33:08');
INSERT INTO `mrhu_access_log` VALUES ('1065', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:33:08');
INSERT INTO `mrhu_access_log` VALUES ('1066', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:38:02');
INSERT INTO `mrhu_access_log` VALUES ('1067', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:38:03');
INSERT INTO `mrhu_access_log` VALUES ('1068', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:38:03');
INSERT INTO `mrhu_access_log` VALUES ('1069', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:38:04');
INSERT INTO `mrhu_access_log` VALUES ('1070', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:38:04');
INSERT INTO `mrhu_access_log` VALUES ('1071', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:40:11');
INSERT INTO `mrhu_access_log` VALUES ('1072', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:40:23');
INSERT INTO `mrhu_access_log` VALUES ('1073', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:40:33');
INSERT INTO `mrhu_access_log` VALUES ('1074', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:40:47');
INSERT INTO `mrhu_access_log` VALUES ('1075', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:42:04');
INSERT INTO `mrhu_access_log` VALUES ('1076', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:43:51');
INSERT INTO `mrhu_access_log` VALUES ('1077', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:44:36');
INSERT INTO `mrhu_access_log` VALUES ('1078', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:51:28');
INSERT INTO `mrhu_access_log` VALUES ('1079', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:51:37');
INSERT INTO `mrhu_access_log` VALUES ('1080', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:51:38');
INSERT INTO `mrhu_access_log` VALUES ('1081', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:51:38');
INSERT INTO `mrhu_access_log` VALUES ('1082', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:51:38');
INSERT INTO `mrhu_access_log` VALUES ('1083', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:51:39');
INSERT INTO `mrhu_access_log` VALUES ('1084', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:52:41');
INSERT INTO `mrhu_access_log` VALUES ('1085', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:53:34');
INSERT INTO `mrhu_access_log` VALUES ('1086', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:54:33');
INSERT INTO `mrhu_access_log` VALUES ('1087', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:54:38');
INSERT INTO `mrhu_access_log` VALUES ('1088', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:54:49');
INSERT INTO `mrhu_access_log` VALUES ('1089', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:55:37');
INSERT INTO `mrhu_access_log` VALUES ('1090', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:56:27');
INSERT INTO `mrhu_access_log` VALUES ('1091', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:56:31');
INSERT INTO `mrhu_access_log` VALUES ('1092', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:56:32');
INSERT INTO `mrhu_access_log` VALUES ('1093', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:56:38');
INSERT INTO `mrhu_access_log` VALUES ('1094', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:56:42');
INSERT INTO `mrhu_access_log` VALUES ('1095', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:56:44');
INSERT INTO `mrhu_access_log` VALUES ('1096', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:56:51');
INSERT INTO `mrhu_access_log` VALUES ('1097', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:57:09');
INSERT INTO `mrhu_access_log` VALUES ('1098', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:57:22');
INSERT INTO `mrhu_access_log` VALUES ('1099', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:57:28');
INSERT INTO `mrhu_access_log` VALUES ('1100', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:58:07');
INSERT INTO `mrhu_access_log` VALUES ('1101', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:58:37');
INSERT INTO `mrhu_access_log` VALUES ('1102', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:59:19');
INSERT INTO `mrhu_access_log` VALUES ('1103', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 18:59:29');
INSERT INTO `mrhu_access_log` VALUES ('1104', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:00:40');
INSERT INTO `mrhu_access_log` VALUES ('1105', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:00:47');
INSERT INTO `mrhu_access_log` VALUES ('1106', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:00:48');
INSERT INTO `mrhu_access_log` VALUES ('1107', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:01:11');
INSERT INTO `mrhu_access_log` VALUES ('1108', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:01:55');
INSERT INTO `mrhu_access_log` VALUES ('1109', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:02:13');
INSERT INTO `mrhu_access_log` VALUES ('1110', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:02:53');
INSERT INTO `mrhu_access_log` VALUES ('1111', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:03:09');
INSERT INTO `mrhu_access_log` VALUES ('1112', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:04:55');
INSERT INTO `mrhu_access_log` VALUES ('1113', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:05:16');
INSERT INTO `mrhu_access_log` VALUES ('1114', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:05:26');
INSERT INTO `mrhu_access_log` VALUES ('1115', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:06:06');
INSERT INTO `mrhu_access_log` VALUES ('1116', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:06:22');
INSERT INTO `mrhu_access_log` VALUES ('1117', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:06:34');
INSERT INTO `mrhu_access_log` VALUES ('1118', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:06:34');
INSERT INTO `mrhu_access_log` VALUES ('1119', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:06:39');
INSERT INTO `mrhu_access_log` VALUES ('1120', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:06:45');
INSERT INTO `mrhu_access_log` VALUES ('1121', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:07:02');
INSERT INTO `mrhu_access_log` VALUES ('1122', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:08:43');
INSERT INTO `mrhu_access_log` VALUES ('1123', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:08:45');
INSERT INTO `mrhu_access_log` VALUES ('1124', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:08:45');
INSERT INTO `mrhu_access_log` VALUES ('1125', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:08:46');
INSERT INTO `mrhu_access_log` VALUES ('1126', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-03 19:09:49');
INSERT INTO `mrhu_access_log` VALUES ('1127', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-photo.htm', '2017-11-03 19:09:56');
INSERT INTO `mrhu_access_log` VALUES ('1128', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-photo-currentPage-2-pagesize-4.htm', '2017-11-03 19:10:02');
INSERT INTO `mrhu_access_log` VALUES ('1129', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-photo-currentPage-1-pagesize-4.htm', '2017-11-03 19:10:07');
INSERT INTO `mrhu_access_log` VALUES ('1130', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-photo-currentPage-1-pagesize-4.htm', '2017-11-06 10:14:18');
INSERT INTO `mrhu_access_log` VALUES ('1131', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice.htm', '2017-11-06 10:14:20');
INSERT INTO `mrhu_access_log` VALUES ('1132', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-06 10:14:21');
INSERT INTO `mrhu_access_log` VALUES ('1133', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-photo.htm', '2017-11-06 10:14:21');
INSERT INTO `mrhu_access_log` VALUES ('1134', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article.htm', '2017-11-06 10:14:22');
INSERT INTO `mrhu_access_log` VALUES ('1135', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-video.htm', '2017-11-06 10:14:23');
INSERT INTO `mrhu_access_log` VALUES ('1136', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-album.htm', '2017-11-06 10:14:23');
INSERT INTO `mrhu_access_log` VALUES ('1137', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-awards.htm', '2017-11-06 10:15:50');
INSERT INTO `mrhu_access_log` VALUES ('1138', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-06 10:15:50');
INSERT INTO `mrhu_access_log` VALUES ('1139', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-photo.htm', '2017-11-06 10:15:51');
INSERT INTO `mrhu_access_log` VALUES ('1140', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-article.htm', '2017-11-06 10:15:51');
INSERT INTO `mrhu_access_log` VALUES ('1141', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-video.htm', '2017-11-06 10:15:52');
INSERT INTO `mrhu_access_log` VALUES ('1142', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-album.htm', '2017-11-06 10:15:53');
INSERT INTO `mrhu_access_log` VALUES ('1143', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'index', 'index', 'http://tiger.lc/home-awards.htm', '2017-11-06 10:15:53');
INSERT INTO `mrhu_access_log` VALUES ('1144', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'index', 'index', 'http://tiger.lc/home-awards.htm', '2017-11-06 10:16:18');
INSERT INTO `mrhu_access_log` VALUES ('1145', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/', '2017-11-06 10:16:20');
INSERT INTO `mrhu_access_log` VALUES ('1146', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice.htm', '2017-11-06 10:16:22');
INSERT INTO `mrhu_access_log` VALUES ('1147', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-11-06 10:16:26');
INSERT INTO `mrhu_access_log` VALUES ('1148', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-album.htm', '2017-11-06 10:16:26');
INSERT INTO `mrhu_access_log` VALUES ('1149', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-awards.htm', '2017-11-06 10:16:27');
INSERT INTO `mrhu_access_log` VALUES ('1150', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-video.htm', '2017-11-06 10:16:29');
INSERT INTO `mrhu_access_log` VALUES ('1151', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-album.htm', '2017-11-06 10:16:34');
INSERT INTO `mrhu_access_log` VALUES ('1152', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-awards.htm', '2017-11-06 10:17:48');
INSERT INTO `mrhu_access_log` VALUES ('1153', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-photo.htm', '2017-11-06 10:18:13');
INSERT INTO `mrhu_access_log` VALUES ('1154', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-awards.htm', '2017-11-06 10:18:15');
INSERT INTO `mrhu_access_log` VALUES ('1155', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-photo.htm', '2017-11-06 10:18:21');
INSERT INTO `mrhu_access_log` VALUES ('1156', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'index', 'index', 'http://tiger.lc/home-album.htm', '2017-11-06 10:20:24');
INSERT INTO `mrhu_access_log` VALUES ('1157', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 10:20:27');
INSERT INTO `mrhu_access_log` VALUES ('1158', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 10:30:39');
INSERT INTO `mrhu_access_log` VALUES ('1159', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 10:30:41');
INSERT INTO `mrhu_access_log` VALUES ('1160', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 10:30:43');
INSERT INTO `mrhu_access_log` VALUES ('1161', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 10:31:18');
INSERT INTO `mrhu_access_log` VALUES ('1162', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 10:31:20');
INSERT INTO `mrhu_access_log` VALUES ('1163', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 10:31:24');
INSERT INTO `mrhu_access_log` VALUES ('1164', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 10:31:28');
INSERT INTO `mrhu_access_log` VALUES ('1165', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 10:31:30');
INSERT INTO `mrhu_access_log` VALUES ('1166', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 10:31:58');
INSERT INTO `mrhu_access_log` VALUES ('1167', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 10:32:06');
INSERT INTO `mrhu_access_log` VALUES ('1168', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 10:32:06');
INSERT INTO `mrhu_access_log` VALUES ('1169', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 10:32:06');
INSERT INTO `mrhu_access_log` VALUES ('1170', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 10:32:14');
INSERT INTO `mrhu_access_log` VALUES ('1171', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 10:40:04');
INSERT INTO `mrhu_access_log` VALUES ('1172', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:07:25');
INSERT INTO `mrhu_access_log` VALUES ('1173', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:07:41');
INSERT INTO `mrhu_access_log` VALUES ('1174', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:16:27');
INSERT INTO `mrhu_access_log` VALUES ('1175', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:17:31');
INSERT INTO `mrhu_access_log` VALUES ('1176', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:18:39');
INSERT INTO `mrhu_access_log` VALUES ('1177', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:18:58');
INSERT INTO `mrhu_access_log` VALUES ('1178', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:18:58');
INSERT INTO `mrhu_access_log` VALUES ('1179', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:18:59');
INSERT INTO `mrhu_access_log` VALUES ('1180', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:18:59');
INSERT INTO `mrhu_access_log` VALUES ('1181', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:18:59');
INSERT INTO `mrhu_access_log` VALUES ('1182', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:18:59');
INSERT INTO `mrhu_access_log` VALUES ('1183', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'index', 'index', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 11:29:09');
INSERT INTO `mrhu_access_log` VALUES ('1184', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 11:29:53');
INSERT INTO `mrhu_access_log` VALUES ('1185', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:30:59');
INSERT INTO `mrhu_access_log` VALUES ('1186', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 11:31:07');
INSERT INTO `mrhu_access_log` VALUES ('1187', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album.htm', '2017-11-06 11:31:22');
INSERT INTO `mrhu_access_log` VALUES ('1188', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-3.htm', '2017-11-06 11:31:26');
INSERT INTO `mrhu_access_log` VALUES ('1189', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-4.htm', '2017-11-06 11:31:29');
INSERT INTO `mrhu_access_log` VALUES ('1190', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-5.htm', '2017-11-06 11:31:32');
INSERT INTO `mrhu_access_log` VALUES ('1191', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-5-currentPage-6-pagesize-4.htm', '2017-11-06 11:31:34');
INSERT INTO `mrhu_access_log` VALUES ('1192', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-25.htm', '2017-11-06 11:31:55');
INSERT INTO `mrhu_access_log` VALUES ('1193', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-album_music-id-6.htm', '2017-11-06 11:32:12');
INSERT INTO `mrhu_access_log` VALUES ('1194', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-06 11:32:19');
INSERT INTO `mrhu_access_log` VALUES ('1195', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-video.htm', '2017-11-06 11:33:24');
INSERT INTO `mrhu_access_log` VALUES ('1196', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video_detail-id-6.htm', '2017-11-06 11:33:28');
INSERT INTO `mrhu_access_log` VALUES ('1197', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video.htm', '2017-11-06 11:33:31');
INSERT INTO `mrhu_access_log` VALUES ('1198', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-mv.htm', '2017-11-06 11:33:48');
INSERT INTO `mrhu_access_log` VALUES ('1199', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-video-type-live.htm', '2017-11-06 11:33:51');
INSERT INTO `mrhu_access_log` VALUES ('1200', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-video-type-all.htm', '2017-11-06 11:33:53');
INSERT INTO `mrhu_access_log` VALUES ('1201', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-11-06 11:34:02');
INSERT INTO `mrhu_access_log` VALUES ('1202', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-11-06 11:34:27');
INSERT INTO `mrhu_access_log` VALUES ('1203', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-11-06 11:34:29');
INSERT INTO `mrhu_access_log` VALUES ('1204', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-11-06 11:34:31');
INSERT INTO `mrhu_access_log` VALUES ('1205', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article_detail-id-6.htm', '2017-11-06 11:34:33');
INSERT INTO `mrhu_access_log` VALUES ('1206', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article_detail-id-2.htm', '2017-11-06 11:34:38');
INSERT INTO `mrhu_access_log` VALUES ('1207', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-photo.htm', '2017-11-06 11:35:17');
INSERT INTO `mrhu_access_log` VALUES ('1208', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video_detail', 'video_detail', 'http://tiger.lc/home-photo-currentPage-2-pagesize-4.htm', '2017-11-06 11:35:41');
INSERT INTO `mrhu_access_log` VALUES ('1209', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-photo.htm', '2017-11-06 11:35:44');
INSERT INTO `mrhu_access_log` VALUES ('1210', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-photo-currentPage-2-pagesize-4.htm', '2017-11-06 11:36:29');
INSERT INTO `mrhu_access_log` VALUES ('1211', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice.htm', '2017-11-06 11:36:33');
INSERT INTO `mrhu_access_log` VALUES ('1212', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-11-06 11:36:46');
INSERT INTO `mrhu_access_log` VALUES ('1213', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-11-06 11:36:51');
INSERT INTO `mrhu_access_log` VALUES ('1214', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-11-06 11:36:53');
INSERT INTO `mrhu_access_log` VALUES ('1215', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-11-06 11:37:00');
INSERT INTO `mrhu_access_log` VALUES ('1216', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017.htm', '2017-11-06 11:37:04');
INSERT INTO `mrhu_access_log` VALUES ('1217', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-11-06 11:37:07');
INSERT INTO `mrhu_access_log` VALUES ('1218', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'index', 'index', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-11-06 11:38:12');
INSERT INTO `mrhu_access_log` VALUES ('1219', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/', '2017-11-06 11:38:14');
INSERT INTO `mrhu_access_log` VALUES ('1220', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:38:16');
INSERT INTO `mrhu_access_log` VALUES ('1221', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 11:38:21');
INSERT INTO `mrhu_access_log` VALUES ('1222', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album.htm', '2017-11-06 11:38:27');
INSERT INTO `mrhu_access_log` VALUES ('1223', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-6.htm', '2017-11-06 11:38:37');
INSERT INTO `mrhu_access_log` VALUES ('1224', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-3.htm', '2017-11-06 11:38:39');
INSERT INTO `mrhu_access_log` VALUES ('1225', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-album_music-id-4.htm', '2017-11-06 11:39:03');
INSERT INTO `mrhu_access_log` VALUES ('1226', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-album.htm', '2017-11-06 11:39:04');
INSERT INTO `mrhu_access_log` VALUES ('1227', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-awards.htm', '2017-11-06 11:39:46');
INSERT INTO `mrhu_access_log` VALUES ('1228', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album.htm', '2017-11-06 11:39:47');
INSERT INTO `mrhu_access_log` VALUES ('1229', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-6.htm', '2017-11-06 11:39:51');
INSERT INTO `mrhu_access_log` VALUES ('1230', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-album_music-id-3.htm', '2017-11-06 11:39:53');
INSERT INTO `mrhu_access_log` VALUES ('1231', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-album_music-id-4.htm', '2017-11-06 11:40:24');
INSERT INTO `mrhu_access_log` VALUES ('1232', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-article.htm', '2017-11-06 11:41:05');
INSERT INTO `mrhu_access_log` VALUES ('1233', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice.htm', '2017-11-06 11:41:07');
INSERT INTO `mrhu_access_log` VALUES ('1234', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-article.htm', '2017-11-06 11:41:08');
INSERT INTO `mrhu_access_log` VALUES ('1235', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-notice.htm', '2017-11-06 11:41:13');
INSERT INTO `mrhu_access_log` VALUES ('1236', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-photo.htm', '2017-11-06 11:41:16');
INSERT INTO `mrhu_access_log` VALUES ('1237', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-album.htm', '2017-11-06 11:41:17');
INSERT INTO `mrhu_access_log` VALUES ('1238', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-video.htm', '2017-11-06 11:41:18');
INSERT INTO `mrhu_access_log` VALUES ('1239', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-album.htm', '2017-11-06 11:41:18');
INSERT INTO `mrhu_access_log` VALUES ('1240', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-video.htm', '2017-11-06 11:41:19');
INSERT INTO `mrhu_access_log` VALUES ('1241', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-06 11:57:00');
INSERT INTO `mrhu_access_log` VALUES ('1242', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-06 12:02:41');
INSERT INTO `mrhu_access_log` VALUES ('1243', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-06 12:02:41');
INSERT INTO `mrhu_access_log` VALUES ('1244', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-06 12:02:42');
INSERT INTO `mrhu_access_log` VALUES ('1245', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-06 12:02:42');
INSERT INTO `mrhu_access_log` VALUES ('1246', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-06 12:02:45');
INSERT INTO `mrhu_access_log` VALUES ('1247', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-06 12:02:45');
INSERT INTO `mrhu_access_log` VALUES ('1248', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-06 12:02:45');
INSERT INTO `mrhu_access_log` VALUES ('1249', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-album.htm', '2017-11-06 12:02:46');
INSERT INTO `mrhu_access_log` VALUES ('1250', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-photo.htm', '2017-11-06 12:06:46');
INSERT INTO `mrhu_access_log` VALUES ('1251', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-photo.htm', '2017-11-06 12:06:49');
INSERT INTO `mrhu_access_log` VALUES ('1252', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-photo.htm', '2017-11-06 12:06:54');
INSERT INTO `mrhu_access_log` VALUES ('1253', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-photo.htm', '2017-11-06 12:06:55');
INSERT INTO `mrhu_access_log` VALUES ('1254', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-photo.htm', '2017-11-06 12:07:09');
INSERT INTO `mrhu_access_log` VALUES ('1255', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-photo.htm', '2017-11-06 12:07:11');
INSERT INTO `mrhu_access_log` VALUES ('1256', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-11-06 12:07:11');
INSERT INTO `mrhu_access_log` VALUES ('1257', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article_detail', 'article_detail', 'http://tiger.lc/home-article.htm', '2017-11-06 12:07:12');
INSERT INTO `mrhu_access_log` VALUES ('1258', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-article_detail-id-1.htm', '2017-11-06 14:45:00');
INSERT INTO `mrhu_access_log` VALUES ('1259', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 14:45:03');
INSERT INTO `mrhu_access_log` VALUES ('1260', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 14:46:06');
INSERT INTO `mrhu_access_log` VALUES ('1261', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 14:46:07');
INSERT INTO `mrhu_access_log` VALUES ('1262', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 14:46:14');
INSERT INTO `mrhu_access_log` VALUES ('1263', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 14:58:14');
INSERT INTO `mrhu_access_log` VALUES ('1264', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 14:58:24');
INSERT INTO `mrhu_access_log` VALUES ('1265', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 14:58:27');
INSERT INTO `mrhu_access_log` VALUES ('1266', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-concert.htm', '2017-11-06 14:58:28');
INSERT INTO `mrhu_access_log` VALUES ('1267', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-06 14:58:30');
INSERT INTO `mrhu_access_log` VALUES ('1268', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-06 14:58:34');
INSERT INTO `mrhu_access_log` VALUES ('1269', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-06 14:59:32');
INSERT INTO `mrhu_access_log` VALUES ('1270', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-06 14:59:34');
INSERT INTO `mrhu_access_log` VALUES ('1271', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-06 14:59:35');
INSERT INTO `mrhu_access_log` VALUES ('1272', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 14:59:40');
INSERT INTO `mrhu_access_log` VALUES ('1273', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 14:59:43');
INSERT INTO `mrhu_access_log` VALUES ('1274', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 15:03:17');
INSERT INTO `mrhu_access_log` VALUES ('1275', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 15:03:37');
INSERT INTO `mrhu_access_log` VALUES ('1276', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 16:11:10');
INSERT INTO `mrhu_access_log` VALUES ('1277', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 16:19:40');
INSERT INTO `mrhu_access_log` VALUES ('1278', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 17:11:55');
INSERT INTO `mrhu_access_log` VALUES ('1279', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 17:12:30');
INSERT INTO `mrhu_access_log` VALUES ('1280', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 17:14:19');
INSERT INTO `mrhu_access_log` VALUES ('1281', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 18:38:37');
INSERT INTO `mrhu_access_log` VALUES ('1282', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-photo.htm', '2017-11-06 18:38:37');
INSERT INTO `mrhu_access_log` VALUES ('1283', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice.htm', '2017-11-06 18:38:39');
INSERT INTO `mrhu_access_log` VALUES ('1284', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'article', 'article', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-11-06 18:41:49');
INSERT INTO `mrhu_access_log` VALUES ('1285', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'photo', 'photo', 'http://tiger.lc/home-article.htm', '2017-11-06 18:41:50');
INSERT INTO `mrhu_access_log` VALUES ('1286', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'video', 'video', 'http://tiger.lc/home-photo.htm', '2017-11-06 18:41:51');
INSERT INTO `mrhu_access_log` VALUES ('1287', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-video.htm', '2017-11-06 18:41:51');
INSERT INTO `mrhu_access_log` VALUES ('1288', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-album.htm', '2017-11-06 18:41:52');
INSERT INTO `mrhu_access_log` VALUES ('1289', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:41:55');
INSERT INTO `mrhu_access_log` VALUES ('1290', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:45:22');
INSERT INTO `mrhu_access_log` VALUES ('1291', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:46:22');
INSERT INTO `mrhu_access_log` VALUES ('1292', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:47:40');
INSERT INTO `mrhu_access_log` VALUES ('1293', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:49:29');
INSERT INTO `mrhu_access_log` VALUES ('1294', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:49:29');
INSERT INTO `mrhu_access_log` VALUES ('1295', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:52:33');
INSERT INTO `mrhu_access_log` VALUES ('1296', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:53:46');
INSERT INTO `mrhu_access_log` VALUES ('1297', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:53:54');
INSERT INTO `mrhu_access_log` VALUES ('1298', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:55:33');
INSERT INTO `mrhu_access_log` VALUES ('1299', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:55:34');
INSERT INTO `mrhu_access_log` VALUES ('1300', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:55:45');
INSERT INTO `mrhu_access_log` VALUES ('1301', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:56:20');
INSERT INTO `mrhu_access_log` VALUES ('1302', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 18:56:25');
INSERT INTO `mrhu_access_log` VALUES ('1303', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-concert.htm', '2017-11-06 18:56:27');
INSERT INTO `mrhu_access_log` VALUES ('1304', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 18:56:29');
INSERT INTO `mrhu_access_log` VALUES ('1305', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-album_music-id-9.htm', '2017-11-06 18:56:32');
INSERT INTO `mrhu_access_log` VALUES ('1306', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:56:32');
INSERT INTO `mrhu_access_log` VALUES ('1307', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-album.htm', '2017-11-06 18:56:33');
INSERT INTO `mrhu_access_log` VALUES ('1308', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:56:37');
INSERT INTO `mrhu_access_log` VALUES ('1309', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album_music', 'album_music', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 18:58:22');
INSERT INTO `mrhu_access_log` VALUES ('1310', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:58:24');
INSERT INTO `mrhu_access_log` VALUES ('1311', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 18:58:33');
INSERT INTO `mrhu_access_log` VALUES ('1312', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 18:59:03');
INSERT INTO `mrhu_access_log` VALUES ('1313', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-concert.htm', '2017-11-06 18:59:04');
INSERT INTO `mrhu_access_log` VALUES ('1314', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-06 18:59:05');
INSERT INTO `mrhu_access_log` VALUES ('1315', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-06 18:59:06');
INSERT INTO `mrhu_access_log` VALUES ('1316', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-concert.htm', '2017-11-06 18:59:07');
INSERT INTO `mrhu_access_log` VALUES ('1317', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 18:59:51');
INSERT INTO `mrhu_access_log` VALUES ('1318', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'album', 'album', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 18:59:53');
INSERT INTO `mrhu_access_log` VALUES ('1319', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-album-currentPage-1-pagesize-9.htm', '2017-11-06 18:59:55');
INSERT INTO `mrhu_access_log` VALUES ('1320', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-06 18:59:57');
INSERT INTO `mrhu_access_log` VALUES ('1321', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 18:59:59');
INSERT INTO `mrhu_access_log` VALUES ('1322', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-currentPage-1-pagesize-9.htm', '2017-11-06 19:00:08');
INSERT INTO `mrhu_access_log` VALUES ('1323', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-currentPage-1-pagesize-9.htm', '2017-11-06 19:00:08');
INSERT INTO `mrhu_access_log` VALUES ('1324', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-currentPage-1-pagesize-9.htm', '2017-11-06 19:00:09');
INSERT INTO `mrhu_access_log` VALUES ('1325', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', '', '2017-11-06 19:00:16');
INSERT INTO `mrhu_access_log` VALUES ('1326', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', '', '2017-11-06 19:00:18');
INSERT INTO `mrhu_access_log` VALUES ('1327', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-currentPage-1-pagesize-9.htm', '2017-11-06 19:00:21');
INSERT INTO `mrhu_access_log` VALUES ('1328', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-currentPage-1-pagesize-9.htm', '2017-11-06 19:00:39');
INSERT INTO `mrhu_access_log` VALUES ('1329', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-06 19:00:41');
INSERT INTO `mrhu_access_log` VALUES ('1330', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album-currentPage-1-pagesize-9.htm', '2017-11-06 19:00:44');
INSERT INTO `mrhu_access_log` VALUES ('1331', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album-currentPage-1-pagesize-9.htm', '2017-11-06 19:00:45');
INSERT INTO `mrhu_access_log` VALUES ('1332', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-concert.htm', '2017-11-06 19:00:46');
INSERT INTO `mrhu_access_log` VALUES ('1333', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-06 19:00:47');
INSERT INTO `mrhu_access_log` VALUES ('1334', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-06 19:02:44');
INSERT INTO `mrhu_access_log` VALUES ('1335', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-06 19:03:25');
INSERT INTO `mrhu_access_log` VALUES ('1336', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-07 10:10:59');
INSERT INTO `mrhu_access_log` VALUES ('1337', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 10:38:57');
INSERT INTO `mrhu_access_log` VALUES ('1338', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 10:41:44');
INSERT INTO `mrhu_access_log` VALUES ('1339', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 10:41:45');
INSERT INTO `mrhu_access_log` VALUES ('1340', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 10:41:45');
INSERT INTO `mrhu_access_log` VALUES ('1341', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 10:41:46');
INSERT INTO `mrhu_access_log` VALUES ('1342', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:13:24');
INSERT INTO `mrhu_access_log` VALUES ('1343', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:13:24');
INSERT INTO `mrhu_access_log` VALUES ('1344', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:13:24');
INSERT INTO `mrhu_access_log` VALUES ('1345', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:13:25');
INSERT INTO `mrhu_access_log` VALUES ('1346', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:19:08');
INSERT INTO `mrhu_access_log` VALUES ('1347', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:19:09');
INSERT INTO `mrhu_access_log` VALUES ('1348', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:19:10');
INSERT INTO `mrhu_access_log` VALUES ('1349', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:20:23');
INSERT INTO `mrhu_access_log` VALUES ('1350', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:21:12');
INSERT INTO `mrhu_access_log` VALUES ('1351', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:22:04');
INSERT INTO `mrhu_access_log` VALUES ('1352', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:23:27');
INSERT INTO `mrhu_access_log` VALUES ('1353', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:23:29');
INSERT INTO `mrhu_access_log` VALUES ('1354', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:23:36');
INSERT INTO `mrhu_access_log` VALUES ('1355', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:23:36');
INSERT INTO `mrhu_access_log` VALUES ('1356', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:23:37');
INSERT INTO `mrhu_access_log` VALUES ('1357', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:23:37');
INSERT INTO `mrhu_access_log` VALUES ('1358', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:23:47');
INSERT INTO `mrhu_access_log` VALUES ('1359', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:30:41');
INSERT INTO `mrhu_access_log` VALUES ('1360', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:31:11');
INSERT INTO `mrhu_access_log` VALUES ('1361', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:31:29');
INSERT INTO `mrhu_access_log` VALUES ('1362', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:31:32');
INSERT INTO `mrhu_access_log` VALUES ('1363', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 11:31:45');
INSERT INTO `mrhu_access_log` VALUES ('1364', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice.htm', '2017-11-07 11:31:52');
INSERT INTO `mrhu_access_log` VALUES ('1365', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-10.htm', '2017-11-07 11:31:55');
INSERT INTO `mrhu_access_log` VALUES ('1366', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'notice', 'notice', 'http://tiger.lc/home-notice-year-2017-month-9.htm', '2017-11-07 11:31:57');
INSERT INTO `mrhu_access_log` VALUES ('1367', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'awards', 'awards', 'http://tiger.lc/home-notice-year-2017-month-11.htm', '2017-11-07 12:14:59');
INSERT INTO `mrhu_access_log` VALUES ('1368', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-awards.htm', '2017-11-07 12:15:01');
INSERT INTO `mrhu_access_log` VALUES ('1369', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 12:15:04');
INSERT INTO `mrhu_access_log` VALUES ('1370', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 12:21:01');
INSERT INTO `mrhu_access_log` VALUES ('1371', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 12:21:02');
INSERT INTO `mrhu_access_log` VALUES ('1372', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:38:33');
INSERT INTO `mrhu_access_log` VALUES ('1373', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:40:18');
INSERT INTO `mrhu_access_log` VALUES ('1374', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:48:21');
INSERT INTO `mrhu_access_log` VALUES ('1375', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:48:22');
INSERT INTO `mrhu_access_log` VALUES ('1376', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:48:22');
INSERT INTO `mrhu_access_log` VALUES ('1377', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:48:22');
INSERT INTO `mrhu_access_log` VALUES ('1378', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:48:24');
INSERT INTO `mrhu_access_log` VALUES ('1379', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:49:46');
INSERT INTO `mrhu_access_log` VALUES ('1380', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:50:11');
INSERT INTO `mrhu_access_log` VALUES ('1381', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:52:00');
INSERT INTO `mrhu_access_log` VALUES ('1382', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:52:32');
INSERT INTO `mrhu_access_log` VALUES ('1383', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:52:58');
INSERT INTO `mrhu_access_log` VALUES ('1384', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:58:41');
INSERT INTO `mrhu_access_log` VALUES ('1385', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:59:27');
INSERT INTO `mrhu_access_log` VALUES ('1386', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 16:59:54');
INSERT INTO `mrhu_access_log` VALUES ('1387', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-concert.htm', '2017-11-07 16:59:57');
INSERT INTO `mrhu_access_log` VALUES ('1388', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-07 17:03:30');
INSERT INTO `mrhu_access_log` VALUES ('1389', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-concert.htm', '2017-11-07 17:04:49');
INSERT INTO `mrhu_access_log` VALUES ('1390', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-07 17:04:50');
INSERT INTO `mrhu_access_log` VALUES ('1391', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-07 17:04:52');
INSERT INTO `mrhu_access_log` VALUES ('1392', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 17:04:53');
INSERT INTO `mrhu_access_log` VALUES ('1393', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-07 17:05:03');
INSERT INTO `mrhu_access_log` VALUES ('1394', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-07 17:05:43');
INSERT INTO `mrhu_access_log` VALUES ('1395', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-07 17:05:44');
INSERT INTO `mrhu_access_log` VALUES ('1396', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-movie.htm', '2017-11-07 17:05:45');
INSERT INTO `mrhu_access_log` VALUES ('1397', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-film.htm', '2017-11-07 17:05:53');
INSERT INTO `mrhu_access_log` VALUES ('1398', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 17:06:05');
INSERT INTO `mrhu_access_log` VALUES ('1399', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 17:06:54');
INSERT INTO `mrhu_access_log` VALUES ('1400', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 17:07:00');
INSERT INTO `mrhu_access_log` VALUES ('1401', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 17:07:42');
INSERT INTO `mrhu_access_log` VALUES ('1402', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-concert.htm', '2017-11-07 17:07:49');
INSERT INTO `mrhu_access_log` VALUES ('1403', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-concert.htm', '2017-11-07 17:08:09');
INSERT INTO `mrhu_access_log` VALUES ('1404', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-film.htm', '2017-11-07 17:08:14');
INSERT INTO `mrhu_access_log` VALUES ('1405', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 17:09:16');
INSERT INTO `mrhu_access_log` VALUES ('1406', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 17:09:28');
INSERT INTO `mrhu_access_log` VALUES ('1407', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-film.htm', '2017-11-07 17:09:29');
INSERT INTO `mrhu_access_log` VALUES ('1408', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 17:09:37');
INSERT INTO `mrhu_access_log` VALUES ('1409', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 17:11:16');
INSERT INTO `mrhu_access_log` VALUES ('1410', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-concert.htm', '2017-11-07 17:11:19');
INSERT INTO `mrhu_access_log` VALUES ('1411', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-film.htm', '2017-11-07 17:11:21');
INSERT INTO `mrhu_access_log` VALUES ('1412', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-film-currentPage-1-pagesize-9.htm', '2017-11-07 17:11:23');
INSERT INTO `mrhu_access_log` VALUES ('1413', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 17:11:24');
INSERT INTO `mrhu_access_log` VALUES ('1414', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-variety.htm', '2017-11-07 17:12:34');
INSERT INTO `mrhu_access_log` VALUES ('1415', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-album.htm', '2017-11-07 17:12:37');
INSERT INTO `mrhu_access_log` VALUES ('1416', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-concert.htm', '2017-11-07 17:12:39');
INSERT INTO `mrhu_access_log` VALUES ('1417', '192.168.226.1', 'Windows 10', 'Chrome(61.0.3163.100)', '', 'home', 'works', 'works', 'http://tiger.lc/home-works-type-concert.htm', '2017-11-07 17:18:23');

-- ----------------------------
-- Table structure for mrhu_album_music
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_album_music`;
CREATE TABLE "mrhu_album_music" (
  "art_music_id" int(11) NOT NULL,
  "media_id" int(11) NOT NULL,
  UNIQUE KEY "album_music_index" ("art_music_id","media_id") USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mrhu_album_music
-- ----------------------------
INSERT INTO `mrhu_album_music` VALUES ('0', '1');
INSERT INTO `mrhu_album_music` VALUES ('1', '5');
INSERT INTO `mrhu_album_music` VALUES ('2', '1');
INSERT INTO `mrhu_album_music` VALUES ('3', '5');
INSERT INTO `mrhu_album_music` VALUES ('4', '1');
INSERT INTO `mrhu_album_music` VALUES ('4', '5');
INSERT INTO `mrhu_album_music` VALUES ('5', '1');
INSERT INTO `mrhu_album_music` VALUES ('5', '5');
INSERT INTO `mrhu_album_music` VALUES ('6', '6');
INSERT INTO `mrhu_album_music` VALUES ('6', '7');
INSERT INTO `mrhu_album_music` VALUES ('7', '7');

-- ----------------------------
-- Table structure for mrhu_art_image
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_art_image`;
CREATE TABLE "mrhu_art_image" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT '图片id',
  "cat_id" int(11) NOT NULL COMMENT '分类id',
  "name" varchar(255) NOT NULL COMMENT '图片名',
  "overview" text NOT NULL COMMENT '简略描述',
  "image_id" int(11) NOT NULL COMMENT '图片素材id',
  "order_by" int(11) NOT NULL COMMENT '排序',
  "add_by" int(11) NOT NULL COMMENT '添加人',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  "edit_by" int(11) NOT NULL COMMENT '修改人',
  "edit_time" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  "delete" int(1) NOT NULL DEFAULT '0' COMMENT '0：未删除；1：删除；',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='图片展示表';

-- ----------------------------
-- Records of mrhu_art_image
-- ----------------------------
INSERT INTO `mrhu_art_image` VALUES ('1', '0', '图片展示1', '图片展示1《》', '7', '50', '1', '2017-08-25 17:19:38', '1', '2017-08-25 17:20:06', '1');
INSERT INTO `mrhu_art_image` VALUES ('2', '0', '图片2', '图片展示2', '7', '50', '1', '2017-08-25 17:19:58', '1', '2017-11-03 12:22:09', '0');
INSERT INTO `mrhu_art_image` VALUES ('3', '0', '图片1', '', '1', '50', '1', '2017-11-03 12:21:59', '1', '2017-11-03 12:21:59', '0');
INSERT INTO `mrhu_art_image` VALUES ('4', '0', '图片3', '', '9', '50', '1', '2017-11-03 12:22:21', '1', '2017-11-03 12:22:21', '0');
INSERT INTO `mrhu_art_image` VALUES ('5', '0', '图片4', '', '25', '50', '1', '2017-11-03 12:22:31', '1', '2017-11-03 12:22:31', '0');
INSERT INTO `mrhu_art_image` VALUES ('6', '0', '图片5', '', '26', '50', '1', '2017-11-03 12:22:39', '1', '2017-11-03 12:22:39', '0');

-- ----------------------------
-- Table structure for mrhu_art_music
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_art_music`;
CREATE TABLE "mrhu_art_music" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT '音频id',
  "cat_id" int(11) NOT NULL COMMENT '分类id',
  "name" varchar(255) NOT NULL COMMENT '音频名',
  "overview" text NOT NULL COMMENT '简略描述',
  "media_id" int(11) NOT NULL COMMENT '媒体id',
  "order_by" int(11) NOT NULL COMMENT '排序',
  "add_by" int(11) NOT NULL COMMENT '添加人',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  "edit_by" int(11) NOT NULL COMMENT '修改人',
  "edit_time" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  "delete" int(1) NOT NULL DEFAULT '0' COMMENT '0：未删除；1：删除；',
  "publish_time" varchar(10) DEFAULT NULL COMMENT '发布时间',
  "media_id_s" int(11) DEFAULT NULL COMMENT '大图',
  "minstrel" varchar(255) DEFAULT NULL COMMENT '歌手',
  "style" varchar(255) DEFAULT NULL COMMENT '曲风',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='音频表';

-- ----------------------------
-- Records of mrhu_art_music
-- ----------------------------
INSERT INTO `mrhu_art_music` VALUES ('1', '0', '', '', '0', '50', '1', '2017-08-25 14:53:23', '1', '2017-08-25 16:09:34', '1', null, null, null, null);
INSERT INTO `mrhu_art_music` VALUES ('2', '0', '专辑1', '第一张专辑《》', '0', '50', '1', '2017-08-25 15:47:20', '1', '2017-08-25 16:09:46', '1', null, null, null, null);
INSERT INTO `mrhu_art_music` VALUES ('3', '0', 'In City', '专辑2《》', '28', '50', '1', '2017-08-25 15:51:10', '1', '2017-11-03 15:14:32', '0', '2016-09-22', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('4', '0', '男人歌', '专辑3《》', '30', '50', '1', '2017-08-25 16:06:25', '1', '2017-10-19 12:30:46', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('5', '0', '搞笑', '', '29', '50', '1', '2017-08-25 16:08:50', '1', '2017-10-19 12:30:53', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('6', '0', 'GIVE ME A CHANCE', '我因过敏循规蹈矩，而为自我独树一帜。做音乐，我可弄潮。\r\n对耳朵，绝不嘲弄。一只老虎，400平方公里......', '27', '50', '1', '2017-09-25 18:50:05', '1', '2017-10-12 16:36:19', '0', '2017-09-22', '9', '胡彦斌', 'Hip-Hop | EDM · 2017');
INSERT INTO `mrhu_art_music` VALUES ('7', '0', 'Who Cares', '', '31', '50', '1', '2017-10-12 16:36:01', '1', '2017-10-19 12:30:41', '0', '2000-01-01', '1', '胡彦斌', 'hip-hop');
INSERT INTO `mrhu_art_music` VALUES ('8', '0', '还魂门', '', '32', '50', '1', '2017-10-19 12:29:16', '1', '2017-10-19 12:30:35', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('9', '0', '大一号', '', '33', '50', '1', '2017-10-19 12:29:57', '1', '2017-10-19 12:30:29', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('10', '0', '太歌', '', '34', '50', '1', '2017-10-19 12:30:13', '1', '2017-10-19 12:30:13', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('11', '0', '男配角', '', '35', '50', '1', '2017-10-19 12:31:23', '1', '2017-10-19 12:31:23', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('12', '0', '我们一直都在', '', '36', '50', '1', '2017-10-23 16:17:19', '1', '2017-10-23 16:17:19', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('13', '0', '失业情歌', '', '37', '50', '1', '2017-10-23 16:17:31', '1', '2017-10-23 16:17:31', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('14', '0', 'Anson Hu', '', '38', '50', '1', '2017-10-23 16:17:46', '1', '2017-10-23 16:17:46', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('15', '0', '天谕', '', '39', '50', '1', '2017-10-23 16:18:04', '1', '2017-10-23 16:18:04', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('16', '0', '文武双全', '', '40', '50', '1', '2017-10-23 16:18:17', '1', '2017-10-23 16:18:17', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('17', '0', 'X', '', '41', '50', '1', '2017-10-23 16:18:29', '1', '2017-10-23 16:18:29', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('18', '0', '高手', '', '42', '50', '1', '2017-10-23 16:18:40', '1', '2017-10-23 16:18:40', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('19', '0', '红歌', '', '43', '50', '1', '2017-10-23 16:18:52', '1', '2017-10-23 16:18:52', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('20', '0', '信念', '', '44', '50', '1', '2017-10-23 16:19:06', '1', '2017-10-23 16:19:06', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('21', '0', '剃刀边缘', '', '45', '50', '1', '2017-10-23 16:19:19', '1', '2017-10-23 16:19:19', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('22', '0', 'MuSiC混合体', '', '46', '50', '1', '2017-10-23 16:19:36', '1', '2017-10-23 16:19:36', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('23', '0', '音乐斌潮', '', '47', '50', '1', '2017-10-23 16:19:49', '1', '2017-10-23 16:19:49', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('24', '0', '文武双全升级版', '', '48', '50', '1', '2017-10-23 16:20:02', '1', '2017-10-23 16:20:02', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('25', '0', '一呼天下音演唱会', '', '49', '50', '1', '2017-10-23 16:20:24', '1', '2017-10-23 16:20:24', '0', '2000-01-01', '1', '胡彦斌', '');
INSERT INTO `mrhu_art_music` VALUES ('26', '0', 'And Want You Know 田径之歌', '', '50', '50', '1', '2017-10-23 16:20:45', '1', '2017-10-23 16:20:45', '0', '2000-01-01', '1', '胡彦斌', '');

-- ----------------------------
-- Table structure for mrhu_art_video
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_art_video`;
CREATE TABLE "mrhu_art_video" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT '视频id',
  "cat_id" int(11) NOT NULL COMMENT '分类id',
  "name" varchar(255) NOT NULL COMMENT '视频名',
  "overview" text NOT NULL COMMENT '简略描述',
  "media_id" int(11) NOT NULL COMMENT '媒体id',
  "order_by" int(11) NOT NULL COMMENT '排序',
  "add_by" int(11) NOT NULL COMMENT '添加人',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  "edit_by" int(11) NOT NULL COMMENT '修改人',
  "edit_time" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  "delete" int(1) NOT NULL DEFAULT '0' COMMENT '0：未删除；1：删除；',
  "type" varchar(255) DEFAULT '' COMMENT '类型',
  "image_id" int(11) DEFAULT NULL COMMENT '封面id',
  "access" int(11) DEFAULT NULL COMMENT '阅读量',
  "minstrel" varchar(255) DEFAULT NULL COMMENT '歌手',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='视频表';

-- ----------------------------
-- Records of mrhu_art_video
-- ----------------------------
INSERT INTO `mrhu_art_video` VALUES ('1', '0', '视频展示2', '视频展示1《》', '4', '50', '1', '2017-08-25 16:50:43', '1', '2017-11-01 12:06:43', '1', 'mv', null, '0', null);
INSERT INTO `mrhu_art_video` VALUES ('2', '0', '《GIVE ME A CHANCE》- 官方版', '视频展示3《》', '3', '50', '1', '2017-08-25 16:58:43', '1', '2017-11-03 16:49:25', '0', 'mv', '52', '34', '胡彦斌');
INSERT INTO `mrhu_art_video` VALUES ('3', '0', '《高手》- 官方版', '', '3', '50', '1', '2017-10-30 18:27:10', '1', '2017-11-03 16:48:41', '0', 'mv', '52', '1', '胡彦斌');
INSERT INTO `mrhu_art_video` VALUES ('4', '0', '《hello》- 官方版', '', '4', '50', '1', '2017-10-30 18:27:38', '1', '2017-11-03 16:49:12', '0', 'mv', '52', '1', '胡彦斌');
INSERT INTO `mrhu_art_video` VALUES ('5', '0', 'x', '', '3', '50', '1', '2017-11-03 16:38:33', '1', '2017-11-03 17:50:19', '0', 'mv', '52', '2', '胡彦斌');
INSERT INTO `mrhu_art_video` VALUES ('6', '0', '月光', '', '3', '50', '1', '2017-11-03 16:50:28', '1', '2017-11-06 11:35:41', '0', 'mv', '39', '4', '胡彦斌');

-- ----------------------------
-- Table structure for mrhu_article
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_article`;
CREATE TABLE "mrhu_article" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  "name" varchar(255) NOT NULL COMMENT '文章名称',
  "overview" text NOT NULL COMMENT '简略描述',
  "detail" text NOT NULL COMMENT '详细内容',
  "type" varchar(255) NOT NULL COMMENT '类型',
  "cat_id" int(11) NOT NULL COMMENT '分类id',
  "order_by" int(11) NOT NULL COMMENT '排序',
  "add_by" int(11) NOT NULL COMMENT '添加人',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  "edit_by" int(11) NOT NULL COMMENT '修改人',
  "edit_time" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  "delete" int(1) NOT NULL DEFAULT '0' COMMENT '0：未删除；1：删除；',
  "link" varchar(255) DEFAULT NULL COMMENT '外部链接',
  "year" int(4) DEFAULT NULL COMMENT '年',
  "month" int(2) DEFAULT NULL COMMENT '月',
  "day" int(2) DEFAULT NULL COMMENT '日',
  "address" varchar(255) DEFAULT NULL COMMENT '地址',
  "access" int(11) DEFAULT '0' COMMENT '阅读量',
  "source" varchar(255) DEFAULT NULL COMMENT '来源',
  "media_id" int(11) DEFAULT NULL COMMENT '封面图',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of mrhu_article
-- ----------------------------
INSERT INTO `mrhu_article` VALUES ('1', '活动1', '简述', '<p><img src=\"/data/image_doc/201708241503549671265605.jpg\" title=\"201708241503549671265605.jpg\" alt=\"34-160RG00I00-L.jpg\"/></p>', 'article', '0', '50', '1', '2017-08-24 11:08:29', '1', '2017-11-06 12:07:12', '0', '', '2017', '10', '1', '', '5', '', '51');
INSERT INTO `mrhu_article` VALUES ('2', '【TIGER.HU.FANS.CLUB】 粉丝见面会-上海站', '7月2日，美拍首档音乐直播节目《大咖KTV》第三季强势回归，中国内地歌手、 知名音乐创作人胡彦斌作为首期大咖嘉宾高人气来袭， 不一样的车内嗨唱玩法，让胡彦斌这场 “百人现场K歌派对” 吸引了105.9万观众围观点赞1646.7万次。节目中突如其来的生日惊喜，令事先毫不知情的胡彦斌直呼“ Surprise ”......', '<p>7月2日，美拍首档音乐直播节目《大咖KTV》第三季强势回归，中国内地歌手、知名音乐创作人胡彦斌作为首期大咖嘉宾高人气来袭，不一样的车内嗨唱玩法，让胡彦斌这场“百人现场K歌派对”吸引了105.9万观众围观、点赞1646.7万次。节目中突如其来的生日惊喜，令事先毫不知情的胡彦斌直呼“ Surprise ”。</p><p><img src=\"/data/image_doc/201708241503549942348988.jpg\" title=\"201708241503549942348988.jpg\" alt=\"11760799081442302922.jpg\"/></p><p><br/></p><p>直播开始，胡彦斌在美拍网友的千呼万唤中上车，开启大咖KTV“音乐专线”之旅。</p><p><br/></p><p>作为司机兼主持人的美拍人气达人史蒂夫充分发挥搞笑本色，一开始便主动带上银白色发套炒热气氛。却不料遭胡老师无情“拆台”，调侃道：“其实是导演让你戴的对不对。”后又非常会聊天地开启互夸模式：“你戴上真地超级酷炫的。”随着在线观看粉丝数直线飙升，好心情的胡彦斌对于粉丝“要听歌”的愿望大方满足，一首大量融入现代科技感的《天谕》瞬间引爆直播评论区。</p><p><br/></p><p>随后，《红颜》、《没有选择》、《Waiting for me》、《Hello》等经典歌曲亦信手拈来，让网友直呼听得过瘾。只是胡彦斌一边唱RAP，一边状似无意偷瞄手机的小动作也没能逃过粉丝的火眼金睛：“胡老师日常忘词!”在直播开始时，便宣称要中途去接另外两位好朋友的胡彦斌，在国内知名DJ组合Dirty class上车后，兴致高昂地向粉丝介绍：“国内最强DJ。”三人在车上即兴编曲的Remix版本《Leave me alone》，淋漓尽致地诠释出了另外一种曲风境界。胡彦斌霸气宣称，在车上就能够将这首歌重新混音，变成一首全新单曲。</p><p><br/></p>', 'article', '0', '50', '1', '2017-08-24 12:45:44', '1', '2017-11-06 11:34:33', '0', '', '2017', '10', '18', '上海', '20', '', '51');
INSERT INTO `mrhu_article` VALUES ('3', '【TIGER.HU.FANS.CLUB】 粉丝见面会-上海站', '', '', 'notice', '0', '50', '1', '2017-08-24 12:47:44', '1', '2017-10-25 17:17:21', '0', '', '2017', '9', '22', '上海', '0', null, null);
INSERT INTO `mrhu_article` VALUES ('4', '【TIGER.HU.FANS.CLUB】 粉丝见面会-上海站', '', '', 'notice', '0', '50', '1', '2017-08-24 12:47:56', '1', '2017-10-25 17:17:22', '0', '', '2017', '10', '19', '上海', '0', null, null);
INSERT INTO `mrhu_article` VALUES ('5', '老板的分享1', '这里是一些简述', '<p><img src=\"/data/image_doc/201708241503550264224325.jpg\" title=\"201708241503550264224325.jpg\" alt=\"11760799081442302922.jpg\"/></p>', 'share', '0', '50', '1', '2017-08-24 12:51:05', '1', '2017-10-25 17:17:22', '0', null, null, null, null, null, '0', null, null);
INSERT INTO `mrhu_article` VALUES ('6', '活动2', '第二个活动简介', '<p><img src=\"/data/image_doc/201708241503550295137121.jpg\" title=\"201708241503550295137121.jpg\" alt=\"34-160RG00I00-L.jpg\"/> &nbsp;</p>', 'article', '0', '50', '1', '2017-08-24 12:51:40', '1', '2017-11-06 11:34:31', '0', '', '2017', '1', '1', '上海', '3', '', '51');
INSERT INTO `mrhu_article` VALUES ('7', '老板的分享2', '分享2', '<p><img src=\"/data/image_doc/a465fa95fbc20ce3bbe91b2ee7adbfee.jpg\" alt=\"a465fa95fbc20ce3bbe91b2ee7adbfee.jpg\"/></p>', 'share', '0', '50', '1', '2017-08-24 12:51:59', '1', '2017-10-25 17:17:22', '0', null, null, null, null, null, '0', null, null);
INSERT INTO `mrhu_article` VALUES ('8', 'GIVE ME A CHANCE', '2017-09-23', '<p>专辑详细</p><p><img src=\"/data/image_doc/ad2c04cf6f126899ac63f1d45b17b6da.jpg\" alt=\"ad2c04cf6f126899ac63f1d45b17b6da.jpg\"/></p>', 'album', '0', '50', '1', '2017-08-31 12:43:50', '1', '2017-11-06 18:55:32', '0', null, null, null, null, null, '0', null, '27');
INSERT INTO `mrhu_article` VALUES ('9', '高手', '2017-09-27', '<p>专辑详细</p><p><img src=\"/data/image_doc/761de0e83fc37bafec04d990305e2edf.jpg\"/></p><p><img src=\"/data/image_doc/089fc99ab775b4ff99c73f41c07c4439.jpg\"/></p><p><br/></p>', 'album', '0', '50', '1', '2017-08-31 12:53:19', '1', '2017-11-06 18:55:23', '0', null, null, null, null, null, '0', null, '42');
INSERT INTO `mrhu_article` VALUES ('10', '【上海】2017[TIGER.HU] 世界巡回演唱会', '演出时间：2012-07-07', '', 'concert', '0', '50', '1', '2017-08-31 14:48:43', '1', '2017-11-07 16:59:45', '0', 'http://www.iqiyi.com/w_19rsu1q1fh.html', null, null, null, null, '0', null, '49');
INSERT INTO `mrhu_article` VALUES ('11', '演唱会2', '演出时间：2012-11-08', '', 'concert', '0', '50', '1', '2017-08-31 14:49:06', '1', '2017-11-07 16:59:52', '0', 'http://www.iqiyi.com/w_19rsu1q1fh.html', null, null, null, null, '0', null, '48');
INSERT INTO `mrhu_article` VALUES ('12', '怦然星动', '演出时间：2012-11-08', '', 'film', '0', '50', '1', '2017-08-31 14:52:34', '1', '2017-11-07 17:08:08', '0', 'https://baike.baidu.com/item/%E6%80%A6%E7%84%B6%E6%98%9F%E5%8A%A8/17604559', null, null, null, null, '0', null, '31');
INSERT INTO `mrhu_article` VALUES ('13', '我是歌手第三季', '演出时间：2012-11-08', '', 'variety', '0', '50', '1', '2017-08-31 17:28:14', '1', '2017-11-07 17:09:26', '0', 'https://baike.baidu.com/item/%E6%88%91%E6%98%AF%E6%AD%8C%E6%89%8B%E7%AC%AC%E4%B8%89%E5%AD%A3#%E5%8F%82%E6%BC%94%E5%98%89%E5%AE%BE', null, null, null, null, '0', null, '42');
INSERT INTO `mrhu_article` VALUES ('14', '奖项1', '奖项1简述', '<p>奖项详细1</p>', 'awards', '0', '50', '1', '2017-08-31 17:29:56', '1', '2017-10-25 17:17:23', '0', null, '1999', null, null, null, '0', null, null);
INSERT INTO `mrhu_article` VALUES ('15', '奖项2', '第二个奖项', '', 'awards', '0', '50', '1', '2017-09-18 12:22:56', '1', '2017-10-25 17:17:23', '0', '', '1999', null, null, null, '0', null, null);
INSERT INTO `mrhu_article` VALUES ('16', '奖项3', '奖项3描述', '', 'awards', '0', '50', '1', '2017-09-18 12:23:10', '1', '2017-10-25 17:17:24', '0', '', '2000', null, null, null, '0', null, null);
INSERT INTO `mrhu_article` VALUES ('17', '【TIGER.HU.FANS.CLUB】 粉丝见面会-石家庄站', '这是石家庄粉丝见面会的描述，我们将在石家庄给各位粉丝带来意想不到的惊喜。敬请关注。', '', 'notice', '0', '50', '1', '2017-10-23 15:54:29', '1', '2017-11-07 10:51:39', '0', '', '2017', '11', '1', '石家庄', '0', '', '0');

-- ----------------------------
-- Table structure for mrhu_category
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_category`;
CREATE TABLE "mrhu_category" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT '分类主id',
  "parent_id" int(11) NOT NULL COMMENT '父id',
  "name" varchar(255) NOT NULL COMMENT '分类名',
  "overview" text NOT NULL COMMENT '分类简略描述',
  "type" varchar(255) NOT NULL COMMENT '类别',
  "order_by" int(11) NOT NULL COMMENT '排序',
  "add_by" int(11) NOT NULL COMMENT '添加人',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  "edit_by" int(11) NOT NULL COMMENT '修改人',
  "edit_time" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  "delete" int(1) NOT NULL DEFAULT '0' COMMENT '0：未删除；1：删除；',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Records of mrhu_category
-- ----------------------------
INSERT INTO `mrhu_category` VALUES ('1', '0', '素材', '', '', '50', '1', '2017-08-23 10:39:28', '1', '2017-08-23 11:23:42', '0');
INSERT INTO `mrhu_category` VALUES ('2', '1', '音乐素材', '一个用声音解释的世界', '', '50', '1', '2017-08-23 11:12:24', '1', '2017-08-24 18:13:57', '0');
INSERT INTO `mrhu_category` VALUES ('3', '1', '图片素材', '', '', '50', '1', '2017-08-23 11:30:05', '1', '2017-08-24 18:14:01', '0');
INSERT INTO `mrhu_category` VALUES ('4', '1', '视频', '', '', '50', '1', '2017-08-23 11:30:14', '1', '2017-08-23 11:30:17', '1');
INSERT INTO `mrhu_category` VALUES ('5', '1', '视频素材', '', '', '50', '1', '2017-08-23 11:32:48', '1', '2017-08-24 18:14:04', '0');
INSERT INTO `mrhu_category` VALUES ('6', '0', '作品', '', '', '50', '1', '2017-08-24 17:52:33', '1', '2017-08-24 18:13:24', '0');
INSERT INTO `mrhu_category` VALUES ('7', '6', '专辑', '展示专辑封面、介绍\r\n可以跳转到专辑的音乐界面，播放音乐', '', '50', '1', '2017-08-24 17:52:49', '1', '2017-08-24 18:12:06', '0');
INSERT INTO `mrhu_category` VALUES ('8', '6', '演唱会', '往期演唱会', '', '50', '1', '2017-08-24 17:53:06', '1', '2017-08-24 17:53:06', '0');
INSERT INTO `mrhu_category` VALUES ('9', '6', '电影', '参与过的电影资料', '', '50', '1', '2017-08-24 17:53:19', '1', '2017-08-24 17:53:25', '0');
INSERT INTO `mrhu_category` VALUES ('10', '6', '综艺', '参与的综艺活动', '', '50', '1', '2017-08-24 17:53:42', '1', '2017-08-24 17:53:42', '0');
INSERT INTO `mrhu_category` VALUES ('11', '6', '奖项', '奖项的列表', '', '50', '1', '2017-08-24 18:06:19', '1', '2017-08-24 18:13:17', '0');
INSERT INTO `mrhu_category` VALUES ('12', '18', '音乐', '专辑列表', '', '50', '1', '2017-08-24 18:14:10', '1', '2017-08-24 18:46:28', '0');
INSERT INTO `mrhu_category` VALUES ('13', '18', '视频', '视频列表', '', '50', '1', '2017-08-24 18:14:15', '1', '2017-08-24 18:46:35', '0');
INSERT INTO `mrhu_category` VALUES ('14', '18', '照片', '照片列表', '', '50', '1', '2017-08-24 18:14:25', '1', '2017-08-24 18:46:42', '0');
INSERT INTO `mrhu_category` VALUES ('15', '18', '活动', '活动列表', '', '50', '1', '2017-08-24 18:19:14', '1', '2017-08-24 18:46:22', '0');
INSERT INTO `mrhu_category` VALUES ('16', '18', '行程', '行程列表', '', '50', '1', '2017-08-24 18:19:22', '1', '2017-08-24 18:46:16', '0');
INSERT INTO `mrhu_category` VALUES ('17', '18', '分享', '单独的列表页', '', '50', '1', '2017-08-24 18:19:29', '1', '2017-08-24 18:46:11', '0');
INSERT INTO `mrhu_category` VALUES ('18', '0', '展示', '', '', '50', '1', '2017-08-24 18:46:06', '1', '2017-08-24 18:46:06', '0');

-- ----------------------------
-- Table structure for mrhu_error_log
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_error_log`;
CREATE TABLE "mrhu_error_log" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  "name" varchar(255) NOT NULL COMMENT 'error模块',
  "code" varchar(255) NOT NULL COMMENT '错误码',
  "detail" text NOT NULL COMMENT '错误详细信息',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COMMENT='错误表';

-- ----------------------------
-- Records of mrhu_error_log
-- ----------------------------
INSERT INTO `mrhu_error_log` VALUES ('2', '系统列表', '90001', '2', '2017-08-21 02:44:12');
INSERT INTO `mrhu_error_log` VALUES ('3', '系统更新', '90002', 'null', '2017-08-22 15:54:28');
INSERT INTO `mrhu_error_log` VALUES ('4', '已经存在的数据', '50001', '{\"name\":\"user7\",\"role_id\":\"0\"}', '2017-08-22 15:55:52');
INSERT INTO `mrhu_error_log` VALUES ('5', '空数据', '50002', '{\"name\":\"\",\"edit_doc\":\"0\"}', '2017-08-23 16:25:02');
INSERT INTO `mrhu_error_log` VALUES ('6', '已经存在的数据', '50001', '{\"name\":\"u56feu72471\",\"edit_doc\":\"1\"}', '2017-08-23 16:31:28');
INSERT INTO `mrhu_error_log` VALUES ('7', '已经存在的数据', '50001', '{\"name\":\"\",\"edit_doc\":\"1\"}', '2017-08-23 16:33:04');
INSERT INTO `mrhu_error_log` VALUES ('8', '已经存在的数据', '50001', '{\"name\":\"\",\"edit_doc\":\"1\"}', '2017-08-23 16:34:31');
INSERT INTO `mrhu_error_log` VALUES ('9', '已经存在的数据', '50001', '{\"name\":\"u56feu72473\",\"edit_doc\":\"1\"}', '2017-08-23 16:40:58');
INSERT INTO `mrhu_error_log` VALUES ('10', '已经存在的数据', '50001', '{\"name\":\"u56feu72473\",\"edit_doc\":\"1\"}', '2017-08-23 16:41:04');
INSERT INTO `mrhu_error_log` VALUES ('11', '素材列表', '60001', 'null', '2017-08-23 17:58:43');
INSERT INTO `mrhu_error_log` VALUES ('12', '素材列表', '60001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-23 18:03:22');
INSERT INTO `mrhu_error_log` VALUES ('13', '素材列表', '60001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-23 18:04:16');
INSERT INTO `mrhu_error_log` VALUES ('14', '素材列表', '60001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-23 18:04:41');
INSERT INTO `mrhu_error_log` VALUES ('15', '素材列表', '60001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-23 18:04:49');
INSERT INTO `mrhu_error_log` VALUES ('16', '素材列表', '60001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"article\"}', '2017-08-23 18:04:50');
INSERT INTO `mrhu_error_log` VALUES ('17', '素材列表', '60001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"article\"}', '2017-08-23 18:05:31');
INSERT INTO `mrhu_error_log` VALUES ('18', '素材列表', '60001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"article\"}', '2017-08-23 18:06:09');
INSERT INTO `mrhu_error_log` VALUES ('19', '素材列表', '60001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"article\"}', '2017-08-23 18:27:26');
INSERT INTO `mrhu_error_log` VALUES ('20', '素材列表', '60001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"article\"}', '2017-08-23 18:27:27');
INSERT INTO `mrhu_error_log` VALUES ('21', '素材列表', '60001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"article\"}', '2017-08-23 18:27:27');
INSERT INTO `mrhu_error_log` VALUES ('22', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-23 18:54:25');
INSERT INTO `mrhu_error_log` VALUES ('23', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 10:11:27');
INSERT INTO `mrhu_error_log` VALUES ('24', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 10:11:49');
INSERT INTO `mrhu_error_log` VALUES ('25', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 10:11:52');
INSERT INTO `mrhu_error_log` VALUES ('26', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 10:16:44');
INSERT INTO `mrhu_error_log` VALUES ('27', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 12:29:05');
INSERT INTO `mrhu_error_log` VALUES ('28', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 12:29:17');
INSERT INTO `mrhu_error_log` VALUES ('29', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 12:37:31');
INSERT INTO `mrhu_error_log` VALUES ('30', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 12:40:46');
INSERT INTO `mrhu_error_log` VALUES ('31', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 12:41:31');
INSERT INTO `mrhu_error_log` VALUES ('32', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 12:41:51');
INSERT INTO `mrhu_error_log` VALUES ('33', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 14:42:48');
INSERT INTO `mrhu_error_log` VALUES ('34', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 15:18:17');
INSERT INTO `mrhu_error_log` VALUES ('35', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 15:45:29');
INSERT INTO `mrhu_error_log` VALUES ('36', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 15:45:50');
INSERT INTO `mrhu_error_log` VALUES ('37', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 17:14:48');
INSERT INTO `mrhu_error_log` VALUES ('38', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 17:24:11');
INSERT INTO `mrhu_error_log` VALUES ('39', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 17:24:14');
INSERT INTO `mrhu_error_log` VALUES ('40', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 17:24:37');
INSERT INTO `mrhu_error_log` VALUES ('41', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 17:51:27');
INSERT INTO `mrhu_error_log` VALUES ('42', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 17:52:00');
INSERT INTO `mrhu_error_log` VALUES ('43', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 17:54:00');
INSERT INTO `mrhu_error_log` VALUES ('44', '已经存在的数据', '10001', '{\"parent_id\":\"0\",\"name\":\"u97f3u4e50\",\"overview\":\"\"}', '2017-08-24 18:13:44');
INSERT INTO `mrhu_error_log` VALUES ('45', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 18:14:34');
INSERT INTO `mrhu_error_log` VALUES ('46', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 18:14:50');
INSERT INTO `mrhu_error_log` VALUES ('47', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 18:26:43');
INSERT INTO `mrhu_error_log` VALUES ('48', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-24 18:28:03');
INSERT INTO `mrhu_error_log` VALUES ('49', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"image\"}', '2017-08-24 18:47:47');
INSERT INTO `mrhu_error_log` VALUES ('50', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-25 10:25:57');
INSERT INTO `mrhu_error_log` VALUES ('51', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"image\"}', '2017-08-25 10:39:27');
INSERT INTO `mrhu_error_log` VALUES ('52', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-25 17:24:49');
INSERT INTO `mrhu_error_log` VALUES ('53', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-25 17:24:51');
INSERT INTO `mrhu_error_log` VALUES ('54', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-28 16:13:19');
INSERT INTO `mrhu_error_log` VALUES ('55', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-28 16:13:23');
INSERT INTO `mrhu_error_log` VALUES ('56', '展示列表', '50001', '{\"a\":\"show\",\"m\":\"index\",\"type\":\"staticPage\"}', '2017-08-28 16:32:35');
INSERT INTO `mrhu_error_log` VALUES ('57', '已经存在的数据', '10001', '{\"parent_id\":\"3\",\"name\":\"u56feu7247u7d20u6750\",\"code\":\"deleteImage\"}', '2017-08-28 18:20:25');
INSERT INTO `mrhu_error_log` VALUES ('58', '展示列表', '50001', '{\"a\":\"works\",\"m\":\"index\",\"type\":\"album\"}', '2017-08-28 18:34:35');
INSERT INTO `mrhu_error_log` VALUES ('59', '展示列表', '50001', '{\"a\":\"works\",\"m\":\"index\",\"type\":\"album\"}', '2017-08-28 18:40:37');
INSERT INTO `mrhu_error_log` VALUES ('60', '作品列表', '40001', '{\"a\":\"works\",\"m\":\"index\",\"type\":\"concert\"}', '2017-08-31 12:54:52');
INSERT INTO `mrhu_error_log` VALUES ('61', '作品列表', '40001', '{\"a\":\"works\",\"m\":\"index\",\"type\":\"concert\"}', '2017-08-31 12:55:53');
INSERT INTO `mrhu_error_log` VALUES ('62', '作品列表', '40001', '{\"a\":\"works\",\"m\":\"index\",\"type\":\"variety\"}', '2017-08-31 17:25:09');
INSERT INTO `mrhu_error_log` VALUES ('63', '作品列表', '40001', '{\"a\":\"works\",\"m\":\"index\",\"type\":\"variety\"}', '2017-08-31 17:26:14');
INSERT INTO `mrhu_error_log` VALUES ('64', '已经存在的数据', '10001', '{\"parent_id\":\"73\",\"name\":\"u8f6eu64adu663eu793a\",\"code\":\"updateSlideShow\"}', '2017-09-01 14:53:34');

-- ----------------------------
-- Table structure for mrhu_image
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_image`;
CREATE TABLE "mrhu_image" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  "name" varchar(255) NOT NULL COMMENT '图片标题',
  "original_src" varchar(255) NOT NULL COMMENT '原图',
  "original_link" varchar(255) NOT NULL COMMENT '原图链接',
  "order_by" int(11) NOT NULL COMMENT '排序',
  "add_by" int(11) NOT NULL COMMENT '添加人',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  "edit_by" int(11) NOT NULL COMMENT '修改人',
  "edit_time" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  "delete" int(1) NOT NULL DEFAULT '0' COMMENT '0：未删除；1：删除；',
  "unique" varchar(255) NOT NULL COMMENT '唯一值（md5图片）',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mrhu_image
-- ----------------------------
INSERT INTO `mrhu_image` VALUES ('1', '图片1', '/data/image_doc/9fd1a3ade046c2cb96f02d50944d9c34.jpg', '', '50', '1', '2017-08-23 16:22:17', '1', '2017-10-18 11:09:04', '0', '9fd1a3ade046c2cb96f02d50944d9c34');
INSERT INTO `mrhu_image` VALUES ('6', '', '', '', '50', '1', '2017-08-23 16:33:04', '1', '2017-08-23 16:35:12', '1', '');
INSERT INTO `mrhu_image` VALUES ('7', '图片2', '/data/image_doc/bf38a6dc25c2b6ce34599e23c24c51fb.jpg', '', '50', '1', '2017-08-23 16:40:39', '1', '2017-10-18 11:09:10', '0', 'bf38a6dc25c2b6ce34599e23c24c51fb');
INSERT INTO `mrhu_image` VALUES ('8', '图片3', '/data/image_doc/a465fa95fbc20ce3bbe91b2ee7adbfee.jpg', '', '50', '1', '2017-08-23 16:40:49', '1', '2017-08-23 16:41:24', '1', 'a465fa95fbc20ce3bbe91b2ee7adbfee');
INSERT INTO `mrhu_image` VALUES ('9', '图片3', '/data/image_doc/da58ba5da2797c2f4a6681cce71a2e65.jpg', '', '50', '1', '2017-08-23 16:41:31', '1', '2017-10-18 11:09:16', '0', 'da58ba5da2797c2f4a6681cce71a2e65');
INSERT INTO `mrhu_image` VALUES ('10', '', '', '', '50', '1', '2017-08-24 12:16:20', '1', '2017-08-24 12:37:30', '1', '');
INSERT INTO `mrhu_image` VALUES ('11', '', '1', '', '50', '1', '2017-08-24 12:16:57', '1', '2017-08-24 12:37:27', '1', '1');
INSERT INTO `mrhu_image` VALUES ('12', '1', '1', '', '50', '1', '2017-08-24 12:17:21', '1', '2017-08-24 12:37:25', '1', '1');
INSERT INTO `mrhu_image` VALUES ('13', '1', '1', '', '50', '1', '2017-08-24 12:17:41', '1', '2017-08-24 12:37:24', '1', '1');
INSERT INTO `mrhu_image` VALUES ('14', '1', '1', '', '50', '1', '2017-08-24 12:18:06', '1', '2017-08-24 12:37:22', '1', '1');
INSERT INTO `mrhu_image` VALUES ('15', '1', '1', '', '50', '1', '2017-08-24 12:18:23', '1', '2017-08-24 12:37:21', '1', '1');
INSERT INTO `mrhu_image` VALUES ('16', '1', '1', '', '50', '0', '2017-08-24 12:33:50', '0', '2017-08-24 12:37:19', '1', '1');
INSERT INTO `mrhu_image` VALUES ('17', '1', '1', '', '50', '0', '2017-08-24 12:35:36', '0', '2017-08-24 12:37:18', '1', '1');
INSERT INTO `mrhu_image` VALUES ('18', '201708241503549475293631.jpg', '/var/www/tiger/data/image_doc/201708241503549475293631.jpg', '', '50', '0', '2017-08-24 12:37:56', '0', '2017-08-24 12:40:44', '1', 'c5cde6cc21c7157ed03856e98a9c239e');
INSERT INTO `mrhu_image` VALUES ('19', '201708241503549671265605.jpg', '/data/image_doc/201708241503549671265605.jpg', '', '50', '0', '2017-08-24 12:41:11', '0', '2017-08-24 12:41:11', '0', 'c5cde6cc21c7157ed03856e98a9c239e');
INSERT INTO `mrhu_image` VALUES ('20', '201708241503549942348988.jpg', '/data/image_doc/201708241503549942348988.jpg', '', '50', '0', '2017-08-24 12:45:42', '0', '2017-08-24 12:45:42', '0', 'a465fa95fbc20ce3bbe91b2ee7adbfee');
INSERT INTO `mrhu_image` VALUES ('21', '201708241503550061823648.jpg', '/data/image_doc/201708241503550061823648.jpg', '', '50', '0', '2017-08-24 12:47:41', '0', '2017-08-24 12:47:41', '0', 'c5cde6cc21c7157ed03856e98a9c239e');
INSERT INTO `mrhu_image` VALUES ('22', '201708241503550264224325.jpg', '/data/image_doc/201708241503550264224325.jpg', '', '50', '0', '2017-08-24 12:51:04', '0', '2017-08-24 12:51:04', '0', 'a465fa95fbc20ce3bbe91b2ee7adbfee');
INSERT INTO `mrhu_image` VALUES ('23', '201708241503550276499379.jpg', '/data/image_doc/201708241503550276499379.jpg', '', '50', '0', '2017-08-24 12:51:16', '0', '2017-08-24 12:51:16', '0', '89a7e6a7aa17c4634936c353385b4a7c');
INSERT INTO `mrhu_image` VALUES ('24', '201708241503550295137121.jpg', '/data/image_doc/201708241503550295137121.jpg', '', '50', '0', '2017-08-24 12:51:35', '0', '2017-08-24 12:51:35', '0', 'c5cde6cc21c7157ed03856e98a9c239e');
INSERT INTO `mrhu_image` VALUES ('25', '图片4', '/data/image_doc/761de0e83fc37bafec04d990305e2edf.jpg', '', '50', '1', '2017-09-12 18:16:23', '1', '2017-10-18 11:09:21', '0', '761de0e83fc37bafec04d990305e2edf');
INSERT INTO `mrhu_image` VALUES ('26', '图片5', '/data/image_doc/7ea7a509fbab22614bd683bf9ec64f59.jpg', '', '50', '1', '2017-09-12 18:16:32', '1', '2017-09-12 18:16:32', '0', '7ea7a509fbab22614bd683bf9ec64f59');
INSERT INTO `mrhu_image` VALUES ('27', 'givemeachance', '/data/image_doc/912c5dfd493e7ca6432e765d00fb597c.jpg', '', '50', '1', '2017-09-25 12:32:40', '1', '2017-10-18 18:55:44', '0', '912c5dfd493e7ca6432e765d00fb597c');
INSERT INTO `mrhu_image` VALUES ('28', 'In City', '/data/image_doc/7334cc0de754f1db370a382a8ca89249.jpg', '', '50', '1', '2017-10-18 18:56:29', '1', '2017-10-18 18:56:29', '0', '7334cc0de754f1db370a382a8ca89249');
INSERT INTO `mrhu_image` VALUES ('29', '搞笑', '/data/image_doc/87ed2f28844abbe91033471b52a1a402.jpg', '', '50', '1', '2017-10-18 18:56:59', '1', '2017-10-18 18:56:59', '0', '87ed2f28844abbe91033471b52a1a402');
INSERT INTO `mrhu_image` VALUES ('30', '男人歌', '/data/image_doc/5ca42c1c5702c09a29dbf444327f58f2.jpg', '', '50', '1', '2017-10-18 18:57:12', '1', '2017-10-18 18:57:12', '0', '5ca42c1c5702c09a29dbf444327f58f2');
INSERT INTO `mrhu_image` VALUES ('31', 'Who Cares', '/data/image_doc/35e588c4afe56b0393efc3d3343c8cae.jpg', '', '50', '1', '2017-10-18 18:57:30', '1', '2017-10-18 18:57:30', '0', '35e588c4afe56b0393efc3d3343c8cae');
INSERT INTO `mrhu_image` VALUES ('32', '还魂门', '/data/image_doc/f01574db900b86319bc2789ef0d50fbc.jpg', '', '50', '1', '2017-10-18 18:57:48', '1', '2017-10-18 18:57:48', '0', 'f01574db900b86319bc2789ef0d50fbc');
INSERT INTO `mrhu_image` VALUES ('33', '大一号', '/data/image_doc/9b9550d901a405418af1c2541e86471d.jpg', '', '50', '1', '2017-10-18 18:58:52', '1', '2017-10-18 18:58:52', '0', '9b9550d901a405418af1c2541e86471d');
INSERT INTO `mrhu_image` VALUES ('34', '太歌', '/data/image_doc/73ed7a943bcbca1ef03f08e48f11dccc.jpg', '', '50', '1', '2017-10-18 18:59:13', '1', '2017-10-18 18:59:13', '0', '73ed7a943bcbca1ef03f08e48f11dccc');
INSERT INTO `mrhu_image` VALUES ('35', '男配角', '/data/image_doc/00da12614e81011f25314c20d53afc6c.jpg', '', '50', '1', '2017-10-18 18:59:27', '1', '2017-10-18 18:59:27', '0', '00da12614e81011f25314c20d53afc6c');
INSERT INTO `mrhu_image` VALUES ('36', '我们一直都在', '/data/image_doc/e903a7c1e2920228d9b61b8b9f2fb134.jpg', '', '50', '1', '2017-10-18 18:59:42', '1', '2017-10-18 18:59:42', '0', 'e903a7c1e2920228d9b61b8b9f2fb134');
INSERT INTO `mrhu_image` VALUES ('37', '失业情歌', '/data/image_doc/7b33c0c48a4362efc689ad2e940f0c6f.jpg', '', '50', '1', '2017-10-18 18:59:56', '1', '2017-10-18 18:59:56', '0', '7b33c0c48a4362efc689ad2e940f0c6f');
INSERT INTO `mrhu_image` VALUES ('38', 'Anson Hu', '/data/image_doc/4590b27b3093decf20ad0f645328517a.jpg', '', '50', '1', '2017-10-18 19:00:16', '1', '2017-10-18 19:00:16', '0', '4590b27b3093decf20ad0f645328517a');
INSERT INTO `mrhu_image` VALUES ('39', '天谕', '/data/image_doc/6af2d325354ef333153fd73e6c46e1fd.jpg', '', '50', '1', '2017-10-18 19:00:52', '1', '2017-10-18 19:00:52', '0', '6af2d325354ef333153fd73e6c46e1fd');
INSERT INTO `mrhu_image` VALUES ('40', '文武双全', '/data/image_doc/aa12e0da0786177e851eda61e07a28af.jpg', '', '50', '1', '2017-10-18 19:01:07', '1', '2017-10-18 19:01:07', '0', 'aa12e0da0786177e851eda61e07a28af');
INSERT INTO `mrhu_image` VALUES ('41', 'X', '/data/image_doc/e88daf5b452422422ca87c76d0d751cd.jpg', '', '50', '1', '2017-10-18 19:01:15', '1', '2017-10-18 19:01:15', '0', 'e88daf5b452422422ca87c76d0d751cd');
INSERT INTO `mrhu_image` VALUES ('42', '高手', '/data/image_doc/089fc99ab775b4ff99c73f41c07c4439.jpg', '', '50', '1', '2017-10-18 19:01:22', '1', '2017-10-18 19:01:22', '0', '089fc99ab775b4ff99c73f41c07c4439');
INSERT INTO `mrhu_image` VALUES ('43', '红歌', '/data/image_doc/fd25bf145a341dc33f6f92f928d47b2f.jpg', '', '50', '1', '2017-10-18 19:01:38', '1', '2017-10-18 19:01:38', '0', 'fd25bf145a341dc33f6f92f928d47b2f');
INSERT INTO `mrhu_image` VALUES ('44', '信念', '/data/image_doc/9313482bdda6abccb1f7f51e29dcfbd8.jpg', '', '50', '1', '2017-10-18 19:01:52', '1', '2017-10-18 19:01:52', '0', '9313482bdda6abccb1f7f51e29dcfbd8');
INSERT INTO `mrhu_image` VALUES ('45', '剃刀边缘', '/data/image_doc/68e77a1f9b21520b2c11d0cf5cc5418a.jpg', '', '50', '1', '2017-10-18 19:02:03', '1', '2017-10-18 19:02:03', '0', '68e77a1f9b21520b2c11d0cf5cc5418a');
INSERT INTO `mrhu_image` VALUES ('46', 'MuSIC混合体', '/data/image_doc/b09407c992eb07bdd5069ec048cf9fe7.jpg', '', '50', '1', '2017-10-18 19:02:20', '1', '2017-10-18 19:02:20', '0', 'b09407c992eb07bdd5069ec048cf9fe7');
INSERT INTO `mrhu_image` VALUES ('47', '音乐斌潮', '/data/image_doc/de6d6d33807cb52f81d1c81d5d95e742.jpg', '', '50', '1', '2017-10-18 19:03:05', '1', '2017-10-18 19:03:05', '0', 'de6d6d33807cb52f81d1c81d5d95e742');
INSERT INTO `mrhu_image` VALUES ('48', '文武双全升级版', '/data/image_doc/af91ab3d0df9fa697711e3a9dbc346a0.jpg', '', '50', '1', '2017-10-18 19:03:24', '1', '2017-10-18 19:03:24', '0', 'af91ab3d0df9fa697711e3a9dbc346a0');
INSERT INTO `mrhu_image` VALUES ('49', '一呼天下音演唱会', '/data/image_doc/aed136a1c5a937a6a93ed67ae5d515ed.jpg', '', '50', '1', '2017-10-18 19:03:45', '1', '2017-10-18 19:03:45', '0', 'aed136a1c5a937a6a93ed67ae5d515ed');
INSERT INTO `mrhu_image` VALUES ('50', 'And Want You Know 田径之歌', '/data/image_doc/a36be5d8b9715628f975f86b761a4f55.jpg', '', '50', '1', '2017-10-18 19:04:15', '1', '2017-10-18 19:04:15', '0', 'a36be5d8b9715628f975f86b761a4f55');
INSERT INTO `mrhu_image` VALUES ('51', '活动封面1', '/data/image_doc/594d7f8cd44d4bbd071e3a087350c936.jpg', '', '50', '1', '2017-10-24 16:05:37', '1', '2017-10-24 16:05:37', '0', '594d7f8cd44d4bbd071e3a087350c936');
INSERT INTO `mrhu_image` VALUES ('52', '视频givemeachance', '/data/image_doc/e6b4302561a6b68509d96de65dd98e7c.jpg', '', '50', '1', '2017-10-30 15:37:14', '1', '2017-10-30 15:37:14', '0', 'e6b4302561a6b68509d96de65dd98e7c');

-- ----------------------------
-- Table structure for mrhu_media
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_media`;
CREATE TABLE "mrhu_media" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT '媒体id',
  "name" varchar(255) NOT NULL COMMENT '媒体名',
  "overview" text NOT NULL COMMENT '简略描述',
  "src" varchar(2000) NOT NULL COMMENT '路径',
  "type" enum('music','video') NOT NULL COMMENT '类别：音频；视频；',
  "order_by" int(11) NOT NULL COMMENT '排序',
  "add_by" int(11) NOT NULL COMMENT '添加人',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  "edit_by" int(11) NOT NULL COMMENT '修改人',
  "edit_time" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  "delete" int(1) NOT NULL DEFAULT '0' COMMENT '0：未删除；1：删除；',
  "minstrel" varchar(255) DEFAULT NULL COMMENT '歌手',
  "duration" varchar(255) DEFAULT NULL COMMENT '时长',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='媒体表';

-- ----------------------------
-- Records of mrhu_media
-- ----------------------------
INSERT INTO `mrhu_media` VALUES ('1', '红颜 ', '专辑《音乐斌潮》', 'http://fs.w.kugou.com/201710121130/b7422968c201460ca461f22be3fa9435/G003/M01/0A/11/o4YBAFT6H4qAVaDRADYIgEBaUEk358.mp3', 'music', '50', '1', '2017-08-23 17:47:13', '1', '2017-10-12 11:35:08', '0', '胡彦斌', '3:41');
INSERT INTO `mrhu_media` VALUES ('2', '音乐2', '1', '2', 'music', '50', '1', '2017-08-23 17:47:35', '1', '2017-08-23 17:55:23', '1', null, null);
INSERT INTO `mrhu_media` VALUES ('3', 'GIVE ME A CHANCE', '', 'https://f.us.sinaimg.cn/002380GRlx07ft2ZaN56010f0100D06C0k01.mp4?label=mp4_hd&template=28_fast&Expires=1509531729&ssig=6Yn6pzNsQ3&KID=unistore,video', 'video', '50', '1', '2017-08-23 17:56:30', '1', '2017-11-01 17:23:03', '0', '胡彦斌', '04:03');
INSERT INTO `mrhu_media` VALUES ('4', '视频2', '', '', 'video', '50', '1', '2017-08-23 17:56:35', '1', '2017-08-23 17:56:35', '0', null, null);
INSERT INTO `mrhu_media` VALUES ('5', '诀别诗', '专辑《男人歌》', 'http://fs.web.kugou.com/4206c9bd8511916a52315bee52804e50/599e7d9d/G007/M07/01/1D/p4YBAFT_i86Ab9zkADx4ok4Jm5A694.mp3', 'music', '50', '1', '2017-08-23 17:56:44', '1', '2017-08-24 15:18:15', '0', null, null);
INSERT INTO `mrhu_media` VALUES ('6', 'GIVE ME A CHANCE', 'GIVE ME A CHANCE', 'http://fs.w.kugou.com/201711011657/29486a36d787a118832049a1275004b4/G112/M00/18/1B/UJQEAFnDlpmAbkrRADqcwsDaHMk602.mp3', 'music', '50', '1', '2017-10-12 11:35:45', '1', '2017-11-01 17:34:07', '0', '胡彦斌', '4:00');
INSERT INTO `mrhu_media` VALUES ('7', '高手', '', 'http://fs.w.kugou.com/201710121147/5877853ef5b475cf7f6681e8fb3d5632/G115/M0B/00/19/U5QEAFnMauKAff3mADrhVgn2aWM194.mp3', 'music', '50', '1', '2017-10-12 12:30:49', '1', '2017-10-12 12:30:49', '0', '胡彦斌', '4:01');

-- ----------------------------
-- Table structure for mrhu_purv
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_purv`;
CREATE TABLE "mrhu_purv" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  "name" varchar(255) NOT NULL COMMENT '角色名',
  "code" varchar(255) NOT NULL COMMENT '权限代码',
  "add_by" int(11) NOT NULL COMMENT '添加人',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  "edit_by" int(11) NOT NULL COMMENT '修改人',
  "edit_time" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  "parent_id" int(11) NOT NULL DEFAULT '0' COMMENT '父权限',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of mrhu_purv
-- ----------------------------
INSERT INTO `mrhu_purv` VALUES ('1', '素材', 'material', '1', '2017-08-25 18:10:31', '1', '2017-08-25 18:16:51', '0');
INSERT INTO `mrhu_purv` VALUES ('3', '图片素材', 'material_image', '1', '2017-08-25 18:18:12', '1', '2017-08-28 11:56:53', '1');
INSERT INTO `mrhu_purv` VALUES ('4', '音频素材', 'material_music', '1', '2017-08-28 12:31:52', '1', '2017-08-28 12:31:52', '1');
INSERT INTO `mrhu_purv` VALUES ('5', '视频素材', 'material_video', '1', '2017-08-28 12:31:52', '1', '2017-08-28 12:31:52', '1');
INSERT INTO `mrhu_purv` VALUES ('6', '展示', 'show', '1', '2017-08-28 16:33:08', '1', '2017-08-28 16:33:37', '0');
INSERT INTO `mrhu_purv` VALUES ('7', '活动展示', 'show_article', '1', '2017-08-28 16:33:40', '1', '2017-08-28 18:17:51', '6');
INSERT INTO `mrhu_purv` VALUES ('8', '音频展示', 'show_music', '1', '2017-08-28 16:33:40', '1', '2017-08-28 16:36:30', '6');
INSERT INTO `mrhu_purv` VALUES ('9', '视频展示', 'show_video', '1', '2017-08-28 16:33:40', '1', '2017-08-28 16:36:24', '6');
INSERT INTO `mrhu_purv` VALUES ('10', '图片展示', 'show_image', '1', '2017-08-28 16:33:40', '1', '2017-08-28 16:36:19', '6');
INSERT INTO `mrhu_purv` VALUES ('12', '分享展示', 'show_share', '1', '2017-08-28 16:33:40', '1', '2017-08-28 16:36:05', '6');
INSERT INTO `mrhu_purv` VALUES ('13', '分类', 'category', '1', '2017-08-28 16:33:08', '1', '2017-08-28 16:33:37', '0');
INSERT INTO `mrhu_purv` VALUES ('14', '用户', 'user', '1', '2017-08-28 16:33:08', '1', '2017-08-28 16:42:49', '0');
INSERT INTO `mrhu_purv` VALUES ('15', '角色', 'role', '1', '2017-08-28 17:27:20', '1', '2017-08-28 17:27:52', '0');
INSERT INTO `mrhu_purv` VALUES ('16', '权限', 'purv', '1', '2017-08-28 17:27:43', '1', '2017-08-28 17:28:11', '0');
INSERT INTO `mrhu_purv` VALUES ('17', '系统', 'system', '1', '2017-08-28 16:42:10', '1', '2017-08-28 16:42:44', '0');
INSERT INTO `mrhu_purv` VALUES ('18', '权限update', 'updatePurv', '1', '2017-08-28 16:33:08', '1', '2017-08-28 17:20:17', '16');
INSERT INTO `mrhu_purv` VALUES ('19', '权限delete', 'deletePurv', '1', '2017-08-28 16:33:08', '1', '2017-08-28 17:20:21', '16');
INSERT INTO `mrhu_purv` VALUES ('20', '角色select', 'getRole', '1', '2017-08-28 16:33:08', '1', '2017-08-28 16:42:59', '15');
INSERT INTO `mrhu_purv` VALUES ('21', '角色update', 'updateRole', '1', '2017-08-28 16:33:08', '1', '2017-08-28 16:42:59', '15');
INSERT INTO `mrhu_purv` VALUES ('22', '角色delete', 'deleteRole', '1', '2017-08-28 16:33:08', '1', '2017-08-28 17:20:32', '15');
INSERT INTO `mrhu_purv` VALUES ('25', '权限select', 'getPurv', '1', '2017-08-28 16:33:08', '1', '2017-08-28 17:20:15', '16');
INSERT INTO `mrhu_purv` VALUES ('26', '系统update', 'updateSystem', '1', '2017-08-28 17:57:21', '1', '2017-08-28 17:57:54', '17');
INSERT INTO `mrhu_purv` VALUES ('27', '用户select', 'getUser', '1', '2017-08-28 17:58:35', '1', '2017-08-28 17:58:35', '14');
INSERT INTO `mrhu_purv` VALUES ('28', '用户update', 'updateUser', '1', '2017-08-28 17:58:47', '1', '2017-08-28 17:58:47', '14');
INSERT INTO `mrhu_purv` VALUES ('29', '用户delete', 'deleteUser', '1', '2017-08-28 17:58:57', '1', '2017-08-28 17:58:57', '14');
INSERT INTO `mrhu_purv` VALUES ('30', '活动展示select', 'getShow', '1', '2017-08-28 18:07:08', '1', '2017-08-28 18:07:08', '7');
INSERT INTO `mrhu_purv` VALUES ('31', '活动展示update', 'updateShow', '1', '2017-08-28 18:07:26', '1', '2017-08-28 18:07:26', '7');
INSERT INTO `mrhu_purv` VALUES ('32', '活动展示delete', 'deleteShow', '1', '2017-08-28 18:07:43', '1', '2017-08-28 18:07:43', '7');
INSERT INTO `mrhu_purv` VALUES ('33', '音频展示select', 'getArtMusic', '1', '2017-08-28 18:08:07', '1', '2017-08-28 18:08:07', '8');
INSERT INTO `mrhu_purv` VALUES ('34', '音频展示update', 'updateArtMusic', '1', '2017-08-28 18:08:19', '1', '2017-08-28 18:08:19', '8');
INSERT INTO `mrhu_purv` VALUES ('35', '音频展示delete', 'deleteArtMusic', '1', '2017-08-28 18:08:31', '1', '2017-08-28 18:08:31', '8');
INSERT INTO `mrhu_purv` VALUES ('36', '视频展示select', 'getArtVideo', '1', '2017-08-28 18:08:47', '1', '2017-08-28 18:08:47', '9');
INSERT INTO `mrhu_purv` VALUES ('37', '视频展示update', 'updateArtVideo', '1', '2017-08-28 18:09:00', '1', '2017-08-28 18:09:00', '9');
INSERT INTO `mrhu_purv` VALUES ('38', '视频展示delete', 'deleteArtVideo', '1', '2017-08-28 18:09:15', '1', '2017-08-28 18:09:15', '9');
INSERT INTO `mrhu_purv` VALUES ('39', '图片展示select', 'getArtImage', '1', '2017-08-28 18:09:30', '1', '2017-08-28 18:09:30', '10');
INSERT INTO `mrhu_purv` VALUES ('40', '图片展示update', 'updateArtImage', '1', '2017-08-28 18:09:44', '1', '2017-08-28 18:09:44', '10');
INSERT INTO `mrhu_purv` VALUES ('41', '图片展示delete', 'deleteArtImage', '1', '2017-08-28 18:09:58', '1', '2017-08-28 18:09:58', '10');
INSERT INTO `mrhu_purv` VALUES ('42', '行程展示', 'show_notice', '1', '2017-08-28 18:18:46', '1', '2017-08-28 18:18:46', '6');
INSERT INTO `mrhu_purv` VALUES ('43', '图片素材select', 'getImage', '1', '2017-08-28 18:20:01', '1', '2017-08-28 18:20:01', '3');
INSERT INTO `mrhu_purv` VALUES ('44', '图片素材update', 'updateImage', '1', '2017-08-28 18:20:14', '1', '2017-08-28 18:20:14', '3');
INSERT INTO `mrhu_purv` VALUES ('45', '图片素材delete', 'deleteImage', '1', '2017-08-28 18:21:21', '1', '2017-08-28 18:21:21', '3');
INSERT INTO `mrhu_purv` VALUES ('46', '音频素材select', 'getMedia', '1', '2017-08-28 18:22:09', '1', '2017-08-28 18:22:09', '4');
INSERT INTO `mrhu_purv` VALUES ('47', '音频素材update', 'updateMedia', '1', '2017-08-28 18:22:22', '1', '2017-08-28 18:22:22', '4');
INSERT INTO `mrhu_purv` VALUES ('48', '音频素材delete', 'deleteMedia', '1', '2017-08-28 18:22:36', '1', '2017-08-28 18:22:36', '4');
INSERT INTO `mrhu_purv` VALUES ('49', '分类select', 'getCategory', '1', '2017-08-28 18:23:03', '1', '2017-08-28 18:23:03', '13');
INSERT INTO `mrhu_purv` VALUES ('50', '分类update', 'updateCategory', '1', '2017-08-28 18:23:17', '1', '2017-08-28 18:23:17', '13');
INSERT INTO `mrhu_purv` VALUES ('51', '分类delete', 'deleteCategory', '1', '2017-08-28 18:23:34', '1', '2017-08-28 18:23:34', '13');
INSERT INTO `mrhu_purv` VALUES ('52', '作品', 'works', '1', '2017-08-28 18:32:13', '1', '2017-08-28 18:32:13', '0');
INSERT INTO `mrhu_purv` VALUES ('53', '专辑', 'works_album', '1', '2017-08-28 18:33:37', '1', '2017-08-28 18:34:22', '52');
INSERT INTO `mrhu_purv` VALUES ('54', '专辑select', 'getAlbum', '1', '2017-08-28 18:47:36', '1', '2017-08-28 18:47:36', '53');
INSERT INTO `mrhu_purv` VALUES ('55', '专辑update', 'updateAlbum', '1', '2017-08-31 12:45:51', '1', '2017-08-31 12:45:51', '53');
INSERT INTO `mrhu_purv` VALUES ('56', '专辑delete', 'deleteAlbum', '1', '2017-08-31 12:52:45', '1', '2017-08-31 12:52:45', '53');
INSERT INTO `mrhu_purv` VALUES ('57', '演唱会', 'works_concert', '1', '2017-08-31 12:54:33', '1', '2017-08-31 12:54:33', '52');
INSERT INTO `mrhu_purv` VALUES ('58', '演唱会select', 'getConcert', '1', '2017-08-31 14:47:12', '1', '2017-08-31 14:47:12', '57');
INSERT INTO `mrhu_purv` VALUES ('59', '演唱会update', 'updateConcert', '1', '2017-08-31 14:47:31', '1', '2017-08-31 14:47:31', '57');
INSERT INTO `mrhu_purv` VALUES ('60', '演唱会delete', 'deleteConcert', '1', '2017-08-31 14:47:46', '1', '2017-08-31 14:47:46', '57');
INSERT INTO `mrhu_purv` VALUES ('61', '电影', 'works_film', '1', '2017-08-31 14:50:11', '1', '2017-08-31 14:50:11', '52');
INSERT INTO `mrhu_purv` VALUES ('62', '电影select', 'getFilm', '1', '2017-08-31 14:50:25', '1', '2017-08-31 14:50:25', '61');
INSERT INTO `mrhu_purv` VALUES ('63', '电影update', 'updateFilm', '1', '2017-08-31 14:50:42', '1', '2017-08-31 14:50:42', '61');
INSERT INTO `mrhu_purv` VALUES ('64', '电影delete', 'deleteFilm', '1', '2017-08-31 14:51:00', '1', '2017-08-31 14:51:00', '61');
INSERT INTO `mrhu_purv` VALUES ('65', '综艺', 'works_variety', '1', '2017-08-31 16:04:13', '1', '2017-08-31 16:04:13', '52');
INSERT INTO `mrhu_purv` VALUES ('66', '奖项', 'works_awards', '1', '2017-08-31 16:04:36', '1', '2017-08-31 16:04:36', '52');
INSERT INTO `mrhu_purv` VALUES ('67', '综艺select', 'getVaritey', '1', '2017-08-31 17:23:20', '1', '2017-08-31 17:23:20', '65');
INSERT INTO `mrhu_purv` VALUES ('68', '综艺update', 'updateVaritey', '1', '2017-08-31 17:23:38', '1', '2017-08-31 17:23:38', '65');
INSERT INTO `mrhu_purv` VALUES ('69', '综艺delete', 'deleteVaritey', '1', '2017-08-31 17:23:57', '1', '2017-08-31 17:23:57', '65');
INSERT INTO `mrhu_purv` VALUES ('70', '奖项select', 'getAwards', '1', '2017-08-31 17:24:15', '1', '2017-08-31 17:24:15', '66');
INSERT INTO `mrhu_purv` VALUES ('71', '奖项update', 'updateAwards', '1', '2017-08-31 17:24:39', '1', '2017-08-31 17:24:39', '66');
INSERT INTO `mrhu_purv` VALUES ('72', '奖项delete', 'deleteAwards', '1', '2017-08-31 17:24:55', '1', '2017-08-31 17:24:55', '66');
INSERT INTO `mrhu_purv` VALUES ('73', '轮播显示', 'slideShow', '1', '2017-09-01 14:52:25', '1', '2017-09-01 14:52:25', '17');
INSERT INTO `mrhu_purv` VALUES ('74', '轮播显示select', 'getSlideShow', '1', '2017-09-01 14:53:11', '1', '2017-09-01 14:53:11', '73');
INSERT INTO `mrhu_purv` VALUES ('75', '轮播显示update', 'updateSlideShow', '1', '2017-09-01 14:53:55', '1', '2017-09-01 14:53:55', '73');
INSERT INTO `mrhu_purv` VALUES ('76', '轮播显示delete', 'deleteSlideShow', '1', '2017-09-01 14:56:09', '1', '2017-09-01 14:56:09', '73');

-- ----------------------------
-- Table structure for mrhu_role
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_role`;
CREATE TABLE "mrhu_role" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  "name" varchar(255) NOT NULL COMMENT '角色名',
  "data" varchar(2000) NOT NULL COMMENT '权限信息',
  "add_by" int(11) NOT NULL COMMENT '添加人',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  "edit_by" int(11) NOT NULL COMMENT '修改人',
  "edit_time" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of mrhu_role
-- ----------------------------
INSERT INTO `mrhu_role` VALUES ('1', '开发人员', 'purv;getPurv;updatePurv;deletePurv;role;deleteRole;getRole;updateRole;system;slideShow;getSlideShow;updateSlideShow;deleteSlideShow;updateSystem;category;getCategory;updateCategory;deleteCategory;user;getUser;updateUser;deleteUser;works;works_awards;getAwards;updateAwards;deleteAwards;works_album;getAlbum;updateAlbum;deleteAlbum;works_concert;getConcert;updateConcert;deleteConcert;works_film;getFilm;updateFilm;deleteFilm;works_variety;deleteVaritey;getVaritey;updateVaritey;material;material_image;getImage;updateImage;deleteImage;material_music;deleteMedia;getMedia;updateMedia;material_video;show;show_notice;show_share;show_article;deleteShow;getShow;updateShow;show_music;getArtMusic;updateArtMusic;deleteArtMusic;show_video;getArtVideo;updateArtVideo;deleteArtVideo;show_image;updateArtImage;deleteArtImage;getArtImage', '1', '2017-08-25 18:27:34', '1', '2017-09-01 14:56:17');
INSERT INTO `mrhu_role` VALUES ('3', '管理员', 'material;material_image;getImage;updateImage;deleteImage;material_music;updateMedia;deleteMedia;getMedia;material_video;show;show_video;getArtVideo;updateArtVideo;deleteArtVideo;show_image;getArtImage;updateArtImage;deleteArtImage;show_notice;show_share;show_article;updateShow;deleteShow;getShow;show_music;getArtMusic;updateArtMusic;deleteArtMusic;works;works_film;getFilm;updateFilm;deleteFilm;works_variety;deleteVaritey;getVaritey;updateVaritey;works_awards;getAwards;updateAwards;deleteAwards;works_album;getAlbum;updateAlbum;deleteAlbum;works_concert;getConcert;updateConcert;deleteConcert;user;getUser', '1', '2017-08-28 12:50:48', '1', '2017-08-31 17:30:36');

-- ----------------------------
-- Table structure for mrhu_slide_show
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_slide_show`;
CREATE TABLE "mrhu_slide_show" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  "image_id" int(11) NOT NULL COMMENT '图片id',
  "link" varchar(255) NOT NULL COMMENT '链接',
  "order_by" int(11) NOT NULL COMMENT '排序',
  "add_by" int(11) NOT NULL COMMENT '添加人',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  "edit_by" int(11) NOT NULL COMMENT '修改人',
  "edit_time" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  "delete" int(1) NOT NULL DEFAULT '0' COMMENT '0：未删除；1：删除；',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mrhu_slide_show
-- ----------------------------
INSERT INTO `mrhu_slide_show` VALUES ('1', '1', '', '1', '1', '2017-09-01 15:17:05', '1', '2017-10-18 11:04:24', '0');
INSERT INTO `mrhu_slide_show` VALUES ('2', '7', '', '2', '1', '2017-09-12 18:16:45', '1', '2017-10-18 11:04:29', '0');
INSERT INTO `mrhu_slide_show` VALUES ('3', '9', '', '3', '1', '2017-09-12 18:16:52', '1', '2017-10-18 11:04:35', '0');
INSERT INTO `mrhu_slide_show` VALUES ('4', '25', '', '4', '1', '2017-09-12 18:16:58', '1', '2017-10-18 11:04:39', '0');
INSERT INTO `mrhu_slide_show` VALUES ('5', '26', '', '50', '1', '2017-09-12 18:17:04', '1', '2017-10-18 11:04:18', '1');

-- ----------------------------
-- Table structure for mrhu_system
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_system`;
CREATE TABLE "mrhu_system" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  "name" varchar(255) NOT NULL COMMENT '参数名称',
  "value" varchar(255) NOT NULL COMMENT '参数内容',
  "type" varchar(255) NOT NULL COMMENT '参数类型',
  "info" varchar(255) NOT NULL COMMENT '说明文字',
  "order_by" int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='系统参数表用于单独的设置视情况使用多语言功能';

-- ----------------------------
-- Records of mrhu_system
-- ----------------------------
INSERT INTO `mrhu_system` VALUES ('1', 'company_name', 'Tiger', '1', '网站名称', '1');
INSERT INTO `mrhu_system` VALUES ('2', 'company_email', 'spacehu@tigerhuclub.com', '1', '网站email', '2');
INSERT INTO `mrhu_system` VALUES ('4', 'out_put_email', 'huxiaoleiwangzi@qq.com', '1', '发送邮箱', '20');
INSERT INTO `mrhu_system` VALUES ('5', 'out_put_password', 'jianbia78', '1', '发送邮箱密码', '21');
INSERT INTO `mrhu_system` VALUES ('6', 'url_rewrite', 'true', '1', '是否重写路径true 重写 false不重写', '50');
INSERT INTO `mrhu_system` VALUES ('7', 'home_background', 'img', '1', '首页背景图片', '50');
INSERT INTO `mrhu_system` VALUES ('8', 'home_flash', 'img', '1', '首页轮播图片', '50');
INSERT INTO `mrhu_system` VALUES ('9', 'lang_arr', 'zh_cn:中文版;zh_tw:繁体', '1', '多语言数组：参数：名称', '100');
INSERT INTO `mrhu_system` VALUES ('11', 'lang_chose', 'zh_cn', '1', '当前语言', '50');
INSERT INTO `mrhu_system` VALUES ('12', 'out_put_server', 'smtp.qq.com', '1', '发送邮件的smtp服务器', '22');
INSERT INTO `mrhu_system` VALUES ('13', 'out_put_ssl', '465', '1', '发送邮件的smtp服务器的端口号', '23');

-- ----------------------------
-- Table structure for mrhu_user
-- ----------------------------
DROP TABLE IF EXISTS `mrhu_user`;
CREATE TABLE "mrhu_user" (
  "id" int(11) NOT NULL AUTO_INCREMENT COMMENT '用户表主id',
  "name" varchar(255) NOT NULL COMMENT '用户名',
  "password" varchar(255) NOT NULL COMMENT '密码',
  "add_by" int(11) NOT NULL COMMENT '添加人',
  "add_time" datetime NOT NULL COMMENT '添加时间',
  "edit_by" int(11) NOT NULL COMMENT '修改人',
  "edit_time" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  "role_id" int(11) DEFAULT NULL,
  "delete" int(1) NOT NULL DEFAULT '0' COMMENT '0：未删除；1：删除；',
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of mrhu_user
-- ----------------------------
INSERT INTO `mrhu_user` VALUES ('1', 'space', '96e79218965eb72c92a549dd5a330112', '0', '2017-08-18 12:25:09', '1', '2017-08-25 18:33:16', '1', '0');
INSERT INTO `mrhu_user` VALUES ('2', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 15:02:13', '1', '2017-08-22 18:49:23', '1', '0');
INSERT INTO `mrhu_user` VALUES ('3', 'user1', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 15:03:08', '1', '2017-08-28 12:51:07', '3', '0');
INSERT INTO `mrhu_user` VALUES ('4', 'user2', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 15:45:01', '1', '2017-08-22 18:49:24', '1', '0');
INSERT INTO `mrhu_user` VALUES ('5', 'user3', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 15:45:15', '1', '2017-08-22 18:49:24', '0', '0');
INSERT INTO `mrhu_user` VALUES ('6', 'user4', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 15:45:21', '1', '2017-08-22 18:49:30', '0', '0');
INSERT INTO `mrhu_user` VALUES ('7', 'user5', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 15:45:25', '1', '2017-08-22 18:49:31', '0', '0');
INSERT INTO `mrhu_user` VALUES ('8', 'user6', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 15:45:48', '1', '2017-08-22 18:49:31', '0', '0');
INSERT INTO `mrhu_user` VALUES ('9', 'user7', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 15:45:58', '1', '2017-08-22 18:49:32', '0', '1');
INSERT INTO `mrhu_user` VALUES ('10', 'user7', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 15:52:48', '1', '2017-08-22 18:49:32', '0', '1');
INSERT INTO `mrhu_user` VALUES ('11', 'user7', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 15:55:52', '1', '2017-08-22 18:49:33', '1', '0');
INSERT INTO `mrhu_user` VALUES ('12', 'user8', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 16:53:25', '1', '2017-08-22 18:49:26', '0', '0');
INSERT INTO `mrhu_user` VALUES ('13', 'user9', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 16:53:31', '1', '2017-08-22 18:49:26', '0', '0');
INSERT INTO `mrhu_user` VALUES ('14', 'user10', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 16:53:41', '1', '2017-08-22 18:49:26', '1', '0');
INSERT INTO `mrhu_user` VALUES ('15', 'user11', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-08-22 18:28:38', '1', '2017-08-22 18:49:34', '0', '0');
