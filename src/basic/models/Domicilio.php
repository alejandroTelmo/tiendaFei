<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "domicilio".
 *
 * @property int $id
 * @property string|null $calle
 * @property int|null $numero
 * @property string|null $ciudad
 * @property string|null $provincia
 * @property string|null $codPostal
 *
 * @property Cliente[] $clientes
 */
class Domicilio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'domicilio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero'], 'integer'],
            [['calle', 'ciudad', 'provincia', 'codPostal'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'calle' => 'Calle',
            'numero' => 'Numero',
            'ciudad' => 'Ciudad',
            'provincia' => 'Provincia',
            'codPostal' => 'Cod Postal',
        ];
    }

    /**
     * Gets query for [[Clientes]].
     *
     * @return \yii\db\ActiveQuery|ClienteQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['id_domicilio' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return DomicilioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DomicilioQuery(get_called_class());
    }
}
