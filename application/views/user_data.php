
<div class="container-fluid cont">
    <h1 class="mt-4">User Data</h1>
    <div class="shadow-sm mb-5 p-3 bg-white rounded box-data">
      <table id="example" class="table table-responsive table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Fullname</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $users) {?>
            <tr>
                <td><?=$users->ud_fullname?></td>
                <td><?=$users->ud_username?></td>
                <td></td>
                <td><?=$users->nama_level?></td>
                <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input update_aktif_user" type="checkbox" data-id="<?=$users->ud_id?>" data-type="view_level" <?php if($users->ud_is_active=="Y"){ echo"checked";}?>>
                    </div>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
</div>
