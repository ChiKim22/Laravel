<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostUserFactory extends Factory
{
    protected $users = null;
    protected $posts = null;
    public function __construct()
    {
        parent::__construct();
        $this->users = User::all();
        $this->posts = Post::all();
    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        do {
            $userID = $this->users->random()->id;
            $postID = $this->posts->random()->id;
            $postUser = PostUser::where('user_id', $userID)->where('post_id', $postID);
        }while ($postUser->count() != 0);

        return [
            'user_id' => $this->users->random()->id,
            'post_id' => $this->posts->random()->id,
        ];
    }
}
