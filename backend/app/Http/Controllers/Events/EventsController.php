<?php
namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * @OA\Get(
     *      path="/events",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *     @OA\PathItem (
     *     ),
     * )
     */
    public function getEvents()
    {
        return "Ola, mundo!";
    }
}
