<?php
/**
 * Plugin Name:       Realtyna Test
 * Plugin URI:        https://github.com/amirsasani/realtyna-test-project
 * Description:       A test project from RealTyna. Wordpress plugin
 * Version:           1.0.0
 * Author:            Amir Sasani
 * Author URI:        https://amirsasani.ir
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       realtyna-test
 * Domain Path:       /languages
 *
 * @package Realtyna Test
 */

namespace AmirSasani\RealtynaTest;

// Load composers autoload
if (file_exists(__DIR__ . '/lib/autoload.php')) {
    require_once __DIR__ . '/lib/autoload.php';
}

use AmirSasani\RealtynaTest\PostTypes\MoviesPostType;

class RealtynaTest
{
    private static $instance = null;

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function pluginsLoaded()
    {
        load_plugin_textdomain(
            'realtyna-test',
            false,
            basename(dirname(__FILE__)) . '/languages'
        );

        add_action('init', [$this, 'init']);

	    // initialize the movies count widget
	    add_action('widgets_init', [$this, 'registerMoviesCountWidget']);
    }

    public function init()
    {
        $moviesPostType = New MoviesPostType();
    }

	public function registerMoviesCountWidget() {
		register_widget('AmirSasani\RealtynaTest\PostTypes\MoviesCountWidget');
	}
}

$realtynaTest = RealtynaTest::getInstance();
add_action('plugins_loaded', [$realtynaTest, 'pluginsLoaded' ]);