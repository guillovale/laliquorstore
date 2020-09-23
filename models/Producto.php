<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

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

	public $tipo;
	public $categorias;
	public $marcas;
	public $imageFile;

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
            [['detalle'], 'required'],
            [['codigo', 'detalle', 'url'], 'string'],
            [['unidad', 'precio_compra', 'precio_unidad', 'descuento'], 'number'],
			#['unidad', 'default', 'value'=> '1'],
            [['id_categoria', 'id_marca', 'id_tipo'], 'integer'],
            [['detalle'], 'unique'],
            [['codigo'], 'unique'],
            [['id_marca'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::className(), 'targetAttribute' => ['id_marca' => 'id']],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
			[['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProducto::className(), 'targetAttribute' => ['id_tipo' => 'id']],
			[['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif', 'maxSize' => 512000, 'tooBig' => 'El límite es 512KB'],
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
            'unidad' => 'Unidades',
            'precio_compra' => 'Precio Compra',
            'precio_unidad' => 'Precio Venta Unidad',
            'descuento' => 'Descuento',
			'url' => 'Url',
            'id_categoria' => 'Categoría',
            'id_marca' => 'Marca',
			'id_tipo' => 'Tipo',
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

	public function getTipoproducto()
    {
        return $this->hasOne(TipoProducto::className(), ['id' => 'id_tipo']);
    }

	public function getInventario()
    {
        return $this->hasOne(Inventario::className(), ['id_producto' => 'id']);
    }


	public function upload()
    {
        if ($this->validate() && $this->imageFile) {
            $this->imageFile->saveAs('images/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
	}
