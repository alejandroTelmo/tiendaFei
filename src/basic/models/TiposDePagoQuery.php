<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TiposDePago]].
 *
 * @see TiposDePago
 */
class TiposDePagoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TiposDePago[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TiposDePago|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
