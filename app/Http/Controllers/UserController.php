<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Required Parameter handled here
    public function getUser($id)
    {
        return "Tame User ID " . $id . " ni mahiti mangi che.";
    }

    // Optional Parameter with Default Value
    public function getProfile($name = "Guest")
{
    // Ahiya 'user_profile' e Blade file nu naam che
    return view('user_profile', ['userName' => $name]);
}

    // Multiple Parameters
    public function postComment($postId, $commentId)
    {
        return "Post ID: " . $postId . " upar Comment ID: " . $commentId . " mali che.";
    }
    public function showProfile($name = 'Guest') {
    return view('user_profile', ['userName' => $name]); // Ahiya 'user_profile' j hovu joie
}
}