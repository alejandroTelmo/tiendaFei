<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta".
 *
 * @property int $id
 * @property string|null $fecha
 * @property int $id_carrito
 * @property int $id_facturacion
 *
 * @property Envio[] $envios
 * @property PagoCliente[] $pagoClientes
 * @property Carrito $carrito
 * @property Facturacion $facturacion
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['id_carrito', 'id_facturacion'], 'required'],
            [['id_carrito', 'id_facturacion'], 'integer'],
            [['id_carrito'], 'exist', 'skipOnError' => true, 'targetClass' => Carrito::className(), 'targetAttribute' => ['id_carrito' => 'id']],
            [['id_facturacion'], 'exist', 'skipOnError' => true, 'targetClass' => Facturacion::className(), 'targetAttribute' => ['id_facturacion' => 'id']],
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
            'id_carrito' => 'Id Carrito',
            'id_facturacion' => 'Id Facturacion',
        ];
    }

    /**
     * Gets query for [[Envios]].
     *
     * @return \yii\db\ActiveQuery|EnvioQuery
     */
    public function getEnvios()
    {
        return $this->hasMany(Envio::className(), ['id_venta' => 'id']);
    }

    /**
     * Gets query for [[PagoClientes]].
     *
     * @return \yii\db\ActiveQuery|PagoClienteQuery
     */
    public function getPagoClientes()
    {
        return $this->hasMany(PagoCliente::className(), ['id_venta' => 'id']);
    }

    /**
     * Gets query for [[Carrito]].
     *
     * @return \yii\db\ActiveQuery|CarritoQuery
     */
    public function getCarrito()
    {
        return $this->hasOne(Carrito::className(), ['id' => 'id_carrito']);
    }

    /**
     * Gets query for [[Facturacion]].
     *
     * @return \yii\db\ActiveQuery|FacturacionQuery
     */
    public function getFacturacion()
    {
        return $this->hasOne(Facturacion::className(), ['id' => 'id_facturacion']);
    }

    /**
     * {@inheritdoc}
     * @return VentaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VentaQuery(get_called_class());
    }
}
