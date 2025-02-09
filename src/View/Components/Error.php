<?php

namespace TasteUi\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use TasteUi\Contracts\Customizable;

class Error extends Component implements Customizable
{
    public function __construct(
        public ?string $computed = null,
        public bool $error = false,
    ) {
        //
    }

    public function render(): View
    {
        return view('taste-ui::components.error');
    }

    public function customization(bool $error = false): array
    {
        return [
            ...$this->tasteUiMainClasses(),
        ];
    }

    public function tasteUiMainClasses(): array
    {
        return [
            'base' => 'mt-2 text-sm text-red-500',
        ];
    }
}
