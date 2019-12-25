<?php

namespace intermundia\mailer\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use intermundia\mailer\models\EmailLog;

/**
 * EmailLogSearch represents the model behind the search form about `intermundia\mailer\models\EmailLog`.
 */
class EmailLogSearch extends EmailLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['created_at'], 'string'],
            [['to', 'from', 'cc', 'bcc', 'message', 'subject', 'status', 'error_message', 'trace'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = EmailLog::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => strtotime($this->created_at),
        ]);

        $query->andFilterWhere(['like', 'to', $this->to])
            ->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'cc', $this->cc])
            ->andFilterWhere(['like', 'bcc', $this->bcc])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'error_message', $this->error_message])
            ->andFilterWhere(['like', 'trace', $this->trace]);

        return $dataProvider;
    }
}
