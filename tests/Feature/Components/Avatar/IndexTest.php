<?php

use Illuminate\Support\Arr;
use TasteUi\Contracts\Customizable;
use TasteUi\Facades\TasteUi;
use TasteUi\View\Components\Avatar\Index;

test('customizable')
    ->expect(Index::class)
    ->toImplement(Customizable::class);

test('contains method')
    ->expect(Index::class)
    ->toHaveMethod('customization');

test('contains constructor')
    ->expect(Index::class)
    ->toHaveConstructor();

it('can render', function () {
    $this->blade('<x-avatar label="AJ" />')
        ->assertSee('AJ');
});

it('can render sm', function () {
    $this->blade('<x-avatar label="AJ" sm />')
        ->assertSee('w-8 h-8');
});

it('can render md', function () {
    $this->blade('<x-avatar label="AJ" md />')
        ->assertSee('w-12 h-12');
});

it('can render lg', function () {
    $this->blade('<x-avatar label="AJ" lg />')
        ->assertSee('w-14 h-14');
});

it('can render square', function () {
    $this->blade('<x-avatar label="AJ" lg square />')
        ->assertDontSee('rounded-full');
});

it('can personalize', function () {
    $this->blade('<x-avatar label="AJ" />')
        ->assertSee('AJ');

    TasteUi::personalization('taste-ui::personalizations.avatar')
        ->block('wrapper', function (array $data) {
            return Arr::toCssClasses([
                'inline-flex shrink-0 items-center justify-center overflow-hidden text-xl w-20 h-20',
                'rounded-full' => ! $data['square'],
                TasteUi::colors()
                    ->set('bg', $data['color'], 500)
                    ->merge('border', $data['color'], 500)
                    ->get() => ! $data['modelable'],
            ]);
        });

    $this->blade('<x-avatar label="AJ" />')
        ->assertSee('w-20 h-20');
});

it('cannot personalize wrong block', function () {
    $this->expectException(InvalidArgumentException::class);

    $this->blade('<x-avatar label="AJ" />')
        ->assertSee('AJ');

    TasteUi::personalization('taste-ui::personalizations.avatar')
        ->block('foo-bar', function (array $data) {
            return Arr::toCssClasses([
                'inline-flex shrink-0 items-center justify-center overflow-hidden text-xl w-20 h-20',
                'rounded-full' => ! $data['square'],
                TasteUi::colors()
                    ->set('bg', $data['color'], 500)
                    ->merge('border', $data['color'], 500)
                    ->get() => ! $data['modelable'],
            ]);
        });

    $this->blade('<x-avatar label="AJ" />')
        ->assertSee('w-20 h-20');
});
