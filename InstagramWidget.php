<?php
namespace skeeks\cms\instagram\widget;

use skeeks\cms\base\WidgetRenderable;
use skeeks\cms\components\Cms;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

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
    public $tag;
    public $showBy = 'user';
    public $error_message;

    public $width = 260;
    public $imgWidth = 0;
    public $inline = 4;
    public $isShowToolbar = true;
    public $count;
    public $imgRes = 'thumbnail';

    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => 'Виджет фотографий из Instagram'
        ]);
    }

    public function renderConfigForm(ActiveForm $form)
    {
        echo \Yii::$app->view->renderFile(__DIR__ . '/views/_settingsForm.php', [
            'form'  => $form,
            'model' => $this
        ], $this);
    }


    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),
            [
                'clientId' => 'CLIENT ID для доступа к API',
                'userName' => 'Имя пользователя Instagram',
                'tag' => 'Тэг',
                'showBy' => 'Показывать фотографии',
                'width' => 'Ширина виджета (px)',
                'isShowToolbar' => 'Показывать блок с информацией (при выводе по тэгу не показывается)',
                'count' => 'Сколько фотографий показывать',
                'imgRes' => 'Разрешение изображений',
            ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),
            [
                [['isShowToolbar'], 'boolean'],
                [['width', 'imgWidth', 'inline', 'count'], 'number'],
                [['clientId', 'userName', 'tag', 'showBy', 'imgRes'], 'safe'],
            ]);
    }

    /**
     * @return string
     */
    protected function _run()
    {
        $this->width -= 2;

        if ($this->width > 0) {
            $this->imgWidth = round(($this->width - (17 + (9 * $this->inline))) / $this->inline);
        }

        if ($this->showBy == 'tag') {
            $this->isShowToolbar = false;
        }

        $instagram = \Yii::$app->instagramComponent;

        $instagram->setClientId($this->clientId);
        $instagram->setCount($this->count);

        if ($this->showBy == 'user') {
            $instagram->setUserName($this->userName);
            $this->user = $instagram->findUser();
            $this->media = $instagram->findMediaByUser();
        } elseif ($this->showBy == 'tag') {
            $instagram->setTag($this->tag);
            $this->media = $instagram->findMediaByTag();
        }

        if (empty($this->userName)) {
            $this->userName = $instagram->userName;
        }

        $this->error_message = $instagram->error_message;

        return parent::_run();
    }
}