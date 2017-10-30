<?php 
namespace App\GraphQL\Type;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
/**
 * User Type
 */
class UserType extends GraphQLType{

    protected $attributes = [
        'name' => 'User',
        'description' => 'A User'
    ];

    public function fields(){
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'decsription' => 'The id of user'
            ],
            'name' =>[
                'type' => Type::string(),
                'desciption' => 'The name of user'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ]
        ];
    }

    protected function resolveEmailFIeld($root, $args){
        return strtolower($root->email);
    }
}