-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 04, 2024 at 05:36 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symsnip`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20241001160901', '2024-10-01 16:13:52', 1521),
('DoctrineMigrations\\Version20241001161410', '2024-10-01 16:14:52', 215),
('DoctrineMigrations\\Version20241001161930', '2024-10-01 16:19:46', 524),
('DoctrineMigrations\\Version20241001162448', '2024-10-01 16:24:55', 1853),
('DoctrineMigrations\\Version20241001173526', '2024-10-01 17:35:42', 143),
('DoctrineMigrations\\Version20241001174104', '2024-10-01 17:41:22', 263),
('DoctrineMigrations\\Version20241002042910', '2024-10-02 04:29:25', 216);

-- --------------------------------------------------------

--
-- Table structure for table `exes_code`
--

DROP TABLE IF EXISTS `exes_code`;
CREATE TABLE IF NOT EXISTS `exes_code` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exes_code`
--

INSERT INTO `exes_code` (`id`, `title`, `description`, `image`, `location`) VALUES
(1, 'Multi-Installer', 'Includes options for 5 various React/Node projects and an MVC builder', 'images/NodeIcon.png', 'downloads/multi-install-tool.exe');

-- --------------------------------------------------------

--
-- Table structure for table `html`
--

DROP TABLE IF EXISTS `html`;
CREATE TABLE IF NOT EXISTS `html` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `html`
--

INSERT INTO `html` (`id`, `title`, `description`, `image`, `code`) VALUES
(1, 'Login Form', 'Basic Login with userName and Password', 'images/BasicLoginForm-TW.png', '<div class=\"w-1/6 mx-auto text-center border border-blue-500 rounded-xl p-10\">\r\n<form action=\"./\" method=\"POST\">\r\n    <h3 class=\"text-xl font-bold pb-4\" id=\"loginFormHeader\">Login</h3>\r\n    <div>\r\n        <label class=\"text-gray-600 font-bold inline-block pb-2\" for=\"userLoginName\" id=\"loginFormUser\">Name :</label>\r\n        <input class=\"border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2\" type=\"text\" name=\"userLoginName\" id=\"userName\" required>\r\n    </div>\r\n    <div>\r\n        <label class=\"text-gray-600 font-bold inline-block pb-2\" for=\"userLoginPwd\" id=\"loginFormPwd\">Password :</label>\r\n        <input class=\"border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2\" type=\"password\" name=\"userLoginPwd\" id=\"userLoginPwd\" required>\r\n    </div>\r\n    <div>\r\n        <button type=\"submit\" class=\"bg-[#4F46E5] w-auto mt-3 p-2 rounded-md text-white font-bold cursor-pointer hover:bg-[#181196]\">Submit</button>\r\n    </div>\r\n</form>\r\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `main_code`
--

DROP TABLE IF EXISTS `main_code`;
CREATE TABLE IF NOT EXISTS `main_code` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_97A602FA3CD4754E` (`html_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_code`
--

INSERT INTO `main_code` (`id`, `title`, `description`, `code`, `type`, `html_id`) VALUES
(3, 'Basic Login Call', 'Login Function Calls for Basic Login Form', '// PROCEDURAL VERSION\r\nif (isset($_POST[&quot;userLoginName&quot;],\r\n          $_POST[&quot;userLoginPwd&quot;])) {\r\n    $name = standardClean($_POST[&quot;userLoginName&quot;]);\r\n    $pwd = $_POST[&quot;userLoginPwd&quot;];\r\n    $attemptLogin = attemptUserLogin($db,$name, $pwd);\r\n\r\n    header(&quot;Location: ./&quot;);\r\n}\r\n\r\n// OO Version\r\nif (isset($_POST[&quot;userLoginName&quot;], \r\n          $_POST[&quot;userLoginPwd&quot;])) {\r\n    $name = $_POST[&quot;userLoginName&quot;];\r\n    $pwd = $_POST[&quot;userLoginPwd&quot;];\r\n// either have this here or put it outside the function if there are multiple functions\r\n    // $userManager = new UserManager($db);\r\n    if ($userManager-&gt;attemptUserLogin($name, $pwd)) {\r\n        header(&quot;Location: ./&quot;);\r\n        exit;\r\n    } else {\r\n        echo &quot;Login failed. Please check your credentials.&quot;;\r\n    }\r\n}', 'phpCall', NULL),
(4, 'Logout', 'Logout Function that will work anywhere', 'public function userLogout() : void {\r\n        $_SESSION = []; // equivalent of session_unset()\r\n\r\n        if (ini_get(\"session.use_cookies\")) {\r\n            $params = session_get_cookie_params();\r\n            setcookie(session_name(), \'\', time() - 42000,\r\n                $params[\"path\"], $params[\"domain\"],\r\n                $params[\"secure\"], $params[\"httponly\"]\r\n            );\r\n        }\r\n        session_destroy();\r\n    }', 'phpFunc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_is_me` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_USERNAME` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `user_is_me`) VALUES
(1, 'leerlandaisSnip', '[\"ROLE_ME_FOR_SNIPPETS\"]', '$2y$13$hcBHe9y9hCArrre7IhFedunji6Tfska68nw0ohipygtCOEjn/GJhm', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `main_code`
--
ALTER TABLE `main_code`
  ADD CONSTRAINT `FK_97A602FA3CD4754E` FOREIGN KEY (`html_id`) REFERENCES `html` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
