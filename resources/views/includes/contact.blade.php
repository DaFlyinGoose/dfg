<div class="row">
    <div class="large-12 columns">
        <label>
            {{ Form::text('name', Session::get('name', ''), array('placeholder' => 'name')) }}
        </label>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <label>
            {{ Form::text('email', Session::get('email', ''), array('placeholder' => 'email')) }}
        </label>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <label>
            {{ Form::textarea('text', Session::get('text', ''), array('placeholder' => 'message', 'rows' => '12x§')) }}
        </label>
    </div>
</div>
{!! Honeypot::generate('my_name', 'my_time') !!}
{{ Form::submit('Send', array('class' => 'success button')) }}
{{ Form::close() }}