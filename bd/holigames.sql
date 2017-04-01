-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-03-2017 a las 22:04:57
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `holigames`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ahorcado`
--

CREATE TABLE `ahorcado` (
  `id` int(10) UNSIGNED NOT NULL,
  `tematica` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ahorcado`
--

INSERT INTO `ahorcado` (`id`, `tematica`, `descripcion`) VALUES
(1, 'Lenguaje', 'Palabras relacionadas con el lenguaje, gramática, vocabulario, ortografía, etc'),
(2, 'Conocimiento del medio', 'Palabras relacionadas con el cuerpo humano, clasificación de animales, estructura del planeta, etc.'),
(3, 'Matematicas', 'Palabras relacionadas con la geometría, números naturales, operaciones, etc'),
(4, 'Ingles', 'Palabras relacionadas con el lenguaje y gramatica inglesa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ahorcado_respuestas`
--

CREATE TABLE `ahorcado_respuestas` (
  `id` int(10) UNSIGNED NOT NULL,
  `respuesta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ahorcado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ahorcado_respuestas`
--

INSERT INTO `ahorcado_respuestas` (`id`, `respuesta`, `ahorcado_id`) VALUES
(1, 'Canguro', 1),
(2, 'Burro', 1),
(3, 'Hielo', 1),
(4, 'Hierro', 1),
(5, 'Beber', 1),
(6, 'Hervir', 1),
(7, 'Ahogarse', 1),
(8, 'Abeja', 1),
(9, 'Murcielago', 1),
(10, 'Vaca', 1),
(11, 'Pizarra', 1),
(12, 'Libro', 1),
(13, 'Hormiga', 1),
(14, 'Baul', 1),
(15, 'Camion', 1),
(16, 'Geosfera', 2),
(17, 'Atmosfera', 2),
(18, 'Esofago', 2),
(19, 'Estomago', 2),
(20, 'Pulmones', 2),
(21, 'Boca', 2),
(22, 'Intestino', 2),
(23, 'Llanura', 2),
(24, 'Meseta', 2),
(25, 'Cordillera', 2),
(26, 'Exosfera', 2),
(27, 'Termosfera', 2),
(28, 'Estratosfera', 2),
(29, 'Corteza', 2),
(30, 'Nucleo', 2),
(31, 'Cuadrado', 3),
(32, 'Triangulo', 3),
(33, 'Circulo', 3),
(34, 'Rombo', 3),
(35, 'Pentagono', 3),
(36, 'Sumar', 3),
(37, 'Restar', 3),
(38, 'Multiplicar', 3),
(39, 'Dividir', 3),
(40, 'Potencia', 3),
(41, 'Trigonometria', 3),
(42, 'Pitagoras', 3),
(43, 'Coseno', 3),
(44, 'Seno', 3),
(45, 'Tangente', 3),
(46, 'Book', 4),
(47, 'Football', 4),
(48, 'Basketball', 4),
(49, 'Tuesday', 4),
(50, 'Tennis', 4),
(51, 'Monday', 4),
(52, 'Thursday', 4),
(53, 'Scissors', 4),
(54, 'Shoes', 4),
(55, 'Wednesday', 4),
(56, 'Cat', 4),
(57, 'Dog', 4),
(58, 'Sleep', 4),
(59, 'Friday', 4),
(60, 'Saturday', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `temario` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `nombre`, `descripcion`, `temario`) VALUES
(7, 'Historia', 'Aula sobre la asignatura de historia.', 'Guerra mundial'),
(9, 'Literatura', 'Aula de Literatura', 'Generación del 27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas_usuarios_juegos`
--

CREATE TABLE `aulas_usuarios_juegos` (
  `id` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aulas_usuarios_juegos`
--

INSERT INTO `aulas_usuarios_juegos` (`id`, `id_aula`, `id_usuario`, `id_juego`) VALUES
(36, 7, 2, 12),
(37, 8, 2, 0),
(38, 8, 2, 13),
(39, 9, 2, 14),
(40, 6, 2, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo_juego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `titulo`, `descripcion`, `id_tipo_juego`) VALUES
(12, 'Segunda Guerra mundial.Capitulo 1', 'Sopa letras destinada a reforzar los conocimientos adquiridos en el capitulo 1 de historia sobre la segunda guerra mundial, en concreto los países que participaron', 1),
(13, 'Vocabulario colores', 'Sopa de letras destinada a reforzar el conocimiento de los colores en inglés para alumnos de 1º de primaria', 1),
(14, 'Generación del 27', 'Sopa de letras para reforzar los poetas pertenecientes a la Generación del 27', 1),
(15, 'Comunidaes Autónomas', 'Localidades que forman la comunidad autónoma de Andalucía', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiz`
--

CREATE TABLE `quiz` (
  `id` int(10) UNSIGNED NOT NULL,
  `temario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `quiz`
--

INSERT INTO `quiz` (`id`, `temario`, `descripcion`, `id_usuario`) VALUES
(1, 'Lenguaje', 'Cuestionario creado para alumnos de 1º y 2º de Primaria', 0),
(2, 'Conocimiento del Medio', 'Cuestionario creado para alumnos de 3º y 4º de Primaria', 0),
(3, 'Ingles', 'Cuestionario creado para alumnos de 5º y 6º de Primaria', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiz_preguntas`
--

CREATE TABLE `quiz_preguntas` (
  `id` int(10) UNSIGNED NOT NULL,
  `pregunta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `quiz_preguntas`
--

INSERT INTO `quiz_preguntas` (`id`, `pregunta`, `quiz_id`) VALUES
(1, '__rro', 1),
(2, 'Zapati__', 1),
(3, 'Ca__llo', 1),
(4, 'Ra__', 1),
(5, 'Pedro tiene las manos frías, ¿que puede hacer?', 1),
(6, 'Hoy está lloviendo, ¿que necesita Ana?', 1),
(7, 'Paco cuida al ____ en su granja', 1),
(8, 'Maria necesita aguja e ___ para coser', 1),
(9, 'El balón de playa esta bien inflado', 1),
(10, 'Mario tiene prisa por ber el futbol', 1),
(11, 'Zana__ria', 1),
(12, 'Manolo tiene un coche de color  ___ bosque', 1),
(13, 'El perro de Juan ___ cuando tiene visita', 1),
(14, 'Rosana tiene un ___ que ronronea cuando la ve', 1),
(15, 'Víctor y Manuela quieren cantar en el ____ el sabado', 1),
(16, '¿Uno de los planetas del Sistema Solar es...?', 2),
(17, 'Indica cuál de los siguientes seres vivos pertenece al reino de los hongos', 2),
(18, 'Los animales herbívoros son los que:', 2),
(19, 'Los animales carnívoros son los que:', 2),
(20, 'Los animales que nacen mediante huevos son:', 2),
(21, '¿La Vía Láctea es?', 2),
(22, '¿Cuánto tarda la Tierra en dar una vuelta alrededor del Sol? ', 2),
(23, '¿Cuánto tarda la Tierra en dar una vuelta sobre si misma?', 2),
(24, 'Las capas internas de la Tierra son:', 2),
(25, 'El Sol es:', 2),
(26, '¿Cuáles son las tres partes de una montaña?', 2),
(27, 'Los estados del agua son:', 2),
(28, '¿Que partes están en el aparato digestivo?', 2),
(29, '¿Que partes están en el aparato respiratorio?', 2),
(30, '¿Que partes componen el ojo humano?', 2),
(31, 'He ______ than her', 3),
(32, 'Madrid is _____ London', 3),
(33, 'Oranges ____ than pears', 3),
(34, 'Juana _____ Ana', 3),
(35, 'The glasses _____ the scarf', 3),
(36, 'The plane _____ than the bus', 3),
(37, 'Yesterday _____ than today', 3),
(38, 'The sofa _____ the chair', 3),
(39, 'I _____ to the cinema on Wednesdays', 3),
(40, 'Yesterday we _____ dinner at a restaurant', 3),
(41, 'I _____ French this month', 3),
(42, 'We _____ the dishes at the moment', 3),
(43, 'I eat pop corn while I _____ ', 3),
(44, 'I _____ my bike yesterday when I saw my cousin', 3),
(45, 'She is _____ hospital', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiz_puntuacion`
--

CREATE TABLE `quiz_puntuacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `puntuacion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `quiz_puntuacion`
--

INSERT INTO `quiz_puntuacion` (`id`, `puntuacion`) VALUES
(9, '00:21:00'),
(10, '00:21:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiz_respuesta_pregunta`
--

CREATE TABLE `quiz_respuesta_pregunta` (
  `id` int(10) UNSIGNED NOT NULL,
  `respuesta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correcta` tinyint(1) NOT NULL,
  `quiz_preguntas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `quiz_respuesta_pregunta`
--

INSERT INTO `quiz_respuesta_pregunta` (`id`, `respuesta`, `correcta`, `quiz_preguntas_id`) VALUES
(1, 'Bu', 1, 1),
(2, 'Vu', 0, 1),
(3, 'Du', 0, 1),
(4, 'Lu', 0, 1),
(5, 'yas', 0, 2),
(6, 'llas', 1, 2),
(7, 'tas', 0, 2),
(8, 'las', 0, 2),
(9, 'va', 0, 3),
(10, 've', 0, 3),
(11, 'bu', 0, 3),
(12, 'ba', 1, 3),
(13, 'tuela', 1, 4),
(14, 'tun', 0, 4),
(15, 'tón', 0, 4),
(16, 'ten', 0, 4),
(17, 'Ponerse una bufanda', 0, 5),
(18, 'Ponerse guantes', 1, 5),
(19, 'Ponerse un abrigo', 0, 5),
(20, 'Ponerse un gorro', 0, 5),
(21, 'Sombrilla', 0, 6),
(22, 'Abrigo', 0, 6),
(23, 'Jersey', 0, 6),
(24, 'Paraguas', 1, 6),
(25, 'Vurro', 0, 7),
(26, 'Burro', 1, 7),
(27, 'Buro', 0, 7),
(28, 'Vuro', 0, 7),
(29, 'Ila', 0, 8),
(30, 'Hilo', 1, 8),
(31, 'Illo', 0, 8),
(32, 'Hila', 0, 8),
(33, 'La frase esta bien', 1, 9),
(34, 'Se escribe plalla', 0, 9),
(35, 'Se escribe valón', 0, 9),
(36, 'Se escribe hinflado', 0, 9),
(37, 'Se escribe futvol', 0, 10),
(38, 'La frase esta bien', 0, 10),
(39, 'Se escribe ver', 1, 10),
(40, 'Se escribe a ver', 0, 10),
(41, 'o', 0, 11),
(42, 'ho', 1, 11),
(43, 'he', 0, 11),
(44, 'i', 0, 11),
(45, 'Berde', 0, 12),
(46, 'Berbe', 0, 12),
(47, 'Verbe', 0, 12),
(48, 'Verde', 1, 12),
(49, 'maulla', 0, 13),
(50, 'ladra', 1, 13),
(51, 'rebuzna', 0, 13),
(52, 'pia', 0, 13),
(53, 'gato', 1, 14),
(54, 'perro', 0, 14),
(55, 'canario', 0, 14),
(56, 'loro', 0, 14),
(57, 'Caraoke', 0, 15),
(58, 'Karaoque', 0, 15),
(59, 'Karaoke', 1, 15),
(60, 'Caraoque', 0, 15),
(61, 'Kripton', 0, 16),
(62, 'Saturno', 1, 16),
(63, 'Solaris', 0, 16),
(64, 'Uranus', 0, 16),
(65, 'Pingüino', 0, 17),
(66, 'Girasol', 0, 17),
(67, 'Cactus', 0, 17),
(68, 'Champiñón', 1, 17),
(69, 'Se alimenta de carne', 0, 18),
(70, 'Se alimenta de plantas', 1, 18),
(71, 'Se alimenta de todo', 0, 18),
(72, 'Solo necesitan oxigeno para vivir', 0, 18),
(73, 'Se alimentan de pescado', 0, 19),
(74, 'Se alimentan de carne', 1, 19),
(75, 'Se alimenta de todo', 0, 19),
(76, 'Se alimentan de plantas', 0, 19),
(77, 'Ovíparos', 1, 20),
(78, 'Vivíparos', 0, 20),
(79, 'Hueviparos', 0, 20),
(80, 'Ovovivíparos', 0, 20),
(81, 'Un satélite', 0, 21),
(82, 'Una galaxia', 1, 21),
(83, 'Un planeta', 0, 21),
(84, 'Una estrella', 0, 21),
(85, '365 días y 16 horas', 0, 22),
(86, '365 días', 0, 22),
(87, '365 días y 6 horas', 1, 22),
(88, '366 días', 0, 22),
(89, '24 horas', 1, 23),
(90, '23 horas y 40 minutos', 0, 23),
(91, '23 horas y 4 minutos', 0, 23),
(92, '24 horas y 11 minutos', 0, 23),
(93, 'Corteza, manto y atmósfera', 0, 24),
(94, 'Corteza, manto y núcleo', 1, 24),
(95, 'Corteza, manto y geosfera', 0, 24),
(96, 'Corteza, manto y hidrosfera', 0, 24),
(97, 'Un cometa', 0, 25),
(98, 'Una galaxia', 0, 25),
(99, 'Una estrella', 1, 25),
(100, 'Un planeta', 0, 25),
(101, 'Píe, ladera y cima', 1, 26),
(102, 'Píe, ladera y cordillera', 0, 26),
(103, 'Píe, ladera y meseta', 0, 26),
(104, 'Cordillera, meseta y ladera', 0, 26),
(105, 'Sólido, líquido y embotellada', 0, 27),
(106, 'Sólido, líquido y gaseoso', 1, 27),
(107, 'Sólido y gaseoso ', 0, 27),
(108, 'Sólido, líquido y vaporizada', 0, 27),
(109, 'Esófago, estómago y páncreas', 0, 28),
(110, 'Esófago, estómago y riñones', 0, 28),
(111, 'Esófago, estómago e intestinos', 1, 28),
(112, 'Esófago, pulmones y estómago', 0, 28),
(113, 'Bronquios y pulmones', 1, 29),
(114, 'Riñon e higado', 0, 29),
(115, 'Esófago y estómago', 0, 29),
(116, 'Intestino delgado e intestino grueso', 0, 29),
(117, 'Pestaña, parpado y pupila', 0, 30),
(118, 'Iris, pestaña y cornea', 0, 30),
(119, 'Retina, cornea y parpado', 0, 30),
(120, 'Iris, pupila y cornea', 1, 30),
(121, 'is more old', 0, 31),
(122, 'are more old', 0, 31),
(123, 'is older', 1, 31),
(124, 'are older', 0, 31),
(125, 'more beautiful than', 1, 32),
(126, 'more beautiful', 0, 32),
(127, 'beautifulder than', 0, 32),
(128, 'beautiful than', 0, 32),
(129, 'is cheaper', 0, 33),
(130, 'are more cheap', 0, 33),
(131, 'more cheap', 0, 33),
(132, 'are cheaper', 1, 33),
(133, 'is taller than', 1, 34),
(134, 'is taller', 0, 34),
(135, 'are more taller than', 0, 34),
(136, 'are taller', 0, 34),
(137, 'are expensiver', 0, 35),
(138, 'are more expensive than', 1, 35),
(139, 'is expensivert than', 0, 35),
(140, 'is more expensive than', 0, 35),
(141, 'is more fast', 0, 36),
(142, 'are more fast', 0, 36),
(143, 'is faster', 1, 36),
(144, 'are faster', 0, 36),
(145, 'is colder', 0, 37),
(146, 'were more colder', 0, 37),
(147, 'are colder', 0, 37),
(148, 'was colder', 1, 37),
(149, 'are more comfortable than', 0, 38),
(150, 'was comfortable than', 0, 38),
(151, 'is more comfortable than', 1, 38),
(152, 'is comfortable than', 0, 38),
(153, 'going', 0, 39),
(154, 'went', 0, 39),
(155, 'go', 1, 39),
(156, 'am going', 0, 39),
(157, 'has', 0, 40),
(158, 'had', 1, 40),
(159, 'have', 0, 40),
(160, 'are having', 0, 40),
(161, 'studied', 0, 41),
(162, 'studying', 0, 41),
(163, 'study', 0, 41),
(164, 'am studying', 1, 41),
(165, 'are doing', 1, 42),
(166, 'doing', 0, 42),
(167, 'do', 0, 42),
(168, 'did', 0, 42),
(169, 'watched', 0, 43),
(170, 'are watched', 0, 43),
(171, 'am watching', 1, 43),
(172, 'are watching', 0, 43),
(173, 'ride', 0, 44),
(174, 'rode', 0, 44),
(175, 'was riding', 1, 44),
(176, 'are riding', 0, 44),
(177, 'on', 0, 45),
(178, 'at', 0, 45),
(179, 'in', 1, 45),
(180, 'for', 0, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sopadeletras`
--

CREATE TABLE `sopadeletras` (
  `id` int(11) NOT NULL,
  `palabras` text NOT NULL,
  `filas` int(11) NOT NULL,
  `columnas` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sopadeletras`
--

INSERT INTO `sopadeletras` (`id`, `palabras`, `filas`, `columnas`, `id_juego`) VALUES
(7, 'Francia,EEUU,Japon,URSS,Alemania,Holanda,Belgica', 10, 10, 12),
(8, 'red,blue,yellow,pink,green', 10, 10, 1),
(9, 'Alberti,Salinas,Guillén,Cernuda,Prados', 10, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_juego`
--

CREATE TABLE `tipo_juego` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_juego`
--

INSERT INTO `tipo_juego` (`id`, `nombre`) VALUES
(1, 'Sopa de letras'),
(2, 'Quizz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`) VALUES
(1, 'administrador'),
(2, 'maestro'),
(3, 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `numero_juegos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `nombre_usuario`, `contrasena`, `email`, `id_tipo_usuario`, `numero_juegos`) VALUES
(1, 'pedro', 'mendez', 'kiko', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 2, 0),
(2, 'juan diego', 'menacho', 'jdmg', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 2, 0),
(3, 'alberto', 'gonzalez', 'alberto', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 3, 0),
(4, 'davod', 'mendez', 'david', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 3, 0),
(5, 'jose', 'jimenez', 'jose', '1234', 0, 3, 0),
(6, 'pipon', 'casillas', 'kiko', '1234', 0, 3, 0),
(7, 'lucas', 'modric', 'modric', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 3, 0),
(8, 'zidane', 'zidane', 'zidane', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 3, 0),
(9, 'sergio', 'ramos', 'ramos', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 3, 0),
(10, 'sergio', 'carvajal', 'carvajal', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 3, 0),
(11, 'telefonica', 'empleo digital', 'telefonica', '1234', 0, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ahorcado`
--
ALTER TABLE `ahorcado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ahorcado_respuestas`
--
ALTER TABLE `ahorcado_respuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aulas_usuarios_juegos`
--
ALTER TABLE `aulas_usuarios_juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quiz_preguntas`
--
ALTER TABLE `quiz_preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quiz_puntuacion`
--
ALTER TABLE `quiz_puntuacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quiz_respuesta_pregunta`
--
ALTER TABLE `quiz_respuesta_pregunta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sopadeletras`
--
ALTER TABLE `sopadeletras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_juego`
--
ALTER TABLE `tipo_juego`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ahorcado`
--
ALTER TABLE `ahorcado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ahorcado_respuestas`
--
ALTER TABLE `ahorcado_respuestas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `aulas_usuarios_juegos`
--
ALTER TABLE `aulas_usuarios_juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `quiz_preguntas`
--
ALTER TABLE `quiz_preguntas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `quiz_puntuacion`
--
ALTER TABLE `quiz_puntuacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `quiz_respuesta_pregunta`
--
ALTER TABLE `quiz_respuesta_pregunta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT de la tabla `sopadeletras`
--
ALTER TABLE `sopadeletras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tipo_juego`
--
ALTER TABLE `tipo_juego`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
