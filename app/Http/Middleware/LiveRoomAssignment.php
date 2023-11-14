<?php

namespace App\Http\Middleware;

use App\Models\Room;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LiveRoomAssignment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //extract the room name
        $roomName = $request->route()->parameter('room.name');

        //find it in the database
        $room = Room::where('name', $roomName)->first();
        //if room is null or if the user isn't assigned to that room
        if (!$room || !$request->user()->rooms->contains($room)) {
            return redirect('/rooms')->with('error', 'You do not have access to this room.');
        }

        return $next($request);
    }
}
