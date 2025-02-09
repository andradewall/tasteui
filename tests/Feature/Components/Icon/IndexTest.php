<?php

use Illuminate\View\ViewException;
use TasteUi\Contracts\Customizable;
use TasteUi\View\Components\Icon;

test('customizable')
    ->expect(Icon::class)
    ->not
    ->toImplement(Customizable::class);

test('contains method')
    ->expect(Icon::class)
    ->not
    ->toHaveMethod('customization');

test('contains constructor')
    ->expect(Icon::class)
    ->toHaveConstructor();

it('can render', function () {
    $this->blade('<x-icon icon="users" />')
        ->assertSee('<svg', false);
});

it('can render solid', function () {
    $this->blade('<x-icon icon="users" solid />')
        ->assertSee('<svg', false);
});

it('can render outline', function () {
    $this->blade('<x-icon icon="users" outline />')
        ->assertSee('<svg', false);
});

it('can render with error', function () {
    $this->blade('<x-icon icon="users" outline error />')
        ->assertSee('text-red-500');
});

it('cannot render with inaceptable type', function () {
    $this->expectException(ViewException::class);
    $this->expectExceptionMessage('The icon must be one of the following: [solid, outline]. Provided: [foo-bar]');

    $this->blade('<x-icon icon="users" type="foo-bar" />')
        ->assertSee('<svg', false);
});
