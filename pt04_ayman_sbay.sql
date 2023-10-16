-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2023 a las 16:48:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt03_ayman_sbay`
--
CREATE DATABASE IF NOT EXISTS `pt04_ayman_sbay` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt04_ayman_sbay`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `ID` int(2) NOT NULL,
  `art` text NOT NULL,
  `Títol` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`ID`, `art`, `Títol`) VALUES
(0, 'Passos crucials per a l\'èxit empresarial.\r\n', 'Com Preparar un Pla de Negoci'),
(1, 'Descobreix com el ioga pot millorar la teva salut mental i física.', 'Els Beneficis del Ioga'),
(2, 'Consells pràctics per menjar de manera equilibrada i nutritiva.', 'Secrets per una Alimentació Saludable'),
(3, 'Explora la bellesa natural i cultural d\'aquesta illa indonèsia.', 'Destinacions Exòtiques: L\'Encant de Bali'),
(4, 'Estratègies per a la presa de decisions eficaç en la vida quotidiana.', 'Com Prendre Decisions Intel·ligents'),
(5, 'Comença un viatge cap a la pau interior i el benestar amb la meditació.', 'El Poder de la Meditació'),
(6, 'Platges que són saboroses i bones per a la salut.', 'Receptes Saludables i Delicioses'),
(7, 'Descobreix les joies culturals i culinàries d\'aquesta ciutat espanyola.', 'Guia de Barcelona: Cultura i Gastronomia'),
(8, 'Consells pràctics per a una gestió financera efectiva.', 'Com Estalviar Dinero de Manera Inteligente'),
(9, 'Introducció a les tècniques i trucs de la fotografia.', 'El Món de la Fotografia'),
(10, 'Un viatge a través del temps per conèixer aquests increïbles animals prehistòrics.', 'La Història dels Dinosaures'),
(11, 'Explora la bellesa de les muntanyes suïsses i les seves activitats.', 'Destins de Muntanya: Els Alps Suïssos'),
(12, 'Cures de la pell i secrets per a una tez saludable.', 'Consells per a una Pell Radiant'),
(13, 'Co fer de l\'exercici una part integral de la teva rutina diària.', 'Els Efectes de l\'Exercici en la Salu'),
(14, 'Com la IA està canviant la nostra societat.', 'La Revolució Tecnològica: L\'Impacte de la Intel·ligència Artificial'),
(15, 'Com explorar el món sense trencar la butxaca.', 'Viatjar Amb Pressupost: Consells i Trucs'),
(16, 'tègies per comunicar-te eficaçment.', 'Com Millorar les Teves Habilitats de Comunicació'),
(17, 'Delicioses receptes i beneficis per a la salut de la dieta mediterrània.', 'L\'Art de la Cuina Mediterrània'),
(18, 'Una mirada a la natura majestuosa d\'aquesta regió sud-americana.', 'La Màgia de la Patagònia Argentina'),
(19, 'Com ser més eficient en la teva vida quotidiana.', 'Estratègies per la Productivitat Personal'),
(20, 'Descobreix el procés de creació cinematogràfica.', 'L\'Univers del Cinema: Com Fer una Pel·lícula'),
(21, 'Consells i trucs per crear i mantenir un jardí exuberant.', 'L\'Art de la Jardineria'),
(22, 'Un recorregut per aquesta espectacular regió italiana a la vora del mar.\r\n', 'La Bellesa de la Costa Amalfitana'),
(23, 'Reflexions sobre la presa de decisions morals i ètiques.\r\n', 'Com Prendre Decisions Ètiques'),
(24, 'Les últimes notícies sobre la missió a Mart', 'La Ciència de l\'Espai: L\'Exploració de Mart');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
