<?php

namespace frontend\models;

use common\models\TestAssignment;

/**
 * ContactForm is the model behind the contact form.
 */
class TestAssignmentStudentForm extends TestAssignment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'iin', 'phone', 'teacher_name', 'lang'], 'string'],
            [['school_id', 'city_id', 'region_id', 'grade', 'olympiad_id', 'status'], 'integer'],

            [['name', 'surname', 'iin', 'phone', 'school_id', 'teacher_name', 'grade', 'olympiad_id', 'lang'], 'required'],
        ];
    }
}
