<button type="{{ $type ?? 'submit' }}" class="btn-delet">
    @if(isset($icon))
        <i class="{{ $icon }}"></i>
    @endif
    {{ $btn }}
</button>