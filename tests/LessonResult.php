<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class LessonResult extends TestCase
{
    /**
     * Test LessonResult model.
     *
     * @return void
     */
    public function testExample()
    {
		$this->json('get', '/student-progress/1')
			->assertStatus(Response::HTTP_OK)
			->assertJsonStructure([
				'lessons' => [
					'id',
					'isComplete',
					'difficulty',
				]
			]);
    }
}
