<div class="form-group {{ $errors->has('vns') ? 'has-error' : ''}}">
  {!! Form::label('freight_charge', 'Freight Charge', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-3">
    {!! Form::text('freight_charge', 0.00, ['step' =>"0.01",'class' => 'form-control required', 'id' => 'weight', 'placeholder' => 'Freight Charge', 'autocomplete' => 'off', ]) !!}	
  </div>

  {!! Form::label('insurance_charge', 'Insurance Charge', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-3">
    {!! Form::number('insurance_charge', 0.00, ['step' =>"0.01",'class' => 'form-control required', 'id' => 'insurance_charge', 'placeholder' => 'Insurance Charge', 'autocomplete' => 'off',]) !!}	
  </div>
  
  {!! $errors->first('insurance_charge', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vns') ? 'has-error' : ''}}">
  {!! Form::label('sc_charge', 'S.C. Charge', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-3">
    {!! Form::number('sc_charge', 0.00, ['step' =>"0.01",'class' => 'form-control required', 'id' => 'sc_charge', 'placeholder' => 'S.C. Charge', 'autocomplete' => 'off',]) !!}	
  </div>

  {!! Form::label('grand_total', 'Grand Total', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-3">
    {!! Form::number('grand_total', 0.00, ['step' =>"0.01",'class' => 'form-control required', 'id' => 'grand_total', 'placeholder' => 'Grand Total', 'autocomplete' => 'off','required' => 'true']) !!}  
  </div>


  {!! $errors->first('sc_charge', '<span class="help-inline">:message</span>') !!}
</div>

{!! Form::hidden('id', $id) !!}  