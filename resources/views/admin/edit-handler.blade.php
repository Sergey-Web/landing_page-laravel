<div class="form-group">
    @switch($keyColumn)
        @case('images')
    <label class="form-edit__label-{{ $keyColumn }}" for="{{ $keyColumn }}">{{ $keyColumn }}:</label>
    <input id="{{ $keyColumn }}" type="file" name="{{ $keyColumn }}" value="{{ $column }}">
            @break
        @case('icon')
    <label class="form-edit__label-{{ $keyColumn }}" for="{{ $keyColumn }}">{{ $keyColumn }}:</label>
    <input id="{{ $keyColumn }}" type="file" name="{{ $keyColumn }}" value="{{ $column }}">
            @break
        @case('text')
    <textarea class="form-edit__textarea-{{ $keyColumn }}" name="{{ $keyColumn }}" cols="30" rows="3" placeholder="{{ $keyColumn }}">{{ $column }}</textarea>
            @break

        @default
    <label class="form-edit__label-{{ $keyColumn }}" for="{{ $keyColumn }}">{{ $keyColumn }}:</label>
    <input id="{{ $keyColumn }}" class="form-edit__input" type="text" name="{{ $keyColumn }}" value="{{ $column }}">
    @endswitch
</div>