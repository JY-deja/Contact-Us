<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use app\http\Requests;
use App\Models\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

//use App\Models\Login ; 

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *['logins' => Login::all()]
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Login.login');
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
        $validator = Validator::make($request->all(),[
            'name' =>  ['required','string', 'max:255'],
            //'email' => ['required','string', 'email', 'max:255', 'unique:users'],
            //, 'unique:users'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'error'=>$validator->errors()]);
        }
        else
        {
            $query = User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                //'email'=>$request->email,
            ]);

            if(!$query)
            {
                return response()->json([
                    'status'=>404,
                    'message'=>$query->messages()
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>200,
                    'message'=>'Your Profile has been updated successfully!',
                    'name' => $request->name
                ]);
            }
        }
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
    public function check(Request $request){

        $request->validate([
            'user'=> 'required',
            'pass'=> 'required',
        ]);

        $login = new Login();

        $user = strip_tags($request->input('user'));
        $pass = strip_tags($request->input('pass'));
        $select = "select pass from login where user = $user ";
        if($select === $pass){
            //return redirect()->route('contacts.dashboard');
        }
        
        else{
           echo 'Username or Password incorrecte.';
        }



       

    }
}


// user kikhaso ikon unique (1).
        //mnin ghadi idakhal luser ghadi imchi howa la base de données oyjib liya pass .
        //if (pass === passs ) ==> ghadi idih la page dashboard sinon ghadi afficher lih erreur bali rah soit user / pass ghaltin.
        
