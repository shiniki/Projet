-- Table: admin

-- DROP TABLE admin;

CREATE TABLE admin
(
  id_admin serial NOT NULL,
  login_admin text NOT NULL,
  mdp_admin text NOT NULL,
  CONSTRAINT pk_admin PRIMARY KEY (id_admin)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE admin
  OWNER TO postgres;

-- Table: commande

-- DROP TABLE commande;

CREATE TABLE commande
(
  id_commande integer NOT NULL DEFAULT nextval('commande_id_commande_seq'::regclass),
  pseudo_commande text NOT NULL,
  nom_animaux text NOT NULL,
  prix_unitaire numeric,
  sexe_animaux text,
  age_animaux numeric,
  CONSTRAINT pk_commande PRIMARY KEY (id_commande)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE commande
  OWNER TO postgres;


-- Table: commandeacc

-- DROP TABLE commandeacc;

CREATE TABLE commandeacc
(
  id_commandeacc integer NOT NULL DEFAULT nextval('commandeacc_id_commandeacc_seq'::regclass),
  pseudo_commande text NOT NULL,
  nom_accessoires text NOT NULL,
  prix_unitaire numeric,
  CONSTRAINT pk_commandeacc PRIMARY KEY (id_commandeacc)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE commandeacc
  OWNER TO postgres;


-- Table: contact

-- DROP TABLE contact;

CREATE TABLE contact
(
  id_contact integer NOT NULL DEFAULT nextval('contact_id_contact_seq'::regclass),
  pseudo_contact text NOT NULL,
  mdp_contact text NOT NULL,
  nom_contact text NOT NULL,
  prenom_contact text NOT NULL,
  adresse_contact text NOT NULL,
  ville_contact text NOT NULL,
  pays_contact text NOT NULL,
  CONSTRAINT pk_contact PRIMARY KEY (id_contact),
  CONSTRAINT unique_pseudo_contact UNIQUE (pseudo_contact)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE contact
  OWNER TO postgres;


-- Table: contact3

-- DROP TABLE contact3;

CREATE TABLE contact3
(
  id_contact3 integer NOT NULL DEFAULT nextval('contact3_id_contact3_seq'::regclass),
  mail_contact3 text NOT NULL,
  texte_contact3 text NOT NULL,
  CONSTRAINT pk_contact3 PRIMARY KEY (id_contact3)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE contact3
  OWNER TO postgres;



-- Table: gt_accessoires

-- DROP TABLE gt_accessoires;

CREATE TABLE gt_accessoires
(
  id_gt_accessoires integer NOT NULL DEFAULT nextval('gt_accessoires_id_gt_accessoires_seq'::regclass),
  id_gt_race_animaux integer NOT NULL,
  nom_accessoires text NOT NULL,
  image text,
  prix_unitaire numeric,
  CONSTRAINT pk_gt_accessoires PRIMARY KEY (id_gt_accessoires),
  CONSTRAINT fk_gt_accessoires_gt_race_animaux FOREIGN KEY (id_gt_race_animaux)
      REFERENCES gt_race_animaux (id_gt_race_animaux) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE gt_accessoires
  OWNER TO postgres;

-- Index: i_fk_gt_accessoires_gt_race_animaux

-- DROP INDEX i_fk_gt_accessoires_gt_race_animaux;

CREATE INDEX i_fk_gt_accessoires_gt_race_animaux
  ON gt_accessoires
  USING btree
  (id_gt_race_animaux);



-- Table: gt_animaux

-- DROP TABLE gt_animaux;

CREATE TABLE gt_animaux
(
  id_gt_animaux integer NOT NULL DEFAULT nextval('gt_animaux_id_gt_animaux_seq'::regclass),
  id_gt_race_animaux integer NOT NULL,
  nom_animaux text NOT NULL,
  image text,
  prix_unitaire numeric,
  sexe_animaux text,
  age_animaux numeric,
  CONSTRAINT pk_gt_animaux PRIMARY KEY (id_gt_animaux),
  CONSTRAINT fk_gt_animaux_gt_race_animaux FOREIGN KEY (id_gt_race_animaux)
      REFERENCES gt_race_animaux (id_gt_race_animaux) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE gt_animaux
  OWNER TO postgres;

-- Index: i_fk_gt_animaux_gt_race_animaux

-- DROP INDEX i_fk_gt_animaux_gt_race_animaux;

CREATE INDEX i_fk_gt_animaux_gt_race_animaux
  ON gt_animaux
  USING btree
  (id_gt_race_animaux);


-- Table: gt_race_animaux

-- DROP TABLE gt_race_animaux;

CREATE TABLE gt_race_animaux
(
  id_gt_race_animaux serial NOT NULL,
  race_animaux text NOT NULL,
  CONSTRAINT pk_gt_race_animaux PRIMARY KEY (id_gt_race_animaux)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE gt_race_animaux
  OWNER TO postgres;


-- Table: gt_texte

-- DROP TABLE gt_texte;

CREATE TABLE gt_texte
(
  id_gt_texte serial NOT NULL,
  texte text NOT NULL,
  page text,
  langue text NOT NULL,
  CONSTRAINT pk_gt_texte PRIMARY KEY (id_gt_texte)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE gt_texte
  OWNER TO postgres;


-- Sequence: admin_id_admin_seq

-- DROP SEQUENCE admin_id_admin_seq;

CREATE SEQUENCE admin_id_admin_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE admin_id_admin_seq
  OWNER TO postgres;



-- Sequence: commande_id_commande_seq

-- DROP SEQUENCE commande_id_commande_seq;

CREATE SEQUENCE commande_id_commande_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 6
  CACHE 1;
ALTER TABLE commande_id_commande_seq
  OWNER TO postgres;


-- Sequence: commandeacc_id_commandeacc_seq

-- DROP SEQUENCE commandeacc_id_commandeacc_seq;

CREATE SEQUENCE commandeacc_id_commandeacc_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 3
  CACHE 1;
ALTER TABLE commandeacc_id_commandeacc_seq
  OWNER TO postgres;



-- Sequence: contact3_id_contact3_seq

-- DROP SEQUENCE contact3_id_contact3_seq;

CREATE SEQUENCE contact3_id_contact3_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 6
  CACHE 1;
ALTER TABLE contact3_id_contact3_seq
  OWNER TO postgres;



-- Sequence: contact_id_contact_seq

-- DROP SEQUENCE contact_id_contact_seq;

CREATE SEQUENCE contact_id_contact_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 50
  CACHE 1;
ALTER TABLE contact_id_contact_seq
  OWNER TO postgres;


-- Sequence: gt_accessoires_id_gt_accessoires_seq

-- DROP SEQUENCE gt_accessoires_id_gt_accessoires_seq;

CREATE SEQUENCE gt_accessoires_id_gt_accessoires_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 8
  CACHE 1;
ALTER TABLE gt_accessoires_id_gt_accessoires_seq
  OWNER TO postgres;



-- Sequence: gt_animaux_id_gt_animaux_seq

-- DROP SEQUENCE gt_animaux_id_gt_animaux_seq;

CREATE SEQUENCE gt_animaux_id_gt_animaux_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 8
  CACHE 1;
ALTER TABLE gt_animaux_id_gt_animaux_seq
  OWNER TO postgres;


-- Sequence: gt_race_animaux_id_gt_race_animaux_seq

-- DROP SEQUENCE gt_race_animaux_id_gt_race_animaux_seq;

CREATE SEQUENCE gt_race_animaux_id_gt_race_animaux_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE gt_race_animaux_id_gt_race_animaux_seq
  OWNER TO postgres;



-- Sequence: gt_texte_id_gt_texte_seq

-- DROP SEQUENCE gt_texte_id_gt_texte_seq;

CREATE SEQUENCE gt_texte_id_gt_texte_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE gt_texte_id_gt_texte_seq
  OWNER TO postgres;


-- View: vue_accessoires

-- DROP VIEW vue_accessoires;

CREATE OR REPLACE VIEW vue_accessoires AS 
 SELECT gt_race_animaux.id_gt_race_animaux,
    gt_race_animaux.race_animaux,
    gt_accessoires.id_gt_accessoires,
    gt_accessoires.nom_accessoires,
    gt_accessoires.image,
    gt_accessoires.prix_unitaire
   FROM gt_accessoires,
    gt_race_animaux
  WHERE gt_accessoires.id_gt_race_animaux = gt_race_animaux.id_gt_race_animaux;

ALTER TABLE vue_accessoires
  OWNER TO postgres;


-- View: vue_animaux

-- DROP VIEW vue_animaux;

CREATE OR REPLACE VIEW vue_animaux AS 
 SELECT gt_race_animaux.id_gt_race_animaux,
    gt_race_animaux.race_animaux,
    gt_animaux.id_gt_animaux,
    gt_animaux.nom_animaux,
    gt_animaux.image,
    gt_animaux.prix_unitaire,
    gt_animaux.sexe_animaux,
    gt_animaux.age_animaux
   FROM gt_animaux,
    gt_race_animaux
  WHERE gt_animaux.id_gt_race_animaux = gt_race_animaux.id_gt_race_animaux;

ALTER TABLE vue_animaux
  OWNER TO postgres;

