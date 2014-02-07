<?php
/**
 * Helpers for theming, available for all themes in their template files and functions.php.
 * This file is included right before the themes own functions.php
 */
 

/**
 * Print debuginformation from the framework.
 */
function get_debug() {
  // Only if debug is wanted.
  $ml = CMad::Instance();  
  if(empty($ml->config['debug'])) {
    return;
  }
  
  // Get the debug output
  $html = null;
  if(isset($ml->config['debug']['timer']) && $ml->config['debug']['timer']) {
    $now = microtime(true);
    $flash = $ml->session->GetFlash('timer');
    $redirect = $flash ? round($flash['redirect'] - $flash['first'], 5)*1000 . ' msecs + x + ' : null;
    $total = $flash ? round($now - $flash['first'], 5)*1000 . ' msecs. Per page: ' : null;
    $html .= "<p>Page was loaded in {$total}{$redirect}" . round($now - $ml->timer['first'], 5)*1000 . " msecs.</p>";
  }    
  if(isset($ml->config['debug']['memory']) && $ml->config['debug']['memory']) {
    $flash = $ml->session->GetFlash('memory');
    $flash = $flash ? round($flash/1024/1024, 2) . ' Mbytes + ' : null;
    $html .= "<p>Peek memory consumption was $flash" . round(memory_get_peak_usage(true)/1024/1024, 2) . " Mbytes.</p>";
  }    
  if(isset($ml->config['debug']['db-num-queries']) && $ml->config['debug']['db-num-queries'] && isset($ml->db)) {
    $flash = $ml->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $ml->db->GetNumQueries() . " queries.</p>";
  }    
  if(isset($ml->config['debug']['db-queries']) && $ml->config['debug']['db-queries'] && isset($ml->db)) {
    $flash = $ml->session->GetFlash('database_queries');
    $queries = $ml->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    if(!empty($queries)) {
      $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
    }
  }    
  if(isset($ml->config['debug']['mad']) && $ml->config['debug']['mad']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CMad:</p><pre>" . htmlent(print_r($ml, true)) . "</pre>";
  }    
  if(isset($ml->config['debug']['session']) && $ml->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CMad->session:</p><pre>" . htmlent(print_r($ml->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }    
  return "<div class='debug'>$html</div>";
}


/**
 * Get messages stored in flash-session.
 */
function get_messages_from_session() {
  $messages = CMad::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}


/**
 * Login menu. Creates a menu which reflects if user is logged in or not.
 */
function login_menu() {
  $ml = CMad::Instance();
  if($ml->user['isAuthenticated']) {
    $items = "<a href='" . create_url('user/profile') . "'><img class='gravatar' src='" . get_gravatar(20) . "' alt=''> " . $ml->user['acronym'] . "</a> ";
    if($ml->user['hasRoleAdministrator']) {
      $items .= "<a href='" . create_url('acp') . "'>acp</a> ";
    }
    $items .= "<a href='" . create_url('user/logout') . "'>logout</a> ";
  } else {
    $items = "<a href='" . create_url('user/login') . "'>login</a> ";
  }
  return "<nav id='login-menu'>$items</nav>";
}


/**
 * Get a gravatar based on the user's email.
 */
function get_gravatar($size=null) {
  return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim(CMad::Instance()->user['email']))) . '.jpg?r=pg&amp;d=wavatar&amp;' . ($size ? "s=$size" : null);
}


/**
 * Get language as defined in config.
 *
 * @returns string the language.
 */
function get_language() {
  return CMad::Instance()->config['language'];
}


/**
 * Escape data to make it safe to write in the browser.
 *
 * @param $str string to escape.
 * @returns string the escaped string.
 */
function esc($str) {
  return htmlEnt($str);
}


/**
 * Filter data according to a filter. Uses CMContent::Filter()
 *
 * @param $data string the data-string to filter.
 * @param $filter string the filter to use.
 * @returns string the filtered string.
 */
function filter_data($data, $filter) {
  return CMContent::Filter($data, $filter);
}


/**
 * Display diff of time between now and a datetime. 
 *
 * @param $start datetime|string
 * @returns string
 */
function time_diff($start) {
  return formatDateTimeDiff($start);
}


/**
 * Prepend the base_url.
 */
function base_url($url=null) {
  return CMad::Instance()->request->base_url . trim($url, '/');
}


/**
 * Create a url to an internal resource.
 *
 * @param string the whole url or the controller. Leave empty for current controller.
 * @param string the method when specifying controller as first argument, else leave empty.
 * @param string the extra arguments to the method, leave empty if not using method.
 */
function create_url($urlOrController=null, $method=null, $arguments=null) {
  return CMad::Instance()->CreateUrl($urlOrController, $method, $arguments);
}


/**
 * Prepend the theme_url to non-absolute urls, theme_url is the url to the current theme directory.
 *
 * @param $url string the url-part to prepend.
 * @returns string the absolute url.
 */
function theme_url($url) {
  if(!empty($url) && $url[0] == '/') 
    return create_url(CMad::Instance()->request->site_url . "/{$url}");
  return create_url(CMad::Instance()->themeUrl . "/{$url}");
}


/**
 * Prepend the theme_parent_url to non-absolute urls, theme_parent_url is the url to the parent theme directory.
 *
 * @param $url string the url-part to prepend.
 * @returns string the absolute url.
 */
function theme_parent_url($url) {
  if(!empty($url) && $url[0] == '/') 
    return create_url(CMad::Instance()->request->site_url . "/{$url}");
  return create_url(CMad::Instance()->themeParentUrl . "/{$url}");
}


/**
 * Return the current url.
 */
function current_url() {
  return CMad::Instance()->request->current_url;
}


/**
 * Render all views.
 *
 * @param $region string the region to draw the content in.
 */
function render_views($region='default') {
  return CMad::Instance()->views->Render($region);
}


/**
 * Check if region has views. Accepts variable amount of arguments as regions.
 *
 * @param $region string the region to draw the content in.
 */
function region_has_content($region='default' /*...*/) {
  return CMad::Instance()->views->RegionHasView(func_get_args());
}