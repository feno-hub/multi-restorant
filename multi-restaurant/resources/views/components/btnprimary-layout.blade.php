<div class="button">
    <button type="{{ $type ?? 'button' }}" class="button-primary">
        @if (isset($icon))
            <i class="{{ $icon }}"></i>
        @endif
        {{ $btn }}
    </button>
</div>
