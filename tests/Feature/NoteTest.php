<?php

namespace Tests\Feature;

use App\Models\Note;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllNotes()
    {
        $user = User::factory()->create();

        $notes = Note::factory(3)->create();
        
        $response = $this->actingAs($user)
        ->getJson('/api/note')
        ->assertSuccessful()
        ->assertJsonCount(3)
        ->assertJsonStructure([
            '*' => [
                'id',
                'title',
                'content',
                'created_at',
                'updated_at',
            ]
        ]);
    }
    public function testCreateNewNotes() 
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
        ->postJson('/api/note', [
            'title' => 'Test Title',
            'content' => 'Test Content',
        ])
        ->assertSuccessful()
        ->assertJsonStructure([
            'id',
            'title',
            'content',
            'created_at',
            'updated_at',
        ]);
    }

    public function testEditExistingNotes() 
    {
        $user = User::factory()->create();

        $note = Note::factory()->create();

        $response = $this->actingAs($user)
        ->putJson('/api/note/' . $note->id, [
            'title' => 'Edited Title',
            'content' => 'Edited Content',
        ])
        ->assertSuccessful()
        ->assertJsonStructure([
            'id',
            'title',
            'content',
            'created_at',
            'updated_at',
        ])
        ->assertJson([
            'title' => 'Edited Title',
            'content' => 'Edited Content',
        ]);
    }

    public function testDeleteNotes()
    {
        $user = User::factory()->create();

        $note = Note::factory()->create();

        $response = $this->actingAs($user)
        ->deleteJson('/api/note/' . $note->id)
        ->assertSuccessful();
    }
}
