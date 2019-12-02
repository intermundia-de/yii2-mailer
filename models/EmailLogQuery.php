<?php

namespace intermundia\mailer\models;

/**
 * This is the ActiveQuery class for [[EmailLog]].
 *
 * @see EmailLog
 */
class EmailLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return EmailLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return EmailLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
