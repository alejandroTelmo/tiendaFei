<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente_domicilio".
 *
 * @property int $cliente_id
 * @property int $domicilio_id
 *
 * @property Cliente $cliente
 * @property Domicilio $domicilio
 */
class ClienteDomicilio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente_domicilio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id', 'domicilio_id'], 'required'],
            [['cliente_id', 'domicilio_id'], 'integer'],
            [['cliente_id', 'domicilio_id'], 'unique', 'targetAttribute' => ['cliente_id', 'domicilio_id']],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_id' => 'id']],
            [['domicilio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Domicilio::className(), 'targetAttribute' => ['domicilio_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cliente_id' => 'Cliente ID',
            'domicilio_id' => 'Domicilio ID',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery|ClienteQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'cliente_id']);
    }

    /**
     * Gets query for [[Domicilio]].
     *
     * @return \yii\db\ActiveQuery|DomicilioQuery
     */
    public function getDomicilio()
    {
        return $this->hasOne(Domicilio::className(), ['id' => 'domicilio_id']);
    }

    /**
     * {@inheritdoc}
     * @return ClienteDomicilioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClienteDomicilioQuery(get_called_class());
    }
}
