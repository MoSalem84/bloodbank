<?php

namespace App\Http\Controllers\back\cpanel;

use App\Models\User ;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use \Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /*** Display a listing of the resource.** @return \Illuminate\Http\Response*/

    public function index(Request $request)
    {
        $users= User::orderBy('id', 'asc')->paginate(5);
        $roles = Role::pluck('name', 'name')->all();

       return view('back.admin.cpanel.sections.administration-panel.admins.index', compact('users','roles'));

    }

    /*** Show the form for creating a new resource.** @return \Illuminate\Http\Response*/

    public function create()
    {

        $roles = Role::pluck('name', 'name')->all();

        return view('back.admin.cpanel.sections.administration-panel.admins.create', compact('roles'));
    }

    /*** Store a newly created resource in storage.** @param  \Illuminate\Http\Request
     * $request* @return \Illuminate\Http\Response*/

    public function store(Request $request)
    {

        $request->validate([

                'name'      => ['required','string', 'max:255'],
                'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                // 'phone'     => ['required', 'unique:users' ,'regex:/^01[0125][0-9]{8}$/'],
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        // $user->assignRole($request->input('roles'));

        $user->syncRoles($request->roles_name);

        return redirect()->route('admin.cpanel.admins.index')->with('success', 'تم تسجيل المدير بنجاح');
    }

    /*** Display the specified resource.** @param  int  $id* @return \Illuminate\Http\Response*/

    public function show($id)
    {

        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /*** Show the form for editing the specified resource.** @param  int  $id* @return \Illuminate\Http\Response*/

    public function edit($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('back.admin.cpanel.sections.administration-panel.admins.edit',
        compact('user', 'roles', 'userRoles'));
    }

    /*** Update the specified resource in storage.**
     *  @param  \Illuminate\Http\Request  $request* @param  int  $id* @return \Illuminate\Http\Response*/

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([

            'name'      => ['required','string', 'max:255'],
            'email'     => 'required|email|unique:users,email,'.$id,
            'password' => ['nullable','string','confirmed'],
            // 'confirm-password'=>['confirmed'],
            'phone'     => 'required' ,'regex:/^01[0125][0-9]{8}$/' ,'unique:users'.$id,
            // 'roles_name'=>'required'
    ]);

    // $input = $request->all();

    // if(!empty($input['password'])){

    // $input['password'] = Hash::make($input['password']);
    // }
    // else{
    // $input = Arr::except($input,array('password'));
    // }

    // $user = User::find($id);

    // $user->update($input);

    // DB::table('model_has_roles')->where('model_id',$id)->delete();

    // $user->assignRole($request->input('roles'));


    $data = [
        'name'=>$request->name ,
        'email'=>$request->email ,
        'phone'=>$request->phone
    ];

        if(!empty($request->password)){

            $data +=[
                'password' =>Hash::make($request->password),
            ];
        }
        $user->update($data);

        $user->syncRoles($request->roles_name);

        return redirect()->route('admin.cpanel.admins.index')->with('success', ' تم تحديث بيانات المدير بنجاح');



    }

    /*** Remove the specified resource from storage.** @param  int  $id* @return \Illuminate\Http\Response*/

    public function destroy($id)
    {

        User::find($id)->delete();

        return redirect()->route('admin.cpanel.admins.index')->with('deleted', 'تم حذف المدير بنجاح');

    }

}
