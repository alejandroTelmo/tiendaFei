<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compra_producto".
 *
 * @property int $compra_id
 * @property int $producto_id
 *
 * @property Compra $compra
 * @property Producto $producto
 */
class CompraProducto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compra_producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['compra_id', 'producto_id'], 'required'],
            [['compra_id', 'producto_id'], 'integer'],
            [['compra_id', 'producto_id'], 'unique', 'targetAttribute' => ['compra_id', 'producto_id']],
            [['compra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Compra::className(), 'targetAttribute' => ['compra_id' => 'id']],
            [['producto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['producto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'compra_id' => 'Compra ID',
            'producto_id' => 'Producto ID',
        ];
    }

    /**
     * Gets query for [[Compra]].
     *
     * @return \yii\db\ActiveQuery|CompraQuery
     */
    public function getCompra()
    {
        return $this->hasOne(Compra::className(), ['id' => 'compra_id']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery|ProductoQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'producto_id']);
    }

    /**
     * {@inheritdoc}
     * @return CompraProductoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompraProductoQuery(get_called_class());
    }
}
