<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\ContactValidator;
use App\Http\Requests\Photoprofilvalidator;
use App\Http\Requests\PostValidate;
use App\Http\Requests\SearchPropertyRequest;
use App\Http\Requests\ValiderCommentaires;
use App\Http\Requests\ReactionValidated;
use App\Http\Requests\SignalisationRequest;
use App\Mail\ProprieteContactMail;
use App\Mail\SignalementMail;
use App\Models\Astuce;
use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\ReactionComme;
use App\Models\Signalement;
use App\Models\Subscription;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Str;

class UserControl extends Controller
{
    public function dashboard(){
        $post=Post::find(5);
        //$tags=$post->tags()->attach(3);
        //dd($post->category->titre);
        $cat=Categorie::find(2);
        //dd($cat->posts);
        $i=0;
        $s=0;
        $posts=Post::orderBy('created_at','desc')->with('tags', 'category','users')->where('user_id', '=', Auth::user()->id)->paginate(3);

        $postsbruillons=Post::orderBy('created_at','desc')->with('tags', 'category','users')->where('user_id', '=', Auth::user()->id)->where('etat','=',1)->paginate(3);

        
        foreach($posts as $post){

            $d1=$post->created_at;
            $d2=Carbon::now();
            $duree=$d1->diff($d2);

            $forma=[];
            if($duree->y>0){
                $forma[]=$duree->m . 'Mois';
            }
            
            if ($duree->m > 0) {
                $forma[] = $duree->m . ' mois';
            }
            if ($duree->d > 0) {
                $forma[] = $duree->d . ' jours';
            }
            if ($duree->h > 0) {
                $forma[] = $duree->h . ' heures';
            }
            if ($duree->i > 0) {
                $forma[] = $duree->i . ' minutes';
            }
            
            //return implode(', ', $formatted); // Concatène les composants avec une virgule
            $maduree=implode(', ', $forma);
            $posts[$i++]['duree']=$maduree;

        }
        foreach($postsbruillons as $poste){

            $d1postsbruillon=$poste->created_at;
            $d2postsbruillon=Carbon::now();
            $dureepostsbruillon=$d1postsbruillon->diff($d2postsbruillon);

            $formapostsbruillon=[];
            if($dureepostsbruillon->y>0){
                $formapostsbruillon[]=$dureepostsbruillon->m . 'Mois';
            }
            
            if ($dureepostsbruillon->m > 0) {
                $formapostsbruillon[] = $dureepostsbruillon->m . ' mois';
            }
            if ($dureepostsbruillon->d > 0) {
                $formapostsbruillon[] = $dureepostsbruillon->d . ' jours';
            }
            if ($dureepostsbruillon->h > 0) {
                $formapostsbruillon[] = $dureepostsbruillon->h . ' heures';
            }
            if ($dureepostsbruillon->i > 0) {
                $formapostsbruillon[] = $dureepostsbruillon->i . ' minutes';
            }
            
            //return implode(', ', $formatted); // Concatène les composants avec une virgule
            $madureepostsbruillon=implode(', ', $formapostsbruillon);
            $postsbruillons[$s++]['duree']=$madureepostsbruillon;

        }
        //dd($posts);
        $savedPosts = auth()->user()->savedPosts()->with('user')->latest()->get();
        return view('dashboard',['savedPosts'=>$savedPosts,'posts' => $posts,'postsbruillon' => $postsbruillons,'astuces'=>Astuce::orderBy('created_at','desc')->with('tags', 'category','users')->where('user_id','=',Auth::user()->id)->paginate(2)]);
    }
    public function newpost(){
    
    //    $category=Categorie::all();
      //  dd($category);
        return view ('user.newpost',['categories'=>Categorie::orderBy("titre","asc")->where('status',false)->get(),'tags'=>Tag::where('status',false)->get()]);
    }
    public function save(PostValidate $request ){
        //dd($request->validated());
        
        $post=Post::create($this->extractData(new Post(), $request));
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('dashboard')->with('success','Blog publier avec Success ! ! ! ');

    }
    
