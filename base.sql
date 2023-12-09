-- Création de la table Planètes

CREATE TABLE
    Planetes (
        id_planete INT AUTO_INCREMENT PRIMARY KEY,
        nom_planete VARCHAR(100),
        circonférence_km DECIMAL(10, 2),
        distance_terre_km DECIMAL(10, 2),
        documentation TEXT
    );

-- Création de la table Astronautes

CREATE TABLE
    Astronautes (
        id_astronaute INT AUTO_INCREMENT PRIMARY KEY,
        nom_astronaute VARCHAR(100),
        etat_sante ENUM('Bon', 'malade', 'décédé'),
        taille INT,
        poids INT
    );

-- Création de la table Vaisseaux

CREATE TABLE
    Vaisseaux (
        id_vaisseau INT AUTO_INCREMENT PRIMARY KEY,
        nom_vaisseau VARCHAR(100),
        capacite INT
    );

-- Création de la table Missions

CREATE TABLE
    Missions (
        id_mission INT AUTO_INCREMENT PRIMARY KEY,
        nom_mission VARCHAR(100),
        id_vaisseau INT,
        date_debut DATE,
        date_fin DATE,
        status ENUM(
            'en préparation',
            'en cours',
            'terminée',
            'abandonnée'
        ),
        FOREIGN KEY (id_vaisseau) REFERENCES Vaisseaux(id_vaisseau)
    );

-- Création de la table de liaison Assignation_Mission_Astronaute

CREATE TABLE
    Assignation_Mission_Astronaute (
        id_assignation INT AUTO_INCREMENT,
        id_mission INT,
        id_astronaute INT,
        PRIMARY KEY (
            id_assignation,
            id_mission,
            id_astronaute
        ),
        FOREIGN KEY (id_mission) REFERENCES Missions(id_mission),
        FOREIGN KEY (id_astronaute) REFERENCES Astronautes(id_astronaute)
    );