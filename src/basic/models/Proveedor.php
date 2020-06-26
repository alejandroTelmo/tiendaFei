<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $direccion
 * @property string|null $ciudad
 * @property string|null $telefono
 *
 * @property Compra[] $compras
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion', 'ciudad', 'telefono'], 'string', 'max' => 255],
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
            'direccion' => 'Direccion',
            'ciudad' => 'Ciudad',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * Gets query for [[Compras]].
     *
     * @return \yii\db\ActiveQuery|CompraQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['id_proveedor' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProveedorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProveedorQuery(get_called_class());
    }
}
