
SET FOREIGN_KEY_CHECKS = 0;

-- Surest 导出;  导出时间：2019-03-12 14:56:50

DROP TABLE IF EXISTS `packeddata`;
CREATE TABLE `packeddata` (
  `SN` int(11) NOT NULL AUTO_INCREMENT,
  `model` char(20) DEFAULT NULL,
  `code` char(40) DEFAULT NULL,
  `boxNumber` char(20) DEFAULT NULL,
  `weekNumber` char(5) DEFAULT NULL,
  `packedNum` int(5) DEFAULT NULL,
  `maxPackNum` int(5) DEFAULT NULL,
  `time1` char(20) DEFAULT NULL,
  `time2` char(20) DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `packeddata` (`SN`,`model`,`code`,`boxNumber`,`weekNumber`,`packedNum`,`maxPackNum`,`time1`,`time2`) values('1','model1','code1','box1','2','1','15','2019-1-1','2019-1-1'); 
INSERT INTO `packeddata` (`SN`,`model`,`code`,`boxNumber`,`weekNumber`,`packedNum`,`maxPackNum`,`time1`,`time2`) values('2','model1','code7','box7','8','9','15','2019-1-8','2019-1-1'); 




SET FOREIGN_KEY_CHECKS = 0;

-- Surest 导出;  导出时间：2019-03-12 14:56:50

DROP TABLE IF EXISTS `tdb_goods_types`;
CREATE TABLE `tdb_goods_types` (
  `type_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `tdb_goods_types` (`type_id`,`type_name`,`parent_id`) values('1','爷爷','0'); 
INSERT INTO `tdb_goods_types` (`type_id`,`type_name`,`parent_id`) values('2','父亲','1'); 
INSERT INTO `tdb_goods_types` (`type_id`,`type_name`,`parent_id`) values('3','儿子','2'); 




SET FOREIGN_KEY_CHECKS = 0;

-- Surest 导出;  导出时间：2019-03-12 14:56:50

DROP TABLE IF EXISTS `test2`;
CREATE TABLE `test2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `test2` (`id`,`name`,`pid`) values('1','爷爷2333','222'); 
INSERT INTO `test2` (`id`,`name`,`pid`) values('2','爷爷2','222'); 



