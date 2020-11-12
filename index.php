<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/ukua/UkuaMessages.php';
require_once __DIR__ . '/app/ukua/UkuaPage.php';
require_once __DIR__ . '/app/ukua/Ukua.php';

if (!defined('_FORBIDEN')) define('_FORBIDEN', false);

(new Ukua)->match();