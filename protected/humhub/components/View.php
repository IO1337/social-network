<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\components;

/**
 * Description of WebView
 *
 * @author luke
 */
class View extends \yii\web\View
{

    public function registerJsVar($name, $value)
    {
        $jsCode = "var " . $name . " = '" . addslashes($value) . "';\n";
        $this->registerJs($jsCode, View::POS_HEAD, $name);
    }

    public function renderAjaxContent($content, $context = null)
    {

        ob_start();
        ob_implicit_flush(false);

        $this->beginPage();
        $this->head();
        $this->beginBody();
        echo $content;
        $this->endBody();
        $this->endPage(true);

        return ob_get_clean();
    }

}