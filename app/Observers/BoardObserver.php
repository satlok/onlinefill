<?php

namespace App\Observers;
use App\model\Board;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BoardObserver
 *
 * @author Lenovo
 */
class BoardObserver {
    //put your code here
     /**
     * Listen to the User created event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(Board $board)
    {
        //
        $board->b_key="sasas";
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}
