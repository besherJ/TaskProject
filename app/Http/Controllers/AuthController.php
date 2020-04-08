<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Task;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{   



    public function show(Request $request)
    {   

        $employees = User::where('role' ,'employee')->paginate(5);    


        if($request->ajax())
        {
            return view('employees' ,['employees' => $employees]);
        }

        return view('showEmployees' ,['employees' => $employees]);
    }

    public function showRefresh()
    {
        $employees = User::where('role' ,'employee')->get();    

        return view('employees' ,['employees' => $employees]);
    }



    public function empRatings(Request $request)
    {
        
        $employees = User::ratings();

        if($request->ajax())
        {
            return view('rating' ,compact('employees' , $employees));
        }

        return view('employeesRating', ['employees' => $employees]);

    }

    public function empRatingsRefresh()
    {


        $employees = User::ratings();
            
            
    }

    public function signup(Request $request)
    {

        return view('signup');

    }



     public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = new User([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);


        $user->save();

        return back()->with('status' , 'Successfully created employee!');

    }


    public function edit(User $user)
    {
        return view('editEmployee' ,['user' => $user]);
    }



    public function update(Request $request ,User $user)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
        ]);


        if($request->has('photo'))
        {
            $image = $request->file('photo')->store('public');
            $cover = $request->file('photo');
            $extenstion = $cover->getClientOriginalExtension();
            $image = $cover->getFilename(). '.' .$extenstion;
            $user->image = $image;
            Storage::disk('public')->
            put($cover->getFilename(). '.' .$extenstion ,File::get($cover));
        }
        

        $user->name = $request->name;
        $user->role = $request->role;

        $user->email = $request->email;

        if($request->password != '')
        $user->password = bcrypt($request->password);

        $user->save();

        return back()->with('status' , 'Successfully updated employee!');

    }



    public function delete(User $user)
    {   

        $user->delete();

        return back();
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
            return back()->with('message' ,'Wrong email or password please try again');


        $user = $request->user();

        $tokenResult = $user->createToken('paat');

        $token = $tokenResult->token;

        $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        return redirect()->route('welcome')->withCookie(cookie()->forever('ck' ,$tokenResult->accessToken))->with('message' ,'Successfully logged in');
    }


    public function upload()
    {
        return view('uploadImage');
    }

     public function uploadImage(Request $request)
    {   

        // $imageName = time().'.'.$request->file('profile_image)'
        //      ->getClientOriginalExtension();

        
        $cover = $request->file('photo');
        $extenstion = $cover->getClientOriginalExtension();

        Storage::disk('public')->
        put($cover->getFilename(). '.' .$extenstion ,File::get($cover));

        return back();

    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        

        $request->user()->token()->revoke();

        cookie::forget('ck');

        return redirect()->route('login');
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {   

        return response()->json([
            'user' => Auth::user()
        ]);
    }



}