<?php

const SITE_NAME = 'Stack Games';
const CHARSET = 'UTF-8';
const BASE_URL = '';
const LOGO_URL = BASE_URL . '/assets/logo_stackGame_icon.png';

enum Language: string {
    case FRENCH = 'fr';
    case ENGLISH = 'en';
    case SPANISH = 'es';
}
enum userType: string
{
    case USER = 'user';
    case ADMIN_SYS = 'adminsys';
    case ADMIN_WEB = 'adminweb';
}