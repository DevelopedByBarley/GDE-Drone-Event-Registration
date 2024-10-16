<?php

use App\Controllers\Controller;
use App\Services\LanguageService;

// route_group -> /


$r->addRoute('GET', '', [Controller::class, 'index']);
$r->addRoute('GET', 'register/instructor', [Controller::class, 'intsructorFormPage']);
$r->addRoute('GET', 'register/guest', [Controller::class, 'guestFormPage']);
$r->addRoute('GET', 'cookie-info', [Controller::class, 'cookie']);
$r->addRoute('POST', 'test', [Controller::class, 'test']);

$r->addRoute('GET', 'lang/{value}', [LanguageService::class, 'switchLanguage']);