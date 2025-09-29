<?php

namespace backend\widgets\box;

use yii\base\Widget;
use yii\helpers\Html;
use common\assets\IonIconsAsset;

/**
 * Class SmallBox
 *
 * @package backend\widgets\box
 */
class SmallBox extends Widget
{
    const BG_GREEN = 'bg-green';
    const BG_AQUA = 'bg-aqua';
    const BG_YELLOW = 'bg-yellow';
    const BG_RED = 'bg-red';
    const BG_GRAY = 'bg-gray';
    const BG_BLACK = 'bg-black';
    const BG_MAROON = 'bg-maroon';
    const BG_PURPLE = 'bg-purple';
    const BG_TEAL = 'bg-teal';
    const BG_NAVY = 'bg-navy';
    const BG_PRIMARY = 'bg-primary';
    const BG_SUCCESS = 'bg-success';
    const BG_WARNING = 'bg-warning';
    const BG_INFO = 'bg-info';
    const BG_DANGER = 'bg-danger';

    /**
     * @var bool
     */
    public $status = true;
    /**
     * @var string
     */
    public $header;
    /**
     * @var string icon name
     * @see: http://ionicons.com
     */
    public $icon;
    /**
     * @var string
     */
    public $content;
    /**
     * @var array|string|null
     *
     * ['label' => '', 'url' => ['#']];
     */
    public $link;
    /**
     * @var string
     */
    public $style;

    /**
     * Run
     *
     * @return string
     */
    public function run()
    {
        if ($this->status === true) {
            $this->registerAssets();
            return $this->renderContent();
        }
        return '';
    }

    /**
     * Render Content
     *
     * @return string
     */
    public function renderContent()
    {
        $options = [
            'id' => $this->id,
            'class' => trim('stat-card ' . $this->style),
        ];

        $content = Html::beginTag('div', ['class' => 'stat-card-body']) . PHP_EOL;
        $content .= Html::beginTag('div', ['class' => 'stat-card-meta']) . PHP_EOL;
        $content .= Html::tag('div', $this->content, ['class' => 'stat-card-label text-uppercase small fw-semibold']) . PHP_EOL;
        $content .= Html::tag('div', $this->header, ['class' => 'stat-card-value']) . PHP_EOL;
        $content .= Html::endTag('div') . PHP_EOL;
        $content .= Html::tag('span', Html::tag('i', '', ['class' => 'icon ' . $this->icon]), ['class' => 'stat-card-icon']) . PHP_EOL;
        $content .= Html::endTag('div') . PHP_EOL;

        $footer = '';
        if (is_array($this->link)) {
            if (!empty($this->link['label']) && !empty($this->link['url'])) {
                $label = Html::encode($this->link['label']) . ' <i class="fas fa-arrow-right ms-2"></i>';
                $footer = Html::tag(
                    'div',
                    Html::a(
                        $label,
                        $this->link['url'],
                        [
                            'class' => 'stat-card-link',
                        ]
                    ),
                    ['class' => 'stat-card-footer']
                );
            }
        } elseif ($this->link !== null) {
            $footer = Html::tag('div', $this->link, ['class' => 'stat-card-footer']);
        }

        return Html::tag('div', $content . $footer, $options) . PHP_EOL;
    }

    /**
     * Register Assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        IonIconsAsset::register($view);
    }
}
