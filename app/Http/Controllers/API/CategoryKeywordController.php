<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\CategoryKeyword;
use App\Category;
use Validator;


/**
 * @group User task errors
 *
 * APIs for retrieving user task errors
 */
class CategoryKeywordController extends BaseController
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keywords = CategoryKeyword::all(); //desc

        return $this->sendResponse($keywords->toArray(), 'Keywords retrieved successfully.');
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
            'category_name' => 'required|string',
            'language' => 'required|string',
            'keyword' => 'required|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }


        #We obtain category ID
        $category = Category::where('name', $input['category_name'])
                            ->where('language', $input['language'])
                            ->first();

        if(is_null($category))
            return $this->sendError('CategoryKeyword with keyword = '.$input['keyword'].' not found.', 400);

        $input['category_id'] = $category->id;


        if (strpos($input['keyword'], ',')) {
            // insert multiple keywords
            $keyword = $this->insertValuesFromListString($input['keyword'], $input['category_id']);
        } else {
            $keyword = CategoryKeyword::create($input);
        }

        if(is_null($keyword))
            return $this->sendError('Keyword could not be created.', 500);
        else{
            return $this->sendResponse($keyword->toArray(), 'Keyword created successfully.');
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
        $keyword = CategoryKeyword::find($id);


        if (!$keyword) {
            return $this->sendError('Keyword with id = '.$id.' not found.', 400);
        }


        return $this->sendResponse($keyword->toArray(), 'Keyword with id = '.$id.' retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'category_name' => 'required|string',
            'language' => 'required|string',
            'keyword' => 'required|string',
            'new_keyword' => 'required|string'
        ]);


         if($validator->fails()){
             return $this->sendError('Validation Error.', $validator->errors(), 400);       
         }

        #We obtain category ID
        $category = Category::where('name', $input['category_name'])
                            ->where('language', $input['language'])
                            ->first();

        $keyword = CategoryKeyword::where('category_id', $category->id)
                                    ->where('keyword', $input['keyword'])
                                    ->get();

        if (is_null($keyword)) {
            return $this->sendError('Keyword list not found.', 400);
        }

        $keyword->keyword = $input['new_keyword'];
        $updated = $keyword->save();

        if($updated)
            return $this->sendResponse($keyword->toArray(), 'Keyword updated successfully.');
        else
            return $this->sendError('Keyword could not be updated', 500);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'category_name' => 'required|string',
            'language' => 'required|string'
            'keyword' => 'required|string',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        #We obtain category ID
        $category = Category::where('name', $input['category_name'])
                            ->where('language', $input['language'])
                            ->first();

        if(is_null($category))
            return $this->sendError('CategoryKeyword with keyword = '.$input['keyword'].' not found.', 400);

        # Delete old values
        $deleted = CategoryKeyword::where('category_id', $category->id)
                                        ->where('keyword', $input['keyword'])
                                        ->delete();

        if($deleted)
            return $this->sendResponse($deleted, 'Keyword = '.$input['keyword'].'  deleted successfully.');
        else
            return $this->sendError('Keyword could not be deleted', 500);
    }


    /**
    *
    *   Decode JSON String of reason_code values and insert them in UserTaskError
    */
    private function insertValuesFromListString($keywords, $categoryId)
    {    

        #Decoding the reason_code jsonString parameter. Array of reason_Codes
        $keywordsArray = explode (",", $keywords); 

        // $input['reason_code'] -> JSON string
        // '[{"name":"rc1","reason_code":"rc1"},{"name":"rc4","reason_code":"rc4"},{"name":"rc3","reason_code":"rc2"}]';

        if(sizeof($keywordsArray) > 0){
            #Create array of values to insert
            foreach ((array)$keywordsArray as $key => $value) {
                $multipleValuesToInsert[] = array(
                                                "category_id" => $categoryId,
                                                "keyword" => $value
                                            );
            }

            #insert multiple values
            $keyword = CategoryKeyword::insert($multipleValuesToInsert);
        } else {
            $keyword = true; //if the reason_code is empty, it is still correct, that means the user just wanted to delete all his previous selected options. 
        }

        

        return $keyword;
    }

}

