<?php
namespace skeeks\cms\instagram\widget;

use skeeks\cms\base\WidgetRenderable;
use skeeks\cms\components\Cms;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * @property string $jsonOptions
 *
 * Class InstagramWidget
 * @package skeeks\cms\instagram\widget
 */
class InstagramWidget extends WidgetRenderable
{
    public $clientId;
    public $userName;
    public $media;
    public $user;
    public $error_message;

    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => 'Виджет фотографий из Instagram'
        ]);
    }

    /**
     * Файл с формой настроек, по умолчанию
     *
     * @return string
     */
    public function getConfigFormFile()
    {
        $class = new \ReflectionClass($this->className());
        return dirname($class->getFileName()) . DIRECTORY_SEPARATOR . 'views/_settingsForm.php';
    }


    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),
            [
                'clientId' => 'CLIENT ID для доступа к API',
                'userName' => 'Имя пользователя, фотографии которого показывать',
            ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),
            [
                [['clientId', 'userName'], 'safe'],
            ]);
    }

    /**
     * @return string
     */
    protected function _run()
    {
        \Yii::$app->instagramComponent->init($this->userName, $this->clientId);
        $this->user = \Yii::$app->instagramComponent->findUser();
        $this->media = \Yii::$app->instagramComponent->findMediaByUser();
        $this->error_message = \Yii::$app->instagramComponent->error_message;
        return parent::_run();
    }
}