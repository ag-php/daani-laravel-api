<?php

namespace App\GraphQL\Mutations\Auth;

use App\Events\Auth\RequestedPasswordReset;
use App\Events\Auth\UserRegistered;
use App\Repos\User;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ResetPassword
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue  Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args  The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context  Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo  Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        if ($args['token'] && $args['password']) {
            $token = base64_decode($args['token']);
            $user = User::ByToken($token)->first();
            if ($user) {
                $user->update(['password' => $args['password']]);
                return true;
            }
        }

        return false;


    }
}
