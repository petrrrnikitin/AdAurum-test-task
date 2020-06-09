<?php

use App\Comment;
use App\Company;
use App\User;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::all()->each(function (Company $company) {
            $comment = factory(Comment::class)->make([
                'user_id' => User::find(random_int(1,User::all()->count()))->id,
                'company_id' => $company->id,
            ]);
            $comments = collect([$comment]);
            for ($i = 0; $i < random_int(3,10); $i++) {
                $newComment = factory(Comment::class)->make();
                $user_id = User::find(random_int(1,User::all()->count()))->id;
                $newComment = Comment::make([
                    'comment' => $newComment->comment,
                    'type' => $newComment->type,
                    'company_id' => $company->id,
                    'user_id' => $user_id,
                ]);

                $comments->push($newComment);

            }
            $company->comments()->saveMany($comments);
        });
    }

}
