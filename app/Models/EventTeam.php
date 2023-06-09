<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTeam extends Model
{
    use HasFactory;
    public static function store($request, $id=null){
        $eventTeam = $request->only(['event_id', 'team_id']);
        $eventTeam = self::updateOrCreate(['id' => $id], $eventTeam);
        return $eventTeam;
    }
}
