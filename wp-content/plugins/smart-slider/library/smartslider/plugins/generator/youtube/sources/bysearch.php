<?php

N2Loader::import('libraries.slider.generator.abstract', 'smartslider');

class N2GeneratorYouTubeBySearch extends N2GeneratorAbstract {

    private $resultPerPage = 50;
    private $pages;
    private $youtubeClient;

    protected $layout = 'youtube';

    public function renderFields($form) {
        parent::renderFields($form);

        $filter = new N2Tab($form, 'filter', n2_('Filter'));

        new N2ElementText($filter, 'search-term', n2_('Search'), '', array(
            'style' => 'width:200px;'
        ));
    }

    protected function resetState() {
        $this->pages = array();

        if (!$this->youtubeClient) {
            $client              = $this->group->getConfiguration()
                ->getApi();
            $this->youtubeClient = new \Nextend\GoogleApi\Google_Service_YouTube($client);
        }
    }

    protected function _getData($count, $startIndex) {

        $data = array();
        try {

            $offset = $startIndex;
            $limit  = $count;
            for ($i = 0, $j = $offset; $j < $offset + $limit; $i++, $j++) {

                $items = $this->getPage(intval($j / $this->resultPerPage))
                    ->getItems();

                /** @var \Nextend\GoogleApi\Google_Service_YouTube_SearchResult $item */
                $item = $items[$j % $this->resultPerPage];
                if (empty($item)) {
                    // There is no more item in the list
                    break;
                }
                $record              = array();
                $record['video_id']  = $item['id']['videoId'];
                $record['video_url'] = 'http://www.youtube.com/watch?v=' . $item['id']['videoId'];

                $snippet                      = $item['snippet'];
                $record['title']              = $snippet['title'];
                $record['description']        = $snippet['description'];
                $record['thumbnail']          = $snippet['thumbnails']['default']['url'];
                $record['thumbnail_medium']   = $snippet['thumbnails']['medium']['url'];
                $record['thumbnail_high']     = $snippet['thumbnails']['high']['url'];
                $record['thumbnail_standard'] = $snippet['thumbnails']['standard']['url'];
                $record['thumbnail_maxres']   = $snippet['thumbnails']['maxres']['url'];
                $record['channel_title']      = $snippet['channelTitle'];
                $record['channel_url']        = 'http://www.youtube.com/user/' . $snippet['channelTitle'];

                $data[$i] = &$record;
                unset($record);

            }

        } catch (Exception $e) {
            N2Message::error($e->getMessage());
        }

        return $data;
    }

    private function getPage($page) {
        if (!isset($this->pages[$page])) {
            $request = array(
                'q'               => $this->data->get('search-term', ''),
                'maxResults'      => $this->resultPerPage,
                'type'            => 'video',
                'videoEmbeddable' => 'true'
            );
            if ($page != 0) {
                $request['pageToken'] = $this->getPage($page - 1)
                    ->getNextPageToken();
            }
            /** @var \Nextend\GoogleApi\Google_Service_YouTube_SearchListResponse $searchResponse */
            $this->pages[$page] = $this->youtubeClient->search->listSearch('id,snippet', $request);
        }

        return $this->pages[$page];
    }
}