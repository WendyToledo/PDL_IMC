drop table users ;
drop table measurements ;

CREATE TABLE users (
id SERIAL PRIMARY KEY,         -- Identifiant unique pour chaque utilisateur
    email VARCHAR(255) UNIQUE NOT NULL, -- Email de l'utilisateur, utilisé pour l'inscription et la connexion
    password_hash VARCHAR(255) NOT NULL, -- Le mot de passe haché pour la sécurité
    created_at TIMESTAMP DEFAULT NOW(),  -- Date de création du compte
    last_login TIMESTAMP                -- Dernière connexion de l'utilisateur
);


CREATE TABLE measurements (
    id SERIAL PRIMARY KEY,               -- Identifiant unique pour chaque mesure
    user_id INT REFERENCES users(id),    -- Clé étrangère vers l'utilisateur
    weight DECIMAL(5, 2) NOT NULL,       -- Poids de l'utilisateur en kg
    height DECIMAL(4, 2) NOT NULL,       -- Taille de l'utilisateur en mètres
    calculated_imc DECIMAL(4, 2),        -- IMC calculé
    taken_at TIMESTAMP DEFAULT NOW()     -- Date et heure de la prise de mesure
);