    private function extractData(Post $astuce,PostValidate $request){
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
            $data['image']=$image->store("imagePost",'public');
        return $data;
    }
    public function modifier(Post $post){
        if(isset($post)){
            
        if($post->user_id ==Auth::user()->id){
            return view('user.modifier',[
                'post'=>$post,
                'categories'=>Categorie::select('id','titre')->get(),
                'tags'=>Tag::select('id','nom')->get()]);
        }}
        return back();
}
public function update(Post $post, PostValidate $request)
{
    // Passer l'ID du post à la request pour la validation
    $request->merge(['post_id' => $post->id]);

    $data = $request->validated();
    $image = $request->validated('image');

    if ($image == null || $image->getError()) {
        $post->update($data);
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('dashboard');
    }

    if ($post->image) {
        Storage::disk('public')->delete($post->image);
    }

    $data['image'] = $image->store('imagePost', 'public');
    $post->update($data);
    $post->tags()->sync($request->validated('tags'));

    return redirect()->route('dashboard');
}

    public function all(){

    }







    public function show(string $nom)
{
    $post = Post::where('slug',$nom)->firstOrFail();
    $cat=$post['categorie_id'];
    $autres = Post::where("categorie_id",$cat)->paginate(4);

    if (Auth::user()) {
        if ($post->user->id != Auth::user()->id) {
            $post->incrementViewsCount();
        }
    }

    if ($post->slug != $nom) {
        return to_route('user.show', [
            'post' => $post,
            'nom' => $post->slug,
            "autres"=>$autres,
            'commentaires' => $post->comments()->orderBy('created_at', 'desc')->paginate(5), // Pagination avec ordre décroissant
        ]);
    }

    return view('user.show', [
        'post' => $post,
        "autres"=>$autres,
        'commentaires' => $post->comments()->orderBy('created_at', 'desc')->paginate(5), // Pagination avec ordre décroissant
    ]);
}






public function ok(string $id){
    $post=Commentaire::findOrFail($id);
    return (['post'=>$post,'commentaires'=>$post->comments]);
}
public function commentedelete( Commentaire $id ){

    //$post=Commentaire::findOrFail($id);
    //dd($id);
    $id->delete();
    return back()->with('success','Commentaire supprimer avec success');

}



public function postdelete( Post $post,string $id ){
    $post=Post::findOrFail($id);
    if($post->image){
        Storage::disk('public')->delete($post->image);
    }
    $post->comments()->delete();

    $post->delete();
    return back()->with('success','Commentaire supprimer avec success');

}












    public function commente(ValiderCommentaires $comment){
    
        Commentaire::create($comment->validated());
        return back();
    }
    /*public function commente(ValiderCommentaires $request){
        dd($valide=$request->validated());
        return (['comment' => $valide]);
    }*/
    public function profil( Photoprofilvalidator $profile){
        //dd($profile->validated());
        $user= User::find(Auth::user()->id);
        if($user){
            $image=$profile->validated('image');

            if($image==null || $image->getError()){
                
                return null;
            }
            if($user->image){
            //dd($data);
    
                Storage::disk('public')->delete($user->image);
            }
                $data['image']=$image->store("profilimage",'public');
            $user->image=($data['image']);
            $user->save();
            return to_route('dashboard');
        }
        

    }


    public function recherche(SearchPropertyRequest $request){
        $query=Post::query();
        if($titre=$request->validated('titre')){
            $query=$query->where('titre','like', "%{$titre}%" );
        }
        if($contenus=$request->validated('contenus')){
            $query=$query->where('contenus','like', "%{$contenus}%" );
        }
        if($category_id=(int)$request->validated('category_id')){
            $query=$query->where('categorie_id','=', $category_id );
        }
        
            return view ('user.tous');
        
        

    }
    public function contact (Post $post, ContactRequest $request) {
        Mail::send(new ProprieteContactMail($post, $request->validated()));
        return back()->with('success', 'Votre message a était bien envoyé');
    }

