<?php $no = 0;
foreach ($keranjang as $row) : $no++ ?>
    <tr>
        <td> <?= $row['keranjang_interior']; ?></td>
        <td> <?= $row['interior_nama']; ?></td>
        <td>Rp. <?= $row['interior_harga']; ?></td>
        <td> <?= $row['keranjang_qty']; ?></td>
        <td>Rp. <?= $row['keranjang_jumlah']; ?></td>
        <td style="text-align: center;">
            <button class="btn btn-sm btn-info btn-choosesatu" data-idkeranjang="<?= $row['keranjang_id']; ?>" data-kode="<?= $row['keranjang_interior']; ?>" data-nama="<?= $row['interior_nama']; ?>" data-harga="<?= $row['interior_harga']; ?>" data-qty="<?= $row['keranjang_qty']; ?>"><i class="fa fa-arrow-left text-white"></i></button>
            <button class="btn btn-sm btn-danger" onclick="ajaxDelete(<?= $row['keranjang_id']; ?>, <?= $row['keranjang_qty']; ?>, <?= $row['keranjang_jumlah']; ?>)"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php endforeach; ?>

<script>
    function ajaxDelete(id, quantity, jumlah) {
        $.ajax({
            url: "<?= base_url('keranjang/detail-delete'); ?>",
            type: "POST",
            data: {
                detailid: id,
            },
            success: function(data) {
                reload();
                // hitungTotalHapus(quantity, jumlah);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }


    $(document).ready(function() {
        $(".btn-choosesatu").click(function() {
            const kodekeranjang = $(this).data('idkeranjang');
            const kodeinterior = $(this).data('kode');
            const namainterior = $(this).data('nama');
            const hargainterior = $(this).data('harga');
            const qtyinterior = $(this).data('qty');

            $('.kodekeranjang').val(kodekeranjang);
            $('.kodeinterior').val(kodeinterior);
            $('.namainterior').val(namainterior);
            $('.hargainterior').val(hargainterior);
            $('.qtyinterior').val(qtyinterior);

            document.getElementById("qtyinterior").disabled = false;
        });
    });
</script>