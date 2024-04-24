
CREATE DATABASE hikerscr;
USE hikerscr;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



CREATE TABLE categoriaTours (
  CategoriaID int(11) NOT NULL,
  Nombre varchar(50) NOT NULL,
  Descripcion varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE eventos (
  EventoID int(11) NOT NULL,
  TourID int(11) NOT NULL,
  nombreE text NOT NULL,
  Fecha date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE historial (
  HistorialID int(11) NOT NULL,
  ReservaID int(11) NOT NULL,
  Estado varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE reservas (
  ReservaID int(11) NOT NULL,
  TourID int(11) NOT NULL,
  UsuarioID int(11) NOT NULL,
  Fecha date NOT NULL,
  Estado varchar(20) NOT NULL,
  Numero_Participantes int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE tours (
  TourID int(11) NOT NULL,
  NombreT varchar(100) NOT NULL,
  Descripcion varchar(200) NOT NULL,
  Duracion int(11) NOT NULL,
  Dificultad varchar(20) NOT NULL,
  Precio decimal(10,2) NOT NULL,
  Ubicacion varchar(100) NOT NULL,
  CategoriaID int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE usuarios (
  UsuarioID int(11) NOT NULL,
  Nombre varchar(50) NOT NULL,
  email varchar(100) NOT NULL,
  contrasena varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--------------------------------------------------------------------------------------

ALTER TABLE categoriaTours
  ADD PRIMARY KEY (CategoriaID);

ALTER TABLE eventos
  ADD PRIMARY KEY (EventoID),
  ADD KEY TourID (TourID);

ALTER TABLE historial
  ADD PRIMARY KEY (HistorialID),
  ADD KEY ReservaID (ReservaID);

ALTER TABLE reservas
  ADD PRIMARY KEY (ReservaID),
  ADD KEY TourID (TourID),
  ADD KEY UsuarioID (UsuarioID);

ALTER TABLE tours
  ADD PRIMARY KEY (TourID),
  ADD KEY CategoriaID (CategoriaID);

ALTER TABLE usuarios
  ADD PRIMARY KEY (UsuarioID),
  
-------------------------------------------------------------------------------------

ALTER TABLE eventos
  ADD CONSTRAINT fk_eventos FOREIGN KEY (TourID) REFERENCES tours (TourID);

ALTER TABLE historial
  ADD CONSTRAINT fk_historial FOREIGN KEY (ReservaID) REFERENCES reservas (ReservaID);

ALTER TABLE reservas
  ADD CONSTRAINT fk1_reservas FOREIGN KEY (TourID) REFERENCES tours (TourID),
  ADD CONSTRAINT fk2_reservas FOREIGN KEY (UsuarioID) REFERENCES usuarios (UsuarioID);

ALTER TABLE tours
  ADD CONSTRAINT fk_tours FOREIGN KEY (CategoriaID) REFERENCES categoriaTours (CategoriaID);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


