-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 07. nov 2023 ob 09.59
-- Različica strežnika: 10.4.27-MariaDB
-- Različica PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `vaja1`
--

-- --------------------------------------------------------

--
-- Struktura tabele `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL,
  `file` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `materials`
--

INSERT INTO `materials` (`id`, `title`, `description`, `file`, `date`, `id_professor`, `id_subject`) VALUES
(1, 'Test', 'To je test.', 'datoteka.docx', '2023-11-06', 6, 1),
(4, 'Testing', 'To je koncni test.', 'Lubej Boštjan - Testing.zip', '2023-11-06', 5, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(41) NOT NULL,
  `authority` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `professor`
--

INSERT INTO `professor` (`id`, `name`, `surname`, `username`, `password`, `authority`) VALUES
(1, 'Dr.', 'Admin', 'Administrator', 'd033e22ae348aeb5660fc2140aec35850c4da997', 3),
(2, 'Sarah', 'Johnson', 'sjohnson02', '2aa60a8ff7fcd473d321e0146afd9e26df395147', 1),
(3, 'Robert', 'Brown', 'rbrown03', '1119cfd37ee247357e034a08d844eea25f6fd20f', 1),
(4, 'Emily', 'Davis', 'edavis04', 'a1d7584daaca4738d499ad7082886b01117275d8', 1),
(5, 'Boštjan', 'Lubej', 'Baza', '3c202e7fb5b969a84de808f152892f221e9d0bd4', 1),
(6, 'Boštjan', 'Resinovič', 'ResBo', '7a33bcf0eec685539f15db4ea5146411967a4d72', 1),
(7, 'Andrej', 'Grilc', 'AndGr', '55fc5a3fe712abe999942ee27c8af9bfbed120a5', 1),
(8, 'Mihela', 'Jug', 'MihJu', '0351b2b7b4274aa650819cf021e9e0b22ddb48f9', 1),
(9, 'William', 'Lee', 'wlee09', '024b01916e3eaec66a2c4b6fc587b1705f1a6fc8', 1),
(10, 'Karen', 'Harris', 'kharris10', 'f68ec41cde16f6b806d7b04c705766b7318fbb1d', 1),
(11, 'Richard', 'Hall', 'rhall11', 'ddf6c9a1df4d57aef043ca8610a5a0dea097af0b', 1),
(12, 'Linda', 'Martinez', 'lmartinez12', '10c28f9cf0668595d45c1090a7b4a2ae98edfa58', 1),
(13, 'Thomas', 'Young', 'tyoung13', 'd505832286e2c1d2839f394de89b3af8dc3f8c1f', 1),
(14, 'Jennifer', 'Clark', 'jclark14', '89f747bced37a9d8aee5c742e2aea373278eb29f', 1),
(15, 'Charles', 'Turner', 'cturner15', 'bd021e21c14628faa94d4aaac48c869d6b5d0ec3', 1),
(16, 'Maria', 'White', 'mwhite16', '3de778e515e707114b622e769a308d1a2f84052b', 1),
(17, 'Daniel', 'King', 'dking17', 'b9c3d15c70a945d9e308ac763dd254b47c29bc0a', 1),
(18, 'Susan', 'Adams', 'sadams18', 'e7369527332f65fe86c44d87116801a0f4fbe5d3', 1),
(19, 'James', 'Baker', 'jbaker19', '2c30de294b2ca17d5c356645a04ff4d0de832594', 1),
(20, 'Patricia', 'Walker', 'pwalker20', '6b00888703d6cae5654e2d2a6de79c42bbf94497', 1),
(21, 'John', 'Foster', 'jfoster21', '6bd1c0ac395c9cc40acd3fef59209944a8e09cd2', 1),
(22, 'Laura', 'Edwards', 'ledwards22', '4393e23bbcfc18a7ff359b6130e73c55f5bdb541', 1),
(23, 'Robert', 'Collins', 'rcollins23', 'e5e080b98051e09a61175bdd4501701be7185582', 1),
(24, 'Amanda', 'Hill', 'ahill24', 'ec962982c39b2137bc5453e66034a4e774164720', 1),
(25, 'Matthew', 'Green', 'mgreen25', '493fa14b04d2bf8bb61eeaa9eca50bb1fbfc281d', 1),
(26, 'Michelle', 'Scott', 'mscott26', '36d7048e5ff06f7707e4018ef1d17cf6c37dc0c5', 1),
(27, 'Christopher', 'Murphy', 'cmurphy27', 'dff2565104b1a1e3b293579b35829abb47a73b2d', 1),
(28, 'Elizabeth', 'Nelson', 'enelson28', 'c82940c8b3a430670709b2034b9423c728b34416', 1),
(29, 'Daniel', 'Turner', 'dturner29', '7cf05621019e9c633b84f2ba1ea097e8dae22bf7', 1),
(30, 'John', 'Smith', 'jsmith30', '70de8f10edcbe18a77366264db2ee393c9827480', 1);

-- --------------------------------------------------------

--
-- Struktura tabele `ps`
--

CREATE TABLE `ps` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `ps`
--

INSERT INTO `ps` (`id`, `id_professor`, `id_subject`) VALUES
(1, 6, 1),
(2, 6, 5),
(3, 5, 5),
(5, 7, 6),
(6, 7, 7),
(7, 8, 8);

-- --------------------------------------------------------

--
-- Struktura tabele `ss`
--

CREATE TABLE `ss` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `ss`
--

INSERT INTO `ss` (`id`, `id_student`, `id_subject`) VALUES
(3, 3, 6),
(4, 9, 6),
(5, 4, 13),
(6, 1, 9),
(8, 2, 5),
(10, 101, 15),
(11, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(41) NOT NULL,
  `year` int(1) NOT NULL,
  `path` varchar(30) NOT NULL,
  `authority` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `student`
--

INSERT INTO `student` (`id`, `name`, `surname`, `username`, `password`, `year`, `path`, `authority`) VALUES
(1, 'Miha', 'Miško', 'MihaMiško123', '204036a1ef6e7360e536300ea78c6aeb4a9333dd', 3, 'Racunalnicar', 2),
(2, 'Enej', 'Vodušek', 'Endles', '3ae502ade0d860fd52f2ff05711c391230356d9f', 4, 'Racunalnicar', 2),
(3, 'Polde', 'Kovač', 'Poldi', 'd888fdc53bc06d83831c64274b258823274e3ef4', 1, 'Kemik', 2),
(4, 'Max', 'Sovic', 'Jonesy_56', 'cef7e59218e3a7e18aaf7faa4a23bcd964323a66', 4, 'Racunalnicar', 2),
(5, 'David', 'Wilson', 'dwilson05', 'edba955d0ea15fdef4f61726ef97e5af507430c0', 1, 'Kemik', 2),
(6, 'Jessica', 'Lee', 'jlee06', '6d749e8a378a34cf19b4c02f7955f57fdba130a5', 2, 'Elektrotehnik', 2),
(7, 'Daniel', 'White', 'dwhite07', '330ba60e243186e9fa258f9992d8766ea6e88bc1', 3, 'Racunalnicar', 2),
(8, 'Olivia', 'Martin', 'omartin08', 'a8dbbfa41cec833f8dd42be4d1fa9a13142c85c2', 4, 'Kemik', 2),
(9, 'Enej', 'Novak', 'EnNo', '0a709dad3350e74a0e7177b421249e70094d4207', 2, 'Kemik', 2),
(10, 'Sophia', 'Thomas', 'sthomas10', 'f68ec41cde16f6b806d7b04c705766b7318fbb1d', 2, 'Racunalnicar', 2),
(11, 'Benjamin', 'Hall', 'bhall11', 'ddf6c9a1df4d57aef043ca8610a5a0dea097af0b', 3, 'Kemik', 2),
(12, 'Ava', 'Perez', 'aperez12', '10c28f9cf0668595d45c1090a7b4a2ae98edfa58', 4, 'Elektrotehnik', 2),
(13, 'James', 'Garcia', 'jgarcia13', 'd505832286e2c1d2839f394de89b3af8dc3f8c1f', 1, 'Racunalnicar', 2),
(14, 'Emma', 'Martinez', 'emartinez14', '89f747bced37a9d8aee5c742e2aea373278eb29f', 2, 'Kemik', 2),
(15, 'Alexander', 'Rodriguez', 'arodriguez15', 'bd021e21c14628faa94d4aaac48c869d6b5d0ec3', 3, 'Elektrotehnik', 2),
(16, 'Mia', 'Hernandez', 'mhernandez16', '3de778e515e707114b622e769a308d1a2f84052b', 4, 'Racunalnicar', 2),
(17, 'Henry', 'Lopez', 'hlopez17', 'b9c3d15c70a945d9e308ac763dd254b47c29bc0a', 1, 'Kemik', 2),
(18, 'Lily', 'Wilson', 'lwilson18', 'e7369527332f65fe86c44d87116801a0f4fbe5d3', 2, 'Elektrotehnik', 2),
(19, 'Andrew', 'Taylor', 'ataylor19', '2c30de294b2ca17d5c356645a04ff4d0de832594', 3, 'Racunalnicar', 2),
(20, 'Charlotte', 'Young', 'cyoung20', '6b00888703d6cae5654e2d2a6de79c42bbf94497', 4, 'Kemik', 2),
(21, 'Christopher', 'Brown', 'cbrown21', '6bd1c0ac395c9cc40acd3fef59209944a8e09cd2', 1, 'Elektrotehnik', 2),
(22, 'Zoey', 'Gonzalez', 'zgonzalez22', '4393e23bbcfc18a7ff359b6130e73c55f5bdb541', 2, 'Racunalnicar', 2),
(23, 'Samantha', 'Scott', 'sscott23', 'e5e080b98051e09a61175bdd4501701be7185582', 3, 'Kemik', 2),
(24, 'Joseph', 'Lewis', 'jlewis24', 'ec962982c39b2137bc5453e66034a4e774164720', 4, 'Elektrotehnik', 2),
(25, 'William', 'Turner', 'wturner25', '493fa14b04d2bf8bb61eeaa9eca50bb1fbfc281d', 1, 'Racunalnicar', 2),
(26, 'Sofia', 'Jackson', 'sjackson26', '36d7048e5ff06f7707e4018ef1d17cf6c37dc0c5', 2, 'Kemik', 2),
(27, 'Anthony', 'Harris', 'aharris27', 'dff2565104b1a1e3b293579b35829abb47a73b2d', 3, 'Elektrotehnik', 2),
(28, 'Grace', 'Adams', 'gadams28', 'c82940c8b3a430670709b2034b9423c728b34416', 4, 'Racunalnicar', 2),
(29, 'Benjamin', 'King', 'bking29', '7cf05621019e9c633b84f2ba1ea097e8dae22bf7', 1, 'Kemik', 2),
(30, 'Isabella', 'Wright', 'iwright30', '70de8f10edcbe18a77366264db2ee393c9827480', 2, 'Elektrotehnik', 2),
(31, 'Christopher', 'Lee', 'clee31', 'f4e1eca75c7ca588ffece061d51be44b65942422', 3, 'Racunalnicar', 2),
(32, 'Amelia', 'Green', 'agreen32', '4e0f441b33ed59f69b2075604cf74f0b4dc5f8f7', 4, 'Kemik', 2),
(33, 'Daniel', 'Martinez', 'dmartinez33', '92bf18f8a63e350b0c95b1035c3939c633985875', 1, 'Elektrotehnik', 2),
(34, 'Harper', 'Clark', 'hclark34', '849071e0dbc2d75250c36281eeaceb2377673cf6', 2, 'Racunalnicar', 2),
(35, 'David', 'Hill', 'dhill35', '69a1871ab9200ed3e330e489f23789044e763fc7', 3, 'Kemik', 2),
(36, 'Mia', 'Allen', 'mallen36', 'e68150663441fe28f6288a4688b557b2e15c2e03', 4, 'Elektrotehnik', 2),
(37, 'Joseph', 'Hall', 'jhall37', '678663851798df02f85f18a552184e9f46996735', 1, 'Racunalnicar', 2),
(38, 'Emily', 'Adams', 'eadams38', 'bf8e9b50e0a298be93cb412a73d9ef5ba7d746db', 2, 'Kemik', 2),
(39, 'Alexander', 'Martinez', 'amartinez39', '181a670402d8fac3ec284cb9309cd06b4499bf7d', 3, 'Elektrotehnik', 2),
(40, 'Charlotte', 'Gonzalez', 'cgonzalez40', '68617a33df2ea41a0a835ac878e0d2065e238da8', 4, 'Racunalnicar', 2),
(41, 'William', 'Mitchell', 'wmitchell41', 'd2116a45f6cb68bf7dad2464e04a73b492ba1778', 1, 'Racunalnicar', 2),
(42, 'Ava', 'Nelson', 'anelson42', 'aba1df3b90705c06f35282f52c51303a6c675669', 2, 'Kemik', 2),
(43, 'Oliver', 'Hall', 'ohall43', 'b472077a5a412cf4af8615d69db06c1472a4e95d', 3, 'Elektrotehnik', 2),
(44, 'Sophia', 'Lee', 'slee44', 'db9990ce810e272e3579513617a73862753d8070', 4, 'Racunalnicar', 2),
(45, 'Henry', 'Gonzalez', 'hgonzalez45', '1ee51dee908702b116b6ac09c51cc148aa121398', 1, 'Kemik', 2),
(46, 'Lily', 'Parker', 'lparker46', '7d4a6d9d335815d2568a12a48650f2326c9111b5', 2, 'Elektrotehnik', 2),
(47, 'Ethan', 'Thompson', 'ethompson47', '3c9947226da5cd7d347158d91317783ef6f9d819', 3, 'Racunalnicar', 2),
(48, 'Madison', 'Harris', 'mharris48', '6391f96f05a5677cbfed763eef7ad8c852d0da2e', 4, 'Kemik', 2),
(49, 'Lucas', 'Davis', 'ldavis49', '85d98211b1fe2e9c04f0674f01eab1cf38045370', 1, 'Elektrotehnik', 2),
(50, 'Charlotte', 'Robinson', 'crobinson50', '64c2b1b509efb45b2089931d0f40c7e049ada5cc', 2, 'Racunalnicar', 2),
(51, 'Liam', 'Wright', 'lwright51', 'b34a9930a8d048dfc6276765ca6a2924cadd5cb6', 3, 'Kemik', 2),
(52, 'Mia', 'Turner', 'mturner52', '9e26310a1cdeadccae64ad5752a11fa98705c67b', 4, 'Elektrotehnik', 2),
(53, 'James', 'Brown', 'jbrown53', '8a5f536c074ca3f7dd26616a08b538229efc0fb9', 1, 'Racunalnicar', 2),
(54, 'Harper', 'Green', 'hgreen54', 'e6c694b4be1f6ec046e4c6d8e4c49e02d811c731', 2, 'Kemik', 2),
(55, 'Emma', 'Carter', 'ecarter55', '7a651d224ed0b605f19d6091ef0476468bf2abea', 3, 'Elektrotehnik', 2),
(56, 'Noah', 'King', 'nking56', '6111b6c91a747c669bc242f22a84acaa3a08f08c', 4, 'Racunalnicar', 2),
(57, 'Sophia', 'Anderson', 'sanderson57', 'aec896a2b1e7fed3c4bb1bd1921d68e0f63fe58e', 1, 'Kemik', 2),
(58, 'Ethan', 'Perez', 'eperez58', '0618d353d3467e9d5337d9b93b629b79e6de7634', 2, 'Elektrotehnik', 2),
(59, 'Ava', 'Scott', 'ascott59', '8580a9f77aea45dfff8da1e688b99147163cfd6a', 3, 'Racunalnicar', 2),
(60, 'Oliver', 'White', 'owhite60', 'c4443586872c4b8cdae4a985a7eb2fc5fe6abf5f', 4, 'Kemik', 2),
(61, 'Madison', 'Clark', 'mclark61', '6d5b57a9316eb5125c5700029ad2d57ab84707ca', 1, 'Racunalnicar', 2),
(62, 'Liam', 'Parker', 'lparker62', '85d5aaf0c1930b50368daee08f14e56c142ad2fd', 2, 'Kemik', 2),
(63, 'Emma', 'Gonzalez', 'egonzalez63', 'ba0cce1eea8cfb0e854750b841517b8ac261ec08', 3, 'Elektrotehnik', 2),
(64, 'Lucas', 'Nelson', 'lnelson64', 'd09bf04fe54dd217686f83679eb08fc58441e80d', 4, 'Racunalnicar', 2),
(65, 'Olivia', 'Harris', 'oharris65', 'a78ac0df3115327876b17650c0649ed070c29552', 1, 'Kemik', 2),
(66, 'Mia', 'Martin', 'mmartin66', '917aea94fbc62282b4c6dd6a83594acc945ba563', 2, 'Elektrotehnik', 2),
(67, 'William', 'Hall', 'whall67', '85631d1f3aa992becf87ec259268ccc5cb8e7c2b', 3, 'Racunalnicar', 2),
(68, 'Noah', 'Lee', 'nlee68', 'b9e70581668e70e3a6796e9e5a28314e54ebb5f4', 4, 'Kemik', 2),
(69, 'Ava', 'Williams', 'awilliams69', '39d2d782f23727b79996cf3e233730f1ccd6dbd6', 1, 'Elektrotehnik', 2),
(70, 'Sophia', 'Thompson', 'sthompson70', 'f2666e0d888c6921ee60356f487b40dcedbe7fd7', 2, 'Racunalnicar', 2),
(71, 'Ethan', 'Scott', 'escott71', '1d723205182399ba03df0fdf8279bbd6dd2671a3', 3, 'Kemik', 2),
(72, 'James', 'Martinez', 'jmartinez72', '0178e9f51aca2c94be1a902d2896eb06d87b1817', 4, 'Elektrotehnik', 2),
(73, 'Oliver', 'Davis', 'odavis73', 'a6010fbae0d4ff0c3c66b6b9d0ed7abadec5b6ff', 1, 'Racunalnicar', 2),
(74, 'Charlotte', 'Wilson', 'cwilson74', '21b961f3f939e15f966696256d532dc71318f941', 2, 'Kemik', 2),
(75, 'Lily', 'Johnson', 'ljohnson75', 'e5f44e727af97eea5d6a7c9a5e02c14e915a3dae', 3, 'Elektrotehnik', 2),
(76, 'Ethan', 'Hernandez', 'ehernandez76', '209c697e5d1e3cdf0181a1f10cffce61a6b39697', 4, 'Racunalnicar', 2),
(77, 'Lucas', 'Garcia', 'lgarcia77', 'd4bdf1c98475a2b1d4ba796996f941e375cffa83', 1, 'Kemik', 2),
(78, 'Sophia', 'Smith', 'ssmith78', 'ba72cddf87408f3ea2b3df876955ee317101573c', 2, 'Elektrotehnik', 2),
(79, 'Noah', 'Brown', 'nbrown79', '861a4b4d494c0d9d2d491a60153f130db48ab59d', 3, 'Racunalnicar', 2),
(80, 'Olivia', 'Thomas', 'othomas80', '265657489b09e33afca0ebf493103ad39e14f471', 4, 'Kemik', 2),
(81, 'Benjamin', 'Martin', 'bmartin81', '1920166f93a35f465685612522501bb1fcba09aa', 1, 'Racunalnicar', 2),
(82, 'Mia', 'Young', 'myoung82', '0838b55de12f709a894b68f078489e08331ba978', 2, 'Kemik', 2),
(83, 'Lucas', 'Lewis', 'llewis83', '749fba895f355dd7e3615c268209cc0fd8668f24', 3, 'Elektrotehnik', 2),
(84, 'Sophia', 'King', 'sking84', '8e630e80c851695e2cd2b19cbd3db98774dc078c', 4, 'Racunalnicar', 2),
(85, 'William', 'Hernandez', 'whernandez85', '741a03fecc831b80fb70ccf1f9735d99ce9f9bad', 1, 'Kemik', 2),
(86, 'Lily', 'Thompson', 'lthompson86', 'edcd1937c7beef5e591d32e5f0d46378ff756ba2', 2, 'Elektrotehnik', 2),
(87, 'Oliver', 'Smith', 'osmith87', 'b9859f50a6bdd9de6d24b62114f0956f8216a95f', 3, 'Racunalnicar', 2),
(88, 'Charlotte', 'Hall', 'chall88', 'a720aa4c4760d53f6e400f0bd63d6f47777513b8', 4, 'Kemik', 2),
(89, 'James', 'Gonzalez', 'jgonzalez89', 'dcf95838f257e32d41565c89d714a500b90beb14', 1, 'Elektrotehnik', 2),
(90, 'Ava', 'Garcia', 'agarcia90', '935cfcca70d040cc98c7fab90df4da07dbd9ba01', 2, 'Racunalnicar', 2),
(91, 'Noah', 'Davis', 'ndavis91', 'b8cbb4e80d43d68cbf3198cc53c9640179afb9c9', 3, 'Kemik', 2),
(92, 'Olivia', 'Perez', 'operez92', '7cd4c38b49bc678ecdb0e0a77148e424da93bcfe', 4, 'Elektrotehnik', 2),
(93, 'Ethan', 'Robinson', 'erobinson93', '443028b87b4c132ea5f633de5d26533f0bfca370', 1, 'Racunalnicar', 2),
(94, 'Sophia', 'Anderson', 'sanderson94', '0257c36c36a403d73e3e5619b13d7b3216baf118', 2, 'Kemik', 2),
(95, 'Liam', 'Wright', 'lwright95', '6d18d245b6d6da3260b54d48c33ee1ae08fe5b62', 3, 'Elektrotehnik', 2),
(96, 'Emma', 'Jackson', 'ejackson96', '86f320d1dd515dca8fd9976e65c9e55706ce7f38', 4, 'Racunalnicar', 2),
(97, 'Mia', 'Wilson', 'mwilson97', '9a03f70e19f6a957425255247224fad11dde586e', 1, 'Kemik', 2),
(98, 'William', 'Harris', 'wharris98', '4de2125d17275db2f57fe67f25caa2a3889782f9', 2, 'Elektrotehnik', 2),
(99, 'Ava', 'Turner', 'aturner99', 'ee1e723029c1e0a3ba002782ce5797ab28904560', 3, 'Racunalnicar', 2),
(100, 'Oliver', 'Nelson', 'onelson100', '7dfcee08fe8c0496b5367e89268b7face0a1c5f1', 4, 'Kemik', 2),
(101, 'Bob', 'Bob', 'Bob', '48181acd22b3edaebc8a447868a7df7ce629920a', 3, 'Elektrotehnik', 2);

-- --------------------------------------------------------

--
-- Struktura tabele `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` int(1) NOT NULL,
  `path` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `subject`
--

INSERT INTO `subject` (`id`, `name`, `year`, `path`) VALUES
(1, 'SMV', 4, 'Racunalnicar'),
(5, 'NRP', 4, 'Racunalnicar'),
(6, 'PRN', 2, 'Elektrotehnik'),
(7, 'ITP', 2, 'Elektrotehnik'),
(8, 'LKI', 3, 'Kemik'),
(9, 'VIS', 1, 'Racunalnicar'),
(10, 'VIP', 1, 'Racunalnicar'),
(11, 'VVO', 2, 'Racunalnicar'),
(12, 'NUP', 3, 'Kemik'),
(13, 'KEM', 3, 'Kemik'),
(14, 'ELE', 4, 'Elektrotehnik'),
(15, 'AIR', 3, 'Elektrotehnik');

-- --------------------------------------------------------

--
-- Struktura tabele `submission`
--

CREATE TABLE `submission` (
  `id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_materials` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `submission`
--

INSERT INTO `submission` (`id`, `file`, `id_student`, `id_materials`) VALUES
(4, 'Kovač Polde - Testing.zip', 3, 4),
(6, 'Vodušek Enej - Testing.zip', 2, 4);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Professor Foreign Key` (`id_professor`),
  ADD KEY `Subject Foreign Key` (`id_subject`);

--
-- Indeksi tabele `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `ps`
--
ALTER TABLE `ps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Professor PS Foreign Key` (`id_professor`),
  ADD KEY `Subject PS Foreign Key` (`id_subject`);

--
-- Indeksi tabele `ss`
--
ALTER TABLE `ss`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Materials Foreign Key` (`id_materials`),
  ADD KEY `Student Foreign Key` (`id_student`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT tabele `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT tabele `ps`
--
ALTER TABLE `ps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT tabele `ss`
--
ALTER TABLE `ss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT tabele `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT tabele `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT tabele `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `Professor Foreign Key` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id`),
  ADD CONSTRAINT `Subject Foreign Key` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id`);

--
-- Omejitve za tabelo `ps`
--
ALTER TABLE `ps`
  ADD CONSTRAINT `Professor PS Foreign Key` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id`),
  ADD CONSTRAINT `Subject PS Foreign Key` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id`);

--
-- Omejitve za tabelo `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `Materials Foreign Key` FOREIGN KEY (`id_materials`) REFERENCES `materials` (`id`),
  ADD CONSTRAINT `Student Foreign Key` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
