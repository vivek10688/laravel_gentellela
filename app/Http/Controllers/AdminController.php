<?php
namespace App\Http\Controllers;
use App\Http\Requests\InsertUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Mail;
use App\User;
use App\UserRegisters;
use App\UserProfiles;
use Validator;
use View;
use Auth;
use Session;
use Hash;
use DB;



class AdminController extends Controller
{
	
    public function index(){
    	return view('admin_login');
    }

    public function do_login(Request $request){
    	$input 		= 	$request->all();
 		
 		$this->validate($request, ['username' => 'required|min:3|max:255','password' => 'required',]);

    	$username 	= 	$input['username'];
    	$password 	= 	$input['password'];
    	
    	if (Auth::attempt(array('username' => $username, 'password' => $password))){
            return view('dashboard');
        }else{        
            return "Wrong Credentials";
        }
    }



    public function logout(Request $request) {
	  Auth::logout();
	  return redirect('/');
	}

	public function profile($id){
		$user = DB::table('users')->where('id', $id)->get();
	}

	public function add_user(){
		 return view('add_user');
	}

	public function insert_users(InsertUserRequest $request){
		$input 			= 	$request->all();
		$first_name 	= 	$input['first_name'];
		$last_name 		= 	$input['last_name'];
		$username 		= 	$input['username'];
		$email 			= 	$input['email'];
		$password 		= 	$input['password'];
		$status 		= 	$input['status'];
		$created_on 	= 	date('Y-m-d');
		$last_updated 	= 	date('Y-m-d');
		$user_role 		= 	2;
		
		$values = array(
						'first_name'=>$first_name,
						'last_name'=>$last_name,
						'username'=>$username,
						'email'=>$email,
						'password'=> Hash::make($password),
						'is_active'=>$status,
						'created_on'=>$created_on,
						'last_updated'=>$last_updated,
						'user_role'=>$user_role,
						'remember_token'=>''
					);
		DB::table('users')->insert($values);
		return redirect()->action('AdminController@view_users');
	}

	public function view_users(){
		$data = DB::table('users')->where('user_role',2)->get();
		return view('view_users',['users' => $data]);
	}

	public function change_status(Request $request){
		$input 			= 		$request->all();
		$id 			= 		$input['id'];
		$table_name 	= 		$input['table_name'];
		$status_id 		=	 	$input['status_id'];

		$edited_character = DB::table($table_name)->where('id', $id)->update([
            'is_active'    => 1-$status_id,
            'last_updated' => date('Y-m-d H:i:s')
        ]);
	}

	public function delete_record(Request $request){
		$input 			= 		$request->all();
		$id 			= 		$input['id'];
		$table_name 	= 		$input['table_name'];
		DB::table($table_name)->where('id', $id)->delete();
	}

	public function edit_users(Request $request, $id){
		$data = DB::table('users')->where('id',$id)->get();
		return view('edit_user',['users' => $data]);
	}



	public function update_user(Request $request, $id)
	{
		$input 			= 	$request->all();
		$first_name 	= 	$input['first_name'];
		$last_name 		= 	$input['last_name'];
		$username 		= 	$input['username'];
		$email 			= 	$input['email'];
		
		$edited_character = DB::table('users')->where('id', $id)->update([
			'email' 	=> $email,
			'username' 	=> $username,
            'first_name'=> $first_name,
            'last_name' => $last_name
        ]);

        return redirect()->action('AdminController@view_users');
	}

	public function add_salary(){
		$data = DB::table('users')->where('user_role',2)->get();
		return view('add_salary',['users' => $data]);
	}

	public function insert_user_salary(Request $request){
		$input 			= 	$request->all();
		$user_id 		= 	$input['user_id'];
		$year 			= 	$input['year'];
		$month 			= 	$input['month'];
		$basic_salary 	= 	$input['basic_salary'];
		$hra 			= 	$input['hra'];
		$travel_allowance = $input['travel_allowance'];
		$extra 			= 	$input['extra'];
		$total 			= 	$input['total'];
		$created_on 	= 	date('Y-m-d');
		$last_updated 	=   date('Y-m-d');
		$is_active 		=   1;

		$values = array(
						'user_id'=>$user_id,
						'year'=>$year,
						'month'=>$month,
						'basic_salary'=>$basic_salary,
						'hra'=> $hra,
						'travel_allowance'=>$travel_allowance,
						'extra'=> $extra,
						'total'=>$total,
						'created_on'=>$created_on,
						'last_updated'=>$last_updated,
						'is_active'=>$is_active
					);

		DB::table('users_salary')->insert($values);
	}

	public function view_salary(){
		$users  = DB::table('users')->where('user_role',2)->get();
		$salary = DB::table('users_salary')->get();
		return view('view_salary',array('users' => $users,'salary' => $salary));
	}

	public function edit_salary(Request $request, $id){
		$users 	= DB::table('users')->where('user_role',2)->get();
		$salary = DB::table('users_salary')->where('id',$id)->get();
		return view('edit_salary',array('users' => $users,'salary' => $salary));
	}

	public function update_salary(Request $request, $id)
	{
		$input 				= 	$request->all();
		$user_id 			= 	$input['user_id'];
		$year 				= 	$input['year'];
		$month 				= 	$input['month'];
		$basic_salary 		= 	$input['basic_salary'];
		$hra 				= 	$input['hra'];
		$travel_allowance 	= 	$input['travel_allowance'];
		$extra 				= 	$input['extra'];
		$total 				= 	$input['total'];

		$edited_character = DB::table('users_salary')->where('id', $id)->update([
			'user_id' 	=> $user_id,
			'year' 	=> $year,
            'month'=> $month,
            'basic_salary' => $basic_salary,
            'hra' 	=> $hra,
            'travel_allowance'=> $travel_allowance,
            'extra' => $extra,
            'total'=>$total,
            'last_updated'=>date('Y-m-d H:i:s'),
            'is_active'=>1
        ]);
        return redirect()->action('AdminController@view_salary');
	}


	public function add_subadmin(){
		echo 'hi';
	}
}  