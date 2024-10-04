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

--
-- Dumping data for table `doctrine_migration_versions`
--



--
-- Dumping data for table `exes_code`
--

INSERT INTO `exes_code` (`id`, `title`, `description`, `image`, `location`) VALUES
(1, 'Multi-Installer', 'Includes options for 5 various React/Node projects and an MVC builder', 'images/NodeIcon.png', 'downloads/multi-install-tool.exe');

--
-- Dumping data for table `html`
--

INSERT INTO `html` (`id`, `title`, `description`, `image`, `code`) VALUES
(1, 'Login Form', 'Basic Login with userName and Password', 'images/BasicLoginForm-TW.png', '<div class=\"w-1/6 mx-auto text-center border border-blue-500 rounded-xl p-10\">\r\n<form action=\"./\" method=\"POST\">\r\n    <h3 class=\"text-xl font-bold pb-4\" id=\"loginFormHeader\">Login</h3>\r\n    <div>\r\n        <label class=\"text-gray-600 font-bold inline-block pb-2\" for=\"userLoginName\" id=\"loginFormUser\">Name :</label>\r\n        <input class=\"border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2\" type=\"text\" name=\"userLoginName\" id=\"userName\" required>\r\n    </div>\r\n    <div>\r\n        <label class=\"text-gray-600 font-bold inline-block pb-2\" for=\"userLoginPwd\" id=\"loginFormPwd\">Password :</label>\r\n        <input class=\"border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2\" type=\"password\" name=\"userLoginPwd\" id=\"userLoginPwd\" required>\r\n    </div>\r\n    <div>\r\n        <button type=\"submit\" class=\"bg-[#4F46E5] w-auto mt-3 p-2 rounded-md text-white font-bold cursor-pointer hover:bg-[#181196]\">Submit</button>\r\n    </div>\r\n</form>\r\n</div>');

--
-- Dumping data for table `main_code`
--

INSERT INTO `main_code` (`id`, `title`, `description`, `code`, `type`, `html_id`) VALUES
(3, 'Basic Login Call', 'Login Function Calls for Basic Login Form', '// PROCEDURAL VERSION\r\nif (isset($_POST[&quot;userLoginName&quot;],\r\n          $_POST[&quot;userLoginPwd&quot;])) {\r\n    $name = standardClean($_POST[&quot;userLoginName&quot;]);\r\n    $pwd = $_POST[&quot;userLoginPwd&quot;];\r\n    $attemptLogin = attemptUserLogin($db,$name, $pwd);\r\n\r\n    header(&quot;Location: ./&quot;);\r\n}\r\n\r\n// OO Version\r\nif (isset($_POST[&quot;userLoginName&quot;], \r\n          $_POST[&quot;userLoginPwd&quot;])) {\r\n    $name = $_POST[&quot;userLoginName&quot;];\r\n    $pwd = $_POST[&quot;userLoginPwd&quot;];\r\n// either have this here or put it outside the function if there are multiple functions\r\n    // $userManager = new UserManager($db);\r\n    if ($userManager-&gt;attemptUserLogin($name, $pwd)) {\r\n        header(&quot;Location: ./&quot;);\r\n        exit;\r\n    } else {\r\n        echo &quot;Login failed. Please check your credentials.&quot;;\r\n    }\r\n}', 'phpCall', NULL),
(4, 'Logout', 'Logout Function that will work anywhere', 'public function userLogout() : void {\r\n        $_SESSION = []; // equivalent of session_unset()\r\n\r\n        if (ini_get(\"session.use_cookies\")) {\r\n            $params = session_get_cookie_params();\r\n            setcookie(session_name(), \'\', time() - 42000,\r\n                $params[\"path\"], $params[\"domain\"],\r\n                $params[\"secure\"], $params[\"httponly\"]\r\n            );\r\n        }\r\n        session_destroy();\r\n    }', 'phpFunc', NULL);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `user_is_me`) VALUES
(1, 'leerlandaisSnip', '[\"ROLE_ME_FOR_SNIPPETS\"]', '$2y$13$hcBHe9y9hCArrre7IhFedunji6Tfska68nw0ohipygtCOEjn/GJhm', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
