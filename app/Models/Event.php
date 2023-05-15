<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'description',
        'stadium',
        'user_id',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'event_teams')->withTimestamps();
    }
    public static function store($request, $id=null){
        $event = $request->only(['name', 'start_date','end_date', 'description','stadium', 'user_id']);
        $event = self::updateOrCreate(['id' => $id], $event);
        $teams = request('teams');
        // dd($teams);
        $event->teams()->sync($teams);
        return $event;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
   
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
