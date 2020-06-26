<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrito".
 *
 * @property int $id
 * @property int|null $cantidad
 * @property string|null $fecha
 * @property int|null $totalCarrito
 * @property int $id_cliente
 *
 * @property Cliente $cliente
 * @property CarritoProducto[] $carritoProductos
 * @property Producto[] $productos
 * @property Venta[] $ventas
 */
class Carrito extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cantidad', 'totalCarrito', 'id_cliente'], 'integer'],
            [['fecha'], 'safe'],
            [['id_cliente'], 'required'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cantidad' => 'Cantidad',
            'fecha' => 'Fecha',
            'totalCarrito' => 'Total Carrito',
            'id_cliente' => 'Id Cliente',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery|ClienteQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }

    /**
     * Gets query for [[CarritoProductos]].
     *
     * @return \yii\db\ActiveQuery|CarritoProductoQuery
     */
    public function getCarritoProductos()
    {
        return $this->hasMany(CarritoProducto::className(), ['carrito_id' => 'id']);
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery|ProductoQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['id' => 'producto_id'])->viaTable('carrito_producto', ['carrito_id' => 'id']);
    }

    /**
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery|VentaQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['id_carrito' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CarritoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarritoQuery(get_called_class());
    }
}
