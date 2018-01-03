<div class="form-group">
    @switch($column)
        @case('images')
    <label class="form-create__label-{{ $column }}" for="{{ $column }}">{{ $column }}:</label>
    <input id="{{ $column }}" type="file" name="{{ $column }}" value="{{ old($column) }}">
            @break
        @case('icon')
    <label class="form-create__label-{{ $column }}" for="{{ $column }}">{{ $column }}:</label>
    <input id="{{ $column }}" type="file" name="{{ $column }}" value="{{ old($column) }}">
            @break
        @case('text')
    <textarea class="form-create__textarea-{{ $column }}" name="{{ $column }}" cols="30" rows="3" placeholder="{{ $column }}">{{ old($column) }}</textarea>
            @break

        @default
    <label class="form-create__label-{{ $column }}" for="{{ $column }}">{{ $column }}:</label>
    <input id="{{ $column }}" class="form-create__input" type="text" name="{{ $column }}" value="{{ old($column) }}">
    @endswitch
</div>