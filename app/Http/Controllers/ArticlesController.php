<?php

namespace App\Http\Controllers;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Validator;



class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = ArticleResource::collection(Article::orderBy('id', 'DESC')->paginate());

        $response = [
            'message' => 'List All Data',
            'data'=> $article
        ];

        return response()->json($response, Response::HTTP_OK);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(),[
            'Title'=>['required', 'min:20'], 
            'Content'=>['required', 'min:200'],  
            'Category'=>['required', 'min:3'],  
            'Status'=>['required', 'in:publish, draft, thrash']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try{
            $article = Article::create($request->all());
            $response = [
                'message' => 'article created',
                'data'=> $article
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch(QueryException $e){
            return response()->json([
                'message' =>'Failed' . $e->errorInfo
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
        $article   = Article::findOrFail($id);
        $response = [
            'message' => 'List Data by id request',
            'data'=> $article
        ];

        return response()->json($response, Response::HTTP_OK);

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
        $article   = Article::findOrFail($id);
        $validator =  Validator::make($request->all(),[
            'Title'=>['required', 'min:20'], 
            'Content'=>['required', 'min:200'],  
            'Category'=>['required', 'min:3'],  
            'Status'=>['required', 'in:publish, draft, thrash']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try{
            $article->update($request->all());   
            $response = [
                'message' => 'article updated',
                'data'=> $article
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch(QueryException $e){
            return response()->json([
                'message' =>'Failed' . $e->errorInfo
            ]);
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
        $article   = Article::findOrFail($id);
        try{
            $article->delete();   
            $response = [
                'message' => 'article delate'
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch(QueryException $e){
            return response()->json([
                'message' =>'Failed' . $e->errorInfo
            ]);
        }
    }
}
