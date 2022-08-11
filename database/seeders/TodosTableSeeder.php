<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => '帰宅'
        ];
        Todo::create($param);
        $param = [
            'content' => '盆踊り'
        ];
        Todo::create($param);
    }
}