    public function contacts ( ContactRequest $request) {
        Mail::send(new ProprieteContactMail( $request->validated()));
        return back()->with('success', 'Votre message a était bien envoyé');
    }

    public function signalement (SignalisationRequest $request, User $user, Post $post) {
        $data = $request->validated();
        $data['type'] = "";
        //dd($post);
        Signalement::create($data);
        //dd($request->validated());
        Mail::send(new SignalementMail($user,$post, $request->validated()));
        return back()->with('success', 'Votre message a était bien envoyé');
    }

    



    public function shows(Post $post, ReactionValidated $request) {
    //    $request->validated();
        $user = Auth::user();
        $reactionType = request('reaction_type');
    
        // Vérifier si l'utilisateur a déjà réagi au post
        if ($user->reactions()->where('post_id', $post->id)->exists()) {
            $reactions=$user->reactions();
            $reactions->delete();
            //dd($reactions->pluck('id'));
            // Gérer le cas où l'utilisateur a déjà réagi
            // Vous pouvez afficher un message d'erreur ou rediriger l'utilisateur
        } else {
            // Enregistrer la réaction dans la base de données
            $reaction = new Reaction();
            $reaction->user_id = $user->id;
            $reaction->post_id = $post->id;
            $reaction->reaction= $request->validated('reaction');
            $reaction->save();
    
            // Gérer la réaction réussie
            // Vous pouvez afficher un message de succès ou rediriger l'utilisateur
        }
        return back();
        /*
        return ([
            'post'=>$post->id,
            'reaction'=>1
            
        ]);*/
    }

    public function showscomm(Commentaire $commentaire, ReactionValidated $request) {
        //    $request->validated();
        
            $user = Auth::user();
            $reactionType = request('reaction_type');
        
            // Vérifier si l'utilisateur a déjà réagi au post
            if ($user->reactionscomm()->where('commentaire_id', $commentaire->id)->exists()) {
                $reactions=$user->reactionscomm();
                $reactions->delete();
                //dd($reactions->pluck('id'));
                // Gérer le cas où l'utilisateur a déjà réagi
                // Vous pouvez afficher un message d'erreur ou rediriger l'utilisateur
            } else {
                // Enregistrer la réaction dans la base de données
                $reaction = new ReactionComme();
                $reaction->user_id = $user->id;
                $reaction->commentaire_id = $commentaire->id;
                $reaction->reaction= $request->validated('reaction');
                $reaction->save();
        
                // Gérer la réaction réussie
                // Vous pouvez afficher un message de succès ou rediriger l'utilisateur
            }
            return back();
            /*
            return ([
                'post'=>$post->id,
                'reaction'=>1
                
            ]);*/
        }


        
       /* 
            public function showprofil(string $nom, string $user){
             $user=User::find($user);
                //dd($user);
                //dd(Str::slug($user->name,'-'));
            
                
                //return view('user.show',['post'=>$post,'commentaires'=>$post->comments,]);

                if(Auth::user()){
                return view('user.profil',['user'=>$user,'ubs'=>Subscription::where('user_id',Auth::user()->id )->where('follows_id',$user->id),'posts'=>Post::where('user_id',$user->id)->paginate(3)]);
                }else{
                    return view('user.profil',['user'=>$user,'ubs'=>Subscription::where('follows_id',$user->id),'posts'=>Post::where('user_id',$user->id)->paginate(3)]);
                }
                if($user->name  != $nom){
                    return to_route('user.profil',['user'=>$user,'nom'=>Str::slug($user->name,'-'), 'ubs'=>Subscription::where('follows_id',$user->id),'posts'=>Post::where('user_id',$user->id)->paginate(3)]);
                }
            }
            
        */

