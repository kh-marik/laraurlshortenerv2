@if (count($errors) > 0)
        <!-- Form Error List -->
<div class="alert alert-danger">
    <ul style="padding-left: 0">
        @foreach ($errors->all() as $error)
            <li style="width: 100%; list-style: none;">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif