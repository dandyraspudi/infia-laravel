<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = [
            [
                'name' => 'Human Resource & Development',
                'code' => 'HRD',
                'status' => '1',
                'created_by' => '1'
            ],
            [
                'name' => 'Finance',
                'code' => 'FNC',
                'status' => '1',
                'created_by' => '1'
            ],
            [
                'name' => 'Business Development',
                'code' => 'BSD',
                'status' => '1',
                'created_by' => '1'
            ],
            [
                'name' => 'Legal',
                'code' => 'LGL',
                'status' => '1',
                'created_by' => '1'
            ],
        ];

        foreach ($divisions as $division) {
            Division::create($division);
        }
    }
}
