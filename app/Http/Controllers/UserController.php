<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

  protected $model;
   public function __construct(User $user)
   {
     $this->model = $user;
   } 

    public function index(Request $request) {
        
       // $users = User::where('name', 'LIKE',"%{$request->search}%")->get();

        $users = $this->model
                       ->getUsers(
                              search: $request->search ?? ''
                       );
        return view('users.index',compact('users'));
    }

    public function show($id) {
        //$user = User::where('id', '=',$id)->first();
        //$user = User::find($id);
        if(!$user = $this->model->find($id))
          return redirect()->route('users.index');
          
        return view('users.show',compact('user'));

    }

    public function create() {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request) {

       
       // $user = new User;
       // $user->name = $request->name;
       // $user->email = $request->email;
       // $user->password = $request->password;
       // $user->save();
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = $this->model->create($data);
       
        return redirect()->route('users.index');
    }

    public function edit ($id) {
        
        if(!$user = $this->model->find($id))
          return redirect()->route('users.index');

        return view('users.edit',compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id) {
        
        if(!$user = $this->model->find($id))
          return redirect()->route('users.index');

        $data = $request->only('name','email');
        if($request->password)
          $data['password'] = bcrypt($request->password);

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function delete($id) {
      //$user = User::where('id', '=',$id)->first();
      //$user = User::find($id);
      if(!$user = $this->model->find($id))
        return redirect()->route('users.index');
      $user->delete() ;

      return redirect()->route('users.index');

  }



}
