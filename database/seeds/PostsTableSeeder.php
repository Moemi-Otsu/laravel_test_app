<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Comment;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        $user = App\User::first();//追加

        factory(Post::class, 50)
            ->create(['user_id' => $user->id,])//変更
            ->each(function ($post) {
                $comments = factory(App\Comment::class, 2)->make();
                $post->comments()->saveMany($comments);
            });
    }
}
