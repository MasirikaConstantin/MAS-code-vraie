<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'timezone',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function imageUrls(){
        return $this->image ? asset('storage/' . $this->image) : null;
        //return Storage::disk('public')->url($this->image); 
    }

    
    public function commentaire(){
        return $this->belongsToMany(Commentaire::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function astuce()
    {
        return $this->hasMany(Post::class);
    }

    public function imageUrlAstuces(){
        return $this->image ? asset('storage/' . $this->image) : null;
        //return Storage::disk('public')->url($this->image); 
    }
    public function com()
    {
        return $this->hasMany(Commentaire::class);
    }
    public function reactions()
{
    return $this->hasMany(Reaction::class);
}

    public function reactionscomm()
    {
        return $this->hasMany(ReactionComme::class);
    }

    ######################################

    public function subscriptions()
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'user_id', 'follows_id')->withTimestamps();
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'follows_id', 'user_id')->withTimestamps();
    }

    public function subscribeTo(User $user)
    {
        return $this->subscriptions()->attach($user->id);
    }

    public function unsubscribeFrom(User $user)
    {
        return $this->subscriptions()->detach($user->id);
    }

    public function receivedReactions()
    {
        return $this->hasManyThrough(
            Reaction::class,
            Post::class,
            'user_id',     // Clé étrangère sur la table posts
            'post_id',     // Clé étrangère sur la table reactions
            'id',          // Clé locale de users
            'id'          // Clé locale de posts
        );
    }
     // Méthode pour obtenir uniquement les likes positifs
     public function receivedLikes()
     {
         return $this->receivedReactions()->where('reaction');
     }
 
     
     public function enregistrements()
     {
         return $this->hasMany(Enregistrement::class);
     }
     
     public function savedPosts()
     {
         return $this->belongsToMany(Astuce::class, 'enregistrements')->withTimestamps();
     }
}
