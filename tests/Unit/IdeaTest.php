<?php

use App\Models\Idea;
use App\Models\Step;
use App\Models\User;

test('it belongs to a user', function (): void {
    $idea = Idea::factory()->create();

    expect($idea->user)->toBeInstanceOf(User::class);
});

test('it can have steps', function (): void {
    $idea = Idea::factory()->create();

    expect($idea->steps)->toBeEmpty();

    $step = $idea->steps()->create([
        'description' => 'Step 1',
    ]);

    $idea->unsetRelation('steps');

    expect($step)->toBeInstanceOf(Step::class);
    expect($idea->steps)->toHaveCount(1);
});
