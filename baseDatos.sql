-- Crear tabla de usuarios
CREATE TABLE Usuario (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Contraseña VARCHAR(255) NOT NULL
);

-- Crear tabla de roles
CREATE TABLE Rol (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Rol VARCHAR(50) NOT NULL
);

-- Tabla intermedia Usuario-Rol (relación muchos a muchos)
CREATE TABLE UsuarioRol (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Id_Usuario INT NOT NULL,
    Id_Rol INT NOT NULL,
    FOREIGN KEY (Id_Usuario) REFERENCES Usuario(Id),
    FOREIGN KEY (Id_Rol) REFERENCES Rol(Id)
);

-- Crear tabla de entradas
CREATE TABLE Entrada (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Fecha_Creacion DATE NOT NULL,
    Texto TEXT NOT NULL
);

-- Tabla intermedia Entrada-Usuario (relación muchos a muchos)
CREATE TABLE EntradaUsuario (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Id_Usuario INT NOT NULL,
    Id_Entrada INT NOT NULL,
    FOREIGN KEY (Id_Usuario) REFERENCES Usuario(Id),
    FOREIGN KEY (Id_Entrada) REFERENCES Entrada(Id)
);

-- Tabla de favoritos (relación 1:N desde Usuario)
CREATE TABLE Favoritos (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Id_Usuario INT NOT NULL,
    Id_Carta INT NOT NULL,
    Coleccion VARCHAR(100),
    FOREIGN KEY (Id_Usuario) REFERENCES Usuario(Id)
);
