<?php
/**
 * All requests routed through here. This is an overview of what actaully happens during
 * a request.
 *
 * @package MadCore
 */

// ---------------------------------------------------------------------------------------
//
// PHASE: BOOTSTRAP
//
define('MAD_INSTALL_PATH', dirname(__FILE__));
define('MAD_SITE_PATH', MAD_INSTALL_PATH . '/site');

require(MAD_INSTALL_PATH.'/src/bootstrap.php');

$ml = CMad::Instance();


// ---------------------------------------------------------------------------------------
//
// PHASE: FRONTCONTROLLER ROUTE
//
$ml->FrontControllerRoute();


// ---------------------------------------------------------------------------------------
//
// PHASE: THEME ENGINE RENDER
//
$ml->ThemeEngineRender(); 