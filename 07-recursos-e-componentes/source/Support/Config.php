<?php

# use PHPMailer\PHPMailer\PHPMailer;

/**
 * DATABASE
 */


define('CONF_DB_HOST', '172.22.0.2');
define('CONF_DB_USERNAME', 'antunes');
define('CONF_DB_PASSWORD', 'antunes');
define('CONF_DB_NAME', 'fullstackphp');
define('CONF_DB_DNS', 'mysql');

# Project
define("CONF_URL_BASE", "https://localhost/fsphp/07-recursos-e-componentes/07-06-uma-camada-de-visualizacao");
define("CONF_URL_ADMIN", CONF_URL_BASE . "/admin");
define("CONF_URL_ERROR", CONF_URL_BASE . "/404");

# Date
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

# Session
define("CONF_SES_PATH", __DIR__ . "/../../storage/sessions/");

# Password
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

# Message
define("CONF_MESSAGE_CLASS", "trigger");
define("CONF_MESSAGE_INFO", "info");
define("CONF_MESSAGE_SUCCESS", "success");
define("CONF_MESSAGE_WARNING", "warning");
define("CONF_MESSAGE_ERROR", "error");

# Mail
define('CONF_MAIL_LANGUAGE', 'br');
define('CONF_MAIL_CHARSET', 'utf-8');
define('CONF_MAIL_AUTH', true);
define('CONF_MAIL_ISHTML', true);
define('CONF_MAIL_ISSMTP', true);
define('CONF_MAIL_EXCEPTION', true);

define('CONF_MAIL_HOST', 'smtp.sendgrid.net');
define('CONF_MAIL_PORT', 587);
define('CONF_MAIL_USERNAME', 'apikey');
define('CONF_MAIL_PASSWORD', '');

define('CONF_MAIL_SENDER', [
    'address' => 'gabrielantunescontato@gmail.com',
    'name' => 'Gabriel Antunes'
]);


# define('CONF_MAIL_SMPTSEGURE', PHPMailer::ENCRYPTION_STARTTLS);

# View
define('CONF_VIEW_PATH', __DIR__ . '/../../views');
define('CONF_VIEW_EXT', 'php');

# Uplod
define('CONF_UPLOAD_DIR', '../storage');
define('CONF_UPLOAD_IMAGE_FOLDER', 'image');
define('CONF_UPLOAD_FILE_FOLDER', 'file');
define('CONF_UPLOAD_MEDIA_FOLDER', 'media');
define('CONF_UPLOAD_CACHE_DIR', CONF_UPLOAD_DIR . '/' . CONF_UPLOAD_IMAGE_FOLDER . '/cache');
define('CONF_UPLOAD_IMAGE_WIDTH', 2000);
define('CONF_UPLOAD_IMAGE_QUALY', ['png' => 5, 'jpg' => 75]);

# SITE
define('CONF_SITE_NAME', 'antunesgabriel');
define('CONF_SITE_LANG', 'pt_BR');
define('CONF_SITE_DOMAIN', 'antunesgabriel.com.br');

# SEO
define('CONF_SEO_SOCIAL_TWITTER_CREATOR', '@gigaoindio'); // TWITTER DO CRIADOR
define('CONF_SEO_SOCIAL_TWITTER_PUBLISHER', '@gigaoindio'); // TWITTER DA EMPRESA
define('CONF_SEO_SOCIAL_FACEBOOK_APP', '2913574285329244'); // FACEBOOK APP ID
define('CONF_SEO_SOCIAL_FACEBOOK_PAGE', 'Gabriel-Antunes-102193508004360'); // PAGINA NO FACEBOOK
define('CONF_SEO_SOCIAL_FACEBOOK_AUTHOR', 'gabriel.broetto');