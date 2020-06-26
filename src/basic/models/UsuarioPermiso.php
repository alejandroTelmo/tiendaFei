<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_permiso".
 *
 * @property int $usuario_id
 * @property int $permiso_id
 *
 * @property Permiso $permiso
 * @property Usuario $usuario
 */
class UsuarioPermiso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario_permiso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'permiso_id'], 'required'],
            [['usuario_id', 'permiso_id'], 'integer'],
            [['usuario_id', 'permiso_id'], 'unique', 'targetAttribute' => ['usuario_id', 'permiso_id']],
            [['permiso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permiso::className(), 'targetAttribute' => ['permiso_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usuario_id' => 'Usuario ID',
            'permiso_id' => 'Permiso ID',
        ];
    }

    /**
     * Gets query for [[Permiso]].
     *
     * @return \yii\db\ActiveQuery|PermisoQuery
     */
    public function getPermiso()
    {
        return $this->hasOne(Permiso::className(), ['id' => 'permiso_id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|UsuarioQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }

    /**
     * {@inheritdoc}
     * @return UsuarioPermisoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuarioPermisoQuery(get_called_class());
    }
}
