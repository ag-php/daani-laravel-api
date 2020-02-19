<?php

namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Post
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // TODO implement the resolver
    }

    public function postFilter($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $post = new \App\Post();
        if(isset($args['id'])) {
            $post = $post->where('id',$args['id']);
        }


        if(isset($args['featured'])) {
            $post = $post->where('featured',$args['featured']);
        }



        if(isset($args['orderByDate'])) {
            $post = $post->orderBy('created_at',$args['orderByDate']);
        }

        return $post->get();

    }
}
