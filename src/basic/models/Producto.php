<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property int|null $stock
 * @property int|null $precioVenta
 *
 * @property CarritoProducto[] $carritoProductos
 * @property Carrito[] $carritos
 * @property Compra[] $compras
 * @property CompraProducto[] $compraProductos
 * @property Compra[] $compras0
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stock', 'precioVenta'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'stock' => 'Stock',
            'precioVenta' => 'Precio Venta',
        ];
    }

    /**
     * Gets query for [[CarritoProductos]].
     *
     * @return \yii\db\ActiveQuery|CarritoProductoQuery
     */
    public function getCarritoProductos()
    {
        return $this->hasMany(CarritoProducto::className(), ['producto_id' => 'id']);
    }

    /**
     * Gets query for [[Carritos]].
     *
     * @return \yii\db\ActiveQuery|CarritoQuery
     */
    public function getCarritos()
    {
        return $this->hasMany(Carrito::className(), ['id' => 'carrito_id'])->viaTable('carrito_producto', ['producto_id' => 'id']);
    }

    /**
     * Gets query for [[Compras]].
     *
     * @return \yii\db\ActiveQuery|CompraQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['id_producto' => 'id']);
    }

    /**
     * Gets query for [[CompraProductos]].
     *
     * @return \yii\db\ActiveQuery|CompraProductoQuery
     */
    public function getCompraProductos()
    {
        return $this->hasMany(CompraProducto::className(), ['producto_id' => 'id']);
    }

    /**
     * Gets query for [[Compras0]].
     *
     * @return \yii\db\ActiveQuery|CompraQuery
     */
    public function getCompras0()
    {
        return $this->hasMany(Compra::className(), ['id' => 'compra_id'])->viaTable('compra_producto', ['producto_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductoQuery(get_called_class());
    }
}
