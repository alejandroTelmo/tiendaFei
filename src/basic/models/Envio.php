<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "envio".
 *
 * @property int $id
 * @property string|null $fecha
 * @property int|null $bultos
 * @property int $id_venta
 *
 * @property Venta $venta
 */
class Envio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'envio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['bultos', 'id_venta'], 'integer'],
            [['id_venta'], 'required'],
            [['id_venta'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::className(), 'targetAttribute' => ['id_venta' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'bultos' => 'Bultos',
            'id_venta' => 'Id Venta',
        ];
    }

    /**
     * Gets query for [[Venta]].
     *
     * @return \yii\db\ActiveQuery|VentaQuery
     */
    public function getVenta()
    {
        return $this->hasOne(Venta::className(), ['id' => 'id_venta']);
    }

    /**
     * {@inheritdoc}
     * @return EnvioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnvioQuery(get_called_class());
    }
}
