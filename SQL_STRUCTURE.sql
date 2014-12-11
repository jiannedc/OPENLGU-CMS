--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


SET search_path = public, pg_catalog;

--
-- Name: article_type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE article_type AS ENUM (
    'news',
    'publication',
    'announcement',
    'events',
    'others'
);


ALTER TYPE public.article_type OWNER TO postgres;

--
-- Name: download_access; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE download_access AS ENUM (
    'None',
    'Residents',
    'Business',
    'Registered',
    'All'
);


ALTER TYPE public.download_access OWNER TO postgres;

--
-- Name: layout_type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE layout_type AS ENUM (
    'column3',
    'column2',
    'column1'
);


ALTER TYPE public.layout_type OWNER TO postgres;

--
-- Name: layouts; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE layouts AS ENUM (
    'column1',
    'column2'
);


ALTER TYPE public.layouts OWNER TO postgres;

--
-- Name: media_type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE media_type AS ENUM (
    'jpg',
    'png'
);


ALTER TYPE public.media_type OWNER TO postgres;

--
-- Name: privilege; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE privilege AS ENUM (
    'r',
    'b',
    'reg',
    'all'
);


ALTER TYPE public.privilege OWNER TO postgres;

--
-- Name: privilege_type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE privilege_type AS ENUM (
    'r',
    'b',
    'all'
);


ALTER TYPE public.privilege_type OWNER TO postgres;

--
-- Name: slider_name; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE slider_name AS ENUM (
    'banner',
    'headline',
    'events'
);


ALTER TYPE public.slider_name OWNER TO postgres;

--
-- Name: status; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE status AS ENUM (
    'active',
    'inactive'
);


ALTER TYPE public.status OWNER TO postgres;

--
-- Name: user_type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE user_type AS ENUM (
    'Admin',
    'Resident',
    'Business',
    'Guest'
);


ALTER TYPE public.user_type OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: article; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE article (
    article_id integer NOT NULL,
    article_header text NOT NULL,
    article_body text NOT NULL,
    article_type article_type NOT NULL,
    is_published boolean NOT NULL,
    is_featured boolean NOT NULL,
    date_published timestamp without time zone,
    file_location text,
    file_id bigint
);


ALTER TABLE public.article OWNER TO postgres;

--
-- Name: article_article_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE article_article_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.article_article_id_seq OWNER TO postgres;

--
-- Name: article_article_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE article_article_id_seq OWNED BY article.article_id;


--
-- Name: article_photo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE article_photo (
    article_photo_id integer NOT NULL,
    article_id bigint,
    photo_id bigint,
    display_order smallint
);


ALTER TABLE public.article_photo OWNER TO postgres;

--
-- Name: article_photo_article_photo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE article_photo_article_photo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.article_photo_article_photo_id_seq OWNER TO postgres;

--
-- Name: article_photo_article_photo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE article_photo_article_photo_id_seq OWNED BY article_photo.article_photo_id;


--
-- Name: file; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE file (
    file_id integer NOT NULL,
    title character varying(50),
    description text,
    file_location character varying(100),
    download_access download_access DEFAULT 'All'::download_access,
    is_publication boolean DEFAULT false
);


ALTER TABLE public.file OWNER TO postgres;

--
-- Name: file_file_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE file_file_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.file_file_id_seq OWNER TO postgres;

--
-- Name: file_file_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE file_file_id_seq OWNED BY file.file_id;


--
-- Name: lgu_data; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE lgu_data (
    id integer NOT NULL,
    logo_location text,
    agency_name character varying(200),
    tagline character varying(200),
    address text,
    contact_no character varying(50),
    fax_no character varying(50),
    email_address character varying(50),
    facebook_link text,
    twitter_link text,
    police_hotline character varying(25),
    fire_hotline character varying(25),
    hospital_hotline character varying(25),
    traffic_hotline character varying(25),
    disaster_hotline character varying(25),
    active boolean DEFAULT false,
    disclaimer text,
    copyright character varying(200),
    show_video boolean,
    show_events boolean,
    video_url text,
    google_map text,
    masthead_color character varying(150),
    banner_color character varying(150)
);


