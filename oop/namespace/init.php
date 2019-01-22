<?php


require_once 'App/Tools/DataTypes/Str.php';

use App\Tools\DataTypes\{Str as StrTool,Number as NumberTool};

echo StrTool::rand(10),'<br>';

echo App\Tools\DataTypes\Str::rand(10);

die();


require 'library1.php';

use App\Data\Info as AppInfo;

echo AppInfo\NAME, '<br>';
echo AppInfo\learning(), '<br>';
echo AppInfo\Organization::getAuthor(), ' / ', AppInfo\Organization::getBookStore();
