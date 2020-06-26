<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CarritoProducto]].
 *
 * @see CarritoProducto
 */
class CarritoProductoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CarritoProducto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CarritoProducto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
