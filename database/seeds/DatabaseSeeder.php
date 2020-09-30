<?php

use App\Course;
use App\Quiz;
use App\Track;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory('App\User', 10)->create();
        $tracks =factory('App\Track', 10)->create();

        foreach ($users as $user){
            $track_ids      = [];
            $track_ids[]    = Track::all()->random()->id;
            $track_ids[]    = Track::all()->random()->id;
            $track_ids[]    = Track::all()->random()->id;

            $user->tracks()->sync($track_ids);
        }

        $courses = factory('App\Course', 50)->create();

        foreach ($users as $user){
            $courses_ids      = [];
            $courses_ids[]    = Course::all()->random()->id;
            $courses_ids[]    = Course::all()->random()->id;
            $courses_ids[]    = Course::all()->random()->id;
            $courses_ids[]    = Course::all()->random()->id;

            $user->courses()->sync($courses_ids);
        }

        $quizzes = factory('App\Quiz', 100)->create();

        foreach ($users as $user){
            $quizzes_ids      = [];
            $quizzes_ids[]    = Quiz::all()->random()->id;
            $quizzes_ids[]    = Quiz::all()->random()->id;
            $quizzes_ids[]    = Quiz::all()->random()->id;
            $quizzes_ids[]    = Quiz::all()->random()->id;
            $quizzes_ids[]    = Quiz::all()->random()->id;

            $user->quizzes()->sync($quizzes_ids);
        }

        factory('App\Question', 200)->create();
        factory('App\Video', 100)->create();
        factory('App\Photo', 50)->create();
    }
}
