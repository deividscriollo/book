--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.19
-- Dumped by pg_dump version 9.1.19
-- Started on 2016-03-16 08:55:43

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 12 (class 2615 OID 18778)
-- Name: acceso; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA acceso;


ALTER SCHEMA acceso OWNER TO postgres;

--
-- TOC entry 10 (class 2615 OID 18674)
-- Name: empresa; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA empresa;


ALTER SCHEMA empresa OWNER TO postgres;

--
-- TOC entry 9 (class 2615 OID 18418)
-- Name: facturanext; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA facturanext;


ALTER SCHEMA facturanext OWNER TO postgres;

--
-- TOC entry 6 (class 2615 OID 17471)
-- Name: localizacion; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA localizacion;


ALTER SCHEMA localizacion OWNER TO postgres;

--
-- TOC entry 13 (class 2615 OID 18852)
-- Name: notificaciones; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA notificaciones;


ALTER SCHEMA notificaciones OWNER TO postgres;

--
-- TOC entry 7 (class 2615 OID 17472)
-- Name: seg; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA seg;


ALTER SCHEMA seg OWNER TO postgres;

--
-- TOC entry 11 (class 2615 OID 18675)
-- Name: sucursales; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA sucursales;


ALTER SCHEMA sucursales OWNER TO postgres;

--
-- TOC entry 198 (class 3079 OID 11639)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2113 (class 0 OID 0)
-- Dependencies: 198
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = acceso, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 196 (class 1259 OID 18815)
-- Dependencies: 12
-- Name: corporativo; Type: TABLE; Schema: acceso; Owner: postgres; Tablespace: 
--

CREATE TABLE corporativo (
    id text NOT NULL,
    id_empresa_corporativo text,
    login text,
    pass text,
    correo text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE acceso.corporativo OWNER TO postgres;

SET search_path = empresa, pg_catalog;

--
-- TOC entry 193 (class 1259 OID 18685)
-- Dependencies: 10
-- Name: corporativo; Type: TABLE; Schema: empresa; Owner: postgres; Tablespace: 
--

CREATE TABLE corporativo (
    id text NOT NULL,
    nombre text,
    apellido text,
    telefono1 text,
    movil text,
    correo text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE empresa.corporativo OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 18701)
-- Dependencies: 10
-- Name: miempresa; Type: TABLE; Schema: empresa; Owner: postgres; Tablespace: 
--

CREATE TABLE miempresa (
    id text NOT NULL,
    id_corporativo text NOT NULL,
    razon_social text,
    nom_comercial text,
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


ALTER TABLE empresa.miempresa OWNER TO postgres;

SET search_path = facturanext, pg_catalog;

--
-- TOC entry 186 (class 1259 OID 18419)
-- Dependencies: 9
-- Name: adjuntos; Type: TABLE; Schema: facturanext; Owner: postgres; Tablespace: 
--

CREATE TABLE adjuntos (
    id text NOT NULL,
    id_correo text,
    filename text,
    name text,
    name_update text,
    size text,
    extension text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE facturanext.adjuntos OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 18425)
-- Dependencies: 9
-- Name: correo; Type: TABLE; Schema: facturanext; Owner: postgres; Tablespace: 
--

CREATE TABLE correo (
    id text NOT NULL,
    nombre_remitente text,
    remitente text,
    email_usuario text,
    fecha_correo text,
    tema text,
    id_mensaje text,
    stado text,
    id_usuario text,
    tipo_consumo text,
    razon_social text,
    clave_acceso text,
    tipo text,
    fecha_emision text
);


ALTER TABLE facturanext.correo OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 18431)
-- Dependencies: 9
-- Name: detalles_fisicas; Type: TABLE; Schema: facturanext; Owner: postgres; Tablespace: 
--

CREATE TABLE detalles_fisicas (
    id text NOT NULL,
    id_fisica text,
    codigo text,
    cantidad text,
    descripcion text,
    v_unitario text,
    v_total text,
    descuento text,
    iva text
);


ALTER TABLE facturanext.detalles_fisicas OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 18437)
-- Dependencies: 9
-- Name: facturas; Type: TABLE; Schema: facturanext; Owner: postgres; Tablespace: 
--

CREATE TABLE facturas (
    id text NOT NULL,
    num_factura text,
    id_proveedor text,
    fecha_emision text,
    subtotal text,
    impuestos text,
    propina text,
    total_factura text,
    fecha_creacion timestamp with time zone,
    stado text,
    id_correo text,
    tipo_doc text
);


ALTER TABLE facturanext.facturas OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 18443)
-- Dependencies: 9
-- Name: facturas_fisica; Type: TABLE; Schema: facturanext; Owner: postgres; Tablespace: 
--

CREATE TABLE facturas_fisica (
    id text NOT NULL,
    id_proveedor text,
    id_cliente text,
    id_usuario text,
    tipo_consumo text,
    tipo_documento text,
    fecha_creacion text,
    fecha_emision text,
    num_fac text,
    subtotal text,
    impuestos text,
    propina text,
    iva0 text,
    iva12 text,
    iva text,
    descuento text,
    total_fac text,
    stado text,
    id_correo text
);


ALTER TABLE facturanext.facturas_fisica OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 18449)
-- Dependencies: 9 189
-- Name: facturas_total_factura_seq; Type: SEQUENCE; Schema: facturanext; Owner: postgres
--

CREATE SEQUENCE facturas_total_factura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE facturanext.facturas_total_factura_seq OWNER TO postgres;

--
-- TOC entry 2114 (class 0 OID 0)
-- Dependencies: 191
-- Name: facturas_total_factura_seq; Type: SEQUENCE OWNED BY; Schema: facturanext; Owner: postgres
--

ALTER SEQUENCE facturas_total_factura_seq OWNED BY facturas.total_factura;


--
-- TOC entry 192 (class 1259 OID 18451)
-- Dependencies: 9
-- Name: proveedores; Type: TABLE; Schema: facturanext; Owner: postgres; Tablespace: 
--

CREATE TABLE proveedores (
    id text NOT NULL,
    ruc_proveedor text,
    nombre_proveedor text,
    dir_matriz text,
    fecha_creacion timestamp with time zone,
    stado text,
    nombre_comercial text
);


ALTER TABLE facturanext.proveedores OWNER TO postgres;

SET search_path = localizacion, pg_catalog;

--
-- TOC entry 168 (class 1259 OID 17511)
-- Dependencies: 6
-- Name: ciudad; Type: TABLE; Schema: localizacion; Owner: nextbook; Tablespace: 
--

CREATE TABLE ciudad (
    id text NOT NULL,
    id_provincia text,
    nom_ciudad text,
    fecha time with time zone,
    stado integer
);


ALTER TABLE localizacion.ciudad OWNER TO nextbook;

--
-- TOC entry 169 (class 1259 OID 17517)
-- Dependencies: 6
-- Name: pais; Type: TABLE; Schema: localizacion; Owner: nextbook; Tablespace: 
--

CREATE TABLE pais (
    id text NOT NULL,
    nom_pais text,
    fecha time with time zone,
    stado integer
);


ALTER TABLE localizacion.pais OWNER TO nextbook;

--
-- TOC entry 170 (class 1259 OID 17523)
-- Dependencies: 6
-- Name: provincia; Type: TABLE; Schema: localizacion; Owner: nextbook; Tablespace: 
--

CREATE TABLE provincia (
    id text NOT NULL,
    id_pais text,
    nom_provincia text,
    fecha time with time zone,
    stado integer
);


ALTER TABLE localizacion.provincia OWNER TO nextbook;

SET search_path = notificaciones, pg_catalog;

--
-- TOC entry 197 (class 1259 OID 18853)
-- Dependencies: 13
-- Name: facturanext; Type: TABLE; Schema: notificaciones; Owner: postgres; Tablespace: 
--

CREATE TABLE facturanext (
    id text NOT NULL,
    id_empresa text,
    subject text,
    de text,
    para text,
    date text,
    message_id text,
    size text,
    uid text,
    visto text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE notificaciones.facturanext OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- TOC entry 183 (class 1259 OID 18307)
-- Dependencies: 8
-- Name: colaboradores_areas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE colaboradores_areas (
    id text NOT NULL,
    id_sucursales_misucursal text,
    data text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.colaboradores_areas OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 18335)
-- Dependencies: 8
-- Name: colaboradores_cargo; Type: TABLE; Schema: public; Owner: nextbook; Tablespace: 
--

CREATE TABLE colaboradores_cargo (
    id text NOT NULL,
    id_sucursales_misucursal text,
    data text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.colaboradores_cargo OWNER TO nextbook;

--
-- TOC entry 185 (class 1259 OID 18363)
-- Dependencies: 8
-- Name: colaboradores_perfil; Type: TABLE; Schema: public; Owner: nextbook; Tablespace: 
--

CREATE TABLE colaboradores_perfil (
    id text NOT NULL,
    id_sucursal_empresa text,
    id_colaboradores_cargo text,
    id_colaboradores_area text,
    nombre text,
    correo text,
    edad timestamp with time zone,
    telefono text,
    direccion text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.colaboradores_perfil OWNER TO nextbook;

--
-- TOC entry 171 (class 1259 OID 17541)
-- Dependencies: 8
-- Name: empresa_categoria; Type: TABLE; Schema: public; Owner: nextbook; Tablespace: 
--

CREATE TABLE empresa_categoria (
    id text NOT NULL,
    id_empresa_categoria text,
    tipo text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.empresa_categoria OWNER TO nextbook;

--
-- TOC entry 172 (class 1259 OID 17553)
-- Dependencies: 8
-- Name: empresa_tipo; Type: TABLE; Schema: public; Owner: nextbook; Tablespace: 
--

CREATE TABLE empresa_tipo (
    id text NOT NULL,
    categoria text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.empresa_tipo OWNER TO nextbook;

--
-- TOC entry 2121 (class 0 OID 0)
-- Dependencies: 172
-- Name: COLUMN empresa_tipo.stado; Type: COMMENT; Schema: public; Owner: nextbook
--

COMMENT ON COLUMN empresa_tipo.stado IS '

';


--
-- TOC entry 173 (class 1259 OID 17559)
-- Dependencies: 8
-- Name: sucursal_img_perfil_empresa; Type: TABLE; Schema: public; Owner: nextbook; Tablespace: 
--

CREATE TABLE sucursal_img_perfil_empresa (
    id text NOT NULL,
    id_sucursal_empresa text,
    img text,
    tipo text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.sucursal_img_perfil_empresa OWNER TO nextbook;

--
-- TOC entry 174 (class 1259 OID 17565)
-- Dependencies: 8
-- Name: sucursal_info_empresa; Type: TABLE; Schema: public; Owner: nextbook; Tablespace: 
--

CREATE TABLE sucursal_info_empresa (
    id text NOT NULL,
    id_sucursal_empresa text,
    data text,
    tipo text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.sucursal_info_empresa OWNER TO nextbook;

--
-- TOC entry 175 (class 1259 OID 17577)
-- Dependencies: 8
-- Name: sucursal_perfil_empresa; Type: TABLE; Schema: public; Owner: nextbook; Tablespace: 
--

CREATE TABLE sucursal_perfil_empresa (
    id text NOT NULL,
    id_empresa_sucursal text,
    nombre_empresa_sucursal text,
    id_tipo text,
    id_categoria text,
    descripcion text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE public.sucursal_perfil_empresa OWNER TO nextbook;

--
-- TOC entry 176 (class 1259 OID 17583)
-- Dependencies: 8
-- Name: sucursales_empresa; Type: TABLE; Schema: public; Owner: nextbook; Tablespace: 
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


ALTER TABLE public.sucursales_empresa OWNER TO nextbook;

SET search_path = seg, pg_catalog;

--
-- TOC entry 177 (class 1259 OID 17589)
-- Dependencies: 7
-- Name: acceso_colaboradores; Type: TABLE; Schema: seg; Owner: nextbook; Tablespace: 
--

CREATE TABLE acceso_colaboradores (
    id text NOT NULL,
    id_colaboradores_perfil text,
    login text,
    pass text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE seg.acceso_colaboradores OWNER TO nextbook;

--
-- TOC entry 178 (class 1259 OID 17595)
-- Dependencies: 7
-- Name: accesos; Type: TABLE; Schema: seg; Owner: nextbook; Tablespace: 
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


ALTER TABLE seg.accesos OWNER TO nextbook;

--
-- TOC entry 179 (class 1259 OID 17601)
-- Dependencies: 7
-- Name: empresa; Type: TABLE; Schema: seg; Owner: nextbook; Tablespace: 
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


ALTER TABLE seg.empresa OWNER TO nextbook;

--
-- TOC entry 180 (class 1259 OID 17607)
-- Dependencies: 7
-- Name: fecha_ingresos; Type: TABLE; Schema: seg; Owner: nextbook; Tablespace: 
--

CREATE TABLE fecha_ingresos (
    id text NOT NULL,
    id_usuario text,
    fecha_ingreso timestamp with time zone,
    fecha_limite timestamp with time zone,
    stado text,
    tipo_tabla text
);


ALTER TABLE seg.fecha_ingresos OWNER TO nextbook;

--
-- TOC entry 181 (class 1259 OID 17613)
-- Dependencies: 7
-- Name: perfil_personal; Type: TABLE; Schema: seg; Owner: nextbook; Tablespace: 
--

CREATE TABLE perfil_personal (
    id text NOT NULL,
    id_empresa text,
    foto text,
    alias text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE seg.perfil_personal OWNER TO nextbook;

--
-- TOC entry 182 (class 1259 OID 17619)
-- Dependencies: 7
-- Name: personal; Type: TABLE; Schema: seg; Owner: nextbook; Tablespace: 
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


ALTER TABLE seg.personal OWNER TO nextbook;

SET search_path = sucursales, pg_catalog;

--
-- TOC entry 195 (class 1259 OID 18792)
-- Dependencies: 11
-- Name: misucursal; Type: TABLE; Schema: sucursales; Owner: postgres; Tablespace: 
--

CREATE TABLE misucursal (
    id text NOT NULL,
    id_empresa_miempresa text,
    codigo text,
    nombre_sucursal text,
    direccion text,
    estado_sri text,
    stado text,
    fecha timestamp with time zone
);


ALTER TABLE sucursales.misucursal OWNER TO postgres;

SET search_path = acceso, pg_catalog;

--
-- TOC entry 2103 (class 0 OID 18815)
-- Dependencies: 196 2105
-- Data for Name: corporativo; Type: TABLE DATA; Schema: acceso; Owner: postgres
--

COPY corporativo (id, id_empresa_corporativo, login, pass, correo, stado, fecha) FROM stdin;
2016031109352256e2d7aa03f80	2016031012031756e1a8d52a157	1090084247001@facturanext.com	8010a512867849768fe8614c437294cd	UO4clrWZ2vf5	update	2016-03-11 09:35:22-05
\.


SET search_path = empresa, pg_catalog;

--
-- TOC entry 2100 (class 0 OID 18685)
-- Dependencies: 193 2105
-- Data for Name: corporativo; Type: TABLE DATA; Schema: empresa; Owner: postgres
--

COPY corporativo (id, nombre, apellido, telefono1, movil, correo, stado, fecha) FROM stdin;
2016031012031756e1a8d52a157	ESTEBAN DAVID	CRIOLLO AMD		0987113522	deividscriollo@gmail.com	1	2016-03-10 12:03:17-05
\.


--
-- TOC entry 2101 (class 0 OID 18701)
-- Dependencies: 194 2105
-- Data for Name: miempresa; Type: TABLE DATA; Schema: empresa; Owner: postgres
--

COPY miempresa (id, id_corporativo, razon_social, nom_comercial, ruc, estado_contri, clase_contri, tipo_contri, obligado_conta, actividad_economica, fecha_inicio_actividad, fecha_cese_actividad, fecha_reinicio_actividad, fecha_actualizacion, stado, fecha) FROM stdin;
2016031012031756e1a8d52a165	2016031012031756e1a8d52a157	COMERCIAL HIDROBO S.A. COMHIDROBO	COMERCIAL HIDROBO	1090084247001	Activo	Especial	Sociedad	SI	VENTA AL POR MENOR DE AUTOMOVILES Y VEHICULOS PARA TODO TERRENO	05-04-1988	&nbsp;	&nbsp;	17-12-2014	0	2016-03-10 12:03:17-05
\.


SET search_path = facturanext, pg_catalog;

--
-- TOC entry 2093 (class 0 OID 18419)
-- Dependencies: 186 2105
-- Data for Name: adjuntos; Type: TABLE DATA; Schema: facturanext; Owner: postgres
--

COPY adjuntos (id, id_correo, filename, name, name_update, size, extension, stado, fecha) FROM stdin;
20151126173312565788a8735f0	20151126173312565788a8724c9	20151126173312565788a8735f0	20151126173312565788a8735f0	20151126173312565788a8735f0	0	xml	0	2015-11-26 17:33:12-05
2015112617442156578b45150ab	2015112617442156578b4513eba	2015112617442156578b45150ab	2015112617442156578b45150ab	2015112617442156578b45150ab	0	xml	0	2015-11-26 17:44:21-05
2015112618012656578f46231c8	2015112618012656578f4621a76	2015112618012656578f46231c8	2015112618012656578f46231c8	2015112618012656578f46231c8	0	xml	0	2015-11-26 18:01:26-05
201511271544065658c096181d3	201511271544055658c095dc80a	201511271544065658c096181d3	201511271544065658c096181d3	201511271544065658c096181d3	0	xml	0	2015-11-27 15:44:05-05
201511271548565658c1b8d97c0	201511271548565658c1b8d602f	201511271548565658c1b8d97c0	201511271548565658c1b8d97c0	201511271548565658c1b8d97c0	0	xml	0	2015-11-27 15:48:56-05
201511271552145658c27ea8e64	201511271552145658c27ea5dd8	201511271552145658c27ea8e64	201511271552145658c27ea8e64	201511271552145658c27ea8e64	0	xml	0	2015-11-27 15:52:14-05
201511271605465658c5aa21da1	201511271605465658c5aa1e140	201511271605465658c5aa21da1	201511271605465658c5aa21da1	201511271605465658c5aa21da1	0	xml	0	2015-11-27 16:05:46-05
201511271607485658c624cb60b	201511271607485658c624c9500	201511271607485658c624cb60b	201511271607485658c624cb60b	201511271607485658c624cb60b	0	xml	0	2015-11-27 16:07:48-05
201511271621125658c948c842c	201511271621125658c948c6c48	201511271621125658c948c842c	201511271621125658c948c842c	201511271621125658c948c842c	0	xml	0	2015-11-27 16:21:12-05
201511271623255658c9cded220	201511271623255658c9cdec117	201511271623255658c9cded220	201511271623255658c9cded220	201511271623255658c9cded220	0	xml	0	2015-11-27 16:23:25-05
201511271733065658da2293eae	201511271733065658da2281280	201511271733065658da2293eae	201511271733065658da2293eae	201511271733065658da2293eae	0	xml	0	2015-11-27 17:33:06-05
20151130104548565c6f2c5cf3b	20151130104548565c6f2c42058	20151130104548565c6f2c5cf3b	20151130104548565c6f2c5cf3b	20151130104548565c6f2c5cf3b	0	xml	0	2015-11-30 10:45:48-05
20151130112212565c77b4e935c	20151130112212565c77b4e2eba	20151130112212565c77b4e935c	20151130112212565c77b4e935c	20151130112212565c77b4e935c	0	xml	0	2015-11-30 11:22:12-05
20151130170708565cc88ccf5a5	20151130170708565cc88cb5555	20151130170708565cc88ccf5a5	20151130170708565cc88ccf5a5	20151130170708565cc88ccf5a5	0	xml	0	2015-11-30 17:07:08-05
20151130170808565cc8c867683	20151130170808565cc8c8622fc	20151130170808565cc8c867683	20151130170808565cc8c867683	20151130170808565cc8c867683	0	xml	0	2015-11-30 17:08:08-05
20151130172347565ccc73acf54	20151130172347565ccc73ab7c3	20151130172347565ccc73acf54	20151130172347565ccc73acf54	20151130172347565ccc73acf54	0	xml	0	2015-11-30 17:23:47-05
20151202152528565f53b817d17	20151202152527565f53b7eb3ac	20151202152528565f53b817d17	20151202152528565f53b817d17	20151202152528565f53b817d17	0	xml	0	2015-12-02 15:25:27-05
201512041103575661b96dd419e	201512041103575661b96db9bfa	201512041103575661b96dd419e	201512041103575661b96dd419e	201512041103575661b96dd419e	0	xml	0	2015-12-04 11:03:57-05
2016020317144156b27bd160cc4	2016020317144156b27bd15e919	2016020317144156b27bd160cc4	2016020317144156b27bd160cc4	2016020317144156b27bd160cc4	0	xml	0	2016-02-03 20:14:41-05
\.


--
-- TOC entry 2094 (class 0 OID 18425)
-- Dependencies: 187 2105
-- Data for Name: correo; Type: TABLE DATA; Schema: facturanext; Owner: postgres
--

COPY correo (id, nombre_remitente, remitente, email_usuario, fecha_correo, tema, id_mensaje, stado, id_usuario, tipo_consumo, razon_social, clave_acceso, tipo, fecha_emision) FROM stdin;
201511271607485658c624c9500	PETROWORLD SA			2015-11-27 16:07:48	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	PETROWORLD SA	0409201501179128079200120010220000409781234567811	0	04/09/2015
201511271548565658c1b8d602f	PETROWORLD SA			2015-11-27 15:48:56	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	PETROWORLD SA	2011201501179128079200120010220000547261234567812	1	20/11/2015
201511271623255658c9cdec117	PETROWORLD SA			2015-11-27 16:23:25	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	PETROWORLD SA	1908201501179128079200120010220000381661234567813		19/08/2015
20151130170808565cc8c8622fc	PROHIERROS S C C			2015-11-30 17:08:08	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	PROHIERROS S C C	0508201501109173941700120020110000147071234567817		05/08/2015
20151126173312565788a8724c9	ALMACENES FERROELECTRICO S A	crisacostacaicedo@yahoo.com		2015-11-26 17:33:12	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	ALMACENES FERROELECTRICO S A	1008201501109172968300120020100000444631234567813	6	10/08/2015
201511111612055643af2596f4e	Willi Narvaez	willynarvaez6@gmail.com	1002857009001@facturanext.com	Wed, 11 Nov 2015 16:08:26 -0500	Fwd: Factura Electrónica Movistar 001327017910043-08092015	&lt;CAKWut1LT0pVcJH4vX_f5hPVn_=eRaEip0TgfBPTqKVcLb9bLcw@mail.gmail.com&gt;	0	201511091317015640e31dec2ad	01	OTECEL S. A.	0809201501179125611500120013270179100432658602819	0	\N
20151111115513564372f1dbc62	SERVICIO DE RENTAS INTERNAS	sri.ad@sri.gob.ec		2015-11-11 11:55:13	Docuemnto Generado por el SRI		0	201511091317015640e31dec2ad	01	SERVICIO DE RENTAS INTERNAS	2310201401179210786500110010010000000271234567815	1	\N
201511111615425643affe223a7	Willi Narvaez	willynarvaez6@gmail.com	1002857009001@facturanext.com	Wed, 11 Nov 2015 16:14:11 -0500	Fwd: Factura Electrónica Movistar 001327017910043-08092015	&lt;CAKWut1Lb7DQ_Zg7cb+VEiFNxcRyyjvKDkO_gSKJtOTpv1J_CqA@mail.gmail.com&gt;	0	201511091317015640e31dec2ad	01	OTECEL S. A.	0809201501179125611500120013270179100432658602819	0	\N
2015111109171856434dee97de0	Willi Narvaez	willynarvaez6@gmail.com	1002857009001@facturanext.com	Mon, 9 Nov 2015 13:19:58 -0500	Fwd: Factura Electrónica Movistar 001327017910043-08092015	&lt;CAKWut1LzJe2vXfsTZDhNphA-LmUyOJyZV9-JMTP7LAsj6zh4Xg@mail.gmail.com&gt;	0	201511091317015640e31dec2ad	01	OTECEL S. A.	0809201501179125611500120013270179100432658602819	0	\N
2015111109171856434dee96ee5	Willi Narvaez	willynarvaez6@gmail.com	1002857009001@facturanext.com	Tue, 10 Nov 2015 17:22:09 -0500	Fwd: Documento: APCR/1464	&lt;CAKWut1J4npAfHGjahxK-HQCKRiHgSYZ91yTKb1uqp_NbuBYTSQ@mail.gmail.com&gt;	0	201511091317015640e31dec2ad	01	VELASCO YACELGA DARWIN PATRICIO	1810201501100215335900120050010000014641234567811	6	\N
2015112617442156578b4513eba	MARUJA RODRIGUEZ LIMA	crisacostacaicedo@gmail.com		2015-11-26 17:44:21	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	MARUJA RODRIGUEZ LIMA	0410201501100156637900120020100000129974126153312	4	04/10/2015
201511271544055658c095dc80a	PETROWORLD SA			2015-11-27 15:44:05	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	PETROWORLD SA	2611201501179128079200120010220000557071234567814	1	26/11/2015
201511271552145658c27ea5dd8	PETROWORLD SA			2015-11-27 15:52:14	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	PETROWORLD SA	2309201501179128079200120010220000442051234567811	1	23/09/2015
201511271605465658c5aa1e140	PETROWORLD SA			2015-11-27 16:05:46	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	PETROWORLD SA	1109201501179128079200120010220000421031234567818	1	11/09/2015
2015112618012656578f4621a76	TIENDAS INDUSTRIALES ASOCIADAS (TIA) S.A.			2015-11-26 18:01:26	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	TIENDAS INDUSTRIALES ASOCIADAS (TIA) S.A.	1008201501099001751400120270050006753110000000011	4	10/08/2015
201512041103575661b96db9bfa	COMERCIAL KYWI S.A.			2015-12-04 11:03:57	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	COMERCIAL KYWI S.A.	0211201501179004122000120149030000557671790041214		02/11/2015
20151130112212565c77b4e2eba	ENMARDOS SA			2015-11-30 11:22:12	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	ENMARDOS SA	2909201501179207380400120030010000403992913462319	0	29/09/2015
201511271621125658c948c6c48	PETROWORLD SA			2015-11-27 16:21:12	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	PETROWORLD SA	0309201501179128079200120010220000408241234567817	0	03/09/2015
2016020317144156b27bd15e919	ALMACENES FERROELECTRICO S A	crisacostacaicedo@yahoo.com		2016-02-03 17:14:41	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	ALMACENES FERROELECTRICO S A	0608201501109172968300120020100000438721234567812		06/08/2015
20151202152527565f53b7eb3ac	ENMARDOS SA			2015-12-02 15:25:27	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	ENMARDOS SA	2209201501179207380400120030010000395932214392215	0	22/09/2015
20151130172347565ccc73ab7c3	ALMACENES FERROELECTRICO S A	crisacostacaicedo@yahoo.com		2015-11-30 17:23:47	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	ALMACENES FERROELECTRICO S A	0608201501109172968300120020100000437101234567810	0	06/08/2015
20151130170708565cc88cb5555	PROHIERROS S C C			2015-11-30 17:07:08	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	PROHIERROS S C C	0508201501109173941700120020110000147011234567814	0	05/08/2015
20151130104548565c6f2c42058	COOPERATIVA DE TRANSPORTE TERRESTRE PUBLICO URBANO DE PASAJEROS EN BUSES SAN MIGUEL DE IBARRA	                              		2015-11-30 10:45:48	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	COOPERATIVA DE TRANSPORTE TERRESTRE PUBLICO URBANO DE PASAJEROS EN BUSES SAN MIGUEL DE IBARRA	3009201501109000851600120020030000564520000000114	0	30/09/2015
201511271733065658da2281280	DISTRIBUIDORA FARMACEUTICA ECUATORIANA DIFARE S.A			2015-11-27 17:33:06	Docuemnto Generado por el SRI		1	20151123120122565346625394d	01	DISTRIBUIDORA FARMACEUTICA ECUATORIANA DIFARE S.A	1410201501099085832200123610230000118820990858318	0	14/10/2015
2016022211270356cb36d7b3aee	ALMACENES FERROELECTRICO S A			2016-02-22	Factura Ingresada Manualmente		5	20151123095907565329bb661a7	01	ALMACENES FERROELECTRICO S A			2016-02-22
2016022211402356cb39f7d193e	Fritadas Amazonas			2016-02-22	Factura Ingresada Manualmente		5	20151123095907565329bb661a7	01	Fritadas Amazonas		4	2016-02-22
2016022211541356cb3d35194f5	ALMACENES FERROELECTRICO S A			2016-02-22	Factura Ingresada Manualmente		5	20151123095907565329bb661a7	01	ALMACENES FERROELECTRICO S A		9	2016-02-22
2016022211562756cb3dbbe19d8	TIENDAS INDUSTRIALES ASOCIADAS (TIA) S.A.			2016-02-22	Factura Ingresada Manualmente		5	20151123095907565329bb661a7	01	TIENDAS INDUSTRIALES ASOCIADAS (TIA) S.A.		9	2016-02-22
2016022211582556cb3e31155fd	TIENDAS INDUSTRIALES ASOCIADAS (TIA) S.A.			2016-02-22	Factura Ingresada Manualmente		5	20151123095907565329bb661a7	01	TIENDAS INDUSTRIALES ASOCIADAS (TIA) S.A.		1	2016-02-22
2016022212040856cb3f884bbd4	Fritadas Amazonas			2016-02-22	Factura Ingresada Manualmente		5	20151123095907565329bb661a7	01	Fritadas Amazonas		4	2016-02-22
2016022212055656cb3ff4690f3	Fritadas Amazonas			2016-02-22	Factura Ingresada Manualmente		5	20151123095907565329bb661a7	01	Fritadas Amazonas			2016-02-22
2016030112092656d5ccc66d997	Fritadas Amazonas			2016-03-01	Factura Ingresada Manualmente		5	20151123120122565346625394d	01	Fritadas Amazonas			2016-03-01
2016030112150556d5ce19a70ba	Fritadas Amazonas			2016-03-01	Factura Ingresada Manualmente		5	20151123120122565346625394d	01	Fritadas Amazonas		2	2016-03-01
2016030112200256d5cf42a0e27	PETROWORLD SA			2016-03-01	Factura Ingresada Manualmente		5	20151123120122565346625394d	01	PETROWORLD SA			2016-03-01
2016030112263856d5d0ce451c8	TIENDAS INDUSTRIALES ASOCIADAS (TIA) S.A.			2016-03-01	Factura Ingresada Manualmente		5	20151123120122565346625394d	01	TIENDAS INDUSTRIALES ASOCIADAS (TIA) S.A.			2016-03-01
2016030112330056d5d24d00071	Fritadas Amazonas			2016-03-01	Factura Ingresada Manualmente		5	20151123120122565346625394d	01	Fritadas Amazonas			2016-03-01
2016030114114156d5e96dc8450	Fritadas Amazonas			2016-03-01	Factura Ingresada Manualmente		5	20151123120122565346625394d	01	Fritadas Amazonas		1	2016-03-01
\.


--
-- TOC entry 2095 (class 0 OID 18431)
-- Dependencies: 188 2105
-- Data for Name: detalles_fisicas; Type: TABLE DATA; Schema: facturanext; Owner: postgres
--

COPY detalles_fisicas (id, id_fisica, codigo, cantidad, descripcion, v_unitario, v_total, descuento, iva) FROM stdin;
2016030114114156d5e96dd0ea6	2016030114114156d5e96dd093a		1	uihj	3	9	0	Si
\.


--
-- TOC entry 2096 (class 0 OID 18437)
-- Dependencies: 189 2105
-- Data for Name: facturas; Type: TABLE DATA; Schema: facturanext; Owner: postgres
--

COPY facturas (id, num_factura, id_proveedor, fecha_emision, subtotal, impuestos, propina, total_factura, fecha_creacion, stado, id_correo, tipo_doc) FROM stdin;
20151126173312565788a87279d	002-010-000044463	20151126173312565788a87272d	2015-08-10	164.06	0.00	0.00	183.75	2015-11-26 17:33:12-05	1	20151126173312565788a8724c9	01
2015112617442156578b45140dd	002-010-000012997	2015112617442156578b451405e	2015-10-04	17.41	0.00	0.00	19.50	2015-11-26 17:44:21-05	1	2015112617442156578b4513eba	01
2015112618012656578f4621db5	027-005-000675311	2015112618012656578f4621d36	2015-08-10	51.15	0.01	0	55.53	2015-11-26 18:01:26-05	1	2015112618012656578f4621a76	01
201511271544055658c095dcb79	001-022-000055707	201511271544055658c095dcb05	2015-11-26	26.79 	0.00	0.00	30.00	2015-11-27 15:44:05-05	1	201511271544055658c095dc80a	01
201511271548565658c1b8d6335	001-022-000054726	201511271544055658c095dcb05	2015-11-20	26.79 	0.00	0.00	30.00	2015-11-27 15:48:56-05	1	201511271548565658c1b8d602f	01
201511271552145658c27ea6094	001-022-000044205	201511271544055658c095dcb05	2015-09-23	16.96 	0.00	0.00	19.00	2015-11-27 15:52:14-05	1	201511271552145658c27ea5dd8	01
201511271605465658c5aa1e3d8	001-022-000042103	201511271544055658c095dcb05	2015-09-11	13.39 	0.00	0.00	15.00	2015-11-27 16:05:46-05	1	201511271605465658c5aa1e140	01
201511271607485658c624c9827	001-022-000040978	201511271544055658c095dcb05	2015-09-04	35.71 	0.00	0.00	40.00	2015-11-27 16:07:48-05	1	201511271607485658c624c9500	01
201511271621125658c948c6f48	001-022-000040824	201511271544055658c095dcb05	2015-09-03	16.96 	0.00	0.00	19.00	2015-11-27 16:21:12-05	1	201511271621125658c948c6c48	01
201511271623255658c9cdec31a	001-022-000038166	201511271544055658c095dcb05	2015-08-19	22.32 	0.00	0.00	25.00	2015-11-27 16:23:25-05	1	201511271623255658c9cdec117	01
201511271733065658da2281461	361-023-000011882	201511271733065658da22813e2	2015-10-14	5.17	0.32	0.00	5.17	2015-11-27 17:33:06-05	1	201511271733065658da2281280	01
20151130104548565c6f2c423ac	002-003-000056452	20151130104548565c6f2c4230a	2015-09-30	4.46	0.00	0.0	5.0	2015-11-30 10:45:48-05	1	20151130104548565c6f2c42058	01
20151130112212565c77b4e31b5	003-001-000040399	20151130112212565c77b4e3115	2015-09-29	15.63	0	0	17.50	2015-11-30 11:22:12-05	1	20151130112212565c77b4e2eba	01
20151130170708565cc88cb5792	002-011-000014701	20151130170708565cc88cb570c	2015-08-05	940.38	0.00	0.00	1053.23	2015-11-30 17:07:08-05	1	20151130170708565cc88cb5555	01
20151130170808565cc8c86258a	002-011-000014707	20151130170708565cc88cb570c	2015-08-05	40.58	0.00	0.00	45.45	2015-11-30 17:08:08-05	1	20151130170808565cc8c8622fc	01
20151130172347565ccc73ab98e	002-010-000043710	20151126173312565788a87272d	2015-08-06	27.91	0.00	0.00	31.26	2015-11-30 17:23:47-05	1	20151130172347565ccc73ab7c3	01
20151130172426565ccc9a8c0a6	002-010-000043872	20151126173312565788a87272d	2015-08-06	2.41	0.00	0.00	2.70	2015-11-30 17:24:26-05	1	20151130172426565ccc9a8be5a	01
20151202152527565f53b7eb75e	003-001-000039593	20151130112212565c77b4e3115	2015-09-22	8.91	0	0	9.98	2015-12-02 15:25:27-05	1	20151202152527565f53b7eb3ac	01
201512041103575661b96dba16c	014-903-000055767	201512041103575661b96dba0c9	2015-11-02	39.45	0.00	0.00	44.18	2015-12-04 11:03:57-05	1	201512041103575661b96db9bfa	01
201512291153175682ba7d2d82e	002-010-000021056	2015112617442156578b451405e	2015-12-16	7.81	0.00	0.00	8.75	2015-12-29 11:53:17-05	1	201512291153175682ba7d2d2ef	01
2016020311390756b22d2b329c3	002-010-000043872	20151126173312565788a87272d	2015-08-06	2.41	0.00	0.00	2.70	2016-02-03 14:39:07-05	1	2016020311390756b22d2b326e9	01
2016020317135956b27ba746725	002-010-000043872	20151126173312565788a87272d	2015-08-06	2.41	0.00	0.00	2.70	2016-02-03 20:13:59-05	1	2016020317135956b27ba746524	01
2016020317144156b27bd15ec93	002-010-000043872	20151126173312565788a87272d	2015-08-06	2.41	0.00	0.00	2.70	2016-02-03 20:14:41-05	1	2016020317144156b27bd15e919	01
\.


--
-- TOC entry 2097 (class 0 OID 18443)
-- Dependencies: 190 2105
-- Data for Name: facturas_fisica; Type: TABLE DATA; Schema: facturanext; Owner: postgres
--

COPY facturas_fisica (id, id_proveedor, id_cliente, id_usuario, tipo_consumo, tipo_documento, fecha_creacion, fecha_emision, num_fac, subtotal, impuestos, propina, iva0, iva12, iva, descuento, total_fac, stado, id_correo) FROM stdin;
2016030114114156d5e96dd093a	2015112617442156578b451405e	20151123120122565346625394d	20151123120122565346625394d	1	01	2016-03-01	2016-03-01	766-666-666666666	2.679	0	0	0.000	2.679	0.321	0.000	3.000	0	2016030114114156d5e96dc8450
\.


--
-- TOC entry 2133 (class 0 OID 0)
-- Dependencies: 191
-- Name: facturas_total_factura_seq; Type: SEQUENCE SET; Schema: facturanext; Owner: postgres
--

SELECT pg_catalog.setval('facturas_total_factura_seq', 1, false);


--
-- TOC entry 2099 (class 0 OID 18451)
-- Dependencies: 192 2105
-- Data for Name: proveedores; Type: TABLE DATA; Schema: facturanext; Owner: postgres
--

COPY proveedores (id, ruc_proveedor, nombre_proveedor, dir_matriz, fecha_creacion, stado, nombre_comercial) FROM stdin;
20151126173312565788a87272d	1091729683001	ALMACENES FERROELECTRICO S A	SUCRE 13 14 Y ROSALIA ROSALES -  Telef - 062609321	2015-11-26 17:33:12-05	0	\N
2015112617442156578b451405e	1001566379001	Fritadas Amazonas	PANAMERICANA NORTE KM 96 Y LUIS OLMEDO JATIVA,  ATUNTAQUI – IMBABURA	2015-11-26 17:44:21-05	0	\N
2015112618012656578f4621d36	0990017514001	TIENDAS INDUSTRIALES ASOCIADAS (TIA) S.A.	CHIMBORAZO 217 Y LUQUE	2015-11-26 18:01:26-05	0	\N
201511271544055658c095dcb05	1791280792001	PETROWORLD SA	AV. REPUBLICA 1530 E  INGLATERRA EDIF. BANDERAS	2015-11-27 15:44:05-05	0	\N
201511271733065658da22813e2	0990858322001	Cruz Azul	Urb. Ciudad Colón, Mz. 275 Solar 5 Etapa Tres Edif. Corporativo Uno Piso 4 Ofic 423	2015-11-27 17:33:06-05	0	\N
20151130104548565c6f2c4230a	1090008516001	PRIMAX IBARRA	IMBABURA / IBARRA / AV. MARIANO ACOSTA 21-026 Y LUCIO TARQUINO PAEZ	2015-11-30 10:45:48-05	0	\N
20151130112212565c77b4e3115	1792073804001	GUS	BOSMEDIANO E13-20 Y SERGIO JATIVA	2015-11-30 11:22:12-05	0	\N
20151130170708565cc88cb570c	1091739417001	PROHIERROS S.C.C	SUCRE 1263 Y OBISPO MOSQUERA -  Telef - 062640290	2015-11-30 17:07:08-05	0	\N
201512041103575661b96dba0c9	1790041220001	COMERCIAL KYWI S.A.	AV. 10 DE AGOSTO N24-59 Y LUIS CORDERO	2015-12-04 11:03:57-05	0	\N
2016021116490656bd01d217f04	1002857009001	ACOSTA CAICEDO CRISTINA ALEXANDRA	IMBABURA / IBARRA / ALEJANDRO LOPEZ 6-79	2016-02-11 19:49:06-05	0	\N
\.


SET search_path = localizacion, pg_catalog;

--
-- TOC entry 2075 (class 0 OID 17511)
-- Dependencies: 168 2105
-- Data for Name: ciudad; Type: TABLE DATA; Schema: localizacion; Owner: nextbook
--

COPY ciudad (id, id_provincia, nom_ciudad, fecha, stado) FROM stdin;
201503261230365514423c344aa	20150326115500551439e48e114	ALAUSI	12:30:36-05	1
201503261230365514423c354f0	20150326115500551439e48e114	CHAMBO	12:30:36-05	1
201503261230365514423c35736	20150326115500551439e48e114	CHUNCHI	12:30:36-05	1
201503261230365514423c35914	20150326115500551439e48e114	COLTA	12:30:36-05	1
201503261230365514423c35afc	20150326115500551439e48e114	CUMANDA	12:30:36-05	1
201503261230365514423c35d14	20150326115500551439e48e114	GUAMOTE	12:30:36-05	1
201503261230365514423c35f43	20150326115500551439e48e114	GUANO	12:30:36-05	1
201503261230365514423c36112	20150326115500551439e48e114	PALLATANGA	12:30:36-05	1
201503261230365514423c362cd	20150326115500551439e48e114	PENIPE	12:30:36-05	1
201503261230365514423c3647a	20150326115500551439e48e114	RIOBAMBA	12:30:36-05	1
2015032612565655144868b33d9	20150326115500551439e48e30a	LA MANA	12:56:56-05	1
2015032612565655144868b573d	20150326115500551439e48e30a	LATACUNGA	12:56:56-05	1
2015032612565655144868b5a67	20150326115500551439e48e30a	PANGUA	12:56:56-05	1
2015032612113655143dc83e464	20150326115500551439e48586a	CAMILO PONCE ENRIQUEZ	12:11:36-05	1
2015032612113655143dc853ebb	20150326115500551439e48586a	CHORDELEG	12:11:36-05	1
2015032612113655143dc854166	20150326115500551439e48586a	CUENCA	12:11:36-05	1
2015032612113655143dc854388	20150326115500551439e48586a	EL PAN	12:11:36-05	1
2015032612113655143dc8545b9	20150326115500551439e48586a	GIRON	12:11:36-05	1
2015032612113655143dc8547c2	20150326115500551439e48586a	GUACHAPALA	12:11:36-05	1
2015032612113655143dc854a0d	20150326115500551439e48586a	GUALACEO	12:11:36-05	1
2015032612113655143dc854bb6	20150326115500551439e48586a	NABON	12:11:36-05	1
2015032612113655143dc854d26	20150326115500551439e48586a	OÑA	12:11:36-05	1
2015032612113655143dc854ed9	20150326115500551439e48586a	PAUTE	12:11:36-05	1
2015032612113655143dc8550cc	20150326115500551439e48586a	PUCARA	12:11:36-05	1
2015032612113655143dc855262	20150326115500551439e48586a	SAN FERNANDO	12:11:36-05	1
2015032612113655143dc855424	20150326115500551439e48586a	SANTA ISABEL	12:11:36-05	1
2015032612113655143dc85564c	20150326115500551439e48586a	SEVILLA DE ORO	12:11:36-05	1
2015032612113655143dc8557fa	20150326115500551439e48586a	SIGSIG	12:11:36-05	1
2015032612565655144868b5bfc	20150326115500551439e48e30a	PUJILI	12:56:56-05	1
2015032612565655144868b5d80	20150326115500551439e48e30a	SALCEDO	12:56:56-05	1
2015032612565655144868b5eeb	20150326115500551439e48e30a	SAQUISILI	12:56:56-05	1
2015032612565655144868b6093	20150326115500551439e48e30a	SIGCHOS	12:56:56-05	1
20150326125908551448ecc5830	20150326115500551439e48e503	ARENILLAS	12:59:08-05	1
20150326125908551448ecc9a95	20150326115500551439e48e503	ATAHUALPA	12:59:08-05	1
20150326125908551448ecc9d3f	20150326115500551439e48e503	BALSAS	12:59:08-05	1
20150326125908551448ecc9f6e	20150326115500551439e48e503	CHILLA	12:59:08-05	1
20150326125908551448ecca145	20150326115500551439e48e503	EL GUABO	12:59:08-05	1
20150326125908551448ecca317	20150326115500551439e48e503	HUAQUILLAS	12:59:08-05	1
20150326125908551448ecca4e2	20150326115500551439e48e503	LAS LAJAS	12:59:08-05	1
20150326125908551448ecca69b	20150326115500551439e48e503	MACHALA	12:59:08-05	1
20150326125908551448ecca85d	20150326115500551439e48e503	MARCABELI	12:59:08-05	1
20150326125908551448eccaa05	20150326115500551439e48e503	PASAJE	12:59:08-05	1
20150326125908551448eccac73	20150326115500551439e48e503	PIÑAS	12:59:08-05	1
20150326125908551448eccaeb2	20150326115500551439e48e503	PORTOVELO	12:59:08-05	1
20150326125908551448eccb050	20150326115500551439e48e503	SANTA ROSA	12:59:08-05	1
20150326125908551448eccb206	20150326115500551439e48e503	ZARUMA	12:59:08-05	1
201503261300455514494d0f2dc	20150326115500551439e48e716	ATACAMES	13:00:45-05	1
201503261300455514494d10f4c	20150326115500551439e48e716	ELOY ALFARO	13:00:45-05	1
201503261300455514494d111a2	20150326115500551439e48e716	ESMERALDAS	13:00:45-05	1
201503261300455514494d11374	20150326115500551439e48e716	LA CONCORDIA	13:00:45-05	1
201503261300455514494d1153f	20150326115500551439e48e716	MUISNE	13:00:45-05	1
2015032612160555143ed56913a	20150326115500551439e48dac4	CALUMA	12:16:05-05	1
2015032612160555143ed56c64f	20150326115500551439e48dac4	CHILLANES	12:16:05-05	1
2015032612160555143ed56c8da	20150326115500551439e48dac4	ECHEANDIA	12:16:05-05	1
2015032612160555143ed56cada	20150326115500551439e48dac4	GUARANDA	12:16:05-05	1
2015032612160555143ed56cd4c	20150326115500551439e48dac4	LAS NAVES	12:16:05-05	1
2015032612160555143ed56cf66	20150326115500551439e48dac4	SAN JOSE DE CHIMBO	12:16:05-05	1
2015032612160555143ed56d153	20150326115500551439e48dac4	SAN MIGUEL	12:16:05-05	1
20150326122108551440046220e	20150326115500551439e48dd2d	AZOGUES	12:21:08-05	1
20150326122108551440046550d	20150326115500551439e48dd2d	BIBLIAN	12:21:08-05	1
20150326122108551440046576e	20150326115500551439e48dd2d	CAÑAR	12:21:08-05	1
201503261221085514400465948	20150326115500551439e48dd2d	DELEG	12:21:08-05	1
201503261221085514400465b1b	20150326115500551439e48dd2d	EL TAMBO	12:21:08-05	1
201503261221085514400465cc5	20150326115500551439e48dd2d	LA TRONCAL	12:21:08-05	1
201503261221085514400465ec1	20150326115500551439e48dd2d	SUSCAL	12:21:08-05	1
20150326122401551440b13f1aa	20150326115500551439e48df24	BOLIVAR	12:24:01-05	1
20150326122401551440b1497b0	20150326115500551439e48df24	ESPEJO	12:24:01-05	1
20150326122401551440b149a56	20150326115500551439e48df24	MIRA	12:24:01-05	1
20150326122401551440b149c31	20150326115500551439e48df24	MONTUFAR	12:24:01-05	1
20150326122401551440b149e04	20150326115500551439e48df24	SAN PEDRO DE HUACA	12:24:01-05	1
20150326122401551440b149fc8	20150326115500551439e48df24	TULCAN	12:24:01-05	1
201503261300455514494d11719	20150326115500551439e48e716	QUININDE	13:00:45-05	1
201503261300455514494d11c74	20150326115500551439e48e716	RIOVERDE	13:00:45-05	1
201503261300455514494d11e40	20150326115500551439e48e716	SAN LORENZO	13:00:45-05	1
201503261302065514499e379e7	20150326115500551439e48e8dd	ISABELA	13:02:06-05	1
201503261302065514499e3a465	20150326115500551439e48e8dd	SAN CRISTOBAL	13:02:06-05	1
201503261302065514499e3a74b	20150326115500551439e48e8dd	SANTA CRUZ	13:02:06-05	1
20150326130342551449fed028f	20150326115500551439e48eaa8	ALFREDO BAQUERIZO MORENO	13:03:42-05	1
20150326130342551449fed3623	20150326115500551439e48eaa8	BALAO	13:03:42-05	1
20150326130342551449fed3972	20150326115500551439e48eaa8	BALZAR	13:03:42-05	1
20150326130342551449fed3c00	20150326115500551439e48eaa8	COLIMES	13:03:42-05	1
20150326130342551449fed3ecf	20150326115500551439e48eaa8	CORONEL MARCELINO MARIDUEÑA	13:03:42-05	1
20150326130342551449fed4158	20150326115500551439e48eaa8	DAULE	13:03:42-05	1
20150326130342551449fed43de	20150326115500551439e48eaa8	DURAN	13:03:42-05	1
20150326130342551449fed45e1	20150326115500551439e48eaa8	EL EMPALME	13:03:42-05	1
20150326130342551449fed4800	20150326115500551439e48eaa8	EL TRIUNFO	13:03:42-05	1
20150326130342551449fed4a23	20150326115500551439e48eaa8	GENERAL ANTONIO ELIZALDE	13:03:42-05	1
20150326130342551449fed4bbf	20150326115500551439e48eaa8	GUAYAQUIL	13:03:42-05	1
20150326130342551449fed4d71	20150326115500551439e48eaa8	ISIDRO AYORA	13:03:42-05	1
20150326130342551449fed4f1f	20150326115500551439e48eaa8	LOMAS DE SARGENTILLO	13:03:42-05	1
20150326130342551449fed5088	20150326115500551439e48eaa8	MILAGRO	13:03:42-05	1
20150326130342551449fed51e0	20150326115500551439e48eaa8	NARANJAL	13:03:42-05	1
20150326130342551449fed5338	20150326115500551439e48eaa8	NARANJITO	13:03:42-05	1
20150326130342551449fed548e	20150326115500551439e48eaa8	NOBOL	13:03:42-05	1
20150326130342551449fed55f4	20150326115500551439e48eaa8	PALESTINA	13:03:42-05	1
20150326130342551449fed5748	20150326115500551439e48eaa8	PEDRO CARBO	13:03:42-05	1
20150326130342551449fed58b3	20150326115500551439e48eaa8	PLAYAS	13:03:42-05	1
20150326130342551449fed5a30	20150326115500551439e48eaa8	SAMBORONDON	13:03:42-05	1
20150326130342551449fed5bd4	20150326115500551439e48eaa8	SANTA LUCIA	13:03:42-05	1
20150326130342551449fed5d86	20150326115500551439e48eaa8	SIMON BOLIVAR	13:03:42-05	1
20150326130342551449fed5f26	20150326115500551439e48eaa8	URBINA JADO	13:03:42-05	1
20150326130342551449fed60fe	20150326115500551439e48eaa8	YAGUACHI	13:03:42-05	1
2015032613052855144a68c7f4e	20150326115500551439e48ec62	ANTONIO ANTE	13:05:28-05	1
2015032613052855144a68c8b52	20150326115500551439e48ec62	COTACACHI	13:05:28-05	1
2015032613052855144a68c8d97	20150326115500551439e48ec62	IBARRA	13:05:28-05	1
2015032613052855144a68c8f90	20150326115500551439e48ec62	OTAVALO	13:05:28-05	1
2015032613052855144a68c9166	20150326115500551439e48ec62	PIMAMPIRO	13:05:28-05	1
2015032613052855144a68c933a	20150326115500551439e48ec62	SAN MIGUEL DE URCUQUI	13:05:28-05	1
2015032613065355144abd5b246	20150326115500551439e48ee16	CALVAS	13:06:53-05	1
2015032613065355144abd5c302	20150326115500551439e48ee16	CATAMAYO	13:06:53-05	1
2015032613065355144abd5c52f	20150326115500551439e48ee16	CELICA	13:06:53-05	1
2015032613065355144abd5c727	20150326115500551439e48ee16	CHAGUARPAMBA	13:06:53-05	1
2015032613065355144abd5c933	20150326115500551439e48ee16	ESPINDOLA	13:06:53-05	1
2015032613065355144abd5cb17	20150326115500551439e48ee16	GONZANAMA	13:06:53-05	1
2015032613065355144abd5ccd0	20150326115500551439e48ee16	LOJA	13:06:53-05	1
2015032613065355144abd5ce44	20150326115500551439e48ee16	MACARA	13:06:53-05	1
2015032613065355144abd5cfde	20150326115500551439e48ee16	OLMEDO	13:06:53-05	1
2015032613065355144abd5d14f	20150326115500551439e48ee16	PALTAS	13:06:53-05	1
2015032613065355144abd5d2b5	20150326115500551439e48ee16	PINDAL	13:06:53-05	1
2015032613065355144abd5d43e	20150326115500551439e48ee16	PUYANGO	13:06:53-05	1
2015032613065355144abd5d57f	20150326115500551439e48ee16	QUILANGA	13:06:53-05	1
2015032613065355144abd5d6e8	20150326115500551439e48ee16	SARAGURO	13:06:53-05	1
2015032613065355144abd5d85a	20150326115500551439e48ee16	SOZORANGA	13:06:53-05	1
2015032613065355144abd5d9c3	20150326115500551439e48ee16	ZAPOTILLO	13:06:53-05	1
2015032613082155144b15e8cdd	20150326115500551439e48ef9b	BABA	13:08:21-05	1
2015032613082155144b15e9e3b	20150326115500551439e48ef9b	BABAHOYO	13:08:21-05	1
2015032613082155144b15ea066	20150326115500551439e48ef9b	BUENA FE	13:08:21-05	1
2015032613082155144b15ea29a	20150326115500551439e48ef9b	MOCACHE	13:08:21-05	1
2015032613082155144b15ea503	20150326115500551439e48ef9b	MONTALVO	13:08:21-05	1
2015032613082155144b15ea6c3	20150326115500551439e48ef9b	PALENQUE	13:08:21-05	1
2015032613082155144b15ea89e	20150326115500551439e48ef9b	PUEBLOVIEJO	13:08:21-05	1
2015032613082155144b15eaa22	20150326115500551439e48ef9b	QUEVEDO	13:08:21-05	1
2015032613082155144b15eab95	20150326115500551439e48ef9b	QUINSALOMA	13:08:21-05	1
2015032613082155144b15ead0c	20150326115500551439e48ef9b	URDANETA	13:08:21-05	1
2015032613082155144b15eae77	20150326115500551439e48ef9b	VALENCIA	13:08:21-05	1
2015032613082155144b15eafe6	20150326115500551439e48ef9b	VENTANAS	13:08:21-05	1
2015032613082155144b15eb154	20150326115500551439e48ef9b	VINCES	13:08:21-05	1
2015032613091855144b4e53eed	20150326115500551439e48f0fa	24 DE MAYO	13:09:18-05	1
2015032613091855144b4e55275	20150326115500551439e48f0fa	BOLIVAR	13:09:18-05	1
2015032613091855144b4e55532	20150326115500551439e48f0fa	CHONE	13:09:18-05	1
2015032613091855144b4e556f1	20150326115500551439e48f0fa	EL CARMEN	13:09:18-05	1
2015032613091855144b4e558c6	20150326115500551439e48f0fa	FLAVIO ALFARO	13:09:18-05	1
2015032613091855144b4e55a9b	20150326115500551439e48f0fa	JAMA	13:09:18-05	1
2015032613091855144b4e55ce9	20150326115500551439e48f0fa	JARAMIJO	13:09:18-05	1
2015032613091855144b4e55ead	20150326115500551439e48f0fa	JIPIJAPA	13:09:18-05	1
2015032613091855144b4e5604e	20150326115500551439e48f0fa	JUNIN	13:09:18-05	1
2015032613091855144b4e561b7	20150326115500551439e48f0fa	MANTA	13:09:18-05	1
2015032613091855144b4e56336	20150326115500551439e48f0fa	MONTECRISTI	13:09:18-05	1
2015032613091855144b4e564cb	20150326115500551439e48f0fa	OLMEDO	13:09:18-05	1
2015032613091855144b4e56752	20150326115500551439e48f0fa	PAJAN	13:09:18-05	1
2015032613091855144b4e568c8	20150326115500551439e48f0fa	PEDERNALES	13:09:18-05	1
2015032613091855144b4e56a32	20150326115500551439e48f0fa	PICHINCHA	13:09:18-05	1
2015032613091855144b4e56ba5	20150326115500551439e48f0fa	PORTOVIEJO	13:09:18-05	1
2015032613091855144b4e56d13	20150326115500551439e48f0fa	PUERTO LOPEZ	13:09:18-05	1
2015032613091855144b4e56e75	20150326115500551439e48f0fa	ROCAFUERTE	13:09:18-05	1
2015032613091855144b4e56fda	20150326115500551439e48f0fa	SAN VICENTE	13:09:18-05	1
2015032613091855144b4e5713a	20150326115500551439e48f0fa	SANTA ANA	13:09:18-05	1
2015032613091855144b4e57297	20150326115500551439e48f0fa	SUCRE	13:09:18-05	1
2015032613091855144b4e573f3	20150326115500551439e48f0fa	TOSAGUA	13:09:18-05	1
2015032613110855144bbca054d	20150326115500551439e48f290	GUALAQUIZA	13:11:08-05	1
2015032613110855144bbca65d5	20150326115500551439e48f290	HUAMBOYA	13:11:08-05	1
2015032613110855144bbca6855	20150326115500551439e48f290	LIMON INDANZA	13:11:08-05	1
2015032613110855144bbca6a2c	20150326115500551439e48f290	LOGROÑO	13:11:08-05	1
2015032613110855144bbca6c5b	20150326115500551439e48f290	MORONA	13:11:08-05	1
2015032613110855144bbca6e12	20150326115500551439e48f290	PABLO VI	13:11:08-05	1
2015032613110855144bbca6fee	20150326115500551439e48f290	PALORA	13:11:08-05	1
2015032613110855144bbca71d9	20150326115500551439e48f290	SAN JUAN BOSCO	13:11:08-05	1
2015032613110855144bbca7392	20150326115500551439e48f290	SANTIAGO	13:11:08-05	1
2015032613110855144bbca7538	20150326115500551439e48f290	SUCUA	13:11:08-05	1
2015032613110855144bbca76e2	20150326115500551439e48f290	TAISHA	13:11:08-05	1
2015032613110855144bbca789c	20150326115500551439e48f290	TIWINTZA	13:11:08-05	1
2015032613122555144c09b3db5	20150326115500551439e48f43d	ARCHIDONA	13:12:25-05	1
2015032613122555144c09b4a47	20150326115500551439e48f43d	CARLOS JULIO AROSEMENA	13:12:25-05	1
2015032613122555144c09b4c97	20150326115500551439e48f43d	EL CHACO	13:12:25-05	1
2015032613122555144c09b4e8f	20150326115500551439e48f43d	QUIJOS	13:12:25-05	1
2015032613122555144c09b50b8	20150326115500551439e48f43d	TENA	13:12:25-05	1
2015032613133255144c4c00fc5	20150326115500551439e48f5b8	AGUARICO	13:13:32-05	1
2015032613133255144c4c063c6	20150326115500551439e48f5b8	LA JOYA DE LOS SACHAS	13:13:32-05	1
2015032613133255144c4c06641	20150326115500551439e48f5b8	LORETO	13:13:32-05	1
2015032613133255144c4c0686b	20150326115500551439e48f5b8	ORELLANA	13:13:32-05	1
2015032613145755144ca14bec4	20150326115500551439e48f72a	ARAJUNO	13:14:57-05	1
2015032613145755144ca14cf86	20150326115500551439e48f72a	MERA	13:14:57-05	1
2015032613145755144ca14d1ae	20150326115500551439e48f72a	PASTAZA	13:14:57-05	1
2015032613145755144ca14d360	20150326115500551439e48f72a	SANTA CLARA	13:14:57-05	1
2015032613171355144d299b082	20150326115500551439e48f899	CAYAMBE	13:17:13-05	1
2015032613171355144d299c34c	20150326115500551439e48f899	MEJIA	13:17:13-05	1
2015032613171355144d299c5e4	20150326115500551439e48f899	PEDRO MONCAYO	13:17:13-05	1
2015032613171355144d299c7b6	20150326115500551439e48f899	PEDRO VICENTE MALDONADO	13:17:13-05	1
2015032613171355144d299c961	20150326115500551439e48f899	PUERTO QUITO	13:17:13-05	1
2015032613171355144d299caff	20150326115500551439e48f899	QUITO	13:17:13-05	1
2015032613171355144d299cca2	20150326115500551439e48f899	RUMIÑAHUI	13:17:13-05	1
2015032613171355144d299ce13	20150326115500551439e48f899	SAN MIGUEL DE LOS BANCOS	13:17:13-05	1
2015032613180255144d5a21fef	20150326115500551439e48fa09	LIBERTAR	13:18:02-05	1
2015032613180255144d5a24591	20150326115500551439e48fa09	SALINAS	13:18:02-05	1
2015032613180255144d5a2491e	20150326115500551439e48fa09	SANTA ELENA	13:18:02-05	1
2015032613185855144d929f2e9	20150326115500551439e48fb5f	SANTO DOMINGO DE LOS TSACHILAS	13:18:58-05	1
2015032613194655144dc243157	20150326115500551439e48fcc6	CASCALES	13:19:46-05	1
2015032613194655144dc244253	20150326115500551439e48fcc6	CUYABENO	13:19:46-05	1
2015032613194655144dc2444d9	20150326115500551439e48fcc6	GONZALO PIZARRO	13:19:46-05	1
2015032613194655144dc2446bf	20150326115500551439e48fcc6	LAGO AGRIO	13:19:46-05	1
2015032613194655144dc244894	20150326115500551439e48fcc6	PUTUMAYO	13:19:46-05	1
2015032613194655144dc244a56	20150326115500551439e48fcc6	SHUSHUFINDI	13:19:46-05	1
2015032613194655144dc244c2e	20150326115500551439e48fcc6	SUCUMBIOS	13:19:46-05	1
2015032613215855144e46d3b95	20150326115500551439e48fe2f	AMBATO	13:21:58-05	1
2015032613215855144e46d4ce4	20150326115500551439e48fe2f	BAÑOS	13:21:58-05	1
2015032613215855144e46d4fa9	20150326115500551439e48fe2f	CEVALLOS	13:21:58-05	1
2015032613215855144e46d51af	20150326115500551439e48fe2f	MOCHA	13:21:58-05	1
2015032613215855144e46d53f6	20150326115500551439e48fe2f	PATATE	13:21:58-05	1
2015032613215855144e46d55f1	20150326115500551439e48fe2f	QUERO	13:21:58-05	1
2015032613215855144e46d57e2	20150326115500551439e48fe2f	SAN PEDRO DE PELILEO	13:21:58-05	1
2015032613215855144e46d5951	20150326115500551439e48fe2f	SANTIAGO DE PILLARO	13:21:58-05	1
2015032613215855144e46d5aeb	20150326115500551439e48fe2f	TISALEO	13:21:58-05	1
2015032613240355144ec34364a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	13:24:03-05	1
2015032613240355144ec346880	20150326115500551439e48ff9d	CHINCHIPE	13:24:03-05	1
2015032613240355144ec346ac5	20150326115500551439e48ff9d	EL PANGUI	13:24:03-05	1
2015032613240355144ec346c7c	20150326115500551439e48ff9d	NANGARITZA	13:24:03-05	1
2015032613240355144ec346e28	20150326115500551439e48ff9d	PALANDA	13:24:03-05	1
2015032613240355144ec346fde	20150326115500551439e48ff9d	PAQUISHA	13:24:03-05	1
2015032613240355144ec3471cd	20150326115500551439e48ff9d	YACUAMBI	13:24:03-05	1
2015032613240355144ec347362	20150326115500551439e48ff9d	YANTZAZA	13:24:03-05	1
2015032613240355144ec3474f3	20150326115500551439e48ff9d	ZAMORA	13:24:03-05	1
2015032613241255144eccb8720	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	13:24:12-05	1
2015032613241255144eccb99d4	20150326115500551439e48ff9d	CHINCHIPE	13:24:12-05	1
2015032613241255144eccb9c39	20150326115500551439e48ff9d	EL PANGUI	13:24:12-05	1
2015032613241255144eccb9e30	20150326115500551439e48ff9d	NANGARITZA	13:24:12-05	1
2015032613241255144eccb9ffe	20150326115500551439e48ff9d	PALANDA	13:24:12-05	1
2015032613241255144eccba1e4	20150326115500551439e48ff9d	PAQUISHA	13:24:12-05	1
2015032613241255144eccba3f5	20150326115500551439e48ff9d	YACUAMBI	13:24:12-05	1
2015032613241255144eccba596	20150326115500551439e48ff9d	YANTZAZA	13:24:12-05	1
2015032613241255144eccba74a	20150326115500551439e48ff9d	ZAMORA	13:24:12-05	1
20150326170138551481c227cd5	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:01:38-05	1
20150326170138551481c245809	20150326115500551439e48ff9d	CHINCHIPE	17:01:38-05	1
20150326170138551481c245b59	20150326115500551439e48ff9d	EL PANGUI	17:01:38-05	1
20150326170138551481c245df3	20150326115500551439e48ff9d	NANGARITZA	17:01:38-05	1
20150326170138551481c24604e	20150326115500551439e48ff9d	PALANDA	17:01:38-05	1
20150326170138551481c2462f7	20150326115500551439e48ff9d	PAQUISHA	17:01:38-05	1
20150326170138551481c246555	20150326115500551439e48ff9d	YACUAMBI	17:01:38-05	1
20150326170138551481c246751	20150326115500551439e48ff9d	YANTZAZA	17:01:38-05	1
20150326170138551481c246933	20150326115500551439e48ff9d	ZAMORA	17:01:38-05	1
201503261703145514822293394	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:03:14-05	1
201503261703145514822299694	20150326115500551439e48ff9d	CHINCHIPE	17:03:14-05	1
20150326170314551482229991a	20150326115500551439e48ff9d	EL PANGUI	17:03:14-05	1
201503261703145514822299b01	20150326115500551439e48ff9d	NANGARITZA	17:03:14-05	1
201503261703145514822299cfc	20150326115500551439e48ff9d	PALANDA	17:03:14-05	1
201503261703145514822299f8c	20150326115500551439e48ff9d	PAQUISHA	17:03:14-05	1
20150326170314551482229a2ea	20150326115500551439e48ff9d	YACUAMBI	17:03:14-05	1
20150326170314551482229a515	20150326115500551439e48ff9d	YANTZAZA	17:03:14-05	1
20150326170314551482229a72c	20150326115500551439e48ff9d	ZAMORA	17:03:14-05	1
2015032617040155148251744ae	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:04:01-05	1
201503261704015514825178021	20150326115500551439e48ff9d	CHINCHIPE	17:04:01-05	1
201503261704015514825178302	20150326115500551439e48ff9d	EL PANGUI	17:04:01-05	1
20150326170401551482517859f	20150326115500551439e48ff9d	NANGARITZA	17:04:01-05	1
20150326170401551482517889f	20150326115500551439e48ff9d	PALANDA	17:04:01-05	1
201503261704015514825178b64	20150326115500551439e48ff9d	PAQUISHA	17:04:01-05	1
201503261704015514825178d8d	20150326115500551439e48ff9d	YACUAMBI	17:04:01-05	1
201503261704015514825178f1a	20150326115500551439e48ff9d	YANTZAZA	17:04:01-05	1
20150326170401551482517908a	20150326115500551439e48ff9d	ZAMORA	17:04:01-05	1
2015032617043855148276bf54c	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:04:38-05	1
2015032617043855148276c078d	20150326115500551439e48ff9d	CHINCHIPE	17:04:38-05	1
2015032617043855148276c09e9	20150326115500551439e48ff9d	EL PANGUI	17:04:38-05	1
2015032617043855148276c0bc3	20150326115500551439e48ff9d	NANGARITZA	17:04:38-05	1
2015032617043855148276c0ddc	20150326115500551439e48ff9d	PALANDA	17:04:38-05	1
2015032617043855148276c101c	20150326115500551439e48ff9d	PAQUISHA	17:04:38-05	1
2015032617043855148276c120f	20150326115500551439e48ff9d	YACUAMBI	17:04:38-05	1
2015032617043855148276c13ae	20150326115500551439e48ff9d	YANTZAZA	17:04:38-05	1
2015032617043855148276c1531	20150326115500551439e48ff9d	ZAMORA	17:04:38-05	1
2015032617045655148288cfb3b	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:04:56-05	1
2015032617045655148288d2a32	20150326115500551439e48ff9d	CHINCHIPE	17:04:56-05	1
2015032617045655148288d2d42	20150326115500551439e48ff9d	EL PANGUI	17:04:56-05	1
2015032617045655148288d3018	20150326115500551439e48ff9d	NANGARITZA	17:04:56-05	1
2015032617045655148288d3263	20150326115500551439e48ff9d	PALANDA	17:04:56-05	1
2015032617045655148288d3442	20150326115500551439e48ff9d	PAQUISHA	17:04:56-05	1
2015032617045655148288d35dc	20150326115500551439e48ff9d	YACUAMBI	17:04:56-05	1
2015032617045655148288d37cd	20150326115500551439e48ff9d	YANTZAZA	17:04:56-05	1
2015032617045655148288d39a3	20150326115500551439e48ff9d	ZAMORA	17:04:56-05	1
20150326170613551482d5f38e5	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:06:13-05	1
20150326170614551482d603e60	20150326115500551439e48ff9d	CHINCHIPE	17:06:14-05	1
20150326170614551482d6040c0	20150326115500551439e48ff9d	EL PANGUI	17:06:14-05	1
20150326170614551482d60429e	20150326115500551439e48ff9d	NANGARITZA	17:06:14-05	1
20150326170614551482d60447d	20150326115500551439e48ff9d	PALANDA	17:06:14-05	1
20150326170614551482d60464a	20150326115500551439e48ff9d	PAQUISHA	17:06:14-05	1
20150326170614551482d604826	20150326115500551439e48ff9d	YACUAMBI	17:06:14-05	1
20150326170614551482d6049be	20150326115500551439e48ff9d	YANTZAZA	17:06:14-05	1
20150326170614551482d604b90	20150326115500551439e48ff9d	ZAMORA	17:06:14-05	1
2015032617072055148318d1f57	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:07:20-05	1
2015032617072055148318d4519	20150326115500551439e48ff9d	CHINCHIPE	17:07:20-05	1
2015032617072055148318d47e6	20150326115500551439e48ff9d	EL PANGUI	17:07:20-05	1
2015032617072055148318d49dd	20150326115500551439e48ff9d	NANGARITZA	17:07:20-05	1
2015032617072055148318d4bcc	20150326115500551439e48ff9d	PALANDA	17:07:20-05	1
2015032617072055148318d4dac	20150326115500551439e48ff9d	PAQUISHA	17:07:20-05	1
2015032617072055148318d4f64	20150326115500551439e48ff9d	YACUAMBI	17:07:20-05	1
2015032617072055148318d50fe	20150326115500551439e48ff9d	YANTZAZA	17:07:20-05	1
2015032617072055148318d5286	20150326115500551439e48ff9d	ZAMORA	17:07:20-05	1
2015032617073355148325b51eb	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:07:33-05	1
2015032617073355148325b6f89	20150326115500551439e48ff9d	CHINCHIPE	17:07:33-05	1
2015032617073355148325b736a	20150326115500551439e48ff9d	EL PANGUI	17:07:33-05	1
2015032617073355148325b76d4	20150326115500551439e48ff9d	NANGARITZA	17:07:33-05	1
2015032617073355148325b7928	20150326115500551439e48ff9d	PALANDA	17:07:33-05	1
2015032617073355148325b7b91	20150326115500551439e48ff9d	PAQUISHA	17:07:33-05	1
2015032617073355148325b7ed3	20150326115500551439e48ff9d	YACUAMBI	17:07:33-05	1
2015032617073355148325b81e7	20150326115500551439e48ff9d	YANTZAZA	17:07:33-05	1
2015032617073355148325b8538	20150326115500551439e48ff9d	ZAMORA	17:07:33-05	1
201503261708035514834362384	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:08:03-05	1
201503261708035514834365c72	20150326115500551439e48ff9d	CHINCHIPE	17:08:03-05	1
201503261708035514834365f4b	20150326115500551439e48ff9d	EL PANGUI	17:08:03-05	1
20150326170803551483436615f	20150326115500551439e48ff9d	NANGARITZA	17:08:03-05	1
201503261708035514834366395	20150326115500551439e48ff9d	PALANDA	17:08:03-05	1
201503261708035514834366590	20150326115500551439e48ff9d	PAQUISHA	17:08:03-05	1
2015032617080355148343667d7	20150326115500551439e48ff9d	YACUAMBI	17:08:03-05	1
201503261708035514834366994	20150326115500551439e48ff9d	YANTZAZA	17:08:03-05	1
201503261708035514834366b39	20150326115500551439e48ff9d	ZAMORA	17:08:03-05	1
20150326170855551483776bd86	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:08:55-05	1
20150326170855551483776f7c4	20150326115500551439e48ff9d	CHINCHIPE	17:08:55-05	1
20150326170855551483776fa9e	20150326115500551439e48ff9d	EL PANGUI	17:08:55-05	1
20150326170855551483776fc77	20150326115500551439e48ff9d	NANGARITZA	17:08:55-05	1
20150326170855551483776fe20	20150326115500551439e48ff9d	PALANDA	17:08:55-05	1
20150326170855551483776ffb7	20150326115500551439e48ff9d	PAQUISHA	17:08:55-05	1
201503261708555514837770151	20150326115500551439e48ff9d	YACUAMBI	17:08:55-05	1
2015032617085555148377702ce	20150326115500551439e48ff9d	YANTZAZA	17:08:55-05	1
20150326170855551483777049c	20150326115500551439e48ff9d	ZAMORA	17:08:55-05	1
201503261713325514848c30647	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:13:32-05	1
201503261713325514848c3391b	20150326115500551439e48ff9d	CHINCHIPE	17:13:32-05	1
201503261713325514848c3610d	20150326115500551439e48ff9d	EL PANGUI	17:13:32-05	1
201503261713325514848c3636a	20150326115500551439e48ff9d	NANGARITZA	17:13:32-05	1
201503261713325514848c3654e	20150326115500551439e48ff9d	PALANDA	17:13:32-05	1
201503261713325514848c36758	20150326115500551439e48ff9d	PAQUISHA	17:13:32-05	1
201503261713325514848c36995	20150326115500551439e48ff9d	YACUAMBI	17:13:32-05	1
201503261713325514848c36b9b	20150326115500551439e48ff9d	YANTZAZA	17:13:32-05	1
201503261713325514848c36e5f	20150326115500551439e48ff9d	ZAMORA	17:13:32-05	1
201503261717175514856db2ab5	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:17:17-05	1
201503261717175514856db8232	20150326115500551439e48ff9d	CHINCHIPE	17:17:17-05	1
201503261717175514856db855e	20150326115500551439e48ff9d	EL PANGUI	17:17:17-05	1
201503261717175514856db879b	20150326115500551439e48ff9d	NANGARITZA	17:17:17-05	1
201503261717175514856db89a2	20150326115500551439e48ff9d	PALANDA	17:17:17-05	1
201503261717175514856db8b83	20150326115500551439e48ff9d	PAQUISHA	17:17:17-05	1
201503261717175514856db8ddc	20150326115500551439e48ff9d	YACUAMBI	17:17:17-05	1
201503261717175514856db9400	20150326115500551439e48ff9d	YANTZAZA	17:17:17-05	1
201503261717175514856db964f	20150326115500551439e48ff9d	ZAMORA	17:17:17-05	1
20150326171845551485c5190b3	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:18:45-05	1
20150326171845551485c51a2ea	20150326115500551439e48ff9d	CHINCHIPE	17:18:45-05	1
20150326171845551485c51a5ab	20150326115500551439e48ff9d	EL PANGUI	17:18:45-05	1
20150326171845551485c51a7a4	20150326115500551439e48ff9d	NANGARITZA	17:18:45-05	1
20150326171845551485c51a97d	20150326115500551439e48ff9d	PALANDA	17:18:45-05	1
20150326171845551485c51ab55	20150326115500551439e48ff9d	PAQUISHA	17:18:45-05	1
20150326171845551485c51ad2a	20150326115500551439e48ff9d	YACUAMBI	17:18:45-05	1
20150326171845551485c51ae95	20150326115500551439e48ff9d	YANTZAZA	17:18:45-05	1
20150326171845551485c51b0d3	20150326115500551439e48ff9d	ZAMORA	17:18:45-05	1
20150326171913551485e10a505	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:19:13-05	1
20150326171913551485e10b7c3	20150326115500551439e48ff9d	CHINCHIPE	17:19:13-05	1
20150326171913551485e10ba3e	20150326115500551439e48ff9d	EL PANGUI	17:19:13-05	1
20150326171913551485e10bc3b	20150326115500551439e48ff9d	NANGARITZA	17:19:13-05	1
20150326171913551485e10be0b	20150326115500551439e48ff9d	PALANDA	17:19:13-05	1
20150326171913551485e10bfd2	20150326115500551439e48ff9d	PAQUISHA	17:19:13-05	1
20150326171913551485e10c16a	20150326115500551439e48ff9d	YACUAMBI	17:19:13-05	1
20150326171913551485e10c2e5	20150326115500551439e48ff9d	YANTZAZA	17:19:13-05	1
20150326171913551485e10c44f	20150326115500551439e48ff9d	ZAMORA	17:19:13-05	1
20150326171952551486084f904	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:19:52-05	1
201503261719525514860851e02	20150326115500551439e48ff9d	CHINCHIPE	17:19:52-05	1
201503261719525514860852145	20150326115500551439e48ff9d	EL PANGUI	17:19:52-05	1
201503261719525514860852416	20150326115500551439e48ff9d	NANGARITZA	17:19:52-05	1
2015032617195255148608526d9	20150326115500551439e48ff9d	PALANDA	17:19:52-05	1
201503261719525514860852a05	20150326115500551439e48ff9d	PAQUISHA	17:19:52-05	1
201503261719525514860852d51	20150326115500551439e48ff9d	YACUAMBI	17:19:52-05	1
2015032617195255148608546fc	20150326115500551439e48ff9d	YANTZAZA	17:19:52-05	1
2015032617195255148608549bb	20150326115500551439e48ff9d	ZAMORA	17:19:52-05	1
201503261720115514861b2d884	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:20:11-05	1
201503261720115514861b2edef	20150326115500551439e48ff9d	CHINCHIPE	17:20:11-05	1
201503261720115514861b2f0af	20150326115500551439e48ff9d	EL PANGUI	17:20:11-05	1
201503261720115514861b2f2db	20150326115500551439e48ff9d	NANGARITZA	17:20:11-05	1
201503261720115514861b2f4ce	20150326115500551439e48ff9d	PALANDA	17:20:11-05	1
201503261720115514861b2f6aa	20150326115500551439e48ff9d	PAQUISHA	17:20:11-05	1
201503261720115514861b2f8a5	20150326115500551439e48ff9d	YACUAMBI	17:20:11-05	1
201503261720115514861b2fafd	20150326115500551439e48ff9d	YANTZAZA	17:20:11-05	1
201503261720115514861b2fc9c	20150326115500551439e48ff9d	ZAMORA	17:20:11-05	1
201503261720355514863310157	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:20:35-05	1
201503261720355514863312108	20150326115500551439e48ff9d	CHINCHIPE	17:20:35-05	1
201503261720355514863312380	20150326115500551439e48ff9d	EL PANGUI	17:20:35-05	1
20150326172035551486331254b	20150326115500551439e48ff9d	NANGARITZA	17:20:35-05	1
201503261720355514863312778	20150326115500551439e48ff9d	PALANDA	17:20:35-05	1
201503261720355514863312993	20150326115500551439e48ff9d	PAQUISHA	17:20:35-05	1
201503261720355514863312b84	20150326115500551439e48ff9d	YACUAMBI	17:20:35-05	1
201503261720355514863312d57	20150326115500551439e48ff9d	YANTZAZA	17:20:35-05	1
201503261720355514863312f0b	20150326115500551439e48ff9d	ZAMORA	17:20:35-05	1
20150326172251551486bbb12bc	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:22:51-05	1
20150326172251551486bbbebc7	20150326115500551439e48ff9d	CHINCHIPE	17:22:51-05	1
20150326172251551486bbbee84	20150326115500551439e48ff9d	EL PANGUI	17:22:51-05	1
20150326172251551486bbbf043	20150326115500551439e48ff9d	NANGARITZA	17:22:51-05	1
20150326172251551486bbbf1ed	20150326115500551439e48ff9d	PALANDA	17:22:51-05	1
20150326172251551486bbbf38c	20150326115500551439e48ff9d	PAQUISHA	17:22:51-05	1
20150326172251551486bbbf527	20150326115500551439e48ff9d	YACUAMBI	17:22:51-05	1
20150326172251551486bbbf69b	20150326115500551439e48ff9d	YANTZAZA	17:22:51-05	1
20150326172251551486bbbf817	20150326115500551439e48ff9d	ZAMORA	17:22:51-05	1
20150326172307551486cb167ea	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:23:07-05	1
20150326172307551486cb17c19	20150326115500551439e48ff9d	CHINCHIPE	17:23:07-05	1
20150326172307551486cb17e65	20150326115500551439e48ff9d	EL PANGUI	17:23:07-05	1
20150326172307551486cb180b9	20150326115500551439e48ff9d	NANGARITZA	17:23:07-05	1
20150326172307551486cb1828a	20150326115500551439e48ff9d	PALANDA	17:23:07-05	1
20150326172307551486cb184b3	20150326115500551439e48ff9d	PAQUISHA	17:23:07-05	1
20150326172307551486cb18667	20150326115500551439e48ff9d	YACUAMBI	17:23:07-05	1
20150326172307551486cb18835	20150326115500551439e48ff9d	YANTZAZA	17:23:07-05	1
20150326172307551486cb18a27	20150326115500551439e48ff9d	ZAMORA	17:23:07-05	1
20150326172352551486f8d9692	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:23:52-05	1
20150326172352551486f8dc3e5	20150326115500551439e48ff9d	CHINCHIPE	17:23:52-05	1
20150326172352551486f8dc69d	20150326115500551439e48ff9d	EL PANGUI	17:23:52-05	1
20150326172352551486f8dc869	20150326115500551439e48ff9d	NANGARITZA	17:23:52-05	1
20150326172352551486f8dca12	20150326115500551439e48ff9d	PALANDA	17:23:52-05	1
20150326172352551486f8dcbb7	20150326115500551439e48ff9d	PAQUISHA	17:23:52-05	1
20150326172352551486f8dcd78	20150326115500551439e48ff9d	YACUAMBI	17:23:52-05	1
20150326172352551486f8dcf24	20150326115500551439e48ff9d	YANTZAZA	17:23:52-05	1
20150326172352551486f8dd096	20150326115500551439e48ff9d	ZAMORA	17:23:52-05	1
201503261724025514870271de3	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:24:02-05	1
201503261724025514870273063	20150326115500551439e48ff9d	CHINCHIPE	17:24:02-05	1
201503261724025514870273349	20150326115500551439e48ff9d	EL PANGUI	17:24:02-05	1
201503261724025514870273578	20150326115500551439e48ff9d	NANGARITZA	17:24:02-05	1
20150326172402551487027378c	20150326115500551439e48ff9d	PALANDA	17:24:02-05	1
201503261724025514870273985	20150326115500551439e48ff9d	PAQUISHA	17:24:02-05	1
201503261724025514870273bbe	20150326115500551439e48ff9d	YACUAMBI	17:24:02-05	1
201503261724025514870273d48	20150326115500551439e48ff9d	YANTZAZA	17:24:02-05	1
201503261724025514870273edc	20150326115500551439e48ff9d	ZAMORA	17:24:02-05	1
201503261725505514876ed17c8	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:25:50-05	1
201503261725505514876ed63af	20150326115500551439e48ff9d	CHINCHIPE	17:25:50-05	1
201503261725505514876ed6625	20150326115500551439e48ff9d	EL PANGUI	17:25:50-05	1
201503261725505514876ed6808	20150326115500551439e48ff9d	NANGARITZA	17:25:50-05	1
201503261725505514876ed69ee	20150326115500551439e48ff9d	PALANDA	17:25:50-05	1
201503261725505514876ed6bb5	20150326115500551439e48ff9d	PAQUISHA	17:25:50-05	1
201503261725505514876ed6e2c	20150326115500551439e48ff9d	YACUAMBI	17:25:50-05	1
201503261725505514876ed7004	20150326115500551439e48ff9d	YANTZAZA	17:25:50-05	1
201503261725505514876ed71b1	20150326115500551439e48ff9d	ZAMORA	17:25:50-05	1
201503261726035514877bbd9bb	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:26:03-05	1
201503261726035514877bbec37	20150326115500551439e48ff9d	CHINCHIPE	17:26:03-05	1
201503261726035514877bbeea1	20150326115500551439e48ff9d	EL PANGUI	17:26:03-05	1
201503261726035514877bbf186	20150326115500551439e48ff9d	NANGARITZA	17:26:03-05	1
201503261726035514877bbf4cc	20150326115500551439e48ff9d	PALANDA	17:26:03-05	1
201503261726035514877bc45c9	20150326115500551439e48ff9d	PAQUISHA	17:26:03-05	1
201503261726035514877bc47de	20150326115500551439e48ff9d	YACUAMBI	17:26:03-05	1
201503261726035514877bc498f	20150326115500551439e48ff9d	YANTZAZA	17:26:03-05	1
201503261726035514877bc4b42	20150326115500551439e48ff9d	ZAMORA	17:26:03-05	1
20150326172611551487832615f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	17:26:11-05	1
201503261726115514878327669	20150326115500551439e48ff9d	CHINCHIPE	17:26:11-05	1
2015032617261155148783278cb	20150326115500551439e48ff9d	EL PANGUI	17:26:11-05	1
201503261726115514878327ac2	20150326115500551439e48ff9d	NANGARITZA	17:26:11-05	1
201503261726115514878327ca9	20150326115500551439e48ff9d	PALANDA	17:26:11-05	1
201503261726115514878327ef8	20150326115500551439e48ff9d	PAQUISHA	17:26:11-05	1
2015032617261155148783280de	20150326115500551439e48ff9d	YACUAMBI	17:26:11-05	1
2015032617261155148783282b3	20150326115500551439e48ff9d	YANTZAZA	17:26:11-05	1
201503261726115514878328459	20150326115500551439e48ff9d	ZAMORA	17:26:11-05	1
201503270928285515690cb4faf	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:28:28-05	1
201503270928285515690cbe335	20150326115500551439e48ff9d	CHINCHIPE	09:28:28-05	1
201503270928285515690cbe562	20150326115500551439e48ff9d	EL PANGUI	09:28:28-05	1
201503270928285515690cbe723	20150326115500551439e48ff9d	NANGARITZA	09:28:28-05	1
201503270928285515690cbe8d6	20150326115500551439e48ff9d	PALANDA	09:28:28-05	1
201503270928285515690cbea89	20150326115500551439e48ff9d	PAQUISHA	09:28:28-05	1
201503270928285515690cbed3a	20150326115500551439e48ff9d	YACUAMBI	09:28:28-05	1
201503270928285515690cbeeca	20150326115500551439e48ff9d	YANTZAZA	09:28:28-05	1
201503270928285515690cbf05b	20150326115500551439e48ff9d	ZAMORA	09:28:28-05	1
20150327093213551569ed189a5	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:32:13-05	1
20150327093213551569ed1c1ee	20150326115500551439e48ff9d	CHINCHIPE	09:32:13-05	1
20150327093213551569ed1c466	20150326115500551439e48ff9d	EL PANGUI	09:32:13-05	1
20150327093213551569ed1c651	20150326115500551439e48ff9d	NANGARITZA	09:32:13-05	1
20150327093213551569ed1c82a	20150326115500551439e48ff9d	PALANDA	09:32:13-05	1
20150327093213551569ed1ca0e	20150326115500551439e48ff9d	PAQUISHA	09:32:13-05	1
20150327093213551569ed1cbe3	20150326115500551439e48ff9d	YACUAMBI	09:32:13-05	1
20150327093213551569ed1cd80	20150326115500551439e48ff9d	YANTZAZA	09:32:13-05	1
20150327093213551569ed1cf17	20150326115500551439e48ff9d	ZAMORA	09:32:13-05	1
2015032709340055156a582ff11	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:34:00-05	1
2015032709340055156a5832d06	20150326115500551439e48ff9d	CHINCHIPE	09:34:00-05	1
2015032709340055156a5832f77	20150326115500551439e48ff9d	EL PANGUI	09:34:00-05	1
2015032709340055156a583317b	20150326115500551439e48ff9d	NANGARITZA	09:34:00-05	1
2015032709340055156a583335d	20150326115500551439e48ff9d	PALANDA	09:34:00-05	1
2015032709340055156a5833518	20150326115500551439e48ff9d	PAQUISHA	09:34:00-05	1
2015032709340055156a58336fd	20150326115500551439e48ff9d	YACUAMBI	09:34:00-05	1
2015032709340055156a583388f	20150326115500551439e48ff9d	YANTZAZA	09:34:00-05	1
2015032709340055156a5833a1a	20150326115500551439e48ff9d	ZAMORA	09:34:00-05	1
2015032709354355156abf1427b	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:35:43-05	1
2015032709354355156abf16a61	20150326115500551439e48ff9d	CHINCHIPE	09:35:43-05	1
2015032709354355156abf16cc9	20150326115500551439e48ff9d	EL PANGUI	09:35:43-05	1
2015032709354355156abf16ea7	20150326115500551439e48ff9d	NANGARITZA	09:35:43-05	1
2015032709354355156abf1709a	20150326115500551439e48ff9d	PALANDA	09:35:43-05	1
2015032709354355156abf17278	20150326115500551439e48ff9d	PAQUISHA	09:35:43-05	1
2015032709354355156abf17449	20150326115500551439e48ff9d	YACUAMBI	09:35:43-05	1
2015032709354355156abf17602	20150326115500551439e48ff9d	YANTZAZA	09:35:43-05	1
2015032709354355156abf177b5	20150326115500551439e48ff9d	ZAMORA	09:35:43-05	1
2015032709355855156ace12da7	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:35:58-05	1
2015032709355855156ace14750	20150326115500551439e48ff9d	CHINCHIPE	09:35:58-05	1
2015032709355855156ace149c2	20150326115500551439e48ff9d	EL PANGUI	09:35:58-05	1
2015032709355855156ace14bd2	20150326115500551439e48ff9d	NANGARITZA	09:35:58-05	1
2015032709355855156ace14e68	20150326115500551439e48ff9d	PALANDA	09:35:58-05	1
2015032709355855156ace15058	20150326115500551439e48ff9d	PAQUISHA	09:35:58-05	1
2015032709355855156ace1523f	20150326115500551439e48ff9d	YACUAMBI	09:35:58-05	1
2015032709355855156ace153f5	20150326115500551439e48ff9d	YANTZAZA	09:35:58-05	1
2015032709355855156ace15577	20150326115500551439e48ff9d	ZAMORA	09:35:58-05	1
2015032709361655156ae08dadc	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:36:16-05	1
2015032709361655156ae08ec40	20150326115500551439e48ff9d	CHINCHIPE	09:36:16-05	1
2015032709361655156ae08eeb8	20150326115500551439e48ff9d	EL PANGUI	09:36:16-05	1
2015032709361655156ae08f0c7	20150326115500551439e48ff9d	NANGARITZA	09:36:16-05	1
2015032709361655156ae08f2c0	20150326115500551439e48ff9d	PALANDA	09:36:16-05	1
2015032709361655156ae08f4a9	20150326115500551439e48ff9d	PAQUISHA	09:36:16-05	1
2015032709361655156ae08f677	20150326115500551439e48ff9d	YACUAMBI	09:36:16-05	1
2015032709361655156ae08f81e	20150326115500551439e48ff9d	YANTZAZA	09:36:16-05	1
2015032709361655156ae08f9b0	20150326115500551439e48ff9d	ZAMORA	09:36:16-05	1
2015032709372255156b22bb8dd	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:37:22-05	1
2015032709372255156b22bfeb0	20150326115500551439e48ff9d	CHINCHIPE	09:37:22-05	1
2015032709372255156b22c0419	20150326115500551439e48ff9d	EL PANGUI	09:37:22-05	1
2015032709372255156b22c0644	20150326115500551439e48ff9d	NANGARITZA	09:37:22-05	1
2015032709372255156b22c082b	20150326115500551439e48ff9d	PALANDA	09:37:22-05	1
2015032709372255156b22c0a15	20150326115500551439e48ff9d	PAQUISHA	09:37:22-05	1
2015032709372255156b22c0c1a	20150326115500551439e48ff9d	YACUAMBI	09:37:22-05	1
2015032709372255156b22c0d9d	20150326115500551439e48ff9d	YANTZAZA	09:37:22-05	1
2015032709372255156b22c0f3d	20150326115500551439e48ff9d	ZAMORA	09:37:22-05	1
2015032709375255156b400059b	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:37:52-05	1
2015032709375255156b4004318	20150326115500551439e48ff9d	CHINCHIPE	09:37:52-05	1
2015032709375255156b40045a9	20150326115500551439e48ff9d	EL PANGUI	09:37:52-05	1
2015032709375255156b4004752	20150326115500551439e48ff9d	NANGARITZA	09:37:52-05	1
2015032709375255156b40048f3	20150326115500551439e48ff9d	PALANDA	09:37:52-05	1
2015032709375255156b4004a8b	20150326115500551439e48ff9d	PAQUISHA	09:37:52-05	1
2015032709375255156b4004c2a	20150326115500551439e48ff9d	YACUAMBI	09:37:52-05	1
2015032709375255156b4004dc1	20150326115500551439e48ff9d	YANTZAZA	09:37:52-05	1
2015032709375255156b4004f96	20150326115500551439e48ff9d	ZAMORA	09:37:52-05	1
2015032709401355156bcd79cf1	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:40:13-05	1
2015032709401355156bcd7e0c6	20150326115500551439e48ff9d	CHINCHIPE	09:40:13-05	1
2015032709401355156bcd7e345	20150326115500551439e48ff9d	EL PANGUI	09:40:13-05	1
2015032709401355156bcd7e542	20150326115500551439e48ff9d	NANGARITZA	09:40:13-05	1
2015032709401355156bcd7e737	20150326115500551439e48ff9d	PALANDA	09:40:13-05	1
2015032709401355156bcd7e926	20150326115500551439e48ff9d	PAQUISHA	09:40:13-05	1
2015032709401355156bcd7eb1e	20150326115500551439e48ff9d	YACUAMBI	09:40:13-05	1
2015032709401355156bcd7ecee	20150326115500551439e48ff9d	YANTZAZA	09:40:13-05	1
2015032709401355156bcd7eeb9	20150326115500551439e48ff9d	ZAMORA	09:40:13-05	1
2015032709401455156bcedc1b3	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:40:14-05	1
2015032709401455156bcedcf4e	20150326115500551439e48ff9d	CHINCHIPE	09:40:14-05	1
2015032709401455156bcedd224	20150326115500551439e48ff9d	EL PANGUI	09:40:14-05	1
2015032709401455156bcedd45c	20150326115500551439e48ff9d	NANGARITZA	09:40:14-05	1
2015032709401455156bcedd640	20150326115500551439e48ff9d	PALANDA	09:40:14-05	1
2015032709401455156bcedd81d	20150326115500551439e48ff9d	PAQUISHA	09:40:14-05	1
2015032709401455156bcedd9ed	20150326115500551439e48ff9d	YACUAMBI	09:40:14-05	1
2015032709401455156bceddb87	20150326115500551439e48ff9d	YANTZAZA	09:40:14-05	1
2015032709401455156bceddd30	20150326115500551439e48ff9d	ZAMORA	09:40:14-05	1
2015032709401655156bd078e87	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:40:16-05	1
2015032709401655156bd079c51	20150326115500551439e48ff9d	CHINCHIPE	09:40:16-05	1
2015032709401655156bd079f5a	20150326115500551439e48ff9d	EL PANGUI	09:40:16-05	1
2015032709401655156bd07a164	20150326115500551439e48ff9d	NANGARITZA	09:40:16-05	1
2015032709401655156bd07a33c	20150326115500551439e48ff9d	PALANDA	09:40:16-05	1
2015032709401655156bd07a50b	20150326115500551439e48ff9d	PAQUISHA	09:40:16-05	1
2015032709401655156bd07a6dd	20150326115500551439e48ff9d	YACUAMBI	09:40:16-05	1
2015032709401655156bd07a8a0	20150326115500551439e48ff9d	YANTZAZA	09:40:16-05	1
2015032709401655156bd07aa4d	20150326115500551439e48ff9d	ZAMORA	09:40:16-05	1
2015032709401755156bd13bf5b	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:40:17-05	1
2015032709401755156bd13cdf8	20150326115500551439e48ff9d	CHINCHIPE	09:40:17-05	1
2015032709401755156bd13d052	20150326115500551439e48ff9d	EL PANGUI	09:40:17-05	1
2015032709401755156bd13d24c	20150326115500551439e48ff9d	NANGARITZA	09:40:17-05	1
2015032709401755156bd13d458	20150326115500551439e48ff9d	PALANDA	09:40:17-05	1
2015032709401755156bd13d654	20150326115500551439e48ff9d	PAQUISHA	09:40:17-05	1
2015032709401755156bd13dbbe	20150326115500551439e48ff9d	YACUAMBI	09:40:17-05	1
2015032709401755156bd13dd6a	20150326115500551439e48ff9d	YANTZAZA	09:40:17-05	1
2015032709401755156bd13df22	20150326115500551439e48ff9d	ZAMORA	09:40:17-05	1
2015032709401755156bd1c2fab	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:40:17-05	1
2015032709401755156bd1c3d49	20150326115500551439e48ff9d	CHINCHIPE	09:40:17-05	1
2015032709401755156bd1c4089	20150326115500551439e48ff9d	EL PANGUI	09:40:17-05	1
2015032709401755156bd1c4290	20150326115500551439e48ff9d	NANGARITZA	09:40:17-05	1
2015032709401755156bd1c4494	20150326115500551439e48ff9d	PALANDA	09:40:17-05	1
2015032709401755156bd1c467d	20150326115500551439e48ff9d	PAQUISHA	09:40:17-05	1
2015032709401755156bd1c4859	20150326115500551439e48ff9d	YACUAMBI	09:40:17-05	1
2015032709401755156bd1c4a07	20150326115500551439e48ff9d	YANTZAZA	09:40:17-05	1
2015032709401755156bd1c4bc7	20150326115500551439e48ff9d	ZAMORA	09:40:17-05	1
2015032709405155156bf31984e	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:40:51-05	1
2015032709405155156bf31a11a	20150326115500551439e48ff9d	CHINCHIPE	09:40:51-05	1
2015032709405155156bf31a326	20150326115500551439e48ff9d	EL PANGUI	09:40:51-05	1
2015032709405155156bf31a4fc	20150326115500551439e48ff9d	NANGARITZA	09:40:51-05	1
2015032709405155156bf31a6cb	20150326115500551439e48ff9d	PALANDA	09:40:51-05	1
2015032709405155156bf31a8bb	20150326115500551439e48ff9d	PAQUISHA	09:40:51-05	1
2015032709405155156bf31aa85	20150326115500551439e48ff9d	YACUAMBI	09:40:51-05	1
2015032709405155156bf31ac30	20150326115500551439e48ff9d	YANTZAZA	09:40:51-05	1
2015032709405155156bf31ade6	20150326115500551439e48ff9d	ZAMORA	09:40:51-05	1
2015032709405255156bf49eaaf	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:40:52-05	1
2015032709405255156bf49f945	20150326115500551439e48ff9d	CHINCHIPE	09:40:52-05	1
2015032709405255156bf49fb80	20150326115500551439e48ff9d	EL PANGUI	09:40:52-05	1
2015032709405255156bf49fd51	20150326115500551439e48ff9d	NANGARITZA	09:40:52-05	1
2015032709405255156bf49ff3e	20150326115500551439e48ff9d	PALANDA	09:40:52-05	1
2015032709405255156bf4a0104	20150326115500551439e48ff9d	PAQUISHA	09:40:52-05	1
2015032709405255156bf4a02cb	20150326115500551439e48ff9d	YACUAMBI	09:40:52-05	1
2015032709405255156bf4a046e	20150326115500551439e48ff9d	YANTZAZA	09:40:52-05	1
2015032709405255156bf4a0804	20150326115500551439e48ff9d	ZAMORA	09:40:52-05	1
2015032709405355156bf5bc25f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:40:53-05	1
2015032709405355156bf5bd000	20150326115500551439e48ff9d	CHINCHIPE	09:40:53-05	1
2015032709405355156bf5bd2bc	20150326115500551439e48ff9d	EL PANGUI	09:40:53-05	1
2015032709405355156bf5bd4d1	20150326115500551439e48ff9d	NANGARITZA	09:40:53-05	1
2015032709405355156bf5bd716	20150326115500551439e48ff9d	PALANDA	09:40:53-05	1
2015032709405355156bf5bd92c	20150326115500551439e48ff9d	PAQUISHA	09:40:53-05	1
2015032709405355156bf5bdb11	20150326115500551439e48ff9d	YACUAMBI	09:40:53-05	1
2015032709405355156bf5bdca6	20150326115500551439e48ff9d	YANTZAZA	09:40:53-05	1
2015032709405355156bf5bde21	20150326115500551439e48ff9d	ZAMORA	09:40:53-05	1
2015032709405455156bf682d99	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:40:54-05	1
2015032709405455156bf683d1a	20150326115500551439e48ff9d	CHINCHIPE	09:40:54-05	1
2015032709405455156bf683f82	20150326115500551439e48ff9d	EL PANGUI	09:40:54-05	1
2015032709405455156bf684162	20150326115500551439e48ff9d	NANGARITZA	09:40:54-05	1
2015032709405455156bf684338	20150326115500551439e48ff9d	PALANDA	09:40:54-05	1
2015032709405455156bf68450f	20150326115500551439e48ff9d	PAQUISHA	09:40:54-05	1
2015032709405455156bf6846d7	20150326115500551439e48ff9d	YACUAMBI	09:40:54-05	1
2015032709405455156bf68489a	20150326115500551439e48ff9d	YANTZAZA	09:40:54-05	1
2015032709405455156bf684a67	20150326115500551439e48ff9d	ZAMORA	09:40:54-05	1
2015032709405555156bf74bd47	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:40:55-05	1
2015032709405555156bf74d91b	20150326115500551439e48ff9d	CHINCHIPE	09:40:55-05	1
2015032709405555156bf74db7c	20150326115500551439e48ff9d	EL PANGUI	09:40:55-05	1
2015032709405555156bf74dda8	20150326115500551439e48ff9d	NANGARITZA	09:40:55-05	1
2015032709405555156bf74df9b	20150326115500551439e48ff9d	PALANDA	09:40:55-05	1
2015032709405555156bf74e17f	20150326115500551439e48ff9d	PAQUISHA	09:40:55-05	1
2015032709405555156bf74e359	20150326115500551439e48ff9d	YACUAMBI	09:40:55-05	1
2015032709405555156bf74e512	20150326115500551439e48ff9d	YANTZAZA	09:40:55-05	1
2015032709405555156bf74e6bf	20150326115500551439e48ff9d	ZAMORA	09:40:55-05	1
2015032709405655156bf803022	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:40:56-05	1
2015032709405655156bf803fc9	20150326115500551439e48ff9d	CHINCHIPE	09:40:56-05	1
2015032709405655156bf80422e	20150326115500551439e48ff9d	EL PANGUI	09:40:56-05	1
2015032709405655156bf804412	20150326115500551439e48ff9d	NANGARITZA	09:40:56-05	1
2015032709405655156bf8045e5	20150326115500551439e48ff9d	PALANDA	09:40:56-05	1
2015032709405655156bf8047c0	20150326115500551439e48ff9d	PAQUISHA	09:40:56-05	1
2015032709405655156bf804988	20150326115500551439e48ff9d	YACUAMBI	09:40:56-05	1
2015032709405655156bf804af6	20150326115500551439e48ff9d	YANTZAZA	09:40:56-05	1
2015032709405655156bf804ca2	20150326115500551439e48ff9d	ZAMORA	09:40:56-05	1
2015032709410955156c0559d96	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:41:09-05	1
2015032709410955156c055abe1	20150326115500551439e48ff9d	CHINCHIPE	09:41:09-05	1
2015032709410955156c055ae41	20150326115500551439e48ff9d	EL PANGUI	09:41:09-05	1
2015032709410955156c055b022	20150326115500551439e48ff9d	NANGARITZA	09:41:09-05	1
2015032709410955156c055b23e	20150326115500551439e48ff9d	PALANDA	09:41:09-05	1
2015032709410955156c055b413	20150326115500551439e48ff9d	PAQUISHA	09:41:09-05	1
2015032709410955156c055b5a2	20150326115500551439e48ff9d	YACUAMBI	09:41:09-05	1
2015032709410955156c055b71c	20150326115500551439e48ff9d	YANTZAZA	09:41:09-05	1
2015032709410955156c055b88a	20150326115500551439e48ff9d	ZAMORA	09:41:09-05	1
2015032709434855156ca43b9a6	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:43:48-05	1
2015032709434855156ca43f7b2	20150326115500551439e48ff9d	CHINCHIPE	09:43:48-05	1
2015032709434855156ca43fa03	20150326115500551439e48ff9d	EL PANGUI	09:43:48-05	1
2015032709434855156ca43fbd7	20150326115500551439e48ff9d	NANGARITZA	09:43:48-05	1
2015032709434855156ca43fda7	20150326115500551439e48ff9d	PALANDA	09:43:48-05	1
2015032709434855156ca43ff74	20150326115500551439e48ff9d	PAQUISHA	09:43:48-05	1
2015032709434855156ca44012a	20150326115500551439e48ff9d	YACUAMBI	09:43:48-05	1
2015032709434855156ca4402c1	20150326115500551439e48ff9d	YANTZAZA	09:43:48-05	1
2015032709434855156ca440449	20150326115500551439e48ff9d	ZAMORA	09:43:48-05	1
2015032709434955156ca59b964	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:43:49-05	1
2015032709434955156ca59f2af	20150326115500551439e48ff9d	CHINCHIPE	09:43:49-05	1
2015032709434955156ca59f50c	20150326115500551439e48ff9d	EL PANGUI	09:43:49-05	1
2015032709434955156ca59f6e6	20150326115500551439e48ff9d	NANGARITZA	09:43:49-05	1
2015032709434955156ca59f8be	20150326115500551439e48ff9d	PALANDA	09:43:49-05	1
2015032709434955156ca59fa8b	20150326115500551439e48ff9d	PAQUISHA	09:43:49-05	1
2015032709434955156ca59fc54	20150326115500551439e48ff9d	YACUAMBI	09:43:49-05	1
2015032709434955156ca59fdc0	20150326115500551439e48ff9d	YANTZAZA	09:43:49-05	1
2015032709434955156ca59ff9e	20150326115500551439e48ff9d	ZAMORA	09:43:49-05	1
2015032709435055156ca6c6d1d	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:43:50-05	1
2015032709435055156ca6c7aec	20150326115500551439e48ff9d	CHINCHIPE	09:43:50-05	1
2015032709435055156ca6c7d6d	20150326115500551439e48ff9d	EL PANGUI	09:43:50-05	1
2015032709435055156ca6c7f42	20150326115500551439e48ff9d	NANGARITZA	09:43:50-05	1
2015032709435055156ca6c810b	20150326115500551439e48ff9d	PALANDA	09:43:50-05	1
2015032709435055156ca6c82d5	20150326115500551439e48ff9d	PAQUISHA	09:43:50-05	1
2015032709435055156ca6c849a	20150326115500551439e48ff9d	YACUAMBI	09:43:50-05	1
2015032709435055156ca6c863a	20150326115500551439e48ff9d	YANTZAZA	09:43:50-05	1
2015032709435055156ca6c87d1	20150326115500551439e48ff9d	ZAMORA	09:43:50-05	1
2015032709435555156cab2c8f0	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:43:55-05	1
2015032709435555156cab2d8b8	20150326115500551439e48ff9d	CHINCHIPE	09:43:55-05	1
2015032709435555156cab2db37	20150326115500551439e48ff9d	EL PANGUI	09:43:55-05	1
2015032709435555156cab2dd15	20150326115500551439e48ff9d	NANGARITZA	09:43:55-05	1
2015032709435555156cab2def0	20150326115500551439e48ff9d	PALANDA	09:43:55-05	1
2015032709435555156cab2e0bf	20150326115500551439e48ff9d	PAQUISHA	09:43:55-05	1
2015032709435555156cab2e29f	20150326115500551439e48ff9d	YACUAMBI	09:43:55-05	1
2015032709435555156cab2e453	20150326115500551439e48ff9d	YANTZAZA	09:43:55-05	1
2015032709435555156cab2e5ea	20150326115500551439e48ff9d	ZAMORA	09:43:55-05	1
2015032709435955156caf8e983	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:43:59-05	1
2015032709435955156caf8f827	20150326115500551439e48ff9d	CHINCHIPE	09:43:59-05	1
2015032709435955156caf8fabe	20150326115500551439e48ff9d	EL PANGUI	09:43:59-05	1
2015032709435955156caf8fcc6	20150326115500551439e48ff9d	NANGARITZA	09:43:59-05	1
2015032709435955156caf8febc	20150326115500551439e48ff9d	PALANDA	09:43:59-05	1
2015032709435955156caf900e6	20150326115500551439e48ff9d	PAQUISHA	09:43:59-05	1
2015032709435955156caf905cd	20150326115500551439e48ff9d	YACUAMBI	09:43:59-05	1
2015032709435955156caf907cf	20150326115500551439e48ff9d	YANTZAZA	09:43:59-05	1
2015032709435955156caf909c0	20150326115500551439e48ff9d	ZAMORA	09:43:59-05	1
2015032709440855156cb8b7abb	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:44:08-05	1
2015032709440855156cb8b8ba0	20150326115500551439e48ff9d	CHINCHIPE	09:44:08-05	1
2015032709440855156cb8b8dfb	20150326115500551439e48ff9d	EL PANGUI	09:44:08-05	1
2015032709440855156cb8b8fd6	20150326115500551439e48ff9d	NANGARITZA	09:44:08-05	1
2015032709440855156cb8b91aa	20150326115500551439e48ff9d	PALANDA	09:44:08-05	1
2015032709440855156cb8b933e	20150326115500551439e48ff9d	PAQUISHA	09:44:08-05	1
2015032709440855156cb8b94d9	20150326115500551439e48ff9d	YACUAMBI	09:44:08-05	1
2015032709440855156cb8b9649	20150326115500551439e48ff9d	YANTZAZA	09:44:08-05	1
2015032709440855156cb8b97ba	20150326115500551439e48ff9d	ZAMORA	09:44:08-05	1
2015032709441855156cc26af97	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:44:18-05	1
2015032709441855156cc26be5a	20150326115500551439e48ff9d	CHINCHIPE	09:44:18-05	1
2015032709441855156cc26c090	20150326115500551439e48ff9d	EL PANGUI	09:44:18-05	1
2015032709441855156cc26c25d	20150326115500551439e48ff9d	NANGARITZA	09:44:18-05	1
2015032709441855156cc26c428	20150326115500551439e48ff9d	PALANDA	09:44:18-05	1
2015032709441855156cc26c5df	20150326115500551439e48ff9d	PAQUISHA	09:44:18-05	1
2015032709441855156cc26c79e	20150326115500551439e48ff9d	YACUAMBI	09:44:18-05	1
2015032709441855156cc26c956	20150326115500551439e48ff9d	YANTZAZA	09:44:18-05	1
2015032709441855156cc26cad2	20150326115500551439e48ff9d	ZAMORA	09:44:18-05	1
2015032709441955156cc3bde00	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:44:19-05	1
2015032709441955156cc3bebb7	20150326115500551439e48ff9d	CHINCHIPE	09:44:19-05	1
2015032709441955156cc3bee41	20150326115500551439e48ff9d	EL PANGUI	09:44:19-05	1
2015032709441955156cc3bf024	20150326115500551439e48ff9d	NANGARITZA	09:44:19-05	1
2015032709441955156cc3bf1fc	20150326115500551439e48ff9d	PALANDA	09:44:19-05	1
2015032709441955156cc3bf3c9	20150326115500551439e48ff9d	PAQUISHA	09:44:19-05	1
2015032709441955156cc3bf5aa	20150326115500551439e48ff9d	YACUAMBI	09:44:19-05	1
2015032709441955156cc3bf74e	20150326115500551439e48ff9d	YANTZAZA	09:44:19-05	1
2015032709441955156cc3bf966	20150326115500551439e48ff9d	ZAMORA	09:44:19-05	1
2015032709443155156ccf4d08c	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:44:31-05	1
2015032709443155156ccf4dfc5	20150326115500551439e48ff9d	CHINCHIPE	09:44:31-05	1
2015032709443155156ccf4e211	20150326115500551439e48ff9d	EL PANGUI	09:44:31-05	1
2015032709443155156ccf4e3ea	20150326115500551439e48ff9d	NANGARITZA	09:44:31-05	1
2015032709443155156ccf4e5b1	20150326115500551439e48ff9d	PALANDA	09:44:31-05	1
2015032709443155156ccf4e7a7	20150326115500551439e48ff9d	PAQUISHA	09:44:31-05	1
2015032709443155156ccf4e978	20150326115500551439e48ff9d	YACUAMBI	09:44:31-05	1
2015032709443155156ccf4eafc	20150326115500551439e48ff9d	YANTZAZA	09:44:31-05	1
2015032709443155156ccf4ec7d	20150326115500551439e48ff9d	ZAMORA	09:44:31-05	1
2015032709443255156cd020d3c	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:44:32-05	1
2015032709443255156cd021fa6	20150326115500551439e48ff9d	CHINCHIPE	09:44:32-05	1
2015032709443255156cd022245	20150326115500551439e48ff9d	EL PANGUI	09:44:32-05	1
2015032709443255156cd022416	20150326115500551439e48ff9d	NANGARITZA	09:44:32-05	1
2015032709443255156cd0225eb	20150326115500551439e48ff9d	PALANDA	09:44:32-05	1
2015032709443255156cd0227a0	20150326115500551439e48ff9d	PAQUISHA	09:44:32-05	1
2015032709443255156cd02294b	20150326115500551439e48ff9d	YACUAMBI	09:44:32-05	1
2015032709443255156cd022ad3	20150326115500551439e48ff9d	YANTZAZA	09:44:32-05	1
2015032709443255156cd022c53	20150326115500551439e48ff9d	ZAMORA	09:44:32-05	1
2015032709445155156ce3c091f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:44:51-05	1
2015032709445155156ce3c18c8	20150326115500551439e48ff9d	CHINCHIPE	09:44:51-05	1
2015032709445155156ce3c1b43	20150326115500551439e48ff9d	EL PANGUI	09:44:51-05	1
2015032709445155156ce3c1d4e	20150326115500551439e48ff9d	NANGARITZA	09:44:51-05	1
2015032709445155156ce3c1f3e	20150326115500551439e48ff9d	PALANDA	09:44:51-05	1
2015032709445155156ce3c2121	20150326115500551439e48ff9d	PAQUISHA	09:44:51-05	1
2015032709445155156ce3c22f3	20150326115500551439e48ff9d	YACUAMBI	09:44:51-05	1
2015032709445155156ce3c24a5	20150326115500551439e48ff9d	YANTZAZA	09:44:51-05	1
2015032709445155156ce3c2639	20150326115500551439e48ff9d	ZAMORA	09:44:51-05	1
2015032709451555156cfb8a60f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:45:15-05	1
2015032709451555156cfb8b5ae	20150326115500551439e48ff9d	CHINCHIPE	09:45:15-05	1
2015032709451555156cfb8b7f0	20150326115500551439e48ff9d	EL PANGUI	09:45:15-05	1
2015032709451555156cfb8b9c2	20150326115500551439e48ff9d	NANGARITZA	09:45:15-05	1
2015032709451555156cfb8bb6c	20150326115500551439e48ff9d	PALANDA	09:45:15-05	1
2015032709451555156cfb8bd2e	20150326115500551439e48ff9d	PAQUISHA	09:45:15-05	1
2015032709451555156cfb8beda	20150326115500551439e48ff9d	YACUAMBI	09:45:15-05	1
2015032709451555156cfb8c055	20150326115500551439e48ff9d	YANTZAZA	09:45:15-05	1
2015032709451555156cfb8c1c7	20150326115500551439e48ff9d	ZAMORA	09:45:15-05	1
2015032709451655156cfcd12bb	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:45:16-05	1
2015032709451655156cfcd7b3b	20150326115500551439e48ff9d	CHINCHIPE	09:45:16-05	1
2015032709451655156cfcd7ded	20150326115500551439e48ff9d	EL PANGUI	09:45:16-05	1
2015032709451655156cfcd7ff3	20150326115500551439e48ff9d	NANGARITZA	09:45:16-05	1
2015032709451655156cfcd81e4	20150326115500551439e48ff9d	PALANDA	09:45:16-05	1
2015032709451655156cfcd83d0	20150326115500551439e48ff9d	PAQUISHA	09:45:16-05	1
2015032709451655156cfcd85b5	20150326115500551439e48ff9d	YACUAMBI	09:45:16-05	1
2015032709451655156cfcd8769	20150326115500551439e48ff9d	YANTZAZA	09:45:16-05	1
2015032709451655156cfcd8916	20150326115500551439e48ff9d	ZAMORA	09:45:16-05	1
2015032709460055156d28de3d0	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:46:00-05	1
2015032709460055156d28df27f	20150326115500551439e48ff9d	CHINCHIPE	09:46:00-05	1
2015032709460055156d28df4d6	20150326115500551439e48ff9d	EL PANGUI	09:46:00-05	1
2015032709460055156d28df6b9	20150326115500551439e48ff9d	NANGARITZA	09:46:00-05	1
2015032709460055156d28df8b8	20150326115500551439e48ff9d	PALANDA	09:46:00-05	1
2015032709460055156d28dfab2	20150326115500551439e48ff9d	PAQUISHA	09:46:00-05	1
2015032709460055156d28dfc84	20150326115500551439e48ff9d	YACUAMBI	09:46:00-05	1
2015032709460055156d28dfe4c	20150326115500551439e48ff9d	YANTZAZA	09:46:00-05	1
2015032709460055156d28dffcf	20150326115500551439e48ff9d	ZAMORA	09:46:00-05	1
2015032709460255156d2abaaba	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:46:02-05	1
2015032709460255156d2abba5c	20150326115500551439e48ff9d	CHINCHIPE	09:46:02-05	1
2015032709460255156d2abbcfc	20150326115500551439e48ff9d	EL PANGUI	09:46:02-05	1
2015032709460255156d2abbef8	20150326115500551439e48ff9d	NANGARITZA	09:46:02-05	1
2015032709460255156d2abc112	20150326115500551439e48ff9d	PALANDA	09:46:02-05	1
2015032709460255156d2abc2fa	20150326115500551439e48ff9d	PAQUISHA	09:46:02-05	1
2015032709460255156d2abc4ec	20150326115500551439e48ff9d	YACUAMBI	09:46:02-05	1
2015032709460255156d2abc698	20150326115500551439e48ff9d	YANTZAZA	09:46:02-05	1
2015032709460255156d2abc81b	20150326115500551439e48ff9d	ZAMORA	09:46:02-05	1
2015032709460455156d2c14652	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:46:04-05	1
2015032709460455156d2c1555c	20150326115500551439e48ff9d	CHINCHIPE	09:46:04-05	1
2015032709460455156d2c157d4	20150326115500551439e48ff9d	EL PANGUI	09:46:04-05	1
2015032709460455156d2c159d0	20150326115500551439e48ff9d	NANGARITZA	09:46:04-05	1
2015032709460455156d2c15bc6	20150326115500551439e48ff9d	PALANDA	09:46:04-05	1
2015032709460455156d2c15ddc	20150326115500551439e48ff9d	PAQUISHA	09:46:04-05	1
2015032709460455156d2c16056	20150326115500551439e48ff9d	YACUAMBI	09:46:04-05	1
2015032709460455156d2c1620a	20150326115500551439e48ff9d	YANTZAZA	09:46:04-05	1
2015032709460455156d2c163c2	20150326115500551439e48ff9d	ZAMORA	09:46:04-05	1
2015032709471055156d6eecd95	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:47:10-05	1
2015032709471055156d6ef24cf	20150326115500551439e48ff9d	CHINCHIPE	09:47:10-05	1
2015032709471055156d6ef2778	20150326115500551439e48ff9d	EL PANGUI	09:47:10-05	1
2015032709471055156d6ef2980	20150326115500551439e48ff9d	NANGARITZA	09:47:10-05	1
2015032709471055156d6ef2b8b	20150326115500551439e48ff9d	PALANDA	09:47:10-05	1
2015032709471055156d6ef2d8b	20150326115500551439e48ff9d	PAQUISHA	09:47:10-05	1
2015032709471055156d6ef2fa1	20150326115500551439e48ff9d	YACUAMBI	09:47:10-05	1
2015032709471055156d6ef315d	20150326115500551439e48ff9d	YANTZAZA	09:47:10-05	1
2015032709471055156d6ef3301	20150326115500551439e48ff9d	ZAMORA	09:47:10-05	1
2015032709471255156d704c3d9	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:47:12-05	1
2015032709471255156d704d1ae	20150326115500551439e48ff9d	CHINCHIPE	09:47:12-05	1
2015032709471255156d704d469	20150326115500551439e48ff9d	EL PANGUI	09:47:12-05	1
2015032709471255156d704d682	20150326115500551439e48ff9d	NANGARITZA	09:47:12-05	1
2015032709471255156d704d865	20150326115500551439e48ff9d	PALANDA	09:47:12-05	1
2015032709471255156d704da85	20150326115500551439e48ff9d	PAQUISHA	09:47:12-05	1
2015032709471255156d704dc71	20150326115500551439e48ff9d	YACUAMBI	09:47:12-05	1
2015032709471255156d704de4b	20150326115500551439e48ff9d	YANTZAZA	09:47:12-05	1
2015032709471255156d704e01a	20150326115500551439e48ff9d	ZAMORA	09:47:12-05	1
2015032709471355156d717eebb	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:47:13-05	1
2015032709471355156d717fc93	20150326115500551439e48ff9d	CHINCHIPE	09:47:13-05	1
2015032709471355156d717ff22	20150326115500551439e48ff9d	EL PANGUI	09:47:13-05	1
2015032709471355156d718012a	20150326115500551439e48ff9d	NANGARITZA	09:47:13-05	1
2015032709471355156d718031c	20150326115500551439e48ff9d	PALANDA	09:47:13-05	1
2015032709471355156d7180504	20150326115500551439e48ff9d	PAQUISHA	09:47:13-05	1
2015032709471355156d71806fc	20150326115500551439e48ff9d	YACUAMBI	09:47:13-05	1
2015032709471355156d71808bf	20150326115500551439e48ff9d	YANTZAZA	09:47:13-05	1
2015032709471355156d7180a6e	20150326115500551439e48ff9d	ZAMORA	09:47:13-05	1
2015032709471455156d722c87a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:47:14-05	1
2015032709471455156d722d72d	20150326115500551439e48ff9d	CHINCHIPE	09:47:14-05	1
2015032709471455156d722d9cf	20150326115500551439e48ff9d	EL PANGUI	09:47:14-05	1
2015032709471455156d722dbbc	20150326115500551439e48ff9d	NANGARITZA	09:47:14-05	1
2015032709471455156d722dd87	20150326115500551439e48ff9d	PALANDA	09:47:14-05	1
2015032709471455156d722df55	20150326115500551439e48ff9d	PAQUISHA	09:47:14-05	1
2015032709471455156d722e12e	20150326115500551439e48ff9d	YACUAMBI	09:47:14-05	1
2015032709471455156d722e2cf	20150326115500551439e48ff9d	YANTZAZA	09:47:14-05	1
2015032709471455156d722e499	20150326115500551439e48ff9d	ZAMORA	09:47:14-05	1
2015032709471455156d7272643	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:47:14-05	1
2015032709471455156d7273531	20150326115500551439e48ff9d	CHINCHIPE	09:47:14-05	1
2015032709471455156d727372d	20150326115500551439e48ff9d	EL PANGUI	09:47:14-05	1
2015032709471455156d72738ec	20150326115500551439e48ff9d	NANGARITZA	09:47:14-05	1
2015032709471455156d7273a9a	20150326115500551439e48ff9d	PALANDA	09:47:14-05	1
2015032709471455156d7273c4f	20150326115500551439e48ff9d	PAQUISHA	09:47:14-05	1
2015032709471455156d7273e58	20150326115500551439e48ff9d	YACUAMBI	09:47:14-05	1
2015032709471455156d727405c	20150326115500551439e48ff9d	YANTZAZA	09:47:14-05	1
2015032709471455156d72741ff	20150326115500551439e48ff9d	ZAMORA	09:47:14-05	1
2015032709473455156d86e4e3a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:47:34-05	1
2015032709473455156d86e5d2e	20150326115500551439e48ff9d	CHINCHIPE	09:47:34-05	1
2015032709473455156d86e5f8a	20150326115500551439e48ff9d	EL PANGUI	09:47:34-05	1
2015032709473455156d86e6185	20150326115500551439e48ff9d	NANGARITZA	09:47:34-05	1
2015032709473455156d86e6376	20150326115500551439e48ff9d	PALANDA	09:47:34-05	1
2015032709473455156d86e654c	20150326115500551439e48ff9d	PAQUISHA	09:47:34-05	1
2015032709473455156d86e6770	20150326115500551439e48ff9d	YACUAMBI	09:47:34-05	1
2015032709473455156d86e6917	20150326115500551439e48ff9d	YANTZAZA	09:47:34-05	1
2015032709473455156d86e6ac5	20150326115500551439e48ff9d	ZAMORA	09:47:34-05	1
2015032709483955156dc7a4bc6	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:48:39-05	1
2015032709483955156dc7a5965	20150326115500551439e48ff9d	CHINCHIPE	09:48:39-05	1
2015032709483955156dc7a5ba2	20150326115500551439e48ff9d	EL PANGUI	09:48:39-05	1
2015032709483955156dc7a5d9b	20150326115500551439e48ff9d	NANGARITZA	09:48:39-05	1
2015032709483955156dc7a5f5b	20150326115500551439e48ff9d	PALANDA	09:48:39-05	1
2015032709483955156dc7a6127	20150326115500551439e48ff9d	PAQUISHA	09:48:39-05	1
2015032709483955156dc7a62f2	20150326115500551439e48ff9d	YACUAMBI	09:48:39-05	1
2015032709483955156dc7a6480	20150326115500551439e48ff9d	YANTZAZA	09:48:39-05	1
2015032709483955156dc7a65f5	20150326115500551439e48ff9d	ZAMORA	09:48:39-05	1
2015032709505655156e501b57e	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:50:56-05	1
2015032709505655156e501c6d9	20150326115500551439e48ff9d	CHINCHIPE	09:50:56-05	1
2015032709505655156e501c965	20150326115500551439e48ff9d	EL PANGUI	09:50:56-05	1
2015032709505655156e501cb38	20150326115500551439e48ff9d	NANGARITZA	09:50:56-05	1
2015032709505655156e501ce1d	20150326115500551439e48ff9d	PALANDA	09:50:56-05	1
2015032709505655156e501cfff	20150326115500551439e48ff9d	PAQUISHA	09:50:56-05	1
2015032709505655156e501d1c8	20150326115500551439e48ff9d	YACUAMBI	09:50:56-05	1
2015032709505655156e501d340	20150326115500551439e48ff9d	YANTZAZA	09:50:56-05	1
2015032709505655156e501d4d5	20150326115500551439e48ff9d	ZAMORA	09:50:56-05	1
2015032709505755156e516dd68	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:50:57-05	1
2015032709505755156e516ec81	20150326115500551439e48ff9d	CHINCHIPE	09:50:57-05	1
2015032709505755156e516eef0	20150326115500551439e48ff9d	EL PANGUI	09:50:57-05	1
2015032709505755156e516f0c8	20150326115500551439e48ff9d	NANGARITZA	09:50:57-05	1
2015032709505755156e516f2ae	20150326115500551439e48ff9d	PALANDA	09:50:57-05	1
2015032709505755156e516f47d	20150326115500551439e48ff9d	PAQUISHA	09:50:57-05	1
2015032709505755156e516f646	20150326115500551439e48ff9d	YACUAMBI	09:50:57-05	1
2015032709505755156e516f801	20150326115500551439e48ff9d	YANTZAZA	09:50:57-05	1
2015032709505755156e516f9a3	20150326115500551439e48ff9d	ZAMORA	09:50:57-05	1
2015032709513855156e7a9120f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:51:38-05	1
2015032709513855156e7a91fd1	20150326115500551439e48ff9d	CHINCHIPE	09:51:38-05	1
2015032709513855156e7a9221a	20150326115500551439e48ff9d	EL PANGUI	09:51:38-05	1
2015032709513855156e7a923d8	20150326115500551439e48ff9d	NANGARITZA	09:51:38-05	1
2015032709513855156e7a925a6	20150326115500551439e48ff9d	PALANDA	09:51:38-05	1
2015032709513855156e7a9273c	20150326115500551439e48ff9d	PAQUISHA	09:51:38-05	1
2015032709513855156e7a92916	20150326115500551439e48ff9d	YACUAMBI	09:51:38-05	1
2015032709513855156e7a92acc	20150326115500551439e48ff9d	YANTZAZA	09:51:38-05	1
2015032709513855156e7a92c35	20150326115500551439e48ff9d	ZAMORA	09:51:38-05	1
2015032709514655156e82d8ebe	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:51:46-05	1
2015032709514655156e82d9e67	20150326115500551439e48ff9d	CHINCHIPE	09:51:46-05	1
2015032709514655156e82da098	20150326115500551439e48ff9d	EL PANGUI	09:51:46-05	1
2015032709514655156e82da26d	20150326115500551439e48ff9d	NANGARITZA	09:51:46-05	1
2015032709514655156e82da40b	20150326115500551439e48ff9d	PALANDA	09:51:46-05	1
2015032709514655156e82da5d5	20150326115500551439e48ff9d	PAQUISHA	09:51:46-05	1
2015032709514655156e82da76e	20150326115500551439e48ff9d	YACUAMBI	09:51:46-05	1
2015032709514655156e82da8e0	20150326115500551439e48ff9d	YANTZAZA	09:51:46-05	1
2015032709514655156e82daa51	20150326115500551439e48ff9d	ZAMORA	09:51:46-05	1
2015032709531555156edb37579	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:53:15-05	1
2015032709531555156edb383eb	20150326115500551439e48ff9d	CHINCHIPE	09:53:15-05	1
2015032709531555156edb3862c	20150326115500551439e48ff9d	EL PANGUI	09:53:15-05	1
2015032709531555156edb3880e	20150326115500551439e48ff9d	NANGARITZA	09:53:15-05	1
2015032709531555156edb389e6	20150326115500551439e48ff9d	PALANDA	09:53:15-05	1
2015032709531555156edb38bab	20150326115500551439e48ff9d	PAQUISHA	09:53:15-05	1
2015032709531555156edb38d6c	20150326115500551439e48ff9d	YACUAMBI	09:53:15-05	1
2015032709531555156edb38f3d	20150326115500551439e48ff9d	YANTZAZA	09:53:15-05	1
2015032709531555156edb39190	20150326115500551439e48ff9d	ZAMORA	09:53:15-05	1
2015032709541055156f12b4390	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:54:10-05	1
2015032709541055156f12b51a2	20150326115500551439e48ff9d	CHINCHIPE	09:54:10-05	1
2015032709541055156f12b53f5	20150326115500551439e48ff9d	EL PANGUI	09:54:10-05	1
2015032709541055156f12b55dc	20150326115500551439e48ff9d	NANGARITZA	09:54:10-05	1
2015032709541055156f12b579f	20150326115500551439e48ff9d	PALANDA	09:54:10-05	1
2015032709541055156f12b59a5	20150326115500551439e48ff9d	PAQUISHA	09:54:10-05	1
2015032709541055156f12b5bfa	20150326115500551439e48ff9d	YACUAMBI	09:54:10-05	1
2015032709541055156f12b5de8	20150326115500551439e48ff9d	YANTZAZA	09:54:10-05	1
2015032709541055156f12b5fa5	20150326115500551439e48ff9d	ZAMORA	09:54:10-05	1
2015032709541355156f1522649	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:54:13-05	1
2015032709541355156f152357c	20150326115500551439e48ff9d	CHINCHIPE	09:54:13-05	1
2015032709541355156f152383b	20150326115500551439e48ff9d	EL PANGUI	09:54:13-05	1
2015032709541355156f1523a3f	20150326115500551439e48ff9d	NANGARITZA	09:54:13-05	1
2015032709541355156f1523c48	20150326115500551439e48ff9d	PALANDA	09:54:13-05	1
2015032709541355156f1523e20	20150326115500551439e48ff9d	PAQUISHA	09:54:13-05	1
2015032709541355156f1523ffd	20150326115500551439e48ff9d	YACUAMBI	09:54:13-05	1
2015032709541355156f152418b	20150326115500551439e48ff9d	YANTZAZA	09:54:13-05	1
2015032709541355156f15242fe	20150326115500551439e48ff9d	ZAMORA	09:54:13-05	1
2015032709541755156f19c85ba	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:54:17-05	1
2015032709541755156f19c9410	20150326115500551439e48ff9d	CHINCHIPE	09:54:17-05	1
2015032709541755156f19c966f	20150326115500551439e48ff9d	EL PANGUI	09:54:17-05	1
2015032709541755156f19c986a	20150326115500551439e48ff9d	NANGARITZA	09:54:17-05	1
2015032709541755156f19c9a40	20150326115500551439e48ff9d	PALANDA	09:54:17-05	1
2015032709541755156f19c9c2f	20150326115500551439e48ff9d	PAQUISHA	09:54:17-05	1
2015032709541755156f19c9dfa	20150326115500551439e48ff9d	YACUAMBI	09:54:17-05	1
2015032709541755156f19c9fad	20150326115500551439e48ff9d	YANTZAZA	09:54:17-05	1
2015032709541755156f19ca157	20150326115500551439e48ff9d	ZAMORA	09:54:17-05	1
2015032709543055156f2605864	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:54:30-05	1
2015032709543055156f260671c	20150326115500551439e48ff9d	CHINCHIPE	09:54:30-05	1
2015032709543055156f26069d2	20150326115500551439e48ff9d	EL PANGUI	09:54:30-05	1
2015032709543055156f2606bae	20150326115500551439e48ff9d	NANGARITZA	09:54:30-05	1
2015032709543055156f2606daf	20150326115500551439e48ff9d	PALANDA	09:54:30-05	1
2015032709543055156f2606f72	20150326115500551439e48ff9d	PAQUISHA	09:54:30-05	1
2015032709543055156f2607157	20150326115500551439e48ff9d	YACUAMBI	09:54:30-05	1
2015032709543055156f260733f	20150326115500551439e48ff9d	YANTZAZA	09:54:30-05	1
2015032709543055156f26074f3	20150326115500551439e48ff9d	ZAMORA	09:54:30-05	1
2015032709555155156f77a6fe4	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:55:51-05	1
2015032709555155156f77a7e37	20150326115500551439e48ff9d	CHINCHIPE	09:55:51-05	1
2015032709555155156f77a8082	20150326115500551439e48ff9d	EL PANGUI	09:55:51-05	1
2015032709555155156f77a827d	20150326115500551439e48ff9d	NANGARITZA	09:55:51-05	1
2015032709555155156f77a847d	20150326115500551439e48ff9d	PALANDA	09:55:51-05	1
2015032709555155156f77a866f	20150326115500551439e48ff9d	PAQUISHA	09:55:51-05	1
2015032709555155156f77a8846	20150326115500551439e48ff9d	YACUAMBI	09:55:51-05	1
2015032709555155156f77a8a2f	20150326115500551439e48ff9d	YANTZAZA	09:55:51-05	1
2015032709555155156f77a8be9	20150326115500551439e48ff9d	ZAMORA	09:55:51-05	1
2015032709560655156f863b0df	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:56:06-05	1
2015032709560655156f863d7bf	20150326115500551439e48ff9d	CHINCHIPE	09:56:06-05	1
2015032709560655156f863da98	20150326115500551439e48ff9d	EL PANGUI	09:56:06-05	1
2015032709560655156f863dc71	20150326115500551439e48ff9d	NANGARITZA	09:56:06-05	1
2015032709560655156f863de9b	20150326115500551439e48ff9d	PALANDA	09:56:06-05	1
2015032709560655156f863e0cc	20150326115500551439e48ff9d	PAQUISHA	09:56:06-05	1
2015032709560655156f863e287	20150326115500551439e48ff9d	YACUAMBI	09:56:06-05	1
2015032709560655156f863e419	20150326115500551439e48ff9d	YANTZAZA	09:56:06-05	1
2015032709560655156f863e5b1	20150326115500551439e48ff9d	ZAMORA	09:56:06-05	1
2015032709562155156f950beba	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:56:21-05	1
2015032709562155156f950ce0d	20150326115500551439e48ff9d	CHINCHIPE	09:56:21-05	1
2015032709562155156f950d089	20150326115500551439e48ff9d	EL PANGUI	09:56:21-05	1
2015032709562155156f950d24a	20150326115500551439e48ff9d	NANGARITZA	09:56:21-05	1
2015032709562155156f950d3e8	20150326115500551439e48ff9d	PALANDA	09:56:21-05	1
2015032709562155156f950d57b	20150326115500551439e48ff9d	PAQUISHA	09:56:21-05	1
2015032709562155156f950d716	20150326115500551439e48ff9d	YACUAMBI	09:56:21-05	1
2015032709562155156f950d874	20150326115500551439e48ff9d	YANTZAZA	09:56:21-05	1
2015032709562155156f950d9d1	20150326115500551439e48ff9d	ZAMORA	09:56:21-05	1
2015032709575155156fefc73c2	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:57:51-05	1
2015032709575155156fefca337	20150326115500551439e48ff9d	CHINCHIPE	09:57:51-05	1
2015032709575155156fefca592	20150326115500551439e48ff9d	EL PANGUI	09:57:51-05	1
2015032709575155156fefca78f	20150326115500551439e48ff9d	NANGARITZA	09:57:51-05	1
2015032709575155156fefca963	20150326115500551439e48ff9d	PALANDA	09:57:51-05	1
2015032709575155156fefcab33	20150326115500551439e48ff9d	PAQUISHA	09:57:51-05	1
2015032709575155156fefcad16	20150326115500551439e48ff9d	YACUAMBI	09:57:51-05	1
2015032709575155156fefcae9d	20150326115500551439e48ff9d	YANTZAZA	09:57:51-05	1
2015032709575155156fefcb020	20150326115500551439e48ff9d	ZAMORA	09:57:51-05	1
201503270959565515706cba4a0	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:59:56-05	1
201503270959565515706cbdfd5	20150326115500551439e48ff9d	CHINCHIPE	09:59:56-05	1
201503270959565515706cbe23b	20150326115500551439e48ff9d	EL PANGUI	09:59:56-05	1
201503270959565515706cbe422	20150326115500551439e48ff9d	NANGARITZA	09:59:56-05	1
201503270959565515706cbe5fc	20150326115500551439e48ff9d	PALANDA	09:59:56-05	1
201503270959565515706cbe7d0	20150326115500551439e48ff9d	PAQUISHA	09:59:56-05	1
201503270959565515706cbe98b	20150326115500551439e48ff9d	YACUAMBI	09:59:56-05	1
201503270959565515706cbeb17	20150326115500551439e48ff9d	YANTZAZA	09:59:56-05	1
201503270959565515706cbeca5	20150326115500551439e48ff9d	ZAMORA	09:59:56-05	1
20150327100125551570c581e53	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:01:25-05	1
20150327100125551570c587a63	20150326115500551439e48ff9d	CHINCHIPE	10:01:25-05	1
20150327100125551570c587cc3	20150326115500551439e48ff9d	EL PANGUI	10:01:25-05	1
20150327100125551570c587e9f	20150326115500551439e48ff9d	NANGARITZA	10:01:25-05	1
20150327100125551570c588078	20150326115500551439e48ff9d	PALANDA	10:01:25-05	1
20150327100125551570c588245	20150326115500551439e48ff9d	PAQUISHA	10:01:25-05	1
20150327100125551570c5883e7	20150326115500551439e48ff9d	YACUAMBI	10:01:25-05	1
20150327100125551570c58855d	20150326115500551439e48ff9d	YANTZAZA	10:01:25-05	1
20150327100125551570c5886d8	20150326115500551439e48ff9d	ZAMORA	10:01:25-05	1
201503271002375515710d84454	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:02:37-05	1
201503271002375515710d8a9e9	20150326115500551439e48ff9d	CHINCHIPE	10:02:37-05	1
201503271002375515710d8ac6a	20150326115500551439e48ff9d	EL PANGUI	10:02:37-05	1
201503271002375515710d8ae79	20150326115500551439e48ff9d	NANGARITZA	10:02:37-05	1
201503271002375515710d8b068	20150326115500551439e48ff9d	PALANDA	10:02:37-05	1
201503271002375515710d8b250	20150326115500551439e48ff9d	PAQUISHA	10:02:37-05	1
201503271002375515710d8b412	20150326115500551439e48ff9d	YACUAMBI	10:02:37-05	1
201503271002375515710d8b5ca	20150326115500551439e48ff9d	YANTZAZA	10:02:37-05	1
201503271002375515710d8b775	20150326115500551439e48ff9d	ZAMORA	10:02:37-05	1
2015032410035155117cd706a27	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:03:51-05	1
2015032410035155117cd70cde2	20150326115500551439e48ff9d	CHINCHIPE	10:03:51-05	1
2015032410035155117cd70d05d	20150326115500551439e48ff9d	EL PANGUI	10:03:51-05	1
2015032410035155117cd70d24c	20150326115500551439e48ff9d	NANGARITZA	10:03:51-05	1
2015032410035155117cd70d43e	20150326115500551439e48ff9d	PALANDA	10:03:51-05	1
2015032410035155117cd70d62c	20150326115500551439e48ff9d	PAQUISHA	10:03:51-05	1
2015032410035155117cd70d830	20150326115500551439e48ff9d	YACUAMBI	10:03:51-05	1
2015032410035155117cd70d9da	20150326115500551439e48ff9d	YANTZAZA	10:03:51-05	1
2015032410035155117cd70db8c	20150326115500551439e48ff9d	ZAMORA	10:03:51-05	1
2015032410072755117daf88d9a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:07:27-05	1
2015032410072755117daf8d919	20150326115500551439e48ff9d	CHINCHIPE	10:07:27-05	1
2015032410072755117daf8db84	20150326115500551439e48ff9d	EL PANGUI	10:07:27-05	1
2015032410072755117daf8ddc7	20150326115500551439e48ff9d	NANGARITZA	10:07:27-05	1
2015032410072755117daf8df9a	20150326115500551439e48ff9d	PALANDA	10:07:27-05	1
2015032410072755117daf8e130	20150326115500551439e48ff9d	PAQUISHA	10:07:27-05	1
2015032410072755117daf8e2d6	20150326115500551439e48ff9d	YACUAMBI	10:07:27-05	1
2015032410072755117daf8e458	20150326115500551439e48ff9d	YANTZAZA	10:07:27-05	1
2015032410072755117daf8e5cd	20150326115500551439e48ff9d	ZAMORA	10:07:27-05	1
2015032410075855117dcec2908	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:07:58-05	1
2015032410075855117dcec61e9	20150326115500551439e48ff9d	CHINCHIPE	10:07:58-05	1
2015032410075855117dcec6466	20150326115500551439e48ff9d	EL PANGUI	10:07:58-05	1
2015032410075855117dcec666a	20150326115500551439e48ff9d	NANGARITZA	10:07:58-05	1
2015032410075855117dcec6847	20150326115500551439e48ff9d	PALANDA	10:07:58-05	1
2015032410075855117dcec6a3f	20150326115500551439e48ff9d	PAQUISHA	10:07:58-05	1
2015032410075855117dcec6c33	20150326115500551439e48ff9d	YACUAMBI	10:07:58-05	1
2015032410075855117dcec6dfd	20150326115500551439e48ff9d	YANTZAZA	10:07:58-05	1
2015032410075855117dcec6fb2	20150326115500551439e48ff9d	ZAMORA	10:07:58-05	1
2015032410080955117dd9aa2fd	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:08:09-05	1
2015032410080955117dd9ab016	20150326115500551439e48ff9d	CHINCHIPE	10:08:09-05	1
2015032410080955117dd9ab240	20150326115500551439e48ff9d	EL PANGUI	10:08:09-05	1
2015032410080955117dd9ab3db	20150326115500551439e48ff9d	NANGARITZA	10:08:09-05	1
2015032410080955117dd9ab56e	20150326115500551439e48ff9d	PALANDA	10:08:09-05	1
2015032410080955117dd9ab6fa	20150326115500551439e48ff9d	PAQUISHA	10:08:09-05	1
2015032410080955117dd9ab887	20150326115500551439e48ff9d	YACUAMBI	10:08:09-05	1
2015032410080955117dd9ab9f1	20150326115500551439e48ff9d	YANTZAZA	10:08:09-05	1
2015032410080955117dd9abb4b	20150326115500551439e48ff9d	ZAMORA	10:08:09-05	1
2015032410083655117df4da046	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:08:36-05	1
2015032410083655117df4daf76	20150326115500551439e48ff9d	CHINCHIPE	10:08:36-05	1
2015032410083655117df4db1f4	20150326115500551439e48ff9d	EL PANGUI	10:08:36-05	1
2015032410083655117df4db3e7	20150326115500551439e48ff9d	NANGARITZA	10:08:36-05	1
2015032410083655117df4db5e3	20150326115500551439e48ff9d	PALANDA	10:08:36-05	1
2015032410083655117df4db7e3	20150326115500551439e48ff9d	PAQUISHA	10:08:36-05	1
2015032410083655117df4db9e4	20150326115500551439e48ff9d	YACUAMBI	10:08:36-05	1
2015032410083655117df4dbb84	20150326115500551439e48ff9d	YANTZAZA	10:08:36-05	1
2015032410083655117df4dbd24	20150326115500551439e48ff9d	ZAMORA	10:08:36-05	1
2015032410084855117e0059b4f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:08:48-05	1
2015032410084855117e005a96f	20150326115500551439e48ff9d	CHINCHIPE	10:08:48-05	1
2015032410084855117e005abc7	20150326115500551439e48ff9d	EL PANGUI	10:08:48-05	1
2015032410084855117e005ad9a	20150326115500551439e48ff9d	NANGARITZA	10:08:48-05	1
2015032410084855117e005af3d	20150326115500551439e48ff9d	PALANDA	10:08:48-05	1
2015032410084855117e005b0f9	20150326115500551439e48ff9d	PAQUISHA	10:08:48-05	1
2015032410084855117e005b289	20150326115500551439e48ff9d	YACUAMBI	10:08:48-05	1
2015032410084855117e005b3e6	20150326115500551439e48ff9d	YANTZAZA	10:08:48-05	1
2015032410084855117e005b53d	20150326115500551439e48ff9d	ZAMORA	10:08:48-05	1
2015032410093555117e2f94638	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:09:35-05	1
2015032410093555117e2f954df	20150326115500551439e48ff9d	CHINCHIPE	10:09:35-05	1
2015032410093555117e2f9576e	20150326115500551439e48ff9d	EL PANGUI	10:09:35-05	1
2015032410093555117e2f95980	20150326115500551439e48ff9d	NANGARITZA	10:09:35-05	1
2015032410093555117e2f95b69	20150326115500551439e48ff9d	PALANDA	10:09:35-05	1
2015032410093555117e2f95d73	20150326115500551439e48ff9d	PAQUISHA	10:09:35-05	1
2015032410093555117e2f95f6d	20150326115500551439e48ff9d	YACUAMBI	10:09:35-05	1
2015032410093555117e2f96140	20150326115500551439e48ff9d	YANTZAZA	10:09:35-05	1
2015032410093555117e2f962f2	20150326115500551439e48ff9d	ZAMORA	10:09:35-05	1
2015032410101855117e5a9901d	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:10:18-05	1
2015032410101855117e5a99f22	20150326115500551439e48ff9d	CHINCHIPE	10:10:18-05	1
2015032410101855117e5a9a160	20150326115500551439e48ff9d	EL PANGUI	10:10:18-05	1
2015032410101855117e5a9a353	20150326115500551439e48ff9d	NANGARITZA	10:10:18-05	1
2015032410101855117e5a9a529	20150326115500551439e48ff9d	PALANDA	10:10:18-05	1
2015032410101855117e5a9a6e8	20150326115500551439e48ff9d	PAQUISHA	10:10:18-05	1
2015032410101855117e5a9a8ae	20150326115500551439e48ff9d	YACUAMBI	10:10:18-05	1
2015032410101855117e5a9aa52	20150326115500551439e48ff9d	YANTZAZA	10:10:18-05	1
2015032410101855117e5a9ac5f	20150326115500551439e48ff9d	ZAMORA	10:10:18-05	1
2015032410110655117e8acfa9d	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:11:06-05	1
2015032410110655117e8ad53af	20150326115500551439e48ff9d	CHINCHIPE	10:11:06-05	1
2015032410110655117e8ad562c	20150326115500551439e48ff9d	EL PANGUI	10:11:06-05	1
2015032410110655117e8ad581b	20150326115500551439e48ff9d	NANGARITZA	10:11:06-05	1
2015032410110655117e8ad59ee	20150326115500551439e48ff9d	PALANDA	10:11:06-05	1
2015032410110655117e8ad5bd7	20150326115500551439e48ff9d	PAQUISHA	10:11:06-05	1
2015032410110655117e8ad5dbd	20150326115500551439e48ff9d	YACUAMBI	10:11:06-05	1
2015032410110655117e8ad5f67	20150326115500551439e48ff9d	YANTZAZA	10:11:06-05	1
2015032410110655117e8ad6126	20150326115500551439e48ff9d	ZAMORA	10:11:06-05	1
2015032410121955117ed386834	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:12:19-05	1
2015032410121955117ed38776f	20150326115500551439e48ff9d	CHINCHIPE	10:12:19-05	1
2015032410121955117ed3879cb	20150326115500551439e48ff9d	EL PANGUI	10:12:19-05	1
2015032410121955117ed387bbe	20150326115500551439e48ff9d	NANGARITZA	10:12:19-05	1
2015032410121955117ed387d92	20150326115500551439e48ff9d	PALANDA	10:12:19-05	1
2015032410121955117ed387f6f	20150326115500551439e48ff9d	PAQUISHA	10:12:19-05	1
2015032410121955117ed388170	20150326115500551439e48ff9d	YACUAMBI	10:12:19-05	1
2015032410121955117ed388312	20150326115500551439e48ff9d	YANTZAZA	10:12:19-05	1
2015032410121955117ed388497	20150326115500551439e48ff9d	ZAMORA	10:12:19-05	1
2015032410122355117ed7533ea	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:12:23-05	1
2015032410122355117ed75427e	20150326115500551439e48ff9d	CHINCHIPE	10:12:23-05	1
2015032410122355117ed754549	20150326115500551439e48ff9d	EL PANGUI	10:12:23-05	1
2015032410122355117ed754742	20150326115500551439e48ff9d	NANGARITZA	10:12:23-05	1
2015032410122355117ed754918	20150326115500551439e48ff9d	PALANDA	10:12:23-05	1
2015032410122355117ed754ae6	20150326115500551439e48ff9d	PAQUISHA	10:12:23-05	1
2015032410122355117ed754cd7	20150326115500551439e48ff9d	YACUAMBI	10:12:23-05	1
2015032410122355117ed754e7f	20150326115500551439e48ff9d	YANTZAZA	10:12:23-05	1
2015032410122355117ed75501d	20150326115500551439e48ff9d	ZAMORA	10:12:23-05	1
2015032410135055117f2e04aec	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:13:50-05	1
2015032410135055117f2e0594f	20150326115500551439e48ff9d	CHINCHIPE	10:13:50-05	1
2015032410135055117f2e05b9f	20150326115500551439e48ff9d	EL PANGUI	10:13:50-05	1
2015032410135055117f2e05da9	20150326115500551439e48ff9d	NANGARITZA	10:13:50-05	1
2015032410135055117f2e05fb0	20150326115500551439e48ff9d	PALANDA	10:13:50-05	1
2015032410135055117f2e06183	20150326115500551439e48ff9d	PAQUISHA	10:13:50-05	1
2015032410135055117f2e0630d	20150326115500551439e48ff9d	YACUAMBI	10:13:50-05	1
2015032410135055117f2e0649c	20150326115500551439e48ff9d	YANTZAZA	10:13:50-05	1
2015032410135055117f2e06612	20150326115500551439e48ff9d	ZAMORA	10:13:50-05	1
2015032410144455117f64953a2	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:14:44-05	1
2015032410144455117f64962f1	20150326115500551439e48ff9d	CHINCHIPE	10:14:44-05	1
2015032410144455117f6496571	20150326115500551439e48ff9d	EL PANGUI	10:14:44-05	1
2015032410144455117f649674b	20150326115500551439e48ff9d	NANGARITZA	10:14:44-05	1
2015032410144455117f6496917	20150326115500551439e48ff9d	PALANDA	10:14:44-05	1
2015032410144455117f6496aef	20150326115500551439e48ff9d	PAQUISHA	10:14:44-05	1
2015032410144455117f6496cb8	20150326115500551439e48ff9d	YACUAMBI	10:14:44-05	1
2015032410144455117f6496e4c	20150326115500551439e48ff9d	YANTZAZA	10:14:44-05	1
2015032410144455117f6496fcc	20150326115500551439e48ff9d	ZAMORA	10:14:44-05	1
2015032410160155117fb19b238	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:16:01-05	1
2015032410160155117fb1a19b2	20150326115500551439e48ff9d	CHINCHIPE	10:16:01-05	1
2015032410160155117fb1a1c1a	20150326115500551439e48ff9d	EL PANGUI	10:16:01-05	1
2015032410160155117fb1a1df8	20150326115500551439e48ff9d	NANGARITZA	10:16:01-05	1
2015032410160155117fb1a1fde	20150326115500551439e48ff9d	PALANDA	10:16:01-05	1
2015032410160155117fb1a21f6	20150326115500551439e48ff9d	PAQUISHA	10:16:01-05	1
2015032410160155117fb1a23c7	20150326115500551439e48ff9d	YACUAMBI	10:16:01-05	1
2015032410160155117fb1a2579	20150326115500551439e48ff9d	YANTZAZA	10:16:01-05	1
2015032410160155117fb1a2732	20150326115500551439e48ff9d	ZAMORA	10:16:01-05	1
2015032410163355117fd180130	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:16:33-05	1
2015032410163355117fd18111a	20150326115500551439e48ff9d	CHINCHIPE	10:16:33-05	1
2015032410163355117fd18138b	20150326115500551439e48ff9d	EL PANGUI	10:16:33-05	1
2015032410163355117fd18157c	20150326115500551439e48ff9d	NANGARITZA	10:16:33-05	1
2015032410163355117fd181789	20150326115500551439e48ff9d	PALANDA	10:16:33-05	1
2015032410163355117fd181980	20150326115500551439e48ff9d	PAQUISHA	10:16:33-05	1
2015032410163355117fd181b86	20150326115500551439e48ff9d	YACUAMBI	10:16:33-05	1
2015032410163355117fd181d23	20150326115500551439e48ff9d	YANTZAZA	10:16:33-05	1
2015032410163355117fd181ee0	20150326115500551439e48ff9d	ZAMORA	10:16:33-05	1
2015032410165655117fe8c60b2	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:16:56-05	1
2015032410165655117fe8c70fe	20150326115500551439e48ff9d	CHINCHIPE	10:16:56-05	1
2015032410165655117fe8c7357	20150326115500551439e48ff9d	EL PANGUI	10:16:56-05	1
2015032410165655117fe8c755c	20150326115500551439e48ff9d	NANGARITZA	10:16:56-05	1
2015032410165655117fe8c7766	20150326115500551439e48ff9d	PALANDA	10:16:56-05	1
2015032410165655117fe8c7947	20150326115500551439e48ff9d	PAQUISHA	10:16:56-05	1
2015032410165655117fe8c7bd9	20150326115500551439e48ff9d	YACUAMBI	10:16:56-05	1
2015032410165655117fe8c7d9e	20150326115500551439e48ff9d	YANTZAZA	10:16:56-05	1
2015032410165655117fe8c7f54	20150326115500551439e48ff9d	ZAMORA	10:16:56-05	1
201503241019325511808490c8a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:19:32-05	1
201503241019325511808491c7c	20150326115500551439e48ff9d	CHINCHIPE	10:19:32-05	1
201503241019325511808491eed	20150326115500551439e48ff9d	EL PANGUI	10:19:32-05	1
2015032410193255118084920d2	20150326115500551439e48ff9d	NANGARITZA	10:19:32-05	1
2015032410193255118084922b3	20150326115500551439e48ff9d	PALANDA	10:19:32-05	1
201503241019325511808492471	20150326115500551439e48ff9d	PAQUISHA	10:19:32-05	1
2015032410193255118084926b7	20150326115500551439e48ff9d	YACUAMBI	10:19:32-05	1
2015032410193255118084928a5	20150326115500551439e48ff9d	YANTZAZA	10:19:32-05	1
201503241019325511808492a65	20150326115500551439e48ff9d	ZAMORA	10:19:32-05	1
20150324101934551180867165b	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:19:34-05	1
2015032410193455118086725a2	20150326115500551439e48ff9d	CHINCHIPE	10:19:34-05	1
201503241019345511808672809	20150326115500551439e48ff9d	EL PANGUI	10:19:34-05	1
201503241019345511808672a1b	20150326115500551439e48ff9d	NANGARITZA	10:19:34-05	1
201503241019345511808672bf0	20150326115500551439e48ff9d	PALANDA	10:19:34-05	1
201503241019345511808672de2	20150326115500551439e48ff9d	PAQUISHA	10:19:34-05	1
201503241019345511808672fc9	20150326115500551439e48ff9d	YACUAMBI	10:19:34-05	1
201503241019345511808673170	20150326115500551439e48ff9d	YANTZAZA	10:19:34-05	1
2015032410193455118086732dc	20150326115500551439e48ff9d	ZAMORA	10:19:34-05	1
20150324102022551180b65760a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:20:22-05	1
20150324102022551180b65868b	20150326115500551439e48ff9d	CHINCHIPE	10:20:22-05	1
20150324102022551180b6588e0	20150326115500551439e48ff9d	EL PANGUI	10:20:22-05	1
20150324102022551180b658ade	20150326115500551439e48ff9d	NANGARITZA	10:20:22-05	1
20150324102022551180b658cc9	20150326115500551439e48ff9d	PALANDA	10:20:22-05	1
20150324102022551180b658edb	20150326115500551439e48ff9d	PAQUISHA	10:20:22-05	1
20150324102022551180b6590ab	20150326115500551439e48ff9d	YACUAMBI	10:20:22-05	1
20150324102022551180b65926c	20150326115500551439e48ff9d	YANTZAZA	10:20:22-05	1
20150324102022551180b6593f2	20150326115500551439e48ff9d	ZAMORA	10:20:22-05	1
20150324102038551180c614d52	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:20:38-05	1
20150324102038551180c618ceb	20150326115500551439e48ff9d	CHINCHIPE	10:20:38-05	1
20150324102038551180c618f85	20150326115500551439e48ff9d	EL PANGUI	10:20:38-05	1
20150324102038551180c61914e	20150326115500551439e48ff9d	NANGARITZA	10:20:38-05	1
20150324102038551180c619310	20150326115500551439e48ff9d	PALANDA	10:20:38-05	1
20150324102038551180c6194d0	20150326115500551439e48ff9d	PAQUISHA	10:20:38-05	1
20150324102038551180c619682	20150326115500551439e48ff9d	YACUAMBI	10:20:38-05	1
20150324102038551180c61980f	20150326115500551439e48ff9d	YANTZAZA	10:20:38-05	1
20150324102038551180c619989	20150326115500551439e48ff9d	ZAMORA	10:20:38-05	1
20150324102517551181ddc3a43	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:25:17-05	1
20150324102517551181ddc53ef	20150326115500551439e48ff9d	CHINCHIPE	10:25:17-05	1
20150324102517551181ddc56d3	20150326115500551439e48ff9d	EL PANGUI	10:25:17-05	1
20150324102517551181ddc58ed	20150326115500551439e48ff9d	NANGARITZA	10:25:17-05	1
20150324102517551181ddc5ba5	20150326115500551439e48ff9d	PALANDA	10:25:17-05	1
20150324102517551181ddc5d8b	20150326115500551439e48ff9d	PAQUISHA	10:25:17-05	1
20150324102517551181ddc5f3f	20150326115500551439e48ff9d	YACUAMBI	10:25:17-05	1
20150324102517551181ddc60cd	20150326115500551439e48ff9d	YANTZAZA	10:25:17-05	1
20150324102517551181ddc624f	20150326115500551439e48ff9d	ZAMORA	10:25:17-05	1
20150324102939551182e32f1bf	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:29:39-05	1
20150324102939551182e332920	20150326115500551439e48ff9d	CHINCHIPE	10:29:39-05	1
20150324102939551182e332c87	20150326115500551439e48ff9d	EL PANGUI	10:29:39-05	1
20150324102939551182e332e8a	20150326115500551439e48ff9d	NANGARITZA	10:29:39-05	1
20150324102939551182e33307a	20150326115500551439e48ff9d	PALANDA	10:29:39-05	1
20150324102939551182e333256	20150326115500551439e48ff9d	PAQUISHA	10:29:39-05	1
20150324102939551182e33343c	20150326115500551439e48ff9d	YACUAMBI	10:29:39-05	1
20150324102939551182e3335f8	20150326115500551439e48ff9d	YANTZAZA	10:29:39-05	1
20150324102939551182e3337ae	20150326115500551439e48ff9d	ZAMORA	10:29:39-05	1
201503241030155511830785bf2	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:30:15-05	1
2015032410301555118307876b5	20150326115500551439e48ff9d	CHINCHIPE	10:30:15-05	1
20150324103015551183078790f	20150326115500551439e48ff9d	EL PANGUI	10:30:15-05	1
201503241030155511830787ac1	20150326115500551439e48ff9d	NANGARITZA	10:30:15-05	1
201503241030155511830787c9e	20150326115500551439e48ff9d	PALANDA	10:30:15-05	1
201503241030155511830787e4d	20150326115500551439e48ff9d	PAQUISHA	10:30:15-05	1
201503241030155511830788332	20150326115500551439e48ff9d	YACUAMBI	10:30:15-05	1
2015032410301555118307884d8	20150326115500551439e48ff9d	YANTZAZA	10:30:15-05	1
20150324103015551183078865d	20150326115500551439e48ff9d	ZAMORA	10:30:15-05	1
2015032410302655118312a12e1	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:30:26-05	1
2015032410302655118312a5db2	20150326115500551439e48ff9d	CHINCHIPE	10:30:26-05	1
2015032410302655118312a600c	20150326115500551439e48ff9d	EL PANGUI	10:30:26-05	1
2015032410302655118312a61e3	20150326115500551439e48ff9d	NANGARITZA	10:30:26-05	1
2015032410302655118312a6435	20150326115500551439e48ff9d	PALANDA	10:30:26-05	1
2015032410302655118312a6608	20150326115500551439e48ff9d	PAQUISHA	10:30:26-05	1
2015032410302655118312a67ca	20150326115500551439e48ff9d	YACUAMBI	10:30:26-05	1
2015032410302655118312a694b	20150326115500551439e48ff9d	YANTZAZA	10:30:26-05	1
2015032410302655118312a6b0c	20150326115500551439e48ff9d	ZAMORA	10:30:26-05	1
201503241030385511831e07381	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:30:38-05	1
201503241030385511831e0838e	20150326115500551439e48ff9d	CHINCHIPE	10:30:38-05	1
201503241030385511831e0861d	20150326115500551439e48ff9d	EL PANGUI	10:30:38-05	1
201503241030385511831e0883e	20150326115500551439e48ff9d	NANGARITZA	10:30:38-05	1
201503241030385511831e08a3c	20150326115500551439e48ff9d	PALANDA	10:30:38-05	1
201503241030385511831e08c16	20150326115500551439e48ff9d	PAQUISHA	10:30:38-05	1
201503241030385511831e08df3	20150326115500551439e48ff9d	YACUAMBI	10:30:38-05	1
201503241030385511831e08fbb	20150326115500551439e48ff9d	YANTZAZA	10:30:38-05	1
201503241030385511831e091a9	20150326115500551439e48ff9d	ZAMORA	10:30:38-05	1
201503241031115511833f4873f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:31:11-05	1
201503241031115511833f4967b	20150326115500551439e48ff9d	CHINCHIPE	10:31:11-05	1
201503241031115511833f498c1	20150326115500551439e48ff9d	EL PANGUI	10:31:11-05	1
201503241031115511833f49a9d	20150326115500551439e48ff9d	NANGARITZA	10:31:11-05	1
201503241031115511833f49c71	20150326115500551439e48ff9d	PALANDA	10:31:11-05	1
201503241031115511833f49e46	20150326115500551439e48ff9d	PAQUISHA	10:31:11-05	1
201503241031115511833f49fdb	20150326115500551439e48ff9d	YACUAMBI	10:31:11-05	1
201503241031115511833f4a179	20150326115500551439e48ff9d	YANTZAZA	10:31:11-05	1
201503241031115511833f4a2f1	20150326115500551439e48ff9d	ZAMORA	10:31:11-05	1
2015032410314855118364f234f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:31:48-05	1
2015032410314855118364f31d9	20150326115500551439e48ff9d	CHINCHIPE	10:31:48-05	1
2015032410314855118364f3403	20150326115500551439e48ff9d	EL PANGUI	10:31:48-05	1
2015032410314855118364f361e	20150326115500551439e48ff9d	NANGARITZA	10:31:48-05	1
2015032410314855118364f3889	20150326115500551439e48ff9d	PALANDA	10:31:48-05	1
2015032410314855118364f3a5a	20150326115500551439e48ff9d	PAQUISHA	10:31:48-05	1
2015032410314855118364f3c17	20150326115500551439e48ff9d	YACUAMBI	10:31:48-05	1
2015032410314855118364f3de2	20150326115500551439e48ff9d	YANTZAZA	10:31:48-05	1
2015032410314855118364f3fbb	20150326115500551439e48ff9d	ZAMORA	10:31:48-05	1
20150324103200551183703e369	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:32:00-05	1
20150324103200551183703f1c5	20150326115500551439e48ff9d	CHINCHIPE	10:32:00-05	1
20150324103200551183703f3fe	20150326115500551439e48ff9d	EL PANGUI	10:32:00-05	1
20150324103200551183703f5b5	20150326115500551439e48ff9d	NANGARITZA	10:32:00-05	1
20150324103200551183703f799	20150326115500551439e48ff9d	PALANDA	10:32:00-05	1
20150324103200551183703f967	20150326115500551439e48ff9d	PAQUISHA	10:32:00-05	1
20150324103200551183703fb1a	20150326115500551439e48ff9d	YACUAMBI	10:32:00-05	1
20150324103200551183703fcad	20150326115500551439e48ff9d	YANTZAZA	10:32:00-05	1
20150324103200551183703fe26	20150326115500551439e48ff9d	ZAMORA	10:32:00-05	1
20150324103458551184225ac97	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:34:58-05	1
20150324103458551184225bacc	20150326115500551439e48ff9d	CHINCHIPE	10:34:58-05	1
20150324103458551184225bd10	20150326115500551439e48ff9d	EL PANGUI	10:34:58-05	1
20150324103458551184225bef4	20150326115500551439e48ff9d	NANGARITZA	10:34:58-05	1
20150324103458551184225c0e5	20150326115500551439e48ff9d	PALANDA	10:34:58-05	1
20150324103458551184225c2c0	20150326115500551439e48ff9d	PAQUISHA	10:34:58-05	1
20150324103458551184225c49a	20150326115500551439e48ff9d	YACUAMBI	10:34:58-05	1
20150324103458551184225c625	20150326115500551439e48ff9d	YANTZAZA	10:34:58-05	1
20150324103458551184225c7a7	20150326115500551439e48ff9d	ZAMORA	10:34:58-05	1
201503241035285511844066fcb	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:35:28-05	1
201503241035285511844067f99	20150326115500551439e48ff9d	CHINCHIPE	10:35:28-05	1
20150324103528551184406821a	20150326115500551439e48ff9d	EL PANGUI	10:35:28-05	1
201503241035285511844068413	20150326115500551439e48ff9d	NANGARITZA	10:35:28-05	1
2015032410352855118440685fb	20150326115500551439e48ff9d	PALANDA	10:35:28-05	1
2015032410352855118440687f9	20150326115500551439e48ff9d	PAQUISHA	10:35:28-05	1
2015032410352855118440689cc	20150326115500551439e48ff9d	YACUAMBI	10:35:28-05	1
201503241035285511844068b79	20150326115500551439e48ff9d	YANTZAZA	10:35:28-05	1
201503241035285511844068d17	20150326115500551439e48ff9d	ZAMORA	10:35:28-05	1
20150324103604551184642b066	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:36:04-05	1
20150324103604551184642bf57	20150326115500551439e48ff9d	CHINCHIPE	10:36:04-05	1
20150324103604551184642c19a	20150326115500551439e48ff9d	EL PANGUI	10:36:04-05	1
20150324103604551184642c376	20150326115500551439e48ff9d	NANGARITZA	10:36:04-05	1
20150324103604551184642c548	20150326115500551439e48ff9d	PALANDA	10:36:04-05	1
20150324103604551184642c713	20150326115500551439e48ff9d	PAQUISHA	10:36:04-05	1
20150324103604551184642c8b8	20150326115500551439e48ff9d	YACUAMBI	10:36:04-05	1
20150324103604551184642ca3f	20150326115500551439e48ff9d	YANTZAZA	10:36:04-05	1
20150324103604551184642cbc2	20150326115500551439e48ff9d	ZAMORA	10:36:04-05	1
20150324103809551184e19aacb	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:38:09-05	1
20150324103809551184e19c21f	20150326115500551439e48ff9d	CHINCHIPE	10:38:09-05	1
20150324103809551184e19c514	20150326115500551439e48ff9d	EL PANGUI	10:38:09-05	1
20150324103809551184e19c702	20150326115500551439e48ff9d	NANGARITZA	10:38:09-05	1
20150324103809551184e19c8d9	20150326115500551439e48ff9d	PALANDA	10:38:09-05	1
20150324103809551184e19caab	20150326115500551439e48ff9d	PAQUISHA	10:38:09-05	1
20150324103809551184e19cc7c	20150326115500551439e48ff9d	YACUAMBI	10:38:09-05	1
20150324103809551184e19ce1f	20150326115500551439e48ff9d	YANTZAZA	10:38:09-05	1
20150324103809551184e19cfb3	20150326115500551439e48ff9d	ZAMORA	10:38:09-05	1
20150324103819551184eb68e4d	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:38:19-05	1
20150324103819551184eb6f4fd	20150326115500551439e48ff9d	CHINCHIPE	10:38:19-05	1
20150324103819551184eb6f76f	20150326115500551439e48ff9d	EL PANGUI	10:38:19-05	1
20150324103819551184eb6fc85	20150326115500551439e48ff9d	NANGARITZA	10:38:19-05	1
20150324103819551184eb6fe71	20150326115500551439e48ff9d	PALANDA	10:38:19-05	1
20150324103819551184eb70055	20150326115500551439e48ff9d	PAQUISHA	10:38:19-05	1
20150324103819551184eb70216	20150326115500551439e48ff9d	YACUAMBI	10:38:19-05	1
20150324103819551184eb703d2	20150326115500551439e48ff9d	YANTZAZA	10:38:19-05	1
20150324103819551184eb7058a	20150326115500551439e48ff9d	ZAMORA	10:38:19-05	1
2015032410395255118548c95b1	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:39:52-05	1
2015032410395255118548ca48b	20150326115500551439e48ff9d	CHINCHIPE	10:39:52-05	1
2015032410395255118548ca6cc	20150326115500551439e48ff9d	EL PANGUI	10:39:52-05	1
2015032410395255118548ca8a0	20150326115500551439e48ff9d	NANGARITZA	10:39:52-05	1
2015032410395255118548caa75	20150326115500551439e48ff9d	PALANDA	10:39:52-05	1
2015032410395255118548cac4b	20150326115500551439e48ff9d	PAQUISHA	10:39:52-05	1
2015032410395255118548cae3d	20150326115500551439e48ff9d	YACUAMBI	10:39:52-05	1
2015032410395255118548cb020	20150326115500551439e48ff9d	YANTZAZA	10:39:52-05	1
2015032410395255118548cb1f4	20150326115500551439e48ff9d	ZAMORA	10:39:52-05	1
201503241040085511855846bd8	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:40:08-05	1
201503241040085511855847bb3	20150326115500551439e48ff9d	CHINCHIPE	10:40:08-05	1
201503241040085511855847e12	20150326115500551439e48ff9d	EL PANGUI	10:40:08-05	1
201503241040085511855847ff4	20150326115500551439e48ff9d	NANGARITZA	10:40:08-05	1
2015032410400855118558481d0	20150326115500551439e48ff9d	PALANDA	10:40:08-05	1
20150324104008551185584839d	20150326115500551439e48ff9d	PAQUISHA	10:40:08-05	1
201503241040085511855848530	20150326115500551439e48ff9d	YACUAMBI	10:40:08-05	1
2015032410400855118558486e2	20150326115500551439e48ff9d	YANTZAZA	10:40:08-05	1
201503241040085511855848894	20150326115500551439e48ff9d	ZAMORA	10:40:08-05	1
201503241040365511857452118	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:40:36-05	1
20150324104036551185745309d	20150326115500551439e48ff9d	CHINCHIPE	10:40:36-05	1
2015032410403655118574532fb	20150326115500551439e48ff9d	EL PANGUI	10:40:36-05	1
2015032410403655118574534f2	20150326115500551439e48ff9d	NANGARITZA	10:40:36-05	1
201503241040365511857453694	20150326115500551439e48ff9d	PALANDA	10:40:36-05	1
201503241040365511857453879	20150326115500551439e48ff9d	PAQUISHA	10:40:36-05	1
201503241040365511857453a57	20150326115500551439e48ff9d	YACUAMBI	10:40:36-05	1
201503241040365511857453c0b	20150326115500551439e48ff9d	YANTZAZA	10:40:36-05	1
201503241040365511857453dc0	20150326115500551439e48ff9d	ZAMORA	10:40:36-05	1
20150324105520551188e86ca7c	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:55:20-05	1
20150324105520551188e872d76	20150326115500551439e48ff9d	CHINCHIPE	10:55:20-05	1
20150324105520551188e872fe8	20150326115500551439e48ff9d	EL PANGUI	10:55:20-05	1
20150324105520551188e87321f	20150326115500551439e48ff9d	NANGARITZA	10:55:20-05	1
20150324105520551188e873493	20150326115500551439e48ff9d	PALANDA	10:55:20-05	1
20150324105520551188e873689	20150326115500551439e48ff9d	PAQUISHA	10:55:20-05	1
20150324105520551188e87396f	20150326115500551439e48ff9d	YACUAMBI	10:55:20-05	1
20150324105520551188e873b57	20150326115500551439e48ff9d	YANTZAZA	10:55:20-05	1
20150324105520551188e873cd8	20150326115500551439e48ff9d	ZAMORA	10:55:20-05	1
20150324105530551188f2cd374	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:55:30-05	1
20150324105530551188f2d2634	20150326115500551439e48ff9d	CHINCHIPE	10:55:30-05	1
20150324105530551188f2d288e	20150326115500551439e48ff9d	EL PANGUI	10:55:30-05	1
20150324105530551188f2d2a66	20150326115500551439e48ff9d	NANGARITZA	10:55:30-05	1
20150324105530551188f2d2c3c	20150326115500551439e48ff9d	PALANDA	10:55:30-05	1
20150324105530551188f2d2dd2	20150326115500551439e48ff9d	PAQUISHA	10:55:30-05	1
20150324105530551188f2d2fb9	20150326115500551439e48ff9d	YACUAMBI	10:55:30-05	1
20150324105530551188f2d3141	20150326115500551439e48ff9d	YANTZAZA	10:55:30-05	1
20150324105530551188f2d32c6	20150326115500551439e48ff9d	ZAMORA	10:55:30-05	1
2015032411164855118df0e65c5	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:16:48-05	1
2015032411164855118df0ea244	20150326115500551439e48ff9d	CHINCHIPE	11:16:48-05	1
2015032411164855118df0ea4c1	20150326115500551439e48ff9d	EL PANGUI	11:16:48-05	1
2015032411164855118df0ea6a6	20150326115500551439e48ff9d	NANGARITZA	11:16:48-05	1
2015032411164855118df0ea896	20150326115500551439e48ff9d	PALANDA	11:16:48-05	1
2015032411164855118df0eaa72	20150326115500551439e48ff9d	PAQUISHA	11:16:48-05	1
2015032411164855118df0eac67	20150326115500551439e48ff9d	YACUAMBI	11:16:48-05	1
2015032411164855118df0eae31	20150326115500551439e48ff9d	YANTZAZA	11:16:48-05	1
2015032411164855118df0eafdd	20150326115500551439e48ff9d	ZAMORA	11:16:48-05	1
2015032411175655118e34972dd	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:17:56-05	1
2015032411175655118e3499d8f	20150326115500551439e48ff9d	CHINCHIPE	11:17:56-05	1
2015032411175655118e349a095	20150326115500551439e48ff9d	EL PANGUI	11:17:56-05	1
2015032411175655118e349a2b5	20150326115500551439e48ff9d	NANGARITZA	11:17:56-05	1
2015032411175655118e349a4a9	20150326115500551439e48ff9d	PALANDA	11:17:56-05	1
2015032411175655118e349a732	20150326115500551439e48ff9d	PAQUISHA	11:17:56-05	1
2015032411175655118e349a92b	20150326115500551439e48ff9d	YACUAMBI	11:17:56-05	1
2015032411175655118e349aacf	20150326115500551439e48ff9d	YANTZAZA	11:17:56-05	1
2015032411175655118e349ac7a	20150326115500551439e48ff9d	ZAMORA	11:17:56-05	1
2015032411194055118e9c9fa60	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:19:40-05	1
2015032411194055118e9ca2361	20150326115500551439e48ff9d	CHINCHIPE	11:19:40-05	1
2015032411194055118e9ca25ed	20150326115500551439e48ff9d	EL PANGUI	11:19:40-05	1
2015032411194055118e9ca2833	20150326115500551439e48ff9d	NANGARITZA	11:19:40-05	1
2015032411194055118e9ca2ae9	20150326115500551439e48ff9d	PALANDA	11:19:40-05	1
2015032411194055118e9ca2cfd	20150326115500551439e48ff9d	PAQUISHA	11:19:40-05	1
2015032411194055118e9ca2eee	20150326115500551439e48ff9d	YACUAMBI	11:19:40-05	1
2015032411194055118e9ca30b7	20150326115500551439e48ff9d	YANTZAZA	11:19:40-05	1
2015032411194055118e9ca3262	20150326115500551439e48ff9d	ZAMORA	11:19:40-05	1
2015032411214155118f1544a9b	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:21:41-05	1
2015032411214155118f15459b7	20150326115500551439e48ff9d	CHINCHIPE	11:21:41-05	1
2015032411214155118f1545c1e	20150326115500551439e48ff9d	EL PANGUI	11:21:41-05	1
2015032411214155118f1545e5f	20150326115500551439e48ff9d	NANGARITZA	11:21:41-05	1
2015032411214155118f154603b	20150326115500551439e48ff9d	PALANDA	11:21:41-05	1
2015032411214155118f1546204	20150326115500551439e48ff9d	PAQUISHA	11:21:41-05	1
2015032411214155118f15463b9	20150326115500551439e48ff9d	YACUAMBI	11:21:41-05	1
2015032411214155118f154652f	20150326115500551439e48ff9d	YANTZAZA	11:21:41-05	1
2015032411214155118f15466d0	20150326115500551439e48ff9d	ZAMORA	11:21:41-05	1
2015032411214255118f162a146	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:21:42-05	1
2015032411214255118f162b298	20150326115500551439e48ff9d	CHINCHIPE	11:21:42-05	1
2015032411214255118f162b519	20150326115500551439e48ff9d	EL PANGUI	11:21:42-05	1
2015032411214255118f162b71c	20150326115500551439e48ff9d	NANGARITZA	11:21:42-05	1
2015032411214255118f162b8f9	20150326115500551439e48ff9d	PALANDA	11:21:42-05	1
2015032411214255118f162bae9	20150326115500551439e48ff9d	PAQUISHA	11:21:42-05	1
2015032411214255118f162bcfb	20150326115500551439e48ff9d	YACUAMBI	11:21:42-05	1
2015032411214255118f162beb1	20150326115500551439e48ff9d	YANTZAZA	11:21:42-05	1
2015032411214255118f162c065	20150326115500551439e48ff9d	ZAMORA	11:21:42-05	1
201503241613125511d3681f71e	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:13:12-05	1
201503241613125511d36821c7c	20150326115500551439e48ff9d	CHINCHIPE	16:13:12-05	1
201503241613125511d36821ee3	20150326115500551439e48ff9d	EL PANGUI	16:13:12-05	1
201503241613125511d368220c2	20150326115500551439e48ff9d	NANGARITZA	16:13:12-05	1
201503241613125511d3682227f	20150326115500551439e48ff9d	PALANDA	16:13:12-05	1
201503241613125511d36822426	20150326115500551439e48ff9d	PAQUISHA	16:13:12-05	1
201503241613125511d36822695	20150326115500551439e48ff9d	YACUAMBI	16:13:12-05	1
201503241613125511d368228e1	20150326115500551439e48ff9d	YANTZAZA	16:13:12-05	1
201503241613125511d36822ad2	20150326115500551439e48ff9d	ZAMORA	16:13:12-05	1
201503241616435511d43b5df60	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:16:43-05	1
201503241616435511d43b6179f	20150326115500551439e48ff9d	CHINCHIPE	16:16:43-05	1
201503241616435511d43b61a20	20150326115500551439e48ff9d	EL PANGUI	16:16:43-05	1
201503241616435511d43b61c00	20150326115500551439e48ff9d	NANGARITZA	16:16:43-05	1
201503241616435511d43b61dc1	20150326115500551439e48ff9d	PALANDA	16:16:43-05	1
201503241616435511d43b61fb2	20150326115500551439e48ff9d	PAQUISHA	16:16:43-05	1
201503241616435511d43b62194	20150326115500551439e48ff9d	YACUAMBI	16:16:43-05	1
201503241616435511d43b62352	20150326115500551439e48ff9d	YANTZAZA	16:16:43-05	1
201503241616435511d43b6250a	20150326115500551439e48ff9d	ZAMORA	16:16:43-05	1
201503241617275511d4674b23a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:17:27-05	1
201503241617275511d4674e8c5	20150326115500551439e48ff9d	CHINCHIPE	16:17:27-05	1
201503241617275511d4674eb33	20150326115500551439e48ff9d	EL PANGUI	16:17:27-05	1
201503241617275511d4674ed0d	20150326115500551439e48ff9d	NANGARITZA	16:17:27-05	1
201503241617275511d4674eee4	20150326115500551439e48ff9d	PALANDA	16:17:27-05	1
201503241617275511d4674f0cb	20150326115500551439e48ff9d	PAQUISHA	16:17:27-05	1
201503241617275511d4674f2a5	20150326115500551439e48ff9d	YACUAMBI	16:17:27-05	1
201503241617275511d4674f4b7	20150326115500551439e48ff9d	YANTZAZA	16:17:27-05	1
201503241617275511d4674f656	20150326115500551439e48ff9d	ZAMORA	16:17:27-05	1
201503241618075511d48f07b3a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:18:07-05	1
201503241618075511d48f08b00	20150326115500551439e48ff9d	CHINCHIPE	16:18:07-05	1
201503241618075511d48f08d62	20150326115500551439e48ff9d	EL PANGUI	16:18:07-05	1
201503241618075511d48f08f63	20150326115500551439e48ff9d	NANGARITZA	16:18:07-05	1
201503241618075511d48f0914b	20150326115500551439e48ff9d	PALANDA	16:18:07-05	1
201503241618075511d48f0933d	20150326115500551439e48ff9d	PAQUISHA	16:18:07-05	1
201503241618075511d48f0952f	20150326115500551439e48ff9d	YACUAMBI	16:18:07-05	1
201503241618075511d48f09708	20150326115500551439e48ff9d	YANTZAZA	16:18:07-05	1
201503241618075511d48f09956	20150326115500551439e48ff9d	ZAMORA	16:18:07-05	1
201503241618555511d4bfee9a6	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:18:55-05	1
201503241618555511d4bfefa5a	20150326115500551439e48ff9d	CHINCHIPE	16:18:55-05	1
201503241618555511d4bfefcaf	20150326115500551439e48ff9d	EL PANGUI	16:18:55-05	1
201503241618555511d4bfefe6b	20150326115500551439e48ff9d	NANGARITZA	16:18:55-05	1
201503241618555511d4bff0032	20150326115500551439e48ff9d	PALANDA	16:18:55-05	1
201503241618555511d4bff01fb	20150326115500551439e48ff9d	PAQUISHA	16:18:55-05	1
201503241618555511d4bff03d0	20150326115500551439e48ff9d	YACUAMBI	16:18:55-05	1
201503241618555511d4bff055b	20150326115500551439e48ff9d	YANTZAZA	16:18:55-05	1
201503241618555511d4bff06eb	20150326115500551439e48ff9d	ZAMORA	16:18:55-05	1
201503241625425511d6561eca1	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:25:42-05	1
201503241625425511d65623c42	20150326115500551439e48ff9d	CHINCHIPE	16:25:42-05	1
201503241625425511d65623ec1	20150326115500551439e48ff9d	EL PANGUI	16:25:42-05	1
201503241625425511d656240a2	20150326115500551439e48ff9d	NANGARITZA	16:25:42-05	1
201503241625425511d656242cd	20150326115500551439e48ff9d	PALANDA	16:25:42-05	1
201503241625425511d65624586	20150326115500551439e48ff9d	PAQUISHA	16:25:42-05	1
201503241625425511d656247f9	20150326115500551439e48ff9d	YACUAMBI	16:25:42-05	1
201503241625425511d656249d6	20150326115500551439e48ff9d	YANTZAZA	16:25:42-05	1
201503241625425511d65624ba1	20150326115500551439e48ff9d	ZAMORA	16:25:42-05	1
201503241629205511d730b47c5	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:29:20-05	1
201503241629205511d730b5731	20150326115500551439e48ff9d	CHINCHIPE	16:29:20-05	1
201503241629205511d730b597b	20150326115500551439e48ff9d	EL PANGUI	16:29:20-05	1
201503241629205511d730b5b51	20150326115500551439e48ff9d	NANGARITZA	16:29:20-05	1
201503241629205511d730b5d27	20150326115500551439e48ff9d	PALANDA	16:29:20-05	1
201503241629205511d730b5eef	20150326115500551439e48ff9d	PAQUISHA	16:29:20-05	1
201503241629205511d730b6095	20150326115500551439e48ff9d	YACUAMBI	16:29:20-05	1
201503241629205511d730b6256	20150326115500551439e48ff9d	YANTZAZA	16:29:20-05	1
201503241629205511d730b63e3	20150326115500551439e48ff9d	ZAMORA	16:29:20-05	1
201503241630085511d7607f6f9	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:30:08-05	1
201503241630085511d76080666	20150326115500551439e48ff9d	CHINCHIPE	16:30:08-05	1
201503241630085511d760808b2	20150326115500551439e48ff9d	EL PANGUI	16:30:08-05	1
201503241630085511d76080a92	20150326115500551439e48ff9d	NANGARITZA	16:30:08-05	1
201503241630085511d76080c6f	20150326115500551439e48ff9d	PALANDA	16:30:08-05	1
201503241630085511d76080e50	20150326115500551439e48ff9d	PAQUISHA	16:30:08-05	1
201503241630085511d76081024	20150326115500551439e48ff9d	YACUAMBI	16:30:08-05	1
201503241630085511d760811cb	20150326115500551439e48ff9d	YANTZAZA	16:30:08-05	1
201503241630085511d76081370	20150326115500551439e48ff9d	ZAMORA	16:30:08-05	1
201503241635095511d88d6d8aa	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:35:09-05	1
201503241635095511d88d74c8d	20150326115500551439e48ff9d	CHINCHIPE	16:35:09-05	1
201503241635095511d88d750c2	20150326115500551439e48ff9d	EL PANGUI	16:35:09-05	1
201503241635095511d88d75497	20150326115500551439e48ff9d	NANGARITZA	16:35:09-05	1
201503241635095511d88d75763	20150326115500551439e48ff9d	PALANDA	16:35:09-05	1
201503241635095511d88d759b0	20150326115500551439e48ff9d	PAQUISHA	16:35:09-05	1
201503241635095511d88d75e71	20150326115500551439e48ff9d	YACUAMBI	16:35:09-05	1
201503241635095511d88d76008	20150326115500551439e48ff9d	YANTZAZA	16:35:09-05	1
201503241635095511d88d761a8	20150326115500551439e48ff9d	ZAMORA	16:35:09-05	1
201503241638445511d964c59fa	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:38:44-05	1
201503241638445511d964c689a	20150326115500551439e48ff9d	CHINCHIPE	16:38:44-05	1
201503241638445511d964c6afc	20150326115500551439e48ff9d	EL PANGUI	16:38:44-05	1
201503241638445511d964c6d05	20150326115500551439e48ff9d	NANGARITZA	16:38:44-05	1
201503241638445511d964c6ef2	20150326115500551439e48ff9d	PALANDA	16:38:44-05	1
201503241638445511d964c70c6	20150326115500551439e48ff9d	PAQUISHA	16:38:44-05	1
201503241638445511d964c7299	20150326115500551439e48ff9d	YACUAMBI	16:38:44-05	1
201503241638445511d964c7448	20150326115500551439e48ff9d	YANTZAZA	16:38:44-05	1
201503241638445511d964c7607	20150326115500551439e48ff9d	ZAMORA	16:38:44-05	1
201503241640105511d9ba5e1b3	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:40:10-05	1
201503241640105511d9ba5ef70	20150326115500551439e48ff9d	CHINCHIPE	16:40:10-05	1
201503241640105511d9ba5f1a7	20150326115500551439e48ff9d	EL PANGUI	16:40:10-05	1
201503241640105511d9ba5f386	20150326115500551439e48ff9d	NANGARITZA	16:40:10-05	1
201503241640105511d9ba5f5c8	20150326115500551439e48ff9d	PALANDA	16:40:10-05	1
201503241640105511d9ba5f7f9	20150326115500551439e48ff9d	PAQUISHA	16:40:10-05	1
201503241640105511d9ba5f9e4	20150326115500551439e48ff9d	YACUAMBI	16:40:10-05	1
201503241640105511d9ba5fb99	20150326115500551439e48ff9d	YANTZAZA	16:40:10-05	1
201503241640105511d9ba5fd4e	20150326115500551439e48ff9d	ZAMORA	16:40:10-05	1
201503241641185511d9fedf1c0	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:41:18-05	1
201503241641185511d9fee023f	20150326115500551439e48ff9d	CHINCHIPE	16:41:18-05	1
201503241641185511d9fee05c7	20150326115500551439e48ff9d	EL PANGUI	16:41:18-05	1
201503241641185511d9fee0886	20150326115500551439e48ff9d	NANGARITZA	16:41:18-05	1
201503241641185511d9fee0ae7	20150326115500551439e48ff9d	PALANDA	16:41:18-05	1
201503241641185511d9fee0d20	20150326115500551439e48ff9d	PAQUISHA	16:41:18-05	1
201503241641185511d9fee0f98	20150326115500551439e48ff9d	YACUAMBI	16:41:18-05	1
201503241641185511d9fee114f	20150326115500551439e48ff9d	YANTZAZA	16:41:18-05	1
201503241641185511d9fee1367	20150326115500551439e48ff9d	ZAMORA	16:41:18-05	1
201503241641355511da0f15bef	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:41:35-05	1
201503241641355511da0f16adb	20150326115500551439e48ff9d	CHINCHIPE	16:41:35-05	1
201503241641355511da0f16d31	20150326115500551439e48ff9d	EL PANGUI	16:41:35-05	1
201503241641355511da0f16f1f	20150326115500551439e48ff9d	NANGARITZA	16:41:35-05	1
201503241641355511da0f17111	20150326115500551439e48ff9d	PALANDA	16:41:35-05	1
201503241641355511da0f172ea	20150326115500551439e48ff9d	PAQUISHA	16:41:35-05	1
201503241641355511da0f174c1	20150326115500551439e48ff9d	YACUAMBI	16:41:35-05	1
201503241641355511da0f1768d	20150326115500551439e48ff9d	YANTZAZA	16:41:35-05	1
201503241641355511da0f17805	20150326115500551439e48ff9d	ZAMORA	16:41:35-05	1
201503241648115511db9b0f5cf	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:48:11-05	1
201503241648115511db9b11ebb	20150326115500551439e48ff9d	CHINCHIPE	16:48:11-05	1
201503241648115511db9b1212f	20150326115500551439e48ff9d	EL PANGUI	16:48:11-05	1
201503241648115511db9b122d5	20150326115500551439e48ff9d	NANGARITZA	16:48:11-05	1
201503241648115511db9b12513	20150326115500551439e48ff9d	PALANDA	16:48:11-05	1
201503241648115511db9b12828	20150326115500551439e48ff9d	PAQUISHA	16:48:11-05	1
201503241648115511db9b12a25	20150326115500551439e48ff9d	YACUAMBI	16:48:11-05	1
201503241648115511db9b12c1d	20150326115500551439e48ff9d	YANTZAZA	16:48:11-05	1
201503241648115511db9b12e25	20150326115500551439e48ff9d	ZAMORA	16:48:11-05	1
201503241649005511dbcca25fd	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	16:49:00-05	1
201503241649005511dbcca34fa	20150326115500551439e48ff9d	CHINCHIPE	16:49:00-05	1
201503241649005511dbcca3735	20150326115500551439e48ff9d	EL PANGUI	16:49:00-05	1
201503241649005511dbcca3918	20150326115500551439e48ff9d	NANGARITZA	16:49:00-05	1
201503241649005511dbcca3b24	20150326115500551439e48ff9d	PALANDA	16:49:00-05	1
201503241649005511dbcca3cfc	20150326115500551439e48ff9d	PAQUISHA	16:49:00-05	1
201503241649005511dbcca3e8d	20150326115500551439e48ff9d	YACUAMBI	16:49:00-05	1
201503241649005511dbcca4042	20150326115500551439e48ff9d	YANTZAZA	16:49:00-05	1
201503241649005511dbcca41f1	20150326115500551439e48ff9d	ZAMORA	16:49:00-05	1
201503241811335511ef254d3f7	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	18:11:33-05	1
201503241811335511ef254e553	20150326115500551439e48ff9d	CHINCHIPE	18:11:33-05	1
201503241811335511ef254e78c	20150326115500551439e48ff9d	EL PANGUI	18:11:33-05	1
201503241811335511ef254e956	20150326115500551439e48ff9d	NANGARITZA	18:11:33-05	1
201503241811335511ef254eb01	20150326115500551439e48ff9d	PALANDA	18:11:33-05	1
201503241811335511ef254ec9a	20150326115500551439e48ff9d	PAQUISHA	18:11:33-05	1
201503241811335511ef254ee35	20150326115500551439e48ff9d	YACUAMBI	18:11:33-05	1
201503241811335511ef254efa4	20150326115500551439e48ff9d	YANTZAZA	18:11:33-05	1
201503241811335511ef254f111	20150326115500551439e48ff9d	ZAMORA	18:11:33-05	1
201503241811495511ef3523545	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	18:11:49-05	1
201503241811495511ef35246e9	20150326115500551439e48ff9d	CHINCHIPE	18:11:49-05	1
201503241811495511ef3524984	20150326115500551439e48ff9d	EL PANGUI	18:11:49-05	1
201503241811495511ef3524ba1	20150326115500551439e48ff9d	NANGARITZA	18:11:49-05	1
201503241811495511ef3524d63	20150326115500551439e48ff9d	PALANDA	18:11:49-05	1
201503241811495511ef3524f67	20150326115500551439e48ff9d	PAQUISHA	18:11:49-05	1
201503241811495511ef3525141	20150326115500551439e48ff9d	YACUAMBI	18:11:49-05	1
201503241811495511ef35252c9	20150326115500551439e48ff9d	YANTZAZA	18:11:49-05	1
201503241811495511ef352544b	20150326115500551439e48ff9d	ZAMORA	18:11:49-05	1
201503241812475511ef6f3576a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	18:12:47-05	1
201503241812475511ef6f368c9	20150326115500551439e48ff9d	CHINCHIPE	18:12:47-05	1
201503241812475511ef6f36b31	20150326115500551439e48ff9d	EL PANGUI	18:12:47-05	1
201503241812475511ef6f36d28	20150326115500551439e48ff9d	NANGARITZA	18:12:47-05	1
201503241812475511ef6f36f19	20150326115500551439e48ff9d	PALANDA	18:12:47-05	1
201503241812475511ef6f370f1	20150326115500551439e48ff9d	PAQUISHA	18:12:47-05	1
201503241812475511ef6f372bb	20150326115500551439e48ff9d	YACUAMBI	18:12:47-05	1
201503241812475511ef6f37468	20150326115500551439e48ff9d	YANTZAZA	18:12:47-05	1
201503241812475511ef6f3760c	20150326115500551439e48ff9d	ZAMORA	18:12:47-05	1
201503241818165511f0b88a18c	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	18:18:16-05	1
201503241818165511f0b8978e9	20150326115500551439e48ff9d	CHINCHIPE	18:18:16-05	1
201503241818165511f0b89c808	20150326115500551439e48ff9d	EL PANGUI	18:18:16-05	1
201503241818165511f0b89cac1	20150326115500551439e48ff9d	NANGARITZA	18:18:16-05	1
201503241818165511f0b89ccb6	20150326115500551439e48ff9d	PALANDA	18:18:16-05	1
201503241818165511f0b89ce82	20150326115500551439e48ff9d	PAQUISHA	18:18:16-05	1
201503241818165511f0b89d096	20150326115500551439e48ff9d	YACUAMBI	18:18:16-05	1
201503241818165511f0b89d236	20150326115500551439e48ff9d	YANTZAZA	18:18:16-05	1
201503241818165511f0b89d400	20150326115500551439e48ff9d	ZAMORA	18:18:16-05	1
201503241828015511f30103b5d	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	18:28:01-05	1
201503241828015511f30107bb2	20150326115500551439e48ff9d	CHINCHIPE	18:28:01-05	1
201503241828015511f30107e25	20150326115500551439e48ff9d	EL PANGUI	18:28:01-05	1
201503241828015511f3010803a	20150326115500551439e48ff9d	NANGARITZA	18:28:01-05	1
201503241828015511f301082ab	20150326115500551439e48ff9d	PALANDA	18:28:01-05	1
201503241828015511f3010848a	20150326115500551439e48ff9d	PAQUISHA	18:28:01-05	1
201503241828015511f30108657	20150326115500551439e48ff9d	YACUAMBI	18:28:01-05	1
201503241828015511f301087f7	20150326115500551439e48ff9d	YANTZAZA	18:28:01-05	1
201503241828015511f3010898a	20150326115500551439e48ff9d	ZAMORA	18:28:01-05	1
201503241831085511f3bcef366	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	18:31:08-05	1
201503241831085511f3bcf29ac	20150326115500551439e48ff9d	CHINCHIPE	18:31:08-05	1
201503241831085511f3bcf2c21	20150326115500551439e48ff9d	EL PANGUI	18:31:08-05	1
201503241831085511f3bcf2e03	20150326115500551439e48ff9d	NANGARITZA	18:31:08-05	1
201503241831085511f3bcf2fe7	20150326115500551439e48ff9d	PALANDA	18:31:08-05	1
201503241831085511f3bcf31c2	20150326115500551439e48ff9d	PAQUISHA	18:31:08-05	1
201503241831085511f3bcf3382	20150326115500551439e48ff9d	YACUAMBI	18:31:08-05	1
201503241831085511f3bcf34f5	20150326115500551439e48ff9d	YANTZAZA	18:31:08-05	1
201503241831085511f3bcf366c	20150326115500551439e48ff9d	ZAMORA	18:31:08-05	1
201503241833185511f43e6cb1a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	18:33:18-05	1
201503241833185511f43e6d8e9	20150326115500551439e48ff9d	CHINCHIPE	18:33:18-05	1
201503241833185511f43e6db1f	20150326115500551439e48ff9d	EL PANGUI	18:33:18-05	1
201503241833185511f43e6dcf4	20150326115500551439e48ff9d	NANGARITZA	18:33:18-05	1
201503241833185511f43e6de8b	20150326115500551439e48ff9d	PALANDA	18:33:18-05	1
201503241833185511f43e6e064	20150326115500551439e48ff9d	PAQUISHA	18:33:18-05	1
201503241833185511f43e6e227	20150326115500551439e48ff9d	YACUAMBI	18:33:18-05	1
201503241833185511f43e6e398	20150326115500551439e48ff9d	YANTZAZA	18:33:18-05	1
201503241833185511f43e6e505	20150326115500551439e48ff9d	ZAMORA	18:33:18-05	1
201503241835155511f4b3670bd	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	18:35:15-05	1
201503241835155511f4b367ed4	20150326115500551439e48ff9d	CHINCHIPE	18:35:15-05	1
201503241835155511f4b3680ff	20150326115500551439e48ff9d	EL PANGUI	18:35:15-05	1
201503241835155511f4b3682cf	20150326115500551439e48ff9d	NANGARITZA	18:35:15-05	1
201503241835155511f4b368478	20150326115500551439e48ff9d	PALANDA	18:35:15-05	1
201503241835155511f4b368611	20150326115500551439e48ff9d	PAQUISHA	18:35:15-05	1
201503241835155511f4b36879e	20150326115500551439e48ff9d	YACUAMBI	18:35:15-05	1
201503241835155511f4b36890e	20150326115500551439e48ff9d	YANTZAZA	18:35:15-05	1
201503241835155511f4b368a96	20150326115500551439e48ff9d	ZAMORA	18:35:15-05	1
201503251013315512d09b00a18	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:13:31-05	1
201503251013315512d09b1736e	20150326115500551439e48ff9d	CHINCHIPE	10:13:31-05	1
201503251013315512d09b176ea	20150326115500551439e48ff9d	EL PANGUI	10:13:31-05	1
201503251013315512d09b179d1	20150326115500551439e48ff9d	NANGARITZA	10:13:31-05	1
201503251013315512d09b17c91	20150326115500551439e48ff9d	PALANDA	10:13:31-05	1
201503251013315512d09b17f5d	20150326115500551439e48ff9d	PAQUISHA	10:13:31-05	1
201503251013315512d09b1823b	20150326115500551439e48ff9d	YACUAMBI	10:13:31-05	1
201503251013315512d09b184b0	20150326115500551439e48ff9d	YANTZAZA	10:13:31-05	1
201503251013315512d09b1874f	20150326115500551439e48ff9d	ZAMORA	10:13:31-05	1
2015032515491555131f4bd738a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	15:49:15-05	1
2015032515491555131f4bdb675	20150326115500551439e48ff9d	CHINCHIPE	15:49:15-05	1
2015032515491555131f4bdb94a	20150326115500551439e48ff9d	EL PANGUI	15:49:15-05	1
2015032515491555131f4bdbb95	20150326115500551439e48ff9d	NANGARITZA	15:49:15-05	1
2015032515491555131f4bdbda4	20150326115500551439e48ff9d	PALANDA	15:49:15-05	1
2015032515491555131f4bdbf83	20150326115500551439e48ff9d	PAQUISHA	15:49:15-05	1
2015032515491555131f4bdc166	20150326115500551439e48ff9d	YACUAMBI	15:49:15-05	1
2015032515491555131f4bdc311	20150326115500551439e48ff9d	YANTZAZA	15:49:15-05	1
2015032515491555131f4bdc505	20150326115500551439e48ff9d	ZAMORA	15:49:15-05	1
20150401102615551c0e17cf31c	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:26:15-05	1
20150401102615551c0e17f3348	20150326115500551439e48ff9d	CHINCHIPE	10:26:15-05	1
20150401102615551c0e17f36b0	20150326115500551439e48ff9d	EL PANGUI	10:26:15-05	1
20150401102615551c0e17f39a2	20150326115500551439e48ff9d	NANGARITZA	10:26:15-05	1
20150401102615551c0e17f3cbf	20150326115500551439e48ff9d	PALANDA	10:26:15-05	1
20150401102615551c0e17f3f9a	20150326115500551439e48ff9d	PAQUISHA	10:26:15-05	1
20150401102615551c0e1800020	20150326115500551439e48ff9d	YACUAMBI	10:26:15-05	1
20150401102616551c0e1800280	20150326115500551439e48ff9d	YANTZAZA	10:26:16-05	1
20150401102616551c0e18004ff	20150326115500551439e48ff9d	ZAMORA	10:26:16-05	1
20150401102705551c0e49dcd75	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:27:05-05	1
20150401102705551c0e49de154	20150326115500551439e48ff9d	CHINCHIPE	10:27:05-05	1
20150401102705551c0e49de3e8	20150326115500551439e48ff9d	EL PANGUI	10:27:05-05	1
20150401102705551c0e49de5eb	20150326115500551439e48ff9d	NANGARITZA	10:27:05-05	1
20150401102705551c0e49de820	20150326115500551439e48ff9d	PALANDA	10:27:05-05	1
20150401102705551c0e49dea45	20150326115500551439e48ff9d	PAQUISHA	10:27:05-05	1
20150401102705551c0e49dec4a	20150326115500551439e48ff9d	YACUAMBI	10:27:05-05	1
20150401102705551c0e49dede6	20150326115500551439e48ff9d	YANTZAZA	10:27:05-05	1
20150401102705551c0e49def9e	20150326115500551439e48ff9d	ZAMORA	10:27:05-05	1
20150401103524551c103c1ab27	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:35:24-05	1
20150401103524551c103c1cc76	20150326115500551439e48ff9d	CHINCHIPE	10:35:24-05	1
20150401103524551c103c1cf61	20150326115500551439e48ff9d	EL PANGUI	10:35:24-05	1
20150401103524551c103c1d14c	20150326115500551439e48ff9d	NANGARITZA	10:35:24-05	1
20150401103524551c103c1d34b	20150326115500551439e48ff9d	PALANDA	10:35:24-05	1
20150401103524551c103c1d7fa	20150326115500551439e48ff9d	PAQUISHA	10:35:24-05	1
20150401103524551c103c1d9ff	20150326115500551439e48ff9d	YACUAMBI	10:35:24-05	1
20150401103524551c103c1db95	20150326115500551439e48ff9d	YANTZAZA	10:35:24-05	1
20150401103524551c103c1dd44	20150326115500551439e48ff9d	ZAMORA	10:35:24-05	1
20150401103553551c10596040e	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:35:53-05	1
20150401103553551c105966a47	20150326115500551439e48ff9d	CHINCHIPE	10:35:53-05	1
20150401103553551c105966cdd	20150326115500551439e48ff9d	EL PANGUI	10:35:53-05	1
20150401103553551c105966ef0	20150326115500551439e48ff9d	NANGARITZA	10:35:53-05	1
20150401103553551c1059670da	20150326115500551439e48ff9d	PALANDA	10:35:53-05	1
20150401103553551c105967312	20150326115500551439e48ff9d	PAQUISHA	10:35:53-05	1
20150401103553551c1059674fd	20150326115500551439e48ff9d	YACUAMBI	10:35:53-05	1
20150401103553551c1059676a3	20150326115500551439e48ff9d	YANTZAZA	10:35:53-05	1
20150401103553551c105967885	20150326115500551439e48ff9d	ZAMORA	10:35:53-05	1
20150401103746551c10ca46f19	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:37:46-05	1
20150401103746551c10ca47dee	20150326115500551439e48ff9d	CHINCHIPE	10:37:46-05	1
20150401103746551c10ca48047	20150326115500551439e48ff9d	EL PANGUI	10:37:46-05	1
20150401103746551c10ca48229	20150326115500551439e48ff9d	NANGARITZA	10:37:46-05	1
20150401103746551c10ca48414	20150326115500551439e48ff9d	PALANDA	10:37:46-05	1
20150401103746551c10ca485d9	20150326115500551439e48ff9d	PAQUISHA	10:37:46-05	1
20150401103746551c10ca48774	20150326115500551439e48ff9d	YACUAMBI	10:37:46-05	1
20150401103746551c10ca488e6	20150326115500551439e48ff9d	YANTZAZA	10:37:46-05	1
20150401103746551c10ca48a83	20150326115500551439e48ff9d	ZAMORA	10:37:46-05	1
20150401104044551c117c3914a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:40:44-05	1
20150401104044551c117c3c2d7	20150326115500551439e48ff9d	CHINCHIPE	10:40:44-05	1
20150401104044551c117c3c568	20150326115500551439e48ff9d	EL PANGUI	10:40:44-05	1
20150401104044551c117c3c77a	20150326115500551439e48ff9d	NANGARITZA	10:40:44-05	1
20150401104044551c117c3c970	20150326115500551439e48ff9d	PALANDA	10:40:44-05	1
20150401104044551c117c3cb5e	20150326115500551439e48ff9d	PAQUISHA	10:40:44-05	1
20150401104044551c117c3cd36	20150326115500551439e48ff9d	YACUAMBI	10:40:44-05	1
20150401104044551c117c3cef4	20150326115500551439e48ff9d	YANTZAZA	10:40:44-05	1
20150401104044551c117c3d0a2	20150326115500551439e48ff9d	ZAMORA	10:40:44-05	1
20150401104137551c11b1e1143	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:41:37-05	1
20150401104137551c11b1e42b7	20150326115500551439e48ff9d	CHINCHIPE	10:41:37-05	1
20150401104137551c11b1e4502	20150326115500551439e48ff9d	EL PANGUI	10:41:37-05	1
20150401104137551c11b1e46f1	20150326115500551439e48ff9d	NANGARITZA	10:41:37-05	1
20150401104137551c11b1e490c	20150326115500551439e48ff9d	PALANDA	10:41:37-05	1
20150401104137551c11b1e4b52	20150326115500551439e48ff9d	PAQUISHA	10:41:37-05	1
20150401104137551c11b1e4d3e	20150326115500551439e48ff9d	YACUAMBI	10:41:37-05	1
20150401104137551c11b1e4efc	20150326115500551439e48ff9d	YANTZAZA	10:41:37-05	1
20150401104137551c11b1e50aa	20150326115500551439e48ff9d	ZAMORA	10:41:37-05	1
20150401104218551c11daae380	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:42:18-05	1
20150401104218551c11dab4ca0	20150326115500551439e48ff9d	CHINCHIPE	10:42:18-05	1
20150401104218551c11dab4f09	20150326115500551439e48ff9d	EL PANGUI	10:42:18-05	1
20150401104218551c11dab51a2	20150326115500551439e48ff9d	NANGARITZA	10:42:18-05	1
20150401104218551c11dab552d	20150326115500551439e48ff9d	PALANDA	10:42:18-05	1
20150401104218551c11dab5832	20150326115500551439e48ff9d	PAQUISHA	10:42:18-05	1
20150401104218551c11dab5b9a	20150326115500551439e48ff9d	YACUAMBI	10:42:18-05	1
20150401104218551c11dab5f9c	20150326115500551439e48ff9d	YANTZAZA	10:42:18-05	1
20150401104218551c11dab62b9	20150326115500551439e48ff9d	ZAMORA	10:42:18-05	1
20150401104229551c11e5c937f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:42:29-05	1
20150401104229551c11e5ca685	20150326115500551439e48ff9d	CHINCHIPE	10:42:29-05	1
20150401104229551c11e5ca956	20150326115500551439e48ff9d	EL PANGUI	10:42:29-05	1
20150401104229551c11e5cac0a	20150326115500551439e48ff9d	NANGARITZA	10:42:29-05	1
20150401104229551c11e5caf21	20150326115500551439e48ff9d	PALANDA	10:42:29-05	1
20150401104229551c11e5cb285	20150326115500551439e48ff9d	PAQUISHA	10:42:29-05	1
20150401104229551c11e5cb496	20150326115500551439e48ff9d	YACUAMBI	10:42:29-05	1
20150401104229551c11e5cb64d	20150326115500551439e48ff9d	YANTZAZA	10:42:29-05	1
20150401104229551c11e5cbaf6	20150326115500551439e48ff9d	ZAMORA	10:42:29-05	1
20150401104336551c12281e1d4	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:43:36-05	1
20150401104336551c122825347	20150326115500551439e48ff9d	CHINCHIPE	10:43:36-05	1
20150401104336551c1228256b9	20150326115500551439e48ff9d	EL PANGUI	10:43:36-05	1
20150401104336551c122825adc	20150326115500551439e48ff9d	NANGARITZA	10:43:36-05	1
20150401104336551c1228261a8	20150326115500551439e48ff9d	PALANDA	10:43:36-05	1
20150401104336551c122826676	20150326115500551439e48ff9d	PAQUISHA	10:43:36-05	1
20150401104336551c122826919	20150326115500551439e48ff9d	YACUAMBI	10:43:36-05	1
20150401104336551c122826ac2	20150326115500551439e48ff9d	YANTZAZA	10:43:36-05	1
20150401104336551c122826c44	20150326115500551439e48ff9d	ZAMORA	10:43:36-05	1
20150401104412551c124c2e74d	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:44:12-05	1
20150401104412551c124c34e14	20150326115500551439e48ff9d	CHINCHIPE	10:44:12-05	1
20150401104412551c124c3516a	20150326115500551439e48ff9d	EL PANGUI	10:44:12-05	1
20150401104412551c124c354ee	20150326115500551439e48ff9d	NANGARITZA	10:44:12-05	1
20150401104412551c124c35862	20150326115500551439e48ff9d	PALANDA	10:44:12-05	1
20150401104412551c124c35ba4	20150326115500551439e48ff9d	PAQUISHA	10:44:12-05	1
20150401104412551c124c35ebc	20150326115500551439e48ff9d	YACUAMBI	10:44:12-05	1
20150401104412551c124c361fd	20150326115500551439e48ff9d	YANTZAZA	10:44:12-05	1
20150401104412551c124c3650e	20150326115500551439e48ff9d	ZAMORA	10:44:12-05	1
20150401104605551c12bdb8fe5	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:46:05-05	1
20150401104605551c12bdbb305	20150326115500551439e48ff9d	CHINCHIPE	10:46:05-05	1
20150401104605551c12bdbb55b	20150326115500551439e48ff9d	EL PANGUI	10:46:05-05	1
20150401104605551c12bdbb73c	20150326115500551439e48ff9d	NANGARITZA	10:46:05-05	1
20150401104605551c12bdbb90d	20150326115500551439e48ff9d	PALANDA	10:46:05-05	1
20150401104605551c12bdbbaf1	20150326115500551439e48ff9d	PAQUISHA	10:46:05-05	1
20150401104605551c12bdbbcd8	20150326115500551439e48ff9d	YACUAMBI	10:46:05-05	1
20150401104605551c12bdbbe80	20150326115500551439e48ff9d	YANTZAZA	10:46:05-05	1
20150401104605551c12bdbc009	20150326115500551439e48ff9d	ZAMORA	10:46:05-05	1
20150401104653551c12ed22f84	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:46:53-05	1
20150401104653551c12ed25fea	20150326115500551439e48ff9d	CHINCHIPE	10:46:53-05	1
20150401104653551c12ed26265	20150326115500551439e48ff9d	EL PANGUI	10:46:53-05	1
20150401104653551c12ed26436	20150326115500551439e48ff9d	NANGARITZA	10:46:53-05	1
20150401104653551c12ed2660f	20150326115500551439e48ff9d	PALANDA	10:46:53-05	1
20150401104653551c12ed2681e	20150326115500551439e48ff9d	PAQUISHA	10:46:53-05	1
20150401104653551c12ed26acd	20150326115500551439e48ff9d	YACUAMBI	10:46:53-05	1
20150401104653551c12ed26ce9	20150326115500551439e48ff9d	YANTZAZA	10:46:53-05	1
20150401104653551c12ed26f29	20150326115500551439e48ff9d	ZAMORA	10:46:53-05	1
20150401104735551c131760858	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:47:35-05	1
20150401104735551c131761891	20150326115500551439e48ff9d	CHINCHIPE	10:47:35-05	1
20150401104735551c131761b05	20150326115500551439e48ff9d	EL PANGUI	10:47:35-05	1
20150401104735551c131761d51	20150326115500551439e48ff9d	NANGARITZA	10:47:35-05	1
20150401104735551c1317620b9	20150326115500551439e48ff9d	PALANDA	10:47:35-05	1
20150401104735551c1317622ec	20150326115500551439e48ff9d	PAQUISHA	10:47:35-05	1
20150401104735551c1317624b9	20150326115500551439e48ff9d	YACUAMBI	10:47:35-05	1
20150401104735551c131762678	20150326115500551439e48ff9d	YANTZAZA	10:47:35-05	1
20150401104735551c131762805	20150326115500551439e48ff9d	ZAMORA	10:47:35-05	1
20150401104752551c1328378f0	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:47:52-05	1
20150401104752551c132842738	20150326115500551439e48ff9d	CHINCHIPE	10:47:52-05	1
20150401104752551c132849871	20150326115500551439e48ff9d	EL PANGUI	10:47:52-05	1
20150401104752551c13284d982	20150326115500551439e48ff9d	NANGARITZA	10:47:52-05	1
20150401104752551c132853b54	20150326115500551439e48ff9d	PALANDA	10:47:52-05	1
20150401104752551c132857c7b	20150326115500551439e48ff9d	PAQUISHA	10:47:52-05	1
20150401104752551c132858001	20150326115500551439e48ff9d	YACUAMBI	10:47:52-05	1
20150401104752551c132858379	20150326115500551439e48ff9d	YANTZAZA	10:47:52-05	1
20150401104752551c1328585f3	20150326115500551439e48ff9d	ZAMORA	10:47:52-05	1
20150401104810551c133a6da7c	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:48:10-05	1
20150401104810551c133a6fea3	20150326115500551439e48ff9d	CHINCHIPE	10:48:10-05	1
20150401104810551c133a70104	20150326115500551439e48ff9d	EL PANGUI	10:48:10-05	1
20150401104810551c133a70338	20150326115500551439e48ff9d	NANGARITZA	10:48:10-05	1
20150401104810551c133a70550	20150326115500551439e48ff9d	PALANDA	10:48:10-05	1
20150401104810551c133a70769	20150326115500551439e48ff9d	PAQUISHA	10:48:10-05	1
20150401104810551c133a70935	20150326115500551439e48ff9d	YACUAMBI	10:48:10-05	1
20150401104810551c133a70ae9	20150326115500551439e48ff9d	YANTZAZA	10:48:10-05	1
20150401104810551c133a70c6f	20150326115500551439e48ff9d	ZAMORA	10:48:10-05	1
20150401104844551c135c8aba0	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:48:44-05	1
20150401104844551c135c8de41	20150326115500551439e48ff9d	CHINCHIPE	10:48:44-05	1
20150401104844551c135c8e0ad	20150326115500551439e48ff9d	EL PANGUI	10:48:44-05	1
20150401104844551c135c8e28f	20150326115500551439e48ff9d	NANGARITZA	10:48:44-05	1
20150401104844551c135c8e471	20150326115500551439e48ff9d	PALANDA	10:48:44-05	1
20150401104844551c135c8e636	20150326115500551439e48ff9d	PAQUISHA	10:48:44-05	1
20150401104844551c135c8e7f4	20150326115500551439e48ff9d	YACUAMBI	10:48:44-05	1
20150401104844551c135c8e967	20150326115500551439e48ff9d	YANTZAZA	10:48:44-05	1
20150401104844551c135c8eb5d	20150326115500551439e48ff9d	ZAMORA	10:48:44-05	1
20150401104931551c138bdb964	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:49:31-05	1
20150401104931551c138bde81f	20150326115500551439e48ff9d	CHINCHIPE	10:49:31-05	1
20150401104931551c138bdea8d	20150326115500551439e48ff9d	EL PANGUI	10:49:31-05	1
20150401104931551c138bdec68	20150326115500551439e48ff9d	NANGARITZA	10:49:31-05	1
20150401104931551c138bdee65	20150326115500551439e48ff9d	PALANDA	10:49:31-05	1
20150401104931551c138bdf065	20150326115500551439e48ff9d	PAQUISHA	10:49:31-05	1
20150401104931551c138bdf3a6	20150326115500551439e48ff9d	YACUAMBI	10:49:31-05	1
20150401104931551c138bdf63a	20150326115500551439e48ff9d	YANTZAZA	10:49:31-05	1
20150401104931551c138bdf8b4	20150326115500551439e48ff9d	ZAMORA	10:49:31-05	1
20150401105017551c13b9ca457	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:50:17-05	1
20150401105017551c13b9cb44f	20150326115500551439e48ff9d	CHINCHIPE	10:50:17-05	1
20150401105017551c13b9cb67a	20150326115500551439e48ff9d	EL PANGUI	10:50:17-05	1
20150401105017551c13b9cb821	20150326115500551439e48ff9d	NANGARITZA	10:50:17-05	1
20150401105017551c13b9cb9c5	20150326115500551439e48ff9d	PALANDA	10:50:17-05	1
20150401105017551c13b9cbb98	20150326115500551439e48ff9d	PAQUISHA	10:50:17-05	1
20150401105017551c13b9cbd3a	20150326115500551439e48ff9d	YACUAMBI	10:50:17-05	1
20150401105017551c13b9cbead	20150326115500551439e48ff9d	YANTZAZA	10:50:17-05	1
20150401105017551c13b9cc01a	20150326115500551439e48ff9d	ZAMORA	10:50:17-05	1
20150401105045551c13d59ac9a	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:50:45-05	1
20150401105045551c13d59c195	20150326115500551439e48ff9d	CHINCHIPE	10:50:45-05	1
20150401105045551c13d59c41c	20150326115500551439e48ff9d	EL PANGUI	10:50:45-05	1
20150401105045551c13d59c60c	20150326115500551439e48ff9d	NANGARITZA	10:50:45-05	1
20150401105045551c13d59c843	20150326115500551439e48ff9d	PALANDA	10:50:45-05	1
20150401105045551c13d59ca98	20150326115500551439e48ff9d	PAQUISHA	10:50:45-05	1
20150401105045551c13d59cca4	20150326115500551439e48ff9d	YACUAMBI	10:50:45-05	1
20150401105045551c13d59ce31	20150326115500551439e48ff9d	YANTZAZA	10:50:45-05	1
20150401105045551c13d59cfe2	20150326115500551439e48ff9d	ZAMORA	10:50:45-05	1
20150401105053551c13dd27466	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:50:53-05	1
20150401105053551c13dd28681	20150326115500551439e48ff9d	CHINCHIPE	10:50:53-05	1
20150401105053551c13dd289a5	20150326115500551439e48ff9d	EL PANGUI	10:50:53-05	1
20150401105053551c13dd28bfa	20150326115500551439e48ff9d	NANGARITZA	10:50:53-05	1
20150401105053551c13dd28df0	20150326115500551439e48ff9d	PALANDA	10:50:53-05	1
20150401105053551c13dd28fed	20150326115500551439e48ff9d	PAQUISHA	10:50:53-05	1
20150401105053551c13dd291ea	20150326115500551439e48ff9d	YACUAMBI	10:50:53-05	1
20150401105053551c13dd29433	20150326115500551439e48ff9d	YANTZAZA	10:50:53-05	1
20150401105053551c13dd29753	20150326115500551439e48ff9d	ZAMORA	10:50:53-05	1
20150401105222551c143649417	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:52:22-05	1
20150401105222551c1436526ca	20150326115500551439e48ff9d	CHINCHIPE	10:52:22-05	1
20150401105222551c1436571de	20150326115500551439e48ff9d	EL PANGUI	10:52:22-05	1
20150401105222551c14365b826	20150326115500551439e48ff9d	NANGARITZA	10:52:22-05	1
20150401105222551c14365baf7	20150326115500551439e48ff9d	PALANDA	10:52:22-05	1
20150401105222551c14365bd0c	20150326115500551439e48ff9d	PAQUISHA	10:52:22-05	1
20150401105222551c14365bed6	20150326115500551439e48ff9d	YACUAMBI	10:52:22-05	1
20150401105222551c14365c0c5	20150326115500551439e48ff9d	YANTZAZA	10:52:22-05	1
20150401105222551c14365c27a	20150326115500551439e48ff9d	ZAMORA	10:52:22-05	1
20150401105249551c1451a37c2	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:52:49-05	1
20150401105249551c1451a873a	20150326115500551439e48ff9d	CHINCHIPE	10:52:49-05	1
20150401105249551c1451a89d9	20150326115500551439e48ff9d	EL PANGUI	10:52:49-05	1
20150401105249551c1451a8bda	20150326115500551439e48ff9d	NANGARITZA	10:52:49-05	1
20150401105249551c1451a8e0e	20150326115500551439e48ff9d	PALANDA	10:52:49-05	1
20150401105249551c1451a906b	20150326115500551439e48ff9d	PAQUISHA	10:52:49-05	1
20150401105249551c1451a926c	20150326115500551439e48ff9d	YACUAMBI	10:52:49-05	1
20150401105249551c1451a9445	20150326115500551439e48ff9d	YANTZAZA	10:52:49-05	1
20150401105249551c1451a95bc	20150326115500551439e48ff9d	ZAMORA	10:52:49-05	1
20150401105325551c147583eeb	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:53:25-05	1
20150401105325551c147587556	20150326115500551439e48ff9d	CHINCHIPE	10:53:25-05	1
20150401105325551c1475878e0	20150326115500551439e48ff9d	EL PANGUI	10:53:25-05	1
20150401105325551c147587c3a	20150326115500551439e48ff9d	NANGARITZA	10:53:25-05	1
20150401105325551c147587ee5	20150326115500551439e48ff9d	PALANDA	10:53:25-05	1
20150401105325551c147588100	20150326115500551439e48ff9d	PAQUISHA	10:53:25-05	1
20150401105325551c147588343	20150326115500551439e48ff9d	YACUAMBI	10:53:25-05	1
20150401105325551c147588595	20150326115500551439e48ff9d	YANTZAZA	10:53:25-05	1
20150401105325551c147588776	20150326115500551439e48ff9d	ZAMORA	10:53:25-05	1
20150401105346551c148a49cc8	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:53:46-05	1
20150401105346551c148a4b334	20150326115500551439e48ff9d	CHINCHIPE	10:53:46-05	1
20150401105346551c148a4b621	20150326115500551439e48ff9d	EL PANGUI	10:53:46-05	1
20150401105346551c148a4ba7e	20150326115500551439e48ff9d	NANGARITZA	10:53:46-05	1
20150401105346551c148a4bf43	20150326115500551439e48ff9d	PALANDA	10:53:46-05	1
20150401105346551c148a4c6d7	20150326115500551439e48ff9d	PAQUISHA	10:53:46-05	1
20150401105346551c148a4c9a9	20150326115500551439e48ff9d	YACUAMBI	10:53:46-05	1
20150401105346551c148a4cb90	20150326115500551439e48ff9d	YANTZAZA	10:53:46-05	1
20150401105346551c148a4cd34	20150326115500551439e48ff9d	ZAMORA	10:53:46-05	1
20150401105401551c1499821b0	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:54:01-05	1
20150401105401551c149983083	20150326115500551439e48ff9d	CHINCHIPE	10:54:01-05	1
20150401105401551c1499832d9	20150326115500551439e48ff9d	EL PANGUI	10:54:01-05	1
20150401105401551c1499834b3	20150326115500551439e48ff9d	NANGARITZA	10:54:01-05	1
20150401105401551c1499836aa	20150326115500551439e48ff9d	PALANDA	10:54:01-05	1
20150401105401551c1499838c3	20150326115500551439e48ff9d	PAQUISHA	10:54:01-05	1
20150401105401551c149983bc0	20150326115500551439e48ff9d	YACUAMBI	10:54:01-05	1
20150401105401551c149983dd0	20150326115500551439e48ff9d	YANTZAZA	10:54:01-05	1
20150401105401551c149983f77	20150326115500551439e48ff9d	ZAMORA	10:54:01-05	1
20150401105416551c14a85b54d	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:54:16-05	1
20150401105416551c14a864076	20150326115500551439e48ff9d	CHINCHIPE	10:54:16-05	1
20150401105416551c14a8642b3	20150326115500551439e48ff9d	EL PANGUI	10:54:16-05	1
20150401105416551c14a86446a	20150326115500551439e48ff9d	NANGARITZA	10:54:16-05	1
20150401105416551c14a864634	20150326115500551439e48ff9d	PALANDA	10:54:16-05	1
20150401105416551c14a86481f	20150326115500551439e48ff9d	PAQUISHA	10:54:16-05	1
20150401105416551c14a8649d9	20150326115500551439e48ff9d	YACUAMBI	10:54:16-05	1
20150401105416551c14a864b7d	20150326115500551439e48ff9d	YANTZAZA	10:54:16-05	1
20150401105416551c14a864cee	20150326115500551439e48ff9d	ZAMORA	10:54:16-05	1
20150401105425551c14b13f3c8	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:54:25-05	1
20150401105425551c14b142cb6	20150326115500551439e48ff9d	CHINCHIPE	10:54:25-05	1
20150401105425551c14b142f1c	20150326115500551439e48ff9d	EL PANGUI	10:54:25-05	1
20150401105425551c14b14310d	20150326115500551439e48ff9d	NANGARITZA	10:54:25-05	1
20150401105425551c14b143337	20150326115500551439e48ff9d	PALANDA	10:54:25-05	1
20150401105425551c14b143595	20150326115500551439e48ff9d	PAQUISHA	10:54:25-05	1
20150401105425551c14b1484d3	20150326115500551439e48ff9d	YACUAMBI	10:54:25-05	1
20150401105425551c14b14f6d3	20150326115500551439e48ff9d	YANTZAZA	10:54:25-05	1
20150401105425551c14b1537e9	20150326115500551439e48ff9d	ZAMORA	10:54:25-05	1
20150401105434551c14ba983f4	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:54:34-05	1
20150401105434551c14ba99217	20150326115500551439e48ff9d	CHINCHIPE	10:54:34-05	1
20150401105434551c14ba994a2	20150326115500551439e48ff9d	EL PANGUI	10:54:34-05	1
20150401105434551c14ba996b8	20150326115500551439e48ff9d	NANGARITZA	10:54:34-05	1
20150401105434551c14ba99899	20150326115500551439e48ff9d	PALANDA	10:54:34-05	1
20150401105434551c14ba99a76	20150326115500551439e48ff9d	PAQUISHA	10:54:34-05	1
20150401105434551c14ba99c58	20150326115500551439e48ff9d	YACUAMBI	10:54:34-05	1
20150401105434551c14ba99e1a	20150326115500551439e48ff9d	YANTZAZA	10:54:34-05	1
20150401105434551c14ba99fa0	20150326115500551439e48ff9d	ZAMORA	10:54:34-05	1
20150401105446551c14c6e0828	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:54:46-05	1
20150401105446551c14c6e159b	20150326115500551439e48ff9d	CHINCHIPE	10:54:46-05	1
20150401105446551c14c6e1813	20150326115500551439e48ff9d	EL PANGUI	10:54:46-05	1
20150401105446551c14c6e1a54	20150326115500551439e48ff9d	NANGARITZA	10:54:46-05	1
20150401105446551c14c6e1c4d	20150326115500551439e48ff9d	PALANDA	10:54:46-05	1
20150401105446551c14c6e1eb6	20150326115500551439e48ff9d	PAQUISHA	10:54:46-05	1
20150401105446551c14c6e229e	20150326115500551439e48ff9d	YACUAMBI	10:54:46-05	1
20150401105446551c14c6e254f	20150326115500551439e48ff9d	YANTZAZA	10:54:46-05	1
20150401105446551c14c6e2762	20150326115500551439e48ff9d	ZAMORA	10:54:46-05	1
20150401105507551c14dbba19b	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:55:07-05	1
20150401105507551c14dbbe37c	20150326115500551439e48ff9d	CHINCHIPE	10:55:07-05	1
20150401105507551c14dbbe5c4	20150326115500551439e48ff9d	EL PANGUI	10:55:07-05	1
20150401105507551c14dbbe795	20150326115500551439e48ff9d	NANGARITZA	10:55:07-05	1
20150401105507551c14dbbe979	20150326115500551439e48ff9d	PALANDA	10:55:07-05	1
20150401105507551c14dbbebe2	20150326115500551439e48ff9d	PAQUISHA	10:55:07-05	1
20150401105507551c14dbbf0ca	20150326115500551439e48ff9d	YACUAMBI	10:55:07-05	1
20150401105507551c14dbbf84d	20150326115500551439e48ff9d	YANTZAZA	10:55:07-05	1
20150401105507551c14dbbfb86	20150326115500551439e48ff9d	ZAMORA	10:55:07-05	1
20150401105525551c14ed0af92	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:55:25-05	1
20150401105525551c14ed0be24	20150326115500551439e48ff9d	CHINCHIPE	10:55:25-05	1
20150401105525551c14ed0c086	20150326115500551439e48ff9d	EL PANGUI	10:55:25-05	1
20150401105525551c14ed0c263	20150326115500551439e48ff9d	NANGARITZA	10:55:25-05	1
20150401105525551c14ed0c400	20150326115500551439e48ff9d	PALANDA	10:55:25-05	1
20150401105525551c14ed0c5a4	20150326115500551439e48ff9d	PAQUISHA	10:55:25-05	1
20150401105525551c14ed0c76d	20150326115500551439e48ff9d	YACUAMBI	10:55:25-05	1
20150401105525551c14ed0c8fd	20150326115500551439e48ff9d	YANTZAZA	10:55:25-05	1
20150401105525551c14ed0ca99	20150326115500551439e48ff9d	ZAMORA	10:55:25-05	1
20150401105628551c152cc8ef4	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:56:28-05	1
20150401105628551c152ccb83b	20150326115500551439e48ff9d	CHINCHIPE	10:56:28-05	1
20150401105628551c152ccbaae	20150326115500551439e48ff9d	EL PANGUI	10:56:28-05	1
20150401105628551c152ccbca5	20150326115500551439e48ff9d	NANGARITZA	10:56:28-05	1
20150401105628551c152ccbe89	20150326115500551439e48ff9d	PALANDA	10:56:28-05	1
20150401105628551c152ccc064	20150326115500551439e48ff9d	PAQUISHA	10:56:28-05	1
20150401105628551c152ccc286	20150326115500551439e48ff9d	YACUAMBI	10:56:28-05	1
20150401105628551c152ccc47e	20150326115500551439e48ff9d	YANTZAZA	10:56:28-05	1
20150401105628551c152ccc63a	20150326115500551439e48ff9d	ZAMORA	10:56:28-05	1
20150401105643551c153b33fbd	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:56:43-05	1
20150401105643551c153b34e47	20150326115500551439e48ff9d	CHINCHIPE	10:56:43-05	1
20150401105643551c153b35077	20150326115500551439e48ff9d	EL PANGUI	10:56:43-05	1
20150401105643551c153b3527f	20150326115500551439e48ff9d	NANGARITZA	10:56:43-05	1
20150401105643551c153b354e8	20150326115500551439e48ff9d	PALANDA	10:56:43-05	1
20150401105643551c153b356d7	20150326115500551439e48ff9d	PAQUISHA	10:56:43-05	1
20150401105643551c153b358af	20150326115500551439e48ff9d	YACUAMBI	10:56:43-05	1
20150401105643551c153b35a62	20150326115500551439e48ff9d	YANTZAZA	10:56:43-05	1
20150401105643551c153b35c15	20150326115500551439e48ff9d	ZAMORA	10:56:43-05	1
20150401105825551c15a1ed309	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:58:25-05	1
20150401105825551c15a1f0426	20150326115500551439e48ff9d	CHINCHIPE	10:58:25-05	1
20150401105825551c15a1f06a8	20150326115500551439e48ff9d	EL PANGUI	10:58:25-05	1
20150401105825551c15a1f08d5	20150326115500551439e48ff9d	NANGARITZA	10:58:25-05	1
20150401105825551c15a1f0aad	20150326115500551439e48ff9d	PALANDA	10:58:25-05	1
20150401105825551c15a1f0c87	20150326115500551439e48ff9d	PAQUISHA	10:58:25-05	1
20150401105825551c15a1f0e5b	20150326115500551439e48ff9d	YACUAMBI	10:58:25-05	1
20150401105825551c15a1f1001	20150326115500551439e48ff9d	YANTZAZA	10:58:25-05	1
20150401105825551c15a1f11a2	20150326115500551439e48ff9d	ZAMORA	10:58:25-05	1
20150401105913551c15d129c8f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:59:13-05	1
20150401105913551c15d12e4f5	20150326115500551439e48ff9d	CHINCHIPE	10:59:13-05	1
20150401105913551c15d12e73f	20150326115500551439e48ff9d	EL PANGUI	10:59:13-05	1
20150401105913551c15d12e938	20150326115500551439e48ff9d	NANGARITZA	10:59:13-05	1
20150401105913551c15d12eb37	20150326115500551439e48ff9d	PALANDA	10:59:13-05	1
20150401105913551c15d12ed5a	20150326115500551439e48ff9d	PAQUISHA	10:59:13-05	1
20150401105913551c15d12ef52	20150326115500551439e48ff9d	YACUAMBI	10:59:13-05	1
20150401105913551c15d12f0e1	20150326115500551439e48ff9d	YANTZAZA	10:59:13-05	1
20150401105913551c15d12f2a7	20150326115500551439e48ff9d	ZAMORA	10:59:13-05	1
20150401105923551c15db98a6d	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:59:23-05	1
20150401105923551c15db998c4	20150326115500551439e48ff9d	CHINCHIPE	10:59:23-05	1
20150401105923551c15db99b52	20150326115500551439e48ff9d	EL PANGUI	10:59:23-05	1
20150401105923551c15db99d38	20150326115500551439e48ff9d	NANGARITZA	10:59:23-05	1
20150401105923551c15db99fd1	20150326115500551439e48ff9d	PALANDA	10:59:23-05	1
20150401105923551c15db9a33f	20150326115500551439e48ff9d	PAQUISHA	10:59:23-05	1
20150401105923551c15db9a789	20150326115500551439e48ff9d	YACUAMBI	10:59:23-05	1
20150401105923551c15db9ab9b	20150326115500551439e48ff9d	YANTZAZA	10:59:23-05	1
20150401105923551c15db9af40	20150326115500551439e48ff9d	ZAMORA	10:59:23-05	1
20150401105934551c15e60f9f8	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:59:34-05	1
20150401105934551c15e61373a	20150326115500551439e48ff9d	CHINCHIPE	10:59:34-05	1
20150401105934551c15e6139da	20150326115500551439e48ff9d	EL PANGUI	10:59:34-05	1
20150401105934551c15e613b9b	20150326115500551439e48ff9d	NANGARITZA	10:59:34-05	1
20150401105934551c15e613d5c	20150326115500551439e48ff9d	PALANDA	10:59:34-05	1
20150401105934551c15e613eee	20150326115500551439e48ff9d	PAQUISHA	10:59:34-05	1
20150401105934551c15e61409e	20150326115500551439e48ff9d	YACUAMBI	10:59:34-05	1
20150401105934551c15e614203	20150326115500551439e48ff9d	YANTZAZA	10:59:34-05	1
20150401105934551c15e614381	20150326115500551439e48ff9d	ZAMORA	10:59:34-05	1
20150401105935551c15e76b009	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	10:59:35-05	1
20150401105935551c15e773004	20150326115500551439e48ff9d	CHINCHIPE	10:59:35-05	1
20150401105935551c15e773246	20150326115500551439e48ff9d	EL PANGUI	10:59:35-05	1
20150401105935551c15e7733f8	20150326115500551439e48ff9d	NANGARITZA	10:59:35-05	1
20150401105935551c15e77359c	20150326115500551439e48ff9d	PALANDA	10:59:35-05	1
20150401105935551c15e773754	20150326115500551439e48ff9d	PAQUISHA	10:59:35-05	1
20150401105935551c15e77395e	20150326115500551439e48ff9d	YACUAMBI	10:59:35-05	1
20150401105935551c15e773b32	20150326115500551439e48ff9d	YANTZAZA	10:59:35-05	1
20150401105935551c15e773d92	20150326115500551439e48ff9d	ZAMORA	10:59:35-05	1
20150401110039551c1627c584b	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:00:39-05	1
20150401110039551c1627c7717	20150326115500551439e48ff9d	CHINCHIPE	11:00:39-05	1
20150401110039551c1627c7982	20150326115500551439e48ff9d	EL PANGUI	11:00:39-05	1
20150401110039551c1627c7ba1	20150326115500551439e48ff9d	NANGARITZA	11:00:39-05	1
20150401110039551c1627c805d	20150326115500551439e48ff9d	PALANDA	11:00:39-05	1
20150401110039551c1627c8255	20150326115500551439e48ff9d	PAQUISHA	11:00:39-05	1
20150401110039551c1627c842e	20150326115500551439e48ff9d	YACUAMBI	11:00:39-05	1
20150401110039551c1627c85d7	20150326115500551439e48ff9d	YANTZAZA	11:00:39-05	1
20150401110039551c1627c8760	20150326115500551439e48ff9d	ZAMORA	11:00:39-05	1
20150401110101551c163d4770d	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:01:01-05	1
20150401110101551c163d57daa	20150326115500551439e48ff9d	CHINCHIPE	11:01:01-05	1
20150401110101551c163d5a554	20150326115500551439e48ff9d	EL PANGUI	11:01:01-05	1
20150401110101551c163d5ef7d	20150326115500551439e48ff9d	NANGARITZA	11:01:01-05	1
20150401110101551c163d63604	20150326115500551439e48ff9d	PALANDA	11:01:01-05	1
20150401110101551c163d6677a	20150326115500551439e48ff9d	PAQUISHA	11:01:01-05	1
20150401110101551c163d66a13	20150326115500551439e48ff9d	YACUAMBI	11:01:01-05	1
20150401110101551c163d66c22	20150326115500551439e48ff9d	YANTZAZA	11:01:01-05	1
20150401110101551c163d66df4	20150326115500551439e48ff9d	ZAMORA	11:01:01-05	1
20150401110123551c16534c0b6	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:01:23-05	1
20150401110123551c16534d501	20150326115500551439e48ff9d	CHINCHIPE	11:01:23-05	1
20150401110123551c16534d828	20150326115500551439e48ff9d	EL PANGUI	11:01:23-05	1
20150401110123551c16534da2a	20150326115500551439e48ff9d	NANGARITZA	11:01:23-05	1
20150401110123551c16534dc6b	20150326115500551439e48ff9d	PALANDA	11:01:23-05	1
20150401110123551c16534de83	20150326115500551439e48ff9d	PAQUISHA	11:01:23-05	1
20150401110123551c16534e06c	20150326115500551439e48ff9d	YACUAMBI	11:01:23-05	1
20150401110123551c16534e240	20150326115500551439e48ff9d	YANTZAZA	11:01:23-05	1
20150401110123551c16534e3f9	20150326115500551439e48ff9d	ZAMORA	11:01:23-05	1
20150401110131551c165b2291c	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:01:31-05	1
20150401110131551c165b23e80	20150326115500551439e48ff9d	CHINCHIPE	11:01:31-05	1
20150401110131551c165b2410c	20150326115500551439e48ff9d	EL PANGUI	11:01:31-05	1
20150401110131551c165b24306	20150326115500551439e48ff9d	NANGARITZA	11:01:31-05	1
20150401110131551c165b244fc	20150326115500551439e48ff9d	PALANDA	11:01:31-05	1
20150401110131551c165b246ed	20150326115500551439e48ff9d	PAQUISHA	11:01:31-05	1
20150401110131551c165b248e1	20150326115500551439e48ff9d	YACUAMBI	11:01:31-05	1
20150401110131551c165b24a94	20150326115500551439e48ff9d	YANTZAZA	11:01:31-05	1
20150401110131551c165b24c4d	20150326115500551439e48ff9d	ZAMORA	11:01:31-05	1
20150401110206551c167e4e825	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:02:06-05	1
20150401110206551c167e50076	20150326115500551439e48ff9d	CHINCHIPE	11:02:06-05	1
20150401110206551c167e502d3	20150326115500551439e48ff9d	EL PANGUI	11:02:06-05	1
20150401110206551c167e504d1	20150326115500551439e48ff9d	NANGARITZA	11:02:06-05	1
20150401110206551c167e506e7	20150326115500551439e48ff9d	PALANDA	11:02:06-05	1
20150401110206551c167e508ec	20150326115500551439e48ff9d	PAQUISHA	11:02:06-05	1
20150401110206551c167e50ac7	20150326115500551439e48ff9d	YACUAMBI	11:02:06-05	1
20150401110206551c167e50c6d	20150326115500551439e48ff9d	YANTZAZA	11:02:06-05	1
20150401110206551c167e50e05	20150326115500551439e48ff9d	ZAMORA	11:02:06-05	1
20150401110257551c16b162e1f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:02:57-05	1
20150401110257551c16b169e61	20150326115500551439e48ff9d	CHINCHIPE	11:02:57-05	1
20150401110257551c16b16a23e	20150326115500551439e48ff9d	EL PANGUI	11:02:57-05	1
20150401110257551c16b16a4d8	20150326115500551439e48ff9d	NANGARITZA	11:02:57-05	1
20150401110257551c16b16a7d1	20150326115500551439e48ff9d	PALANDA	11:02:57-05	1
20150401110257551c16b16aaf6	20150326115500551439e48ff9d	PAQUISHA	11:02:57-05	1
20150401110257551c16b16ae6a	20150326115500551439e48ff9d	YACUAMBI	11:02:57-05	1
20150401110257551c16b16b15b	20150326115500551439e48ff9d	YANTZAZA	11:02:57-05	1
20150401110257551c16b16b484	20150326115500551439e48ff9d	ZAMORA	11:02:57-05	1
20150401110313551c16c15a86f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:03:13-05	1
20150401110313551c16c15bf5f	20150326115500551439e48ff9d	CHINCHIPE	11:03:13-05	1
20150401110313551c16c15c2e3	20150326115500551439e48ff9d	EL PANGUI	11:03:13-05	1
20150401110313551c16c15c5da	20150326115500551439e48ff9d	NANGARITZA	11:03:13-05	1
20150401110313551c16c15c8d5	20150326115500551439e48ff9d	PALANDA	11:03:13-05	1
20150401110313551c16c15cc67	20150326115500551439e48ff9d	PAQUISHA	11:03:13-05	1
20150401110313551c16c15cfb3	20150326115500551439e48ff9d	YACUAMBI	11:03:13-05	1
20150401110313551c16c15d26e	20150326115500551439e48ff9d	YANTZAZA	11:03:13-05	1
20150401110313551c16c15d55e	20150326115500551439e48ff9d	ZAMORA	11:03:13-05	1
20150401110328551c16d0e41c9	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:03:28-05	1
20150401110328551c16d0e50ee	20150326115500551439e48ff9d	CHINCHIPE	11:03:28-05	1
20150401110328551c16d0e5418	20150326115500551439e48ff9d	EL PANGUI	11:03:28-05	1
20150401110328551c16d0e565c	20150326115500551439e48ff9d	NANGARITZA	11:03:28-05	1
20150401110328551c16d0e5847	20150326115500551439e48ff9d	PALANDA	11:03:28-05	1
20150401110328551c16d0e5a51	20150326115500551439e48ff9d	PAQUISHA	11:03:28-05	1
20150401110328551c16d0e5c21	20150326115500551439e48ff9d	YACUAMBI	11:03:28-05	1
20150401110328551c16d0e5dcf	20150326115500551439e48ff9d	YANTZAZA	11:03:28-05	1
20150401110328551c16d0e5f57	20150326115500551439e48ff9d	ZAMORA	11:03:28-05	1
20150401110341551c16dd8c850	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:03:41-05	1
20150401110341551c16dd91456	20150326115500551439e48ff9d	CHINCHIPE	11:03:41-05	1
20150401110341551c16dd916d0	20150326115500551439e48ff9d	EL PANGUI	11:03:41-05	1
20150401110341551c16dd918b9	20150326115500551439e48ff9d	NANGARITZA	11:03:41-05	1
20150401110341551c16dd91a77	20150326115500551439e48ff9d	PALANDA	11:03:41-05	1
20150401110341551c16dd91c68	20150326115500551439e48ff9d	PAQUISHA	11:03:41-05	1
20150401110341551c16dd91e48	20150326115500551439e48ff9d	YACUAMBI	11:03:41-05	1
20150401110341551c16dd91fd0	20150326115500551439e48ff9d	YANTZAZA	11:03:41-05	1
20150401110341551c16dd92177	20150326115500551439e48ff9d	ZAMORA	11:03:41-05	1
20150401110355551c16ebcef60	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:03:55-05	1
20150401110355551c16ebcfdb9	20150326115500551439e48ff9d	CHINCHIPE	11:03:55-05	1
20150401110355551c16ebd0160	20150326115500551439e48ff9d	EL PANGUI	11:03:55-05	1
20150401110355551c16ebd03ec	20150326115500551439e48ff9d	NANGARITZA	11:03:55-05	1
20150401110355551c16ebd064e	20150326115500551439e48ff9d	PALANDA	11:03:55-05	1
20150401110355551c16ebd0a40	20150326115500551439e48ff9d	PAQUISHA	11:03:55-05	1
20150401110355551c16ebd0e7d	20150326115500551439e48ff9d	YACUAMBI	11:03:55-05	1
20150401110355551c16ebd1166	20150326115500551439e48ff9d	YANTZAZA	11:03:55-05	1
20150401110355551c16ebd1385	20150326115500551439e48ff9d	ZAMORA	11:03:55-05	1
20150401110403551c16f344b98	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:04:03-05	1
20150401110404551c16f41fb5c	20150326115500551439e48ff9d	CHINCHIPE	11:04:04-05	1
20150401110404551c16f41fe6b	20150326115500551439e48ff9d	EL PANGUI	11:04:04-05	1
20150401110404551c16f443f48	20150326115500551439e48ff9d	NANGARITZA	11:04:04-05	1
20150401110404551c16f4589cb	20150326115500551439e48ff9d	PALANDA	11:04:04-05	1
20150401110404551c16f4647cb	20150326115500551439e48ff9d	PAQUISHA	11:04:04-05	1
20150401110404551c16f464acf	20150326115500551439e48ff9d	YACUAMBI	11:04:04-05	1
20150401110404551c16f472bf8	20150326115500551439e48ff9d	YANTZAZA	11:04:04-05	1
20150401110404551c16f4807ce	20150326115500551439e48ff9d	ZAMORA	11:04:04-05	1
20150401110423551c1707187e7	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:04:23-05	1
20150401110423551c17071afaa	20150326115500551439e48ff9d	CHINCHIPE	11:04:23-05	1
20150401110423551c17071b1ca	20150326115500551439e48ff9d	EL PANGUI	11:04:23-05	1
20150401110423551c17071b3b1	20150326115500551439e48ff9d	NANGARITZA	11:04:23-05	1
20150401110423551c17071b589	20150326115500551439e48ff9d	PALANDA	11:04:23-05	1
20150401110423551c17071b758	20150326115500551439e48ff9d	PAQUISHA	11:04:23-05	1
20150401110423551c17071b921	20150326115500551439e48ff9d	YACUAMBI	11:04:23-05	1
20150401110423551c17071bac6	20150326115500551439e48ff9d	YANTZAZA	11:04:23-05	1
20150401110423551c17071bc68	20150326115500551439e48ff9d	ZAMORA	11:04:23-05	1
20150401110456551c172802a28	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:04:56-05	1
20150401110456551c172807bdf	20150326115500551439e48ff9d	CHINCHIPE	11:04:56-05	1
20150401110456551c172807e98	20150326115500551439e48ff9d	EL PANGUI	11:04:56-05	1
20150401110456551c172808085	20150326115500551439e48ff9d	NANGARITZA	11:04:56-05	1
20150401110456551c1728082a8	20150326115500551439e48ff9d	PALANDA	11:04:56-05	1
20150401110456551c17280849a	20150326115500551439e48ff9d	PAQUISHA	11:04:56-05	1
20150401110456551c172808674	20150326115500551439e48ff9d	YACUAMBI	11:04:56-05	1
20150401110456551c172808834	20150326115500551439e48ff9d	YANTZAZA	11:04:56-05	1
20150401110456551c1728089df	20150326115500551439e48ff9d	ZAMORA	11:04:56-05	1
20150401110522551c17420f9a1	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:05:22-05	1
20150401110522551c1742127e8	20150326115500551439e48ff9d	CHINCHIPE	11:05:22-05	1
20150401110522551c174212bed	20150326115500551439e48ff9d	EL PANGUI	11:05:22-05	1
20150401110522551c174212f34	20150326115500551439e48ff9d	NANGARITZA	11:05:22-05	1
20150401110522551c1742131f8	20150326115500551439e48ff9d	PALANDA	11:05:22-05	1
20150401110522551c174213515	20150326115500551439e48ff9d	PAQUISHA	11:05:22-05	1
20150401110522551c174213790	20150326115500551439e48ff9d	YACUAMBI	11:05:22-05	1
20150401110522551c174213952	20150326115500551439e48ff9d	YANTZAZA	11:05:22-05	1
20150401110522551c174213b43	20150326115500551439e48ff9d	ZAMORA	11:05:22-05	1
20150401110553551c17614f296	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:05:53-05	1
20150401110553551c17615678c	20150326115500551439e48ff9d	CHINCHIPE	11:05:53-05	1
20150401110553551c1761569e5	20150326115500551439e48ff9d	EL PANGUI	11:05:53-05	1
20150401110553551c176156b9a	20150326115500551439e48ff9d	NANGARITZA	11:05:53-05	1
20150401110553551c176156d39	20150326115500551439e48ff9d	PALANDA	11:05:53-05	1
20150401110553551c176156edc	20150326115500551439e48ff9d	PAQUISHA	11:05:53-05	1
20150401110553551c1761570a5	20150326115500551439e48ff9d	YACUAMBI	11:05:53-05	1
20150401110553551c176157242	20150326115500551439e48ff9d	YANTZAZA	11:05:53-05	1
20150401110553551c1761573ed	20150326115500551439e48ff9d	ZAMORA	11:05:53-05	1
20150401110625551c17816efe1	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:06:25-05	1
20150401110625551c17816fcc2	20150326115500551439e48ff9d	CHINCHIPE	11:06:25-05	1
20150401110625551c17816ff12	20150326115500551439e48ff9d	EL PANGUI	11:06:25-05	1
20150401110625551c1781701a7	20150326115500551439e48ff9d	NANGARITZA	11:06:25-05	1
20150401110625551c1781704a3	20150326115500551439e48ff9d	PALANDA	11:06:25-05	1
20150401110625551c17817087e	20150326115500551439e48ff9d	PAQUISHA	11:06:25-05	1
20150401110625551c178170bcf	20150326115500551439e48ff9d	YACUAMBI	11:06:25-05	1
20150401110625551c178170e11	20150326115500551439e48ff9d	YANTZAZA	11:06:25-05	1
20150401110625551c178171089	20150326115500551439e48ff9d	ZAMORA	11:06:25-05	1
20150401110744551c17d031d47	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:07:44-05	1
20150401110744551c17d0344d2	20150326115500551439e48ff9d	CHINCHIPE	11:07:44-05	1
20150401110744551c17d0348f1	20150326115500551439e48ff9d	EL PANGUI	11:07:44-05	1
20150401110744551c17d034c96	20150326115500551439e48ff9d	NANGARITZA	11:07:44-05	1
20150401110744551c17d034fe2	20150326115500551439e48ff9d	PALANDA	11:07:44-05	1
20150401110744551c17d03531a	20150326115500551439e48ff9d	PAQUISHA	11:07:44-05	1
20150401110744551c17d035641	20150326115500551439e48ff9d	YACUAMBI	11:07:44-05	1
20150401110744551c17d03588d	20150326115500551439e48ff9d	YANTZAZA	11:07:44-05	1
20150401110744551c17d035a69	20150326115500551439e48ff9d	ZAMORA	11:07:44-05	1
20150401111102551c1896bf85c	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:11:02-05	1
20150401111102551c1896c167c	20150326115500551439e48ff9d	CHINCHIPE	11:11:02-05	1
20150401111102551c1896c19e3	20150326115500551439e48ff9d	EL PANGUI	11:11:02-05	1
20150401111102551c1896c1caa	20150326115500551439e48ff9d	NANGARITZA	11:11:02-05	1
20150401111102551c1896c1f63	20150326115500551439e48ff9d	PALANDA	11:11:02-05	1
20150401111102551c1896c2217	20150326115500551439e48ff9d	PAQUISHA	11:11:02-05	1
20150401111102551c1896c24c4	20150326115500551439e48ff9d	YACUAMBI	11:11:02-05	1
20150401111102551c1896c2721	20150326115500551439e48ff9d	YANTZAZA	11:11:02-05	1
20150401111102551c1896c2a37	20150326115500551439e48ff9d	ZAMORA	11:11:02-05	1
20150401111325551c192526d00	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:13:25-05	1
20150401111325551c19252a92d	20150326115500551439e48ff9d	CHINCHIPE	11:13:25-05	1
20150401111325551c19252abcc	20150326115500551439e48ff9d	EL PANGUI	11:13:25-05	1
20150401111325551c19252adf8	20150326115500551439e48ff9d	NANGARITZA	11:13:25-05	1
20150401111325551c19252b042	20150326115500551439e48ff9d	PALANDA	11:13:25-05	1
20150401111325551c19252b229	20150326115500551439e48ff9d	PAQUISHA	11:13:25-05	1
20150401111325551c19252b404	20150326115500551439e48ff9d	YACUAMBI	11:13:25-05	1
20150401111325551c19252b5ce	20150326115500551439e48ff9d	YANTZAZA	11:13:25-05	1
20150401111325551c19252bad2	20150326115500551439e48ff9d	ZAMORA	11:13:25-05	1
20150401111401551c1949898a6	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:14:01-05	1
20150401111401551c19498ba76	20150326115500551439e48ff9d	CHINCHIPE	11:14:01-05	1
20150401111401551c19498bdc7	20150326115500551439e48ff9d	EL PANGUI	11:14:01-05	1
20150401111401551c19498c085	20150326115500551439e48ff9d	NANGARITZA	11:14:01-05	1
20150401111401551c19498c334	20150326115500551439e48ff9d	PALANDA	11:14:01-05	1
20150401111401551c19498c5e8	20150326115500551439e48ff9d	PAQUISHA	11:14:01-05	1
20150401111401551c19498c893	20150326115500551439e48ff9d	YACUAMBI	11:14:01-05	1
20150401111401551c19498caf1	20150326115500551439e48ff9d	YANTZAZA	11:14:01-05	1
20150401111401551c19498cd48	20150326115500551439e48ff9d	ZAMORA	11:14:01-05	1
20150401111429551c1965d7eac	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:14:29-05	1
20150401111429551c1965d90e4	20150326115500551439e48ff9d	CHINCHIPE	11:14:29-05	1
20150401111429551c1965d933e	20150326115500551439e48ff9d	EL PANGUI	11:14:29-05	1
20150401111429551c1965d950f	20150326115500551439e48ff9d	NANGARITZA	11:14:29-05	1
20150401111429551c1965d96da	20150326115500551439e48ff9d	PALANDA	11:14:29-05	1
20150401111429551c1965d98a2	20150326115500551439e48ff9d	PAQUISHA	11:14:29-05	1
20150401111429551c1965d9a6d	20150326115500551439e48ff9d	YACUAMBI	11:14:29-05	1
20150401111429551c1965d9c12	20150326115500551439e48ff9d	YANTZAZA	11:14:29-05	1
20150401111429551c1965d9d9f	20150326115500551439e48ff9d	ZAMORA	11:14:29-05	1
20150401111448551c19786de44	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:14:48-05	1
20150401111448551c19786f295	20150326115500551439e48ff9d	CHINCHIPE	11:14:48-05	1
20150401111448551c19786f4fd	20150326115500551439e48ff9d	EL PANGUI	11:14:48-05	1
20150401111448551c19786f6e4	20150326115500551439e48ff9d	NANGARITZA	11:14:48-05	1
20150401111448551c19786f8df	20150326115500551439e48ff9d	PALANDA	11:14:48-05	1
20150401111448551c19786fbf5	20150326115500551439e48ff9d	PAQUISHA	11:14:48-05	1
20150401111448551c19786fe13	20150326115500551439e48ff9d	YACUAMBI	11:14:48-05	1
20150401111448551c197870099	20150326115500551439e48ff9d	YANTZAZA	11:14:48-05	1
20150401111448551c1978703f3	20150326115500551439e48ff9d	ZAMORA	11:14:48-05	1
20150401111504551c19882f476	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:15:04-05	1
20150401111504551c198830bfc	20150326115500551439e48ff9d	CHINCHIPE	11:15:04-05	1
20150401111504551c198830ed2	20150326115500551439e48ff9d	EL PANGUI	11:15:04-05	1
20150401111504551c1988311a7	20150326115500551439e48ff9d	NANGARITZA	11:15:04-05	1
20150401111504551c1988314ac	20150326115500551439e48ff9d	PALANDA	11:15:04-05	1
20150401111504551c1988317dc	20150326115500551439e48ff9d	PAQUISHA	11:15:04-05	1
20150401111504551c198831b8f	20150326115500551439e48ff9d	YACUAMBI	11:15:04-05	1
20150401111504551c198831e55	20150326115500551439e48ff9d	YANTZAZA	11:15:04-05	1
20150401111504551c1988320dc	20150326115500551439e48ff9d	ZAMORA	11:15:04-05	1
20150401111515551c1993a00ac	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:15:15-05	1
20150401111515551c1993a24f7	20150326115500551439e48ff9d	CHINCHIPE	11:15:15-05	1
20150401111515551c1993a276a	20150326115500551439e48ff9d	EL PANGUI	11:15:15-05	1
20150401111515551c1993a2947	20150326115500551439e48ff9d	NANGARITZA	11:15:15-05	1
20150401111515551c1993a2af1	20150326115500551439e48ff9d	PALANDA	11:15:15-05	1
20150401111515551c1993a2d30	20150326115500551439e48ff9d	PAQUISHA	11:15:15-05	1
20150401111515551c1993a2f74	20150326115500551439e48ff9d	YACUAMBI	11:15:15-05	1
20150401111515551c1993a30f3	20150326115500551439e48ff9d	YANTZAZA	11:15:15-05	1
20150401111515551c1993a325b	20150326115500551439e48ff9d	ZAMORA	11:15:15-05	1
20150401111524551c199c94f76	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:15:24-05	1
20150401111524551c199c95ea9	20150326115500551439e48ff9d	CHINCHIPE	11:15:24-05	1
20150401111524551c199c96102	20150326115500551439e48ff9d	EL PANGUI	11:15:24-05	1
20150401111524551c199c962cb	20150326115500551439e48ff9d	NANGARITZA	11:15:24-05	1
20150401111524551c199c96494	20150326115500551439e48ff9d	PALANDA	11:15:24-05	1
20150401111524551c199c96663	20150326115500551439e48ff9d	PAQUISHA	11:15:24-05	1
20150401111524551c199c96862	20150326115500551439e48ff9d	YACUAMBI	11:15:24-05	1
20150401111524551c199c96a54	20150326115500551439e48ff9d	YANTZAZA	11:15:24-05	1
20150401111524551c199c96c05	20150326115500551439e48ff9d	ZAMORA	11:15:24-05	1
20150401111530551c19a2747bc	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:15:30-05	1
20150401111530551c19a275d80	20150326115500551439e48ff9d	CHINCHIPE	11:15:30-05	1
20150401111530551c19a2761b3	20150326115500551439e48ff9d	EL PANGUI	11:15:30-05	1
20150401111530551c19a276596	20150326115500551439e48ff9d	NANGARITZA	11:15:30-05	1
20150401111530551c19a276a2b	20150326115500551439e48ff9d	PALANDA	11:15:30-05	1
20150401111530551c19a276dd0	20150326115500551439e48ff9d	PAQUISHA	11:15:30-05	1
20150401111530551c19a2772a2	20150326115500551439e48ff9d	YACUAMBI	11:15:30-05	1
20150401111530551c19a2775a7	20150326115500551439e48ff9d	YANTZAZA	11:15:30-05	1
20150401111530551c19a27783a	20150326115500551439e48ff9d	ZAMORA	11:15:30-05	1
20150401111610551c19ca2c915	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:16:10-05	1
20150401111610551c19ca2d72b	20150326115500551439e48ff9d	CHINCHIPE	11:16:10-05	1
20150401111610551c19ca2d97e	20150326115500551439e48ff9d	EL PANGUI	11:16:10-05	1
20150401111610551c19ca2db8e	20150326115500551439e48ff9d	NANGARITZA	11:16:10-05	1
20150401111610551c19ca2dd77	20150326115500551439e48ff9d	PALANDA	11:16:10-05	1
20150401111610551c19ca2df8a	20150326115500551439e48ff9d	PAQUISHA	11:16:10-05	1
20150401111610551c19ca2e132	20150326115500551439e48ff9d	YACUAMBI	11:16:10-05	1
20150401111610551c19ca2e2c9	20150326115500551439e48ff9d	YANTZAZA	11:16:10-05	1
20150401111610551c19ca2e477	20150326115500551439e48ff9d	ZAMORA	11:16:10-05	1
20150401111623551c19d7ccefb	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:16:23-05	1
20150401111623551c19d7cdc78	20150326115500551439e48ff9d	CHINCHIPE	11:16:23-05	1
20150401111623551c19d7cdeac	20150326115500551439e48ff9d	EL PANGUI	11:16:23-05	1
20150401111623551c19d7ce0ad	20150326115500551439e48ff9d	NANGARITZA	11:16:23-05	1
20150401111623551c19d7ce2a8	20150326115500551439e48ff9d	PALANDA	11:16:23-05	1
20150401111623551c19d7ce49b	20150326115500551439e48ff9d	PAQUISHA	11:16:23-05	1
20150401111623551c19d7ce665	20150326115500551439e48ff9d	YACUAMBI	11:16:23-05	1
20150401111623551c19d7ce80b	20150326115500551439e48ff9d	YANTZAZA	11:16:23-05	1
20150401111623551c19d7ce9ab	20150326115500551439e48ff9d	ZAMORA	11:16:23-05	1
20150401111653551c19f5c98f8	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:16:53-05	1
20150401111653551c19f5ca6cf	20150326115500551439e48ff9d	CHINCHIPE	11:16:53-05	1
20150401111653551c19f5ca8fa	20150326115500551439e48ff9d	EL PANGUI	11:16:53-05	1
20150401111653551c19f5caab5	20150326115500551439e48ff9d	NANGARITZA	11:16:53-05	1
20150401111653551c19f5cac77	20150326115500551439e48ff9d	PALANDA	11:16:53-05	1
20150401111653551c19f5cae7c	20150326115500551439e48ff9d	PAQUISHA	11:16:53-05	1
20150401111653551c19f5cb053	20150326115500551439e48ff9d	YACUAMBI	11:16:53-05	1
20150401111653551c19f5cb219	20150326115500551439e48ff9d	YANTZAZA	11:16:53-05	1
20150401111653551c19f5cb3de	20150326115500551439e48ff9d	ZAMORA	11:16:53-05	1
20150401111725551c1a1565761	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:17:25-05	1
20150401111725551c1a1566509	20150326115500551439e48ff9d	CHINCHIPE	11:17:25-05	1
20150401111725551c1a1566769	20150326115500551439e48ff9d	EL PANGUI	11:17:25-05	1
20150401111725551c1a1566966	20150326115500551439e48ff9d	NANGARITZA	11:17:25-05	1
20150401111725551c1a1566b54	20150326115500551439e48ff9d	PALANDA	11:17:25-05	1
20150401111725551c1a1566d1f	20150326115500551439e48ff9d	PAQUISHA	11:17:25-05	1
20150401111725551c1a1566f40	20150326115500551439e48ff9d	YACUAMBI	11:17:25-05	1
20150401111725551c1a1567102	20150326115500551439e48ff9d	YANTZAZA	11:17:25-05	1
20150401111725551c1a15672bf	20150326115500551439e48ff9d	ZAMORA	11:17:25-05	1
20150401111800551c1a383bcc3	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:18:00-05	1
20150401111800551c1a384295d	20150326115500551439e48ff9d	CHINCHIPE	11:18:00-05	1
20150401111800551c1a3846f60	20150326115500551439e48ff9d	EL PANGUI	11:18:00-05	1
20150401111800551c1a384b079	20150326115500551439e48ff9d	NANGARITZA	11:18:00-05	1
20150401111800551c1a384ff26	20150326115500551439e48ff9d	PALANDA	11:18:00-05	1
20150401111800551c1a3853f52	20150326115500551439e48ff9d	PAQUISHA	11:18:00-05	1
20150401111800551c1a38543a9	20150326115500551439e48ff9d	YACUAMBI	11:18:00-05	1
20150401111800551c1a38546d5	20150326115500551439e48ff9d	YANTZAZA	11:18:00-05	1
20150401111800551c1a38549a4	20150326115500551439e48ff9d	ZAMORA	11:18:00-05	1
20150401111930551c1a9202107	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:19:30-05	1
20150401111930551c1a9203ffa	20150326115500551439e48ff9d	CHINCHIPE	11:19:30-05	1
20150401111930551c1a92044a4	20150326115500551439e48ff9d	EL PANGUI	11:19:30-05	1
20150401111930551c1a9204901	20150326115500551439e48ff9d	NANGARITZA	11:19:30-05	1
20150401111930551c1a9204ec4	20150326115500551439e48ff9d	PALANDA	11:19:30-05	1
20150401111930551c1a9205160	20150326115500551439e48ff9d	PAQUISHA	11:19:30-05	1
20150401111930551c1a92053a1	20150326115500551439e48ff9d	YACUAMBI	11:19:30-05	1
20150401111930551c1a920551a	20150326115500551439e48ff9d	YANTZAZA	11:19:30-05	1
20150401111930551c1a92056c2	20150326115500551439e48ff9d	ZAMORA	11:19:30-05	1
20150401111957551c1aad1eafd	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:19:57-05	1
20150401111957551c1aad1f909	20150326115500551439e48ff9d	CHINCHIPE	11:19:57-05	1
20150401111957551c1aad1fb6d	20150326115500551439e48ff9d	EL PANGUI	11:19:57-05	1
20150401111957551c1aad1fd64	20150326115500551439e48ff9d	NANGARITZA	11:19:57-05	1
20150401111957551c1aad1ff5c	20150326115500551439e48ff9d	PALANDA	11:19:57-05	1
20150401111957551c1aad20264	20150326115500551439e48ff9d	PAQUISHA	11:19:57-05	1
20150401111957551c1aad206a4	20150326115500551439e48ff9d	YACUAMBI	11:19:57-05	1
20150401111957551c1aad20a62	20150326115500551439e48ff9d	YANTZAZA	11:19:57-05	1
20150401111957551c1aad20ce7	20150326115500551439e48ff9d	ZAMORA	11:19:57-05	1
20150401114627551c20e379276	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:46:27-05	1
20150401114627551c20e37c5a0	20150326115500551439e48ff9d	CHINCHIPE	11:46:27-05	1
20150401114627551c20e37c7de	20150326115500551439e48ff9d	EL PANGUI	11:46:27-05	1
20150401114627551c20e37c9a1	20150326115500551439e48ff9d	NANGARITZA	11:46:27-05	1
20150401114627551c20e37cbfa	20150326115500551439e48ff9d	PALANDA	11:46:27-05	1
20150401114627551c20e37cdd5	20150326115500551439e48ff9d	PAQUISHA	11:46:27-05	1
20150401114627551c20e37cf80	20150326115500551439e48ff9d	YACUAMBI	11:46:27-05	1
20150401114627551c20e37d14b	20150326115500551439e48ff9d	YANTZAZA	11:46:27-05	1
20150401114627551c20e37d3be	20150326115500551439e48ff9d	ZAMORA	11:46:27-05	1
20150401122724551c2a7c58c02	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	12:27:24-05	1
20150401122724551c2a7c66934	20150326115500551439e48ff9d	CHINCHIPE	12:27:24-05	1
20150401122724551c2a7c66bc2	20150326115500551439e48ff9d	EL PANGUI	12:27:24-05	1
20150401122724551c2a7c66e91	20150326115500551439e48ff9d	NANGARITZA	12:27:24-05	1
20150401122724551c2a7c670a6	20150326115500551439e48ff9d	PALANDA	12:27:24-05	1
20150401122724551c2a7c6728f	20150326115500551439e48ff9d	PAQUISHA	12:27:24-05	1
20150401122724551c2a7c67469	20150326115500551439e48ff9d	YACUAMBI	12:27:24-05	1
20150401122724551c2a7c67616	20150326115500551439e48ff9d	YANTZAZA	12:27:24-05	1
20150401122724551c2a7c677ba	20150326115500551439e48ff9d	ZAMORA	12:27:24-05	1
20150402095315551d57dbbb38f	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	09:53:15-05	1
20150402095315551d57dbcdad8	20150326115500551439e48ff9d	CHINCHIPE	09:53:15-05	1
20150402095315551d57dbcddd2	20150326115500551439e48ff9d	EL PANGUI	09:53:15-05	1
20150402095315551d57dbce081	20150326115500551439e48ff9d	NANGARITZA	09:53:15-05	1
20150402095315551d57dbce29b	20150326115500551439e48ff9d	PALANDA	09:53:15-05	1
20150402095315551d57dbce490	20150326115500551439e48ff9d	PAQUISHA	09:53:15-05	1
20150402095315551d57dbce67a	20150326115500551439e48ff9d	YACUAMBI	09:53:15-05	1
20150402095315551d57dbce830	20150326115500551439e48ff9d	YANTZAZA	09:53:15-05	1
20150402095315551d57dbce9f0	20150326115500551439e48ff9d	ZAMORA	09:53:15-05	1
20150402115609551d74a9362bb	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	11:56:09-05	1
20150402115609551d74a940b5e	20150326115500551439e48ff9d	CHINCHIPE	11:56:09-05	1
20150402115609551d74a940ddd	20150326115500551439e48ff9d	EL PANGUI	11:56:09-05	1
20150402115609551d74a940fae	20150326115500551439e48ff9d	NANGARITZA	11:56:09-05	1
20150402115609551d74a94118a	20150326115500551439e48ff9d	PALANDA	11:56:09-05	1
20150402115609551d74a941338	20150326115500551439e48ff9d	PAQUISHA	11:56:09-05	1
20150402115609551d74a9414ed	20150326115500551439e48ff9d	YACUAMBI	11:56:09-05	1
20150402115609551d74a9416f9	20150326115500551439e48ff9d	YANTZAZA	11:56:09-05	1
20150402115609551d74a9418b1	20150326115500551439e48ff9d	ZAMORA	11:56:09-05	1
20150430121007554261ef07b31	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	12:10:07-05	1
20150430121007554261ef08a1f	20150326115500551439e48ff9d	CHINCHIPE	12:10:07-05	1
20150430121007554261ef08c6a	20150326115500551439e48ff9d	EL PANGUI	12:10:07-05	1
20150430121007554261ef08e51	20150326115500551439e48ff9d	NANGARITZA	12:10:07-05	1
20150430121007554261ef09026	20150326115500551439e48ff9d	PALANDA	12:10:07-05	1
20150430121007554261ef091df	20150326115500551439e48ff9d	PAQUISHA	12:10:07-05	1
20150430121007554261ef0938e	20150326115500551439e48ff9d	YACUAMBI	12:10:07-05	1
20150430121007554261ef09519	20150326115500551439e48ff9d	YANTZAZA	12:10:07-05	1
20150430121007554261ef096a0	20150326115500551439e48ff9d	ZAMORA	12:10:07-05	1
2015080222322555bee0c9ea0d2	20150326115500551439e48ff9d	CENTINELA DEL CONDOR	22:32:25-05	1
2015080222322655bee0ca037cb	20150326115500551439e48ff9d	CHINCHIPE	22:32:26-05	1
2015080222322655bee0ca03c30	20150326115500551439e48ff9d	EL PANGUI	22:32:26-05	1
2015080222322655bee0ca03f72	20150326115500551439e48ff9d	NANGARITZA	22:32:26-05	1
2015080222322655bee0ca0422b	20150326115500551439e48ff9d	PALANDA	22:32:26-05	1
2015080222322655bee0ca04429	20150326115500551439e48ff9d	PAQUISHA	22:32:26-05	1
2015080222322655bee0ca04640	20150326115500551439e48ff9d	YACUAMBI	22:32:26-05	1
2015080222322655bee0ca048e1	20150326115500551439e48ff9d	YANTZAZA	22:32:26-05	1
2015080222322655bee0ca04b5b	20150326115500551439e48ff9d	ZAMORA	22:32:26-05	1
2015091711504855faef68a276f	20150326115500551439e48ff9d		11:50:48-05	1
2015091711504855faef68d5a9b	20150326115500551439e48ff9d		11:50:48-05	1
2015091711504855faef68d7b42	20150326115500551439e48ff9d		11:50:48-05	1
2015091711504855faef68d9ce2	20150326115500551439e48ff9d		11:50:48-05	1
2015091711504855faef68dbd3e	20150326115500551439e48ff9d		11:50:48-05	1
2015091711504855faef68dd2bc	20150326115500551439e48ff9d		11:50:48-05	1
2015091711504855faef68de763	20150326115500551439e48ff9d		11:50:48-05	1
2015091711504855faef68dfd3c	20150326115500551439e48ff9d		11:50:48-05	1
2015091711504855faef68e118e	20150326115500551439e48ff9d		11:50:48-05	1
2015091712031655faf25434993	20150326115500551439e48ff9d		12:03:16-05	1
2015091712031655faf2543ceb7	20150326115500551439e48ff9d		12:03:16-05	1
2015091712031655faf2544032d	20150326115500551439e48ff9d		12:03:16-05	1
2015091712031655faf25442d41	20150326115500551439e48ff9d		12:03:16-05	1
2015091712031655faf2544744b	20150326115500551439e48ff9d		12:03:16-05	1
2015091712031655faf2544917e	20150326115500551439e48ff9d		12:03:16-05	1
2015091712031655faf2544ab86	20150326115500551439e48ff9d		12:03:16-05	1
2015091712031655faf2544c70f	20150326115500551439e48ff9d		12:03:16-05	1
2015091712031655faf2544e1a3	20150326115500551439e48ff9d		12:03:16-05	1
2015091712045755faf2b95e920	20150326115500551439e48ff9d		12:04:57-05	1
2015091712045755faf2b965529	20150326115500551439e48ff9d		12:04:57-05	1
2015091712045755faf2b967382	20150326115500551439e48ff9d		12:04:57-05	1
2015091712045755faf2b96bd86	20150326115500551439e48ff9d		12:04:57-05	1
2015091712045755faf2b970a9c	20150326115500551439e48ff9d		12:04:57-05	1
2015091712045755faf2b973e6f	20150326115500551439e48ff9d		12:04:57-05	1
2015091712045755faf2b9787af	20150326115500551439e48ff9d		12:04:57-05	1
2015091712045755faf2b97cc9d	20150326115500551439e48ff9d		12:04:57-05	1
2015091712045755faf2b9829b7	20150326115500551439e48ff9d		12:04:57-05	1
2015091712062055faf30c68d05	20150326115500551439e48ff9d		12:06:20-05	1
2015091712062055faf30c6e179	20150326115500551439e48ff9d		12:06:20-05	1
2015091712062055faf30c6f10a	20150326115500551439e48ff9d		12:06:20-05	1
2015091712062055faf30c703a5	20150326115500551439e48ff9d		12:06:20-05	1
2015091712062055faf30c7145c	20150326115500551439e48ff9d		12:06:20-05	1
2015091712062055faf30c72375	20150326115500551439e48ff9d		12:06:20-05	1
2015091712062055faf30c735f6	20150326115500551439e48ff9d		12:06:20-05	1
2015091712062055faf30c74831	20150326115500551439e48ff9d		12:06:20-05	1
2015091712062055faf30c7593f	20150326115500551439e48ff9d		12:06:20-05	1
2015091719035055fb54e62275f	20150326115500551439e48ff9d		19:03:50-05	1
2015091719035055fb54e6463a9	20150326115500551439e48ff9d		19:03:50-05	1
2015091719035055fb54e647684	20150326115500551439e48ff9d		19:03:50-05	1
2015091719035055fb54e6488e3	20150326115500551439e48ff9d		19:03:50-05	1
2015091719035055fb54e649a5d	20150326115500551439e48ff9d		19:03:50-05	1
2015091719035055fb54e64ad73	20150326115500551439e48ff9d		19:03:50-05	1
2015091719035055fb54e64bfde	20150326115500551439e48ff9d		19:03:50-05	1
2015091719035055fb54e64d2f4	20150326115500551439e48ff9d		19:03:50-05	1
2015091719035055fb54e64e50d	20150326115500551439e48ff9d		19:03:50-05	1
2015091719064355fb55930f37a	20150326115500551439e48ff9d		19:06:43-05	1
2015091719064355fb559316051	20150326115500551439e48ff9d		19:06:43-05	1
2015091719064355fb559317098	20150326115500551439e48ff9d		19:06:43-05	1
2015091719064355fb5593180a1	20150326115500551439e48ff9d		19:06:43-05	1
2015091719064355fb55931905a	20150326115500551439e48ff9d		19:06:43-05	1
2015091719064355fb55931a042	20150326115500551439e48ff9d		19:06:43-05	1
2015091719064355fb55931b00f	20150326115500551439e48ff9d		19:06:43-05	1
2015091719064355fb55931bf34	20150326115500551439e48ff9d		19:06:43-05	1
2015091719064355fb55931d1f2	20150326115500551439e48ff9d		19:06:43-05	1
2015091719071055fb55aeedc05	20150326115500551439e48ff9d		19:07:10-05	1
2015091719071055fb55aef21c8	20150326115500551439e48ff9d		19:07:10-05	1
2015091719071055fb55aef30e7	20150326115500551439e48ff9d		19:07:10-05	1
2015091719071055fb55aef3fba	20150326115500551439e48ff9d		19:07:10-05	1
2015091719071055fb55af00f23	20150326115500551439e48ff9d		19:07:10-05	1
2015091719071055fb55af01e36	20150326115500551439e48ff9d		19:07:10-05	1
2015091719071055fb55af02cbd	20150326115500551439e48ff9d		19:07:10-05	1
2015091719071155fb55af03b21	20150326115500551439e48ff9d		19:07:11-05	1
2015091719071155fb55af04a8f	20150326115500551439e48ff9d		19:07:11-05	1
\.


--
-- TOC entry 2076 (class 0 OID 17517)
-- Dependencies: 169 2105
-- Data for Name: pais; Type: TABLE DATA; Schema: localizacion; Owner: nextbook
--

COPY pais (id, nom_pais, fecha, stado) FROM stdin;
20150326104209551428d167099	Afganistán ‏(‎+93)	10:42:09-05	1
20150326104209551428d170e64	Albania ‏(‎+355)	10:42:09-05	1
20150326104209551428d1710b1	Alemania ‏(‎+49)	10:42:09-05	1
20150326104209551428d171247	Andorra ‏(‎+376)	10:42:09-05	1
20150326104209551428d1713d5	Angola ‏(‎+244)	10:42:09-05	1
20150326104209551428d171572	Antártida ‏(‎+672)	10:42:09-05	1
20150326104209551428d171712	Antigua y Barbuda ‏(‎+1)	10:42:09-05	1
20150326104209551428d1718a3	Antiguas Antillas Holandesas ‏(‎+599)	10:42:09-05	1
20150326104209551428d171a0c	Arabia Saudí ‏(‎+966)	10:42:09-05	1
20150326104209551428d171b8f	Argelia ‏(‎+213)	10:42:09-05	1
20150326104209551428d171d2b	Argentina ‏(‎+54)	10:42:09-05	1
20150326104209551428d171e87	Armenia ‏(‎+374)	10:42:09-05	1
20150326104209551428d171ff7	Aruba ‏(‎+297)	10:42:09-05	1
20150326104209551428d172164	Australia ‏(‎+61)	10:42:09-05	1
20150326104209551428d1722ca	Austria ‏(‎+43)	10:42:09-05	1
20150326104209551428d172435	Autoridad Palestina ‏(‎+970)	10:42:09-05	1
20150326104209551428d17259d	Autoridad Palestina ‏(‎+972)	10:42:09-05	1
20150326104209551428d172726	Azerbaiyán ‏(‎+994)	10:42:09-05	1
20150326104209551428d1728a3	Bangladesh ‏(‎+880)	10:42:09-05	1
20150326104209551428d172a0d	Barbados ‏(‎+1)	10:42:09-05	1
20150326104209551428d172b6b	Belarús ‏(‎+375)	10:42:09-05	1
20150326104209551428d172d09	Bélgica ‏(‎+32)	10:42:09-05	1
20150326104209551428d172e75	Belice ‏(‎+501)	10:42:09-05	1
20150326104209551428d172fd6	Benín ‏(‎+229)	10:42:09-05	1
20150326104209551428d17313f	Bermudas ‏(‎+1)	10:42:09-05	1
20150326104209551428d1732a1	Bolivia ‏(‎+591)	10:42:09-05	1
20150326104209551428d173403	Bosnia y Herzegovina ‏(‎+387)	10:42:09-05	1
20150326104209551428d1735bf	Botsuana ‏(‎+267)	10:42:09-05	1
20150326104209551428d17374b	Brasil ‏(‎+55)	10:42:09-05	1
20150326104209551428d1738d6	Brunéi ‏(‎+673)	10:42:09-05	1
20150326104209551428d173a67	Bulgaria ‏(‎+359)	10:42:09-05	1
20150326104209551428d173bf6	Burkina Faso ‏(‎+226)	10:42:09-05	1
20150326104209551428d173d68	Burundi ‏(‎+257)	10:42:09-05	1
20150326104209551428d173eca	Bután ‏(‎+975)	10:42:09-05	1
20150326104209551428d174031	Cabo Verde ‏(‎+238)	10:42:09-05	1
20150326104209551428d1741d5	Camboya ‏(‎+855)	10:42:09-05	1
20150326104209551428d174332	Camerún ‏(‎+237)	10:42:09-05	1
20150326104209551428d174496	Canadá ‏(‎+1)	10:42:09-05	1
20150326104209551428d1745f2	Chad ‏(‎+235)	10:42:09-05	1
20150326104209551428d17474f	Chile ‏(‎+56)	10:42:09-05	1
20150326104209551428d1748b8	China ‏(‎+86)	10:42:09-05	1
20150326104209551428d174a16	Chipre ‏(‎+357)	10:42:09-05	1
20150326104209551428d174b6b	Colombia ‏(‎+57)	10:42:09-05	1
20150326104209551428d174d0a	Comoras ‏(‎+269)	10:42:09-05	1
20150326104209551428d174e67	Congo (RDC) ‏(‎+243)	10:42:09-05	1
20150326104209551428d174fa6	Corea del Norte ‏(‎+850)	10:42:09-05	1
20150326104209551428d175109	Corea del Sur ‏(‎+82)	10:42:09-05	1
20150326104209551428d17526b	Costa Rica ‏(‎+506)	10:42:09-05	1
20150326104209551428d1753e2	Croacia (Hrvatska) ‏(‎+385)	10:42:09-05	1
20150326104209551428d175572	Cuba ‏(‎+53)	10:42:09-05	1
20150326104209551428d1756ca	Dinamarca ‏(‎+45)	10:42:09-05	1
20150326104209551428d17581b	Dominica ‏(‎+1)	10:42:09-05	1
20150326104209551428d175961	Ecuador ‏(‎+593)	10:42:09-05	1
20150326104209551428d175ab1	Egipto ‏(‎+20)	10:42:09-05	1
20150326104209551428d175c22	El Salvador ‏(‎+503)	10:42:09-05	1
20150326104209551428d175da2	Emiratos Árabes Unidos ‏(‎+971)	10:42:09-05	1
20150326104209551428d175ef0	Eritrea ‏(‎+291)	10:42:09-05	1
20150326104209551428d17604a	Eslovaquia ‏(‎+421)	10:42:09-05	1
20150326104209551428d1761e0	Eslovenia ‏(‎+386)	10:42:09-05	1
20150326104209551428d176399	España ‏(‎+34)	10:42:09-05	1
20150326104209551428d17650b	Estados Unidos ‏(‎+1)	10:42:09-05	1
20150326104209551428d176661	Estonia ‏(‎+372)	10:42:09-05	1
20150326104209551428d1767b6	Etiopía ‏(‎+251)	10:42:09-05	1
20150326104209551428d176906	Ex-República Yugoslava de Macedonia ‏(‎+389)	10:42:09-05	1
20150326104209551428d176a58	Filipinas ‏(‎+63)	10:42:09-05	1
20150326104209551428d176bab	Finlandia ‏(‎+358)	10:42:09-05	1
20150326104209551428d176cfe	Francia ‏(‎+33)	10:42:09-05	1
20150326104209551428d176e51	Gabón ‏(‎+241)	10:42:09-05	1
20150326104209551428d176f8d	Gambia ‏(‎+220)	10:42:09-05	1
20150326104209551428d1770d5	Georgia ‏(‎+995)	10:42:09-05	1
20150326104209551428d17721f	Ghana ‏(‎+233)	10:42:09-05	1
20150326104209551428d17737a	Gibraltar ‏(‎+350)	10:42:09-05	1
20150326104209551428d1774dd	Granada ‏(‎+1)	10:42:09-05	1
20150326104209551428d17762e	Grecia ‏(‎+30)	10:42:09-05	1
20150326104209551428d177bbd	Groenlandia ‏(‎+299)	10:42:09-05	1
20150326104209551428d177d3f	Guadalupe ‏(‎+590)	10:42:09-05	1
20150326104209551428d177e98	Guam ‏(‎+1)	10:42:09-05	1
20150326104209551428d178005	Guatemala ‏(‎+502)	10:42:09-05	1
20150326104209551428d17815e	Guayana Francesa ‏(‎+594)	10:42:09-05	1
20150326104209551428d1782a6	Guernsey ‏(‎+44)	10:42:09-05	1
20150326104209551428d178424	Guinea ‏(‎+224)	10:42:09-05	1
20150326104209551428d17856f	Guinea Ecuatorial ‏(‎+240)	10:42:09-05	1
20150326104209551428d1786ba	Guinea-Bissau ‏(‎+245)	10:42:09-05	1
20150326104209551428d17880d	Guyana ‏(‎+592)	10:42:09-05	1
20150326104209551428d178959	Haití ‏(‎+509)	10:42:09-05	1
20150326104209551428d178a76	Honduras ‏(‎+504)	10:42:09-05	1
20150326104209551428d178bc5	Hong Kong RAE ‏(‎+852)	10:42:09-05	1
20150326104209551428d178d3e	Hungría ‏(‎+36)	10:42:09-05	1
20150326104209551428d178ec5	India ‏(‎+91)	10:42:09-05	1
20150326104209551428d179026	Indonesia ‏(‎+62)	10:42:09-05	1
20150326104209551428d17917e	Irak ‏(‎+964)	10:42:09-05	1
20150326104209551428d1792c2	Irán ‏(‎+98)	10:42:09-05	1
20150326104209551428d179412	Irlanda ‏(‎+353)	10:42:09-05	1
20150326104209551428d17956f	Isla Ascensión ‏(‎+247)	10:42:09-05	1
20150326104209551428d1796ce	Isla Bouvet ‏(‎+47)	10:42:09-05	1
20150326104209551428d179837	Isla Christmas ‏(‎+61)	10:42:09-05	1
20150326104209551428d1799ca	Isla de Man ‏(‎+44)	10:42:09-05	1
20150326104209551428d179b42	Islandia ‏(‎+354)	10:42:09-05	1
20150326104209551428d179cd0	Islas Caimán ‏(‎+1)	10:42:09-05	1
20150326104209551428d179e2b	Islas Cocos ‏(‎+61)	10:42:09-05	1
20150326104209551428d179f87	Islas Cook ‏(‎+682)	10:42:09-05	1
20150326104209551428d17a113	Islas Feroe ‏(‎+298)	10:42:09-05	1
20150326104209551428d17a27e	Islas Fiji ‏(‎+679)	10:42:09-05	1
20150326104209551428d17a3dc	Islas Malvinas ‏(‎+500)	10:42:09-05	1
20150326104209551428d17a53a	Islas Marianas del Norte ‏(‎+1)	10:42:09-05	1
20150326104209551428d17a69a	Islas Marshall ‏(‎+692)	10:42:09-05	1
20150326104209551428d17a7ff	Islas menores alejadas de los Estados Unidos ‏(‎+1)	10:42:09-05	1
20150326104209551428d17a95b	Islas Salomón ‏(‎+677)	10:42:09-05	1
20150326104209551428d17aab7	Islas Turcas y Caicos ‏(‎+1)	10:42:09-05	1
20150326104209551428d17ac15	Islas Vírgenes Británicas ‏(‎+1)	10:42:09-05	1
20150326104209551428d17ad6f	Islas Vírgenes, EE.UU. ‏(‎+1)	10:42:09-05	1
20150326104209551428d17aec9	Israel ‏(‎+972)	10:42:09-05	1
20150326104209551428d17b025	Italia ‏(‎+39)	10:42:09-05	1
20150326104209551428d17b181	Jamaica ‏(‎+1)	10:42:09-05	1
20150326104209551428d17b2e0	Jan Mayen ‏(‎+47)	10:42:09-05	1
20150326104209551428d17b474	Japón ‏(‎+81)	10:42:09-05	1
20150326104209551428d17b645	Jersey ‏(‎+44)	10:42:09-05	1
20150326104209551428d17b7b0	Jordania ‏(‎+962)	10:42:09-05	1
20150326104209551428d17b90b	Kazajistán ‏(‎+7)	10:42:09-05	1
20150326104209551428d17ba66	Kenia ‏(‎+254)	10:42:09-05	1
20150326104209551428d17bbaf	Kirguistán ‏(‎+996)	10:42:09-05	1
20150326104209551428d17bd12	Kiribati ‏(‎+686)	10:42:09-05	1
20150326104209551428d17be89	Kuwait ‏(‎+965)	10:42:09-05	1
20150326104209551428d17c06b	Laos ‏(‎+856)	10:42:09-05	1
20150326104209551428d17c1d7	Las Bahamas ‏(‎+1)	10:42:09-05	1
20150326104209551428d17c336	Lesoto ‏(‎+266)	10:42:09-05	1
20150326104209551428d17c496	Letonia ‏(‎+371)	10:42:09-05	1
20150326104209551428d17c5f1	Líbano ‏(‎+961)	10:42:09-05	1
20150326104209551428d17c749	Liberia ‏(‎+231)	10:42:09-05	1
20150326104209551428d17c8c9	Libia ‏(‎+218)	10:42:09-05	1
20150326104209551428d17ca2b	Liechtenstein ‏(‎+423)	10:42:09-05	1
20150326104209551428d17cb87	Lituania ‏(‎+370)	10:42:09-05	1
20150326104209551428d17cce4	Luxemburgo ‏(‎+352)	10:42:09-05	1
20150326104209551428d17ce58	Macao RAE ‏(‎+853)	10:42:09-05	1
20150326104209551428d17cfb7	Madagascar ‏(‎+261)	10:42:09-05	1
20150326104209551428d17d110	Malasia ‏(‎+60)	10:42:09-05	1
20150326104209551428d17d268	Malawi ‏(‎+265)	10:42:09-05	1
20150326104209551428d17d3bf	Maldivas ‏(‎+960)	10:42:09-05	1
20150326104209551428d17d516	Malí ‏(‎+223)	10:42:09-05	1
20150326104209551428d17d675	Malta ‏(‎+356)	10:42:09-05	1
20150326104209551428d17d845	Marruecos ‏(‎+212)	10:42:09-05	1
20150326104209551428d17d9f7	Martinica ‏(‎+596)	10:42:09-05	1
20150326104209551428d17dba3	Mauricio ‏(‎+230)	10:42:09-05	1
20150326104209551428d17dd3e	Mauritania ‏(‎+222)	10:42:09-05	1
20150326104209551428d17deff	Mayotte ‏(‎+262)	10:42:09-05	1
20150326104209551428d17e0a9	México ‏(‎+52)	10:42:09-05	1
20150326104209551428d17e228	Micronesia ‏(‎+691)	10:42:09-05	1
20150326104209551428d17e37d	Moldova ‏(‎+373)	10:42:09-05	1
20150326104209551428d17e4df	Mónaco ‏(‎+377)	10:42:09-05	1
20150326104209551428d17e638	Mongolia ‏(‎+976)	10:42:09-05	1
20150326104209551428d17e7a4	Montenegro ‏(‎+382)	10:42:09-05	1
20150326104209551428d17e902	Montserrat ‏(‎+1)	10:42:09-05	1
20150326104209551428d17eaab	Mozambique ‏(‎+258)	10:42:09-05	1
20150326104209551428d17ec13	Myanmar ‏(‎+95)	10:42:09-05	1
20150326104209551428d17ed6f	Namibia ‏(‎+264)	10:42:09-05	1
20150326104209551428d17eeca	Nauru ‏(‎+674)	10:42:09-05	1
20150326104209551428d17f083	Nepal ‏(‎+977)	10:42:09-05	1
20150326104209551428d17f1ec	Nicaragua ‏(‎+505)	10:42:09-05	1
20150326104209551428d17f345	Níger ‏(‎+227)	10:42:09-05	1
20150326104209551428d17f4c0	Nigeria ‏(‎+234)	10:42:09-05	1
20150326104209551428d17f684	Niue ‏(‎+683)	10:42:09-05	1
20150326104209551428d17f92e	Noruega ‏(‎+47)	10:42:09-05	1
20150326104209551428d17fc24	Nueva Caledonia ‏(‎+687)	10:42:09-05	1
20150326104209551428d17fe7e	Nueva Zelanda ‏(‎+64)	10:42:09-05	1
20150326104209551428d18000d	Omán ‏(‎+968)	10:42:09-05	1
20150326104209551428d18018a	Países Bajos ‏(‎+31)	10:42:09-05	1
20150326104209551428d18032d	Pakistán ‏(‎+92)	10:42:09-05	1
20150326104209551428d1804aa	Palaos ‏(‎+680)	10:42:09-05	1
20150326104209551428d180644	Panamá ‏(‎+507)	10:42:09-05	1
20150326104209551428d1807de	Papúa Nueva Guinea ‏(‎+675)	10:42:09-05	1
20150326104209551428d1809a1	Paraguay ‏(‎+595)	10:42:09-05	1
20150326104209551428d180b1b	Perú ‏(‎+51)	10:42:09-05	1
20150326104209551428d180cbe	Polinesia Francesa ‏(‎+689)	10:42:09-05	1
20150326104209551428d180e39	Polonia ‏(‎+48)	10:42:09-05	1
20150326104209551428d181062	Portugal ‏(‎+351)	10:42:09-05	1
20150326104209551428d1812a3	Qatar ‏(‎+974)	10:42:09-05	1
20150326104209551428d181524	Reino de Baréin ‏(‎+973)	10:42:09-05	1
20150326104209551428d1816f7	Reino Unido ‏(‎+44)	10:42:09-05	1
20150326104209551428d1818c1	República Centroafricana ‏(‎+236)	10:42:09-05	1
20150326104209551428d181aaa	República Checa ‏(‎+420)	10:42:09-05	1
20150326104209551428d191dcc	República del Congo ‏(‎+242)	10:42:09-05	1
20150326104209551428d19216c	República Dominicana ‏(‎+1)	10:42:09-05	1
20150326104209551428d1923b6	Reunión ‏(‎+262)	10:42:09-05	1
20150326104209551428d192ec7	Ruanda ‏(‎+250)	10:42:09-05	1
20150326104209551428d193476	Rumania ‏(‎+40)	10:42:09-05	1
20150326104209551428d1936dd	Rusia ‏(‎+7)	10:42:09-05	1
20150326104209551428d193923	Saint Kitts y Nevis ‏(‎+1)	10:42:09-05	1
20150326104209551428d193b62	Samoa ‏(‎+685)	10:42:09-05	1
20150326104209551428d193e5a	San Marino ‏(‎+378)	10:42:09-05	1
20150326104209551428d1940a8	San Pedro y Miquelón ‏(‎+508)	10:42:09-05	1
20150326104209551428d194345	San Vicente y las Granadinas ‏(‎+1)	10:42:09-05	1
20150326104209551428d19459e	Santa Elena, Ascensión y Tristán de Acuña ‏(‎+290)	10:42:09-05	1
20150326104209551428d1947e9	Santa Lucía ‏(‎+1)	10:42:09-05	1
20150326104209551428d194a2f	Santa Sede (Ciudad del Vaticano) ‏(‎+379)	10:42:09-05	1
20150326104209551428d194c80	Santo Tomé y Príncipe ‏(‎+239)	10:42:09-05	1
20150326104209551428d194f10	Senegal ‏(‎+221)	10:42:09-05	1
20150326104209551428d195180	Serbia ‏(‎+381)	10:42:09-05	1
20150326104209551428d1953d0	Seychelles ‏(‎+248)	10:42:09-05	1
20150326104209551428d195601	Sierra Leona ‏(‎+232)	10:42:09-05	1
20150326104209551428d19584d	Singapur ‏(‎+65)	10:42:09-05	1
20150326104209551428d195a66	Siria ‏(‎+963)	10:42:09-05	1
20150326104209551428d195cd1	Somalia ‏(‎+252)	10:42:09-05	1
20150326104209551428d195eeb	Sri Lanka ‏(‎+94)	10:42:09-05	1
20150326104209551428d196102	Suazilandia ‏(‎+268)	10:42:09-05	1
20150326104209551428d196311	Sudáfrica ‏(‎+27)	10:42:09-05	1
20150326104209551428d196521	Sudán ‏(‎+249)	10:42:09-05	1
20150326104209551428d196735	Suecia ‏(‎+46)	10:42:09-05	1
20150326104209551428d19693f	Suiza ‏(‎+41)	10:42:09-05	1
20150326104209551428d196b2c	Surinam ‏(‎+597)	10:42:09-05	1
20150326104209551428d196d10	Tailandia ‏(‎+66)	10:42:09-05	1
20150326104209551428d196f12	Taiwán ‏(‎+886)	10:42:09-05	1
20150326104209551428d197103	Tanzania ‏(‎+255)	10:42:09-05	1
20150326104209551428d1972f1	Tayikistán ‏(‎+992)	10:42:09-05	1
20150326104209551428d1974e2	Territorio Británico del Océano Índico ‏(‎+44)	10:42:09-05	1
20150326104209551428d1976ab	Timor-Leste ‏(‎+670)	10:42:09-05	1
20150326104209551428d19787c	Togo ‏(‎+228)	10:42:09-05	1
20150326104209551428d197a8c	Tokelau ‏(‎+690)	10:42:09-05	1
20150326104209551428d197c5a	Tonga ‏(‎+676)	10:42:09-05	1
20150326104209551428d197e1e	Trinidad y Tobago ‏(‎+1)	10:42:09-05	1
20150326104209551428d197fde	Tristán da Cunha ‏(‎+290)	10:42:09-05	1
20150326104209551428d1981ae	Túnez ‏(‎+216)	10:42:09-05	1
20150326104209551428d19837a	Turkmenistán ‏(‎+993)	10:42:09-05	1
20150326104209551428d198545	Turquía ‏(‎+90)	10:42:09-05	1
20150326104209551428d19872a	Tuvalu ‏(‎+688)	10:42:09-05	1
20150326104209551428d198903	Ucrania ‏(‎+380)	10:42:09-05	1
20150326104209551428d198ac4	Uganda ‏(‎+256)	10:42:09-05	1
20150326104209551428d198c82	Uruguay ‏(‎+598)	10:42:09-05	1
20150326104209551428d198ea9	Uzbekistán ‏(‎+998)	10:42:09-05	1
20150326104209551428d199082	Vanuatu ‏(‎+678)	10:42:09-05	1
20150326104209551428d199249	Venezuela ‏(‎+58)	10:42:09-05	1
20150326104209551428d199431	Vietnam ‏(‎+84)	10:42:09-05	1
20150326104209551428d19961e	Wallis y Futuna ‏(‎+681)	10:42:09-05	1
20150326104209551428d199846	Yemen ‏(‎+967)	10:42:09-05	1
20150326104209551428d199a57	Yibuti ‏(‎+253)	10:42:09-05	1
20150326104209551428d199c2d	Zambia ‏(‎+260)	10:42:09-05	1
20150326104209551428d199df2	Zimbabue ‏(‎+263)	10:42:09-05	1
\.


--
-- TOC entry 2077 (class 0 OID 17523)
-- Dependencies: 170 2105
-- Data for Name: provincia; Type: TABLE DATA; Schema: localizacion; Owner: nextbook
--

COPY provincia (id, id_pais, nom_provincia, fecha, stado) FROM stdin;
20150326115500551439e48586a	20150326104209551428d175961	Azuay	11:55:00-05	1
20150326115500551439e48dac4	20150326104209551428d175961	Bolivar	11:55:00-05	1
20150326115500551439e48dd2d	20150326104209551428d175961	Cañar	11:55:00-05	1
20150326115500551439e48df24	20150326104209551428d175961	Carchi	11:55:00-05	1
20150326115500551439e48e114	20150326104209551428d175961	Chimborazo	11:55:00-05	1
20150326115500551439e48e30a	20150326104209551428d175961	Cotopaxi	11:55:00-05	1
20150326115500551439e48e503	20150326104209551428d175961	El Oro	11:55:00-05	1
20150326115500551439e48e716	20150326104209551428d175961	Esmeraldas	11:55:00-05	1
20150326115500551439e48e8dd	20150326104209551428d175961	Galápagos	11:55:00-05	1
20150326115500551439e48eaa8	20150326104209551428d175961	Guayas	11:55:00-05	1
20150326115500551439e48ec62	20150326104209551428d175961	Imbabura	11:55:00-05	1
20150326115500551439e48ee16	20150326104209551428d175961	Loja	11:55:00-05	1
20150326115500551439e48ef9b	20150326104209551428d175961	Los Rios	11:55:00-05	1
20150326115500551439e48f0fa	20150326104209551428d175961	Manabí	11:55:00-05	1
20150326115500551439e48f290	20150326104209551428d175961	Morona Santiago	11:55:00-05	1
20150326115500551439e48f43d	20150326104209551428d175961	Napo	11:55:00-05	1
20150326115500551439e48f5b8	20150326104209551428d175961	Orellana	11:55:00-05	1
20150326115500551439e48f72a	20150326104209551428d175961	Pastaza	11:55:00-05	1
20150326115500551439e48f899	20150326104209551428d175961	Pichincha	11:55:00-05	1
20150326115500551439e48fa09	20150326104209551428d175961	Santa Elena	11:55:00-05	1
20150326115500551439e48fb5f	20150326104209551428d175961	Santo Domingo de los Tsáchilas	11:55:00-05	1
20150326115500551439e48fcc6	20150326104209551428d175961	Sucumbíos	11:55:00-05	1
20150326115500551439e48fe2f	20150326104209551428d175961	Tungurahua	11:55:00-05	1
20150326115500551439e48ff9d	20150326104209551428d175961	Zamora Chinchipe	11:55:00-05	1
\.


SET search_path = notificaciones, pg_catalog;

--
-- TOC entry 2104 (class 0 OID 18853)
-- Dependencies: 197 2105
-- Data for Name: facturanext; Type: TABLE DATA; Schema: notificaciones; Owner: postgres
--

COPY facturanext (id, id_empresa, subject, de, para, date, message_id, size, uid, visto, stado, fecha) FROM stdin;
\.


SET search_path = public, pg_catalog;

--
-- TOC entry 2090 (class 0 OID 18307)
-- Dependencies: 183 2105
-- Data for Name: colaboradores_areas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY colaboradores_areas (id, id_sucursales_misucursal, data, stado, fecha) FROM stdin;
2016031209010656e42122b5293	2016031109352356e2d7ab3e3a2	suscriptor	1	2016-03-12 09:01:06-05
2016031209031856e421a6bb29c	2016031109352356e2d7ab3e3a2	suscriptor	1	2016-03-12 09:03:18-05
2016031209033556e421b746cfd	2016031109352356e2d7ab3e3a2	suscriptor	1	2016-03-12 09:03:35-05
2016031209035856e421ce2d4f4	2016031109352356e2d7ab3e3a2	suscriptor	1	2016-03-12 09:03:58-05
2016031209050156e4220d0badd	2016031109352356e2d7ab3e3a2	suscriptor	1	2016-03-12 09:05:01-05
2016031211342356e4450fb8b66	2016031109352356e2d7ab3d47a	suscriptor	1	2016-03-12 11:34:23-05
2016031211350456e44538389cd	2016031109352356e2d7ab3d47a	suscriptor	1	2016-03-12 11:35:04-05
2016031211402956e4467d43deb	2016031109352356e2d7ab3b6df	suscriptor	1	2016-03-12 11:40:29-05
2016031211441756e44761d2331	2016031109352356e2d7ab3d47a	suscriptor	1	2016-03-12 11:44:17-05
2016031211443656e44774b0ce8	2016031109352356e2d7ab3d47a	suscriptor	1	2016-03-12 11:44:36-05
2016031211454756e447bbbbb77	2016031109352356e2d7ab3d47a	suscriptor	1	2016-03-12 11:45:47-05
2016031211461056e447d2d61de	2016031109352356e2d7ab3d47a	suscriptor	1	2016-03-12 11:46:10-05
2016031211464456e447f4e5649	2016031109352356e2d7ab3d47a	suscriptor	1	2016-03-12 11:46:44-05
2016031212074756e44ce3f175a	2016031109352356e2d7ab3d91e	suscriptor	1	2016-03-12 12:07:47-05
2016031212330456e452d0a2e25	2016031109352356e2d7ab3d91e	GERENCIA	1	2016-03-12 12:33:04-05
\.


--
-- TOC entry 2091 (class 0 OID 18335)
-- Dependencies: 184 2105
-- Data for Name: colaboradores_cargo; Type: TABLE DATA; Schema: public; Owner: nextbook
--

COPY colaboradores_cargo (id, id_sucursales_misucursal, data, stado, fecha) FROM stdin;
2016031209010656e42122b5280	2016031109352356e2d7ab3e3a2	administrativo	1	2016-03-12 09:01:06-05
2016031209031856e421a6bb28a	2016031109352356e2d7ab3e3a2	administrativo	1	2016-03-12 09:03:18-05
2016031209033556e421b746cea	2016031109352356e2d7ab3e3a2	administrativo	1	2016-03-12 09:03:35-05
2016031209035856e421ce2d4e3	2016031109352356e2d7ab3e3a2	administrativo	1	2016-03-12 09:03:58-05
2016031209050156e4220d0bad1	2016031109352356e2d7ab3e3a2	administrativo	1	2016-03-12 09:05:01-05
2016031211342356e4450fb8b53	2016031109352356e2d7ab3d47a	administrativo	1	2016-03-12 11:34:23-05
2016031211350456e44538389bb	2016031109352356e2d7ab3d47a	administrativo	1	2016-03-12 11:35:04-05
2016031211402956e4467d43dda	2016031109352356e2d7ab3b6df	administrativo	1	2016-03-12 11:40:29-05
2016031211441756e44761d2320	2016031109352356e2d7ab3d47a	administrativo	1	2016-03-12 11:44:17-05
2016031211443656e44774b0cde	2016031109352356e2d7ab3d47a	administrativo	1	2016-03-12 11:44:36-05
2016031211454756e447bbbbb6c	2016031109352356e2d7ab3d47a	administrativo	1	2016-03-12 11:45:47-05
2016031211461056e447d2d61cc	2016031109352356e2d7ab3d47a	administrativo	1	2016-03-12 11:46:10-05
2016031211464456e447f4e5636	2016031109352356e2d7ab3d47a	administrativo	1	2016-03-12 11:46:44-05
2016031212074756e44ce3f174f	2016031109352356e2d7ab3d91e	administrativo	1	2016-03-12 12:07:47-05
2016031212333856e452f23f943	2016031109352356e2d7ab3d91e	ASSISTENTE TECNOLOGÍA	1	2016-03-12 12:33:38-05
\.


--
-- TOC entry 2092 (class 0 OID 18363)
-- Dependencies: 185 2105
-- Data for Name: colaboradores_perfil; Type: TABLE DATA; Schema: public; Owner: nextbook
--

COPY colaboradores_perfil (id, id_sucursal_empresa, id_colaboradores_cargo, id_colaboradores_area, nombre, correo, edad, telefono, direccion, stado, fecha) FROM stdin;
2016030419022256da220edce18	2016030418580056da210814727	2016030419022256da220ed527d	2016030419022256da220ed528f	{"nombre":"David","apellido":"Gonzales"}	oskr.trov@gmail.com	2016-03-04 19:02:22-05			1	2016-03-04 19:02:22-05
\.


--
-- TOC entry 2078 (class 0 OID 17541)
-- Dependencies: 171 2105
-- Data for Name: empresa_categoria; Type: TABLE DATA; Schema: public; Owner: nextbook
--

COPY empresa_categoria (id, id_empresa_categoria, tipo, stado, fecha) FROM stdin;
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
-- TOC entry 2079 (class 0 OID 17553)
-- Dependencies: 172 2105
-- Data for Name: empresa_tipo; Type: TABLE DATA; Schema: public; Owner: nextbook
--

COPY empresa_tipo (id, categoria, stado, fecha) FROM stdin;
1	ARTESANAL	1	\N
2	COMERCIAL	1	\N
4	DE SERVICIOS	1	\N
3	INDUSTRIAL	1	\N
\.


--
-- TOC entry 2080 (class 0 OID 17559)
-- Dependencies: 173 2105
-- Data for Name: sucursal_img_perfil_empresa; Type: TABLE DATA; Schema: public; Owner: nextbook
--

COPY sucursal_img_perfil_empresa (id, id_sucursal_empresa, img, tipo, stado, fecha) FROM stdin;
\.


--
-- TOC entry 2081 (class 0 OID 17565)
-- Dependencies: 174 2105
-- Data for Name: sucursal_info_empresa; Type: TABLE DATA; Schema: public; Owner: nextbook
--

COPY sucursal_info_empresa (id, id_sucursal_empresa, data, tipo, stado, fecha) FROM stdin;
\.


--
-- TOC entry 2082 (class 0 OID 17577)
-- Dependencies: 175 2105
-- Data for Name: sucursal_perfil_empresa; Type: TABLE DATA; Schema: public; Owner: nextbook
--

COPY sucursal_perfil_empresa (id, id_empresa_sucursal, nombre_empresa_sucursal, id_tipo, id_categoria, descripcion, stado, fecha) FROM stdin;
2016030810171656deecfcf2604	2016030418580056da2108145d6		2	15	sdfsdf	1	2016-03-08 10:17:16-05
\.


--
-- TOC entry 2083 (class 0 OID 17583)
-- Dependencies: 176 2105
-- Data for Name: sucursales_empresa; Type: TABLE DATA; Schema: public; Owner: nextbook
--

COPY sucursales_empresa (id, id_empresa, codigo, nombre_empresa_sucursal, direccion, stado_sucursal, stado, fecha) FROM stdin;
2016030418580056da210812d74	2016030418555856da208e8e340	001	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA 20-120 Y TARQUINO PAEZ	Abierto	0	2016-03-04 18:57:59-05
2016030418580056da210813d07	2016030418555856da208e8e340	002	COMERCIAL HIDROBO	PICHINCHA / QUITO / AV AMAZONAS 6134 Y AV EL INCA	Cerrado	0	2016-03-04 18:57:59-05
2016030418580056da210813ef1	2016030418555856da208e8e340	003	COMERCIAL HIDROBO	PICHINCHA / QUITO / AV. 10 DE AGOSTO 61-62 Y BUSTAMANTE	Cerrado	0	2016-03-04 18:57:59-05
2016030418580056da21081405b	2016030418555856da208e8e340	004	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA 18-49 Y ELEODORO AYALA	Abierto	0	2016-03-04 18:57:59-05
2016030418580056da2108141dc	2016030418555856da208e8e340	005	COMERCIAL HIDROBO	CARCHI / TULCAN / AV. VENTIMILLA Y SEMINARIO	Abierto	0	2016-03-04 18:57:59-05
2016030418580056da210814328	2016030418555856da208e8e340	006	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA Y ESTHER CEVALLOS	Abierto	0	2016-03-04 18:57:59-05
2016030418580056da21081447e	2016030418555856da208e8e340	007	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA 30-21 Y MANUELA SAENZ	Abierto	0	2016-03-04 18:57:59-05
2016030418580056da210814727	2016030418555856da208e8e340	009	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA Y AV. FRAY VACAS GALINDO	Abierto	1	2016-03-04 18:57:59-05
2016030418580056da2108145d6	2016030418555856da208e8e340	008	COMERCIAL HIDROBO	PICHINCHA / CAYAMBE / KM 1 PANAMERICANA NORTE	Abierto	1	2016-03-04 18:57:59-05
\.


SET search_path = seg, pg_catalog;

--
-- TOC entry 2084 (class 0 OID 17589)
-- Dependencies: 177 2105
-- Data for Name: acceso_colaboradores; Type: TABLE DATA; Schema: seg; Owner: nextbook
--

COPY acceso_colaboradores (id, id_colaboradores_perfil, login, pass, stado, fecha) FROM stdin;
2016030414135556d9de7318724	2016030414135556d9de731871b	deividscriollo@gmail.com	or0s8q3PGR	0	2016-03-04 14:13:55-05
2016030414194656d9dfd295e25	2016030414194656d9dfd295e1a	deividscriollo@gmail.com	8kNrFo2pn7	0	2016-03-04 14:19:46-05
2016030414204256d9e00a0c038	2016030414204256d9e00a0c024	deividscriollo@gmail.com	lpfwBpZ1Hq	0	2016-03-04 14:20:42-05
2016030414594256d9e92e4d375	2016030414594256d9e92e4d345	deividscriollo@gmail.com	eK1S88Gk5	0	2016-03-04 14:59:42-05
2016030418352156da1bb907b96	2016030418352156da1bb907b7d	deividscriollo@gmail.com	8ocpfeqrQO	0	2016-03-04 18:35:21-05
\.


--
-- TOC entry 2085 (class 0 OID 17595)
-- Dependencies: 178 2105
-- Data for Name: accesos; Type: TABLE DATA; Schema: seg; Owner: nextbook
--

COPY accesos (id, id_empresa, login, pass, pass_origin, stado, fecha) FROM stdin;
2016030418575956da210706b4b	2016030418555856da208e8e340	1090084247001@facturanext.com	8010a512867849768fe8614c437294cd	HJF;SDSAK	CAMBIO	2016-03-04 18:57:59-05
\.


--
-- TOC entry 2086 (class 0 OID 17601)
-- Dependencies: 179 2105
-- Data for Name: empresa; Type: TABLE DATA; Schema: seg; Owner: nextbook
--

COPY empresa (id, razon_social, representante_legal, cedula_ruc_representante, nom_comercial, telefono1, telefono2, telmovil, paginaweb, correo, ruc, estado_contri, clase_contri, tipo_contri, obligado_conta, actividad_economica, fecha_inicio_actividad, fecha_cese_actividad, fecha_reinicio_actividad, fecha_actualizacion, stado, fecha) FROM stdin;
2016030418555856da208e8e340	1070084247001	HIDROBO ESTRADA ANGEL PATRICIO	1001214020	COMERCIAL HIDROBO			0989475676		oskr.trov@gmail.com	1070084247001	Activo	Especial	Sociedad	SI	VENTA AL POR MENOR DE AUTOMOVILES Y VEHICULOS PARA TODO TERRENO	05-04-1988	&nbsp;	&nbsp;	17-12-2014	1	2016-03-04 18:55:58-05
\.


--
-- TOC entry 2087 (class 0 OID 17607)
-- Dependencies: 180 2105
-- Data for Name: fecha_ingresos; Type: TABLE DATA; Schema: seg; Owner: nextbook
--

COPY fecha_ingresos (id, id_usuario, fecha_ingreso, fecha_limite, stado, tipo_tabla) FROM stdin;
2016030418555856da208e96e27	2016030418555856da208e8e340	2016-03-08 16:14:20-05	2016-03-08 16:16:20-05	0	Usuario offline
2016022509124656cf0bde9cc8b	2016022509124656cf0bde97bac	2016-03-04 17:23:48-05	2016-03-04 17:25:48-05	1	Usuario activo
2016030415395156d9f2973b1d8	2016030415395156d9f29730f30	2016-03-04 15:39:51-05	2016-03-04 15:40:51-05	0	Creacion de la empresa
2016030415475556d9f47bea0e8	2016030415475556d9f47be52a0	2016-03-04 21:58:58-05	2016-03-04 22:00:58-05	1	Usuario activo
2016020509595456b4b8ea37f28	2016020509595456b4b8ea30891	2016-02-11 21:10:04-05	2016-02-11 21:12:04-05	1	Usuario activo
2016021116161456bcfa1e257e5	2016021116161456bcfa1e19ec4	2016-02-11 16:16:14-05	2016-02-11 16:17:14-05	0	Creacion de la empresa
2016021116472556bd016de6c93	2016021116472556bd016de4720	2016-02-11 16:47:25-05	2016-02-11 16:48:25-05	0	Creacion de la empresa
2016021116505756bd024130c85	2016021116505756bd02412abe5	2016-02-11 22:54:10-05	2016-02-11 22:56:10-05	1	Usuario activo
2016030416224956d9fca95cb5e	2016030416224956d9fca95421f	2016-03-05 00:33:20-05	2016-03-05 00:35:20-05	1	Usuario activo
2016030418374156da1c4573495	2016030418374156da1c4572976	2016-03-05 00:40:26-05	2016-03-05 00:42:26-05	1	Usuario activo
2016021209105556bde7efc3ffe	2016021209105556bde7efb8152	2016-02-12 23:46:41-05	2016-02-12 23:48:41-05	1	Usuario activo
2016022508403156cf044fc1004	2016022508403156cf044fb2ce6	2016-02-25 08:40:31-05	2016-02-25 08:41:31-05	0	Creacion de la empresa
\.


--
-- TOC entry 2088 (class 0 OID 17613)
-- Dependencies: 181 2105
-- Data for Name: perfil_personal; Type: TABLE DATA; Schema: seg; Owner: nextbook
--

COPY perfil_personal (id, id_empresa, foto, alias, stado, fecha) FROM stdin;
\.


--
-- TOC entry 2089 (class 0 OID 17619)
-- Dependencies: 182 2105
-- Data for Name: personal; Type: TABLE DATA; Schema: seg; Owner: nextbook
--

COPY personal (id, id_cuenta, nombre, correo, genero, img, red_social, stado, fecha) FROM stdin;
\.


SET search_path = sucursales, pg_catalog;

--
-- TOC entry 2102 (class 0 OID 18792)
-- Dependencies: 195 2105
-- Data for Name: misucursal; Type: TABLE DATA; Schema: sucursales; Owner: postgres
--

COPY misucursal (id, id_empresa_miempresa, codigo, nombre_sucursal, direccion, estado_sri, stado, fecha) FROM stdin;
2016031109352356e2d7ab3b6df	2016031012031756e1a8d52a165	001	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA 20-120 Y TARQUINO PAEZ	Abierto	1	2016-03-11 09:35:22-05
2016031109352356e2d7ab3d91e	2016031012031756e1a8d52a165	006	COMERCIAL HIDROBO TOYOTA	IMBABURA / IBARRA / AV. MARIANO ACOSTA Y ESTHER CEVALLOS	Abierto	1	2016-03-11 09:35:22-05
2016031109352356e2d7ab3e3a2	2016031012031756e1a8d52a165	008	COMERCIAL HIDROBO CAYAMBE	PICHINCHA / CAYAMBE / KM 1 PANAMERICANA NORTE	Abierto	1	2016-03-11 09:35:22-05
2016031109352356e2d7ab3d47a	2016031012031756e1a8d52a165	005	COMERCIAL HIDROBO	CARCHI / TULCAN / AV. VENTIMILLA Y SEMINARIO	Abierto	1	2016-03-11 09:35:22-05
2016031109352356e2d7ab3c766	2016031012031756e1a8d52a165	002	COMERCIAL HIDROBO	PICHINCHA / QUITO / AV AMAZONAS 6134 Y AV EL INCA	Cerrado	0	2016-03-11 09:35:22-05
2016031109352356e2d7ab3cbe6	2016031012031756e1a8d52a165	003	COMERCIAL HIDROBO	PICHINCHA / QUITO / AV. 10 DE AGOSTO 61-62 Y BUSTAMANTE	Cerrado	0	2016-03-11 09:35:22-05
2016031109352356e2d7ab3d03b	2016031012031756e1a8d52a165	004	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA 18-49 Y ELEODORO AYALA	Abierto	0	2016-03-11 09:35:22-05
2016031109352356e2d7ab3de83	2016031012031756e1a8d52a165	007	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA 30-21 Y MANUELA SAENZ	Abierto	0	2016-03-11 09:35:22-05
2016031109352356e2d7ab3e910	2016031012031756e1a8d52a165	009	COMERCIAL HIDROBO	IMBABURA / IBARRA / AV. MARIANO ACOSTA Y AV. FRAY VACAS GALINDO	Abierto	0	2016-03-11 09:35:22-05
\.


SET search_path = acceso, pg_catalog;

--
-- TOC entry 1952 (class 2606 OID 18822)
-- Dependencies: 196 196 2106
-- Name: corporativo_pkey; Type: CONSTRAINT; Schema: acceso; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY corporativo
    ADD CONSTRAINT corporativo_pkey PRIMARY KEY (id);


SET search_path = empresa, pg_catalog;

--
-- TOC entry 1946 (class 2606 OID 18700)
-- Dependencies: 193 193 2106
-- Name: corporativo_pkey; Type: CONSTRAINT; Schema: empresa; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY corporativo
    ADD CONSTRAINT corporativo_pkey PRIMARY KEY (id);


--
-- TOC entry 1948 (class 2606 OID 18708)
-- Dependencies: 194 194 2106
-- Name: miempresa_pkey; Type: CONSTRAINT; Schema: empresa; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY miempresa
    ADD CONSTRAINT miempresa_pkey PRIMARY KEY (id);


SET search_path = facturanext, pg_catalog;

--
-- TOC entry 1934 (class 2606 OID 18458)
-- Dependencies: 186 186 2106
-- Name: adjuntos_pkey; Type: CONSTRAINT; Schema: facturanext; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY adjuntos
    ADD CONSTRAINT adjuntos_pkey PRIMARY KEY (id);


--
-- TOC entry 1936 (class 2606 OID 18460)
-- Dependencies: 187 187 2106
-- Name: correo_pkey; Type: CONSTRAINT; Schema: facturanext; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY correo
    ADD CONSTRAINT correo_pkey PRIMARY KEY (id);


--
-- TOC entry 1938 (class 2606 OID 18462)
-- Dependencies: 188 188 2106
-- Name: detalles_fisicas_pkey; Type: CONSTRAINT; Schema: facturanext; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY detalles_fisicas
    ADD CONSTRAINT detalles_fisicas_pkey PRIMARY KEY (id);


--
-- TOC entry 1942 (class 2606 OID 18464)
-- Dependencies: 190 190 2106
-- Name: facturas_fisica_pkey; Type: CONSTRAINT; Schema: facturanext; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY facturas_fisica
    ADD CONSTRAINT facturas_fisica_pkey PRIMARY KEY (id);


--
-- TOC entry 1940 (class 2606 OID 18466)
-- Dependencies: 189 189 2106
-- Name: facturas_pkey; Type: CONSTRAINT; Schema: facturanext; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY facturas
    ADD CONSTRAINT facturas_pkey PRIMARY KEY (id);


--
-- TOC entry 1944 (class 2606 OID 18468)
-- Dependencies: 192 192 2106
-- Name: proveedores_pkey; Type: CONSTRAINT; Schema: facturanext; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY proveedores
    ADD CONSTRAINT proveedores_pkey PRIMARY KEY (id);


SET search_path = localizacion, pg_catalog;

--
-- TOC entry 1896 (class 2606 OID 17638)
-- Dependencies: 168 168 2106
-- Name: ciudad_pkey; Type: CONSTRAINT; Schema: localizacion; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY ciudad
    ADD CONSTRAINT ciudad_pkey PRIMARY KEY (id);


--
-- TOC entry 1898 (class 2606 OID 17640)
-- Dependencies: 169 169 2106
-- Name: pais_pkey; Type: CONSTRAINT; Schema: localizacion; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY pais
    ADD CONSTRAINT pais_pkey PRIMARY KEY (id);


--
-- TOC entry 1900 (class 2606 OID 17642)
-- Dependencies: 170 170 2106
-- Name: provincia_pkey; Type: CONSTRAINT; Schema: localizacion; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY provincia
    ADD CONSTRAINT provincia_pkey PRIMARY KEY (id);


SET search_path = notificaciones, pg_catalog;

--
-- TOC entry 1954 (class 2606 OID 18860)
-- Dependencies: 197 197 2106
-- Name: facturanext_pkey; Type: CONSTRAINT; Schema: notificaciones; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY facturanext
    ADD CONSTRAINT facturanext_pkey PRIMARY KEY (id);


SET search_path = public, pg_catalog;

--
-- TOC entry 1930 (class 2606 OID 18342)
-- Dependencies: 184 184 2106
-- Name: cargo_colaboradores_pkey; Type: CONSTRAINT; Schema: public; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY colaboradores_cargo
    ADD CONSTRAINT cargo_colaboradores_pkey PRIMARY KEY (id);


--
-- TOC entry 1928 (class 2606 OID 18314)
-- Dependencies: 183 183 2106
-- Name: colaboradores_areas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY colaboradores_areas
    ADD CONSTRAINT colaboradores_areas_pkey PRIMARY KEY (id);


--
-- TOC entry 1904 (class 2606 OID 17648)
-- Dependencies: 172 172 2106
-- Name: empresa_categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY empresa_tipo
    ADD CONSTRAINT empresa_categoria_pkey PRIMARY KEY (id);


--
-- TOC entry 1902 (class 2606 OID 17652)
-- Dependencies: 171 171 2106
-- Name: empresa_tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY empresa_categoria
    ADD CONSTRAINT empresa_tipo_pkey PRIMARY KEY (id);


--
-- TOC entry 1906 (class 2606 OID 17654)
-- Dependencies: 173 173 2106
-- Name: img_perfil_empresa_pkey; Type: CONSTRAINT; Schema: public; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY sucursal_img_perfil_empresa
    ADD CONSTRAINT img_perfil_empresa_pkey PRIMARY KEY (id);


--
-- TOC entry 1908 (class 2606 OID 17656)
-- Dependencies: 174 174 2106
-- Name: info_sucursal_empresa_pkey; Type: CONSTRAINT; Schema: public; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY sucursal_info_empresa
    ADD CONSTRAINT info_sucursal_empresa_pkey PRIMARY KEY (id);


--
-- TOC entry 1932 (class 2606 OID 18370)
-- Dependencies: 185 185 2106
-- Name: perfil_colaboradores_pkey; Type: CONSTRAINT; Schema: public; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY colaboradores_perfil
    ADD CONSTRAINT perfil_colaboradores_pkey PRIMARY KEY (id);


--
-- TOC entry 1910 (class 2606 OID 17660)
-- Dependencies: 175 175 2106
-- Name: perfil_empresa_pkey; Type: CONSTRAINT; Schema: public; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY sucursal_perfil_empresa
    ADD CONSTRAINT perfil_empresa_pkey PRIMARY KEY (id);


--
-- TOC entry 1912 (class 2606 OID 17662)
-- Dependencies: 176 176 2106
-- Name: sucursales_empresa_pkey; Type: CONSTRAINT; Schema: public; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY sucursales_empresa
    ADD CONSTRAINT sucursales_empresa_pkey PRIMARY KEY (id);


SET search_path = seg, pg_catalog;

--
-- TOC entry 1914 (class 2606 OID 17664)
-- Dependencies: 177 177 2106
-- Name: acceso_colaboradores_pkey; Type: CONSTRAINT; Schema: seg; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY acceso_colaboradores
    ADD CONSTRAINT acceso_colaboradores_pkey PRIMARY KEY (id);


--
-- TOC entry 1916 (class 2606 OID 17666)
-- Dependencies: 178 178 2106
-- Name: accesos_pkey; Type: CONSTRAINT; Schema: seg; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY accesos
    ADD CONSTRAINT accesos_pkey PRIMARY KEY (id);


--
-- TOC entry 1918 (class 2606 OID 17668)
-- Dependencies: 179 179 2106
-- Name: empresa_pkey; Type: CONSTRAINT; Schema: seg; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY empresa
    ADD CONSTRAINT empresa_pkey PRIMARY KEY (id);


--
-- TOC entry 1920 (class 2606 OID 17670)
-- Dependencies: 179 179 2106
-- Name: empresa_ruc_key; Type: CONSTRAINT; Schema: seg; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY empresa
    ADD CONSTRAINT empresa_ruc_key UNIQUE (ruc);


--
-- TOC entry 1922 (class 2606 OID 17672)
-- Dependencies: 180 180 2106
-- Name: fecha_ingresos_pkey; Type: CONSTRAINT; Schema: seg; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY fecha_ingresos
    ADD CONSTRAINT fecha_ingresos_pkey PRIMARY KEY (id);


--
-- TOC entry 1924 (class 2606 OID 17674)
-- Dependencies: 181 181 2106
-- Name: perfil_personal_pkey; Type: CONSTRAINT; Schema: seg; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY perfil_personal
    ADD CONSTRAINT perfil_personal_pkey PRIMARY KEY (id);


--
-- TOC entry 1926 (class 2606 OID 17676)
-- Dependencies: 182 182 2106
-- Name: personal_pkey; Type: CONSTRAINT; Schema: seg; Owner: nextbook; Tablespace: 
--

ALTER TABLE ONLY personal
    ADD CONSTRAINT personal_pkey PRIMARY KEY (id);


SET search_path = sucursales, pg_catalog;

--
-- TOC entry 1950 (class 2606 OID 18799)
-- Dependencies: 195 195 2106
-- Name: misucursal_pkey; Type: CONSTRAINT; Schema: sucursales; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY misucursal
    ADD CONSTRAINT misucursal_pkey PRIMARY KEY (id);


SET search_path = acceso, pg_catalog;

--
-- TOC entry 1972 (class 2606 OID 18823)
-- Dependencies: 196 1945 193 2106
-- Name: corporativo_id_empresa_corporativo_fkey; Type: FK CONSTRAINT; Schema: acceso; Owner: postgres
--

ALTER TABLE ONLY corporativo
    ADD CONSTRAINT corporativo_id_empresa_corporativo_fkey FOREIGN KEY (id_empresa_corporativo) REFERENCES empresa.corporativo(id);


SET search_path = empresa, pg_catalog;

--
-- TOC entry 1970 (class 2606 OID 18709)
-- Dependencies: 194 193 1945 2106
-- Name: miempresa_id_corporativo_fkey; Type: FK CONSTRAINT; Schema: empresa; Owner: postgres
--

ALTER TABLE ONLY miempresa
    ADD CONSTRAINT miempresa_id_corporativo_fkey FOREIGN KEY (id_corporativo) REFERENCES corporativo(id);


SET search_path = facturanext, pg_catalog;

--
-- TOC entry 1967 (class 2606 OID 18469)
-- Dependencies: 1935 187 186 2106
-- Name: fk_correo_adjuntos; Type: FK CONSTRAINT; Schema: facturanext; Owner: postgres
--

ALTER TABLE ONLY adjuntos
    ADD CONSTRAINT fk_correo_adjuntos FOREIGN KEY (id_correo) REFERENCES correo(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1969 (class 2606 OID 18474)
-- Dependencies: 1943 192 189 2106
-- Name: fk_facturas_proveedores; Type: FK CONSTRAINT; Schema: facturanext; Owner: postgres
--

ALTER TABLE ONLY facturas
    ADD CONSTRAINT fk_facturas_proveedores FOREIGN KEY (id_proveedor) REFERENCES proveedores(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1968 (class 2606 OID 18479)
-- Dependencies: 190 188 1941 2106
-- Name: fk_fisicas_detalles; Type: FK CONSTRAINT; Schema: facturanext; Owner: postgres
--

ALTER TABLE ONLY detalles_fisicas
    ADD CONSTRAINT fk_fisicas_detalles FOREIGN KEY (id_fisica) REFERENCES facturas_fisica(id) ON UPDATE CASCADE ON DELETE CASCADE;


SET search_path = localizacion, pg_catalog;

--
-- TOC entry 1955 (class 2606 OID 17692)
-- Dependencies: 1899 168 170 2106
-- Name: ciudad_id_provincia_fkey; Type: FK CONSTRAINT; Schema: localizacion; Owner: nextbook
--

ALTER TABLE ONLY ciudad
    ADD CONSTRAINT ciudad_id_provincia_fkey FOREIGN KEY (id_provincia) REFERENCES provincia(id);


--
-- TOC entry 1956 (class 2606 OID 17697)
-- Dependencies: 169 1897 170 2106
-- Name: provincia_id_pais_fkey; Type: FK CONSTRAINT; Schema: localizacion; Owner: nextbook
--

ALTER TABLE ONLY provincia
    ADD CONSTRAINT provincia_id_pais_fkey FOREIGN KEY (id_pais) REFERENCES pais(id);


SET search_path = notificaciones, pg_catalog;

--
-- TOC entry 1973 (class 2606 OID 18876)
-- Dependencies: 197 1947 194 2106
-- Name: facturanext_id_empresa_fkey; Type: FK CONSTRAINT; Schema: notificaciones; Owner: postgres
--

ALTER TABLE ONLY facturanext
    ADD CONSTRAINT facturanext_id_empresa_fkey FOREIGN KEY (id_empresa) REFERENCES empresa.miempresa(id);


SET search_path = public, pg_catalog;

--
-- TOC entry 1964 (class 2606 OID 18837)
-- Dependencies: 1949 195 183 2106
-- Name: colaboradores_areas_id_sucursales_misucursal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY colaboradores_areas
    ADD CONSTRAINT colaboradores_areas_id_sucursales_misucursal_fkey FOREIGN KEY (id_sucursales_misucursal) REFERENCES sucursales.misucursal(id);


--
-- TOC entry 1965 (class 2606 OID 18847)
-- Dependencies: 184 195 1949 2106
-- Name: colaboradores_cargo_id_sucursales_misucursal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: nextbook
--

ALTER TABLE ONLY colaboradores_cargo
    ADD CONSTRAINT colaboradores_cargo_id_sucursales_misucursal_fkey FOREIGN KEY (id_sucursales_misucursal) REFERENCES sucursales.misucursal(id);


--
-- TOC entry 1966 (class 2606 OID 18526)
-- Dependencies: 185 176 1911 2106
-- Name: colaboradores_perfil_id_sucursal_empresa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: nextbook
--

ALTER TABLE ONLY colaboradores_perfil
    ADD CONSTRAINT colaboradores_perfil_id_sucursal_empresa_fkey FOREIGN KEY (id_sucursal_empresa) REFERENCES sucursales_empresa(id);


--
-- TOC entry 1957 (class 2606 OID 17702)
-- Dependencies: 171 1903 172 2106
-- Name: empresa_tipo_id_empresa_categoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: nextbook
--

ALTER TABLE ONLY empresa_categoria
    ADD CONSTRAINT empresa_tipo_id_empresa_categoria_fkey FOREIGN KEY (id_empresa_categoria) REFERENCES empresa_tipo(id);


--
-- TOC entry 1958 (class 2606 OID 18546)
-- Dependencies: 1911 173 176 2106
-- Name: img_perfil_empresa_id_sucursal_empresa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: nextbook
--

ALTER TABLE ONLY sucursal_img_perfil_empresa
    ADD CONSTRAINT img_perfil_empresa_id_sucursal_empresa_fkey FOREIGN KEY (id_sucursal_empresa) REFERENCES sucursales_empresa(id);


--
-- TOC entry 1959 (class 2606 OID 18536)
-- Dependencies: 174 1911 176 2106
-- Name: info_sucursal_empresa_id_sucursal_empresa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: nextbook
--

ALTER TABLE ONLY sucursal_info_empresa
    ADD CONSTRAINT info_sucursal_empresa_id_sucursal_empresa_fkey FOREIGN KEY (id_sucursal_empresa) REFERENCES sucursales_empresa(id);


--
-- TOC entry 1960 (class 2606 OID 18541)
-- Dependencies: 176 1911 175 2106
-- Name: perfil_sucursal_id_empresa_sucursal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: nextbook
--

ALTER TABLE ONLY sucursal_perfil_empresa
    ADD CONSTRAINT perfil_sucursal_id_empresa_sucursal_fkey FOREIGN KEY (id_empresa_sucursal) REFERENCES sucursales_empresa(id);


--
-- TOC entry 1961 (class 2606 OID 18043)
-- Dependencies: 176 179 1917 2106
-- Name: sucursales_empresa_id_empresa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: nextbook
--

ALTER TABLE ONLY sucursales_empresa
    ADD CONSTRAINT sucursales_empresa_id_empresa_fkey FOREIGN KEY (id_empresa) REFERENCES seg.empresa(id);


SET search_path = seg, pg_catalog;

--
-- TOC entry 1962 (class 2606 OID 17727)
-- Dependencies: 179 1917 178 2106
-- Name: accesos_id_empresa_fkey; Type: FK CONSTRAINT; Schema: seg; Owner: nextbook
--

ALTER TABLE ONLY accesos
    ADD CONSTRAINT accesos_id_empresa_fkey FOREIGN KEY (id_empresa) REFERENCES empresa(id);


--
-- TOC entry 1963 (class 2606 OID 17732)
-- Dependencies: 1917 181 179 2106
-- Name: perfil_personal_id_empresa_fkey; Type: FK CONSTRAINT; Schema: seg; Owner: nextbook
--

ALTER TABLE ONLY perfil_personal
    ADD CONSTRAINT perfil_personal_id_empresa_fkey FOREIGN KEY (id_empresa) REFERENCES empresa(id);


SET search_path = sucursales, pg_catalog;

--
-- TOC entry 1971 (class 2606 OID 18810)
-- Dependencies: 1947 195 194 2106
-- Name: misucursal_id_empresa_miempresa_fkey; Type: FK CONSTRAINT; Schema: sucursales; Owner: postgres
--

ALTER TABLE ONLY misucursal
    ADD CONSTRAINT misucursal_id_empresa_miempresa_fkey FOREIGN KEY (id_empresa_miempresa) REFERENCES empresa.miempresa(id);


--
-- TOC entry 2111 (class 0 OID 0)
-- Dependencies: 8
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;


--
-- TOC entry 2112 (class 0 OID 0)
-- Dependencies: 7
-- Name: seg; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA seg FROM PUBLIC;
REVOKE ALL ON SCHEMA seg FROM postgres;
GRANT ALL ON SCHEMA seg TO postgres;


SET search_path = localizacion, pg_catalog;

--
-- TOC entry 2115 (class 0 OID 0)
-- Dependencies: 168
-- Name: ciudad; Type: ACL; Schema: localizacion; Owner: nextbook
--

REVOKE ALL ON TABLE ciudad FROM PUBLIC;
REVOKE ALL ON TABLE ciudad FROM nextbook;
GRANT ALL ON TABLE ciudad TO nextbook;
GRANT ALL ON TABLE ciudad TO nextbook_root WITH GRANT OPTION;
GRANT ALL ON TABLE ciudad TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2116 (class 0 OID 0)
-- Dependencies: 169
-- Name: pais; Type: ACL; Schema: localizacion; Owner: nextbook
--

REVOKE ALL ON TABLE pais FROM PUBLIC;
REVOKE ALL ON TABLE pais FROM nextbook;
GRANT ALL ON TABLE pais TO nextbook;
GRANT ALL ON TABLE pais TO nextbook_root WITH GRANT OPTION;
GRANT ALL ON TABLE pais TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2117 (class 0 OID 0)
-- Dependencies: 170
-- Name: provincia; Type: ACL; Schema: localizacion; Owner: nextbook
--

REVOKE ALL ON TABLE provincia FROM PUBLIC;
REVOKE ALL ON TABLE provincia FROM nextbook;
GRANT ALL ON TABLE provincia TO nextbook;
GRANT ALL ON TABLE provincia TO nextbook_root WITH GRANT OPTION;
GRANT ALL ON TABLE provincia TO nextbook_book WITH GRANT OPTION;


SET search_path = public, pg_catalog;

--
-- TOC entry 2118 (class 0 OID 0)
-- Dependencies: 184
-- Name: colaboradores_cargo; Type: ACL; Schema: public; Owner: nextbook
--

REVOKE ALL ON TABLE colaboradores_cargo FROM PUBLIC;
REVOKE ALL ON TABLE colaboradores_cargo FROM nextbook;
GRANT ALL ON TABLE colaboradores_cargo TO nextbook;
GRANT ALL ON TABLE colaboradores_cargo TO nextbook_root WITH GRANT OPTION;
GRANT ALL ON TABLE colaboradores_cargo TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2119 (class 0 OID 0)
-- Dependencies: 185
-- Name: colaboradores_perfil; Type: ACL; Schema: public; Owner: nextbook
--

REVOKE ALL ON TABLE colaboradores_perfil FROM PUBLIC;
REVOKE ALL ON TABLE colaboradores_perfil FROM nextbook;
GRANT ALL ON TABLE colaboradores_perfil TO nextbook;
GRANT ALL ON TABLE colaboradores_perfil TO nextbook_root WITH GRANT OPTION;
GRANT ALL ON TABLE colaboradores_perfil TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2120 (class 0 OID 0)
-- Dependencies: 171
-- Name: empresa_categoria; Type: ACL; Schema: public; Owner: nextbook
--

REVOKE ALL ON TABLE empresa_categoria FROM PUBLIC;
REVOKE ALL ON TABLE empresa_categoria FROM nextbook;
GRANT ALL ON TABLE empresa_categoria TO nextbook;
GRANT ALL ON TABLE empresa_categoria TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2122 (class 0 OID 0)
-- Dependencies: 172
-- Name: empresa_tipo; Type: ACL; Schema: public; Owner: nextbook
--

REVOKE ALL ON TABLE empresa_tipo FROM PUBLIC;
REVOKE ALL ON TABLE empresa_tipo FROM nextbook;
GRANT ALL ON TABLE empresa_tipo TO nextbook;
GRANT ALL ON TABLE empresa_tipo TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2123 (class 0 OID 0)
-- Dependencies: 173
-- Name: sucursal_img_perfil_empresa; Type: ACL; Schema: public; Owner: nextbook
--

REVOKE ALL ON TABLE sucursal_img_perfil_empresa FROM PUBLIC;
REVOKE ALL ON TABLE sucursal_img_perfil_empresa FROM nextbook;
GRANT ALL ON TABLE sucursal_img_perfil_empresa TO nextbook;
GRANT ALL ON TABLE sucursal_img_perfil_empresa TO nextbook_root WITH GRANT OPTION;
GRANT ALL ON TABLE sucursal_img_perfil_empresa TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2124 (class 0 OID 0)
-- Dependencies: 174
-- Name: sucursal_info_empresa; Type: ACL; Schema: public; Owner: nextbook
--

REVOKE ALL ON TABLE sucursal_info_empresa FROM PUBLIC;
REVOKE ALL ON TABLE sucursal_info_empresa FROM nextbook;
GRANT ALL ON TABLE sucursal_info_empresa TO nextbook;
GRANT ALL ON TABLE sucursal_info_empresa TO nextbook_root WITH GRANT OPTION;
GRANT ALL ON TABLE sucursal_info_empresa TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2125 (class 0 OID 0)
-- Dependencies: 175
-- Name: sucursal_perfil_empresa; Type: ACL; Schema: public; Owner: nextbook
--

REVOKE ALL ON TABLE sucursal_perfil_empresa FROM PUBLIC;
REVOKE ALL ON TABLE sucursal_perfil_empresa FROM nextbook;
GRANT ALL ON TABLE sucursal_perfil_empresa TO nextbook;
GRANT ALL ON TABLE sucursal_perfil_empresa TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2126 (class 0 OID 0)
-- Dependencies: 176
-- Name: sucursales_empresa; Type: ACL; Schema: public; Owner: nextbook
--

REVOKE ALL ON TABLE sucursales_empresa FROM PUBLIC;
REVOKE ALL ON TABLE sucursales_empresa FROM nextbook;
GRANT ALL ON TABLE sucursales_empresa TO nextbook;
GRANT ALL ON TABLE sucursales_empresa TO nextbook_book WITH GRANT OPTION;


SET search_path = seg, pg_catalog;

--
-- TOC entry 2127 (class 0 OID 0)
-- Dependencies: 177
-- Name: acceso_colaboradores; Type: ACL; Schema: seg; Owner: nextbook
--

REVOKE ALL ON TABLE acceso_colaboradores FROM PUBLIC;
REVOKE ALL ON TABLE acceso_colaboradores FROM nextbook;
GRANT ALL ON TABLE acceso_colaboradores TO nextbook;
GRANT ALL ON TABLE acceso_colaboradores TO nextbook_root WITH GRANT OPTION;
GRANT ALL ON TABLE acceso_colaboradores TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2128 (class 0 OID 0)
-- Dependencies: 178
-- Name: accesos; Type: ACL; Schema: seg; Owner: nextbook
--

REVOKE ALL ON TABLE accesos FROM PUBLIC;
REVOKE ALL ON TABLE accesos FROM nextbook;
GRANT ALL ON TABLE accesos TO nextbook;
GRANT ALL ON TABLE accesos TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2129 (class 0 OID 0)
-- Dependencies: 179
-- Name: empresa; Type: ACL; Schema: seg; Owner: nextbook
--

REVOKE ALL ON TABLE empresa FROM PUBLIC;
REVOKE ALL ON TABLE empresa FROM nextbook;
GRANT ALL ON TABLE empresa TO nextbook;
GRANT ALL ON TABLE empresa TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2130 (class 0 OID 0)
-- Dependencies: 180
-- Name: fecha_ingresos; Type: ACL; Schema: seg; Owner: nextbook
--

REVOKE ALL ON TABLE fecha_ingresos FROM PUBLIC;
REVOKE ALL ON TABLE fecha_ingresos FROM nextbook;
GRANT ALL ON TABLE fecha_ingresos TO nextbook;
GRANT ALL ON TABLE fecha_ingresos TO nextbook_book WITH GRANT OPTION;
GRANT ALL ON TABLE fecha_ingresos TO nextbook_root WITH GRANT OPTION;


--
-- TOC entry 2131 (class 0 OID 0)
-- Dependencies: 181
-- Name: perfil_personal; Type: ACL; Schema: seg; Owner: nextbook
--

REVOKE ALL ON TABLE perfil_personal FROM PUBLIC;
REVOKE ALL ON TABLE perfil_personal FROM nextbook;
GRANT ALL ON TABLE perfil_personal TO nextbook;
GRANT ALL ON TABLE perfil_personal TO nextbook_book WITH GRANT OPTION;


--
-- TOC entry 2132 (class 0 OID 0)
-- Dependencies: 182
-- Name: personal; Type: ACL; Schema: seg; Owner: nextbook
--

REVOKE ALL ON TABLE personal FROM PUBLIC;
REVOKE ALL ON TABLE personal FROM nextbook;
GRANT ALL ON TABLE personal TO nextbook;
GRANT ALL ON TABLE personal TO nextbook_book WITH GRANT OPTION;


-- Completed on 2016-03-16 08:55:44

--
-- PostgreSQL database dump complete
--

