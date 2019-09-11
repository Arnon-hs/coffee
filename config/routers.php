<?php
return array(
    'news/([0-9]+)'=>'news/view',
    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news'=>'news/index',
    'products'=>'product/list',
);
?>