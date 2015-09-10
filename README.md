Виджет фотографий из Instagram для Skeeks CMS
===================================

Информация
-------------------

Виджет фотографий из Instagram

Установка
------------


1) Добавить в `composer.json` файл проекта.

```
"rusoft/skeeks-cms-instagram-widget": "*"
```

2) Запуск миграций и необходимых установок.

```
php yii cms/update
```

3) Пример использования

```php

<?= \skeeks\cms\instagram\widget\InstagramWidget::widget([
    'clientId' => 'Your-api-client-id',
    'userName' => 'shnurovs'
]); ?>

```


> [![skeeks!](https://gravatar.com/userimage/74431132/13d04d83218593564422770b616e5622.jpg)](http://www.skeeks.com)  
<i>Быстро, просто, эффективно</i>
[cms.skeeks.com](http://cms.skeeks.com)