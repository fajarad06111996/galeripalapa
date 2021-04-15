<script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/highcharts.js"></script>
<script type="text/javascript">
  var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'pesanan',
            type: 'column'
         },   
         title: {
            text: ''
         },
         xAxis: {
            categories: ['Jumlah Pesanan Per Bulan']
         },
         yAxis: {
            title: {
               text: 'Jumlah Pesanan'
            }
         },
          series:             
				[
				  
							     {
						  name: 'JANUARI',
								 data: [<?php echo $januari; ?>] }, 
								  {
						  name: 'FEBUARI',
								 data: [<?php echo $febuari; ?>] }, 
								  {
						 name: 'MARET',
								 data: [<?php echo $maret; ?>] }, 
								  {
						 name: 'APRIL',
								 data: [<?php echo $april; ?>] }, 
								  {
						name: 'MEI',
								 data: [<?php echo $mei; ?>] }, 
								  {
						  name: 'JUNI',
								 data: [<?php echo $juni; ?>] }, 
								  {
						  name: 'JULI',
								 data: [<?php echo $juli; ?>] }, 
								  {
						 name: 'AGUSTUS',
								 data: [<?php echo $agustus; ?>] }, 
								  {
						 name: 'SEPTEMBER',
								 data: [<?php echo $september; ?>] }, 
								  {
						 name: 'OKTOBER',
								 data: [<?php echo $oktober; ?>] }, 
								  {
						name: 'NOVEMBER',
								 data: [<?php echo $november; ?>] }, 
								  {
						 name: 'DESEMBER',
								 data: [<?php echo $desember; ?>] }
							

								 ]
    });
});
</script>


<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>GRAFIK</h2>
            </div>
<div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                       <div class="body">
						 <div class="row">
						
                <div class="col-md-12">
				
				 <br>
				 <label>Grafik Jumlah CASHFLOW Selama Tahun <?php echo date('Y'); ?></label>
				 <div id="container"></div>
				 
          </div>
		  		
               
							  </div>
                </div><!-- /.tab-content -->
                        <div class="body">
						 <div class="row">
						
                <div class="col-md-12">
				
				 <br>
				 <label>Grafik Jumlah Penjualan Selama Tahun <?php echo date('Y'); ?></label>
				 <div id="pesanan" ></div>
          </div>
		  		
               
							  </div>
                </div><!-- /.tab-content -->
              </div>
        </section><!-- /.content -->
      </div>
	  <script >
var chart = Highcharts.chart('container', {

  
    chart: {
        type: 'line'
    },

    title: {
        text: 'Grafik Cash Flow'
    },

    subtitle: {
        text: ''
    },

    legend: {
        align: 'right',
        verticalAlign: 'middle',
        layout: 'vertical'
    },

    xAxis: {
        categories: ["JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER"],
        labels: {
            x: -10
        }
    },

    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Amount'
        }
    },

    series: [{
        name: 'PROFIT',
        data: [<?php echo $pemasukan01-$pengeluaran01; ?>,<?php echo $pemasukan02-$pengeluaran02; ?>,<?php echo $pemasukan03-$pengeluaran03; ?>, <?php echo $pemasukan04-$pengeluaran04; ?>, <?php echo $pemasukan05-$pengeluaran05; ?>, <?php echo $pemasukan06-$pengeluaran06; ?>, <?php echo $pemasukan07-$pengeluaran07; ?>, <?php echo $pemasukan08-$pengeluaran08; ?>, <?php echo $pemasukan09-$pengeluaran09; ?>, <?php echo $pemasukan10-$pengeluaran10; ?>, <?php echo $pemasukan11-$pengeluaran11; ?>, <?php echo $pemasukan12-$pengeluaran12; ?>]
    }, {
        name: 'PEMBELIAN',
        data: [<?php echo $pengeluaran01; ?>,<?php echo $pengeluaran02; ?>,<?php echo $pengeluaran03; ?>, <?php echo $pengeluaran04; ?>, <?php echo $pengeluaran05; ?>, <?php echo $pengeluaran06; ?>, <?php echo $pengeluaran07; ?>, <?php echo $pengeluaran08; ?>, <?php echo $pengeluaran09; ?>, <?php echo $pengeluaran10; ?>, <?php echo $pengeluaran11; ?>, <?php echo $pengeluaran12; ?>]
    }, {
        name: 'PENJUALAN',
        data: [<?php echo $pemasukan01; ?>,<?php echo $pemasukan02; ?>,<?php echo $pemasukan03; ?>, <?php echo $pemasukan04; ?>, <?php echo $pemasukan05; ?>, <?php echo $pemasukan06; ?>, <?php echo $pemasukan07; ?>, <?php echo $pemasukan08; ?>, <?php echo $pemasukan09; ?>, <?php echo $pemasukan10; ?>, <?php echo $pemasukan11; ?>, <?php echo $pemasukan12; ?>]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    align: 'center',
                    verticalAlign: 'bottom',
                    layout: 'horizontal'
                },
                yAxis: {
                    labels: {
                        align: 'left',
                        x: 0,
                        y: -5
                    },
                    title: {
                        text: null
                    }
                },
                subtitle: {
                    text: null
                },
                credits: {
                    enabled: false
                }
            }
        }]
    }
});

$('#small').click(function () {
    chart.setSize(400, 300);
});

$('#large').click(function () {
    chart.setSize(600, 300);
});

</script>