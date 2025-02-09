<?php

namespace TasteUi\Support\Personalizations\Components;

use Illuminate\Contracts\Support\Arrayable;
use TasteUi\Support\Personalizations\Contracts\ShouldBePersonalized;
use TasteUi\Support\Personalizations\Traits\ShareablePersonalization;

class Badge implements Arrayable, ShouldBePersonalized
{
    use ShareablePersonalization;

    public const EDITABLES = ['base', 'icon'];
}
