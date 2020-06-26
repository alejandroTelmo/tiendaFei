<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tiposDePago".
 *
 * @property int $id
 * @property string|null $nombre
 *
 * @property Compra[] $compras
 */
class TiposDePago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tiposDePago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[Compras]].
     *
     * @return \yii\db\ActiveQuery|CompraQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['id_tipos_pagos' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TiposDePagoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TiposDePagoQuery(get_called_class());
    }
}
