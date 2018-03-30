<?php

namespace FidelAPI\Tests;

use Exception;
use Faker\Factory;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler;
use Marcarian\Core\Models\User;
use Marcarian\Core\Services\Container\ContainerBooter;
use Tests\TestCase;

abstract class FidelAPITestCase extends TestCase
{
    /**
     * @var Factory
     */
    private $faker;

    /**
     * Boots the container for most use cases. This data can be overridden.
     */
    protected function bootContainer()
    {
        resolve(ContainerBooter::class)->boot();

        $this->setTestUser();

        return $this;
    }

    /**
     * Disables exception handling for tests.
     */
    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}
            public function report(Exception $e) {}
            public function render($request, Exception $e) {
                throw $e;
            }
        });
    }

    /**
     * Makes the faker available for tests
     */
    protected function useFaker()
    {
        $this->faker = Factory::create();
    }

    /**
     * Sets the test user with its dependencies.
     * Dependent on that the container has been booted.
     *
     * @param User|null $user
     *
     * @return $this
     */
    protected function setTestUser(User $user = null)
    {
        if (empty($user)) {
            $user = factory(User::class)->create();
        }

        container()->setUser($user);

        return $this;
    }
}
