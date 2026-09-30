<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 1. Required Parameter
    |--------------------------------------------------------------------------
    */

    public function getUser($id)
    {
        return "Tame User ID " . $id . " ni mahiti mangi che.";
    }


    /*
    |--------------------------------------------------------------------------
    | 2. Optional Parameter
    |--------------------------------------------------------------------------
    */

    public function getProfile($name = "Guest")
    {
        return view('user_profile', [
            'userName' => $name
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | 3. Multiple Parameters
    |--------------------------------------------------------------------------
    */

    public function postComment($postId, $commentId)
    {
        return "Post ID: " . $postId .
            " upar Comment ID: " . $commentId .
            " mali che.";
    }


    /*
    |--------------------------------------------------------------------------
    | 4. Dynamic User Profile by ID
    |--------------------------------------------------------------------------
    */

    public function showUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->view('user_not_found', [
                'message' => 'User ID ' . $id . ' par koi user malyo nathi.'
            ], 404);
        }

        return view('user_details', [
            'user' => $user
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | 5. User Search Using Route Parameter
    |--------------------------------------------------------------------------
    */

    public function searchUsers($name)
    {
        $users = User::where('name', 'LIKE', '%' . $name . '%')
            ->orderBy('name')
            ->get();

        return view('user_search', [
            'searchName' => $name,
            'users' => $users
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | 6. Product Parameter With Validation
    |--------------------------------------------------------------------------
    */

    public function showProduct($id)
    {
        return view('product_parameter', [
            'productId' => $id
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | 7. Profile With Optional Parameter
    |--------------------------------------------------------------------------
    */

    public function showProfile($name = 'Guest')
    {
        return view('user_profile', [
            'userName' => $name
        ]);
    }
}