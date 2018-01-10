/*
Navicat MySQL Data Transfer

Source Server         : dame
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : messageboard

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-12-22 11:18:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '种地');
INSERT INTO `category` VALUES ('2', '打工');
INSERT INTO `category` VALUES ('3', '乞讨');
INSERT INTO `category` VALUES ('4', '流浪');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_title` varchar(30) NOT NULL,
  `content` text,
  `comment_time` datetime NOT NULL,
  `category` varchar(20) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('40', 'fasfasfsafasfsafsafasf ', '                    <p>asas asfsafsafafasfasfasfasf wq wq wq wq rw</p>', '2017-12-21 00:00:00', '2', '49');
INSERT INTO `comment` VALUES ('41', '突然间军军军和', '                    <p>嘎嘎嘎嘎过过过过过过过过过所</p>', '2017-12-30 00:00:00', '1', '49');
INSERT INTO `comment` VALUES ('42', '回复的胃疼我他而我特', '                    <p>&nbsp;口蹄疫他热我杀个少打打防守打法少打</p>', '2017-12-29 00:00:00', '2', '49');
INSERT INTO `comment` VALUES ('43', '都给我二而额热', '                    <p>而我也企鹅人企业人与人语法到是非得失地方单方事故</p>', '2017-12-05 00:00:00', '4', '49');
INSERT INTO `comment` VALUES ('44', '是的感受他我人黑寡妇', '                    <p>grew额他房间覆盖教育厅人uu我也业而言而已热</p>', '2017-12-30 00:00:00', '4', '49');
INSERT INTO `comment` VALUES ('45', '沙发沙发上手机卡三大', '                                <p>法国大使馆见客</p>        ', '2017-12-16 00:00:00', '1', '50');
INSERT INTO `comment` VALUES ('46', '钢水电工为而我他额为', '                    <p>&nbsp;而我特务而我而我特务特务提问提问提问题而我</p>', '2017-12-16 00:00:00', '1', '50');
INSERT INTO `comment` VALUES ('47', '为疼痛为昂实打实大师', '                    <p>确认确认 请问去暗示啊啊v擦咋在显得是服萨达服</p>', '2017-12-11 00:00:00', '2', '50');
INSERT INTO `comment` VALUES ('48', '归属感大概额而我他', '                    <p>&nbsp;都干啥大师是发送到为为we佛挡杀佛 猥琐雕刻机三分类好i，萨达， 那就删了豪圣凋枯很久没， 很深刻，是，啊&nbsp;</p>', '2017-12-23 00:00:00', '2', '50');
INSERT INTO `comment` VALUES ('49', '定位而我v返回为而我', '                    <p>而我额外负担啊 我问他而我非 法反倒是发送到</p>', '2017-12-23 00:00:00', '3', '48');
INSERT INTO `comment` VALUES ('50', '奥尕法法啊三个人二各', '                                <p>&nbsp;问他二</p>        ', '2017-12-16 00:00:00', '1', '48');
INSERT INTO `comment` VALUES ('51', '问他凄凄切切群群群群', '                    <p>王企鹅拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖拖</p>', '2017-12-30 00:00:00', '3', '48');
INSERT INTO `comment` VALUES ('52', '颂德歌功过过过过过过', '                    <p>都干啥少时诵诗书所所所所所所所所所所所色无而我却 完全大概服</p>', '2017-12-12 00:00:00', '3', '48');
INSERT INTO `comment` VALUES ('53', 'asfasfsafaf爱是飞洒', '                                <p style=\"text-align: center;\"><font color=\"#1c487f\">啊发发是发放散阀阿发阿发阿发撒飞洒</font></p><p style=\"text-align: left;\">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style=\"\"><font color=\"#f9963b\">噶暗杀发杀死发舒服撒萨法阿发暗示发送发送发送发送放散阀暗示发送发送发送放散阀萨法AV地方刚发的好烦的葛丰化工就鼓风机官方her 额他问我去违法EAS范德萨发送到范德萨范德萨佛挡杀佛上单放散阀士大夫上单发送到佛挡杀佛但是范德萨发送到发送到法</font></i>​<strike>​</strike>​</p><p style=\"text-align: left;\">&nbsp; &nbsp; &nbsp; &nbsp; <b><font color=\"#46acc8\">按时发生分分彩法额发条热热热热鬼地方发的吧&nbsp; 个人</font></b><br></p><h3 style=\"text-align: left;\">&nbsp; &nbsp; &nbsp; &nbsp;<font color=\"#c24f4a\"> <i><b><span style=\"background-color: rgb(139, 170, 74);\">这只是开始，真的问题还藏在无人发掘的角落！</span></b></i></font></h3>        ', '2017-12-29 00:00:00', '1', '52');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sex` char(2) NOT NULL DEFAULT '1',
  `phonenumber` varchar(11) DEFAULT NULL,
  `profile` varchar(40) NOT NULL DEFAULT '../pic/default.jpg',
  `nickname` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('48', 'dsa', 'dsa', 'ma', '12312312323', 'upload/15138173048187.jpg', 'dsa');
INSERT INTO `user` VALUES ('49', 'ewq', 'ewq', 'ma', '12332132132', 'upload/15138176588356.jpg', 'ewq');
INSERT INTO `user` VALUES ('50', '123', '123', 'ma', '12121231231', 'upload/15138212662649.jpg', '123');
INSERT INTO `user` VALUES ('51', 'hhh', 'hhh', 'fe', '12321321321', 'upload/15138215098867.jpg', 'hhh');
INSERT INTO `user` VALUES ('52', 'qwe', 'qwe', 'fe', '12312321321', 'upload/15138436249743.jpg', 'qwe');
