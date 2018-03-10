<?php

use App\Models\SmartTask;
use Illuminate\Database\Seeder;

class SmartStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SmartTask::create([
            'title' => '需求',
            'description' => '',
            'type' => 1,
            'sort' => 1
        ]);
        SmartTask::create([
            'title' => '缺陷',
            'description' => '',
            'type' => 2,
            'sort' => 2
        ]);
        SmartTask::create([
            'title' => '迭代',
            'description' => '',
            'type' => 3,
            'sort' => 3
        ]);
    }
}
