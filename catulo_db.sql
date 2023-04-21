-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-04-2023 a las 19:28:01
-- Versión del servidor: 5.5.62
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catulo_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL,
  `destinatarios` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `destinatarios`, `created_at`, `updated_at`) VALUES
(1, 'reservas@catulotango.com', NULL, '2023-01-23 18:25:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgs_home`
--

CREATE TABLE `imgs_home` (
  `id` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imgs_home`
--

INSERT INTO `imgs_home` (`id`, `imagen`, `estado`, `created_at`, `updated_at`) VALUES
(23, '7687189.jpg', 1, '2023-01-31 16:01:48', '2023-01-31 16:01:48'),
(24, '6634632.jpg', 1, '2023-01-31 16:02:01', '2023-01-31 16:02:01'),
(25, '6157472.jpg', 1, '2023-01-31 16:02:13', '2023-01-31 16:02:13'),
(26, '3584773.jpg', 1, '2023-01-31 16:02:26', '2023-01-31 16:02:26'),
(27, '2278671.jpg', 1, '2023-01-31 16:02:37', '2023-01-31 16:02:37'),
(28, '5546792.jpg', 1, '2023-01-31 16:02:54', '2023-01-31 16:02:54'),
(29, '6666841.jpg', 1, '2023-01-31 16:03:07', '2023-01-31 16:03:07'),
(30, '6707691.jpg', 1, '2023-01-31 16:03:31', '2023-01-31 16:03:31'),
(31, '515814.jpg', 1, '2023-01-31 16:03:44', '2023-01-31 16:03:44'),
(32, '2908927.jpg', 1, '2023-01-31 16:04:01', '2023-01-31 16:04:01'),
(33, '7467654.jpg', 1, '2023-01-31 16:04:31', '2023-01-31 16:04:31'),
(34, '3901075.jpg', 1, '2023-01-31 16:05:04', '2023-01-31 16:05:04'),
(35, '6782725.jpg', 1, '2023-01-31 16:05:46', '2023-01-31 16:05:46'),
(36, '3403904.jpg', 1, '2023-01-31 16:06:09', '2023-01-31 16:06:09'),
(37, '4383166.jpg', 1, '2023-01-31 16:06:35', '2023-01-31 16:06:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `es` varchar(100) NOT NULL,
  `en` varchar(100) NOT NULL,
  `pr` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `nombre`, `es`, `en`, `pr`, `updated_at`, `created_at`) VALUES
(1, 'Menú', 'MenuCatulo-Esp.pdf', 'MenuCatulo-Eng.pdf', 'MenuCatulo-Por.pdf', '2023-03-15 21:19:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `fechaReg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orderId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentAmountId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payerId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payerEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payerCountry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentAmount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idShow` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `adultos` int(11) UNSIGNED NOT NULL,
  `menores` int(10) UNSIGNED DEFAULT NULL,
  `precio_show` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `comentarios` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `fechaReg`, `orderId`, `paymentAmountId`, `orderStatus`, `payerId`, `payerEmail`, `payerCountry`, `payerName`, `paymentAmount`, `idShow`, `nombre`, `apellido`, `email`, `telefono`, `hotel`, `fecha`, `adultos`, `menores`, `precio_show`, `total`, `status`, `comentarios`, `created_at`, `updated_at`) VALUES
(19, '2023-04-11 13:38:22', '4WH09591XK336073R', '3BM91821VJ300261J', 'COMPLETED', 'HP98V68TPBJ6L', 'skalil1@hotmail.com', 'BR', 'SORAIA BEHNCKE', 'USD 240.00', 2, 'Soraia', 'Kalil', 'skalil1@hotmail.com', '55 42 99112-8323', 'HR luxor', '2023-04-21 13:38:22', 4, 0, '60', '240', 1, NULL, '2023-04-11 13:38:22', '2023-04-11 13:38:22'),
(20, '2023-04-17 02:30:35', '5E989960LP461481M', '3KK23852WX6868100', 'COMPLETED', 'H3LMX5DQZBVT4', 'joseph.bouchard@tamu.edu', 'CA', 'Joseph Bouchard', 'USD 60.00', 2, 'Joseph', 'Bouchard', 'joseph.bouchard99@gmail.com', '+1 903-292-0124', 'Av. Hipólito Yrigoyen 826', '2023-04-20 02:30:35', 1, 0, '60', '60', 1, NULL, '2023-04-17 02:30:35', '2023-04-17 02:30:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shows`
--

CREATE TABLE `shows` (
  `id` bigint(20) NOT NULL,
  `titulo_es` varchar(500) DEFAULT NULL,
  `titulo_en` varchar(500) DEFAULT NULL,
  `titulo_pr` varchar(500) DEFAULT NULL,
  `des_es` text,
  `des_en` text,
  `des_pr` text,
  `precio` double DEFAULT NULL,
  `imagen` varchar(100) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `shows`
--

INSERT INTO `shows` (`id`, `titulo_es`, `titulo_en`, `titulo_pr`, `des_es`, `des_en`, `des_pr`, `precio`, `imagen`, `estado`, `created_at`, `updated_at`) VALUES
(2, 'CENA SHOW TRADICIONAL', 'TRADITIONAL DINNER SHOW', 'JANTAR SHOW TRADICIONAL', '<ul><li>Menú de 3 pasos</li><li>Bebidas incluidas</li><li>Show de Tango</li><li>Traslado</li></ul>', '<ul><li>3 step menu</li><li>Drinks included</li><li>Tango show</li><li>Transfer</li></ul>', '<ul><li>Menu de 3 etapas</li><li>Bebidas incluídas</li><li>Show de tango</li><li>Transferir</li></ul>', 60, '698706.jpg', 1, '2023-02-17 23:24:13', '2023-02-17 23:24:13'),
(3, 'CENA SHOW VIP', 'VIP DINNER SHOW', 'JANTAR VIP SHOW', '<ul><li>Menú VIP de 3 pasos</li><li>Ubicación preferencial</li><li>Upgrade en menú</li><li>Show de Tango</li><li>Traslado</li></ul>', '<ul><li>VIP Menu - 3 steps</li><li>Upgrade seat</li><li>Upgrade in menu</li><li>Tango show</li><li>Transfer</li></ul>', '<ul><li>Menu VIP de 3 passos</li><li>Localização preferencial</li><li>Upgrade em cardapio</li><li>Show de tango</li><li>Transfer</li></ul>', 80, '9149364.jpg', 1, '2023-02-07 14:01:36', '2023-02-07 14:01:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripciones`
--

CREATE TABLE `suscripciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `suscripciones`
--

INSERT INTO `suscripciones` (`id`, `email`, `created_at`, `updated_at`) VALUES
(2, 'mauriciolav@gmail.com', '2023-02-16 23:07:32', '2023-02-16 23:07:32'),
(3, 'info@pixtudios.net', '2023-02-25 16:57:44', '2023-02-25 16:57:44'),
(4, 'angel.rinaldi@gmail.com', '2023-04-14 02:32:33', '2023-04-14 02:32:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traducciones`
--

CREATE TABLE `traducciones` (
  `id` int(11) NOT NULL,
  `es` text NOT NULL,
  `en` text,
  `pr` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `traducciones`
--

INSERT INTO `traducciones` (`id`, `es`, `en`, `pr`, `updated_at`, `created_at`) VALUES
(1, 'Español', 'Spanish', 'Espanhol', '2023-01-30 01:49:59', NULL),
(2, 'Inglés', 'English', 'Inglês', NULL, NULL),
(3, 'Portugués', 'Portuguese', 'Português', '2023-01-30 01:49:39', NULL),
(4, 'EL SHOW', 'THE SHOW', 'A APRESENTAÇÃO', '2023-01-30 01:51:16', '2023-01-30 01:51:16'),
(5, 'MENÚ', 'MENU', 'MENU', '2023-01-30 01:54:41', '2023-01-30 01:54:41'),
(7, 'Hoy es homenajeado todas las noches, en el barrio de Carlos Gardel llamado Abasto e nuestra hermosa y prestigiosa casa Cátulo Tango', 'Today he is honored every night, in the Carlos Gardel neighborhood called Abasto and our beautiful and prestigious Cátulo Tango house', 'Hoje ele é homenageado todas as noites, no bairro Carlos Gardel chamado Abasto e nossa bela e prestigiosa casa Cátulo Tango', '2023-01-30 16:18:11', '2023-01-30 16:18:11'),
(8, 'SALÓN', 'SALON', NULL, '2023-01-30 16:56:18', '2023-01-30 16:56:18'),
(9, 'EVENTOS', 'EVENTS', 'EVENTS', '2023-02-14 12:57:56', '2023-01-30 16:59:33'),
(10, 'CONTACTO', 'CONTACT US', 'CONTATO', '2023-01-30 17:01:03', '2023-01-30 17:01:03'),
(11, 'RESERVAS', 'BOOKING', NULL, '2023-01-30 17:01:47', '2023-01-30 17:01:47'),
(12, 'MENÚ GOURMET DE 3 PASOS', '3 STEPS GOURMET MENU', 'MENU GOURMET 3 ETAPAS', '2023-01-30 17:05:14', '2023-01-30 17:05:14'),
(13, 'VER MENÚ', 'VIEW MENU', 'VER MENU', '2023-01-30 23:37:45', '2023-01-30 17:08:42'),
(16, 'VIVÍ UN SHOW DE TANGO ÚNICO EN EL BARRIO DE CARLOS GARDEL', 'I LIVED A UNIQUE TANGO SHOW IN THE CARLOS GARDEL NEIGHBORHOOD', 'VIVI UM SHOW DE TANGO ÚNICO NO BAIRRO CARLOS GARDEL', '2023-01-30 17:16:59', '2023-01-30 17:16:59'),
(17, 'RESERVA TU SHOW ON LINE Y OBTÉN TU ENTRADA HOY', 'BOOK YOUR SHOW ONLINE AND GET YOUR TICKET TODAY', 'RESERVE SEU SHOW ONLINE E GARANTA SEU INGRESSO HOJE', '2023-01-30 17:18:59', '2023-01-30 17:18:59'),
(18, 'RESERVÁ TU SHOW ON LINE Y OBTÉN TU ENTRADA HOY', 'BOOK YOUR SHOW ONLINE AND GET YOUR TICKET TODAY', 'RESERVE SEU SHOW ONLINE E GARANTA SEU INGRESSO HOJE', '2023-01-30 17:21:13', '2023-01-30 17:21:13'),
(19, 'RESERVAR', 'BOOKING', 'RESERVA', '2023-01-30 17:24:21', '2023-01-30 17:24:21'),
(20, 'Por persona', 'Per pax', 'Por pessoa', '2023-01-30 17:26:11', '2023-01-30 17:26:11'),
(21, 'CONSULTAS', 'INQUIRIES', 'INQUÉRITOS', '2023-01-30 17:29:41', '2023-01-30 17:29:41'),
(22, 'NOMBRE', 'NAME', 'NOME', '2023-01-30 17:34:18', '2023-01-30 17:34:18'),
(23, 'APELLIDO', 'SURNAME', 'SOBRENOME', '2023-01-30 17:36:00', '2023-01-30 17:36:00'),
(24, 'COMENTARIO', 'COMMENT', 'COMENTÁRIO', '2023-01-30 17:36:44', '2023-01-30 17:36:44'),
(25, 'ENVIAR', 'SEND', 'ENVIAR', '2023-01-30 17:38:26', '2023-01-30 17:38:26'),
(26, 'UBICACIÓN', 'LOCATION', 'LOCALIZAÇÃO', '2023-01-30 17:40:44', '2023-01-30 17:40:02'),
(27, 'HORARIOS DE ATENCIÓN', 'ATTENTION SCHEDULE', 'HORÁRIOS DE ATENÇÃO', '2023-01-30 17:43:33', '2023-01-30 17:43:33'),
(28, 'CENA SHOW', 'SHOW DINNER', 'MOSTRE O JANTAR', '2023-01-30 17:44:30', '2023-01-30 17:44:30'),
(29, 'TEL', 'PHONE', 'TELEFONE', '2023-01-30 17:45:32', '2023-01-30 17:45:32'),
(30, 'Lunes a Domingo', 'Monday to Sunday', 'Segunda a domingo', '2023-01-30 17:46:40', '2023-01-30 17:46:15'),
(31, 'Cena', 'Dinner', 'Jantar', '2023-01-30 17:47:29', '2023-01-30 17:47:29'),
(32, 'a', 'to', 'a', '2023-01-30 17:49:09', '2023-01-30 17:49:09'),
(33, 'SUSCRIBIRME', 'SUSCRIBE', NULL, '2023-01-30 17:50:40', '2023-01-30 17:50:40'),
(34, 'Derechos reservados por Cátulo Tango', 'Rights reserved by Cátulo Tango', 'Direitos reservados por Cátulo Tango', '2023-01-30 17:51:29', '2023-01-30 17:51:29'),
(35, 'Por favor complete el campo', 'Please complete the field', 'Por favor, preencha o campo', '2023-01-30 18:48:28', '2023-01-30 18:48:28'),
(36, 'GRACIAS POR SU CONSULTA!', 'THANK YOU FOR YOUR INQUIRY!', 'OBRIGADO POR SUA PERGUNTA!', '2023-01-30 23:37:21', '2023-01-30 23:24:32'),
(37, 'Contacto desde Cátulo Tango', 'Contact from Catulo Tango', 'Contato do Catulo Tango', '2023-01-31 01:23:18', '2023-01-31 01:23:18'),
(38, 'Nombre', 'Name', 'Nome', '2023-01-31 01:36:37', '2023-01-31 01:36:37'),
(39, 'Apellido', 'Surname', 'Sobrenome', '2023-01-31 01:37:10', '2023-01-31 01:37:10'),
(40, 'Comentario', 'Comment', 'Comentario', '2023-01-31 01:38:07', '2023-01-31 01:38:07'),
(41, 'Entrada', 'Entrees', 'Entrada', '2023-03-08 12:25:23', '2023-02-01 00:56:11'),
(42, 'Plato principal', 'Main dish', 'Prato principal', '2023-02-01 00:56:46', '2023-02-01 00:56:46'),
(43, 'Postre', 'Dessert', 'Sobremesa', '2023-02-01 00:57:16', '2023-02-01 00:57:16'),
(44, 'EL SERVICIO INCLUYE', 'THE SERVICE INCLUDES', 'O SERVIÇO INCLUI', NULL, NULL),
(45, 'MÚSICA', 'MUSIC', 'MÚSICA', '2023-02-06 22:52:55', '2023-02-06 22:52:55'),
(47, 'Fecha de su visita', 'Date of your visit', 'Data da sua visita', NULL, NULL),
(49, 'Cantidad de adultos', 'Number of adults', 'Número de Adultos', '2023-02-07 16:49:27', '2023-02-07 16:49:27'),
(50, 'Cantidad de menores', 'Number of minors', 'Número de menores', '2023-02-07 16:50:16', '2023-02-07 16:50:16'),
(51, 'TOTAL A PAGAR', 'TOTAL TO PAY', 'TOTAL A PAGAR', '2023-02-08 18:55:37', '2023-02-08 18:55:37'),
(52, 'COMPLETE EL FORMULARIO', 'COMPLETE THE FORM', 'COMPLETE A FORMA', '2023-02-08 21:15:47', '2023-02-08 21:15:47'),
(53, 'Adultos', 'Adults', 'adultos', '2023-02-09 18:25:36', '2023-02-09 18:25:36'),
(54, 'Menores', 'Minors', 'Menores', '2023-02-09 18:26:09', '2023-02-09 18:26:09'),
(55, 'DETALLE DE SU RESERVA', 'DETAIL OF YOUR RESERVATION', 'DETALHE DA SUA RESERVA', '2023-02-09 18:26:41', '2023-02-09 18:26:41'),
(56, 'EDITAR', 'EDIT', 'EDITAR', '2023-02-09 18:27:13', '2023-02-09 18:27:13'),
(57, 'GRACIAS POR SU RESERVA, RECIBIRÁ SU TICKET POR EMAIL', 'THANK YOU FOR YOUR RESERVATION, YOU WILL RECEIVE YOUR TICKET BY EMAIL', 'OBRIGADO PELA SUA RESERVA, VOCÊ RECEBERÁ SEU BILHETE POR EMAIL', '2023-02-10 16:54:41', '2023-02-10 16:54:41'),
(58, 'Fecha', 'Date', 'Fecha', '2023-02-10 15:49:22', '2023-02-10 15:49:22'),
(59, 'Precio', 'Price', 'Preço', '2023-02-13 23:53:32', '2023-02-13 23:53:32'),
(60, 'Reserva Cátulo Tango', 'Cátulo Tango Booking', 'Cátulo Tango Reserve', '2023-02-13 23:55:29', '2023-02-13 23:55:29'),
(62, '• Profesor, Secretario y Director del Conservatorio Municipal de Música \"Manuel de Falla\".', '• Professor, Secretary and Director of the \"Manuel de Falla\" Municipal Conservatory of Music.', '• Professor, Secretário e Diretor do Conservatório Municipal de Música \"Manuel de Falla\".', '2023-02-14 02:22:07', '2023-02-14 02:22:07'),
(63, '• Fundador de la Asociación Gardeliana en 1968.', '• Founder of the Gardeliana Association in 1968.', '• Fundador de la Asociación Gardeliana em 1968.', '2023-02-14 02:26:40', '2023-02-14 02:26:40'),
(64, 'Nació en 1906. En 1955 fue uno de los tantos perseguidos políticos por la dictadura militar. Murió en 1975 en su casa de Ciudad Evita. En su honor, la calle en la que vivió lleva su nombre. A los 10 años de edad compuso Canyengue, pieza que interpretó Canaro. A los 17 años de edad compuso Organito de la tarde. Entre sus principales obras, además de las mencionadas, se encuentran: Silbando, Viejo ciego, Corazón de papel, A Homero, Patio de la Morocha, Maria (con música de Troilo), El último café, Caserón de tejas, Tinta roja, Desencuentro, La última curda. Distinguido como ciudadano ilustre de la Ciudad de Buenos Aires, se destacó en esta sociedad a través de la obtención de numerosos premios: Fondo Nacional de las Artes, SADAIC y de otras entidades. Esta distinción se reforzó aún más cuando el Presidente Juan Domingo Perón lo designó al frente de la Comisión Nacional de Cultura. Su personalidad multifacética le permitió actuar en distintos ámbitos:', 'He was born in 1906. In 1955 he was one of the many political persecuted by the military dictatorship. He died in 1975 at his home in Ciudad Evita. In his honor, the street where he was born is named after him. At the age of 10 he composed Canyengue, a piece that Canaro performed. At 17 years of age he composed Organito de la tarde. Among his main works, in addition to those mentioned, are: Silbando, Viejo ciego, Corazón de papel, A Homero, Patio de la Morocha, Maria (with music by Troilo), The Last Coffee, Texas mansion, Red ink, Disencounter, The last curda. Distinguished as an illustrious citizen of the City of Buenos Aires, he stood out in this society by obtaining numerous awards: National Endowment for the Arts, SADAIC and other entities. This distinction was further reinforced when President Juan Domingo Perón appointed him to head the National Commission for Culture. His multifaceted personality allowed him to act in different environments:', 'Nasceu em 1906. Em 1955 foi um dos tantos perseguidos políticos pela ditadura militar. Murió em 1975 em sua casa de Ciudad Evita. Em sua homenagem, a rua em que vivia levava seu nome. Aos 10 anos compuso Canyengue, peça que interpretou Canaro. A Los 17 compuso Organito de la tarde. Entre suas principais obras, além das mencionadas, encontram-se: Silbando, Viejo ciego, Corazón de papel, A Homero, Patio de la Morocha, Maria (com música de Troilo), El último café, Caserón de tejas, Tinta roja, Desencuentro, La última curda. Distinguido como ciudadano ilustre da Ciudad de Buenos Aires, destacou-se nesta sociedade através da obtenção de numerosos prémios: Fondo Nacional de las Artes, SADAIC e de outras entidades. Esta distinção foi reforçada ainda mais quando o presidente Juan Domingo Perón o designou à frente da Comissão Nacional de Cultura. Sua personalidade multifacética permite atuar em diferentes âmbitos:', '2023-02-26 23:19:50', '2023-02-14 02:27:47'),
(65, '• Uno de los primeros socios de SADAIC y su Presidente, luego de haber ocupado diversos cargos directivos. Miembro muy querido y respetado en la entidad gremial OSPESA.', '• One of the first members of SADAIC and its President, after having held various management positions. Much loved and respected member in the union entity OSPESA.', '• Uno de los primeros socios de SADAIC y su Presidente, luego de haber ocupou diversos cargos directivos. Miembro muito querido e respeitado en la entidad gremial OSPESA.', '2023-02-14 02:29:07', '2023-02-14 02:29:07'),
(66, '• Periodista de \"El Lider\", \"El Nacional\", \"Última Hora\" y \"La Prensa\".', '• Journalist for \"El Lider\", \"El Nacional\", \"Última Hora\" and \"La Prensa\".', '• Jornalista de \"El Lider\", \"El Nacional\", \"Última Hora\" e \"La Prensa\".', '2023-02-14 02:30:36', '2023-02-14 02:30:36'),
(67, '• Fundador de MAPA (Movimiento Argentino de Protección Animal).', '• Founder of MAPA (Argentine Movement for Animal Protection).', '• Fundador do MAPA (Movimiento Argentino de Protecção Animal).', '2023-02-14 02:32:35', '2023-02-14 02:32:35'),
(68, '• Campeón argentino de boxeo de peso pluma.', '• Argentine featherweight boxing champion.', '• Campeão argentino de boxe de peso pluma.', '2023-02-14 02:33:25', '2023-02-14 02:33:25'),
(69, '• Campeón argentino de boxeo de peso pluma.', '• Argentine featherweight boxing champion.', '• Campeão argentino de boxe de peso pluma.', '2023-02-14 02:33:55', '2023-02-14 02:33:55'),
(70, 'Sus amigos favoritos eran: Pichuco, Manzi, Espósito, José Razzano, Piana, Cadicamo, Julián Centeya, Héctor Stamponi y Contursi. Fue querido por su gente tanto como Manzi, Hugo del Carril, Leonardo Favio, Pugliese y tantos otros.', 'His favorite friends were: Pichuco, Manzi, Espósito, José Razzano, Piana, Cadicamo, Julián Centeya, Héctor Stamponi and Contursi. He was loved by his people as much as Manzi, Hugo del Carril, Leonardo Favio, Pugliese and many others.', 'Seus amigos favoritos eram: Pichuco, Manzi, Espósito, José Razzano, Piana, Cadicamo, Julián Centeya, Héctor Stamponi e Contursi. Fue querido por sua gente tanto como Manzi, Hugo del Carril, Leonardo Favio, Pugliese e tantos outros.', '2023-02-14 02:34:38', '2023-02-14 02:34:38'),
(71, 'Leer menos', 'Read less', 'Leia menos', '2023-02-14 14:22:17', '2023-02-14 14:22:17'),
(72, 'Leer más', 'Read more', 'Ler mais', '2023-02-14 14:22:45', '2023-02-14 14:22:45'),
(73, 'Cátulo Tango cuenta con un servicio especializado para eventos corporativos, jornadas de trabajo, presentación de productos, disertaciones, workshop, capacitaciones, fiestas de fin de año para su empresa.', 'Cátulo Tango has a specialized service for corporate events, work days, product presentations, lectures, workshops, training, year-end parties for your company.', 'A Cátulo Tango possui um atendimento especializado para eventos corporativos, jornadas de trabalho, apresentações de produtos, palestras, workshops, treinamentos, festas de final de ano para sua empresa.', '2023-02-16 00:52:00', '2023-02-16 00:52:00'),
(74, 'Contamos con un salón completamente equipado con sonido, 2 escenarios, pantallas, aire acondicionado, calefacción, iluminación, catering propio y todo el equipamiento para que su evento sea único. A su vez nuestro staff de profesionales lo asesoran y acompañan desde el primer momento hasta la finalización de cada actividad.', 'We have a room fully equipped with sound, 2 stages, screens, air conditioning, heating, lighting, our own catering and all the equipment to make your event unique. At the same time, our staff of professionals advise and accompany you from the first moment until the end of each activity.', 'Dispomos de uma sala totalmente equipada com som, 2 palcos, telões, ar condicionado, aquecimento, iluminação, catering próprio e todo o equipamento para tornar o seu evento único. Ao mesmo tempo, nossa equipe de profissionais o aconselha e acompanha desde o primeiro momento até o final de cada atividade.', '2023-02-16 00:52:39', '2023-02-16 00:52:39'),
(75, 'Más información', 'More information', 'Mais informação', '2023-02-16 00:53:08', '2023-02-16 00:53:08'),
(76, 'Ingrese un e-mail válido', 'Enter a valid email', 'Entre com um email válido', '2023-02-16 17:57:07', '2023-02-16 17:57:07'),
(77, 'Gracias por suscribirte!', 'Thanks for subscribing!', 'Grato pela assinatura!', '2023-02-16 18:21:42', '2023-02-16 18:21:42'),
(78, 'El email que intenta registrar, ya se encuentra en nuestra base de datos.', 'The email you are trying to register is already in our database.', 'O e-mail que você está tentando cadastrar já está em nosso banco de dados.', '2023-02-16 18:22:49', '2023-02-16 18:22:49'),
(79, 'Viernes y sábados', 'Fridays and Saturdays', 'Sextas e sábados', '2023-02-25 22:47:45', '2023-02-25 22:47:45'),
(80, 'Lunes a sábados', 'From Monday to Saturday', 'De segunda a Sábado', '2023-02-25 22:48:27', '2023-02-25 22:48:27'),
(81, '21:30hs', '9:30pm', '21:30hs', '2023-03-07 13:56:19', '2023-03-07 13:37:45'),
(82, '9:00hs', '9:00am', '9:00hs', '2023-03-07 13:55:28', '2023-03-07 13:55:28'),
(83, '20:00hs', '8:00pm', '20:00hs', '2023-03-07 14:08:35', '2023-03-07 14:08:35'),
(84, 'Principal', 'Main course', 'Prato principal', '2023-03-08 12:22:46', '2023-03-08 12:22:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notas` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `notas`, `created_at`, `updated_at`, `estado`) VALUES
(15, 'Administrador', 'info@catulotango.com', NULL, '$2y$10$pnjOE3VaKmNwS5/txgV2G.oMMd9CgAyt3.BBIbtLavDNLXk2tNFOW', NULL, NULL, '2023-01-25 23:27:27', '2023-04-21 11:13:53', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imgs_home`
--
ALTER TABLE `imgs_home`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `traducciones`
--
ALTER TABLE `traducciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imgs_home`
--
ALTER TABLE `imgs_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `shows`
--
ALTER TABLE `shows`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `traducciones`
--
ALTER TABLE `traducciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
