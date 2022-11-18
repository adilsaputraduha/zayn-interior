<?php $no = 0;
foreach ($detailbahanbaku as $row) : $no++ ?>
    <tr>
        <td> <?= $row['bahan_baku_nama']; ?></td>
        <td> <?= $row['detail_qty']; ?></td>
        <td style="text-align: center;">
            <button class="btn btn-sm btn-danger" onclick="ajaxDelete(<?= $row['detail_id']; ?>)"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php endforeach; ?>

<script>
    function ajaxDelete(id, quantity, jumlah) {
        $.ajax({
            url: "<?= base_url('admin/interior/detail-delete'); ?>",
            type: "POST",
            data: {
                detailid: id,
            },
            success: function(data) {
                reload();
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }
</script>