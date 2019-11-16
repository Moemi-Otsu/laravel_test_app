<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => '投稿のタイトル',
        'body' => "本文です。テキストテキストテキスト。テキストテキストテキスト。テキストテキストテキスト。テキストテキストテキスト。\nテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。",
        'user_id' => function () {
            return factory(App\User::class)->create()->id;//追加
        },
    ];
});