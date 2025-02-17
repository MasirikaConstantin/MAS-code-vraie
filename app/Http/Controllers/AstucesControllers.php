<?php

namespace App\Http\Controllers;

use App\Http\Requests\Astucesrequest;
use App\Http\Requests\CommentaireAstuceRequest;
use App\Http\Requests\searchAstuce;
use App\Models\Astuce;
use App\Models\AstuceBrouillon;
use App\Models\Categorie;
use App\Models\CommentaireAstuce;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AstucesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(searchAstuce $request)
    {
            $query=Astuce::query();
            if($titre=$request->validated('titre')){
                $query=$query->where('titre','like', "%{$titre}%" );
            }
            if($contenus=$request->validated('contenus')){
                $query=$query->where('contenus','like', "%{$contenus}%" );
            }
            if($category_id=(int)$request->validated('category_id')){
                $query=$query->where('categorie_id','=', $category_id );
            }
            
                return view ('astuces.astuces',
                [
                    'astuces' => $query->orderByDesc('id')->where('etat',1)->paginate(4),
                    'categories' => Categorie::select('id','titre','description','couleur','image', 'svg')->get(),
                    'input'=>$request->validated()
                ]);
    }

    public function accueil(string $nom , string $astuce){
        return view ('astuces.mesastuces',['astuce'=>Astuce::findOrFail($astuce)]);

    }

    public function create()
    {

        return view ('astuces.newastuce',[
            'categories'=>Categorie::where('status',false)->select('id','titre','description','couleur','image', 'svg')->get(),
            'tags'=>Tag::where('status',false)->orderBy("nom","asc")->select('id','nom')->get(),
        "astuce"=>new Astuce()]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Astucesrequest $request)
    {
        //dd($request->validated());
			
        $videos=$request->validated('video');
        if($videos){
            if(str_contains($videos,'https://www')){
                //dd($request->validated());
       
               $astuce=Astuce::create($this->extractData(new Astuce(), $request));
               $astuce->tags()->sync($request->validated('tags'));
                   
               
               }else{
                   return redirect()->route('astuces.new')->withInput()->withErrors(['video' => "Le lien n'est pas de Youtube"]);
       
               }
        }else{
                
            $astuce=Astuce::create($this->extractData(new Astuce(), $request));
            $astuce->tags()->sync($request->validated('tags'));
        }

            
    //    dd($videos);

    return redirect()->route('dashboard')->with("success","Astuce Créer avec succes");
        //return view ('astuces.mesastuces',['astuces.newastuce'=>'newastuces']);
        
    }
    private function extractData(Astuce $astuce,Astucesrequest $request){
        $data=$request->validated();
        //dd($data);
        /**
        * @var UploadedFile $image
         */
        $image=$request->validated('image');
        if($image==null || $image->getError()){
            return $data;
        }
        if($astuce->image){
            Storage::disk('public')->delete($astuce->image);
        }
            $data['image']=$image->store("imageastuces",'public');
        return $data;
    }


    /**
     * Display the specified resource.
     */
    public function show(string $nom)
    {
        $m=[];
        $l = Astuce::where('slug',$nom)->firstOrFail();
       //dd($l->slug);
    if ($l->slug != $nom) {
        return to_route('index');
    }

   

        return view('user.astuces',[
            'astuce'=>$l,'ast1'=>Astuce::where("id",'<>',$l->id)->with('users')->where('categorie_id',$l->categorie_id)->where('etat',true)->get(),
            'ast2'=>$m,
            'commentaires'=> $l->comments()->orderBy('created_at', 'desc')->paginate(5)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Astuce $astuce)
    {
        //dd($astuce);
        $a=$astuce->tags()->pluck('id');
        
        return view('astuces.newastuce', ['astuce' => $astuce,
        'categories'=>Categorie::where('status',false)->select('id','titre','description','couleur','image', 'svg')->get(),
            'tags'=>Tag::where('status',false)->select('id','nom')->get(),
            'value'=>$a->pluck("id")
    ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Astuce $astuce, Astucesrequest $request)
    {


        $request->merge(['astuce_id' => $astuce->id]);

        $videos=$request->validated('video');
        if($videos){
            if(str_contains($videos,'https://www')){
                //dd($request->validated());
       
               //$astuce=Astuce::create($this->extractData(new Astuce(), $request));
                $astuce->update($this->extractData($astuce, $request));

                $astuce->tags()->sync($request->validated('tags'));
                return redirect()->route('dashboard');
                   
               
               }else{
                   return redirect()->route('astuces.editastuce')->withInput()->withErrors(['video' => "Le lien n'est pas de Youtube"]);
       
               }
        }else{
            $astuce->update($this->extractData($astuce, $request));

            $astuce->tags()->sync($request->validated('tags'));
        }

            
        //    dd($videos);

        return redirect()->route('dashboard');
            //return view ('astuces.mesastuces',['astuces.newastuce'=>'newastuces']);
            
        }

    

        public function commenter(CommentaireAstuceRequest $comment){
            //dd($comment);
            CommentaireAstuce::create($comment->validated());
            return back()->with("success","Vous avez commenter cette Astuces");
        }

    public function previsualiser(string $astuce){
        
        $lastuce =Astuce::where("slug",$astuce)->firstOrFail();
        if(Auth::user()){
            if (Auth::user()->id != $lastuce->user_id) {
                abort(404); // Retourne une erreur 404
                }
        }else{
            abort(404); // Retourne une erreur 404

        }
        
    
    if ($lastuce->slug != $astuce) {
        return to_route('index');
    }

   

        return view('user.visualiser',[
            'astuce'=>$lastuce,'ast1'=>Astuce::where("id",'<>',$lastuce->id)->with('users')->where('categorie_id',$lastuce->categorie_id)->where('etat',true)->get(),
            'commentaires'=> $lastuce->comments()->orderBy('created_at', 'desc')->paginate(5)
        ]);
    }
}
