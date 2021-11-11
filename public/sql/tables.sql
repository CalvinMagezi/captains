-- Adminer 4.7.8 MySQL dump

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- DROP TABLE IF EXISTS `tables`;
-- CREATE TABLE `tables` (
--   `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
--   `table_number` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
--   `managed_by` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
--   `table_key` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
--   `section` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
--   `position` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
--   `status` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
--   `top` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '40px',
--   `left` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0px',
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   UNIQUE KEY `tables_table_id_unique` (`table_key`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tables` (`id`, `table_number`, `managed_by`, `table_key`, `section`, `position`, `status`, `top`, `left`, `created_at`, `updated_at`) VALUES
(1,	'1',	NULL,	'0Kqgj',	'1',	'outside',	'in-active',	'103px',	'122px',	NULL,	NULL),
(2,	'2',	NULL,	'1byh9',	'1',	'inside',	'in-active',	'135px',	'161px',	NULL,	NULL),
(3,	'3',	NULL,	'2bAmE',	'1',	'outside',	'in-active',	'184px',	'157px',	NULL,	NULL),
(4,	'4',	NULL,	'30QPr',	'1',	'inside',	'in-active',	'226px',	'121px',	NULL,	NULL),
(5,	'5',	NULL,	'4KpEM',	'1',	'outside',	'in-active',	'204px',	'69px',	NULL,	NULL),
(6,	'6',	NULL,	'5kIwL',	'1',	'inside',	'in-active',	'124px',	'233px',	NULL,	NULL),
(7,	'7',	NULL,	'6T8YM',	'1',	'outside',	'in-active',	'128px',	'280px',	NULL,	NULL),
(8,	'8',	NULL,	'7p817',	'1',	'inside',	'in-active',	'168px',	'236px',	NULL,	NULL),
(9,	'9',	NULL,	'84NRe',	'1',	'outside',	'in-active',	'167px',	'282px',	NULL,	NULL),
(10,	'10',	NULL,	'9o3On',	'1',	'inside',	'in-active',	'209px',	'233px',	NULL,	NULL),
(11,	'11',	NULL,	'10Y8TR',	'1',	'outside',	'in-active',	'210px',	'279px',	NULL,	NULL),
(12,	'12',	NULL,	'11Z5ro',	'1',	'inside',	'in-active',	'65px',	'362px',	NULL,	NULL),
(13,	'13',	NULL,	'12k2vn',	'1',	'outside',	'in-active',	'64px',	'405px',	NULL,	NULL),
(14,	'14',	NULL,	'13xMjU',	'1',	'inside',	'in-active',	'64px',	'450px',	NULL,	NULL),
(15,	'15',	NULL,	'143os5',	'1',	'outside',	'in-active',	'110px',	'364px',	NULL,	NULL),
(16,	'16',	NULL,	'15Yt7R',	'1',	'inside',	'in-active',	'109px',	'406px',	NULL,	NULL),
(17,	'17',	NULL,	'16e8wd',	'1',	'outside',	'in-active',	'109px',	'449px',	NULL,	NULL),
(18,	'18',	NULL,	'17OWhi',	'1',	'inside',	'in-active',	'172px',	'345px',	NULL,	NULL),
(19,	'19',	NULL,	'18y3ao',	'1',	'outside',	'in-active',	'173px',	'387px',	NULL,	NULL),
(20,	'20',	NULL,	'19c5B1',	'1',	'inside',	'in-active',	'171px',	'429px',	NULL,	NULL),
(21,	'21',	NULL,	'20AcAP',	'1',	'outside',	'in-active',	'171px',	'468px',	NULL,	NULL),
(22,	'22',	NULL,	'218Y7x',	'1',	'inside',	'in-active',	'231px',	'369px',	NULL,	NULL),
(23,	'23',	NULL,	'222Nd0',	'1',	'outside',	'in-active',	'230px',	'411px',	NULL,	NULL),
(24,	'24',	NULL,	'23JiwT',	'1',	'inside',	'in-active',	'229px',	'450px',	NULL,	NULL),
(25,	'25',	NULL,	'24XZfN',	'1',	'outside',	'in-active',	'407px',	'18px',	NULL,	NULL),
(26,	'26',	NULL,	'25FYKC',	'1',	'inside',	'in-active',	'366px',	'64px',	NULL,	NULL),
(27,	'27',	NULL,	'26Wvwe',	'1',	'outside',	'in-active',	'402px',	'89px',	NULL,	NULL),
(28,	'28',	NULL,	'279wpI',	'1',	'inside',	'in-active',	'469px',	'39px',	NULL,	NULL),
(29,	'29',	NULL,	'28cTZl',	'1',	'outside',	'in-active',	'459px',	'97px',	NULL,	NULL),
(30,	'30',	NULL,	'29WdD0',	'1',	'inside',	'in-active',	'378px',	'153px',	NULL,	NULL),
(31,	'31',	NULL,	'307PHs',	'1',	'outside',	'in-active',	'417px',	'153px',	NULL,	NULL),
(32,	'32',	NULL,	'31EZJp',	'1',	'inside',	'in-active',	'461px',	'154px',	NULL,	NULL),
(33,	'33',	NULL,	'32JEq9',	'1',	'outside',	'in-active',	'506px',	'154px',	NULL,	NULL),
(34,	'34',	NULL,	'33F4dS',	'1',	'inside',	'in-active',	'375px',	'220px',	NULL,	NULL),
(35,	'35',	NULL,	'347mbe',	'1',	'outside',	'in-active',	'377px',	'265px',	NULL,	NULL),
(36,	'36',	NULL,	'35Sfl2',	'1',	'inside',	'in-active',	'415px',	'221px',	NULL,	NULL),
(37,	'37',	NULL,	'36mTT0',	'1',	'outside',	'in-active',	'416px',	'266px',	NULL,	NULL),
(38,	'38',	NULL,	'37FKp8',	'1',	'inside',	'in-active',	'460px',	'251px',	NULL,	NULL),
(39,	'39',	NULL,	'38s6mg',	'1',	'outside',	'in-active',	'511px',	'226px',	NULL,	NULL),
(40,	'40',	NULL,	'39B30b',	'1',	'inside',	'in-active',	'512px',	'269px',	NULL,	NULL),
(41,	'41',	NULL,	'40KuHm',	'1',	'outside',	'in-active',	'377px',	'322px',	NULL,	NULL),
(42,	'42',	NULL,	'418aGB',	'1',	'inside',	'in-active',	'418px',	'321px',	NULL,	NULL),
(43,	'43',	NULL,	'42qvIM',	'1',	'outside',	'in-active',	'458px',	'320px',	NULL,	NULL),
(44,	'44',	NULL,	'43nsaR',	'1',	'inside',	'in-active',	'512px',	'320px',	NULL,	NULL),
(45,	'45',	NULL,	'44z2St',	'1',	'outside',	'in-active',	'459px',	'382px',	NULL,	NULL);
COMMIT;

-- 2021-06-17 11:07:14
