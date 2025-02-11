<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function teacher_register(){
        return view('frontend.teacher.register');
    }

    public function teacher_store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Teacher::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $teacher = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('teacher')->login($teacher);

        return redirect(route('teacher.dashboard', absolute: false));
    }

    public function teacher_dashboard(){
        return view('backend.teacher.dashboard');
    }

    public function teacher_login(){
        return view('frontend.teacher.login');
    }

    public function teacher_check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $crediantals=$request->only('email','password');
        
        $rember =$request->filled('remember');

        if(Auth::guard('teacher')->attempt($crediantals,$rember)){
            return redirect()->route('teacher.dashboard');
        }else{
            return back()->with('message','crediantial not match')->withInput($request->except('password'));
        }
    }

    public function teacher_destory(Request $request){
        Auth::guard('teacher')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }
}
