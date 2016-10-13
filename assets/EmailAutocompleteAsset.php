<?php

/**
* @category  Yii2
* @package   expedientes_batallon_mil_ve
* @author    Leonardo J. Caballero G.
* @copyright Copyright (c) 2016, Ninoska Corredor, Liz Garcia y Leonardo J. Caballero G.
* @link      https://github.com/Conectivo
*/

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Este asset bundle provee la [libreria jquery.email-autocomplete.js](https://github.com/10w042/email-autocomplete/)
 *
 * @author Leonardo J. Caballero G. <leonardocaballero@gmail.com>
 * @since 1.0
 */
class EmailAutocompleteAsset extends AssetBundle
{
    public $sourcePath = '@bower/email-autocomplete/dist';
    public $js = [
        // 'mi.archivo.js',
    ];

    public function init()
    {
        $this->js[] = YII_ENV_DEV ? 'jquery.email-autocomplete.js' : 'jquery.email-autocomplete.min.js';
        parent::init();
    }
}
