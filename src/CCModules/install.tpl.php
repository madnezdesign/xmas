<h2>Install modules</h2>

<p>The following modules were affected by this action.</p>

<table id="min">
<caption>Results from installing modules.</caption>
<thead>
  <tr><th>Module</th><th>Result</th></tr>
</thead>
<tbody>
<?php foreach($modules as $module): ?>
  <tr><td><?=$module['name']?></td><td><div class='<?=$module['result'][0]?>'><?=$module['result'][1]?></div></td></tr>
<?php endforeach; ?>
</tbody>
</table>