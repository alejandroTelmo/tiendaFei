<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PagoCliente]].
 *
 * @see PagoCliente
 */
class PagoClienteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PagoCliente[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PagoCliente|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
