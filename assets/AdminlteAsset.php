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
 * Este asset bundle provee la [libreria AdminLTE](https://github.com/almasaeed2010/AdminLTE)
 *
 * @author Leonardo J. Caballero G. <leonardocaballero@gmail.com>
 * @since 1.0
 */
class AdminlteAsset extends AssetBundle
{
    public $sourcePath = '@bower/admin-lte/dist';
    public $js = [
        // 'mi.archivo.js',
    ];

    public function init()
    {
        $this->css[] = YII_ENV_DEV ? 'css/AdminLTE.css' : 'css/AdminLTE.min.css';
        $this->js[] = YII_ENV_DEV ? 'js/app.js' : 'js/app.min.js';
        parent::init();
    }
}
