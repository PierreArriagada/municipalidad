<?php
$playlist_id = 'PLQtndAv9EMKA';
$url = 'https://www.youtube.com/playlist?list=' . $playlist_id;
$html = file_get_contents($url);
$videos = [];
if (preg_match('/var ytInitialData = (.*?);<\/script>/', $html, $matches)) {
    $data = json_decode($matches[1], true);
    if($data) {
        $tabs = $data['contents']['twoColumnBrowseResultsRenderer']['tabs'] ?? [];
        foreach($tabs as $tab) {
            $sections = $tab['tabRenderer']['content']['sectionListRenderer']['contents'] ?? [];
            foreach($sections as $sec) {
                $items = $sec['itemSectionRenderer']['contents'][0]['playlistVideoListRenderer']['contents'] ?? [];
                foreach($items as $item) {
                    if(isset($item['playlistVideoRenderer'])) {
                        $vid = $item['playlistVideoRenderer'];
                        $videos[] = [
                            'id' => $vid['videoId'],
                            'title' => $vid['title']['runs'][0]['text'] ?? '',
                            'date' => '' // We can just put a generic date or leave it empty, or extract from title
                        ];
                    }
                }
            }
        }
    }
}
print_r(array_slice($videos, 0, 5));
