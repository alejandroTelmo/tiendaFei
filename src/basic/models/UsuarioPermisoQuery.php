<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UsuarioPermiso]].
 *
 * @see UsuarioPermiso
 */
class UsuarioPermisoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UsuarioPermiso[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UsuarioPermiso|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
