<!-- SORTING OPTIONS START -->
<div class="row">
	<div class="col-md-4">
		<!-- select -->
		<div class="form-group">
			<label>Select</label>
			<select  id="sortBy" class="form-control sortby-option">
			   <option value="employeeName" <?php if($sortBy == 'employeeName'){echo "selected='selected'";} ?> >Sort By Name</option>
			   <option value="totalImpressions" <?php if($sortBy == 'totalImpressions'){echo "selected='selected'";} ?> >Sort By Impression</option>
			   <option value="totalConversion" <?php if($sortBy == 'totalConversion'){echo "selected='selected'";} ?> >Sort By Conversion</option>
			   <option value="totalRevenue" <?php if($sortBy == 'totalRevenue'){echo "selected='selected'";} ?> >Sort By Revenue</option>
			</select>
		</div>
		<div class="btn-group">
			<button class="btn btn-default sorting-button" <?php if($order == 'ASC'){echo "disabled";}?>  onClick="sortingFunction('ASC');"> <i class="fas fa-angle-double-up "></i>  Ascending </button>
			<button class="btn btn-default sorting-button" <?php if($order == 'DESC'){echo "disabled";}?> href="javascript:void(0)" onClick="sortingFunction('DESC');"><i class="fas fa-angle-double-down"></i>  Descending </button>
		</div>

	</div>
</div>
<div style="clear:both;">&nbsp;</div>
<!-- SORTING OPTIONS END -->

<div class="row">

		@if (!empty($employees))
		  @foreach ($employees as $employee)
			<div class="col-md-4">
			  <!-- Widget: user widget style 1 -->
			  <div class="card card-widget widget-user">
				<!-- Add the bg color to the header using any of the bg-* classes -->
				<div class="widget-user-header bg-info">
				  <h3 class="widget-user-username">{{$employee->employeeName}}</h3>
				  <h5 class="widget-user-desc">{{$employee->occupation}}</h5>
				</div>
				<div class="widget-user-image">
  				 @if (!empty($employee->avatar))
				 
					@php
						$fallBackImg = asset("/assets/dist/img/".$employee->avatar_img_fallback);
					@endphp
				  <img class="img-circle elevation-2" src="{{$employee->avatar}}" alt="User Avatar" onerror=this.src="{{$fallBackImg}}">
				  @else
					  <span class="i-circle"> @if (!empty($employee->employeeName[0])){{$employee->employeeName[0]}}@endif  </span>
				  @endif  
				</div>
				
				<!-----chart -->
				<div style="clear:both;">&nbsp;</div>
				<div class="row" >
					<div class="box-body text-center">
						<div class="inlinesparkline" data-type="bar" data-width="97%" data-height="100px" data-bar-Width="14" data-bar-Spacing="7" data-bar-Color="#f39c12">
						 {{$employee->revenue}}
						</div>  
						<div>Conversions {{date('d/m', strtotime($employee->minTime))}} - {{date('d/m', strtotime($employee->maxTime))}}</div>
				  </div>
				</div>
				  <!-----/chart -->
				  
				<div class="box-footer">
				  <div class="row">
					<div class="col-sm-4 border-right">
					  <div class="description-block">
						<h5 class="description-header">{{$employee->totalImpressions}}</h5>
						<span class="description-text">Impressions</span>
					  </div>
					  <!-- /.description-block -->
					</div>
					<!-- /.col -->
					<div class="col-sm-4 border-right">
					  <div class="description-block">
						<h5 class="description-header">{{$employee->totalConversion}}</h5>
						<span class="description-text">conversions</span>
					  </div>
					  <!-- /.description-block -->
					</div>
					<!-- /.col -->
					<div class="col-sm-4">
					  <div class="description-block">
						<h5 class="description-header">{{number_format($employee->totalRevenue, 2)}}</h5>
						<span class="description-text">revenue</span>
					  </div>
					  <!-- /.description-block -->
					</div>
					<!-- /.col -->
				  </div>
				  <!-- /.row -->
				</div>
			  </div>
			  <!-- /.widget-user -->
			</div>

		  @endforeach
	  @endif 
      </div>

     <script>
		//ONCHANGE OB SORTING OPTION
		jQuery('.sortby-option').on('change', function() {
			jQuery('.sorting-button').prop("disabled", false);
		});
			
      jQuery('.inlinesparkline').sparkline('html', {type: 'line', height: '3.5em', width: '20em'}); 
     </script> 