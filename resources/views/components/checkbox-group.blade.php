@props(['name', 'label', 'options'])

<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <label for="{{ $name }}" class="text-sm font-semibold mb-1">{{ $label }}</label>
    @foreach($options as $value => $option)
        <div class="flex items-center mb-2">
            <input type="checkbox" id="{{ $name }}_{{ $option->id }}" name="{{ $name }}[{{ $option->id }}]" value="{{ $option->name}}" class="mr-2">
            <label for="{{ $name }}_{{ $option->id }}">{{ $option->name}}</label>
        </div>
    @endforeach
</div>