<?php

namespace backend\controllers;

use Yii;
use common\models\Event;
use common\models\Occasion;
use common\models\Location;
use common\models\Venue;
use common\models\EventType;
use common\models\EventCategory;
use common\models\EventStatus;
use common\models\MatchSystem;
use common\models\Sort;
use common\models\Order;
use backend\models\EventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Event model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Event();
        $occasion = new Occasion();
        $location = new Location();
        $venue = new Venue();
        $eventType = new EventType();
        $eventCategory = new EventCategory();
        $matchSystem = new MatchSystem();
        $sort = new Sort();
        $order = new Order();

        if ($model->load(Yii::$app->request->post()) &&
            $occasion->load(Yii::$app->request->post()) &&
            $location->load(Yii::$app->request->post()) &&
            $venue->load(Yii::$app->request->post()) &&
            $eventType->load(Yii::$app->request->post()) &&
            $eventCategory->load(Yii::$app->request->post()) &&
            $matchSystem->load(Yii::$app->request->post()) &&
            $sort->load(Yii::$app->request->post()) &&
            $order->load(Yii::$app->request->post())) {

            $model->occasion_id = $occasion->id;
            $model->location_venue_id = Yii::$app->db->
                createCommand('SELECT id FROM location_venue WHERE location_id =' . $location->id . ' and venue_id =' . $venue->id)
            ->queryScalar();
            $model->event_type_id = $eventType->id;
            $model->event_category_id = $eventCategory->id;
            $model->match_system_id = $matchSystem->id;
            $model->sort_order_id =  Yii::$app->db->
                createCommand('SELECT id FROM sort_order WHERE sort_id =' . $sort->id . ' and order_id =' . $order->id)
            ->queryScalar();
            $model->event_status_id = 1;
            $model->min_team = 2;
            $model->max_team = 12;
            // $model->champ = 2;
            // $model->first = 2;
            // $model->second = 2;
            // $model->date_start = 2017-09-11;
            // $model->date_end = 2017-09-11;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'occasion' => $occasion,
                'location' => $location,
                'venue' => $venue,
                'eventType' => $eventType,
                'eventCategory' => $eventCategory,
                'matchSystem' => $matchSystem,
                'sort' => $sort,
                'order' => $order,
            ]);
        }
    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $occasion = new Occasion();
        $location = new Location();
        $venue = new Venue();
        $eventType = new EventType();
        $eventCategory = new EventCategory();
        // $eventStatus = new EventStatus();
        $matchSystem = new MatchSystem();
        $sort = new Sort();
        $order = new Order();


        $occasion->id = $model->occasion_id;
        $location->id = $model->locationVenue->location_id;
        $venue->id = $model->locationVenue->venue_id;
        $eventType->id = $model->event_type_id;
        // $eventStatus->id = $model->event_status_id;
        $eventCategory->id = $model->event_category_id;
        $matchSystem->id = $model->match_system_id;
        $sort->id = $model->sortOrder->sort_id;
        $order->id = $model->sortOrder->order_id;

        if ($model->load(Yii::$app->request->post()) &&
            $occasion->load(Yii::$app->request->post()) &&
            $location->load(Yii::$app->request->post()) &&
            $venue->load(Yii::$app->request->post()) &&
            $eventType->load(Yii::$app->request->post()) &&
            $eventCategory->load(Yii::$app->request->post()) &&
            // $eventStatus->load(Yii::$app->request->post()) &&
            $matchSystem->load(Yii::$app->request->post()) &&
            $sort->load(Yii::$app->request->post()) &&
            $order->load(Yii::$app->request->post())) {

            $model->occasion_id = $occasion->id;
            $model->location_venue_id = Yii::$app->db->
                createCommand('SELECT id FROM location_venue WHERE location_id =' . $location->id . ' and venue_id =' . $venue->id)
            ->queryScalar();
            $model->event_type_id =  $eventType->id;
            $model->event_category_id = $eventCategory->id;
            // $model->event_status_id = $eventStatus->id;
            $model->match_system_id = $matchSystem->id;
            $model->sort_order_id = Yii::$app->db->
                createCommand('SELECT id FROM sort_order WHERE sort_id =' . $sort->id . ' and order_id =' . $order->id)
            ->queryScalar();

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'occasion' => $occasion,
                'location' => $location,
                'venue' => $venue,
                'eventType' => $eventType,
                'eventCategory' => $eventCategory,
                // 'eventStatus' => $eventStatus,
                'matchSystem' => $matchSystem,
                'sort' => $sort,
                'order' => $order,
            ]);
        }
    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionVenue() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = self::getSubCatList($cat_id);
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
}
