<form action="<?= $url; ?>" method="post">
    <input type="hidden" id="in_id" name="in_id" value="<?= $id; ?>">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="in_cost">Cost</label>
            <input type="number" class="form-control" id="in_cost" name="in_cost" placeholder="IDR 0" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="in_price">Price</label>
            <input type="number" class="form-control" id="in_price" name="in_price" placeholder="IDR 0" required>
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-success">Verfikasi</button>
    </div>
</form>