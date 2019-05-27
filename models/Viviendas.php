<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "viviendas".
 *
 * @property int $id
 * @property int $propietario_id
 * @property string $direccion
 * @property string $localidad
 * @property string $precio
 * @property int $num_habitaciones
 * @property string $area
 *
 * @property Usuarios $propietario
 */
class Viviendas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viviendas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['propietario_id', 'direccion', 'localidad', 'precio'], 'required'],
            [['propietario_id', 'num_habitaciones'], 'default', 'value' => null],
            [['propietario_id', 'num_habitaciones'], 'integer'],
            [['precio', 'area'], 'number'],
            [['direccion', 'localidad'], 'string', 'max' => 255],
            [['propietario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['propietario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'propietario_id' => 'Propietario ID',
            'direccion' => 'Direccion',
            'localidad' => 'Localidad',
            'precio' => 'Precio',
            'num_habitaciones' => 'Num Habitaciones',
            'area' => 'Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropietario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'propietario_id'])->inverseOf('viviendas');
    }
}
