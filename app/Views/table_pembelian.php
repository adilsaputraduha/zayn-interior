<?php $no = 0;
foreach ($detailpembelian as $row) : $no++ ?>
    <tr>
        <td> <?= $row['bahan_baku_nama']; ?></td>
        <td> <?= $row['supplier_nama']; ?></td>
        <td>Rp. <?= $row['bahan_baku_harga']; ?></td>
        <td> <?= $row['detail_pembelian_qty']; ?></td>
        <td>Rp. <?= $row['detail_pembelian_jumlah']; ?></td>
        <td style="text-align: center;">
            <button class="btn btn-sm btn-danger" onclick="ajaxDelete(<?= $row['detail_pembelian_id']; ?>, <?= $row['detail_pembelian_qty']; ?>, <?= $row['detail_pembelian_jumlah']; ?>)"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php endforeach; ?>

<script>
    function ajaxDelete(id, quantity, jumlah) {
        $.ajax({
            url: "<?= base_url('admin/pembelian/detail-delete'); ?>",
            type: "POST",
            data: {
                detailid: id,
            },
            success: function(data) {
                reload();
                hitungTotalHapus(quantity, jumlah);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }
</script>