ALTER TABLE public.lgu_data OWNER TO postgres;

--
-- Name: lgu_data_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE lgu_data_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lgu_data_id_seq OWNER TO postgres;

--
-- Name: lgu_data_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE lgu_data_id_seq OWNED BY lgu_data.id;


--
-- Name: menu; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE menu (
    menu_id integer NOT NULL,
    name character varying(50),
    status status DEFAULT 'inactive'::status
);


ALTER TABLE public.menu OWNER TO postgres;

--
-- Name: menu_item; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE menu_item (
    item_id integer NOT NULL,
    parent_id integer,
    menu_id integer,
    label character varying,
    url character varying,
    description text,
    sort_order integer,
    status status DEFAULT 'inactive'::status
);


ALTER TABLE public.menu_item OWNER TO postgres;

--
-- Name: menu_item_item_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE menu_item_item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.menu_item_item_id_seq OWNER TO postgres;

--
-- Name: menu_item_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE menu_item_item_id_seq OWNED BY menu_item.item_id;


--
-- Name: menu_menu_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE menu_menu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.menu_menu_id_seq OWNER TO postgres;

--
-- Name: menu_menu_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE menu_menu_id_seq OWNED BY menu.menu_id;


--
-- Name: messages; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE messages (
    id integer NOT NULL,
    name character varying(100),
    email_address character varying(100),
    subject character varying(200),
    body text,
    read boolean DEFAULT false
);


ALTER TABLE public.messages OWNER TO postgres;

--
-- Name: messages_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE messages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.messages_id_seq OWNER TO postgres;

--
-- Name: messages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE messages_id_seq OWNED BY messages.id;


--
-- Name: photo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE photo (
    photo_id integer NOT NULL,
    filename character varying(100),
    title character varying(50),
    caption text,
    show_banner boolean DEFAULT false,
    show_gallery boolean DEFAULT false
);


ALTER TABLE public.photo OWNER TO postgres;

--
-- Name: photo_photo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE photo_photo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.photo_photo_id_seq OWNER TO postgres;

--
-- Name: photo_photo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE photo_photo_id_seq OWNED BY photo.photo_id;


--
-- Name: services; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE services (
    service_id integer NOT NULL,
    service_name text,
    service_description text,
    content text,
    procedures text,
    requirements text,
    service_type character varying(50)
);


ALTER TABLE public.services OWNER TO postgres;

--
-- Name: services_service_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE services_service_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.services_service_id_seq OWNER TO postgres;

--
-- Name: services_service_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE services_service_id_seq OWNED BY services.service_id;


--
-- Name: slider; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE slider (
    slider_id integer NOT NULL,
    slider_name slider_name,
    header text,
    caption text,
    image text,
    photo_id bigint,
    event_date character varying(50),
    venue text,
    has_image boolean
);


ALTER TABLE public.slider OWNER TO postgres;

--
-- Name: slider_slider_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE slider_slider_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.slider_slider_id_seq OWNER TO postgres;

--
-- Name: slider_slider_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE slider_slider_id_seq OWNED BY slider.slider_id;


--
-- Name: spage; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE spage (
    id integer NOT NULL,
    url character varying(300),
    title character varying(300),
    content text
);


ALTER TABLE public.spage OWNER TO postgres;

--
-- Name: spage_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE spage_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.spage_id_seq OWNER TO postgres;

--
-- Name: spage_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE spage_id_seq OWNED BY spage.id;


--
-- Name: user; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "user" (
    user_id integer NOT NULL,
    username character varying(25) NOT NULL,
    password character varying(50) NOT NULL,
    email_address character varying(50) NOT NULL,
    first_name character varying(50) NOT NULL,
    last_name character varying(50) NOT NULL,
    address character varying(100) NOT NULL,
    contact_no character varying(50),
    occupation character varying(50),
    user_type user_type NOT NULL,
    privilege privilege_type NOT NULL,
    pending_account boolean DEFAULT true NOT NULL
);


