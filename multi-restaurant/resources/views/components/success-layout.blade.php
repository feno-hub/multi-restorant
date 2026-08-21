@if(session($key ?? 'success'))
    <div class="success-message">
        <i class="fa-solid fa-check-circle"></i> 
        {{ session($key) }}
    </div>
@endif