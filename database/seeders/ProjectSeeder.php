<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        Project::truncate();
        for ($i = 0; $i < 10; $i++) {
            $random_type = Type::inRandomOrder()->first();

            $new_project = new Project();

            $new_project->name = $faker->sentence(3);
            $new_project->type_id = $random_type->id;
            $new_project->repository = $faker->sentence(2);
            $new_project->repo_url = $faker->url;
            $new_project->is_public = $faker->boolean;
            $new_project->assignment = $faker->text(500);
            $new_project->slug = Str::of($new_project->name)->slug('-');

            $new_project->save();
        }
    }
}
