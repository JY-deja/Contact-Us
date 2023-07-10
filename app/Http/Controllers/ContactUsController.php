<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use app\http\Requests;
use App\Models\Contact;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Contact::where('id_user',Auth::id())->get(); 
        if ($request->ajax()) 
        {     
             return  Datatables::of($data)->addIndexColumn()
                ->addColumn('action_1', function($row){
                    $btn = '<button class="edit btn rounded-pill btn-outline-info btn-md text-hover-white " data-bs-toggle="modal"  data-bs-target="#editmodal" data-id="'.$row['id'].'" id ="edit" name="edit">
                        <span class="bi bi-pencil-square h4"></span>
                    </button>';
                    return $btn;
                })
                ->addColumn('action_2', function($row){
                    $btn = '<button class="btn rounded-pill btn-outline-danger btn-md " data-id="'.$row['id'].'" id = "delete"  >
                    <span class="bi bi-trash h4"></span>
                </button>';
                    return $btn;
                })
                ->rawColumns(['action_1','action_2'])
                ->make(true);
                  
        }
       return view('contactUs.index'); 
    }
    // public function index(Request $request){
    //     $data = Contact::all();
    //     return response($data);
    // }
 public function indexTeam(Request $request,$typeTeam)
    {
        if ($request->ajax() && $typeTeam != null) 
        {
            
            $data = Contact::where('id_user',Auth::id())->where('Category',$typeTeam)->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action_1', function($row){
                    $btn = '<button class="edit btn rounded-pill btn-outline-info btn-md text-hover-white " data-bs-toggle="modal"  data-bs-target="#editmodal" data-id="'.$row['id'].'" id ="edit" name="edit">
                        <span class="bi bi-pencil-square h4"></span>
                    </button>';
                    return $btn;
                })
                ->addColumn('action_2', function($row){
                    $btn = '<button class="btn rounded-pill btn-outline-danger btn-md " data-id="'.$row['id'].'" id = "delete"  >
                    <span class="bi bi-trash h4"></span>
                </button>';
                    return $btn;
                })
                ->rawColumns(['action_1','action_2'])
                ->make(true) ;
                 
        }    
       return view('contactUs.indexTeam',['type'=>$typeTeam]);
    }
    public function team(Request $request){
        $category = DB::table('categories')
                ->where('id_user',Auth::id())
                ->get();
            if ($request->ajax()){
                return response()->json(['category' => $category ]);
            }
       
        return view('contactUs.team');

    }
    public function selectCategory(){
        $category = DB::table('categories')
                ->where('id_user',Auth::id())
                ->get();
        return response()->json(['status'=>'Get Category with successfully!', 'category' => $category ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'catg'=> 'required',
            'fname'=> 'required',
            'phone'=> 'required',
        ]);

        $contact = new Contact();
        //contact est le model doit declarer a l'iterieur et si n'est pas cree il faut cree avant and utlise
        $contact->id_user = Auth::id();
        $contact->Category = strip_tags($request->input('catg'));
        $contact->Lname = strip_tags($request->input('fname')) ;
        $contact->number = strip_tags($request->input('phone')); 

        $contact->save();
        return response()->json(['status'=>'Contact save with successfully!', 'msg' => $contact ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'catg'=> 'required',
            'fname'=> 'required',
            'phone'=> 'required',
        ]);
        
        $contact = Contact::find($id);
        $contact->id_user = Auth::id();
        $contact->Category = $request->catg ;
        $contact->Lname = $request->fname ;
        $contact->number = $request->phone; 
        $contact->save();

        return response()->json(['Status'=>'Update contact with successfully!', 'messge'=>$contact]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {

        //$delet = new Contact();
        $delet = Contact::find($id);
        $delet->delete();
        
        return response() -> json(['status'=>'Poof! Your Contact has been deleted!']);
        //return response('Poof! Your Contact has been deleted!',200);
    }

    




    // public function getContactUs(){
        
    //     $contacts = Contact::all();
    //     return DataTables::of($contacts)
    //                         ->make(true);
        
    // }
    
}