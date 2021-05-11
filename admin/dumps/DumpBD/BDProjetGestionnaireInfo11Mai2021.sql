--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.20
-- Dumped by pg_dump version 13.2

-- Started on 2021-05-11 14:47:35

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA public;


--
-- TOC entry 2220 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 215 (class 1255 OID 113734)
-- Name: ajout_admin(text, text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.ajout_admin(text, text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_login alias for $1;
	declare f_password alias for $2;
	declare f_reference alias for $3;
	declare retour integer;
	declare id integer;

	begin
		select into id id_admin from pgi_admins where login = f_login and reference = f_reference ;
		if not found 
		then
			insert into pgi_admins (login,password,reference) values (f_login,f_password,f_reference);
			retour = 1;
		else
			retour = 0;
		end if;
		return retour;
	end
';


--
-- TOC entry 216 (class 1255 OID 113732)
-- Name: ajout_cat(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.ajout_cat(text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_nom_cat alias for $1;
	declare f_reference alias for $2;
	declare retour integer;
	declare id integer;

	begin
		select into id id_cat from pgi_categories where nom_cat = f_nom_cat and reference = f_reference ;
		if not found 
		then
			insert into pgi_categories (nom_cat,reference) values (f_nom_cat,f_reference);
			retour = 1;
		else
			retour = 0;
		end if;
		return retour;
	end
';


--
-- TOC entry 198 (class 1255 OID 113733)
-- Name: ajout_const(text, text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.ajout_const(text, text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_nom_const alias for $1;
	declare f_pays alias for $2;
	declare f_reference alias for $3;
	declare retour integer;
	declare id integer;

	begin
		select into id id_const from pgi_constructeurs where nom_const = f_nom_const and reference = f_reference ;
		if not found 
		then
			insert into pgi_constructeurs (nom_const,pays,reference) values (f_nom_const,f_pays,f_reference);
			retour = 1;
		else
			retour = 0;
		end if;
		return retour;
	end
';


--
-- TOC entry 217 (class 1255 OID 113735)
-- Name: ajout_produit(text, real, integer, integer, integer, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.ajout_produit(text, real, integer, integer, integer, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_nom_prod alias for $1;
	declare f_prix alias for $2;
	declare f_annee_prod alias for $3;
	declare f_id_const alias for $4;
	declare f_id_cat alias for $5;
	declare f_reference alias for $6;
	declare retour integer;
	declare id integer;

	begin
		select into id id_prod from pgi_produits where nom_prod = f_nom_prod and reference = f_reference ;
		if not found 
		then
			insert into pgi_produits (nom_prod,prix,annee_prod,id_const,id_cat,reference) values (f_nom_prod,f_prix,f_annee_prod,f_id_const,f_id_cat,f_reference);
			retour = 1;
		else
			retour = 0;
		end if;
		return retour;
	end
';


--
-- TOC entry 218 (class 1255 OID 113736)
-- Name: ajout_utili(text, text, text, text, text, integer, text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.ajout_utili(text, text, text, text, text, integer, text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_nom_utili alias for $1;
	declare f_prenom alias for $2;
	declare f_login alias for $3;
	declare f_password alias for $4;
	declare f_rue alias for $5;
	declare f_num alias for $6;
	declare f_pays alias for $7;
	declare f_ville alias for $8;
	declare retour integer;
	declare id integer;

	begin
		select into id id_utili from pgi_utilisateurs where login = f_login;
		if not found 
		then
			insert into pgi_utilisateurs (nom_utili,prenom,login,password,rue,num,pays,ville) values (f_nom_utili,f_prenom,f_login,f_password,f_rue,f_num,f_pays,f_ville);
			retour = 1;
		else
			retour = 0;
		end if;
		return retour;
	end
';


--
-- TOC entry 196 (class 1255 OID 113105)
-- Name: is_admin(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.is_admin(text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_login alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;	
begin
	select into id id_admin from pgi_admins where login = f_login and password = f_password;
	if not found
	then
		retour = 0;
	else
		retour = 1;
	end if;
	return retour;
end;
';


--
-- TOC entry 199 (class 1255 OID 113678)
-- Name: is_uti(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.is_uti(text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_login alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;	
begin
	select into id id_utili from pgi_utilisateurs where login = f_login and password = f_password;
	if not found
	then
		retour = 0;
	else
		retour = 1;
	end if;
	return retour;
end;
';


--
-- TOC entry 219 (class 1255 OID 113737)
-- Name: modif_admin(integer, text, text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.modif_admin(integer, text, text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare 
	  f_id_admin alias for $1;
	  f_login alias for $2;
	  f_password alias for $3;
	  f_reference alias for $4;
	  id integer;
	  
	begin
	  select into id id_admin from pgi_admins where id_admin=f_id_admin;
	  if not found
	  then
		return 0;
	  else
		update pgi_admins set login=f_login, password=f_password, reference=f_reference where id_admin=id;
		return 1;
	  end if;
	end;
';


--
-- TOC entry 220 (class 1255 OID 113740)
-- Name: modif_produit(integer, text, real, integer, integer, integer, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.modif_produit(integer, text, real, integer, integer, integer, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare 
	  f_id_prod alias for $1;
	  f_nom_prod alias for $2;
	  f_prix alias for $3;
	  f_annee_prod alias for $4;
	  f_id_const alias for $5;
	  f_id_cat alias for $6;
	  f_reference alias for $7;
	  id integer;
	  
	begin
	  select into id id_prod from pgi_produits where id_prod=f_id_prod;
	  if not found
	  then
		return 0;
	  else
		update pgi_produits set nom_prod=f_nom_prod, prix=f_prix,annee_prod=f_annee_prod,id_const=f_id_const,id_cat=f_id_cat, reference=f_reference where id_prod=id;
		return 1;
	  end if;
	end;
';


--
-- TOC entry 221 (class 1255 OID 113742)
-- Name: modif_utili(integer, text, text, text, text, text, integer, text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.modif_utili(integer, text, text, text, text, text, integer, text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare 
	  f_id_utili alias for $1;
	  f_nom_utili alias for $2;
	  f_prenom alias for $3;
	  f_login alias for $4;
	  f_password alias for $5;
	  f_rue alias for $6;
	  f_num alias for $7;
	  f_pays alias for $8;
	  f_ville alias for $9;
	  id integer;
	  
	begin
	  select into id id_utili from pgi_utilisateurs where id_utili=f_id_utili;
	  if not found
	  then
		return 0;
	  else
		update pgi_utilisateurs set nom_utili=f_nom_utili, prenom=f_prenom,login=f_login,password=f_password,rue=f_rue, num=f_num, pays=f_pays, ville=f_ville where id_utili=id;
		return 1;
	  end if;
	end;
';


--
-- TOC entry 201 (class 1255 OID 113698)
-- Name: supp_admin(integer); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.supp_admin(integer) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare 
	  f_id_admin alias for $1;
	  id integer;
	  
	begin
	  select into id id_admin from pgi_admins where id_admin=f_id_admin;
	  if not found
	  then
		return 0;
	  else
		delete from pgi_admins where id_admin = f_id_admin;
		return 1;
	  end if;
	end;
';


--
-- TOC entry 200 (class 1255 OID 113634)
-- Name: supp_cat(integer); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.supp_cat(integer) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare 
	  f_id_cat alias for $1;
	  id integer;
	  
	begin
	  select into id id_cat from pgi_categories where id_cat=f_id_cat;
	  if not found
	  then
		return 0;
	  else
		delete from pgi_categories where id_cat = f_id_cat;
		return 1;
	  end if;
	end;
';


--
-- TOC entry 214 (class 1255 OID 113699)
-- Name: supp_produit(integer); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.supp_produit(integer) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare 
	  f_id_prod alias for $1;
	  id integer;
	  
	begin
	  select into id id_prod from pgi_produits where id_prod=f_id_prod;
	  if not found
	  then
		return 0;
	  else
		delete from pgi_produits where id_prod = f_id_prod;
		return 1;
	  end if;
	end;
';


--
-- TOC entry 197 (class 1255 OID 113700)
-- Name: supp_utilisateur(integer); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.supp_utilisateur(integer) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare 
	  f_id_utili alias for $1;
	  id integer;
	  
	begin
	  select into id id_utili from pgi_utilisateurs where id_utili=f_id_utili;
	  if not found
	  then
		return 0;
	  else
		delete from pgi_utilisateurs where id_utili = f_id_utili;
		return 1;
	  end if;
	end;
';


SET default_tablespace = '';

--
-- TOC entry 186 (class 1259 OID 112579)
-- Name: pgi_admins; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.pgi_admins (
    id_admin integer NOT NULL,
    login text,
    password text,
    reference text
);


--
-- TOC entry 185 (class 1259 OID 112577)
-- Name: pgi_admins_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.pgi_admins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2221 (class 0 OID 0)
-- Dependencies: 185
-- Name: pgi_admins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.pgi_admins_id_seq OWNED BY public.pgi_admins.id_admin;


--
-- TOC entry 190 (class 1259 OID 112601)
-- Name: pgi_categories; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.pgi_categories (
    id_cat integer NOT NULL,
    nom_cat text,
    reference text
);


--
-- TOC entry 189 (class 1259 OID 112599)
-- Name: pgi_categories_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.pgi_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2222 (class 0 OID 0)
-- Dependencies: 189
-- Name: pgi_categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.pgi_categories_id_seq OWNED BY public.pgi_categories.id_cat;


--
-- TOC entry 192 (class 1259 OID 112617)
-- Name: pgi_constructeurs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.pgi_constructeurs (
    id_const integer NOT NULL,
    nom_const text,
    pays text,
    reference text
);


--
-- TOC entry 191 (class 1259 OID 112615)
-- Name: pgi_constructeurs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.pgi_constructeurs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2223 (class 0 OID 0)
-- Dependencies: 191
-- Name: pgi_constructeurs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.pgi_constructeurs_id_seq OWNED BY public.pgi_constructeurs.id_const;


--
-- TOC entry 194 (class 1259 OID 112629)
-- Name: pgi_produits; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.pgi_produits (
    id_prod integer NOT NULL,
    nom_prod text,
    prix real,
    annee_prod integer,
    id_const integer,
    id_cat integer,
    reference text
);


--
-- TOC entry 193 (class 1259 OID 112627)
-- Name: pgi_produits_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.pgi_produits_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2224 (class 0 OID 0)
-- Dependencies: 193
-- Name: pgi_produits_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.pgi_produits_id_seq OWNED BY public.pgi_produits.id_prod;


--
-- TOC entry 188 (class 1259 OID 112590)
-- Name: pgi_utilisateurs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.pgi_utilisateurs (
    id_utili integer NOT NULL,
    nom_utili text,
    prenom text,
    login text,
    password text,
    rue text,
    num integer,
    pays text,
    ville text
);


--
-- TOC entry 187 (class 1259 OID 112588)
-- Name: pgi_utilisateurs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.pgi_utilisateurs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2225 (class 0 OID 0)
-- Dependencies: 187
-- Name: pgi_utilisateurs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.pgi_utilisateurs_id_seq OWNED BY public.pgi_utilisateurs.id_utili;


--
-- TOC entry 195 (class 1259 OID 113195)
-- Name: vue_produits_const_cat; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_produits_const_cat AS
 SELECT pgi_produits.id_prod,
    pgi_produits.nom_prod,
    pgi_produits.prix,
    pgi_produits.annee_prod,
    pgi_constructeurs.nom_const,
    pgi_categories.nom_cat,
    pgi_produits.reference
   FROM public.pgi_produits,
    public.pgi_constructeurs,
    public.pgi_categories
  WHERE ((pgi_produits.id_const = pgi_constructeurs.id_const) AND (pgi_produits.id_cat = pgi_categories.id_cat));


--
-- TOC entry 2052 (class 2604 OID 112582)
-- Name: pgi_admins id_admin; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_admins ALTER COLUMN id_admin SET DEFAULT nextval('public.pgi_admins_id_seq'::regclass);


--
-- TOC entry 2054 (class 2604 OID 112604)
-- Name: pgi_categories id_cat; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_categories ALTER COLUMN id_cat SET DEFAULT nextval('public.pgi_categories_id_seq'::regclass);


--
-- TOC entry 2055 (class 2604 OID 112620)
-- Name: pgi_constructeurs id_const; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_constructeurs ALTER COLUMN id_const SET DEFAULT nextval('public.pgi_constructeurs_id_seq'::regclass);


--
-- TOC entry 2056 (class 2604 OID 112632)
-- Name: pgi_produits id_prod; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_produits ALTER COLUMN id_prod SET DEFAULT nextval('public.pgi_produits_id_seq'::regclass);


--
-- TOC entry 2053 (class 2604 OID 112593)
-- Name: pgi_utilisateurs id_utili; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_utilisateurs ALTER COLUMN id_utili SET DEFAULT nextval('public.pgi_utilisateurs_id_seq'::regclass);


--
-- TOC entry 2206 (class 0 OID 112579)
-- Dependencies: 186
-- Data for Name: pgi_admins; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.pgi_admins (id_admin, login, password, reference) VALUES (1, 'Maelx249', 'Condorcet', '1');
INSERT INTO public.pgi_admins (id_admin, login, password, reference) VALUES (4, 'PLP1999', 'DiabloX9', '4');
INSERT INTO public.pgi_admins (id_admin, login, password, reference) VALUES (2, 'admin', 'admin', '2');
INSERT INTO public.pgi_admins (id_admin, login, password, reference) VALUES (7, 'ManuALaBasse', 'ManuLeBG', '5');


--
-- TOC entry 2210 (class 0 OID 112601)
-- Dependencies: 190
-- Data for Name: pgi_categories; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (2, 'Carte Graphique', '2');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (3, 'Mémoire Vive', '3');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (4, 'Stockage', '4');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (5, 'Console', '5');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (8, 'Souris', '8');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (9, 'Casque Audio', '9');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (10, 'Haut-parleur', '10');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (11, 'Boitier', '11');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (12, 'Processeur', '12');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (1, 'Ecran', '1');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (6, 'Clavier', '6');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (7, 'Ecouteurs', '7');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (16, 'Smartphone', '14');
INSERT INTO public.pgi_categories (id_cat, nom_cat, reference) VALUES (13, 'Clé WIFI', '13');


--
-- TOC entry 2212 (class 0 OID 112617)
-- Dependencies: 192
-- Data for Name: pgi_constructeurs; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (1, 'Asus', 'Taïwan', '1');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (2, 'Acer', 'Taïwan', '2');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (3, 'Corsair', 'USA', '3');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (4, 'JBL', 'USA', '4');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (5, 'Nvidia', 'USA', '5');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (6, 'Logitech', 'Suisse', '6');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (7, 'Razer', 'USA', '7');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (8, 'Steelseries', 'Danemark', '8');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (9, 'Alienware', 'USA', '9');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (10, 'AMD', 'USA', '10');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (12, 'DELL', 'USA', '12');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (13, 'HP', 'USA', '13');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (14, 'Lenovo', 'Chine', '14');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (11, 'Intel', 'USA', '11');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (15, 'Samsung', 'Corée du Sud', '15');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (16, 'Cooler Master', 'Taïwan', '16');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (17, 'Gigabyte', 'Taïwan', '17');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (20, 'Zalman', 'Corrée du Sud', '18');
INSERT INTO public.pgi_constructeurs (id_const, nom_const, pays, reference) VALUES (21, 'Be Quiet', 'Allemagne', '19');


--
-- TOC entry 2214 (class 0 OID 112629)
-- Dependencies: 194
-- Data for Name: pgi_produits; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.pgi_produits (id_prod, nom_prod, prix, annee_prod, id_const, id_cat, reference) VALUES (5, 'G502', 50.2299995, 2014, 6, 8, '3');
INSERT INTO public.pgi_produits (id_prod, nom_prod, prix, annee_prod, id_const, id_cat, reference) VALUES (8, 'G302', 10.1499996, 2017, 6, 8, '4');
INSERT INTO public.pgi_produits (id_prod, nom_prod, prix, annee_prod, id_const, id_cat, reference) VALUES (1, 'K55', 35.2299995, 2017, 3, 6, '1');
INSERT INTO public.pgi_produits (id_prod, nom_prod, prix, annee_prod, id_const, id_cat, reference) VALUES (9, 'G912', 75.2300034, 2012, 6, 6, '5');
INSERT INTO public.pgi_produits (id_prod, nom_prod, prix, annee_prod, id_const, id_cat, reference) VALUES (2, 'JBL Flip 4', 99.9899979, 2017, 4, 10, '2');


--
-- TOC entry 2208 (class 0 OID 112590)
-- Dependencies: 188
-- Data for Name: pgi_utilisateurs; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.pgi_utilisateurs (id_utili, nom_utili, prenom, login, password, rue, num, pays, ville) VALUES (15, 'Gillerot', 'Emmanuel', 'Manu45', '4545', 'Chemin de Feluy', 120, 'Belgique', 'Braine-le-Comte');
INSERT INTO public.pgi_utilisateurs (id_utili, nom_utili, prenom, login, password, rue, num, pays, ville) VALUES (16, 'Gillerot', 'Ugo', 'Kenny_Zombie', 'MDRRR', 'Chemin de Feluy', 142, 'Belgique', 'Braine-le-Comte');
INSERT INTO public.pgi_utilisateurs (id_utili, nom_utili, prenom, login, password, rue, num, pays, ville) VALUES (17, 'Gillerot', 'Alice', 'Treza', 'treza22', 'Chemin de Feluy', 142, 'Belgique', 'Braine-le-Comte');
INSERT INTO public.pgi_utilisateurs (id_utili, nom_utili, prenom, login, password, rue, num, pays, ville) VALUES (1, 'Meurant', 'Melvyn', 'Maelx249', 'Condorcet', 'Chaussée du Roeulx', 104, 'Belgique', 'Soignies');
INSERT INTO public.pgi_utilisateurs (id_utili, nom_utili, prenom, login, password, rue, num, pays, ville) VALUES (2, 'Poliart', 'Pierre-Louis', 'plp1999', 'Diablox9', 'Rue de Cognebeau', 12, 'Belgique', 'Soignies');
INSERT INTO public.pgi_utilisateurs (id_utili, nom_utili, prenom, login, password, rue, num, pays, ville) VALUES (3, 'Verly', 'Kévin', 'dazazd', 'dadza', 'Chemin du Cornet', 11, 'Belgique', 'Soignies');
INSERT INTO public.pgi_utilisateurs (id_utili, nom_utili, prenom, login, password, rue, num, pays, ville) VALUES (4, 'Lorfevre', 'Victor', 'Victorlebogosse', 'lebgdu29', 'Chemin de la cavée', 25, 'Belgique', 'Ath');


--
-- TOC entry 2226 (class 0 OID 0)
-- Dependencies: 185
-- Name: pgi_admins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pgi_admins_id_seq', 7, true);


--
-- TOC entry 2227 (class 0 OID 0)
-- Dependencies: 189
-- Name: pgi_categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pgi_categories_id_seq', 16, true);


--
-- TOC entry 2228 (class 0 OID 0)
-- Dependencies: 191
-- Name: pgi_constructeurs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pgi_constructeurs_id_seq', 21, true);


--
-- TOC entry 2229 (class 0 OID 0)
-- Dependencies: 193
-- Name: pgi_produits_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pgi_produits_id_seq', 14, true);


--
-- TOC entry 2230 (class 0 OID 0)
-- Dependencies: 187
-- Name: pgi_utilisateurs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pgi_utilisateurs_id_seq', 17, true);


--
-- TOC entry 2058 (class 2606 OID 113689)
-- Name: pgi_admins pgi_admin_login_uq; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_admins
    ADD CONSTRAINT pgi_admin_login_uq UNIQUE (login);


--
-- TOC entry 2060 (class 2606 OID 112587)
-- Name: pgi_admins pgi_admins_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_admins
    ADD CONSTRAINT pgi_admins_pkey PRIMARY KEY (id_admin);


--
-- TOC entry 2068 (class 2606 OID 112606)
-- Name: pgi_categories pgi_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_categories
    ADD CONSTRAINT pgi_categories_pkey PRIMARY KEY (id_cat);


--
-- TOC entry 2074 (class 2606 OID 113695)
-- Name: pgi_constructeurs pgi_const_ref_uq; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_constructeurs
    ADD CONSTRAINT pgi_const_ref_uq UNIQUE (reference);


--
-- TOC entry 2076 (class 2606 OID 112622)
-- Name: pgi_constructeurs pgi_constructeurs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_constructeurs
    ADD CONSTRAINT pgi_constructeurs_pkey PRIMARY KEY (id_const);


--
-- TOC entry 2080 (class 2606 OID 112634)
-- Name: pgi_produits pgi_produits_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_produits
    ADD CONSTRAINT pgi_produits_pkey PRIMARY KEY (id_prod);


--
-- TOC entry 2062 (class 2606 OID 113691)
-- Name: pgi_admins pgi_ref_admin_uq; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_admins
    ADD CONSTRAINT pgi_ref_admin_uq UNIQUE (reference);


--
-- TOC entry 2070 (class 2606 OID 113693)
-- Name: pgi_categories pgi_ref_cat_uq; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_categories
    ADD CONSTRAINT pgi_ref_cat_uq UNIQUE (reference);


--
-- TOC entry 2078 (class 2606 OID 113178)
-- Name: pgi_constructeurs pgi_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_constructeurs
    ADD CONSTRAINT pgi_unique UNIQUE (nom_const);


--
-- TOC entry 2072 (class 2606 OID 113173)
-- Name: pgi_categories pgi_unique_cat; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_categories
    ADD CONSTRAINT pgi_unique_cat UNIQUE (nom_cat);


--
-- TOC entry 2064 (class 2606 OID 112598)
-- Name: pgi_utilisateurs pgi_utilisateurs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_utilisateurs
    ADD CONSTRAINT pgi_utilisateurs_pkey PRIMARY KEY (id_utili);


--
-- TOC entry 2066 (class 2606 OID 113680)
-- Name: pgi_utilisateurs uq_login; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_utilisateurs
    ADD CONSTRAINT uq_login UNIQUE (login);


--
-- TOC entry 2082 (class 2606 OID 113687)
-- Name: pgi_produits uq_nom; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_produits
    ADD CONSTRAINT uq_nom UNIQUE (nom_prod);


--
-- TOC entry 2084 (class 2606 OID 113697)
-- Name: pgi_produits uq_ref_prod; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_produits
    ADD CONSTRAINT uq_ref_prod UNIQUE (reference);


--
-- TOC entry 2085 (class 2606 OID 112640)
-- Name: pgi_produits pgi_pk1_produits; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_produits
    ADD CONSTRAINT pgi_pk1_produits FOREIGN KEY (id_const) REFERENCES public.pgi_constructeurs(id_const) NOT VALID;


--
-- TOC entry 2086 (class 2606 OID 112645)
-- Name: pgi_produits pgi_pk2_produits; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pgi_produits
    ADD CONSTRAINT pgi_pk2_produits FOREIGN KEY (id_cat) REFERENCES public.pgi_categories(id_cat) NOT VALID;


-- Completed on 2021-05-11 14:47:39

--
-- PostgreSQL database dump complete
--

