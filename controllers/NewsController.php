<?php
class NewsController
{
    public function actionIndex()
    {
        echo 'Список новостей';
        return true;
    }
    public function actionView()
    {
        echo 'Просмотр одной новости';
        return true;
    }

}