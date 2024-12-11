<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medewerker".
 *
 * @property int $id
 * @property string $naam
 */
class Medewerker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medewerker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['naam'], 'required'],
            [['naam'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'naam' => 'Naam',
        ];
    }
}
