<div class="container">
    @if (session('count'))
        <div class="alert alert-success">
            {{ session('count') }}
        </div>
    @endif
</div>
