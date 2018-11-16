<form action="<?= $url; ?>" method="post">
    <input type="hidden" id="in_id" name="in_id" value="<?= $id; ?>">
    <div class="form-row">
        <div class="form-group">
            <label for="in_cost">Cost</label>
            <input type="number" class="form-control" id="in_cost" name="in_cost" value="0" placeholder="0">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="in_price">Price</label>
            <input type="number" class="form-control" id="in_price" name="in_price" value="0" placeholder="0">
        </div>
    </div>
</form>