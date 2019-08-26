@if ( count ($errors))
    <div class="alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        <h3>Error messages!</h3>
        <ul>
            @foreach ( $errors->all() as $error )
                <li> {{ $error }}</li>
                @endforeach
        </ul>
    </div>
    @endif
