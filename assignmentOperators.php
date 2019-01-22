<?php

$tag = 'PHP Eğitim Kitabı';

$author = 'Mehmet Ali';
$author .= 'UYSAL';

$copyright = '©' . 2018;

$publisher = 'Dikey Eksen Yayıncılık';
$publisher .= "\n";
$publisher .= 'Dikeyeksen Yayın Dağıtım Yazılım ve Eğitim Hizm.';
$publisher .= "\n";
$publisher .= $copyright;

$text = $tag . "\n" . $author . "\n" . $publisher;

echo $text;
