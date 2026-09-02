    <button type="{{ $type ?? 'button' }}" class="multi-button-primary">
        @if (isset($icon))
            <i class="{{ $icon }}"></i>
        @endif
        {{ $btn }}
    </button>
