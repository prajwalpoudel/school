<?php

namespace App\Http\Controllers\Auth;

use App\Events\User\Created;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\School\Constants\RoleConstant;
use App\Services\User\UserService;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectToStudent = RouteServiceProvider::STUDENT;
    protected $redirectToTeacher = RouteServiceProvider::TEACHER;
    protected $redirectToParent = RouteServiceProvider::PARENT;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('guest');
        $this->userService = $userService;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Created($user = $this->create($request->all())));

        return response()->json(['redirect' => $this->redirectByRole($request->role_id)]);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $storeData = array_merge(
            $data,
            [
                'password' => bcrypt($data['password'])
            ]
        );

        return $this->userService->create($storeData);
    }

    protected function redirectByRole($roleId) {
        if($roleId = RoleConstant::STUDENT_ROLE_ID) {
            return $this->redirectToStudent;
        }
        else if($roleId = RoleConstant::TEACHER_ROLE_ID) {
            return $this->redirectToTeacher;
        }
        else if($roleId = RoleConstant::PARENT_ROLE_ID) {
            return $this->redirectToParent;
        }
    }
}
