#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Admin
#------------------------------------------------------------

CREATE TABLE Admin(
        id_admin Int  Auto_increment  NOT NULL ,
        prenom   Varchar (50) NOT NULL ,
        nom      Varchar (50) NOT NULL ,
        login    Varchar (50) NOT NULL ,
        password Varchar (50) NOT NULL ,
        avatar   Varchar (50) NOT NULL
	,CONSTRAINT Admin_PK PRIMARY KEY (id_admin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Question
#------------------------------------------------------------

CREATE TABLE Question(
        id_question Int  Auto_increment  NOT NULL ,
        question    Text NOT NULL ,
        score       Int NOT NULL ,
        type        Varchar (50) NOT NULL ,
        id_admin    Int NOT NULL
	,CONSTRAINT Question_PK PRIMARY KEY (id_question)

	,CONSTRAINT Question_Admin_FK FOREIGN KEY (id_admin) REFERENCES Admin(id_admin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Joueur
#------------------------------------------------------------

CREATE TABLE Joueur(
        id_joueur Int  Auto_increment  NOT NULL ,
        prenom    Varchar (50) NOT NULL ,
        nom       Varchar (50) NOT NULL ,
        login     Varchar (50) NOT NULL ,
        password  Varchar (50) NOT NULL ,
        avatar    Varchar (50) NOT NULL ,
        score     Int NOT NULL ,
        id_admin  Int
	,CONSTRAINT Joueur_PK PRIMARY KEY (id_joueur)

	,CONSTRAINT Joueur_Admin_FK FOREIGN KEY (id_admin) REFERENCES Admin(id_admin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Jouer
#------------------------------------------------------------

CREATE TABLE Jouer(
        id_question Int NOT NULL ,
        id_joueur   Int NOT NULL ,
        prenom      Varchar (50) NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        score       Int NOT NULL
	,CONSTRAINT Jouer_PK PRIMARY KEY (id_question,id_joueur)

	,CONSTRAINT Jouer_Question_FK FOREIGN KEY (id_question) REFERENCES Question(id_question)
	,CONSTRAINT Jouer_Joueur0_FK FOREIGN KEY (id_joueur) REFERENCES Joueur(id_joueur)
)ENGINE=InnoDB;

