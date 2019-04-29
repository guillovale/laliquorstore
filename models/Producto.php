<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_producto".
 *
 * @property int $id
 * @property string $codigo
 * @property string $detalle
 * @property double $unidades
 * @property double $precio_compra
 * @property double $precio_venta_pormayor
 * @property double $precio_venta_unidad
 * @property double $descuento
 * @property int $id_categoria
 * @property int $id_marca
 *
 * @property TblMarca $marca
 * @property TblCategoria $categoria
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'detalle'], 'required'],
            [['codigo', 'detalle', 'url'], 'string'],
            [['unidad', 'precio_compra', 'precio_unidad', 'descuento'], 'number'],
            [['id_categoria', 'id_marca'], 'integer'],
            [['detalle'], 'unique'],
            [['codigo'], 'unique'],
            [['id_marca'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::className(), 'targetAttribute' => ['id_marca' => 'id']],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Código',
            'detalle' => 'Detalle',
            'unidad' => 'Unidad',
            'precio_compra' => 'Precio Compra',
            'precio_unidad' => 'Precio unidad',
            'descuento' => 'Descuento',
			'url' => 'Url',
            'id_categoria' => 'Id Categoría',
            'id_marca' => 'Id Marca',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarca()
    {
        return $this->hasOne(Marca::className(), ['id' => 'id_marca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }
}
