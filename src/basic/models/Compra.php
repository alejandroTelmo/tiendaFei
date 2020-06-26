<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compra".
 *
 * @property int $id
 * @property float|null $costo
 * @property int|null $cantidad
 * @property string|null $fecha
 * @property int|null $numRemito
 * @property int $id_proveedor
 * @property int $id_producto
 * @property int $id_tipos_pagos
 *
 * @property Producto $producto
 * @property Proveedor $proveedor
 * @property TiposDePago $tiposPagos
 * @property CompraProducto[] $compraProductos
 * @property Producto[] $productos
 * @property PagoProveedor[] $pagoProveedors
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['costo'], 'number'],
            [['cantidad', 'numRemito', 'id_proveedor', 'id_producto', 'id_tipos_pagos'], 'integer'],
            [['fecha'], 'safe'],
            [['id_proveedor', 'id_producto', 'id_tipos_pagos'], 'required'],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_producto' => 'id']],
            [['id_proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::className(), 'targetAttribute' => ['id_proveedor' => 'id']],
            [['id_tipos_pagos'], 'exist', 'skipOnError' => true, 'targetClass' => TiposDePago::className(), 'targetAttribute' => ['id_tipos_pagos' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'costo' => 'Costo',
            'cantidad' => 'Cantidad',
            'fecha' => 'Fecha',
            'numRemito' => 'Num Remito',
            'id_proveedor' => 'Id Proveedor',
            'id_producto' => 'Id Producto',
            'id_tipos_pagos' => 'Id Tipos Pagos',
        ];
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery|ProductoQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_producto']);
    }

    /**
     * Gets query for [[Proveedor]].
     *
     * @return \yii\db\ActiveQuery|ProveedorQuery
     */
    public function getProveedor()
    {
        return $this->hasOne(Proveedor::className(), ['id' => 'id_proveedor']);
    }

    /**
     * Gets query for [[TiposPagos]].
     *
     * @return \yii\db\ActiveQuery|TiposDePagoQuery
     */
    public function getTiposPagos()
    {
        return $this->hasOne(TiposDePago::className(), ['id' => 'id_tipos_pagos']);
    }

    /**
     * Gets query for [[CompraProductos]].
     *
     * @return \yii\db\ActiveQuery|CompraProductoQuery
     */
    public function getCompraProductos()
    {
        return $this->hasMany(CompraProducto::className(), ['compra_id' => 'id']);
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery|ProductoQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['id' => 'producto_id'])->viaTable('compra_producto', ['compra_id' => 'id']);
    }

    /**
     * Gets query for [[PagoProveedors]].
     *
     * @return \yii\db\ActiveQuery|PagoProveedorQuery
     */
    public function getPagoProveedors()
    {
        return $this->hasMany(PagoProveedor::className(), ['id_compra' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CompraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompraQuery(get_called_class());
    }
}
