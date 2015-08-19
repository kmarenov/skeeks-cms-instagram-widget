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
    public $accessToken;
    public $userId;
    public $data;

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
                'accessToken' => 'Access Token',
                'userId' => 'ID пользователя',
            ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),
            [
                [['accessToken'], 'string'],
                [['userId'], 'integer'],
                [['accessToken', 'userId'], 'required'],
            ]);
    }

    /**
     * @return string
     */
    protected function _run()
    {
        $userId = 0;
        $accessToken = '';

        if (!empty($this->accessToken)) {
            $accessToken = $this->accessToken;
        }

        if (!empty($this->userId))
        {
            $userId = $this->userId;
        }

        $this->data = \Yii::$app->instagramComponent->fetchData($userId, $accessToken);
        return parent::_run();
    }
}