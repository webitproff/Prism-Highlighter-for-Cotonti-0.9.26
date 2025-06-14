<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=footer.first
[END_COT_EXT]
==================== */
defined('COT_CODE') or die('Wrong URL');

$theme = Cot::$cfg['plugin']['prismhighlight']['theme'] ?? 'okaidia';


$plugin_dir = rtrim(Cot::$cfg['plugins_dir'], '/');

Resources::linkFile("{$plugin_dir}/prismhighlight/lib/prism.css", 'css', 20);
Resources::linkFile("{$plugin_dir}/prismhighlight/lib/{$theme}.css", 'css', 50);
Resources::linkFileFooter("{$plugin_dir}/prismhighlight/lib/prism.js", 'js', 50);

Resources::linkFileFooter("{$plugin_dir}/prismhighlight/js/prism-start.js", 'js', 50);
