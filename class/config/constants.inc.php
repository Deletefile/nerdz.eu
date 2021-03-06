<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/class/config.class.php';
$class = new confClass();

#begin postgresql constants
define('POSTGRESQL_HOST',$class->postgresql_host);
define('POSTGRESQL_DATA_NAME',$class->postgresql_db);
define('POSTGRESQL_USER',$class->postgresql_user);
define('POSTGRESQL_PASS',$class->postgresql_pass);
define('POSTGRESQL_DUP_KEY',7);
define('POSTGRESQL_PORT',$class->postgresql_port);
#end postgresql constants

#begin user constants
#length
define('MIN_LENGTH_USER',$class->length_user);
define('MIN_LENGTH_PASS',$class->length_pass);
define('MIN_LENGTH_NAME',$class->length_name);
define('MIN_LENGTH_SURNAME',$class->length_surname);

#captcha constant
define('CAPTCHA_LEVEL',$class->captcha_level);

#site features
define('SITE_HOST',$class->site_host);
define('STATIC_DOMAIN',$class->static_domain);

#mail features
define('SMTP_SERVER',$class->SMTP);
define('SMTP_PORT',$class->smtp_port);
define('SMTP_USER',$class->smtp_user);
define('SMTP_PASS',$class->smtp_pass);

# redis options
define('REDIS_ENABLED', $class->redis_enabled);

# minification options
define('MINIFICATION_ENABLED', $class->do_minification);
define('MINIFICATION_JS_CMD',  $class->js_min_cmd);
define('MINIFICATION_CSS_CMD', $class->css_min_cmd);

#special profiles
define('USERS_NEWS',1643);
define('DELETED_USERS',1644);

?>
