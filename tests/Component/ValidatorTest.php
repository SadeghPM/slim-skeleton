<?php

namespace Tests\Component;

use Tests\BaseTestCase;

class ValidatorTest extends BaseTestCase
{
    public function testValidateSuccess()
    {
        $validation = validator(['email' => 'test@xx.com'], ['email' => 'required|email']);
        $this->assertNotTrue($validation->fails());
    }

    public function testValidateFail()
    {
        $validation = validator(['user_email' => 'test@'], ['user_email' => 'email']);
        $this->assertTrue($validation->fails());
        $this->assertEquals(
            $validation->errors()->first('user_email'),
            trans('validation.email', ['attribute' => 'user email'])
        );
    }
}