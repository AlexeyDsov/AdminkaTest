BEGIN;

CREATE TABLE fb_user (
	id serial NOT NULL, 
	email character varying (128) NOT NULL,
	name character varying (64) NOT NULL,
	password character varying(32) NOT NULL,
	CONSTRAINT pk_fb_user PRIMARY KEY (id)
) WITH (OIDS = FALSE);

CREATE TABLE fb_actor (
	id serial NOT NULL,
	name character varying (128) NOT NULL,
	imdb_id integer,
	description text,
	CONSTRAINT pk_fb_actor PRIMARY KEY (id)
) WITH (OIDS = FALSE);

CREATE TABLE fb_film (
	id serial NOT NULL,
	name character varying (256) NOT NULL,
	imdb_id integer,
	release_date date,
	description text,
	CONSTRAINT pk_fb_film PRIMARY KEY (id)
) WITH (OIDS = FALSE);

CREATE TABLE fb_role (
	id serial NOT NULL,
	film_id integer,
	actor_id integer,
	description text,
	CONSTRAINT pk_fb_role PRIMARY KEY (id),
	CONSTRAINT fk_fb_role_film_id FOREIGN KEY (film_id)
		REFERENCES fb_film(id) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT fk_fb_role_actor_id FOREIGN KEY (actor_id)
		REFERENCES fb_actor(id) ON UPDATE CASCADE ON DELETE RESTRICT
) WITH (OIDS = FALSE);


COMMIT;