--
-- PostgreSQL database dump
--

-- Dumped from database version 9.2.13
-- Dumped by pg_dump version 9.2.13
-- Started on 2015-11-05 11:12:19

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 7 (class 2615 OID 16432)
-- Name: gen; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA gen;


ALTER SCHEMA gen OWNER TO postgres;

--
-- TOC entry 8 (class 2615 OID 16433)
-- Name: seg; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA seg;


ALTER SCHEMA seg OWNER TO postgres;

--
-- TOC entry 179 (class 3079 OID 11727)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1996 (class 0 OID 0)
-- Dependencies: 179
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 172 (class 1259 OID 16415)
-- Name: empresa_actividad; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE empresa_actividad (
    id text NOT NULL,
    actividad text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.empresa_actividad OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 16394)
-- Name: empresa_categoria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE empresa_categoria (
    id text NOT NULL,
    categoria text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.empresa_categoria OWNER TO postgres;

--
-- TOC entry 1997 (class 0 OID 0)
-- Dependencies: 170
-- Name: COLUMN empresa_categoria.stado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN empresa_categoria.stado IS '
';


--
-- TOC entry 173 (class 1259 OID 16423)
-- Name: empresa_funcion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE empresa_funcion (
    id text NOT NULL,
    funcion text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.empresa_funcion OWNER TO postgres;

--
-- TOC entry 171 (class 1259 OID 16402)
-- Name: empresa_tipo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE empresa_tipo (
    id text NOT NULL,
    id_empresa_categoria text,
    tipo text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.empresa_tipo OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 16434)
-- Name: sucursales_empresa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE sucursales_empresa (
    id text NOT NULL,
    id_empresa text,
    codigo text,
    nombre_empresa_sucursal text,
    direccion text,
    stado_sucursal text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.sucursales_empresa OWNER TO postgres;

SET search_path = seg, pg_catalog;

--
-- TOC entry 175 (class 1259 OID 16448)
-- Name: accesos; Type: TABLE; Schema: seg; Owner: postgres; Tablespace: 
--

CREATE TABLE accesos (
    id text NOT NULL,
    id_empresa text,
    login text,
    pass text,
    pass_origin text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE seg.accesos OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 16454)
-- Name: empresa; Type: TABLE; Schema: seg; Owner: postgres; Tablespace: 
--

CREATE TABLE empresa (
    id text NOT NULL,
    razon_social text,
    representante_legal text,
    cedula_ruc_representante text,
    nom_comercial text,
    telefono1 text,
    telefono2 text,
    telmovil text,
    paginaweb text,
    correo text,
    ruc text,
    estado_contri text,
    clase_contri text,
    tipo_contri text,
    obligado_conta text,
    actividad_economica text,
    fecha_inicio_actividad text,
    fecha_cese_actividad text,
    fecha_reinicio_actividad text,
    fecha_actualizacion text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE seg.empresa OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 16472)
-- Name: fecha_ingresos; Type: TABLE; Schema: seg; Owner: postgres; Tablespace: 
--

CREATE TABLE fecha_ingresos (
    id text NOT NULL,
    id_usuario text,
    fecha_ingreso timestamp with time zone,
    fecha_limite timestamp with time zone,
    stado text,
    tipo_tabla text
);


ALTER TABLE seg.fecha_ingresos OWNER TO postgres;

--
-- TOC entry 177 (class 1259 OID 16466)
-- Name: personal; Type: TABLE; Schema: seg; Owner: postgres; Tablespace: 
--

CREATE TABLE personal (
    id text NOT NULL,
    id_cuenta text,
    nombre text,
    correo text,
    genero text,
    img text,
    red_social text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE seg.personal OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- TOC entry 1982 (class 0 OID 16415)
-- Dependencies: 172
-- Data for Name: empresa_actividad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY empresa_actividad (id, actividad, stado, fecha) FROM stdin;
\.


--
-- TOC entry 1980 (class 0 OID 16394)
-- Dependencies: 170
-- Data for Name: empresa_categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY empresa_categoria (id, categoria, stado, fecha) FROM stdin;
1	ARTESANAL	1	\N
2	COMERCIAL	1	\N
4	DE SERVICIOS	1	\N
3	INDUSTRIAL	1	\N
\.


--
-- TOC entry 1983 (class 0 OID 16423)
-- Dependencies: 173
-- Data for Name: empresa_funcion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY empresa_funcion (id, funcion, stado, fecha) FROM stdin;
\.


--
-- TOC entry 1981 (class 0 OID 16402)
-- Dependencies: 171
-- Data for Name: empresa_tipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY empresa_tipo (id, id_empresa_categoria, tipo, stado, fecha) FROM stdin;
1	1	BELLEZA	1	2015-10-27 14:58:00-05
2	1	CARÁMICA	1	2015-10-27 14:58:01-05
3	1	COSTRUCCIÓN	1	2015-10-27 14:58:02-05
10	1	VARIOS	1	2015-10-27 14:59:20-05
4	1	GREMIOS	1	2015-10-27 14:58:03-05
5	1	MECANICA AUTOMOTRÍZ	1	2015-10-27 14:58:04-05
8	1	MODISTA	1	2015-10-27 14:58:06-05
9	1	PANADEROS	1	2015-10-27 14:58:07-05
7	1	METAL MECÁNICA	1	2015-10-27 14:58:05-05
11	2	ALIMENTOS Y BEBIDAS	1	2015-10-27 14:59:20-05
12	2	Agropecuaria	1	2015-10-27 14:59:20-05
13	2	Automotriz	1	2015-10-27 14:59:20-05
14	2	Bazar y papelería	1	2015-10-27 14:59:20-05
15	2	Calzados-carteras	1	2015-10-27 14:59:20-05
16	2	Centros comerciales	1	2015-10-27 14:59:20-05
17	2	Computación – informática	1	2015-10-27 14:59:20-05
18	2	Construcción	1	2015-10-27 14:59:20-05
19	2	Electrodomésticos	1	2015-10-27 14:59:20-05
20	2	Farmacia	1	2015-10-27 14:59:20-05
21	2	Ferreterías	1	2015-10-27 14:59:20-05
22	2	Estética cosmética	1	2015-10-27 14:59:20-05
23	2	Gasolineras	1	2015-10-27 14:59:20-05
24	2	Material eléctrico	1	2015-10-27 14:59:20-05
25	2	Para el hogar	1	2015-10-27 14:59:20-05
26	2	Para la oficina	1	2015-10-27 14:59:20-05
27	2	Pintura	1	2015-10-27 14:59:20-05
28	2	Prendas de vestir	1	2015-10-27 14:59:20-05
29	2	Telefónica	1	2015-10-27 14:59:20-05
30	2	Textil materias primas	1	2015-10-27 14:59:20-05
31	2	Vidrios-aluminios	1	2015-10-27 14:59:20-05
32	3	Alimenticia	1	2015-10-27 14:59:20-05
33	3	Cerámica	1	2015-10-27 14:59:20-05
34	3	Construcción	1	2015-10-27 14:59:20-05
35	3	Mecánica	1	2015-10-27 14:59:20-05
36	3	Metálica	1	2015-10-27 14:59:20-05
37	3	Maderera	1	2015-10-27 14:59:20-05
38	3	Muebles	1	2015-10-27 14:59:20-05
39	3	Textil prendas de vestir	1	2015-10-27 14:59:20-05
40	3	Textil materias primas	1	2015-10-27 14:59:20-05
41	3	Plásticos	1	2015-10-27 14:59:20-05
42	3	Varios	1	2015-10-27 14:59:20-05
51	4	Agencia de turismos	1	2015-10-27 14:59:20-05
52	4	Aseguradoras	1	2015-10-27 14:59:20-05
53	4	Aceites-lubricantes	1	2015-10-27 14:59:20-05
54	4	Asesoría	1	2015-10-27 14:59:20-05
55	4	Casa de salud	1	2015-10-27 14:59:20-05
56	4	Centros de diversión	1	2015-10-27 14:59:20-05
57	4	Centros educativos	1	2015-10-27 14:59:20-05
58	4	Construcción	1	2015-10-27 14:59:20-05
59	4	Copias	1	2015-10-27 14:59:20-05
60	4	Encomiendas	1	2015-10-27 14:59:20-05
61	4	Gastronomía	1	2015-10-27 14:59:20-05
62	4	Hospedaje	1	2015-10-27 14:59:20-05
63	4	Imprentas	1	2015-10-27 14:59:20-05
64	4	Ins. Financiera	1	2015-10-27 14:59:20-05
65	4	Medios – comunicación	1	2015-10-27 14:59:20-05
66	4	Profesionales	1	2015-10-27 14:59:20-05
67	4	Religiosos	1	2015-10-27 14:59:20-05
68	4	Técnicos	1	2015-10-27 14:59:20-05
70	2	Varios	1	2015-10-27 14:59:20-05
71	4	Telefonía	1	2015-10-27 14:59:20-05
72	4	Transportes	1	2015-10-27 14:59:20-05
73	4	Varios	1	2015-10-27 14:59:20-05
\.


--
-- TOC entry 1984 (class 0 OID 16434)
-- Dependencies: 174
-- Data for Name: sucursales_empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY sucursales_empresa (id, id_empresa, codigo, nombre_empresa_sucursal, direccion, stado_sucursal, stado, fecha) FROM stdin;
201510211123555627bc1b52442	1090084247001	001	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA 20-120 Y TARQUINO PAEZ	Abierto	0	2015-10-21 10:23:52-05
201510211123555627bc1b5804b	1090084247001	002	COMERCIAL HIDROBO	PICHINCHA / QUITO / AV AMAZONAS 6134 Y AV EL INCA	Cerrado	0	2015-10-21 10:23:52-05
201510211123555627bc1b5837d	1090084247001	003	COMERCIAL HIDROBO	PICHINCHA / QUITO / AV. 10 DE AGOSTO 61-62 Y BUSTAMANTE	Cerrado	0	2015-10-21 10:23:52-05
201510211123555627bc1b5c2bc	1090084247001	004	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA 18-49 Y ELEODORO AYALA	Abierto	0	2015-10-21 10:23:52-05
201510211123555627bc1b5c5a2	1090084247001	005	COMERCIAL HIDROBO	CARCHI / TULCAN / AV. VENTIMILLA Y SEMINARIO	Abierto	0	2015-10-21 10:23:52-05
201510211123555627bc1b5c84f	1090084247001	006	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA Y ESTHER CEVALLOS	Abierto	0	2015-10-21 10:23:52-05
201510211123555627bc1b5caab	1090084247001	007	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA 30-21 Y MANUELA SAENZ	Abierto	0	2015-10-21 10:23:52-05
201510211123555627bc1b5ccf2	1090084247001	008	COMERCIAL HIDROBO	PICHINCHA / CAYAMBE / KM 1 PANAMERICANA NORTE	Abierto	0	2015-10-21 10:23:52-05
201510211123555627bc1b5cf3b	1090084247001	009	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA Y AV. FRAY VACAS GALINDO	Abierto	0	2015-10-21 10:23:52-05
2015102220385156298fab87447	1002857009001	003	KERAPAC CERAMIC	IMBABURA / IBARRA / ALEJANDRO LOPEZ 6-79	Abierto	0	2015-10-22 19:38:49-05
2015102220385156298fab8c2dd	1002857009001	001	IMBABURA / IBARRA / AV. CRISTOBAL DE TROYA 7-72 Y AV. JAIME RIVADENEIRA	Cerrado	002	0	2015-10-22 19:38:49-05
2015102220385156298fab8c5d5	1002857009001	LINKGROUP AKPSA	IMBABURA / IBARRA / 27 DE NOVIEMBRE 8-61 Y EXEQUIEL RIVADENEIRA	Abierto	Fecha : 22-10-2015	0	2015-10-22 19:38:49-05
\.


SET search_path = seg, pg_catalog;

--
-- TOC entry 1985 (class 0 OID 16448)
-- Dependencies: 175
-- Data for Name: accesos; Type: TABLE DATA; Schema: seg; Owner: postgres
--

COPY accesos (id, id_empresa, login, pass, pass_origin, stado, fecha) FROM stdin;
2015102220384956298fa9752de	2015102220364956298f3148daa	1002857009001@facturanext.com	d494baaeb711d4f51a554dc5be194081	sdmusJUmL6	AUTOMATICO	2015-10-22 19:38:49-05
201510211123525627bc18a1207	201510211029595627af77b9b69	1090084247001@facturanext.com	8010a512867849768fe8614c437294cd	7U00i6um83	passmin	2015-10-21 10:23:52-05
\.


--
-- TOC entry 1986 (class 0 OID 16454)
-- Dependencies: 176
-- Data for Name: empresa; Type: TABLE DATA; Schema: seg; Owner: postgres
--

COPY empresa (id, razon_social, representante_legal, cedula_ruc_representante, nom_comercial, telefono1, telefono2, telmovil, paginaweb, correo, ruc, estado_contri, clase_contri, tipo_contri, obligado_conta, actividad_economica, fecha_inicio_actividad, fecha_cese_actividad, fecha_reinicio_actividad, fecha_actualizacion, stado, fecha) FROM stdin;
2015102220364956298f3148daa	1002857009001	ACOSTA CAICEDO CRISTINA ALEXANDRA	1002857009	LINKGROUP AKPSA	(062)-551-285		(09)-9278-4730		presidencia@oyefm.com	1002857009001	Activo	Otro	Persona Natural	NO	FABRICACION DE ARTICULOS DE CERAMICA	22-09-2003	&nbsp;	27-10-2009	16-10-2014	1	2015-10-22 19:36:49-05
201510211029595627af77b9b69	1090084247001	HIDROBO ESTRADA ANGEL PATRICIO	1001214020	COMERCIAL HIDROBO	(548)-910-981		(06)-5146-5984		deividscriollo@gmail.com	1090084247001	Activo	Especial	Sociedad	SI	VENTA AL POR MENOR DE AUTOMOVILES Y VEHICULOS PARA TODO TERRENO	05-04-1988	&nbsp;	&nbsp;	17-12-2014	1	2015-10-21 09:29:59-05
\.


--
-- TOC entry 1988 (class 0 OID 16472)
-- Dependencies: 178
-- Data for Name: fecha_ingresos; Type: TABLE DATA; Schema: seg; Owner: postgres
--

COPY fecha_ingresos (id, id_usuario, fecha_ingreso, fecha_limite, stado, tipo_tabla) FROM stdin;
\.


--
-- TOC entry 1987 (class 0 OID 16466)
-- Dependencies: 177
-- Data for Name: personal; Type: TABLE DATA; Schema: seg; Owner: postgres
--

COPY personal (id, id_cuenta, nombre, correo, genero, img, red_social, stado, fecha) FROM stdin;
\.


SET search_path = public, pg_catalog;

--
-- TOC entry 1856 (class 2606 OID 16422)
-- Name: empresa_actividad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY empresa_actividad
    ADD CONSTRAINT empresa_actividad_pkey PRIMARY KEY (id);


--
-- TOC entry 1852 (class 2606 OID 16401)
-- Name: empresa_categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY empresa_categoria
    ADD CONSTRAINT empresa_categoria_pkey PRIMARY KEY (id);


--
-- TOC entry 1858 (class 2606 OID 16430)
-- Name: empresa_funcion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY empresa_funcion
    ADD CONSTRAINT empresa_funcion_pkey PRIMARY KEY (id);


--
-- TOC entry 1854 (class 2606 OID 16409)
-- Name: empresa_tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY empresa_tipo
    ADD CONSTRAINT empresa_tipo_pkey PRIMARY KEY (id);


--
-- TOC entry 1860 (class 2606 OID 16441)
-- Name: sucursales_empresa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY sucursales_empresa
    ADD CONSTRAINT sucursales_empresa_pkey PRIMARY KEY (id);


SET search_path = seg, pg_catalog;

--
-- TOC entry 1862 (class 2606 OID 16480)
-- Name: accesos_pkey; Type: CONSTRAINT; Schema: seg; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY accesos
    ADD CONSTRAINT accesos_pkey PRIMARY KEY (id);


--
-- TOC entry 1864 (class 2606 OID 16482)
-- Name: empresa_pkey; Type: CONSTRAINT; Schema: seg; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY empresa
    ADD CONSTRAINT empresa_pkey PRIMARY KEY (id);


--
-- TOC entry 1866 (class 2606 OID 16498)
-- Name: empresa_ruc_key; Type: CONSTRAINT; Schema: seg; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY empresa
    ADD CONSTRAINT empresa_ruc_key UNIQUE (ruc);


--
-- TOC entry 1870 (class 2606 OID 16484)
-- Name: fecha_ingresos_pkey; Type: CONSTRAINT; Schema: seg; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY fecha_ingresos
    ADD CONSTRAINT fecha_ingresos_pkey PRIMARY KEY (id);


--
-- TOC entry 1868 (class 2606 OID 16486)
-- Name: personal_pkey; Type: CONSTRAINT; Schema: seg; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY personal
    ADD CONSTRAINT personal_pkey PRIMARY KEY (id);


SET search_path = public, pg_catalog;

--
-- TOC entry 1871 (class 2606 OID 16504)
-- Name: empresa_tipo_id_empresa_categoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY empresa_tipo
    ADD CONSTRAINT empresa_tipo_id_empresa_categoria_fkey FOREIGN KEY (id_empresa_categoria) REFERENCES empresa_categoria(id);


--
-- TOC entry 1872 (class 2606 OID 16499)
-- Name: sucursales_empresa_id_empresa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sucursales_empresa
    ADD CONSTRAINT sucursales_empresa_id_empresa_fkey FOREIGN KEY (id_empresa) REFERENCES seg.empresa(ruc);


SET search_path = seg, pg_catalog;

--
-- TOC entry 1873 (class 2606 OID 16487)
-- Name: accesos_id_empresa_fkey; Type: FK CONSTRAINT; Schema: seg; Owner: postgres
--

ALTER TABLE ONLY accesos
    ADD CONSTRAINT accesos_id_empresa_fkey FOREIGN KEY (id_empresa) REFERENCES empresa(id);


--
-- TOC entry 1995 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-11-05 11:12:19

--
-- PostgreSQL database dump complete
--