        public function showprofil(string $nom, string $user)
        {
            // Récupérer l'utilisateur dont le profil est consulté
            $user = User::findOrFail($user);
        
            // Vérifier si le nom dans l'URL correspond au nom de l'utilisateur (version slugifiée)
            $correctSlug = Str::slug($user->name, '-');
            if ($nom !== $correctSlug) {
                return redirect()->route('user.profil', [
                    'user' => $user->id,
                    'nom' => $correctSlug,
                ]);
            }
        
            // Récupérer les posts de l'utilisateur avec pagination
            $posts = Post::where('user_id', $user->id)
                         ->orderBy('created_at', 'desc')
                         ->paginate(3);
        
            // Vérifier si l'utilisateur est connecté et s'il est abonné
            $isSubscribed = false;
            if (Auth::check()) {
                $isSubscribed = Subscription::where('user_id', Auth::id())
                    ->where('follows_id', $user->id)
                    ->exists();
            }
        
            // Retourner la vue avec les données nécessaires
            return view('user.profil', compact('user', 'isSubscribed', 'posts'));
        }
        
        // Méthode pour s'abonner
        public function subscribe(User $user)
        {
            if (!Auth::check()) {
                return redirect()->route('login');
            }
        
            // Vérifier que l'utilisateur ne s'abonne pas à lui-même
            if (Auth::id() === $user->id) {
                return back()->with('error', 'Vous ne pouvez pas vous abonner à vous-même.');
            }
        
            // Vérifier si l'abonnement existe déjà
            $existingSubscription = Subscription::where('user_id', Auth::id())
                ->where('follows_id', $user->id)
                ->exists();
        
            if (!$existingSubscription) {
                Subscription::create([
                    'user_id' => Auth::id(),
                    'follows_id' => $user->id,
                ]);
                return back()->with('success', 'Vous êtes maintenant abonné.');
            }
        
            return back()->with('info', 'Vous êtes déjà abonné.');
        }
        
        // Méthode pour se désabonner
        public function unsubscribe(User $user)
        {
            if (!Auth::check()) {
                return redirect()->route('login');
            }
        
            Subscription::where('user_id', Auth::id())
                ->where('follows_id', $user->id)
                ->delete();
        
            return back()->with('success', 'Vous êtes maintenant désabonné.');
        }

        /*public function subscribe(User $user)
        {
            $ubs=Subscription::where('user_id',Auth::user()->id )->where('follows_id',$user->id);
            if($ubs->count()>0){
                
                return back();

            }else{
                auth()->user()->subscribeTo($user);

            }
            //dd(Subscription::where('user_id',Auth::user()->id )->where('follows_id',$user->id)->get());

            return back();

        }
        
        public function unsubscribe(User $user)
        {
            auth()->user()->unsubscribeFrom($user);
            return back();
        }
*/
        
        public function EditEtat(Post $id){
           // $id->update(['etat' => 1]);
           // return ($id);
        return view('/modifpos', ['comment' => $id]);

            //dd($id); 
        }
        public function EditEtatsauv( Post $id){
          //  $data=;

          $post = Post::findOrFail($id);
           
            $post->update(['etat'=>1]);

          dd($id);
            //return back();

        }

        public function updates(Request $request, Post $post)
        {
            // Valider uniquement le champ 'etat'
            $request->validate([
                'etat' => 'required|boolean',
            ]);
    
            // Récupérer la valeur de 'etat'
            $etat = $request->input('etat');
    
            // Mettre à jour le champ 'etat' du post
            $post->update(['etat' => $etat]);
    
            // Redirection après la mise à jour
            return redirect()->route('dashboard')->with('success', 'Post status updated successfully');
        }
        public function comments(User $user){
           // dd($user->commentaire());
           //dd(Commentaire::with('post')->where('user_id','=',Auth::user()->id)->paginate(2));
           if(!Auth::user()){
            return redirect()->route('index');
           }
            return view('user.mescome',['comments'=>Commentaire::with('post')->where('user_id','=',Auth::user()->id)->paginate(8)]);
        }







        public function updatePost(Astuce $astuce, Astucesrequest $request)
    {


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
}
