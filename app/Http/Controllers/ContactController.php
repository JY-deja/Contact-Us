<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\http\Requests;
use App\Models\Contact;

class ContactController extends Controller
{
    //array of static Data 
    /*private static function getData(){
       return [
            ["Fname" => "khadija","Lname" => "jy","number" => 0626010000 ]
        ];
        
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ghdi ndiro i3adat lma3lomat li darnahom fi la fonction getData.
         //hadik data ghadi n3ayto li 3la chkal key valeurs 
         //return view('index');
       return view('contacte.index',[
        'contacts' => Contact::all()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("contacte.create");

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    }
    public function store(Request $request)
    {

        $request->validate([
            'nom'=> 'required',
            'prenom'=> 'required',
            'numero'=> 'required',
        ]);

        $contact = new Contact();

        $contact->Lname = strip_tags($request->input('nom')) ;
        $contact->Fname = strip_tags($request->input('prenom'));
        $contact->number = strip_tags($request->input('numero')); 

        $contact->save();

        return redirect()->route('contacts.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // dd(Contact::find($id));
        return view('contacte.edit',[
            'contact' => Contact::find($id)
        ]);
        
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
        $to_up = Contact::find($id);

        $to_up->Lname = strip_tags($request->input('up_nom')) ;
        $to_up->Fname = strip_tags($request->input('up_prenom'));
        $to_up->number = strip_tags($request->input('up_numero')); 

        $to_up->save();

        return redirect()->route('contacts.index');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $to_delete = Contact::find($id);
        $to_delete->delete();
        return redirect()->route('contacts.index');
    }
}
