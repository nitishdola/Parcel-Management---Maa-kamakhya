<div class="form-group {{ $errors->has('package_received') ? 'has-error' : ''}}">
  {!! Form::label('package_received', 'Package Received at Patna', array('class' => 'col-md-4 control-label')) !!}
  <div class="col-md-8">
    <label class="c-input c-radio">
      <input id="package_received_y" value="yes" checked="checked" name="package_received" type="radio">
      <span class="c-indicator"></span>
      YES
    </label>
    <label class="c-input c-radio">
      <input id="package_received_n" value="no" name="package_received" type="radio">
      <span class="c-indicator"></span>
      NO
    </label>
  </div>
  {!! $errors->first('package_received', '<span class="help-inline">:message</span>') !!}
</div>
<br />

<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
  {!! Form::label('order_id', 'Select Order', array('class' => 'col-md-4 control-label')) !!}
  <div class="col-md-8">
    {!! Form::select('order_id', $orders, null, ['class' => 'chosen-select form-control form-control required', 'id' => 'order_id', 'autocomplete' => 'off',]) !!}
  </div>
  {!! $errors->first('order_id', '<span class="help-inline">:message</span>') !!}
</div>
<br />

<div class="form-group {{ $errors->has('package_transportation_method') ? 'has-error' : ''}}">
  {!! Form::label(' package_transportation_method', 'Package Trasportation Method', array('class' => 'col-md-4 control-label')) !!}

  <label class="c-input c-radio">
    <input id="package_transportation_method_t" value="truck" name="package_transportation_method" type="radio">
    <span class="c-indicator"></span>
    TRUCK
  </label>
  <label class="c-input c-radio">
    <input id="package_transportation_method_r" value="train" name="package_transportation_method" type="radio">
    <span class="c-indicator"></span>
    TRAIN
  </label>

  {!! $errors->first('package_transportation_method', '<span class="help-inline">:message</span>') !!}
</div>
<br />


<div class="form-group {{ $errors->has('package_transportation_method') ? 'has-error' : ''}}">
  {!! Form::label('paid', 'Paid', array('class' => 'col-md-4 control-label')) !!}

  <label class="c-input c-radio">
    <input id="paid_yes" name="paid" value="yes" type="radio">
    <span class="c-indicator"></span>
    YES
  </label>
  <label class="c-input c-radio">
    <input id="paid_no" name="paid" value="no" type="radio">
    <span class="c-indicator"></span>
    NO
  </label>

  {!! $errors->first('paid', '<span class="help-inline">:message</span>') !!}
</div>
<br />

<div class="form-group {{ $errors->has('loading_date') ? 'has-error' : ''}}">
  {!! Form::label('loading_date', 'Loading Date', array('class' => 'col-md-4 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('loading_date', null, ['class' => 'datepicker form-control required', 'id' => 'loading_date', 'autocomplete' => 'off',]) !!}
  </div>
  {!! $errors->first('loading_date', '<span class="help-inline">:message</span>') !!}
</div>
<br />


<div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
  {!! Form::label('remarks', 'Remarks ( Additional Info )', array('class' => 'col-md-4 control-label')) !!}
  <div class="col-md-8">
    {!! Form::textarea('remarks', null, ['class' => 'form-control required', 'id' => 'remarks', 'autocomplete' => 'off',]) !!}
  </div>
  {!! $errors->first('remarks', '<span class="help-inline">:message</span>') !!}
</div>
<br />