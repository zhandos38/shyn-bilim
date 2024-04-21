<?php

namespace frontend\models;

use common\models\TestAssignment;

/**
 * ContactForm is the model behind the contact form.
 */
class TestAssignmentTeacherForm extends TestAssignment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'iin', 'phone', 'lang'], 'string'],
            [['school_id', 'subject_id', 'city_id', 'region_id', 'olympiad_id', 'status'], 'integer'],

            [['name', 'surname', 'iin', 'phone', 'school_id', 'subject_id', 'olympiad_id'], 'required'],
        ];
    }
}
