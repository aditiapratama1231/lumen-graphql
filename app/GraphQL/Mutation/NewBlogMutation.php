<?php

namespace App\GraphQL\Mutation;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Facades\GraphQL;
use Folklore\GraphQL\Support\Mutation;
use App\Blog;

class NewBlogMutation extends Mutation{

    protected $attributes = [
        'name' => 'NewBlog'
    ];

    public function type(){
        return GraphQL::type('Blog');
    }

    public function args(){
        return [
            'title' => [
                'name' => 'title',
                'type' => Type::nonNull(Type::string())
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::string()
            ],
            'author' => [
                'name' => 'author',
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args){
        $blog = Blog::create($args);

        if(!$blog){
            return 'Failed';
        }

        return $blog;
    }
}