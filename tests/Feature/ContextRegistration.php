<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContextRegistration extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
   public function test_an_email_can_be_entered_into_to_context(){
       $this->post('/contest',['email'=>'info@ganza.rw']);
       $this->assertDatabaseCount('contest_entries',1);
   }

}
