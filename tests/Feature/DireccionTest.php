<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Direccion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DireccionTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_pantalla_de_agregar_direcciones_se_visualiza()
    {
        //registrar y loguear usuario
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        //ingresar a ruta de direcciones
        $response = $this->get('/direccion');

        //validar que retorne 200
        $response->assertStatus(200);
    }

    public function test_direcciones_pueden_ser_creadas()
    {
        //registrar y loguear usuario
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        //guardar data
        $response = $this->post('/direccion', [
            'name' => 'Test User',
            'direccion' => 'Lorem Ipsum',
        ]);

        //validar si se registro entrada

        $this->assertEquals(1, Direccion::all()->count());

    }    
}
