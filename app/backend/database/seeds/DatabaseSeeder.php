<?php

use Illuminate\Database\Seeder;
use MongoDB\BSON\ObjectId;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            // SmartStageSeeder::class
        ]);

        //$this->initTaskFields();
        //$this->initTaskType();
    }

    private function initTaskGroup()
    {

    }

    private function initTaskType()
    {
        $taskTypes = [
            [
                '_creator_uid' => '',
                'title' => '任务',
                'description' => '项目描述',
                'icon' => 'task',
                'custom_fields' => [
                ]
            ],
            [
                '_creator_uid' => '',
                'title' => '需求',
                'icon' => 'task',
                'description' => '项目描述',
                'custom_fields' => [],
            ],
            [
                '_creator_uid' => '',
                'title' => '缺陷',
                'icon' => 'task',
                'description' => '项目描述',
                'custom_fields' => [],
            ]
        ];
        foreach ($taskTypes as $type) {
            $taskType = new \App\Models\TaskType($type);
            $taskType->save();
        }
    }

    private function initTaskFields()
    {
        $fields = [
            [
                '_role_ids' => [],
                '_creator_uid' => '',
                '_project_id' => '',

                'name' => 'note',
                'title' => '备注',
                'description' => '备注信息',
                'type' => 'text',
                'choices' => [],
                'displayed' => false,
                'required' => false
            ],
            [
                '_role_ids' => [],
                '_creator_uid' => '',
                '_project_id' => '',

                'name' => 'level',
                'title' => '优先级',
                'description' => '优先级',
                'field_type' => 'priority',
                'type' => 'radio',
                'choices' => [1, 2, 3, 4, 5],//5个优先级
                'displayed' => false,
                'required' => false
            ],
        ];
        foreach ($fields as $field) {
            $taskField = new \App\Models\TaskFields($field);
            $taskField->save();
        }

    }
}
