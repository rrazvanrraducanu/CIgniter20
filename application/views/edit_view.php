<?php
//$this->load->helper('form');
echo form_open_multipart('MainController/update/');
$data1 = ['name'          => 'title',
        'id'            => 'title',
        'value'=>$r->title,
        'maxlength'     => '100',
        'size'          => '30',
       ];
$data2 = ['name'          => 'poza',
        'id'            => 'poza',
        'value'=>$r->image,
        'maxlength'     => '100',
        'size'          => '30',
       ];
$data3 = ['name'          => 'id',
        'id'            => 'id',
        'type'=>'hidden',
         'value'=>$r->id,
        'maxlength'     => '100',
        'size'          => '30',
       ];
?>
<?php echo form_input($data3);?>
<table>
<tr>
<td><?php echo form_label('Title ', 'title');?></td>
<td><?php echo form_input($data1);?></td>
</tr>
<tr>
<td><?php echo form_label('Image ', 'poza');?></td>
<td><?php echo form_upload($data2);?></td>
</tr>
</table>
<?php echo form_submit('submit', 'Update');?>
