<?php

const APP_NAME = 'sell-and-buy';

const PATH_CSS = 'css/';

const PATH_CORE = '../src/core/';
const PATH_CONFIG = '../src/config/';
const PATH_CONTROLLERS = '../src/controllers/';
const PATH_MODELS = '../src/models/';
const PATH_ENTITIES = '../src/entities/';
const PATH_VIEWS = '../src/views/';
const PATH_LANGUAGES = '../src/lang/';

const PATH_DAO = PATH_MODELS.'dao/';

const PATH_COMPONENTS = PATH_VIEWS.'components/';
const PATH_PAGES = PATH_VIEWS.'pages/';

const LANGUAGES = ['fr', 'en'];
const DEFAULT_LANGUAGE = 'fr';

const DEBUG = true;

define('DB_HOST', $_SERVER['DB_HOST']);
define('DB_NAME', $_SERVER['DB_NAME']);
define('DB_USER', $_SERVER['DB_USER']);
define('DB_PWD', $_SERVER['DB_PWD']);