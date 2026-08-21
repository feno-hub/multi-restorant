<button type="{{ $type ?? 'button' }}" class="btn-back">
    @if(isset($icon))
        <i class="{{ $icon }}"></i>
    @endif
    {{ $btn }}
</button>