<?php

namespace App\GraphQL\Queries\Report;

use App\GraphQL\Queries\User;
use App\Repos\Product;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Stat
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
        $product = new Product();
        $user = new \App\Repos\User();

        $totalProducts = $product::all()->count();
        $totalUsers = $user::all()->count();
        $totalSoldProducts = $product::sold()->get()->count();

        return [
            'total_users' => $totalUsers,
            'total_sold_products' => $totalSoldProducts,
            'total_products' => $totalProducts
        ];

    }

}
