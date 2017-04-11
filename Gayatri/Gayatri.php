<?php
/**
 * Plugin Name: Copyright plugin
 * Plugin URI: http://localhost/wordpress
 * Description: This is a sample plugin
 * Version: 1.0.0
 * Author: Gayatri Sharma
 * Author URI: http://localhost/wordpress
 * License: GPL2
 */
add_action('wp_footer', 'copyrightText');

function copyrightText() {
    $textvar = get_option('copyright_text', 'Copyright Text');
    echo '<span style = "color: red;font-size: 20px; padding: 25px; margin: 20px;">' . $textvar . '</span>';
}

add_action('admin_menu', 'addSubmenu');

function addSubmenu() {
    add_management_page('Footer Text', 'Gayatri Text', 'manage_options', __FILE__, 'outputSubmenu');
}

function outputSubmenu() {

    $textvar = get_option('copyright_text', 'Copyright Text');
    if (isset($_POST['change-clicked'])) {
        update_option('copyright_text', $_POST['footertext']);
        $textvar = get_option('copyright_text', 'Copyright Text');
    }
    ?>

    <div class="wrap">
        <h1>Footer Text</h1>
        <p>This simple plugin will output some text to the footer of your template. Change the text below:</p>
        <form action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
            Footer Text:<input type="text" value="<?php echo $textvar; ?>" name="footertext" placeholder="Copyright Text"><br />
            <input name="change-clicked" type="hidden" value="1" />
            <input type="submit" value="Change Text" />
        </form>
    </div>
    <?php
}
?>