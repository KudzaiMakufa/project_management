
 <div class="right_col" role="main">
 <div class="">
  <?php //Debug::dump(
 // Model_Product::getProductCount());die;//getTotalQuantityBidded());die;
 $allprod= $allprod= [1,2,3,4,5,6,7,8,9,10,11,12];
 $countmaize = 0 ;
 $maize = []; 
foreach($allprod as $item) {
   // $maize[] = [$item['bidmonth']-1,$item['quantity']];
    $maize[] =[$countmaize,rand(3700,4000)];
    //Debug::dump($maize);die;
    $countmaize ++;
}
 $countpeache = 0 ;
$allprod= [1,2,3,4,5,6,7,8,9,10,11,12];
 $Peaches = []; // = tomatoes! for the demo
foreach($allprod as $item) {
    $Peaches[] = [$countpeache,rand(4500,5000)];
     $countpeache ++;
   // $Peaches[] = [$item['bidmonth']-0,$item['quantity']];
}
$allprod= [1,2,3,4,5,6,7,8,9,10,11,12];
 $countmango = 0 ;
 $Mango = [];
foreach($allprod as $item) {
    //$Mango[] = [$item['bidmonth']-1,$item['quantity']];
    $Mango[] = [$countmango,rand(4200,4700)];
     $countmango ++;
}

 ?>



 
 <?php if(1): ?>
 
 <div class="row">
 		 <?php echo render('dash/tiles2'); ?>
 		 
 </div>
 <?php else: ?>
 <?php if(2): ?>
  
 	<div class="row" >
	 	<?php echo render('dash/graph_non_admin'); ?>
	 </div>
	<?php endif; ?>
 <?php endif; ?>
 
 <br>
   <div>
   </div>
 <?php //Debug::dump($there_is_internet);die; ?>
   <?php  //echo render('dash/test'); ?>
   <!-- bar graph  -->
   <br>
   <div>
   </div>
   <div >
   
   <form method="post" class="form-horizontal" action="<?php echo Uri::create('dashboard/index'); ?>">
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Project</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php 
				$items = Model_Project::find(array('where'=>array('ongoing'=>1)));
					$arr=array(0=>'--Please Select A Project--');
					foreach ($items as $item) {
						$arr[$item->id] = $item->name;
					}
					
					echo Form::select('project_id', Input::post('project_id', isset($item) ? $item->name : ''),$arr ,		
					 array('class' => 'form-control','onchange'=>"setProject()",'id'=>'inputurl')); 
				?>
       
				
			</div>
      <a class="btn btn-info " id="btn-project" href="#">Analyse</a>
		</div>

		<?php //Debug::dump($item->name) ;die; ?>

		<div align="center">
				

				</div>

</form>

   </div>
   <?php  echo render('dash/bargraph'); ?>
   
 
  	<?php echo render('dash/graph'); ?>
 <!-- subs widget -->
 <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo render('dash/pie'); ?>
		 
		
		 </div>
		
    

   

     <?php //echo render('dash/subs'); ?>
     
     
		 
		 
		
	 </div>
<!--   <div class="row">
 	
 </div>-->
 <!-- // subs widget -->

   
		
		 
		
	 </div>
 <!-- // subs widget -->
 

 
 	
 </div>
 </div>
 
 
<!-- lets attach JAVASCRIPT stuff here -->


    <?php echo Asset::js(array(
    	
    	'jquery.flot.js',
    	'jquery.flot.time.js',
    	'jquery.flot.selection.js',
    	'jquery.flot.stack.js',
    	'jquery.flot.resize.js',
      'jquery.flot.orderBars.js',
      'Chart.min.js'
    	
    )); ?>
<!-- // end attach JS --> 

  <script >
    //bar
      var ctxB = document.getElementById("barChart").getContext('2d');
      var myBarChart = new Chart(ctxB, {
      type: 'bar',
      data: {
      labels: ["Technical", "Procurement", "Financial", "Human Resources", "Marketing"],
      datasets: [{
      label: 'Completion percentage',
      data: [12, 19, 3, 5, 2],
      backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(255, 206, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(153, 102, 255, 0.2)',

      ],
      borderColor: [
      'rgba(255,99,132,1)',
      'rgba(54, 162, 235, 1)',
      'rgba(255, 206, 86, 1)',
      'rgba(75, 192, 192, 1)',
      'rgba(153, 102, 255, 1)',
      
      ],
      borderWidth: 1
      }]
      },
      options: {
      scales: {
      yAxes: [{
      ticks: {
      beginAtZero: true
      }
      }]
      }
      }
      });
  </script>

    <!-- Flot -->
    <?php //if(!Model_User::is_FARMER() || Model_User::is_ADMIN()): ?>
    <script>
     $(function() {
      var income = [[0,100],[1,9]];
       
      var data2 = [[0,-1]];;

      var data = [
        {
            data: <?php echo json_encode($maize); ?>,
            color: '#409628',
            label:'Project Zinara',
            lines: {
					show: true,
					lineWidth: 1
				},
				shadowSize: 0
        },    
         {
            data: <?php echo json_encode($Peaches); ?>,
            color: '#400528',
            label:'Project ZESA ',
            lines: {
					show: true,
					lineWidth: 1
				},
				shadowSize: 0
        }  ,
        {
            data: <?php echo json_encode($Mango);  ?>,
            color: '#fa1503',
            label:'Project NRZ',
            lines: {
					show: true,
					lineWidth: 1
				},
				shadowSize: 0
        }  
    ];

var options = {
    xaxis: { ticks:[[0,'Aug'],[1,'Sept'],[2,'Oct'],[3,'Nov'],[4,'Dec'],[5,'Jan'],[6,'Feb'],
    [7,'Mar'],[8,'Apr'],[9,'May'],[10,'June'],[11,'July']]}
};

	$.plot($("#placeholder3xx3"), data, options);	
	});
     
    </script>
    <!-- /Flot -->
    <?php //endif; ?>
    
    <!-- jQuery Sparklines -->
   
<script>
	function setProject(){
		//disease 


		var target = document.getElementById('inputurl');
		//alert(target.value);
		document.getElementById("btn-project").onclick = function() {
    	this.href = '<?php echo Uri::base(false) ;?>'+"dashboard/index/"+target.value;
   		};

   	


		
		//alert(target.value);
	}
</script>
    <!-- /jQuery Sparklines -->
    
     
    
