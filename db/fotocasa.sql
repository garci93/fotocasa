DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE usuarios
(
    id       BIGSERIAL    PRIMARY KEY
  , nombre   VARCHAR(255) NOT NULL UNIQUE
  , telefono VARCHAR(255) NOT NULL
  , email    VARCHAR(255) NOT NULL
  , password VARCHAR(60)  NOT NULL
);

DROP TABLE IF EXISTS viviendas CASCADE;

CREATE TABLE viviendas
(
    id               BIGSERIAL     PRIMARY KEY
  , propietario_id   BIGINT        NOT NULL REFERENCES usuarios (id)
  , direccion        VARCHAR(255)  NOT NULL
  , localidad        VARCHAR(255)  NOT NULL
  , precio           NUMERIC(10,2) NOT NULL
  , num_habitaciones INT
  , area             NUMERIC(6,2)
);

INSERT INTO usuarios (nombre, telefono, email, password)
VALUES ('pepe', '655555555', 'pepe@gmail.com', crypt('pepe', gen_salt('bf', 10)))
     , ('juan', '633333333', 'juan@gmail.com', crypt('juan', gen_salt('bf', 10)));

INSERT INTO viviendas (propietario_id, direccion, localidad, precio, num_habitaciones, area)
VALUES (1, 'C/ Desengaño, Bloq. 21, 1º B', 'Madrid', 1200, 1, 100)
     , (1, 'C/ San Francisco, Bloq. 66, 2º H', 'Sanlúcar de Barrameda', 3100, 3, 130)
     , (2, 'Urb. Las Antillas, 57', 'Hospitalet de Llobregat', 12600, 5, 420);
