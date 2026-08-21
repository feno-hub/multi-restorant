    <button type="{{ $type ?? 'submit' }}" class="btn-secondary">
        @if (isset($icon))
            <i class="{{ $icon }}"></i>
        @endif
        {{ $btn }}
    </button>
