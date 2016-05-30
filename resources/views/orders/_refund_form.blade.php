<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
  {!! Form::label('order_id', 'Select Order', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-3">
    {!! Form::select('order_id', $orders, null, ['class' => 'form-control required', 'id' => 'c_number', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('order_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('refund_amount') ? 'has-error' : ''}}">
  {!! Form::label('refund_amount', 'Refund Amount ', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-3">
    {!! Form::number('refund_amount', null, 1, ['class' => 'form-control required', 'id' => 'refund_amount', 'autocomplete' => 'off', 'step' => "0.01", 'required' => 'true']) !!}
  </div>

  {!! $errors->first('refund_amount', '<span class="help-inline">:message</span>') !!}
  
</div>