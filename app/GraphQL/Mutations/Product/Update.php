<?php

namespace App\GraphQL\Mutations\Product;

use App\Events\Auth\UserRegistered;
use App\Events\Product\Created;
use App\GraphQL\Queries\User;
use App\Repos\Media;
use App\Repos\Product;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Update
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
        $product = Product::find($args['id']);
        $product->update($args);

        $media = new Media();
        if (isset($args['cover_image'])) {

            $media->where([
                'subject_type' => 'product',
                'subject_id' => $product->id,
                'category' => 'cover_image',
            ])->where('id','!=',$args['cover_image'])->delete();

            $media->where('id', $args['cover_image'])->update(['subject_id' => $product->id]);
        }

        if (isset($args['gallery_images'])) {

            $ids = explode(',', $args['gallery_images']);
            $media->where([
                'subject_type' => 'product',
                'subject_id' => $product->id,
                'category' => 'gallery',
            ])->whereNotIn('id',$ids)->delete();

            $media->whereIn('id',$ids)->update(['subject_id' => $product->id]);
        }

        return $product;
    }
}
