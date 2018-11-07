<?php namespace app\models;

use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Class Customer
 * @package app\models
 *
 * @property string $email
 * @property string $full_name
 * @property string $company_name
 * @property string $inn
 */
class Customer extends ActiveRecord
{
    const SCENARIO_ENTREPRENEUR = 'entrepreneur';
    const SCENARIO_COMPANY = 'company';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customers}}';
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return ArrayHelper::merge(parent::scenarios(),
            [
                static::SCENARIO_ENTREPRENEUR => ['inn'],
                static::SCENARIO_COMPANY => ['inn', 'companyName'],
            ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'full_name', 'type'], 'required'],
            ['email', 'email'],
            [['full_name', 'company_name', 'inn'], 'string'],
            [['inn', 'company_name'], 'default' ,'value'=> null],
            ['inn', 'required',
                'enableClientValidation' => false,
                'on' => [
                    static::SCENARIO_ENTREPRENEUR,
                    static::SCENARIO_COMPANY,
                ],
            ],
            ['inn', 'match',
                'enableClientValidation' => false,
                'pattern' => '/^[0-9]{12}$/',
                'message' => 'ИНН должен состоять из 12 цифр',
                'on' => [
                    static::SCENARIO_DEFAULT,
                    static::SCENARIO_ENTREPRENEUR,
                ],
            ],
            ['inn', 'match',
                'enableClientValidation' => false,
                'pattern' => '/^[0-9]{10}$/',
                'message' => 'ИНН должен состоять из 10 цифр',
                'on' => static::SCENARIO_COMPANY,
            ],
            ['company_name', 'required',
                'enableClientValidation' => false,
                'on' => static::SCENARIO_COMPANY,
            ],
            ['type', 'in',
                'range' => [
                    static::SCENARIO_DEFAULT,
                    static::SCENARIO_ENTREPRENEUR,
                    static::SCENARIO_COMPANY,
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'scenario' => 'Тип абонента',
            'type' => 'Тип абонента',
            'full_name' => 'ФИО',
            'inn' => 'ИНН',
            'company_name' => 'Наименование организации',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getScenario()
    {
        return $this->getAttribute('type') ?: parent::getScenario();
    }
}
