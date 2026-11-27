<?php

const SITE_NAME = 'Stack Games';
const CHARSET = 'UTF-8';
const BASE_URL = '';

const RECAPTCHA_SITE_KEY = '6LeCBzUuAAAAAIcrdChuCj2NtET7v2EFBIYA-Qz8';
const RECAPTCHA_SECRET = '6LeCBzUuAAAAALR3lWxk_opmkWYtx-_GerGUHS_h';


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