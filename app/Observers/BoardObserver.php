<?php

namespace App\Observers;

use App\Board;
use Illuminate\Support\Facades\Storage;

class BoardObserver
{
    /**
     * Handle the board "created" event.
     *
     * @param  \App\Board  $board
     * @return void
     */
    public function created(Board $board)
    {
        //
    }

    /**
     * Handle the board "updated" event.
     *
     * @param  \App\Board  $board
     * @return void
     */
    public function updated(Board $board)
    {
        //
    }

    /**
     * Handle the board "deleted" event.
     *
     * @param  \App\Board  $board
     * @return void
     */
    public function deleted(Board $board)
    {
        Storage::delete($board->img);
    }

    /**
     * Handle the board "restored" event.
     *
     * @param  \App\Board  $board
     * @return void
     */
    public function restored(Board $board)
    {
        //
    }

    /**
     * Handle the board "force deleted" event.
     *
     * @param  \App\Board  $board
     * @return void
     */
    public function forceDeleted(Board $board)
    {
        //
    }
}
