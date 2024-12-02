#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Products
#------------------------------------------------------------

CREATE TABLE Products(
        id_Produit   Varchar (100) NOT NULL ,
        prix_Produit Float NOT NULL ,
        visible      Bool NOT NULL ,
        prise        Bool NOT NULL
	,CONSTRAINT Products_PK PRIMARY KEY (id_Produit)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: logements
#------------------------------------------------------------

CREATE TABLE logements(
        id_Logement  Varchar (50) NOT NULL ,
        nb_Lit       Int NOT NULL
	,CONSTRAINT logements_PK PRIMARY KEY (id_Logement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Prises
#------------------------------------------------------------

CREATE TABLE Prises(
        id_Prise     Varchar (50) NOT NULL ,
        id_Logement  Varchar (50) NOT NULL
	,CONSTRAINT Prises_PK PRIMARY KEY (id_Prise)

	,CONSTRAINT Prises_logements_FK FOREIGN KEY (id_Logement) REFERENCES logements(id_Logement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: payment_methods
#------------------------------------------------------------

CREATE TABLE payment_methods(
        id_Paiement  Varchar (50) NOT NULL ,
        payment_type Varchar (50) NOT NULL
	,CONSTRAINT payment_methods_PK PRIMARY KEY (id_Paiement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Roles
#------------------------------------------------------------

CREATE TABLE Roles(
        id_role Int NOT NULL ,
        label   Varchar (255) NOT NULL
	,CONSTRAINT Roles_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_utilisateur    Int NOT NULL ,
        nom               Varchar (50) NOT NULL ,
        prenom            Varchar (50) NOT NULL ,
        email             Varchar (100) NOT NULL ,
        password          Varchar (255) NOT NULL ,
        email_verified_at TimeStamp NOT NULL ,
        remember_token    Varchar (100) NOT NULL ,
        created_at        TimeStamp NOT NULL ,
        updated_at        TimeStamp NOT NULL ,
        id_role           Int NOT NULL ,
        id_Logement       Varchar (50)
	,CONSTRAINT users_PK PRIMARY KEY (id_utilisateur)

	,CONSTRAINT users_Roles_FK FOREIGN KEY (id_role) REFERENCES Roles(id_role)
	,CONSTRAINT users_logements0_FK FOREIGN KEY (id_Logement) REFERENCES logements(id_Logement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: status
#------------------------------------------------------------

CREATE TABLE status(
        id_Status        Varchar (50) NOT NULL ,
        demance_Valider  Bool NOT NULL ,
        demand_en_cours  Bool NOT NULL ,
        demande_Terminer Bool NOT NULL ,
        label            Varchar (50) NOT NULL
	,CONSTRAINT status_PK PRIMARY KEY (id_Status)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: orders
#------------------------------------------------------------

CREATE TABLE orders(
        id_Commande        Int NOT NULL ,
        date_Commande      Date NOT NULL ,
        date_Paiement      Date NOT NULL ,
        date_Livraison     Date NOT NULL ,
        id_Connexion       Varchar (100) NOT NULL ,
        password_Connexion Varchar (255) NOT NULL ,
        id_Status          Varchar (50) NOT NULL ,
        id_Paiement        Varchar (50) ,
        id_utilisateur     Int NOT NULL ,
        id_Prise           Varchar (50)
	,CONSTRAINT orders_PK PRIMARY KEY (id_Commande)

	,CONSTRAINT orders_status_FK FOREIGN KEY (id_Status) REFERENCES status(id_Status)
	,CONSTRAINT orders_payment_methods0_FK FOREIGN KEY (id_Paiement) REFERENCES payment_methods(id_Paiement)
	,CONSTRAINT orders_users1_FK FOREIGN KEY (id_utilisateur) REFERENCES users(id_utilisateur)
	,CONSTRAINT orders_Prises2_FK FOREIGN KEY (id_Prise) REFERENCES Prises(id_Prise)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contenir
#------------------------------------------------------------

CREATE TABLE Contenir(
        id_Produit   Varchar (100) NOT NULL ,
        id_Commande  Int NOT NULL ,
        prix_Produit Float NOT NULL ,
        nom_Produit  Char (100) NOT NULL
	,CONSTRAINT Contenir_PK PRIMARY KEY (id_Produit,id_Commande)

	,CONSTRAINT Contenir_Products_FK FOREIGN KEY (id_Produit) REFERENCES Products(id_Produit)
	,CONSTRAINT Contenir_orders0_FK FOREIGN KEY (id_Commande) REFERENCES orders(id_Commande)
)ENGINE=InnoDB;

