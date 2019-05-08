<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_categoria', 'id_marca'], 'integer'],
            [['codigo', 'detalle', 'tipo', 'categorias', 'marcas'], 'safe'],
            #[['unidad', 'precio_compra', 'precio_unidad', 'descuento'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Producto::find();
		$query->joinWith(['tipoproducto']);
		$query->joinWith(['categoria']);
		$query->joinWith(['marca']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
           # 'unidad' => $this->unidad,
           # 'precio_compra' => $this->precio_compra,
           # 'precio_unidad' => $this->precio_unidad,
           # 'descuento' => $this->descuento,
            'id_categoria' => $this->id_categoria,
            'id_marca' => $this->id_marca,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'detalle', $this->detalle])
			->andFilterWhere(['like', 'url', $this->url]);
		$query->andFilterWhere(['like', 'tbl_tipo_producto.detalle', $this->tipo]);
		$query->andFilterWhere(['like', 'tbl_categoria.detalle', $this->categorias]);
		$query->andFilterWhere(['like', 'tbl_marca.detalle', $this->marcas]);

        return $dataProvider;
    }
}
