<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ClienteDomicilio]].
 *
 * @see ClienteDomicilio
 */
class ClienteDomicilioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ClienteDomicilio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ClienteDomicilio|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
