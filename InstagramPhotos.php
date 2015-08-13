<?php
namespace skeeks\cms\instagram\photos;

use skeeks\cms\base\WidgetRenderable;
use skeeks\cms\components\Cms;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * @property string $jsonOptions
 *
 * Class InstagramPhotos
 * @package skeeks\cms\instagram\photos
 */
class InstagramPhotos extends WidgetRenderable
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
        $this->data = $this->fetchData($this->accessToken, $this->userId);
        return parent::_run();
    }

    /**
     * @return array
     */
    function fetchData($accessToken, $userId){

        $result = array();

        if(empty($accessToken)||empty($userId))
        {
            return $result;
        }

        $url = "https://api.instagram.com/v1/users/".$userId."/media/recent?access_token=".$accessToken;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $json = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($json,true);

        return $result;
    }
}