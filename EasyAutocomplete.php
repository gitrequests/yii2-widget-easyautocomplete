<?php
namespace gitrequests\easyautocomplete;

use yii\bootstrap\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * EasyAutocomplete jquery widget.
 *
 * ```php
 * echo EasyAutocomplete::widget([
 *     'pluginOptions' => [
 *		    'url' => Url::to('data/countries.json'),
 *		    'getValue' => 'name'
 *      ]
 * ]);
 * ```
 *
 * You can also use this widget in an [[ActiveForm]] using the [[ActiveField::widget()|widget()]]
 * method, for example like this:
 *
 * ```php
 * <?= $form->field($model, 'address')->widget(EasyAutocomplete::className(), [
 *     'pluginOptions' => [
 *		    'url' => Url::to('data/countries.json'),
 *		    'getValue' => 'name'
 *      ]
 * ]);
 * ```
 * For use with list events||functions (custom match function for example):
 *
 * ```php
 * <?= $form->field($model, 'address')->widget(EasyAutocomplete::className(), [
 *     'pluginOptions' => [
 *		    'url' => Url::to('data/countries.json'),
 *		    'getValue' => 'name'
 *          'list' => [
 *				'maxNumberOfElements' => 10,
 *				'match' => [
 *					'enabled' => true,
 *					'method' => new JsExpression(<<<JavaScript
 *						function(element, phrase) {
 *
 *							var searches = phrase.split(' ')
 *							var count = 0;
 *
 *							for (var search of searches) {
 *								if (element.search(search) > -1) {
 *									count++;
 *								}
 *							}
 *
 *							return searches.length === count
 *						}
 *					JavaScript
 *					)
 *				]
 *			]
 *      ]
 * ]);
 * ```
 *
 * The Autocomplete text field is implemented based on the
 * [jQuery EasyAutocomplete plugin](https://github.com/pawelczak/EasyAutocomplete).
 *
 * @author Dmitry Bankousky <xkritikx@gmail.com>
 * @since 2.0
 */
class EasyAutocomplete extends InputWidget
{
	/**
	 * The name of the jQuery plugin to use for this widget.
	 */
	const PLUGIN_NAME = 'easyAutocomplete';

	/**
	 * @var array the HTML attributes for the input tag.
	 * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
	 */
	public $options = ['class' => 'form-control'];

	/**
	 * @var string the type of the input tag.
	 */
	public $inputType = 'text';

	/**
	 * @var array the JQuery plugin options for plugin.
	 */
	public $pluginOptions = [];

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		parent::init();
		$this->initPluginOptions();
	}

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		$this->registerAssets();
		if ($this->hasModel()) {
			echo Html::activeInput($this->inputType, $this->model, $this->attribute, $this->options);
		} else {
			echo Html::input($this->inputType, $this->name, $this->value, $this->options);
		}
	}

	protected function initPluginOptions()
	{
		$this->pluginOptions = empty($this->pluginOptions) ? '{}' : Json::htmlEncode($this->pluginOptions);
	}


	/**
	 * Registers the needed client script and options.
	 */
	public function registerAssets()
	{
		$view = $this->getView();
		EasyAutocompleteAsset::register($view);
		$js = 'jQuery("#' . $this->options['id'] . '").' . self::PLUGIN_NAME . '(' . $this->pluginOptions . ');';
		$view->registerJs($js);
	}
}
