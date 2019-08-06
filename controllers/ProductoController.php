<?php

namespace app\controllers;

use Yii;
use app\models\Producto;
use app\models\ProductoSearch;
use app\models\Categoria;
use app\models\Marca;
use app\models\TipoProducto;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
           		'access' => [
                'class' => AccessControl::className(),
                'only' => ['delete','update', 'create', 'index', 'view'],
                'rules' => [
                    [
                        //'actions' => ['delete','update', 'create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Producto model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Producto();
		$model->loadDefaultValues();
		$tipo = ArrayHelper::map(TipoProducto::find()
				#->select('id, detalle')
				#->where(['in', 'sigla', $sigla])
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
		$categoria = ArrayHelper::map(Categoria::find()
				#->select('id, detalle')
				#->where(['in', 'sigla', $sigla])
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
		$marca = ArrayHelper::map(Marca::find()
				#->select('id, detalle')
				#->where(['in', 'sigla', $sigla])
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
			
		$this->view->params['tipo'] = $tipo;
		$this->view->params['categoria'] = $categoria;
		$this->view->params['marca'] = $marca;
		$this->view->params['marca'] = $marca;
		

        if ($model->load(Yii::$app->request->post()) ) 
		{
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
				#echo var_dump($model->imageFile->name); exit;
                $model->url = 'images/' . $model->imageFile->name;
            }
			$model->imageFile = null;
			if ($model->save())
            	return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$tipo = ArrayHelper::map(TipoProducto::find()
				#->select('id, detalle')
				#->where(['in', 'sigla', $sigla])
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
		$categoria = ArrayHelper::map(Categoria::find()
				#->select('id, detalle')
				#->where(['in', 'sigla', $sigla])
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
		$marca = ArrayHelper::map(Marca::find()
				#->select('id, detalle')
				#->where(['in', 'sigla', $sigla])
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
			
		$this->view->params['tipo'] = $tipo;
		$this->view->params['categoria'] = $categoria;
		$this->view->params['marca'] = $marca;

		if ($model->load(Yii::$app->request->post()) ) 
		{
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
				#echo var_dump($model->imageFile->name); exit;
                $model->url = 'images/' . $model->imageFile->name;
            }
			$model->imageFile = null;
			if ($model->save())
            	return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Producto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

	public function actionCatalogo($id = null)
    {

		$searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        #return $this->render('index', [
         #   'searchModel' => $searchModel,
         #   'dataProvider' => $dataProvider,
        #]);
        /** @var Category $category */
        
        $productos = Producto::find();
		$categorias = Categoria::find()->orderBy('id')->all();
		$categoria = null;
        if ($id !== null) {
			$categoria = Categoria::find()->where(['id' => $id])->one();
            if ($categoria) {
				$productos->where(['id_categoria' => $categoria->id]);
			}
        }
        $productsDataProvider = new ActiveDataProvider([
            'query' => $productos,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('catalogo', [
            'category' => $categoria,
            'menuItems' => $this->getMenuItems($categorias),
            'productsDataProvider' => $productsDataProvider,
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


	    /**
     * @param Category[] $categories
     * @param int $activeId
     * @param int $parent
     * @return array
     */
    private function getMenuItems($categorias)
    {
        $menuItems = [];
		#echo var_dump($categorias); exit;
        foreach ($categorias as $categoria) {
			#echo var_dump($categoria->id, $categoria->detalle); exit;
            #if ($category->parent_id === $parent) {
			array_push($menuItems, ['label' => $categoria->detalle, 'url' => ['producto/catalogo', 'id' => $categoria->id]]);
                #$menuItems[$categoria->id] = [
                    #'active' => $activeId === $category->id,
                 #   'label' => $categoria->detalle,
                  #  'url' => ['producto/catalogo', 'id' => $categoria->id],
                  #  'items' => $menuItems,
                #];
            #}
        }
		#echo var_dump($menuItems); exit;
        return $menuItems;
    }
    /**
     * Returns IDs of category and all its sub-categories
     *
     * @param Category[] $categories all categories
     * @param int $categoryId id of category to start search with
     * @param array $categoryIds
     * @return array $categoryIds
     */
    private function getCategoryIds($categories, $categoryId, &$categoryIds = [])
    {
        foreach ($categories as $category) {
            if ($category->id == $categoryId) {
                $categoryIds[] = $category->id;
            }
            elseif ($category->parent_id == $categoryId){
                $this->getCategoryIds($categories, $category->id, $categoryIds);
            }
        }
        return $categoryIds;
    }


    /**
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
