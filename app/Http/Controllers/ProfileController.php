<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class ProfileController extends Controller
{
    protected $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }
    public function index()
    {
        return response()->json($this->database->getReference('user')->getValue());
    }
    public function create(Request $request)
    {
        $this->database
            ->getReference('user')
            ->push([
                'address' => $request['address'] ,
                'brith' => $request['birth'],
                'gender' => $request['gender']
            ]);

        return response()->json(["statusCode" => 200, "messages"=>"Profile User Created Successfully"]);
    }
    public function edit(Request $request,$id)
    {
        $this->database->getReference('user/'.$id)
        ->set([
            'address' => $request['address'] ,
            'brith' => $request['birth'],
            'gender' => $request['gender']
        ]);

        return response()->json(["statusCode" => 200, "messages"=>"Profile User Updated Successfully"]);
    }
    public function delete($id)
    {
        $this->database
            ->getReference('user/'.$id)
            ->remove();

        return response()->json(["statusCode" => 200, "messages"=>"Profile Deleted Successfully"]);
    }
}
