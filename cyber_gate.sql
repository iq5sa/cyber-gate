-- -------------------------------------------------------------
-- TablePlus 6.4.4(604)
--
-- https://tableplus.com/
--
-- Database: cyber_gate
-- Generation Time: 2025-11-16 18:57:00.5740
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `incident_reports`;
CREATE TABLE `incident_reports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incident_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incident_date` date NOT NULL,
  `incident_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachments` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `incidents`;
CREATE TABLE `incidents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `legislations`;
CREATE TABLE `legislations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `pdf_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `security_tips`;
CREATE TABLE `security_tips` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `security_tips_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `tip_categories`;
CREATE TABLE `tip_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tip_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('boab_alamn_alsybrany_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1763224603),
('boab_alamn_alsybrany_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1763224603;', 1763224603);

INSERT INTO `incident_reports` (`id`, `name`, `email`, `incident_type`, `incident_date`, `incident_description`, `attachments`, `created_at`, `updated_at`) VALUES
(1, 'سارة عبد الله', 'trisha57@example.org', 'other', '2024-09-01', 'أثناء استخدام النظام الداخلي للشركة، واجه الموظفون صعوبة في الوصول إلى قاعدة البيانات الرئيسية. بعد التحقق، تبين أن السبب كان تحديثًا تلقائيًا أُجري على الخادم دون إشعار مسبق مما أدى إلى توقف الخدمة لمدة ساعتين.\n', '[\"incident-reports/sample-3.pdf\", \"incident-reports/image-2.png\"]', '2025-08-03 14:21:40', '2025-08-03 14:21:40'),
(2, ' أحمد العلي', 'regan.zulauf@example.org', 'other', '2025-02-25', 'أثناء استخدام النظام الداخلي للشركة، واجه الموظفون صعوبة في الوصول إلى قاعدة البيانات الرئيسية. بعد التحقق، تبين أن السبب كان تحديثًا تلقائيًا أُجري على الخادم دون إشعار مسبق مما أدى إلى توقف الخدمة لمدة ساعتين.\n', '[\"incident-reports/sample-2.pdf\", \"incident-reports/image-2.png\"]', '2025-08-03 14:21:40', '2025-08-03 14:21:40'),
(3, ' أحمد العلي', 'jmclaughlin@example.org', 'hr', '2025-01-04', 'حدثت مشادة كلامية بين موظفَين داخل مقر الشركة بسبب خلاف في توزيع المهام. تم التدخل من قبل مسؤول الموارد البشرية وتم التوصل إلى حل ودي بعد جلسة تفاهم بين الطرفين.\n', '[\"incident-reports/sample-1.pdf\", \"incident-reports/image-1.png\"]', '2025-08-03 14:21:40', '2025-08-03 14:21:40'),
(4, 'حسين علي جاسم', 'zoie.kshlerin@example.org', 'other', '2024-12-28', 'أثناء استخدام النظام الداخلي للشركة، واجه الموظفون صعوبة في الوصول إلى قاعدة البيانات الرئيسية. بعد التحقق، تبين أن السبب كان تحديثًا تلقائيًا أُجري على الخادم دون إشعار مسبق مما أدى إلى توقف الخدمة لمدة ساعتين.\n', '[\"incident-reports/sample-3.pdf\", \"incident-reports/image-1.png\"]', '2025-08-03 14:21:40', '2025-08-03 14:21:40'),
(5, 'حسين علي جاسم', 'briana55@example.net', 'other', '2025-06-14', 'أثناء استخدام النظام الداخلي للشركة، واجه الموظفون صعوبة في الوصول إلى قاعدة البيانات الرئيسية. بعد التحقق، تبين أن السبب كان تحديثًا تلقائيًا أُجري على الخادم دون إشعار مسبق مما أدى إلى توقف الخدمة لمدة ساعتين.\n', '[\"incident-reports/sample-1.pdf\", \"incident-reports/image-1.png\"]', '2025-08-03 14:21:40', '2025-08-03 14:21:40'),
(6, 'ليلى حسن', 'dickens.mayra@example.com', 'technical', '2025-03-27', 'أثناء استخدام النظام الداخلي للشركة، واجه الموظفون صعوبة في الوصول إلى قاعدة البيانات الرئيسية. بعد التحقق، تبين أن السبب كان تحديثًا تلقائيًا أُجري على الخادم دون إشعار مسبق مما أدى إلى توقف الخدمة لمدة ساعتين.\n', '[\"incident-reports/sample-2.pdf\", \"incident-reports/image-2.png\"]', '2025-08-03 14:21:40', '2025-08-03 14:21:40'),
(7, 'حسين علي جاسم', 'constantin.purdy@example.org', 'technical', '2024-09-25', 'تم رصد محاولة تسجيل دخول مشبوهة إلى حساب أحد الموظفين من عنوان IP غير معروف في وقت متأخر من الليل. تم إبلاغ قسم الأمن السيبراني واتخذت الإجراءات اللازمة لتغيير كلمات المرور وتعطيل الحساب مؤقتًا.\n', '[\"incident-reports/sample-3.pdf\", \"incident-reports/image-1.png\"]', '2025-08-03 14:21:40', '2025-08-03 14:21:40'),
(8, 'ليلى حسن', 'greenfelder.freeda@example.org', 'security', '2025-01-03', 'تم رصد محاولة تسجيل دخول مشبوهة إلى حساب أحد الموظفين من عنوان IP غير معروف في وقت متأخر من الليل. تم إبلاغ قسم الأمن السيبراني واتخذت الإجراءات اللازمة لتغيير كلمات المرور وتعطيل الحساب مؤقتًا.\n', '[\"incident-reports/sample-1.pdf\", \"incident-reports/image-1.png\"]', '2025-08-03 14:21:40', '2025-08-03 14:21:40'),
(9, 'عباس طالب', 'devonte.anderson@example.org', 'security', '2024-12-04', 'حدثت مشادة كلامية بين موظفَين داخل مقر الشركة بسبب خلاف في توزيع المهام. تم التدخل من قبل مسؤول الموارد البشرية وتم التوصل إلى حل ودي بعد جلسة تفاهم بين الطرفين.\n', '[\"incident-reports/sample-3.pdf\", \"incident-reports/image-3.png\"]', '2025-08-03 14:21:40', '2025-08-03 14:21:40'),
(10, 'عباس طالب', 'goodwin.bridget@example.net', 'hr', '2024-10-20', 'حدثت مشادة كلامية بين موظفَين داخل مقر الشركة بسبب خلاف في توزيع المهام. تم التدخل من قبل مسؤول الموارد البشرية وتم التوصل إلى حل ودي بعد جلسة تفاهم بين الطرفين.\n', '[\"incident-reports/sample-3.pdf\", \"incident-reports/image-3.png\"]', '2025-08-03 14:21:40', '2025-08-03 14:21:40');

INSERT INTO `legislations` (`id`, `title`, `description`, `pdf_path`, `created_at`, `updated_at`) VALUES
(1, 'تعليمات تحديد معايير مخالفات أحكام قانون الأمن السيبراني لسنة 2025	', 'تعليمات تحديد معايير مخالفات أحكام قانون الأمن السيبراني لسنة 2025	', 'legislations/01K3BN9R5T5QBAXKG5PN2FN7PY.pdf', '2025-08-03 15:52:23', '2025-08-23 16:03:16'),
(2, 'قانون الجرائم الإلكترونية لسنة 2023	', 'قانون الجرائم الإلكترونية لسنة 2023	', 'legislations/01K3BNAC9J8YHTTR69YZ9RQAY8.pdf', '2025-08-23 14:29:01', '2025-08-23 14:29:01'),
(3, 'قانون حماية البيانات الشخصية لسنة 2023	', 'قانون حماية البيانات الشخصية لسنة 2023	', 'legislations/01K3BNAQB7KRYC0GY39P4ZR0NJ.pdf', '2025-08-23 14:29:12', '2025-08-23 14:29:12'),
(4, 'نظام ترخيص مقدمي خدمات الأمن السيبراني لسنة 2024	', 'نظام ترخيص مقدمي خدمات الأمن السيبراني لسنة 2024	', 'legislations/01K3BNB5461A4T662VNF15BPT1.pdf', '2025-08-23 14:29:26', '2025-08-23 14:29:26'),
(5, 'تعليمات أخرى متعلقة بالأمن السيبراني لسنة 2025	', 'تعليمات أخرى متعلقة بالأمن السيبراني لسنة 2025	', 'legislations/01K3BNBEY1NRPG32MRD321W46K.pdf', '2025-08-23 14:29:36', '2025-08-23 14:29:36');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_03_115103_create_security_tips_table', 2),
(5, '2025_08_03_115429_create_tips_categories_table', 2),
(6, '2025_08_03_135807_create_legislations_table', 3),
(7, '2025_08_03_140439_create_incidents_table', 4),
(8, '2025_08_03_140925_create_incident_reports_table', 4),
(9, '2025_08_23_172155_add_video_to_your_table_name', 5);

INSERT INTO `security_tips` (`id`, `title`, `slug`, `excerpt`, `content`, `image`, `video_path`, `category_id`, `is_published`, `published_at`, `created_at`, `updated_at`, `video_poster`) VALUES
(1, '5 خطوات لحماية حساباتك الشخصية من الاختراق2', '5-khtoat-lhmay-hsabatk-alshkhsy-mn-alakhtrak2', '5 خطوات لحماية حساباتك الشخصية من الاختراق', '<p dir=\"rtl\">استخدم كلمات مرور تحتوي على حروف كبيرة وصغيرة، أرقام ورموز، ولا تُكرر نفس كلمة المرور في أكثر من حساب 5 خطوات لحماية حساباتك الشخصية من الاختراق</p>', '01K3BTZHEJQFXHV1XQEABSSG3Z.jpg', 'videos/01KA45YTX5QGCTPGM2D7QPJB7T.mp4', 1, 1, '2025-08-03 14:31:37', '2025-08-03 14:31:37', '2025-11-15 15:46:30', 'posters/01KA45YTX5QGCTPGM2D7QPJB7T.jpg'),
(2, 'كيف تتجنب التصيد الإلكتروني في البريد والرسائل', 'tfaayl-althkk-bkhtotyn', 'كيف تتجنب التصيد الإلكتروني في البريد والرسائل', '<p dir=\"rtl\">كيف تتجنب التصيد الإلكتروني في البريد والرسائل كيف تتجنب التصيد الإلكتروني في البريد والرسائل كيف تتجنب التصيد الإلكتروني في البريد والرسائل</p>', '01K3BV0DP7FCERA2PZHMYJ5CNJ.jpg', NULL, 1, 1, '2025-08-03 14:31:37', '2025-08-03 14:31:37', '2025-08-23 16:08:26', NULL),
(3, 'أهمية التحديثات الدورية لأنظمة التشغيل والتطبيقات', 'la-tfth-alroabt-almshboh', 'أهمية التحديثات الدورية لأنظمة التشغيل والتطبيقات', '<h3 dir=\"rtl\">أهمية التحديثات الدورية لأنظمة التشغيل والتطبيقات أهمية التحديثات الدورية لأنظمة التشغيل والتطبيقات أهمية التحديثات الدورية لأنظمة التشغيل والتطبيقات</h3><p><br></p>', '01K3BV1GHDHHYP75F91ARBJMRK.jpg', NULL, 2, 1, '2025-08-03 14:31:37', '2025-08-03 14:31:37', '2025-08-23 16:09:02', NULL),
(4, 'استخدم VPN في الشبكات العامة', 'astkhdm-vpn-fy-alshbkat-alaaam', 'الواي فاي المفتوح قد يكون فخًا.', 'استخدم VPN لتشفير اتصالك عند استخدام شبكات الإنترنت العامة، خصوصًا في المقاهي أو الأماكن العامة.', '01K3BV6V6ZBTJ3JDBWF0XCQ84D.jpg', NULL, 2, 1, '2025-08-03 14:31:37', '2025-08-03 14:31:37', '2025-08-23 16:11:57', NULL),
(5, 'حدث نظامك بانتظام', 'hdth-nthamk-banttham', 'الثغرات الأمنية تُغلق بالتحديثات.', 'قم بتحديث نظام التشغيل والبرامج بشكل دوري لتفادي استغلال الثغرات الأمنية.', '01K3BV7R7Y5Y1PKWWGYG2P7FS8.jpg', NULL, 3, 1, '2025-08-03 14:31:37', '2025-08-03 14:31:37', '2025-08-23 16:12:26', NULL),
(6, '5 خطوات لحماية حساباتك الشخصية من الاختراق', 'astkhdm-klmat-mror-koy2', '5 خطوات لحماية حساباتك الشخصية من الاختراق', '<p dir=\"rtl\">استخدم كلمات مرور تحتوي على حروف كبيرة وصغيرة، أرقام ورموز، ولا تُكرر نفس كلمة المرور في أكثر من حساب 5 خطوات لحماية حساباتك الشخصية من الاختراق</p>', '01K3BTZHEJQFXHV1XQEABSSG3Z.jpg', NULL, 1, 1, '2025-08-03 14:31:37', '2025-08-03 14:31:37', '2025-08-23 16:07:57', NULL),
(7, 'كيف تتجنب التصيد الإلكتروني في البريد والرسائل', 'tfaayl-althkk-bkhtotyn2', 'كيف تتجنب التصيد الإلكتروني في البريد والرسائل', '<p dir=\"rtl\">كيف تتجنب التصيد الإلكتروني في البريد والرسائل كيف تتجنب التصيد الإلكتروني في البريد والرسائل كيف تتجنب التصيد الإلكتروني في البريد والرسائل</p>', '01K3BV0DP7FCERA2PZHMYJ5CNJ.jpg', NULL, 1, 1, '2025-08-03 14:31:37', '2025-08-03 14:31:37', '2025-08-23 16:08:26', NULL),
(8, 'أهمية التحديثات الدورية لأنظمة التشغيل والتطبيقات', 'la-tfth-alroabt-almshboh2', 'أهمية التحديثات الدورية لأنظمة التشغيل والتطبيقات', '<h3 dir=\"rtl\">أهمية التحديثات الدورية لأنظمة التشغيل والتطبيقات أهمية التحديثات الدورية لأنظمة التشغيل والتطبيقات أهمية التحديثات الدورية لأنظمة التشغيل والتطبيقات</h3><p><br></p>', '01K3BV1GHDHHYP75F91ARBJMRK.jpg', NULL, 2, 1, '2025-08-03 14:31:37', '2025-08-03 14:31:37', '2025-08-23 16:09:02', NULL),
(9, 'استخدم VPN في الشبكات العامة', 'astkhdm-vpn-fy-alshbkat-alaaam2', 'الواي فاي المفتوح قد يكون فخًا.', 'استخدم VPN لتشفير اتصالك عند استخدام شبكات الإنترنت العامة، خصوصًا في المقاهي أو الأماكن العامة.', '01K3BV6V6ZBTJ3JDBWF0XCQ84D.jpg', NULL, 2, 1, '2025-08-03 14:31:37', '2025-08-03 14:31:37', '2025-08-23 16:11:57', NULL),
(10, 'حدث نظامك بانتظام', 'hdth-nthamk-banttham2', 'الثغرات الأمنية تُغلق بالتحديثات.', 'قم بتحديث نظام التشغيل والبرامج بشكل دوري لتفادي استغلال الثغرات الأمنية.', '01K3BV7R7Y5Y1PKWWGYG2P7FS8.jpg', NULL, 3, 1, '2025-08-03 14:31:37', '2025-08-03 14:31:37', '2025-08-23 16:12:26', NULL),
(11, 'استخدم VPN في الشبكات العامة', 'astkhdm-vpn-fy-alshbkat-alaaam3', 'الواي فاي المفتوح قد يكون فخًا.', 'استخدم VPN لتشفير اتصالك عند استخدام شبكات الإنترنت العامة، خصوصًا في المقاهي أو الأماكن العامة.', '01K3BV6V6ZBTJ3JDBWF0XCQ84D.jpg', NULL, 2, 1, '2025-08-03 14:31:37', '2025-08-03 14:31:37', '2025-08-23 16:11:57', NULL),
(12, 'حدث نظامك بانتظام', 'hdth-nthamk-banttham3', 'الثغرات الأمنية تُغلق بالتحديثات.', 'قم بتحديث نظام التشغيل والبرامج بشكل دوري لتفادي استغلال الثغرات الأمنية.', '01K3BV7R7Y5Y1PKWWGYG2P7FS8.jpg', NULL, 3, 1, '2025-08-03 14:31:37', '2025-08-03 14:31:37', '2025-08-23 16:12:26', NULL),
(17, 'أهمية التحديثات الدورية لأنظمة التشغيل والتطبيقات', 'ahmy-althdythat-aldory-lanthm-altshghyl-oalttbykat', 'أهمية التحديثات الدورية لأنظمة التشغيل والتطبيقات', '<p dir=\"rtl\">في عالم التكنولوجيا الحديث، تعد التحديثات الدورية لأنظمة التشغيل والتطبيقات عنصرًا أساسيًا للحفاظ على أمان الأجهزة وكفاءتها. وعلى الرغم من أن بعض المستخدمين قد ينظرون إلى التحديثات على أنها مضايقة أو مجرد رسائل تذكير متكررة، فإن الواقع يثبت أن هذه التحديثات تحمل أهمية كبيرة تؤثر مباشرة على أداء الأجهزة وتجربة المستخدم.</p><h2 dir=\"rtl\">1. تعزيز الأمان والحماية من الثغرات</h2><p dir=\"rtl\">تعد حماية البيانات والمعلومات الشخصية أحد أهم أسباب تحديث الأنظمة والتطبيقات بانتظام. إذ يقوم المطورون بالكشف عن الثغرات الأمنية واستغلالها من قبل القراصنة، وتقوم التحديثات بسد هذه الثغرات فور اكتشافها. استخدام نظام تشغيل أو تطبيق قديم دون تحديث يجعلك عرضة للهجمات الإلكترونية والفيروسات.</p><h2 dir=\"rtl\">2. تحسين الأداء وسرعة النظام</h2><p dir=\"rtl\">التحديثات لا تهدف فقط إلى الأمان، بل تشمل أيضًا تحسين أداء النظام والتطبيقات. غالبًا ما تصحح التحديثات الأخطاء البرمجية، وتحسن استهلاك الذاكرة والمعالج، ما يؤدي إلى تجربة استخدام أكثر سلاسة وسرعة في تنفيذ المهام.</p><h2 dir=\"rtl\">3. الحصول على ميزات ووظائف جديدة</h2><p dir=\"rtl\">مع كل تحديث، يقدم المطورون مزايا ووظائف جديدة تعزز من قدرات التطبيقات والأنظمة. فقد يشمل ذلك تحسين واجهة المستخدم، أدوات جديدة للإنتاجية، أو دعمًا لتقنيات حديثة، مما يزيد من فاعلية استخدام الأجهزة والتطبيقات.</p><h2 dir=\"rtl\">4. توافق أفضل مع الأجهزة والتطبيقات الأخرى</h2><p dir=\"rtl\">التحديثات تساعد على ضمان التوافق بين النظام والتطبيقات المختلفة، بما في ذلك الأجهزة الخارجية مثل الطابعات والكاميرات والملحقات الذكية. استخدام إصدارات قديمة قد يؤدي إلى مشاكل في التوافق وفشل بعض الوظائف.</p><h2 dir=\"rtl\">5. المحافظة على استقرار النظام</h2><p dir=\"rtl\">إهمال التحديثات يمكن أن يؤدي إلى أخطاء متكررة، توقف بعض الوظائف، أو حتى تعطل النظام بالكامل. التحديثات الدورية تساعد في الحفاظ على استقرار النظام والتقليل من الأعطال المفاجئة.</p>', 'images/blog_thumb03.jpg', 'videos/01KA45YTX5QGCTPGM2D7QPJB7T.mp4', NULL, 0, NULL, '2025-08-23 19:29:44', '2025-11-15 17:27:06', 'posters/01KA45YTX5QGCTPGM2D7QPJB7T.jpg');

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KVx9niEGhQf9L6E44cDFDmBuclXWh4xEarVxMtjd', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiZWx0TVhYdXB5OTZlMjhRbnVZM1I5UHZ1aXVaeWZDZmZoVExXY1FubyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vY3liZXItZ2F0ZS50ZXN0L2dldC1oZWxwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiR5OTc2c3hQZFJTZ3oyTWVxT3lhRFp1Vm80LnpaeEJZNEFXRDdhV3NzbDZaRFNUOTYvUzIycSI7czo4OiJmaWxhbWVudCI7YTowOnt9czo2OiJ0YWJsZXMiO2E6MTp7czo0MToiMjFiMGQzNDFmZGQwNzc0ZDQ5ZmVmNzdiMmZhYTQzMDZfcGVyX3BhZ2UiO3M6MzoiYWxsIjt9fQ==', 1763231602);

INSERT INTO `tip_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'حماية الحسابات', 'account-protection', '2025-08-03 14:34:22', '2025-08-03 14:34:22'),
(2, 'الأمن على الإنترنت', 'online-security', '2025-08-03 14:34:22', '2025-08-03 14:34:22'),
(3, 'تحديث الأنظمة والبرامج', 'system-updates', '2025-08-03 14:34:22', '2025-08-03 14:34:22'),
(4, 'الشبكات العامة والواي فاي', 'public-networks', '2025-08-03 14:34:22', '2025-08-03 14:34:22'),
(5, 'الأمن المادي للأجهزة', 'device-security', '2025-08-03 14:34:22', '2025-08-03 14:34:22'),
(6, 'النسخ الاحتياطي واستعادة البيانات', 'backup-recovery', '2025-08-03 14:34:22', '2025-08-03 14:34:22'),
(7, 'الخصوصية والإعدادات الشخصية', 'privacy-settings', '2025-08-03 14:34:22', '2025-08-03 14:34:22'),
(8, 'الحماية من البرمجيات الخبيثة', 'malware-antivirus', '2025-08-03 14:34:22', '2025-08-03 14:34:22');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', '2025-08-03 11:30:56', '$2y$12$y976sxPdRSgz2MeqOyaDZuVo4.zZxBY4AWD7aWssl6ZDST96/S22q', '1vduzQhHeGBBezvDdHQsDQgTnXLfEyX7K9CKt9nIcVH2FUUQxqj1YjpP8c4F', '2025-08-03 11:30:56', '2025-08-03 11:30:56'),
(2, 'Ali cyber', 'ali.cyber@mail.com', NULL, '$2y$12$4zAJXP4I1Gqv24ZzMEt74ue1L1YjHo3AEiMcCxqeNyZ3ZPom1k2ge', 'A615mIlyEM', '2025-08-03 11:30:56', '2025-08-03 11:30:56');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;