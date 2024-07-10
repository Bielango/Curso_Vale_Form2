{{-- o {{errors}} nao esta fazendo a menor diferença deste jeito:
<div class="form-group"{{$errors->has("name")? "is-valid":" " }}> --}}
<div class="form-group">
    {{ $slot }}
    <span class="help-block">
        {{$errors->first($field)}}
    </span>
    @include("form.help_block", ["field"=>$field])
</div>
