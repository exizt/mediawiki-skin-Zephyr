<?php
# namespace MediaWiki\Skins\Zephyr;
use MediaWiki\MediaWikiServices;

// use SkinMustache;

class ZephyrSkin extends SkinMustache {

    /**
     * Extends the getTemplateData function to add a template key 'html-myskin-hello-world'
     * which can be rendered in skin.mustache using {{{html-myskin-hello-world}}}
     */
    public function getTemplateData() {
        $data = parent::getTemplateData();
        $data['html-myskin-hello-world'] = '<strong>Hello world!</strong>'; // or $this->msg('msg-key')->parse();
        // $data['html-myskin-hello-world'] = print_r($data, true);
        // var_dump($data);

        if($data['is-article'] && !$data['is-anon']){

            if ($this->isWatched_skin($data)) {
                // 주시 상태
                // $pageTitle = $this->getTitle()->prefixedText;
                $pageTitle = $this->getTitle()->getPrefixedUrl();
                $watchHtml = '<a href="/w/index.php?title='.$pageTitle.'&amp;action=unwatch" class="mw-watchlink" data-mw="interface" title="이 문서를 주시문서 목록에서 제거 [w]" accesskey="w">주시 해제</a>';
                $data['html-action-watch'] = $watchHtml;
            } else {
                // 주시 상태가 아님
                // $pageTitle = $this->getTitle()->prefixedText;
                $pageTitle = $this->getTitle()->getPrefixedUrl();
                $watchHtml = '<a href="/w/index.php?title='.$pageTitle.'&amp;action=watch" class="mw-watchlink" data-mw="interface" title="이 문서를 주시문서 목록에 추가 [w]" accesskey="w">주시</a>';
                $data['html-action-watch'] = $watchHtml;
            }
        } else {
            $data['html-action-watch'] = '';
        }

        $config = $this->getConfig();
        $logoIconWidth = $this->getSkinConfig('LogoIconWidth');
        $logoIconHeight = $this->getSkinConfig('LogoIconHeight');
        $isWordmarkEnabled = $this->getSkinConfig('LogoWordmarkEnabled');

        $data['zephyr-logo-icon-width'] = $logoIconWidth;
        $data['zephyr-logo-icon-height'] = $logoIconHeight;

        $data['zephyr-logo-wordmark-enabled'] = $isWordmarkEnabled;

        // $data['html-debug'] = $logoIconWidth;
        // $debug = $this->getTitle()->prefixedText;
        // $data['html-myskin-hello-world'] = print_r($debug, true);

        return $data;
    }

    protected function getSkinConfig($key){
        $config = $this->getConfig();
        $v = $config->get('Zephyr'.$key);
        return $v;
    }

    /**
     * 현재 페이지의 주시 여부 값 가져오기
     */
    protected function isWatched_skin($data) {
        if (! isset($data['data-portlets'])) return false;
        if (! isset($data['data-portlets']['data-actions'])) return false;
        if (! isset($data['data-portlets']['data-actions']['html-items'])) return false;

        $actionsHtml = $data['data-portlets']['data-actions']['html-items'];
        // var_dump($actionsHtml);

        $search = '"ca-unwatch"';
        if (str_contains($actionsHtml, $search)) {
            return true;
        }
        return false;
    }
}

