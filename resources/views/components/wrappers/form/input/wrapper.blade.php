@props(['computed', 'error', 'label', 'hint', 'password' => null])

<div>
    @if ($label)
        <x-label :$label :$error />
    @endif
    <div @class(config('tasteui.wrappers.form.input.div')) @if ($password) x-data="{ show : false }" @endif>
        {!! $slot !!}
    </div>
    @if ($hint && !$error)
        <x-hint :$hint />
    @endif
    <x-error :$computed :$error />
</div>
