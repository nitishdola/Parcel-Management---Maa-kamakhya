<div class="form-group {{ $errors->has('from') ? 'has-error' : ''}}">
  {!! Form::label('from', 'From', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-8">
    {!! Form::select('from', $cities, null, ['class' => 'form-control required', 'id' => 'from']) !!}
  </div>
  {!! $errors->first('from', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('to') ? 'has-error' : ''}}">
  {!! Form::label('to', 'To', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-8">
    {!! Form::select('to', $cities, null, ['class' => 'form-control required', 'id' => 'to']) !!}
  </div>
  {!! $errors->first('to', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('date_from') ? 'has-error' : ''}}">
  {!! Form::label('date_from', 'Date From', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('date_from', null, ['class' => 'datepicker form-control', 'id' => 'date_from','autocomplete' => 'off', 'placeholder' => 'All']) !!}
  </div>
  {!! $errors->first('date_from', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('date_to') ? 'has-error' : ''}}">
  {!! Form::label('date_to', 'Date To', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('date_to', null, ['class' => 'datepicker form-control', 'id' => 'date_to','autocomplete' => 'off', 'placeholder' => 'All']) !!}
  </div>
  {!! $errors->first('date_to', '<span class="help-inline">:message</span>') !!}
</div>