<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    //all()
    public function all(){
        return collect([1, 2, 3])->all();
    }
//app()->call('App\Http\Controllers\CollectionController@all');
    //avg() 
    // app()->call('App\Http\Controllers\CollectionController@avg');
    public function avg(){

        // $average = collect([
        //     ['price' => 10,'name'=>'x'],
        //     ['price' => 10,'name'=>'x'],
        //     ['price' => 20,'name'=>'x'],
        //     ['price' => 40,'name'=>'x']
        // ])->avg('price');
        // return  $average;

        $average = collect([1, 1, 2, 4])->avg();
        return  $average;
    }
//app()->call('App\Http\Controllers\CollectionController@chunk');
    public function chunk(){
        $collection = collect([1, 2, 3, 4, 5, 6, 7]);

        $chunks = $collection->chunk(2);

        return $chunks->all();
    }
//app()->call('App\Http\Controllers\CollectionController@chunkForeach')
    public function chunkForeach(){
        $html='';
        $i=0;
        $products = collect([ 
            ['name' => 'Desk'],
            ['name' => 'Chair'],
            ['name' => 'Chairx'],
            ['name' => 'Chairyz'],
            ['name' => 'Chair'],
            ['name' => 'Chairc'],
        ]);
        foreach ($products->chunk(3) as $chunk){
            $html.='<div class="row">';
            foreach ($chunk as $product){
                $html.=' <div class="col-xs-4">'.$product['name'] .'</div>';
            }
            $i++;
            $html.='</div> ad'.$i;
         
        }
        return $html;
   
    }
//app()->call('App\Http\Controllers\CollectionController@chunkWhile')
    public function chunkWhile(){
        $collection = collect(str_split('AABBCCCD'));
        // $value =2;
        // $chunks = $collection->chunkWhile(function ($value, $key, $chunk) {
        //     return $value === $chunk->last();
        // });

        $collection->all();
    }

    function rejectInactiveUser(){
        $users = User::all()->reject(function ($user) {
            return $user->active === 1;
        })->map(function ($user) {
            return $user;
        });
        return  $users;
    }
}
