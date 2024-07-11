
<div class="form-group {{$errors->has($field)? "alert-danger" : ""}}">
    {{ $slot }}
    @include("form._help_block", ["field"=>$field])
</div>
