## yii2-widget-easyautocomplete
Yii2 widget for the EasyAutocomplete plugin (https://github.com/pawelczak/EasyAutocomplete).

## Install

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). Check the [composer.json](https://github.com/gitrequests/yii2-widget-easyautocomplete/blob/master/composer.json) for this extension's requirements and dependencies.

To install, either run

```
$ php composer.phar require gitrequests/yii2-widget-easyautocomplete "dev-master"
```

or add

```
"gitrequests/yii2-widget-easyautocomplete": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

```php
echo EasyAutocomplete::widget([
    'pluginOptions' => [
        'url' => Url::to('data/countries.json'),
        'getValue' => 'name'
    ]
]);
```

You can also use this widget in an [[ActiveForm]] using the [[ActiveField::widget()|widget()]]
method, for example like this:

```php
echo $form->field($model, 'address')->widget(EasyAutocomplete::className(), [
    'pluginOptions' => [
        'url' => Url::to('data/countries.json'),
        'getValue' => 'name'
    ]
]);
```
For use with list events||functions (custom match function for example):

```php
echo $form->field($model, 'address')->widget(EasyAutocomplete::className(), [
    'pluginOptions' => [
        'url' => Url::to('data/countries.json'),
        'getValue' => 'name'
        'list' => [
            'maxNumberOfElements' => 10,
            'match' => [
                'enabled' => true,
                'method' => new JsExpression(<<<JavaScript
                    function(element, phrase) {

                        var searches = phrase.split(' ')
                        var count = 0;

                        for (var search of searches) {
                            if (element.search(search) > -1) {
                                count++;
                            }
                        }

                        return searches.length === count
                    }
                JavaScript
                )
            ]
        ]
    ]
]);
```
