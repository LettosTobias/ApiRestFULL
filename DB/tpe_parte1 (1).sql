-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2022 a las 15:32:17
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe_parte1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `genero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`genero`) VALUES
('accion'),
('ciencia ficcion'),
('romance'),
('suspenso'),
('terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estreno` year(4) NOT NULL,
  `valoracion` tinyint(1) NOT NULL,
  `descripcion` text NOT NULL,
  `id_genero_fk` varchar(45) NOT NULL,
  `Imagen` varchar(51) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre`, `estreno`, `valoracion`, `descripcion`, `id_genero_fk`, `Imagen`) VALUES
(86, 'La abuela', 2021, 0, 'Susana tiene que dejar su vida en París trabajando como modelo para regresar a Madrid porque su abuela Pilar acaba de sufrir un derrame cerebral. Lo que deberían ser solo unos días con su abuela, se acabarán convirtiendo en una terrorífica pesadilla.', 'terror', 'img/movies/634d39a2bd347.jpg'),
(87, 'La medium', 2022, 0, 'En Tailandia, un grupo de documentalistas registra la vida cotidiana de una médium, Nim Tonvali, quien relata estar poseída por el espíritu de la diosa Bayan. Durante el velatorio de su cuñado, Nim observa un comportamiento extraño en su sobrina.', 'terror', 'img/movies/634d39e41fffb.jpg'),
(88, 'Umma', 1997, 0, 'La plácida vida de Amanda da un vuelco cuando las cenizas de su difunta madre llegan de Corea. A partir de ese instante, empieza a obsesionarse con la idea de que su espíritu la posea.', 'terror', 'img/movies/634d39fe5a647.jpg'),
(89, 'Top Gun', 1986, 0, 'La trama sigue a Pete \"Maverick\" Mitchell, un joven aviador naval a bordo del portaaviones USS Enterprise. Él y su Oficial de Intercepción de Radar, el teniente Nick \"Goose\" Bradshaw tienen la oportunidad de entrenar en la Escuela de Armas de Combate de la Marina de los EE. UU. en la Estación Aérea Naval de Miramar en San Diego, California.', 'accion', 'img/movies/634d3a7ae42d4.jpg'),
(90, 'Thor: Amor y Trueno', 2022, 0, 'Thor está buscando la paz interior, pero la irrupción de Gorr, el asesino de dioses, le obliga a volver al combate. Thor recluta a la Reina Valkiria, Korg y su exnovia, Jane Foster, para que lo ayuden a evitar la extinción de los dioses.', 'accion', 'img/movies/634d3add88f5c.jpg'),
(91, 'Rapido y furiosos 7', 2015, 0, 'Un agente del gobierno que habla sin problemas le ofrece ayuda a Dominic Toretto y su banda para eliminar a un enemigo peligroso; a cambio, pide rescatar a un pirata informático secuestrado.', 'accion', 'img/movies/634d3b4ad42ab.jpg'),
(92, 'Finch', 2021, 0, 'Con la esperanza de ponerse a salvo de una tormenta mortal, un superviviente del posapocalipsis lleva a su perro y su robot humano a un viaje a través del país en una casa rodante con energía solar.', 'ciencia ficcion', 'img/movies/634d3bc2c012a.jpg'),
(93, 'Interestelar', 2014, 0, 'Gracias a un descubrimiento, un grupo de científicos y exploradores, encabezados por Cooper, se embarcan en un viaje espacial para encontrar un lugar con las condiciones necesarias para reemplazar a la Tierra y comenzar una nueva vida allí.', 'ciencia ficcion', 'img/movies/634d3bf30885b.jpg'),
(94, 'Jurassic World: dominion', 2022, 0, 'La isla Nublar y su parque han sido destruidos, pero el problema no se terminó. Con los dinosaurios dispersos por todo el mundo, la convivencia entre el presente y el pasado alcanza un nuevo nivel de tensión.', 'ciencia ficcion', 'img/movies/634d3c5af06f4.jpg'),
(95, 'A traves de mi ventana', 2021, 0, 'La atracción de Raquel por su vecino se convierte en algo más cuando él empieza a enamorarse de ella, pese a las objeciones de su familia.', 'romance', 'img/movies/634d3c9964bfe.jpg'),
(96, 'La razon de estar contigo', 2017, 0, 'Un perro desea descubrir el propósito de su vida al enseñar a reír y amar a seres humanos a lo largo de varias vidas.', 'romance', 'img/movies/634d3cdbc4275.jpg'),
(97, '365', 2020, 0, 'Laura sospecha que Massimo, su marido, la engaña con su ex novia Anna y comienza una aventura con Nacho, el jardinero, que en realidad es el heredero de la mafia rival.', 'romance', 'img/movies/634d3d503e52b.jpg'),
(98, 'Nadie', 2021, 0, 'Hutch, un hombre corriente, deja que roben en su casa sin oponer resistencia. Su esposa y su hijo empiezan a tratarlo con frialdad, decepcionados por su cobardía, por lo que Hutch cambia de personalidad y abraza el riesgo y la violencia.', 'suspenso', 'img/movies/634d3da058a29.jpg'),
(99, 'Scream 5', 2022, 1, 'Veinticinco años después de la masacre ocurrida en Woodsboro, un nuevo asesino se pone la legendaria máscara para matar adolescentes.', 'suspenso', 'img/movies/634d3ddc24f92.jpg'),
(100, 'La caceria', 2020, 1, 'Doce desconocidos despiertan en el claro de un bosque. No se conocen, pero tienen algo en común: un grupo de millonarios los ha elegido para divertirse cazándolos como si fueran animales salvajes. No obstante, algunos venderán cara su piel.', 'suspenso', 'img/movies/634d3e243e569.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(300) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin@gmail.com', '$2a$13$JFgmlJRaGngURKJAFWFwuuvZNjUxUAba03NxCHy/AdCEsJhXcTR.q', 'Administrador'),
(3, 'lettos.tobias02@gmail.com', '$2a$13$2Y3DlO1hg8hjH6XkSz/zUesMzu5RXIUtyBpcwI1nZZ0iggANrlvwO\n', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`genero`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero_fk` (`id_genero_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_genero_fk`) REFERENCES `genero` (`genero`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
