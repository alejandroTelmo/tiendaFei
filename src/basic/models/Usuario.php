<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $puesto
 *
 * @property UsuarioPermiso[] $usuarioPermisos
 * @property Permiso[] $permisos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'puesto'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'puesto' => 'Puesto',
        ];
    }

    /**
     * Gets query for [[UsuarioPermisos]].
     *
     * @return \yii\db\ActiveQuery|UsuarioPermisoQuery
     */
    public function getUsuarioPermisos()
    {
        return $this->hasMany(UsuarioPermiso::className(), ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Permisos]].
     *
     * @return \yii\db\ActiveQuery|PermisoQuery
     */
    public function getPermisos()
    {
        return $this->hasMany(Permiso::className(), ['id' => 'permiso_id'])->viaTable('usuario_permiso', ['usuario_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuarioQuery(get_called_class());
    }
}
