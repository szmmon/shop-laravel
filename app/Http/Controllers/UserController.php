<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return view('users.index', [
        'users' => User::paginate(3) //zastosowanie eloquent - ORM laravela do obslugi baz danych
    ]); // "." odpowiada "/" dla ściezki
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) :JsonResponse
    {
        // $user = User::find($id);
        // throw new Exception();
        try {
        $user->delete();
        return response()->json(
            ['status'=> 'success']
        );
            
        } catch (\Exception $e) {
        return response()->json(
            ['status'=> 'error',
            'message'=>'Serverside error occured']
        )->setStatusCode(500);
            
        }
    }
}
