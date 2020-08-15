-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2020 at 04:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mk_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_author_username` varchar(255) NOT NULL,
  `comment_text` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `post_author_username`, `comment_text`, `email`, `status`) VALUES
(16, 63, 'mkd007', 'great Thanks for information :)', 'sk@gmail.com', 1),
(17, 66, 'sk123', 'nice bro. keep writing :)', 'manish@gmail.com', 1),
(18, 63, 'mkd007', 'well content writing skill :)', 'mquaselove@gmail.com', 1),
(22, 71, 'mkd007', 'thanks for cheat sheets :)', 'MK@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_username` varchar(100) NOT NULL,
  `feature_img` varchar(255) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author_username`, `feature_img`, `view`) VALUES
(63, 'MK Post 2', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque necessitatibus error nobis nostrum ab quia voluptates, sed facere debitis corrupti sequi maxime doloribus magnam laboriosam nihil dignissimos veritatis quidem numquam illo! Cum, laboriosam sed nesciunt error beatae at ratione natus neque quibusdam itaque vero animi consectetur et velit voluptatum tempora rem maiores explicabo libero repellendus aliquam, porro exercitationem incidunt aliquid. Incidunt, non blanditiis ab inventore ad eaque perferendis veniam officiis eos accusantium id asperiores nam earum officia deserunt corrupti obcaecati alias cupiditate error veritatis saepe voluptatum ratione perspiciatis eligendi. Repellat, veniam velit. Ea saepe vero, deserunt aliquam veritatis repellat quasi deleniti, molestias nam ut labore et qui optio expedita corrupti maxime, magnam temporibus exercitationem reprehenderit! Voluptas fugit ratione nihil odio dicta quia sunt cum placeat alias debitis accusamus facilis ipsum neque voluptatibus illum unde officia totam similique commodi, aut eos! Reiciendis ex fugiat asperiores recusandae atque esse a nulla quibusdam voluptatem ratione quas, eos, laudantium veniam mollitia! Explicabo vel mollitia odit aliquam saepe, neque quibusdam veritatis dignissimos quasi rem magnam deserunt iusto dolor cumque impedit ex illo ipsam est fugiat, consequatur assumenda laudantium totam magni. Doloremque eos sunt sint nisi amet neque impedit omnis voluptatibus, laborum nostrum quis, eaque quo?</p>\r\n', 'mkd007', '20181028190136.jpg', 25),
(64, 'MK Post 3', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque necessitatibus error nobis nostrum ab quia voluptates, sed facere debitis corrupti sequi maxime doloribus magnam laboriosam nihil dignissimos veritatis quidem numquam illo! Cum, laboriosam sed nesciunt error beatae at ratione natus neque quibusdam itaque vero animi consectetur et velit voluptatum tempora rem maiores explicabo libero repellendus aliquam, porro exercitationem incidunt aliquid. Incidunt, non blanditiis ab inventore ad eaque perferendis veniam officiis eos accusantium id asperiores nam earum officia deserunt corrupti obcaecati alias cupiditate error veritatis saepe voluptatum ratione perspiciatis eligendi. Repellat, veniam velit. Ea saepe vero, deserunt aliquam veritatis repellat quasi deleniti, molestias nam ut labore et qui optio expedita corrupti maxime, magnam temporibus exercitationem reprehenderit! Voluptas fugit ratione nihil odio dicta quia sunt cum placeat alias debitis accusamus facilis ipsum neque voluptatibus illum unde officia totam similique commodi, aut eos! Reiciendis ex fugiat asperiores recusandae atque esse a nulla quibusdam voluptatem ratione quas, eos, laudantium veniam mollitia! Explicabo vel mollitia odit aliquam saepe, neque quibusdam veritatis dignissimos quasi rem magnam deserunt iusto dolor cumque impedit ex illo ipsam est fugiat, consequatur assumenda laudantium totam magni. Doloremque eos sunt sint nisi amet neque impedit omnis voluptatibus, laborum nostrum quis, eaque quo?</p>\r\n', 'mkd007', '20190116183715.jpg', 21),
(66, '  sk post 1', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam, nobis cumque. Obcaecati maiores nisi veniam sed, ratione hic eos dignissimos fugit officia, ex quaerat aspernatur velit, culpa mollitia pariatur qui illum consequatur amet. Illo dolorem in, consequuntur iure eius id adipisci fugit dolorum, est non obcaecati voluptatem? Praesentium expedita distinctio voluptates, omnis debitis natus blanditiis reprehenderit voluptas exercitationem. Sit minima nisi quo! Natus ea sed deleniti assumenda eaque eveniet corporis atque quod minima corrupti voluptate minus maiores nihil aliquid ullam delectus est dicta, suscipit adipisci possimus aut dolorem repudiandae? Impedit temporibus perferendis mollitia minus quo nobis adipisci ex explicabo velit inventore fugit, quasi voluptatem. Delectus eos optio iusto ipsam hic ullam velit est expedita aspernatur labore, nihil esse dicta commodi quisquam molestias ab neque porro atque ratione suscipit! Consequuntur facere veritatis quod dolores est, exercitationem ducimus. Aliquam amet ex sequi quasi accusantium. Quia possimus impedit accusamus nesciunt molestias adipisci eligendi, alias nobis mollitia eos cum eius voluptatem officiis ut? Officia, earum a ad molestias animi repellendus, soluta voluptas rem perferendis recusandae nisi ipsum dolorum autem dolores natus nihil quia minima eaque illum corporis iusto sed. Quidem perspiciatis at ipsa voluptatibus minima? Sit incidunt officia quod repudiandae maxime est distinctio soluta?</p>\r\n', 'sk123', '2.jpg', 28),
(67, '  sk post 2', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam, nobis cumque. Obcaecati maiores nisi veniam sed, ratione hic eos dignissimos fugit officia, ex quaerat aspernatur velit, culpa mollitia pariatur qui illum consequatur amet. Illo dolorem in, consequuntur iure eius id adipisci fugit dolorum, est non obcaecati voluptatem? Praesentium expedita distinctio voluptates, omnis debitis natus blanditiis reprehenderit voluptas exercitationem. Sit minima nisi quo! Natus ea sed deleniti assumenda eaque eveniet corporis atque quod minima corrupti voluptate minus maiores nihil aliquid ullam delectus est dicta, suscipit adipisci possimus aut dolorem repudiandae? Impedit temporibus perferendis mollitia minus quo nobis adipisci ex explicabo velit inventore fugit, quasi voluptatem. Delectus eos optio iusto ipsam hic ullam velit est expedita aspernatur labore, nihil esse dicta commodi quisquam molestias ab neque porro atque ratione suscipit! Consequuntur facere veritatis quod dolores est, exercitationem ducimus. Aliquam amet ex sequi quasi accusantium. Quia possimus impedit accusamus nesciunt molestias adipisci eligendi, alias nobis mollitia eos cum eius voluptatem officiis ut? Officia, earum a ad molestias animi repellendus, soluta voluptas rem perferendis recusandae nisi ipsum dolorum autem dolores natus nihil quia minima eaque illum corporis iusto sed. Quidem perspiciatis at ipsa voluptatibus minima? Sit incidunt officia quod repudiandae maxime est distinctio soluta?</p>\r\n', 'sk123', '3.jpg', 94),
(68, '  sk post 3', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam, nobis cumque. Obcaecati maiores nisi veniam sed, ratione hic eos dignissimos fugit officia, ex quaerat aspernatur velit, culpa mollitia pariatur qui illum consequatur amet. Illo dolorem in, consequuntur iure eius id adipisci fugit dolorum, est non obcaecati voluptatem? Praesentium expedita distinctio voluptates, omnis debitis natus blanditiis reprehenderit voluptas exercitationem. Sit minima nisi quo! Natus ea sed deleniti assumenda eaque eveniet corporis atque quod minima corrupti voluptate minus maiores nihil aliquid ullam delectus est dicta, suscipit adipisci possimus aut dolorem repudiandae? Impedit temporibus perferendis mollitia minus quo nobis adipisci ex explicabo velit inventore fugit, quasi voluptatem. Delectus eos optio iusto ipsam hic ullam velit est expedita aspernatur labore, nihil esse dicta commodi quisquam molestias ab neque porro atque ratione suscipit! Consequuntur facere veritatis quod dolores est, exercitationem ducimus. Aliquam amet ex sequi quasi accusantium. Quia possimus impedit accusamus nesciunt molestias adipisci eligendi, alias nobis mollitia eos cum eius voluptatem officiis ut? Officia, earum a ad molestias animi repellendus, soluta voluptas rem perferendis recusandae nisi ipsum dolorum autem dolores natus nihil quia minima eaque illum corporis iusto sed. Quidem perspiciatis at ipsa voluptatibus minima? Sit incidunt officia quod repudiandae maxime est distinctio soluta?</p>\r\n', 'sk123', '4.jpg', 54),
(71, ' The Best Front-End Hacking Cheatsheets &mdash; All in One Place', '<p><img alt=\"\" src=\"https://miro.medium.com/max/700/1*sqkshvsmr7hN4Ab2A7GJzg.png\" style=\"height:382px; width:700px\" /></p>\r\n', 'mkd007', '20181028190136.jpg', 31);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `author_name`, `username`, `email`, `password`, `user_img`) VALUES
(16, 'Manish Kumar Dholpuriya', 'mkd007', 'dholpuriyamanish.mkd@gmail.com', '$2y$10$PC0nW19HNJeLBpiuUmeRBe.Mmfyt/.zfmW/Hl5mwaHsMo5LFmk4hy', 'mk.png'),
(17, 'Surajkaran Bhambi', 'sk123', 'surajkaranbhambi6060@gmail.com', '$2y$10$N7c0de6TwjE/.CsscrfYTOtVFwtk75Gqz4h0DR7DUz8.WBSRiGH/S', 'PicsArt_04-17-05.52.13.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
