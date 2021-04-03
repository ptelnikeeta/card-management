<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;


class CardController extends Controller
{
    function __construct()
    {
        $this->model = 'Card';
    }


    public function index($slug=null){
        $card=null;
        if($slug){
            $this->model_key = 'slug';
            $this->model_id = $slug;
            $card=$this->get();
            if($card==null){
                abort(404);
            }
        }else{
            abort(404);
        }
        return View::make("cards.card-view",['card'=>$card]);

    }
    public function cards($id=null, Request $request){
        $card=null;
        if($id){
            $this->model_key = 'id';
            $this->model_id = $id;
            $card=$this->get();
            //dd($card);
            if($card==null){
                abort(404);
            }
        }

        $search = '';
        $records=$this->records;
        $field = $request->get('field') != '' ? $request->get('field') : 'id';
        $sort = $request->get('sort') != '' ? $request->get('sort') : 'desc';
        $result = $this->getModelObject();
        $result = $result->select(
            'cards.*'
        );

        if($request['search']){
            $search=$request['search'];
            $result = $result->where(function ($query) use ($search)  {
                $query->where('cards.id','=',$search)
                    ->orwhere('cards.name','like','%'.$search.'%');
            });
        }

        $result = $result->orderBy($field, $sort);
        //echo $result->toSql();
        $result = $result->paginate($records);
        $result = $result->withPath('?search=' . $search.'&field='.$field.'&sort='.$sort);

        return View::make("cards.card",['id'=>$id,'card'=>$card, 'cards'=>$result]);
    }

    public function cardCreateSubmit(Request $request){
        $this->data = $request->all();
        //dd($this->data);

        $this->validator();
        $validate = $this->validate();

        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }
        try
        {
            $this->sanitizeRequest();
            $this->convertB64ToImg();
            $this->data['slug']=$this->createSlug($this->data['name']);
            $card = $this->create($this->data);
            return redirect()->route('cards');
        }
        catch (\Exception $e)
        {
            dd($e);
        }
    }

    public function cardEditSubmit ($id=null, Request $request){
        $this->data = $request->all();
        //dd($this->data);
        $this->validator();
        $validate = $this->validate();

        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }
        try
        {
            $this->sanitizeRequest();
            $this->convertB64ToImg();
            $this->model_key = 'id';
            $this->model_id = $id;
            //dd($this->data);
            $card=$this->update($this->data);
            return redirect()->route('cards');
        }
        catch (\Exception $e)
        {
            dd($e);
        }
    }

    public function createSlug($title, $id = 0)
    {
        $slug = Str::slug($title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
    }
    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Card::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }

    private  function convertB64ToImg(){
        if ( strpos($this->data['photo'], '/images/') === false) {
            $folderPath = "/images/";
            $image_parts = explode(";base64,", $this->data['photo']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath.uniqid().'.'.$image_type;
            $success = Storage::disk('public')->put($file, $image_base64); //file_put_contents(public_path().$file, $image_base64);
            $this->data['photo']=$file;
        }
    }

    private function validator()
    {
        $this->data_validator = [
            'name' => 'required|max:255',
            'designation' => 'required|max:255',
            'business_name' => 'required|max:255',
            'description' => 'required|max:151',
            'wp_number' => 'required|max:10',
            'contacts' => 'required',
            'address' => 'required',
            'photo' => 'required',
        ];

        $this->data_validator_messages = [

        ];
    }
}
