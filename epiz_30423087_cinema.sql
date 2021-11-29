-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql101.epizy.com
-- Generation Time: Nov 29, 2021 at 12:21 PM
-- Server version: 5.7.35-38
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30423087_cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `event_id`, `name`, `message`, `date`) VALUES
(1, 1, 'Samuel AHOUANVOEKE', 'sdsfsdfdsEven though Journey\'s classic vocalist Steve Perry didn’t reunite with the band during their Rock Hall performance (to the dismay of hopeful fans), he did offer up a touching speech.', '2021-11-21 20:40:30'),
(2, 1, 'Dave McNary', 'Prince died not long after the 2016 Rock Hall ceremony, so this year\'s edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.', '2021-11-21 20:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `date`) VALUES
(1, 'Samuel AHOUANVOEKE', 'samuelahouanvoeke@gmail.com', 'Africa\'s burgeoning animation scene got a boost this week with the announcement of an ambitious new partnership that will pair rising talents from across the continent ... Africa\'s burgeoning animation scene got a boost this week with the announcement of an ambitious new partnership that will pair rising talents from across the continent ...', '2021-11-14 12:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `type`, `content`, `image`) VALUES
(1, 'New Character Posters For Pirates Of The Caribbean', '2021-11-13 00:00:00', 'euro', ' Joss Whedon has a little bit of a history with superhero movies, and for creating layered female characters. After his documented frustrations with Wonder Woman, he\'s getting another chance at the DC Extended Universe and Warner Bros., closing in on a deal to write direct and produce a Batgirl movie.\r\n\r\nIt\'s a somewhat surprising, but welcome move, given that Whedon has taken a long break to write something original, but has now pivoted to focus on developing the Batgirl project. First appearing in 1967 in Gardner Fox and Carmine Infantino\'s story run The Million Dollar Debut Of Batgirl, she\'s the superhero alias of Barbara Gordon, daughter of Gotham City Police Commissioner James Gordon. So we can likely expect J.K. Simmons\' take on Gordon to appear along with other Bat-related characters.\r\n\r\nBased on Lissa Evans’ novel “Their Finest Hour and a Half” and directed by Lone Scherfig (“An Education”), the film is set in London during World War II when the British ministry was utilizing propaganda films to boost morale. Arterton plays Catrin Cole, a scriptwriter who is brought on to handle the women’s dialogue — commonly referred to as “the nausea.” The film, opening this week, features an outstanding ensemble, including Bill Nighy as a washed-up actor and Sam Claflin as Catrin’s fellow writer and sparring partner.\r\n\r\nArterton is next set to play Vita Sackville-West in Vita and Virginia about her relationship with Virginia Woolf. She spoke to Variety about working with female directors, remarkable women, and why she shies away from the term “strong female character.”\r\nI’m friends with the producer who I worked with on Byzantium and he sent it to me. I read the book as well, which is fantastic. You’re always looking for untold stories and many times they’re women’s stories. What surprised me is that it centers around a woman who’s really quite timid. I guess she’s allowed to be because all of the other characters. ', 'blog-detail.jpg'),
(2, ' Posters For Pirates', '2021-11-22 16:30:17', 'euro', 'Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.\r\nLaravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.\r\nLaravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.\r\nLaravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.\r\nLaravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.\r\nLaravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.\r\nLaravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.', 'image11.jpg'),
(8, 'Retour des trÃ©sors royaux au BÃ©nin', '2021-11-23 15:56:39', 'afri', 'Retour des trÃ©sors royaux de la France au BÃ©nin', 'index.jpg'),
(9, 'Johnny Kage au BÃ©nin', '2021-11-24 08:02:44', 'afri', 'Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?\r\nNon : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?\r\nNon : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?\r\nNon : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?\r\nNon : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?Non : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?\r\nNon : en te lisant sans trop m\'Ãªtre attardÃ© sur ce qui prÃ©cÃ¨de, je dirais que ta question est ambigÃ¼e : veux-tu savoir la date de la derniÃ¨re modification de la structure de la base, ou bien quand a eu lieu la derniÃ¨re modification du contenu de la base sans distinction d\'une table particuliÃ¨re ?', 'image211.jpg'),
(10, 'Sauver les enfants', '2021-11-24 08:11:17', 'afri', 'scdscsd', 'ads1.png'),
(11, 'LA vie unique', '2021-11-24 08:17:41', 'afri', 'dCdSCDCDV ED F VSVdsVDV', 'blogv25.jpg'),
(17, 'Le ciel et la terre', '2021-11-24 08:26:01', 'euro', 'Pour reprendre lâ€™image platonicienne, la terre doit nous donner un appui pour nous hisser vers le ciel. Autrement dit, de la qualitÃ© du sol sur lequel nous nous mouvons dÃ©pend la tenue de notre existence. Car nous pouvons aussi disparaÃ®tre, engloutis. Simone Weil revient sur cette double tendance en Ã©voquant les Â« besoins vitaux Â» quâ€™elle attribue Ã  lâ€™Ã¢me comme au corps. Mourir, pour un homme, câ€™est mourir de faim, soit que le corps soit que lâ€™Ã¢me ait manquÃ© de nourriture. Lâ€™enracinement ou le prÃ©lude Ã  une dÃ©claration des devoirs envers lâ€™Ãªtre humain, quâ€™elle Ã©crit pour le Conseil national de la RÃ©sistance Ã  Londres en 1942, sâ€™articule autour de la prÃ©sentation de ces besoins vitaux, des besoins physiques, protection contre la violence, logement, vÃªtement, hygiÃ¨ne, soins qui se traduisent sur le plan moral par lâ€™ordre, la libertÃ©, lâ€™obÃ©issance, la responsabilitÃ©, lâ€™Ã©galitÃ©, la hiÃ©rarchie, lâ€™honneur, le chÃ¢timent, la libertÃ© dâ€™opinion, la sÃ©curitÃ©, le risque, la propriÃ©tÃ© privÃ©e, la propriÃ©tÃ© collective, la vÃ©ritÃ© et lâ€™enracinement.\r\nPour reprendre lâ€™image platonicienne, la terre doit nous donner un appui pour nous hisser vers le ciel. Autrement dit, de la qualitÃ© du sol sur lequel nous nous mouvons dÃ©pend la tenue de notre existence. Car nous pouvons aussi disparaÃ®tre, engloutis. Simone Weil revient sur cette double tendance en Ã©voquant les Â« besoins vitaux Â» quâ€™elle attribue Ã  lâ€™Ã¢me comme au corps. Mourir, pour un homme, câ€™est mourir de faim, soit que le corps soit que lâ€™Ã¢me ait manquÃ© de nourriture. Lâ€™enracinement ou le prÃ©lude Ã  une dÃ©claration des devoirs envers lâ€™Ãªtre humain, quâ€™elle Ã©crit pour le Conseil national de la RÃ©sistance Ã  Londres en 1942, sâ€™articule autour de la prÃ©sentation de ces besoins vitaux, des besoins physiques, protection contre la violence, logement, vÃªtement, hygiÃ¨ne, soins qui se traduisent sur le plan moral par lâ€™ordre, la libertÃ©, lâ€™obÃ©issance, la responsabilitÃ©, lâ€™Ã©galitÃ©, la hiÃ©rarchie, lâ€™honneur, le chÃ¢timent, la libertÃ© dâ€™opinion, la sÃ©curitÃ©, le risque, la propriÃ©tÃ© privÃ©e, la propriÃ©tÃ© collective, la vÃ©ritÃ© et lâ€™enracinement.', 'image51.jpg'),
(18, 'Le ciel et la terre', '2021-11-24 08:26:27', 'euro', 'Pour reprendre lâ€™image platonicienne, la terre doit nous donner un appui pour nous hisser vers le ciel. Autrement dit, de la qualitÃ© du sol sur lequel nous nous mouvons dÃ©pend la tenue de notre existence. Car nous pouvons aussi disparaÃ®tre, engloutis. Simone Weil revient sur cette double tendance en Ã©voquant les Â« besoins vitaux Â» quâ€™elle attribue Ã  lâ€™Ã¢me comme au corps. Mourir, pour un homme, câ€™est mourir de faim, soit que le corps soit que lâ€™Ã¢me ait manquÃ© de nourriture. Lâ€™enracinement ou le prÃ©lude Ã  une dÃ©claration des devoirs envers lâ€™Ãªtre humain, quâ€™elle Ã©crit pour le Conseil national de la RÃ©sistance Ã  Londres en 1942, sâ€™articule autour de la prÃ©sentation de ces besoins vitaux, des besoins physiques, protection contre la violence, logement, vÃªtement, hygiÃ¨ne, soins qui se traduisent sur le plan moral par lâ€™ordre, la libertÃ©, lâ€™obÃ©issance, la responsabilitÃ©, lâ€™Ã©galitÃ©, la hiÃ©rarchie, lâ€™honneur, le chÃ¢timent, la libertÃ© dâ€™opinion, la sÃ©curitÃ©, le risque, la propriÃ©tÃ© privÃ©e, la propriÃ©tÃ© collective, la vÃ©ritÃ© et lâ€™enracinement.\r\nPour reprendre lâ€™image platonicienne, la terre doit nous donner un appui pour nous hisser vers le ciel. Autrement dit, de la qualitÃ© du sol sur lequel nous nous mouvons dÃ©pend la tenue de notre existence. Car nous pouvons aussi disparaÃ®tre, engloutis. Simone Weil revient sur cette double tendance en Ã©voquant les Â« besoins vitaux Â» quâ€™elle attribue Ã  lâ€™Ã¢me comme au corps. Mourir, pour un homme, câ€™est mourir de faim, soit que le corps soit que lâ€™Ã¢me ait manquÃ© de nourriture. Lâ€™enracinement ou le prÃ©lude Ã  une dÃ©claration des devoirs envers lâ€™Ãªtre humain, quâ€™elle Ã©crit pour le Conseil national de la RÃ©sistance Ã  Londres en 1942, sâ€™articule autour de la prÃ©sentation de ces besoins vitaux, des besoins physiques, protection contre la violence, logement, vÃªtement, hygiÃ¨ne, soins qui se traduisent sur le plan moral par lâ€™ordre, la libertÃ©, lâ€™obÃ©issance, la responsabilitÃ©, lâ€™Ã©galitÃ©, la hiÃ©rarchie, lâ€™honneur, le chÃ¢timent, la libertÃ© dâ€™opinion, la sÃ©curitÃ©, le risque, la propriÃ©tÃ© privÃ©e, la propriÃ©tÃ© collective, la vÃ©ritÃ© et lâ€™enracinement.', 'image51.jpg'),
(19, 'LE cirque d', '2021-11-24 08:29:35', 'euro', 'Pour reprendre lâ€™image platonicienne, la terre doit nous donner un appui pour nous hisser vers le ciel. Autrement dit, de la qualitÃ© du sol sur lequel nous nous mouvons dÃ©pend la tenue de notre existence. Car nous pouvons aussi disparaÃ®tre, engloutis. Simone Weil revient sur cette double tendance en Ã©voquant les Â« besoins vitaux Â» quâ€™elle attribue Ã  lâ€™Ã¢me comme au corps. Mourir, pour un homme, câ€™est mourir de faim, soit que le corps soit que lâ€™Ã¢me ait manquÃ© de nourriture. Lâ€™enracinement ou le prÃ©lude Ã  une dÃ©claration des devoirs envers lâ€™Ãªtre humain, quâ€™elle Ã©crit pour le Conseil national de la RÃ©sistance Ã  Londres en 1942, sâ€™articule autour de la prÃ©sentation de ces besoins vitaux, des besoins physiques, protection contre la violence, logement, vÃªtement, hygiÃ¨ne, soins qui se traduisent sur le plan moral par lâ€™ordre, la libertÃ©, lâ€™obÃ©issance, la responsabilitÃ©, lâ€™Ã©galitÃ©, la hiÃ©rarchie, lâ€™honneur, le chÃ¢timent, la libertÃ© dâ€™opinion, la sÃ©curitÃ©, le risque, la propriÃ©tÃ© privÃ©e, la propriÃ©tÃ© collective, la vÃ©ritÃ© et lâ€™enracinement.\r\nPour reprendre lâ€™image platonicienne, la terre doit nous donner un appui pour nous hisser vers le ciel. Autrement dit, de la qualitÃ© du sol sur lequel nous nous mouvons dÃ©pend la tenue de notre existence. Car nous pouvons aussi disparaÃ®tre, engloutis. Simone Weil revient sur cette double tendance en Ã©voquant les Â« besoins vitaux Â» quâ€™elle attribue Ã  lâ€™Ã¢me comme au corps. Mourir, pour un homme, câ€™est mourir de faim, soit que le corps soit que lâ€™Ã¢me ait manquÃ© de nourriture. Lâ€™enracinement ou le prÃ©lude Ã  une dÃ©claration des devoirs envers lâ€™Ãªtre humain, quâ€™elle Ã©crit pour le Conseil national de la RÃ©sistance Ã  Londres en 1942, sâ€™articule autour de la prÃ©sentation de ces besoins vitaux, des besoins physiques, protection contre la violence, logement, vÃªtement, hygiÃ¨ne, soins qui se traduisent sur le plan moral par lâ€™ordre, la libertÃ©, lâ€™obÃ©issance, la responsabilitÃ©, lâ€™Ã©galitÃ©, la hiÃ©rarchie, lâ€™honneur, le chÃ¢timent, la libertÃ© dâ€™opinion, la sÃ©curitÃ©, le risque, la propriÃ©tÃ© privÃ©e, la propriÃ©tÃ© collective, la vÃ©ritÃ© et lâ€™enracinement.', 'bloglist-it2.jpg'),
(20, 'L\'afrique', '2021-11-24 08:31:49', 'afri', 'Pour reprendre lâ€™image platonicienne, la terre doit nous donner un appui pour nous hisser vers le ciel. Autrement dit, de la qualitÃ© du sol sur lequel nous nous mouvons dÃ©pend la tenue de notre existence. Car nous pouvons aussi disparaÃ®tre, engloutis. Simone Weil revient sur cette double tendance en Ã©voquant les Â« besoins vitaux Â» quâ€™elle attribue Ã  lâ€™Ã¢me comme au corps. Mourir, pour un homme, câ€™est mourir de faim, soit que le corps soit que lâ€™Ã¢me ait manquÃ© de nourriture. Lâ€™enracinement ou le prÃ©lude Ã  une dÃ©claration des devoirs envers lâ€™Ãªtre humain, quâ€™elle Ã©crit pour le Conseil national de la RÃ©sistance Ã  Londres en 1942, sâ€™articule autour de la prÃ©sentation de ces besoins vitaux, des besoins physiques, protection contre la violence, logement, vÃªtement, hygiÃ¨ne, soins qui se traduisent sur le plan moral par lâ€™ordre, la libertÃ©, lâ€™obÃ©issance, la responsabilitÃ©, lâ€™Ã©galitÃ©, la hiÃ©rarchie, lâ€™honneur, le chÃ¢timent, la libertÃ© dâ€™opinion, la sÃ©curitÃ©, le risque, la propriÃ©tÃ© privÃ©e, la propriÃ©tÃ© collective, la vÃ©ritÃ© et lâ€™enracinement.', 'vd-item3.jpg'),
(25, 'DJIMON HOUSSOU Ã  Paris', '2021-11-24 08:38:11', 'afri', 'Pour reprendre lâ€™image platonicienne, la terre doit nous donner un appui pour nous hisser vers le ciel. Autrement dit, de la qualitÃ© du sol sur lequel nous nous mouvons dÃ©pend la tenue de notre existence. Car nous pouvons aussi disparaÃ®tre, engloutis. Simone Weil revient sur cette double tendance en Ã©voquant les Â« besoins vitaux Â» quâ€™elle attribue Ã  lâ€™Ã¢me comme au corps. Mourir, pour un homme, câ€™est mourir de faim, soit que le corps soit que lâ€™Ã¢me ait manquÃ© de nourriture. Lâ€™enracinement ou le prÃ©lude Ã  une dÃ©claration des devoirs envers lâ€™Ãªtre humain, quâ€™elle Ã©crit pour le Conseil national de la RÃ©sistance Ã  Londres en 1942, sâ€™articule autour de la prÃ©sentation de ces besoins vitaux, des besoins physiques, protection contre la violence, logement, vÃªtement, hygiÃ¨ne, soins qui se traduisent sur le plan moral par lâ€™ordre, la libertÃ©, lâ€™obÃ©issance, la responsabilitÃ©, lâ€™Ã©galitÃ©, la hiÃ©rarchie, lâ€™honneur, le chÃ¢timent, la libertÃ© dâ€™opinion, la sÃ©curitÃ©, le risque, la propriÃ©tÃ© privÃ©e, la propriÃ©tÃ© collective, la vÃ©ritÃ© et lâ€™enracinement.', 'blog26.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `type_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `link`, `type_id`, `type`) VALUES
(1, 'Capture d’écran (90).png', 1, 'image'),
(2, 'Capture d’écran (91).png', 1, 'image'),
(3, 'Capture d’écran (92).png', 1, 'image'),
(4, 'bloglist-it1.jpg', 1, 'event'),
(5, 'bloglist-it2.jpg', 1, 'event'),
(6, 'bloglist-it3.jpg', 1, 'event'),
(7, 'bloglist-it4.jpg', 1, 'event'),
(8, 'bloglist-it5.jpg', 1, 'event'),
(9, 'bloglist-it6.jpg', 1, 'event'),
(10, 'blogv21.jpg', 1, 'event'),
(11, 'blogv22.jpg', 1, 'event'),
(12, 'blogv23.jpg', 1, 'event'),
(13, 'blogv24.jpg', 1, 'event'),
(14, 'blogv25.jpg', 1, 'event'),
(15, 'ava3.jpg', 2, 'image'),
(16, 'ava4.jpg', 2, 'image'),
(17, 'blog26.jpg', 2, 'image'),
(18, 'blog27.jpg', 2, 'image'),
(19, 'blog29.jpg', 2, 'image'),
(20, 'blog-detail.jpg', 2, 'image'),
(21, 'blog-detail2.jpg', 2, 'image'),
(22, 'bloglist-it1.jpg', 2, 'image'),
(23, 'bloglist-it2.jpg', 2, 'image'),
(24, 'bloglist-it3.jpg', 2, 'image'),
(25, 'blogv22.jpg', 2, 'image'),
(26, 'blogv23.jpg', 2, 'image'),
(27, 'blogv24.jpg', 2, 'image'),
(28, 'blogv25.jpg', 2, 'image'),
(29, 'bloglist-it1.jpg', 3, 'image'),
(30, 'bloglist-it2.jpg', 3, 'image'),
(31, 'bloglist-it3.jpg', 3, 'image'),
(32, 'bloglist-it4.jpg', 3, 'image'),
(33, 'bloglist-it5.jpg', 3, 'image'),
(34, 'bloglist-it6.jpg', 3, 'image'),
(35, 'blogv21.jpg', 3, 'image'),
(36, 'blog29.jpg', 3, 'image'),
(37, 'blog-detail.jpg', 3, 'image'),
(38, 'blog-detail2.jpg', 3, 'image'),
(39, 'blog-it1.jpg', 3, 'image'),
(40, 'blog-it2.jpg', 3, 'image'),
(41, 'bloglist-it1.jpg', 3, 'image'),
(42, 'bloglist-it2.jpg', 3, 'image'),
(43, 'bloglist-it3.jpg', 3, 'image'),
(44, 'bloglist-it4.jpg', 3, 'image'),
(45, 'bloglist-it5.jpg', 3, 'image'),
(46, 'bloglist-it6.jpg', 3, 'image'),
(47, 'blogv21.jpg', 3, 'image'),
(48, 'bloglist-it4.jpg', 4, 'image'),
(49, 'bloglist-it5.jpg', 4, 'image'),
(50, 'bloglist-it6.jpg', 4, 'image'),
(51, 'blogv21.jpg', 4, 'image'),
(52, 'blogv22.jpg', 4, 'image'),
(53, 'blogv23.jpg', 4, 'image'),
(54, 'blogv24.jpg', 4, 'image'),
(55, 'blogv25.jpg', 4, 'image'),
(56, 'blogv29.jpg', 4, 'image'),
(57, 'cast1.jpg', 4, 'image'),
(58, 'ava3.jpg', 2, 'event'),
(59, 'ava4.jpg', 2, 'event'),
(60, 'blog27.jpg', 2, 'event'),
(61, 'slider-bg.jpg', 2, 'event'),
(62, 'trailer2.jpg', 2, 'event'),
(63, 'trailer3.png', 2, 'event'),
(64, 'trailer4.png', 2, 'event'),
(65, 'trailer5.jpg', 2, 'event'),
(66, 'trailer6.jpg', 2, 'event'),
(67, 'trailer7.jpg', 2, 'event'),
(68, 'vd-item1.jpg', 2, 'event'),
(69, 'vd-item2.jpg', 2, 'event'),
(70, 'vd-item3.jpg', 2, 'event'),
(71, 'vd-item4.jpg', 2, 'event'),
(72, 'image12.jpg', 7, 'event'),
(73, 'image13.jpg', 7, 'event'),
(74, 'image14.jpg', 7, 'event'),
(75, 'image15.jpg', 7, 'event'),
(76, 'image16.jpg', 7, 'event'),
(77, 'image17.jpg', 7, 'event'),
(78, 'image18.jpg', 7, 'event'),
(79, 'image19.jpg', 7, 'event'),
(80, 'image20.jpg', 7, 'event'),
(81, 'image21.jpg', 7, 'event'),
(82, 'image31.jpg', 7, 'event'),
(83, 'image41.jpg', 7, 'event'),
(84, 'image51.jpg', 7, 'event'),
(85, 'image61.jpg', 7, 'event'),
(86, 'image71.jpg', 7, 'event'),
(87, 'image81.jpg', 7, 'event'),
(88, '65d79a55-96b2-4960-ba05-49bd6372a94f-66406-pc.jpg', 5, 'image'),
(89, '11224282_607036532970547_7239718070152757076_n.jpg', 5, 'image'),
(90, '28872810_353544485139433_582496126247108608_n.jpg', 5, 'image'),
(91, '29791631_2124233434255005_1754856066251942759_n.jpg', 5, 'image'),
(92, 'index.jpg', 8, 'event'),
(93, 'trailer2.jpg', 5, 'image'),
(94, 'trailer3.png', 5, 'image'),
(95, 'trailer4.png', 5, 'image'),
(96, 'trailer5.jpg', 5, 'image'),
(97, 'trailer6.jpg', 5, 'image'),
(98, 'trailer7.jpg', 5, 'image'),
(99, 'vd-item1.jpg', 5, 'image'),
(100, 'vd-item2.jpg', 5, 'image'),
(101, 'vd-item3.jpg', 5, 'image'),
(102, 'vd-item4.jpg', 5, 'image'),
(103, 'image111.jpg', 4, 'event'),
(104, 'image121.jpg', 4, 'event'),
(105, 'image131.jpg', 4, 'event'),
(106, 'image141.jpg', 4, 'event'),
(107, 'image151.jpg', 4, 'event'),
(108, 'image161.jpg', 4, 'event'),
(109, 'vd-item1.jpg', 4, 'event'),
(110, 'vd-item2.jpg', 4, 'event'),
(111, 'vd-item3.jpg', 4, 'event'),
(112, 'vd-item4.jpg', 4, 'event'),
(113, 'ava3.jpg', 5, 'event'),
(114, 'blog27.jpg', 5, 'event'),
(115, 'bloglist-it4.jpg', 7, 'event'),
(116, 'bloglist-it4.jpg', 8, 'event'),
(117, 'bloglist-it4.jpg', 8, 'event'),
(118, 'bloglist-it4.jpg', 9, 'event'),
(119, 'bloglist-it4.jpg', 9, 'event'),
(120, 'bloglist-it4.jpg', 10, 'event'),
(121, 'bloglist-it4.jpg', 10, 'event'),
(122, 'bloglist-it4.jpg', 11, 'event'),
(123, 'bloglist-it4.jpg', 11, 'event'),
(124, 'blog-detail.jpg', 7, 'event'),
(125, 'blog-detail.jpg', 7, 'event'),
(126, 'blog-detail.jpg', 8, 'event'),
(127, 'bloglist-it1.jpg', 8, 'event'),
(128, 'bloglist-it2.jpg', 8, 'event'),
(129, 'bloglist-it3.jpg', 8, 'event'),
(130, 'bloglist-it4.jpg', 8, 'event'),
(131, 'bloglist-it5.jpg', 8, 'event'),
(132, 'bloglist-it6.jpg', 8, 'event'),
(133, 'blogv21.jpg', 8, 'event'),
(134, 'blogv22.jpg', 8, 'event'),
(135, 'blogv23.jpg', 8, 'event'),
(136, 'ava1.jpg', 9, 'event'),
(137, 'bloglist-it6.jpg', 25, 'event');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `kind` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `new` tinyint(1) NOT NULL,
  `resume` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `kind`, `name`, `date`, `time`, `new`, `resume`, `image`) VALUES
(1, 'divertissement', 'SPATARI', '2021-11-11', '01:30:00', 0, 'Tony Stark creates the Ultron Program to protect the world, but when the peacekeeping program becomes hostile, The Avengers go into action to try and defeat a virtually impossible enemy together. Earth\'s mightiest heroes must come together once again to protect the world from global extinction.', 'movie-single.jpg'),
(2, 'action', 'Aang AVATAR', '2021-11-17', '02:30:00', 0, 'Prince died not long after the 2016 Rock Hall ceremony, so this year\'s edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.\r\nPrince died not long after the 2016 Rock Hall ceremony, so this year\'s edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.\r\nPrince died not long after the 2016 Rock Hall ceremony, so this year\'s edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.\r\nPrince died not long after the 2016 Rock Hall ceremony, so this year\'s edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.\r\nPrince died not long after the 2016 Rock Hall ceremony, so this year\'s edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.', 'film1.jpg'),
(3, 'policier', 'Salle PABLO', '2021-11-11', '02:30:00', 0, 'ytcvhygiumfyvhiogmiulbjihoygtfiylvhgmofiylvhkgoiulfyvhk ugilyvhjbkgilfyvhgouilfbkj:ohglifuvhoih iulgvuolvho', 'ads1.png'),
(4, 'drame', 'KACHALO', '2021-11-21', '01:50:00', 1, 'dvfwdfbkjdvhbdshvhbjk vkdbshvhdsbjvhogbdsjvho dsnvibdsjhvgbjdshivobds vidbsjvndbsjvs', 'film6.jpg'),
(6, 'comedie', 'Le ciel ouvert', '2020-11-11', '02:10:00', 1, 'Lorsque JÃ©sus devient vivant dans notre vie, il se passe quelque chose de fantastique. Cette promesse, qui dit que le ciel est ouvert, a Ã©tÃ© faite pour JÃ©sus, mais c\'est exactement ce qui va se passer dans ta vie. Si tu as demandÃ© Ã  Christ de venir habiter en toi, cette promesse est pour toi aussi. La Bible parle de notre position en Christ dans de nombreux passages. Elle nous dit que nous sommes en Christ et que Christ est en nous, nous sommes en Dieu, nous sommes un avec lui. Donc, si nous sommes en lui, nous pouvons alors bÃ©nÃ©ficier de cette merveilleuse promesse.\r\nLorsque JÃ©sus devient vivant dans notre vie, il se passe quelque chose de fantastique. Cette promesse, qui dit que le ciel est ouvert, a Ã©tÃ© faite pour JÃ©sus, mais c\'est exactement ce qui va se passer dans ta vie. Si tu as demandÃ© Ã  Christ de venir habiter en toi, cette promesse est pour toi aussi. La Bible parle de notre position en Christ dans de nombreux passages. Elle nous dit que nous sommes en Christ et que Christ est en nous, nous sommes en Dieu, nous sommes un avec lui. Donc, si nous sommes en lui, nous pouvons alors bÃ©nÃ©ficier de cette merveilleuse promesse.\r\nLorsque JÃ©sus devient vivant dans notre vie, il se passe quelque chose de fantastique. Cette promesse, qui dit que le ciel est ouvert, a Ã©tÃ© faite pour JÃ©sus, mais c\'est exactement ce qui va se passer dans ta vie. Si tu as demandÃ© Ã  Christ de venir habiter en toi, cette promesse est pour toi aussi. La Bible parle de notre position en Christ dans de nombreux passages. Elle nous dit que nous sommes en Christ et que Christ est en nous, nous sommes en Dieu, nous sommes un avec lui. Donc, si nous sommes en lui, nous pouvons alors bÃ©nÃ©ficier de cette merveilleuse promesse.', 'slider2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`) VALUES
(1, 'samuelahouanvoeke@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `opinions`
--

CREATE TABLE `opinions` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opinions`
--

INSERT INTO `opinions` (`id`, `movie_id`, `name`, `rating`, `content`, `date`) VALUES
(1, 4, 'Samuel AHOUANVOEKE', 5, 'three times does not bother me here as it is as thrilling and exciting every time I am watching it. In other words, the movie is by far better than previous movies (and I do love everything Marvel), the plotting is splendid (they really do out do themselves in each film, there are no problems watching it more than once.', '2021-11-22 11:36:26'),
(2, 4, 'John Pilm', 3, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque porro alias assumenda accusamus incidunt odio molestiae maxime quo atque in et quaerat, vel unde aliquam aperiam quidem consectetur omnis dicta officiis? Dolorum, error dolorem! ', '2021-11-22 11:46:10'),
(3, 4, 'Salla PABLO', 0, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque porro alias assumenda accusamus incidunt odio molestiae maxime quo atque in et quaerat, vel unde aliquam aperiam quidem consectetur omnis dicta officiis? Dolorum, error dolorem! ', '2021-11-22 11:49:11'),
(4, 4, 'Pauline Hida', 0, 'Association des parents d\'Ã©lÃ¨ves de l\'Ã©cole de musique de chambre que tu as des questions n\'hÃ©sitez pas', '2021-11-23 08:13:09'),
(5, 4, 'SDSDDSDSF', 5, 'DSFDSF', '2021-11-23 08:21:18'),
(6, 6, 'Dave McNary', 4, 'Trop top', '2021-11-24 07:34:26'),
(7, 3, 'Auriane ZOUNNON', 2, 'Film interessant a voir', '2021-11-28 16:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `week` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `rate` varchar(255) NOT NULL,
  `movie` int(11) NOT NULL,
  `room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `date`, `week`, `time`, `rate`, `movie`, `room`) VALUES
(1, '2021-11-25', '2021-11-47', '15:30:00', 'Avant Premiere - 5000', 1, 'Salle Aang - 200'),
(2, '2021-11-11', '2021-11-46', '02:10:00', 'Tarif standard - 1500', 2, '1 - 200'),
(4, '2021-11-25', '2021-11-47', '19:30:00', 'Tarif standard - 1500', 3, 'Salle P200 - 200'),
(5, '2021-11-30', '2021-11-48', '16:50:00', 'nouveaute - 5000', 4, 'salle O20 - 200'),
(6, '2021-11-30', '2021-11-48', '17:30:00', 'nouveaute - 5000', 1, 'salle O20 - 200'),
(7, '2021-12-07', '2021-12-49', '10:50:00', 'Tarif standard - 1500', 2, 'salle O20 - 200'),
(8, '2021-12-11', '2021-12-49', '21:10:00', 'Avant-premiere - 5000', 6, 'Salle PB150 - 150'),
(9, '2021-12-17', '2021-12-50', '22:30:00', 'Tarif standard - 1500', 4, 'Salle P200 - 200'),
(10, '2021-12-25', '2021-12-51', '15:30:00', 'Tarif standard - 1500', 6, 'Salle PB150 - 150');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `del` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `name`, `price`, `del`) VALUES
(1, 'Tarif standard', 1500, 0),
(2, 'Avant-premiere', 5000, 0),
(3, '', 0, 1),
(4, '', 0, 1),
(5, '', 0, 1),
(6, '', 0, 1),
(7, '', 0, 1),
(8, 'nouveaute', 5000, 0),
(9, 'SoirÃ©e ThÃ©matique', 4500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `place` int(11) NOT NULL,
  `del` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `place`, `del`) VALUES
(1, 'Salle P200', 200, 0),
(2, '', 0, 1),
(3, '', 0, 1),
(4, '', 0, 1),
(5, '', 0, 1),
(6, '', 0, 1),
(7, 'salle O20', 200, 0),
(8, 'Salle PB150', 150, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `statut`) VALUES
(1, 'Shrisby', 'digitsolutionsbj@gmail.com', '70c881d4a26984ddce795f6f71817c9cf4480e79', 0),
(2, 'Paul HOGO', 'admin@gmail.com', '7b902e6ff1db9f560443f2048974fd7d386975b0', 1),
(3, 'sogbo', 'sogbosedjroluc@gmail.com', '5dc35fa9b5181cf374d77ada02f42716f255ae42', 0),
(4, 'Auriane ZOUNNON', 'auryanazounnon@gmail.com', '05a5131c89d93f31967fc312bd07128e6b9acfd3', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
