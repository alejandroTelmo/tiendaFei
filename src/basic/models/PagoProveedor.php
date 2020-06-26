<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagoProveedor".
 *
 * @property int $id
 * @property string|null $fecha
 * @property int $id_compra
 *
 * @property Compra $compra
 */
class PagoProveedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagoProveedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['id_compra'], 'required'],
            [['id_compra'], 'integer'],
            [['id_compra'], 'exist', 'skipOnError' => true, 'targetClass' => Compra::className(), 'targetAttribute' => ['id_compra' => 'id']],
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
            'id_compra' => 'Id Compra',
        ];
    }

    /**
     * Gets query for [[Compra]].
     *
     * @return \yii\db\ActiveQuery|CompraQuery
     */
    public function getCompra()
    {
        return $this->hasOne(Compra::className(), ['id' => 'id_compra']);
    }

    /**
     * {@inheritdoc}
     * @return PagoProveedorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PagoProveedorQuery(get_called_class());
    }
}
