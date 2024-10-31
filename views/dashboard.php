<?php
if (!defined('ABSPATH')) {exit;}
?>

<h1><?php echo __("Save To Facebook",'save_to_facebook_td');?></h1>

<form action="options.php" method="post">
    <?php settings_fields( 'save_to_facebook_group'); ?>
    <?php do_settings_sections( 'save_to_facebook_group' ); ?>
<table>
    <tbody>

    <tr  height="70">
        <td><label for="fb_api"><?php echo __("Facbook API Key",'save_to_facebook_td');?></label> </td>
        <td><input id="fb_api" name="stf_fb_api" type="text" value="<?php echo get_option( 'stf_fb_api' ); ?>" /></td>
    </tr>

    <tr  height="70">
        <td><label for="post_enable"><?php echo __("Hide from homepage",'save_to_facebook_td');?></label> </td>
        <td><input id="post_enable" name="stf_hide_homepage" type="checkbox" value="1" <?php checked( '1', get_option( 'stf_hide_homepage' ) ); ?>  /></td>
    </tr>

    <tr  height="70">
        <td><label for="post_enable"><?php echo __("Hide from pages",'save_to_facebook_td');?></label> </td>
        <td><input id="post_enable" name="stf_hide_page" type="checkbox" value="1" <?php checked( '1', get_option( 'stf_hide_page' ) ); ?>  /></td>
    </tr>

    <tr  height="70">
        <td><label for="post_enable"><?php echo __("Hide from posts",'save_to_facebook_td');?></label> </td>
        <td><input id="post_enable" name="stf_hide_post" type="checkbox" value="1" <?php checked( '1', get_option( 'stf_hide_post' ) ); ?>  /></td>
    </tr>

    <tr  height="70">
        <td><label for="stf_align"><?php echo __("Position",'save_to_facebook_td');?></label></td>
        <td>
            <!-- Using selected() instead -->
            <select name="stf_align">
                <option value="left"   <?php selected( get_option( 'stf_align' ), 'left'); ?>><?php echo __("Left",'save_to_facebook_td');?></option>
                <option value="center" <?php selected( get_option( 'stf_align' ), 'center' ); ?>><?php echo __("Center",'save_to_facebook_td');?></option>
                <option value="right"  <?php selected( get_option( 'stf_align' ), 'right' ); ?>><?php echo __("Right",'save_to_facebook_td');?></option>
            </select>
        </td>
    </tr>

    <tr  height="70">
        <td><label for="stf_cnt_position"><?php echo __("Display Content",'save_to_facebook_td');?></label></td>
        <td>
            <!-- Using selected() instead -->
            <select name="stf_position">
                <option value="after" <?php selected( get_option( 'stf_position' ), 'after'); ?>><?php echo __("After Content",'save_to_facebook_td');?></option>
                <option value="before" <?php selected( get_option( 'stf_position' ), 'before' ); ?>><?php echo __("Before Content",'save_to_facebook_td');?></option>
                <option value="after-before" <?php selected( get_option( 'stf_position' ), 'after-before' ); ?>><?php echo __("Before After Content",'save_to_facebook_td');?></option>

            </select>
        </td>
    </tr>

    <tr  height="100"><td><label for="btn_size"><?php echo __("Size",'save_to_facebook_td');?></label> </td>
        <td><input id="btn_size" name="btn_size" type="radio" value="large" <?php checked( 'large', get_option( 'btn_size' ) ); ?> checked />
        <p><?php echo __("Large button",'save_to_facebook_td');?></p></td>

        <td><input id="btn_size" name="btn_size" type="radio" value="small" <?php checked( 'small', get_option( 'btn_size' ) ); ?> />
            <p><?php echo __("Small button",'save_to_facebook_td');?></p>
        </td>
    </tr>
    <tr>
        <td> <div class="col-sm-10"><?php submit_button(); ?></td>

    </tr>

    </tbody>
    </table>

</form>
<!---->
<!--<h3>Create your Facebook API KEY:</h3>-->
<!--<ul>-->
<!--    <li>1.Go to your <a target="_blank" href="https://www.facebook.com/ads/manager/pixel/facebook_pixel"> Facebook Pixel tab</a> in Ads Manager.</li>-->
<!--    <li>2.Click Create a Pixel.</li>-->
<!--    <li>3.Enter a name for your pixel. You can have only one pixel per ad account, so choose a name that represents your business.</li>-->
<!--    <li>Note: You can change the name of the pixel later from the Facebook Pixel tab.</li>-->
<!--    <li>4.Check the box to accept the terms.</li>-->
<!--    <li>5.Click Create Pixel.</li>-->
<!--    <li>6.Copy code and paste</li>-->
<!--</ul>-->
<!--<h3>You can visit our tutorial to setup Facebook pixel</h3>-->
<!--<iframe width="560" height="315" src="https://www.youtube.com/embed/gAzQSmnyV6M" frameborder="0" allowfullscreen></iframe>-->