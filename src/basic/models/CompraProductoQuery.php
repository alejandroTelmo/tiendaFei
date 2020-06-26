<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CompraProducto]].
 *
 * @see CompraProducto
 */
class CompraProductoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CompraProducto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CompraProducto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
