<?php

namespace simonmesmith\anonymoususer\models;
use Yii;

/**
 * This is the model class for table "tbl_anonymous_user".
 *
 * @property integer $id
 * @property string $created
 * @property string $ip_address
 */
class AnonymousUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_anonymous_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created', 'ip_address'], 'required'],
            [['created'], 'safe'],
            [['ip_address'], 'string', 'max' => 39]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'created' => Yii::t('app', 'Created'),
            'ip_address' => Yii::t('app', 'Ip Address'),
        ];
    }
}