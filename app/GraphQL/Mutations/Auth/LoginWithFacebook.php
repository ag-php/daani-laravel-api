<?php

namespace App\GraphQL\Mutations\Auth;

use App\Events\Auth\UserRegistered;
use App\GraphQL\Queries\User;
use App\Services\FB\GraphApi;
use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class LoginWithFacebook
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
        $token = Str::random(20);

        $userRepo = new \App\Repos\User();

        $graphApi = app(GraphApi::class,[
            'accessToken' => $args['token']
        ]);


        if($userInfo = $graphApi->getUserInfo()) {

            $user = $userRepo->ByFbId($userInfo['id'])->first();

            if ($user) {
                $user->update(['api_token' => $user->generateAuthToken()]);

                return $user;
            }


            $email = isset($userInfo['email']) ?  $userInfo['email'] : null;
            $name = isset($userInfo['name']) ?  $userInfo['name'] : null;

            $data = [
                'fb_id' => $userInfo['id'],
                'password' => Str::random(10),
                'api_token' => $userRepo->generateAuthToken()
            ];

            if(!empty($email)) {
                $data['email'] = $email;
                $data['email_verified_at'] = Carbon::now();
            }

            if(!empty($name)) {
                $data['name'] = $name;
            }

            $user = $userRepo->create($data);

            return $user;

        }

        return null;
    }
}
