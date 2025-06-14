<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=footer.first
[END_COT_EXT]
==================== */
defined('COT_CODE') or die('Wrong URL');

$theme = Cot::$cfg['plugin']['prismhighlight']['theme'] ?? 'default';
$use_cdn = Cot::$cfg['plugin']['prismhighlight']['use_cdn'] ?? 0;
$languages = Cot::$cfg['plugin']['prismhighlight']['languages'] ?? ['markup', 'css', 'clike', 'javascript'];

// Нормализуем путь
$plugin_dir = rtrim(Cot::$cfg['plugins_dir'], '/');

if ($use_cdn) {
    Resources::linkFile("https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-{$theme}.min.css", 'css', 50);
    Resources::linkFileFooter("https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js", 'js', 50);
    foreach ($languages as $lang) {
        Resources::linkFileFooter("https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-{$lang}.min.js", 'js', 50);
    }
} else {
    Resources::linkFile("{$plugin_dir}/prismhighlight/lib/prism-{$theme}.css", 'css', 50);
    Resources::linkFileFooter("{$plugin_dir}/prismhighlight/lib/prism.js", 'js', 50);
    foreach ($languages as $lang) {
        if (file_exists("{$plugin_dir}/prismhighlight/lib/prism-{$lang}.js")) {
            Resources::linkFileFooter("{$plugin_dir}/prismhighlight/lib/prism-{$lang}.js", 'js', 50);
        }
    }
}

Resources::linkFileFooter("{$plugin_dir}/prismhighlight/js/prism-start.js", 'js', 50);