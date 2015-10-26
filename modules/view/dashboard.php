<section class="wrapper site-min-height">
	
<div class="row">
  <div class="col-lg-12">
	  <div class="panel terques-chart">
		  <div class="panel-body chart-texture">
			  <div class="chart">
				  <div class="heading">
					  <span>Sales Oktober 2015</span>
				  </div>
				  <div class="sparkline" data-type="line" data-resize="false" data-height="150" data-width="90%" data-line-width="2" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="6" data-data="[200,135,667,333,526,996,564,123,890,564,455,200,135,667,333,526,996,564,123,890,564,455,200,135,667,333,526,996,564,123]"></div>
			  </div>
		  </div>
	  </div>
  </div>
</div>
<div class="row">
	<div class="col-lg-6">
		<section class="panel">
		  <div class="weather-bg">
			  <div class="panel-body">
				  <div class="row">
					  <div class="col-xs-6">
						<i class="fa fa-cloud"></i>
						  Semarang
					  </div>
					  <div class="col-xs-6">
						  <div class="degree">
							  28&deg;
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>

		  <footer class="weather-category">
			  <ul>
				  <li class="active">
					  <h5>humidity</h5>
					  56%
				  </li>
				  <li>
					  <h5>precip</h5>
					  1.50 in
				  </li>
				  <li>
					  <h5>winds</h5>
					  10 mph
				  </li>
			  </ul>
		  </footer>
	  </section>
	</div>
	<div class="col-lg-6">
	  <section class="panel">
		  <div class="weather-bg" style="background: #58c9f3;">
			  <div class="panel-body">
				 <div class="row">
					  <div class="col-xs-12">
						<i class="fa fa-truck"></i>
						  Schedule Agreement
					  </div>
				  </div>
			  </div>
		  </div>

		  <footer class="weather-category">
			  <ul>
				  <li class="active">
					  <h5>Kemarin</h5>
					  1.280
				  </li>
				  <li>
					  <h5>Hari Ini</h5>
					  720
				  </li>
				  <li>
					  <h5>Besok</h5>
					  1.480
				  </li>
			  </ul>
		  </footer>
	  </section>
	</div>
</div>
	
</section>

<script>
$(document).ready(function(){
	$(".sparkline").each(function(){
        var $data = $(this).data();

        $data.valueSpots = {'0:': $data.spotColor};

        $(this).sparkline( $data.data || "html", $data,
        {
            tooltipFormat: '<span style="display:block; padding:0px 10px 12px 0px;">' +
            '<span style="color: {{color}}">&#9679;</span> {{offset:names}} ({{percent.1}}%)</span>'
        });
    });
});
</script>