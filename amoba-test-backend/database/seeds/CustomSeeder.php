<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomSeeder extends Seeder {
    public function insertData($model_class, $file, $file_key) {
        $json = file_get_contents(storage_path()."/data/$file");

        $json_data = json_decode($json,true);

        $users_raw = $json_data[$file_key];

        $items = [];

        $model = new $model_class;

        $fillable_columns = $model->getFillable();

        foreach ($users_raw as $user) {
            $items[] = array_intersect_key(
                $user,
                array_flip($fillable_columns)
            );
        }

        DB::table($model->getTable())->insert($items);
    }
}
