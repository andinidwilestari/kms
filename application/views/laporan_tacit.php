<script src="<?php echo base_url();?>asset/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/js/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/js/jquery.highchartTable.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('table.highchart').highchartTable();
    });
</script>

<div class="page-header">
    <h1>Perkembangan Pengetahuan Masalah - Solusi per Bulan</h1>
</div>

<p>Perkembangan jumlah input masalah - solusi selama 6 bulan terakhir</p>

<br />
<table class="highchart" data-graph-container-before="1" data-graph-type="column" style="visibility:hidden;">
    <thead>
        <tr>
            <th>Bulan</th>
            <th>Jumlah</th>    
        </tr>
    </thead>
    <tbody>
<?php
    foreach($laporan_tacit->result() as $row)
    {
        $bulan = $row->bulan;
        if($bulan != '2015-12')
        {
        ?>
        <tr>
            <td><?php echo $row->bulan;?></td>
            <td><?php echo $row->jumlah_laporan;?></td>
        </tr>
        <?php
        }
    } 
?>
    </tbody>
</table>