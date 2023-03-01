-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2023 at 07:22 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokemon_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `pokemon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `trainer_id`, `pokemon_id`) VALUES
(34, 1, 8),
(35, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `pokemon_data`
--

CREATE TABLE `pokemon_data` (
  `id` int(11) NOT NULL,
  `abilities` varchar(89) DEFAULT NULL,
  `attack` int(3) DEFAULT NULL,
  `base_egg_steps` int(5) DEFAULT NULL,
  `classification` varchar(19) DEFAULT NULL,
  `defense` int(3) DEFAULT NULL,
  `height_m` float DEFAULT NULL,
  `hp` int(3) DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  `pokedex_number` int(3) DEFAULT NULL,
  `sp_attack` int(3) DEFAULT NULL,
  `sp_defense` int(3) DEFAULT NULL,
  `speed` int(3) DEFAULT NULL,
  `type1` varchar(8) DEFAULT NULL,
  `type2` varchar(8) DEFAULT NULL,
  `weight_kg` varchar(4) DEFAULT NULL,
  `is_legendary` int(1) DEFAULT NULL,
  `img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pokemon_data`
--

INSERT INTO `pokemon_data` (`id`, `abilities`, `attack`, `base_egg_steps`, `classification`, `defense`, `height_m`, `hp`, `name`, `pokedex_number`, `sp_attack`, `sp_defense`, `speed`, `type1`, `type2`, `weight_kg`, `is_legendary`, `img`) VALUES
(1, '[\"Overgrow\", \"Chlorophyll\"]', 49, 5120, 'Seed Pokémon', 49, 0.7, 45, 'Bulbasaur', 1, 65, 65, 45, 'grass', 'poison', '6.9', 0, 'https://www.serebii.net/pokemon/art/001.png'),
(2, '[\"Overgrow\", \"Chlorophyll\"]', 62, 5120, 'Seed Pokémon', 63, 1, 60, 'Ivysaur', 2, 80, 80, 60, 'grass', 'poison', '13', 0, 'https://www.serebii.net/pokemon/art/002.png'),
(3, '[\"Overgrow\", \"Chlorophyll\"]', 100, 5120, 'Seed Pokémon', 123, 2, 80, 'Venusaur', 3, 122, 120, 80, 'grass', 'poison', '100', 0, 'https://www.serebii.net/pokemon/art/003.png'),
(4, '[\"Blaze\", \"Solar Power\"]', 52, 5120, 'Lizard Pokémon', 43, 0.6, 39, 'Charmander', 4, 60, 50, 65, 'fire', '', '8.5', 0, 'https://www.serebii.net/pokemon/art/004.png'),
(5, '[\"Blaze\", \"Solar Power\"]', 64, 5120, 'Flame Pokémon', 58, 1.1, 58, 'Charmeleon', 5, 80, 65, 80, 'fire', '', '19', 0, 'https://www.serebii.net/pokemon/art/005.png'),
(6, '[\"Blaze\", \"Solar Power\"]', 104, 5120, 'Flame Pokémon', 78, 1.7, 78, 'Charizard', 6, 159, 115, 100, 'fire', 'flying', '90.5', 0, 'https://www.serebii.net/pokemon/art/006.png'),
(7, '[\"Torrent\", \"Rain Dish\"]', 48, 5120, 'Tiny Turtle Pokémon', 65, 0.5, 44, 'Squirtle', 7, 50, 64, 43, 'water', '', '9', 0, 'https://www.serebii.net/pokemon/art/007.png'),
(8, '[\"Torrent\", \"Rain Dish\"]', 63, 5120, 'Turtle Pokémon', 80, 1, 59, 'Wartortle', 8, 65, 80, 58, 'water', '', '22.5', 0, 'https://www.serebii.net/pokemon/art/008.png'),
(9, '[\"Torrent\", \"Rain Dish\"]', 103, 5120, 'Shellfish Pokémon', 120, 1.6, 79, 'Blastoise', 9, 135, 115, 78, 'water', '', '85.5', 0, 'https://www.serebii.net/pokemon/art/009.png'),
(10, '[\"Shield Dust\", \"Run Away\"]', 30, 3840, 'Worm Pokémon', 35, 0.3, 45, 'Caterpie', 10, 20, 20, 45, 'bug', '', '2.9', 0, 'https://www.serebii.net/pokemon/art/010.png'),
(11, '[\"Shed Skin\"]', 20, 3840, 'Cocoon Pokémon', 55, 0.7, 50, 'Metapod', 11, 25, 25, 30, 'bug', '', '9.9', 0, 'https://www.serebii.net/pokemon/art/011.png'),
(12, '[\"Compoundeyes\", \"Tinted Lens\"]', 45, 3840, 'Butterfly Pokémon', 50, 1.1, 60, 'Butterfree', 12, 90, 80, 70, 'bug', 'flying', '32', 0, 'https://www.serebii.net/pokemon/art/012.png'),
(13, '[\"Shield Dust\", \"Run Away\"]', 35, 3840, 'Hairy Pokémon', 30, 0.3, 40, 'Weedle', 13, 20, 20, 50, 'bug', 'poison', '3.2', 0, 'https://www.serebii.net/pokemon/art/013.png'),
(14, '[\"Shed Skin\"]', 25, 3840, 'Cocoon Pokémon', 50, 0.6, 45, 'Kakuna', 14, 25, 25, 35, 'bug', 'poison', '10', 0, 'https://www.serebii.net/pokemon/art/014.png'),
(15, '[\"Swarm\", \"Sniper\"]', 150, 3840, 'Poison Bee Pokémon', 40, 1, 65, 'Beedrill', 15, 15, 80, 145, 'bug', 'poison', '29.5', 0, 'https://www.serebii.net/pokemon/art/015.png'),
(16, '[\"Keen Eye\", \"Tangled Feet\", \"Big Pecks\"]', 45, 3840, 'Tiny Bird Pokémon', 40, 0.3, 40, 'Pidgey', 16, 35, 35, 56, 'normal', 'flying', '1.8', 0, 'https://www.serebii.net/pokemon/art/016.png'),
(17, '[\"Keen Eye\", \"Tangled Feet\", \"Big Pecks\"]', 60, 3840, 'Bird Pokémon', 55, 1.1, 63, 'Pidgeotto', 17, 50, 50, 71, 'normal', 'flying', '30', 0, 'https://www.serebii.net/pokemon/art/017.png'),
(18, '[\"Keen Eye\", \"Tangled Feet\", \"Big Pecks\"]', 80, 3840, 'Bird Pokémon', 80, 1.5, 83, 'Pidgeot', 18, 135, 80, 121, 'normal', 'flying', '39.5', 0, 'https://www.serebii.net/pokemon/art/018.png'),
(21, '[\"Keen Eye\", \"Sniper\"]', 60, 3840, 'Tiny Bird Pokémon', 30, 0.3, 40, 'Spearow', 21, 31, 31, 70, 'normal', 'flying', '2', 0, 'https://www.serebii.net/pokemon/art/021.png'),
(22, '[\"Keen Eye\", \"Sniper\"]', 90, 3840, 'Beak Pokémon', 65, 1.2, 65, 'Fearow', 22, 61, 61, 100, 'normal', 'flying', '38', 0, 'https://www.serebii.net/pokemon/art/022.png'),
(23, '[\"Intimidate\", \"Shed Skin\", \"Unnerve\"]', 60, 5120, 'Snake Pokémon', 44, 2, 35, 'Ekans', 23, 40, 54, 55, 'poison', '', '6.9', 0, 'https://www.serebii.net/pokemon/art/023.png'),
(24, '[\"Intimidate\", \"Shed Skin\", \"Unnerve\"]', 95, 5120, 'Cobra Pokémon', 69, 3.5, 60, 'Arbok', 24, 65, 79, 80, 'poison', '', '65', 0, 'https://www.serebii.net/pokemon/art/024.png'),
(25, '[\"Static\", \"Lightningrod\"]', 55, 2560, 'Mouse Pokémon', 40, 0.4, 35, 'Pikachu', 25, 50, 50, 90, 'electric', '', '6', 0, 'https://www.serebii.net/pokemon/art/025.png'),
(29, '[\"Poison Point\", \"Rivalry\", \"Hustle\"]', 47, 5120, 'Poison Pin Pokémon', 52, 0.4, 55, 'Nidoran♀', 29, 40, 40, 41, 'poison', '', '7', 0, 'https://www.serebii.net/pokemon/art/029.png'),
(30, '[\"Poison Point\", \"Rivalry\", \"Hustle\"]', 62, 5120, 'Poison Pin Pokémon', 67, 0.8, 70, 'Nidorina', 30, 55, 55, 56, 'poison', '', '20', 0, 'https://www.serebii.net/pokemon/art/030.png'),
(31, '[\"Poison Point\", \"Rivalry\", \"Hustle\"]', 92, 5120, 'Drill Pokémon', 87, 1.3, 90, 'Nidoqueen', 31, 75, 85, 76, 'poison', 'ground', '60', 0, 'https://www.serebii.net/pokemon/art/031.png'),
(32, '[\"Poison Point\", \"Rivalry\", \"Hustle\"]', 57, 5120, 'Poison Pin Pokémon', 40, 0.5, 46, 'Nidoran♂', 32, 40, 40, 50, 'poison', '', '9', 0, 'https://www.serebii.net/pokemon/art/032.png'),
(33, '[\"Poison Point\", \"Rivalry\", \"Hustle\"]', 72, 5120, 'Poison Pin Pokémon', 57, 0.9, 61, 'Nidorino', 33, 55, 55, 65, 'poison', '', '19.5', 0, 'https://www.serebii.net/pokemon/art/033.png'),
(34, '[\"Poison Point\", \"Rivalry\", \"Hustle\"]', 102, 5120, 'Drill Pokémon', 77, 1.4, 81, 'Nidoking', 34, 85, 75, 85, 'poison', 'ground', '62', 0, 'https://www.serebii.net/pokemon/art/034.png'),
(35, '[\"Cute Charm\", \"Magic Guard\", \"Friend Guard\"]', 45, 2560, 'Fairy Pokémon', 48, 0.6, 70, 'Clefairy', 35, 60, 65, 35, 'fairy', '', '7.5', 0, 'https://www.serebii.net/pokemon/art/035.png'),
(36, '[\"Cute Charm\", \"Magic Guard\", \"Unaware\"]', 70, 2560, 'Fairy Pokémon', 73, 1.3, 95, 'Clefable', 36, 95, 90, 60, 'fairy', '', '40', 0, 'https://www.serebii.net/pokemon/art/036.png'),
(39, '[\"Cute Charm\", \"Competitive\", \"Friend Guard\"]', 45, 2560, 'Balloon Pokémon', 20, 0.5, 115, 'Jigglypuff', 39, 45, 25, 20, 'normal', 'fairy', '5.5', 0, 'https://www.serebii.net/pokemon/art/039.png'),
(40, '[\"Cute Charm\", \"Competitive\", \"Frisk\"]', 70, 2560, 'Balloon Pokémon', 45, 1, 140, 'Wigglytuff', 40, 85, 50, 45, 'normal', 'fairy', '12', 0, 'https://www.serebii.net/pokemon/art/040.png'),
(41, '[\"Inner Focus\", \"Infiltrator\"]', 45, 3840, 'Bat Pokémon', 35, 0.8, 40, 'Zubat', 41, 30, 40, 55, 'poison', 'flying', '7.5', 0, 'https://www.serebii.net/pokemon/art/041.png'),
(42, '[\"Inner Focus\", \"Infiltrator\"]', 80, 3840, 'Bat Pokémon', 70, 1.6, 75, 'Golbat', 42, 65, 75, 90, 'poison', 'flying', '55', 0, 'https://www.serebii.net/pokemon/art/042.png'),
(43, '[\"Chlorophyll\", \"Run Away\"]', 50, 5120, 'Weed Pokémon', 55, 0.5, 45, 'Oddish', 43, 75, 65, 30, 'grass', 'poison', '5.4', 0, 'https://www.serebii.net/pokemon/art/043.png'),
(44, '[\"Chlorophyll\", \"Stench\"]', 65, 5120, 'Weed Pokémon', 70, 0.8, 60, 'Gloom', 44, 85, 75, 40, 'grass', 'poison', '8.6', 0, 'https://www.serebii.net/pokemon/art/044.png'),
(45, '[\"Chlorophyll\", \"Effect Spore\"]', 80, 5120, 'Flower Pokémon', 85, 1.2, 75, 'Vileplume', 45, 110, 90, 50, 'grass', 'poison', '18.6', 0, 'https://www.serebii.net/pokemon/art/045.png'),
(46, '[\"Effect Spore\", \"Dry Skin\", \"Damp\"]', 70, 5120, 'Mushroom Pokémon', 55, 0.3, 35, 'Paras', 46, 45, 55, 25, 'bug', 'grass', '5.4', 0, 'https://www.serebii.net/pokemon/art/046.png'),
(47, '[\"Effect Spore\", \"Dry Skin\", \"Damp\"]', 95, 5120, 'Mushroom Pokémon', 80, 1, 60, 'Parasect', 47, 60, 80, 30, 'bug', 'grass', '29.5', 0, 'https://www.serebii.net/pokemon/art/047.png'),
(48, '[\"Compoundeyes\", \"Tinted Lens\", \"Run Away\"]', 55, 5120, 'Insect Pokémon', 50, 1, 60, 'Venonat', 48, 40, 55, 45, 'bug', 'poison', '30', 0, 'https://www.serebii.net/pokemon/art/048.png'),
(49, '[\"Shield Dust\", \"Tinted Lens\", \"Wonder Skin\"]', 65, 5120, 'Poison Moth Pokémon', 60, 1.5, 70, 'Venomoth', 49, 90, 75, 90, 'bug', 'poison', '12.5', 0, 'https://www.serebii.net/pokemon/art/049.png'),
(54, '[\"Damp\", \"Cloud Nine\", \"Swift Swim\"]', 52, 5120, 'Duck Pokémon', 48, 0.8, 50, 'Psyduck', 54, 65, 50, 55, 'water', '', '19.6', 0, 'https://www.serebii.net/pokemon/art/054.png'),
(55, '[\"Damp\", \"Cloud Nine\", \"Swift Swim\"]', 82, 5120, 'Duck Pokémon', 78, 1.7, 80, 'Golduck', 55, 95, 80, 85, 'water', '', '76.6', 0, 'https://www.serebii.net/pokemon/art/055.png'),
(56, '[\"Vital Spirit\", \"Anger Point\", \"Defiant\"]', 80, 5120, 'Pig Monkey Pokémon', 35, 0.5, 40, 'Mankey', 56, 35, 45, 70, 'fighting', '', '28', 0, 'https://www.serebii.net/pokemon/art/056.png'),
(57, '[\"Vital Spirit\", \"Anger Point\", \"Defiant\"]', 105, 5120, 'Pig Monkey Pokémon', 60, 1, 65, 'Primeape', 57, 60, 70, 95, 'fighting', '', '32', 0, 'https://www.serebii.net/pokemon/art/057.png'),
(58, '[\"Intimidate\", \"Flash Fire\", \"Justified\"]', 70, 5120, 'Puppy Pokémon', 45, 0.7, 55, 'Growlithe', 58, 70, 50, 60, 'fire', '', '19', 0, 'https://www.serebii.net/pokemon/art/058.png'),
(59, '[\"Intimidate\", \"Flash Fire\", \"Justified\"]', 110, 5120, 'Legendary Pokémon', 80, 1.9, 90, 'Arcanine', 59, 100, 80, 95, 'fire', '', '155', 0, 'https://www.serebii.net/pokemon/art/059.png'),
(60, '[\"Water Absorb\", \"Damp\", \"Swift Swim\"]', 50, 5120, 'Tadpole Pokémon', 40, 0.6, 40, 'Poliwag', 60, 40, 40, 90, 'water', '', '12.4', 0, 'https://www.serebii.net/pokemon/art/060.png'),
(61, '[\"Water Absorb\", \"Damp\", \"Swift Swim\"]', 65, 5120, 'Tadpole Pokémon', 65, 1, 65, 'Poliwhirl', 61, 50, 50, 90, 'water', '', '20', 0, 'https://www.serebii.net/pokemon/art/061.png'),
(62, '[\"Water Absorb\", \"Damp\", \"Swift Swim\"]', 95, 5120, 'Tadpole Pokémon', 95, 1.3, 90, 'Poliwrath', 62, 70, 90, 70, 'water', 'fighting', '54', 0, 'https://www.serebii.net/pokemon/art/062.png'),
(63, '[\"Synchronize\", \"Inner Focus\", \"Magic Guard\"]', 20, 5120, 'Psi Pokémon', 15, 0.9, 25, 'Abra', 63, 105, 55, 90, 'psychic', '', '19.5', 0, 'https://www.serebii.net/pokemon/art/063.png'),
(64, '[\"Synchronize\", \"Inner Focus\", \"Magic Guard\"]', 35, 5120, 'Psi Pokémon', 30, 1.3, 40, 'Kadabra', 64, 120, 70, 105, 'psychic', '', '56.5', 0, 'https://www.serebii.net/pokemon/art/064.png'),
(65, '[\"Synchronize\", \"Inner Focus\", \"Magic Guard\"]', 50, 5120, 'Psi Pokémon', 65, 1.5, 55, 'Alakazam', 65, 175, 105, 150, 'psychic', '', '48', 0, 'https://www.serebii.net/pokemon/art/065.png'),
(66, '[\"Guts\", \"No Guard\", \"Steadfast\"]', 80, 5120, 'Superpower Pokémon', 50, 0.8, 70, 'Machop', 66, 35, 35, 35, 'fighting', '', '19.5', 0, 'https://www.serebii.net/pokemon/art/066.png'),
(67, '[\"Guts\", \"No Guard\", \"Steadfast\"]', 100, 5120, 'Superpower Pokémon', 70, 1.5, 80, 'Machoke', 67, 50, 60, 45, 'fighting', '', '70.5', 0, 'https://www.serebii.net/pokemon/art/067.png'),
(68, '[\"Guts\", \"No Guard\", \"Steadfast\"]', 130, 5120, 'Superpower Pokémon', 80, 1.6, 90, 'Machamp', 68, 65, 85, 55, 'fighting', '', '130', 0, 'https://www.serebii.net/pokemon/art/068.png'),
(69, '[\"Chlorophyll\", \"Gluttony\"]', 75, 5120, 'Flower Pokémon', 35, 0.7, 50, 'Bellsprout', 69, 70, 30, 40, 'grass', 'poison', '4', 0, 'https://www.serebii.net/pokemon/art/069.png'),
(70, '[\"Chlorophyll\", \"Gluttony\"]', 90, 5120, 'Flycatcher Pokémon', 50, 1, 65, 'Weepinbell', 70, 85, 45, 55, 'grass', 'poison', '6.4', 0, 'https://www.serebii.net/pokemon/art/070.png'),
(71, '[\"Chlorophyll\", \"Gluttony\"]', 105, 5120, 'Flycatcher Pokémon', 65, 1.7, 80, 'Victreebel', 71, 100, 70, 70, 'grass', 'poison', '15.5', 0, 'https://www.serebii.net/pokemon/art/071.png'),
(72, '[\"Clear Body\", \"Liquid Ooze\", \"Rain Dish\"]', 40, 5120, 'Jellyfish Pokémon', 35, 0.9, 40, 'Tentacool', 72, 50, 100, 70, 'water', 'poison', '45.5', 0, 'https://www.serebii.net/pokemon/art/072.png'),
(73, '[\"Clear Body\", \"Liquid Ooze\", \"Rain Dish\"]', 70, 5120, 'Jellyfish Pokémon', 65, 1.6, 80, 'Tentacruel', 73, 80, 120, 100, 'water', 'poison', '55', 0, 'https://www.serebii.net/pokemon/art/073.png'),
(77, '[\"Run Away\", \"Flash Fire\", \"Flame Body\"]', 85, 5120, 'Fire Horse Pokémon', 55, 1, 50, 'Ponyta', 77, 65, 65, 90, 'fire', '', '30', 0, 'https://www.serebii.net/pokemon/art/077.png'),
(78, '[\"Run Away\", \"Flash Fire\", \"Flame Body\"]', 100, 5120, 'Fire Horse Pokémon', 70, 1.7, 65, 'Rapidash', 78, 80, 80, 105, 'fire', '', '95', 0, 'https://www.serebii.net/pokemon/art/078.png'),
(79, '[\"Oblivious\", \"Own Tempo\", \"Regenerator\"]', 65, 5120, 'Dopey Pokémon', 65, 1.2, 90, 'Slowpoke', 79, 40, 40, 15, 'water', 'psychic', '36', 0, 'https://www.serebii.net/pokemon/art/079.png'),
(80, '[\"Oblivious\", \"Own Tempo\", \"Regenerator\"]', 75, 5120, 'Hermit Crab Pokémon', 180, 1.6, 95, 'Slowbro', 80, 130, 80, 30, 'water', 'psychic', '78.5', 0, 'https://www.serebii.net/pokemon/art/080.png'),
(81, '[\"Magnet Pull\", \"Sturdy\", \"Analytic\"]', 35, 5120, 'Magnet Pokémon', 70, 0.3, 25, 'Magnemite', 81, 95, 55, 45, 'electric', 'steel', '6', 0, 'https://www.serebii.net/pokemon/art/081.png'),
(82, '[\"Magnet Pull\", \"Sturdy\", \"Analytic\"]', 60, 5120, 'Magnet Pokémon', 95, 1, 50, 'Magneton', 82, 120, 70, 70, 'electric', 'steel', '60', 0, 'https://www.serebii.net/pokemon/art/082.png'),
(83, '[\"Keen Eye\", \"Inner Focus\", \"Defiant\"]', 90, 5120, 'Wild Duck Pokémon', 55, 0.8, 52, 'Farfetch\'d', 83, 58, 62, 60, 'normal', 'flying', '15', 0, 'https://www.serebii.net/pokemon/art/083.png'),
(84, '[\"Run Away\", \"Early Bird\", \"Tangled Feet\"]', 85, 5120, 'Twin Bird Pokémon', 45, 1.4, 35, 'Doduo', 84, 35, 35, 75, 'normal', 'flying', '39.2', 0, 'https://www.serebii.net/pokemon/art/084.png'),
(85, '[\"Run Away\", \"Early Bird\", \"Tangled Feet\"]', 110, 5120, 'Triple Bird Pokémon', 70, 1.8, 60, 'Dodrio', 85, 60, 60, 110, 'normal', 'flying', '85.2', 0, 'https://www.serebii.net/pokemon/art/085.png'),
(86, '[\"Thick Fat\", \"Hydration\", \"Ice Body\"]', 45, 5120, 'Sea Lion Pokémon', 55, 1.1, 65, 'Seel', 86, 45, 70, 45, 'water', '', '90', 0, 'https://www.serebii.net/pokemon/art/086.png'),
(87, '[\"Thick Fat\", \"Hydration\", \"Ice Body\"]', 70, 5120, 'Sea Lion Pokémon', 80, 1.7, 90, 'Dewgong', 87, 70, 95, 70, 'water', 'ice', '120', 0, 'https://www.serebii.net/pokemon/art/087.png'),
(90, '[\"Shell Armor\", \"Skill Link\", \"Overcoat\"]', 65, 5120, 'Bivalve Pokémon', 100, 0.3, 30, 'Shellder', 90, 45, 25, 40, 'water', '', '4', 0, 'https://www.serebii.net/pokemon/art/090.png'),
(92, '[\"Levitate\"]', 35, 5120, 'Gas Pokémon', 30, 1.3, 30, 'Gastly', 92, 100, 35, 80, 'ghost', 'poison', '0.1', 0, 'https://www.serebii.net/pokemon/art/092.png'),
(93, '[\"Levitate\"]', 50, 5120, 'Gas Pokémon', 45, 1.6, 45, 'Haunter', 93, 115, 55, 95, 'ghost', 'poison', '0.1', 0, 'https://www.serebii.net/pokemon/art/093.png'),
(94, '[\"Cursed Body\"]', 65, 5120, 'Shadow Pokémon', 80, 1.5, 60, 'Gengar', 94, 170, 95, 130, 'ghost', 'poison', '40.5', 0, 'https://www.serebii.net/pokemon/art/094.png'),
(95, '[\"Rock Head\", \"Sturdy\", \"Weak Armor\"]', 45, 6400, 'Rock Snake Pokémon', 160, 8.8, 35, 'Onix', 95, 30, 45, 70, 'rock', 'ground', '210', 0, 'https://www.serebii.net/pokemon/art/095.png'),
(96, '[\"Insomnia\", \"Forewarn\", \"Inner Focus\"]', 48, 5120, 'Hypnosis Pokémon', 45, 1, 60, 'Drowzee', 96, 43, 90, 42, 'psychic', '', '32.4', 0, 'https://www.serebii.net/pokemon/art/096.png'),
(97, '[\"Insomnia\", \"Forewarn\", \"Inner Focus\"]', 73, 5120, 'Hypnosis Pokémon', 70, 1.6, 85, 'Hypno', 97, 73, 115, 67, 'psychic', '', '75.6', 0, 'https://www.serebii.net/pokemon/art/097.png'),
(98, '[\"Hyper Cutter\", \"Shell Armor\", \"Sheer Force\"]', 105, 5120, 'River Crab Pokémon', 90, 0.4, 30, 'Krabby', 98, 25, 25, 50, 'water', '', '6.5', 0, 'https://www.serebii.net/pokemon/art/098.png'),
(99, '[\"Hyper Cutter\", \"Shell Armor\", \"Sheer Force\"]', 130, 5120, 'Pincer Pokémon', 115, 1.3, 55, 'Kingler', 99, 50, 50, 75, 'water', '', '60', 0, 'https://www.serebii.net/pokemon/art/099.png'),
(100, '[\"Soundproof\", \"Static\", \"Aftermath\"]', 30, 5120, 'Ball Pokémon', 50, 0.5, 40, 'Voltorb', 100, 55, 55, 100, 'electric', '', '10.4', 0, 'https://www.serebii.net/pokemon/art/100.png'),
(101, '[\"Soundproof\", \"Static\", \"Aftermath\"]', 50, 5120, 'Ball Pokémon', 70, 1.2, 60, 'Electrode', 101, 80, 80, 150, 'electric', '', '66.6', 0, 'https://www.serebii.net/pokemon/art/101.png'),
(102, '[\"Chlorophyll\", \"Harvest\"]', 40, 5120, 'Egg Pokémon', 80, 0.4, 60, 'Exeggcute', 102, 60, 45, 40, 'grass', 'psychic', '2.5', 0, 'https://www.serebii.net/pokemon/art/102.png'),
(104, '[\"Rock Head\", \"Lightningrod\", \"Battle Armor\"]', 50, 5120, 'Lonely Pokémon', 95, 0.4, 50, 'Cubone', 104, 40, 50, 35, 'ground', '', '6.5', 0, 'https://www.serebii.net/pokemon/art/104.png'),
(106, '[\"Limber\", \"Reckless\", \"Unburden\"]', 120, 6400, 'Kicking Pokémon', 53, 1.5, 50, 'Hitmonlee', 106, 35, 110, 87, 'fighting', '', '49.8', 0, 'https://www.serebii.net/pokemon/art/106.png'),
(107, '[\"Keen Eye\", \"Iron Fist\", \"Inner Focus\"]', 105, 6400, 'Punching Pokémon', 79, 1.4, 50, 'Hitmonchan', 107, 35, 110, 76, 'fighting', '', '50.2', 0, 'https://www.serebii.net/pokemon/art/107.png'),
(108, '[\"Own Tempo\", \"Oblivious\", \"Cloud Nine\"]', 55, 5120, 'Licking Pokémon', 75, 1.2, 90, 'Lickitung', 108, 60, 75, 30, 'normal', '', '65.5', 0, 'https://www.serebii.net/pokemon/art/108.png'),
(109, '[\"Levitate\"]', 65, 5120, 'Poison Gas Pokémon', 95, 0.6, 40, 'Koffing', 109, 60, 45, 35, 'poison', '', '1', 0, 'https://www.serebii.net/pokemon/art/109.png'),
(110, '[\"Levitate\"]', 90, 5120, 'Poison Gas Pokémon', 120, 1.2, 65, 'Weezing', 110, 85, 70, 60, 'poison', '', '9.5', 0, 'https://www.serebii.net/pokemon/art/110.png'),
(111, '[\"Lightningrod\", \"Rock Head\", \"Reckless\"]', 85, 5120, 'Spikes Pokémon', 95, 1, 80, 'Rhyhorn', 111, 30, 30, 25, 'ground', 'rock', '115', 0, 'https://www.serebii.net/pokemon/art/111.png'),
(112, '[\"Lightningrod\", \"Rock Head\", \"Reckless\"]', 130, 5120, 'Drill Pokémon', 120, 1.9, 105, 'Rhydon', 112, 45, 45, 40, 'ground', 'rock', '120', 0, 'https://www.serebii.net/pokemon/art/112.png'),
(113, '[\"Natural Cure\", \"Serene Grace\", \"Healer\"]', 5, 10240, 'Egg Pokémon', 5, 1.1, 250, 'Chansey', 113, 35, 105, 50, 'normal', '', '34.6', 0, 'https://www.serebii.net/pokemon/art/113.png'),
(114, '[\"Chlorophyll\", \"Leaf Guard\", \"Regenerator\"]', 55, 5120, 'Vine Pokémon', 115, 1, 65, 'Tangela', 114, 100, 40, 60, 'grass', '', '35', 0, 'https://www.serebii.net/pokemon/art/114.png'),
(115, '[\"Early Bird\", \"Scrappy\", \"Inner Focus\"]', 125, 5120, 'Parent Pokémon', 100, 2.2, 105, 'Kangaskhan', 115, 60, 100, 100, 'normal', '', '80', 0, 'https://www.serebii.net/pokemon/art/115.png'),
(116, '[\"Swift Swim\", \"Sniper\", \"Damp\"]', 40, 5120, 'Dragon Pokémon', 70, 0.4, 30, 'Horsea', 116, 70, 25, 60, 'water', '', '8', 0, 'https://www.serebii.net/pokemon/art/116.png'),
(117, '[\"Poison Point\", \"Sniper\", \"Damp\"]', 65, 5120, 'Dragon Pokémon', 95, 1.2, 55, 'Seadra', 117, 95, 45, 85, 'water', '', '25', 0, 'https://www.serebii.net/pokemon/art/117.png'),
(118, '[\"Swift Swim\", \"Water Veil\", \"Lightningrod\"]', 67, 5120, 'Goldfish Pokémon', 60, 0.6, 45, 'Goldeen', 118, 35, 50, 63, 'water', '', '15', 0, 'https://www.serebii.net/pokemon/art/118.png'),
(119, '[\"Swift Swim\", \"Water Veil\", \"Lightningrod\"]', 92, 5120, 'Goldfish Pokémon', 65, 1.3, 80, 'Seaking', 119, 65, 80, 68, 'water', '', '39', 0, 'https://www.serebii.net/pokemon/art/119.png'),
(120, '[\"Illuminate\", \"Natural Cure\", \"Analytic\"]', 45, 5120, 'Starshape Pokémon', 55, 0.8, 30, 'Staryu', 120, 70, 55, 85, 'water', '', '34.5', 0, 'https://www.serebii.net/pokemon/art/120.png'),
(121, '[\"Illuminate\", \"Natural Cure\", \"Analytic\"]', 75, 5120, 'Mysterious Pokémon', 85, 1.1, 60, 'Starmie', 121, 100, 85, 115, 'water', 'psychic', '80', 0, 'https://www.serebii.net/pokemon/art/121.png'),
(122, '[\"Soundproof\", \"Filter\", \"Technician\"]', 45, 6400, 'Barrier Pokémon', 65, 1.3, 40, 'Mr. Mime', 122, 100, 120, 90, 'psychic', 'fairy', '54.5', 0, 'https://www.serebii.net/pokemon/art/122.png'),
(123, '[\"Swarm\", \"Technician\", \"Steadfast\"]', 110, 6400, 'Mantis Pokémon', 80, 1.5, 70, 'Scyther', 123, 55, 80, 105, 'bug', 'flying', '56', 0, 'https://www.serebii.net/pokemon/art/123.png'),
(124, '[\"Oblivious\", \"Forewarn\", \"Dry Skin\"]', 50, 6400, 'Humanshape Pokémon', 35, 1.4, 65, 'Jynx', 124, 115, 95, 95, 'ice', 'psychic', '40.6', 0, 'https://www.serebii.net/pokemon/art/124.png'),
(125, '[\"Static\", \"Vital Spirit\"]', 83, 6400, 'Electric Pokémon', 57, 1.1, 65, 'Electabuzz', 125, 95, 85, 105, 'electric', '', '30', 0, 'https://www.serebii.net/pokemon/art/125.png'),
(126, '[\"Flame Body\", \"Vital Spirit\"]', 95, 6400, 'Spitfire Pokémon', 57, 1.3, 65, 'Magmar', 126, 100, 85, 93, 'fire', '', '44.5', 0, 'https://www.serebii.net/pokemon/art/126.png'),
(127, '[\"Hyper Cutter\", \"Mold Breaker\", \"Moxie\"]', 155, 6400, 'Stagbeetle Pokémon', 120, 1.5, 65, 'Pinsir', 127, 65, 90, 105, 'bug', '', '55', 0, 'https://www.serebii.net/pokemon/art/127.png'),
(128, '[\"Intimidate\", \"Anger Point\", \"Sheer Force\"]', 100, 5120, 'Wild Bull Pokémon', 95, 1.4, 75, 'Tauros', 128, 40, 70, 110, 'normal', '', '88.4', 0, 'https://www.serebii.net/pokemon/art/128.png'),
(129, '[\"Swift Swim\", \"Rattled\"]', 10, 1280, 'Fish Pokémon', 55, 0.9, 20, 'Magikarp', 129, 15, 20, 80, 'water', '', '10', 0, 'https://www.serebii.net/pokemon/art/129.png'),
(130, '[\"Intimidate\", \"Moxie\"]', 155, 1280, 'Atrocious Pokémon', 109, 6.5, 95, 'Gyarados', 130, 70, 130, 81, 'water', 'flying', '235', 0, 'https://www.serebii.net/pokemon/art/130.png'),
(131, '[\"Water Absorb\", \"Shell Armor\", \"Hydration\"]', 85, 10240, 'Transport Pokémon', 80, 2.5, 130, 'Lapras', 131, 85, 95, 60, 'water', 'ice', '220', 0, 'https://www.serebii.net/pokemon/art/131.png'),
(132, '[\"Limber\", \"Imposter\"]', 48, 5120, 'Transform Pokémon', 48, 0.3, 48, 'Ditto', 132, 48, 48, 48, 'normal', '', '4', 0, 'https://www.serebii.net/pokemon/art/132.png'),
(133, '[\"Run Away\", \"Adaptability\", \"Anticipation\"]', 55, 8960, 'Evolution Pokémon', 50, 0.3, 55, 'Eevee', 133, 45, 65, 55, 'normal', '', '6.5', 0, 'https://www.serebii.net/pokemon/art/133.png'),
(134, '[\"Water Absorb\", \"Hydration\"]', 65, 8960, 'Bubble Jet Pokémon', 60, 1, 130, 'Vaporeon', 134, 110, 95, 65, 'water', '', '29', 0, 'https://www.serebii.net/pokemon/art/134.png'),
(135, '[\"Volt Absorb\", \"Quick Feet\"]', 65, 8960, 'Lightning Pokémon', 60, 0.8, 65, 'Jolteon', 135, 110, 95, 130, 'electric', '', '24.5', 0, 'https://www.serebii.net/pokemon/art/135.png'),
(136, '[\"Flash Fire\", \"Guts\"]', 130, 8960, 'Flame Pokémon', 60, 0.9, 65, 'Flareon', 136, 95, 110, 65, 'fire', '', '25', 0, 'https://www.serebii.net/pokemon/art/136.png'),
(137, '[\"Trace\", \"Download\", \"Analytic\"]', 60, 5120, 'Virtual Pokémon', 70, 0.8, 65, 'Porygon', 137, 85, 75, 40, 'normal', '', '36.5', 0, 'https://www.serebii.net/pokemon/art/137.png'),
(138, '[\"Swift Swim\", \"Shell Armor\", \"Weak Armor\"]', 40, 7680, 'Spiral Pokémon', 100, 0.4, 35, 'Omanyte', 138, 90, 55, 35, 'rock', 'water', '7.5', 0, 'https://www.serebii.net/pokemon/art/138.png'),
(139, '[\"Swift Swim\", \"Shell Armor\", \"Weak Armor\"]', 60, 7680, 'Spiral Pokémon', 125, 1, 70, 'Omastar', 139, 115, 70, 55, 'rock', 'water', '35', 0, 'https://www.serebii.net/pokemon/art/139.png'),
(140, '[\"Swift Swim\", \"Battle Armor\", \"Weak Armor\"]', 80, 7680, 'Shellfish Pokémon', 90, 0.5, 30, 'Kabuto', 140, 55, 45, 55, 'rock', 'water', '11.5', 0, 'https://www.serebii.net/pokemon/art/140.png'),
(141, '[\"Swift Swim\", \"Battle Armor\", \"Weak Armor\"]', 115, 7680, 'Shellfish Pokémon', 105, 1.3, 60, 'Kabutops', 141, 65, 70, 80, 'rock', 'water', '40.5', 0, 'https://www.serebii.net/pokemon/art/141.png'),
(142, '[\"Rock Head\", \"Pressure\", \"Unnerve\"]', 135, 8960, 'Fossil Pokémon', 85, 1.8, 80, 'Aerodactyl', 142, 70, 95, 150, 'rock', 'flying', '59', 0, 'https://www.serebii.net/pokemon/art/142.png'),
(143, '[\"Immunity\", \"Thick Fat\", \"Gluttony\"]', 110, 10240, 'Sleeping Pokémon', 65, 2.1, 160, 'Snorlax', 143, 65, 110, 30, 'normal', '', '460', 0, 'https://www.serebii.net/pokemon/art/143.png'),
(144, '[\"Pressure\", \"Snow Cloak\"]', 85, 20480, 'Freeze Pokémon', 100, 1.7, 90, 'Articuno', 144, 95, 125, 85, 'ice', 'flying', '55.4', 1, 'https://www.serebii.net/pokemon/art/144.png'),
(145, '[\"Pressure\", \"Static\"]', 90, 20480, 'Electric Pokémon', 85, 1.6, 90, 'Zapdos', 145, 125, 90, 100, 'electric', 'flying', '52.6', 1, 'https://www.serebii.net/pokemon/art/145.png'),
(146, '[\"Pressure\", \"Flame Body\"]', 100, 20480, 'Flame Pokémon', 90, 2, 90, 'Moltres', 146, 125, 85, 90, 'fire', 'flying', '60', 1, 'https://www.serebii.net/pokemon/art/146.png'),
(147, '[\"Shed Skin\", \"Marvel Scale\"]', 64, 10240, 'Dragon Pokémon', 45, 1.8, 41, 'Dratini', 147, 50, 50, 50, 'dragon', '', '3.3', 0, 'https://www.serebii.net/pokemon/art/147.png'),
(148, '[\"Shed Skin\", \"Marvel Scale\"]', 84, 10240, 'Dragon Pokémon', 65, 4, 61, 'Dragonair', 148, 70, 70, 70, 'dragon', '', '16.5', 0, 'https://www.serebii.net/pokemon/art/148.png'),
(149, '[\"Inner Focus\", \"Multiscale\"]', 134, 10240, 'Dragon Pokémon', 95, 2.2, 91, 'Dragonite', 149, 100, 100, 80, 'dragon', 'flying', '210', 0, 'https://www.serebii.net/pokemon/art/149.png'),
(150, '[\"Pressure\", \"Unnerve\"]', 150, 30720, 'Genetic Pokémon', 70, 2, 106, 'Mewtwo', 150, 194, 120, 140, 'psychic', '', '122', 1, 'https://www.serebii.net/pokemon/art/150.png'),
(151, '[\"Synchronize\"]', 100, 30720, 'New Species Pokémon', 100, 0.4, 100, 'Mew', 151, 100, 100, 100, 'psychic', '', '4', 1, 'https://www.serebii.net/pokemon/art/151.png');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `fname` varchar(80) DEFAULT NULL,
  `lname` varchar(80) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `fname`, `lname`, `email`, `password`, `contact_no`) VALUES
(1, NULL, NULL, 'jislaaik@gmail.com', 'gqGAw6vwLyGWAjV', NULL),
(15, NULL, NULL, 'wtf@jislaaikit.com', 'shjdvbsdljbvhjb234', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainer_id` (`trainer_id`),
  ADD KEY `pokemon_id` (`pokemon_id`);

--
-- Indexes for table `pokemon_data`
--
ALTER TABLE `pokemon_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`pokemon_id`) REFERENCES `pokemon_data` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
