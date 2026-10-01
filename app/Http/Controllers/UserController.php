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


    /*
    |--------------------------------------------------------------------------
    | 8. USER MANAGEMENT DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $totalUsers = User::count();

        $latestUser = User::oldest('id')->first();

        $firstUser = User::orderBy('id')->first();

        $highestId = User::max('id');

        $lowestId = User::min('id');

        $recentUsers = User::oldest('id')
            ->take(10)
            ->get();

        return view('parameter_dashboard', [
            'totalUsers' => $totalUsers,
            'latestUser' => $latestUser,
            'firstUser' => $firstUser,
            'highestId' => $highestId,
            'lowestId' => $lowestId,
            'recentUsers' => $recentUsers,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | 9. ADVANCED USER SEARCH
    |--------------------------------------------------------------------------
    */

    public function users(Request $request)
    {
        $query = User::query();

        /*
        | Search by name, email or ID
        */
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%');

                if (is_numeric($search)) {
                    $q->orWhere('id', $search);
                }
            });
        }


        /*
        | Minimum ID
        */
        if ($request->filled('min_id')) {
            $query->where('id', '>=', $request->min_id);
        }


        /*
        | Maximum ID
        */
        if ($request->filled('max_id')) {
            $query->where('id', '<=', $request->max_id);
        }


        /*
        | Email domain filter
        */
        if ($request->filled('domain')) {

            $domain = ltrim($request->domain, '@');

            $query->where('email', 'LIKE', '%@' . $domain);
        }


        /*
        | Sorting
        */
        switch ($request->get('sort', 'newest')) {

            case 'oldest':
                $query->orderBy('id', 'asc');
                break;

            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;

            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;

            case 'email_asc':
                $query->orderBy('email', 'asc');
                break;

            case 'email_desc':
                $query->orderBy('email', 'desc');
                break;

            default:
                $query->orderBy('id', 'asc');
                break;
        }


        /*
        | Pagination
        */
        $users = $query
            ->paginate(5)
            ->withQueryString();


        return view('users', [
            'users' => $users
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | 10. EDIT USER USING ROUTE PARAMETER
    |--------------------------------------------------------------------------
    */

    public function editUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->view('user_not_found', [
                'message' => 'User ID ' . $id . ' par koi user malyo nathi.'
            ], 404);
        }

        return view('user_edit', [
            'user' => $user
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | 11. UPDATE USER USING ROUTE PARAMETER
    |--------------------------------------------------------------------------
    */

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->view('user_not_found', [
                'message' => 'User ID ' . $id . ' par koi user malyo nathi.'
            ], 404);
        }

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id
            ],
        ]);

        $user->update($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'User successfully updated.');
    }


    /*
    |--------------------------------------------------------------------------
    | 12. DELETE USER USING ROUTE PARAMETER
    |--------------------------------------------------------------------------
    */

    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->view('user_not_found', [
                'message' => 'User ID ' . $id . ' par koi user malyo nathi.'
            ], 404);
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User successfully deleted.');
    }


    /*
    |--------------------------------------------------------------------------
    | 13. JSON USER PARAMETER API
    |--------------------------------------------------------------------------
    */

    public function userJson($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.',
                'parameter' => $id,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'User loaded using route parameter.',
            'parameter' => $id,
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at,
            ]
        ]);
    }
}