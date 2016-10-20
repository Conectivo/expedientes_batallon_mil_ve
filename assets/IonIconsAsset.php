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
 * Este asset bundle provee los iconos [IonIcons](https://github.com/driftyco/ionicons)
 *
 * @author Leonardo J. Caballero G. <leonardocaballero@gmail.com>
 * @since 1.0
 */
class IonIconsAsset extends AssetBundle
{
    public $sourcePath = '@bower/ionicons';

    public $css = [
        // 'mi.archivo.css',
    ];

    public $js = [
        // 'mi.archivo.js',
    ];

    public function init()
    {
        $this->css[] = YII_ENV_DEV ? 'css/ionicons.css' : 'css/ionicons.min.css';
        parent::init();
    }
}
