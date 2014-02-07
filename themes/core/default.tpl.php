<!doctype html>
<html lang='en'> 
<head>
  <meta charset='utf-8'/>
  <title><?=$title?></title>
  <link rel='shortcut icon' href='<?=$favicon?>'/>
  <link rel='stylesheet' href='<?=$stylesheet?>'/>
</head>
<body>
<div id="wrapper">
    <div id='header'>
      <div id='login-menu'>
        <?=login_menu()?>
      <div id='banner'>
        <p class='site-title'><a href='<?=base_url()?>'><?=$header?></a></p>
      </div>
    </div>
  </div>
    <div id='main' role='main'>
      <?=get_messages_from_session()?>
      <?=@$main?>
      <?=render_views()?>
    </div></div>
    <div id='footer'>
      <?=$footer?>
      <?=get_debug()?>
    </div>
</body>
</html> 