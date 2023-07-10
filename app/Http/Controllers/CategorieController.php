<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;



class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(),[
            'ctg_name' => 'required|max:191',
            'ctg_img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors'=> $validator->messages()
            ]);
        }
        else{
            $newCtg = new Categorie;
            $newCtg->id_user = Auth::id();
            $newCtg->categoryName = $request->input('ctg_name');
            if($request->hasFile('ctg_img')){
                $file = $request->file('ctg_img');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/Categories/',$filename);
                $newCtg->picture = $filename;
            }
            $newCtg->save();
            return response()->json([
                'status'=>200,
                'message' => 'Category create with successfully!', 
                'data' => $newCtg
            ]);
        }
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
        $edit_ctg = Categorie::find($id);
        if($id)
        {
            return response()->json([
                'status'=>200,
                'editCategory' => $edit_ctg 
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message' => 'Category Not Found'
            ]);
        }  
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
            'ctg_up_name' => 'required|max:191'   
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors'=> $validator->messages(),
                'request' =>$request
            ]);
        }
        else {
                $newCtg = Categorie::find($id);
                if($newCtg)
                {
                    $newCtg->id_user = Auth::id();
                    $newCtg->categoryName = $request->input('ctg_up_name');
                    if($request->hasFile('ctg_up_img'))
                    {
                        $path = 'uploads/Categories/'+$newCtg->picture;
                        if(File::exists($path))
                        {
                            File::delete($path);
                        }
                        $file = $request->file('ctg_up_img');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time().'.'.$extension;
                        $file->move('uploads/Categories/',$filename);
                        $newCtg->picture = $filename;
                    }
                    $newCtg->save();
                    return response()->json([
                        'status'=>200,
                        'message' => 'Category Updated with successfully!', 
                        'data' => $newCtg
                    ]);
                }
                else
                {
                    return response()->json([
                        'status' => 404,
                        'message'=> 'Category Not Found!' 
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
        $delCtg = Categorie::find($id);
         
        $path = '/uploads/Categories/'.$delCtg->picture;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $delCtg ->delete();
        return response() -> json(['status'=>'Poof! Your Category has been deleted!']);
    }
}
