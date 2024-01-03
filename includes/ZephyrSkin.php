<?php
# namespace MediaWiki\Skins\Zephyr;

use SkinMustache;

class ZephyrSkin extends SkinMustache {

    /**
     * Extends the getTemplateData function to add a template key 'html-myskin-hello-world'
     * which can be rendered in skin.mustache using {{{html-myskin-hello-world}}}
     */
    public function getTemplateData() {
        $data = parent::getTemplateData();
        $data['html-myskin-hello-world'] = '<strong>Hello world!</strong>'; // or $this->msg('msg-key')->parse();
        // $data['html-myskin-hello-world'] = print_r($data, true);

        // $pageTitle = $this->getTitle()->prefixedText;
        $pageTitle = $this->getTitle()->getPrefixedUrl();
        $watchHtml = '<a href="/w/index.php?title='.$pageTitle.'&amp;action=watch" class="mw-watchlink" data-mw="interface" title="이 문서를 주시문서 목록에 추가 [w]" accesskey="w">주시</a>';
        $data['html-action-watch'] = $watchHtml;

        $debug = $this->getTitle()->prefixedText;
        $data['html-myskin-hello-world'] = print_r($debug, true);


        return $data;
    }
}