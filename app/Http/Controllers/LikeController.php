<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function like(Reply $reply)
    {
        $like = $reply->likes()->create([
            'user_id' => 1
        ]);
        return \response('Liked', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function dislike(Reply $reply)
    {
        $reply->likes()->where('user_id', '=', 1)->first()->delete();
        return \response('Disliked', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
