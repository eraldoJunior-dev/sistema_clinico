@if (session('success'))
    <p><strong>{{ session('success') }}</strong></p>
@endif

@if (session('info'))
    <p>{{ session('info') }}</p>
@endif

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
