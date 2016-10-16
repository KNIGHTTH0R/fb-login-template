<?php

require_once __DIR__ . '/lib/init.php';

session_destroy();

header('Location: '.$appUrl);
