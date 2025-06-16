<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=forums.posts.main
[END_COT_EXT]
==================== */
defined('COT_CODE') or die('Wrong URL');

$prismTheme = Cot::$cfg['plugin']['prismhighlight']['theme'] ?? 'okaidia';

Resources::addFile(Cot::$cfg['plugins_dir'] . '/prismhighlight/lib/prism.css', 'css', 220);

$themeFile = Cot::$cfg['plugins_dir'] . '/prismhighlight/lib/' . $prismTheme . '.css';
if (file_exists($themeFile)) {
    Resources::addFile($themeFile, 'css', 250);
}
Resources::linkFileFooter(Cot::$cfg['plugins_dir'] . '/prismhighlight/lib/prism.js', 'js', 250);
Resources::linkFileFooter(Cot::$cfg['plugins_dir'] . '/prismhighlight/js/prism-start.js', 'js', 250);
