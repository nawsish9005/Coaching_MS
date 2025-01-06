<?php
?>
<!-- add greige standard of single pp number -->
<div class="x_panel">
  <div class="x_title">
    <h2>Greige Standards Add Form</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />

    <form id="gray_variable_form" name="gray_variable_form" data-parsley-validate class="form-horizontal form-label-left">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Yarn Count Warp<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="yarn_warp_cond1" name="yarn_warp_cond1" onchange="yarn_warp_condition()" class="yarn_warp_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">(</option>
            <option value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="yarn_warp_value1" name="yarn_warp_value1" class="yarn_warp_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="yarn_warp_value2" name="yarn_warp_value2" class="yarn_warp_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="yarn_warp_cond2" name="yarn_warp_cond2" class="yarn_warp_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">)</option>
            <option value="2">]</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Yarn Count Weft<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="yarn_weft_cond1" name="yarn_weft_cond1" onchange="yarn_weft_condition()" class="yarn_weft_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">(</option>
            <option value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="yarn_weft_value1" name="yarn_weft_value1" class="yarn_weft_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="yarn_weft_value2" name="yarn_weft_value2" class="yarn_weft_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="yarn_weft_cond2" name="yarn_weft_cond2" class="yarn_weft_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">)</option>
            <option value="2">]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Thread Count EPI<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="thread_epi_cond1" name="thread_epi_cond1" onchange="thread_epi_condition()" class="thread_epi_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">(</option>
            <option value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="thread_epi_value1" name="thread_epi_value1" class="thread_epi_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="thread_epi_value2" name="thread_epi_value2" class="thread_epi_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="thread_epi_cond2" name="thread_epi_cond2" class="thread_epi_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">)</option>
            <option value="2">]</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Thread Count PPI<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="thread_ppi_cond1" name="thread_ppi_cond1" onchange="thread_ppi_condition()" class="thread_ppi_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">(</option>
            <option value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="thread_ppi_value1" name="thread_ppi_value1" class="thread_ppi_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="thread_ppi_value2" name="thread_ppi_value2" class="thread_ppi_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="thread_ppi_cond2" name="thread_ppi_cond2" class="thread_ppi_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">)</option>
            <option value="2">]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">GSM<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="gsm_warp_cond1" name="gsm_warp_cond1" onchange="gsm_condition()" class="gsm_warp_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">(</option>
            <option value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="gsm_warp_value1" name="gsm_warp_value1" class="gsm_warp_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="gsm_warp_value2" name="gsm_warp_value2" class="gsm_warp_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="gsm_warp_cond2" name="gsm_warp_cond2" class="gsm_warp_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">)</option>
            <option value="2">]</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Fiber Content Warp<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="fiber_warp_cond1" name="fiber_warp_cond1" onchange="fiber_warp_condition()" class="fiber_warp_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">(</option>
            <option value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="fiber_warp_value1" name="fiber_warp_value1" class="fiber_warp_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="fiber_warp_value2" name="fiber_warp_value2" class="fiber_warp_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="fiber_warp_cond2" name="fiber_warp_cond2" class="fiber_warp_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">)</option>
            <option value="2">]</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yarn_count">Fiber Content Weft<span class="required">*</span>
        </label>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="fiber_weft_cond1" name="fiber_weft_cond1" onchange="fiber_weft_condition()" class="fiber_weft_cond1 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">(</option>
            <option value="2">[</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="fiber_weft_value1" name="fiber_weft_value1" class="fiber_weft_value1 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          --
        </div> 
        <div class="col-md-1 col-sm-1 col-xs-2">
          <input type="text" id="fiber_weft_value2" name="fiber_weft_value2" class="fiber_weft_value2 form-control col-md-7 col-xs-12">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
          <select id="fiber_weft_cond2" name="fiber_weft_cond2" class="fiber_weft_cond2 form-control col-md-12 col-xs-12">
            <option value="" selected="selected">Select Condition</option>
            <option value="1">)</option>
            <option value="2">]</option>
          </select>
        </div>
      </div>

      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <input type="hidden" id="pp_id_number" name="pp_id_number" value="<?php echo $pp_no_id; ?>">
          <input type="hidden" id="pp_details_id" name="pp_details_id" value="<?php echo $pp_version; ?>">
          <button type="button" name="submit" id="submit" class="btn btn-success" onclick="send_data_of_define_standard_of_greige_form_to_database();">Submit</button>
          <button type="reset" name="reset" id="reset" class="btn btn-info">Reset</button>
        </div>
      </div>

    </form>
  </div>
</div>                            
<!-- finished add greige standard of single pp number -->
<?php
?>