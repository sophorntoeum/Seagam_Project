<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'zone',
        'price',
        'event_id',
        'user_id',
    ];
    public static function store($request, $id=null){
        $ticket = $request->only(['zone', 'price', 'event_id','user_id']);
        $ticket = self::updateOrCreate(['id' => $id], $ticket);
        return $ticket;
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
   
    public function event(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

}
