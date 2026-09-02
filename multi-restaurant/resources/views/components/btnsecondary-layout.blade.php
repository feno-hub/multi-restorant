    <button type="{{ $type ?? 'submit' }}" class="multi-button-secondary">
        @if (isset($icon))
            <i class="{{ $icon }}"></i>
        @endif
        {{ $btn }}
    </button>
