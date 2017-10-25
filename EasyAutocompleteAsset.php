<?php

namespace gitrequests\easyautocomplete;

use yii\web\AssetBundle;

/**
 * The asset bundle for the [[EasyAutocomplete]] widget.
 *
 * Includes client assets of [jQuery EasyAutocomplete plugin](https://github.com/pawelczak/EasyAutocomplete).
 *
 * @author Dmitry Bankousky <xkritikx@gmail.com>
 * @since 2.0
 */
class EasyAutocompleteAsset extends AssetBundle
{
    public $sourcePath = '@bower/EasyAutocomplete/dist';
	public $css = [
		'easy-autocomplete.min.css'
	];
    public $js = [
	    'jquery.easy-autocomplete.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
