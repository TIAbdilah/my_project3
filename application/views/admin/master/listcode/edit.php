
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;"><br>
        <form class="bs-docs-example form-inline" action="<?php echo site_url('admin/listcode/process/edit/'.$row->id) ?>" method="POST">
            <strong>List Name</strong>
            <select name="inpListName">                                                
                <option></option>
                <?php
                foreach ($SIList_listcode as $row_1) {
                    echo "<option value=\"" . $row_1->list_item . "\"".set_select('inpListName', $row_1->list_item, $row_1->list_item==$row->list_name).">" . $row_1->list_item . "</option>";                                        
                }
                ?>
            </select>&nbsp;
            <strong>List Item</strong>
            <input type="text" id="inpListItem" name="inpListItem" value="<?php echo $row->list_item?>">&nbsp;
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
    <!-- /widget-content --> 
</div>