<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Category;
use Validator;


class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();


        return $this->sendResponse($categories->toArray(), 'Categories retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required|string',
            'language' => 'required|integer',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }


        $category = Category::create($input);

        if(is_null($category))
            return $this->sendError('Category could not be created', 500);
        else
            return $this->sendResponse($category->toArray(), 'Category created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);


        if (!$category) {
            return $this->sendError('Category with id = '.$id.' not found.', 400);
        }


        return $this->sendResponse($category->toArray(), 'Category with id = '.$id.' retrieved successfully.');
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
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required|string',
            'language' => 'required|integer',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
	
        $category = Category::find($id);

         if (!$category) {
            return $this->sendError('Category with id = '.$id.' not found.', 400);
        }

        // $updated = $product->fill($request->all())->save();
        
        $category->name =  $input['name'];
        $category->language =  $input['language'];

        $updated = $category->save();

        if($updated)
            return $this->sendResponse($category->toArray(), 'Category updated successfully.');
        else
            return $this->sendError('Category could not be updated', 500);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    	$category = Category::find($id);

         if (!$category) {
            return $this->sendError('Category with id = '.$id.' not found.', 400);
        }

        $deleted = $category->delete();

        if($deleted)
            return $this->sendResponse($category->toArray(), 'Category deleted successfully.');
        else
            return $this->sendError('Category could not be deleted', 500);
    }
}
