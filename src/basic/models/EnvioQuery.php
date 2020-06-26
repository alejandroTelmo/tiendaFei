<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Envio]].
 *
 * @see Envio
 */
class EnvioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Envio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Envio|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
