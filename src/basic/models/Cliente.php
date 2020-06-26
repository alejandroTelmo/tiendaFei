<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string|null $telefono
 * @property string|null $cuit
 * @property int $id_domicilio
 * @property int $id_tiposDePago
 *
 * @property Carrito[] $carritos
 * @property Domicilio $domicilio
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_domicilio', 'id_tiposDePago'], 'required'],
            [['id_domicilio', 'id_tiposDePago'], 'integer'],
            [['nombre', 'apellido', 'telefono', 'cuit'], 'string', 'max' => 255],
            [['id_domicilio'], 'exist', 'skipOnError' => true, 'targetClass' => Domicilio::className(), 'targetAttribute' => ['id_domicilio' => 'id']],
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
            'apellido' => 'Apellido',
            'telefono' => 'Telefono',
            'cuit' => 'Cuit',
            'id_domicilio' => 'Id Domicilio',
            'id_tiposDePago' => 'Id Tipos De Pago',
        ];
    }

    /**
     * Gets query for [[Carritos]].
     *
     * @return \yii\db\ActiveQuery|CarritoQuery
     */
    public function getCarritos()
    {
        return $this->hasMany(Carrito::className(), ['id_cliente' => 'id']);
    }

    /**
     * Gets query for [[Domicilio]].
     *
     * @return \yii\db\ActiveQuery|DomicilioQuery
     */
    public function getDomicilio()
    {
        return $this->hasOne(Domicilio::className(), ['id' => 'id_domicilio']);
    }

    /**
     * {@inheritdoc}
     * @return ClienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClienteQuery(get_called_class());
    }
}
