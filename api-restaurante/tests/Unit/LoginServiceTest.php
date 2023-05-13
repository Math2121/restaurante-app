<?php

namespace Tests\Unit;

use App\Http\Business\LoginBusiness;
use App\Http\Interfaces\LoginInterface;
use App\Http\Interfaces\LoginServiceInterface;
use App\Http\Interfaces\UserRepostiroyInterface;
use App\Http\Services\LoginService;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginServiceTest extends TestCase
{
    private $loginServiceMock;
    private $userRepositoryMock;
    protected function setUp(): void
    {
        parent::setUp();

        $this->loginServiceMock = $this->createMock(LoginServiceInterface::class);
        $this->userRepositoryMock = $this->createMock(UserRepostiroyInterface::class);
    }

    public function test_nao_deve_fazer_login(){

        $this->expectException(Exception::class);

        $this->instanciaBusiness()->recuperaUsuario([]);

        $this->expectExceptionMessage('Usuário inexistente');
    }

    public function test_deve_fazer_login(){
        Auth::shouldReceive('attempt')
        ->once()
        ->andReturn(true);

        $this->loginServiceMock->method('geraToken')
        ->willReturn('hdjfjdafjadfjdabfjafda');

        $token = $this->instanciaBusiness()->recuperaUsuario([
            'email'=> 'test@gmail.com',
            'password'=> 'test123'
        ]);

        $this->assertIsArray($token);
    }

    public function instanciaBusiness(){
        return new LoginBusiness(
            $this->loginServiceMock,
            $this->userRepositoryMock
        );
    }
}
