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
define('DB_NAME', 'szartdea_artbol');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'szartdea_user');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'Tomorrow2014');

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
define('AUTH_KEY', 'pJx;=j?ziVUaA=/vzKDx0BC,u]70+&Nk[iwQMTa5kk.:w/8@|1-5EGO&~kvcU=x)'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'Yf4up6g$9F67F?BTdeNuvjrMr%/Ol5u@xW_pJ)@I+s29es8dR8tbuuxv<h&+pCfd'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'k<?G@u^`xgv/VF*y$<y)}nB%4a:7y%n`jd6=}JJD~#Yr8XhJbql<l4qg}5V8:x9b'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', '),bdI5Vj`9jc5/J3Z$j9By%fdSPk.te;0=A?iUx%55O6UOW$y<kI}$Ibw>,u(eR$'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'GxUUrCP9cU(yJL4eL~pJ|1sW=6x8+(_Oc{hPC%B&(s|1YCfx=5Y^Q@Fd83Glm&dz'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', ')KQc5Jr:j_%nfHm6U)>1(]T1ytof+2w( 0z:?gQo<OoZQ%,IVBY*d+5{dUUbd))4'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'zPMrF9wn{=7fG-N,Mmg3yCy^x<|Wr]_Zrqg+Va>@P0{gU!`@<BT24{(beHoT;m*5'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '3Ce+q%e[G3MP`_fBEn3=^;<gjacfrt}S6;rXN*~7Tk?WPX!r-F{F$h;dsgBAjG;p'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


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

