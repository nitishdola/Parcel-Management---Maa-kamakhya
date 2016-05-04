
<div class="form-group {{ $errors->has('vns') ? 'has-error' : ''}}">
  {!! Form::label('vns', 'VNS', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-2">
    {!! Form::text('vns', null, ['class' => 'form-control required', 'id' => 'vns', 'placeholder' => 'Enter VNS', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>

  {!! Form::label('to', 'To', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-3">
    {!! Form::text('to', null, ['class' => 'form-control required', 'id' => 'to', 'placeholder' => 'To', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>

  {!! Form::label('date', 'Date', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-2">
    {!! Form::text('date', null, ['class' => 'form-control required', 'id' => 'to', 'placeholder' => 'Date', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>

  {!! $errors->first('vns', '<span class="help-inline">:message</span>') !!}
  {!! $errors->first('to', '<span class="help-inline">:message</span>') !!}
  {!! $errors->first('date', '<span class="help-inline">:message</span>') !!}
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
    {!! Form::text('no_of_packages', null, ['class' => 'form-control required', 'id' => 'consignor', 'placeholder' => 'Number of Packages', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>

  {!! Form::label('weight', 'Weight', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('weight', null, ['class' => 'form-control required', 'id' => 'weight', 'placeholder' => 'Weight', 'autocomplete' => 'off', 'required' => 'true']) !!}  
  </div>
  <div class="col-md-1">Kg</div>

  {!! $errors->first('no_of_packages', '<span class="help-inline">:message</span>') !!}
  {!! $errors->first('weight', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vns') ? 'has-error' : ''}}">
  {!! Form::label('freight_charge', 'Freight Charge', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-3">
    {!! Form::text('freight_charge', null, ['class' => 'form-control required', 'id' => 'weight', 'placeholder' => 'Freight Charge', 'autocomplete' => 'off', ]) !!}	
  </div>

  {!! Form::label('insurance_charge', 'Insurance Charge', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-3">
    {!! Form::text('insurance_charge', null, ['class' => 'form-control required', 'id' => 'insurance_charge', 'placeholder' => 'Insurance Charge', 'autocomplete' => 'off',]) !!}	
  </div>
  
  {!! $errors->first('insurance_charge', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vns') ? 'has-error' : ''}}">
  {!! Form::label('sc_charge', 'S.C. Charge', array('class' => 'col-md-1 control-label')) !!}
  <div class="col-md-3">
    {!! Form::text('sc_charge', null, ['class' => 'form-control required', 'id' => 'sc_charge', 'placeholder' => 'S.C. Charge', 'autocomplete' => 'off',]) !!}	
  </div>

  {!! Form::label('grand_total', 'Grand Total', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-3">
    {!! Form::text('grand_total', null, ['class' => 'form-control required', 'id' => 'grand_total', 'placeholder' => 'Grand Total', 'autocomplete' => 'off','required' => 'true']) !!}  
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

