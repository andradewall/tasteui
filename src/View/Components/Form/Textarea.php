<?php

namespace TasteUi\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use TasteUi\Contracts\Customizable;
use TasteUi\View\Components\Form\Traits\DefaultInputClasses;

class Textarea extends Component implements Customizable
{
    use DefaultInputClasses;

    public function __construct(
        public ?string $id = null,
        public ?string $label = null,
        public ?string $hint = null,
        public int $rows = 8,
        public ?bool $resize = null,
    ) {
        //
    }

    public function render(): View
    {
        return view('taste-ui::components.form.textarea');
    }

    public function customization(bool $error = false): array
    {
        return [
            ...$this->tasteUiMainClasses($error),
        ];
    }

    public function tasteUiMainClasses(bool $error = false): array
    {
        return [
            'base' => Arr::toCssClasses([
                $this->tasteUiInputClasses($error),
                'resize-none' => $this->resize === null || $this->resize === 'none',
            ]),
        ];
    }
}
