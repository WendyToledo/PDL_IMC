drop table users ;
drop table imc ;
drop table bmr ;

CREATE TABLE users (
id SERIAL PRIMARY KEY,         -- Identifiant unique pour chaque utilisateur
    email VARCHAR(255) UNIQUE NOT NULL, -- Email de l'utilisateur, utilisé pour l'inscription et la connexion
    password_hash VARCHAR(255) NOT NULL, -- Le mot de passe haché pour la sécurité
    created_at TIMESTAMP DEFAULT NOW(),  -- Date de création du compte
    last_login TIMESTAMP                -- Dernière connexion de l'utilisateur
);


CREATE TABLE imc (
    id SERIAL PRIMARY KEY,               -- Identifiant unique pour chaque mesure
    user_id INT REFERENCES users(id),    -- Clé étrangère vers l'utilisateur
    weight DECIMAL(5, 2) NOT NULL,       -- Poids de l'utilisateur en kg
    height DECIMAL(4, 2) NOT NULL,       -- Taille de l'utilisateur en mètres
    calculated_imc DECIMAL(4, 2),        -- IMC calculé
    taken_at TIMESTAMP DEFAULT NOW()     -- Date et heure de la prise de mesure
);

CREATE TABLE bmr (
    id SERIAL PRIMARY KEY,               -- Identifiant unique pour chaque mesure
    user_id INT REFERENCES users(id),    -- Clé étrangère vers l'utilisateur
    weight DECIMAL(5, 2) NOT NULL,       -- Poids de l'utilisateur en kg
    height DECIMAL(4, 2) NOT NULL,       -- Taille de l'utilisateur en mètres
    age INT NOT NULL,					 -- Âge de l'utilisateur 
    gender VARCHAR(10) NOT NULL,		 -- Genre de l'utilisateur
    calculated_bmr DECIMAL(6, 2),        -- BMR calculé
    taken_at TIMESTAMP DEFAULT NOW()     -- Date et heure de la prise de mesure
);