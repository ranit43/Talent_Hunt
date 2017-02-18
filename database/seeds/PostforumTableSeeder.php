<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostforumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::create([
            'title' => 'testpost',
            'category' => 'Exam',
            'details' => '1 details ... afasflasflsa d.',
            'user_id' => '1'
        ]);

        Post::create([
            'title' => '2testpost',
            'category' => 'Class',
            'details' => '2 details ... afasflasflsa d.',
            'user_id' => '2'
        ]);


    }
}
