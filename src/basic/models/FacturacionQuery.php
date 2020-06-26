<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Facturacion]].
 *
 * @see Facturacion
 */
class FacturacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Facturacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Facturacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
