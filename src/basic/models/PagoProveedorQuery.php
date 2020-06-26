<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PagoProveedor]].
 *
 * @see PagoProveedor
 */
class PagoProveedorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PagoProveedor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PagoProveedor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
