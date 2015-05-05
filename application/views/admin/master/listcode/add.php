

<div class="widget-content" style="padding: 10px;"><br>
    <form class="bs-docs-example form-inline" action="<?php echo site_url('master/listcode/process/add') ?>" method="POST">
        <strong>List Name</strong>
        <select name="inpListName">                                                
            <option></option>
            <?php
            foreach ($SIList_listcode as $row) {
                echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
            }
            ?>
        </select>
        <strong>List Item</strong>
        <input type="text" id="inpListItem" name="inpListItem" placeholder="List Item">
        <button type="submit" class="btn">Simpan</button>
    </form>
</div>