<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'elquiweb_soluciones-pedagogicas');
/** Tu nombre de usuario de MySQL */
define('DB_USER', 'elquiweb_usergen');
/** Tu contraseña de MySQL */
define('DB_PASSWORD', ']LN%,rWgHd$@');
/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');
/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');
/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');
/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'T0-o55(V[bUxl]xJegM^8w:Z|d0d)B3f-cvK7nYD3BbZqA?f#+tCH,TYS*t53y04'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', '_QY(bUpoqs9Q(3du+XDRGVInMA!Y9wx=FD{.PNi~M+?~<?cU*h*Y5FWh4k~5LFBN'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', ',$nGV{oUP -Cx[=QztUf|n#E0NKKpr=cX2d5?9zhH5 (a0vrw`Ynmz|C=i^hhrvd'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', '* aqD2d|KVjFv^]6=sS<Tkt+yhIg>I&P4+dfS`N*`eBD[mV`B$-#LwXU*tDmo%p&'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'z-f<+|:J;B-^sB6D:R+7If(wn40n7+8VX:qNs@J/hQ$NdHL5;x7KCbvHHHC2FF2*'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', '`7sB9#~hS0Tk?IPs0*0`C)91=eq>)RPz|[m~;p1:w=(BNZyk:YD<55+jJ$5qu!jV'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'zMuO6e)ks9({[*SBNo-B*Dj-:t92`q/sF$_N07JHzvrSP#0XS_+{~{h{yHAKywb$'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', 'A& &!:YG3Jen%qx-Wu|&nAs|;%|sS_v-WMJt|bR=P52Q<c*)ML03Mwl2=2[![-JV'); // Cambia esto por tu frase aleatoria.
/**#@-*/
/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';
/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');
/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);
/* ¡Eso es todo, deja de editar! Feliz blogging */
/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>