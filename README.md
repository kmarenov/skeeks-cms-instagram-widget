Виджет фотографий из Instagram для Skeeks CMS
===================================

Информация
-------------------

Виджет фотографий из Instagram

Установка
------------


1) Добавить в `composer.json` файл проекта.

```
"kmarenov/skeeks-cms-instagram-widget": "*"
```

2) Запуск миграций и необходимых установок.

```
php yii cms/update
```

3) Пример использования

```php

<?= \skeeks\cms\instagram\widget\InstagramWidget::widget([
    'accessToken' => 'Your-api-access-token',
    'userId' => 456931526
]); ?>

```


> [![skeeks!](https://gravatar.com/userimage/74431132/13d04d83218593564422770b616e5622.jpg)](http://www.skeeks.com)  
<i>Быстро, просто, эффективно</i>
[cms.skeeks.com](http://cms.skeeks.com)