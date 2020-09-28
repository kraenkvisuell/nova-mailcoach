@props([
    'label',
    'name',
    'options',
    'type' => 'text',
    'required' => false,
])

<div class="">
    <label
        for="{{ $name }}"
        class="
            block mb-1
            font-display uppercase
            text-xs
        "
    >
        {{ $label }} {{ $required ? '*' : '' }}
    </label>

    @if ($type == 'select')
        <select
            wire:model.defer="{{ $name }}"
            class="
                block w-full
                border {{ $errors->has($name) ? 'border-red-500' : 'border-green-500 '}}
                px-2 py-1
                rounded
            "
        >
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}">
                {{ $optionLabel }}
            </option>
        @endforeach
        </select>
    @else
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            wire:model.defer="{{ $name }}"
            class="
                block w-full
                border {{ $errors->has($name) ? 'border-red-500' : 'border-green-500 '}}
                px-2 py-1
                rounded
            "
        />
    @endif

    <div class="
        min-h-6 text-xs text-red-500
    ">
        @if($errors->has($name))
            {{ $errors->first($name) }}
        @endif
    </div>
</div>
