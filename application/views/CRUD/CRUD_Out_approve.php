<form action="<?= $url; ?>" method="post">
    <input type="hidden" id="out_id" name="out_id" value="<?= $id; ?>">
    <p>Apakah anda yakin ingin melakukan verifikasi transaksi ini?</p>
    <div class="form-row">
        <button type="submit" class="btn btn-success">Verfikasi</button>
    </div>
</form>