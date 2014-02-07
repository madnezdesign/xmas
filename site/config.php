<?php
/**
 * Site configuration, this file is changed by user per site.
 *
 */

/**
 * Set level of error reporting
 */
error_reporting(-1);
ini_set('display_errors', 1);


/**
 * Set what to show as debug or developer information in the get_debug() theme helper.
 */
$ml->config['debug']['mad'] = false;
$ml->config['debug']['session'] = false;
$ml->config['debug']['timer'] = true;
$ml->config['debug']['db-num-queries'] = true;
$ml->config['debug']['db-queries'] = true;


/**
 * Set database(s).
 */
$ml->config['database'][0]['dsn'] = 'sqlite:' . MAD_SITE_PATH . '/data/.ht.sqlite';


/**
 * What type of urls should be used?
 * 
 * default      = 0      => index.php/controller/method/arg1/arg2/arg3
 * clean        = 1      => controller/method/arg1/arg2/arg3
 * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
 */
$ml->config['url_type'] = 1;


/**
 * Set a base_url to use another than the default calculated
 */
$ml->config['base_url'] = null;


/**
 * How to hash password of new users, choose from: plain, md5salt, md5, sha1salt, sha1.
 */
$ml->config['hashing_algorithm'] = 'sha1salt';


/**
 * Allow or disallow creation of new user accounts.
 */
$ml->config['create_new_users'] = true;


/**
 * Define session name
 */
$ml->config['session_name'] = preg_replace('/[:\.\/-_]/', '', __DIR__);
$ml->config['session_key']  = 'mad';


/**
 * Define server timezone
 */
$ml->config['timezone'] = 'Europe/Stockholm';


/**
 * Define internal character encoding
 */
$ml->config['character_encoding'] = 'UTF-8';


/**
 * Define language
 */
$ml->config['language'] = 'en';


/**
 * Define the controllers, their classname and enable/disable them.
 *
 * The array-key is matched against the url, for example: 
 * the url 'developer/dump' would instantiate the controller with the key "developer", that is 
 * CCDeveloper and call the method "dump" in that class. This process is managed in:
 * $ml->FrontControllerRoute();
 * which is called in the frontcontroller phase from index.php.
 */
$ml->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
  'content'   => array('enabled' => true,'class' => 'CCContent'),
  'blog'      => array('enabled' => true,'class' => 'CCBlog'),
  'page'      => array('enabled' => true,'class' => 'CCPage'),
  'user'      => array('enabled' => true,'class' => 'CCUser'),
  'acp'       => array('enabled' => true,'class' => 'CCAdminControlPanel'),
  'theme'     => array('enabled' => true,'class' => 'CCTheme'),
  'module'    => array('enabled' => true,'class' => 'CCModules'),
  'my'        => array('enabled' => true,'class' => 'CCMycontroller'),
);

/**
 * Define a routing table for urls.
 *
 * Route custom urls to a defined controller/method/arguments
 */
$ml->config['routing'] = array(
  'home' => array('enabled' => true, 'url' => 'index/index'),
);

/**
 * Define menus.
 *
 * Create hardcoded menus and map them to a theme region through $ml->config['theme'].
 */
$ml->config['menus'] = array(
    'navbar' => array(
    'home'      => array('label'=>'Home',      'url'=>'home'),
    'modules'   => array('label'=>'Modules',   'url'=>'module'),
    'content'   => array('label'=>'Content',   'url'=>'content'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'guestbook'),
    'blog'      => array('label'=>'Blog',      'url'=>'blog'),
	'home'      => array('label'=>'About Me', 'url'=>'my/index'),
    'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'), 
  ),
  'my-navbar' => array(/*
    'home'      => array('label'=>'About Me',  'url'=>'my'),
    'blog'      => array('label'=>'My Blog',   'url'=>'my/blog'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),*/
  ),
);

    /**
    * Settings for the theme. The theme may have a parent theme.
    *
    * When a parent theme is used the parent's functions.php will be included before the current
    * theme's functions.php. The parent stylesheet can be included in the current stylesheet
    * by an @import clause. See site/themes/mytheme for an example of a child/parent theme.
    * Template files can reside in the parent or current theme, the CLydia::ThemeEngineRender()
    * looks for the template-file in the current theme first, then it looks in the parent theme.
    *
    * There are two useful theme helpers defined in themes/functions.php.
    *  theme_url($url): Prepends the current theme url to $url to make an absolute url.
    *  theme_parent_url($url): Prepends the parent theme url to $url to make an absolute url.
    *
    * path: Path to current theme, relativly LYDIA_INSTALL_PATH, for example themes/grid or site/themes/mytheme.
    * parent: Path to parent theme, same structure as 'path'. Can be left out or set to null.
    * stylesheet: The stylesheet to include, always part of the current theme, use @import to include the parent stylesheet.
    * template_file: Set the default template file, defaults to default.tpl.php.
    * regions: Array with all regions that the theme supports.
    * data: Array with data that is made available to the template file as variables.
    *
    * The name of the stylesheet is also appended to the data-array, as 'stylesheet' and made
    * available to the template files.
    */
    $ml->config['theme'] = array(
      'path'            => 'site/themes/mytheme',
    //'path'            => 'themes/grid',
      'parent'          => 'themes/grid',
      'stylesheet'      => 'style.css',
      'template_file'   => 'index.tpl.php',
      'regions' => array('navbar','site-menu','flash','featured-first','featured-middle','featured-last',
        'primary','sidebar','triptych-first','triptych-middle','triptych-last',
        'footer-column-one','footer-column-two','footer-column-three','footer-column-four',
        'footer',
      ),
    'region_to_menu' => array('site-menu'=>'my-navbar', 'navbar'=>'navbar'),
  'data' => array(
    'header'      => 'MAD',
    'slogan'      => 'A PHP-based MVC-inspired CMF',
    'favicon'     => 'favicon.ico',
    'logo'        => 'header.png',
    'logo_width'  => 200,
    'logo_height' => 200,
    'footer'      => '<p>Mad &copy; by Madeleine Lindberg</p>',
      ),
    ); 