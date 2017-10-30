<?php
namespace App\GraphQL\Type;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
/**
 * Blog Type
 */
class BlogType extends GraphQLType{

    protected $attributes = [
        'name' => 'Blog',
        'description' => 'Blog from user'
    ];

    public function fields(){
        return[
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of blog'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'The title of blog'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of blog'
            ],
            'author' => [
                'type' => Type::string(),
                'description' => 'The author of blog'
            ]
        ];
    }
}