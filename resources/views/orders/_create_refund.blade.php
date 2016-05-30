<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
  {!! Form::label('order_id', 'Select Order', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-8">
    {!! Form::select('order_id', $orders, null, ['class' => 'chosen-select form-control form-control required', 'id' => 'order_id', 'autocomplete' => 'off',]) !!}
  </div>
  {!! $errors->first('order_id', '<span class="help-inline">:message</span>') !!}
</div>
<br />

<div class="form-group {{ $errors->has('refund_amount') ? 'has-error' : ''}}">
  {!! Form::label('refund_amount', 'Refund Amount', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('refund_amount', null , ['step' =>"0.01",'class' => 'form-control required', 'id' => 'weight', 'placeholder' => 'Refund Amount', 'autocomplete' => 'off', ]) !!}	
  </div>
  
  {!! $errors->first('refund_amount', '<span class="help-inline">:message</span>') !!}
</div>