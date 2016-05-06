<div class="form-group {{ $errors->has('vns') ? 'has-error' : ''}}">
  {!! Form::label('c_number', 'C/No', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-3">
    {!! Form::text('c_number', null, ['class' => 'form-control required', 'id' => 'c_number', 'placeholder' => 'C/No', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>

  {!! Form::label('date', 'Date', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-3">
    {!! Form::text('date', null, ['class' => 'datepicker form-control required', 'id' => 'to', 'placeholder' => 'Date', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('date', '<span class="help-inline">:message</span>') !!}
  {!! $errors->first('c_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vns') ? 'has-error' : ''}}">
  {!! Form::label('from', 'From ', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-3">
    {!! Form::select('from', $cities, 1, ['class' => 'form-control required', 'id' => 'vns', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>

  {!! Form::label('', 'To', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-3">
    {!! Form::select('to', $cities,  null, ['class' => 'form-control required', 'id' => 'to', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>

  {!! $errors->first('vns', '<span class="help-inline">:message</span>') !!}
  {!! $errors->first('to', '<span class="help-inline">:message</span>') !!}
  
</div>

<div class="form-group {{ $errors->has('vns') ? 'has-error' : ''}}">
  {!! Form::label('consignor', 'Consignor', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-11">
    {!! Form::text('consignor', null, ['class' => 'form-control required', 'id' => 'consignor', 'placeholder' => 'Consignor', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('consignor', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vns') ? 'has-error' : ''}}">
  {!! Form::label('no_of_packages', 'No of Packages', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-3">
    {!! Form::number('no_of_packages', null, ['class' => 'form-control required', 'id' => 'consignor', 'placeholder' => 'Number of Packages', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>

  {!! Form::label('weight', 'Weight', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-4">
    {!! Form::number('weight', null, [ 'step' =>"0.01", 'class' => 'form-control required', 'id' => 'weight', 'placeholder' => 'Weight', 'autocomplete' => 'off', 'required' => 'true']) !!}  
  </div>
  <div class="col-md-1">Kg</div>

  {!! $errors->first('no_of_packages', '<span class="help-inline">:message</span>') !!}
  {!! $errors->first('weight', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vns') ? 'has-error' : ''}}">
  {!! Form::label('freight_charge', 'Freight Charge', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-3">
    {!! Form::text('freight_charge', null, ['step' =>"0.01",'class' => 'form-control required', 'id' => 'weight', 'placeholder' => 'Freight Charge', 'autocomplete' => 'off', ]) !!}	
  </div>

  {!! Form::label('insurance_charge', 'Insurance Charge', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-3">
    {!! Form::number('insurance_charge', null, ['step' =>"0.01",'class' => 'form-control required', 'id' => 'insurance_charge', 'placeholder' => 'Insurance Charge', 'autocomplete' => 'off',]) !!}	
  </div>
  
  {!! $errors->first('insurance_charge', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vns') ? 'has-error' : ''}}">
  {!! Form::label('sc_charge', 'S.C. Charge', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-3">
    {!! Form::number('sc_charge', null, ['step' =>"0.01",'class' => 'form-control required', 'id' => 'sc_charge', 'placeholder' => 'S.C. Charge', 'autocomplete' => 'off',]) !!}	
  </div>

  {!! Form::label('grand_total', 'Grand Total', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-3">
    {!! Form::number('grand_total', null, ['step' =>"0.01",'class' => 'form-control required', 'id' => 'grand_total', 'placeholder' => 'Grand Total', 'autocomplete' => 'off','required' => 'true']) !!}  
  </div>


  {!! $errors->first('sc_charge', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vns') ? 'has-error' : ''}}">
  {!! Form::label('consignee', 'Consignee', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-11">
    {!! Form::text('consignee', null, ['class' => 'form-control required', 'id' => 'consignee', 'placeholder' => 'consignee', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('consignee', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('paid') ? 'has-error' : ''}}">
{!! Form::label('paid', 'Paid', array('class' => 'col-md-1 control-label')) !!}
  <label class="radio-inline">
    <input type="radio" name="paid" value="yes">Yes
  </label>
  <label class="radio-inline">
    <input type="radio" name="paid" checked="checked" value="no">NO
  </label>
</div>



