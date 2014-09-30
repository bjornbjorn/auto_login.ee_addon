<?php
if($autologins) {
    ?>
    <h2>Available Auto Logins</h2>
    <?php
    foreach($autologins as $login_id => $user_arr) {
        ?>

        <h4>Logs in as <em><?php echo $user_arr['username']?></em>:</h4> <input type="text" value="<?php echo $action_url . '&id='.$login_id?>">

        <?php
    }
} else {
    ?>
    <h2>No autologins specified in config</h2>
    <h4>Need array in config with autologins:</h4>

        <pre style="background-color:white; border: 1px solid; padding: 20px;">
$env_config['autologins'] = array(
    array(
        'username' => 'autologinuser',
        'password' => 'autologinpassword'
    )
);
        </pre>

    </p>
    <?php
}
?>