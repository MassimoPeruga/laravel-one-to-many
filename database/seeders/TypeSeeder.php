<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::truncate();
        $types = ['Frontend', 'Backend', 'Full Stack', 'Data Analytics', 'AI'];

        foreach ($types as $type) {
            $new_type = new Type();

            $new_type->title = $type;
            $new_type->slug = Str::of($type)->slug('-');

            $new_type->save();
        }
    }
}
