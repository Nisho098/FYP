<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\validator;
use Illuminate\support\facades\Auth;
use Illuminate\support\facades\hash;
use App\Models\User;
use App\Models\Student_profiles;
use App\Models\Recruiter_profiles;



class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    //this method will show user registration
    public function registration()
    {
        return view('frontend.Account.studentsignup');

    }
    public function recuiterregistration()
    {
        return view('frontend.Account.recuitersignup');
    }
           //this method will save user registration
           public function processStudentRegistration(Request $request)
    {
        // Validate the student registration data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email|max:100',
            'password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required',
            'role' => 'required|string|in:student',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Save the student to the database
        $user= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student', // Set the role as 'student'
        ]);
        Student_profiles::create([
            'user_id' => $user->id,
            'name' => $user->name,
        ]);

        return redirect()->route('Account.signin')->with('status', 'Student registration successful!');
    }


    // * Process recruiter registration.
    
    public function processRecruiterRegistration(Request $request)
    {
        // Validate the recruiter registration data
      
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email|max:100',
            'password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required',
            'role' => 'required|string|in:recruiter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Save the recruiter to the database
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'recruiter', // Set the role as 'recruiter'
        ]);
        Recruiter_profiles::create([
            'user_id' => $user->id,
            'name' =>$request->input('name'), // You can replace this with real input if available
        ]);

        return redirect()->route('Account.signin')->with('status', 'Recruiter registration successful!');
    }





   
        
           


           public function login()
           {
               return view('frontend.Account.signin');
           }
           
           public function loginUser(Request $request)
           {
               // Validate input fields
               $request->validate([
                   'email' => 'required|email',
                   'password' => 'required',
               ]);
              
           
               // Attempt to authenticate the user
               if (Auth::attempt($request->only('email', 'password'))) {
                   return redirect()->route('dashboard')->with('success', 'Login successful!');
               }
           
               // If authentication fails, redirect back with error
               return back()->with('error', 'Invalid email or password.');
           }
           
          
        
    
           
           
           
           

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