ALTER TABLE public."user" OWNER TO postgres;

--
-- Name: user_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE user_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_user_id_seq OWNER TO postgres;

--
-- Name: user_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE user_user_id_seq OWNED BY "user".user_id;


--
-- Name: article_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY article ALTER COLUMN article_id SET DEFAULT nextval('article_article_id_seq'::regclass);


--
-- Name: article_photo_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY article_photo ALTER COLUMN article_photo_id SET DEFAULT nextval('article_photo_article_photo_id_seq'::regclass);


--
-- Name: file_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY file ALTER COLUMN file_id SET DEFAULT nextval('file_file_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY lgu_data ALTER COLUMN id SET DEFAULT nextval('lgu_data_id_seq'::regclass);


--
-- Name: menu_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY menu ALTER COLUMN menu_id SET DEFAULT nextval('menu_menu_id_seq'::regclass);


--
-- Name: item_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY menu_item ALTER COLUMN item_id SET DEFAULT nextval('menu_item_item_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY messages ALTER COLUMN id SET DEFAULT nextval('messages_id_seq'::regclass);


--
-- Name: photo_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY photo ALTER COLUMN photo_id SET DEFAULT nextval('photo_photo_id_seq'::regclass);


--
-- Name: service_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY services ALTER COLUMN service_id SET DEFAULT nextval('services_service_id_seq'::regclass);


--
-- Name: slider_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY slider ALTER COLUMN slider_id SET DEFAULT nextval('slider_slider_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY spage ALTER COLUMN id SET DEFAULT nextval('spage_id_seq'::regclass);


--
-- Name: user_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user" ALTER COLUMN user_id SET DEFAULT nextval('user_user_id_seq'::regclass);


--
-- Data for Name: article; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY article (article_id, article_header, article_body, article_type, is_published, is_featured, date_published, file_location, file_id) FROM stdin;
\.


--
-- Name: article_article_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('article_article_id_seq', 1, false);


--
-- Data for Name: article_photo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY article_photo (article_photo_id, article_id, photo_id, display_order) FROM stdin;
\.


--
-- Name: article_photo_article_photo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('article_photo_article_photo_id_seq', 1, false);


--
-- Data for Name: file; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY file (file_id, title, description, file_location, download_access, is_publication) FROM stdin;
\.


--
-- Name: file_file_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('file_file_id_seq', 1, false);


--
-- Data for Name: lgu_data; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY lgu_data (id, logo_location, agency_name, tagline, address, contact_no, fax_no, email_address, facebook_link, twitter_link, police_hotline, fire_hotline, hospital_hotline, traffic_hotline, disaster_hotline, active, disclaimer, copyright, show_video, show_events, video_url, google_map, masthead_color, banner_color) FROM stdin;
1	LOGO.png	Official Website of the City of XXXX	Lorem ipsum dolor sit amet.Mirum est notare quam littera gothica	City of XXXX<br/>\nBuilding Name Here<br />\nStreet Name Here<br />\nBrgy./Town Name Here<br />\nProvince Name Here, Philippines<br />	+(123) 456 7890	+(123) 456 7890	email@here.gov	https://www.facebook.com/iGovPhil/	https://www.facebook.com/iGovPhil/	+(123) 456 7890	+(123) 456 7890	+(123) 456 7890	+(123) 456 7890	+(123) 456 7890	t	The City of XXX shall not be responsible for any errors or omissions contained in this site. It reserves the right to make changes without notice. Accordingly, all information is provided "as is". It provides no warranty, either express or implied, as to the accuracy, reliability, or completeness of furnished data. If you find any errors or omissions, we encourage you to report them to the webmaster.\n	Copyright © City of XXXX	t	t	<iframe width="420" height="315" src="http://www.youtube.com/embed/_Jf2Y81OlpU?rel=0" frameborder="0" allowfullscreen></iframe>	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7990240.199702129!2d121.89598914999999!3d12.078949999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1418242317529" width="600" height="450" frameborder="0" style="border:0"></iframe>	007582	005875
\.


--
-- Name: lgu_data_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('lgu_data_id_seq', 2, false);


--
-- Data for Name: menu; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY menu (menu_id, name, status) FROM stdin;
1	Home-TopBar	inactive
2	Home-LGUMenu	inactive
\.


--
-- Data for Name: menu_item; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY menu_item (item_id, parent_id, menu_id, label, url, description, sort_order, status) FROM stdin;
31	\N	2	For Business		Links for business owners	2	inactive
1	\N	1	Home	index.php	Website Homepage	1	active
7	1	1	Announcements	index.php?r=article/announcement	Contains list of all announcements.	7	inactive
4	1	1	About LGU	index.php?r=site/page&view=about	About the LGU page	3	inactive
18	\N	2	For Residents		Links for residents	1	inactive
19	18	2	Services	index.php?r=site/page&view=services	Services Offered by LGU	1	inactive
21	20	2	History	index.php?r=site/page&view=history	Historical Background of LGU	1	inactive
22	20	2	Mission & Vission	index.php?r=site/page&view=mission_vission	Mission & Vission of LGU	2	inactive
23	20	2	Local Officials	index.php?r=site/page&view=officials	LGU Local Officials	3	inactive
26	24	2	Hospitals and Clinics	index.php?r=site/page&view=offices#hospitals	Hospitals and Clinics	2	inactive
27	24	2	Schools	index.php?r=site/page&view=offices#Schools	Schools	3	inactive
28	24	2	Police and Fire Stations	index.php?r=site/page&view=offices#police_fire	Police and Fire Stations	4	inactive
30	24	2	Malls and Amusement Centers	index.php?r=site/page&view=offices#malls_amusements	Malls and Amusement Centers	6	inactive
32	31	2	Business Permits and Licensing	index.php?r=site/page&view=business_permits	Business Permits and Licensing	1	inactive
33	31	2	Jobs and Recruitment		Jobs and Recruitment	2	inactive
36	\N	2	For Visitors		Links for Visitors and Tourists	3	inactive
38	36	2	Map & Location	index.php?r=site/page&view=map_and_location	Map & Location	2	inactive
3	1	1	Map & Location	index.php?r=site/page&view=map_and_location	Map of LGU and Location	3	inactive
40	39	2	Local Attractions and Festivals	index.php?r=site/page&view=festivals	Local Attractions and Festivals	1	inactive
42	36	2	Travel Information		Travel Information	4	inactive
39	36	2	Tourist Informations		Tourist Informations	3	inactive
34	33	2	Job Listing	index.php?r=site/page&view=job_listing	List of Jobs	1	inactive
11	\N	1	Products & Services		List of LGU's Products & Services	3	inactive
12	11	1	Products	index.php?r=site/page&view=products	LGU Products	1	inactive
29	24	2	Hotels and Restaurants	index.php?r=site/page&view=offices#hotels	Hotels and Restaurants	5	inactive
25	24	2	Local Government Offices	index.php?r=site/page&view=offices#lgu_office	Local Government Offices	1	inactive
2	1	1	Services	index.php?r=site/page&view=services	Services offered by LGU	2	inactive
24	18	2	Directory	index.php?r=site/page&view=offices	Directory	3	inactive
10	\N	1	Transparency	index.php?r=site/page&view=transparency	Transparency	2	inactive
6	1	1	News & Events	index.php?r=article/news	News about LGU and list of upcoming events.	6	inactive
8	1	1	Publications	index.php?r=article/publication	List of all publications released by the LGU.	8	inactive
13	11	1	Services	index.php?r=site/page&view=services	Services	2	inactive
44	42	2	Moving Around	index.php?r=site/page&view=moving_around	Moving Around	2	inactive
43	42	2	How To Get Here	index.php?r=site/page&view=how_to_get_here	How To Get Here	1	inactive
41	39	2	Accomodations	index.php?r=site/page&view=accomodations	Accomodations	2	inactive
37	36	2	Local Heritage	index.php?r=site/page&view=local_heritage	Local Heritage	1	inactive
20	18	2	About LGU	index.php?r=site/page&view=about	Links related to LGU	2	inactive
35	33	2	Job Submission	index.php?r=site/page&view=job_submission	Submit Offered Jobs	2	inactive
5	1	1	Directory	index.php?r=site/page&view=offices	Directory	5	inactive
45	1	1	Gallery	index.php?r=site/page&view=gallery	Gallery of Photos	8	inactive
\.


--
-- Name: menu_item_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('menu_item_item_id_seq', 45, true);


--
-- Name: menu_menu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('menu_menu_id_seq', 2, true);


--
-- Data for Name: messages; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY messages (id, name, email_address, subject, body, read) FROM stdin;
\.


--
-- Name: messages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('messages_id_seq', 1, false);


--
-- Data for Name: photo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY photo (photo_id, filename, title, caption, show_banner, show_gallery) FROM stdin;
\.


--
-- Name: photo_photo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('photo_photo_id_seq', 1, false);


--
-- Data for Name: services; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY services (service_id, service_name, service_description, content, procedures, requirements, service_type) FROM stdin;
3	Marriage Licensing		This service is not yet available.			civil_registry
4	Health Care		This service is not yet available.			health_welfare
5	Social Welfare		This service is not yet available.			health_welfare
6	Real Property Tax Administration		This service is not yet available.			business
7	Business Registration and Licensing		This service is not yet available.			business
8	Other Permits and Liscenses		<h2>Building Permit</h2>\n-\n<h2>Sanitary Permit</h2>\n-\n<h2>Electrical Permit</h2>\n-			permits
2	Residence Certifcation 		This service is not yet available.			civil_registry
1	Birth Certification	Application for Timely Registration of Birth	Here’s what you need to do to get one.\r\n\r\nFirst, fill-up the application form. You need to input your personal details including your parents’ information. You need to indicate in the form how many copies you wish to have and the purpose for acquiring it.\r\n\r\nDon’t make the mistake of getting the other forms. Be sure you are filling out the birth certificate request form. There are other forms for Marriage and Death certificates. They all are identified by different colors.\r\n\r\nFill it up correctly, legibly and fast in order to get the nearest priority number. Avoid erasures and if possible bring your own pen.\r\n\r\nSecond step is form screening. Proceed to the step 1 area for screening. The screener will check all the necessary details. You need to submit a valid ID together with the form to justify that you are the owner and the requester (This is to secure confidentiality of the document).When it is approved, you will be given a priority number.\r\n\r\nNote: If you are requesting for your siblings, parents or spouse’s birth certificate, you will have to provide your valid ID and their valid ID along with an Authorization Letter signed by the owner.\r\n\r\nThird is payment. There are seats available while you wait for your number. Once your number is flashed on the screen/monitor, head to the counter. You will need to give the accountant your priority number, application form and the money amounting to Php 140.00. Get the Official Receipt. Don’t lose it. The staff will advise estimated time to claim the document.\r\n\r\nLast is releasing. Proceed directly to the claiming area once you have the Official Receipt. Just place it inside the tray in front of the window. Be attentive and wait (about 30 minutes to 2 hours) for your name to be called. That’s when you can claim your birth certificate. Make sure to go through the document and check for any errors.			civil_registry
9	Vehicle Registration	Add short description here	Lorem Ipsum Vivamus euismod cursus volutpat. Donec sed dignissim sapien. Phasellus in dolor scelerisque mauris convallis mattis sed a ipsum. Praesent leo justo, hendrerit a sem at, auctor interdum neque. Sed lectus nulla, blandit vel faucibus vel, accumsan convallis eros. Donec mi libero, luctus eu ornare at, pharetra a augue. Praesent orci libero, convallis dictum ultrices sed, consequat ac mi. Cras dapibus eleifend faucibus. Fusce vehicula tortor a ipsum suscipit, quis egestas nisi mollis. Donec tortor neque, rutrum et arcu quis, lacinia bibendum eros. Quisque et felis non ipsum pretium molestie.	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tortor lacus, molestie in volutpat id, finibus sit amet neque. Sed quis metus semper, euismod orci non, pharetra enim. Vivamus nec magna velit. Vestibulum feugiat magna malesuada, aliquet metus a, vestibulum ligula. Vivamus euismod cursus volutpat. Donec sed dignissim sapien. Phasellus in dolor scelerisque mauris convallis mattis sed a ipsum. Praesent leo justo, hendrerit a sem at, auctor interdum neque. Sed lectus nulla, blandit vel faucibus vel, accumsan convallis eros. Donec mi libero, luctus eu ornare at, pharetra a augue. Praesent orci libero, convallis dictum ultrices sed, consequat ac mi. Cras dapibus eleifend faucibus. Fusce vehicula tortor a ipsum suscipit, quis egestas nisi mollis. Donec tortor neque, rutrum et arcu quis, lacinia bibendum eros. Quisque et felis non ipsum pretium molestie.	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries	permits
\.


--
-- Name: services_service_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('services_service_id_seq', 9, false);


--
-- Data for Name: slider; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY slider (slider_id, slider_name, header, caption, image, photo_id, event_date, venue, has_image) FROM stdin;
\.


--
-- Name: slider_slider_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('slider_slider_id_seq', 1, false);


--
-- Data for Name: spage; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY spage (id, url, title, content) FROM stdin;
6	products	Products	Lorem ipsum dolor sit amet.Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
5	transparency	Transparency	Lorem ipsum dolor sit amet.Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
2	about	About LGU	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. <br />\r\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.\r\n\r\nTypi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
8	mission_vission	Mission and Vission	Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. humanitatis per seacula quarta decima et quinta decima. <br/>\r\nMirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. humanitatis per seacula quarta decima et quinta decima. 
11	business_permits	Business Permit And Liscencing 	<a href="http://openlgu.uplb.edu.ph/alaminos/Bpls/"> Link to Alaminos Business Permit and Liscensing </a>
10	how_to_get_here	How To Get Here	No Content Available
7	history	History	ALAMINOS began as a barrio of San Pablo City which was then only a town belonging to the province of Batangas. It's initial name was TRINCHERA denoting the presence of long and deep ditches. The early inhabitants of Trinchera were believed to be insorectors and possibly fugitives who took advantage of the numerous trenches for hiding and as well as defense against Spanish authority.\r\n<br />\r\n<br />\r\n    Sometime in 1873 when a certain DON ANDRES PEÑALOZA was the gobernadorcillo (equivalent of mayor) of the town of San Pablo, Trinchera was formally separated and become a pueblo (town) but remained part of the province of Batangas.\r\n<br />\r\n<br />\r\n    DON CIRILO BAYLON , a wealthy resident of Trinchera and with a good command of Spanish, invited Captain General JUAN DE ALAMINOS NIVERA , the chief executive of the province of Batangas whose capital was Lipa. The Captain General accepted the invitation and came in colorful carriage drawn by two horses. With DON CIRILO BAYLON leading, he was warmly received by the residents of Trinchera. Doña Gregoria Baylon, the younger sister of Don Cirilo Baylon presented bouquet of fresh flowers to the Captain-General.\r\n<br />\r\n<br />\r\n    During the program in honor of the Captain-General and his party, Don Cirilo Baylon presented the petition of the residents asking the TRINCHERA be made into a duly organized and reorganized town. The petition was read to public and the Captain-General gave his assurance to consider their wish favorably. In less than two months the official paper proclaiming TRINCHERA as a new pueblo or town came from Lipa, then the seat of power of the province of Batangas.\r\n<br />\r\n<br />\r\n    At the same time, DON CIRILO BAYLON was appointed the first gobernadorcillo or town mayor in concurrent capacity as Capitan de los Constables de Pueblo or the equivalent of the local police chief. In appreciation to CAPTAIN-GENERAL JUAN DE ALAMINOS RIVERA , the new pueblo was named ALAMINOS in 1873 and remained part of the province of Batangas until 1903.\r\n<br />\r\n<br />\r\n    The religious Patron of ALAMINOS is NUESTRO SEÑORA DEL PILAR and its town Fiesta is celebrated on October 12 of the year.\r\n<br />\r\n<br />\r\n    At present Alaminos has 15 Barangays, four at the town proper and eleven regular barrios. Based on May 08, 1995 election, the number of voters of Alaminos is 18,729 implying that its actual population is something like 36,456. It has a land area of 54.68 sq. km. and situated 78 kilometers east of Manila.
16	local_heritage	Local Heritage	No Content Available
17	moving_around	Moving Around	No Content Available
13	officials	Local Officials	<div class="areaCenter">\r\n<div class="header1">\r\nEladio M. Magampon\r\n</div>\r\n<div class="subheader">\r\nMunicipal Mayor\r\n</div>\r\n<div class="header1">\r\nDemetrio P. Hernandez Jr.\r\n</div>\r\n<div class="subheader">\r\nMunicipal Vice-Mayor\r\n</div>\r\n<div class="header2">\r\nCity Councilors\r\n</div>\r\n<div class="content2">\r\nWilson S. Villanueva<br />\r\nLorelei M. Pamplona<br />\r\nJeyson C. Abu<br />\r\nNikki D. Castillo<br />\r\nDarwin C. Tolentino<br />\r\nElvie K. Manalo<br />\r\nVladimir A. Flores<br />\r\nJaime M. Banzuela<br />\r\n</div>\r\n</div>
18	accomodations	Accomodations	No Content Available
14	festivals	Local Attraction and Festivals	<div class="header1" >Coramblan Festival</div>\r\n\r\nA nine-day festivity in honor of Nuestra Señora Del Pilar, Alaminos Laguna's patron saint. The festival includes religious activities such as novena, cultural shows held every night participated by the public and private schools, NGO's and GO's supported by Local Government. A trade fair is also organized which aims to promote the different products produced by their fifteen barangays. The highlight of the festival is the CORAMBLAN Festival, a street dancing competition and performances from the different schools promoting their COconut-RAMbutan-LANzones which are the major products produced in the municipality of Alaminos. The feast of Nuestra Señora  Del Pilar is on the 12th of October.\r\n
19	gallery	Gallery	
20	job_listing	Job Listing	No Content Available
21	job_submission	Job Submissions	No Content Available
15	offices	Directory	<div class="section_subheader">\r\n<a href="#lgu_office">\r\n<header>Local Government Offices</header></a>\r\n<p>Content Goes Here</p>\r\n</div>\r\n\r\n<div class="section_subheader" id="#hospitals">\r\n<a href="#lgu_office"><header>Hospitals</header></a>\r\n<p>Content Goes Here</p>\r\n</div>\r\n\r\n<div class="section_subheader" id="#Schools">\r\n<a href="#lgu_office"><header>Schools and Universities</header></a>\r\n<p>Content Goes Here</p>\r\n</div>\r\n\r\n<div class="section_subheader" id="#police_fire">\r\n<a href="#lgu_office"><header>Police Station and Fire Station</header></a>\r\n<p>Content Goes Here</p>\r\n</div>\r\n\r\n<div class="section_subheader" id="#hotels">\r\n<a href="#lgu_office"><header>Hotels and Restaurants</header></a>\r\n<p>Content Goes Here</p>\r\n</div>\r\n\r\n<div class="section_subheader" id="#malls_amusements">\r\n<a href="#lgu_office"><header>Malls and Amusements</header></a>\r\n<p>Content Goes Here</p>\r\n</div>\r\n
12	map_and_location	Map and Location	<strong>Land Area:</strong> 5,473 has.\n<br />\n<strong>Population (as of Y2000):</strong> 36,120\n<br />\n<strong>Distance from Manila:</strong> 78 kms.\n<br />\n<br />\nLorem ipsum dolor sit amet.Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\n<br />\n<br />
\.


--
-- Name: spage_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('spage_id_seq', 21, true);


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "user" (user_id, username, password, email_address, first_name, last_name, address, contact_no, occupation, user_type, privilege, pending_account) FROM stdin;
1	admin	$1$8G1.vf/.$19wVX.zNjZe8zt1qPRYFz.	email@here.com	admin	website	LGU Location	-		Admin	all	f
17	a 	a	a	a	a	a	a	a	Admin	all	t
\.


--
-- Name: user_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('user_user_id_seq', 2, false);


--
-- Name: article_photo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY article_photo
    ADD CONSTRAINT article_photo_pkey PRIMARY KEY (article_photo_id);


--
-- Name: article_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY article
    ADD CONSTRAINT article_pkey PRIMARY KEY (article_id);


--
-- Name: file_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY file
    ADD CONSTRAINT file_pkey PRIMARY KEY (file_id);


--
-- Name: lgu_data_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY lgu_data
    ADD CONSTRAINT lgu_data_pkey PRIMARY KEY (id);


--
-- Name: menu_item_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY menu_item
    ADD CONSTRAINT menu_item_pkey PRIMARY KEY (item_id);


--
-- Name: menu_name_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY menu
    ADD CONSTRAINT menu_name_key UNIQUE (name);


--
-- Name: menu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY menu
    ADD CONSTRAINT menu_pkey PRIMARY KEY (menu_id);


--
-- Name: messages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY messages
    ADD CONSTRAINT messages_pkey PRIMARY KEY (id);


--
-- Name: photo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY photo
    ADD CONSTRAINT photo_pkey PRIMARY KEY (photo_id);


--
-- Name: services_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY services
    ADD CONSTRAINT services_pkey PRIMARY KEY (service_id);


--
-- Name: slider_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY slider
    ADD CONSTRAINT slider_pkey PRIMARY KEY (slider_id);


--
-- Name: spage_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY spage
    ADD CONSTRAINT spage_pkey PRIMARY KEY (id);


--
-- Name: spage_url_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY spage
    ADD CONSTRAINT spage_url_key UNIQUE (url);


--
-- Name: user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (user_id);


--
-- Name: user_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_username_key UNIQUE (username);


--
-- Name: article_file_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY article
    ADD CONSTRAINT article_file_id_fkey FOREIGN KEY (file_id) REFERENCES file(file_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: article_photo_article_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY article_photo
    ADD CONSTRAINT article_photo_article_id_fkey FOREIGN KEY (article_id) REFERENCES article(article_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: article_photo_photo_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY article_photo
    ADD CONSTRAINT article_photo_photo_id_fkey FOREIGN KEY (photo_id) REFERENCES photo(photo_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: menu_item_menu_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY menu_item
    ADD CONSTRAINT menu_item_menu_id_fkey FOREIGN KEY (menu_id) REFERENCES menu(menu_id);


--
-- Name: menu_item_parent_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY menu_item
    ADD CONSTRAINT menu_item_parent_id_fkey FOREIGN KEY (parent_id) REFERENCES menu_item(item_id);


--
-- Name: slider_photo_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY slider
    ADD CONSTRAINT slider_photo_id_fkey FOREIGN KEY (photo_id) REFERENCES photo(photo_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

