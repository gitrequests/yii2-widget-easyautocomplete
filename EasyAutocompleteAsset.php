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
	public $css = [
		[
			'https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.min.css',
			'integrity' => 'sha256-fARYVJfhP7LIqNnfUtpnbujW34NsfC4OJbtc37rK2rs=',
			'crossorigin' => 'anonymous'
		]
	];
    public $js = [
	    [
		    'https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.min.js',
		    'integrity' => 'sha256-aS5HnZXPFUnMTBhNEiZ+fKMsekyUqwm30faj/Qh/gIA=',
		    'crossorigin' => 'anonymous'
	    ]
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
