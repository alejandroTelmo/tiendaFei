<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facturacion".
 *
 * @property int $id
 * @property string|null $tipo
 *
 * @property Venta[] $ventas
 */
class Facturacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'facturacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery|VentaQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['id_facturacion' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return FacturacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FacturacionQuery(get_called_class());
    }
}
