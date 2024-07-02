<div class="col-10 offset-1 col-md-4 offset-md-0 col-lg-2 bg-dark py-4 rounded-3 mt-5">
    <h2 class="text-center"><i class="bi bi-funnel-fill"></i>Filters</h2>
    <div class="mb-2">
        <label class="form-label" for="">Category</label>
        <select class="form-select" id="category">
            <option value="0">Select Category</option>

            <?php
            $rs = Database::search("SELECT * FROM `category`");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d["cat_id"]); ?>"><?php echo ($d["cat_name"]); ?></option>

            <?php
            }
            ?>

        </select>
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Brand</label>
        <select class="form-select" id="brand">
            <option value="0">Select Brand</option>

            <?php
            $rs = Database::search("SELECT * FROM `brand`");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d["brand_id"]); ?>"><?php echo ($d["brand_name"]); ?></option>

            <?php
            }
            ?>
        </select>
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Size</label>
        <select class="form-select" id="size">
            <option value="0">Select Size</option>

            <?php
            $rs = Database::search("SELECT * FROM `size`");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d["size_id"]); ?>"><?php echo ($d["size_name"]); ?></option>

            <?php
            }
            ?>
        </select>
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Color</label>
        <select class="form-select" id="color">
            <option value="0">Select Color</option>

            <?php
            $rs = Database::search("SELECT * FROM `color`");
            $num = $rs->num_rows;

            for ($x = 0; $x < $num; $x++) {
                $d = $rs->fetch_assoc();
            ?>
                <option value="<?php echo ($d["color_id"]); ?>"><?php echo ($d["color_name"]); ?></option>

            <?php
            }
            ?>
        </select>
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Price Form</label>
        <input class="form-control" type="text" name="" id="priceFrom">
    </div>
    <div class="mb-2">
        <label class="form-label" for="">Price To</label>
        <input class="form-control" type="text" name="" id="priceTo">
    </div>

    <div class="d-grid">
        <button class="btn btn-secondary" onclick="filter(1);">FITER</button>
    </div>

</div>