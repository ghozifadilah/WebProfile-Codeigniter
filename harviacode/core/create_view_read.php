<?php 

$string = "<?php \$this->load->view('layout/header');?>
        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." Read</h2>
        <table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a></td></tr>";
$string .= "\n\t</table>
<?php \$this->load->view('layout/footer');?>";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>