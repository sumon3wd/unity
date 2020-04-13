<?php
N2Loader::import('libraries.renderable.layers.itemFactory', 'smartslider');

class N2SSItemVideo extends N2SSItemAbstract {

    protected $type = 'video';

    public function render() {
        $owner = $this->layer->getOwner();

        $owner->addScript('new N2Classes.FrontendItemVideo(this, "' . $this->id . '", ' . $this->data->toJSON() . ');');

        return N2Html::tag("div", array(
            'class' => 'n2-ss-item-content n2-ss-item-video-container n2-ow'
        ), N2Html::tag("video", $this->setOptions($this->data, $this->id), $this->setContent($owner, $this->data)));
    }

    public function _renderAdmin() {
        return N2Html::tag('div', array(
            'class' => 'n2-ss-item-content n2-ss-item-video-container n2-ow',
            "style" => 'background: URL(' . N2ImageHelper::fixed('$system$/images/placeholder/video.png') . ') no-repeat 50% 50%; background-size: cover;'
        ));
    }

    /**
     * @param $data N2Data
     * @param $id
     *
     * @return array
     */
    private function setOptions($data, $id) {
        $videoOptions = array(
            'style'        => '',
            'class'        => 'n2-ow',
            'encode'       => false,
            'controlsList' => 'nodownload'
        );

        $videoOptions["data-volume"] = $data->get("volume", 1);
        if ($videoOptions["data-volume"] == 0) {
            $videoOptions['muted'] = 'muted';
        }

        if ($data->get('autoplay')) {
            $videoOptions['playsinline']        = 1;
            $videoOptions['webkit-playsinline'] = 1;
        }


        $videoOptions["id"] = $id;

        if ($data->get("showcontrols")) {
            $videoOptions["controls"] = "yes";
        } else {
            $videoOptions["style"] .= "pointer-events:none;";
        }

        $poster = $data->get("poster");
        if (!empty($poster)) {
            $videoOptions["poster"] = N2ImageHelper::fixed($poster);
        }

        $fillMode              = $data->get("fill-mode", 'cover');
        $videoOptions["style"] .= "object-fit:" . $fillMode . ";";

        $videoOptions["preload"] = $data->get("preload", "auto");

        return $videoOptions;
    }

    /**
     * @param $owner N2SmartSliderComponentOwnerAbstract
     * @param $data  N2Data
     *
     * @return string
     */
    private function setContent($owner, $data) {
        $videoContent = "";

        if ($data->get("video_mp4", false)) {
            $videoContent .= N2Html::tag("source", array(
                "src"  => N2ImageHelper::fixed($owner->fill($data->get("video_mp4"))),
                "type" => "video/mp4"
            ), '', false);
        }

        return $videoContent;
    }

    public function needSize() {
        return true;
    }
}
