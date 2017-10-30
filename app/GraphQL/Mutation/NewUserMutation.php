<?php

namespace App\GraphQL\Mutation;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Facades\GraphQL;
use Folklore\GraphQL\Support\Mutation;
use App\User;

class NewUserMutation extends Mutation{

    protected $attributes = [
        'name' => 'NewUser'
    ];

    public function type(){
        return GraphQL::type('User');
    }

    public function args(){
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string())
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string())
            ]
        ];
    }

    public function resolve($root, $args){
        $user = User::create($args);
        
        if (!$user){
            return 'Failed';
        }
        
        return $user;
    }
}