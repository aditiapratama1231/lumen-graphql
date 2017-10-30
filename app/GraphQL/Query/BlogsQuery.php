<?php
namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Blog;
/**
 * Blog Query
 */
class BlogsQuery extends Query{
    
    protected $attributes = [
        'name' => 'blogs'
    ];

    public function type(){
        return Type::listOf(GraphQL::type('Blog'));
    }

    public function args(){
        return [
            'id' => [
                'name' => 'id', 
                 'type' => Type::string()
            ],
            'title' => [
                'name' => 'title', 
                 'type' => Type::string()
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

    public function resolve(){
        if(isset($args['id'])){
            return Blog::where('id', $args['id'])->get();
        }else if(isset($args['title'])){
            return Blog::where('title', $agrs['title'])->get();
        }else if(isset($args['description'])){
            return Blog::where('description', $args['description'])->get();
        }else if(isset($args['author'])){
            return Blog::where('author', $args['author'])->get();
        }else{
            return Blog::all();
        }
    }
}