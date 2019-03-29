<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\User_activitie;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate( [
            'user_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'integer'],
            'postal_code' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
             User::create([
            'user_name' => $request['user_name'],
            'email' => $request['email'],
            'first_name'=> $request['first_name'],
            'last_name'=> $request['last_name'],
            'address'=> $request['address'],
            'house_number'=> $request['house_number'],
            'city'=> $request['city'],
            'postal_code'=> $request['postal_code'],
            'telephone_number'=> $request['telephone_number'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users=User::sortable()->paginate(10);
        return view('home',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::find($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $user= User::find($id);
        $user->user_name=request('user_name');
        $user->first_name=request('first_name');
        $user->last_name=request('last_name');
        $user->address=request('address');
        $user->city=request('city');
        $user->house_number=request('house_number');
        $user->postal_code=request('postal_code');
        $user->telephone_number=request('telephone_number');
        $user->email=request('email');
        $record1=$user->getOriginal();
        $record=$user->getDirty();
        $user->save();
        $user->getDirty(); 
        if ($user->exists && count($record) > 0) {
        $primarykey = isset($user->primarykey) ? $user->primarykey : 'id';
        foreach ($record as $k => $v) {
        $change = new User_activitie();
        $change->user_id = $user->{$primarykey};
        $change->modified_by= $user->user_name;
        $change->field_name = $k;
        $change->old_value = $record1[$k];
        $change->new_value = $v;
        $change->save();  
        }
    }
         return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/users');
    }
    
    public function search(Request $request)
    {
        $search=$request->get("search");
        $users=\DB::table('users')->where('user_name','like','%'.$search.'%')
        ->orWhere('first_name','like','%'.$search.'%')
        ->orWhere('email','like','%'.$search.'%')->paginate(10);
        return view('home',['users'=>$users]);
    }

    public function home()
    {
        return view('auth.login');
    }
   

}
