<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_tipo_producto".
 *
 * @property int $id
 * @property string $detalle
 *
 * @property TblProducto[] $tblProductos
 */
class TipoProducto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_tipo_producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detalle'], 'required'],
            [['detalle'], 'string'],
            [['detalle'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'detalle' => 'Detalle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblProductos()
    {
        return $this->hasMany(TblProducto::className(), ['id_tipo' => 'id']);
    }
}
