<?php
$js_url = get_template_directory_uri() . '/bundle.js';
$deploy_timestamp = windycoys_get_deploy_timestamp();
if ($deploy_timestamp) {
  $js_url .= '?t=' . $deploy_timestamp;
}
?>
<script type="text/javascript" src="<?php echo $js_url ?>"></script>
